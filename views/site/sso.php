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

    <?php ActiveForm::end(); ?>
</div>