  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬을 이용하는 목적 중 하나는 웹페이지의 다양한 데이터를 수집하는 크롤링이 있다. 약 100여행 정도의 코드로 사이트의 특정 게시글들을 모아서 데이터를 만들고, 그렇게 싸인 데이터를 적절하게 분석해서 유의미한 정보를 만들거나 주기적으로 수집해서 어딘가에 보고하는 기반으로 사용할 수 있다.</p>
        <p>이 장에서는 스크래피(scrapy)를 이용해서 간단한 크롤링 애플리케이션을 만들어 보자.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">9.1. 스크래피</h3>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬으로 만들어진 대표적인 크롤러는 스크래피이다. 크롤링 프레임워크라고도 할 수 있다. 2008년 처음 0.7버전으로 공개된 이후 현재까지 지속적으로 업그레이드 된 버전을 배포하고 있다. 버전 히스토리는 https://doc.scrapy.org/en/latest/news.html#scrapy-1-5-1-2018-07-12에서 확인할 수 있다.</p>
        <p>스크래피의 장점은 다음과 같이 요약된다.</p>
        <ul>
          <li>스크랩할 항목 유형을 정의하는 클래스를 만들 수 있다.</li>
          <li>수집한 데이터를 원하는 대로 편집하는 기능을 제공한다.</li>
          <li>서버에 연동하기 위해 기능을 확장할 수 있다.</li>
          <li>크롤링 결과를 JSON, XML, CSV 등의 형식으로 내보낼 수 있다.</li>
          <li>손상된 HTML 파일을 분석할 수 있다.</li>
        </ul>
        <p>예제를 살펴 보기 전, 먼저 스크래피를 이용해서 크롤러를 만드는 대략적인 과정을 정리해 보자.</p>
        <ol>
          <li>크롤링할 아이템(item)을 설정한다.</li>
          <li>실제 크롤링할 스파이더(spider, 스크래피의 크롤러)를 만든다.</li>
          <li>크롤링할 사이트(시작점)와 크롤링 규칙을 설정한다.</li>
          <li>스파이더의 종류에 따른 몇 가지 설정을 추가한다. 예를 들어 크롤링할 URL의 패턴 등을 설정한다.</li>
          <li>HTML 문서를 파싱한 후 크롤러가 실행할 작업을 정의한다.</li>
          <li>크롤러를 실행한다.</li>          
        </ol>
        <p>이 과정을 참고해 예제를 만들어 보자.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">9.2. 설치</h3>
  <div class="chapter">
    <section>
      <article>
        <p>이번 절에서는 스크래피를 설치하고, 프로젝트를 생성하고, 크롤링의 핵심이 디는 아이템 설정하기까지 살펴본다.</p>
      </article>
    </section>

    <h4 class="sub-header">9.2.1 - 스크래피 프로젝트 생성</h4>
    <section>
      <article>
        <p>스크래피는 크롤링 프레임워크이므로 단순히 코드 안에 패키지를 불러오듯 실행할 수 없다. 물론 이러한 번거로움을 상쇄할 만큼 강력한 기능을 제공한다.</p>
        <p>일단, <code>pip install scrapy</code>(Windows), <code>pip3 install scrapy</code>(mac OS X, 리눅스) 명령을 실행해 스크래피를 설치한다. 설치 후 터미널에서 <code>scrapy</code> 명령어를 입력하면, 다음과 같이 사용가능한 옵션들을 확인할 수 있다.</p>
        <pre><code><blockquote><ol><li>$&nbsp;scrapy</li><li>Scrapy&nbsp;1.5.1&nbsp;-&nbsp;no&nbsp;active&nbsp;project</li><li>&nbsp;</li><li>Usage:</li><li>&nbsp;&nbsp;scrapy&nbsp;<font color="#33cc33">&lt;</font>command<font color="#33cc33">&gt;</font>&nbsp;[options]&nbsp;[args]</li><li>&nbsp;</li><li>Available&nbsp;commands:</li><li>&nbsp;&nbsp;bench&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Run&nbsp;quick&nbsp;benchmark&nbsp;test</li><li>&nbsp;&nbsp;fetch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fetch&nbsp;a&nbsp;URL&nbsp;using&nbsp;the&nbsp;Scrapy&nbsp;downloader</li><li>&nbsp;&nbsp;genspider&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Generate&nbsp;new&nbsp;spider&nbsp;using&nbsp;pre-defined&nbsp;templates</li><li>&nbsp;&nbsp;runspider&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Run&nbsp;a&nbsp;self-contained&nbsp;spider&nbsp;<font color="#33cc33">(</font>without&nbsp;creating&nbsp;a&nbsp;project<font color="#33cc33">)</font></li><li>&nbsp;&nbsp;settings&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Get&nbsp;settings&nbsp;values</li><li>&nbsp;&nbsp;shell&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interactive&nbsp;scraping&nbsp;console</li><li>&nbsp;&nbsp;startproject&nbsp;&nbsp;Create&nbsp;new&nbsp;project</li><li>&nbsp;&nbsp;version&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print&nbsp;Scrapy&nbsp;version</li><li>&nbsp;&nbsp;view&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Open&nbsp;URL&nbsp;<font color="#00b100">in</font>&nbsp;browser,&nbsp;as&nbsp;seen&nbsp;by&nbsp;Scrapy</li><li>&nbsp;</li><li>&nbsp;&nbsp;[&nbsp;more&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;More&nbsp;commands&nbsp;available&nbsp;when&nbsp;run&nbsp;from&nbsp;project&nbsp;directory</li><li>&nbsp;</li><li>Use&nbsp;&quot;scrapy&nbsp;<font color="#33cc33">&lt;</font>command<font color="#33cc33">&gt;</font>&nbsp;-h&quot;&nbsp;to&nbsp;see&nbsp;more&nbsp;info&nbsp;about&nbsp;a&nbsp;command</li></ol></blockquote></code></pre>
        <p>현재 위치에 활성화된 스크래피 프로젝트가 없다는 정보를 표시한 후 사용가능한 명령어 목록을 표시해준다. 새 프로젝트를 시작할 것이므로 <code>startproject</code>명령을 사용한다.</p>
        <p>scrapy startproject [프로젝트 이름] 명령을 실행해 새 프로젝트를 생성한다. 이름은 원하는대로 정하면 된다.</p>
        <pre><code>$ scrapy startproject hanbit</code></pre>
        셸에서 tree hanbit 명령을 실행하면 현재 위치에 생성된 스크래피 프로젝트 파일들을 확인할 수 있다.
        <pre><code><blockquote><ol><li>hanbit</li><li>├──&nbsp;hanbit</li><li>│  &nbsp;├──&nbsp;__init__.py</li><li>│  &nbsp;├──&nbsp;__pycache__</li><li>│  &nbsp;├──&nbsp;items.py</li><li>│  &nbsp;├──&nbsp;middlewares.py</li><li>│  &nbsp;├──&nbsp;pipelines.py</li><li>│  &nbsp;├──&nbsp;settings.py</li><li>│  &nbsp;└──&nbsp;spiders</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;__init__.py</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└──&nbsp;__pycache__</li><li>└──&nbsp;scrapy.cfg</li><li>&nbsp;</li><li>4&nbsp;directories,&nbsp;7&nbsp;files</li></ol></blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">9.2.2 - 아이템 설정하기</h4>
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">9.3. 스파이더 만들기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>

    <h4 class="sub-header">9.3.1 - 스파이더 파일 수정하기</h4>
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">9.4. 스파이더 규칙 설정하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">9.5. 파서 함수 정의하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">9.6. 완성된 스파이더 클래스</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">9.7. 크롤링 GO!</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>
  <!-- <li class=@if($id=='84') active @endif><a href="/book02/84" class="d2">9.1 스크래피</a></li>
  <li class=@if($id=='85') active @endif><a href="/book02/85" class="d2">9.2 설치</a></li>
  <li class=@if($id=='86') active @endif><a href="/book02/86" class="d3">9.2.1 스크래피 프로젝트 생성</a></li>
  <li class=@if($id=='87') active @endif><a href="/book02/87" class="d3">9.2.2 아이템 설정하기</a></li>
  <li class=@if($id=='88') active @endif><a href="/book02/88" class="d2">9.3 스파이더 만들기</a></li>
  <li class=@if($id=='89') active @endif><a href="/book02/89" class="d3">9.3.1 스파이더 파일 수정하기</a></li>
  <li class=@if($id=='90') active @endif><a href="/book02/90" class="d2">9.4 스파이더 규칙 설정하기</a></li>
  <li class=@if($id=='91') active @endif><a href="/book02/91" class="d2">9.5 파서 함수 정의하기</a></li>
  <li class=@if($id=='92') active @endif><a href="/book02/92" class="d2">9.6 완성된 스파이더 클래스</a></li>
  <li class=@if($id=='93') active @endif><a href="/book02/93" class="d2">9.7 크롤링 GO!</a></li> -->
