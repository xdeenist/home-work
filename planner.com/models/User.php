<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord  implements IdentityInterface{
    public $id;
    public $authKey;
    public $accessToken;


    /**
     * SetPassword password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function setPassword($password){
        return $this->password = md5($password) . strlen($password);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        // var_dump($this->password);
        // var_dump(md5($password) . strlen($password));
        // die();
        return $this->password === md5($password) . strlen($password);
    }

        /**
     * Finds user by usermail
     *
     * @param string $usermail
     * @return static|null
     */
    public static function findByUsermail($email)
    {
        return static::findOne(['email'=>$email]);
    }

/**======================================================= */
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }
}
