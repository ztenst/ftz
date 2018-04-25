define(['html2canvas','angular-ui-router','_'],function(html2canvas) {
    var PATH = PATH_MODULES + 'fanti/';
    angular.module('fanti',['ngCookies'])
    .run(function($rootScope,$urlRouter,$api,$state) {
        $rootScope.config = {};
        $rootScope.$on('$locationChangeSuccess',function(evt) {
            if(!$rootScope.config.siteConfig){
                evt.preventDefault();
            }
            $api.getConfig().success(function(obj) {
                $rootScope.config.siteConfig = obj.data;
                var qr = obj.data.qr;
                new Image().src = qr;
                $urlRouter.sync(); 
            });
        });
        $rootScope.is_result = function() {
            return !$state.is('result');
        }
    })
    .controller('run',function($scope,$question,$interval,$html2canvas,$timeout,$state,$api,$rootScope,$cookieStore) {
        $scope.page = {
            isOk : false,
            tid : null, //时间戳
            state : 0, //0未开始，1正在答题，2答题失败，3答题过关
            no : -1, //当前题目
            level : 0, //当前级别 0初级 1中级 2高级
            time : 10, //答题倒计时
            noQues : [], //当前题目
            _question : [], //当前级别总题库
            result : [] //答题结果
        };
        //开始答题
        $scope.start = function() {
            $scope.getLevelQues().then(function(obj) {
                if(obj){
                    $scope.reset();
                    $scope.page.state = 1;
                    $scope.next();
                }else{
                    alert('没有题目');
                    $state.go('diff');
                }
            });
        }
        //下一题
        $scope.next = function() {
            //这里做个检查
            var no = $scope.page.no;
            var allno = $scope.page._question.length;
            no = no + 1;
            if(no == allno){
                $scope.win();
            }else{
                //答对了再加一
                var noQues = $scope.getNoQues(no);
                var obj = {
                    key : noQues.jtz,
                };
                obj.list = _.map(noQues,function(v,k) {
                    if(k.slice(0,3) === 'ftz'){
                        return {
                            'name' : v,
                            'value' : v === noQues.correct
                        }
                    }
                })
                obj.list = _.filter(obj.list,function(v) {
                    return !!v;
                })
                console.log(obj.list);
                $scope.page.noQues = obj;
                $scope.page.noQues.list = _.shuffle(obj.list);
                $scope.page.no = no;
                $scope.time();
            }
        };
        //开始倒计时
        $scope.time = function() {
            $interval.cancel($scope.page.tid);
            $scope.page.time = 10;
            $scope.$applyAsync();
            $scope.page.tid = $interval(function() {
                $scope.page.time --;
                if($scope.page.time == 0){
                    $scope.fail();
                    $interval.cancel($scope.page.tid);
                }
            },1e3);
        }
        //这里检查题目是否答对
        $scope.check = function(item) {
            item.clicked = true;
            $scope.page.noQues.showResult = true;
            if(item.value == 1){
                $interval.cancel($scope.page.tid);
                $timeout(function() {
                    $scope.next();
                },500,false);
            }else{
                $timeout(function() {
                    $scope.fail();
                },2e3,false);
            }
        };
        //全部答对
        $scope.win = function() {
            $scope.page.state = 3;
            $scope.result(1).then(function(obj) {
                var rate = obj.data.data;
                $rootScope.config.siteConfig.rate = rate;
                $rootScope.config.siteConfig.state = 3;
                $rootScope.config.siteConfig.no =  $scope.page.no + 1;
                $state.go('result');
            });
        };
        //答题错误
        $scope.fail = function() {
            //$scope.page.state = 2;
            //$scope.page.no -= 1;
            $interval.cancel($scope.page.tid);
            $scope.result(0).then(function(obj) {
                var rate = obj.data.data;
                $rootScope.config.siteConfig.rate = rate;
                $rootScope.config.siteConfig.state = 2;
                $rootScope.config.siteConfig.no =  $scope.page.no;
                $state.go('result');
            });
        }
        //重置
        $scope.reset = function() {
            var _default = {
                no : -1,
                state : 0
            };
            _.extend($scope.page,_default);
        }
        //生成结果
        $scope.result = function(flag) {
            var no = $scope.page.no;
            var _question = $scope.page._question;
            $scope.page.result = {
                no : no + flag,
                total : _question.length
            };

            $cookieStore.put('result',{
                no : no+flag,
                levelStr : $rootScope.config.siteConfig.levelStr
            });
            //$cookies.no = no + flag;
            //console.log($scope.page.result);

            return $api.setScore({
                num : no + flag
            }).then(function() {
                return $api.getRange({
                    num : no + flag
                })
            })
        }

        //获得当前级别题目组
        $scope.getNoQues = function(no) {
            var _question = $scope.page._question;
            console.log(_question);
            return _question[no];
        };
        //获得级别总题目
        $scope.getLevelQues = function() {
            var level = $rootScope.config.siteConfig.level;
            var data = {
                level : level
            };
            return $api.getWords(data).then(obj => {
                var q = obj.data.data;
                if(q.length == 0){
                    return false;
                }else{
                    $scope.page._question = _.shuffle(obj.data.data);
                    $scope.page.isOk = true;
                    return true;
                }
            });
        }


        //开始答题
        $scope.start();
    })
    //题目
    .factory('$question',function($http) {
        return {
            'get' : function(level) {
                return $http.get(PATH + 'data.php');
            }
        }
    })
    //生成图片
    .factory('$html2canvas',function() {
        return {
            createImg : function() {
                return html2canvas(document.querySelector("#j-result_ok")).then(canvas => {
                    return canvas.toDataURL();
                });
            }
        }
    })
    .controller('start',function($scope,$state) {
        $scope.start = function() {
            $state.go('diff');
        }
    })
    .controller('diff',function($scope,$state,$rootScope,$cookieStore) {
        //console.log($cookieStore.get('result'));
        $scope.result = $cookieStore.get('result');
        $scope.start = function(level) {
            $rootScope.config.siteConfig.level = level;
            $rootScope.config.siteConfig.levelStr = ['','初级','中级','高级'][level];
            $state.go('run');
        }        
    })
    .controller('result',function($scope,$timeout,$html2canvas,$rootScope,$state) {
        $timeout(function() {
            $html2canvas.createImg().then( dataurl => {
                $timeout(function() {
                    $scope.img = dataurl;
                });
            });
        },0,false);
        $scope.showMore = function() {
            $scope.show = 1;
        };
        $scope.close = function() {
            $scope.show = 0;
        }
        document.title = '我认识' + $rootScope.config.siteConfig.no + '个繁体字，全世界排名第' + $rootScope.config.siteConfig.rate.range+ '名，你敢来挑战吗？';

        $scope.start = function() {
            $state.go('run');
        }   
        $scope.showShare = function() {
            $scope.share = 1;
        }
        $scope.closeShare = function() {
            $scope.share = 0;
        }
    })
    //api
    .factory('$api',function($http) {
        return {
            getWords : function(data) {
                var url = '/api/index/getWords';
                return $http.get(url,{
                    'params' : data
                })
            },
            getConfig : function() {
                var url = '/api/index/getConfig';
                return $http.get(url);
            },
            setScore : function(data) {
                var url = '/api/index/setScore';
                return $http.get(url,{
                    'params' : data
                });
            },
            getRange : function(data) {
                var url = '/api/index/getRange';
                return $http.get(url,{
                    'params' : data
                });
            }
        }
    })
    .factory('myInterceptor', function($q) {
        window.CONFIG = window.CONFIG || {};
        var domain = CONFIG.host || 'http://ftz.madridwine.cn';
        var staticPath = CONFIG.staticPath || '';
        var interceptor = {
        'request': function(config) {
            if(config.url.slice(1,4) === 'api'){
                config.url = domain + config.url;
            }
            if(config.url.slice(0,3) === 'tpl'){
                config.url = staticPath + config.url;
            }
        // 成功的请求方法
        return config; // 或者 $q.when(config);
        },
        'response': function(response) {
        // 响应成功
        return response; // 或者 $q.when(config);
        },
        'requestError': function(rejection) {
        // 请求发生了错误，如果能从错误中恢复，可以返回一个新的请求或promise
        return response; // 或新的promise
        // 或者，可以通过返回一个rejection来阻止下一步
        // return $q.reject(rejection);
        },
        'responseError': function(rejection) {
        // 请求发生了错误，如果能从错误中恢复，可以返回一个新的响应或promise
        return rejection; // 或新的promise
        // 或者，可以通过返回一个rejection来阻止下一步
        // return $q.reject(rejection);
        }
        };
        return interceptor;
    })
    .filter('to_trusted', ['$sce', function ($sce) {
        return function (text) {
            return $sce.trustAsHtml(text);
        };
    }])
})
