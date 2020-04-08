<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ibubapa;

/**
 * IbubapaSearch represents the model behind the search form of `app\models\Ibubapa`.
 */
class IbubapaSearch extends Ibubapa
{
    /**
     * {@inheritdoc}
     */

    public $nama_p;
    public function rules()
    {
        return [
            [['id', 'gaji_kasar', 'id_pelajar'], 'integer'],
            [['nama_ibu', 'nama_bapa','nama_p'], 'safe'],
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
        $query = Ibubapa::find();
        $query->joinWith(['pelajar']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        

        
        $dataProvider->sort->attributes['nama_p'] = [
            'asc' => ['pelajar.nama_pelajar' => SORT_ASC],
            'desc' => ['pelajar.nama_pelajar' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'gaji_kasar' => $this->gaji_kasar,
            'id_pelajar' => $this->id_pelajar,
        ]);

        $query->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'nama_bapa', $this->nama_bapa])
            ->andFilterWhere(['like', 'pelajar.nama_pelajar', $this->nama_p]);

        return $dataProvider;
    }
}
