<?php
  $this->pageTitle = '业务列表';
?>
<div class="npagePage">
        <div id="newslist">
            <?php if($infos) foreach ($infos as $key => $value) {?>
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
                    <?php } ?>
        </div>
        <div class="clear"></div>
        <?php $this->widget('WapLinkPager',['pages'=>$pager])?>
    </div>
</div>