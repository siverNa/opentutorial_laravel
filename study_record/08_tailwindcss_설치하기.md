# tailwindcss 설치하기

`npm` 을 이용해 css 프레임워크인 `tailwindcss`를 설치할 것입니다.

## `npm` 설치
`npm` 을 사용하기 위해선 `node.js` 를 설치해야합니다.  
공식 사이트로 들어가 설치를 진행해줍니다.  

설치가 완료되면 정상적으로 설치됐는지 `npm -v`, `node -v` 를 통해 확인합니다.  

## `tailwindcss` 설치
공식 사이트에서 알려준 방법대로, 다음과 같은 명령어를 입력해서 설치를 진행합니다.  
`npm install tailwindcss`

`tailwindcss` 및 `npm install` 명령어로 설치된 모듈들은 `node_modules` 에 위치해있습니다.  

## 적용하기
설치한 `tailwindcss` 를 적용하기 위해, `resources` 디렉토리 아래에 `css` 디렉토리를 생성합니다.  
> 저의 경우엔, 이미 생성되있었습니다.
그리고 `tailwind.css` 파일을 생성합니다.  

그리고 루트 아래 `webpack.mix.js` 에 코드를 추가해줍니다.
```js
    mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/tailwind.css', 'public/css', [
        //
        require("tailwindcss"),//추가된 부분
    ]);
```
> `webpack.mix.js` 란?
> `laravel` 에서 제공하는 `webpack` 을 쉽게 사용할 수 있도록 해주는 도구  
> `resources` 아래의 `javascript` 나 `sass` 파일들을 컴파일해서 `public` 폴더로 컴파일된 파일들을 옮겨주는 역할  
> 즉, `postCss('resources/css/tailwind.css', 'public/css'...` 는  
> - `resources/css/tailwind.css` 의 파일을
> - `public/css` 로 컴파일해서 생성해달라는 의미

컴파일하는 작업 명령어는 `npm run dev` 입니다.
> 저는 이 부분에서 계속 오류나서, 다른 방법을 사용했습니다.
> 공식 사이트 `https://tailwindcss.com/docs/guides/laravel#mix` 로 들어가,  
> 설명하는 순서대로 진행한 뒤, `npm run watch` 를 이용하였습니다.  
>
> ... 추가
> 테스트 하는 도중, `npm run dev` 를 다시 실행시켰더니 잘 됩니다... 이유가 무엇인지..  

정상적으로 컴파일 되었다면, `public/css` 아래에 컴파일된 파일이 생성된 걸 볼 수 있습니다.

이제 `layout.blade.php` 를 수정합니다.
```php
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" >//head 태그 내에 삽입
    ...
    <h1 class="text-3xl font-bold underline bg-red-800">//tailwindcss 태그들
        Hello world!
    </h1>
```

작성한 뒤 페이지에 접속하면 `css` 가 적용된 것을 확인할 수 있습니다.
(어째서인지, 기존의 css 속성은 무력화된 걸 발견했습니다.)