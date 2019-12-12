<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_HAL_PENUTUP_PRPSL_TBL".
 *
 * @property string $ID_BAB_5
 * @property string $ID_PROPOSAL
 * @property string $FILE_BAB_5
 * @property string|null $FEEDBACK
 *
 * @property EVANSPROPOSALTBL $pROPOSAL
 */
class BabV extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_HAL_PENUTUP_PRPSL_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_BAB_5', 'ID_PROPOSAL', 'FILE_BAB_5'], 'required'],
            [['ID_BAB_5', 'ID_PROPOSAL'], 'string', 'max' => 5],
            // [['FILE_BAB_5'], 'string', 'max' => 100],
            [['FEEDBACK'], 'string', 'max' => 4000],
            [['ID_BAB_5'], 'unique'],
            // [['ID_PROPOSAL'], 'exist', 'skipOnError' => true, 'targetClass' => EVANSPROPOSALTBL::className(), 'targetAttribute' => ['ID_PROPOSAL' => 'ID_PROPOSAL']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_BAB_5' => 'Id Bab 5',
            'ID_PROPOSAL' => 'Id Proposal',
            'FILE_BAB_5' => 'File Bab 5',
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
