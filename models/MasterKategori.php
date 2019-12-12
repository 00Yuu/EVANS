<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_MSTR_KATEGORI_TBL".
 *
 * @property string $ID_KATEGORI
 * @property string $DESKRIPSI
 * @property string $JENIS
 *
 * @property EVANSTRANSKATEGORITBL[] $eVANSTRANSKATEGORITBLs
 */
class MasterKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_MSTR_KATEGORI_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_KATEGORI', 'DESKRIPSI', 'KATEGORI','ID_JENIS'], 'required'],
            [['ID_KATEGORI','ID_JENIS'], 'string', 'max' => 5],
            [['DESKRIPSI', 'KATEGORI'], 'string', 'max' => 100],
            [['ID_KATEGORI'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_KATEGORI' => 'Id Kategori',
            'DESKRIPSI' => 'Deskripsi',
            'KATEGORI' => 'Kategori',
            'ID_JENIS' => 'Id Jenis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiKategori()
    {
        return $this->hasMany(TransaksiKategori::className(), ['ID_KATEGORI' => 'ID_KATEGORI']);
    }

    public function getMasterJenisPendapatan()
    {
        return $this->hasMany(MasterJenisPendapatan::className(), ['ID_JENIS' => 'ID_JENIS']);
    }


}
