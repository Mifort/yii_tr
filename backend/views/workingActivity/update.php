<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\WorkingActivity $model */

$this->title = 'Update Working Activity: ' . $model->wa_id;
$this->params['breadcrumbs'][] = ['label' => 'Working Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->wa_id, 'url' => ['view', 'wa_id' => $model->wa_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="working-activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
