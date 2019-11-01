<?php

namespace app\controllers;

use Yii;
use app\models\EVANSMASTERJENISORGANISASI;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EvansMasterJenisController implements the CRUD actions for EVANSMASTERJENISORGANISASI model.
 */
class EvansMasterJenisController extends Controller
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
     * Lists all EVANSMASTERJENISORGANISASI models.
     * @return mixed
     */
    public function actionIndex()
    {
       

        $model = new EVANSMASTERJENISORGANISASI();

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->save();

            Yii::$app->session->setFlash('success','Data Tersimpan');
            
            return $this->refresh();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => EVANSMASTERJENISORGANISASI::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single EVANSMASTERJENISORGANISASI model.
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
     * Creates a new EVANSMASTERJENISORGANISASI model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EVANSMASTERJENISORGANISASI();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->JENIS_ORGANISASI= Yii::$app->request->post('EVANSMASTERJENISORGANISASI')['JENIS_ORGANISASI'];

            $model->ID_JENIS= Yii::$app->request->post('EVANSMASTERJENISORGANISASI')['ID_JENIS'];

            $model->save();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EVANSMASTERJENISORGANISASI model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_JENIS]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EVANSMASTERJENISORGANISASI model.
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
     * Finds the EVANSMASTERJENISORGANISASI model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EVANSMASTERJENISORGANISASI the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EVANSMASTERJENISORGANISASI::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
