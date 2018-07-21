  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬에서도 함수의 개념은 중요하다. 다른 프로그래밍 언어와 마찬가지로 함수를 중심으로 모든 개념을 구현하기 때문이다. 그리고 다른 프로그래밍 언어의 최신 버전에 포함되는 추세인 람다가 파이썬에도 있다. 람다는 '이름이 없는 함수'를 뜻하는 데 이를 잘 활용하면 깔끔한 코드를 작성하는 데 큰 도움을 준다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">5.1. 함수</h3>
  <div class="chapter">
    <section>
      <article>
        <p>어떤 프로그래밍 언어를 사용하더라도 대부분 함수를 지원한다. 코드 재사용성이나 가독성을 극적으로 높여주기 때문이다. 파이썬의 함수 형식은 다음과 같다.</p>
        <pre class="python"><code><blockquote><ol><li><font color="#ff7700">def</font>&nbsp;<font color="#66cc66">&lt;</font>함수이름<font color="#66cc66">&gt;</font><font>&#40;</font><font color="#66cc66">&lt;</font>인자<font color="#ff4500">1</font><font color="#66cc66">&gt;,</font>&nbsp;<font color="#66cc66">&lt;</font>인자<font color="#ff4500">2</font><font color="#66cc66">&gt;,</font>&nbsp;...<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;함수&nbsp;몸체</li><li>&nbsp;&nbsp;&nbsp;&nbsp;여기서</li><li>&nbsp;&nbsp;&nbsp;&nbsp;함수가</li><li>&nbsp;&nbsp;&nbsp;&nbsp;실행이&nbsp;됩니다.</li></ol></blockquote></code></pre>
        <p>한 번 해보자.</p>
        <h5>코드5-1 특정 문자와 문자열을 연결해 출력하는 함수 정의</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:</li><li><font color="#ff7700">def</font>&nbsp;hello<font>&#40;</font>world<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Hello&quot;</font><font color="#66cc66">,</font>&nbsp;world<font>&#41;</font></li></ol></blockquote></code></pre>
        <p>2행 밖에 안되는 간단한 함수이다. 이제 실행해 본다.</p>
        <h5>코드5-2 <code>hello()</code> 함수 실행</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li>to&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;Miku&quot;</font></li><li>&nbsp;</li><li>hello<font>&#40;</font>to<font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li>Hello<font color="#66cc66">,</font>&nbsp;Miku</li></ol></blockquote></code></pre>
        <p>만약 값을 반환받아야 한다면 <code>return</code> 키워드를 사용하면 된다.</p>
        <h5>코드5-3 <code>return</code> 키워드 사용</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:</li><li><font color="#ff7700">def</font>&nbsp;hello_ret<font>&#40;</font>world<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;ret_value&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;Hello,&nbsp;&quot;</font>&nbsp;+&nbsp;<font color="#008000">str</font><font>&#40;</font>world<font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;ret_value</li><li>&nbsp;</li><li>ret_str&nbsp;<font color="#66cc66">=</font>&nbsp;hello_ret<font>&#40;</font><font color="#483d8b">&quot;D.va&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">print</font><font>&#40;</font>ret_str<font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:</li><li>Hello<font color="#66cc66">,</font>&nbsp;D.<font>va</font></li></ol></blockquote></code></pre>
        <p>파이썬은 함수 안에 함수나 뒤에서 설명할 클래스도 선언할 수 있다. 함수나 클래스를 함수 안에서 선언하는 방법은 다른 내부 변수를 선언하는 것과 같다.</p>
        <h5>코드5-4 함수 안에서 함수 선언</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">4</font><font>&#93;</font>:</li><li><font color="#ff7700">def</font>&nbsp;func<font>&#40;</font>number<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;func_in_func<font>&#40;</font>number<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>number<font>&#41;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;In&nbsp;func&quot;</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;func_in_func<font>&#40;</font>number&nbsp;+&nbsp;<font color="#ff4500">1</font><font>&#41;</font></li><li>&nbsp;</li><li>func<font>&#40;</font><font color="#ff4500">1</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">4</font><font>&#93;</font>:</li><li>In&nbsp;func</li><li><font color="#ff4500">2</font></li></ol></blockquote></code></pre>
        <p>단, 함수 안에서 다시 선언한 함수는 해당 함수 밖을 벗어나면 실행할 수 없다.</p>
      </article>
    </section>

    <h4 class="sub-header">5.1.1 - 타입 힌팅</h4>
    <section>
      <article>
        <p>타입 힌팅은 파이썬 3.5버전 이후부터 지원되는 기능이다. 말그대로 함ㅅ가 어떤 타입을 파라미터로 전달받고 어떤 타입을 반환 값으로써 전달하는지 고드상에 작성할 수 있다. IDE 및 사람이 함수를 읽을 때 의미를 파악하기 쉬워졌다. 형태는 다음과 같이 함수 선언부 첫 번째 행에 필요한 정보를 다 넣는다.</p>
        <pre class="python"><code><blockquote><ol><li><font color="#ff7700">def</font>&nbsp;<font color="#66cc66">&lt;</font>함수이름<font color="#66cc66">&gt;</font><font>&#40;</font><font color="#66cc66">&lt;</font>파라미터이름<font color="#66cc66">&gt;</font>:&nbsp;<font color="#66cc66">&lt;</font>파라미터타입<font color="#66cc66">&gt;</font><font>&#41;</font>&nbsp;-<font color="#66cc66">&gt;</font>&nbsp;<font color="#66cc66">&lt;</font>반환타입<font color="#66cc66">&gt;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#483d8b">&quot;Hello&nbsp;'&nbsp;+&nbsp;name</font></li></ol></blockquote></code></pre>
        <p>다음 코드5-5는 문자열과 숫자를 받고 숫자를 반환하는 함수이다. 타입힌팅을 이해하는 데 충분한 정보가 될 것이다.</p>
        <h5>코드5-5 타입 힌팅 사용 예</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">5</font><font>&#93;</font>:</li><li><font color="#808080">#&nbsp;단어&nbsp;1개,&nbsp;숫자&nbsp;1개를&nbsp;전달받아서&nbsp;단어의&nbsp;길이와&nbsp;숫자를&nbsp;곱해서&nbsp;반환합니다.</font></li><li><font color="#ff7700">def</font>&nbsp;count_lenth<font>&#40;</font>word&nbsp;:&nbsp;<font color="#008000">str</font><font color="#66cc66">,</font>&nbsp;num&nbsp;:&nbsp;<font color="#008000">int</font><font>&#41;</font>&nbsp;-<font color="#66cc66">&gt;</font>&nbsp;<font color="#008000">int</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#008000">len</font><font>&#40;</font>word<font>&#41;</font>&nbsp;*&nbsp;num</li><li>&nbsp;</li><li>count_lenth<font>&#40;</font><font color="#483d8b">&quot;miku&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">39</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">5</font><font>&#93;</font>:</li><li><font color="#ff4500">156</font></li></ol></blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">5.1.2 - 함수를 변수처럼 전달하기</h4>
    <section>
      <article>
        <p>파이썬은 변수처럼 함수를 다른 함수에 전달할 수 있다.</p>
        <h5>코드5-6 함수를 변수로 사용</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">6</font><font>&#93;</font>:</li><li><font color="#ff7700">def</font>&nbsp;add_with_transform<font>&#40;</font>left<font color="#66cc66">,</font>&nbsp;right<font color="#66cc66">,</font>&nbsp;transform_func<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;tmp_val&nbsp;<font color="#66cc66">=</font>&nbsp;transform_func<font>&#40;</font>left<font>&#41;</font>&nbsp;+&nbsp;transform_func<font>&#40;</font>right<font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;transform_func<font>&#40;</font>tmp_val<font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">def</font>&nbsp;add_plus_1<font>&#40;</font>number<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;numvber&nbsp;+&nbsp;<font color="#ff4500">1</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;(2&nbsp;+&nbsp;1)&nbsp;+&nbsp;(3&nbsp;+&nbsp;1)&nbsp;+&nbsp;1&nbsp;=&nbsp;8</font></li><li>ret_val&nbsp;<font color="#66cc66">=</font>&nbsp;add_with_transform<font>&#40;</font><font color="#ff4500">2</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">3</font><font color="#66cc66">,</font>&nbsp;add_plus_1<font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">print</font><font>&#40;</font>ret_val<font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">6</font><font>&#93;</font>:</li><li><font color="#ff4500">8</font></li></ol></blockquote></code></pre>
        <p><code>transform_func()</code>이라는 함수를 파라미터로 전달해서 해당 함수로 연산한 결과의 합을 계산한다. 여기서는 모든 파라미터와 반환 값을 대상으로 해당 함수를 실행했다. 이밖에도 이러한 방법을 활용할 수 있는 상황들이 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">5.2. 람다</h3>
  <div class="chapter">
    <section>
      <article>
        <p>[코드5-6] 처럼 매우 간단한 처리를 하기 위해 매번 통째로 함수를 선언한다는 것은 번거로운 일이다. 이런 경우 사용할 수 있는 것이 <strong>람다(lambda)</strong>이다.</p>
        <h5>코드5-7 같은 개념의 함수를 구현한 두 가지 예</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">7</font><font>&#93;</font>:</li><li><font color="#808080">#&nbsp;함수를&nbsp;2행&nbsp;이상을&nbsp;사용해&nbsp;선언</font></li><li><font color="#ff7700">def</font>&nbsp;add_1<font>&#40;</font>number<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;number&nbsp;+&nbsp;<font color="#ff4500">1</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;앞&nbsp;함수를&nbsp;1행으로&nbsp;줄인&nbsp;경우</font></li><li><font color="#ff7700">def</font>&nbsp;add_1_oneline<font>&#40;</font>number<font>&#41;</font>:&nbsp;<font color="#ff7700">return</font>&nbsp;number&nbsp;+&nbsp;<font color="#ff4500">1</font></li></ol></blockquote></code></pre>
        <p>위 예제는 람다의 개념을 이용해 두 행으로 선언한 함수와 똑같은 내용을 한 행으로 선언한 예이다. 둘 다 동작하는 유효한 코드이지만 Zen of Python의 원칙에 따라 두행으로 작성하는 것이 바람직하다.</p>
        <p>람다의 개념을 적용한 다음 코드를 살펴보자.</p>
        <h5>코드5-8</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">8</font><font>&#93;</font>:</li><li><font color="#808080">#&nbsp;람다</font></li><li><font color="#ff7700">lambda</font>&nbsp;<font color="#66cc66">=</font>&nbsp;x:&nbsp;x&nbsp;+&nbsp;<font color="#ff4500">1</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">8</font><font>&#93;</font>:</li><li><font color="#66cc66">&lt;</font>function&nbsp;<font color="#66cc66">&lt;</font>lambda<font color="#66cc66">&gt;</font>&nbsp;at&nbsp;<font color="#ff4500">0x10f4e3ae8</font><font color="#66cc66">&gt;</font></li></ol></blockquote></code></pre>
        <p>일단 람다를 사용하기 전에 '함수를 변수처럼 할당하거나 전달할 수 있다'라는 개념을 상기한다. 예를 들어 아래 <code>add_1()</code> 함수와 <code>add_plus_one</code> 변수는 같은 개념이다.</p>
        <h5>코드5-9 동일한 개념의 함수와 변수</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">9</font><font>&#93;</font>:</li><li><font color="#ff7700">def</font>&nbsp;add_1<font>&#40;</font>number<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;number&nbsp;+&nbsp;<font color="#ff4500">1</font></li><li>&nbsp;</li><li>add_plus_one&nbsp;<font color="#66cc66">=</font>&nbsp;add_1</li><li>&nbsp;</li><li><font color="#ff7700">print</font><font>&#40;</font>add_1<font>&#40;</font><font color="#ff4500">5</font><font>&#41;</font><font>&#41;</font></li><li><font color="#ff7700">print</font><font>&#40;</font>add_plus_one<font>&#40;</font><font color="#ff4500">6</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">9</font><font>&#93;</font>:</li><li><font color="#ff4500">6</font></li><li><font color="#ff4500">7</font></li></ol></blockquote></code></pre>
        <p>즉, 파이썬의 일반적인 함수 선언은 함수와 변수의 선언과 할당을 동시에 할 수 있는 형태이다. 그럼 이를 변수선언과 비교해보자.</p>
        <h5>코드5-10 변수 선언과 문자열 할당</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;name&nbsp;변수&nbsp;선언과&nbsp;문자열&nbsp;할당이&nbsp;동시에&nbsp;일어납니다.</font></li><li>name&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;Miku&quot;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;위&nbsp;변수&nbsp;선언을&nbsp;각각&nbsp;따로&nbsp;하면&nbsp;아래와&nbsp;같다.</font></li><li>name</li><li>name&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;Miku&quot;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;변수에&nbsp;할당하거나&nbsp;함수에&nbsp;전달하지&nbsp;않았습니다.</font></li><li><font color="#483d8b">&quot;Song&nbsp;hana&quot;</font></li></ol></blockquote></code></pre>
        <p>할당하지 않은 값을 그냥 이용할 수 있다면 람다이다. 함수로 생각하자면 이름 없는 함수를 만들고 할당하지 않은 것이 된다. 아래 람다식을 변수에 할당하면 함수처럼 사용할 수 있다.</p>
        <h5>코드5-11 람다식을 활용한 예</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">10</font><font>&#93;</font>:</li><li>lambda_puls_one&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff7700">lambda</font>&nbsp;x:&nbsp;x&nbsp;+&nbsp;<font color="#ff4500">1</font></li><li>&nbsp;</li><li><font color="#ff7700">print</font><font>&#40;</font>lambda_puls_one<font>&#40;</font><font color="#ff4500">7</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">11</font><font>&#93;</font>:</li><li><font color="#ff4500">8</font></li></ol></blockquote></code></pre>
        <p>이런 람다의 특징을 이용해 함수를 파라미터로 전달받는 함수에 람다식을 전달해 사용할 수 있다.</p>
        <h5>코드5-12 람다식을 전달하는 함수 예</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">12</font><font>&#93;</font>:</li><li><font color="#ff7700">print</font><font>&#40;</font>add_with_transform<font>&#40;</font><font color="#ff4500">2</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">3</font><font color="#66cc66">,</font>&nbsp;<font color="#ff7700">lambda</font>&nbsp;x:&nbsp;x&nbsp;+&nbsp;<font color="#ff4500">1</font><font>&#41;</font><font>&#41;</font></li><li><font color="#ff7700">print</font><font>&#40;</font>add_with_transform<font>&#40;</font><font color="#ff4500">110</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">14</font><font color="#66cc66">,</font>&nbsp;<font color="#ff7700">lambda</font>&nbsp;x:&nbsp;x&nbsp;/&nbsp;<font color="#ff4500">2</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">12</font><font>&#93;</font>:</li><li><font color="#ff4500">8</font></li><li><font color="#ff4500">31.0</font></li></ol></blockquote></code></pre>
        <p class="bg-info"><strong>NOTE_ 내장함수와 기본 라이브러리</strong><br>파이썬 역시 다른 프로그래밍 언어처럼 언어 안에 내장되어 사용할 수 있는 함수들이 있다. 이를 내장함수라고 한다. 예를 들어 print() 는 대표적인 내장함수이다. 파이썬 개발 문서의 '<a href="https://docs.python.org/3/library/functions.html" target="_blank">2. Built-in Functions</a>' 기준으로 내장함수는 68개이다. 해당 개발 문서를 참고해서 내장함수에 무엇이 있는지 살펴보길 권한다.
        <br><br>또한 내장함수는 아니지만 파이썬 개발환경과 함께 설치되는 라이브러리에도 여러가지 함수가 있다. '<a href="https://docs.python.org/3.6/library/index.html#library-index" target="_blank">The Python Standard Library</a>'에서 확인할 수 있다. 이 문서는 파이썬에 익숙해지면 자주 보게 될 것이다.</p>
      </article>
    </section>
  </div>