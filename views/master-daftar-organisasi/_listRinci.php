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
            [
                'label' => 'Nama',
                'value' => '',
            ],
            [
                'label' => 'Email',
                'value' => '',
            ],
            [
                'label' => 'Phone',
                'value' => '',
            ],
            [
                'label' => 'Angkatan',
                'value' => '',
            ],
            [
                'label' => 'Prodi',
                'value' => '',
            ],
            'masterPeriode.PERIODE',

        ],
    ]);

    ?>

</div>