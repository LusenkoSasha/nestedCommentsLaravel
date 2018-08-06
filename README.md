
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
Возможно будет ошибка при npm run dev - тогда npm rebuild node-sass и еще раз npm run dev

![alt text](https://lh3.googleusercontent.com/DqtOmI_H6XSRva2UhE_aG4qlNj9VIu5FKQuSk569KTZpvAPrDHkxTd-XPckka9m1wheW2PkKPBzepvuucaymJcGQujQ1boYPP0qGLJ9QTSrH76vKQUeivh1GKsBfWY_TRQpu_L8ZvfIETMrhtGHf3NoakrfGZ4jnrXrvYM1DXILcj62asWeATflUfHw76z-4ESYt3ul86iV5vHRWkGzoY6jSP3AwE3lt7HfwyQoKBCQNxzr1rR0CeXb1BOj-EX7BNo7zDuMBVXcH357Y6jY-ObUMRWnu9nAnoB6Fnm04jj51EZwLTpbn3t_DiSTwbHE64ClSWXflkEEjYuuwIPalEZlaBrjDS_q80y745uitAodVVSCueNRxH5whdWOkGuAyFanH8kJgs7uDDCD_Nw-W7PZUdRH2iYvjvrZywxuZHi96-v67mRE9nLpaViAVl1Mye2Kgzz-bgWH_gSiTG8WE-l-fTZVCTeH8XmsUxbu4akS_kLFudxIM0pKr5mXchI1bQZCo25FkzNUJVmomRVNi3vxqEJMaJXGjpbL3cLAKUG10VPg7HMYw3tpIwPq28o_nrhdGlw6CpXveLoZPmZvDLA3pAq98JGuGrBa4CJhv=w1490-h1000-no)

