<?php
/* @var $this ImportPartController */
/* @var $model ImportPart */

$this->breadcrumbs=array(
	'Импорт запчастей'=>array('index'),
	'Импорт',
);

/*$this->menu=array(
	array('label'=>'List ImportPart', 'url'=>array('index')),
	array('label'=>'Manage ImportPart', 'url'=>array('admin')),
);*/
?>

<h1>Импорт запчастей</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>