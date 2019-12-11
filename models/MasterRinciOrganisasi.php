<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "EVANS_RINCI_ORGANISASI_TBL".
 *
 * @property string $ID_RINCI
 * @property string $ID_PENGURUS
 * @property string $EMPLID
 * @property string $ID_PERIODE
 * @property string $STATUS
 *
 */
class MasterRinciOrganisasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_RINCI_ORGANISASI_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_RINCI', 'ID_PENGURUS', 'EMPLID', 'ID_PERIODE'], 'required'],
            [['ID_RINCI', 'ID_PENGURUS', 'ID_PERIODE'], 'string', 'max' => 5],
            [['EMPLID'], 'string', 'max' => 11],
            [['FILE_TTD'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['ID_RINCI'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_RINCI' => 'Id Rinci',
            'ID_PENGURUS' => 'Id Pengurus',
            'EMPLID' => 'NIM',
            'ID_PERIODE' => 'Id Periode',
            'FILE_TTD' => 'File Ttd',
        ];
    }

    public function dataStatus(){
        return[
            1 => 'Aktif',
            0 => 'Tidak Aktif'
        ];
    }

    public function dataPeriode(){
        $sql = "SELECT ID_PERIODE, PERIODE
                FROM EVANS_MASTER_PERIODE_TBL
                WHERE STATUS = '1'
                ";

        $periode = Yii::$app->db->createCommand($sql)->queryAll();

        return ArrayHelper::map($periode, 'ID_PERIODE','PERIODE');
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterPeriode()
    {
        return $this->hasOne(MasterPeriode::className(), ['ID_PERIODE' => 'ID_PERIODE']);
    }

    public function getMasterPengurusOrganisasi()
    {
        return $this->hasOne(MasterPengurusOrganisasi::className(), ['ID_PENGURUS' => 'ID_PENGURUS']);
    }

    public function getPersonalData(){
        return $this->hasOne(PersonalData::className(), ['EMPLID' => 'EMPLID']);
    }
}
