<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EVANSLAT1 */

$this->title = 'Update Evanslat1: ' . $model->TES1;
$this->params['breadcrumbs'][] = ['label' => 'Evanslat1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TES1, 'url' => ['view', 'id' => $model->TES1]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="evanslat1-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
