define(['angular-ui-router'],function() {
    angular.module('directive',[])
    .directive('sidePosition',function() {
        return {
            scope : {
                'position' : '=data'
            },
            link : function(scope,element,attr) {
                var obj = {
                    x : 0,
                    y : 0,
                    wh : 0,
                    ww : 0,
                    offsetTop : $('.search').height(),
                    index : 0,
                    space : 0,
                    range : [],
                    lastIndex : 0
                }

                obj.wh = $(window).height();
                obj.ww = $(window).width();

                var element_width = element.width();
                var element_height = element.height();

                var off = element.offset();
                var t = off.top;
                //console.log(element_width,element_height);

                //范围，前两个坐标是水平范围，后两个坐标是垂直范围
                obj.range = [obj.ww - element_width, obj.ww, t, element_height + t];
                obj.space = (obj.range[3] - obj.range[2]) / 27;
                console.log(obj.range);

                testBlock();

                function testBlock(){
                    element
                        //.css({'background':'#000'})
                        .on('touchmove',function(e) {
                            var position = scope.position;
                            var _touch = e.originalEvent.targetTouches[0];
                            var _x= _touch.clientX;
                            var _y = _touch.clientY;

                            obj.x = _x;
                            obj.y = _y;

                            var index = findCharIndex();
                            //从1开始吧 方便点 0 这里判断出问题
                            if(index){
                                if(index === obj.lastIndex){
                                    return false;
                                }
                                obj.lastIndex = index;
                                var scrollTop = position[index];
                                //$('#j-choose').text(charCode);
                                $(window).scrollTop(scrollTop);
                            }

                            return false;
                        })
                }

                function findCharIndex(){
                    var x = obj.x;
                    var y = obj.y;
                    var range = obj.range;
                    var space = obj.space;
                    if(x <= range[0] || x >= range[1]) return;
                    if(y <= range[2] || y >= range[3]) return;

                    //console.log(x,y);
                    var index =  Math.ceil((y - range[2]) / space);
                    return index;
                }
            }
        }
    })
    .directive('positionCal',function($timeout) {
        return {
            scope : {
                data : '='
            },
            link : function(scope,element,attr) {
                $timeout(function() {
                    element.find('.xinshi-block').each(function(v) {
                        var self = $(this);
                        var index = self.data('index');
                        var off = self.offset();
                        var t = off.top;
                        scope.data[index] = t;
                    })
                })
            }
        }
    })
});
