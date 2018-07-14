        <div class="col-sm-3">
          <div class="row">
            <div class="col-sm-4 col-md-3 sidebar" style="display:none;">
              <div class="toc" data-spy="affix_">
                <div class="visible-xs" style="height:20px;">&nbsp;</div>
                <div class="row" style="border-bottom: solid 1px #ccc; padding-bottom: 10px; margin-bottom: 20px;">
                  <div class="col-xs-10">
                    <form class="">
                      <input type="text" class="form-control" placeholder="검색어를 입력하세요.">
                    </form>
                  </div>
                  <div class="col-xs-2 side_handle" style="padding: 8px 7px 6px 0; text-align: right; cursor:pointer;">
                    <span class="glyphicon glyphicon-menu-hamburger" title="메뉴"></span>
                  </div>
                </div>

                <div class="row subject_group" style="margin-bottom: 10px; background-color: #b6b2af; color: #FFF; cursor: pointer;">
                  <div class="col-xs-12"><h5>I 빠르게 살펴보는 파이썬 기초</h5></div>
                </div>

                <div class="nav nav-sidebar">
                  <li class=@if($id==null or $id=='1') active @endif><a href="/book02/1">1. 파이썬 프로그래밍 준비와 시작<span class="sr-only">(current)</span></a></li>
                  <li class=@if($id=='2') active @endif><a href="/book02/2">2. 파이썬의 주요 특징</a></li>
                  <li class=@if($id=='3') active @endif><a href="/book02/3">3. 데이터 타입과 기본 연산자</a></li>
                  <li class=@if($id=='4') active @endif><a href="/book02/4">4. 흐름 제어와 예외 처리</a></li>
                  <li class=@if($id=='5') active @endif><a href="/book02/5">5. 함수와 람다</a></li>
                  <li class=@if($id=='6') active @endif><a href="/book02/6">6. 객체지향과 클래스</a></li>
                  <li class=@if($id=='7') active @endif><a href="/book02/7">7. 모듈과 패키지</a></li>
                  <li class=@if($id=='8') active @endif><a href="/book02/8">8. 파일 읽고 쓰기</a></li>
                </div>

                <div class="row subject_group" style="margin-bottom: 10px; background-color: #b6b2af; color: #FFF; cursor: pointer;">
                  <div class="col-xs-12"><h5>II 도전! 파이썬 실무 예제</h5></div>
                </div>

                <div class="nav nav-sidebar">
                  <li class=@if($id=='9') active @endif><a href="/book02/9">9. 크롤링 애플리케이션 만들기</a></li>
                  <li class=@if($id=='10') active @endif><a href="/book02/10">10. SQLite 데이터베이스 사용하기</a></li>
                  <li class=@if($id=='11') active @endif><a href="/book02/11">11. 플라스크로 API 서버 만들기</a></li>
                  <li class=@if($id=='12') active @endif><a href="/book02/12">12. 슬랙 봇 만들기</a></li>
                  <li class=@if($id=='13') active @endif><a href="/book02/13">13. 메시지 큐 만들기</a></li>
                  <li class=@if($id=='14') active @endif><a href="/book02/14">14. 팬더스로 데이터 분석하기</a></li>
                  <li class=@if($id=='15') active @endif><a href="/book02/15">15. Open API로 매시업 API 서버 만들기</a></li>
                </div>

                <div class="row subject_group" style="margin-bottom: 10px; background-color: #b6b2af; color: #FFF; cursor: pointer;">
                  <div class="col-xs-12"><h5>Appendix</h5></div>
                </div>

                <div class="nav nav-sidebar">
                  <li class=@if($id=='16') active @endif><a href="/book02/16">A. pip 설치와 venv 설정하기</a></li>
                  <li class=@if($id=='17') active @endif><a href="/book02/17">B. IPython과 Jupyter Notebook</a></li>
                  <li class=@if($id=='18') active @endif><a href="/book02/18">C. PEP 8</a></li>
                </div>
              </div>
            </div>
          </div>
        </div>
