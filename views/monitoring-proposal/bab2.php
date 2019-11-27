<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\Proposal */

$this->title = 'BAB I Pendahuluan';
$this->params['breadcrumbs'][] = ['label' => 'Proposals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <?php $form = ActiveForm::begin(); ?>
        <div class="row" style="margin-top: 5%;">
            <div class="col-sm-6 col-sm-offset-3">
            <h4 ><b>BAB II Deskripsi Acara<b></h4>
                <div class="card" style="background-color: white; padding: 5%; margin: 5% 0 5% 0; border-radius: 7px 7px 7px 7px;">
                    <?php $hint = "Unggah pindaian BAB II.</br><span style='color: red;'><i>*Format docs/pdf maks 5mb</i></span>" ?>

                    <?= $form->field($model, 'ID_PROPOSAL', [
                    'template' => '
                        <div>
                            {input}
                        </div>
                        {error}
                        {hint}
                        ',
                    
                    ])->widget(FileInput::classname(), [
                        'pluginOptions' => [
                            'allowedFileExtensions'=>['zip','pdf','mp4','png','jpg'],
                            'showPreview' => false,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => false,
                        ],
                        'options' => [
                            'accept' => '.zip, .pdf, .mp4, .jpg, .png',
                            'multiple'=> false,

                        ],
                    ])->label('',['class' => ''])->hint($hint, ['class' => 'help-block'])
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group" style="float: right;margin-top: 2%">
                    <?=Html::a('Back', ['create'], [
                        'class' => 'btn btn-primary',
                        'style' => 'width: 100px'
                    ]) ?>
                    <?= Html::submitButton('Save', array(
                            'class' => 'btn btn-primary',
                            'style' => 'width: 100px'
                        )
                    ) ?>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
