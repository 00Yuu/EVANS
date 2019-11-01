<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EVANSMASTERJENISORGANISASI */

$this->title = 'Update Evansmasterjenisorganisasi: ' . $model->ID_JENIS;
$this->params['breadcrumbs'][] = ['label' => 'Evansmasterjenisorganisasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_JENIS, 'url' => ['view', 'id' => $model->ID_JENIS]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="evansmasterjenisorganisasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
