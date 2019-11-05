<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterDaftarOrganisasi */

$this->title = 'Update Master Daftar Organisasi: ' . $model->ID_ORGANISASI;
$this->params['breadcrumbs'][] = ['label' => 'Master Daftar Organisasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ORGANISASI, 'url' => ['view', 'id' => $model->ID_ORGANISASI]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-daftar-organisasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
