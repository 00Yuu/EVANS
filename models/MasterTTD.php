<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "EVANS_MASTER_TTD_TBL".
 *
 * @property string $ID_TTD
 * @property string $EMPLID
 * @property string $FILE_TTD
 * @property string $STATUS
 *
 * @property EVANSPERSONALDATAVIEW $eMPL
 */
class MasterTTD extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_MASTER_TTD_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public $FILE_TTD;
    

    public function rules()
    {
        return [
            [['ID_TTD'], 'required'],
            [['ID_TTD'], 'string', 'max' => 5],
            [['EMPLID'], 'string', 'max' => 11],
            [['FILE_TTD'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, docx'],
            [['STATUS'], 'string', 'max' => 1],
            [['ID_TTD'], 'unique'],
            
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
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_TTD' => 'Id Ttd',
            'EMPLID' => 'NIK',
            'FILE_TTD' => 'File Ttd',
            'STATUS' => 'Status',
        ];
    }

    // public function upload()
    // {
    //     if ($this->validate()) {
    //         $this->FILE_TTD->saveAs('/upload',$this->FILE_TTD->baseName . '.' . $this->FILE_TTD->extension);
    //         echo "$FILE_TTD";
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    /**
     * @return \yii\db\ActiveQuery
     */
   

    public function getPersonalData(){
        return $this->hasOne(PersonalData::className(), ['EMPLID' => 'EMPLID']);
    }
}
