<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelajar".
 *
 * @property int $id
 * @property string $nama_pelajar
 * @property int $umur
 * @property string $alamat
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelajar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        //validation rules specified in this
        return [
            [['nama_pelajar', 'umur', 'alamat'], 'required'],
            [['umur'], 'integer'],
            [['nama_pelajar'], 'string', 'max' => 60],
            [['alamat'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Pelajar',
            'nama_pelajar' => 'Nama Pelajar',
            'umur' => 'Umur',
            'alamat' => 'Alamat',
        ];
    }
}
