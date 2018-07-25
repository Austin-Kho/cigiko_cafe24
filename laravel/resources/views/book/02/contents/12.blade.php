  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>애플리케이션에서 주로 다루는 건 데이터이다. 어디선가 데이터를 불러와서 어딘가에 저장한다. 여러군데서 데이터를 읽어오게 되고 주로, 파일이나 데이터베이스에 데이터를 저장하게 된다. 이 장에서는 모바일 앱에서 많이 사용하는 SQLite라는 데이터베이스를 다루는 방법을 살펴본다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">10.1. SQLite</h3>
  <div class="chapter">
    <section>
      <article>
        <p><a href="https://www.sqlite.org" target="_blank">SQLite</a>는 디스크 파일 기반의 데이터베이스다. 별도의 데이터베이스를 준비할 필요가 없어서 데이터베이스를 제대로 구축하기 전 프로토타이핑하기에 매우 좋다. 파일뿐만 아니라 메모리에 데이터베이스를 생성해서 사용할 수도 있다.</p>
        <h5>그림10-1 SQLite 홈페이지</h5>
        <img src="/img/img14.png" alt="SQLite 홈페이지">
        <p>어떤 설정을 할 필요가 없고, 데이터베이스 서버를 구축할 필요도 없다. SQLite를 사용하는데 필요한 건 제대로 설치된 파이썬뿐이다.</p>
        <p>파이썬은 데이터베이스 API에 대한 규격도 정의해 놓았다. 따라서 SQLite로 데이터베이스를 프로토타이핑하거나 간단하게 구현해두고, 나중에 데이터베이스에 연결하는 부분만 바꿔주면 손쉽게 다른 데이터베이스 엔진이나 서버에 연결해서 사용할 수 있다.</p>
        <p>이제부터 사용방법을 살펴보자. 참고로 더 자세한 내용을 보려면 '<a href="https://docs.python.org/3/library/sqlite3.html" target="_blank">12.6 sqlite3--DB-API 2.0 interface for SQLite databases</a>'를 살펴보면 좋다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">10.2. 데이터베이스 연결하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>먼저 해야할 것은 데이터베이스에 연결하는 것이다. 그러려면 SQLite를 불러와야 한다. 다음은 SQLite를 불러와서 데이터베이스 파일을 하나 생성해 사용할 준비를 하는 코드이다. examples라는 임의의 디렉터리를 만들고 그 안에 db.sqlite라는 파일을 생성한다.</p>
        <h5>코드10-1 데이터베이스 생성과 연결</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:</li><li><font color="#ff7700">import</font>&nbsp;sqlite3</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;데이터베이스&nbsp;파일이&nbsp;저장될&nbsp;경로와&nbsp;파일&nbsp;이름을&nbsp;써서&nbsp;데이터베이스에&nbsp;연결합니다.</font></li><li>con&nbsp;<font color="#66cc66">=</font>&nbsp;sqlite3.<font>connect</font><font>&#40;</font><font color="#483d8b">&quot;examples/db.sqlite&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;유니코드&nbsp;인코딩&nbsp;문제가&nbsp;발생하면&nbsp;해당&nbsp;코드의&nbsp;주석을&nbsp;해제하고&nbsp;실행하세요.</font></li><li><font color="#808080">#&nbsp;con.text_factory&nbsp;=&nbsp;str</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;메모리에서&nbsp;직접&nbsp;데이터베이스를&nbsp;이용하는&nbsp;코드입니다.</font></li><li><font color="#808080">#&nbsp;con&nbsp;=&nbsp;sqlite3.connect(&quot;:memory:&quot;)</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;데이터베이스를&nbsp;동작시키기&nbsp;위한&nbsp;Cursor&nbsp;객체를&nbsp;생성합니다.</font></li><li><font color="#808080">#&nbsp;데이터베이스를&nbsp;사용하기&nbsp;위한&nbsp;마지막&nbsp;준비라고&nbsp;생각하면&nbsp;됩니다.</font></li><li>cur&nbsp;<font color="#66cc66">=</font>&nbsp;con.<font>cursor</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;이제&nbsp;무언가&nbsp;하면&nbsp;됩니다.</font></li></ol></blockquote></code></pre>
        <p>connect()로 연결하고 cursor()로 데이터베이스를 동작시켜서 작업하는 형태가 된다. 파이썬을 이용한 데아터베이스 작업 대부분은 이 과정을 그대로 따른다. 이것으로 SQLite 데이터베이스 파일 생성과 연결이 끝났다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">10.3. 테이블 생성하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>데이터베이스 구조의 기본은 테이블이다. 테이블을 생성하는 작업 역시 파이썬 코드에 테이블 생성 쿼리(CREAT문)를 포함시켜 실행하면 간단하게 처리할 수 있다. 보통 쿼리문울 포함시켜 실행할 때는 Cursor 클래스의 execute() 를 사용하면 된다.</p>
        <p>9장에서 생성한 book_list.csv 파일을 데이터로 이용한다. 다음과 같이 hanbit_books 라는 테이블을 생성한다.</p>
        <h5>코드10-2 테이블 생성</h5>
      </article>
    </section>
  </div>

  <h3 class="sub-header">10.4. 데이터 삽입</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>

    <h4 class="sub-header">10.4.1 - 여러 개 데이터 한꺼번에 넣기</h4>
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">10.5. 데이터 선택하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">10.6. 기존 데이터 갱신하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">10.7. 데이터 삭제하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>
  <!-- <li class=@if($id=='95') active @endif><a href="/book02/95" class="d2">10.1 SQLite</a></li>
  <li class=@if($id=='96') active @endif><a href="/book02/96" class="d2">10.2 데이터베이스 연결하기</a></li>
  <li class=@if($id=='97') active @endif><a href="/book02/97" class="d2">10.3 테이블 생성하기</a></li>
  <li class=@if($id=='98') active @endif><a href="/book02/98" class="d2">10.4 데이터 삽입</a></li>
  <li class=@if($id=='99') active @endif><a href="/book02/99" class="d3">10.4.1 여러 개 데이터 한꺼번에 넣기</a></li>
  <li class=@if($id=='100') active @endif><a href="/book02/100" class="d2">10.5 데이터 선택하기</a></li>
  <li class=@if($id=='101') active @endif><a href="/book02/101" class="d2">10.6 기존 데이터 갱신하기</a></li>
  <li class=@if($id=='102') active @endif><a href="/book02/102" class="d2">10.7 데이터 삭제하기</a></li> -->
