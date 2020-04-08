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
 * @property int|null $id_country
 *
 * @property Ibubapa $ibubapa
 * @property Country $country
 */
class Pelajar extends \yii\db\ActiveRecord    //active record dh mempunyai semua dan dah tahu atribut yg kita ada dlm db
{
    const STATUS_INACTIVE = 0;   //nilai ni akan jadi tetap untuk sekali pakai
    const STATUS_ACTIVE = 1;     //tidak boleh diubah apabila data dlm db dah ada,kecuali kalau buat data migration
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
        return [
            [['nama_pelajar', 'umur', 'alamat', 'id_country'], 'required'],
            [['umur', 'status', 'id_country'], 'integer'],
            [['nama_pelajar'], 'string', 'max' => 60],
            [['alamat'], 'string', 'max' => 40],
            [['id_country'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['id_country' => 'id']],
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
            'status' => 'Status',
            'id_country' => 'Warganegara',
        ];
    }
    // public function beforeSave($insert)
    // {
    //     if (!parent::beforeSave($insert)) {
    //         return false;
    //     }

    //     // ...custom code here...
    //     $this->status = $this::STATUS_ACTIVE;   
    //     //kita defines status punya default value untuk diexecute before save data ke db
        
    //     //timestamp boleh digunakan dalam action ini untuk exec before save to db
        
    //     return true;
    // }

    //hubungan table bole ada bnyk bergantung pada perhubungan yg ada dlm db
    /**
     * Gets query for [[Ibubapa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIbubapa()
    {
        return $this->hasOne(Ibubapa::className(), ['id_pelajar' => 'id']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'id_country']);
    }
}
