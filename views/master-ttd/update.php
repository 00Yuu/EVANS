<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterTTD */

$this->title = 'Update Master Ttd: ' . $model->ID_TTD;
$this->params['breadcrumbs'][] = ['label' => 'Master Ttds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_TTD, 'url' => ['view', 'id' => $model->ID_TTD]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-ttd-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
