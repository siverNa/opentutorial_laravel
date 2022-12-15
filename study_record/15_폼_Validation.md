# 폼 Validation

이전까지는 `title`, `body` 등을 넣고 `form` 데이터를 제출했습니다.  
하지만, `title` 을 비우고 제출하면, 에러가 발생합니다.  
이는 테이블을 생성할 때, 둘의 값이 비어있으면 안된다고 지정했기 때문입니다.  

이처럼 유효한 값만 제출할 수 있도록 지정해야하는데,  
1. `javascript` 를 이용  
2. 서버에서 작업  
 
이 있습니다.  

## `javascript` 이용
이 방법은 단순합니다.  
값을 입력받는 `input` 태그 속성에 `required` 을 추가하면 됩니다.  
만약 값이 없는데 제출하려하면, 이곳을 채워달라고 메세지를 띄웁니다.  
하지만, 크롬 등의 개발자 도구를 이용해, 이 속성을 지우면 이전과 똑같은 일이 발생합니다.  

## 서버에서 작업
```php
    public function store(Request $request)
    {
        $task = Task::create([
            'title' => $request->input('title'),//input 태그의 name 삽입
            'body' => $request->input('body')
        ]);

        return redirect('/tasks/'.$task->id);
    }
```
`create.blade.php` 로 부터 데이터를 받는 기존 컨트롤러의 코드입니다.  
그런데, `$request->input()` 코드는 `request` 로 대체될 수 있습니다.  
수정하면 다음과 같이 됩니다.  
```php
    public function store()
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $task = Task::create([
            'title' => request('title'),//input 태그의 name 삽입
            'body' => request('body')
        ]);

        /*
            $task = Task::create(request(['title', 'body'])); 도 동일
        */

        return redirect('/tasks/'.$task->id);
    }
```
여기서, `validate` 라는 처음보는 코드가 있습니다.  
`validate` 를 통해, `title` 과 `body` 에 값이 있다는 걸 확인하면 이를 통과합니다.  
하지면 여기서 문제가 있어 통과하지 못하면, 에러를 출력하고 이전 페이지로 돌아갑니다.  

지금은 에러가 출력되지않지만, 에러를 출력하기위해 `create.blade.php` 를 수정해줍니다.  
```php
    //create.blade.php
    <form action="/tasks" method="POST">
        @csrf
        <label class="block" for="title">Title</label>
        <input class="border border-dark w-100 @error('title') border border-red-700 @enderror" type="text" name="title" id="title" required><br>
        @error('title')
            <small class="text-red-700">{{ $message }}</small>
        @enderror
        <label class="block" for="body">Body</label>
        <textarea class="border border-dark w-100 @error('body') border border-red-700 @enderror" name="body" id="body" cols="30" rows="10" required></textarea><br>
        @error('body')
            <small class="text-red-700">{{ $message }}</small>
        @enderror
        <button class="text-white bg-red-800 px-4 py-2 float-right" type="submit">Submit</button>
    </form>
```
`@error ~ @enderror` 구문이 이번에 사용된 새로운 코드입니다.  
만약 에러가 있다면, 지정된 동작을 수행하도록 하는 코드입니다.  
이러한 코드를 `edit.blade.php` 에도 적용해줍니다.  
```php
    //edit.blade.php
    <form action="/tasks/{{ $task->id }}" method="POST">
        @method('PUT')
        @csrf
        <label class="block" for="title">Title</label>
        <input class="border border-dark w-100 @error('title') border border-red-700 @enderror" type="text" name="title" id="title" value="{{ $task->title }}" required><br>
        @error('title')
            <small class="text-red-700">{{ $message }}</small>
        @enderror
        <label class="block" for="body">Body</label>
        <textarea class="border border-dark w-100 @error('body') border border-red-700 @enderror" name="body" id="body" cols="30" rows="10" required>{{ $task->body }}</textarea><br>
        @error('body')
            <small class="text-red-700">{{ $message }}</small>
        @enderror
        <button class="text-white bg-red-800 px-4 py-2 float-right" type="submit">Submit</button>
    </form>
```
이렇게하면, 개발자 모드로 `required` 가 삭제되어도, 서버에서도 또 한번 막아주는 코드가 완성됩니다!  