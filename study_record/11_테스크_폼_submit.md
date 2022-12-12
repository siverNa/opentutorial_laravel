# 테스크 폼 submit

## 폼 동작 만들 준비
tailwindcss 를 이용해 그럴듯한 폼을 만든 뒤, `submit` 버튼을 클릭했을 때의 동작을 만듭니다.  

먼저, 공식 페이지에서 제공하는 대로, 양식에 맞추어 코드를 추가합니다.  
```php
    /* web.php */
    Route::post('/tasks', 'TaskController@store');

    /* TaskController.php */
    ...
    public function store()
    {
        return redirect('/tasks');
    }
    ...
```
하지만 이렇게 설정하고 `submit` 을 누르면, `page expired` 라는 경고문이 뜰 것입니다.  
이는 `laravel` 이 제공하는 보안 기능이기 때문입니다.  
이를 적극적으로 이용하기 위해, `layout` 과 `form` 을 사용하는 `create` 에 코드를 추가합니다.  
```php
    /* layout.blade.php */
    <head>
        ...
        <meta name="csrf-token" content="{{ csrf_token() }}">
        ...
    </head>

    /* create.blade.php */
    <form action="/tasks" method="POST">
        @csrf//form 태그 아래에 추가해주면 됩니다.
        ...
```

이렇게 추가하면, 보안도 향상되고, 경고문도 더이상 안뜨게됩니다!  

## 동작 추가
이제 `form` 의 동작을 만들어 `tasks` 테이블에 데이터를 입력할 것입니다.  
`TaskController.php` 를 수정해, `create.blade.php` 로부터 데이터를 받도록 합시다.  
```php
    public function store(Request $request)
    {
        $task = Task::create([
            'title' => $request->input('title'),//input 태그의 name 삽입
            'body' => $request->input('body')
        ]);

        return redirect('/tasks');
    }
```
`Request` 변수를 만들고, 이를 호출해 각각의 컬럼에 데이터를 넣을 수 있도록 합니다.  
`Task::create` 는 이전에 공부한 내용대로, `model` 을 호출해 `db` 를 수정할 수 있도록 도와주는 코드입니다.  
  
이대로 실행하면 에러가 뜰텐데, `fillable` 과 관련된 단어가 보입니다.
이는 `model` 에 해당되는 `Task.php` 에 `fillable` 설정을 추가 안했기 때문입니다.  
`fillable` 이란, 데이터를 넣을 수 있는 필드를 제한하는 코드입니다.  
그러므로, `protected $fillable = ['title', 'body'];` 와 같이 추가해줍니다.
  
이렇게하면, 테이블에 정상적으로 내용이 입력되는 걸 확인할 수 있습니다.

## 데이터 출력
테이블에 데이터를 넣었다면, 이제 이것을 출력해줄 차례입니다.  
`controller` 의 `index` 함수를 다음과 같이 수정합니다.  
```php
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }
```
`Task::all()` 을 통해 테이블의 내용을 전부 가져오고, `return` 대상 `blade.php` 에 변수를 전달합니다.  
`index.blade.php` 에선 `foreach` 문을 이용해 데이터들을 불러옵니다.  
```php
    <ul>
        @foreach ($tasks as $task)
            <li class="border my-3 p-3">
                Title : {{ $task->title }}
                <small class="float-right">
                    Created at {{ $task->created_at }}
                </small>
            </li>
        @endforeach
    </ul>
```
이와 같이 입력하면, 비교적 정돈된 모습으로 데이터들이 출력되게 됩니다!  