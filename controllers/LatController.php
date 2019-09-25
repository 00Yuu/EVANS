<?php

namespace app\controllers;

use Yii;
use app\models\EVANSLAT1;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LatController implements the CRUD actions for EVANSLAT1 model.
 */
class LatController extends Controller
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
     * Lists all EVANSLAT1 models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $dataProvider = new ActiveDataProvider([
        //     'query' => EVANSLAT1::find(),
        // ]);

        return $this->render('index', [
            // 'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EVANSLAT1 model.
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
     * Creates a new EVANSLAT1 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new EVANSLAT1();

        if($model->load(Yii::$app->request->post())){
            
            // echo "<br><br><br><br><br><br><br><br>";

            // var_dump(Yii::$app->request->post());
            // var_dump($model);
            
            
            $model->TES1 = Yii::$app->request->post('EVANSLAT1')['TES1'];

            $model->PK = '3';

            // var_dump($model);

            $model->save();
        }   

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EVANSLAT1 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->TES1]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EVANSLAT1 model.
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
     * Finds the EVANSLAT1 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EVANSLAT1 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EVANSLAT1::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
