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
        <?= $form->field($model, 'NAMA_ORGANISASI')->textInput(['maxlength' => true, 'placeholder' => "Nama Organisasi"]) ?>    

        <?= $form->field($model, 'NAMA_ACARA')->textInput(['maxlength' => true, 'placeholder' => "Nama Acara"]) ?>

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
                    ]
                ]);?>
            </div>
            <div class="col-sm-2" style="padding: 2% 0 0 0">
                <div style="margin-top: 3.3%; padding: 4.3% 6.7% 3% 40%;border: 1px solid #e0e0e0;background-color: #f2f2f2">
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
                    ]
                ]);?>
            </div>
        </div>
        
        <p style="margin: 0% 0% 1% 0%"><b>Lembar Pengesahan<b></p>
        <div class="card" style="background-color: white; padding: 5%; margin: 0% 0 5% 0; border-radius: 7px 7px 7px 7px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
            <?php $hint = "Unggah lembar pengesahan</br><span style='color: red;'><i>*Format docs/pdf maks 5mb</i></span>" ?>

            <?= $form->field($model, 'ID_PROPOSAL', [
            'template' => '
                <div>
                    {input}
                </div>
                {error}
                {hint}
                ',
            
            ])->widget(FileInput::classname(), [
                'pluginOptions' => [
                    'allowedFileExtensions'=>['zip','pdf','mp4','png','jpg'],
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false,
                ],
                'options' => [
                    'accept' => '.zip, .pdf, .mp4, .jpg, .png',
                    'multiple'=> false,

                ],
            ])->label('',['class' => ''])->hint($hint, ['class' => 'help-block'])
            ?>
        </div>
    </div>

    <div class="form-group" style="float: right;margin-top: 4%">
        <?=Html::a('Back', ['create'], [
            'class' => 'btn btn-primary',
            'style' => 'width: 100px'
        ]) ?>
        <?= Html::submitButton('Create', array(
                'class' => 'btn btn-primary',
                'style' => 'width: 100px'
            )
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>