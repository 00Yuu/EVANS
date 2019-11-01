<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EVANSMASTERJENISORGANISASI */

$this->title = 'Create Evansmasterjenisorganisasi';
$this->params['breadcrumbs'][] = ['label' => 'Evansmasterjenisorganisasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evansmasterjenisorganisasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
