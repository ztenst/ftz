<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
  <meta name="format-detection" content="telephone=no,email=no,address=no">
  <title>开始游戏</title>
  <script type="text/javascript" src="./js/750rem.js"></script>
  <link rel="stylesheet" type="text/css" href="./style/main.css" media="all" />
</head>
<body>
    <div ui-view="content"></div>
    <div class="footer" ng-show="is_result()"><i class="iconfont"></i>我有家谱出品</div>
    <script type="text/javascript">
        var CONFIG = {
            statePath : '',
            host : 'http://ftz.madridwine.cn'
        };
    </script>
    <script type="text/javascript" src="//res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript" src="./js/require.js" data-main="./js/main.js?t=1"></script>
</body>
</html>
