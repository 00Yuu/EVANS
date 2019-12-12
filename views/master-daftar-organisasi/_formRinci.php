<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\datecontrol\DateControl;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\Url;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\MasterJabatan */
?>

<div class="master-jabatan-update">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' => 'detail-jabatan',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'wrapper' => 'col-sm-9',
            ],
            'options' => [
                'class' => 'form-group', 
            ]
        ],
    ]); ?>
    
    <div class="hide">
        <?= $form->field($modelRinci, 'ID_RINCI')->hiddenInput([
            'maxlength' => true, 
            'value' => '99999', 
            ])->label(false); ?>

        <?= $form->field($modelRinci, 'ID_PENGURUS')->hiddenInput([
            'maxlength' => true, 
            'value' => $id, 
            ])->label(false); ?>
    </div>

    <div class="card" style="background-color: white;padding: 5% 5% 10% 5%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
        <?= $form->field($modelRinci, 'EMPLID', )->widget(Select2::classname(), [
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
                'NIM:',
                ['style' => 'text-align:left;'],
            ) 
        ?>

        <?= $form->field($modelRinci, 'ID_PERIODE')->dropDownList($modelRinci->dataPeriode(),
            ['class' => 'form-control',
            'style' => 'width:50%;'
            ])->label(
                'Periode:',
                ['style' => 'text-align:left;'],
        ) ?>

        <div class="card" style="background-color: white;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); ;margin: 5% 0 5% 0;padding: 5%">   
            <?php $hint = "Unggah file tanda tangan.</br><span style='color: red;'><i>*Format jpg/png maks 5mb</i></span>" ?>
            <?= $form->field($modelRinci, 'FILE_TTD', [
                    'template' => '
                        <div>
                            {input}
                        </div>
                        {error}
                        {hint}
                        ',
                    
                    ])->widget(FileInput::classname(), [
                        'pluginOptions' => [
                            'allowedFileExtensions'=>['jpg','png'],
                            'showPreview' => false,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => false,
                        ],
                        'options' => [
                            'accept' => '.jpg, .png',
                            'multiple'=> false,

                        ],
                    ])->label('',['class' => ''])->hint($hint, ['class' => 'help-block'])
            ?>
        </div>
        
    </div>

    <div class="form-group" style="float: right;margin-top: 8%">
        <?= Html::a('Back', ['master-daftar-organisasi/view' , 'id'=> $id_org ], [
            'class' => 'btn btn-primary',
            'style' => 'width: 100px']) 
        ?>

        <?= Html::submitButton('Save', array(
                'class' => 'btn btn-primary',
                'style' => 'width: 100px'
            )
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>