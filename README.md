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