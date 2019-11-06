<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterDaftarOrganisasi */

$this->title = 'Create Master Daftar Organisasi';
$this->params['breadcrumbs'][] = ['label' => 'Master Daftar Organisasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-daftar-organisasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
