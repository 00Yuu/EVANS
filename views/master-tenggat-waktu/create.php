<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterTenggatWaktu */

$this->title = 'Create Master Tenggat Waktu';
$this->params['breadcrumbs'][] = ['label' => 'Master Tenggat Waktus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-tenggat-waktu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
