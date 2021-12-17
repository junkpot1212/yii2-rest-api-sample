<?php
/* @var $attribute string */
use dosamigos\tinymce\TinyMce;

/* @var $model \yii\db\ActiveRecord */
?>
<div class="panel panel-default">
    <div class="panel-body">
        <?= $form->field($model, $attribute)->widget(
            TinyMce::className(), [
                'options'       => ['rows' => 12],
                'language'      => 'ja',
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste image",
                    ],
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                ],
            ]
        ) ?>
    </div>
</div>

