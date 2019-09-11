<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Evanslat1s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evanslat1-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Evanslat1', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TES1',
            'TES2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
