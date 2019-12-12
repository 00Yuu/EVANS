<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\MasterPeriode */
/* @var $form yii\widgets\ActiveForm */

$this->title="";
?>
<div class="container">

    <?php $form = ActiveForm::begin(); ?>

    <h4 style="margin: 4% 0% 3% 6%"><b>Halaman Pengesahan<b></h4>
    <div class="card" style="background-color: white;padding: 5% 5% 10% 5%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-left: 5%">
    <div class="hide">

        <?php 
            if($id_pengesahan == ''){
                echo $form->field($model, 'ID_HAL_PENGESAHAN')->hiddenInput(['value' => '99999'])->label(false); 
            }
        ?>

        <?= $form->field($model, 'ID_PROPOSAL')->hiddenInput(['value' => "$id"])->label(false) ?>
    </div>
        <?php 
            if($id_pengesahan != ''){
                echo $form->field($model, 'NAMA_ORGANISASI')->textInput(['maxlength' => true, 'placeholder' => "Nama Organisasi"]); 
            }
            else{
                echo $form->field($model, 'NAMA_ORGANISASI')->textInput(['maxlength' => true, 'placeholder' => "Nama Organisasi", 'value' => $nama_org ]); 
            }
        ?>    

        <?php 
            if($id_pengesahan != ''){
                echo $form->field($model, 'NAMA_ACARA')->textInput(['maxlength' => true, 'placeholder' => "Nama Acara"]); 
            }
            else{
                echo $form->field($model, 'NAMA_ACARA')->textInput(['maxlength' => true, 'placeholder' => "Nama Acara", 'value' => $nama_kegiatan ]); 
            }
        ?>    
        <div class="row">
            <div class="col-sm-5" style="padding-right: 0">
                <?php
                    if($id_pengesahan != ''){
                        echo $form->field($model, 'START_DATE')->widget(
                            DatePicker::className(), [
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-M-yyyy',
                            ],
                            'options' => [
                                'placeholder' => 'Start Date',
                            ]
                            ]);
                    }
                    else{
                        echo $form->field($model, 'START_DATE')->widget(
                            DatePicker::className(), [
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-M-yyyy',
                            ],
                            'options' => [
                                'placeholder' => 'Start Date',
                                'value' => $start_date,
                            ]
                            ]);
                    }
                ?>
            </div>
            <div class="col-sm-2" style="padding: 2% 0 0 0">
                <div style="margin-top: 3.3%; padding: 4.3% 6.7% 3% 40%;border: 1px solid #e0e0e0;background-color: #f2f2f2">
                    To
                </div>
            </div>
            <div class="col-sm-5" style="padding-left: 0">
                <?php
                    if($id_pengesahan != ''){
                        echo $form->field($model, 'END_DATE')->widget(
                            DatePicker::className(), [
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-M-yyyy',
                            ],
                            'options' => [
                                'placeholder' => 'Start Date',
                            ]
                            ]);
                    }
                    else{
                        echo $form->field($model, 'END_DATE')->widget(
                            DatePicker::className(), [
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-M-yyyy',
                            ],
                            'options' => [
                                'placeholder' => 'Start Date',
                                'value' => $end_date,
                            ]
                            ]);
                    }
                ?>
            </div>
        </div>
        
        
    </div>

    <div class="form-group" style="float: right;margin-top: 4%">
        <?= Html::a('Back', ['update' , 'id'=> $id ], [
            'class' => 'btn btn-primary',
            'style' => 'width: 100px']) 
        ?>
        <?= Html::submitButton('Save', array(
                'class' => 'btn btn-primary',
                'style' => 'width: 100px'
            )
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>