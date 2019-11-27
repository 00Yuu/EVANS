<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = '';
?>
<div class="sso">
    <?php
        $form = ActiveForm::begin([
            'id' => 'sso',
            // 'action' => ['site/login-user'],
        ]); 
    ?>
    <div class="form-group ">
        <?= Html::submitButton('admin', ['class' => 'btn btn-primary', 'name'  => 'jabatan', 'value' => 'Admin']) ?>
    </div>

    <div class="form-group ">
        <?= Html::submitButton('DEM Sekretaris', ['class' => 'btn btn-primary', 'name'  => 'jabatan', 'value' => 'DEM Sekretaris']) ?>
    </div>

    <div class="form-group ">
        <?= Html::submitButton('DEM Ketua', ['class' => 'btn btn-primary', 'name'  => 'jabatan', 'value' => 'DEM Ketua']) ?>
    </div>

    <div class="form-group ">
        <?= Html::submitButton('DEM Board 1', ['class' => 'btn btn-primary', 'name'  => 'jabatan', 'value' => 'DEM Board 1']) ?>
    </div>

    <div class="form-group ">
        <?= Html::submitButton('DEM Board 2', ['class' => 'btn btn-primary', 'name'  => 'jabatan', 'value' => 'DEM Board 2']) ?>
    </div>

    <div class="form-group ">
        <?= Html::submitButton('DEM Board 3', ['class' => 'btn btn-primary', 'name'  => 'jabatan', 'value' => 'DEM Board 3']) ?>
    </div>

    <div class="form-group ">
        <?= Html::submitButton('Kaprodi TI', ['class' => 'btn btn-primary', 'name'  => 'jabatan', 'value' => 'Kaprodi TI']) ?>
    </div>

    <div class="form-group ">
        <?= Html::submitButton('Sekretaris Rektor', ['class' => 'btn btn-primary', 'name'  => 'jabatan', 'value' => 'Sekretaris Rektor']) ?>
    </div>

    <div class="form-group ">
        <?= Html::submitButton('BAAK', ['class' => 'btn btn-primary', 'name'  => 'jabatan', 'value' => 'BAAK']) ?>
    </div>

    <div class="form-group ">
        <?= Html::submitButton('Pelapor', ['class' => 'btn btn-primary', 'name'  => 'jabatan', 'value' => 'Pelapor']) ?>
    </div>

    <div class="form-group ">
        <?= Html::submitButton('Telapor', ['class' => 'btn btn-primary', 'name'  => 'jabatan', 'value' => 'Telapor']) ?>
    </div>

    <div class="form-group ">
        <?= Html::submitButton('Student Councel', ['class' => 'btn btn-primary', 'name'  => 'jabatan', 'value' => 'Student Councel']) ?>
    </div>


    <?php ActiveForm::end(); ?>
</div>