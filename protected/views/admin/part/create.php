<?php
/* @var $this PartController */
/* @var $model Part */

$this->breadcrumbs=array(
	'Запчасти'=>array('admin'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Запчасти', 'url'=>array('admin')),
);
?>

<h1>Добавить запчасть</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>