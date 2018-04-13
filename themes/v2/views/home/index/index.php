<div id="indexPage">
    <div id="mslider" class="module">
        <script type="text/javascript">
        $(function() { $("#mslider li video").each(function(index, element) { element.play(); }); })
        </script>
        <ul class="slider" data-options-height="" data-options-auto="0" data-options-mode="0" data-options-pause="4" data-options-ease="ease-out">
            <?php if($imgs = SiteExt::getAttr('qjpz','pcIndexImages')) foreach ($imgs as $key => $value) {?>
                <li style="background-image:url(<?=ImageTools::fixImage($value)?>)" class="active">
                    <div id="tempImage_<?=$key?>"></div><img style="display:none" src="<?=ImageTools::fixImage($value)?>" alt="" />
                    <div class="mask"></div>
                    <a target="_blank">
                        <div>
                            <p class="title ellipsis"></p>
                        </div>
                        <div class="sliderArrow fa fa-angle-down"></div>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div id="mproject" class="module bgShow" style="background-image:url(<?=ImageTools::fixImage(SiteExt::getAttr('qjpz','pcProductImage'))?>);">
        <div class="bgmask"></div>
        <div class="content layoutnone">
            <div class="header wow">
                <p class="title">案例</p>
                <p class="subtitle">Product</p>
            </div>
            <div id="category" class="hide wow">
            <?php if($cates = TagExt::model()->getTagByCate('hjlx')->normal()->findAll()) foreach ($cates as $key => $value) {?>
                <a href="<?=$this->createUrl('/home/product/list',['mid'=>$value->id])?>"><?=$value->name?></a>
            <?php } ?>
            </div>
            <!--yyLayout masonry-->
            <div class="module-content" id="projectlist">
                <div class="projectSubList" id="projectSubList_">
                    <div class="projectSubHeader">
                        <p class="title"></p>
                        <p class="subtitle"></p>
                    </div>
                    <div class="wrapper">
                        <ul class="content_list" data-options-sliders="4" data-options-margin="20" data-options-ease="cubic-bezier(0.5,0.2,0.2,1)" data-options-speed="0.5">
                            <?php if($pros = ArticleExt::model()->normal()->findAll(['condition'=>'cid=67','limit'=>5])) foreach ($pros as $key => $value) {?>
                                <li id="projectitem_<?=$key+1?>" class="projectitem wow">
                                <a href="<?=$this->createUrl('/home/product/info',['id'=>$value->id])?>" class="projectitem_content" target="_blank">
                                    <div class="projectitem_wrapper">
                                        <div class="project_img"><img src="<?=ImageTools::fixImage($value->image)?>" alt="" width="650" height="385" /></div>
                                        <div class="project_info">
                                            <div>
                                                <p class="title"><?=$value->title?></p>
                                                <p class="subtitle"><?=$value->sub_title?></p>
                                                <p class="description hide"><?=$value->desc?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!--wrapper-->
                </div>
                <!--projectSubList-->
                <a href="<?=$this->createUrl('/home/product/list')?>" class="more wow">MORE<i class="fa fa-angle-right"></i></a>
            </div>
            <!--projectlist-->
            <div class="clear"></div>
        </div>
    </div>
    <!--project-->
    <div id="mnews" class="module bgShow" style="background-image:url(<?=ImageTools::fixImage(SiteExt::getAttr('qjpz','pcNewsImage'))?>);">
        <div class="bgmask"></div>
        <div class="content layoutslider">
            <div class="header wow">
                <p class="title">新闻</p>
                <p class="subtitle">News</p>
            </div>
            <div class="module-content" id="newslist">
                <div class="wrapper">
                    <ul class="content_list" data-options-sliders="1" data-options-margin="0" data-options-ease="cubic-bezier(0.5,0.2,0.2,1)" data-options-speed="0.5" data-options-mode="vertical" data-options-wheel="0">
                    <?php if($pros = ArticleExt::model()->normal()->findAll(['condition'=>'cid=70','limit'=>6])) foreach ($pros as $key => $value) {?>
                                <li id="newsitem_<?=$key?>" class="wow newstitem left">
                            <a class="newscontent" target="_blank" href="<?=$this->createUrl('/home/about/newsinfo',['id'=>$value->id])?>">
                                <div class="news_wrapper">
                                    <div class="newsbody">
                                        <p class="date"><span class="md"><?=date('Y',$value->updated)?><span>-</span></span><span class="year"><?=date('m-d',$value->updated)?></span></p>
                                        <p class="title"><?=$value->title?></p>
                                        <div class="separator"></div>
                                        <p class="description"><?=$value->desc?></p>
                                    </div>
                                </div>
                                <div class="newsimg" style="background-image:url(<?=ImageTools::fixImage($value->image)?>)"></div>
                            </a>
                            <a href="<?=$this->createUrl('/home/about/newsinfo',['id'=>$value->id])?>" target="_blank" class="details">more<i class="fa fa-angle-right"></i></a>
                        </li>
                            <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
            <a href="<?=$this->createUrl('/home/about/newslist')?>" class="more wow">MORE<i class="fa fa-angle-right"></i></a>
            <div style="height:0">&nbsp;</div>
        </div>
    </div>
    <div id="mteam" class="module bgShow" style="background-image:url(<?=ImageTools::fixImage(SiteExt::getAttr('qjpz','pcTeamImage'))?>);">
        <div class="bgmask"></div>
        <div class="content layoutslider">
            <div class="header wow">
                <p class="title">团队</p>
                <p class="subtitle">Team</p>
            </div>
            <div class="module-content fw">
                <div class="wrapper">
                    <ul class="content_list" data-options-sliders="3" data-options-margin="20" data-options-ease="cubic-bezier(0.5,0.2,0.2,1)" data-options-speed="0.5">
                    <?php if($pros = ArticleExt::model()->normal()->findAll(['condition'=>'cid=69'])) foreach ($pros as $key => $value) {?>
                                <li id="teamitem_<?=$key?>" class="wow">
                            <div class="header wow" data-wow-delay=".2s"><a href="<?=$this->createUrl('/home/about/teaminfo',['id'=>$value->id])?>"  target="_blank"><img src="<?=ImageTools::fixImage($value->image)?>" alt="" width="180" height="180" /></a></div>
                            <div class="summary wow">
                                <p class="title"><a href="<?=$this->createUrl('/home/about/teaminfo',['id'=>$value->id])?>"><?=$value->title?></a></p>
                                <p class="subtitle"><?=$value->sub_title?></p>
                                <p class="description wow"><?=$value->desc?></p>
                            </div>
                            <a href="<?=$this->createUrl('/home/about/teaminfo',['id'=>$value->id])?>" target="_blank" class="details">more<i class="fa fa-angle-right"></i></a>
                        </li>
                            <?php } ?>
                       
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
            <a href="<?=$this->createUrl('/home/about/teamlist')?>" class="more wow">MORE<i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <div id="mservice" class="module bgShow" style="background-image:url(<?=ImageTools::fixImage(SiteExt::getAttr('qjpz','pcServiceImage'))?>);">
        <div class="bgmask"></div>
        <div class="content layoutslider">
            <div class="header wow fw" data-wow-delay=".1s">
                <p class="title">服务</p>
                <p class="subtitle">Our advantage</p>
            </div>
            <div class="module-content fw" id="servicelist">
                <div class="wrapper">
                    <ul class="content_list" data-options-sliders="1" data-options-margin="10" data-options-ease="1" data-options-speed="0.5">
                    <?php if($pros = ArticleExt::model()->normal()->findAll(['condition'=>'cid=68'])) foreach ($pros as $key => $value) {?>
                              <li id="serviceitem_<?=$key?>" class="serviceitem wow">
                            <a href="<?=$this->createUrl('/home/serve/list')?>" target="_blank">
                                <p class="service_img"><img src="<?=ImageTools::fixImage($value->image)?>" width="320" height="120" alt="" /></p>
                                <div class="service_info">
                                    <p class="title"><?=$value->title?></p>
                                    <p class="description"><?=$value->desc?></p>
                                </div>
                            </a>
                            <a href="<?=$this->createUrl('/home/serve/list')?>" target="_blank" class="details">more<i class="fa fa-angle-right"></i></a>
                        </li>
                            <?php } ?>
                        
                        
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
            <a href="<?=$this->createUrl('/home/serve/list')?>" class="more wow">MORE<i class="fa fa-angle-right"></i></a></div>
    </div>
    <div id="mpartner" class="module bgShow" style="background-image:url(http://resources.jsmo.xin/templates/upload/307/201607/1467820647723.jpg);">
        <div class="bgmask"></div>
        <div class="content layoutslider">
            <div class="header wow fw" data-wow-delay=".1s">
                <p class="title">合作伙伴</p>
                <p class="subtitle">partner</p>
            </div>
            <div class="module-content fw">
                <div class="wrapper">
                    <ul class="content_list" data-options-ease="1" data-options-speed="0.5">
                        <li id="partneritem_0" class="wow">
                       <?php if($pros = ArticleExt::model()->normal()->findAll(['condition'=>'cid=73','limit'=>8])) foreach ($pros as $key => $value) {?>
                              <a href="<?=$value->source?>" title="<?=$value->title?>" target="_blank">
                                <p class="par_img"><img src="<?=ImageTools::fixImage($value->image)?>" width="160" height="80" alt="<?=$value->title?>" /></p>
                                <p class="par_title"><?=$value->title?></p>
                            </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="mcontact" class="module bgShow" style="background-image:url(<?=ImageTools::fixImage(SiteExt::getAttr('qjpz','pcContactImage'))?>);">
        <div class="bgmask"></div>
        <div class="content">
            <div class="header wow fadeInUp fw" data-wow-delay=".1s">
                <p class="title">联系</p>
                <p class="subtitle">Contact</p>
            </div>
            <div id="contactlist" class="fw">
                <div id="contactinfo" class="fl wow" data-wow-delay=".2s">
                    <h3 class="ellipsis name">网站建设文化传播有限公司</h3>
                    <p class="ellipsis add"><span>地点：</span>中国地区XX分区5A写字楼8-88室</p>
                    <p class="ellipsis zip"><span>邮编：</span>100000</p>
                    <p class="ellipsis tel"><span>电话：</span>400-888-8888</p>
                    <p class="ellipsis mobile"><span>手机：</span>188-666-5188</p>
                    <p class="ellipsis email"><span>邮箱：</span>website@qq.com</p>
                    <div><a class="fl" target="_blank" href="http://weibo.com/web"><i class="fa fa-weibo"></i></a><a class="fl" target="_blank" href="tencent://message/?uin=<?=SiteExt::getAttr('qjpz','qq')?>&Site=uemo&Menu=yes"><i class="fa fa-qq"></i></a> <a id="mpbtn" class="fl" href="<?=ImageTools::fixImage(SiteExt::getAttr('qjpz','wxQr'))?>"><i class="fa fa-weixin"></i></a></div>
                </div>
                <div id="contactform" class="fr wow" data-wow-delay=".2s">
                    <form action="" method="post">
                        <p>
                            <input type="text" class="inputtxt name" name="name" placeholder="姓名" autocomplete="off" />
                        </p>
                        <p>
                            <input type="text" class="inputtxt email" name="email" placeholder="邮箱" autocomplete="off" />
                        </p>
                        <p>
                            <input type="text" class="inputtxt tel" name="tel" placeholder="电话" autocomplete="off" />
                        </p>
                        <p>
                            <textarea class="inputtxt cont" name="content" placeholder="内容" autocomplete="off"></textarea>
                        </p>
                        <p>
                            <input class="inputsub" type="submit" value="提交" />
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>