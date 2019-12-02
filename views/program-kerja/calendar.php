<?php
use yii\bootstrap\Modal;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Calendar Proker';
// var_dump($events);

?>

<div class="calendar-view">

  <div class="search-calendar">

    <?php $form = ActiveForm::begin([
        
    ]); ?>

    <div class="row" >
      <div class="col-sm-3">
          <?= $form->field($model, 'bulan')->dropDownList($modelProker->dataBulan(),
              [
                  'prompt' => 'Pilih Bulan',
                  'class' => 'form-control',
                  'style' => 'width:100%',
              ])->label('Month') 
          ?>
      </div>

      <div class="col-sm-3">
          <?= $form->field($model, 'tahun')->dropDownList($modelProker->dataTahun(),
              [
                  'prompt' => 'Pilih Tahun',
                  'class' => 'form-control',
                  'style' => 'width:100%'
              ])->label('Year')  ?>
      </div>

      <div class="col-sm-3">
   
          <?=
            Html::submitButton('Search', 
            [
                'class' => 'btn btn-primary',
                'style' => 'margin-top:9%;',
            ]);
          ?>
      </div>

    </div>

    <?php ActiveForm::end(); ?>

  </div>

  <?php
  $date = date('m-d-Y');
  ?>

  <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
      'clientOptions' => [
        'displayEventTime' => false,
        "eventBackgroundColor" =>  '#d1d6de',
        "eventBorderColor" =>  'black',
        "eventTextColor" =>  'black',
        'editable' => false,
        'draggable' => false,
        'defaultDate' => "$date" // untuk search date
      ],
      'eventClick' => "function(calEvent, jsEvent, view) {

        $.get('".Url::to(['program-kerja/modal-calendar'])."', {id: calEvent.id }, function(data) {
          var viewModal = $('#modal');
          viewModal.modal('show').find('#modalContent').html(data);
        })
      }",
    ));
  ?>

</div>

<?php
    Modal::begin([
        'header' => 'Detail Kegiatan',
        'headerOptions' => [
            'class' => 'bg-primary',
        ],
        'id' => 'modal',
        'size' => 'modal-md',
        'closeButton' => [
            'style' => 'color : #fff; opacity: 1;' 
        ]
        
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
?>