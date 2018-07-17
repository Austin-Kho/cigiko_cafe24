  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article class="">
        <p>이번 장에서는 파이썬이 무엇인지, 파이썬을 활용하는 법을 배우기 전에 파이썬 그 자체를 알아본다. 파이썬의 역사부터 시작해서 조금은 어려울 수 있는 Hello World 예제까지 해보자.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">1.1. 파이썬의 역사</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>파이썬은 1991년에 귀도 반 로섬(Guido van Rossum)이 발표한 프로그래밍 언어이다. 동적 타이핑 스크립트 언어로, 이와 비교할 만한 언어라고 한다면 펄(Perl)이나 루비(Ruby) 등이 있다. 파이썬은 뱀 이름이기도 하지만 귀도는 자신이 좋아하는 '몬티 파이썬의 플라잉 서커스'에서 따왔다고 밝혔다. </p>

        <p>파이썬은 점점 발전해서 현재 프로그래밍 언어의 인기도를 조사해 공개하는 TIOVE Index(<a href="http://www.tiobe.com/tiobe-index" target="_blank">http://www.tiobe.com/tiobe-index</a>)순위에서 상위권을 유지하고 있다. 현재는 2.x와 3.x버전을 유지하고 있는데 2.x는 '2.7.x'의 형태로 지원은 하지만 새로운 기능이 추가되지 않을 예정이며, 3.x 는 향후 계속 발전할 버전이다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">1.2. 파이썬을 익히면 좋은 점</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>위키백과에서 파이썬의 특징을 다음과 같이 표현한다.</p>
        <p class="bg-success"><strong>초보자부터 전문가까지 사용자층을 보유하고 있으며, 다양한 플랫폼에서 쓸 수 있고, 라이브러리(모듈)가 풍부하여, 대학을 비롯한 여러 교육 연구 기관 및 산업계에서 이용이 증가하고 있다.</strong></p>
        <p>즉, 어떤 연구 과정에서 프로그래밍이 필요할 때 파이썬으로 쉽고 빠르게 아이디어를 실증해볼 수 있다는 의미다. 이는 강력한 IDE를 제공하며, 컴파일하지 않고 변경사항을 즉시 확인할 수 있는 장점 때문이다. </p><p>또한 수 많은 라이브러리 덕분에 C나 자바 등으로 구현하기 번거로운 각종 반복 작업을 쉽게 구현해 자동화 할 수있고 운영체제를 가리지 않는 호환성은 어떤 환경에서 파이썬으로 구현한 프로그램을 실행해도 작업에 차질이 없게 한다. 2010년대에는 프로그래밍 교육용 언어로 파이썬을 도입하고 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">1.3. 파이썬 활용이 활발한 개발 분야</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>파이썬은 다양한 분야에서 활용한다. 그 중 유명한 몇 가지 분야와 그에 맞는 라이브러리나 프레임워크를 소개한다.</p>
      </article>
    </section>
    <h4 class="sub-header">1.3.1 - 웹 애플리케이션 개발</h4>
    <section>
      <article class="">
        <p>웹 애플리케이션 분야에는 유명한 2개의 프레임워크가 있다. 하나는 플라스크(Flask, <a href="http://flask.pocoo.org" target="_blank">http://flask.pocoo.org</a>)이다. 'microframework for Python'이라는 소개글처럼 정말 간단한 웹이나 모바일 앱 서버를 만들기에 적합한 웹 프레임워크이다.</p>
        <p>또 다른 프레임워크는 장고(Django, <a href="https://www.djangoproject.com" target="_blank">https://www.djangoproject.com</a>)가 있다. 장고는 웹 사이트를 구축할 때 필요한 회원가입, 로그인, 로그아웃과 같은 각종 요소를 미리 구축해 놓았다는 장점이 있다.</p>
      </article>
    </section>

    <h4 class="sub-header">1.3.2 - 크롤링</h4>
    <section>
      <article class="">
        <p>웹페이지에서 필요한 데이터를 수집하는 것을 크롤링 이라고 한다. 검색 엔진에서 유용한 검색 결과를 내는 데는 크롤링이 큰 역할을 하며, 또한 데이터 과학에 필요한 원 데이터를 수집하는데 활용할 수 있다.</p>

        <p>파이썬에서 많이 사용하는 크롤링 라이브러리로는 <em>뷰티풀 수프(Beautiful Soup4, <a href="https://www.crummy.com/software/BeautifulSoup/" target="_blank">https://www.crummy.com/software/BeautifulSoup/</a>)</em>가 있다.프레임워크로는 <em>스크래피(scrapy, <a href="https://scrapy.org" target="_blank">https://scrapy.org</a>)</em>가 있다.</p>

        <p>뷰티풀 수프는 HTML을 파싱하는데 사용하는 라이브러리로 구문 분석, 트리 탐색, 검색과 수정을 위한 관용구를 이용해 문서를 분석하고 필요한 것을 추출한다. 애플리케이션을 작성하는데 많은 코드가 필요하지 않고, 문서 인코딩을 자동으로 UTF-8로 변환하는 등의 기능이 있댜. 또한 lxml이나 html5lib과 같은 인기 있는 파이썬 파서와 함께 사용할 수 있기도 하다.</p>

          <p>스크래피는 웹 크롤링을 지원하는 프레임워크이다. 데이터를 추출하는 규칙을 작성하면 나머지는 스크래피를 이용해 크롤링을 처리할 수 있다. 구조화되어 있는 데이터를 추출하는 데 강점이 있다. 또한 스크래피 코어를 수정하지 않고도 쉽게 새로운 기능을 연결할 수 있다.</p>
      </article>
    </section>

    <h4 class="sub-header">1.3.3 - 데이터 과학과 인공지능 개발</h4>
    <section>
      <article class="">
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
      <article class="">
        <p>이제 파이썬을 본격적으로 시작하기 위해 운영체제별로 개발환경을 설치해 보자.</p>
      </article>
    </section>

    <h4 class="sub-header">1.4.1 - 우분투</h4>
    <section>
      <article class="">
        <p>우분투는 파이썬 2.x 버전과 3.x 버전 모두 기본 탑재하고 있다. python -V 또는 python3 -V 명령으로 설치 버전을 확인할 수 있다. 설치가 필요한 경우 다음 명령으로 설치할 수 있다.</p>
        <pre><code>$ sudo apt-get install python버전 넘버</code></pre>
        <p class="bg-info"><strong>NOTE_파이썬 최신 버전이 설치되지 않았다면</strong><br>우분투 리눅스에 최신 파이썬 버전이 설치되지 않은 경우가 있다. 다음 명령으로 최신 버전을 설치하자
        <pre><code>$ sudo add-apt-repository ppa:jonathonf/python-3.x<br>$ sudo apt-get update<br>$ sudo apt-get install python3.x</code></pre>
        </p>
      </article>
    </section>
    <h4 class="sub-header">1.4.2 - macOS</h4>
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>
    <h4 class="sub-header">1.4.3 - 윈도우</h4>
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">1.5. 조금은 어려운 Hello World</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>
  </div>
