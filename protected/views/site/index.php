<?php
/* @var $this SiteController */
/* @var $part Part */
/* @var $car Car */



$this->pageTitle=Yii::app()->name;
?>

<?php $this->renderPartial('//category/category',
    array(
        'categoryProvider' => $categoryProvider,
    )); ?>


<h1>Поиск</h1>

<?php $this->renderPartial('//filter/_form',
    array(
        'car_list' => $car_list,
        'category_list' => $category_list,
    )); ?>

