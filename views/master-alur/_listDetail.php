<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<div>

    <?= DetailView::widget([
        'model' => $model,
        'options' => [
            'class' => 'table table-bordered detail-view',
            'style' => 'background-color:white;' 
        ],
        'attributes' => [
            'masterAlur.NAMA_ALUR',
            'DESKRIPSI',
            'TINGKAT',
            'PHASE',
        ],
    ]);

    ?>

</div>