<?php

namespace app\models;

use Yii;

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
            [['ID_KATEGORI'], 'exist', 'skipOnError' => true, 'targetClass' => EVANSMSTRKATEGORITBL::className(), 'targetAttribute' => ['ID_KATEGORI' => 'ID_KATEGORI']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_TRANS_KATEGORI' => 'Id Trans Kategori',
            'ID_KATEGORI' => 'Id Kategori',
            'ID_PROPOSAL' => 'Id Proposal',
            'VALUE' => 'Value',
        ];
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
