<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\MasterAlur */

$this->title = 'Detail Alur';
$this->params['breadcrumbs'][] = ['label' => 'Master Alur', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Jenis Dokumen', 'url' => ['master-alur/view' , 'id'=> $id_alur ]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-alur-view">

<div class="container" style="margin-left: 1%">
        <div class="row">
            <div class="col-sm-6">
                <h4 style="margin: 0 5% 5% 0"><b>Detail Alur<b></h4>
                <!-- <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => function ($model, $key, $index, $widget) {
                        return $this->render('_listDetail',['model' => $model]);
                    },
                    'layout' => "{items}{summary}{pager}",
                    'pager' => [
                        'maxButtonCount' => 1,
                        'prevPageLabel' => '<i class="glyphicon glyphicon-chevron-left"></i>',
                        'nextPageLabel' => '<i class="glyphicon glyphicon-chevron-right"></i>',
                    ],
                ]); 
                
                ?> -->

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => '',
                    'tableOptions' => [
                        'class' => 'table table-bordered table-hover table-light',
                        'style' => 'background-color:white;'
                    ],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'jenisAlur.masterAlur.NAMA_ALUR',
                        'jenisAlur.JENIS_DOKUMEN',
                        'DESKRIPSI',
                        'TINGKAT',
                        'PHASE',
                    ],
                ]); 
                ?>

                

            </div>

            <div class="col-sm-6">
                <h4 style="margin: 0 5% 5% 0"><b>Tambah Data<b></h4>
                    <?= $this->render('_formDetail', [
                        'modelDetail' => $modelDetail,
                        'id' => $id,
                        'id_alur' => $id_alur,
                    ]) ?>
            </div>

        </div>
    </div>

</div>
