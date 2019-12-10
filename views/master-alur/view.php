<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterAlur */

$this->title = 'Jenis Dokumen';
$this->params['breadcrumbs'][] = ['label' => 'Master Alur', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-alur-view">

<div class="container" style="margin-left: 1%">
        <div class="row">
            <div class="col-sm-6">
                <h4 style="margin: 0 5% 5% 0"><b>Jenis Dokumen<b></h4>
                
                <?php
                    $form = ActiveForm::begin([
                        'action' => ['master-alur/update-jenis'],
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
                        ['class' => 'yii\grid\SerialColumn'],
                        'JENIS_DOKUMEN',
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
                                <select class="form-control" name="selectStatus['.$model->ID_JENIS_ALUR.']" >
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
                                <input type="submit" class="btn btn-info updateBtn" value="Update" name="updateBtn['.$model->ID_JENIS_ALUR.']">
                                ';
                                return $button;
                            }
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view}',
                            'header' => 'Detail',
                            'buttons' => [
                                'view' => function($url, $model, $key) use($id){
                                    return Html::a('Detail',['master-alur/detail', 'id' => $key, 'id_alur' => $id], ['alt' => 'detail']);
                                }
                            ]
                        ], 

                    ],
                ]); 
                ?>

                <?php ActiveForm::end(); ?>

            </div>

               

            <div class="col-sm-6">
                <h4 style="margin: 0 5% 5% 0"><b>Input Alur<b></h4>
                    <?= $this->render('_formJenis', [
                        'modelJenis' => $modelJenis,
                        'id' => $id,
                    ]) ?>
            </div>

        </div>
    </div>

</div>
