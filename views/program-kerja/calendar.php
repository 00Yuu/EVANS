<?php



$this->title = '';
?>

<div class="calendar-view">
<?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
    ));
?>

</div>