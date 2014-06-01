<?php
/* @var $this ImportPartController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Import Parts',
);

$this->menu=array(
	array('label'=>'Create ImportPart', 'url'=>array('create')),
	array('label'=>'Manage ImportPart', 'url'=>array('admin')),
);
?>

<h1>Import Parts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
