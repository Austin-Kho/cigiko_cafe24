  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>이 장에서는 함수나 클래스를 묶어 누구나 사용할 수 있는 형태로 만드는 모듈과 패키지를 살펴본다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">7.1. 모듈</h3>
  <div class="chapter">
    <section>
      <article>
        <p>누군가 이미 만든 것을 새로 만드는 것 보다는 그냥 가져다 쓰는 것이 효율적이다. 이럴 때 필요한 게 바로 모듈이다.</p>
      </article>
    </section>

    <h4 class="sub-header">7.1.1 - 모듈 만들기</h4>
    <section>
      <article>
        <p>모듈을 만드는건 간단히 딱 세 단계만 실행하면 된다.</p>
        <ol>
          <li>에디터를 연다.</li>
          <li>파이썬 코드를 작성한다.</li>
          <li>저장한다.</li>
        </ol>
        <p>다음 예제를 <code>diva.py</code>라은 이름의 파일을 생성하고 작성해 보자.</p>
        <h5>코드7-1 <code>diva.py</code></h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:</li><li><font color="#808080">#&nbsp;Jupyter&nbsp;Notebook에서&nbsp;diva.py&nbsp;파일을&nbsp;만들려면&nbsp;다음&nbsp;매직&nbsp;명령어를&nbsp;실행합니다.</font></li><li>%%writefile&nbsp;diva.<font>py</font></li><li><font color="#808080">#&nbsp;-*-&nbsp;coding:&nbsp;utf8&nbsp;-*-</font></li><li><font color="#ff7700">class</font>&nbsp;Singer:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;<font color="#0000cd">__init__</font><font>&#40;</font><font color="#008000">self</font><font color="#66cc66">,</font>&nbsp;name<font color="#66cc66">=</font><font color="#483d8b">&quot;Miku&quot;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">self</font>.<font>name</font>&nbsp;<font color="#66cc66">=</font>&nbsp;name</li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;song<font>&#40;</font>title<font color="#66cc66">=</font><font color="#483d8b">&quot;No&nbsp;name&quot;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Sing&nbsp;the&nbsp;&quot;</font><font color="#66cc66">,</font>&nbsp;title<font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:</li><li>Writing&nbsp;diva.<font>py</font></li></ol></blockquote></code></pre>
        <p><code>diva.py</code> 라는 파일은 현재 작업중인 곳과 같은 곳에 저장했다. 이 파일은 곧 파이썬 모듈이 된다. 그리고 이 모듈의 이름이 <code>diva</code>가 되는 것이다. 이제부터 위 예제의 <code>diva</code> 모듈에 정의되어 있는 <code>Singer</code> 클래스와 <code>song()</code> 메서드를 가져다 사용하는 법을 알아본다.</p>
      </article>
    </section>

    <h4 class="sub-header">7.1.2 - 모듈 불러오기</h4>
    <section>
      <article>
        <p>7.1.1에서 살펴본 <code>diva</code> 모듈을 사용하려면 코드에 <code>import diva</code>라고 선언하면 된다. 이렇게 가져온 모듈 안의 함수 사용은 클래스에서 함수를 불러다 사용하는 것만큼이나 간단하다.</p>
        <h5>코드7-2 <code>diva</code> 모듈을 이용한 <code>song()</code> 메서드 실행</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li><font color="#ff7700">import</font>&nbsp;diva</li><li>&nbsp;</li><li>diva.<font>Singer</font>.<font>song</font><font>&#40;</font><font color="#483d8b">&quot;Weekend&nbsp;Girl&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li>Sing&nbsp;the&nbsp;Weekend&nbsp;Girl</li></ol></blockquote></code></pre>
        <p>[코드7-2]처럼 &lt;모듈이름>.&lt;함수이름>으로 모듈 안에 정의된 함수를 가져다 사용할 수 있다. 물론 함수 뿐 아니라 클래스도 사용할 수 있다.</p>
        <p>앞 파일에 정의 된 클래스 <code>Singer</code>를 사용해 보자.</p>
        <h5>코드7-3 <code>Singer</code> 클래스 사용</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:</li><li>singer&nbsp;<font color="#66cc66">=</font>&nbsp;diva.<font>Singer</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">print</font><font>&#40;</font>singer.<font>name</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:</li><li>miku</li></ol></blockquote></code></pre>
        <p>클래스를 사용하는 것처럼 '<code>.</code>'을 이용해 모듈 내부의 클래스, 함수, 변수에 접근할 수 있다.</p>
      </article>
    </section>

    <h4 class="sub-header">7.1.3 - 특정 함수나 클래스만 불러오기</h4>
    <section>
      <article>
        <p>때로는 모듈 전체가 아니라 일부분만 필요한 상황도 있다. 이럴 땐 <code>from &lt;모듈이름> import &lt;함수이름></code>을 이용하면 된다. 먼저 <code>calcuater.py</code>라고 만든 <code>calculater</code> 모듈을 살펴보자.</p>
        <h5>코드7-4 <code>calculater</code> 모듈</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">4</font><font>&#93;</font>:</li><li>%%writerfile&nbsp;calcuater.<font>py</font></li><li><font color="#808080">#&nbsp;-*-&nbsp;coding:&nbsp;utf-8&nbsp;-*-</font></li><li><font color="#ff7700">def</font>&nbsp;add<font>&#40;</font>l<font color="#66cc66">,</font>&nbsp;r<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;l&nbsp;+&nbsp;r</li><li>&nbsp;</li><li><font color="#ff7700">def</font>&nbsp;mul<font>&#40;</font>l<font color="#66cc66">,</font>&nbsp;r<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;l&nbsp;*&nbsp;r</li><li>&nbsp;</li><li><font color="#ff7700">def</font>&nbsp;div<font>&#40;</font>l<font color="#66cc66">,</font>&nbsp;r<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;l&nbsp;/&nbsp;r</li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">4</font><font>&#93;</font>:</li><li>Writing&nbsp;calculater.<font>py</font></li></ol></blockquote></code></pre>
        <p><code>add()</code>, <code>mul()</code>, <code>div()</code>라는 함수 3개가 있다. 여기서 <code>add()</code>함수만 가져다 사용하는 코드는 다음과 같다.</p>
        <h5>코드7-5 <code>calculater</code> 모듈의 <code>add()</code> 함수만 사용</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">5</font><font>&#93;</font>:</li><li><font color="#ff7700">from</font>&nbsp;calculater&nbsp;<font color="#ff7700">import</font>&nbsp;add</li><li>&nbsp;</li><li><font color="#ff7700">print</font><font>&#40;</font>add<font>&#40;</font><font color="#ff4500">3</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">9</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:</li><li><font color="#ff4500">12</font></li></ol></blockquote></code></pre>
        <p>해당 모듈 중 지정한 함수 하나만 들어오게 되므로 calculater.add() 형식으러 사용하지 않아야 한다.</p>

        <p><strong><code>from calculater import *</code></strong> 처럼 해당 모듈의 모든 내용을 가져오면서 모듈 이름을 호출할 때 모듈명 없이 함수명만 호출할 수도 있다. 그러나 <code>import calculater</code> 로 호출한 후 <code>모듈명.함수()</code> 형식으로 불러오는 것이 코드의 내용을 이해하기 더 쉽다.</p>
      </article>
    </section>

    <h4 class="sub-header">7.1.4 - 다른 이름으로 모듈 불러오기</h4>
    <section>
      <article>
        <p>사용하려는 모듈이나 모듈 내부의 함수 이름이 매우 긴 경우가 있다. 이럴 때 다른 이름으로 불러올 수 있다. 우선 [코드7-6]을 <code>thisIsVeryLongNameModule</code> 이라는 모듈로만들었다고 생각해보자.</p>
        <h5>코드7-6 thisIsVeryLongNameModule.py</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">6</font><font>&#93;</font>:</li><li>%%writefile&nbsp;thisIsVeryLongNameModule.<font>py</font></li><li><font color="#808080">#&nbsp;-*-&nbsp;coding:&nbsp;utf-8&nbsp;-*-</font></li><li><font color="#ff7700">def</font>&nbsp;hello<font>&#40;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Hello!&nbsp;I&nbsp;am&nbsp;hello&nbsp;function&nbsp;in&nbsp;thisIsVeryLongNameModule!&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">6</font><font>&#93;</font>:</li><li>Writing&nbsp;thisIsVeryLongNameModule.<font>py</font></li></ol></blockquote></code></pre>
        <p><code>thisIsVeryLongNameModule</code> 은 이름이 매우 길대 매번 이 모듈을 사용할 때마다 긴 이름을 입력하자면 번거롭다. 그럴 때는 다음과 같이 불러오면 된다.</p>
        <h5>코드7-7 모듈 이름 줄이기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">7</font><font>&#93;</font>:</li><li><font color="#ff7700">import</font>&nbsp;thisIsVeryLongNameModule&nbsp;<font color="#ff7700">as</font>&nbsp;<font color="#008000">long</font></li><li>&nbsp;</li><li><font color="#008000">long</font>.<font>hello</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">7</font><font>&#93;</font>:</li><li>Hello<font color="#66cc66">!</font>&nbsp;I&nbsp;am&nbsp;hello&nbsp;function&nbsp;<font color="#ff7700">in</font>&nbsp;thisIsVeryLongNameModule<font color="#66cc66">!</font></li></ol></blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">7.1.5 - 모듈 실행하기</h4>
    <section>
      <article>
        <p>각 모듈은 셸에서 일반적인 <code>python</code> 명령을 입력해 사용할 수 있다.</p>
        <pre><code>$ python &lt;모듈이름>.py &lt;옵션></code></pre>
        <p>모듈은 보통 불러올 때 전체가 실행된다. 하지만 [코드7-8]처럼 if 문을 추가해 해당 모듈이 스크립트로 실행될 때만 동작하는 코드를 집어 넣으면 모듈을 스크립트처럼 사용할 수 있다.</p>
        <h5>코드7-8 runable.py</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">8</font><font>&#93;</font>:</li><li>%%writefile&nbsp;runable.<font>py</font></li><li><font color="#808080">#&nbsp;-*-&nbsp;coding:&nbsp;utf-8&nbsp;-*-</font></li><li><font color="#ff7700">def</font>&nbsp;hello<font>&#40;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Hello!&nbsp;I&nbsp;am&nbsp;runable&nbsp;module!&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">if</font>&nbsp;__name__&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">&quot;__main__&quot;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Odd&nbsp;and&nbsp;End&quot;</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;hello<font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">8</font><font>&#93;</font>:</li><li>Writing&nbsp;runable.<font>py</font></li><li>&nbsp;</li><li>In<font>&#91;</font><font color="#ff4500">9</font><font>&#93;</font>:</li><li><font color="#808080">#&nbsp;모듈을&nbsp;실행하는&nbsp;매직&nbsp;명령어입니다.</font></li><li>%run&nbsp;runable.<font>py</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">9</font><font>&#93;</font>:</li><li>Odd&nbsp;<font color="#ff7700">and</font>&nbsp;End</li><li>Hello<font color="#66cc66">!</font>&nbsp;I&nbsp;am&nbsp;runable&nbsp;module<font color="#66cc66">!</font></li></ol></blockquote></code></pre>
        <p>위 예제는 <code>__name__</code>을 검사해서 "<code>__main__</code>"과 같은지 확인한 후, 같으면 출력하게 한다. 정말 간단한 해결책이다. 앞 <code>runable</code> 모듈은 단독으로 사용하면 모듈 내부에 정의된 <code>hello()</code>를 실행한다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">7.2. 패키지</h3>
  <div class="chapter">
    <section>
      <article>
        <p>모듈들을 하나로 묶을 필요성 때문에 등장한 것이 패키지이다. 말 그대로 부품(모듈)들을 모아서 하나의 포장 용기(패키지)에 담아 두는 것이다.</p>
        <p>당연히 패키지는 모듈 혹은 다른 패키지를 포함할 수 있다.</p>
      </article>
    </section>

    <h4 class="sub-header">7.2.1 - 패키지 만들기</h4>
    <section>
      <article>
        <p>패키지 만들기를 한 줄로 요약하면 다음과 같다.</p>
        <blockquote><code>__init__.py</code> 파일을 어떤 디렉터리 안에 넣으면 해당 디렉터리는 패키지가 된다.</blockquote>
        <p>즉, 패키지는 모듈을 갖는 디렉터리이다. 다음 디렉터리 구조를 보면 vacaloids 라는 디렉터리 안에 9개의 py 파일이 있는 것을 볼 수 있다.</p>
        <pre><code><blockquote><ol><li>vocaloids/</li><li>├──&nbsp;__init__.py</li><li>├──&nbsp;hatsuneMiku.py</li><li>├──&nbsp;kagamineRen.py</li><li>├──&nbsp;kagamineRin.py</li><li>├──&nbsp;kaito.py</li><li>├──&nbsp;megpoid.py</li><li>├──&nbsp;megurineLuka.py</li><li>├──&nbsp;meiko.py</li><li>└──&nbsp;seeu.py</li><li>&nbsp;</li><li>0&nbsp;directories,&nbsp;9&nbsp;files</li></ol></blockquote></code></pre>
        <p>이 9개의 파일 중 __init__.py 를 제외한 모든 파이썬 파일들은 모듈이다. 남은 __init__.py 가 해당 디렉터리를 패키지로 인식될 수 있게 해준다. 즉, 클래스 내부에서 <code>__init__()</code> 메서드가 해당 클래스를 초기화 시켜주는 것처럼 패키지 내부의 __init__.py 는 해당 디렉터리를 패키지로 인식하도록 초기화시켜 준다고 할 수있다.</p>

        <p>또한 패키지는 다른 패키지를 포함할 수 있다. 다음과 같은 구조가 될 수 있다.</p>
        <pre><code><blockquote><ol><li>overwatch/</li><li>├──&nbsp;__init__.py</li><li>├──&nbsp;defense</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;__init__.py</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;bastion.py</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;hanzo.py</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;junkrat.py</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;mei.py</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;torbjorn.py</li><li>│&nbsp;&nbsp;&nbsp;└──&nbsp;widowmaker.py</li><li>├──&nbsp;offense</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;__init__.py</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;genji.py</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;mccree.py</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;pharah.py</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;reaper.py</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;soldier.py</li><li>│&nbsp;&nbsp;&nbsp;└──&nbsp;tracer.py</li><li>├──&nbsp;support</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;__init__.py</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;ana.py</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;lucio.py</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;mercy.py</li><li>│&nbsp;&nbsp;&nbsp;├──&nbsp;symmetra.py</li><li>│&nbsp;&nbsp;&nbsp;└──&nbsp;zenyatta.py</li><li>└──&nbsp;tank</li><li>&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;__init__.py</li><li>&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;dva.py</li><li>&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;reinhardt.py</li><li>&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;roadhog.py</li><li>&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;winston.py</li><li>&nbsp;&nbsp;&nbsp;&nbsp;└──&nbsp;zarya.py</li><li>&nbsp;</li><li>4&nbsp;directories,&nbsp;27&nbsp;files</li></ol></blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">7.2.2 - 패키지 불러오기</h4>
    <section>
      <article>
        <p>패키지를 불러오는 방법은 모듈을 불러오는 방법과 같다. 다음 형식처럼 '.'을 이용해서 불러올 수 있다.</p>
        <pre class="python"><code><blockquote><ol><li><font color="#ff7700">import</font>&nbsp;<font color="#66cc66">&lt;</font>패키지이름<font color="#66cc66">&gt;</font>.<font color="#66cc66">&lt;</font>패키지/모듈이름<font color="#66cc66">&gt;</font>.<font color="#66cc66">&lt;</font>함수/클래스이름<font color="#66cc66">&gt;</font></li></ol></blockquote></code></pre>
        <p>사용 예는 다음과 같다.</p>
        <h5>코드7-9 패키지 불러오기 예</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#ff7700">from</font>&nbsp;vacaloids&nbsp;<font color="#ff7700">import</font>&nbsp;hatsuneMiku</li><li>&nbsp;</li><li><font color="#ff7700">import</font>&nbsp;overwatch</li><li><font color="#ff7700">import</font>&nbsp;overwatch.<font>defence</font>.<font>bastion</font></li><li>&nbsp;</li><li><font color="#ff7700">from</font>&nbsp;overwatch&nbsp;<font color="#ff7700">import</font>&nbsp;tank</li><li><font color="#ff7700">from</font>&nbsp;overwatch.<font>support</font>&nbsp;<font color="#ff7700">import</font>&nbsp;zenyatta</li><li><font color="#ff7700">from</font>&nbsp;overwatch.<font>offense</font>.<font>reaper</font>&nbsp;<font color="#ff7700">import</font>&nbsp;*</li></ol></blockquote></code></pre>
        <p>7.1에서 설명한 것처럼 <code>from</code>과 <code>import</code>를 이용해 원하는 모듈만을 가져오거나, 해당 모듈의 클래스나 함수들을 전부 가져올 수 있다.</p>

        <p>때로는 같은 패키지 않에서 다른 패키지나 모듈을 가져와야 할 상황이 있다. 그럴 때는 기존에 설명했던 '<code>.</code>'은 물론이고 '<code>..</code>'등을 사용할 수 있다. 예를 들어 <code>overwatch.tank.zarya</code> 모듈에서 다른 모듈을 가져오려면 다음처럼 하면 된다.</p>
        <h5>7-10 패키지 안 다른 패키지나 모듈 가져오기</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;현재&nbsp;패키지&nbsp;내부에&nbsp;있는&nbsp;모듈을&nbsp;가져올&nbsp;때</font></li><li><font color="#ff7700">from</font>&nbsp;.&nbsp;<font color="#ff7700">import</font>&nbsp;dva</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;한&nbsp;단계&nbsp;위(overwatch)에서&nbsp;접근&nbsp;가능한&nbsp;패키지/모듈을&nbsp;가져올&nbsp;때</font></li><li><font color="#ff7700">from</font>&nbsp;..&nbsp;<font color="#ff7700">import</font>&nbsp;support.<font>zenyatta</font></li></ol></blockquote></code></pre>
        <p>이 장에서 설명한 모듈과 패키지는 파이썬으로 프로그래밍할 때 빈번하게 사용한다. 잘 기억해 두어야 한다.</p>
      </article>
    </section>
  </div>