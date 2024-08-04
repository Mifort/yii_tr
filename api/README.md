RestApi (далее api) выполнено на фреймворке Yii2 в докер-окружении. Фреймворк предоставляет такую возможность на базе класса "yii\rest\ActiveController".

Адрес репозитория:
https://github.com/Mifort/yii_tr/tree/main/api

Сам модуль находиться в директории "api". Рабочий контроллер "api\controller\UserController".
Для демонстрации возможностей api была создана тестовая таблица "users". Дамп прилагается. Модель "common\models\Users"(директория "common\models" рядом с директорией "api"). 
Все запросы выполнялись в программе "Postman"

Реализуемые методы.

Рабочий класс  "api\controller\UserController".
 
Данные могут отправляются как в json-формате, так и в обычном.
Приниматься могут как в json-формате, так и в xml. В зависимости от заголовка 'Accept'.
 
1. Аутентификация была реализована на технологии HTTP Basic Auth. Реализована в классе  "api\controller\UserController" метод "behaviors" (так называемые поведения).
Авторизацию (то есть разрешения на определенные действия) можно ограничить переопределением метода yii\rest\Controller::checkAccess().
По умолчаниб все разрешения допустимы.

2. Cоздания пользователя реализутся через метод "run" объект класса 'yii\rest\CreateAction'. 
Пример запроса, где данные отправляются в json-формате :

curl --location 'http://api.localhost:8080/users' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json' \
--header 'Authorization: Basic 0JLQuNC60YLQvtGAOjEyMzQ1Njc4OQ==' \
--data-raw '{"username": "Валентина","email": "email1@email.com","password": 12345678}'

Пример запроса через 'Content-Type: application/x-www-form-urlencoded'

curl --location 'http://api.localhost:8080/users' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--header 'Accept: application/json' \
--header 'Authorization: Basic 0JLQuNC60YLQvtGAOjEyMzQ1Njc4OQ==' \
--data-urlencode 'username=Василий' \
--data-urlencode 'email=email7@email.com' \
--data-urlencode 'password=123456789'

3.Обновление данных пользователя  реализутся через метод "run" объект класса 'yii\rest\UpdateAction'.  Можно использовать методы HTTP 'PUT' или 'PATCH'

curl --location --request PUT 'http://api.localhost:8080/users/11' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--header 'Accept: application/json' \
--header 'Authorization: Basic 0JLQuNC60YLQvtGAOjEyMzQ1Njc4OQ==' \
--data-urlencode 'username=Матвей'

4.Удаление данных пользователя  реализутся через метод "run" объект класса 'yii\rest\DeleteAction'.  

curl --location --request DELETE 'http://api.localhost:8080/users/11' \
--header 'Authorization: Basic 0JLQuNC60YLQvtGAOjEyMzQ1Njc4OQ=='

5.Получение  данных пользователя  реализутся через метод "run" объект класса 'yii\rest\ViewAction'.  

curl --location 'http://api.localhost:8080/users/19' \
--header 'Accept: application/json' \
--header 'Authorization: Basic 0JLQuNC60YLQvtGAOjEyMzQ1Njc4OQ=='

6.Получение  данных пользователей  реализутся через метод "run" объект класса 'yii\rest\IndexAction'.

curl --location 'http://api.localhost:8080/users' \
--header 'Accept: application/json' \
--header 'Authorization: Basic 0JLQuNC60YLQvtGAOjEyMzQ1Njc4OQ=='















