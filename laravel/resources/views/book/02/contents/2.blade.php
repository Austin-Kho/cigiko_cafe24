  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>이번 장에서는 파이썬이 무엇인지, 파이썬을 활용하는 법을 배우기 전에 파이썬 그 자체를 알아본다. 파이썬의 역사부터 시작해서 조금은 어려울 수 있는 Hello World 예제까지 해보자.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">1.1. 파이썬의 역사</h3>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬은 1991년에 귀도 반 로섬(Guido van Rossum)이 발표한 프로그래밍 언어이다. 동적 타이핑 스크립트 언어로, 이와 비교할 만한 언어라고 한다면 펄(Perl)이나 루비(Ruby) 등이 있다. 파이썬은 뱀 이름이기도 하지만 귀도는 자신이 좋아하는 '몬티 파이썬의 플라잉 서커스'에서 따왔다고 밝혔다. </p>

        <p>파이썬은 점점 발전해서 현재 프로그래밍 언어의 인기도를 조사해 공개하는 <a href="http://www.tiobe.com/tiobe-index" target="_blank">TIOVE Index</a> 순위에서 상위권을 유지하고 있다. 현재는 2.x와 3.x버전을 유지하고 있는데 2.x는 '2.7.x'의 형태로 지원은 하지만 새로운 기능이 추가되지 않을 예정이며, 3.x 는 향후 계속 발전할 버전이다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">1.2. 파이썬을 익히면 좋은 점</h3>
  <div class="chapter">
    <section>
      <article>
        <p>위키백과에서 파이썬의 특징을 다음과 같이 표현한다.</p>
        <blockquote><strong>초보자부터 전문가까지 사용자층을 보유하고 있으며, 다양한 플랫폼에서 쓸 수 있고, 라이브러리(모듈)가 풍부하여, 대학을 비롯한 여러 교육 연구 기관 및 산업계에서 이용이 증가하고 있다.</strong></blockquote>
        <p>즉, 어떤 연구 과정에서 프로그래밍이 필요할 때 파이썬으로 쉽고 빠르게 아이디어를 실증해볼 수 있다는 의미다. 이는 강력한 IDE를 제공하며, 컴파일하지 않고 변경사항을 즉시 확인할 수 있는 장점 때문이다. </p><p>또한 수 많은 라이브러리 덕분에 C나 자바 등으로 구현하기 번거로운 각종 반복 작업을 쉽게 구현해 자동화 할 수있고 운영체제를 가리지 않는 호환성은 어떤 환경에서 파이썬으로 구현한 프로그램을 실행해도 작업에 차질이 없게 한다. 2010년대에는 프로그래밍 교육용 언어로 파이썬을 도입하고 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">1.3. 파이썬 활용이 활발한 개발 분야</h3>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬은 다양한 분야에서 활용한다. 그 중 유명한 몇 가지 분야와 그에 맞는 라이브러리나 프레임워크를 소개한다.</p>
      </article>
    </section>
    <h4 class="sub-header">1.3.1 - 웹 애플리케이션 개발</h4>
    <section>
      <article>
        <p>웹 애플리케이션 분야에는 유명한 2개의 프레임워크가 있다. 하나는 플라스크(Flask, <a href="http://flask.pocoo.org" target="_blank">http://flask.pocoo.org</a>)이다. 'microframework for Python'이라는 소개글처럼 정말 간단한 웹이나 모바일 앱 서버를 만들기에 적합한 웹 프레임워크이다.</p>
        <p>또 다른 프레임워크는 장고(Django, <a href="https://www.djangoproject.com" target="_blank">https://www.djangoproject.com</a>)가 있다. 장고는 웹 사이트를 구축할 때 필요한 회원가입, 로그인, 로그아웃과 같은 각종 요소를 미리 구축해 놓았다는 장점이 있다.</p>
      </article>
    </section>

    <h4 class="sub-header">1.3.2 - 크롤링</h4>
    <section>
      <article>
        <p>웹페이지에서 필요한 데이터를 수집하는 것을 크롤링 이라고 한다. 검색 엔진에서 유용한 검색 결과를 내는 데는 크롤링이 큰 역할을 하며, 또한 데이터 과학에 필요한 원 데이터를 수집하는데 활용할 수 있다.</p>

        <p>파이썬에서 많이 사용하는 크롤링 라이브러리로는 <em>뷰티풀 수프(Beautiful Soup4, <a href="https://www.crummy.com/software/BeautifulSoup/" target="_blank">https://www.crummy.com/software/BeautifulSoup/</a>)</em>가 있다.프레임워크로는 <em>스크래피(scrapy, <a href="https://scrapy.org" target="_blank">https://scrapy.org</a>)</em>가 있다.</p>

        <p>뷰티풀 수프는 HTML을 파싱하는데 사용하는 라이브러리로 구문 분석, 트리 탐색, 검색과 수정을 위한 관용구를 이용해 문서를 분석하고 필요한 것을 추출한다. 애플리케이션을 작성하는데 많은 코드가 필요하지 않고, 문서 인코딩을 자동으로 UTF-8로 변환하는 등의 기능이 있댜. 또한 lxml이나 html5lib과 같은 인기 있는 파이썬 파서와 함께 사용할 수 있기도 하다.</p>

          <p>스크래피는 웹 크롤링을 지원하는 프레임워크이다. 데이터를 추출하는 규칙을 작성하면 나머지는 스크래피를 이용해 크롤링을 처리할 수 있다. 구조화되어 있는 데이터를 추출하는 데 강점이 있다. 또한 스크래피 코어를 수정하지 않고도 쉽게 새로운 기능을 연결할 수 있다.</p>
      </article>
    </section>

    <h4 class="sub-header">1.3.3 - 데이터 과학과 인공지능 개발</h4>
    <section>
      <article>
        <p>빅데이터, 머신러닝 등 데이터를 분석해서 활용하는 데이터 과학과 인공지능 분야는 파이썬을 굉장히 활발하게 활용하는 분야이다. 팬더스(pandas, <a href="http://pandas.pydata.org" target="_blank">http://pandas.pydata.org</a>)는 사용하기 쉬운 고성능의 데이터 구조 및 데이터 분석 도구를 제공하는 라이브러리이다.</p>

        <p>또한 NumPy와 SciPy도 유명한 데이터 분석 도구이다. NumPy(<a href="http://www.numpy.org" target="_blank">http://www.numpy.org</a>)는 과학 연구 컴퓨팅에 필요한 구성 요소가 있는 패키지이다. N차원의 배열 객체를 만든다거나 선형대수, 푸리에 변환, 난수 변환 기능 등을 포함한다.</p>

        <p>SciPy(<a href="http://www.scipy.org" target="_blank">http://www.scipy.org</a>)는 수학, 과학, 공학을 위한 오픈소스 소프트웨어 패키지이다.</p>

        <p>머신러닝에 이용하는 라이브러리로는 scikit-learn(<a href="http://scikit-learn.org" target="_blank">http://scikit-learn.org</a>)이 있다. 위에서 설명한 SciPy를 기반으로 데이터 마이닝과 머신러닝 서비스를 구현할 수 있는 파이썬 모듈이다.</p>

        <p>구글에서 만든 텐서플로(TensorFlow, <a href="https://www.tensorflow.org" target="_blank">https://www.tensorflow.org</a>)는 수학, 물리학, 통계학 등 다양한 학문 분야에서 활용할 수 있는 머신러닝 및 딥러닝 라이브러리이다, CPU/GPU에서 동작할 수 있으며 연산 구조와 함수를 정의하면 미분 계산을 처리하고 이를 그래프로 표현하는 등 복잡한 데이터 연산에 최적화 되어 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">1.4. 파이썬 개발 환경 설치</h3>
  <div class="chapter">
    <section>
      <article>
        <p>이제 파이썬을 본격적으로 시작하기 위해 운영체제별로 개발환경을 설치해 보자.</p>
      </article>
    </section>

    <h4 class="sub-header">1.4.1 - 우분투</h4>
    <section>
      <article>
        <p>우분투는 파이썬 2.x 버전과 3.x 버전 모두 기본 탑재하고 있다. <code>python -V</code> 또는 <code>python3 -V</code> 명령으로 설치 버전을 확인할 수 있다. 설치가 필요한 경우 다음 명령으로 설치할 수 있다.</p>
        <pre class="python"><code><blockquote><ol><li>$&nbsp;sudo&nbsp;apt-get&nbsp;install&nbsp;python버전&nbsp;넘버</li></ol></blockquote></code></pre>
        <p class="bg-info"><strong>NOTE_파이썬 최신 버전이 설치되지 않았다면</strong><br>우분투 리눅스에 최신 파이썬 버전이 설치되지 않은 경우가 있다. 다음 명령으로 최신 버전을 설치하자
        <pre class="python"><code><blockquote><ol><li>$&nbsp;sudo&nbsp;add-apt-repository&nbsp;ppa:jonathonf/python-3.x</li><li>$&nbsp;sudo&nbsp;apt-get&nbsp;update</li><li>$&nbsp;sudo&nbsp;apt-get&nbsp;install&nbsp;python3.x</li></ol></blockquote></code></pre>
        </p>
      </article>
    </section>
    <h4 class="sub-header">1.4.2 - macOS</h4>
    <section>
      <article>
        <p>macOS는 파이썬 2.7만 기본 탑재하고 있다. 따라서 파이썬 3은 별도로 설칳야 한다.macOS에서 파이썬을 설치할 때는 설치파일을 다운로드해서 설치하는 방법과 '<code>Homebrew</code>'라는 패키지 관리자를 이용해 설치하는 방법이 있다.</p>
        <h4>Homebrew를 이용한 파이썬 설치</h4>
        <p><code>Homebrew</code>는 macOS에서 소프트웨어를 설치하고 버전별로 관리할 수 있는 패키지 관리 시스템의 하나이다. 실무에서 파이썬을 사용할 때는 다양한 패키지나 가상환경(부록 A 참고)을 구축할 때가 많으므로 개발자라면 <code>Homebrew</code>를 이용해 파이썬을 설치하길 권한다.</p>
        <h5>그림1-1 Homebrew 홈페이지</h5>
        <img src="/img/img06.png" alt="Homebrew 홈페이지" class="bo">
        <p>터미널 실행 후 설치 소스를 복사해 붙여 넣은 후 실행하면 설치가 끝난다.</p>
        <pre class="python"><code><blockquote><ol><li>$&nbsp;/usr/bin/ruby&nbsp;-e&nbsp;&quot;$<font color="#33cc33">(</font>curl&nbsp;-fsSL&nbsp;https://raw.githubusercontent.com/Homebrew/install/master/install<font color="#33cc33">)</font>&quot;</li></ol></blockquote></code></pre>
        <p><code>Homebrew</code>를 설치하면 파이썬 설치 준비가 끝났다. 다음 명령을 터미널에서 실행하면 된다.(우분투와 달리 .x를 붙이지 않아야 한다는 점에 주의한다.)</p>
        <pre class="python"><code><blockquote><ol><li>$&nbsp;brew&nbsp;install&nbsp;python3</li></ol></blockquote></code></pre>
        <p class="bg-info"><strong>NOTE_macOS의 파이썬 설치 주의사항</strong><br>macOS에서 Homebrew나 파이썬을 설치하려먼 Xcode Command Line Tools가 설치되어 있어야 한다. 설치 필요 시 다음 명령으로 Xcode command Line Tools를 설치할 수 있다.</p>
        <pre class="python"><code><blockquote><ol><li>$&nbsp;xcode-select&nbsp;--install</li></ol></blockquote></code></pre>
        <p class="bg-info">또한 Homebrew 설치 스크립트는 변경될 가능성이 있으므로 Homebrew 홈페이지에 있는 명령어에 변화가 있는지 확인한다. 간혹 Xcode 라이선스에 동의하지 않았다면 Homebrew가 제대로 설치되지 않을 수 있다. 이 때는 아래 명령을 실행한 다음 다시 Homebrew설치 명령을 실행한다.</p>
        <pre class="python"><code><blockquote><ol><li>$&nbsp;sudo&nbsp;xcodebuild&nbsp;-license</li></ol></blockquote></code></pre>

        <h4>파이썬 설치 파일</h4>
        <p>파이썬 개발 환경 다운로드 사이트(<a href="https://www.python.org/downloads/" target="_blank">https://www.python.org/downloads/</a>)를 방문해 자신의 운영체제에 맞는 설치 파일을 다운로드 한 후 설치하면 된다. 이 책에서 활용할 3.x버전을 다운로드 한다. 설치는 [계속] 버튼을 누르면 되니 따로 설명하지 않는다.</p>
        <h5>그림1-2 파이썬 다운로드 페이지(macOS)</h5>
        <img src="/img/img07.png" alt="파이썬 다운로드 페이지(macOS)" class="bo">
      </article>
    </section>
    <h4 class="sub-header">1.4.3 - 윈도우</h4>
    <section>
      <article>
        <p>윈도우는 우분투나 macOS와는 달리 파이썬이 기본 설치되어 있지 않다. 따라서 직접 파이썬 개발환경 다운로드 사이트에서 파일을 다운로드해서 설치해야 한다. 파이썬 개발환경 다운로드 사이트(<a href="https://www.python.org/downloads/" target="_blank">https://www.python.org/downloads/</a>)에서 윈도우용 파이썬 설치파일을 다운로드 한 후 설치한다.</p>
        <p>설치할 때 꼭 [Add Python 3.x to PATH]의 체크를 켜 준다. 이렇게 하면 윈도우 명령 프롬프트나 Windows PowerShell을 실행하여 파이썬을 바로 사용할 수 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">1.5. 조금은 어려운 Hello World</h3>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬으로 무언가를 하기가 얼마나 간단한지는 다음 코드만 봐도 알 수 있다. 일단은 전통적인 Hello World, 즉 출력이다.</p>
        <h5>코드1-1 Hello World</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:</li><li><font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Hello&nbsp;World!'</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:</li><li>Hello&nbsp;World<font color="#66cc66">!</font></li></ol></blockquote></code></pre>
        <p>파이썬의 철학 중 하나는 '건전지 포함(Batteries included)'이라는 개념이다. 여러 가지 기본 라이브러리들을 포함시켜 별도로 찾지 않아도 바로 사용할 수 있게 하자는 것이다. 참고로 기본 제공하는 표준 라이브러리 목록은 '<a href="https://docs.python.org/3/library/index.html" target="_blank">The Python Standard Library</a>'에서 확인할 수 있다.</p>
        <p class="bg-success"><strong>NOTE_ 이 책의 코드 표기 방식</strong><br>이 책의 예제는 터미널이나 파이썬 셸에서 py 파일을 실행하면 좋은 예제와 부록 B에서 설명하는 Jupyter Notebook에서 실행하면 좋은 예제가 있다. 후자의 경우 코드 부분 위에 In[숫자]:를, 출력 결과 부분 위에는 Out[숫자]: 형태로 표기한다. Jupyter Notebook의 자세한 사용법은 해당 부록을 참고하자.</p>
      </article>
    </section>

    <h4 class="sub-header">1.5.1 - 입력과 출력</h4>
    <section>
      <article>
        <p>100번의 설명보다 한 번의 코드가 더 좋은 법이다. 입력을 받은 후 해당 내용을 출력하는 간단한 파이썬 코드를 소개한다.</p>
        <h5>코드1-2 입력을 받은 후 출력</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li>user_name&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">input</font><font>&#40;</font><font color="#483d8b">&quot;Please&nbsp;input&nbsp;Your&nbsp;name:&nbsp;&quot;</font><font>&#41;</font></li><li>user_number&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">input</font><font>&#40;</font><font color="#483d8b">&quot;Please&nbsp;input&nbsp;your&nbsp;favorite&nbsp;number:&nbsp;&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;%s's&nbsp;favorite&nbsp;number&nbsp;is&nbsp;%d&quot;</font>%<font>&#40;</font>user_name<font color="#66cc66">,</font>&nbsp;<font color="#008000">int</font><font>&#40;</font>user_number<font>&#41;</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li>Please&nbsp;<font color="#008000">input</font>&nbsp;Your&nbsp;name:&nbsp;Miku</li><li>Please&nbsp;<font color="#008000">input</font>&nbsp;your&nbsp;favorite&nbsp;number:&nbsp;<font color="#ff4500">39</font></li><li>Miku<font color="#483d8b">'s&nbsp;favorite&nbsp;number&nbsp;is&nbsp;39</font></li></ol></blockquote></code></pre>
        <p>조금 더 나아가서 파일을 읽고 쓰는 것을 해보자. 예제 파일 ch01 디렉터리 안에 있는 test.csv 파일을 이용한다. 파일 안에는 0~9의 숫자가 열 하나에 입력되어 있다.</p>

        <h5>코드1-3 파일 읽고 쓰기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:</li><li>infile_name&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">input</font><font>&#40;</font><font color="#483d8b">&quot;Please&nbsp;input&nbsp;file&nbsp;name:&nbsp;&quot;</font><font>&#41;</font></li><li>outfile_name&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;out.log&quot;</font></li><li>&nbsp;</li><li><font color="#ff7700">with</font>&nbsp;<font color="#008000">open</font><font>&#40;</font>infile_name<font>&#41;</font>&nbsp;<font color="#ff7700">as</font>&nbsp;infile:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">with</font>&nbsp;<font color="#008000">open</font><font>&#40;</font>outfile_name<font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;W&quot;</font><font>&#41;</font>&nbsp;<font color="#ff7700">as</font>&nbsp;outfile:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">for</font>&nbsp;in_line&nbsp;<font color="#ff7700">in</font>&nbsp;infile.<font>readlines</font><font>&#40;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;outfile.<font>write</font><font>&#40;</font><font color="#483d8b">&quot;read&nbsp;from&nbsp;'%s'&nbsp;:&nbsp;%s&quot;</font>%<font>&#40;</font>infile_name<font color="#66cc66">,</font>&nbsp;in_line<font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:</li><li>Please&nbsp;<font color="#008000">input</font>&nbsp;<font color="#008000">file</font>&nbsp;name:&nbsp;<font color="#dc143c">test</font>.<font color="#dc143c">csv</font></li></ol></blockquote></code></pre>
        <p>입력 파일을 test.csv라고 입력하면 출력 파일을 out.log라고 생성되며 다음과 같은 출력 내용을 저장한다.</p>
        <pre class="python"><code><blockquote><ol><li>read&nbsp;<font color="#ff7700">from</font>&nbsp;<font color="#483d8b">'test.csv'</font>&nbsp;:&nbsp;<font color="#ff4500">0</font></li><li>read&nbsp;<font color="#ff7700">from</font>&nbsp;<font color="#483d8b">'test.csv'</font>&nbsp;:&nbsp;<font color="#ff4500">1</font></li><li>read&nbsp;<font color="#ff7700">from</font>&nbsp;<font color="#483d8b">'test.csv'</font>&nbsp;:&nbsp;<font color="#ff4500">2</font></li><li>read&nbsp;<font color="#ff7700">from</font>&nbsp;<font color="#483d8b">'test.csv'</font>&nbsp;:&nbsp;<font color="#ff4500">3</font></li><li>read&nbsp;<font color="#ff7700">from</font>&nbsp;<font color="#483d8b">'test.csv'</font>&nbsp;:&nbsp;<font color="#ff4500">4</font></li><li>read&nbsp;<font color="#ff7700">from</font>&nbsp;<font color="#483d8b">'test.csv'</font>&nbsp;:&nbsp;<font color="#ff4500">5</font></li><li>read&nbsp;<font color="#ff7700">from</font>&nbsp;<font color="#483d8b">'test.csv'</font>&nbsp;:&nbsp;<font color="#ff4500">6</font></li><li>read&nbsp;<font color="#ff7700">from</font>&nbsp;<font color="#483d8b">'test.csv'</font>&nbsp;:&nbsp;<font color="#ff4500">7</font></li><li>read&nbsp;<font color="#ff7700">from</font>&nbsp;<font color="#483d8b">'test.csv'</font>&nbsp;:&nbsp;<font color="#ff4500">8</font></li><li>read&nbsp;<font color="#ff7700">from</font>&nbsp;<font color="#483d8b">'test.csv'</font>&nbsp;:&nbsp;<font color="#ff4500">9</font></li></ol></blockquote></code></pre>
        <p>즉, [코드1-3]은 입력받은 파일을 열어서 한 줄마다 "read from 'test.csv' :"라는 메시지를 덧붙여서 새로운 파일을 만드는 프로그램이다. 여기서는 단순히 메시지를 복사했지만 사용자가 원하는 바에 따라서 중간에 다양한 계산을 할 수도 있을 것이다.</p>
      </article>
    </section>
  </div>
