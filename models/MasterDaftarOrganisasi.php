<?php

namespace app\models;

use Yii;

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
        return[
            1 => 'UKM/Organisasi',
            2 => 'Himpunan',
            3 => 'KPU'
        ];
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
    public function getJENIS()
    {
        return $this->hasOne(EVANSMSTRJNSORGANISASITBL::className(), ['ID_JENIS' => 'ID_JENIS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEVANSPENGURUSORGANISASITBLs()
    {
        return $this->hasMany(EVANSPENGURUSORGANISASITBL::className(), ['ID_ORGANISASI' => 'ID_ORGANISASI']);
    }
}