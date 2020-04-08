<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Student;

/**
 * StudentSearch represents the model behind the search form of `app\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'umur'], 'integer'],
            [['nama_pelajar', 'alamat'], 'safe'],
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
    public function searchSTD($params)
    {
        

        $query = Student::find();
        // $query->andwhere(['id' => 2]); //where hanya boleh pakai sekali je untuk 1 query,maksudnya yg lain2 kena andwhere
        //tapi boleh banyak2 filter dalam dalam array where
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        // echo "<pre>";
        // print_r($this->nama_pelajar);
        // echo "</pre>";
        // die();

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
            
        }
        

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'umur' => $this->umur,
        ]);

        $query->andFilterWhere(['like', 'nama_pelajar', $this->nama_pelajar])
            ->andFilterWhere(['like', 'alamat', $this->alamat]);

        return $dataProvider;
    }
}
