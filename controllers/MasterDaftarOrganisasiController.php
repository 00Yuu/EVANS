<?php

namespace app\controllers;

use Yii;
use app\models\MasterDaftarOrganisasi;
use app\models\MasterPengurusOrganisasi;
use app\models\MasterRinciOrganisasi;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


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

        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
            $model->save();
            // return $this->redirect(['view', 'id' => $model->ID_TENGGAT_WAKTU]);
            return $this->redirect(['index']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => MasterDaftarOrganisasi::find(),
            'pagination' => [
                'pageSize' => 6,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID_ORGANISASI' => SORT_ASC,
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
        $model = new MasterPengurusOrganisasi();
        // $model = MasterDaftarOrganisasi::find()->where(['ID_JENIS' => $id])->all();

        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
            $model->save();
            // return $this->redirect(['view', 'id' => $model->ID_TENGGAT_WAKTU]);
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => MasterPengurusOrganisasi::find()->where(['ID_ORGANISASI' => $id]),
            'pagination' => [
                'pageSize' => 6,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID_PENGURUS' => SORT_ASC,
                ]
            ]
        ]);
        return $this->render('view', [
            'dataProvider' => $dataProvider,
            'model' => $model,
            'id' => $id,
        ]);
    }

    public function actionRinci($id,$id_org){
        $modelRinci = new MasterRinciOrganisasi();

        if($modelRinci->load(Yii::$app->request->post())){
                $file = UploadedFile::getInstance($modelRinci, 'FILE_TTD');

                if($file != null && $modelRinci->EMPLID != null){
                    $FILE_URL = 'ttd_rinci_'  . '.' . $file->extension;

                    $modelRinci->FILE_TTD = $FILE_URL;

                    if ($modelRinci->validate()) {
                      
                        $modelRinci->save();

                        $sql = "SELECT LPAD(EVANS_RINCI_ORGANISASI_SEQ.CURRVAL,5,'0') SEQ FROM DUAL";

                        $result = Yii::$app->db->createCommand($sql)->queryOne();

                        $id_rinci = $result['SEQ'];

                        $FILE_URL = 'ttd_rinci_'  . $id_rinci . '.' . $file->extension;

                        $file->saveAs('uploads/ttd_org/' . $FILE_URL );
        
                        Yii::$app->session->setFlash('success','Data berhasil disimpan');
                    }
                    else{
                        Yii::$app->session->setFlash('error','Data gagal disimpan');
                    }
                }
                else{
                    Yii::$app->session->setFlash('error','Data gagal disimpan');
                }

            return $this->refresh();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => MasterRinciOrganisasi::find()->where(['ID_PENGURUS' => $id]),
            'pagination' => [
                'pageSize' => 1,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID_RINCI' => SORT_ASC,
                ]
            ]
        ]);

        return $this->render('rinci', [
            'dataProvider' => $dataProvider,
            'modelRinci' => $modelRinci,
            'id' => $id,
            'id_org' => $id_org,
        ]);
    }

    public function actionDownload($filename){
        $path = Yii::getAlias('@webroot').'/uploads/ttd_org/'.$filename;
        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path, $filename);
        }
        else{
            Yii::$app->session->setFlash('error','File tidak ditemukan');
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }
    }

    public function actionHome()
    {
        return $this->redirect(Yii::$app->homeUrl);
        

        return $this->render('home', [
        ]);
    }

    /**
     * Creates a new MasterDaftarOrganisasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // $model = new MasterDaftarOrganisasi();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
           
        //     $model->NAMA_ORGANISASI= Yii::$app->request->post('MasterDaftarOrganisasi')['NAMA_ORGANISASI'];

        //     $model->ID_ORGANISASI= Yii::$app->request->post('MasterDaftarOrganisasi')['ID_ORGANISASI'];

        //     $model->ID_JENIS= Yii::$app->request->post('MasterDaftarOrganisasi')['ID_JENIS'];

        //     $model->STATUS= Yii::$app->request->post('MasterDaftarOrganisasi')['STATUS'];
        // }

        // return $this->render('create', [
        //     'model' => $model,
        // ]);
    }

   
    /**
     * Updates an existing MasterDaftarOrganisasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
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

        Yii::$app->db->createCommand($sql,[':1' => $statusUpdate, ':2' => $id_organisasi])->execute();

        Yii::$app->session->setFlash('success','Status Berhasil diubah');
            
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionUpdateStatusListOrganisasi(){
        $arrayButton = Yii::$app->request->post('updateBtn');

        foreach ($arrayButton as $key => $value) {
             $id_pengurus = $key;
         }
         
         $arrayStatus = Yii::$app->request->post('selectStatus');
 
         foreach($arrayStatus as $key => $value){
             if($key == $id_pengurus){
                 $statusUpdate =  $value;
             }
         }
 
         $sql = "UPDATE EVANS_PENGURUS_ORGANISASI_TBL
                 SET STATUS = :1 
                 WHERE ID_PENGURUS = :2";
 
         Yii::$app->db->createCommand($sql,[':1' => $statusUpdate, ':2' => $id_pengurus])->execute();
 
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
