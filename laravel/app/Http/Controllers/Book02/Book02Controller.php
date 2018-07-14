<?php

namespace App\Http\Controllers\Book02;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Book02Controller extends Controller
{
  public function index($id='1'){
    $view = view('Book02.book02');
    $view->id = $id;
    $view->sub[1] = '01. 파이썬 프로그래밍 준비와 시작';
    $view->sub[2] = '02. 파이썬의 주요 특징';
    $view->sub[3] = '03. 데이터 타입과 기본 연산자';
    $view->sub[4] = '04. 흐름 제어와 예외 처리';
    $view->sub[5] = '05. 함수와 람다';
    $view->sub[6] = '06. 객체지향과 클래스';
    $view->sub[7] = '07. 모듈과 패키지';
    $view->sub[8] = '08. 파일 읽고 쓰기';
    $view->sub[9] = '09. 크롤링 애플리케이션 만들기';
    $view->sub[10] = '10. SQLite 데이터베이스 사용하기';
    $view->sub[11] = '11. 플라스크로 API 서버 만들기';
    $view->sub[12] = '12. 슬랙 봇 만들기';
    $view->sub[13] = '13. 메시지 큐 만들기';
    $view->sub[14] = '14. 팬더스로 데이터 분석하기';
    $view->sub[15] = '15. Open API로 매시업 API 서버 만들기';
    $view->sub[16] = 'A. pip 설치와 venv 설정하기';
    $view->sub[17] = 'B. IPython과 Jupyter Notebook';
    $view->sub[18] = 'C. PEP 8';
    return $view;
  }
}
