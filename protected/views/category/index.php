<?php
/* @var $this SearchController */

$this->breadcrumbs=array(
	'Search',
);
?>

<?php $this->renderPartial('//category/category',
    array(
        'categoryProvider' => $categoryProvider,
    )); ?>