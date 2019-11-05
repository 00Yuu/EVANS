<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramKerja */

$this->title = $model->ID_PROKER;
$this->params['breadcrumbs'][] = ['label' => 'Program Kerjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="program-kerja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_PROKER], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_PROKER], [
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
            'ID_PROKER',
            'ID_RINCI',
            'ID_TENGGAT_WAKTU',
            'BENTUK_PROKER',
            'NAMA_KEGIATAN',
            'TINGKAT_KEGIATAN',
            'DANA',
            'START_DATE',
            'END_DATE',
            'TEMPAT_PELAKSANAAN',
            'JUMLAH_PESERTA',
            'TUJUAN_KEGIATAN',
            'FEEDBACK',
            'STATUS_DRAFT',
        ],
    ]) ?>

</div>
