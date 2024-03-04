<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\WorkingActivity $model */

$this->title = $model->wa_id;
$this->params['breadcrumbs'][] = ['label' => 'Working Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="working-activity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'wa_id' => $model->wa_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'wa_id' => $model->wa_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'wa_id',
            'wa_name',
        ],
    ]) ?>

</div>
