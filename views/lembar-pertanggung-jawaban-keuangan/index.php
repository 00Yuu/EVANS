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
        'pager'        => [

            'class' => '\yii\widgets\LinkPager',

        ],                
        'tableOptions' => [
            'class' => 'table table-bordered table-hover table-light',
            'style' => 'background-color:white;'
        ],
        'columns' => [
           

            [
                'attribute' => 'ID_LPK',
                'label' => 'id'
            ],
            [
                'attribute' => 'NAMA_KEGIATAN',
                'label' => 'Nama Kegiatan'
            ],
            [
                'attribute' => 'PENYELENGGARA',
                'label' => 'Penyelenggara'
            ],
            [
                'attribute' => 'KEPERLUAN',
                'label' => 'Keperluan'
            ],
            [
                'attribute' => 'TANGGAL_BON',
                'label' => 'Tangal BS'
            ],
            [
                'attribute' => 'TANGGAL_PENYELESAIAN_BON',
                'label' => 'Tanggal Penyelesaian'
            ],
            [
                'attribute' => 'DANA_UMN',
                'label' => 'Dana UMN'
            ],
            [
                'label' => 'Status LPK',
                        'value' => function ($model){
                            return $model->showStatus($model->STATUS_DRAFT,$model->ID_LPK);
                        }
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
