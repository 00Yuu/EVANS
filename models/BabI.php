<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_HAL_PENDHLUAN_PRPSL_TBL".
 *
 * @property string $ID_BAB_1
 * @property string $ID_PROPOSAL
 * @property string $FILE_BAB_1
 * @property string|null $FEEDBACK
 *
 * @property EVANSPROPOSALTBL $pROPOSAL
 */
class BabI extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_HAL_PENDHLUAN_PRPSL_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_BAB_1', 'ID_PROPOSAL', 'FILE_BAB_1'], 'required'],
            [['ID_BAB_1', 'ID_PROPOSAL'], 'string', 'max' => 5],
            // [['FILE_BAB_1'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['FEEDBACK'], 'string', 'max' => 4000],
            [['ID_BAB_1'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_BAB_1' => 'Id Bab 1',
            'ID_PROPOSAL' => 'Id Proposal',
            'FILE_BAB_1' => 'File Bab 1',
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
