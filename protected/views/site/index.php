<?php
/* @var $this SiteController */
/* @var $part Part */
/* @var $car Car */



$this->pageTitle=Yii::app()->name;
?>

<h1>Поиск</h1>

<?php $this->renderPartial('//filter/_form',
    array(
        'car_list' => $car_list,
        'category_list' => $category_list,
    )); ?>

<h1>Категории</h1>
<ul class="category-list">
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$categoryProvider,
        'itemView'=>'_category_item',
    )); ?>
</ul>

<h1>Запчасти</h1>
<ul class="part-list">
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$partProvider,
        'itemView'=>'_part_item',
    )); ?>
</ul>