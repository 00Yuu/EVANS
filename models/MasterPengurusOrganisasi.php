<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_PENGURUS_ORGANISASI_TBL".
 *
 * @property string $ID_PENGURUS
 * @property string $ID_ORGANISASI
 * @property string $JABATAN
 * @property string $STATUS
 *
 * @property EVANSDAFTARORGANISASITBL $oRGANISASI
 */
class MasterPengurusOrganisasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_PENGURUS_ORGANISASI_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_PENGURUS', 'ID_ORGANISASI', 'JABATAN', 'STATUS'], 'required'],
            [['ID_PENGURUS', 'ID_ORGANISASI'], 'string', 'max' => 5],
            [['JABATAN'], 'string', 'max' => 50],
            [['STATUS'], 'string', 'max' => 1],
            [['ID_PENGURUS'], 'unique'],
            [['JABATAN'], 'unique'],
            // [['ID_ORGANISASI'], 'exist', 'skipOnError' => true, 'targetClass' => EVANSDAFTARORGANISASITBL::className(), 'targetAttribute' => ['ID_ORGANISASI' => 'ID_ORGANISASI']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_PENGURUS' => 'Id Pengurus',
            'ID_ORGANISASI' => 'Id Organisasi',
            'JABATAN' => 'Jabatan',
            'STATUS' => 'Status',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterDaftarOrganisasi()
    {
        return $this->hasMany(MasterDaftarOrganisasi::className(), ['ID_JENIS' => 'ID_JENIS']);
    }

   
}
