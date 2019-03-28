<?php

/* @var $this yii\web\View */
/* @var $sections [] */
/* @var $sectionGroupCount integer */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to administrative panel</h1>

        <p class="lead">You can .</p>
    </div>

    <div class="body-content">

        <div class="row">
          <?php
          foreach ($sections as $section): ?>
            <div class="col-lg-<?= $sectionGroupCount ?>">
              <h2><?= $section['title'] ?></h2>

              <p><?= $section['description'] ?></p>

              <p><?= Html::a($section['title'] . ' list', [$section['link']], ['class'=>'btn btn-primary']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>

    </div>
</div>
