  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>이 장에서는 파이썬의 특징을 알아본다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">2.1. 파이썬 코드가 말하는 파이썬의 특징</h3>
  <div class="chapter">
    <section>
      <article>
        <p><a href="https://ko.wikipedia.org/wiki/파이썬" target="_blank">위키백과</a>에서는 파이썬을 다음과 같이 정의 한다.</p>
        <blockquote><strong>플랫폼 독립적이며 인터프리터 방식, 객체지향적, 동적 타이핑(dynamically typed) 대화형 언어</strong></blockquote>
        <p>파이썬을 가장 잘 나타내는 것이 있다면, '<a href="https://www.python.org/dev/peps/pep-0020" target="_blank">The Zen of Python</a>'이라고 하는 문서일 것이다. 이 문서는 19줄의 짧은 문장으로 파이썬을 사용하는 사람들이 추구해야 할 가치를 명쾌하게 이야기 하고 있다. 그 일부를 인용해 보자.</p>
        <ul>
          <li>Beutiful is better than ugly. (추한 것보다는 예쁜 것이 좋다.)</li>
          <li>Explicit is better than implicit. (모호함보다는 명쾌함이 좋다.)</li>
          <li>Simple is better than complex. (복잡함보다는 단순함이 좋다.)</li>
          <li>Readability counts. (가독성에 신경 써야 한다.)</li>
          <li>There should be one-- and preferably only one --obvious way to do it. (선호할 수 있는 확실한 방법이 있어야 한다.)</li>
        </ul>
        <p>즉, 보거나 읽기 좋고, 명시적이고, 간단하고, 누가 생각해도 같은 방법에 다다를 수 있게 작성하는 것을 장려하는 것이 파이썬이다. Zen of Python은 파이썬 콘솔에서 <code>import this</code>라고 입력해도 볼 수 있다.</p>
        <h5>코드2-1 Zen of Python</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:</li><li><font color="#ff7700">import</font>&nbsp;this</li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:</li><li>The&nbsp;Zen&nbsp;of&nbsp;Python<font color="#66cc66">,</font>&nbsp;by&nbsp;Tim&nbsp;Peters</li><li>&nbsp;</li><li>Beautiful&nbsp;is&nbsp;better&nbsp;than&nbsp;ugly.</li><li>Explicit&nbsp;is&nbsp;better&nbsp;than&nbsp;implicit.</li><li>Simple&nbsp;is&nbsp;better&nbsp;than&nbsp;complex.</li><li>Complex&nbsp;is&nbsp;better&nbsp;than&nbsp;complicated.</li><li>Flat&nbsp;is&nbsp;better&nbsp;than&nbsp;nested.</li><li>Sparse&nbsp;is&nbsp;better&nbsp;than&nbsp;dense.</li><li>Readability&nbsp;counts.</li><li>Special&nbsp;cases&nbsp;aren't&nbsp;special&nbsp;enough&nbsp;to&nbsp;break&nbsp;the&nbsp;rules.</li><li>Although&nbsp;practicality&nbsp;beats&nbsp;purity.</li><li>Errors&nbsp;should&nbsp;never&nbsp;pass&nbsp;silently.</li><li>Unless&nbsp;explicitly&nbsp;silenced.</li><li>In&nbsp;the&nbsp;face&nbsp;of&nbsp;ambiguity,&nbsp;refuse&nbsp;the&nbsp;temptation&nbsp;to&nbsp;guess.</li><li>There&nbsp;should&nbsp;be&nbsp;one--&nbsp;and&nbsp;preferably&nbsp;only&nbsp;one&nbsp;--obvious&nbsp;way&nbsp;to&nbsp;do&nbsp;it.</li><li>Although&nbsp;that&nbsp;way&nbsp;may&nbsp;not&nbsp;be&nbsp;obvious&nbsp;at&nbsp;first&nbsp;unless&nbsp;you're&nbsp;Dutch.</li><li>Now&nbsp;is&nbsp;better&nbsp;than&nbsp;never.</li><li>Although&nbsp;never&nbsp;is&nbsp;often&nbsp;better&nbsp;than&nbsp;*right*&nbsp;now.</li><li>If&nbsp;the&nbsp;implementation&nbsp;is&nbsp;hard&nbsp;to&nbsp;explain,&nbsp;it's&nbsp;a&nbsp;bad&nbsp;idea.</li><li>If&nbsp;the&nbsp;implementation&nbsp;is&nbsp;easy&nbsp;to&nbsp;explain,&nbsp;it&nbsp;may&nbsp;be&nbsp;a&nbsp;good&nbsp;idea.</li><li>Namespaces&nbsp;are&nbsp;one&nbsp;honking&nbsp;great&nbsp;idea&nbsp;--&nbsp;let's&nbsp;do&nbsp;more&nbsp;of&nbsp;those!</li></ol></blockquote></code></pre>
      </article>
    </section>
  </div>

  <h3 class="sub-header">2.2. 들여쓰기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>C와 같은 다른 언어는 들여쓰기가 문법과 상관 없이 코드의 흐름일 이해하기 편하도록 정해진 약속에 불과한데 반해, 파이썬에서는 들여쓰기가 문법의 일부이다. 같은 깊이만큼 들여쓰기가 되어 있다면 같은 레벨의 블록으로 인식한다.</p>
        <h5>코드2-2 들여쓰기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li><font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;World&nbsp;is&nbsp;mine&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li>You&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;Miku&quot;</font></li><li>&nbsp;</li><li><font color="#ff7700">if</font>&nbsp;You&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">&quot;Miku&quot;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;39!&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">def</font>&nbsp;working<font>&#40;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#008000">False</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li>World&nbsp;<font color="#ff7700">is</font>&nbsp;mine</li><li><font color="#ff4500">39</font><font color="#66cc66">!</font></li></ol></blockquote></code></pre>

        <p>위키백과에는 코드의 들여쓰기 스타일을 설명하는 개별문서인 <a href="https://en.wikipedia.org/wiki/indent_style" target="_blank">Indent style</a>이라는 문서가 있을 만큼 개발자들의 들여쓰기 스타일은 제각각이다. 하지만 파이썬은 가독성에 신경써야 한다는 디자인 철학에 따르기 위해 명시적인 블록 구분법으로 들여쓰기를 적용했고, 이로써 사람이 읽기 쉬운 코드를 지향한다.</p>
        <h5>코드2-3 for 문과 if-else 문의 들여쓰기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:</li><li><font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#008000">range</font><font>&#40;</font><font color="#ff4500">10</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">if</font>&nbsp;i&nbsp;%&nbsp;<font color="#ff4500">2</font>&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">0</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>i&nbsp;**&nbsp;<font color="#ff4500">2</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">else</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">if</font>&nbsp;i&nbsp;<font color="#66cc66">&lt;</font>&nbsp;<font color="#ff4500">5</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Under&nbsp;5!&quot;</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">else</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Over&nbsp;5!&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:</li><li><font color="#ff4500">0</font></li><li>Under&nbsp;<font color="#ff4500">5</font><font color="#66cc66">!</font></li><li><font color="#ff4500">4</font></li><li>Under&nbsp;<font color="#ff4500">5</font><font color="#66cc66">!</font></li><li><font color="#ff4500">16</font></li><li>Over&nbsp;<font color="#ff4500">5</font><font color="#66cc66">!</font></li><li><font color="#ff4500">36</font></li><li>Over&nbsp;<font color="#ff4500">5</font><font color="#66cc66">!</font></li><li><font color="#ff4500">64</font></li><li>Over&nbsp;<font color="#ff4500">5</font><font color="#66cc66">!</font></li></ol></blockquote></code></pre>
        <p>따라서 파이썬은 C나 자바 등에서 발생하는 괄호 위치 논쟁이 발생하지 않는다. 모두가 같은 모양으로 코드를 작성할 수 있으므로 다른 사람의 코드를 읽기 쉬워진다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">2.3. 세미콜론 없음</h3>
  <div class="chapter">
    <section>
      <article>
        <p>기존의 다른 프로그래밍 언어, 특히 세미콜론으로 구문(statement)을 구분하는 C나 자바의 경우 원칙적으로는 한 줄에 여러 개의 구문이 들어갈 수 있다.(위키백과에서는 'One-Liner-program'이라고 말하기도 한다.)</p>
        <p>파이썬은 구문을 구분할 때 확실하게 보이는 명시적인 한 행을 사용한다. 들여쓰기와 같은 맥락이다. 기술적으로 타 언어의 세미콜론이 파이썬에서 한 행과 같다.</p>

        <p>그런데 세미콜론을 사용해야 하는 경우도 있다. 이런 경우 다음 코드처럼 사용한다.</p>
        <h5>코드2-4 파이썬에서 세미콜론 사용</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#ff7700">if</font>&nbsp;grade&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">5</font>&nbsp;:&nbsp;a&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">1</font><font color="#66cc66">;</font>&nbsp;b&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">2</font><font color="#66cc66">;</font>&nbsp;c&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">3</font><font color="#66cc66">;</font></li></ol></blockquote></code></pre>
        <p>간혹 한 행의 내용이 간단해서 코드 가독성에 큰 무리가 없는 경우라면 이런 방식으로 코드를 작성해도 괜찮다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">2.4. 인터랙티브 인터프리터</h3>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬은 스크립트 언어이다. C나 자바와는 달리 파이썬은 실행되는 순간에 코드를 읽어 들이면서 컴파일하는 JIT(Just In Time)방식을 사용한다. 이를 지원하기 위해 파이썬에서는 인터렉티브 인터프리터를 제공한다. 이를 이용해서 한 줄 한 줄 코드를 실행해 볼 수 있다. 유닉스 셸이나, 윈도우 명령 프롬프트에서 어떤 명령을 입력하면 바로 실행되는 것과 같다.</p>
        <h5>그림2-1 인터렉티브 인터프리터</h5>
        <img src="/img/img09.png" alt="인터렉티브 인터프리터">
        <p>이는 코드가 변경될 때마다 컴파일해야 할 필요가 없다는 것이고, 곧바로 변경 결과를 확인할 수 있다는 의미이다. 따라서 개발 과정에 상당한 속도 향상을 가져다 준다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">2.5. py 파일 실행</h3>
  <div class="chapter">
    <section>
      <article>
        <p>앞서 설명한 인터랙티브 인터프리터는 협업하거나 일정 규모 이상의 프로젝트를 진행할 때에는 비효율적일 때도 많다. 즉, 인터랙티브 인터프리터를 사용해서 개발할 수 있는 상황이 아닐 때도 있다는 말이다. 파이썬 코드는 py라는 확장자의 파일로 저장할 수 있으며, 파이썬 인터프리터는 해당 확장자로 된 파일을 곧바로 파이썬 코드로 인식할 수 있다. 그리고 커맨드 라인에서 파이썬을 실행시킬 때 인수로 py파일을 전달 하는 것, 즉 <code>python 파일이름.py</code>라는 명령을 실행하면, 파이썬 인터프리터는 해당 파일 안의 코드를 실행한다.</p>
        <p>py 파일을 만드는 방법은 파이썬에서 제공하는 IDLE 라는 에디터 또는 다른 에디터를 사용해서 만들 수 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">2.6. py 파일 인코딩</h3>
  <div class="chapter">
    <section>
      <article>
        <p>원래 파이썬이 처음 등장했을 때 기본 파일 인코딩은 아스키(ASCII)였다. 하지만 아스키는 다양한 언어를 표현하는데 문제가 있어서 파이썬 2.0부터 UTF-8을 지원하기 시작했다. 하지만 UTF-8이 기본 인코딩이 아니었고, UTF-8을 지원하려면 다음과 같은 코드를 사용해야 했다.</p>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;UTF-8&nbsp;인코딩&nbsp;지정</font></li><li><font color="#808080">#&nbsp;-*-&nbsp;coding:&nbsp;utf-8&nbsp;-*-</font></li></ol></blockquote></code></pre>
        <p>파이썬은 3.x 버전부터 py 파일의 기본 인코딩을 UTF-8로 정했다. 이후부터 유니코드 문자열도 아무런 문제 없이 사용할 수 있게 되었다. 또한 변수 이름이나 함수 이름을 한글이나 기타 유니코드로 정할 수도 있다.</p>

        <h5>코드2-5 파이썬 3.x 버전에서의 한글 사용</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">4</font><font>&#93;</font>:</li><li><font color="#ff7700">def</font>&nbsp;안녕<font>&#40;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;안녕&nbsp;미쿠!&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li>이름&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;미쿠&quot;</font></li><li><font color="#ff7700">print</font><font>&#40;</font>이름<font>&#41;</font></li><li>안녕<font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">4</font><font>&#93;</font>:</li><li>미쿠</li><li>안녕&nbsp;미쿠<font color="#66cc66">!</font></li></ol></blockquote></code></pre>
        <p>참고로 py파일을 ANSI로 저장한 경우 기존 터미널 포맷을 의미하는 CP949를 UTF-8로 바꿔준다. 혹은 앞서 설명한 UTF-8 인코딩 명령을 삽입하거나 UTF-8로 저장해주어야 한다. 파이썬은 입출력 인코딩을 확인하고 싶다면 다음 코드를 입력한다.</p>

        <h5>코드2-6 입출력 인코딩 확인</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">5</font><font>&#93;</font>:</li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">sys</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;입력&nbsp;인코딩&nbsp;확인</font></li><li><font color="#dc143c">sys</font>.<font>stdin</font>.<font>encoding</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">5</font><font>&#93;</font>:</li><li><font color="#483d8b">'cp949'</font></li><li>&nbsp;</li><li>In<font>&#91;</font><font color="#ff4500">6</font><font>&#93;</font>:</li><li><font color="#808080">#&nbsp;출력&nbsp;인코딩</font></li><li><font color="#dc143c">sys</font>.<font>stdout</font>.<font>encoding</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">6</font><font>&#93;</font>:</li><li><font color="#483d8b">'UTF-8'</font></li></ol></blockquote></code></pre>
        <p>더 자세한 사항을 확인하려면 파이썬 개발문서의 '<a href="https://www.python.org/dev/peps/pep-0263" target="_blank">PEP 263--Defining Python Source Code Encodings</a>'를 확인한다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">2.7. Pythonic way</h3>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬의 창시자 귀도 반 로섬은 코드를 작성하는 시간보다 읽는 시간이 더 많다는 것에 중점을 두고 명확하고 읽기 쉬운 언어를 만들었다. 파이썬의 디자인 철학은 코드 가독성과 명확성을 살리기 위한 특징들을 두루 갖추고 있다. 들여쓰기, 세미콜론 없음(새 행이 하나의 구문) 등과 switch와 case 문이 없는 것도 그러한 디자인 철학의 구체적인 예이다.</p>
        <p>무엇보다도 파이썬의 철학을 매우 강력하게 제안하는 것이 있는데, 그것은 Pythonic way이다. 더 구체적으로는 Zen of Python의 한가지 인 'There should be one-- and preferably only one --obvious way to do it.(선호할 수 있는 확실한 방법)'을 따르는 것으로 말할 수 있다. 다음 예제를 참고한다.</p>
        <h5>코드2-7 파이써닉 코딩</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;문제&nbsp;없는&nbsp;코드이다.&nbsp;하지만&nbsp;파이써닉한&nbsp;방법은&nbsp;아니다.</font></li><li><font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#008000">range</font><font>&#40;</font>maylist_length<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;do_something<font>&#40;</font>mylist<font>&#91;</font>i<font>&#93;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;이&nbsp;코드가&nbsp;파이썬다운&nbsp;코딩방법이다.</font></li><li><font color="#ff7700">for</font>&nbsp;element&nbsp;<font color="#ff7700">in</font>&nbsp;mylist:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;do_something<font>&#40;</font>element<font>&#41;</font></li></ol></blockquote></code></pre>
      </article>
    </section>
  </div>

  <h3 class="sub-header">2.8. 파이썬 2와 파이썬 3의 차이점</h3>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬3에서 눈에 띄게 바뀐점은 <code>print()</code> 가 확실하게 함수처럼 사용된다는 것이다. 그 외에는 연산자의 동작 방식이 조금 변했다든가, py파일의 기본 인코딩이 UTF-8이 되면서 문서 안에서 유니코드 문자열을 다루는 방식이 달라졌다던가 하는 부분이다.</p>
        <p>물론 메이저 버전이 바뀐만큼 파이썬2 코드와 파이썬3 코드는 호환이 되지 않는다. 하지만 '<a href="https://docs.python.org/3/library/2to3.html" target="_blank">2to3</a>'이라는 변환 라이브러리로 파이썬2 코드를 파이썬3코드로 변환할 수 있다. 또한 <strong>__future__</strong>라는 패키지는 파이썬3에서 등장했지만 파이썬2에 지원되지 않는 기능들을 사용할 수 있게 해준다.</p>
        <p>요약하자면 크게 바뀐 건 없지만 새로 파이썬을 배운다면 파이썬 3으로 시작하는 것이 좋다.</p>
      </article>
    </section>
  </div>
