<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_SUSUNAN_PANITIA_TBL".
 *
 * @property string $ID_SUSUNAN
 * @property string $EMPLID
 * @property string $JABATAN
 * @property string $DIVISI
 * @property string $ID_BAB_2
 *
 * @property EVANSHALDESKRIPSIPRPSLTBL $bAB2
 */
class SusunanPanitia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_SUSUNAN_PANITIA_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_SUSUNAN', 'EMPLID', 'JABATAN', 'DIVISI', 'ID_BAB_2'], 'required'],
            [['ID_SUSUNAN', 'ID_BAB_2'], 'string', 'max' => 5],
            [['EMPLID'], 'string', 'max' => 11],
            [['JABATAN', 'DIVISI'], 'string', 'max' => 100],
            [['ID_SUSUNAN'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_SUSUNAN' => 'Id Susunan',
            'EMPLID' => 'NIM',
            'JABATAN' => 'Jabatan',
            'DIVISI' => 'Divisi',
            'ID_BAB_2' => 'Id Bab 2',
        ];
    }

    // /**
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getBAB2()
    // {
    //     return $this->hasOne(EVANSHALDESKRIPSIPRPSLTBL::className(), ['ID_BAB_2' => 'ID_BAB_2']);
    // }

    public function getPersonalData(){
        return $this->hasOne(PersonalData::className(), ['EMPLID' => 'EMPLID']);
    }
}
