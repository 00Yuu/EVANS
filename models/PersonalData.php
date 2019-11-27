<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_PERSONAL_DATA_VIEW".
 *
 * @property string $EMPLID
 * @property string $NAMA
 * @property string $EMAIL
 * @property string $PHONE
 * @property string $ANGKATAN
 * @property string $PRODI
 * @property string $DESKRIPSI
 */
class PersonalData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_PERSONAL_DATA_VIEW';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'EMPLID' => 'Emplid',
            'NAMA' => 'Nama',
            'EMAIL' => 'Email',
            'PHONE' => 'Phone',
            'ANGKATAN' => 'Angkatan',
            'PRODI' => 'Prodi',
            'DESKRIPSI' => 'Deskripsi',
        ];
    }
}
