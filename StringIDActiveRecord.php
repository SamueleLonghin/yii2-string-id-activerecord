<?php

namespace samuelelonghin\db;

use Da\QrCode\QrCode;
use samuelelonghin\qr\ModelSerializable;
use Yii;
use yii\base\Exception;

/**
 * @property string $id
 * @property QrCode $qr
 * @property string $qrSvg
 */
abstract class StringIDActiveRecord extends ActiveRecord implements GridInterface
{
    use ModelSerializable;
    
    /**
     * @throws Exception
     */
    public function beforeValidate()
    {
        if ($this->isNewRecord && !$this->id)
            $this->generateId();
        return parent::beforeValidate();
    }

    /**
     * @throws Exception
     */
    public function beforeSave($insert)
    {
        if ($this->isNewRecord && !$this->id)
            $this->generateId();
        return parent::beforeSave($insert);
    }

    /**
     * @throws Exception
     */
    public function generateId()
    {
        do {
            $length = Yii::$app->stringIdActiveRecord->getStringIdLenght(static::class);
            $id = Yii::$app->security->generateRandomString($length);
        } while (self::findOne($id));
        $this->id = $id;
        return true;
    }
}
