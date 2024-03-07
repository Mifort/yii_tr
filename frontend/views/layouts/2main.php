<!DOCTYPE html>
<html>
<head>
    <title>My App</title>
    <script>fff.js</script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>
</head>
<body>

<div id="app">
    <vuejs-datepicker></vuejs-datepicker>
</div>
<!--<script src="https://unpkg.com/vue"></script>-->
<script src="https://unpkg.com/vuejs-datepicker"></script>
<script>
    const app = new Vue({
        el: '#app',
        components: {
            vuejsDatepicker
        }
    })
</script>



</body>
</html>