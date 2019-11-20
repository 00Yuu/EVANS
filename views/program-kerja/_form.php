<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramKerja */
/* @var $form yii\widgets\ActiveForm */

$data = $model->getBentukKegiatan();
if($model->STATUS_DRAFT === '1' || $model->STATUS_DRAFT === null){
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

                <div style="margin-top: 3%"></div>
                <?= $form->field($model, 'TUJUAN_KEGIATAN')->textInput(
                    [
                        'maxlength' => true,
                        "$disable" => "$disable"
                    ]
                    ) ?>
                </div>
                <div class="col-sm-6">           

                    <?= $form->field($model, 'DANA')->textInput(
                        [
                            'maxlength' => true, 
                            'placeholder' => "Dana",
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
                            "$disable" => "$disable"
                        ]
                        )?>

                    <div class="row">
                        <div class="col-sm-5" style="padding-right: 0">
                        <?= $form->field($model, 'START_DATE')->widget(
                            DatePicker::className(), [
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-M-yyyy',
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
                                'format' => 'dd-M-yyyy',
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

            <!-- <?= $form->field($model, 'FEEDBACK')->textInput(['maxlength' => true]) ?> -->

        </div>

        <div class="form-group" style="float: right;margin-top: 4%">
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

        </div>    
    <?php ActiveForm::end(); ?>

</div>
