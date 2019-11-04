<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramKerja */

$this->title = 'Create Program Kerja';
$this->params['breadcrumbs'][] = ['label' => 'Program Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-kerja-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
