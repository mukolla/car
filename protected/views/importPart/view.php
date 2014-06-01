<?php
/* @var $this ImportPartController */
/* @var $model ImportPart */

$this->breadcrumbs=array(
	'Import Parts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Запчасти', 'url'=>array('/admin/part/admin')),
	array('label'=>'Импортированые', 'url'=>array('/admin/tempImportPart/admin')),
/*	array('label'=>'Create ImportPart', 'url'=>array('create')),
	array('label'=>'Update ImportPart', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ImportPart', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ImportPart', 'url'=>array('admin')),*/
);
?>

<h1>View ImportPart #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'file',
		'user_id',
		'date_create',
		'date_update',
	),
)); ?>
