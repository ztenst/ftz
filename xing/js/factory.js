define(['angular-ui-router'],function() {
    angular.module('factory',[])
    .factory('$api',function($http) {
        return {
            'xingList' : function() {
                var url = '/api/index/xingList';
                return $http.get(url,{
                    'cache' : true
                });
            },
            'xingInfo' : function(data) {
                var url = '/api/index/xingInfo';
                return $http.get(url,{
                    'params' : data,
                    'cache' : true
                })
            },
            'xingSearch' : function(data) {
                var url = '/api/index/xingSearch';
                return $http.get(url,{
                    'params' : data,
                    'cache' : true
                });
            }
        };
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
});
