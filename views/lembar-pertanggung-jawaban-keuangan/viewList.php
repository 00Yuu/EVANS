<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List LPK';
$this->params['breadcrumbs'][] = ['label' => 'Monitoring LPK', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Lembar Pertanggung Jawaban Keuangan', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-lembar-pertanggung-jawaban-keuangan-index">
<div class="container" style="margin-left: 1%;margin-top: 5%">
        <div class="row">
            <div class="col-sm-6">
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
                'label' => 'Harga'
            ],
            [
                // 'attribute' => 'TINGKAT_KEGIATAN',
                'label' => 'Bon'
            ],
            [
                'header' => 'Action',
                'content' => function($model) {
                    return Html::a('Delete', ['delete', 'id' => $model->ID_PROKER],
                    [
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                            ],
                        ]
                    );  
                }  
            ],
        ],
    ]); 
?>
</div>
        <div class="col-sm-6">
            <?= $this->render('_formListLPK', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
