<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterTenggatWaktu */

$this->title = 'Create Master Tenggat Waktu';
$this->params['breadcrumbs'][] = ['label' => 'Master Tenggat Waktus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-tenggat-waktu-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div class="container" style="margin-left: 10%">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-4">

                <h4 style="margin: 10% 5% 5% 5%"><b>Create Alur<b></h4>
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</div>
