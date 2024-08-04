<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $access_token
 * @property string $password
 */
class Users extends ActiveRecord implements IdentityInterface
{
    public const SCENARIO_REGISTER = 'register';

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username'], 'string', 'max' => 150],
            [['email'], 'email'],
            [['username', 'email', 'password'], 'required', 'on' => self::SCENARIO_REGISTER],
            [
                'password', function ($attribute) {
                    if (!empty($this->$attribute)) {
                        $this->$attribute = Yii::$app->security->generatePasswordHash($this->$attribute);
                    }
                }
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'username' => 'Name',
            'email' => 'email',
        ];
    }

    public function fields(): array
    {
        $fields = parent::fields();
//        // удаляем небезопасные поля
            unset($fields['password']);
        return $fields;
    }

    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        // TODO: Implement getId() method.
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}
