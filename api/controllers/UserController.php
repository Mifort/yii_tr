<?php

namespace api\controllers;

use common\models\Users;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

/**
 * RestApi Users
 */
class UserController extends ActiveController
{
    public $modelClass = 'common\models\Users';

    public function actions(): array
    {
        $actions = parent::actions();
        $actions['create']['scenario'] = Users::SCENARIO_REGISTER;
        return $actions;
    }

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
                'class' => HttpBasicAuth::class,
                'auth' => function ($username, $password) {
                    $user = Users::find()->where(['username' => $username])->one();
                    if ($user && $user->validatePassword($password)) {
                        return $user;
                    }
                    return null;
                },
        ];
        return $behaviors;
    }
}
