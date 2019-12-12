<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Proposal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proposal-form-bab4">

    <?php $form = ActiveForm::begin(); ?>
    <div class="hide">
        <?= $form->field($model, 'ID_SUSUNAN')->hiddenInput(['maxlength' => true, 'value' => '99999']) ?>

        <?= $form->field($model, 'ID_BAB_2')->hiddenInput(['maxlength' => true, 'value' => "$id"]) ?>
    </div>

    <div class="card" style="background-color: white; padding: 10%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 7px 7px 7px 7px;">
        <?= $form->field($model, 'EMPLID', )->widget(Select2::classname(), [
            'initValueText' => '',
            'options' => ['placeholder' => 'NIM'],
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
            ])
        ?>
    
        <?= $form->field($model, 'JABATAN')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'DIVISI')->textInput(['maxlength' => true]) ?>

    </div>

    <div class="form-group" style="float: right;margin-top: 8%">
        <?= Html::a('Back', ['update','id' => $id], array(
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
    </div>

    <?php ActiveForm::end(); ?>

</div>
