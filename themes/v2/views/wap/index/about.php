<?php 
    $this->pageTitle = '集团介绍';
?>
<div class="npagePage">
                <div class="content plr10">
                    <div id="newpost">
                        <div class="header">
                            <p class="title"><?=$info->title?></p>
                            <p class="subtitle"><?=$info->author.' '.date('Y-m-d',$info->updated)?></p>
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