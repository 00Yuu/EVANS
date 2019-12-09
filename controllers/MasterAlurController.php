<?php

namespace app\controllers;

use Yii;
use app\models\MasterAlur;
use app\models\DetailAlur;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterAlurController implements the CRUD actions for MasterAlur model.
 */
class MasterAlurController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MasterAlur models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new MasterAlur();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();

            Yii::$app->session->setFlash('success','Data Tersimpan');
            return $this->redirect(['index']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => MasterAlur::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single MasterAlur model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $modelDetail = new DetailAlur();

        if ($modelDetail->load(Yii::$app->request->post()) && $modelDetail->validate()) {
            $modelDetail->save();

            Yii::$app->session->setFlash('success','Data Tersimpan');
            return $this->refresh();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => DetailAlur::find()->where(['ID_ALUR' => $id]),
            'pagination' => [
                'pageSize' => 1,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID_DETAIL' => SORT_ASC,
                ]
            ]
        ]);

        return $this->render('view', [
            'id' => $id,
            'dataProvider' => $dataProvider,
            'modelDetail' => $modelDetail,
        ]);
    }

    public function actionUpdate()
    {
        $arrayButton = Yii::$app->request->post('updateBtn');

        foreach ($arrayButton as $key => $value) {
            $id_alur = $key;
        }
        
        $arrayStatus = Yii::$app->request->post('selectStatus');

        foreach($arrayStatus as $key => $value){
            if($key == $id_alur){
                $statusUpdate =  $value;
            }
        }

        $sql = "UPDATE EVANS_MASTER_ALUR_TBL 
                SET STATUS = :1 
                WHERE ID_ALUR = :2 ";

        Yii::$app->db->createCommand($sql,[':1' => $statusUpdate, ':2' => $id_alur])->execute();

        Yii::$app->session->setFlash('success','Status Berhasil diubah');
            
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

   
}
