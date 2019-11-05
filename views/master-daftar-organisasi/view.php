<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\MasterDaftarOrganisasi */

$this->title = "List Organisasi";
$this->params['breadcrumbs'][] = ['label' => 'Master Daftar Organisasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-daftar-organisasi-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <!-- <p>
        ?= Html::a('Update', ['update', 'id' => $model->ID_ORGANISASI], ['class' => 'btn btn-primary']) ?>
        ?= Html::a('Delete', ['delete', 'id' => $model->ID_ORGANISASI], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <div class="container" style="margin-left: 10%">
        <div class="row">
            <div class="col-sm-6">
                <h1 style="margin-bottom: 8%"><?= Html::encode($this->title) ?></h1>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'summary' => '',
                        'tableOptions' => [
                            'class' => 'table table-bordered table-hover table-light',
                            'style' => 'background-color:white;'
                        ],
                        'columns' => [
                            
                            [   
                                'attribute' => 'ID_ORGANISASI',
                                'label' => '#'
                            ],
                            [
                                'attribute' => 'ID_ORGANISASI',
                                'label' => 'Jabatan'
                            ],
                            [
                                'attribute' => 'ID_ORGANISASI',
                                'label' => 'Status'
                                
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view}',
                                'header' => 'Detail',
                                'buttons' => [
                                    'view' => function($url, $model, $key){
                                        return Html::a('Detail',$url, ['alt' => 'detail']);
                                    },
                                    
                                ]
                            ], 

                        ],
                        ]); ?>
                </div>

        <div class="col-sm-6">
        <h4 style="margin: 10% 5% 5% 5%"><b>Input Organisasi<b></h4>
            <?= $this->render('_form2', [
                'model' => $model,
            ]) ?>
        </div>
        
    
</div>
