<?php

namespace app\controllers;

use Yii;
use app\models\MasterTTD;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MasterTtdController implements the CRUD actions for MasterTTD model.
 */
class MasterTtdController extends Controller
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
     * Lists all MasterTTD models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new MasterTTD();
        

        if($model->load(Yii::$app->request->post())){

         
              
                if ($model->validate()) {

                    $model->FILE_TTD = UploadedFile::getInstance($model, 'FILE_TTD');
                    // $FILE_URL = 'Lampiran_TTD_' .  $model->FILE_TTD->baseName  . '.' . $model->FILE_TTD->extension;
                    // $model->FILE_URL = $FILE_URL;
                    $model->FILE_TTD->saveAs('uploads/' .  $model->FILE_TTD->baseName  . '.' . $model->FILE_TTD->extension);
                    $model->save(false);
                }

                
               Yii::$app->session->setFlash('success','File terupload');
         
               return $this->redirect(['index']);
        
            }

           
        
        $dataProvider = new ActiveDataProvider([
            'query' => MasterTTD::find(),
            'pagination' => [
                'pageSize' => 6,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID_TTD' => SORT_ASC,
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

        // public function actionDownload($id){
        //     $download = MasterTTD::findOne($id); 
        //     $path = Yii::getAlias('@webroot').'/uploads/'.$download->FILE_TTD;

        //     if (file_exists($path)) {
        //         //return \Yii::$app->response->sendFile($download->pre_paper,@file_get_contents($path));
        //         return Yii::$app->response->sendFile($path);
        //     }
        //     else{
        //         echo "bablabla";
        //     }
        // }

    /**
     * Displays a single MasterTTD model.
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
     * Creates a new MasterTTD model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MasterTTD();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_TTD]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDownload($filename){
        $path = Yii::getAlias('@webroot').'/uploads/'.$filename;
        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path, $filename);
        }
        else{
            Yii::$app->session->setFlash('error','File tidak ditemukan');
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }
    }


    /**
     * Updates an existing MasterTTD model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        $arrayButton = Yii::$app->request->post('updateBtn');

       foreach ($arrayButton as $key => $value) {
            $id_ttd = $key;
        }
        
        $arrayStatus = Yii::$app->request->post('selectStatus');
        
        foreach($arrayStatus as $key => $value){
            if($key == $id_ttd){
                $statusUpdate =  $value;
            }
        }

        $sql = "UPDATE EVANS_MASTER_TTD_TBL
                SET STATUS = :1 
                WHERE ID_TTD = :2";

        Yii::$app->db->createCommand($sql,[':1' => $statusUpdate, ':2' => $id_ttd])->execute();

        Yii::$app->session->setFlash('success','Status Berhasil diubah');
            
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    /**
     * Deletes an existing MasterTTD model.
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
     * Finds the MasterTTD model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return MasterTTD the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MasterTTD::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
