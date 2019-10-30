<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramKerja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="program-kerja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_PROKER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_RINCI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_TENGGAT_WAKTU')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BENTUK_PROKER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NAMA_KEGIATAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TINGKAT_KEGIATAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DANA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'START_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'END_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TEMPAT_PELAKSANAAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JUMLAH_PESERTA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TUJUAN_KEGIATAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FEEDBACK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATUS_DRAFT')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
