<?php

namespace app\controllers;

use Yii;
use app\models\MasterPeriode;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterPeriodeController implements the CRUD actions for MasterPeriode model.
 */
class MasterPeriodeController extends Controller
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
     * Lists all MasterPeriode models.
     * @return mixed
     */
    public function actionIndex()
    {

        $model = new MasterPeriode();
        
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['index']);
        // }

        if ($model->load(Yii::$app->request->post())) {
            if(strtotime(Yii::$app->request->post('MasterPeriode')['START_DATE']) <= strtotime(Yii::$app->request->post('MasterPeriode')['END_DATE'])){
                $model->save();
                return $this->redirect(['index']);
            }
            else{
                $model->addError('END_DATE','Please Enter a Valid End Date');
            }
        }

        $dataProvider = new ActiveDataProvider([
            'query' => MasterPeriode::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single MasterPeriode model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MasterPeriode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // $model = new MasterPeriode();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->ID_PERIODE]);
        // }

        // return $this->render('create', [
        //     'model' => $model,
        // ]);
    }

    /**
     * Updates an existing MasterPeriode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        $arrayButton = Yii::$app->request->post('updateBtn');

        foreach ($arrayButton as $key => $value) {
            $id_periode = $key;
        }
        
        $arrayStatus = Yii::$app->request->post('selectStatus');

        foreach($arrayStatus as $key => $value){
            if($key == $id_periode){
                $statusUpdate =  $value;
            }
        }

        $sql = "UPDATE EVANS_MASTER_PERIODE_TBL 
                SET STATUS = :1 
                WHERE ID_PERIODE = :2 ";

        Yii::$app->db->createCommand($sql,[':1' => $statusUpdate, ':2' => $id_periode])->execute();

        Yii::$app->session->setFlash('success','Status Berhasil diubah');
            
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    /**
     * Deletes an existing MasterPeriode model.
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
     * Finds the MasterPeriode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return MasterPeriode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MasterPeriode::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
