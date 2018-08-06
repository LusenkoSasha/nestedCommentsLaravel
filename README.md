
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
* php artisan migration
* npm run dev
Возможно будет ошибка при npm run dev - тогда npm rebuild node-sass 

![alt text](https://lh3.googleusercontent.com/UuN4OgANmCbxuwBUyjBumqc4lVG8LlvpVNaoLTew9FqeTlwXiP3zBpDdn3zbGgQ8pRYi2sln1AR9qEIc-nkrKGzCRE5S-4yIWbo8YOy8LmOIEWMulSatElrxXETr50DDUX5J3ZgylhUytrBjHbVvM53vBYDkN9o5XbZYkkofPGjwGlFybNmVVciwJRpBkXan82pdCnfiUqcdGSN9NdKpnyirRQIww5bJ4KMvt31Ohvrp8JFiAnDJjk2FzqNOMdiFMYzEpoMgdyPu4gILJUI1w5IynaoFK_AHYBPc0YYsZ56V-fDS8KinwVH9qfuFfiBwnqjiqI0WwZs2YrWcoR82scj2_3pDgKY9eEjUjqkMwXQwvNtQA8vn7LnTJoZSkdTLl1gv1198vFoDiD33MAxMQPyFjt5aFl-sCFqdLnVTygMTqwi_Koz920yjIQsCIHBSVjrlhEERxYiovHf7Zt5_ztLX4ThFi6zPqSTd1-KJE1M35eIahXOFdqTiTHmNIg3OyW0V8zD6L6ekmn7ihpkThuDSAxIPHTSClahUTxz_K7WSzzTB_CB2KBg7q1rKFYXjeuQCtrGpU5t2KFJZQssXA5vG3wCBO0hMSpGg2qGr=w1542-h965-no)

