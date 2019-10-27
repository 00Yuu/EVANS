<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterTenggatWaktu */

$this->title = 'Update Master Tenggat Waktu: ' . $model->ID_TENGGAT_WAKTU;
$this->params['breadcrumbs'][] = ['label' => 'Master Tenggat Waktus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_TENGGAT_WAKTU, 'url' => ['view', 'id' => $model->ID_TENGGAT_WAKTU]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-tenggat-waktu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
