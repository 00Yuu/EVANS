<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EVANS_PROGRAM_KERJA_TBL".
 *
 * @property string $ID_PROKER
 * @property string $ID_RINCI
 * @property string $ID_TENGGAT_WAKTU
 * @property string $BENTUK_PROKER
 * @property string $NAMA_KEGIATAN
 * @property string $TINGKAT_KEGIATAN
 * @property string $DANA
 * @property string $START_DATE
 * @property string $END_DATE
 * @property string $TEMPAT_PELAKSANAAN
 * @property string $JUMLAH_PESERTA
 * @property string $TUJUAN_KEGIATAN
 * @property string $FEEDBACK
 * @property string $STATUS_DRAFT
 */
class ProgramKerja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EVANS_PROGRAM_KERJA_TBL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_PROKER', 'ID_RINCI', 'ID_TENGGAT_WAKTU', 'BENTUK_PROKER', 'NAMA_KEGIATAN', 'TINGKAT_KEGIATAN', 'DANA', 'START_DATE', 'END_DATE', 'TEMPAT_PELAKSANAAN', 'JUMLAH_PESERTA', 'TUJUAN_KEGIATAN', 'STATUS_DRAFT'], 'required'],
            [['DANA', 'JUMLAH_PESERTA'], 'number'],
            [['ID_PROKER', 'ID_RINCI', 'ID_TENGGAT_WAKTU'], 'string', 'max' => 5],
            [['BENTUK_PROKER', 'TINGKAT_KEGIATAN'], 'string', 'max' => 50],
            [['NAMA_KEGIATAN'], 'string', 'max' => 200],
            [['TEMPAT_PELAKSANAAN'], 'string', 'max' => 150],
            [['TUJUAN_KEGIATAN'], 'string', 'max' => 500],
            [['FEEDBACK'], 'string', 'max' => 4000],
            [['STATUS_DRAFT'], 'string', 'max' => 1],
            [['ID_PROKER'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_PROKER' => 'Id Proker',
            'ID_RINCI' => 'Id Rinci',
            'ID_TENGGAT_WAKTU' => 'Id Tenggat Waktu',
            'BENTUK_PROKER' => 'Bentuk Proker',
            'NAMA_KEGIATAN' => 'Nama Kegiatan',
            'TINGKAT_KEGIATAN' => 'Tingkat Kegiatan',
            'DANA' => 'Dana',
            'START_DATE' => 'Start Date',
            'END_DATE' => 'End Date',
            'TEMPAT_PELAKSANAAN' => 'Tempat Pelaksanaan',
            'JUMLAH_PESERTA' => 'Jumlah Peserta',
            'TUJUAN_KEGIATAN' => 'Tujuan Kegiatan',
            'FEEDBACK' => 'Feedback',
            'STATUS_DRAFT' => 'Status Draft',
        ];
    }
}
