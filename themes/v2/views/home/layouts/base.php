<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="<?=$this->sitename?>">
    <meta name="description" content="<?=$this->sitename?>">
    <!-- <meta name="author" content="YY-MO"> -->
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl?>/static/home/css/lib.css">
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl?>/static/home/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl?>/static/home/css/111.css">
    <script type="text/javascript" src="<?=Yii::app()->theme->baseUrl?>/static/home/js/jquery-1.11.3.min.js"></script>
    <script>
    $(function() { if (!$("#mindex").length) { $('body').addClass('sscreen') } })
    </script>
    <script type="text/javascript" src="<?=Yii::app()->theme->baseUrl?>/static/home/js/org.min.js" data-main="indexMain"></script>
    <script type="text/javascript" src="<?=Yii::app()->theme->baseUrl?>/static/home/js/form.min.js"></script>
    <title><?=$this->pageTitle?></title>
    <!-- <script>
        if (window.location.origin.indexOf('uemo.net') != -1) {
             document.domain = "uemo.net"; 
        }
        if (window.location.origin.indexOf('jsmo.xin') != -1) {
             document.domain = "jsmo.xin"; 
        }
</script> -->
</head>

<body>
    <div class="bodyMask"> </div>
    <div id="header" class="index_nav">
        <div class="content"><a href="<?=$this->createUrl('/home/index/index')?>" id="logo"><img src="<?=ImageTools::fixImage(SiteExt::getAttr('qjpz','pcLogo'))?>" height="40" /></a>
            <ul id="nav">
            <?php $pathInfo = Yii::app()->request->getPathInfo();?>
                <li class="navitem"><a class="nav-a  <?=!$pathInfo||$pathInfo=='home/index/index'?'active':''?> " href="<?=$this->createUrl('/home/index/index')?>" target="_self"><span  data-title="首页">首页</span></a></li>
                <li class="navitem"><a class="nav-a <?=strstr($pathInfo,'product')?'active':''?>" href="<?=$this->createUrl('/home/product/list')?>" target="_self"><span data-title="案例">案例</span></a></li>
                <li class="navitem"><a class="nav-a <?=strstr($pathInfo,'serve')?'active':''?>" href="<?=$this->createUrl('/home/serve/list')?>" target="_self"><span data-title="服务">服务</span></a></li>
                <li class="navitem"><a class="nav-a <?=strstr($pathInfo,'about')?'active':''?>" href="javascript:;" target=""><span data-title="关于">关于</span><i class="fa fa-angle-down"></i></a>
                    <ul class="subnav">
                        <li><a href="<?=$this->createUrl('/home/about/index')?>" target="_self"><span data-title="关于我们">关于我们</span><i class="fa fa-angle-right"></i></a></li>
                        <li><a href="<?=$this->createUrl('/home/about/teamlist')?>" target="_self"><span data-title="团队">团队</span><i class="fa fa-angle-right"></i></a></li>
                        <li><a href="<?=$this->createUrl('/home/about/newslist')?>" target="_self"><span data-title="新闻">新闻</span><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </li>
                <li class="navitem"><a class="nav-a <?=strstr($pathInfo,'contact')?'active':''?>" href="<?=$this->createUrl('/home/contact/index')?>" target="_self"><span data-title="联系">联系</span></a></li>
            </ul>
            <div class="clear"></div>
        </div>
        <a id="headSHBtn" href="javascript:;"><i class="fa fa-bars"></i></a>
    </div>
    <div id="sitecontent">
    <?=$content?>
    </div>
    <div id="footer">
        <p>COPYRIGHT (©) 2018 <?=$this->sitename?>. <a class="beian" href="http://www.miitbeian.gov.cn/" style="display:inline; width:auto; color:#8e8e8e" target="_blank"> </a></p>
    </div>
    <div id="shares"><a id="sshare"><i class="fa fa-share-alt"></i></a><a href="http://service.weibo.com/share/share.php?appkey=3206975293&" target="_blank" id="sweibo"><i class="fa fa-weibo"></i></a><a href="javascript:;" id="sweixin"><i class="fa fa-weixin"></i></a><a href="javascript:;" id="gotop"><i class="fa fa-angle-up"></i></a></div>
    <div class="fixed" id="fixed_weixin">
        <div class="fixed-container">
            <div id="qrcode"></div>
            <p>扫描二维码分享到微信</p>
        </div>
    </div>
    <div id="online_open"><i class="fa fa-comments-o"></i></div>
    <div id="online_lx">
        <div id="olx_head">在线咨询<i class="fa fa-times fr" id="online_close"></i></div>
        <ul id="olx_qq">
            <li><a href="tencent://message/?uin=<?=SiteExt::getAttr('qjpz','qq')?>&Site=uelike&Menu=yes"><i class="fa fa-qq"></i><?=SiteExt::getAttr('qjpz','qq')?></a></li>
        </ul>
        <div id="olx_tel">
            <div><i class="fa fa-phone"></i>联系电话</div>
            <p><?=SiteExt::getAttr('qjpz','sitePhone')?>
                <br />
            </p>
        </div>
    </div>
    <div class="hide">
        <!-- <script src="http://s11.cnzz.com/stat.php?id=5935831&web_id=5935831" type="text/javascript"></script> -->
        <script id="copyright">
        var footlogo = '<span style="vertical-align: top;display: inline-block;">&nbsp;&nbsp;&nbsp;&nbsp;技术支持</span>';
        // if (window.location.origin.indexOf('uemo.net') != -1 && !$('flogo')[0]) {
            $(footlogo).appendTo('#footer>p');
            $('#assistBtn ._fa-qq').attr('href', 'tel:<?=SiteExt::getAttr("qjpz","sitePhone")?>');
            $('#assistBtn ._fa-qq').attr('href', 'tencent://message/?uin=<?=SiteExt::getAttr("qjpz","qq")?>&Site=uemo&Menu=yes');

            $('#contactinfo .name').text('<?=$this->sitename?>');
            $('#contactinfo .add').text('地址：<?=SiteExt::getAttr("qjpz","addr")?>');
            $('#contactinfo .zip').text('邮编：<?=SiteExt::getAttr("qjpz","yb")?>');
            $('#contactinfo .tel').text('电话：<?=SiteExt::getAttr("qjpz","sitePhone")?>');
            $('#contactinfo .mobile').text('微信公众号：<?=SiteExt::getAttr("qjpz","wx")?>');
            $('#contactinfo .email').text('邮箱：<?=SiteExt::getAttr("qjpz","mail")?>');
            $('#online_lx #olx_qq a').attr('href', 'tencent://message/?uin=<?=SiteExt::getAttr("qjpz","qq")?>&Site=uemo&Menu=yes')
                .text('<?=SiteExt::getAttr("qjpz","qq")?>');
            $('#online_lx #olx_tel p').text('<?=SiteExt::getAttr("qjpz","sitePhone")?>');

            $(add).insertAfter($('#header .content #nav>.navitem:last'));
            $(add).insertAfter($('#navMini .content #nav>.navitem:last'));
            $("#copyright").remove();
        // }
        </script>
    </div>
</body>

</html>