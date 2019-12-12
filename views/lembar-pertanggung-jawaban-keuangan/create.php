<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LembarPertanggungJawabanKeuangan */

$this->title = 'Lembar Pertanggung Jawaban Keuangan';
$this->params['breadcrumbs'][] = ['label' => 'Monitoring LPK', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lembar-pertanggung-jawaban-keuangan-create">

    
<div class="container">
    <h4><b>Lembar Pertanggung Jawaban Keuangan</b></h4>
    <?= $this->render('_form', [
        'model' => $model,
       
    ]) ?>
    </div>

</div>
