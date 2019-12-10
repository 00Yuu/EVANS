<?php

namespace app\controllers;

use Yii;
use app\models\MasterAlur;
use app\models\JenisAlur;
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
            'pagination' => [
                'pageSize' => 6,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID_ALUR' => SORT_ASC,
                ]
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        $modelJenis = new JenisAlur();

        if ($modelJenis->load(Yii::$app->request->post()) && $modelJenis->validate()) {
            $modelJenis->save();

            Yii::$app->session->setFlash('success','Data Tersimpan');
            return $this->refresh();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => JenisAlur::find()->where(['ID_ALUR' => $id]),
            'pagination' => [
                'pageSize' => 6,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID_JENIS_ALUR' => SORT_ASC,
                ]
            ]
        ]);

        return $this->render('view', [
            'id' => $id,
            'dataProvider' => $dataProvider,
            'modelJenis' => $modelJenis,
        ]);
    }

    public function actionDetail($id,$id_alur)
    {
        $modelDetail = new DetailAlur();

        if ($modelDetail->load(Yii::$app->request->post()) && $modelDetail->validate()) {
            $modelDetail->save();

            Yii::$app->session->setFlash('success','Data Tersimpan');
            return $this->refresh();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => DetailAlur::find()->where(['ID_JENIS_ALUR' => $id]),
            'pagination' => [
                'pageSize' => 1,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID_DETAIL' => SORT_ASC,
                ]
            ]
        ]);

        return $this->render('detail', [
            'id' => $id,
            'id_alur' => $id_alur,
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

    public function actionUpdateJenis()
    {
        $arrayButton = Yii::$app->request->post('updateBtn');

        foreach ($arrayButton as $key => $value) {
            $id_jenis_alur = $key;
        }
        
        $arrayStatus = Yii::$app->request->post('selectStatus');

        foreach($arrayStatus as $key => $value){
            if($key == $id_jenis_alur){
                $statusUpdate =  $value;
            }
        }

        $sql = "UPDATE EVANS_JENIS_ALUR_TBL 
                SET STATUS = :1 
                WHERE ID_JENIS_ALUR = :2 ";

        Yii::$app->db->createCommand($sql,[':1' => $statusUpdate, ':2' => $id_jenis_alur])->execute();

        Yii::$app->session->setFlash('success','Status Berhasil diubah');
            
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

   
}
