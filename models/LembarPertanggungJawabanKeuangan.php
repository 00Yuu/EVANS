<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "EVANS_FORM_LBR_PTGJWB_KGN_TBL".
 *
 * @property string $ID_LPK
 * @property string $ID_PROPOSAL
 * @property string $ID_RINCI
 * @property string $ID_TENGGAT_WAKTU
 * @property string $NAMA_KEGIATAN
 * @property string $PENYELENGGARA
 * @property string $KEPERLUAN
 * @property string $TANGGAN_BON
 * @property string $TANGGAL_PENYELESAIAN_BON
 * @property string $DANA_UMN
 * @property string $CREATE_DATE
 * @property string $STATUS_DRAFT
 *
 * @property EVANSMASTERTENGGATWAKTUTBL $tENGGATWAKTU
 * @property EVANSFRMLSTLBPTJWKGNTBL[] $eVANSFRMLSTLBPTJWKGNTBLs
 */
class LembarPertanggungJawabanKeuangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_FORM_LBR_PTGJWB_KGN_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_LPK', 'NAMA_KEGIATAN', 'PENYELENGGARA', 'KEPERLUAN', 'TANGGAL_BON', 'TANGGAL_PENYELESAIAN_BON', 'DANA_UMN', 'CREATE_DATE'], 'required'],
            [['DANA_UMN'], 'number'],
            [['ID_LPK', 'ID_PROPOSAL', 'ID_RINCI', 'ID_TENGGAT_WAKTU'], 'string', 'max' => 5],
            [['NAMA_KEGIATAN'], 'string', 'max' => 25],
            [['PENYELENGGARA'], 'string', 'max' => 50],
            [['KEPERLUAN'], 'string', 'max' => 30],
            [['STATUS_DRAFT'], 'string', 'max' => 1],
            [['ID_LPK'], 'unique'],
            // [['ID_TENGGAT_WAKTU'], 'exist', 'skipOnError' => true, 'targetClass' => EVANSMASTERTENGGATWAKTUTBL::className(), 'targetAttribute' => ['ID_TENGGAT_WAKTU' => 'ID_TENGGAT_WAKTU']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_LPK' => 'Id Lpk',
            'ID_PROPOSAL' => 'Id Proposal',
            'ID_RINCI' => 'Id Rinci',
            'ID_TENGGAT_WAKTU' => 'Id Tenggat Waktu',
            'NAMA_KEGIATAN' => 'Nama Kegiatan',
            'PENYELENGGARA' => 'Penyelenggara',
            'KEPERLUAN' => 'Keperluan',
            'TANGGAL_BON' => 'Tanggal Bon',
            'TANGGAL_PENYELESAIAN_BON' => 'Tanggal Penyelesaian Bon',
            'DANA_UMN' => 'Dana Umn',
            'CREATE_DATE' => 'Create Date',
            'STATUS_DRAFT' => 'Status Draft',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTENGGATWAKTU()
    {
        return $this->hasOne(EVANSMASTERTENGGATWAKTUTBL::className(), ['ID_TENGGAT_WAKTU' => 'ID_TENGGAT_WAKTU']);
    }

    public function dataProposal(){
        $sql = "SELECT * FROM EVANS_PROPOSAL_TBL";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return ArrayHelper::map($result,'ID_PROPOSAL','BANK');
    }

    public function showStatus($status, $id_lpk){
        if($status==='1'){
            return 'Draft';
        }
        else{
            return 'Waiting For Approval';
        }
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListLembarPertanggungJawabanKeuangan()
    {
        return $this->hasMany(ListLembarPertanggungJawabanKeuangan::className(), ['ID_LPK' => 'ID_LPK']);
    }

    public function getProposal()
    {
        return $this->hasMany(Proposal::className(), ['ID_PROPOSAL' => 'ID_PROPOSAL']);
    }
}
