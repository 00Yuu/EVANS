<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_HAL_JUDUL_PROPOSAL_TBL".
 *
 * @property string $ID_HAL_JUDUL
 * @property string $ID_PROPOSAL
 * @property string $NAMA_FILE_JUDUL
 * @property string|null $FEEDBACK
 *
 * @property EVANSPROPOSALTBL $pROPOSAL
 */
class HalamanJudulProposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_HAL_JUDUL_PROPOSAL_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_HAL_JUDUL', 'ID_PROPOSAL', 'NAMA_FILE_JUDUL'], 'required'],
            [['ID_HAL_JUDUL', 'ID_PROPOSAL'], 'string', 'max' => 5],
            [['NAMA_FILE_JUDUL'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['FEEDBACK'], 'string', 'max' => 4000],
            [['ID_HAL_JUDUL'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_HAL_JUDUL' => 'Id Hal Judul',
            'ID_PROPOSAL' => 'Id Proposal',
            'NAMA_FILE_JUDUL' => 'Nama File Judul',
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
