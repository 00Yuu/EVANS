<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_FRM_LST_LB_PTJW_KGN_TBL".
 *
 * @property string $ID_LIST_LPK
 * @property string $ID_LPK
 * @property string $DESKRIPSI
 * @property string $HARGA
 * @property string $URL_BON
 *
 * @property EVANSFORMLBRPTGJWBKGNTBL $lPK
 */
class ListLembarPertanggungJawabanKeuangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_FRM_LST_LB_PTJW_KGN_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_LIST_LPK', 'DESKRIPSI', 'HARGA', 'URL_BON'], 'required'],
            [['HARGA'], 'number'],
            [['ID_LIST_LPK', 'ID_LPK'], 'string', 'max' => 5],
            [['DESKRIPSI'], 'string', 'max' => 255],
            [['URL_BON'], 'string', 'max' => 150],
            [['ID_LIST_LPK'], 'unique'],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_LIST_LPK' => 'Id List Lpk',
            'ID_LPK' => 'Id Lpk',
            'DESKRIPSI' => 'Deskripsi',
            'HARGA' => 'Harga',
            'URL_BON' => 'Url Bon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLembarPertanggungJawabanKeuangan()
    {
        return $this->hasOne(LembarPertanggungJawabanKeuangan::className(), ['ID_LPK' => 'ID_LPK']);
    }
}
