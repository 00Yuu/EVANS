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
        ];
    }

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

    public function updateProker($data, $id){
        $bentukProker = $data['BENTUK_PROKER'];
        $nama = $data['NAMA_KEGIATAN'];
        $tingkat = $data['TINGKAT_KEGIATAN'];
        $dana = $data['DANA'];
        $startDate = $data['START_DATE'];
        $endDate = $data['END_DATE'];
        $tempat = $data['TEMPAT_PELAKSANAAN'];
        $jumlah = $data['JUMLAH_PESERTA'];
        $tujuan = $data['TUJUAN_KEGIATAN'];

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
                TUJUAN_KEGIATAN = '$tujuan'
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

    public function showStatus($status){
        if($status==='1'){
            return 'Draft';
        }
        else{
            return 'Waiting For Approval';
        }
    }

    public function getIDTenggatWaktu($alur){
        $value = Yii::$app->db->createCommand("SELECT ID_TENGGAT_WAKTU FROM EVANS_MASTER_TENGGAT_WAKTU_TBL WHERE JNS_ALUR='$alur'")->queryOne();
        return $value;
    }
}
