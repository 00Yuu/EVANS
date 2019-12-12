<?php

namespace app\controllers;

use Yii;
use app\models\Proposal;
use app\models\HalamanPengesahanProposal;
use app\models\HalamanJudulProposal;
use app\models\BabI;

use app\models\TransaksiKategori;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MonitoringProposalController implements the CRUD actions for Proposal model.
 */
class MonitoringProposalController extends Controller
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
     * Lists all Proposal models.
     * @return mixed
     */
    public function actionIndex()
    {
        //dataprovider himpunan
        $query_himpunan = Proposal::find()
            ->joinWith('masterRinciOrganisasi.masterPengurusOrganisasi.masterDaftarOrganisasi.masterJenisOrganisasi')
            ->where("JENIS_ORGANISASI = 'Himpunan'");
        
        $dataProvider_himpunan = new ActiveDataProvider([
            'query' => $query_himpunan ,
            'pagination' => [
                'pageSize' => 6,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID_PROPOSAL' => SORT_ASC,
                ]
            ]
        ]);

        //dataprovider UKM/Organisasi
        $query_ukm = Proposal::find()
            ->joinWith('masterRinciOrganisasi.masterPengurusOrganisasi.masterDaftarOrganisasi.masterJenisOrganisasi')
            ->where("JENIS_ORGANISASI = 'UKM/Organisasi'");
        
        $dataProvider_ukm = new ActiveDataProvider([
            'query' => $query_ukm ,
            'pagination' => [
                'pageSize' => 6,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID_PROPOSAL' => SORT_ASC,
                ]
            ]
        ]);

        //dataprovider KPU
        $query_kpu = Proposal::find()
            ->joinWith('masterRinciOrganisasi.masterPengurusOrganisasi.masterDaftarOrganisasi.masterJenisOrganisasi')
            ->where("JENIS_ORGANISASI = 'KPU'");
        
        $dataProvider_kpu = new ActiveDataProvider([
            'query' => $query_kpu ,
            'pagination' => [
                'pageSize' => 6,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID_PROPOSAL' => SORT_ASC,
                ]
            ]
        ]);

        return $this->render('index', [
            'dataProvider_ukm' => $dataProvider_ukm,
            'dataProvider_himpunan' => $dataProvider_himpunan,
            'dataProvider_kpu' => $dataProvider_kpu,
        ]);
    }

    /**
     * Displays a single Proposal model.
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
     * Creates a new Proposal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Proposal();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->ID_PROPOSAL]);
        // }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if(Yii::$app->request->post('submit1')==='save'){
                $model->STATUS_DRAFT = '1';
            }
            else{
                $model->STATUS_DRAFT = '0'; 
            }
            
            $model->save();

            $id_proposal = $model->getCurrIdProposal();

            return $this->redirect(['update', 'id' => $id_proposal]);
            // return $this->refresh();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionJudul($id){
        $model = new HalamanJudulProposal();

        return $this->render('halamanjudul', [
            'model' => $model,
        ]);
    }

    public function actionPengesahan($id){
        $model = new HalamanPengesahanProposal();

        return $this->render('pengesahan', [
            'model' => $model,
        ]);
    }

    public function actionPengantar($id){
        $model = new Proposal();

        return $this->render('katapengantar', [
            'model' => $model,
        ]);
    }

    public function actionBab1($id){
        $model = new BabI();
        
        $sql = "SELECT FILE_BAB_1 FROM EVANS_HAL_PENDHLUAN_PRPSL_TBL
                WHERE ID_PROPOSAL = '$id'";
        
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        
        // ada file nya
        if($result != false){
            $file_bab_1 = $result['FILE_BAB_1'];
        }
        else{//gak ada file nya
            $file_bab_1 = '';
        }

        if($model->load(Yii::$app->request->post())  ){
            $model->FILE_BAB_1 = UploadedFile::getInstance($model, 'FILE_BAB_1');

            if($model->FILE_BAB_1 != null){
                $FILE_URL = 'Proposal_' . $model->ID_PROPOSAL  . '_Bab_1.' . $model->FILE_BAB_1->extension;

                $model->FILE_BAB_1->saveAs('uploads/proposal/' . $FILE_URL );

                $model->FILE_BAB_1 = $FILE_URL;
                //jika file nya belom ada, maka insert ke database. jika sudah hanya ganti file nya di folder proposal
                if($file_bab_1 == ''){
                    if ($model->validate()) {
                  
                        $model->save();
                        
                        Yii::$app->session->setFlash('success','File berhasil disimpan');
                    }
                    else{
                        Yii::$app->session->setFlash('error','File gagal disimpan');
                    }
                }else{
                    Yii::$app->session->setFlash('success','File berhasil disimpan');
                }
                
            }
            else{
                Yii::$app->session->setFlash('error','File gagal disimpan');
            }
            return $this->refresh();
            
        }

        return $this->render('bab1', [
            'model' => $model,
            'id' => $id,
            'file_bab_1' => $file_bab_1,
        ]);
    }

    public function actionBab2($id){
        $model = new Proposal();

        return $this->render('bab2', [
            'model' => $model,
        ]);
    }

    public function actionBab3($id){
        $model = new Proposal();

        return $this->render('bab3', [
            'model' => $model,
        ]);
    }

    public function actionBab4($id){
        $model_kategori = new TransaksiKategori();

        $placeholder = new \yii\base\DynamicModel([
            'JENIS_ANGGARAN', 'KATEGORI'
        ]);
        $placeholder->addRule(['JENIS_ANGGARAN', 'KATEGORI'], 'required');

        if($model_kategori->load(Yii::$app->request->post()) && $model_kategori->validate() ){
            $model_kategori->save();

            Yii::$app->session->setFlash('success','Anggaran berhasil disimpan');

            return $this->refresh();
        }

        $query = TransaksiKategori::find()->where(['ID_PROPOSAL' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID_PROPOSAL' => SORT_ASC,
                ]
            ]
        ]);

        return $this->render('bab4', [
            'dataProvider' => $dataProvider,
            'model_kategori' => $model_kategori,
            'placeholder' => $placeholder,
            'id' => $id,
        ]);
    }

    public function actionBab5($id){
        $model = new Proposal();

        return $this->render('bab5', [
            'model' => $model,
        ]);
    }
    public function actionLampiran($id){
        $model = new Proposal();

        return $this->render('lampiran', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Proposal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if(Yii::$app->request->post('submit1')==='save'){
                $model->STATUS_DRAFT = '1';

                $model->save();
                Yii::$app->session->setFlash('success','Simpan data berhasil');
            }
            else{
                $sql_judul = "SELECT * FROM EVANS_HAL_JUDUL_PROPOSAL_TBL WHERE ID_PROPOSAL = '$id'";

                $result_judul = Yii::$app->db->createCommand($sql_judul)->queryAll();

                if($result_judul == null){
                    Yii::$app->session->setFlash('error','Tidak ada file Halaman Judul');

                    return $this->refresh();
                }

                $sql_pengesahan = "SELECT * FROM EVANS_HAL_PENGESAHAN_PRPSL_TBL WHERE ID_PROPOSAL = '$id'";

                $result_pengensahan = Yii::$app->db->createCommand($sql_pengesahan)->queryAll();

                if($result_pengensahan == null){
                    Yii::$app->session->setFlash('error','Mohon pastikan data di halaman pengesahan dan tekan tombol Save');

                    return $this->refresh();
                }

                $sql_pengantar = "SELECT * FROM EVANS_HAL_PENGANTAR_PRPRSL_TBL WHERE ID_PROPOSAL = '$id'";

                $result_pengantar = Yii::$app->db->createCommand($sql_pengantar)->queryAll();

                if($result_pengantar == null){
                    Yii::$app->session->setFlash('error','Tidak ada file Kata Pengantar');

                    return $this->refresh();
                }

                $sql_bab1 = "SELECT * FROM EVANS_HAL_PENDHLUAN_PRPSL_TBL WHERE ID_PROPOSAL = '$id'";

                $result_bab1 = Yii::$app->db->createCommand($sql_bab1)->queryAll();

                if($result_bab1 == null){
                    Yii::$app->session->setFlash('error','Tidak ada file Bab 1');

                    return $this->refresh();
                }

                $sql_bab2 = "SELECT * FROM EVANS_HAL_DESKRIPSI_PRPSL_TBL WHERE ID_PROPOSAL = '$id'";

                $result_bab2 = Yii::$app->db->createCommand($sql_bab2)->queryAll();

                if($result_bab2 == null){
                    Yii::$app->session->setFlash('error','Tidak ada file Bab 2');

                    return $this->refresh();
                }

                $sql_bab3 = "SELECT * FROM EVANS_HAL_RENCANA_PRPSL_TBL WHERE ID_PROPOSAL = '$id'";

                $result_bab3 = Yii::$app->db->createCommand($sql_bab3)->queryAll();

                if($result_bab3 == null){
                    Yii::$app->session->setFlash('error','Tidak ada file Bab 3');

                    return $this->refresh();
                }

                $sql_bab4 = "SELECT * FROM EVANS_TRANS_KATEGORI_TBL WHERE ID_PROPOSAL = '$id'";

                $result_bab4 = Yii::$app->db->createCommand($sql_bab4)->queryAll();

                if($result_bab4 == null){
                    Yii::$app->session->setFlash('error','Tidak ada data di Bab 4');

                    return $this->refresh();
                }

                $sql_bab5 = "SELECT * FROM EVANS_HAL_PENUTUP_PRPSL_TBL WHERE ID_PROPOSAL = '$id'";

                $result_bab5 = Yii::$app->db->createCommand($sql_bab5)->queryAll();

                if($result_bab5 == null){
                    Yii::$app->session->setFlash('error','Tidak ada file Bab 5');

                    return $this->refresh();
                }

                $sql_lampiran = "SELECT * FROM EVANS_HAL_LAMPIRAN_PRPSL_TBL WHERE ID_PROPOSAL = '$id'";

                $result_lampiran = Yii::$app->db->createCommand($sql_lampiran)->queryAll();

                if($result_lampiran == null){
                    Yii::$app->session->setFlash('error','Tidak ada file Lampiran');

                    return $this->refresh();
                }

                $model->STATUS_DRAFT = '0'; 

                $model->save();

                $session = Yii::$app->session;

                $jns_org = $session->get('jns_org');

                $sql = "SELECT da.ID_DETAIL
                        FROM EVANS_MASTER_ALUR_TBL ma
                        JOIN EVANS_JENIS_ALUR_TBL ja ON (ja.ID_ALUR = ma.ID_ALUR)
                        JOIN EVANS_DETAIL_ALUR_TBL da on (da.ID_JENIS_ALUR = ja.ID_JENIS_ALUR)
                        WHERE ma.NAMA_ALUR = '$jns_org'
                        AND ja.JENIS_DOKUMEN = 'Proposal'
                        AND ja.STATUS = '1'
                        AND da.TINGKAT = '0'
                        AND da.DESKRIPSI LIKE '%Waiting%'
                        ";
                
                $result = Yii::$app->db->createCommand($sql)->queryOne();
        
                $id_detail =  $result['ID_DETAIL'];

                $sql_insert = "INSERT INTO EVANS_TRANS_ALUR_PRPSL_TBL
                                VALUES ('99999',:1,:2,sysdate)";

                Yii::$app->db->createCommand($sql_insert,[
                    ':1' => $id, 
                    ':2' => $id_detail,
                ])->execute();

                Yii::$app->session->setFlash('success','Suubmit proposal berhasil');
            }
            
            return $this->refresh();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDownload($filename){
        $path = Yii::getAlias('@webroot').'/uploads/proposal/'.$filename;
        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path, $filename);
        }
        else{
            Yii::$app->session->setFlash('error','File tidak ditemukan');
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }
    }

    public function actionSusunanKepanitian($id){

    }

    public function actionDeleteAnggaran($id){
        $sql = "DELETE FROM EVANS_TRANS_KATEGORI_TBL
                WHERE ID_TRANS_KATEGORI = :1
                ";

        Yii::$app->db->createCommand($sql,[':1' => $id])->execute();

        Yii::$app->session->setFlash('success','Anggaran berhasil dihapus');

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionFindKategori(){
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $id_jenis = $parents[0];
                $sql = "SELECT DISTINCT KATEGORI as ".'"id"'.", KATEGORI as ".'"name"'."
                        FROM EVANS_MSTR_KATEGORI_TBL
                        WHERE ID_JENIS = '$id_jenis' 
                        ";
                $out = Yii::$app->db->createCommand($sql)->queryAll();

                return ['output'=> $out, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

    public function actionFindSumber(){
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $jenis = empty($ids[0]) ? null : $ids[0];
            $kategori = empty($ids[1]) ? null : $ids[1];
            if ($kategori != null) {
                $sql = "SELECT ID_KATEGORI as ".'"id"'.", DESKRIPSI as ".'"name"'."
                        FROM EVANS_MSTR_KATEGORI_TBL
                        WHERE ID_JENIS = '$jenis'  AND KATEGORI = '$kategori'
                        ";
                $out = Yii::$app->db->createCommand($sql)->queryAll();

                return ['output'=> $out, 'selected'=>'']; 
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

    /**
     * Deletes an existing Proposal model.
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
     * Finds the Proposal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Proposal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Proposal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
