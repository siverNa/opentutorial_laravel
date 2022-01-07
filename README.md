# opentutorial_laravel

이 Git repository는 Opentutorial의 Laravel 강좌를 시청하고 실습한 기록을 남긴 저장소입니다.

강좌 주소 : https://opentutorials.org/module/4168/25428

## 설치법

- Composer 설치

  라라벨을 다운받기 위해선 composer를 먼저 설치해야합니다.

  > 라라벨은 의존성 관리를 위해 [컴포저](https://getcomposer.org/)를 활용합니다. 라라벨을 사용하기 전에, 여러분들은 라라벨을 설치할 서버(머신)에 Composer를 설치해야 합니다.

  다운로드 링크 : https://getcomposer.org/download/

- Laravel 설치

  먼저 라라벨 인스톨러를 composer를 사용하여 다운로드합니다.

  `composer global require laravel/installer`

- 프로젝트(폴더) 생성

  프로젝트를 만들 땐 다음과 같은 명령어를 사용합니다.

  > 라라벨 인스톨러가 설치 된 후, `laravel new` 명령어를 입력하면 여러분이 입력한 폴더안에 깨끗한(fresh) 상태의 라라벨 파일을 생성할 것입니다. 예를들어 `laravel new blog` 명령어는 `blog`라는 폴더를 생성 할것이며 라라벨이 필요로 하는 모든 의존 패키지들의 설치와 함께 깨끗한(fresh) 상태의 라라벨 파일들을 이 폴더에 설치합니다.

  `laravel new '만들 프로젝트명'`

  또는

  `composer create-project --prefer-dist laravel/laravel '만들 프로젝트명'` 를 사용합니다.

  >이 과정에서 저는 다음과 같은 오류가 발생했습니다.
  >
  >```
  >Problem 1
  >    - laravel/framework[v8.75.0, ..., 8.x-dev] require league/flysystem ^1.1 -> satisfiable by league/flysystem[1.1.0, ..., 1.x-dev].
  >    - league/flysystem[1.1.0, ..., 1.x-dev] require ext-fileinfo * -> it is missing from your system. Install or enable PHP's fileinfo extension.
  >    - Root composer.json requires laravel/framework ^8.75 -> satisfiable by laravel/framework[v8.75.0, ..., 8.x-dev].
  >
  >To enable extensions, verify that they are enabled in your .ini files:
  >    - C:\Bitnami\wampstack-7.4.9-0\php\php.ini
  >You can also run `php --ini` in a terminal to see which files are used by PHP in CLI mode.
  >Alternatively, you can run Composer with `--ignore-platform-req=ext-fileinfo` to temporarily ignore these required extensions.
  >
  >```
  >
  >해당 에러를 검색해보니, php.ini에서 설정을 바꿔주는 방법이 비교적 간단해 보였습니다.
  >
  >그래서 저는 php.ini 를 열어 `;extension=fileinfo` 의 앞에있는`;`를 지웠습니다. 그랬더니 문제없이 생성이 완료되었습니다.
  >
  >참고한 사이트 : https://stackoverflow.com/questions/52734707/your-requirements-could-not-be-resolved-to-an-installable-set-of-packages-for-la/52735079

- 실행해보기

  설치가 완료되면 만든 프로젝트(폴더) 로 이동해서 다음과 같은 명령어를 통해 서버를 열어줍니다.

  `php artisan serve`

  ![laravel_success](https://user-images.githubusercontent.com/69504543/148386890-f878abad-4fe7-4350-968d-579c82692b01.PNG)

  이렇게 하면 기본적인 laravel 설치 및 테스트 화면을 성공적으로 띄울 수 있습니다.

  ## 기본 라우팅

Laravel을 사용하면서 우리가 자주 사용하게 될 폴더는 `app` 과 `routes`, `database` 입니다.

`bootstrap` 폴더는 설정과 관련된 파일이 들어가는데, 당장은 건드리지 않을 예정입니다.

- Laravel은 MVC 모델을 따른다!

  `model` 에 해당하는 부분은 `\app\Models\User.php`

  `controller` 에 해당하는 부분은 `\app\Http\Controllers\Controller.php`

  `view` 에 해당하는 부분은 `\resources\views\welcome.blade.php` 입니다.

  만약 `blade.php` 템플릿을 사용하게 된다면 `views` 아래에 `blade.php` 파일들을 생성하면 됩니다.

  만약 `vue.js` 를 사용하고 싶다면 `js\components` 아래에 파일을 넣으면 됩니다. ~~Laravel이 Vue를 좋아한다네요... 처음 알았습니다.~~

- 화면 전시는 어떻게?

  `\routes\web.php` 을 열어보면 다음과 같은 코드가 있습니다.

  ```php
  <?php
  
  use Illuminate\Support\Facades\Route;
  
  /*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
  */
  
  Route::get('/', function () {
      return view('welcome');
  });
  
  ```

  `get();` 안의 첫번째 인수는 `경로` 를 의미합니다. 기본 도메인이 `127.0.0.1:8000` 인데, `8000`뒤에 `/` 가 생략되있습니다.

  나중에 경로 설정을 통해, `만약 이 경로로 들어가면, 이 페이지를 보여주고 싶어!` 라고 만들 수 있는 겁니다.
  그리고, 보여주고 싶은 페이지를 설정해주는 것이 `return view('welcome');` 부분 입니다.

  해당 파일은 `\resources\views\welcome.blade.php` 에 위치해있으며, `blade.php` 를 제외한 이름을 넣어주면 됩니다.

  만약, `localhost/hello` 주소로 이동했을 때, `welcome.blade.php` 를 보여주고 싶다면, 아래와 같은 코드를  `web.php`에 추가해주면 됩니다.

  ```php
  Route::get('/', function () {
      return view('welcome');
  });
  
  Route::get('/hello', function () {
      return view('welcome');
  });
  ```

  ![hello_laravel](https://user-images.githubusercontent.com/69504543/148563203-d11f9baf-a510-4c40-a45b-2f0d90e9b1f1.PNG)

  **정리 :** 라우팅을 하려면 `routes\web.php` 의 코드 추가 및 `resources\views` 에 파일을 추가해주기!

