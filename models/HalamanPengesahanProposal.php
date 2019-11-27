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
            [['ID_HAL_PENGESAHAN', 'ID_PROPOSAL', 'NAMA_ORGANISASI', 'NAMA_ACARA', 'END_DATE'], 'required'],
            [['ID_HAL_PENGESAHAN', 'ID_PROPOSAL'], 'string', 'max' => 5],
            [['NAMA_ORGANISASI', 'FILE_LEMBAR_PENGESAHAN'], 'string', 'max' => 100],
            [['NAMA_ACARA'], 'string', 'max' => 200],
            [['START_DATE'], 'string', 'max' => 7],
            [['END_DATE'], 'string', 'max' => 1],
            [['ID_HAL_PENGESAHAN'], 'unique'],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPROPOSAL()
    {
        return $this->hasOne(EVANSPROPOSALTBL::className(), ['ID_PROPOSAL' => 'ID_PROPOSAL']);
    }
}
