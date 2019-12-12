<?php

namespace app\controllers;

use Yii;
use app\models\LembarPertanggungJawabanKeuangan;
use app\models\ListLembarPertanggungJawabanKeuangan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LembarPertanggungJawabanKeuanganController implements the CRUD actions for LembarPertanggungJawabanKeuangan model.
 */
class LembarPertanggungJawabanKeuanganController extends Controller
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
     * Lists all LembarPertanggungJawabanKeuangan models.
     * @return mixed
     */
    public function actionIndex()
    {

        $model = new LembarPertanggungJawabanKeuangan();

       

        $dataProvider = new ActiveDataProvider([
            'query' => LembarPertanggungJawabanKeuangan::find(),
            'pagination' => [
                'pageSize' => 8,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID_LPK' => SORT_ASC,
                ]
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    public function actionHome()
    {
        return $this->redirect(Yii::$app->homeUrl);
        

    return $this->render('home', [
        ]);
    }

    /**
     * Displays a single LembarPertanggungJawabanKeuangan model.
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

    public function actionViewList(){
        $model = new ListLembarPertanggungJawabanKeuangan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            // return $this->redirect(['view', 'id' => $model->ID_TENGGAT_WAKTU]);
            return $this->redirect(['index']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => ListLembarPertanggungJawabanKeuangan::find(),
        ]);

        return $this->render('viewList', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Creates a new LembarPertanggungJawabanKeuangan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LembarPertanggungJawabanKeuangan();

        

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if(strtotime(Yii::$app->request->post('LembarPertanggungJawabanKeuangan')['TANGGAL_BON']) 
            <= strtotime(Yii::$app->request->post('LembarPertanggungJawabanKeuangan')['TANGGAL_PENYELESAIAN_BON'])){
                if(Yii::$app->request->post('button1')==='save'){
                    $model->STATUS_DRAFT = '1';
                    Yii::$app->session->setFlash('success','LPK SAVED');
                }
                else{
                    $model->STATUS_DRAFT = '0'; 
                    Yii::$app->session->setFlash('success','LPK SUBMITTED');
                }
    
                $model->save();
                return $this->redirect(['create']);
            }
            else{
                $model->addError('TANGGAL_PENYELESAIAN_BON','Please Enter a Valid End Date');
            }
          
          
            
            // return $this->redirect(['view', 'id' => $model->ID_TENGGAT_WAKTU]);
           
        }

        return $this->render('create', [
            'model' => $model,
            
        ]);
    }

    public function actionCreateList(){
        $model = new ListLembarPertanggungJawabanKeuangan();

        $row = array();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            // return $this->redirect(['view', 'id' => $model->ID_TENGGAT_WAKTU]);
            return $this->redirect(['index']);
        }

        // $dataProvider = new ActiveDataProvider([
        //     'query' => ListLembarPertanggungJawabanKeuangan::find()->where(['ID_LIST_LPK' => $id]),
        //     'pagination' => [
        //         'pageSize' => 6,
        //     ],
        //     'sort' => [
        //         'defaultOrder' => [
        //             'ID_PENGURUS' => SORT_ASC,
        //         ]
        //     ]
        // ]);

        return $this->render('createList', [
            'model' => $model,
            'row' => $row
        ]);
    }

    /**
     * Updates an existing LembarPertanggungJawabanKeuangan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_LPK]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LembarPertanggungJawabanKeuangan model.
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
     * Finds the LembarPertanggungJawabanKeuangan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return LembarPertanggungJawabanKeuangan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LembarPertanggungJawabanKeuangan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
