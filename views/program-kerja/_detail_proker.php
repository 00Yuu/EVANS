<div class='row' style='margin: 0 5% 2% 5%;'>
    <label style="margin-right:7%;" for="nama_kegiatan">Nama Kegiatan:</label>
    <input type="text" id="nama_kegiatan" class="form-control" style="" value="<?= $model->NAMA_KEGIATAN?>"  readonly="true">
</div>
<div class='row' style='margin: 0 5% 2% 5%;'>
    <label style="margin-right:7%;" for="tingkat_kegiatan">Tingkat Kegiatan:</label>
    <input type="text" id="tingkat_kegiatan" class="form-control" style="" value="<?= $model->TINGKAT_KEGIATAN?>"  readonly="true">
</div>
<div class='row' style='margin: 0 5% 2% 5%;'>
    <label style="margin-right:7%;" for="nama_kegiatan">Dana:</label>
    <input type="number" id="dana" class="form-control" style="" value="<?= $model->DANA?>"  readonly="true">
</div>
<div class='row' style='margin: 0 5% 2% 5%;'>

    <div class="col-sm-12" style="padding-left:0;">
        <label style="margin-right:7%;" >Waktu:</label>
    </div>
    
    
    
    <div class="col-sm-5" style="padding-right: 0; padding-left:0;">
        <input type="text" id="start_date" class="form-control" style="" value="<?= date('d-m-Y', strtotime("$model->START_DATE")) ?>"  readonly="true">
    </div>
    <div class="col-sm-2" style="padding: 0 0 0 0">
        <div style="padding: 6.7% 6.7% 6.7% 40%;border: 1px solid #e0e0e0;background-color: #f2f2f2">
            To
        </div>
    </div>
    <div class="col-sm-5" style="padding-left: 0;padding-right: 0;">
        <input type="text" id="start_date" class="form-control" style="" value="<?= date('d-m-Y', strtotime("$model->END_DATE"))?>"  readonly="true">
    </div>
</div>

<div class='row' style='margin: 0 5% 2% 5%;'>
    <label style="margin-right:7%;" for="tempat_pelaksanaan">Tempat Pelaksanaan:</label>
    <input type="text" id="tempat_pelaksanaan" class="form-control" style="" value="<?= $model->TEMPAT_PELAKSANAAN?>"  readonly="true">
</div>
