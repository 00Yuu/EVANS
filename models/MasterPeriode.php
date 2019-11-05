<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_MASTER_PERIODE_TBL".
 *
 * @property string $ID_PERIODE
 * @property string $DESKRIPSI
 * @property string $START_DATE
 * @property string $END_DATE
 */
class MasterPeriode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_MASTER_PERIODE_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_PERIODE', 'STATUS', 'START_DATE', 'END_DATE'], 'required'],
            [['ID_PERIODE'], 'string', 'max' => 5],
            [['STATUS'], 'string', 'max' => 1],
            [['PERIODE'], 'string', 'max' => 16],
            [['ID_PERIODE'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_PERIODE' => 'Id Periode',
            'STATUS' => 'Status',
            'START_DATE' => 'Start Date',
            'END_DATE' => 'End Date',
            'PERIODE' => 'Periode',
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


}
