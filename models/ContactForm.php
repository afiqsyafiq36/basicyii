<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    const SCENARIO_EMAIL_FROM_GUEST = 'EMAIL_FROM_GUEST';
    const SCENARIO_EMAIL_FROM_USER = 'EMAIL_FROM_USER';
    public function scenarios()
    {
        return [
            self::SCENARIO_EMAIL_FROM_GUEST => ['name', 'email', 'subject', 'body', 'verifyCode'] ,
            self::SCENARIO_EMAIL_FROM_USER => ['email' , 'subject', 'body', 'verifyCode'] ,
        ];
    }


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        //validation rules for input of field
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels bagi atribut nama atau label
     */
    public function attributeLabels()
    {
        return [
            // 'verifyCode' => 'Verification Code',
            //bagi atribut nama atau label
            'name' => 'name overridden',
            'email' => 'Label email anda',
            'subject' => 'subject overridden',
            'body' => 'body overridden',
            'verifyCode' => 'verifyCode overridden',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {

            Yii::$app->mailer->compose()
                ->setTo($email)
                // ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setFrom([$this->email => $this->name])
                // ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }

   
}
