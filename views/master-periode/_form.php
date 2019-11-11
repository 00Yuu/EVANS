<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\MasterPeriode */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="master-periode-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card" style="background-color: white;padding: 5% 5% 10% 5%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-left: 5%">
        <?= $form->field($model, 'ID_PERIODE')->textInput(['maxlength' => true])->hiddenInput(['value' => 99])->label(false) ?>

        <?= $form->field($model, 'PERIODE')->textInput(['maxlength' => true, 'placeholder' => "Periode"]) ?>

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

        <?= $form->field($model, 'END_DATE')->widget(
            DatePicker::className(), [
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ],
            'options' => [
                'placeholder' => 'End Date'
            ]
        ]);?>

        <?= $form->field($model, 'STATUS')->textInput(['maxlength' => true])->dropDownList(
            ['0' => 'Tidak Aktif', '1' => 'Aktif'])->label('Status')
        ?>
    </div>

    <div class="form-group" style="float: right;margin-top: 8%">
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
