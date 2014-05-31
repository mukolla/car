<?php
/**
 *
 * @var CategoryController $this
 * @var \CActiveDataProvider $partProvider
 */
?>

<h1><?php echo CHtml::encode($category->name); ?></h1>
<ul class="part-list">
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$partProvider,
        'itemView'=>'//part/_part_item',
    )); ?>
</ul>