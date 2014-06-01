<?php
/* @var $this ImportPartController */
/* @var $model ImportPart */

$this->breadcrumbs=array(
	'Import Parts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Temp Part', 'url'=>array('admin/tempImportPart/admin')),
	array('label'=>'List ImportPart', 'url'=>array('index')),
	array('label'=>'Create ImportPart', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#import-part-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Список импортов запчастей</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'import-part-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		'file',
		'user_id',
		'date_create',
		/*
		'date_update',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
