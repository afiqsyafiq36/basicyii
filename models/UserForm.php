<?php
namespace app\models;

use yii\base\Model;


class UserForm extends Model
{
	public $name;
	public $email;
	public $tarikh;

	public function rules()
	{
		return [
			[['name', 'email','tarikh'], 'required'],
			[['email'], 'email'],
			[['tarikh'], 'safe'],
			[['tarikh'], 'default', 'value' => null],
		];
	}
}