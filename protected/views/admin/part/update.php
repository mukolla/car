<?php
/* @var $this PartController */
/* @var $model Part */

$this->breadcrumbs=array(
	'Parts'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Part', 'url'=>array('index')),
	array('label'=>'Create Part', 'url'=>array('create')),
	array('label'=>'View Part', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Part', 'url'=>array('admin')),
);
?>

<h1>Update Part <?php echo $model->name; ?></h1>

<?php echo CHtml::link('Copy', array('/admin/part/copy', 'id'=>$model->id)); ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>