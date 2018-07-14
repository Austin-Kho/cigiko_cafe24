
        <div class="col-sm-4 col-md-3 sidebar">
          <div class="row" style="border-bottom: solid 1px #ccc; margin-bottom: 20px;">
            <div class="col-xs-10"><h5><strong>개발자를 위한 파이썬</strong></h5></div>
            <div class="col-xs-2" style="padding: 8px 7px 6px 0;">
              <a class="col-xs-2" style="cursor:pointer;"><span class="glyphicon glyphicon-menu-hamburger" title="메뉴"></span></a>
            </div>
          </div>

          <div class="row subject_group" style="margin-bottom: 10px; background-color: #b6b2af; color: #FFF; cursor: pointer;">
            <div class="col-xs-12"><h5>I 빠르게 살펴보는 파이썬 기초</h5></div>
          </div>

          <div class="nav nav-sidebar">
            <li class=@if($id==null or $id=='1') active @endif><a href="/book02/1" class="d1">1. 파이썬 프로그래밍 준비와 시작<span class="sr-only">(current)</span></a></li>
            <li class=@if($id=='2') active @endif><a href="/book02/2" class="d1">2. 파이썬의 주요 특징</a></li>
            <li class=@if($id=='3') active @endif><a href="/book02/3" class="d1">3. 데이터 타입과 기본 연산자</a></li>
            <li class=@if($id=='4') active @endif><a href="/book02/4" class="d1">4. 흐름 제어와 예외 처리</a></li>
            <li class=@if($id=='5') active @endif><a href="/book02/5" class="d1">5. 함수와 람다</a></li>
            <li class=@if($id=='6') active @endif><a href="/book02/6" class="d1">6. 객체지향과 클래스</a></li>
            <li class=@if($id=='7') active @endif><a href="/book02/7" class="d1">7. 모듈과 패키지</a></li>
            <li class=@if($id=='8') active @endif><a href="/book02/8" class="d1">8. 파일 읽고 쓰기</a></li>
          </div>

          <div class="row subject_group" style="margin-bottom: 10px; background-color: #b6b2af; color: #FFF; cursor: pointer;">
            <div class="col-xs-12"><h5>II 도전! 파이썬 실무 예제</h5></div>
          </div>

          <div class="nav nav-sidebar">
            <li class=@if($id=='9') active @endif><a href="/book02/9" class="d1">9. 크롤링 애플리케이션 만들기</a></li>
            <li class=@if($id=='10') active @endif><a href="/book02/10" class="d1">10. SQLite 데이터베이스 사용하기</a></li>
            <li class=@if($id=='11') active @endif><a href="/book02/11" class="d1">11. 플라스크로 API 서버 만들기</a></li>
            <li class=@if($id=='12') active @endif><a href="/book02/12" class="d1">12. 슬랙 봇 만들기</a></li>
            <li class=@if($id=='13') active @endif><a href="/book02/13" class="d1">13. 메시지 큐 만들기</a></li>
            <li class=@if($id=='14') active @endif><a href="/book02/14" class="d1">14. 팬더스로 데이터 분석하기</a></li>
            <li class=@if($id=='15') active @endif><a href="/book02/15" class="d1">15. Open API로 매시업 API 서버 만들기</a></li>
          </div>

          <div class="row subject_group" style="margin-bottom: 10px; background-color: #b6b2af; color: #FFF; cursor: pointer;">
            <div class="col-xs-12"><h5>Appendix</h5></div>
          </div>

          <div class="nav nav-sidebar">
            <li class=@if($id=='16') active @endif><a href="/book02/16" class="d1">A. pip 설치와 venv 설정하기</a></li>
            <li class=@if($id=='17') active @endif><a href="/book02/17" class="d1">B. IPython과 Jupyter Notebook</a></li>
            <li class=@if($id=='18') active @endif><a href="/book02/18" class="d1">C. PEP 8</a></li>
          </div>
        </div>


        <div class="col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 main" style="padding-bottom:5px;">
          <!-- <div class="btn-group pull-right menu-group" role="group">
            <small>
              <a class="menu_link menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" title="메뉴"></span></a>
            </small>
          </div> -->
          <div class="menu-wikidocs"></div>

          <div class="clearfix page-depth" style="margin-bottom: 50px;">
            <div class="col-xs-9" style="color:#afb1af;">
              <small><a href="/book02"><i class="glyphicon glyphicon-folder-open"></i> 개발자를 위한 파이썬</a> / </small>
              <small><a href="/book02/1">{{$sub[$id]}}</a></small>
            </div>
            <div class="col-xs-3" style="text-align: right;">
              <small><a href="/"><i class="glyphicon glyphicon-home"></i> Python Books</a></small>
            </div>
          </div>

          <div class="row" style="margin-bottom: 50px; color:#FFF; font-size: 30tp;">
            @if($id!='1')
              <div onclick="location.href='/book02/{{(string)((int)($id)-1)}}'" class="col-xs-1" style="background-color:#82bbf6; padding: 10px; cursor: pointer;">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              </div>
            @endif
            @if($id=='1' or $id==18)
              <div class="col-xs-11"> </div>
            @else
              <div class="col-xs-10"> </div>
            @endif
            @if($id!=='18')
              <div onclick="location.href='/book02/{{(string)((int)($id)+1)}}'" class="col-xs-1"  style="background-color:#82bbf6; padding: 10px; cursor: pointer; text-align: right;">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              </div>
            @endif
          </div>
