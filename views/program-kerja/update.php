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

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
