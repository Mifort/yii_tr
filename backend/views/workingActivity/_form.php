<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\WorkingActivity $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="working-activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'wa_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
