<?php

use yii\helpers\Html;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $model app\models\MasterAlur */

$this->title = 'Detail Alur';
$this->params['breadcrumbs'][] = ['label' => 'Master Alur', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-alur-view">

<div class="container" style="margin-left: 1%">
        <div class="row">
            <div class="col-sm-6">
                <h4 style="margin: 0 5% 5% 0"><b>Detail Alur<b></h4>
                <?= ListView::widget([
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
                
                ?>

            </div>

               

            <div class="col-sm-6">
                <h4 style="margin: 0 5% 5% 0"><b>Tambah Data<b></h4>
                    <?= $this->render('_formDetail', [
                        'modelDetail' => $modelDetail,
                        'id' => $id,
                    ]) ?>
            </div>

        </div>
    </div>

</div>
