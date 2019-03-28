<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewBuilding */
/* @var $sections [] */

$this->title = 'Create New Building';
$this->params['breadcrumbs'][] = ['label' => 'New Buildings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-building-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'sections' => $sections,
        'isCreate' => true,
    ]) ?>

</div>
