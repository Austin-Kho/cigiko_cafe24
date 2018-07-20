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
        <h5>코드5-2 hello() 함수 실행</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li>to&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;Miku&quot;</font></li><li>&nbsp;</li><li>hello<font>&#40;</font>to<font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li>Hello<font color="#66cc66">,</font>&nbsp;Miku</li></ol></blockquote></code></pre>
        <p>만약 값을 반환받아야 한다면 return 키워드를 사용하면 된다.</p>
        <h5>코드5-3 return 키워드 사용</h5>
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
      </article>
    </section>
  </div>

  <h3 class="sub-header">5.2. 람다</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>
  <!-- <li class=@if($id=='55') active @endif><a href="/book02/55" class="d2">5.1 함수</a></li>
  <li class=@if($id=='56') active @endif><a href="/book02/56" class="d3">5.1.1 타입 힌팅</a></li>
  <li class=@if($id=='57') active @endif><a href="/book02/57" class="d3">5.1.2 함수를 변수처럼 전달하기</a></li>
  <li class=@if($id=='58') active @endif><a href="/book02/58" class="d2">5.2 람다</a></li> -->
