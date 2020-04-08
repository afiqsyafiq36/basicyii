<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pelajar;

/**
 * PelajarSearch represents the model behind the search form of `app\models\Pelajar`.
 */
class PelajarSearch extends Pelajar
{
    //attribute yg dideclare baru
    public $negara;
    public $popu;
    public $kod;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'umur', 'id_country'], 'integer'],
            [['nama_pelajar', 'alamat','negara','popu','kod'], 'safe'],
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
        // create ActiveQuery cari atribut dlm model Pelajar
        $query = Pelajar::find();
        
        $query->joinWith(['country']); //join table

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //data sorting
        $dataProvider->sort->attributes['negara'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['country.name' => SORT_ASC],
            'desc' => ['country.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['popu'] = [
            'asc' => ['country.population' => SORT_ASC],
            'desc' => ['country.population' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['kod'] = [//kod atribut dkt model search
            'asc' => ['country.code' => SORT_ASC],
            'desc' => ['country.code' => SORT_DESC],
        ];

        //load parameter
        $this->load($params);

        //no search return dataProvider (maksudnya kalau kosong ruangan filter die akan paparkan balik data)
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'umur' => $this->umur,
            'id_country' => $this->id_country,
            // 'ibubapa.id_pelajar' => $this->ibubapa.id_pelajar,
        ]);

        $query->andFilterWhere(['like', 'nama_pelajar', $this->nama_pelajar])
            ->andFilterWhere(['like', 'status', $this->status = 0])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'country.name', $this->negara])
            ->andFilterWhere(['like', 'country.population', $this->popu])
            ->andFilterWhere(['like', 'country.code', $this->kod]); //kod atribut baru/ code atribut database

        return $dataProvider;
    }
}
