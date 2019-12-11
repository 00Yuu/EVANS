<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_MASTER_TENGGAT_WAKTU_TBL".
 *
 * @property string $ID_TENGGAT_WAKTU
 * @property string $WAKTU
 * @property string $JNS_ALUR
 * @property string $DDAY
 */
class MasterTenggatWaktu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_MASTER_TENGGAT_WAKTU_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_TENGGAT_WAKTU', 'WAKTU', 'JNS_ALUR', 'DDAY'], 'required'],
            [['WAKTU'], 'number'],
            [['ID_TENGGAT_WAKTU'], 'string', 'max' => 5],
            [['JNS_ALUR'], 'string', 'max' => 50],
            [['DDAY'], 'string', 'max' => 8],
            [['ID_TENGGAT_WAKTU'], 'unique'],
            [['JNS_ALUR'], 'unique' , 'message' => 'Jenis Alur sudah ada'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_TENGGAT_WAKTU' => 'Id Tenggat Waktu',
            'WAKTU' => 'Waktu',
            'JNS_ALUR' => 'Jns Alur',
            'DDAY' => 'Dday',
        ];
    }
}
