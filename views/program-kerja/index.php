<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$session = Yii::$app->session;

$this->title = 'Program Kerja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-kerja-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row" style="margin-bottom: 1%">
        <div class="col-sm-6">
            <div class="text-left">
                <?php
                    if($session->get('jabatan') === 'ADMIN' || $session->get('jabatan') === 'MAHASISWA'){
                        echo Html::a('Create', ['create'], ['class' => 'btn btn-primary']);
                    }
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="text-right">
                <?php
                    if($session->get('jabatan') === 'ADMIN' || $session->get('jabatan') === 'STUDEV'){
                        echo Html::a('Calendar', ['calendar'], ['class' => 'btn btn-success', 'style' => 'float-left: 100px']);
                    }
                ?>
            </div>
        </div>
    </div>


    <?php
        if($session->get('jabatan') === 'ADMIN' || $session->get('jabatan') === 'MAHASISWA'){
            echo GridView::widget([
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
                        'attribute' => 'END_DATE',
                        'label' => 'END Date'
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
                        'label' => 'Status Proker',
                        'value' => function ($model){
                            return $model->showStatus($model->STATUS_DRAFT,$model->ID_PROKER);
                        }
                    ],
                    [
                        'header' => 'Action',
                        'content' => function($model) {
                            return Html::a('Detail', ['update', 'id' => $model->ID_PROKER]);
                        }  
                    ],

                ],
            ]); 
        }
        elseif($session->get('jabatan') === 'STUDEV'){
                echo GridView::widget([
                    'dataProvider' => $dataProviderS,
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
                            'attribute' => 'END_DATE',
                            'label' => 'END Date'
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
                            'label' => 'Status Proker',
                            'value' => function ($model){
                                return $model->showStatus($model->STATUS_DRAFT, $model->ID_PROKER);
                            }
                        ],
                        [
                            'header' => 'Action',
                            'content' => function($model) {
                                return Html::a('Detail', ['update', 'id' => $model->ID_PROKER]);
                            }  
                        ],
    
                    ],
                ]); 
            }
    ?>
</div>
