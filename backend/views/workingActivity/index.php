<?php

use common\models\WorkingActivity;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\WorkingActivitySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Working Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="working-activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Working Activity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'wa_id',
            'wa_name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WorkingActivity $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'wa_id' => $model->wa_id]);
                 }
            ],
        ],
    ]); ?>


</div>
