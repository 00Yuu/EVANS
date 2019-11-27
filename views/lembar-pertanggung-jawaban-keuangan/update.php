<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LembarPertanggungJawabanKeuangan */

$this->title = 'Update Lembar Pertanggung Jawaban Keuangan: ' . $model->ID_LPK;
$this->params['breadcrumbs'][] = ['label' => 'Lembar Pertanggung Jawaban Keuangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_LPK, 'url' => ['view', 'id' => $model->ID_LPK]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lembar-pertanggung-jawaban-keuangan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
