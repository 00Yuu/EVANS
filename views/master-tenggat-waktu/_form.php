<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterTenggatWaktu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-tenggat-waktu-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card" style="background-color: white;padding: 5% 5% 10% 5%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-left: 5%">
        <?= $form->field($model, 'ID_TENGGAT_WAKTU')->textInput(['maxlength' => true])->hiddenInput(['value' => 99])->label(false) ?>

        <?= $form->field($model, 'JNS_ALUR')->textInput(['maxlength' => true])->input('JNS_ALUR', ['placeholder' => "Jenis Alur"])->label('Jenis Alur') ?>

        <?= $form->field($model, 'WAKTU')->textInput(['maxlength' => true])->input('WAKTU', ['placeholder' => "WAKTU"])->label('WAKTU') ?>

        <?= $form->field($model, 'DDAY')->textInput(['maxlength' => true])->dropDownList(
                    ['Before' => 'Before', 'after' => 'After']
                )->label('D DAY') ?>
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