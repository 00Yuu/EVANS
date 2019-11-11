<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_MSTR_JNS_ORGANISASI_TBL".
 *
 * @property string $ID_JENIS
 * @property string $JENIS_ORGANISASI
 *
 * @property EVANSDAFTARORGANISASITBL[] $eVANSDAFTARORGANISASITBLs
 */
class MasterJenisOrganisasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_MSTR_JNS_ORGANISASI_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_JENIS'], 'required'],
            [['ID_JENIS'], 'string', 'max' => 5],
            [['JENIS_ORGANISASI'], 'string', 'max' => 20],
            [['ID_JENIS'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_JENIS' => 'Id Jenis',
            'JENIS_ORGANISASI' => 'Jenis Organisasi',
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
