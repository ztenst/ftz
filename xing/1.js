
jQuery(document).ready(function($) {
    var obj = {
        x : 0,
        y : 0,
        wh : 0,
        ww : 0,
        offsetTop : 100,
        offsetBottom : 100,
        index : 0,
        space : 0,
        range : [],
        lastIndex : 0
    }

    obj.wh = $(window).height();
    obj.ww = $(window).width();

    //范围，前两个坐标是水平范围，后两个坐标是垂直范围
    obj.range = [3/4 * obj.ww, obj.ww, 100, obj.wh - 100 ];
    obj.space = (obj.range[3] - obj.range[2]) / 26;
    console.log(obj.range);

    testBlock();

    function testBlock(){
        $('<div/>').width(obj.range[1] - obj.range[0])
            .height(obj.range[3]-obj.range[2])
            .css({'background':'#000'})
            .css({
                'position' : 'fixed',
                'right' : 0,
                'top' : 100
            })
            .appendTo('body')
            .on('touchmove',function(e) {
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
                    var charCode  = String.fromCharCode(64 + index);
                    $('#j-choose').text(charCode);
                    $(window).scrollTop(10 * index);
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
    
    //判定在1/4右侧就发生滚动，大于offsetTop，offsetBottom 中间部分平均分成26份
    //$(document).on('touchmove',function(e) {
        //var _touch = e.originalEvent.targetTouches[0];
        //console.log(_touch);
        //var _x= _touch.clientX;
        //var _y = _touch.clientY;
        //console.log(_x,_y);
    //})
});

