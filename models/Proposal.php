<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
            [['ID_PROPOSAL', 'ID_PROKER', 'ID_TENGGAT_WAKTU', 'BANK', 'NO_REKENING', 'ID_RINCI', 'CREATE_DATE', 'ID_BENDAHARA'], 'required'],
            [['NO_REKENING'], 'number'],
            [['ID_PROPOSAL', 'ID_PROKER', 'ID_TENGGAT_WAKTU', 'ID_RINCI'], 'string', 'max' => 5],
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
            'ID_RINCI' => 'Id Rinci',
            'CREATE_DATE' => 'Create Date',
            'ID_BENDAHARA' => 'Id Bendahara',
        ];
    }

    public function dataProgramKerja(){
        $id_rinci = $this->getIdRinci();

        $sql = "SELECT pr.ID_PROKER, NAMA_KEGIATAN 
                FROM EVANS_PROGRAM_KERJA_TBL pr, 
                    (
                    select id_proker, max(insert_date) insert_date
                    from EVANS_TRANS_ALUR_PROKER_TBL ta, EVANS_DETAIL_ALUR_TBL da
                    where DESKRIPSI = 'Approved'
                    and ta.id_detail = da.id_detail
                    GROUP BY id_proker
                    ) taa
                WHERE ID_RINCI = '$id_rinci' 
                AND pr.ID_PROKER = taa.ID_PROKER  
                ";

        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return ArrayHelper::map($result,'ID_PROKER','NAMA_KEGIATAN');
    }

    public function getProgramKerja()
    {
        return $this->hasOne(ProgramKerja::className(), ['ID_PROKER' => 'ID_PROKER']);
    }

    public function getMasterRinciOrganisasi(){
        return $this->hasOne(MasterRinciOrganisasi::className(), ['ID_RINCI' => 'ID_RINCI']);
    }

    public function dataBendahara(){
        $sql = "SELECT EVANS_RINCI_ORGANISASI_TBL.ID_RINCI RINCI, EMPLID
                FROM EVANS_PENGURUS_ORGANISASI_TBL
                JOIN EVANS_RINCI_ORGANISASI_TBL ON EVANS_PENGURUS_ORGANISASI_TBL.ID_PENGURUS = EVANS_RINCI_ORGANISASI_TBL.ID_PENGURUS
                WHERE LOWER(EVANS_PENGURUS_ORGANISASI_TBL.JABATAN) = 'bendahara'
                ";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return ArrayHelper::map($result,'RINCI','EMPLID');
    }
    
    public function getStatusKetuaHimpunan($id){
        $sql = "SELECT DESKRIPSI
        FROM EVANS_DETAIL_ALUR_TBL da ,
        EVANS_TRANS_ALUR_PRPSL_TBL trp, 
            (select id_proposal, max(insert_date) insert_date 
            from EVANS_TRANS_ALUR_PRPSL_TBL ta, EVANS_DETAIL_ALUR_TBL da
            where DESKRIPSI LIKE '%Ketua Himpunan%'
            and ta.id_detail = da.id_Detail
            group by id_proposal ) trp2
        WHERE trp.ID_PROPOSAL = '$id'
        AND trp.ID_PROPOSAL = trp2.ID_PROPOSAL
        AND trp.INSERT_DATE = trp2.INSERT_DATE
        AND da.ID_DETAIL = trp.ID_DETAIL";

        $result = Yii::$app->db->createCommand($sql)->queryOne();
        
        return $result['DESKRIPSI'];
    }

    public function getStatusBem($id){
        $sql = "SELECT DESKRIPSI
        FROM EVANS_DETAIL_ALUR_TBL da ,
        EVANS_TRANS_ALUR_PRPSL_TBL trp, 
            (select id_proposal, max(insert_date) insert_date 
            from EVANS_TRANS_ALUR_PRPSL_TBL ta, EVANS_DETAIL_ALUR_TBL da
            where DESKRIPSI LIKE '%BEM%'
            and ta.id_detail = da.id_Detail
            group by id_proposal ) trp2
        WHERE trp.ID_PROPOSAL = '$id'
        AND trp.ID_PROPOSAL = trp2.ID_PROPOSAL
        AND trp.INSERT_DATE = trp2.INSERT_DATE
        AND da.ID_DETAIL = trp.ID_DETAIL";

        $result = Yii::$app->db->createCommand($sql)->queryOne();
        
        return $result['DESKRIPSI'];
    }

    public function getStatusKaprodi($id){
        $sql = "SELECT DESKRIPSI
        FROM EVANS_DETAIL_ALUR_TBL da ,
        EVANS_TRANS_ALUR_PRPSL_TBL trp, 
            (select id_proposal, max(insert_date) insert_date 
            from EVANS_TRANS_ALUR_PRPSL_TBL ta, EVANS_DETAIL_ALUR_TBL da
            where DESKRIPSI LIKE '%Kaprodi%'
            and ta.id_detail = da.id_Detail
            group by id_proposal ) trp2
        WHERE trp.ID_PROPOSAL = '$id'
        AND trp.ID_PROPOSAL = trp2.ID_PROPOSAL
        AND trp.INSERT_DATE = trp2.INSERT_DATE
        AND da.ID_DETAIL = trp.ID_DETAIL";

        $result = Yii::$app->db->createCommand($sql)->queryOne();
        
        return $result['DESKRIPSI'];
    }

    public function getStatusStudev($id){
        $sql = "SELECT DESKRIPSI
        FROM EVANS_DETAIL_ALUR_TBL da ,
        EVANS_TRANS_ALUR_PRPSL_TBL trp, 
            (select id_proposal, max(insert_date) insert_date 
            from EVANS_TRANS_ALUR_PRPSL_TBL ta, EVANS_DETAIL_ALUR_TBL da
            where DESKRIPSI LIKE '%Studev%'
            and ta.id_detail = da.id_Detail
            group by id_proposal ) trp2
        WHERE trp.ID_PROPOSAL = '$id'
        AND trp.ID_PROPOSAL = trp2.ID_PROPOSAL
        AND trp.INSERT_DATE = trp2.INSERT_DATE
        AND da.ID_DETAIL = trp.ID_DETAIL";

        $result = Yii::$app->db->createCommand($sql)->queryOne();
        
        return $result['DESKRIPSI'];
    }

    public function getStatusSAManager($id){
        $sql = "SELECT DESKRIPSI
        FROM EVANS_DETAIL_ALUR_TBL da ,
        EVANS_TRANS_ALUR_PRPSL_TBL trp, 
            (select id_proposal, max(insert_date) insert_date 
            from EVANS_TRANS_ALUR_PRPSL_TBL ta, EVANS_DETAIL_ALUR_TBL da
            where DESKRIPSI LIKE '%SA Manager%'
            and ta.id_detail = da.id_Detail
            group by id_proposal ) trp2
        WHERE trp.ID_PROPOSAL = '$id'
        AND trp.ID_PROPOSAL = trp2.ID_PROPOSAL
        AND trp.INSERT_DATE = trp2.INSERT_DATE
        AND da.ID_DETAIL = trp.ID_DETAIL";

        $result = Yii::$app->db->createCommand($sql)->queryOne();
        
        return $result['DESKRIPSI'];
    }

    public function getStatusWarek3($id){
        $sql = "SELECT DESKRIPSI
        FROM EVANS_DETAIL_ALUR_TBL da ,
        EVANS_TRANS_ALUR_PRPSL_TBL trp, 
            (select id_proposal, max(insert_date) insert_date 
            from EVANS_TRANS_ALUR_PRPSL_TBL ta, EVANS_DETAIL_ALUR_TBL da
            where DESKRIPSI LIKE '%Warek III%'
            and ta.id_detail = da.id_Detail
            group by id_proposal ) trp2
        WHERE trp.ID_PROPOSAL = '$id'
        AND trp.ID_PROPOSAL = trp2.ID_PROPOSAL
        AND trp.INSERT_DATE = trp2.INSERT_DATE
        AND da.ID_DETAIL = trp.ID_DETAIL";

        $result = Yii::$app->db->createCommand($sql)->queryOne();
        
        return $result['DESKRIPSI'];
    }

    public function getDKBM($id){
        $sql = "SELECT DESKRIPSI
        FROM EVANS_DETAIL_ALUR_TBL da ,
        EVANS_TRANS_ALUR_PRPSL_TBL trp, 
            (select id_proposal, max(insert_date) insert_date 
            from EVANS_TRANS_ALUR_PRPSL_TBL ta, EVANS_DETAIL_ALUR_TBL da
            where DESKRIPSI LIKE '%DKBM%'
            and ta.id_detail = da.id_Detail
            group by id_proposal ) trp2
        WHERE trp.ID_PROPOSAL = '$id'
        AND trp.ID_PROPOSAL = trp2.ID_PROPOSAL
        AND trp.INSERT_DATE = trp2.INSERT_DATE
        AND da.ID_DETAIL = trp.ID_DETAIL";

        $result = Yii::$app->db->createCommand($sql)->queryOne();
        
        return $result['DESKRIPSI'];
    }

    public function getIdRinci(){
        $session = Yii::$app->session;

        $rinci = $session->get('id_rinci');

        return "$rinci";
    }
}
