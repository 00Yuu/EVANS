<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LembarPertanggungJawabanKeuangan */

$this->title = $model->ID_LPK;
$this->params['breadcrumbs'][] = ['label' => 'Lembar Pertanggung Jawaban Keuangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lembar-pertanggung-jawaban-keuangan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_LPK], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_LPK], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_LPK',
            'ID_PROPOSAL',
            'ID_RINCI',
            'ID_TENGGAT_WAKTU',
            'NAMA_KEGIATAN',
            'PENYELENGGARA',
            'KEPERLUAN',
            'TANGGAN_BON',
            'TANGGAL_PENYELESAIAN_BON',
            'DANA_UMN',
            'CREATE_DATE',
            'STATUS_DRAFT',
        ],
    ]) ?>

</div>
