<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_JENIS_ALUR_TBL".
 *
 * @property string $ID_JENIS_ALUR
 * @property string $ID_ALUR
 * @property string $JENIS_DOKUMEN
 * @property string $STATUS
 *
 * @property EVANSDETAILALURTBL[] $eVANSDETAILALURTBLs
 * @property EVANSMASTERALURTBL $aLUR
 */
class JenisAlur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_JENIS_ALUR_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_JENIS_ALUR', 'ID_ALUR', 'JENIS_DOKUMEN', 'STATUS'], 'required'],
            [['ID_JENIS_ALUR', 'ID_ALUR'], 'string', 'max' => 5],
            [['JENIS_DOKUMEN'], 'string', 'max' => 100],
            [['STATUS'], 'string', 'max' => 1],
            [['ID_JENIS_ALUR'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_JENIS_ALUR' => 'Id Jenis Alur',
            'ID_ALUR' => 'Id Alur',
            'JENIS_DOKUMEN' => 'Jenis Dokumen',
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
    public function getDetailAlur()
    {
        return $this->hasMany(EVANSDETAILALURTBL::className(), ['ID_JENIS_ALUR' => 'ID_JENIS_ALUR']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterAlur()
    {
        return $this->hasOne(EVANSMASTERALURTBL::className(), ['ID_ALUR' => 'ID_ALUR']);
    }
}
