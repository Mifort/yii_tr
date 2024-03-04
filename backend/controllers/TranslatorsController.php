<?php

namespace backend\controllers;

use common\models\Translators;
use common\models\TranslatorsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TranslatorsController implements the CRUD actions for Translators model.
 */
class TranslatorsController extends Controller
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
     * Lists all Translators models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TranslatorsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Translators model.
     * @param int $t_id T ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($t_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($t_id),
        ]);
    }

    /**
     * Creates a new Translators model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Translators();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 't_id' => $model->t_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Translators model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $t_id T ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($t_id)
    {
        $model = $this->findModel($t_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 't_id' => $model->t_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Translators model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $t_id T ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($t_id)
    {
        $this->findModel($t_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Translators model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $t_id T ID
     * @return Translators the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($t_id)
    {
        if (($model = Translators::findOne(['t_id' => $t_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
