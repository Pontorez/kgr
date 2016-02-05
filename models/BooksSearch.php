<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BooksSearch represents the model behind the search form about `\app\models\Books`.
 */
class BooksSearch extends Books
{
    public $date0 = '____-__-__';
    public $date1 = '____-__-__';
    public $countryName;

    public function __construct()
    {
        $this->date0 = isset(Yii::$app->request->queryParams['BooksSearch']['date0']) ? Yii::$app->request->queryParams['BooksSearch']['date0'] : '';
        $this->date1 = isset(Yii::$app->request->queryParams['BooksSearch']['date1']) ? Yii::$app->request->queryParams['BooksSearch']['date1'] : '';

        parent::__construct();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'author_id'], 'integer'],
            [['name', 'date_create', 'date_update', 'preview', 'date', 'countryName'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $query = Books::find();
        $query->joinWith(['author']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'name',
                'preview',
                'author',
                'date',
                'date_create',
                'countryName' => [
                    'asc' => ['authors.firstname' => SORT_ASC, 'authors.lastname' => SORT_ASC],
                    'desc' => ['authors.firstname' => SORT_DESC, 'authors.lastname' => SORT_DESC],
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
            'date' => $this->date,
            'author_id' => $this->author_id,
        ]);

        if ($this->date0 != '____-__-__') {
            $query->andFilterWhere(['>=', 'date', $this->date0]);
        }

        if ($this->date1 != '____-__-__') {
            $query->andFilterWhere(['<=', 'date', $this->date1]);
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'preview', $this->preview]);

        return $dataProvider;
    }
}
