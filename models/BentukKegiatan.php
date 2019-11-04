<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_BENTUK_KEGIATAN_TBL".
 *
 * @property string $ID_PROKER
 * @property string $ID_BENTUK_KEGIATAN
 *
 * @property EVANSMSTRBENTUKKEGIATANTBL $bENTUKKEGIATAN
 */
class BentukKegiatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_BENTUK_KEGIATAN_TBL';
    }

    public static function primaryKey(){
        return ['ID_PROKER', 'ID_BENTUK_KEGIATAN'];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_PROKER', 'ID_BENTUK_KEGIATAN'], 'required'],
            [['ID_PROKER', 'ID_BENTUK_KEGIATAN'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_PROKER' => 'Id Proker',
            'ID_BENTUK_KEGIATAN' => 'Id Bentuk Kegiatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBENTUKKEGIATAN()
    {
        return $this->hasOne(EVANSMSTRBENTUKKEGIATANTBL::className(), ['ID_BENTUK_KEGIATAN' => 'ID_BENTUK_KEGIATAN']);
    }
}
