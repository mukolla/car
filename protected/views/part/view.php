<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 17.05.14
 * Time: 18:48
 */ ?>
<?php
    /* @var $model Part */
?>

<div id="part">
    <h1><?php echo CHtml::encode($model->name); ?></h1>
    <div class="part-info">
        <?php echo CHtml::image($model->getImage(250,250))  ?>
        <h3><?php echo CHtml::encode($model->description); ?></h3>
        <p><?php echo CHtml::encode($model->text); ?></p>

        <p class="p-price">Цена: 200 грн</p>

        <ul class="p-car-list">
            <?php foreach ($model->cars as $car) {?>
                <li class="car"><?php echo $car->name; ?></li>
            <?php } ?>
        </ul>
        <p>Есть в наличии</p>
    </div>
</div>
