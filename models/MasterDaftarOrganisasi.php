<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "EVANS_DAFTAR_ORGANISASI_TBL".
 *
 * @property string $ID_ORGANISASI
 * @property string $ID_JENIS
 * @property string $NAMA_ORGANISASI
 * @property string $STATUS
 *
 * @property EVANSMSTRJNSORGANISASITBL $jENIS
 * @property EVANSPENGURUSORGANISASITBL[] $eVANSPENGURUSORGANISASITBLs
 */
class MasterDaftarOrganisasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_DAFTAR_ORGANISASI_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_ORGANISASI', 'STATUS'], 'required'],
            [['ID_ORGANISASI'], 'string', 'max' => 5],
            [['ID_JENIS'], 'string', 'max' => 20],
            [['NAMA_ORGANISASI'], 'string', 'max' => 50],
            [['STATUS'], 'string', 'max' => 1],
            [['ID_ORGANISASI'], 'unique'],
           
        ];
    }

    public function StatusValue($val)
    {
        return $val == 1 ? 'Selected' : '';
    }

    public function dataStatus(){
        return[
            1 => 'Aktif',
            0 => 'Tidak Aktif'
        ];
    }


    public function dataOrganisasi(){
        $sql = "SELECT * FROM EVANS_MSTR_JNS_ORGANISASI_TBL";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return ArrayHelper::map($result,'ID_JENIS','JENIS_ORGANISASI');
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_ORGANISASI' => 'Id Organisasi',
            'ID_JENIS' => 'Id Jenis',
            'NAMA_ORGANISASI' => 'Nama Organisasi',
            'STATUS' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterJenisOrganisasi()
    {
        return $this->hasOne(MasterJenisOrganisasi::className(), ['ID_JENIS' => 'ID_JENIS']);
    }
    
    public function getMasterPengurusOrganisasi()
    {
        return $this->hasOne(MasterPengurusOrganisasi::className(), ['ID_ORGANISASI' => 'ID_ORGANISASI']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    // public function getEVANSPENGURUSORGANISASITBLs()
    // {
    //     return $this->hasMany(EVANSPENGURUSORGANISASITBL::className(), ['ID_ORGANISASI' => 'ID_ORGANISASI']);
    // }
}
