<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterAlur */

$this->title = 'Create Master Alur';
$this->params['breadcrumbs'][] = ['label' => 'Master Alurs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-alur-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
