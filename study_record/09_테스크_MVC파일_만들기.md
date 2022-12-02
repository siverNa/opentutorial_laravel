# 테스크 MVC 파일 만들기

`tailwindcss` 를 이용해서 form 을 만들어볼 것입니다.  
앞으로 우리는 `task`를 생성하고, 여기에 댓글도 달 수 있는 페이지를 만들어볼 것입니다.  

## model 만들기
모델을 만들때, `-c, -m` 옵션을 추가하면 컨트롤러와 마이그레이션까지 한번에 생성할 수 있습니다.  
`php artisan make:model Task -c -m`

## migration 올리기
생성된 `tasks` `migration` 파일에 코드를 추가합니다.  
```php
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');//task 제목
            $table->longText('body');//task 내용
            $table->timestamps();
        });
    }
```
다음으로, 이전에 배운 것처럼 `php artisan migrate` 로 `task` `migration` 을 업로드합니다.  

## 파일 수정, 수정..
페이지를 불러올 수 있도록 `route` 의 `web.php` 에 페이지를 추가해줍니다.  
```php
    Route::get('/tasks', 'TaskController@index');
```
앞으로 만들 페이지는 `/tasks` 아래에 생성할 것입니다.  
또한 `controller` 도 페이지를 반환할 수 있도록 `controller` 도 수정해줍니다.  
```php
    class TaskController extends Controller
    {
        public function index()
        {
            return view('tasks.index');
        }
    }
```

다음으로, 보여질 페이지인  `index.blade.php` 를 추가해줍니다.  
```php
    @extends('layout')

    @section('title')
        Tasks
    @endsection

    @section('content')
        <h1 class="font-bold text-3xl">Tasks List</h1>
    @endsection
```

또한 `layout.blade.php` 도 수정합니다.
```php
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" >
        <title>@yield('title', 'laravel')</title>
    </head>
    <body>
        <div class="container mx-auto">//스타일 추가
            @yield('content')
        </div>
    </body>
    </html>
```
여기까지 하면, 우리는 `task` 페이지를 보여줄 준비가 완료된 겁니다.  

## tasks 생성 페이지
이제 `task` 를 생성하는 페이지를 만들어야합니다.  
`laravel` 에서 컨벤션을 지원하는데, `web.php` 에 다음과 같이 추가합니다.  
`Route::get('/tasks/create', 'TaskController@create');`

그리고 컨트롤러에도 이를 호출해주는 함수를 만듭니다.
```php
    public function create()
    {
        return view('tasks.create');
    }
```

마지막으로, 사용자에게 보여줄 `create.blade.php` 도 생성합니다.  
```php
    @extends('layout')

    @section('title')
        Create Tasks
    @endsection

    @section('content')
        <h1 class="font-bold text-3xl">Create Task</h1>
    @endsection
```

다음으로, 추가적인 form을 만들어볼 것입니다.  