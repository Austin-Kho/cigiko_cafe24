<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
  public function index($bookid='01', $id='1'){

    $view = view('book.book_index');

    if($bookid=='01'){

      $view->title = '파이썬으로 지루한 작업 자동화 하기';
      $view->defurl = $bookid;
      $view->id = $id;
      $view->sub[1] = [1, '1부 파이썬 프로그래밍 기초'];
      $view->sub[2] = [2, '01장 파이썬(python) 기초'];
      $view->sub[3] = [2, '02장 흐름 제어'];
      $view->sub[4] = [2, '03장 함수(method)'];
      $view->sub[5] = [2, '04장 리스트(list)'];
      $view->sub[6] = [2, '05장 사전(dictionary) 및 구조화 데이터'];
      $view->sub[7] = [2, '06장 문자열(String) 조작하기'];
      $view->sub[8] = [1, '2부 작업 자동화하기'];
      $view->sub[9] = [2, '07장 정규표현식을 사용한 패턴 대조하기'];
      $view->sub[10] = [2, '08장 파일 읽기 및 쓰기'];
      $view->sub[11] = [2, '09장 파일 조직화하기'];
      $view->sub[12] = [2, '10장 디버깅'];
      $view->sub[13] = [2, '11장 웹 스크랩'];
      $view->sub[14] = [2, '12장 엑셀 스프레드시트 다루기'];
      $view->sub[15] = [2, '13장 PDF 및 워드 문서 작업'];
      $view->sub[16] = [2, '14장 CSV 파일 및 JSON 데이터 작업'];
      $view->sub[17] = [2, '15장 시간 지키기, 작업 예약하기 및 프로그램 실행시키기'];
      $view->sub[18] = [2, '16장 전자메일 및 문자 메시지 전송'];
      $view->sub[19] = [2, '17장 이미지 조작'];
      $view->sub[20] = [2, '18장 키보드와 마우스 제어 및 GUI 자동화'];
      $view->sub[21] = [1, 'APPENDIX'];
      $view->sub[22] = [2, '부록-A 타사 모듈 설치'];
      $view->sub[23] = [2, '부록-B 프로그램 실행하기'];
      $view->sub[24] = [2, '부록-C 연습 문제 해답'];
      $view->maxid = 24;
    }elseif($bookid=='02'){
      $view->title = '개발자를 위한 파이썬';
      $view->defurl = $bookid;
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
    }
    return $view;
  }
}
