<?php

namespace frontend\controllers;

use common\models\Translators;
use common\models\WorkingActivity;
use frontend\models\DateForm;
use yii\web\Controller;
use Yii;
use yii\base\Exception;
use yii\helpers\VarDumper;


class TestController extends Controller
{
//    public function actionIndex(){
//        return $this->render('index');
//    }
    public function actionIndex()
    {
        VarDumper::dump(getenv('MYSQL_DATABASE')); die;
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
            return $this->redirect(['view', 'translators' => $translators]);

//        if(!$res){
//            $res = in_array($weekday,WorkingActivity::getWeekendDay());
//        }
//        VarDumper::dump($translators,10, true);die;
//        VarDumper::dump($res,10, true); die;

//            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
//                return $this->redirect(['view', 't_id' => $model->t_id]);
//            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}