<?php
/* @var $this ImportPartController */
/* @var $model ImportPart */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'import-part-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data',
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div>
        <p class="note"> Для импорта необходим  CSV файл с таким полями. Образец <?php echo CHtml::link('part_list.csv', '/upload/part_list.csv') ?> </p>
        <pre>
             id             - пустое поле, НЕ ЗАПОЛНЯТЬ!
             category_id    - ИД категории
             name           - имя запчасти
             description    - описание запчасти
             text           - дополнительный текст к запчасти
             image          - путь к изображению
             price          - цена
             is_active      - признак активности  - 1
             is_deleted     - признак удаленности - 0
             car_list       - список ИД автомобилей, через запятую ","
        </pre>
    </div>



    <p class="note">Выбирете файл для ипорта</p>
	<div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file'); ?>
		<?php echo $form->error($model,'file'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name'); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textField($model,'description'); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->