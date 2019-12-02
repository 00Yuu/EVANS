<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\MasterTTD */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-ttd-form">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="card" style="background-color: white;padding: 5% 5% 10% 5%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-left: 5%">

    <div class="hide">
    <?= $form->field($model, 'ID_TTD')->hiddenInput([
        'maxlength' => true, 
        'value' => '99999',
        ])->label(false) ?>
    </div>

        <?= $form->field($model, 'EMPLID', )->widget(Select2::classname(), [
            'initValueText' => '',
            'options' => ['placeholder' => 'NIK/NIM'],
            'pluginOptions' => [
                'allowClear' => true,
                'minimumInputLength' => 3,
                'language' => [
                    'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }")
                ],
                'ajax' => [
                    'url' => Url::to(['personal-data/nim-mahasiswa']),
                    'dataType' => 'json',
                    'data' => new JsExpression('function(params) { return {q:params.term}; }')
                ],
                'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                'templateResult' => new JsExpression('function(nik) { return nik.id + " | " +  nik.text; }'),
                'templateSelection' => new JsExpression('function (nik) { return nik.id; }'),
            ],
        ])->label(
                'NIK:',
                ['style' => 'text-align:left;'],
            ) 
        ?>

    <?= $form->field($model, 'STATUS')->textInput(['maxlength' => true])->dropDownList(
                    ['1' => 'Aktif' , '0'=> 'Tidak Aktif']
                )->label('Status') ?>

    <h6><b>File TTD</b></h6>

    <div class="card" style="background-color: white;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); ;margin: 5% 0 5% 0;padding: 5%">   
   
    <?= $form->field($model, 'FILE_TTD')->fileInput() ?>
    
    <h6>Unggah pindaian tanda tangan</h6>
    <h6 style="color:red"><i>*Format docs/pdf maks 5mb</i></h6>

    </div>

    <div class="form-group" style="float: right;margin-top: 15%">
    <?= Html::Button('Back', array(
                'class' => 'btn btn-primary',
                'style' => 'width: 100px'
            )
        ) ?>
        <?= Html::submitButton('Create', array(
                'class' => 'btn btn-primary',
                'style' => 'width: 100px'
            )
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
