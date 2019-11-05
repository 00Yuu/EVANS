<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Program Kerjas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-kerja-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Program Kerja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_PROKER',
            'ID_RINCI',
            'ID_TENGGAT_WAKTU',
            'BENTUK_PROKER',
            'NAMA_KEGIATAN',
            //'TINGKAT_KEGIATAN',
            //'DANA',
            //'START_DATE',
            //'END_DATE',
            //'TEMPAT_PELAKSANAAN',
            //'JUMLAH_PESERTA',
            //'TUJUAN_KEGIATAN',
            //'FEEDBACK',
            //'STATUS_DRAFT',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
