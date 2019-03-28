<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use  \wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\NewBuilding */
/* @var $form yii\widgets\ActiveForm */
/* @var $isCreate boolean */
/* @var $sections app\models\Section[] */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Section: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Section: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>

<div class="new-building-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php if ($isCreate): ?>

        <?= $form->field($model, 'city_id')->dropDownList($model->getCitiesDropDown()) ?>

    <?php else: ?>

        <?= $form->field($model, 'city')->textInput(['value' => $model->city->name, 'readonly' => true]) ?>

    <?php endif; ?>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be added (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $sections[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'name',
            'address',
        ],
    ]); ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-envelope"></i> Sections
      <button type="button" class="pull-right add-item btn btn-success btn-xs">+</button>
      <div class="clearfix"></div>
    </div>
    <div class="panel-body container-items"><!-- widgetContainer -->
        <?php foreach ($sections as $index => $modelAddress): ?>
          <div class="item panel panel-default"><!-- widgetBody -->
            <div class="panel-heading">
              <span class="panel-title-address">Section: <?= ($index + 1) ?></span>
              <button type="button" class="pull-right remove-item btn btn-danger btn-xs">-</button>
              <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <?php
                // necessary for update action.
                if (!$modelAddress->isNewRecord) {
                    echo Html::activeHiddenInput($modelAddress, "[{$index}]id");
                }
                ?>
                <?= $form->field($modelAddress, "[{$index}]name")->textInput(['maxlength' => true]) ?>
                <?= $form->field($modelAddress, "[{$index}]address")->textInput(['maxlength' => true]) ?>


            </div>
          </div>
        <?php endforeach; ?>
    </div>
  </div>

    <?php DynamicFormWidget::end(); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
