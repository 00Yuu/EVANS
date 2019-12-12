<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterDaftarOrganisasi */

$this->title = "Detail Pengurus";
$this->params['breadcrumbs'][] = ['label' => 'Master Daftar Organisasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'List Organsasi', 'url' => ['master-daftar-organisasi/view' , 'id'=> $id_org ]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-daftar-organisasi-view">
    <div class="container" style="margin-left: 1%">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="row">
            <div class="col-sm-6">
                <h4 style="margin: 0 5% 5% 0"><b>Pengurus Organisasi<b></h4>
                
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => function ($model, $key, $index, $widget) {
                        return $this->render('_listRinci',['model' => $model]);
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
                <h4 style="margin: 0 5% 5% 0"><b>Input Pengurus<b></h4>
                    <?= $this->render('_formRinci', [
                        'modelRinci' => $modelRinci,
                        'id' => $id,
                        'id_org' => $id_org,
                    ]) ?>
            </div>

        </div>
    </div>
        
    
</div>
