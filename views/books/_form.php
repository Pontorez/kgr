<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'date')->widget(\vakorovin\datetimepicker\Datetimepicker::className(), ['options' => [
        'lang' => 'ru',
        'format' => 'Y-m-d',
        'timepicker' => false,
        'value' => $model->date,
        'mask' => '9999-99-99',
    ]]); ?>

    <?= $form->field($model, 'author_id')->dropDownList(\app\models\Authors::getAuthors()) ?>

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
