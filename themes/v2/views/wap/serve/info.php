<?php 
    $this->pageTitle = '业务详情';
?>
<style type="text/css">
    p img{
        width: 400px !important;
        height: 300px !important;
    }
</style>
<div class="npagePage">
                <div class="content plr10">
                    <div id="newpost">
                        <div class="header">
                            <p class="title"><?=$info->title?></p>
                            <p class="subtitle"><?=date('Y-m-d',$info->updated)?></p>
                        </div>
                        <div class="postbody">
                        <?php if($info->image):?>
                        <img src="<?=ImageTools::fixImage($info->image,400,300)?>" width="400px" height="300px">
                         <br>
                    <?php endif;?>
                       
                        <?=$info->content?>
                        </div>
                    </div>
                    <div id="pages"></div>
                </div>
            </div>