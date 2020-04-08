<?php
namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class MyComponent extends Component {

    public function actionWelcome()
    {
        # code...
        echo "Welcome to MyComponent";
    }
}