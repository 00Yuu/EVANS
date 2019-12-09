<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Alur';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-alur-index">

<div class="container" style="margin-left: 10%">
        <div class="row">
            <div class="col-sm-6">
                <h1 style="margin-bottom: 8%"><?= Html::encode($this->title) ?></h1>

                <?php
                    $form = ActiveForm::begin([
                        'id' => 'periode-update-form',
                        'action' => ['master-alur/update'],
                    ]);
                 ?>

                <!-- <div class="card" style="background-color: white;padding: 5% 5% 10% 5%;margin-top: 8%"> -->
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => '',
                    'tableOptions' => [
                        'class' => 'table table-bordered table-hover table-light',
                        'style' => 'background-color:white;'
                    ],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'NAMA_ALUR',
                        [
                            'format' => 'raw',
                            'header' => 'Status',
                            'value' => function($model, $key, $index, $column) {
                                $option = array();
                                foreach($model->dataStatus() as $key => $value){
                                    if($key==$model->STATUS){
                                        $option[] = '<option value="'.$key.'"Selected >'.$value.'</option>'; 
                                    }
                                    else{
                                        $option[] = '<option value="'.$key.'" >'.$value.'</option>'; 
                                    }
                                }
                                $select = '
                                <select class="form-control" name="selectStatus['.$model->ID_ALUR.']" >
                                '.implode('',$option).'
                                </select>';
                                return $select;  
                            }
                        ],
                        [
                            'label' => 'Update',
                            'format' => 'raw',
                            'value' => function($model, $key, $index, $column) {
                                $button = '
                                <input type="submit" class="btn btn-info updateBtn" value="Update" name="updateBtn['.$model->ID_ALUR.']">
                                ';
                                return $button;
                            }
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
                <?php ActiveForm::end(); ?>
                <!-- </div> -->
            </div>
            <div class="col-sm-6">
            <h4 style="margin: 10% 5% 5% 5%"><b>Input Periode<b></h4>
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>


</div>
