<?php
/* @var $this PartController */
/* @var $model Part */

$this->breadcrumbs=array(
	'Запчасти'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
    array('label'=>'Запчасти', 'url'=>array('admin')),
    array('label'=>'Добавить', 'url'=>array('create')),
    array('label'=>'Просмотреть', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Редактировать запчасть: <?php echo $model->name; ?></h1>

<?php echo CHtml::link('Copy', array('/admin/part/copy', 'id'=>$model->id)); ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>