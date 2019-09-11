<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EVANSLAT1 */

$this->title = 'Create Evanslat1';
$this->params['breadcrumbs'][] = ['label' => 'Evanslat1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evanslat1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
