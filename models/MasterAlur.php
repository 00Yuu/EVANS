<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_MASTER_ALUR_TBL".
 *
 * @property string $ID_ALUR
 * @property string $NAMA_ALUR
 * @property string $STATUS
 *
 * @property EVANSDETAILALURTBL[] $eVANSDETAILALURTBLs
 */
class MasterAlur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_MASTER_ALUR_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_ALUR', 'NAMA_ALUR', 'STATUS'], 'required'],
            [['ID_ALUR'], 'string', 'max' => 5],
            [['NAMA_ALUR'], 'string', 'max' => 32],
            [['STATUS'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_ALUR' => 'Id Alur',
            'NAMA_ALUR' => 'Nama Alur',
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
    public function getJenisAlur()
    {
        return $this->hasMany(JenisAlur::className(), ['ID_ALUR' => 'ID_ALUR']);
    }
}
