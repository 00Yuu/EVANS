<?php

namespace app\controllers;

use Yii;
use app\models\Proposal;
use app\models\HalamanPengesahanProposal;
use app\models\HalamanJudulProposal;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
            return $this->refresh();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionJudul(){
        $model = new HalamanJudulProposal();

        return $this->render('halamanjudul', [
            'model' => $model,
        ]);
    }

    public function actionPengesahan(){
        $model = new HalamanPengesahanProposal();

        return $this->render('pengesahan', [
            'model' => $model,
        ]);
    }

    public function actionPengantar(){
        $model = new Proposal();

        return $this->render('katapengantar', [
            'model' => $model,
        ]);
    }

    public function actionBab1(){
        $model = new Proposal();

        return $this->render('bab1', [
            'model' => $model,
        ]);
    }

    public function actionBab2(){
        $model = new Proposal();

        return $this->render('bab2', [
            'model' => $model,
        ]);
    }

    public function actionBab3(){
        $model = new Proposal();

        return $this->render('bab3', [
            'model' => $model,
        ]);
    }
    public function actionBab5(){
        $model = new Proposal();

        return $this->render('bab5', [
            'model' => $model,
        ]);
    }
    public function actionLampiran(){
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_PROPOSAL]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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
