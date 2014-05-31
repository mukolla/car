<?php
/* @var $this SearchController */

$this->breadcrumbs=array(
	'Search',
);
?>

<!--<h1><?php /*echo $this->id . '/' . $this->action->id; */?></h1>-->

<h1><?php echo CHtml::encode($category->name); ?></h1>
<ul class="part-list">
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$partProvider,
        'itemView'=>'//site/_part_item',
    )); ?>
</ul>