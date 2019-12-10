<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_DETAIL_ALUR_TBL".
 *
 * @property string $ID_DETAIL
 * @property string $ID_ALUR
 * @property string $DESKRIPSI
 * @property string $TINGKAT
 * @property string $PHASE
 *
 * @property EVANSMASTERALURTBL $aLUR
 * @property EVANSTRANSALURLPJTBL[] $eVANSTRANSALURLPJTBLs
 * @property EVANSTRANSALURLPKTBL[] $eVANSTRANSALURLPKTBLs
 * @property EVANSTRANSALURPROKERTBL[] $eVANSTRANSALURPROKERTBLs
 * @property EVANSTRANSALURPRPSLTBL[] $eVANSTRANSALURPRPSLTBLs
 */
class DetailAlur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_DETAIL_ALUR_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_DETAIL', 'ID_JENIS_ALUR', 'DESKRIPSI', 'TINGKAT', 'PHASE'], 'required'],
            [['ID_DETAIL', 'ID_JENIS_ALUR'], 'string', 'max' => 5],
            [['DESKRIPSI'], 'string', 'max' => 32],
            [['TINGKAT', 'PHASE'], 'string', 'max' => 1],
            [['DESKRIPSI'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_DETAIL' => 'Id Detail',
            'ID_JENIS_ALUR' => 'Id Jenis Alur',
            'DESKRIPSI' => 'Deskripsi',
            'TINGKAT' => 'Tingkat',
            'PHASE' => 'Phase',
        ];
    }
    
    public function dataTingkat(){
        $array = [];

        for($i = 0; $i<= 20; $i++){
            array_push($array, $i);
        }

        return $array;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisAlur()
    {
        return $this->hasOne(JenisAlur::className(), ['ID_JENIS_ALUR' => 'ID_JENIS_ALUR']);
    }
}
