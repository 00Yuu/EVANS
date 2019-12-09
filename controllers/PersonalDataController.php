<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\PersonalData;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\db\Query;

class PersonalDataController extends \yii\web\Controller
{
    public function actionNimMahasiswa($q = null, $id = null){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['EMPLID' => '', 'NAMA' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('EMPLID as id ,NAMA as text ')
                ->from('EVANS_PERSONAL_DATA_VIEW')
                ->where("lower(EMPLID||NAMA||PHONE||EMAIL) LIKE lower('%". $q  ."%')")
                ->andWhere("length(EMPLID) >= 10");
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['EMPLID' => $id, 'NAME' => PersonalData::find($id)->NAMA];
        }
        return $out;
    }   

}
