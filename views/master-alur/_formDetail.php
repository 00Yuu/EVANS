<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="master-detail-alur-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card" style="background-color: white;padding: 5% 5% 10% 5%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-left: 5%">
        <?= $form->field($modelDetail, 'ID_DETAIL')->hiddenInput(['value' => '99999'])->label(false) ?>

        <?= $form->field($modelDetail, 'ID_JENIS_ALUR')->hiddenInput(['value' => "$id"])->label(false) ?>

        <?= $form->field($modelDetail, 'DESKRIPSI')->textInput(['maxlength' => true, 'placeholder' => "Deskripsi"]) ?>

        <?= $form->field($modelDetail, 'TINGKAT')->dropDownList(
            $modelDetail->dataTingkat())
        ?>

        <?= $form->field($modelDetail, 'PHASE')->dropDownList(
            ['0' => '0', '1' => '1' ])
        ?>
        <p style="color:#d3d3d3;">
            *Tingkat digunakan untuk menentukan level tiap alur. User
            dapat memasukan tingkat sesuai urutan alur.
        </p>
        <p style="color:#d3d3d3;">
            *Phase digunakan untuk menentukan batasan back alur-1 atau
            tetap pada alur tersebut. Jika phase adalah 0 maka alur-1.
            Jika phase adalah 1 maka alur akan tetap.
        </p>
    </div>

    <div class="form-group" style="float: right;margin-top: 8%">
        <?= Html::a('Back',['master-alur/view' , 'id'=> $id_alur ],[
                'class' => 'btn btn-primary',
                'style' => 'width: 100px'
            ])
        ?>
        <?= Html::submitButton('Create', array(
                'class' => 'btn btn-primary',
                'style' => 'width: 100px'
            )
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
