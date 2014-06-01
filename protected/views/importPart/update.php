<?php
/* @var $this ImportPartController */
/* @var $model ImportPart */

$this->breadcrumbs=array(
	'Import Parts'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ImportPart', 'url'=>array('index')),
	array('label'=>'Create ImportPart', 'url'=>array('create')),
	array('label'=>'View ImportPart', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ImportPart', 'url'=>array('admin')),
);
?>

<h1>Update ImportPart <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>