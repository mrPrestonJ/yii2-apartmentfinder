<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Apartment;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apartment-form">


    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => 0 ]]); ?>

    <?= $form->field($model, 'city')->dropDownList($model->getCities()) ?>
    <?= $form->field($model, 'roomCount')->dropDownList(Apartment::getRoomType()) ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
