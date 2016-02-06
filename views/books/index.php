<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p class="pull-right">
        <?= Html::a(Yii::t('app', 'Добавить книгу'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            [
                'attribute' => 'preview',
                'content' => function ($data) {
                    return '<a href="/img/' . $data->preview . '" class="showModalButton"><img src="/img/' . $data->preview . '" style="max-width: 150px"/></a>';
                }
            ],
            [
                'attribute' => 'countryName',
                'content' => function ($data) {
                    return $data->getAuthorName();
                },
                'label'=> Yii::t('app', 'Автор')
            ],
            [
                'attribute' => 'date',
                'value' => function ($data) {
                    return Yii::$app->formatter->asDate($data->date);
                },
            ],
            [
                'attribute' => 'date_create',
                'value' => function ($data) {
                    return Yii::$app->formatter->asDate($data->date_create);

                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {view} {delete}',
                'buttons' => [
                    'view' => function($url) {
                        return \yii\helpers\Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['class' => 'showModalButton', 'title' => Yii::t('yii', 'View')]);
                    }
                ]
            ],
        ],
    ]); ?>

</div>
