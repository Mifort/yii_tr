<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\WorkingActivity $model */

$this->title = 'Create Working Activity';
$this->params['breadcrumbs'][] = ['label' => 'Working Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="working-activity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
