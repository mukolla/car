<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Категории'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Категории', 'url'=>array('admin')),
);
?>

<h1>Добавить категорию</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>