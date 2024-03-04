<?php

use common\models\Translators;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\TranslatorsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Translators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="translators-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Translators', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            't_id',
            't_name',
//            't_wa',
            [
                'attribute' => 'type_wa',
                'value' => function( $tr)
                {
//                    yii\helpers\VarDumper::dump($tr->tWa->wa_name,10, true); die;
                    return $tr->typeWa->wa_name ?? '-';
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Translators $model, $key, $index, $column) {
                    return Url::toRoute([$action, 't_id' => $model->t_id]);
                 }
            ],
        ],
    ]); ?>


</div>
