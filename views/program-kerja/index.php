<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Program Kerja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-kerja-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Calendar', ['calendar'], ['class' => 'btn btn-success pull-right']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-bordered'],
        'options' => ['style' => 'background-color: white'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'NAMA_KEGIATAN',
                'label' => 'Nama Program Kerja'
            ],
            [
                'attribute' => 'BENTUK_PROKER',
                'label' => 'Bentuk Program Kerja'
            ],
            [
                'attribute' => 'TINGKAT_KEGIATAN',
                'label' => 'Tingkat Kegiatan'
            ],
            [
                'attribute' => 'DANA',
                'label' => 'Dana'
            ],
            [
                'attribute' => 'START_DATE',
                'label' => 'Start Date'
            ],
            [
                'attribute' => 'TEMPAT_PELAKSANAAN',
                'label' => 'Tempat Pelaksanaan'
            ],
            [
                'attribute' => 'JUMLAH_PESERTA',
                'label' => 'Jumlah Peserta'
            ],
            [
                
                'label' => 'Status Proker'
            ],
            [
                'header' => 'Action',
                'content' => function($model) {
                    return Html::a('Detail', ['update', 'id' => $model->ID_PROKER]);
                }  
],

        ],
    ]); 
    ?>
</div>
