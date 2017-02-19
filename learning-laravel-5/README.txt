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


-------------------------------------------------------------

$ php artisan make:model Article

$ php artisan tinker

$ php artisan tinker
Psy Shell v0.7.2 (PHP 5.6.19 ÃÃÃ¶ cli) by Justin Hileman
>>> $name = 'jeff';
=> "jeff"
>>> $name
=> "jeff"
>>> $article = new App\Article;
=> App\Article {#621}
>>> $article;
=> App\Article {#621}
>>> $article->title = "hola"
=> "hola"
>>> $article->title;
=> "hola"
>>> $article->body="Lorem ipsum"
=> "Lorem ipsum"
>>> $article->published_at = Carbon\Carbon::now();
=> Carbon\Carbon {#624
     +"date": "2017-02-16 03:30:17.000000",
     +"timezone_type": 3,
     +"timezone": "UTC",
   }
>>> $article;
=> App\Article {#621
     title: "hola",
     body: "Lorem ipsum",
     published_at: Carbon\Carbon {#624
       +"date": "2017-02-16 03:30:17.000000",
       +"timezone_type": 3,
       +"timezone": "UTC",
     },
   }
>>> $article->toArray();
=> [
     "title" => "hola",
     "body" => "Lorem ipsum",
     "published_at" => Carbon\Carbon {#624
       +"date": "2017-02-16 03:30:17.000000",
       +"timezone_type": 3,
       +"timezone": "UTC",
     },
   ]
>>> $article->save();
=> true
>>> App\Article::all()->toArray();
=> [
     [
       "id" => 1,
       "title" => "hola",
       "body" => "Lorem ipsum",
       "created_at" => "2017-02-16 03:32:02",
       "updated_at" => "2017-02-16 03:32:02",
       "published_at" => "2017-02-16 03:30:17",
     ],
   ]
>>> $article->toArray();
=> [
     "title" => "hola",
     "body" => "Lorem ipsum",
     "published_at" => Carbon\Carbon {#624
       +"date": "2017-02-16 03:30:17.000000",
       +"timezone_type": 3,
       +"timezone": "UTC",
     },
     "updated_at" => "2017-02-16 03:32:02",
     "created_at" => "2017-02-16 03:32:02",
     "id" => 1,
   ]
>>> $article->title = "My Updated first Article";
=> "My Updated first Article"
>>> $article->save();
=> true
>>> App\Article::all()->toArray();
=> [
     [
       "id" => 1,
       "title" => "My Updated first Article",
       "body" => "Lorem ipsum",
       "created_at" => "2017-02-16 03:32:02",
       "updated_at" => "2017-02-16 03:59:30",
       "published_at" => "2017-02-16 03:30:17",
     ],
   ]
>>> $article = App\Article::find(1);
=> App\Article {#638
     id: 1,
     title: "My Updated first Article",
     body: "Lorem ipsum",
     created_at: "2017-02-16 03:32:02",
     updated_at: "2017-02-16 03:59:30",
     published_at: "2017-02-16 03:30:17",
   }
>>> $article->toArray();
=> [
     "id" => 1,
     "title" => "My Updated first Article",
     "body" => "Lorem ipsum",
     "created_at" => "2017-02-16 03:32:02",
     "updated_at" => "2017-02-16 03:59:30",
     "published_at" => "2017-02-16 03:30:17",
   ]
>>> $article = App\Article::where('body','Lorem ipsum')->get();
=> Illuminate\Database\Eloquent\Collection {#639
     all: [
       App\Article {#640
         id: 1,
         title: "My Updated first Article",
         body: "Lorem ipsum",
         created_at: "2017-02-16 03:32:02",
         updated_at: "2017-02-16 03:59:30",
         published_at: "2017-02-16 03:30:17",
       },
     ],
   }
>>> $article = App\Article::where('body','Lorem ipsum')->first();
=> App\Article {#642
     id: 1,
     title: "My Updated first Article",
     body: "Lorem ipsum",
     created_at: "2017-02-16 03:32:02",
     updated_at: "2017-02-16 03:59:30",
     published_at: "2017-02-16 03:30:17",
   }
>>> $article = App\Article::create(['title'=>'New Article', 'body'=>'New body','
published_at'=> Carbon\Carbon::now()]);
Illuminate\Database\Eloquent\MassAssignmentException with message 'title'
>>> $article = App\Article::create(['title'=>'New Article', 'body'=>'New body','
published_at'=> Carbon\Carbon::now()]);
Illuminate\Database\Eloquent\MassAssignmentException with message 'title'
>>>






$ php artisan tinker
Psy Shell v0.7.2 (PHP 5.6.19 ÃÃÃ¶ cli) by Justin Hileman
>>> $article = App\Article::create(['title'=>'New Article', 'body'=>'New body','

PHP Parse error: Syntax error, unexpected T_ENCAPSED_AND_WHITESPACE, expecting '
]' on line 1
>>> $article = App\Article::create(['title'=>'New Article', 'body'=>'New body','
published_at'=> Carbon\Carbon::now()]);
=> App\Article {#636
     title: "New Article",
     body: "New body",
     published_at: Carbon\Carbon {#635
       +"date": "2017-02-16 04:17:05.000000",
       +"timezone_type": 3,
       +"timezone": "UTC",
     },
     updated_at: "2017-02-16 04:17:05",
     created_at: "2017-02-16 04:17:05",
     id: 2,
   }
>>> App\Article::all()->toArray();
=> [
     [
       "id" => 1,
       "title" => "My Updated first Article",
       "body" => "Lorem ipsum",
       "created_at" => "2017-02-16 03:32:02",
       "updated_at" => "2017-02-16 03:59:30",
       "published_at" => "2017-02-16 03:30:17",
     ],
     [
       "id" => 2,
       "title" => "New Article",
       "body" => "New body",
       "created_at" => "2017-02-16 04:17:05",
       "updated_at" => "2017-02-16 04:17:05",
       "published_at" => "2017-02-16 04:17:05",
     ],
   ]
>>> $article = App\Article::find(2);
=> App\Article {#621
     id: 2,
     title: "New Article",
     body: "New body",
     created_at: "2017-02-16 04:17:05",
     updated_at: "2017-02-16 04:17:05",
     published_at: "2017-02-16 04:17:05",
   }
>>> $article->toArray();
=> [
     "id" => 2,
     "title" => "New Article",
     "body" => "New body",
     "created_at" => "2017-02-16 04:17:05",
     "updated_at" => "2017-02-16 04:17:05",
     "published_at" => "2017-02-16 04:17:05",
   ]
>>> $article->body = 'Updated';
=> "Updated"
>>> $article->save();
=> true
>>> $article->toArray();
=> [
     "id" => 2,
     "title" => "New Article",
     "body" => "Updated",
     "created_at" => "2017-02-16 04:17:05",
     "updated_at" => "2017-02-16 04:21:16",
     "published_at" => "2017-02-16 04:17:05",
   ]
>>> $article->update(['body' => 'Updated Again']);
=> true
>>> App\Article::all()->toArray();
=> [
     [
       "id" => 1,
       "title" => "My Updated first Article",
       "body" => "Lorem ipsum",
       "created_at" => "2017-02-16 03:32:02",
       "updated_at" => "2017-02-16 03:59:30",
       "published_at" => "2017-02-16 03:30:17",
     ],
     [
       "id" => 2,
       "title" => "New Article",
       "body" => "Updated Again",
       "created_at" => "2017-02-16 04:17:05",
       "updated_at" => "2017-02-16 04:22:48",
       "published_at" => "2017-02-16 04:17:05",
     ],
   ]
>>>



$ php artisan make:controller ArticlesController --plain


  [Symfony\Component\Console\Exception\RuntimeException]
  The "--plain" option does not exist.



$ php artisan make:controller ArticlesController
