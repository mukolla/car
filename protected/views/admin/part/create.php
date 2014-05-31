<?php
/* @var $this PartController */
/* @var $model Part */

$this->breadcrumbs=array(
	'Parts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Part', 'url'=>array('index')),
	array('label'=>'Manage Part', 'url'=>array('admin')),
);
?>

<h1>Create Part</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>