<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramKerja */

$this->title = 'Create Program Kerja';
$this->params['breadcrumbs'][] = ['label' => 'Program Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-kerja-create">

    <div class="container">
        <h4><b>Program Kerja</b></h4>
        <?= $this->render('_form', [
            'errorMessage' => $errorMessage,
            'model' => $model,
            'row' => $row
        ]) ?>
    </div>

</div>
