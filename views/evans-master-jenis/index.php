<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Organisasi';
// $this->params['breadcrumbs'][] = $this->title;
// ?>
<div class="evansmasterjenisorganisasi-index">

<div class="col-sm-6 table-responsive">
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table table-bordered table-hover table-light',
            'style' => 'background-color:white;'
        ],
        
        'columns' => [
            'ID_JENIS',
            'JENIS_ORGANISASI',
            
            
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
    ]); ?>
    </div>

   


    <!-- <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_JENIS',
            'JENIS_ORGANISASI',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?> -->
    

    <div class="col-sm-6">
        <h4>Tambah Struktur Hirarki </h4>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
