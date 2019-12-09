<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterAlur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-alur-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card" style="background-color: white;padding: 5% 5% 10% 5%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-left: 5%">
        <?= $form->field($model, 'ID_ALUR')->hiddenInput(['value' => '99999'])->label(false) ?>

        <?= $form->field($model, 'NAMA_ALUR')->textInput(['maxlength' => true, 'placeholder' => "Nama Alur"]) ?>

        <?= $form->field($model, 'STATUS')->dropDownList(
            ['1' => 'Aktif', '0' => 'Tidak Aktif' ])->label('Status')
        ?>
    </div>

    <div class="form-group" style="float: right;margin-top: 8%">
        <?= Html::submitButton('Create', array(
                'class' => 'btn btn-primary',
                'style' => 'width: 100px'
            )
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
