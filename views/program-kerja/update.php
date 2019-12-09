<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramKerja */

$this->title = 'Update Program Kerja: ' . $model->ID_PROKER;
$this->params['breadcrumbs'][] = ['label' => 'Program Kerjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_PROKER, 'url' => ['view', 'id' => $model->ID_PROKER]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="program-kerja-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div class="container">
        <h4><b>Update Program Kerja</b></h4>
        <?= $this->render('_form', [
            'errorMessage' => $errorMessage,
            'model' => $model,
            'row' => $row
        ]) ?>
    </div>
</div>
