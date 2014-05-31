<?php
/* @var $this SearchController */

$this->breadcrumbs=array(
	'Search',
);
?>

<!--<h1><?php /*echo $this->id . '/' . $this->action->id; */?></h1>-->

<h1>Результаты поиска</h1>
<ul class="part-list">
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$partProvider,
        'itemView'=>'//part/_part_item',
    )); ?>
</ul>