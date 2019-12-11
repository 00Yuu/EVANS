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
            [
                'format' => 'raw',
                'label' => 'File TTD',
                'value' =>function($model, $widget){
                  return  Html::a($model->FILE_TTD, ['master-daftar-organisasi/download', 'filename' => $model->FILE_TTD], ['class' => 'profile-link']); 
                }
            ],
        ],
    ]);

    ?>

</div>