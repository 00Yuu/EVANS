<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Proposal */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    $this->registerJs(
        "
        $('.kategori-div').addClass('hide');
        $('.id-kategori-div').addClass('hide');

        $('#jenis').change(function(){
            $('#jenis option').each(function() {
                if($(this).is(':selected')){
                    if($(this).val() != ''){
                        $('.kategori-div').removeClass('hide');
                        $('.id-kategori-div').addClass('hide');
                    }else{
                        $('.kategori-div').addClass('hide');
                        $('.id-kategori-div').addClass('hide');
                    }
                }
            });
        });

        $('#kategori').change(function(){
            $('#kategori option').each(function() {
                if($(this).is(':selected')){
                    if($(this).val() != ''){
                        $('.id-kategori-div').removeClass('hide');
                    }else{
                        $('.id-kategori-div').addClass('hide');
                    }
                }
            });
        });
        ");
?>

<div class="proposal-form-bab4">

    <?php $form = ActiveForm::begin(); ?>
    <div class="hide">
        <?= $form->field($model_kategori, 'ID_TRANS_KATEGORI')->hiddenInput(['maxlength' => true, 'value' => '99999']) ?>

        <?= $form->field($model_kategori, 'ID_PROPOSAL')->hiddenInput(['maxlength' => true, 'value' => "$id"]) ?>
    </div>

    <div class="card" style="background-color: white; padding: 10%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 7px 7px 7px 7px;">
        <?= $form->field($placeholder, 'JENIS_ANGGARAN')->dropDownList(
                    $model_kategori->getDataJenis(),
                    [
                        'id' => 'jenis',
                        'prompt' => 'Pilih Jenis',
                    ],
                )->label('Jenis Anggaran') ?>
        <div class="kategori-div">
            <?= $form->field($placeholder, 'KATEGORI')->widget(DepDrop::classname(), [
                    'options'=>[
                        'id'=>'kategori',
                    ],
                    'pluginOptions'=>[
                        'depends'=> ['jenis'],
                        'placeholder'=> 'Pilih Kategori',
                        'url'=> Url::to(['monitoring-proposal/find-kategori'])
                    ]
                ])
                ->label('Kategori')
            ?>
        </div>

        <div class="id-kategori-div">
            <?= $form->field($model_kategori, 'ID_KATEGORI')->widget(DepDrop::classname(), [
                        'options'=>[
                            'id'=>'sumber',
                        ],
                        'pluginOptions'=>[
                            'depends'=> ['jenis','kategori'],
                            'placeholder'=> 'Pilih Sumber',
                            'url'=> Url::to(['monitoring-proposal/find-sumber'])
                        ]
                    ])
                    ->label('Sumber')
            ?>
        </div>
    
        <?= $form->field($model_kategori, 'VALUE')->textInput(['maxlength' => true]) ?>
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
