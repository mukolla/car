<?php
/* @var $this CarController */
/* @var $model Car */

$this->breadcrumbs=array(
	'Автомобили'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
    array('label'=>'Автомобили', 'url'=>array('admin')),
    //array('label'=>'List Car', 'url'=>array('index')),
    array('label'=>'Добавить автомобиль', 'url'=>array('create')),
    array('label'=>'Просмотреть', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Редактировать автомобиль <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>