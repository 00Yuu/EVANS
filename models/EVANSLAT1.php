<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_LAT1".
 *
 * @property string $TES1
 * @property string $TES2
 */
class EVANSLAT1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_LAT1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TES1', 'TES2'], 'required'],
            [['TES1'], 'string', 'max' => 20],
            [['TES2'], 'string', 'max' => 50],
            [['TES1'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TES1' => 'Tes1',
            'TES2' => 'Tes2',
        ];
    }
}
