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
        <p>먼저 해야할 것은 데이터베이스에 연결하는 것이다. 그러려면 SQLite를 불러와야 한다. 다음은 SQLite를 불러와서 데이터베이스 파일을 하나 생성해 사용할 준비를 하는 코드이다. 다음코드를 실행하기 현재 위치에 examples 라는 임의의 디렉터리를 미리 만들어 두고 콘솔에서 다음코드를 실행한다.(코드 실행 시 examples 디렉터리 안에 db.sqlite라는 파일이 생성된다.)</p>
        <h5>코드10-1 데이터베이스 생성과 연결</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:</li><li><font color="#ff7700">import</font>&nbsp;sqlite3</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;데이터베이스&nbsp;파일이&nbsp;저장될&nbsp;경로와&nbsp;파일&nbsp;이름을&nbsp;써서&nbsp;데이터베이스에&nbsp;연결합니다.</font></li><li>con&nbsp;<font color="#66cc66">=</font>&nbsp;sqlite3.<font>connect</font><font>&#40;</font><font color="#483d8b">&quot;examples/db.sqlite&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;유니코드&nbsp;인코딩&nbsp;문제가&nbsp;발생하면&nbsp;해당&nbsp;코드의&nbsp;주석을&nbsp;해제하고&nbsp;실행하세요.</font></li><li><font color="#808080">#&nbsp;con.text_factory&nbsp;=&nbsp;str</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;메모리에서&nbsp;직접&nbsp;데이터베이스를&nbsp;이용하는&nbsp;코드입니다.</font></li><li><font color="#808080">#&nbsp;con&nbsp;=&nbsp;sqlite3.connect(&quot;:memory:&quot;)</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;데이터베이스를&nbsp;동작시키기&nbsp;위한&nbsp;Cursor&nbsp;객체를&nbsp;생성합니다.</font></li><li><font color="#808080">#&nbsp;데이터베이스를&nbsp;사용하기&nbsp;위한&nbsp;마지막&nbsp;준비라고&nbsp;생각하면&nbsp;됩니다.</font></li><li>cur&nbsp;<font color="#66cc66">=</font>&nbsp;con.<font>cursor</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;이제&nbsp;무언가&nbsp;하면&nbsp;됩니다.</font></li></ol></blockquote></code></pre>
        <p><code>변수명1 = sqlite3.connect()</code>로 연결하고 <code>변수명2 = 변수명1.cursor()</code>로 Cursor 객체를 생성함으로서 데이터베이스를 동작시켜서 작업하는 형태가 된다. 파이썬을 이용한 데아터베이스 작업 대부분은 이 과정을 그대로 따른다. 이것으로 SQLite 데이터베이스 파일 생성과 연결이 끝났다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">10.3. 테이블 생성하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>데이터베이스 구조의 기본은 테이블이다. 테이블을 생성하는 작업 역시 파이썬 코드에 테이블 생성 쿼리(CREAT문)를 포함시켜 실행하면 간단하게 처리할 수 있다. 보통 쿼리문울 포함시켜 실행할 때는 Cursor 클래스의 execute() 를 사용하면 된다.</p>
        <p>9장에서 생성한 book_list.csv 파일을 데이터로 이용한다. 해당 파일을 examples 디렉터리 안으로 복사한 후, 다음과 같이 hanbit_books 라는 테이블을 생성한다.</p>
        <h5>코드10-2 테이블 생성</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li>cur.<font>execute</font><font>&#40;</font><font color="#483d8b">&quot;&quot;&quot;create&nbsp;table&nbsp;hanbit_books&nbsp;(</font></li><li><font color="#483d8b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;title&nbsp;varchar(100),</font></li><li><font color="#483d8b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;author&nbsp;varchar(100),</font></li><li><font color="#483d8b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;translator&nbsp;varchar(100),</font></li><li><font color="#483d8b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pub_date&nbsp;date,</font></li><li><font color="#483d8b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;isbn&nbsp;varchar(100)</font></li><li><font color="#483d8b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)&quot;&quot;&quot;</font><font>&#41;</font></li><li>con.<font>commit</font><font>&#40;</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p><code>execute()</code>의 파라미터로 테이블 생성 및 열 생성 쿼리가 들어가고, <code>commit()</code>으로 해당 작업을 커밋 하는 것이다. 참고로 테이블 생성작업은 <code>commit()</code>을 실행하지 않아도 자동으로 된다. 단, 명시해주는 것이 혹시 발생할 수 있는 에러를 방지하는 데 도움이 된다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">10.4. 데이터 삽입</h3>
  <div class="chapter">
    <section>
      <article>
        <p>위 예제를 통해 생성한 테이블에 데이터를 삽입해 보자.</p>
        <h5>코드10-3 테이블에 데이터 넣기</h5>
        <pre class="python"><code><blockquote><ol><li>In&nbsp;<font>&#91;</font><font color="#ff4500">10</font><font>&#93;</font>:&nbsp;</li><li>cur.<font>execute</font><font>&#40;</font><font color="#483d8b">&quot;insert&nbsp;into&nbsp;hanbit_books&nbsp;values&nbsp;(?,&nbsp;?,&nbsp;?,&nbsp;?,&nbsp;?)&quot;</font><font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font>&#40;</font><font color="#483d8b">&quot;책&nbsp;이름&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;저자&nbsp;이름&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;번역자&nbsp;이름&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;2016-08-22&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;&nbsp;9788968480011&quot;</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">10</font><font>&#93;</font>:&nbsp;</li><li><font color="#66cc66">&lt;</font>sqlite3.<font>Cursor</font>&nbsp;at&nbsp;<font color="#ff4500">0x10eceece0</font><font color="#66cc66">&gt;</font></li></ol></blockquote></code></pre>
        <p><code>execute()</code>의 두 번째 파라미터 리스트 내부의 아이템 순서대로 채워진다. 참고로 첫 번째 파리미터의 <code>?</code>는 두 번째 파리미터 리스트 숫자만큼 넣어야 합니다.</p>
        <p>만약 변수 하나가 여러 열에 들어갈 경우에는 이름 있는 파라미터를 사용하면 된다.</p>
        <h5>코드10-4 이름 있는 파라미터 사용하기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">4</font><font>&#93;</font>:</li><li>query_str&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;insert&nbsp;into&nbsp;hanbit_books&nbsp;values&nbsp;(:title,&nbsp;:title,&nbsp;:title,&nbsp;:pub_date,&nbsp;:isbn)&quot;</font></li><li>params&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;title&quot;</font>:<font color="#483d8b">&quot;책&nbsp;이름&quot;</font><font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;pub_date&quot;</font>:<font color="#483d8b">&quot;2017-10-12&quot;</font><font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;isbn&quot;</font>:<font color="#ff4500">9788968480022</font></li><li><font>&#125;</font></li><li>&nbsp;</li><li>cur.<font>execute</font><font>&#40;</font>query_str<font color="#66cc66">,</font>&nbsp;params<font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">4</font><font>&#93;</font>:</li><li><font color="#66cc66">&lt;</font>sqlite3.<font>Cursor</font>&nbsp;at&nbsp;<font color="#ff4500">0x10eceece0</font><font color="#66cc66">&gt;</font></li></ol></blockquote></code></pre>
    </section>

    <h4 class="sub-header">10.4.1 - 여러 개 데이터 한꺼번에 넣기</h4>
    <section>
      <article>
        <p>데이터베이스를 다룰 때 일반적으로 대량의 데이터를 입력해야 하는 경우가 많다. 이럴 때는 <code>executemany()</code> 를 사용한다.</p>
        <p>앞서 언급한대로 대량의 데이터는 book_list.csv 파일을 사용하기로 한다. 다음 코드로 해당 파일의 데이터를 가져온다.</p>
        <h5>코드10-5 CSV 파일에서 데이터 가져오기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">5</font><font>&#93;</font>:</li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">csv</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;csv&nbsp;파일을&nbsp;엽니다.</font></li><li>csv_file&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">open</font><font>&#40;</font><font color="#483d8b">&quot;examples/book_list.csv&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;연&nbsp;파일을&nbsp;csv&nbsp;리더로&nbsp;읽습니다.</font></li><li>csv_reader&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#dc143c">csv</font>.<font>reader</font><font>&#40;</font>csv_file<font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;csv&nbsp;파일을&nbsp;리스트&nbsp;형식으로&nbsp;바꿉니다.</font></li><li>book_list&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">list</font><font>&#40;</font>csv_reader<font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;csv&nbsp;header를&nbsp;제거합니다.</font></li><li>book_list&nbsp;<font color="#66cc66">=</font>&nbsp;book_list<font>&#91;</font><font color="#ff4500">1</font>:<font>&#93;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;최초&nbsp;크롤링할&nbsp;때&nbsp;있었던&nbsp;저자&nbsp;혹은&nbsp;번역자&nbsp;데이터의&nbsp;앞뒤&nbsp;공백을&nbsp;제거합니다.</font></li><li><font color="#ff7700">for</font>&nbsp;item&nbsp;<font color="#ff7700">in</font>&nbsp;book_list:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;item<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>&nbsp;<font color="#66cc66">=</font>&nbsp;item<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>.<font>strip</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;item<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>&nbsp;<font color="#66cc66">=</font>&nbsp;item<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>.<font>strip</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;제대로&nbsp;되었나&nbsp;출력해&nbsp;봅니다.</font></li><li><font>&#91;</font></li><li><font>&#91;</font><font color="#483d8b">'IT&nbsp;CookBook,&nbsp;컴퓨터&nbsp;비전'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'오일석'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2014-07-01'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9791156641216'</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;</li><li><font>&#91;</font><font color="#483d8b">'뇌를&nbsp;자극하는&nbsp;Windows&nbsp;Server&nbsp;2008'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'우재남'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2011-03-11'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788979148206'</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;</li><li><font>&#91;</font><font color="#483d8b">'이것이&nbsp;C++이다'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'최호성'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2016-01-19'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788968482465'</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;</li><li><font>&#91;</font><font color="#483d8b">'뇌를&nbsp;자극하는&nbsp;C++&nbsp;프로그래밍'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'이현창'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2006-07-06'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'8979144199'</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;</li><li><font>&#91;</font><font color="#483d8b">'전문가를&nbsp;위한&nbsp;C++&nbsp;:&nbsp;C++&nbsp;11을&nbsp;대하는&nbsp;유쾌한&nbsp;방법(개정판&nbsp;2권)'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'마크&nbsp;그레고리&nbsp;,&nbsp;니콜라스&nbsp;솔터&nbsp;,&nbsp;스캇&nbsp;클레퍼'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'권오인'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2013-10-17'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788968480393'</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;</li><li><font>&#91;</font><font color="#483d8b">'전문가를&nbsp;위한&nbsp;C++&nbsp;:&nbsp;C++&nbsp;11을&nbsp;대하는&nbsp;유쾌한&nbsp;방법(개정판&nbsp;1권)'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'마크&nbsp;그레고리&nbsp;,&nbsp;니콜라스&nbsp;솔터&nbsp;,&nbsp;스캇&nbsp;클레퍼'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'권오인'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2013-10-17'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788968480386'</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;</li><li><font>&#91;</font><font color="#483d8b">'안드로이드의&nbsp;모든&nbsp;것&nbsp;NDK:&nbsp;C/C++을&nbsp;이용한&nbsp;안드로이드&nbsp;앱&nbsp;개발&nbsp;방법'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'고현철&nbsp;,&nbsp;전호철'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2012-09-17'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788979149593'</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;</li><li><font>&#91;</font><font color="#483d8b">'Blog2Book,&nbsp;프로그래머가&nbsp;몰랐던&nbsp;멀티코어&nbsp;CPU&nbsp;이야기'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'김민장'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2010-05-20'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788979147407'</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;</li><li><font>&#91;</font><font color="#483d8b">'IT&nbsp;CookBook,&nbsp;Eclipse를&nbsp;활용한&nbsp;안드로이드&nbsp;프로그래밍'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'우재남&nbsp;,&nbsp;이복기'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2015-01-28'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9791156641711'</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;</li><li><font>&#91;</font><font color="#483d8b">'윈도우즈&nbsp;API&nbsp;정복(개정판),&nbsp;제1권'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'김상형'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2006-06-01'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'8979144210'</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;</li><li><font>&#91;</font><font color="#483d8b">'IT&nbsp;EXPERT&nbsp;윈도우&nbsp;시스템&nbsp;프로그램을&nbsp;구현하는&nbsp;기술'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'이호동'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2015-03-28'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788968481789'</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;</li><li><font>&#91;</font><font color="#483d8b">'IT&nbsp;CookBook,&nbsp;Android&nbsp;Studio를&nbsp;활용한&nbsp;안드로이드&nbsp;프로그래밍(증보판)'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'우재남&nbsp;,&nbsp;박길식'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2016-01-03'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9791156642480'</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;</li><li><font>&#91;</font><font color="#483d8b">'IT&nbsp;CookBook,&nbsp;쉽게&nbsp;배우는&nbsp;데이터&nbsp;통신과&nbsp;컴퓨터&nbsp;네트워크'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'박기현'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2013-09-15'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788998756611'</font><font>&#93;</font><font color="#66cc66">,</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;--&nbsp;snip&nbsp;--</li><li><font>&#93;</font></li></ol></blockquote></code></pre>
        <p>이제 <code>book_list</code>에는 약 1,000권 정도의 책 정보가 들어갔다. 이 데이터를 데이터베이스에 넣어 보자.</p>
        <h5>코드10-6 데이터베이스에 book_list 데이터 넣기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">6</font><font>&#93;</font>:</li><li>cur.<font>executemany</font><font>&#40;</font><font color="#483d8b">&quot;insert&nbsp;into&nbsp;hanbit_books&nbsp;values&nbsp;(?,&nbsp;?,&nbsp;?,&nbsp;?,&nbsp;?)&quot;</font><font color="#66cc66">,</font>&nbsp;book_list<font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">6</font><font>&#93;</font>:</li><li><font color="#66cc66">&lt;</font>sqlite3.<font>Cursor</font>&nbsp;at&nbsp;<font color="#ff4500">0x10eceece0</font><font color="#66cc66">&gt;</font></li></ol></blockquote></code></pre>

        <p>데이터를 넣었으면 확정하기 위해 <code>commit()</code>을 실행한다.</p>
        <h5>코드10-7 삽입한 데이터 확정하기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">7</font><font>&#93;</font>:</li><li>con.<font>commit</font><font>&#40;</font><font>&#41;</font></li></ol></blockquote></code></pre>
      </article>
    </section>
  </div>

  <h3 class="sub-header">10.5. 데이터 선택하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>이제 데이터가 제대로 들어갔는지 확인해 보자. 사실 데이터를 다룰 때 가중 중요한 것이 데이터를 불러오는 일이다.</p>
        <p>먼저 단어 하나를 이용해 데이터를 선택하는 법을 살펴보자.</p>
        <h5>코드10-8 특정 단어와 관계있는 데이터 선택하기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">8</font><font>&#93;</font>:</li><li>cur.<font>execute</font><font>&#40;</font><font color="#483d8b">&quot;select&nbsp;*&nbsp;from&nbsp;hanbit_books&nbsp;where&nbsp;author&nbsp;=&nbsp;?&quot;</font><font color="#66cc66">,</font>&nbsp;<font>&#40;</font><font color="#483d8b">&quot;윤웅식&quot;</font><font color="#66cc66">,</font><font>&#41;</font></li><li><font color="#ff7700">print</font><font>&#40;</font>cur.<font>fetchone</font><font>&#40;</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">8</font><font>&#93;</font>:</li><li><font>&#40;</font><font color="#483d8b">'만들면서&nbsp;배우는&nbsp;Git+GitHub&nbsp;입문'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'윤웅식'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2015-08-10'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788968482021'</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>역시 <code>execute()</code>를 이용하면 된다. <code>fetchone()</code>은 하나의 행(결과)을 표시하라는 명령이다. 참고로 단어와 관계있는 모든 행을 표시하려면 <code>fetchall()</code>을 사용하면 된다.</p>
        <p>또한, 딕셔너리를 이용하는 방법도 있다. 이때는 딕셔너리 안 키와 매치되는 모든 데이터를 가져온다.</p>
        <h5>코드10-9 딕셔너리를 이용한 데이터 선택하기</h5>
        <pre class="python"><code><blockquote><ol><li>In&nbsp;<font>&#91;</font><font color="#ff4500">9</font><font>&#93;</font>:</li><li>query_str&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;select&nbsp;*&nbsp;from&nbsp;hanbit_books&nbsp;where&nbsp;author=:name&quot;</font></li><li>params&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;name&quot;</font>:<font color="#483d8b">&quot;윤인성&quot;</font></li><li><font>&#125;</font></li><li>&nbsp;</li><li>cur.<font>execute</font><font>&#40;</font>query_str<font color="#66cc66">,</font>&nbsp;params<font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">45</font><font>&#93;</font>:</li><li><font color="#66cc66">&lt;</font>sqlite3.<font>Cursor</font>&nbsp;at&nbsp;<font color="#ff4500">0x10eceece0</font><font color="#66cc66">&gt;</font></li></ol></blockquote></code></pre>
        <p>코드 구조는 [코드10-4]와 유사하다. INSERT 문 대신 SELECT 문을 사용했을 뿐이다.</p>
        
        <p>불러온 데이터를 편하게 사용하려면 리스트로 만들어두는 것이 편리하다. 따라서 <code>cur.fetchall()</code>을 실행해서 결과를 가져와 저장한다. 참고로 지정한 숫자만큼 데이터를 가져오는 <code>fetchmany(size=[숫자])</code>를 사용할 수도 있다.</p>

        <p><u><code>SELECT</code> 쿼리문의 실행결과는 순회 가능하다. 그 덕분에 바로 <code>for</code> 문에 넣어서 사용할 수 있지만, 한번 사용하고 나면 다시 꺼내올 수 없다</u>. 따라서 [코드10-10]에서는 <code>for</code>문으로 결과를 불러오기 전에 <code>list()</code>를 사용하여 결과를 리스트로 만들어 주었다. 그리고 결과를 하나하나 가져와서 작업을 실행하게 했다. 예제 코드에서는 단순히 <code>print()</code>를 이용하여 출력했지만 실제로는 각각의 결과 <code>row</code>를 가지고 필요한 작업을 하면 된다.</p>
        <h5>코드10-10 SELECT 쿼리문 실행 결과로 작업</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">10</font><font>&#93;</font>:</li><li>result&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">list</font><font>&#40;</font>cur.<font>fetchall</font><font>&#40;</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">for</font>&nbsp;row&nbsp;<font color="#ff7700">in</font>&nbsp;result:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>row<font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">10</font><font>&#93;</font>:</li><li><font>&#40;</font><font color="#483d8b">'IT&nbsp;CookBook,&nbsp;자바스크립트&nbsp;프로그래밍&nbsp;입문'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'윤인성'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2016-12-15'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9791156642787'</font><font>&#41;</font></li><li><font>&#40;</font><font color="#483d8b">'모던&nbsp;웹을&nbsp;위한&nbsp;Node.js&nbsp;프로그래밍&nbsp;3판'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'윤인성'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2016-07-01'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788968482946'</font><font>&#41;</font></li><li><font>&#40;</font><font color="#483d8b">'모던&nbsp;웹을&nbsp;위한&nbsp;JavaScript&nbsp;+&nbsp;jQuery&nbsp;입문(3판)'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'윤인성'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2017-05-01'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788968483554'</font><font>&#41;</font></li><li><font>&#40;</font><font color="#483d8b">'Hello&nbsp;Coding&nbsp;파이썬'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'윤인성'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2018-01-02'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9791162240274'</font><font>&#41;</font></li><li><font>&#40;</font><font color="#483d8b">'모던&nbsp;웹&nbsp;디자인을&nbsp;위한&nbsp;HTML5+CSS3&nbsp;입문,&nbsp;개정판'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'윤인성'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2015-01-19'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788968481611'</font><font>&#41;</font></li><li><font>&#40;</font><font color="#483d8b">'모던&nbsp;웹을&nbsp;위한&nbsp;JavaScript&nbsp;+&nbsp;jQuery&nbsp;입문(개정판)&nbsp;:&nbsp;자바스크립트에서&nbsp;제이쿼리,&nbsp;제이쿼리&nbsp;모바일까지&nbsp;한&nbsp;권으로&nbsp;끝낸다'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'윤인성'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2013-09-03'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788968480423'</font><font>&#41;</font></li><li><font>&#40;</font><font color="#483d8b">'모던&nbsp;웹을&nbsp;위한&nbsp;Node.js&nbsp;프로그래밍(개정판)&nbsp;:&nbsp;페이스북,&nbsp;월마트,&nbsp;링크드인이&nbsp;선택한&nbsp;자바스크립트&nbsp;+&nbsp;노드제이에스&nbsp;서버&nbsp;프로그래밍'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'윤인성'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2013-09-03'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788968480430'</font><font>&#41;</font></li><li><font>&#40;</font><font color="#483d8b">'IT&nbsp;CookBook,&nbsp;HTML5&nbsp;웹&nbsp;프로그래밍&nbsp;입문(개정판)'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'윤인성'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2016-12-26'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9791156643074'</font><font>&#41;</font></li><li><font>&#40;</font><font color="#483d8b">'IT&nbsp;CookBook,&nbsp;C#&nbsp;프로그래밍&nbsp;:&nbsp;프로그래밍&nbsp;기초부터&nbsp;객체&nbsp;지향&nbsp;핵심까지'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'윤인성'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2015-12-01'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9791156642046'</font><font>&#41;</font></li><li><font>&#40;</font><font color="#483d8b">'IT&nbsp;CookBook,&nbsp;HTML5&nbsp;웹&nbsp;프로그래밍&nbsp;입문'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'윤인성'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2013-07-25'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788998756277'</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>실제 데이터에서 [코드10-9]의 SELECT 쿼리문을 실행한 결과와 비교해보면 제대로 가져온 것을 알 수 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">10.6. 기존 데이터 갱신(UPDATE)하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>데이터 업데이트 역시 기본 개념은 같다. 값과 조건에 들어갈 파라미터를 지정해 쿼리문을 작성하고 <code>execute()</code>문을 작성하면 된다.</p>
        <h5>코드10-11 데이터 업데이트하기</h5>
        <pre class="python"><code><blockquote><ol><li>In&nbsp;<font>&#91;</font><font color="#ff4500">11</font><font>&#93;</font>:</li><li>query_str&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;UPDATE&nbsp;hanbit_books&nbsp;set&nbsp;isbn=:isbn&nbsp;where&nbsp;author=:name&quot;</font></li><li>&nbsp;</li><li>params&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;isbn&quot;</font>:<font color="#ff4500">9788968480033</font><font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;name&quot;</font>:<font color="#483d8b">&quot;윤웅식&quot;</font></li><li><font>&#125;</font></li><li>&nbsp;</li><li>cur.<font>execute</font><font>&#40;</font>query_str<font color="#66cc66">,</font>&nbsp;params<font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">11</font><font>&#93;</font>:</li><li><font color="#66cc66">&lt;</font>sqlite3.<font>Cursor</font>&nbsp;at&nbsp;<font color="#ff4500">0x10eceece0</font><font color="#66cc66">&gt;</font></li></ol></blockquote></code></pre>
        <p>저자 이름이 '윤웅식'인 행의 ISBN 값을 수정하는 쿼리문이다. SELECT 문을 이용해 결과를 확인해보자.</p>
        <h5>코드10-12 업데이트한 데이터 확인하기</h5>
        <pre class="python"><code><blockquote><ol><li>In&nbsp;<font>&#91;</font><font color="#ff4500">12</font><font>&#93;</font>:</li><li>cur.<font>execute</font><font>&#40;</font><font color="#483d8b">&quot;SELECT&nbsp;*&nbsp;FROM&nbsp;hanbit_books&nbsp;WHERE&nbsp;author&nbsp;=&nbsp;?&quot;</font><font color="#66cc66">,</font>&nbsp;<font>&#40;</font><font color="#483d8b">&quot;윤웅식&quot;</font><font color="#66cc66">,</font><font>&#41;</font><font>&#41;</font></li><li><font color="#ff7700">print</font><font>&#40;</font>cur.<font>fetchone</font><font>&#40;</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">12</font><font>&#93;</font>:</li><li><font>&#40;</font><font color="#483d8b">'만들면서&nbsp;배우는&nbsp;Git+GitHub&nbsp;입문'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'윤웅식'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'2015-08-10'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'9788968480033'</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>정상적으로 데이터가 업데이트 되었다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">10.7. 데이터 삭제하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>데이터 삭제도 동일하다. 조건에 맞는 행을 선택하는 대신 삭제하면 된다.</p>
        <h5>코드10-13 데이터 삭제하기</h5>
        <pre class="python"><code><blockquote><ol><li>In&nbsp;<font>&#91;</font><font color="#ff4500">13</font><font>&#93;</font>:</li><li>cur.<font>execute</font><font>&#40;</font><font color="#483d8b">&quot;DELETE&nbsp;FROM&nbsp;hanbit_books&nbsp;WHERE&nbsp;author&nbsp;=&nbsp;?&quot;</font><font color="#66cc66">,</font>&nbsp;<font>&#40;</font><font color="#483d8b">&quot;윤웅식&quot;</font><font color="#66cc66">,</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">13</font><font>&#93;</font>:</li><li><font color="#66cc66">&lt;</font>sqlite3.<font>Cursor</font>&nbsp;at&nbsp;<font color="#ff4500">0x10eceece0</font><font color="#66cc66">&gt;</font></li></ol></blockquote></code></pre>
        <p>데이터를 삭제했으니 그걸 선택했을 때 값이 없어야 한다. SELECT 문을 이용해 결과를 확인해보자.</p>

        <h5>코드10-14 데이터 삭제 결과 확인</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">14</font><font>&#93;</font>:</li><li>cur.<font>execute</font><font>&#40;</font><font color="#483d8b">&quot;SELECT&nbsp;*&nbsp;FROM&nbsp;hanbit_books&nbsp;WHERE&nbsp;author&nbsp;=&nbsp;?&quot;</font><font color="#66cc66">,</font>&nbsp;<font>&#40;</font><font color="#483d8b">&quot;윤웅식&quot;</font><font color="#66cc66">,</font><font>&#41;</font><font>&#41;</font></li><li><font color="#ff7700">print</font><font>&#40;</font>cur.<font>fetchone</font><font>&#40;</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">14</font><font>&#93;</font>:</li><li><font color="#008000">None</font></li></ol></blockquote></code></pre>
        <p>특정 데이터를 삭제하듯 데이터베이스의 테이블이나 데이터베이스 자체를 삭제할 수도 있다. <code>execute()</code>와 <code>DROP</code>문을 조합하면 된다.</p>

        <h5>코드10-15 테이블 삭제</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">15</font><font>&#93;</font>:</li><li><font color="#808080">#&nbsp;테이블&nbsp;삭제</font></li><li>cur.<font>execute</font><font>&#40;</font><font color="#483d8b">&quot;DROP&nbsp;TABLE&nbsp;hanbit_books&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;데이터베이스&nbsp;연결&nbsp;종료</font></li><li>con.<font>close</font><font>&#40;</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>참고로 데이터베이스 자체를 삭제하는 DROP DATABASE 쿼리문은 없다. 그냥 해당 파일을 지우는 것으로 대체한다.</p>
        <p>데이터베이스 쿼리문의 기본을 안다면 SQLite를 기준으로 파이썬에서 데이터베이스를 다루는 법은 다음의 내용만 기억한다면 어려움이 없다.</p>
        <ul>
          <li>쿼리문을 실행하는 함수는 execute() 이다.</li>
          <li>튜플 형태로 원하는 데이터를 선별할 수 있다.</li>
        </ul>
      </article>
    </section>
  </div>