<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramKerja */

$this->title = 'Update Program Kerja: ' . $model->NAMA_KEGIATAN;
$this->params['breadcrumbs'][] = ['label' => 'Program Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAMA_KEGIATAN, 'url' => ['view', 'id' => $model->ID_PROKER]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="program-kerja-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div class="container">
        <h4><b>Update Program Kerja</b></h4>
        <?= $this->render('_form', [
            'errorMessage' => $errorMessage,
            'model' => $model,
            'row' => $row,
            'status' => $status,
            'statusReview' => $statusReview
        ]) ?>
    </div>
</div>
