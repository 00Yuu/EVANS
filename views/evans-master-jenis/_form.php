<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EVANSMASTERJENISORGANISASI */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evansmasterjenisorganisasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_JENIS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JENIS_ORGANISASI')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
