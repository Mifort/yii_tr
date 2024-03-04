<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\Translators $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="translators-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 't_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 't_wa')->dropDownList(ArrayHelper::map(\common\models\WorkingActivity::find()->all(), 'wa_id', 'wa_name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
