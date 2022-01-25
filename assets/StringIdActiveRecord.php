<?php

namespace samuelelonghin\db\assets;

class StringIdActiveRecord extends \yii\base\Component
{
    public $stringIdLenght = 10;

    public function getStringIdLenght($class = "samuelelonghin\db\StringIdActiveRecord")
    {
        if (is_callable($this->stringIdLenght))
            $this->stringIdLenght = call_user_func($this->stringIdLenght,$class);
        return $this->stringIdLenght;
    }
}