<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Tenggat Waktu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-tenggat-waktu-index">

<h1 style="margin-bottom: 4%"><?= Html::encode($this->title) ?></h1>
    <div class="container" style="margin-left: 10%">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-4">
                <p>
                    <?= Html::a('Create', ['create'], ['class' => 'btn btn-primary']) ?>
                </p>
                <!-- <div class="card" style="background-color: white;padding: 5% 5% 10% 5%;margin-top: 8%"> -->
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'summary' => '',
                        'tableOptions' => ['class' => 'table table-bordered'],
                        'options' => ['style' => 'background-color: white'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'attribute' => 'JNS_ALUR',
                                'label' => 'Jenis Alur'
                            ],
                            [
                                'attribute' => 'WAKTU',
                                'label' => 'Waktu'
                            ],
                            [
                                'attribute' => 'DDAY',
                                'label' => 'DDay'
                            ],
                            [
                                'header' => 'Action',
                                'content' => function($model) {
                                    return Html::a('Edit', ['update', 'id' => $model->ID_TENGGAT_WAKTU]);
                                }  
                            ],

                        ],
                    ]); 
                    ?>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
