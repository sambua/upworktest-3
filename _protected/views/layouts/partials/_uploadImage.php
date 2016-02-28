<?php
/**
 * Created by PhpStorm.
 * User: rashad
 * Date: 2/28/16
 * Time: 23:15
 */

use devgroup\dropzone\DropZone;

?>


<?= DropZone::widget(
  [
    'model' => $model,
    'attribute' => 'attachments[]',
    'url' => 'upload', // upload url
    'storedFiles' => [], // stores files
    'eventHandlers' => [], // dropzone event handlers
    'sortable' => true, // sortable flag
    'sortableOptions' => [], // sortable options
    'htmlOptions' => [  // container html options
      'multiple'=>true
    ],
    'options' => [  // dropzone js options
      'addRemoveLinks' => true,
      'maxFiles' => 10,
      'acceptedFiles' => 'image/*',
      'autoProcessQueue' => true,
      'maxFilesize' => 2, // MB
      'parallelUploads' => 10,
      'uploadMultiple' => true,
      'dictDefaultMessage' => 'For adding image, click here or drop images of your property.',
      'dictFallbackMessage' =>"Your browser does not support drag'n'drop file uploads.",
      'dictInvalidFileType' =>'File you are planning to upload is not supported.',
      'dictFileTooBig' => "Your image size is {{filesize}}MB, it's exceed maximum allowed {{maxFilesize}}MB size.",
      'dictResponseError' => "Error occurred during saving image, Error number: {{statusCode}} ",
      'dictCancelUpload' => "Cancel image uploading.",
      'dictCancelUploadConfirmation' => "Are you sure remove image?",
      'dictRemoveFile' => "Remove image",
      'dictMaxFilesExceeded' => "maximum allowed images size {number}", [ 'number' => 10],
    ],
  ]
);

?>
