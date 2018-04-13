<!doctype html>
<html class="effect">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta name="keywords" content="吊车 汽车吊 搬厂 起重安装 设备租赁"/>
    <meta name="description" content="上海弘钢机械设备有限公司是一家专业从事机械设备租赁、汽车租赁、机电设备安装、建筑安装工程、人力装卸服务及机械设备科技领域的技术开发、技术咨询、技术转让、技术服务的企业。"/>
    <meta name="author" content="UEMO">
    <link type="text/css" href="<?=Yii::app()->theme->baseUrl?>/static/vip/wap/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" href="<?=Yii::app()->theme->baseUrl?>/static/vip/wap/css/bxslider.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl?>/static/vip/wap/css/animate.min.css">
    <link type="text/css" href="<?=Yii::app()->theme->baseUrl?>/static/vip/wap/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl?>/static/vip/wap/css/376m.css">
  <title><?php echo '上海弘钢机械设备-'.$this->pageTitle;?></title>
</head>

<body class="<?=$this->banner?>">
    <div id="sitecontent" class="transform">
        <div id="header">
            <div id="openlc" class="fl btn">
                <div class="lcbody">
                    <div class="lcitem top">
                        <div class="rect top"></div>
                    </div>
                    <div class="lcitem bottom">
                        <div class="rect bottom"></div>
                    </div>
                </div>
            </div>
            <a id="logo" href="<?=$this->createUrl('/')?>"><img src="<?=ImageTools::fixImage(SiteExt::getAttr('qjpz','pcLogo'))?>" /></a>
        </div>
        <div class="scrollView">
            <?=$content?>
            <div id="footer">
                <p class="plr10"><span>COPYRIGHT (©) 2017  上海弘钢机械设备.</span>
                    <a class="beian" href="http://www.miitbeian.gov.cn/" style="display:inline; width:auto; color:#8e8e8e" target="_blank"></a>
                </p>
            </div>
            <div id="bgmask" class="iPage hide">
                <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261416854'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1261416854' type='text/javascript'%3E%3C/script%3E"));</script>
            </div>
        </div>
    </div>
    <div id="leftcontrol">
        <ul id="nav">
            <li>
                <div id="closelc" class="fr btn hide">
                    <div class="lcbody">
                        <div class="lcitem top">
                            <div class="rect top"></div>
                        </div>
                        <div class="lcitem bottom">
                            <div class="rect bottom"></div>
                        </div>
                    </div>
                </div>
            </li>
            <?php $path = trim(Yii::app()->request->getPathInfo(),'/');?>

            
            <li class="navitem"><a class="<?=$path=='home/index/index'?'active':''?>" href="<?=$this->createUrl('/home/index/index')?>" target="_self"><span data-title="首页">首页</span></a></li>
            <li class="navitem"><a class="<?=$path=='home/serve/index'?'active':''?>" href="<?=$this->createUrl('/home/serve/index')?>" target="_self"><span data-title="服务中心">服务中心</span></a></li>
            <li class="navitem"><a class="<?=$path=='home/serve/info'?'active':''?>"  href="<?=$this->createUrl('/home/serve/info')?>" target="_self"><span data-title="业务中心">业务中心</span></a></li>
            <li class="navitem"><a class="<?=$path=='home/product/list'?'active':''?>" href="<?=$this->createUrl('/home/product/list')?>" target="_self"><span data-title="设备中心">设备中心</span></a></li>
            <li class="navitem"><a href="<?=$this->createUrl('/home/index/about')?>" target="_self">集团简介</a></li>
            <li class="navitem"><a href="<?=$this->createUrl('/home/index/contact')?>" target="_self"><span data-title="联系我们">联系我们</span></a></li>
        </ul>
    </div>
    <script type="text/javascript">
    var YYConfig = {};
    </script>
    <script type="text/javascript" src="<?=Yii::app()->theme->baseUrl?>/static/vip/wap/js/zepto.min.js"></script>
    <script type="text/javascript" src="<?=Yii::app()->theme->baseUrl?>/static/vip/wap/js/zepto.bxslider.min.js"></script>
    <script type="text/javascript" src="<?=Yii::app()->theme->baseUrl?>/static/vip/wap/js/wow.min.js"></script>
    <script type="text/javascript" src="<?=Yii::app()->theme->baseUrl?>/static/vip/wap/js/masonry_4.min.js"></script>
    <script type="text/javascript">
    $(function() {
        new WOW({
            scrollContainer: ".scrollView"
        }).init();
    })
    </script>
    <script type="text/javascript" src="<?=Yii::app()->theme->baseUrl?>/static/vip/wap/js/org.min.js" data-main="<?=$this->banner?'baseMain':'indexMain'?>"></script>
    <div class="hide"></div>

<script type="text/javascript">
$(document).ready(function(e) {
    var img = $(".slider_img img")[0];

    function sliderChulaiba() {
        $('#t-slider').bxSlider({
            nextText: '<i class="fa fa-angle-right"></i>',
            prevText: '<i class="fa fa-angle-left"></i>',
            auto: 0,
            infiniteLoop: true,
            hideControlOnEnd: true,
        });
    }
    if (img.complete) sliderChulaiba();
    else $(".slider_img img")[0].onload = function(e) {
        sliderChulaiba();
    };
});
$('.lcbody').click(function(){
        if($('body').attr('class') != 'open')
            $('body').attr('class','open');
        else
            $('body').attr('class','');
    });
</script>
</body>

</html>
