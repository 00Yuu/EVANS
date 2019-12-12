<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramKerja */
/* @var $form yii\widgets\ActiveForm */
$session = Yii::$app->session;

$data = $model->getBentukKegiatan();
if($model->STATUS_DRAFT === '1' || $model->STATUS_DRAFT === null || $statusReview === 'Rejected' && $session->get('jabatan') === 'MAHASISWA'){
    $disable = '';
    $draft = true;
}
else{
    $disable = 'disabled';
    $draft = false;
}

?>

<div class="program-kerja-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col">
                <div class="card" style="background-color: white;padding: 3% 5% 3% 5%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                    <?= $form->field($model, 'ID_PROKER')->hiddenInput(['value' => 99])->label(false) ?>

                    <?= $form->field($model, 'ID_RINCI')->hiddenInput(['value' => 99])->label(false) ?>

                    <!-- <?= $form->field($model, 'ID_TENGGAT_WAKTU')->hiddenInput(['value' => 99])->label(false) ?> -->

                    <?= $form->field($model, 'BENTUK_PROKER')->dropDownList(
                            [
                                'Program Rutin' => 'Program Rutin',
                                'Program Unggulan' => 'Program Unggulan',
                                'Program Insidental' => 'Program Insidental'
                            ],
                            [
                                "$disable" => "$disable"
                            ]
                        )->label('Bentuk Program Kerja') ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'NAMA_KEGIATAN')->textInput(
                                [
                                    'maxlength' => true,
                                    'placeholder' => "Nama Kegiatan",
                                    "$disable" => "$disable"
                                ]
                            )?>

                            <?= $form->field($model, 'TINGKAT_KEGIATAN')->dropDownList(
                            [
                                'Prodi' => 'Prodi',
                                'Fakultas' => 'Fakultas',
                                'Universitas' => 'Universitas',
                                'Nasional' => 'Nasional',
                                'Regional' => 'Regional',
                                'Internasional' => 'Internasional'
                            ],
                            [
                                "$disable" => "$disable"
                            ]
                        ) ?>

                        <label class="control-label">Bentuk Kegiatan</label>
                        <?= Select2::widget([
                                'name' => 'BentukKegiatan[ID_BENTUK_KEGIATAN]',
                                'value' => $row,
                                'data' => $data,
                                'options' => ['placeholder' => 'Bentuk Kegiatan', 'multiple' => true,"$disable" => "$disable"],
                                'pluginOptions' => [
                                    'tags' => true,
                                    'maximumInputLength' => 10
                                ],
                            ]
                            ); ?>
                        <div style="color: red"><?= $errorMessage ?></div>

                        <div style="margin-top: 3%"></div>
                        <?= $form->field($model, 'TUJUAN_KEGIATAN')->textInput(
                            [
                                'maxlength' => true,
                                'placeholder' => "Tujuan Kegiatan",
                                "$disable" => "$disable"
                            ]
                            ) ?>
                        </div>
                        <div class="col-sm-6">           

                            <?= $form->field($model, 'DANA')->textInput(
                                [
                                    'maxlength' => true, 
                                    'placeholder' => "Dana",
                                    'type' => 'number',
                                    "$disable" => "$disable"
                                ]
                                )?>
                            
                            <?= $form->field($model, 'TEMPAT_PELAKSANAAN')->textInput(
                                [
                                    'maxlength' => true,
                                    'placeholder' => "Tempat Pelaksanaan",
                                    "$disable" => "$disable"
                                ]
                                )?>

                            <?= $form->field($model, 'JUMLAH_PESERTA')->textInput(
                                [
                                    'maxlength' => true,
                                    'placeholder' => "Jumlah Peserta",
                                    'type' => 'number',
                                    "$disable" => "$disable"
                                ]
                                )?>

                            <div class="row">
                                <div class="col-sm-5" style="padding-right: 0">
                                <?= $form->field($model, 'START_DATE')->widget(
                                    DatePicker::className(), [
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd-M-yy',
                                    ],
                                    'options' => [
                                        'placeholder' => 'Start Date',
                                        "$disable" => "$disable"
                                    ]
                                ]);?>
                                </div>
                                <div class="col-sm-2" style="padding: 4.7% 0 0 0">
                                    <div style="padding: 6.7% 6.7% 6.7% 40%;border: 1px solid #e0e0e0;background-color: #f2f2f2">
                                        To
                                    </div>
                                </div>
                                <div class="col-sm-5" style="padding-left: 0">
                                <?= $form->field($model, 'END_DATE')->widget(
                                    DatePicker::className(), [
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd-M-yy',
                                    ],
                                    'options' => [
                                        'placeholder' => 'End Date',
                                        "$disable" => "$disable"
                                    ]
                                ]);?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="form-group" style="float: right;margin-top: 3%">
                    <?=Html::a('Back', 
                        [
                            'index'
                        ]
                        ,
                        [
                            'class' => 'btn btn-primary',
                            'style' => 'width: 100px'
                        ]) ?>
                    <?php 
                        if($draft){
                            echo Html::submitButton('Save', 
                            [
                                'name' => 'submit1',
                                'class' => 'btn btn-primary',
                                'style' => 'width: 100px',
                                'value' => 'save'
                            ]);
                        }
                    ?>
                    <?php 
                        if($draft){
                        echo Html::submitButton('Submit', 
                        [
                            'name' => 'submit1',
                            'class' => 'btn btn-primary',
                            'style' => 'width: 100px',
                            'value' => 'submit'
                        ]);
                    }?>
                    <?php 
                        if($session->get('jabatan') === 'STUDEV' && $statusReview === 'Waiting Approval' || $session->get('jabatan') === 'ADMIN' && $status === 'update' && $statusReview === 'Waiting Approval'){
                            echo Html::submitButton('Reject', 
                            [
                                'name' => 'submit1',
                                'class' => 'btn btn-danger',
                                'style' => 'width: 100px',
                                'value' => 'reject'
                            ]);
                        }
                    ?>
                    <?php 
                        if($session->get('jabatan') === 'STUDEV' && $statusReview === 'Waiting Approval' || $session->get('jabatan') === 'ADMIN' && $status === 'update' && $statusReview === 'Waiting Approval'){
                        echo Html::submitButton('Approve', 
                        [
                            'name' => 'submit1',
                            'class' => 'btn btn-success',
                            'style' => 'width: 100px',
                            'value' => 'approve'
                        ]);
                    }?>
                </div>    
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                if($session->get('jabatan') === 'STUDEV' && $statusReview === 'Waiting Approval' || $session->get('jabatan') === 'ADMIN' && $status === 'update' && $statusReview === 'Waiting Approval' || $session->get('jabatan') === 'ADMIN' && $statusReview === 'Rejected' || $session->get('jabatan') === 'ADMIN' && $statusReview === 'Approved' || $session->get('jabatan') === 'MAHASISWA' && $statusReview === 'Rejected' || $session->get('jabatan') === 'MAHASISWA' && $statusReview === 'Approved'){
                    if($session->get('jabatan') === 'STUDEV' && $statusReview === 'Waiting Approval' || $session->get('jabatan') === 'ADMIN' && $statusReview === 'Waiting Approval'){
                        $status = false;
                    }
                    else{
                        $status = true;
                    }
                ?>
                <div class="card" style="background-color: white;padding: 1% 3% 1% 3%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);width: 80%;float: right">
                    <?= $form->field($model, 'FEEDBACK')->textarea(
                            [
                                'rows' => '4',
                                'maxlength' => true,
                                'placeholder' => "Feedback",
                                'disabled' => $status
                            ]
                        ) ?>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>
