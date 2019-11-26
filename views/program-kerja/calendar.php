<?php
use yii\bootstrap\Modal;
use yii\web\JsExpression;
use yii\helpers\Url;
$this->title = '';
// var_dump($events);
?>

<div class="calendar-view">

<div class="">

</div>

<?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
      'clientOptions' => [
        'displayEventTime' => false,
        "eventBackgroundColor" =>  '#d1d6de',
        "eventBorderColor" =>  'black',
        "eventTextColor" =>  'black',
        'editable' => false,
        'draggable' => false,
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