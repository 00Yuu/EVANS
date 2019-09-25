<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use dosamigos\tinymce\TinyMce;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\EVANSLAT1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evanslat1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, "PK"
        )->textInput([
            'maxlength' => true,
        ]) ?>

    <?= $form->field($model, 'TES1')->widget(TinyMce::className(), [
    'options' => ['rows' => 50],
    'language' => 'en_CA',
    'clientOptions' => [
        //'inline' => true,
        //$content_css needs to be defined as "" or some css rules/files
        
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace code fullscreen",
            "insertdatetime media table contextmenu paste",
            "image imagetools spellchecker visualchars textcolor",
            "autosave colorpicker hr nonbreaking template"
        ],
        'toolbar1' => "undo redo | styleselect fontselect fontsizeselect forecolor backcolor | bold italic",
        'toolbar2' => "alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
      
        // 'templates' => [
        //     [ 'title'=>'Test template 1', 'content'=>'Test 1' ],
        //     [ 'title'=>'Test template 2', 'content'=>'Test 2' ]
        // ],
        'visualblocks_default_state'=>true,
        'image_title' => true,
        // 'images_upload_url'=>'postAcceptor.php',
        'automatic_uploads' => true,
        // here we add custom filepicker only to Image dialog
        'file_picker_types'=>'image',
        // and here's our custom image picker
        'file_picker_callback'=> new JsExpression("function(callback, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            /*
            Note: In modern browsers input[type='file'] is functional without
            even adding it to the DOM, but that might not be the case in some older
            or quirky browsers like IE, so you might want to add it to the DOM
            just in case, and visually hide it. And do not forget do remove it
            once you do not need it anymore.
            */

            input.onchange = function () {
            var file = this.files[0];

            var reader = new FileReader();
            reader.onload = function () {
                /*
                Note: Now we need to register the blob in TinyMCEs image blob
                registry. In the next release this part hopefully won't be
                necessary, as we are looking to handle it internally.
                */
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                callback(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
            };

            input.click();
        }")
    ]
]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
