<?php

namespace frontend\controllers;

use common\models\Translators;
use common\models\WorkingActivity;
use frontend\models\DateForm;
use yii\web\Controller;
use Yii;
use yii\base\Exception;
use yii\helpers\VarDumper;


class TranslatorsController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }
    public function actionChoice()
    {
        if(isset($_POST)){

//            VarDumper::dump($_POST,10, true); die;
        }
        $model = new DateForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $weekday = date("N",strtotime($model->date));
            if(in_array($weekday,WorkingActivity::getWorkingDay())){
                $translators = Translators::findAll(['t_wa' => 1]);
            }elseif(in_array($weekday,WorkingActivity::getWeekendDay()))
            {
                $translators = Translators::findAll(['t_wa' => 2]);
            }else{
                throw new Exception('Not day in week');
            }
            return $this->render('index', [
                'translators' => $translators,
            ]);

        }

        return $this->render('choice', [
            'model' => $model,
        ]);
    }
}