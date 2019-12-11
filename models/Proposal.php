<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "EVANS_PROPOSAL_TBL".
 *
 * @property string $ID_PROPOSAL
 * @property string $ID_PROKER
 * @property string $ID_PENGURUS
 * @property string $ID_TENGGAT_WAKTU
 * @property string $BANK
 * @property string $NO_REKENING
 * @property string $STATUS_DRAFT
 */
class Proposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_PROPOSAL_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_PROPOSAL', 'ID_PROKER', 'ID_TENGGAT_WAKTU', 'BANK', 'NO_REKENING', 'ID_RINCI', 'CREATE_DATE', 'ID_BENDAHARA'], 'required'],
            [['NO_REKENING'], 'number'],
            [['ID_PROPOSAL', 'ID_PROKER', 'ID_TENGGAT_WAKTU', 'ID_RINCI'], 'string', 'max' => 5],
            [['BANK'], 'string', 'max' => 25],
            [['STATUS_DRAFT'], 'string', 'max' => 1],
            [['ID_PROPOSAL'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_PROPOSAL' => 'Id Proposal',
            'ID_PROKER' => 'Id Proker',
            'ID_TENGGAT_WAKTU' => 'Id Tenggat Waktu',
            'BANK' => 'Bank',
            'NO_REKENING' => 'No Rekening',
            'STATUS_DRAFT' => 'Status Draft',
            'ID_RINCI' => 'Id Rinci',
            'CREATE_DATE' => 'Create Date',
            'ID_BENDAHARA' => 'Id Bendahara',
        ];
    }

    public function dataProgramKerja(){
        $sql = "SELECT * FROM EVANS_PROGRAM_KERJA_TBL";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return ArrayHelper::map($result,'ID_PROKER','NAMA_KEGIATAN');
    }

    public function getProgramKerja()
    {
        return $this->hasOne(ProgramKerja::className(), ['ID_PROKER' => 'ID_PROKER']);
    }

    public function dataBendahara(){
        $sql = "SELECT EVANS_RINCI_ORGANISASI_TBL.ID_RINCI RINCI, EMPLID
                FROM EVANS_PENGURUS_ORGANISASI_TBL
                JOIN EVANS_RINCI_ORGANISASI_TBL ON EVANS_PENGURUS_ORGANISASI_TBL.ID_PENGURUS = EVANS_RINCI_ORGANISASI_TBL.ID_PENGURUS
                WHERE LOWER(EVANS_PENGURUS_ORGANISASI_TBL.JABATAN) = 'bendahara'
                ";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return ArrayHelper::map($result,'RINCI','EMPLID');
    }
}
