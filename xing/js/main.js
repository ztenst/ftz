require.config({
    baseUrl : CONFIG.statePath + './js/',
    paths : {
        _ : 'underscore-min',
        jquery : 'jquery-2.2.4.min',
        angular : 'angular.min',
        'angular-ui-router' : 'angular-ui-router.min',
        'angular-cookies' : 'angular-cookies.min'
    },
    shim : {
        'angular' : {
            'deps' : ['jquery']
        },
        'angular-ui-router' : {
            'deps' : ['angular-cookies','jquery']
        },
        'angular-cookies' : {
            'deps' : ['angular']
        }
    }
});

require(['angular-ui-router','controller','factory','directive'],function() {
    angular.module('myApp',['ui.router','controller','factory','directive'])

    .config(function($httpProvider,$stateProvider,$urlRouterProvider,$sceDelegateProvider) {
        // Use x-www-form-urlencoded Content-Type
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
        $httpProvider.useApplyAsync(true);
        $httpProvider.interceptors.push('myInterceptor');
        //$httpProvider.interceptors.push();
        //$urlRouterProvider.deferIntercept();
        /**
        * The workhorse; converts an object to x-www-form-urlencoded serialization.
        * @param {Object} obj
        * @return {String}
        */ 
        var param = function(obj) {
            var query = '', name, value, fullSubName, subName, subValue, innerObj, i;
              
            for(name in obj) {
              value = obj[name];
                
              if(value instanceof Array) {
                for(i=0; i<value.length; ++i) {
                  subValue = value[i];
                  fullSubName = name + '[' + i + ']';
                  innerObj = {};
                  innerObj[fullSubName] = subValue;
                  query += param(innerObj) + '&';
                }
              }
              else if(value instanceof Object) {
                for(subName in value) {
                  subValue = value[subName];
                  fullSubName = name + '[' + subName + ']';
                  innerObj = {};
                  innerObj[fullSubName] = subValue;
                  query += param(innerObj) + '&';
                }
              }
              else if(value !== undefined && value !== null)
                query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
            }
              
            return query.length ? query.substr(0, query.length - 1) : query;
        };

        // Override $http service's default transformRequest
        $httpProvider.defaults.transformRequest = [function(data) {
            return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
        }];
        $urlRouterProvider.otherwise('/');

        $sceDelegateProvider.resourceUrlWhitelist(['*']);
        $stateProvider.state('index',{
            url : '/',
            views : {
                'content@' : {
                    templateUrl : 'tpl/index.html',
                    controller : 'index'
                }
            }
        })
        .state('list',{
            url : '/list',
            views : {
                'content@' : {
                    templateUrl : 'tpl/list.html',
                    controller : 'list'
                }
            },
            resolve : {
                'list' : function($api) {
                    return $api.xingList().then(function(obj) {
                        return obj.data.data;
                    })
                }
            }
        })
        .state('detail',{
            url : '/detail?id',
            views : {
                'content@' : {
                    templateUrl : 'tpl/detail.html',
                    controller : 'detail'
                }
            },
            resolve : {
                'detail' : function($stateParams,$api) {
                    var id = $stateParams.id;
                    return $api.xingInfo({
                        id : id
                    }).then(function(obj) {
                        return obj.data.data;
                    })
                }
            }
        })
   })
    .run(function($rootScope,$api) {
        console.log('helloWorld');
        $api.xingList().then(function(obj) {
            console.log(obj);
        });
    })
    angular.bootstrap(document,['myApp']);
});
