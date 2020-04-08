<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $population
 *
 * @property Pelajar[] $pelajars
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['population'], 'integer'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 52],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Negara',   //yg ni kita set untuk dipakai dkt banyak2 tempat
            'population' => 'Population',
        ];
    }

    /**
     * Gets query for [[Pelajars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPelajars()
    {
        return $this->hasMany(Pelajar::className(), ['id_country' => 'id']);
    }
}
