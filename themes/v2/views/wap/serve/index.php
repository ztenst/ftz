<?php 
    $this->pageTitle = '服务项目';
?>
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