<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_HAL_LAMPIRAN_PRPSL_TBL".
 *
 * @property string $ID_HAL_LAMPIRAN
 * @property string $ID_PROPOSAL
 * @property string $FILE_LAMPIRAN
 * @property string|null $FEEDBACK
 *
 * @property EVANSPROPOSALTBL $pROPOSAL
 */
class HalamanLampiranProposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_HAL_LAMPIRAN_PRPSL_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_HAL_LAMPIRAN', 'ID_PROPOSAL', 'FILE_LAMPIRAN'], 'required'],
            [['ID_HAL_LAMPIRAN', 'ID_PROPOSAL'], 'string', 'max' => 5],
            // [['FILE_LAMPIRAN'], 'string', 'max' => 100],
            [['FEEDBACK'], 'string', 'max' => 4000],
            [['ID_HAL_LAMPIRAN'], 'unique'],
            // [['ID_PROPOSAL'], 'exist', 'skipOnError' => true, 'targetClass' => EVANSPROPOSALTBL::className(), 'targetAttribute' => ['ID_PROPOSAL' => 'ID_PROPOSAL']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_HAL_LAMPIRAN' => 'Id Hal Lampiran',
            'ID_PROPOSAL' => 'Id Proposal',
            'FILE_LAMPIRAN' => 'File Lampiran',
            'FEEDBACK' => 'Feedback',
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
