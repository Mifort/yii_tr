<?php

namespace backend\controllers;

use common\models\WorkingActivity;
use common\models\WorkingActivitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WorkingActivityController implements the CRUD actions for WorkingActivity model.
 */
class WorkingActivityController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all WorkingActivity models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new WorkingActivitySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkingActivity model.
     * @param int $wa_id Wa ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($wa_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($wa_id),
        ]);
    }

    /**
     * Creates a new WorkingActivity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new WorkingActivity();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'wa_id' => $model->wa_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WorkingActivity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $wa_id Wa ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($wa_id)
    {
        $model = $this->findModel($wa_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'wa_id' => $model->wa_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WorkingActivity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $wa_id Wa ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($wa_id)
    {
        $this->findModel($wa_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WorkingActivity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $wa_id Wa ID
     * @return WorkingActivity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($wa_id)
    {
        if (($model = WorkingActivity::findOne(['wa_id' => $wa_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
