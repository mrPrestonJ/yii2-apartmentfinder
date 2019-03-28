<?php

/* @var $this yii\web\View */
/* @var $dataProvider BaseDataProvider */

use yii\data\BaseDataProvider;
use yii\grid\GridView;
use yii\widgets\Pjax;
$this->title = 'Find apartments';
?>
<div class="site-index">
    <div class="lead">
        <h1>Hello!</h1>
        <p class="lead">Use form to find best apartments</p>

    </div>
    <div class="body-content">
        <?php Pjax::begin(['id' => 'list']) ?>
        <div class="row">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    'newBuilding',
                    'cityName',
                    'sectionName',
                    'total_area',
                    'cost_total',
                ],
            ]); ?>
            <?php Pjax::end() ?>

        </div>
    </div>
</div>
