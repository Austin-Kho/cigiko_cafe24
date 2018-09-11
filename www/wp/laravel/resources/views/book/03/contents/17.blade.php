  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article class="">
        <p>페이스북, 트위터, 인스타그램, 네이버, 카카오 등에서는 자사의 서비스 일부를 자유롭게 사용할 수 있도록 API 를 제공한다. 그러한 API를 <a href="https://ko.wikipedia.org/wiki/오픈_API" target="_blank">Open API</a>라고 한다. Open API 는 대부분 값을 요청하고 받아오는 데 초점이 마춰져 있다. 다른 점은 요청할 때 권한 확인, 결과를 받을 때의 포맷 지정 등이다.</p>
        <p>Open API를 여러 가지 조합하면 창의적인 서비스를 만들 수 있다. 이는 Open API를 공개하는 또 하나의 목적이기도 하다. 이 장에서는 네이버와 카카오 Open API의 접근 권한을 획득하고 사용하는 방법을 다뤄본 후, The Movie Database의 Open API까지 조합해 매이업 사이트의 기반이 되는 API서버를 만들어 본다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">15.1. 접근 권한 획득하기</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>Open API를 제공하는 서비스는 별도의 개발자 페이지가 있으므로 해당 페이지에서 신청할 수 있다. 여기서는 카카오와 네이버 페이지를 살펴보고 각각의 포털이 제공하는 API로 책 정보를 검색해 보자.</p>
      </article>
    </section>

    <h4 class="sub-header">15.1.1 - 카카오 API 키 획득하기</h4>
    <section>
      <article class="">
        <p>먼저 <a href="https://developers.kakao.com" target="_blank">Kakao Developers</a>에 접속해서 로그인 하고 하단의 [앱 개발 시작하기]를 클릭한다.</p>
        <h5>그림 15-1 새 앱 개발 시작</h5>
        <img src="/img/img45.png" alt="" class="bo">
        <p>적당한 앱 이름을 지어준다. </p><p>애플리케이션을 생성하였다는 메시지와 함께 네이티브 앱 키, REST API 키, JavaScript 키, Admin 키를 확인할 수 있다. 이제 이 키를 이용해 요청을 할 수 있다. 여기서는 여러가지 키 중 REST API 키를 사용한다.</p>
      </article>
    </section>

    <h4 class="sub-header">15.1.2 - 네이버 API 키 획득하기</h4>
    <section>
      <article class="">
        <p><a href="https://developers.naver.com" target="_blank">네이버 개발자 센터</a>에 접속해서 로그인 한다. 그리고 상단 메뉴에서 [Application] 메뉴로 들어가 [애플리케이션 등록]을 선택한다.</p>
        <h5>그림 15-2 애플리케이션 등록 선택</h5>
        <img src="/img/img46.png" alt="애플리케이션 등록 선택" class="bo">
        <p>이용약관 동의, 본인 인증 등 기본 개인 정보를 입력한 후 [애플리케이션 이름]과 [사용 API], [비로그인 오픈 API 서비스 환경]에 각각 정보를 입력한다. 참고로 [웹 서비스 URL]은 일단 아무 주소든 하나 넣고 아래의 [등록하기]를 클릭한다.</p>
        <h5>그림 15-3 애플리케이션 등록</h5>
        <img src="/img/img47.png" alt="애플리케이션 등록" class="bo">
        <p>애플리케이션이 생성되면 애플리케이션 관리 화면으로 넘어간다. 여기서 애플리케이션 정보의 [Client ID]와 [Client Secret]을 따로 복사해 둔다. 이 인증 정보를 이용해 요청을 하게 된다.</p>
        <h5>그림 15-4 애플리케이션 정보 확인</h5>
        <img src="/img/img48.png" alt="애플리케이션 정보 확인" class="bo">
      </article>
    </section>
  </div>

  <h3 class="sub-header">15.2. 데이터 요청하기와 표시하기</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>이제 앞에서 획득한 인증 정보로 데이터를 요청해보자. Daum과 네이버 둘 다 책 검색에 '윤웅식'을 검색 해본다.</p>
      </article>
    </section>

    <h4 class="sub-header">15.2.1 - Daum</h4>
    <section>
      <article class="">
        <p>Daum은 API 키만 이용해서 요청할 수 있다.따라서 이 주소를 그대로 주소표시줄에 넣으면 웹 브라우저로도 요청을 하는 셈이다.</p>
        <p>카카오 개발자 페이지에서 <a href="https://developers.kakao.com/docs/restapi/search#책-검색" target="_blank">책 검색 API</a>가 어떻게 되어 있는지 확인해 보자. 먼저 기본 요청 정보이다.</p>
        <blockquote>
          [Request]<br>
          GET /v2/search/book HTTP/1.1<br>
          Host: dapi.kakao.com<br>
          Authorization: KakaoAK {app_key}
        </blockquote>
        <p>GET 방식을 사용한다는 것과 어떤 dapi.kakao.com 호스트에 /v2/search/book 경로로 요청한다는 것을 알 수 있다. 인증 헤더로 KakaoAK &lt;발급받은RESTAPIKey>를 요구하는 것도 알 수 있다.</p>
        <p>앞서 슬랙 봇을 만들 때 이용했던 requests 패키지를 이용해서 요청할 것이다.</p>
        <h5>코드 15-1 카카오 API에서 책 검색 데이터 가져오기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:<br/>
<font color="#ff7700">import</font>&nbsp;requests<br/>
<font color="#ff7700">import</font>&nbsp;json<br/>
&nbsp;<br/>
url&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;https://dapi.kakao.com/v2/search/book&quot;</font><br/>
querystring&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><font color="#483d8b">&quot;query&quot;</font>:<font color="#483d8b">&quot;윤웅식&quot;</font><font>&#125;</font><br/>
header&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><font color="#483d8b">'authorization'</font>:&nbsp;<font color="#483d8b">'KakaoAK&nbsp;&lt;REST&nbsp;API&nbsp;키&gt;'</font><font>&#125;</font><br/>
r&nbsp;<font color="#66cc66">=</font>&nbsp;requests.<font>get</font><font>&#40;</font>url<font color="#66cc66">,</font>&nbsp;headers<font color="#66cc66">=</font>header<font color="#66cc66">,</font>&nbsp;params<font color="#66cc66">=</font>querystring<font>&#41;</font><br/>
&nbsp;<br/>
json.<font>loads</font><font>&#40;</font>r.<font>text</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:<br/>
<font>&#123;</font><font color="#483d8b">'documents'</font>:&nbsp;<font>&#91;</font><font>&#123;</font><font color="#483d8b">'authors'</font>:&nbsp;<font>&#91;</font><font color="#483d8b">'윤웅식'</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'barcode'</font>:&nbsp;<font color="#483d8b">'BOK00033615751BA'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'category'</font>:&nbsp;<font color="#483d8b">'컴퓨터/IT'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'contents'</font>:&nbsp;<font color="#483d8b">'프로그래밍&nbsp;언어를&nbsp;배웠다면&nbsp;이&nbsp;책으로&nbsp;파이썬을&nbsp;공부하자&nbsp;이&nbsp;책은&nbsp;다른&nbsp;프로그래밍&nbsp;언어를&nbsp;배운&nbsp;적&nbsp;있는&nbsp;개발자가&nbsp;파이썬&nbsp;3를&nbsp;빠르게&nbsp;배울&nbsp;수&nbsp;있게&nbsp;도와준다.&nbsp;꼭&nbsp;필요한&nbsp;핵심&nbsp;문법만&nbsp;간략히...'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'datetime'</font>:&nbsp;<font color="#483d8b">'2017-11-01T00:00:00.000+09:00'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'ebook_barcode'</font>:&nbsp;<font color="#483d8b">'DGT00033970535AL'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'isbn'</font>:&nbsp;<font color="#483d8b">'1162240202&nbsp;9791162240205'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'price'</font>:&nbsp;<font color="#ff4500">20000</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'publisher'</font>:&nbsp;<font color="#483d8b">'한빛미디어'</font><font color="#66cc66">,</font><br/>
&nbsp;<br/>
--&nbsp;snip&nbsp;--<br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'sale_price'</font>:&nbsp;<font color="#ff4500">14000</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'sale_yn'</font>:&nbsp;<font color="#483d8b">'Y'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'status'</font>:&nbsp;<font color="#483d8b">'정상판매'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'thumbnail'</font>:&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'title'</font>:&nbsp;<font color="#483d8b">'개발자를&nbsp;위한&nbsp;파이썬'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'translators'</font>:&nbsp;<font>&#91;</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'url'</font>:&nbsp;<font color="#483d8b">'http://book.daum.net/detail/book.do?bookid='</font><font>&#125;</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;<font color="#483d8b">'meta'</font>:&nbsp;<font>&#123;</font><font color="#483d8b">'is_end'</font>:&nbsp;<font color="#008000">True</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'pageable_count'</font>:&nbsp;<font color="#ff4500">3</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'total_count'</font>:&nbsp;<font color="#ff4500">3</font><font>&#125;</font><font>&#125;</font></blockquote></code></pre>
        <p>결과의 각 키 값에 대한 설명 또한 책 검색 문서에 있다. [그림 15-5]는 그 일부이다.</p>
        <h5>그림 15-5 결과의 각 기 값 의미</h5>
        <img src="/img/img49.png" alt="" class="bo">
        <p>전체 내용은 책 검색 문서의 [Response]항목을 참고한다.<br>크게 어려운 점은 없다. 인증 정보와 쿼리, 출력 형식을 지정해서 해당 주소로 호출하는 것뿐이다. 이제 응답결과인 JSON데이터로 원하는 작업을 하면 된다.</p>
      </article>
    </section>

    <h4 class="sub-header">15.2.2 - 네이버</h4>
    <section>
      <article class="">
        <p>네이버는 '<a href="https://developers.naver.com/docs/search/blog" target="_blank">검색 > 블로그</a>'에서 기본적인 이용 방법을 볼 수 있다. 0.API 호출 예제의 파이썬 코드를 살펴보자.</p>
        <h5>코드 15-2 네이버 블로그 검색 예제</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;네이버&nbsp;검색&nbsp;API예제는&nbsp;블로그를&nbsp;비롯&nbsp;전문자료까지&nbsp;호출방법이&nbsp;동일하므로&nbsp;blog검색만&nbsp;대표로&nbsp;예제를&nbsp;올렸습니다.</font></li><li><font color="#808080">#&nbsp;네이버&nbsp;검색&nbsp;Open&nbsp;API&nbsp;예제&nbsp;-&nbsp;블로그&nbsp;검색</font></li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">os</font></li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">sys</font></li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">urllib</font>.<font>request</font></li><li>client_id&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;YOUR_CLIENT_ID&quot;</font></li><li>client_secret&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;YOUR_CLIENT_SECRET&quot;</font></li><li>encText&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#dc143c">urllib</font>.<font>parse</font>.<font>quote</font><font>&#40;</font><font color="#483d8b">&quot;검색할&nbsp;단어&quot;</font><font>&#41;</font></li><li>url&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;https://openapi.naver.com/v1/search/blog?query=&quot;</font>&nbsp;+&nbsp;encText&nbsp;<font color="#808080">#&nbsp;json&nbsp;결과</font></li><li><font color="#808080">#&nbsp;url&nbsp;=&nbsp;&quot;https://openapi.naver.com/v1/search/blog.xml?query=&quot;&nbsp;+&nbsp;encText&nbsp;#&nbsp;xml&nbsp;결과</font></li><li>request&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#dc143c">urllib</font>.<font>request</font>.<font>Request</font><font>&#40;</font>url<font>&#41;</font></li><li>request.<font>add_header</font><font>&#40;</font><font color="#483d8b">&quot;X-Naver-Client-Id&quot;</font><font color="#66cc66">,</font>client_id<font>&#41;</font></li><li>request.<font>add_header</font><font>&#40;</font><font color="#483d8b">&quot;X-Naver-Client-Secret&quot;</font><font color="#66cc66">,</font>client_secret<font>&#41;</font></li><li>response&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#dc143c">urllib</font>.<font>request</font>.<font>urlopen</font><font>&#40;</font>request<font>&#41;</font></li><li>rescode&nbsp;<font color="#66cc66">=</font>&nbsp;response.<font>getcode</font><font>&#40;</font><font>&#41;</font></li><li><font color="#ff7700">if</font><font>&#40;</font>rescode<font color="#66cc66">==</font><font color="#ff4500">200</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;response_body&nbsp;<font color="#66cc66">=</font>&nbsp;response.<font>read</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>response_body.<font>decode</font><font>&#40;</font><font color="#483d8b">'utf-8'</font><font>&#41;</font><font>&#41;</font></li><li><font color="#ff7700">else</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Error&nbsp;Code:&quot;</font>&nbsp;+&nbsp;rescode<font>&#41;</font></li></ol></blockquote></code></pre>
        <p>[코드 15-2]에서 url, client_id, client_secret만 [그림 15-4]에서 얻은 정보로 바꿔주면 된다.</p>
        <p>하지만 꼭 [코드 15-2]대로만 할 필요는 없다. 앞서 크롤링을 배울 때 사용했던 requests 패키지로 우리가 원하는 코드를 만들어보자.</p>
        <h5>코드 15-3 네이버 API에서 책 검색 데이터 가져오기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:<br/>
      <font color="#ff7700">import</font>&nbsp;requests<br/>
      <font color="#ff7700">import</font>&nbsp;json<br/>
      &nbsp;<br/>
      url&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;https://openapi.naver.com/v1/search/book.json?&quot;</font><br/>
      client_id&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;&lt;Client ID>&quot;</font><br/>
      client_secret&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;&lt;Client Secret>&quot;</font><br/>
      q&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;query=&quot;</font>&nbsp;+&nbsp;<font color="#483d8b">&quot;윤웅식&quot;</font><br/>
      headers&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><br/>
      &nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;X-Naver-Client-Id&quot;</font>:client_id<font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;X-Naver-Client-secret&quot;</font>:client_secret<br/>
      <font>&#125;</font><br/>
      &nbsp;<br/>
      r&nbsp;<font color="#66cc66">=</font>&nbsp;requests.<font>get</font><font>&#40;</font>url+q<font color="#66cc66">,</font>&nbsp;headers<font color="#66cc66">=</font>headers<font>&#41;</font><br/>
      json.<font>loads</font><font>&#40;</font>r.<font>text</font><font>&#41;</font><br/>
      &nbsp;<br/>
      Out<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:<br/>
      <font>&#123;</font><font color="#483d8b">'lastBuildDate'</font>:&nbsp;<font color="#483d8b">'Sun,&nbsp;29&nbsp;Jul&nbsp;2018&nbsp;21:41:15&nbsp;+0900'</font><font color="#66cc66">,</font><br/>
      &nbsp;<font color="#483d8b">'total'</font>:&nbsp;<font color="#ff4500">2</font><font color="#66cc66">,</font><br/>
      &nbsp;<font color="#483d8b">'start'</font>:&nbsp;<font color="#ff4500">1</font><font color="#66cc66">,</font><br/>
      &nbsp;<font color="#483d8b">'display'</font>:&nbsp;<font color="#ff4500">2</font><font color="#66cc66">,</font><br/>
      &nbsp;<font color="#483d8b">'items'</font>:&nbsp;<font>&#91;</font><font>&#123;</font><font color="#483d8b">'title'</font>:&nbsp;<font color="#483d8b">'개발자를&nbsp;위한&nbsp;파이썬&nbsp;(현장에서&nbsp;일하는&nbsp;개발자&nbsp;맞춤&nbsp;입문서)'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'link'</font>:&nbsp;<font color="#483d8b">'http://book.naver.com/bookdb/book_detail.php?bid=12706439'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'image'</font>:&nbsp;<font color="#483d8b">'https://bookthumb-phinf.pstatic.net/cover/127/064/12706439.jpg?type=m1&amp;udate=20180426'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'author'</font>:&nbsp;<font color="#483d8b">'&lt;b&gt;윤웅식&lt;/b&gt;'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'price'</font>:&nbsp;<font color="#483d8b">'20000'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'discount'</font>:&nbsp;<font color="#483d8b">'18000'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'publisher'</font>:&nbsp;<font color="#483d8b">'한빛미디어'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'pubdate'</font>:&nbsp;<font color="#483d8b">'20171101'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'isbn'</font>:&nbsp;<font color="#483d8b">'1162240202&nbsp;9791162240205'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'description'</font>:&nbsp;<font color="#483d8b">'프로그래밍&nbsp;언어를&nbsp;배웠다면&nbsp;이&nbsp;책으로&nbsp;파이썬을&nbsp;공부하자<font color="#000099">\n</font><font color="#000099">\n</font>이&nbsp;책은&nbsp;다른&nbsp;프로그래밍&nbsp;언어를&nbsp;배운&nbsp;적&nbsp;있는&nbsp;개발자가&nbsp;파이썬&nbsp;3를&nbsp;빠르게&nbsp;배울&nbsp;수&nbsp;있게&nbsp;도와준다.&nbsp;꼭&nbsp;필요한&nbsp;핵심&nbsp;문법만&nbsp;간략히&nbsp;설명한&nbsp;후,&nbsp;파일&nbsp;입출력,&nbsp;웹&nbsp;크롤러,&nbsp;슬랙&nbsp;봇&nbsp;만들기,&nbsp;메시지&nbsp;큐&nbsp;사용하기,&nbsp;팬더스(pandas)를&nbsp;이용한&nbsp;데이터...&nbsp;'</font><font>&#125;</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;<font>&#123;</font><font color="#483d8b">'title'</font>:&nbsp;<font color="#483d8b">'만들면서&nbsp;배우는&nbsp;Git&nbsp;GitHub&nbsp;입문&nbsp;(세상의&nbsp;모든&nbsp;개발&nbsp;코드를&nbsp;공유하고&nbsp;관리하는&nbsp;소셜&nbsp;코딩)'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'link'</font>:&nbsp;<font color="#483d8b">'http://book.naver.com/bookdb/book_detail.php?bid=9415223'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'image'</font>:&nbsp;<font color="#483d8b">'https://bookthumb-phinf.pstatic.net/cover/094/152/09415223.jpg?type=m1&amp;udate=20170517'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'author'</font>:&nbsp;<font color="#483d8b">'&lt;b&gt;윤웅식&lt;/b&gt;'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'price'</font>:&nbsp;<font color="#483d8b">'28000'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'discount'</font>:&nbsp;<font color="#483d8b">'25200'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'publisher'</font>:&nbsp;<font color="#483d8b">'한빛미디어'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'pubdate'</font>:&nbsp;<font color="#483d8b">'20150820'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'isbn'</font>:&nbsp;<font color="#483d8b">'8968482020&nbsp;9788968482021'</font><font color="#66cc66">,</font><br/>
      &nbsp;&nbsp;&nbsp;<font color="#483d8b">'description'</font>:&nbsp;<font color="#483d8b">'『GIT&nbsp;GITHUB&nbsp;입문』은&nbsp;GIT과&nbsp;GITHUB를&nbsp;이용한&nbsp;버전&nbsp;관리&nbsp;시스템을&nbsp;다루는&nbsp;방법을&nbsp;배우는&nbsp;입문서다.&nbsp;버전&nbsp;관리&nbsp;시스템과&nbsp;GIT&nbsp;고유의&nbsp;명령어&nbsp;중심으로&nbsp;GIT의&nbsp;기본&nbsp;개념&nbsp;및&nbsp;GIT&nbsp;기반의&nbsp;대표적인&nbsp;원격&nbsp;저장소인&nbsp;GITHUB에&nbsp;가입해보고&nbsp;사용하는&nbsp;방법을&nbsp;살펴본다.&nbsp;또한&nbsp;개발&nbsp;환경에서&nbsp;많이...&nbsp;'</font><font>&#125;</font><font>&#93;</font><font>&#125;</font></blockquote></code></pre>
        <p>결과의 각 키 값에 대한 설명은 네이버 개발자 페이지의 [서비스 API] > [검색] > [책] > [<a href="https://developers.naver.com/docs/search/book/" target="_blank">4. 출력 결과</a>]를 참고한다. [그림 15-8]은 그 일부이다.</p>
        <h5>그림 15-6 네이버 개발자 페이지 책 검색 항목의 출력 결과</h5>
        <img src="/img/img50.png" alt="네이버 개발자 페이지 책 검색 항목의 출력 결과" class="bo">
        <p>이렇게 카카오와 네이버의 Open API 를 사용하는 키를 생성하고 간단한 사용 예를 살펴보았다. 이제 본격적으로 매시업 API 서버를 만들어 보자.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">15.3. 매시업 API 서버 만들기</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>여러 서비스가 제공하는 API를 이용해서 하나의 앱을 만들어내는 것을 <a href="https://ko.wikipedia.org/wiki/매시업_(웹_개발)" target="_blank">매시업(Mashup)</a>이라고 한다. 구글 맵 위에 정보를 마킹해서 보여준다거나, 여러 API 정보를 종합해서 요약하는 것이 매시업에 해당한다.</p>
        <p>여기서는 두 가지 서비스의 API를 이용해서 API서버를 만들어 본다. 이렇게 다양한 서비스를 엮을 수 있다는 것을 중심으로 확인하면 된다.</p>
        <div class="tip">
          <h4>TIP</h4>
          <p><a href="https://www.programmableweb.com/" target="_blank">ProgrammableWeb</a>에서는 각종 서비스에서 제공하는 API를 살펴볼 수 있다</p>
        </div>
      </article>
    </section>

    <h4 class="sub-header">15.3.1 - 영화 정보를 모아서 보여주기</h4>
    <section>
      <article class="">
        <p>이제 영화 정보를 보여주는 서비스를 만들어보자. 검색어를 받아서 카카오, 네이버, The Movie Database에서 영화 정보를 가져온 후 깔끔히 정리하는 서비스를 만들 것이다.</p>
        <p>카카오, 네이버, The Movie Database의 API 키는 다음의 페이지에서 얻을 수 있다.</p>
        <ul>
          <li>카카오: <a href="https://developers.kakao.com/apps" target="_blank">https://developers.kakao.com/apps</a></li>
          <li>네이버: <a href="https://developers.naver.com/apps/#/register" target="_blank">https://developers.naver.com/apps/#/register</a></li>
          <li>The Movie Database: <a href="https://www.themoviedb.org/settings/api" target="_blank">https://www.themoviedb.org/settings/api</a></li>
        </ul>
        <p>3개 사이트 모두 별도의 복잡한 과정 없이 손쉽게 API 키를 요청할 수 있다.</p>
        <div class="tip">
          <h4>TIP</h4>
          <p>The Movie Database에서 API 키를 얻으려면 회원 가입과 로그인을 해야 한다. 또한 자세한 개발 내용을 확인하고 싶다면 <a href="https://developers.themoviedb.org/3/getting-started" target="_blank">The Movie Database API</a>를 참고한다</p>
        </div>
        <p>일단 각각의 서비스에서 제공하는 정보들이 무엇인지 알아본다. 카카오는 <a href="https://developers.kakao.com/docs/restapi/search" target="_blank">REST API 개발 가이드 검색</a>을 참고한다. 카카오에서는 영화 검색이 제공되지는 않고, 동영상 검색이 있다. 영화 제목을 넣어 관련 영상들을 모을 수 있을 거 같다. 카카오 REST API 개발 가이드의 동상 검색의 요청 관련 기본 정보는 다음과 같다.</p>
        <blockquote>
          [Request]<br>
          GET /v2/search/vclip HTTP/1.1<br>
          Host: dapi.kakao.com<br>
          Authorization: KakaoAK {app_key}
        </blockquote>
        <p>책 검색 항목과 비교했을 때 GET 관련 경로가 다른 것을 제외하면 같다. 결과의 각 키 값에 대한 설명 또한 동영상 검색 문서의 [Response] 항목을 참고한다.</p>
        <p>네이버가 제공하는 정보는 '<a href="https://developers.naver.com/docs/search/movie" target="_blank">검색 > 영화</a>'를 참고해서 알 수 있다. 제목, 영어 제목, 개봉연도, 감독, 출연 배우, 평점이라는 꼭 필요한 개발 정보만 있으므로 깔끔하다는 느낌이 든다.</p>
        <p>[2. API 기본 정보]를 살펴보면 요청 메서드와 URL을 알 수 있고, [3. 요청 변수]는 어떤 쿼리를 요청할 수 있는지, 어떤 값을 넣어야 할지도 잘 알려준다. [4. 출력 결과]는 카카오 개발 가이드의 [Response] 항목과 같은 결과의 각 키 값이 어떤 의미인지 설명한다.</p>
        <p>마지막으로 The Movie Database의 정보이다. 개발 문서의 '<a href="https://developers.themoviedb.org/3/movies" target="_blank">Movies</a>'에 접속한 후 [MOVIES] 메뉴의 하위 항목을 살펴보자.</p>
        <h5>그림 15-10 MOVIES의 하위 항목</h5>
        <img src="/img/img51.png" alt="MOVIES의 하위 항목" class="bo">
        <p>메뉴에 어떤 요청 메서드를 사용해야 하는지 잘 나타나 있다. 그리고 영화와 비슷한 영화, 그 영화에 기반을 둔 추천 영화까지 얻어올 수 있는 API가 있다. 여기서는 추천 영화와 비슷한 영화를 가져오면 좋을 거 같다.</p>
        <p>여기서 알아야 할 API 를 정리하면 다음과 같다.</p>
        <ul>
          <li><strong><a href="https://developers.themoviedb.org/3/movies/get-movie-recommendations" target="_blank">Recommendations</a></strong>: 특정 영화와 관련 있는 추천 영화를 얻어올 수 있는 API 설명 페이지이다.</li>
          <li><strong><a href="https://developers.themoviedb.org/3/movies/get-similar-movies" target="_blank">Similar Movies</a></strong>: 특정 영화와 비슷한 영화를 얻어올 수 있는 설명 페이지이다.</li>
        </ul>
        <p>그런데 위 2개 문서 제목에 있는 경로를 살펴보면 /movie/{movie_id}/recommendations와 /movie/{movie_id}/similar 라고 표기되어 있다. {movie_id}를 또 다른 API에서 얻어야 한다. 이는 영화 검색에서 얻어올 수 있다.</p>
        <p>왼쪽 메뉴에서 [Search] > [Search Movies]를 클릭하면 영화를 검색할 수 있는 API의 설명 페이지가 나타난다. 문서의 [Responses] 항목에 있는 [object] > [results] > [id] 의 값으로 movie_id 를 가져올 수 있다.</p>
        <h5>그림 15-9 Search Movies의 Responses 항목 정보</h5>
        <img src="/img/img52.png" alt="Search Movies의 Responses 항목 정보" class="bo">
        <p>이제 가져올 수 있는 것들이 무엇인지 알았으니 전체적인 밑그림을 그려보자.</p>
        <ul>
          <li>관련 동영상 검색 정보는 카카오의 동영상 검색을 이용한다.</li>
          <li>영화 기본 정보는 네이버의 영화 검색을 이용한다.</li>
          <li>The Movie Database에서는 비슷한 영화, 추천 영화를 가져온다.</li>
        </ul>
        <p>이 구조대로 코드를 작성해 보자.</p>
      </article>
    </section>

    <h4 class="sub-header">15.3.2 - 영화 검색 결과 가져오기</h4>
    <section>
      <article class="">
        <p>각각의 서비스에서 원하는 영화 검색 결과를 가져오는 일련의 함수들을 만들어보자. 먼저 requests 패키지와 json 패키지를 불러온 후 Daum에서 동영상을 검색하는 함수를 만든다. 파일 이름은 <code>movie_search.py</code>라고 정했다.</p>
        <h5>코드 15-4 Daum 에서 동영상 검색 정보 가져오기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:<br/>
%%writefile&nbsp;movie_search.<font>py</font><br/>
<font color="#ff7700">import</font>&nbsp;requests<br/>
<font color="#ff7700">import</font>&nbsp;json<br/>
<font color="#ff7700">from</font>&nbsp;<font color="#dc143c">difflib</font>&nbsp;<font color="#ff7700">import</font>&nbsp;SequenceMatcher<br/>
<font color="#ff7700">import</font>&nbsp;<font color="#dc143c">re</font><br/>
&nbsp;<br/>
&nbsp;<br/>
<font color="#ff7700">def</font>&nbsp;get_kakao_video_search<font>&#40;</font>q<font>&#41;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;url&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;https://dapi.kakao.com/v2/search/vclip&quot;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;querystring&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><font color="#483d8b">&quot;query&quot;</font>:&nbsp;q<font>&#125;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;각자&nbsp;발급받은&nbsp;키를&nbsp;입력합니다.</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;header&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><font color="#483d8b">'authorization'</font>:&nbsp;<font color="#483d8b">'KakaoAK&nbsp;99c0668626d1c44613e6f0f3672b883b'</font><font>&#125;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;response&nbsp;<font color="#66cc66">=</font>&nbsp;requests.<font>request</font><font>&#40;</font><font color="#483d8b">&quot;GET&quot;</font><font color="#66cc66">,</font>&nbsp;url<font color="#66cc66">,</font>&nbsp;headers<font color="#66cc66">=</font>header<font color="#66cc66">,</font>&nbsp;params<font color="#66cc66">=</font>querystring<font>&#41;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;result_json&nbsp;<font color="#66cc66">=</font>&nbsp;json.<font>loads</font><font>&#40;</font>response.<font>text</font><font>&#41;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">if</font>&nbsp;result_json<font>&#91;</font><font color="#483d8b">'meta'</font><font>&#93;</font><font>&#91;</font><font color="#483d8b">'total_count'</font><font>&#93;</font>&nbsp;<font color="#66cc66">&gt;</font>&nbsp;<font color="#ff4500">0</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;kakao_videos&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#91;</font><font>&#123;</font><font color="#483d8b">'url'</font>:&nbsp;i<font>&#91;</font><font color="#483d8b">'url'</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'thumbnail'</font>:&nbsp;i<font>&#91;</font><font color="#483d8b">'thumbnail'</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'title'</font>:&nbsp;i<font>&#91;</font><font color="#483d8b">'title'</font><font>&#93;</font><font>&#125;</font>&nbsp;<font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;result_json<font>&#91;</font><font color="#483d8b">'documents'</font><font>&#93;</font><font>&#93;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">else</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;kakao_videos&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#91;</font><font>&#93;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;kakao_videos</blockquote></code></pre>
        <p>이어서 The Movie Database 에서 비슷한 영화 혹은 추천 영화를 가져오는 함수이다.</p>
        <h5>코드 15-5 The Movie Database에서 영화 정보 가져오기</h5>
        <pre class="python"><code><blockquote><font color="#ff7700">def</font>&nbsp;get_themoviedb_info<font>&#40;</font>eng_title<font>&#41;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;themoviedb_url&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;https://api.themoviedb.org/3/search/movie&quot;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;p&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;api_key&quot;</font>:&nbsp;<font color="#483d8b">&quot;b1147087552cb630f93b88becd95bfe4&quot;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;query&quot;</font>:&nbsp;eng_title<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font>&#125;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;response&nbsp;<font color="#66cc66">=</font>&nbsp;requests.<font>get</font><font>&#40;</font>themoviedb_url<font color="#66cc66">,</font>&nbsp;params<font color="#66cc66">=</font>p<font>&#41;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;첫&nbsp;번째&nbsp;결과만&nbsp;가져오겠습니다.</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;themoviedb_result&nbsp;<font color="#66cc66">=</font>&nbsp;json.<font>loads</font><font>&#40;</font>response.<font>text</font><font>&#41;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">if</font>&nbsp;themoviedb_result<font>&#91;</font><font color="#483d8b">'total_results'</font><font>&#93;</font>&nbsp;<font color="#66cc66">&gt;</font>&nbsp;<font color="#ff4500">0</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;item&nbsp;<font color="#66cc66">=</font>&nbsp;themoviedb_result<font>&#91;</font><font color="#483d8b">'results'</font><font>&#93;</font><font>&#91;</font><font color="#ff4500">0</font><font>&#93;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">else</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;item&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">None</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;item</blockquote></code></pre>
        <p>네이버에서 영화 정보를 가져오는 함수이다.</p>
        <h5>코드 15-6 네이버에서 영화 정보 가져오기</h5>
        <pre class="python"><code><blockquote><font color="#ff7700">def</font>&nbsp;get_naver_movie_info<font>&#40;</font>q<font>&#41;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;url&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;https://openapi.naver.com/v1/search/movie.json&quot;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;p&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><font color="#483d8b">&quot;query&quot;</font>:&nbsp;q<font>&#125;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;headers&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'x-naver-client-id'</font>:&nbsp;<font color="#483d8b">&quot;qMzT70JDXQJ82ReGm3AX&quot;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'x-naver-client-secret'</font>:&nbsp;<font color="#483d8b">&quot;Lc12WgpllY&quot;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font>&#125;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;response&nbsp;<font color="#66cc66">=</font>&nbsp;requests.<font>get</font><font>&#40;</font>url<font color="#66cc66">,</font>&nbsp;headers<font color="#66cc66">=</font>headers<font color="#66cc66">,</font>&nbsp;params<font color="#66cc66">=</font>p<font>&#41;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;naver_result&nbsp;<font color="#66cc66">=</font>&nbsp;json.<font>loads</font><font>&#40;</font>response.<font>text</font><font>&#41;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;items&nbsp;<font color="#66cc66">=</font>&nbsp;naver_result<font>&#91;</font><font color="#483d8b">'items'</font><font>&#93;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">if</font>&nbsp;naver_result<font>&#91;</font><font color="#483d8b">'total'</font><font>&#93;</font>&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">0</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#008000">None</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#008000">range</font><font>&#40;</font><font color="#008000">len</font><font>&#40;</font>items<font>&#41;</font><font>&#41;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;사용자가&nbsp;입력한&nbsp;검색어와&nbsp;각&nbsp;영화의&nbsp;제목을&nbsp;비교해서&nbsp;비슷할수록&nbsp;높은&nbsp;점수를&nbsp;매깁니다.</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;items<font>&#91;</font>i<font>&#93;</font><font>&#91;</font><font color="#483d8b">'title_similarity'</font><font>&#93;</font>&nbsp;<font color="#66cc66">=</font>&nbsp;SequenceMatcher<font>&#40;</font>a<font color="#66cc66">=</font>q<font color="#66cc66">,</font>&nbsp;b<font color="#66cc66">=</font>items<font>&#91;</font>i<font>&#93;</font><font>&#91;</font><font color="#483d8b">'title'</font><font>&#93;</font><font>&#41;</font>.<font>ratio</font><font>&#40;</font><font>&#41;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;바로&nbsp;앞에서&nbsp;계산한&nbsp;유사도&nbsp;점수가&nbsp;가장&nbsp;높은&nbsp;항목을&nbsp;돌려줍니다.</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;검색어와&nbsp;제일&nbsp;유사한&nbsp;영화&nbsp;제목의&nbsp;정보를&nbsp;돌려줍니다.</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#008000">max</font><font>&#40;</font>items<font color="#66cc66">,</font>&nbsp;key<font color="#66cc66">=</font><font color="#ff7700">lambda</font>&nbsp;x:&nbsp;x<font>&#91;</font><font color="#483d8b">'title_similarity'</font><font>&#93;</font><font>&#41;</font></blockquote></code></pre>
        <p>이제 가져온 영화 정보들을 깔끔하게 하나로 정리해서 보여줄 것이다. 네이버의 영화 검색 결과를 메인으로 삼아서 구성하고 The Movie Database에서는 비슷한 영화, 추천 영화를 가져 오게 한다. Daum 에서는 관련 동영상을 가져올 것이다.</p>
        <h5>코드 15-7 Daum 영화 검색 결과와 The Movie Database의 정보 연결</h5>
        <pre class="python"><code><blockquote><font color="#ff7700">def</font>&nbsp;collect_movie_info<font>&#40;</font>q<font>&#41;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;naver_data&nbsp;<font color="#66cc66">=</font>&nbsp;get_naver_movie_info<font>&#40;</font>q<font>&#41;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">if</font>&nbsp;naver_data&nbsp;<font color="#ff7700">is</font>&nbsp;<font color="#008000">None</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#008000">None</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;eng_title&nbsp;<font color="#66cc66">=</font>&nbsp;naver_data<font>&#91;</font><font color="#483d8b">'subtitle'</font><font>&#93;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;themoviedb_data&nbsp;<font color="#66cc66">=</font>&nbsp;get_themoviedb_info<font>&#40;</font>q<font>&#41;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;themoviedb의&nbsp;검색&nbsp;결과가&nbsp;있으면&nbsp;비슷한&nbsp;영화,&nbsp;추천&nbsp;영화를&nbsp;가져오고</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">if</font>&nbsp;themoviedb_data&nbsp;<font color="#ff7700">is</font>&nbsp;<font color="#ff7700">not</font>&nbsp;<font color="#008000">None</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;themoviedb_movie_id&nbsp;<font color="#66cc66">=</font>&nbsp;themoviedb_data<font>&#91;</font><font color="#483d8b">'id'</font><font>&#93;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;p&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;api_key&quot;</font>:&nbsp;<font color="#483d8b">&quot;b1147087552cb630f93b88becd95bfe4&quot;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font>&#125;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;similar_movie_url&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;https://api.themoviedb.org/3/movie/{}/similar&quot;</font>.<font>format</font><font>&#40;</font>themoviedb_movie_id<font>&#41;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;recommendation_url&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;https://api.themoviedb.org/3/movie/{}/recommendations&quot;</font>.<font>format</font><font>&#40;</font>themoviedb_movie_id<font>&#41;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;response&nbsp;<font color="#66cc66">=</font>&nbsp;requests.<font>get</font><font>&#40;</font>similar_movie_url<font color="#66cc66">,</font>&nbsp;data<font color="#66cc66">=</font>p<font>&#41;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;similar_result&nbsp;<font color="#66cc66">=</font>&nbsp;json.<font>loads</font><font>&#40;</font>response.<font>text</font><font>&#41;</font><font>&#91;</font><font color="#483d8b">'results'</font><font>&#93;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;response&nbsp;<font color="#66cc66">=</font>&nbsp;requests.<font>get</font><font>&#40;</font>recommendation_url<font color="#66cc66">,</font>&nbsp;data<font color="#66cc66">=</font>p<font>&#41;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;recommend_result&nbsp;<font color="#66cc66">=</font>&nbsp;json.<font>loads</font><font>&#40;</font>response.<font>text</font><font>&#41;</font><font>&#91;</font><font color="#483d8b">'results'</font><font>&#93;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">else</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;검색&nbsp;결과가&nbsp;없으면&nbsp;빈&nbsp;값으로&nbsp;설정합니다.</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;themoviedb_data&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><font>&#125;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;themoviedb_data<font>&#91;</font><font color="#483d8b">'vote_average'</font><font>&#93;</font>&nbsp;<font color="#66cc66">=</font>&nbsp;naver_data<font>&#91;</font><font color="#483d8b">'userRating'</font><font>&#93;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;themoviedb_data<font>&#91;</font><font color="#483d8b">'release_date'</font><font>&#93;</font>&nbsp;<font color="#66cc66">=</font>&nbsp;naver_data<font>&#91;</font><font color="#483d8b">'pubDate'</font><font>&#93;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;similar_result&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#91;</font><font>&#93;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;recommend_result&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#91;</font><font>&#93;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;kakao_data&nbsp;<font color="#66cc66">=</font>&nbsp;get_kakao_video_search<font>&#40;</font>q&nbsp;+&nbsp;<font color="#483d8b">&quot;&nbsp;영화&quot;</font><font>&#41;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;네이버&nbsp;검색&nbsp;결과의&nbsp;태그&nbsp;제거</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;title&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#dc143c">re</font>.<font>sub</font><font>&#40;</font><font color="#483d8b">'&lt;[^&lt;]+?&gt;'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;naver_data<font>&#91;</font><font color="#483d8b">'title'</font><font>&#93;</font><font>&#41;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;movie_info&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;다음&nbsp;결과의&nbsp;첫&nbsp;번째&nbsp;결과&nbsp;정보들을&nbsp;넣습니다.</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;국내&nbsp;개봉&nbsp;이름</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;title&quot;</font>:&nbsp;title<font color="#66cc66">,</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;poster&quot;</font>:&nbsp;<font color="#483d8b">&quot;https://image.tmdb.org/t/p/w500&quot;</font>&nbsp;+&nbsp;themoviedb_data<font>&#91;</font><font color="#483d8b">'poster_path'</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;영문&nbsp;제목</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;eng_title&quot;</font>:&nbsp;eng_title<font color="#66cc66">,</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;영화&nbsp;원제</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;ogr_title&quot;</font>:&nbsp;themoviedb_data<font>&#91;</font><font color="#483d8b">'original_title'</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;출연&nbsp;배우</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;네이버&nbsp;영화&nbsp;정보에서&nbsp;맨&nbsp;마지막에&nbsp;|가&nbsp;붙어&nbsp;있어서&nbsp;생기는&nbsp;빈&nbsp;요소를&nbsp;제거합니다.</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;actors&quot;</font>:&nbsp;naver_data<font>&#91;</font><font color="#483d8b">'actor'</font><font>&#93;</font>.<font>split</font><font>&#40;</font><font color="#483d8b">&quot;|&quot;</font><font>&#41;</font><font>&#91;</font>:-<font color="#ff4500">1</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;감독</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;네이버&nbsp;영화&nbsp;정보에서&nbsp;맨&nbsp;마지막에&nbsp;|가&nbsp;붙어&nbsp;있어서&nbsp;생기는&nbsp;빈&nbsp;요소를&nbsp;제거합니다.</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;director&quot;</font>:&nbsp;naver_data<font>&#91;</font><font color="#483d8b">'director'</font><font>&#93;</font>.<font>split</font><font>&#40;</font><font color="#483d8b">&quot;|&quot;</font><font>&#41;</font><font>&#91;</font>:-<font color="#ff4500">1</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;자세히&nbsp;보러&nbsp;가기&nbsp;링크(네이버)</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;detail_link_naver&quot;</font>:&nbsp;naver_data<font>&#91;</font><font color="#483d8b">'link'</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;평점</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;rating&quot;</font>:&nbsp;themoviedb_data<font>&#91;</font><font color="#483d8b">'vote_average'</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;개봉일</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;pub_date&quot;</font>:&nbsp;themoviedb_data<font>&#91;</font><font color="#483d8b">'release_date'</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;비슷한&nbsp;영화</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;similar_movies&quot;</font>:&nbsp;<font>&#91;</font>item<font>&#91;</font><font color="#483d8b">'original_title'</font><font>&#93;</font>&nbsp;<font color="#ff7700">for</font>&nbsp;item&nbsp;<font color="#ff7700">in</font>&nbsp;similar_result<font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;추천&nbsp;영화</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;recommend_movies&quot;</font>:&nbsp;<font>&#91;</font>item<font>&#91;</font><font color="#483d8b">'original_title'</font><font>&#93;</font>&nbsp;<font color="#ff7700">for</font>&nbsp;item&nbsp;<font color="#ff7700">in</font>&nbsp;recommend_result<font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;동영상&nbsp;검색</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;videos&quot;</font>:&nbsp;kakao_data<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font>&#125;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;movie_info</blockquote></code></pre>
        <p>새로 파일을 만들거나 인터프리터 상에서 collect_movie_info()가 제대로 동작하는지 확인해 보자.</p>
        <h5>코드 15-8 collect_movie_info()의 동작 확인</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:<br/>
<font color="#ff7700">from</font>&nbsp;movie_search&nbsp;<font color="#ff7700">import</font>&nbsp;collect_movie_info<br/>
&nbsp;<br/>
collect_movie_info<font>&#40;</font><font color="#483d8b">'너의&nbsp;이름은'</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:<br/>
<font>&#123;</font><font color="#483d8b">'title'</font>:&nbsp;<font color="#483d8b">'너의&nbsp;이름은.'</font><font color="#66cc66">,</font><br/>
&nbsp;<font color="#483d8b">'poster'</font>:&nbsp;<font color="#483d8b">'https://image.tmdb.org/t/p/w500/xq1Ugd62d23K2knRUx6xxuALTZB.jpg'</font><font color="#66cc66">,</font><br/>
&nbsp;<font color="#483d8b">'eng_title'</font>:&nbsp;<font color="#483d8b">'your&nbsp;name.'</font><font color="#66cc66">,</font><br/>
&nbsp;<font color="#483d8b">'ogr_title'</font>:&nbsp;<font color="#483d8b">'君の名は。'</font><font color="#66cc66">,</font><br/>
&nbsp;<font color="#483d8b">'actors'</font>:&nbsp;<font>&#91;</font><font color="#483d8b">'카미키&nbsp;류노스케'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'카미시라이시&nbsp;모네'</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;<font color="#483d8b">'director'</font>:&nbsp;<font>&#91;</font><font color="#483d8b">'신카이&nbsp;마코토'</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;<font color="#483d8b">'detail_link_naver'</font>:&nbsp;<font color="#483d8b">'https://movie.naver.com/movie/bi/mi/basic.nhn?code=150198'</font><font color="#66cc66">,</font><br/>
&nbsp;<font color="#483d8b">'rating'</font>:&nbsp;<font color="#ff4500">8.6</font><font color="#66cc66">,</font><br/>
&nbsp;<font color="#483d8b">'pub_date'</font>:&nbsp;<font color="#483d8b">'2016-08-26'</font><font color="#66cc66">,</font><br/>
&nbsp;<font color="#483d8b">'similar_movies'</font>:&nbsp;<font>&#91;</font><font color="#483d8b">'となりのトトロ'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;<font color="#483d8b">'ドラゴンボールＺ&nbsp;燃え尽きろ!!熱戦・烈戦・超激戦'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;<font color="#483d8b">'Beetlejuice'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;<font color="#483d8b">'It&nbsp;Follows'</font><font color="#66cc66">,</font><br/>
<br>
-- snip --
<br><br>
&nbsp;&nbsp;<font color="#483d8b">'天空の城ラピュタ'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;<font color="#483d8b">'コクリコ坂から'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;<font color="#483d8b">'かぐや姫の物語'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;<font color="#483d8b">'蛍火の杜へ'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;<font color="#483d8b">'Kubo&nbsp;and&nbsp;the&nbsp;Two&nbsp;Strings'</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;<font color="#483d8b">'videos'</font>:&nbsp;<font>&#91;</font><font>&#123;</font><font color="#483d8b">'url'</font>:&nbsp;<font color="#483d8b">'http://tv.kakao.com/v/v3d5dtxQtQOtM72OQdMdOOd'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'thumbnail'</font>:&nbsp;<font color="#483d8b">'https://search4.kakaocdn.net/argon/138x78_80_pr/B2BtwD9JsKz'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'title'</font>:&nbsp;<font color="#483d8b">'&lt;너의&nbsp;이름은.&gt;&nbsp;런칭&nbsp;영상'</font><font>&#125;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;<font>&#123;</font><font color="#483d8b">'url'</font>:&nbsp;<font color="#483d8b">'http://tv.kakao.com/v/v521exXk64nxAvlUX6kZXAU'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'thumbnail'</font>:&nbsp;<font color="#483d8b">'https://search4.kakaocdn.net/argon/138x78_80_pr/J8dYI8zZWPl'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'title'</font>:&nbsp;<font color="#483d8b">'&lt;너의&nbsp;이름은.&gt;&nbsp;메인&nbsp;예고편'</font><font>&#125;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;<font>&#123;</font><font color="#483d8b">'url'</font>:&nbsp;<font color="#483d8b">'http://tv.kakao.com/v/vee92SJnjnLzSHbzjbhrnlj'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'thumbnail'</font>:&nbsp;<font color="#483d8b">'https://search4.kakaocdn.net/argon/138x78_80_pr/JYWSMG6nSEX'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'title'</font>:&nbsp;<font color="#483d8b">'&lt;너의&nbsp;이름은&gt;&nbsp;더빙판&nbsp;티저&nbsp;예고편'</font><font>&#125;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;<font>&#123;</font><font color="#483d8b">'url'</font>:&nbsp;<font color="#483d8b">'http://tv.kakao.com/v/v22dbGeojjvGFqlrllUGW9r'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'thumbnail'</font>:&nbsp;<font color="#483d8b">'https://search4.kakaocdn.net/argon/138x78_80_pr/1gM6U2Ekxtj'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;<font color="#483d8b">'title'</font>:&nbsp;<font color="#483d8b">'&lt;너의&nbsp;이름은.&gt;&nbsp;배우&nbsp;축하&nbsp;영상'</font><font>&#125;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;<font>&#123;</font><font color="#483d8b">'url'</font>:&nbsp;<font color="#483d8b">'http://tv.kakao.com/v/ve80d3vNdvdLAmVd3IIvetN'</font><font color="#66cc66">,</font><br/>
<br>
-- snip --

</blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">15.3.3 - 매시업 API 서버 만들기</h4>
    <section>
      <article class="">
        <p>잘 동작한다면 이제 이 함수를 이용해서 초간단 매시업 API 서버를 만들어보자. GET 방식으로 검색어를 q에 전달받은 후 앞서 만든 <code>collect_movie_info()</code>매시업 함수로 작업 한다 파일 이름은 <code>search_server.py</code> 이다.</p>
        <h5>코드 15-9 매시업 API 서버 만들기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:<br/>
%%writefile&nbsp;search_server.<font>py</font><br/>
<font color="#808080">#&nbsp;앞서&nbsp;만든&nbsp;영화&nbsp;정보를&nbsp;모으는&nbsp;함수를&nbsp;불러옵니다.</font><br/>
<font color="#ff7700">from</font>&nbsp;movie_search&nbsp;<font color="#ff7700">import</font>&nbsp;collect_movie_info<br/>
<font color="#ff7700">from</font>&nbsp;flask&nbsp;<font color="#ff7700">import</font>&nbsp;Flask<br/>
<font color="#ff7700">from</font>&nbsp;flask&nbsp;<font color="#ff7700">import</font>&nbsp;request<br/>
<font color="#ff7700">from</font>&nbsp;flask&nbsp;<font color="#ff7700">import</font>&nbsp;render_template<br/>
<font color="#ff7700">import</font>&nbsp;json<br/>
&nbsp;<br/>
app&nbsp;<font color="#66cc66">=</font>&nbsp;Flask<font>&#40;</font>__name__<font>&#41;</font><br/>
&nbsp;<br/>
app.<font>debug</font>&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">True</font><br/>
&nbsp;<br/>
<font color="#808080">#&nbsp;결과를&nbsp;JSON으로&nbsp;저장합니다.</font><br/>
<font color="#66cc66">@</font>app.<font>route</font><font>&#40;</font><font color="#483d8b">&quot;/movie-search&quot;</font><font>&#41;</font><br/>
<font color="#ff7700">def</font>&nbsp;search<font>&#40;</font><font>&#41;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;q&nbsp;<font color="#66cc66">=</font>&nbsp;request.<font>args</font>.<font>get</font><font>&#40;</font><font color="#483d8b">&quot;q&quot;</font><font>&#41;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;json.<font>dumps</font><font>&#40;</font>collect_movie_info<font>&#40;</font>q<font>&#41;</font><font color="#66cc66">,</font>&nbsp;ensure_ascii<font color="#66cc66">=</font><font color="#008000">False</font><font>&#41;</font>.<font>encode</font><font>&#40;</font><font color="#483d8b">'utf8'</font><font>&#41;</font><br/>
&nbsp;<br/>
<font color="#808080">#&nbsp;결과를&nbsp;HTML페이지로&nbsp;보여줍니다.</font><br/>
<font color="#66cc66">@</font>app.<font>route</font><font>&#40;</font><font color="#483d8b">&quot;/movie-search-pretty&quot;</font><font>&#41;</font><br/>
<font color="#ff7700">def</font>&nbsp;search_pretty<font>&#40;</font><font>&#41;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;q&nbsp;<font color="#66cc66">=</font>&nbsp;request.<font>args</font>.<font>get</font><font>&#40;</font><font color="#483d8b">&quot;q&quot;</font><font>&#41;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;result&nbsp;<font color="#66cc66">=</font>&nbsp;collect_movie_info<font>&#40;</font>q<font>&#41;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;render_template<font>&#40;</font><font color="#483d8b">'result.html'</font><font color="#66cc66">,</font>&nbsp;item<font color="#66cc66">=</font>result<font>&#41;</font><br/>
&nbsp;<br/>
<font color="#ff7700">if</font>&nbsp;__name__&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">&quot;__main__&quot;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;app.<font>run</font><font>&#40;</font><font>&#41;</font></blockquote></code></pre>
        <p>플라스크를 이용해서 API서버를 만드는 과정은 11장에서 다뤘었다. 셸에서 <code>python search_server.py</code>를 실행하고 웹 브라우저에서 'http://127.0.0.1:5000/movie-search?q=&lt;영화이름>'을 입력하여 검색해보면, 방금 만든 매시업 API가 동작하는 것을 볼 수 있다.</p>
        <h5>그림 15-10 매시업 API 확인</h5>
        <img src="/img/img53.png" alt="매시업 API 확인">
      </article>
    </section>

    <h4 class="sub-header">15.3.4 - HTML 렌더링을 위한 템플릿</h4>
    <section>
      <article class="">
        <p>지금까지 살펴본 매시업 API서버의 최종 디렉터리 구조는 다음과 같다.</p>
        <pre><code>.<br>
├── movie_search.py<br>
├── search_server.py<br>
└── templates<br>
&nbsp;&nbsp;&nbsp;&nbsp;└── result.html
        </code></pre>
        <p>앞서 [코드 15-9]에서 결과를 보기 좋게 보고 싶어서 /movie-search-pretty라는 API를 만들었다. 이 API는 플라스크의 템플릿을 이용한다. 그래서 몇 가지 사전 작업을 더 해야 한다.</p>
        <p>templates라는 디렉터리를 만들고 아래에 result.html이라는 파일을 만들었다. 앞 search_server.py을 보고 눈치챘겠지만, 이 result.html 파일을 토대로 정보를 렌더링 할 것이다.</p>
        <pre class="html"><code><blockquote><font color="#00bbdd">&lt;!DOCTYPE&nbsp;html&gt;</font><br/>
<font color="#009900">&lt;<font color="#000000">html</font>&gt;</font><br/>
<font color="#009900">&lt;<font color="#000000">head</font>&gt;</font><br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">title</font>&gt;</font>@{{item.title}}<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">title</font>&gt;</font><br/>
<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">head</font>&gt;</font><br/>
<font color="#009900">&lt;<font color="#000000">body</font>&gt;</font><br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">h2</font>&gt;</font>제목<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">h2</font>&gt;</font><br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">p</font>&gt;</font>@{{item.title}}<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">p</font>&gt;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">h3</font>&gt;</font>원제<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">h3</font>&gt;</font><br/>
&nbsp;&nbsp;@{{item.ogr_title}}<br/>
&nbsp;<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">h3</font>&gt;</font>영문&nbsp;제목<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">h3</font>&gt;</font><br/>
&nbsp;&nbsp;@{{item.eng_title}}<br/>
&nbsp;<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">h2</font>&gt;</font>포스터<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">h2</font>&gt;</font><br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">img</font>&nbsp;<font color="#000066">src</font><font color="#66cc66">=</font><font color="#ff0000">&quot;@{{item.poster}}&quot;</font>&gt;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">h2</font>&gt;</font>감독<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">h2</font>&gt;</font><br/>
&nbsp;&nbsp;{%&nbsp;for&nbsp;i&nbsp;in&nbsp;item.director&nbsp;%}<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">p</font>&gt;</font>@{{i}}<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">p</font>&gt;</font><br/>
&nbsp;&nbsp;@{%&nbsp;endfor&nbsp;%}<br/>
&nbsp;<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">h2</font>&gt;</font>배우<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">h2</font>&gt;</font><br/>
&nbsp;&nbsp;@{%&nbsp;for&nbsp;i&nbsp;in&nbsp;item.actors&nbsp;%}<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">p</font>&gt;</font>@{{i}}<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">p</font>&gt;</font><br/>
&nbsp;&nbsp;@{%&nbsp;endfor&nbsp;%}<br/>
&nbsp;<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">h2</font>&gt;</font>개봉일<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">h2</font>&gt;</font><br/>
&nbsp;&nbsp;@{{item.pub_date}}<br/>
&nbsp;<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">h2</font>&gt;</font>평점<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">h2</font>&gt;</font><br/>
&nbsp;&nbsp;@{{item.rating}}<br/>
&nbsp;<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">h2</font>&gt;</font>상세정보&nbsp;링크<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">h2</font>&gt;</font><br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">a</font>&nbsp;<font color="#000066">href</font><font color="#66cc66">=</font><font color="#ff0000">&quot;@{{item.detail_link_naver}}&quot;</font>&gt;</font>보러&nbsp;가기<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">a</font>&gt;</font><br/>
&nbsp;<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">h2</font>&gt;</font>비슷한&nbsp;영화<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">h2</font>&gt;</font><br/>
&nbsp;&nbsp;{%&nbsp;for&nbsp;i&nbsp;in&nbsp;item.similar_movies&nbsp;%}<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">b</font>&gt;</font>[@{{i}}]<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">b</font>&gt;</font>,<br/>
&nbsp;&nbsp;{%&nbsp;endfor&nbsp;%}<br/>
&nbsp;<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">h2</font>&gt;</font>추천&nbsp;영화<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">h2</font>&gt;</font><br/>
&nbsp;&nbsp;{%&nbsp;for&nbsp;i&nbsp;in&nbsp;item.recommend_movies&nbsp;%}<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">b</font>&gt;</font>[@{{i}}]<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">b</font>&gt;</font>,<br/>
&nbsp;&nbsp;{%&nbsp;endfor&nbsp;%}<br/>
&nbsp;<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">h2</font>&gt;</font>관련&nbsp;영상<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">h2</font>&gt;</font><br/>
&nbsp;&nbsp;{%&nbsp;for&nbsp;i&nbsp;in&nbsp;item.videos&nbsp;%}<br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">p</font>&gt;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">b</font>&gt;</font>@{{i.title}}<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">b</font>&gt;&lt;<font color="#000000">br</font>&gt;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#009900">&lt;<font color="#000000">a</font>&nbsp;<font color="#000066">href</font><font color="#66cc66">=</font><font color="#ff0000">&quot;@{{i.rul}}&quot;</font>&gt;&lt;<font color="#000000">img</font>&nbsp;<font color="#000066">src</font><font color="#66cc66">=</font><font color="#ff0000">&quot;@{{i.thumbnail}}&quot;</font>&gt;&lt;<font color="#66cc66">/</font><font color="#000000">a</font>&gt;</font><br/>
&nbsp;&nbsp;<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">p</font>&gt;</font><br/>
&nbsp;&nbsp;{%&nbsp;endfor&nbsp;%}<br/>
<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">body</font>&gt;</font><br/>
<font color="#009900">&lt;<font color="#66cc66">/</font><font color="#000000">html</font>&gt;</font></blockquote></code></pre>
        <p>이제 '/movie-search-pretty?q=&lt;영화이름>'으로 접속하면 영화 이름과 관련된 HTML 페이지를 렌더링 해준다. CSS 들어가지 않은 HTML 페이지라 이쁘지는 않지만, 포스터 그림을 표시하고, 관련 영상의 섬네일과 링크를 달아주는 용도로는 충분하다.</p>
        <h4>그림 15-13 HTML 페이지</h4>
        <img src="/img/img54.png" alt="HTML 페이지">
        <p>HTML 페이지는 플라스크의 템플릿 렌더링을 활용했다. 더 자세한 정보는 플라스크 개발 문서의 '<a href="http://flask.pocoo.org/docs/0.12/quickstart/#rendering-templates" target="_blank">Rendering Templates</a>'를 참고한다.</p>
      </article>
    </section>

    <h4 class="sub-header">15.3.5 - 매시업 응용</h4>
    <section>
      <article class="">
        <p>지금까지 파이썬을 이용한다는 테두리 안에서 Open API를 활용해 보았다. 좀 더 인터넷을 검색해보면 다양한 Open API 가 있다는 것을 쉽게 알 수 있다. 다양한 분야의 사이트에서 다양한 정보들을 어떻게 엮어내는지가 매시업의 핵심이다.</p>
        <p>인스타그램이나 페이스북, 트위터 같은 SNS를 비롯한 구글 같은 검색 엔진, 아마존 같은 대형 쇼핑몰 등 자사 서비스를 개발자에게 열어둔 회사는 많다. 외국과 비교하면 조금 아쉽지만 우리나라도 정부가 제공하는 Open API가 있다.</p>
        <p>Open API로 얻을 수 있는 데이터, 별도로 얻을 수 있는 대량의 데이터, 위치 정보가 결합하면 재미있는 서비스를 만들 수 있다. 예를 들면 <a href="https://twimap.com" target="_blank">TwiMap</a> 처럼 트위터 트윗의 위치 정보를 이용해 트윗과 위치를 지도 위에 표시하는 서비스나 <a href="http://www.oldmapsonline.org" target="_blank">Old Maps Online</a>처럼 구글 지도를 이용해 해당 위치의 옛날 지도를 보여주는 서비스가 있다.</p>
        <p>데이터가 산더미지만 꿰지 않으면 아무런 소용이 없다. 여기서 필요한게 바로 인사이트가 아닐까?{% for i in item.director %}</p>
      </article>
    </section>
  </div>