<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterAlur */

$this->title = 'Update Master Alur: ' . $model->ID_ALUR;
$this->params['breadcrumbs'][] = ['label' => 'Master Alurs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ALUR, 'url' => ['view', 'id' => $model->ID_ALUR]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-alur-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
