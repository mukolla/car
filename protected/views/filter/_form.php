<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 26.05.14
 * Time: 23:22
 */ ?>

<?php
/* @var $this CarController */
/* @var $model Car */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'car-form',
        'action' => '/search/filter',
        'method' => 'get',
        'enableAjaxValidation'=>false,
    )); ?>

    <?php /*echo $form->errorSummary($model); */?>

    <div class="row">
        <?php echo CHtml::label('Название', 'name'); ?>
        <?php echo CHtml::textField('part_name'); ?>
    </div>

    <div class="row" style="float: left; width: 200px; margin-right: 20px;">
        <style>
            #car_list input{
                float: left;
                margin-right: 5px;
            }
        </style>
        <?php echo CHtml::checkBoxList('car_list', '',CHtml::listData($car_list,'id', 'name')); ?>
    </div>


    <div class="row" style="overflow: hidden;">
        <style>
            #category_list input{
                float: left;
                margin-right: 5px;
            }
        </style>
        <?php echo CHtml::checkBoxList('category_list', '',CHtml::listData($category_list,'id', 'name')); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Поиск'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->