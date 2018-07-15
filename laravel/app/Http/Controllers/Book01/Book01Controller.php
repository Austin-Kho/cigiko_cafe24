<?php

namespace App\Http\Controllers\Book01;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Book01Controller extends Controller
{
  public function index($id='1'){
    $view = view('Book01.book01');
    $view->id = $id;
    $view->sub[1] = '01장 파이썬(python) 기초';
    $view->sub[2] = '02장 흐름 제어';
    $view->sub[3] = '03장 함수(method)';
    $view->sub[4] = '04장 리스트(list)';
    $view->sub[5] = '05장 사전(dictionary) 및 구조화 데이터';
    $view->sub[6] = '06장 문자열(String) 조작하기';
    $view->sub[7] = '07장 정규표현식을 사용한 패턴 대조하기';
    $view->sub[8] = '08장 파일 읽기 및 쓰기';
    $view->sub[9] = '09장 파일 조직화하기';
    $view->sub[10] = '10장 디버깅';
    $view->sub[11] = '11장 웹 스크랩';
    $view->sub[12] = '12장 엑셀 스프레드시트 다루기';
    $view->sub[13] = '13장 PDF 및 워드 문서 작업';
    $view->sub[14] = '14장 CSV 파일 및 JSON 데이터 작업';
    $view->sub[15] = '15장 시간 지키기, 작업 예약하기 및 프로그램 실행시키기';
    $view->sub[16] = '16장 전자메일 및 문자 메시지 전송';
    $view->sub[17] = '17장 이미지 조작';
    $view->sub[18] = '18장 키보드와 마우스 제어 및 GUI 자동화';
    $view->sub[19] = '부록-A 타사 모듈 설치';
    $view->sub[20] = '부록-B 프로그램 실행하기';
    $view->sub[21] = '부록-C 연습 문제 해답';
    $view->maxid = '21';
    return $view;
  }
}
