<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BooksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]);
    ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'author_id')->dropDownList(\app\models\Authors::getAuthors())->label('&nbsp;') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'name') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2" style="line-height: 35px"><label>Дата выхода книги: </label></div>
        <div class="col-md-2">

            <?= $form->field($model, 'date0')->widget(DatePicker::class, [
                'options' => [
                    'lang' => 'ru',
                    'style' => 'width: 100px',
                ],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'autoclose' => true,
                ]
            ])->label(false);
            ?>

        </div>

        <div class="col-md-1 text-center" style="line-height: 35px">до</div>
        <div class="col-md-2">
            <?= $form->field($model, 'date1')->widget(DatePicker::class, [
                'options' => [
                    'lang' => 'ru',
                    'style' => 'width: 100px',
                ],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'autoclose' => true,
                ]
            ])->label(false);
            ?>
        </div>
        <div class="col-md-5">
            <?= Html::submitButton(Yii::t('app', 'Искать'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
