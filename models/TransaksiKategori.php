<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "EVANS_TRANS_KATEGORI_TBL".
 *
 * @property string $ID_TRANS_KATEGORI
 * @property string $ID_KATEGORI
 * @property string $ID_PROPOSAL
 * @property string $ID_TRANSAKSI
 *
 * @property EVANSMSTRKATEGORITBL $kATEGORI
 */
class TransaksiKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_TRANS_KATEGORI_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_TRANS_KATEGORI', 'ID_KATEGORI', 'ID_PROPOSAL', 'VALUE'], 'required'],
            [['ID_TRANS_KATEGORI', 'ID_KATEGORI', 'ID_PROPOSAL'], 'string', 'max' => 5],
            [['VALUE'], 'number'],
            [['ID_TRANS_KATEGORI'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_TRANS_KATEGORI' => 'Id Trans Kategori',
            'ID_KATEGORI' => 'Sumber',
            'ID_PROPOSAL' => 'Id Proposal',
            'VALUE' => 'Value',
        ];
    }

    public function getDataJenis(){
        $sql = "SELECT ID_JENIS, JENIS FROM EVANS_MSTR_JNS_PENDAPATAN_TBL";

        $result = Yii::$app->db->createCommand($sql)->queryAll();

        return ArrayHelper::map($result,'ID_JENIS','JENIS');
    }   

    public function getNamaJenis($id){
        $sql = "SELECT JENIS 
                FROM EVANS_MSTR_JNS_PENDAPATAN_TBL jp
                JOIN EVANS_MSTR_KATEGORI_TBL mk ON (mk.ID_JENIS = jp.ID_JENIS)
                WHERE ID_KATEGORI = '$id'
                ";

        $result = Yii::$app->db->createCommand($sql)->queryOne();

        return $result['JENIS'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterKategori()
    {
        return $this->hasOne(MasterKategori::className(), ['ID_KATEGORI' => 'ID_KATEGORI']);
    }

    public function getProposal()
    {
        return $this->hasMany(Proposal::className(), ['ID_PROPOSAL' => 'ID_PROPOSAL']);
    }

}
