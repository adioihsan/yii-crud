<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Provinsi;

/**
 * ProvinsiSearch represents the model behind the search form of `app\models\Provinsi`.
 */
class ProvinsiSearch extends Provinsi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_provinsi'], 'integer'],
            [['nama_provinsi'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Provinsi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_provinsi' => $this->id_provinsi,
        ]);

        $query->andFilterWhere(['like', 'nama_provinsi', $this->nama_provinsi]);

        return $dataProvider;
    }
}
