<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_HAL_PENGANTAR_PRPRSL_TBL".
 *
 * @property string $ID_HAL_PENGANTAR
 * @property string $ID_PROPOSAL
 * @property string $FILE_HAL_PENGANTAR
 * @property string|null $FEEDBACK
 *
 * @property EVANSPROPOSALTBL $pROPOSAL
 */
class HalamanPengantarProposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_HAL_PENGANTAR_PRPRSL_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_HAL_PENGANTAR', 'ID_PROPOSAL', 'FILE_HAL_PENGANTAR'], 'required'],
            [['ID_HAL_PENGANTAR', 'ID_PROPOSAL'], 'string', 'max' => 5],
            // [['FILE_HAL_PENGANTAR'], 'string', 'max' => 100],
            [['FEEDBACK'], 'string', 'max' => 4000],
            [['ID_HAL_PENGANTAR'], 'unique'],
            // [['ID_PROPOSAL'], 'exist', 'skipOnError' => true, 'targetClass' => EVANSPROPOSALTBL::className(), 'targetAttribute' => ['ID_PROPOSAL' => 'ID_PROPOSAL']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_HAL_PENGANTAR' => 'Id Hal Pengantar',
            'ID_PROPOSAL' => 'Id Proposal',
            'FILE_HAL_PENGANTAR' => 'File Hal Pengantar',
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
