<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 17.05.14
 * Time: 18:31
 */ ?>

<?php $part = $data; ?>

<li class="part">

    <?php echo CHtml::link(CHtml::image($part->getImage(120,120)),array('part/view/','id'=>$part->id)); ?>
    <?php echo CHtml::link($part->name,array('part/view/','id'=>$part->id)); ?>

    <div>
        <?php echo CHtml::encode($part->description); ?>
    </div>

    <ul class="p-car-list">
        <?php foreach ($part->cars as $car) {?>
            <li class="car"><?php echo $car->name; ?></li>
        <?php } ?>
    </ul>
</li>