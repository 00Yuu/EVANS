<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

    <!-- Ini Monitoring PIC Kegiatan -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-bordered'],
        'options' => ['style' => 'background-color: white'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => '',
                'label' => 'Nama Proposal'
            ],
            [
                'attribute' => '',
                'label' => 'Periode'
            ],
            [
                'attribute' => '',
                'label' => 'Ketua Himpunan'
            ],
            [
                'attribute' => '',
                'label' => 'BEM'
            ],
            [
                'attribute' => '',
                'label' => 'Kaprodi'
            ],
            [
                'attribute' => '',
                'label' => 'Studev'
            ],
            [
                'attribute' => '',
                'label' => 'SA Manager'
            ],
            [
                'attribute' => '',
                'label' => 'Wakil Rektor 3'
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'header' => 'Detail',
                'buttons' => [
                    'view' => function($url, $model, $key){
                        return Html::a('Detail',$url, ['alt' => 'detail']);
                    }
                ]
            ],
        ],
    ]); 
    ?>

    <!-- Ini Monitoring KPU -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-bordered'],
        'options' => ['style' => 'background-color: white'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => '',
                'label' => 'Nama Proposal'
            ],
            [
                'attribute' => '',
                'label' => 'Periode'
            ],
            [
                'attribute' => '',
                'label' => 'DKBM'
            ],
            [
                'attribute' => '',
                'label' => 'Studev'
            ],
            [
                'attribute' => '',
                'label' => 'SA Manager'
            ],
            [
                'attribute' => '',
                'label' => 'Wakil Rektor 3'
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'header' => 'Detail',
                'buttons' => [
                    'view' => function($url, $model, $key){
                        return Html::a('Detail',$url, ['alt' => 'detail']);
                    }
                ]
            ],
        ],
    ]); 
    ?>

    <!-- Ini Monitoring UKM -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-bordered'],
        'options' => ['style' => 'background-color: white'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => '',
                'label' => 'Nama Proposal'
            ],
            [
                'attribute' => '',
                'label' => 'Periode'
            ],
            [
                'attribute' => '',
                'label' => 'BEM'
            ],
            [
                'attribute' => '',
                'label' => 'Studev'
            ],
            [
                'attribute' => '',
                'label' => 'SA Manager'
            ],
            [
                'attribute' => '',
                'label' => 'Wakil Rektor 3'
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'header' => 'Detail',
                'buttons' => [
                    'view' => function($url, $model, $key){
                        return Html::a('Detail',$url, ['alt' => 'detail']);
                    }
                ]
            ],
        ],
    ]); 
    ?>

    <!-- <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_PROPOSAL',
            'ID_PROKER',
            'ID_PENGURUS',
            'ID_TENGGAT_WAKTU',
            'BANK',
            //'NO_REKENING',
            //'STATUS_DRAFT',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?> -->


</div>
