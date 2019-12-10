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
        <?= Html::submitButton('Admin', ['class' => 'btn btn-primary', 'name'  => 'email', 'value' => 'lord@umn.ac.id']) ?>
    </div>

    <div class="form-group ">
        <?= Html::submitButton('Mahasiswa', ['class' => 'btn btn-primary', 'name'  => 'email', 'value' => 'sarukdunu@umn.ac.id']) ?>
    </div>

    <div class="form-group ">
        <?= Html::submitButton('Student Development', ['class' => 'btn btn-primary', 'name'  => 'email', 'value' => 'jabatsanto@umn.ac.id']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>