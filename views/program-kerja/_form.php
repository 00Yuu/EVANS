<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramKerja */
/* @var $form yii\widgets\ActiveForm */

$data = $model->getBentukKegiatan();

?>

<div class="program-kerja-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="card" style="background-color: white;padding: 3% 5% 3% 5%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
            <?= $form->field($model, 'ID_PROKER')->textInput(['maxlength' => true])->hiddenInput(['value' => 99])->label(false) ?>

            <?= $form->field($model, 'ID_RINCI')->textInput(['maxlength' => true])->hiddenInput(['value' => 99])->label(false) ?>

            <?= $form->field($model, 'ID_TENGGAT_WAKTU')->textInput(['maxlength' => true])->hiddenInput(['value' => 99])->label(false) ?>

            <?= $form->field($model, 'STATUS_DRAFT')->textInput(['maxlength' => true])->hiddenInput(['value' => 0])->label(false) ?>

            <?= $form->field($model, 'BENTUK_PROKER')->dropDownList(
                    [
                        'Program Rutin' => 'Program Rutin',
                        'Program Unggulan' => 'Program Unggulan',
                        'Program Insidental' => 'Program Insidental'
                    ]
                )->label('Bentuk Program Kerja') ?>

            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'NAMA_KEGIATAN')->textInput(['maxlength' => true])->input('BENTUK_PROKER', ['placeholder' => "Nama Kegiatan"]) ?>

                    <?= $form->field($model, 'TINGKAT_KEGIATAN')->dropDownList(
                    [
                        'Prodi' => 'Prodi',
                        'Fakultas' => 'Fakultas',
                        'Universitas' => 'Universitas',
                        'Nasional' => 'Nasional',
                        'Regional' => 'Regional',
                        'Internasional' => 'Internasional'
                    ]
                ) ?>

                <label class="control-label">Bentuk Kegiatan</label>
                <?= Select2::widget([
                        'name' => 'BentukKegiatan[ID_BENTUK_KEGIATAN]',
                        'value' => $row,
                        'data' => $data,
                        'options' => ['placeholder' => 'Bentuk Kegiatan', 'multiple' => true],
                        'pluginOptions' => [
                            'tags' => true,
                            'maximumInputLength' => 10
                        ],
                    ]); ?>

                <div style="margin-top: 3%"></div>
                <?= $form->field($model, 'TUJUAN_KEGIATAN')->textInput(['maxlength' => true])->input('TUJUAN_KEGIATAN', ['placeholder' => "Tujuan Kegiatan"]) ?>
                </div>
                <div class="col-sm-6">
                    
                    <div class="row">
                        <div class="col-sm-5" style="padding-right: 0">
                        <?= $form->field($model, 'START_DATE')->widget(
                            DatePicker::className(), [
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-M-yyyy',
                            ],
                            'options' => [
                                'placeholder' => 'Start Date'
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
                                'placeholder' => 'End Date'
                            ]
                        ]);?>
                        </div>
                    </div>

                    <?= $form->field($model, 'DANA')->textInput(['maxlength' => true])->input('DANA', ['placeholder' => "Dana"]) ?>
                    
                    <?= $form->field($model, 'TEMPAT_PELAKSANAAN')->textInput(['maxlength' => true])->input('TEMPAT_PELAKSANAAN', ['placeholder' => "Tempat Pelaksanaan"]) ?>

                    <?= $form->field($model, 'JUMLAH_PESERTA')->textInput(['maxlength' => true])->input('JUMLAH_PESERTA', ['placeholder' => "Jumlah Peserta"])->label('Target Jumlah Peserta') ?>
                </div>
            </div>
<!-- 
            <?= $form->field($model, 'FEEDBACK')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'STATUS_DRAFT')->textInput(['maxlength' => true]) ?> -->
        </div>
        <div class="form-group" style="float: right;margin-top: 4%">
            <?= Html::a('Back', 
                [
                    'index'
                ]
                ,
                [
                    'class' => 'btn btn-primary',
                    'style' => 'width: 100px'
                ]) ?>
            <?= Html::Button('Save', 
                [
                    'class' => 'btn btn-primary',
                    'style' => 'width: 100px'
                ]) ?>
            <?= Html::submitButton('Submit', 
                [
                    'class' => 'btn btn-primary',
                    'style' => 'width: 100px'
                ]) ?>
        </div>    
    <?php ActiveForm::end(); ?>

</div>
