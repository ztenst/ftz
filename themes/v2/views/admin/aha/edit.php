<?php
$this->pageTitle = 'aha新建/编辑';
$this->breadcrumbs = array('aha管理', $this->pageTitle);
?>
<?php $this->widget('ext.ueditor.UeditorWidget',array('id'=>'ArticleExt_content','options'=>"toolbars:[['fullscreen','source','undo','redo','|','customstyle','paragraph','fontfamily','fontsize'],
        ['bold','italic','underline','fontborder','strikethrough','superscript','subscript','removeformat',
        'formatmatch', 'autotypeset', 'blockquote', 'pasteplain','|',
        'forecolor','backcolor','insertorderedlist','insertunorderedlist','|',
        'rowspacingtop','rowspacingbottom', 'lineheight','|',
        'directionalityltr','directionalityrtl','indent','|'],
        ['justifyleft','justifycenter','justifyright','justifyjustify','|','link','unlink','|',
        'insertimage','emotion','scrawl','insertvideo','music','attachment','map',
        'insertcode','|',
        'horizontal','inserttable','|',
        'print','preview','searchreplace']]")); ?>
<?php $form = $this->beginWidget('HouseForm', array('htmlOptions' => array('class' => 'form-horizontal'))) ?>
<div class="form-group">
    <label class="col-md-2 control-label">名称<span class="required" aria-required="true">*</span></label>
    <div class="col-md-4">
        <?php echo $form->textField($info, 'name', array('class' => 'form-control')); ?>
    </div>
    <div class="col-md-2"><?php echo $form->error($info, 'name') ?></div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">类型</label>
    <div class="col-md-4">
        <?php echo $form->dropDownList($info, 'cid', ['0'=>'111','1'=>'222'], array('class' => 'form-control', 'encode' => false)); ?>
    </div>
    <div class="col-md-2"><?php echo $form->error($info, 'cid') ?></div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">介绍</label>
    <div class="col-md-8">
        <?php echo $form->textArea($info, 'content', array('id'=>'ArticleExt_content')); ?>
    </div>
    <div class="col-md-2"><?php echo $form->error($info, 'content')  ?></div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green">保存</button>
            <?php echo CHtml::link('返回',$this->createUrl('list'), array('class' => 'btn default')) ?>
        </div>
    </div>
</div>

<?php $this->endWidget() ?>
