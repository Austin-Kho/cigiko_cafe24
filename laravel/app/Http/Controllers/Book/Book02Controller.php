<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Book02Controller extends Controller
{
  public function index($id='1'){

    $view = view('book.Book02.book02');
    $view->title = '개발자를 위한 파이썬';
    $view->defurl = 'book02';
    $view->id = $id;
    $view->sub[1] = [1, 'I. 빠르게 살펴보는 파이썬 기초'];
    $view->sub[2] = [2, '01. 파이썬 프로그래밍 준비와 시작'];
    $view->sub[3] = [2, '02. 파이썬의 주요 특징'];
    $view->sub[4] = [2, '03. 데이터 타입과 기본 연산자'];
    $view->sub[5] = [2, '04. 흐름 제어와 예외 처리'];
    $view->sub[6] = [2, '05. 함수와 람다'];
    $view->sub[7] = [2, '06. 객체지향과 클래스'];
    $view->sub[8] = [2, '07. 모듈과 패키지'];
    $view->sub[9] = [2, '08. 파일 읽고 쓰기'];
    $view->sub[10] = [1, 'II. 도전! 파이썬 실무 예제'];
    $view->sub[11] = [2, '09. 크롤링 애플리케이션 만들기'];
    $view->sub[12] = [2, '10. SQLite 데이터베이스 사용하기'];
    $view->sub[13] = [2, '11. 플라스크로 API 서버 만들기'];
    $view->sub[14] = [2, '12. 슬랙 봇 만들기'];
    $view->sub[15] = [2, '13. 메시지 큐 만들기'];
    $view->sub[16] = [2, '14. 팬더스로 데이터 분석하기'];
    $view->sub[17] = [2, '15. Open API로 매시업 API 서버 만들기'];
    $view->sub[18] = [1, 'Appendix'];
    $view->sub[19] = [2, '부록 A. pip 설치와 venv 설정하기'];
    $view->sub[20] = [2, '부록 B. IPython과 Jupyter Notebook'];
    $view->sub[21] = [2, '부록 C. PEP 8'];
    $view->maxid = 21;
    return $view;
  }
}
