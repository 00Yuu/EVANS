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
        
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PK' => 'PK',
            'TES1' => 'Tes1',
            'TES2' => 'Tes2',
        ];
    }
}
