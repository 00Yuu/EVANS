<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterPeriode */

$this->title = 'Update Master Periode: ' . $model->ID_PERIODE;
$this->params['breadcrumbs'][] = ['label' => 'Master Periodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_PERIODE, 'url' => ['view', 'id' => $model->ID_PERIODE]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-periode-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
