<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Periode';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-periode-index">

    <div class="container" style="margin-left: 10%">
        <div class="row">
            <div class="col-sm-6">
                <h1 style="margin-bottom: 8%"><?= Html::encode($this->title) ?></h1>

                <?php
                    $form = ActiveForm::begin([
                        'id' => 'periode-update-form',
                        'action' => ['master-periode/update'],
                    ]);
                 ?>

                <!-- <div class="card" style="background-color: white;padding: 5% 5% 10% 5%;margin-top: 8%"> -->
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => '',
                    'tableOptions' => ['class' => 'table table-bordered'],
                    'options' => ['style' => 'background-color: white'],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'PERIODE',
                            'label' => 'Periode'
                        ],
                        'START_DATE:date',
                        'END_DATE:date',
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
                                <select class="form-control" name="selectStatus['.$model->ID_PERIODE.']" >
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
                                <input type="submit" class="btn btn-info updateBtn" value="Update" name="updateBtn['.$model->ID_PERIODE.']">
                                ';
                                return $button;
                            }
                        ],

                    ],
                ]); 
                ?>
                <?php ActiveForm::end(); ?>
                <!-- </div> -->
            </div>
            <div class="col-sm-6">
            <h4 style="margin: 10% 5% 5% 5%"><b>Input Alur<b></h4>
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
