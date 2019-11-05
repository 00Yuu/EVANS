<?php

namespace app\controllers;

use Yii;
use app\models\MasterDaftarOrganisasi;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterDaftarOrganisasiController implements the CRUD actions for MasterDaftarOrganisasi model.
 */
class MasterDaftarOrganisasiController extends Controller
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
     * Lists all MasterDaftarOrganisasi models.
     * @return mixed
     */
    public function actionIndex()
    {

        $model = new MasterDaftarOrganisasi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->ID_TENGGAT_WAKTU]);
            return $this->redirect(['index']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => MasterDaftarOrganisasi::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single MasterDaftarOrganisasi model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {  
        $model = new MasterDaftarOrganisasi();
        // $model = MasterDaftarOrganisasi::find()->where(['ID_JENIS' => $id])->all();

        $dataProvider = new ActiveDataProvider([
            'query' => MasterDaftarOrganisasi::find()->where(['ID_JENIS' => $id]),
            'pagination' => [
                'pageSize' => 1,
            ],
            'sort' => [
                'defaultOrder' => [
                    'EFFDT' => SORT_DESC,
                ]
            ]
        ]);
        return $this->render('view', [
            'dataProvider' => $dataProvider,
            'model' => $model,
            'id' => $id,
        ]);
    }

    /**
     * Creates a new MasterDaftarOrganisasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MasterDaftarOrganisasi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->NAMA_ORGANISASI= Yii::$app->request->post('MasterDaftarOrganisasi')['NAMA_ORGANISASI'];

            $model->ID_ORGANISASI= Yii::$app->request->post('MasterDaftarOrganisasi')['ID_ORGANISASI'];

            $model->ID_JENIS= Yii::$app->request->post('MasterDaftarOrganisasi')['ID_JENIS'];

            $model->STATUS= Yii::$app->request->post('MasterDaftarOrganisasi')['STATUS'];
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MasterDaftarOrganisasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $arrayButton = Yii::$app->request->post('updateBtn');

       foreach ($arrayButton as $key => $value) {
            $id_organisasi = $key;
        }
        
        $arrayStatus = Yii::$app->request->post('selectStatus');

        foreach($arrayStatus as $key => $value){
            if($key == $id_organisasi){
                $statusUpdate =  $value;
            }
        }

        $sql = "UPDATE EVANS_DAFTAR_ORGANISASI_TBL
                SET STATUS = :1 
                WHERE ID_ORGANISASI = :2";

        Yii::$app->db->createCommand($sql,[':1' => $statusUpdate, ':2' => $id_periode])->execute();

        Yii::$app->session->setFlash('success','Status Berhasil diubah');
            
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    /**
     * Deletes an existing MasterDaftarOrganisasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MasterDaftarOrganisasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return MasterDaftarOrganisasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MasterDaftarOrganisasi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
