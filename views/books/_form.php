<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false, 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'date')->widget(DatePicker::class, [
        'options' => [
            'lang' => 'ru',
            'format' => 'Y-m-d',
            'timepicker' => false,
            'value' => $model->date,
            'mask' => '9999-99-99',
        ],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]); ?>

    <?= $form->field($model, 'author_id')->dropDownList(\app\models\Authors::getAuthors()) ?>

    <?= $form->field($model, 'preview')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php
    $referer = '';
    if (isset($_POST['referer'])) {
        $referer = $_POST['referer'];
    } elseif (isset($_SERVER['HTTP_REFERER'])) {
        $referer = str_replace('http://' . $_SERVER['HTTP_HOST'], '', $_SERVER['HTTP_REFERER']);
    }
    if ($referer && $referer != '/') {
        echo Html::hiddenInput('referer', isset($_POST['referer']) ? $_POST['referer'] : $_SERVER['HTTP_REFERER']);
    }
    ?>

    <?php ActiveForm::end(); ?>

</div>
