<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    // public function actions()
    // {
    //     return [
    //         'error' => [
    //             'class' => 'yii\web\ErrorAction',
    //         ],
    //         'captcha' => [
    //             'class' => 'yii\captcha\CaptchaAction',
    //             'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
    //         ],
    //     ];
    // }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTesApaLagi(){
        $sql = "SELECT SYSDATE FROM DUAL";

        $result = Yii::$app->db->createCommand($sql)->queryAll();

        var_dump($result);

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    
    public function actionLoginSso(){
        
        $email_user = '';
        $Jabatan = '';
        if(isset($_POST['email'])){
            $email_user = Yii::$app->request->post()['email'];
            
            $sql = "SELECT DESKRIPSI
            FROM EVANS_PERSONAL_DATA_VIEW
            WHERE EMAIL = '$email_user'
            ";

            $result = Yii::$app->db->createCommand($sql)->queryOne();

            $deskripsi = $result['DESKRIPSI'];

            $session = Yii::$app->session;

            if($session->isActive){

            }else{
                $session->open();
            }
            $session->set('email', $email_user);
            $session->set('jabatan', $deskripsi);

            return $this->redirect(Yii::$app->homeUrl);


            //query ambil namanya dan emplid
            // $sql = "SELECT DESKRIPSI
            // FROM EVANS_PERSONAL_DATA_VIEW
            // WHERE EMAIL = '$email_user'
            // ";

            // $result = Yii::$app->db->createCommand($sql)->queryOne();

            // $deskripsi = $result['DESKRIPSI'];

            // if($deskripsi === 'MAHASISWA'){
            //     $session = Yii::$app->session;

            //     if($session->isActive){

            //     }else{
            //         $session->open();
            //     }
            //     $session->set('email', $email_user);
            //     $session->set('jabatan', $Jabatan);
            //     return $this->redirect(Yii::$app->homeUrl);
            // }
            // else{

            // }

            // $emplid_user = $result['EMPLID'];

            //query ambil jabatannya, jika tidak ada maka di set member

            // $sql = "SELECT jh.EMPLID, NAMA_JABATAN, jh.EFFDT, EMAIL_ADDR
            //         FROM  DEM_MASTER_JABATAN_TBL mj, DEM_JABATAN_HISTORY_TBL jh ,DEM_PERSONAL_DATA pd,  (select id_jabatan, max(effdt) effdt from DEM_JABATAN_HISTORY_TBL where status = '1' group by id_jabatan ) jhh
            //         where mj.ID_JABATAN = jh.ID_JABATAN
            //         and pd.EMPLID = jh.EMPLID
            //         and STATUS = '1' AND TO_CHAR(sysdate,'yyyymmdd') > TO_CHAR(jh.EFFDT,'yyyymmdd')
            //         and jh.effdt = jhh.effdt
            //         and jh.id_jabatan = jhh.id_jabatan
            //         and jh.emplid = '$emplid_user'
            //         ";

            // $list_jabatan = Yii::$app->db->createCommand($sql)->queryOne();
            // var_dump($list_jabatan);
            //jika jabatan nya tidak ada di master struktur hirarki, maka akan menjadi member
            // if($list_jabatan == false){
            //     $jabatan_user = 'Member';
            // }
            // else{
            //     $jabatan_user = $list_jabatan['NAMA_JABATAN'];
            // }

            // $session = Yii::$app->session;

            // if($session->isActive){

            // }else{
            //     $session->open();
            // }

            // $session->set('email', $email_user);

            // $session->set('nama', $nama_user);

            // $session->set('emplid', $emplid_user);

            // $session->set('jabatan', $jabatan_user);

            // return $this->redirect(Yii::$app->homeUrl);
        }

        return $this->render('sso');

        
    }

    public function actionLogoutUser()
    {   
        // CasWrapper::logout(Url::base(true));

        $session = Yii::$app->session;

        // destroys all data registered to a session.
        $session->destroy();

        $session->close();

        return $this->redirect(Yii::$app->homeUrl);

    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
