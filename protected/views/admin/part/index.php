<?php
/* @var $this PartController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Запчасти',
);

$this->menu=array(
	array('label'=>'Запчасти', 'url'=>array('admin')),
);
?>

<h1>Запчасти</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
