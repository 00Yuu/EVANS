<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Proposal */

$this->title = 'Create Proposal';
$this->params['breadcrumbs'][] = ['label' => 'Proposals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <!-- <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?> -->

    <div class="col-sm-8">
        <h4 style="margin: 4% 0% 3% 0%"><b>Proposal<b></h4>
        <div class="card" style="background-color: white; padding: 5%; margin-bottom: 5%; width: 70%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 7px 7px 7px 7px;">
            <div class="row">
                <div class="col-sm-2">
                    <img src="https://www.cabinetmakerwarehouse.com/wp-content/uploads/9242-gull-grey.jpg" style="float: left; width: 60px; height: 60px;">
                </div>
                <div class="col-sm-8" style="padding-top: 2%;">
                    <h4><b>Halaman Judul</b></h4>
                </div>
                <div class="col-sm-2" style="padding-top: 4%;">
                    <a href="">Open</a>
                </div>
            </div>
        </div>

        <div class="card" style="background-color: white; padding: 5%; margin-bottom: 5%; width: 70%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 7px 7px 7px 7px;">
            <div class="row">
                <div class="col-sm-2">
                    <img src="https://www.cabinetmakerwarehouse.com/wp-content/uploads/9242-gull-grey.jpg" style="float: left; width: 60px; height: 60px;">
                </div>
                <div class="col-sm-8" style="padding-top: 2%;">
                    <h4><b>Lembar Pengesahan</b></h4>
                </div>
                <div class="col-sm-2" style="padding-top: 4%;">
                    <a href="">Open</a>
                </div>
            </div>
        </div>

        <div class="card" style="background-color: white; padding: 5%; margin-bottom: 5%; width: 70%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 7px 7px 7px 7px;">
            <div class="row">
                <div class="col-sm-2">
                    <img src="https://www.cabinetmakerwarehouse.com/wp-content/uploads/9242-gull-grey.jpg" style="float: left; width: 60px; height: 60px;">
                </div>
                <div class="col-sm-8" style="padding-top: 2%;">
                    <h4><b>Kata Pengantar</b></h4>
                </div>
                <div class="col-sm-2" style="padding-top: 4%;">
                    <a href="">Open</a>
                </div>
            </div>
        </div>
        
        <div class="card" style="background-color: white; padding: 5%; margin-bottom: 5%; width: 70%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 7px 7px 7px 7px;">
            <div class="row">
                <div class="col-sm-2">
                    <img src="https://www.cabinetmakerwarehouse.com/wp-content/uploads/9242-gull-grey.jpg" style="float: left; width: 60px; height: 60px;">
                </div>
                <div class="col-sm-8" style="padding-top: 2%;">
                    <h4><b>BAB I Pendahuluan</b></h4>
                </div>
                <div class="col-sm-2" style="padding-top: 4%;">
                    <a href="">Open</a>
                </div>
            </div>
        </div>
        
        <div class="card" style="background-color: white; padding: 5%; margin-bottom: 5%; width: 70%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 7px 7px 7px 7px;">
            <div class="row">
                <div class="col-sm-2">
                    <img src="https://www.cabinetmakerwarehouse.com/wp-content/uploads/9242-gull-grey.jpg" style="float: left; width: 60px; height: 60px;">
                </div>
                <div class="col-sm-8" style="padding-top: 2%;">
                    <h4><b>BAB II Deskripsi Kegiatan</b></h4>
                </div>
                <div class="col-sm-2" style="padding-top: 4%;">
                    <a href="">Open</a>
                </div>
            </div>
        </div>
        
        <div class="card" style="background-color: white; padding: 5%; margin-bottom: 5%; width: 70%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 7px 7px 7px 7px;">
            <div class="row">
                <div class="col-sm-2">
                    <img src="https://www.cabinetmakerwarehouse.com/wp-content/uploads/9242-gull-grey.jpg" style="float: left; width: 60px; height: 60px;">
                </div>
                <div class="col-sm-8" style="padding-top: 2%;">
                    <h4><b>BAB III Rencana Kerja</b></h4>
                </div>
                <div class="col-sm-2" style="padding-top: 4%;">
                    <a href="">Open</a>
                </div>
            </div>
        </div>
        
        <div class="card" style="background-color: white; padding: 5%; margin-bottom: 5%; width: 70%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 7px 7px 7px 7px;">
            <div class="row">
                <div class="col-sm-2">
                    <img src="https://www.cabinetmakerwarehouse.com/wp-content/uploads/9242-gull-grey.jpg" style="float: left; width: 60px; height: 60px;">
                </div>
                <div class="col-sm-8" style="padding-top: 2%;">
                    <h4><b>BAB IV Rencana Anggaran</b></h4>
                </div>
                <div class="col-sm-2" style="padding-top: 4%;">
                    <a href="">Open</a>
                </div>
            </div>
        </div>
        
        <div class="card" style="background-color: white; padding: 5%; margin-bottom: 5%; width: 70%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 7px 7px 7px 7px;">
            <div class="row">
                <div class="col-sm-2">
                    <img src="https://www.cabinetmakerwarehouse.com/wp-content/uploads/9242-gull-grey.jpg" style="float: left; width: 60px; height: 60px;">
                </div>
                <div class="col-sm-8" style="padding-top: 2%;">
                    <h4><b>BAB V Penutup</b></h4>
                </div>
                <div class="col-sm-2" style="padding-top: 4%;">
                    <a href="">Open</a>
                </div>
            </div>
        </div>
        
        <div class="card" style="background-color: white; padding: 5%; margin-bottom: 5%; width: 70%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 7px 7px 7px 7px;">
            <div class="row">
                <div class="col-sm-2">
                    <img src="https://www.cabinetmakerwarehouse.com/wp-content/uploads/9242-gull-grey.jpg" style="float: left; width: 60px; height: 60px;">
                </div>
                <div class="col-sm-8" style="padding-top: 2%;">
                    <h4><b>Lampiran</b></h4>
                </div>
                <div class="col-sm-2" style="padding-top: 4%;">
                    <a href="">Open</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <h4 style="margin: 10% 5% 5% 0%"><b>Select Proker<b></h4>
        <?php $form = ActiveForm::begin(); ?>
        <div class="card" style="background-color: white; padding: 10%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 7px 7px 7px 7px;">
            <?= $form->field($model, 'ID_PROKER')->textInput(['maxlength' => true])->dropDownList(
                ['0' => 'Tidak Aktif', '1' => 'Aktif'])->label('Proker')
            ?>
        </div>
        
        <h4 style="margin: 10% 5% 5% 0%"><b>Rekening Bendahara<b></h4>
        <div class="card" style="background-color: white; padding: 10%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 7px 7px 7px 7px;">
            <?= $form->field($model, 'BANK')->textInput(['maxlength' => true, 'placeholder' => "Bank"]) ?>

            <?= $form->field($model, 'NO_REKENING')->textInput(['maxlength' => true, 'placeholder' => "No. Rek"]) ?>

            <?= $form->field($model, 'ID_TENGGAT_WAKTU')->textInput(['maxlength' => true])->dropDownList(
                ['0' => 'Tidak Aktif', '1' => 'Aktif'])->label('Bendahara')
            ?>
        </div>

        <div class="form-group" style="float: right;margin-top: 8%">
            <?= Html::Button('Back', array(
                    'class' => 'btn btn-primary',
                    'style' => 'width: 100px'
                )
            ) ?>
            <?= Html::submitButton('Save', array(
                    'class' => 'btn btn-primary',
                    'style' => 'width: 100px'
                )
            ) ?>
            <?= Html::submitButton('Submit', array(
                    'class' => 'btn btn-primary',
                    'style' => 'width: 100px'
                )
            ) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
