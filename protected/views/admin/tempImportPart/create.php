<?php
/* @var $this TempImportPartController */
/* @var $model TempImportPart */

$this->breadcrumbs=array(
    'Запчасти для импорта'=>array('admin'),
	'Добавление',
);

$this->menu=array(
	array('label'=>'Запчасти для импорта', 'url'=>array('admin')),
);
?>

<h1>Добавить запчасть дял импорта</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>