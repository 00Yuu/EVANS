<?php

namespace app\models;

use Yii;

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
            [['ID_PROPOSAL', 'ID_PROKER', 'ID_TENGGAT_WAKTU', 'BANK', 'NO_REKENING', 'STATUS_DRAFT'], 'required'],
            [['NO_REKENING'], 'number'],
            [['ID_PROPOSAL', 'ID_PROKER', 'ID_TENGGAT_WAKTU'], 'string', 'max' => 5],
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
        ];
    }
}
