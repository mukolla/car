<?php
/* @var $this TempImportPartController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Запчасти для импорта',
);

$this->menu=array(
	array('label'=>'Create TempImportPart', 'url'=>array('create')),
	array('label'=>'Manage TempImportPart', 'url'=>array('admin')),
);
?>

<h1>Temp Import Parts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
