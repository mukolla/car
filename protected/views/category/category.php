<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 31.05.14
 * Time: 20:48
 */ ?>

<h1>Категории</h1>
<ul class="category-list">
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$categoryProvider,
        'itemView'=>'//category/_category_item',
    )); ?>
</ul>