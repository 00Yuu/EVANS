<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_MSTR_JNS_PENDAPATAN_TBL".
 *
 * @property string $ID_JENIS
 * @property string $DESKRIPSI
 *
 * @property EVANSTRANSPENDAPATANTBL[] $eVANSTRANSPENDAPATANTBLs
 */
class MasterJenisPendapatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_MSTR_JNS_PENDAPATAN_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_JENIS', 'JENIS'], 'required'],
            [['ID_JENIS'], 'string', 'max' => 5],
            [['JENIS'], 'string', 'max' => 100],
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
            'JENIS' => 'Jenis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterKategori()
    {
        return $this->hasOne(MasterKategori::className(), ['ID_JENIS' => 'ID_JENIS']);
    }
}
