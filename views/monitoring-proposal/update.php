<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Proposal */

$this->title = 'Update Proposal: ' . $model->ID_PROPOSAL;
$this->params['breadcrumbs'][] = ['label' => 'Proposals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_PROPOSAL, 'url' => ['view', 'id' => $model->ID_PROPOSAL]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proposal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
