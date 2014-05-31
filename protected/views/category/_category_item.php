<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 17.05.14
 * Time: 20:32
 */?>

<?php
/* @var $data Category */
?>



<li class="category">
    <?php echo CHtml::link(CHtml::image($data->getImage(120,120)),array('/search/index','id'=>$data->id)); ?>
    <?php echo CHtml::link($data->name,array('/category/index','id'=>$data->id)); ?>

    <div>
        <?php echo CHtml::encode($data->description); ?>
    </div>
</li>