<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'LPK';
$this->params['breadcrumbs'][] = 'Monitoring LPK';
?>
<div class="lembar-pertanggung-jawaban-keuangan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-bordered'],
        'options' => ['style' => 'background-color: white'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                // 'attribute' => 'NAMA_KEGIATAN',
                'label' => 'Nama Kegiatan'
            ],
            [
                // 'attribute' => 'BENTUK_PROKER',
                'label' => 'Penyelenggara'
            ],
            [
                // 'attribute' => 'TINGKAT_KEGIATAN',
                'label' => 'Keperluan'
            ],
            [
                // 'attribute' => 'DANA',
                'label' => 'Tangal BS'
            ],
            [
                // 'attribute' => 'START_DATE',
                'label' => 'Tanggal Penyelesaian'
            ],
            [
                // 'attribute' => 'TEMPAT_PELAKSANAAN',
                'label' => 'Total'
            ],
            [
                // 'attribute' => 'JUMLAH_PESERTA',
                'label' => 'Status LPK'
            ],
            [
                'header' => 'Action',
                'content' => function($model) {
                    return Html::a('Detail', ['update', 'id' => $model->ID_LPK]);
                }  
],

        ],
    ]); 
    ?>


</div>
