<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">

        <?php if($this->id != 'admin/admin') {?>
            <?php $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Админ',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items'=>array(array(
                    'label' => 'Админ',
                    'url' => array('/admin'),
                ),),
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget(); ?>
        <?php }?>
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Управление',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>