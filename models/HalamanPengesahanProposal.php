<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_HAL_PENGESAHAN_PRPSL_TBL".
 *
 * @property string $ID_HAL_PENGESAHAN
 * @property string $ID_PROPOSAL
 * @property string $NAMA_ORGANISASI
 * @property string $NAMA_ACARA
 * @property string $START_DATE
 * @property string $END_DATE
 * @property string $FILE_LEMBAR_PENGESAHAN
 *
 * @property EVANSPROPOSALTBL $pROPOSAL
 */
class HalamanPengesahanProposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_HAL_PENGESAHAN_PRPSL_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_HAL_PENGESAHAN', 'ID_PROPOSAL','NAMA_ORGANISASI', 'NAMA_ACARA', 'START_DATE','END_DATE'], 'required'],
            [['ID_HAL_PENGESAHAN', 'ID_PROPOSAL'], 'string', 'max' => 5],
            [['NAMA_ORGANISASI', 'FILE_LEMBAR_PENGESAHAN'], 'string', 'max' => 100],
            [['NAMA_ACARA'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_HAL_PENGESAHAN' => 'Id Hal Pengesahan',
            'ID_PROPOSAL' => 'Id Proposal',
            'NAMA_ORGANISASI' => 'Nama Organisasi',
            'NAMA_ACARA' => 'Nama Acara',
            'START_DATE' => 'Start Date',
            'END_DATE' => 'End Date',
            'FILE_LEMBAR_PENGESAHAN' => 'File Lembar Pengesahan',
        ];
    }

    public function getDetailProker($id_proker){
        $sql = "SELECT do.NAMA_ORGANISASI, pk.NAMA_KEGIATAN, TO_CHAR(pk.START_DATE,'DD-Mon-YYYY') START_DATE, TO_CHAR(pk.END_DATE,'DD-Mon-YYYY') END_DATE
                FROM EVANS_PROGRAM_KERJA_TBL pk
                JOIN EVANS_RINCI_ORGANISASI_TBL ro ON (pk.ID_RINCI = ro.ID_RINCI)
                JOIN EVANS_PENGURUS_ORGANISASI_TBL po ON (po.ID_PENGURUS = ro.ID_PENGURUS)
                JOIN EVANS_DAFTAR_ORGANISASI_TBL do ON (do.ID_ORGANISASI = po.ID_ORGANISASI)
                WHERE ID_PROKER = '$id_proker'
                ";

        $result = Yii::$app->db->createCommand($sql)->queryOne();
                        
        return $result;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProposal()
    {
        return $this->hasOne(Proposal::className(), ['ID_PROPOSAL' => 'ID_PROPOSAL']);
    }
}
