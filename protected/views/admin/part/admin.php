<?php
/* @var $this PartController */
/* @var $model Part */

$this->breadcrumbs=array(
	'Запчасти'=>array('admin'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Добавить', 'url'=>array('create')),
    array('label'=>'Ипорт', 'url'=>array('/importPart/create')),
    array('label'=>'Импортированные', 'url'=>array('admin/tempImportPart/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#part-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление запчастями</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'part-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'category_id',
		'name',
		'description',
		'text',
		'image',
		/*
		'price',
		'is_active',
		'is_deleted',
		*/
		array(
			'class'=>'CButtonColumn',
        'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
		),
	),
)); ?>
