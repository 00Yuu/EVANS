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


        if ($model->load(Yii::$app->request->post())) {
            $FILE = UploadedFile::getInstance($model, 'FILE_TTD');
            
            if($model->FILE_TTD && $model->validate()){
                $model->FILE_TTD->saveAs('uploads/' . $model->FILE_TTD->baseName . '.' . $model->FILE_TTD->extension);

                // $model->save();
                // if (!empty($FILE)) {
                //     $FILE->saveAs(Yii::getAlias('Upload/') . 'File.' . $FILE_TTD->extension);
                //     $model->FILE_TTD = 'FILE.' . $FILE_TTD->extension;
                //     $model->save();
                // }
            }
            // return $this->redirect(['view', 'id' => $model->ID_TENGGAT_WAKTU]);
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

    /**
     * Updates an existing MasterTTD model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_TTD]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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
