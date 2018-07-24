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
        <p>일단, <code>pip install scrapy</code>(Windows, 리눅스), <code>pip3 install scrapy</code>(mac OS X) 명령을 실행해 스크래피를 설치한다. 설치 후 터미널에서 <code>scrapy</code> 명령어를 입력하면, 다음과 같이 사용가능한 옵션들을 확인할 수 있다.</p>
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
        <p>크롤링하는 이유는 기본적으로 비정형 데이터인 웹 페이지를 목적에 맞게 일정한 형태로 가공할 상황이 가장 많을 것이다. 그래야 불규칙하게 흩어진 데이터를 정보로 만들 수 있다. 즉, 아이템 정의는 측정하기 위한 기준을 세우는 것이라 할 수 있다. 우선 프로젝트를 만들면서 생성된 파일 중에 items.py 파일을 열어보자.</p>
        <h5>코드9-1 items.py 파일 내용 확인</h5>
        <pre><code><blockquote><ol><li>#&nbsp;-*-&nbsp;coding:&nbsp;utf-8&nbsp;-*-</li><li>&nbsp;</li><li>#&nbsp;Define&nbsp;here&nbsp;the&nbsp;models&nbsp;<font color="#00b100">for</font>&nbsp;your&nbsp;scraped&nbsp;items</li><li>#</li><li>#&nbsp;See&nbsp;documentation&nbsp;<font color="#00b100">in</font>:</li><li>#&nbsp;https://doc.scrapy.org/en/latest/topics/items.html</li><li>&nbsp;</li><li>import&nbsp;scrapy</li><li>&nbsp;</li><li>&nbsp;</li><li>class&nbsp;HanbitItem<font color="#33cc33">(</font>scrapy.Item<font color="#33cc33">)</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;define&nbsp;the&nbsp;fields&nbsp;<font color="#00b100">for</font>&nbsp;your&nbsp;item&nbsp;here&nbsp;like:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;name&nbsp;=&nbsp;scrapy.Field<font color="#33cc33">()</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;pass</li></ol></blockquote></code></pre>
        <p># name = scrapy.Field() 주석이 아이템을 설정하는 코드의 예이다. 즉, &lt;크롤링할 항목이름> = scrapy.Field() 형태로 아이템을 설정하라는 뜻이다.</p>

        <p>다음은 한빛미디어의 도서 소개 페이지를 살펴보자. 보통 책 정보에는 표지, 책 이름, 저자 이름, 번역자 이름, 출간일, 책 페이지 수, ISBN 등의 정보를 볼 수 있다.</p>
        <p>이제 한빛미디어 홈페이지의 책 정보를 아이템으로 설정할 것이다. [코드9-2]를 참고해 items.py 파일을 수정한다.</p>
        <h5>코드9-2 items.py에 아이템 설정</h5>
        <pre><code><blockquote><ol><li>import&nbsp;scrapy</li><li>&nbsp;</li><li>class&nbsp;HanbitItem<font color="#33cc33">(</font>scrapy.Item<font color="#33cc33">)</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;define&nbsp;the&nbsp;fields&nbsp;<font color="#00b100">for</font>&nbsp;your&nbsp;item&nbsp;here&nbsp;like:</li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;책&nbsp;이름</li><li>&nbsp;&nbsp;&nbsp;&nbsp;book_title&nbsp;=&nbsp;scrapy.Field<font color="#33cc33">()</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;저자&nbsp;이름</li><li>&nbsp;&nbsp;&nbsp;&nbsp;book_author&nbsp;=&nbsp;scrapy.Field<font color="#33cc33">()</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;번역자&nbsp;이름</li><li>&nbsp;&nbsp;&nbsp;&nbsp;book_translator&nbsp;=&nbsp;scrapy.Field<font color="#33cc33">()</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;출간일</li><li>&nbsp;&nbsp;&nbsp;&nbsp;book_pub_date&nbsp;=&nbsp;scrapy.Field<font color="#33cc33">()</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;ISBN</li><li>&nbsp;&nbsp;&nbsp;&nbsp;book_isbn&nbsp;=&nbsp;scrapy.Field<font color="#33cc33">()</font></li></ol></blockquote></code></pre>
        <p>책 제목은 book_title, 저자 이름은 book_author, 번역자 이름은 book_translator, 출간일은 book_pub_date, ISBN은 book_isbn으로 설정했다. 이 아이템들로 해당 정보를 수집할 거라는 템플릿을 스크래피에 제시하는 역할을 한다.</p>
        
      </article>
    </section>
  </div>

  <h3 class="sub-header">9.3. 스파이더 만들기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>수집할 정보를 결정해 아이템으로 설정했으니 실제 정보를 수집해야 한다. 이제 사이트를 크롤링할 스파이더(spider)를 만들 차례다.</p>

        <p>스크래피에서 스파이더를 생성해주는 명령어는 <code>genspider</code> 이다. 해당 디렉터리에서 <code>scrapy genspider</code> 명령을 실행하면 명령의 각종 옵션과 사용방법을 확인할 수 있다. 실행결과는 다음과 같다.</p>
        <pre><code><blockquote><ol><li>$&nbsp;scrapy&nbsp;genspider</li><li>Usage</li><li>=====</li><li>&nbsp;&nbsp;scrapy&nbsp;genspider&nbsp;[options]&nbsp;<font color="#33cc33">&lt;</font>name<font color="#33cc33">&gt;</font>&nbsp;<font color="#33cc33">&lt;</font>domain<font color="#33cc33">&gt;</font></li><li>&nbsp;</li><li>Generate&nbsp;new&nbsp;spider&nbsp;using&nbsp;pre-defined&nbsp;templates</li><li>&nbsp;</li><li>Options</li><li>=======</li><li>--help,&nbsp;-h&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;show&nbsp;this&nbsp;help&nbsp;message&nbsp;and&nbsp;<font color="#00b100">exit</font></li><li>--list,&nbsp;-l&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;List&nbsp;available&nbsp;templates</li><li>--edit,&nbsp;-e&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit&nbsp;spider&nbsp;after&nbsp;creating&nbsp;it</li><li>--dump=TEMPLATE,&nbsp;-d&nbsp;TEMPLATE</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dump&nbsp;template&nbsp;to&nbsp;standard&nbsp;output</li><li>--template=TEMPLATE,&nbsp;-t&nbsp;TEMPLATE</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Uses&nbsp;a&nbsp;custom&nbsp;template.</li><li>--force&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#00b100">If</font>&nbsp;the&nbsp;spider&nbsp;already&nbsp;exists,&nbsp;overwrite&nbsp;it&nbsp;with&nbsp;the</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;template</li><li>&nbsp;</li><li>Global&nbsp;Options</li><li>--------------</li><li>--logfile=FILE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;log&nbsp;file.&nbsp;<font color="#00b100">if</font>&nbsp;omitted&nbsp;stderr&nbsp;will&nbsp;be&nbsp;used</li><li>--loglevel=LEVEL,&nbsp;-L&nbsp;LEVEL</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;log&nbsp;level&nbsp;<font color="#33cc33">(</font>default:&nbsp;DEBUG<font color="#33cc33">)</font></li><li>--nolog&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;disable&nbsp;logging&nbsp;completely</li><li>--profile=FILE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;write&nbsp;python&nbsp;cProfile&nbsp;stats&nbsp;to&nbsp;FILE</li><li>--pidfile=FILE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;write&nbsp;process&nbsp;ID&nbsp;to&nbsp;FILE</li><li>--set=NAME=VALUE,&nbsp;-s&nbsp;NAME=VALUE</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#b1b100">set</font>/override&nbsp;setting&nbsp;<font color="#33cc33">(</font>may&nbsp;be&nbsp;repeated<font color="#33cc33">)</font></li><li>--pdb&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;enable&nbsp;pdb&nbsp;on&nbsp;failure</li></ol></blockquote></code></pre>
        <p>스파이더를 생성할 때 필요한 옵션은 -t이다. -t옵션은 크롤러의 템플릿을 결정할 때 사용한다. 추가로 간략하게 다음과 같은 옵션이 있다.</p>
        <ul>
          <li><storng>basic</strong>: 가장 기본적인 크롤러다. [domain]에서 설정한 페이지만 크롤링한다.</li>
          <li><strong>crawl</strong>: 설정한 규칙에 맞는 링크들을 재귀적으로 탐색한다. 아마 대부분의 크롤링 작업에서 이 스파이더를 사용할 것이다.</li>
          <li><strong>xmlfeed</strong>: xml 피드를 크롤링 한다. 더 자세하게 말하면 xml의 각 노드를 크롤링한다.</li>
          <li><strong>csvfeed</strong>: xmlfeed 크롤러와 비교했을 때 각 행을 크롤링한다는 차이가 있다.</li>
        </ul>
        <p>이제 scrapy genspider -t crawl book_crawl hanbit.co.kr 명령을 실행해 스파이더를 생성한다. 주의할 점은 도메인 이름을 입력할 때 'http://'와 'www'를 생략해야 한다는 것이다. 결과는 다음과 같다.</p>
        <pre><code><blockquote><ol><li>$&nbsp;scrapy&nbsp;genspider&nbsp;-t&nbsp;crawl&nbsp;book_crawl&nbsp;hanbit.co.kr</li><li>Created&nbsp;spider&nbsp;'book_crawl'&nbsp;using&nbsp;template&nbsp;'crawl'&nbsp;<font color="#00b100">in</font>&nbsp;module:</li><li>&nbsp;&nbsp;hanbit.spiders.book_crawl</li></ol></blockquote></code></pre>
        <p>스파이더가 생성되었음을 알 수 있다. 스파이더 파일은 spiders 디렉터리에 생성된다.</p>
        <h5>코드9-3 book_crawl.py 내용 확인</h5>
        <pre><code><blockquote><ol><li><font color="#808080">#&nbsp;-*-&nbsp;coding:&nbsp;utf-8&nbsp;-*-</font></li><li><font color="#ff7700">import</font>&nbsp;scrapy</li><li><font color="#ff7700">from</font>&nbsp;scrapy.<font>linkextractors</font>&nbsp;<font color="#ff7700">import</font>&nbsp;LinkExtractor</li><li><font color="#ff7700">from</font>&nbsp;scrapy.<font>spiders</font>&nbsp;<font color="#ff7700">import</font>&nbsp;CrawlSpider<font color="#66cc66">,</font>&nbsp;Rule</li><li>&nbsp;</li><li>&nbsp;</li><li><font color="#ff7700">class</font>&nbsp;BookCrawlSpider<font>&#40;</font>CrawlSpider<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;name&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">'book_crawl'</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;allowed_domains&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#91;</font><font color="#483d8b">'hanbit.co.kr'</font><font>&#93;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;start_urls&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#91;</font><font color="#483d8b">'http://hanbit.co.kr/'</font><font>&#93;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;rules&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#40;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rule<font>&#40;</font>LinkExtractor<font>&#40;</font>allow<font color="#66cc66">=</font>r<font color="#483d8b">'Items/'</font><font>&#41;</font><font color="#66cc66">,</font>&nbsp;callback<font color="#66cc66">=</font><font color="#483d8b">'parse_item'</font><font color="#66cc66">,</font>&nbsp;follow<font color="#66cc66">=</font><font color="#008000">True</font><font>&#41;</font><font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font>&#41;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;parse_item<font>&#40;</font><font color="#008000">self</font><font color="#66cc66">,</font>&nbsp;response<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><font>&#125;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#i['domain_id']&nbsp;=&nbsp;response.xpath('//input[@id=&quot;sid&quot;]/@value').extract()</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#i['name']&nbsp;=&nbsp;response.xpath('//div[@id=&quot;name&quot;]').extract()</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#i['description']&nbsp;=&nbsp;response.xpath('//div[@id=&quot;description&quot;]').extract()</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;i</li></ol></blockquote></code></pre>
        <p>코드의 start_urls 를 살펴보면 입력시 생략했던 http://가 있음을 확인할 수 있다. 참고로 스파이더 생성에 관한 더 자세한 정보는 스크래피의 개발 문서 '<a href="http://doc.scrapy.org/en/1.4/topics/spiders/html#generic-spiders" target="_blank">Generic Spiders</a>' 를 참고한다.</p>
      </article>
    </section>

    <h4 class="sub-header">9.3.1 - 스파이더 파일 수정하기</h4>
    <section>
      <article>
        <p>스파이더 파일을 생성했다면, 이제 목적에 맞게 스파이더 파일을 수정해야 한다. 여기서는 수집할 링크의 규칙을 정하는 rules 와 규칙에 맞는 URL 을 발견했을 때 해당 URL 의 내용을 파싱하고 정제할 parse_item() 을 수정해야 한다. 우선 book_crawl.py를 수정할 때의 코드 기본 구조를 살펴보자. [코드9-4]와 같다.</p>
        <h5>코드9-4 스파이더 기본 구조 작성</h5>
        <pre><code><blockquote><ol><li><font color="#ff7700">class</font>&nbsp;BookCrawlSpider<font>&#40;</font>CrawlSpider<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;크롤러의&nbsp;이름입니다.&nbsp;실제&nbsp;크롤링을&nbsp;실행할&nbsp;때&nbsp;사용합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;name&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">'book_crawl'</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;크롤러를&nbsp;실행할&nbsp;도메인을&nbsp;여기서&nbsp;지정합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;해당&nbsp;서버에서&nbsp;실행되다가&nbsp;혀용된&nbsp;도메인&nbsp;이외는&nbsp;무시합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;allowed_domains&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#91;</font><font color="#483d8b">'hanbit.co.kr'</font><font>&#93;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;시작점으로&nbsp;사용할&nbsp;URL입니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;리스트로&nbsp;지정해&nbsp;한&nbsp;번에&nbsp;여러&nbsp;웹페이지에서&nbsp;크롤링을&nbsp;시작하게&nbsp;할&nbsp;수</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;있습니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;start_urls&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#91;</font><font color="#483d8b">'http://hanbit.co.kr/'</font><font>&#93;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;크롤러가&nbsp;어떻게&nbsp;작동할지&nbsp;규칙을&nbsp;설정합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;크롤러는&nbsp;시작점의&nbsp;모든&nbsp;링크를&nbsp;검사한&nbsp;후,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;규칙에&nbsp;맞는&nbsp;링크가&nbsp;있으면&nbsp;정해진&nbsp;콜백&nbsp;메서드를&nbsp;실행합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;rules&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#40;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;크롤링할&nbsp;링크를&nbsp;정규&nbsp;표현식을&nbsp;이용해서&nbsp;표현합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LinkExtractor<font>&#40;</font>allow<font color="#66cc66">=</font><font color="#483d8b">'Items/'</font><font>&#41;</font><font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;해당&nbsp;링크에&nbsp;요청을&nbsp;보내고&nbsp;응답이&nbsp;오면&nbsp;실행할&nbsp;콜백&nbsp;메서드를</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;지정합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;callback&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">'parse_item'</font><font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;True로&nbsp;설정되어&nbsp;있으면,&nbsp;응답에&nbsp;다시&nbsp;한번&nbsp;rules를&nbsp;적용해</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;재귀적으로&nbsp;실행합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;follow<font color="#66cc66">=</font><font color="#008000">True</font><font>&#41;</font><font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;이렇게&nbsp;여러&nbsp;개의&nbsp;규칙을&nbsp;설정할&nbsp;수&nbsp;있습니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;Rule(LinkExtractor(allow=r'.*'),&nbsp;callback='parse_item',&nbsp;follow=True),</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font>&#41;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;parse_item<font>&#40;</font><font color="#008000">self</font><font color="#66cc66">,</font>&nbsp;response<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'''rules를&nbsp;통과한&nbsp;링크에&nbsp;요청을&nbsp;보내&nbsp;응답을&nbsp;받으면&nbsp;Rule()에&nbsp;설정한&nbsp;콜백</font></li><li><font color="#483d8b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;메서드를&nbsp;해당&nbsp;응답결과에&nbsp;실행합니다.</font></li><li><font color="#483d8b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;따라서&nbsp;response를&nbsp;파라미터로&nbsp;받고&nbsp;XPath라든가&nbsp;CSS&nbsp;선택자를&nbsp;이용해서</font></li><li><font color="#483d8b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;원하는&nbsp;요소를&nbsp;추출할&nbsp;수&nbsp;있습니다.'''</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;앞서&nbsp;설정한&nbsp;아이템에&nbsp;맞춰&nbsp;딕셔너리를&nbsp;채우고&nbsp;반환합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><font>&#125;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#i['domain_id']&nbsp;=&nbsp;response.xpath('//input[@id=&quot;sid&quot;]/@value').extract()</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#i['name']&nbsp;=&nbsp;response.xpath('//div[@id=&quot;name&quot;]').extract()</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#i['description']&nbsp;=&nbsp;response.xpath('//div[@id=&quot;description&quot;]').extract()</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;i</li></ol></blockquote></code></pre>
        <p>주석을 참고하면 코드를 이해하는데 큰 어려움이 없을 것이다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">9.4. 스파이더 규칙 설정하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>9.3.1에서 코드를 수정한 것은 스파이더가 제대로 동작하기 위한 기본 골격을 만들어준 것이다. 그럼 이제 스파이더의 세부 규칙을 설정해야한다. 우선 Rule()부터 살펴보자.</p>
        <pre><code><blockquote><ol><li>rules&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#40;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rule<font>&#40;</font>LinkExtractor<font>&#40;</font>allow<font color="#66cc66">=</font>r<font color="#483d8b">'Items/'</font><font>&#41;</font><font color="#66cc66">,</font>&nbsp;callback<font color="#66cc66">=</font><font color="#483d8b">'parse_item'</font><font color="#66cc66">,</font>&nbsp;follow<font color="#66cc66">=</font><font color="#008000">True</font><font>&#41;</font><font color="#66cc66">,</font></li><li>&nbsp;<font>&#41;</font></li></ol></blockquote></code></pre>
        <p>rules는 이 스파이더가 크롤링할 링크의 규칙을 정의한다. LinkExtractor 에는 수집할 데이터 및 링크가 담긴 주소를 현재 도메인에 상대 주소로 적는다. 따라서 수집하려는 데이터가 담긴 페이지 링크를 정규표현식으로 적절하게 구분할 수 있어야 한다.</p>

        <p>한빛미디어의 책 정보를 보여주는 페이지는 'http://wwwhanbit.co.kr/store/books/look.php?p_code=B8463790401' 과 같은 형태이다. 여기서 도메인을 제외하면 'store/books/look.php?p_code=B8463790401' 부분이 남는다. 그리고 최종 책 정보에 해당하는 변하는 부분은 상품코드에 해당하는 'B8463790401' 부분이다.</p>
        <p>따라서 최종 해당 URL의 정규표현식은 <code>store/books/look.php\?p_code=.*</code>가 된다. 참고로 <code>?</code> 는 정규표현식에서 사용하는 특수문자 중 하나이므로 텍스트로 사용한다는걸 나타내기 위해 역슬래시(\)를 사용했다.</p>
        <p>allow에는 String이나 String List를 전달할 수 있으므로 HTTP 요청을 보내서 callback에 해당 요청을 처리할 함수를 지정하면 된다.</p>
        <p>그럼 정의된 규칙을 코드에 넣어보자. 다음과 같다.</p>
        <h5>코드9-5 규칙 설정하기 1</h5>
        <pre><code><blockquote><ol><li><font color="#808080">#&nbsp;-*-&nbsp;coding:&nbsp;utf-8&nbsp;-*-</font></li><li><font color="#ff7700">import</font>&nbsp;scrapy</li><li><font color="#ff7700">from</font>&nbsp;scrapy.<font>linkextractors</font>&nbsp;<font color="#ff7700">import</font>&nbsp;LinkExtractor</li><li><font color="#ff7700">from</font>&nbsp;scrapy.<font>spiders</font>&nbsp;<font color="#ff7700">import</font>&nbsp;CrawlSpider<font color="#66cc66">,</font>&nbsp;Rule</li><li>&nbsp;</li><li>&nbsp;</li><li><font color="#ff7700">class</font>&nbsp;BookCrawlSpider<font>&#40;</font>CrawlSpider<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;name&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">'book_crawl'</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;allowed_domains&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#91;</font><font color="#483d8b">'hanbit.co.kr'</font><font>&#93;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;start_urls&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#91;</font><font color="#483d8b">'http://hanbit.co.kr/'</font><font>&#93;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;rules&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#40;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;stre/books/look.php?p_code=B8463790401</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rule<font>&#40;</font>LinkExtractor<font>&#40;</font>allow<font color="#66cc66">=</font>r<font color="#483d8b">'store/books/look.php<font color="#000099">\?</font>p_code=.*'</font><font>&#41;</font><font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;callback<font color="#66cc66">=</font><font color="#483d8b">'parse_item'</font><font color="#66cc66">,</font>&nbsp;follow<font color="#66cc66">=</font><font color="#008000">True</font><font>&#41;</font><font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font>&#41;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;parse_item<font>&#40;</font><font color="#008000">self</font><font color="#66cc66">,</font>&nbsp;response<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><font>&#125;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;i</li></ol></blockquote></code></pre>
        <p>수정한 코드는 정규표현식 <code>store/books/look.php\?p_code=.*</code>를 만족하는 모든 링크에 <code>parse_item()</code> 함수를 실행하고, 다시 한번 해당 페이지에 재귀적으로 rules 를 적용하라는 뜻이 된다. 참고로 <code>callback='parse_item'</code>과 <code>follow=True</code>를 생략하면 정규 표현식을 만족하는 링크들을 크롤링할 대상에 넣어두기만 한다.</p>
        <p>앞의 규칙만으로 모든 책의 목록을 가져올 수는 없다. 이제 각각의 책 목록이 있는 페이지를 탐색하는 새 규칙과 시작점을 추가해보자. 이에 해당하는 한빛미디어 홈페이지의 항목은 '카테고리'이다. 카테고리에서 확인해야할 항목은 카테고리 목록의 개수와 해당 카테고리의 페이지 수이다. 이를 추출해야 그 아래에 있는 책 링크들을 얻을 수 있다.</p>
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
