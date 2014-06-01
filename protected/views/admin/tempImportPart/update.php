<?php
/* @var $this TempImportPartController */
/* @var $model TempImportPart */

$this->breadcrumbs=array(
    'Запчасти для импорта'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
    array('label'=>'Запчасти', 'url'=>array('/admin/part/admin')),
    array('label'=>'Запчасти для импорта', 'url'=>array('admin')),
    array('label'=>'Добавить', 'url'=>array('create')),
    array('label'=>'Просмотреть', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Редактировать запчасть для импорта: <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>