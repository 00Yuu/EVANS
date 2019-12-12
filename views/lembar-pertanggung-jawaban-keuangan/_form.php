<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\LembarPertanggungJawabanKeuangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lembar-pertanggung-jawaban-keuangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card" style="background-color: white;padding: 5% 5% 5% 5%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-left: 5%">
                <?= $form->field($model, 'ID_LPK')->hiddenInput(['value' => '99999'])->label(false) ?>

                <?= $form->field($model, 'ID_RINCI')->hiddenInput(['value' => '00008'])->label(false) ?>

                <?= $form->field($model, 'ID_TENGGAT_WAKTU')->hiddenInput(['value' => '00004'])->label(false) ?>

                <?= $form->field($model, 'CREATE_DATE')->hiddenInput(['value'=> date("d-M-y")])->label(false) ?>
                
                <?= $form->field($model, 'ID_PROPOSAL')->textInput(['maxlength' => true])->dropDownList(
                   $model->dataProposal()
            )->label('Proposal') ?>

                <?= $form->field($model, 'NAMA_KEGIATAN')->textInput(['maxlength' => true])->input('NAMA_KEGIATAN', ['placeholder' => "Nama Kegiatan"])->label('Nama Kegiatan') ?>

                <?= $form->field($model, 'PENYELENGGARA')->textInput(['maxlength' => true])->input('PENYELENGGARA', ['placeholder' => "Penyelenggara"])->label('Penyelenggara') ?>

                <?= $form->field($model, 'KEPERLUAN')->textInput(['maxlength' => true])->input('KEPERLUAN', ['placeholder' => "Keperluan"])->label('Keperluan') ?>
                
                <?= $form->field($model, 'TANGGAL_BON')->widget(
                            DatePicker::className(), [
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-M-yyyy',
                            ],
                            'options' => [
                                'placeholder' => 'Tanggal BS'
                            ]
                        ]);?>

                <?= $form->field($model, 'TANGGAL_PENYELESAIAN_BON')->widget(
                            DatePicker::className(), [
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-M-yyyy',
                            ],
                            'options' => [
                                'placeholder' => 'Tanggal Penyelesaian BS'
                            ]
                        ]);?>

                    <?= $form->field($model, 'DANA_UMN')->textInput(['maxlength' => true])->input('DANA_UMN', ['placeholder' => "Dana UMN"])->label('Dana UMN') ?>                
                                
                    <?= Html::a('Create List LPK',
                    ['view-list'],
                    [
                        'class' => 'btn btn-default',
                        'style' => 'width: 100%'
                        
                    ]
                ) ?>

                <h6 style="color:red"><i>*Mohon disave dahulu sebelum create list</i></h6>
            </div>


            <div class="form-group" style="float: right;margin-top: 6%">
            <?= Html::a('Back', ['index'], array(
                    'class' => 'btn btn-primary',
                    'style' => 'width: 100px'
                )
            ) ?>
            <?= Html::submitButton('Save', array(
                    'class' => 'btn btn-primary',
                    'style' => 'width: 100px',
                    'name' => 'button1',
                    'value' => 'save'
                )
            ) ?>
            <?= Html::submitButton('Submit', array(
                    'class' => 'btn btn-primary',
                    'style' => 'width: 100px',
                    'name' => 'button1',
                    'value' => 'submit'
                )
            ) ?>
            </div>

    <?php ActiveForm::end(); ?>

</div>
