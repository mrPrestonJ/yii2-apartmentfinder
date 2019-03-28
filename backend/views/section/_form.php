<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Section */
/* @var $form yii\widgets\ActiveForm */
/* @var $isCreate boolean */
?>

<div class="section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?php if ($isCreate): ?>

        <?= $form->field($model, 'new_building_id')->dropDownList($model->getNewBuildingDropDown()) ?>

    <?php else: ?>

        <?= $form->field($model, 'new_building')->textInput(['value' => $model->newBuilding->name, 'readonly' => true]) ?>

    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
