<?php

use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use \common\models\Apartment;

/* @var $this yii\web\View */
/* @var $model app\models\Apartment */
/* @var $form yii\widgets\ActiveForm */
$js = '
jQuery("#new_building_id").change();
var section = jQuery(".field-section-name");
var sectionId = jQuery("#apartment-section_id");
var sectionName = jQuery("#section-name");
var isTypical = jQuery("#apartment-is_typical");

if (isTypical.val() == 1) {
  section.hide();
}

isTypical.on("change", function() {
console.log((isTypical.val()))
  if( isTypical.val() == 1) {
    section.hide();
    sectionId.val(null);
  } else {
    section.show();
    sectionId.val(sectionName.val());
  }
});

sectionName.on("change", function() {
  sectionId.val(sectionName.val());
});

jQuery( document ).ready(function() {
    var totalArea = jQuery("#apartment-total_area");
    var costPerMeter = jQuery("#apartment-cost_per_meter");
    var costTotal = jQuery("#apartment-cost_total");
    
    totalArea.on("change", function() {
     if(costPerMeter.val()) { 
        costTotal.val(costPerMeter.val() * totalArea.val())
     }
    });
    
    costPerMeter.on("change", function() {
      if(totalArea.val()) {
        costTotal.val(costPerMeter.val() * totalArea.val())
      }
    });
    
    costTotal.on("change", function() {
      if(totalArea.val()) {
        costPerMeter.val(costTotal.val() / totalArea.val())
      }
    });
});
';


?>

<div class="apartment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'new_building_id')->dropDownList($model->getNewBuildingDropDown(), ['id'=>'new_building_id']) ?>
    <?= $form->field($model, 'section_id')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'section')->widget(DepDrop::classname(), [
        'options' => ['id'=>'section-name'],
        'pluginOptions'=>[
            'depends'=>['new_building_id'],
            'url' => Url::to(['/section/list'])
        ]
    ]); ?>
    <?= $form->field($model, 'is_typical')->dropDownList([
        '1' => 'Yes',
        '0' => 'No'
    ]) ?>

    <?= $form->field($model, 'room_count')->dropDownList(
        Apartment::getRoomType()) ?>

    <?= $form->field($model, 'total_area')->textInput([
        'type' => 'number',
        'step' => 'any'
    ]) ?>

    <?= $form->field($model, 'cost_per_meter')->textInput([
        'type' => 'number',
        'step' => 'any'
    ]) ?>

    <?= $form->field($model, 'cost_total')->textInput([
        'type' => 'number',
        'step' => 'any'
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerJs($js); ?>
