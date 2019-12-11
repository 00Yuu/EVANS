<?php

namespace app\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "EVANS_PROGRAM_KERJA_TBL".
 *
 * @property string $ID_PROKER
 * @property string $ID_RINCI
 * @property string $ID_TENGGAT_WAKTU
 * @property string $BENTUK_PROKER
 * @property string $NAMA_KEGIATAN
 * @property string $TINGKAT_KEGIATAN
 * @property string $DANA
 * @property string $START_DATE
 * @property string $END_DATE
 * @property string $TEMPAT_PELAKSANAAN
 * @property string $JUMLAH_PESERTA
 * @property string $TUJUAN_KEGIATAN
 * @property string $FEEDBACK
 * @property string $STATUS_DRAFT
 */
class ProgramKerja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_PROGRAM_KERJA_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_PROKER', 'ID_RINCI', 'ID_TENGGAT_WAKTU', 'BENTUK_PROKER', 'NAMA_KEGIATAN', 'TINGKAT_KEGIATAN', 'DANA', 'START_DATE', 'END_DATE', 'TEMPAT_PELAKSANAAN', 'JUMLAH_PESERTA', 'TUJUAN_KEGIATAN', 'STATUS_DRAFT'], 'required'],
            // [['DANA', 'JUMLAH_PESERTA'], 'number'],
            // [['ID_PROKER', 'ID_RINCI', 'ID_TENGGAT_WAKTU'], 'string', 'max' => 5],
            // [['BENTUK_PROKER', 'TINGKAT_KEGIATAN'], 'string', 'max' => 50],
            // [['NAMA_KEGIATAN'], 'string', 'max' => 200],
            // [['TEMPAT_PELAKSANAAN'], 'string', 'max' => 150],
            [['TUJUAN_KEGIATAN'], 'string', 'max' => 500],
            // [['FEEDBACK'], 'string', 'max' => 4000],
            // [['STATUS_DRAFT'], 'string', 'max' => 1],
            // [['ID_PROKER'], 'unique'],
            // [['START_DATE', 'END_DATE'], 'date'],
        ];
    }

    // public function validateDates($attribute){
    //     $this->addError($attribute,'You are not allowed to see research Articles');
    //     $end_date = strtotime($this->END_DATE);
    //     $start_date = strtotime($this->START_DATE);
    //     var_dump($start_date);
    //     echo '<script>console.log("HAHA")</script>';
    //     // if(strtotime($this->END_DATE) <= strtotime($this->START_DATE)){
    //     //     $this->addError('START_DATE','Please give correct Start and End dates');
    //     //     $this->addError('END_DATE','Please give correct Start and End dates');
    //     // }
    // }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_PROKER' => 'Id Proker',
            'ID_RINCI' => 'Id Rinci',
            'ID_TENGGAT_WAKTU' => 'Id Tenggat Waktu',
            'BENTUK_PROKER' => 'Bentuk Proker',
            'NAMA_KEGIATAN' => 'Nama Kegiatan',
            'TINGKAT_KEGIATAN' => 'Tingkat Kegiatan',
            'DANA' => 'Dana',
            'START_DATE' => 'Start Date',
            'END_DATE' => 'End Date',
            'TEMPAT_PELAKSANAAN' => 'Tempat Pelaksanaan',
            'JUMLAH_PESERTA' => 'Jumlah Peserta',
            'TUJUAN_KEGIATAN' => 'Tujuan Kegiatan',
            'FEEDBACK' => 'Feedback',
            'STATUS_DRAFT' => 'Status Draft',
        ];
    }

    public function getBentukKegiatan(){
        $sql = "SELECT ID_BENTUK_KEGIATAN, BENTUK_KEGIATAN FROM EVANS_MSTR_BENTUK_KEGIATAN_TBL";
        $BentukKegiatan = Yii::$app->db->createCommand($sql)->queryAll();

        return ArrayHelper::map($BentukKegiatan, 'ID_BENTUK_KEGIATAN','BENTUK_KEGIATAN');
    }

    public function getCurrentKegiatan($id){
        $sql = "SELECT ID_BENTUK_KEGIATAN FROM EVANS_BENTUK_KEGIATAN_TBL WHERE ID_PROKER = '$id'";
        $BentukKegiatan = Yii::$app->db->createCommand($sql)->queryAll();

        return ArrayHelper::map($BentukKegiatan, 'ID_BENTUK_KEGIATAN','');
    }

    public function updateProker($data, $id, $_type){
        $bentukProker = $data['BENTUK_PROKER'];
        $nama = $data['NAMA_KEGIATAN'];
        $tingkat = $data['TINGKAT_KEGIATAN'];
        $dana = $data['DANA'];
        $startDate = $data['START_DATE'];
        $endDate = $data['END_DATE'];
        $tempat = $data['TEMPAT_PELAKSANAAN'];
        $jumlah = $data['JUMLAH_PESERTA'];
        $tujuan = $data['TUJUAN_KEGIATAN'];

        if($_type==='save'){
            $draft = '1';
        }
        else{
            $draft = '0';
        }

        $sql = "UPDATE EVANS_PROGRAM_KERJA_TBL 
                set 
                BENTUK_PROKER = '$bentukProker',
                NAMA_KEGIATAN = '$nama',
                TINGKAT_KEGIATAN = '$tingkat',
                DANA = '$dana',
                START_DATE = '$startDate',
                END_DATE = '$endDate',
                TEMPAT_PELAKSANAAN = '$tempat',
                JUMLAH_PESERTA = '$jumlah',
                TUJUAN_KEGIATAN = '$tujuan',
                STATUS_DRAFT = '$draft'
                WHERE ID_PROKER = '$id'";

        Yii::$app->db->createCommand($sql)->execute();
    }
    
    public function getSeqValue(){
        $value = Yii::$app->db->createCommand('SELECT LPAD(EVANS_PROGRAM_KERJA_SEQ.CURRVAL,5,0) FROM DUAL')->queryOne();
        // return ArrayHelper::map($value, '','LPAD(EVANS_PROGRAM_KERJA_SEQ.CURRVAL,5,0)');
        return $value;
    }

    public function deleteBentukKegiatan($id){
        Yii::$app->db->createCommand("DELETE FROM EVANS_BENTUK_KEGIATAN_TBL WHERE ID_PROKER = '$id'")->execute();
    }

    public function insertIntoTransAlur($id_proker){
        $session = Yii::$app->session;

        $id_proker = $id_proker;
        $jns_org = $session->get('jns_org');

        $sql = "SELECT ID_DETAIL
        From EVANS_DETAIL_ALUR_TBL da
        Join EVANS_JENIS_ALUR_TBL ja on ja.ID_JENIS_ALUR=da.ID_JENIS_ALUR
        Join EVANS_MASTER_ALUR_TBL ma on ma.ID_ALUR=ja.ID_ALUR
        WHERE ma.NAMA_ALUR = '$jns_org' AND ja.JENIS_DOKUMEN='Proker' AND da.DESKRIPSI='Waiting Approval'";

        $result2 = Yii::$app->db->createCommand($sql)->queryOne();
        
        $id_detail = $result2['ID_DETAIL'];

        $sql = "SELECT TO_CHAR
        (SYSDATE, 'DD-MON-YYYY') AS TGGL
         FROM DUAL";

        $result3 = Yii::$app->db->createCommand($sql)->queryOne();

        $insert_date = $result3['TGGL'];

        $sql = "INSERT INTO EVANS_TRANS_ALUR_PROKER_TBL
        VALUES('99', '$id_proker', '$id_detail', '$insert_date')";

        Yii::$app->db->createCommand($sql)->execute();
    }

    public function insertIntoTransAlurReviewer($id_proker, $status){
        $sql = "SELECT ID_RINCI
            from EVANS_PROGRAM_KERJA_TBL
            where ID_PROKER = '$id_proker'";

            $result1 = Yii::$app->db->createCommand($sql)->queryOne();
            $id_rinci = $result1['ID_RINCI'];


        $sql = "SELECT JENIS_ORGANISASI
            From EVANS_RINCI_ORGANISASI_TBL r
            Join EVANS_PENGURUS_ORGANISASI_TBL p on p.ID_PENGURUS=r.ID_PENGURUS
            Join EVANS_DAFTAR_ORGANISASI_TBL do on do.ID_ORGANISASI=p.ID_ORGANISASI
            Join EVANS_MSTR_JNS_ORGANISASI_TBL jo on jo.ID_JENIS=do.ID_JENIS
            WHERE r.ID_RINCI = '$id_rinci'";

            $result2 = Yii::$app->db->createCommand($sql)->queryOne();
            $jns_org = $result2['JENIS_ORGANISASI'];

        if($status === 'approve'){
            $sql = "SELECT ID_DETAIL
            From EVANS_DETAIL_ALUR_TBL da
            Join EVANS_JENIS_ALUR_TBL ja on ja.ID_JENIS_ALUR=da.ID_JENIS_ALUR
            Join EVANS_MASTER_ALUR_TBL ma on ma.ID_ALUR=ja.ID_ALUR
            WHERE ma.NAMA_ALUR = '$jns_org' AND ja.JENIS_DOKUMEN='Proker' AND da.DESKRIPSI='Approved'";
    
            $result = Yii::$app->db->createCommand($sql)->queryOne();
            
            $id_detail = $result['ID_DETAIL'];

        }
        else{
            $sql = "SELECT ID_DETAIL
            From EVANS_DETAIL_ALUR_TBL da
            Join EVANS_JENIS_ALUR_TBL ja on ja.ID_JENIS_ALUR=da.ID_JENIS_ALUR
            Join EVANS_MASTER_ALUR_TBL ma on ma.ID_ALUR=ja.ID_ALUR
            WHERE ma.NAMA_ALUR = '$jns_org' AND ja.JENIS_DOKUMEN='Proker' AND da.DESKRIPSI='Rejected'";
    
            $result = Yii::$app->db->createCommand($sql)->queryOne();
            
            $id_detail = $result['ID_DETAIL'];
            
        }

        $sql = "SELECT TO_CHAR
        (SYSDATE, 'DD-MON-YYYY') AS TGGL
         FROM DUAL";

        $result3 = Yii::$app->db->createCommand($sql)->queryOne();

        $insert_date = $result3['TGGL'];

        $sql = "INSERT INTO EVANS_TRANS_ALUR_PROKER_TBL
        VALUES('99', '$id_proker', '$id_detail', '$insert_date')";

        Yii::$app->db->createCommand($sql)->execute();
    }

    public function checkStatusReview($id_proker){
        $sql ="SELECT ID_DETAIL
        from EVANS_TRANS_ALUR_PROKER_TBL
        where ID_PROKER = '$id_proker'";

        $result = Yii::$app->db->createCommand($sql)->queryOne();
        if($result['ID_DETAIL'] === '00007' || $result['ID_DETAIL'] === '00041'){
            return 'Yes';
        }
        else{
            return 'No';
        }
    }

    public function showStatus($status, $id_proker){
        if($status==='1'){
            return 'Draft';
        }
        else{
            $sql ="SELECT DESKRIPSI
            from EVANS_DETAIL_ALUR_TBL da
            join EVANS_TRANS_ALUR_PROKER_TBL tap on tap.ID_DETAIL=da.ID_DETAIL
            where tap.ID_PROKER='$id_proker' AND tap.INSERT_DATE=(
                SELECT MAX(INSERT_DATE) from EVANS_TRANS_ALUR_PROKER_TBL where ID_PROKER='$id_proker')";

            $result = Yii::$app->db->createCommand($sql)->queryOne();

            $status = $result['DESKRIPSI'];

            return $status;
        }
    }

    public function updateFeedback($id_proker, $feedback){
        $sql = "UPDATE EVANS_PROGRAM_KERJA_TBL 
        set 
            FEEDBACK = '$feedback'
            WHERE ID_PROKER = '$id_proker'";

        Yii::$app->db->createCommand($sql)->execute();
    }

    public function getIDTenggatWaktu($alur){
        $value = Yii::$app->db->createCommand("SELECT ID_TENGGAT_WAKTU FROM EVANS_MASTER_TENGGAT_WAKTU_TBL WHERE JNS_ALUR='$alur'")->queryOne();
        return $value;
    }

    public function dataBulan(){
        $array = [
            '01' => 'Januari',
            '02' => 'Febuari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        return $array;
    }

    public function dataTahun(){
        $sql = "SELECT DISTINCT SUBSTR(TO_CHAR(START_DATE,'dd/mm/yyyy'),7,4 ) as year 
                FROM EVANS_PROGRAM_KERJA_TBL 
                ORDER BY 1";

        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return ArrayHelper::map($result, 'YEAR','YEAR');
    }

    public function getProposal()
    {
        return $this->hasMany(Proposal::className(), ['ID_PROKER' => 'ID_PROKER']);
    }
}
