<?php

/** @var yii\web\View $this */
///** @var yii\bootstrap5\ActiveForm $form */
///** @var \frontend\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            echo 555;
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            echo 555;
        </div>
    </div>

</div>
<script>
    const app = new Vue({
        el: '#app',
        components: {
            vuejsDatepicker
        }
    })
</script>

