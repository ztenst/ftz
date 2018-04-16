var PATH_MODULES = CONFIG.baseUrl + 'modules/';
require.config({
    baseUrl : CONFIG.statePath + './js/',
    paths : {
        _ : 'underscore-min',
        jquery : 'jquery-2.2.4.min',
        angular : 'angular.min',
        'angular-ui-router' : 'angular-ui-router.min',
        'html2canvas' : 'html2canvas.min',
        'fanti' : 'modules/fanti/dev',
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

require(['fanti'],function() {
    angular.module('myApp',['fanti','ui.router'])

    .config(function($httpProvider,$stateProvider,$urlRouterProvider,$sceDelegateProvider) {
        // Use x-www-form-urlencoded Content-Type
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
        $httpProvider.useApplyAsync(true);
        $httpProvider.interceptors.push('myInterceptor');
        $urlRouterProvider.deferIntercept();
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
                    templateUrl : 'tpl/start.html',
                    controller : 'start'
                }
            }
        })
        .state('diff',{
            views : {
                'content@' : {
                    templateUrl : 'tpl/diff.html',
                    controller : 'diff'
                }
            }
        })
        .state('run', {
            views : {
                'content@' : {
                    templateUrl : 'tpl/run.html',
                    controller : 'run'
                }
            }
        })
        .state('result',{
            views : {
                'content@' : {
                    templateUrl : 'tpl/result-ok.html',
                    controller : 'result'
                }
            }
        })

   })
    .run(function($rootScope) {
        console.log('helloWorld');
    })
    angular.bootstrap(document,['myApp']);
});
