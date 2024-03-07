<?php
use aki\vue\Vue;
/** @var yii\web\View $this */
///** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\Translators $translators */
//\yii\helpers\VarDumper::dump($translators,10 ,true);
?>

<?php
Vue::begin([
    'id' => "vueapp",
    'data' => [
        'message' => "Translators!!",
        'seen' => true,
//        'todos' => [
//            ['text' => "akbar joudi"],
//            ['text' => "aref mohhamdzadeh"]
//        ]
    ],
//    'components' => 'Datepicker',
//    'components' => [
//            'import'=>
//],

    'methods' => [
        'reverseMessage' => new yii\web\JsExpression("function(){"
            . "this.message = this.message.split('').reverse().join(''); "
            . "}"),
    ],
//    'watch' => [
//        'message' => new yii\web\JsExpression('function(newval, oldval){
//            console.log(newval)
//        }'),
//    ]
]);
//$a = sfmobile\vueapp\assets\vuejs_datepicker\VueJsDatepickerAsset::register($this);
//\yii\helpers\VarDumper::dump($a,10, true);
?>

    <p>{{ message }}</p>
    <button v-on:click="reverseMessage">Reverse Message</button>

<?php  foreach ($translators as $translator):?>
<div>
    <?php echo $translator->t_name; ?>
</div>
    <?php endforeach;?>

    <input v-model="message">


<?php Vue::end(); ?>

<!--<script>-->
<!--    const app = new Vue({-->
<!--        el: '#app',-->
<!--        components: {-->
<!--            vuejsDatepicker-->
<!--        }-->
<!--    })-->
<!--</script>-->
