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
            'masterPengurusOrganisasi.JABATAN',
            'EMPLID',
            'personalData.NAMA',
            'personalData.EMAIL',
            'personalData.PHONE',
            'personalData.ANGKATAN',
            'personalData.PRODI',
            'masterPeriode.PERIODE',
        ],
    ]);

    ?>

</div>