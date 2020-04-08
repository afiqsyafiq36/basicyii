<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ibubapa".
 *
 * @property int $id
 * @property string $nama_ibu
 * @property string $nama_bapa
 * @property int $gaji_kasar
 * @property int $id_pelajar
 *
 * @property Pelajar $pelajar
 */
class Ibubapa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ibubapa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_ibu', 'nama_bapa', 'gaji_kasar', 'id_pelajar'], 'required'],
            [['gaji_kasar', 'id_pelajar'], 'integer'],
            [['nama_ibu', 'nama_bapa'], 'string', 'max' => 70],
            [['id_pelajar'], 'unique'],
            [['id_pelajar'], 'exist', 'skipOnError' => true, 'targetClass' => Pelajar::className(), 'targetAttribute' => ['id_pelajar' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_ibu' => 'Nama Emak',
            'nama_bapa' => 'Nama Bapa',
            'gaji_kasar' => 'Gaji Kasar',
            'id_pelajar' => 'Id Pelajar',
        ];
    }

    /**
     * Gets query for [[Pelajar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPelajar()
    {
        return $this->hasOne(Pelajar::className(), ['id' => 'id_pelajar']);
    }
}
