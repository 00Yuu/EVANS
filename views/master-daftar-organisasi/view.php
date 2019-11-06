<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterDaftarOrganisasi */

$this->title = "List Organisasi";
$this->params['breadcrumbs'][] = ['label' => 'Master Daftar Organisasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-daftar-organisasi-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

   

    <div class="container" style="margin-left: 1%">
        <div class="row">
            <div class="col-sm-6">
                <h1 style="margin-bottom: 8%"><?= Html::encode($this->title) ?></h1>
                <?php
                    $form = ActiveForm::begin([
                        'id' => 'list-organisasi-update-form',
                        'action' => ['master-daftar-organisasi/update-status-list-organisasi'],
                    ]);
                 ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'summary' => '',
                        'tableOptions' => [
                            'class' => 'table table-bordered table-hover table-light',
                            'style' => 'background-color:white;'
                        ],
                        'columns' => [
                            
                            [   
                                'attribute' => 'ID_PENGURUS',
                                'label' => '#'
                            ],
                            [
                                'attribute' => 'JABATAN',
                                'label' => 'Jabatan'
                            ],
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
                                    <select class="form-control" name="selectStatus['.$model->ID_PENGURUS.']" >
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
                                    <input type="submit" class="btn btn-info updateBtn" value="Update" name="updateBtn['.$model->ID_PENGURUS.']">
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
                                    },
                                    
                                ]
                            ], 

                        ],
                        ]); ?>
                        <?php ActiveForm::end(); ?>
                </div>

        <div class="col-sm-6">
        <h4 style="margin: 10% 5% 5% 5%"><b>Input Organisasi<b></h4>
            <?= $this->render('_formListOrganisasi', [
                'model' => $model,
                'id' => $id,
            ]) ?>
        </div>
        
    
</div>
