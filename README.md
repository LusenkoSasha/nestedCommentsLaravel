
# Древовидные комментарии

* Создан resource controller CommentController
* Создана модель Comment с рекурсивным методом children
* Создан api resource Comment 
* Создан StoreComment для валидации данных
* Были созданы три компонента vue: Comment, Tree(Рекурсивный), CommentForm
* Были добавлены пакеты bulma, vue-notyjs, moment
* Создан CommentFactory для тестирования
* Создан CommentTest с 6 тестами 
    - testCommentGetAll -  получение двух записей с отношением children, CommentController@index
    - testCommentCreatedCorrectly - проверка метода CommentController@store
    - testCommentValidation - проверка получения ошибок от StoreComment
    - testCommentValidationEmail - проверка получения ошибки про не правильно написания email от StoreComment
    - testCommentUpdate - проверка метода CommentController@update и получения обновленных данных
    - testCommentDelete - проверка метода CommentController@destroy на удаления комментария 

Для запуска проекта 
* composer install
* npm install
* php artisan key:generate 
* php artisan migrate
* npm run dev
* Для запуска теста "./vendor/bin/phpunit"

Возможно будет ошибка при npm run dev - тогда npm rebuild node-sass и еще раз npm run dev

![alt text](https://c.radikal.ru/c06/1808/d8/3c0d11a0d4ca.png)
