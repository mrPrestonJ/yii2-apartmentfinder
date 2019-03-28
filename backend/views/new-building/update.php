<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewBuilding */
/* @var $sections [] */

$this->title = 'Update New Building: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'New Buildings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="new-building-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'sections' => $sections,
        'isCreate' => false,
    ]) ?>

</div>
