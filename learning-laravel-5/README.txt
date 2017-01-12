cd learning-laravel-5

$ php -S localhost:80 -t public

$ composer create-project laravel/laravel learning-laravel-5

$ php artisan make:controller PagesController

$ php artisan make:controller PagesController --plain

$ php artisan help make:controller
---------------------------------------------------------

$ php artisan migrate

$ sqllite3

$ sqllite3 storage/database.sqllite

$ php artisan migrate:rollback

$ php artisan help make:migration 

$ php artisan make:migration create_articles_table

$ php artisan make:migration create_articles_table --create="articles"

$ php artisan migrate

$ php artisan make:migration add_excerpt_to_articles_table


--despues de borrar el archivo de migracion anterior y si da un error correr lo siguiente

$ composer dump-autoload

$ php artisan make:migration add_excerpt_to_articles_table --table="articles"

$ php artisan migrate

--if you want delete a column, you'll install that component
$ php composer require doctrine/dbal

$ php artisan migrate:rollback
