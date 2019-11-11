<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Proposal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proposal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_PROPOSAL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_PROKER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_TENGGAT_WAKTU')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BANK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NO_REKENING')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATUS_DRAFT')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
