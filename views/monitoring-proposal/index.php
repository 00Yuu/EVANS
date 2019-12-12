<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proposals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proposal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Proposal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    

    <!-- Ini Monitoring Himpunan -->
    <?php $tab_himpunan =  GridView::widget([
        'dataProvider' => $dataProvider_himpunan,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-bordered'],
        'options' => ['style' => 'background-color: white'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'programKerja.NAMA_KEGIATAN',
                'label' => 'Nama Proposal'
            ],
            [
                'attribute' => 'masterRinciOrganisasi.masterPeriode.PERIODE',
                'label' => 'Periode'
            ],
            [
                'label' => 'Ketua Himpunan',
                'value' => function($model){
                    return $model->getStatusKetuaHimpunan($model->ID_PROPOSAL);                    
                }
            ],
            [
                'label' => 'BEM',
                'value' => function($model){
                    return $model->getStatusBem($model->ID_PROPOSAL);                    
                }
            ],
            [
                'label' => 'Kaprodi',
                'value' => function($model){
                    return $model->getStatusKaprodi($model->ID_PROPOSAL);                    
                }
            ],
            [
                'label' => 'Studev',
                'value' => function($model){
                    return $model->getStatusStudev($model->ID_PROPOSAL);                    
                }
            ],
            [
                'label' => 'SA Manager',
                'value' => function($model){
                    return $model->getStatusSAManager($model->ID_PROPOSAL);                    
                }
            ],
            [
                'label' => 'Wakil Rektor 3',
                'value' => function($model){
                    return $model->getStatusWarek3($model->ID_PROPOSAL);                    
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'header' => 'Detail',
                'buttons' => [
                    'view' => function($url, $model, $key){
                        return Html::a('Detail',['monitoring-proposal/update','id' => $model->ID_PROPOSAL], ['alt' => 'detail']);
                    }
                ]
            ],
        ],
    ]); 
    ?>

    <!-- Ini Monitoring KPU -->
    <?php $tab_kpu =  GridView::widget([
        'dataProvider' => $dataProvider_kpu,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-bordered'],
        'options' => ['style' => 'background-color: white'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'programKerja.NAMA_KEGIATAN',
                'label' => 'Nama Proposal'
            ],
            [
                'attribute' => 'masterRinciOrganisasi.masterPeriode.PERIODE',
                'label' => 'Periode'
            ],
            [
                'label' => 'DKBM',
                'value' => function($model){
                    return $model->getDKBM($model->ID_PROPOSAL);                    
                }
            ],
            [
                'label' => 'Studev',
                'value' => function($model){
                    return $model->getStatusStudev($model->ID_PROPOSAL);                    
                }
            ],
            [
                'label' => 'SA Manager',
                'value' => function($model){
                    return $model->getStatusSAManager($model->ID_PROPOSAL);                    
                }
            ],
            [
                'label' => 'Wakil Rektor 3',
                'value' => function($model){
                    return $model->getStatusWarek3($model->ID_PROPOSAL);                    
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'header' => 'Detail',
                'buttons' => [
                    'view' => function($url, $model, $key){
                        return Html::a('Detail',['monitoring-proposal/update','id' => $model->ID_PROPOSAL], ['alt' => 'detail']);
                    }
                ]
            ],
        ],
    ]); 
    ?>

    <!-- Ini Monitoring UKM -->
    <?php $tab_ukm =  GridView::widget([
        'dataProvider' => $dataProvider_ukm,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-bordered'],
        'options' => ['style' => 'background-color: white'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'programKerja.NAMA_KEGIATAN',
                'label' => 'Nama Proposal'
            ],
            [
                'attribute' => 'masterRinciOrganisasi.masterPeriode.PERIODE',
                'label' => 'Periode'
            ],
            [
                'label' => 'BEM',
                'value' => function($model){
                    return $model->getStatusBem($model->ID_PROPOSAL);                    
                }
            ],
            [
                'label' => 'Studev',
                'value' => function($model){
                    return $model->getStatusStudev($model->ID_PROPOSAL);                    
                }
            ],
            [
                'label' => 'SA Manager',
                'value' => function($model){
                    return $model->getStatusSAManager($model->ID_PROPOSAL);                    
                }
            ],
            [
                'label' => 'Wakil Rektor 3',
                'value' => function($model){
                    return $model->getStatusWarek3($model->ID_PROPOSAL);                    
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'header' => 'Detail',
                'buttons' => [
                    'view' => function($url, $model, $key){
                        return Html::a('Detail',['monitoring-proposal/update','id' => $model->ID_PROPOSAL], ['alt' => 'detail']);
                    }
                ]
            ],
        ],
    ]); 
    ?>

    <?=
        TabsX::widget([
            'position' => TabsX::POS_ABOVE,
            'align' => TabsX::ALIGN_LEFT,
            'bordered' => true,
            'items' => [
                [
                    'label' => 'Himpunan',
                    'content' => $tab_himpunan,
                    'headerOptions' => [
                        'style'=>'background-color:white; width:15%;'
                    ],
                    
                ],
                [
                    'label' => 'KPU',
                    'content' =>  $tab_kpu,
                    'headerOptions' => [
                        'style'=>'background-color:white; width:15%;'
                    ],
                ],
                [
                    'label' => 'UKM',
                    'content' => $tab_ukm,
                    'headerOptions' => [
                        'style'=>'background-color:white; width:15%;'
                    ],
                ],
                
            ],
        ]);
    ?>

</div>
