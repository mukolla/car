<?php
/* @var $this TempImportPartController */
/* @var $model TempImportPart */

$this->breadcrumbs=array(
	'Запчасти для импорта'=>array('admin'),
	'Manage',
);

$this->menu=array(
    array('label'=>'Запчасти', 'url'=>array('/admin/part/admin')),
    array('label'=>'Начать импорт', 'url'=>array('#'), 'itemOptions' => array( 'id' => 'startImport' )),
	//array('label'=>'List TempImportPart', 'url'=>array('index')),
	//array('label'=>'Create TempImportPart', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#temp-import-part-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Импортированные запчасти</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'temp-import-part-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'selectableRows'=>2,
	'columns'=>array(
        array(
          'name' =>'id',
          'value' => '($data->id)',
          'class'=>'CCheckBoxColumn',
        ),
        'id',
		array(
            'name' => 'category_id',
            'type' => 'html',
            'value' => '($data->categoryName)',
            'filter' => CHtml::listData(Category::getCategoryList(), 'id', 'name'),
        ),
		'name',
		'description',
		'text',
		'image',
		/*
		'price',
		'is_active',
		'is_deleted',
		'car_list',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<script>
    $(document).ready(function(){
        $('#startImport a').on('click', function(){

            if(confirm('Начать импорт?')){
                var ids = $.fn.yiiGridView.getSelection('temp-import-part-grid');
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "<?php echo Yii::app()->createUrl('admin/part/import') ?>",
                    data: {
                        part_list: ids
                    },
                    success: function(data){

                        console.log(data);

                    }
                });

            }

            return false;
        });
    });
</script>
