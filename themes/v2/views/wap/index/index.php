<?php
  $this->pageTitle = '首页';
?>
<div id="indexPage">
    <div id="mslider">
        <ul class="slider" id="t-slider">
            <li>
                <a>
                    <div class="slider_img"><img src="<?=ImageTools::fixImage($images)?>" class="imgcw" /></div>
                    <div class="slider_info">
                        <p class="title ellipsis"></p>
                    </div>
                </a>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
    <div id="mproject" class="module">
        <div class="content">
            <div class="header">
                <p class="title">设备/租赁</p>
                <p class="subtitle">PRODUCTS</p>
            </div>
            <div id="projectlist">
                <!--yyLayout masonry-->
                <div class="module-content" id="projectlist">
                    <div class="projectSubList" id="projectSubList_">
                        <div class="projectSubHeader">
                            <p class="title"></p>
                            <p class="subtitle"></p>
                        </div>
                        <div class="wrapper">
                            <ul class="content_list" data-options-sliders="4" data-options-margin="20" data-options-ease="cubic-bezier(.73,-0.03,.24,1.01)" data-options-speed="0.5">
                            <?php if($wines) foreach ($wines as $key => $value) {?>
                                 <li id="projectitem_<?=$key?>" class="projectitem wow">
                                        <a href="<?=$this->createUrl('/home/product/info',['id'=>$value->id])?>" class="projectitem_content" target="">
                                            <div class="projectitem_wrapper">
                                                <div class="project_img"><img src="<?=ImageTools::fixImage($value->image,200,150)?>" width="200" height="150" /></div>
                                                <div class="project_info">
                                                    <div>
                                                        <p class="title"><?=$value->name?></p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php }?>
                                <div class="clear"></div>
                            </ul>
                        </div>
                        <!--wrapper-->
                    </div>
                    <!--projectSubList-->
                </div>
                <!--projectlist-->
                <div class="clear"></div>
            </div>
            <a id="projectmore" href="<?=$this->createUrl('/home/product/list')?>">MORE</a></div>
    </div>
   
    
    <div id="mnews" class="module">
        <div class="content">
            <div class="header">
                <p class="title">业务服务</p>
                <p class="subtitle">SERVES</p>
            </div>
            <div id="newslist">
            <?php if($teams) foreach ($teams as $key => $value) {?>
            <div class="newstitem plr10 wow fadeIn" data-wow-delay="0.0s">
                    <a class="newsinfo" href="<?=$this->createUrl('/wap/serve/detail',['id'=>$value->id])?>">
                        <div class="newsimage"><img src="<?=ImageTools::fixImage($value['image'],120,80)?>" width="auto" height="auto" /></div>
                        <div style="margin-left: 20px" class="newsdate">
                            <p class="md"><?=$value['title']?></p>
                            <p class="year"></p>
                        </div>
                        <div class="newsbody">
                            <p style="margin-top: 10px" class="title ellipsis"><?=date('Y-m-d',$value['created'])?></p>
                            <p class="description"><?=Tools::u8_title_substr($value['desc'],100)?></p>
                        </div>
                    </a>
                </div>
                <?php }?>
            </div>
            <div class="clear"></div>
            <a href="<?=$this->createUrl('/wap/serve/info')?>" class="more">MORE</a>
            <div style="height:0">&nbsp;</div>
        </div>
    </div>
    <div id="mpage" class="module ">
        <div class="content">
            <div class="plr10">
                <div class="header">
                    <p class="title">关于</p>
                    <p class="subtitle">ABOUT US</p>
                </div>
                <p class="description"><?=ArticleExt::model()->getJs()->find()->desc?></p>
                <br>
            </div>
            <!-- <a href="http://mo004_376.mo4.line1.jsmo.xin/page/5738/" class="more">MORE</a> -->
            <div class="fimg wow fadeIn">
                <img src="" />
            </div>
        </div>
    </div>
    <div id="mcontact" class="module">
        <div class="mcustomize module bgShow bgParallax" style=" background-image:url(http://resources.jsmo.xin/templates/upload/1400/201612/1481793511357.jpg);">
                <div class="bgmask"></div>
                <div class="module_container">
                    <div class="container_content">
                        <div class="contentbody">
                            <div class="wrapper">
                                <div class="description wow">
                                    <p style="text-align: center;"><span style="font-size: 20px;"><br/></span></p>
                                    <p><span style="font-size: 20px;"><br/></span></p>
                                    <p style="text-align: center;"><span style="font-size: 24px; color: rgb(255, 255, 255);">如果你<strong> </strong></span><span style="font-size: 24px; color: rgb(255, 255, 255); text-decoration: none;">想要</span><span style="font-size: 24px; color: rgb(255, 255, 255);">更多的<span style="font-size: 24px; color: rgb(0, 176, 240);">了解</span>，请联系我们 <?=SiteExt::getAttr('qjpz','sitePhone')?></span>
                                    </p>
                                    <p style="text-align: center;"><span style="font-size: 12px; color: rgb(191, 191, 191);">If you want more understanding, please contact us</span>
                                        <br/>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
    </div>
</div>
