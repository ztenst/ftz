define(['angular-ui-router'],function() {
    angular.module('controller',[])
    .controller('index',function($scope,$api,$timeout,$state) {
        var page = {
            kw : '',
            tip : false,
            introduce : ''
        };
        $scope.onSubmit = function(e) {
            console.log(e);
            $api.xingSearch({
                kw : page.kw
            }).then(function(obj) {
                return obj.data;
            }).then(function(obj) {
                if(obj.status === 'error'){
                    page.tip = true;
                    $timeout(function() {
                        page.tip = false;
                    },2e3);
                }else{
                    $state.go('detail',{
                        id : obj.data
                    });
                }
            });
            console.log(page.kw);
            e.preventDefault();
        }

        $api.getXingWords().then(function(obj) {
            page.introduce = obj.data.data;
        });

        $scope.page = page;
    })
    .controller('list',function($scope,list,$controller) {
        $controller('index',{
            '$scope' : $scope
        });
        $scope.page.position = {};
        $scope.page.list = list;
    })
    .controller('detail',function(detail,$scope) {
        $scope.page = detail;
    })
    .filter('to_trusted', ['$sce', function ($sce) {
        return function (text) {
            return $sce.trustAsHtml(text);
        };
    }])
});
