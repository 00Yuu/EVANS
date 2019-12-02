<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ListLembarPertanggungJawabanKeuangan */
/* @var $form ActiveForm */
?>
<div class="form-List-LPK">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card" style="background-color: white;padding: 5% 5% 10% 5%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
    
    <?= $form->field($model, 'ID_LIST_LPK')->textInput(['maxlength' => true])->hiddenInput(['value' => '99999'])->label(false) ?>

    <?= $form->field($model, 'DESKRIPSI')->textInput(['maxlength' => true])->input('DESKRIPSI', ['placeholder' => "Deskripsi"])->label('Deskripsi') ?>
    
    <?= $form->field($model, 'HARGA')->textInput(['maxlength' => true])->input('HARGA', ['placeholder' => "Harga"])->label('Harga') ?>

    <div class="card" style="background-color: white;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); ;margin: 5% 0 5% 0;padding: 5%">
    
    <?= Html::Button('Choose Files', array(
            'class' => 'btn btn-default',
            'style' => 'width: 110px'
        )
    ) ?>
    
    <h6>Unggah pindaian bon</h6>
    <h6 style="color:red"><i>*Format jpg/png/pdf maks 5mb</i></h6>

    </div>

    <div class="form-group" style="float: right">
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
    </div>
    <?php ActiveForm::end(); ?>
</div>
