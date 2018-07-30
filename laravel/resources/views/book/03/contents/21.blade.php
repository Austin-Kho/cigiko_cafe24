  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>모두가 코드를 쉽게 읽기 위해서는 먼저 코딩 방법이 구체적으로 정해져 있어야 한다. 이를 제시하는 것이 PEP8이다. PEP는 Python Enhancement Proposals 의 약자고, 8이라는 숫자는 'PEP 8 -- Style Guide for Python Code'에서 유래한 것으로, 파이썬 코딩 스타일 제안이다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">C.1. 코드 레이아웃</h3>
  <div class="chapter">
    <section>
      <article>
        <p>코드 레이아웃에서는 코드의 전체적인 모습이 어떻게 되어야 하는지 설명한다. 가독성과 그에 따른 명시성이 주요 주제가 된다.</p>
      </article>
    </section>

    <h4 class="sub-header">C.1.1 - 들여쓰기</h4>
    <section>
      <article>
        <p>4개의 공백을 들여쓰기 단위로 사용할 것을 권장한다. 더불어 괄호 안의 요소들을 정렬하는 법도 다룬다.</p>
        <h5>코드C-1 들여쓰기의 올바른 예</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;Aligned&nbsp;with&nbsp;opening&nbsp;delimiter.</font></li><li>foo&nbsp;<font color="#66cc66">=</font>&nbsp;long_function_name<font>&#40;</font>var_one<font color="#66cc66">,</font>&nbsp;var_two</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var_three<font color="#66cc66">,</font>&nbsp;var_four<font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;More&nbsp;indentation&nbsp;included&nbsp;to&nbsp;distinguish&nbsp;this&nbsp;from&nbsp;the&nbsp;rest.</font></li><li><font color="#ff7700">def</font>&nbsp;long_function_name<font>&#40;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var_one<font color="#66cc66">,</font>&nbsp;var_two<font color="#66cc66">,</font>&nbsp;var_three<font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var_four<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>var_one<font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;Hanging&nbsp;indents&nbsp;should&nbsp;add&nbsp;a&nbsp;level.</font></li><li>foo&nbsp;<font color="#66cc66">=</font>&nbsp;long_function_name<font>&#40;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;var_one<font color="#66cc66">,</font>&nbsp;var_two</li><li>&nbsp;&nbsp;&nbsp;&nbsp;var_three<font color="#66cc66">,</font>&nbsp;var_four<font>&#41;</font></li></ol></blockquote></code></pre>

        <h5>코드C-2 들여쓰기의 나쁜 예</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;Arguments&nbsp;on&nbsp;first&nbsp;line&nbsp;forbidden&nbsp;when&nbsp;not&nbsp;using&nbsp;vertical&nbsp;alignment.</font></li><li>foo&nbsp;<font color="#66cc66">=</font>&nbsp;long_function_name<font>&#40;</font>var_one<font color="#66cc66">,</font>&nbsp;var_two<font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;var_three<font color="#66cc66">,</font>&nbsp;var_four<font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;Further&nbsp;indentation&nbsp;required&nbsp;as&nbsp;indentation&nbsp;is&nbsp;not&nbsp;distinguishable.</font></li><li><font color="#ff7700">def</font>&nbsp;long_function_name<font>&#40;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;var_one<font color="#66cc66">,</font>&nbsp;var_two<font color="#66cc66">,</font>&nbsp;var_three<font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;var_four<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>var_one<font>&#41;</font></li></ol></blockquote></code></pre>
        <p>괄호로 묶는 요소들은 암묵적으로 한 행으로 취급한다. 따라서 따로 역슬래시 등을 이용해 줄이 이어진 다는 것을 표시할 필요가 없다.</p>
        <p>단, 괄호 안의 요소들을 '행'별로 정리할 때 주의해야할 점이 있다. 앞 예처럼 괄호 안의 요소가 아래로 내려오는 것을 매달린 들여쓰기(hanging indent)라고 한다. 이러한 매달린 들여쓰기는 괄호 안 첫 번째 요소의 시작 지점에 맞추어야 한다.</p>
      </article>
    </section>

    <h4 class="sub-header">C.1.2 - 탭이냐 스페이스냐</h4>
    <section>
      <article>
        <p>공백, 즉 스페이스를 사용하는 것이 좋다. 탭의 경우 시스템의 설정에 따라 그 너비가 달라질 수도 있다. 탭을 사용할 수 있는 경우는 기존 코드가 이미 탭으로 들여쓰기가 되어 있는 경우에만 하라고 권장한다.</p>
      </article>
    </section>

    <h4 class="sub-header">C.1.3 - 한 행의 길이는?</h4>
    <section>
      <article>
        <p>최대 79자를 권장한다. 물론 이 숫자는 공백을 포함한 숫자이다. 따라서 들여쓰기로 인한 제약을 생각한다면 실제 한 행에 적을 수 있는 코드의 양은 그 만큼 적다.</p>
        <p>이렇게 명시적으로 한 행에 적는 코드의 양을 권장함으로써 한 행에 담기는 코드가 한 가지의 의미에 집중되게 하는 효과가 있다.</p>

        <h5>코드C-3 올바른 한 행의 예</h5>
        <pre class="python"><code><blockquote><ol><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">with</font>&nbsp;<font color="#008000">open</font><font>&#40;</font><font color="#483d8b">'/path/to/some/file/you/want/to/read'</font><font>&#41;</font>&nbsp;<font color="#ff7700">as</font>&nbsp;file_1<font color="#66cc66">,</font>&nbsp;\</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">open</font><font>&#40;</font><font color="#483d8b">'/path/to/some/file/being/written'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'w'</font><font>&#41;</font>&nbsp;<font color="#ff7700">as</font>&nbsp;file_2:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;file_2.<font>write</font><font>&#40;</font>file_1.<font>read</font><font>&#40;</font><font>&#41;</font><font>&#41;</font></li></ol></blockquote></code></pre>

      </article>
    </section>

    <h4 class="sub-header">C.1.4 - 빈 행은 어떻게 얼마나?</h4>
    <section>
      <article>
        <p>파이썬은 가독성을 중시하는 언어이다. 따라서 함수와 클래스 앞뒤로 빈 행을 얼마나 붙일지도 권장하는 기준이 있다. 단순히 코드를 작성한다고 끝나는 것이 아니라, 다른 사람이 읽는 경우까지도 고려하는 코드 작성을 권장하는 것이다.</p>
        <ul>
            <li>최상위 레벨의 함수는 두 행의 빈 행으로 감싼다.</li>
            <li>클래스 내부의 메서드는 한 행의 빈 행으로 감싼다.</li>
            <li>연관된 함수들끼리 구분 짓기 위해 여분의 빈 행을 사용할 수 있다. 이런 식의 논리적인 그룹을 짓기 위해 코드 사이에도 빈 행을 사용할 수 있다.</li>
        </ul>
        <h5>코드C-4 빈 줄 사용 예</h5>
        <pre class="python"><code><blockquote><ol><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">class</font>&nbsp;example<font>&#40;</font><font>&#41;</font>:</li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;func1<font>&#40;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">pass</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;func2<font>&#40;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">pass</font></li><li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;funca<font>&#40;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">pass</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;funcb<font>&#40;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">pass</font></li></ol></blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">C.1.5 - 소스 코드 파일의 인코딩은 어떻게?</h4>
    <section>
      <article>
        <p>파이썬 3에서 py 파일의 기본 인코딩은 UTF-8이다. 반면 파이썬 2의 py 파일 인코딩은 아스키(ASCII)이다. 각각의 버전에 따라 기본 인코딩을 작성한 코드 파일은 별도의 인코딩 선언을 해주지 않아도 된다. 파이썬 3의 UTF-8 py 파일, 파이썬 2의 아스키 py 코드 파일으 경우가 이에 해당한다.</p>
      </article>
    </section>

    <h4 class="sub-header">C.1.6 - imports</h4>
    <section>
      <article>
        <p>파이썬은 모듈과 패키지를 사용할 때 import 명령어를 사용한다. 그리고 import 명령어를 사용할 때 권장하는 방법은 한 줄에 하나만 import 명령어를 사용하는 것이다.</p>
        <h5>코드C-5 import 사용 예</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;올바른&nbsp;예</font></li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">os</font></li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">sys</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;잘못된&nbsp;예</font></li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">sys</font><font color="#66cc66">,</font>&nbsp;<font color="#dc143c">os</font></li></ol></blockquote></code></pre>
        <p>위 예제와 같이 한 행에 하나의 모듈 또는 패키지만을 불러온다. 하지만 하나의 모듈이나 패키지에서 함수를 가져오는 경우 다음 예제처럼 한 행에 해도 괜찮다.</p>
        <h5>코드C-6 모듈이나 패키지에서 함수를 가져올 때</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#ff7700">from</font>&nbsp;<font color="#dc143c">subprocess</font>&nbsp;<font color="#ff7700">import</font>&nbsp;Popen<font color="#66cc66">,</font>&nbsp;PIPE</li></ol></blockquote></code></pre>
        <p>와일드카(*)를 이용한 import 명령어 사용은 권장되지 않는다. 해당 모듈이나 패키지에 포함된 함수들이 모듈이나 패키지의 네임스페이스를 벗어나게 되기 때문이다.</p>
        <h5>코드C-7 권장하지 않는 import 명령 예</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#ff7700">from</font>&nbsp;pkg&nbsp;<font color="#ff7700">import</font>&nbsp;*</li></ol></blockquote></code></pre>
        <p>이렇게 작성하면 나중에 다른 네임스페이스에서 와일드카드로 함수를 가져왔을 때 같은 이름의 함수가 있으면 먼저 불러온 함수를 덮어쓴다.</p>
        <div class="tip"><h4>NOTE_모듈과 패키지의 차이</h4><p>모듈은 미리 구현해놓고 사용하려고 어떤 기능을 담은 하나의 파일을 의미한다. 보통 모듈 이름이 파일 이름과 같다는 특징이 있어서 파이썬의 파일 이름 생성 규칙을 만족하는 이름을 정해야 한다. 패키지는 모듈을 모아 놓은 것이다. 여러 가지 모듈이 포함될 수 있다. 모듈과 패키지의 관계는 '패키지 = {모듈1, 모듈2...}'라고 표현할 수 있다.</p></div>
      </article>
    </section>
  </div>

  <h3 class="sub-header">C.2. 공백 표현과 구문</h3>
  <div class="chapter">
    <section>
      <article>
        <p>괄호 안의 요소 사이사이에 어떻게 공백을 넣을까도 권장하는 사항이 있다.</p>
      </article>
    </section>

    <h4 class="sub-header">C.2.1 - 성가신 것들</h4>
    <section>
      <article>
        <p>괄호 바로 안쪽에는 가능하면 공백을 사용하지 않도록 한다.</p>
        <h5>코드C-8 공백 사용 예 1</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;올바른&nbsp;예</font></li><li>spam<font>&#40;</font>ham<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;<font>&#123;</font>eggs:&nbsp;<font color="#ff4500">2</font><font>&#125;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;잘못된&nbsp;예</font></li><li>spam<font>&#40;</font>&nbsp;ham<font>&#91;</font>&nbsp;<font color="#ff4500">1</font>&nbsp;<font>&#93;</font><font color="#66cc66">,</font>&nbsp;<font>&#123;</font>&nbsp;eggs:&nbsp;<font color="#ff4500">2</font>&nbsp;<font>&#125;</font>&nbsp;<font>&#41;</font></li></ol></blockquote></code></pre>
        <p>쉼표(,), 콜론(:), 세미콜론(;) 바로 앞에는 공백을 가능한 사용하지 않도록 한다.</p>
        <h5>코드C-9 공백 사용 예 2</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;올바른&nbsp;예</font></li><li><font color="#ff7700">if</font>&nbsp;x&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">4</font>:&nbsp;<font color="#ff7700">print</font>&nbsp;x<font color="#66cc66">,</font>&nbsp;y<font color="#66cc66">;</font>&nbsp;x<font color="#66cc66">,</font>&nbsp;y&nbsp;<font color="#66cc66">=</font>&nbsp;y<font color="#66cc66">,</font>&nbsp;x</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;잘못된&nbsp;예</font></li><li><font color="#ff7700">if</font>&nbsp;x&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">4</font>&nbsp;:&nbsp;<font color="#ff7700">print</font>&nbsp;x&nbsp;<font color="#66cc66">,</font>&nbsp;y&nbsp;<font color="#66cc66">;</font>&nbsp;x&nbsp;<font color="#66cc66">,</font>&nbsp;y&nbsp;<font color="#66cc66">=</font>&nbsp;y&nbsp;<font color="#66cc66">,</font>&nbsp;x</li></ol></blockquote></code></pre>
        <p>물론 예외가 있다. 리스트를 구분하는 경우의 콜론은 바이너리 연산자처럼 동작한다. 이럴 때는 콜론의 양쪽에 같은 수의 공백을 넣어 주는 것이 좋다. 단, 콜론 사이의 값이 생략되면 공백도 생략해야 한다.</p>
        <h5>코드C-10 공백 사용 예 3</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;올바른&nbsp;예</font></li><li>ham<font>&#91;</font><font color="#ff4500">1</font>:<font color="#ff4500">9</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;ham<font>&#91;</font><font color="#ff4500">1</font>:<font color="#ff4500">9</font>:<font color="#ff4500">3</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;ham<font>&#91;</font>:<font color="#ff4500">9</font>:<font color="#ff4500">3</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;ham<font>&#91;</font><font color="#ff4500">1</font>::<font color="#ff4500">3</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;ham<font>&#91;</font><font color="#ff4500">1</font>:<font color="#ff4500">9</font>:<font>&#93;</font></li><li>ham<font>&#91;</font>lower:upper<font>&#93;</font><font color="#66cc66">,</font>&nbsp;ham<font>&#91;</font>lower:upper:<font>&#93;</font><font color="#66cc66">,</font>&nbsp;ham<font>&#91;</font>lower::step<font>&#93;</font></li><li>ham<font>&#91;</font>lower+offset&nbsp;:&nbsp;upper+offset<font>&#93;</font></li><li>ham<font>&#91;</font>:&nbsp;upper_fn<font>&#40;</font>x<font>&#41;</font>&nbsp;:&nbsp;step_fn<font>&#40;</font>x<font>&#41;</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;ham<font>&#91;</font>::&nbsp;step_fn<font>&#40;</font>x<font>&#41;</font><font>&#93;</font></li><li>ham<font>&#91;</font>lower&nbsp;+&nbsp;offset&nbsp;:&nbsp;upper&nbsp;+&nbsp;offset<font>&#93;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;잘못된&nbsp;예</font></li><li>ham<font>&#91;</font>lower&nbsp;+&nbsp;offset:upper&nbsp;+&nbsp;offset<font>&#93;</font></li><li>ham<font>&#91;</font><font color="#ff4500">1</font>:&nbsp;<font color="#ff4500">9</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;ham<font>&#91;</font><font color="#ff4500">1</font>&nbsp;:<font color="#ff4500">9</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;ham<font>&#91;</font><font color="#ff4500">1</font>:<font color="#ff4500">9</font>&nbsp;:<font color="#ff4500">3</font><font>&#93;</font></li><li>ham<font>&#91;</font>lower&nbsp;:&nbsp;:&nbsp;upper<font>&#93;</font></li><li>ham<font>&#91;</font>&nbsp;:&nbsp;upper<font>&#93;</font></li></ol></blockquote></code></pre>
        <p>함수를 호출할 때 함깨 사용하는 괄호 사이에는 공백을 넣지 않는 것이 좋다.</p>
        <h5>코드C-11 공백 사용 예 4</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;올바른&nbsp;예</font></li><li>spam<font>&#40;</font><font color="#ff4500">1</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;잘못된&nbsp;예</font></li><li>spam&nbsp;<font>&#40;</font><font color="#ff4500">1</font><font>&#41;</font></li></ol></blockquote></code></pre>
          <p>리스트나 딕셔너리의 인덱스를 사용할 때도 리스트나 딕셔너리의 이름과 괄호 사이에 공백을 넣지 않는 것이 좋다.</p>
          <h5>코드C-12 공백 사용 예 5</h5>
          <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;올바른&nbsp;예</font></li><li>dct<font>&#91;</font><font color="#483d8b">'key'</font><font>&#93;</font>&nbsp;<font color="#66cc66">=</font>&nbsp;lst<font>&#91;</font>index<font>&#93;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;잘못된&nbsp;예</font></li><li>dct&nbsp;<font>&#91;</font><font color="#483d8b">'key'</font><font>&#93;</font>&nbsp;<font color="#66cc66">=</font>&nbsp;lst&nbsp;<font>&#91;</font>index<font>&#93;</font></li></ol></blockquote></code></pre>
          <p>변수에 값을 할당할 때 변수 이름, 등호, 값 사이에 하나 이상 공백을 넣지 않는 것이 좋다.</p>
          <h5>코드C-13 공백 사용 예 6</h5>
          <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;올바른&nbsp;예</font></li><li>x&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">1</font></li><li>y&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">2</font></li><li>long_variable&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">3</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;잘못된&nbsp;예</font></li><li>x&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">1</font></li><li>y&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">1</font></li><li>long_variable&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">3</font></li></ol></blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">C.2.2 - 그 외의 추천하는 방법</h4>
    <section>
      <article>
        <p>바이너리 연산자는 공백으로 감싸주는 것이 좋다. 또한 연산자 사이에 우선순위가 다를 경우 낮은 우선순위의 연산자에 추가 공백을 넣어 주는 것이 좋다. 공백을 넣는 ㅣ것은 자신의 판단에 따르되 하나 이상의 공백을 넣는 것은 피해야 한다.</p>
        <h5>코드C-14 공백 사용 예 7</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;올바른&nbsp;예</font></li><li>i&nbsp;<font color="#66cc66">=</font>&nbsp;i&nbsp;+&nbsp;<font color="#ff4500">1</font></li><li>submitted&nbsp;+<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">1</font></li><li>x&nbsp;<font color="#66cc66">=</font>&nbsp;x*<font color="#ff4500">2</font>&nbsp;-&nbsp;<font color="#ff4500">1</font></li><li>hypot2&nbsp;<font color="#66cc66">=</font>&nbsp;x*x&nbsp;+&nbsp;y*y</li><li>c&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#40;</font>a+b<font>&#41;</font>&nbsp;*&nbsp;<font>&#40;</font>a-b<font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;잘못된&nbsp;예</font></li><li>i<font color="#66cc66">=</font>i+<font color="#ff4500">1</font></li><li>submitted&nbsp;+<font color="#66cc66">=</font><font color="#ff4500">1</font></li><li>x&nbsp;<font color="#66cc66">=</font>&nbsp;x&nbsp;*&nbsp;<font color="#ff4500">2</font>&nbsp;-&nbsp;<font color="#ff4500">1</font></li><li>hypot2&nbsp;<font color="#66cc66">=</font>&nbsp;x&nbsp;*&nbsp;x&nbsp;+&nbsp;y&nbsp;*&nbsp;y</li><li>c&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#40;</font>a&nbsp;+&nbsp;b<font>&#41;</font>&nbsp;*&nbsp;<font>&#40;</font>a&nbsp;-&nbsp;b<font>&#41;</font></li></ol></blockquote></code></pre>
        <p>함수 파라미터에 기본값이 있는 경우 해당 값을 할당하는 등호 주위에 공백을 넣지 않는 것이 좋다.</p>
        <h5>코드C-15 공백 사용 예 8</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;올바른&nbsp;예</font></li><li><font color="#ff7700">def</font>&nbsp;<font color="#008000">complex</font><font>&#40;</font>real<font color="#66cc66">,</font>&nbsp;imag<font color="#66cc66">=</font><font color="#ff4500">0.0</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;magic<font>&#40;</font>r<font color="#66cc66">=</font>real<font color="#66cc66">,</font>&nbsp;i<font color="#66cc66">=</font>imag<font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;잘못된&nbsp;예</font></li><li><font color="#ff7700">def</font>&nbsp;<font color="#008000">complex</font><font>&#40;</font>real<font color="#66cc66">,</font>&nbsp;imag&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">0.0</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;magic<font>&#40;</font>r&nbsp;<font color="#66cc66">=</font>&nbsp;real<font color="#66cc66">,</font>&nbsp;i&nbsp;<font color="#66cc66">=</font>&nbsp;imag<font>&#41;</font></li></ol></blockquote></code></pre>
        <p>한 행에 여러 개의 구문(statement)을 작성하지 않는 것이 좋다.</p>
        <h5>코드C-16 공백 사용 예 9</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;올바른&nbsp;예</font></li><li><font color="#ff7700">if</font>&nbsp;foo&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">'blah'</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;do_blah_thing<font>&#40;</font><font>&#41;</font></li><li>do_one<font>&#40;</font><font>&#41;</font></li><li>do_two</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;조금&nbsp;잘못된&nbsp;예</font></li><li><font color="#ff7700">if</font>&nbsp;foo&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">'blah'</font>:&nbsp;do_blah_thing<font>&#40;</font><font>&#41;</font></li><li>do_one<font>&#40;</font><font>&#41;</font><font color="#66cc66">;</font>&nbsp;do_two<font>&#40;</font><font>&#41;</font><font color="#66cc66">;</font>&nbsp;do_three<font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;조금&nbsp;잘못된&nbsp;예</font></li><li><font color="#ff7700">if</font>&nbsp;foo&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">'blah'</font>:&nbsp;do_blah_thing<font>&#40;</font><font>&#41;</font></li><li><font color="#ff7700">for</font>&nbsp;x&nbsp;<font color="#ff7700">in</font>&nbsp;lst:&nbsp;total&nbsp;+<font color="#66cc66">=</font>&nbsp;x</li><li><font color="#ff7700">while</font>&nbsp;t&nbsp;<font color="#66cc66">&lt;</font>&nbsp;<font color="#ff4500">10</font>:&nbsp;t&nbsp;<font color="#66cc66">=</font>&nbsp;delay<font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;확실하게&nbsp;잘못된&nbsp;예</font></li><li><font color="#ff7700">if</font>&nbsp;foo&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">'blah'</font>:&nbsp;do_blah_thing<font>&#40;</font><font>&#41;</font></li><li><font color="#ff7700">else</font>:&nbsp;do_non_blah_thing<font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">try</font>:&nbsp;something<font>&#40;</font><font>&#41;</font></li><li><font color="#ff7700">finally</font>:&nbsp;cleanup<font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li>do_one<font>&#40;</font><font>&#41;</font><font color="#66cc66">;</font>&nbsp;do_two<font>&#40;</font><font>&#41;</font><font color="#66cc66">;</font>&nbsp;do_three<font>&#40;</font><font color="#008000">long</font><font color="#66cc66">,</font>&nbsp;argument<font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">list</font><font color="#66cc66">,</font>&nbsp;like<font color="#66cc66">,</font>&nbsp;this<font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">if</font>&nbsp;foo&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">'blah'</font>:&nbsp;one<font>&#40;</font><font>&#41;</font><font color="#66cc66">;</font>&nbsp;two<font>&#40;</font><font>&#41;</font><font color="#66cc66">;</font>&nbsp;three<font>&#40;</font><font>&#41;</font></li></ol></blockquote></code></pre>
      </article>
    </section>
  </div>

  <h3 class="sub-header">C.3. 주석</h3>
  <div class="chapter">
    <section>
      <article>
        <p>올바른 주석 표기 방법을 살펴보자.</p>
      </article>
    </section>

    <h4 class="sub-header">C.3.1 - 블록 주석</h4>
    <section>
      <article>
        <p>블록 주석은 주석 표시 바로 뒤에 작성하며 코드를 설명하는 역할을 한다. 주석 각각은 각 행의 처음에서 #으로 시작하며 블록 주석 안의 문단은 # 하나만 있는 행으로 구분한다.</p>
        <h5>코드C-17 주석 사용 예 1</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;코드&nbsp;예제</font></li></ol></blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">C.3.2 - 인라인 주석</h4>
    <section>
      <article>
        <p>인라인 주석은 어쩔 수 없는 경우에만 사용할 것을 권장한다. 해당 구문과 같은 행에 있는 주석이고, 인라인 주석은 해당 구문과 최소 2개 이상의 공백으로 떨어져 있어야 한다.</p>
        <h5>코드C-18 주석 사용 예 2</h5>
        <pre class="python"><code><blockquote><ol><li>x&nbsp;<font color="#66cc66">=</font>&nbsp;x&nbsp;+&nbsp;<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;x가&nbsp;1&nbsp;증가합니다.</font></li></ol></blockquote></code></pre>
        <p>위 예제의 주석은 굳이 사용할 필요가 없는 주석이다. 하지만 다음 주석은 유용한 주석이 될 수 있다.</p>
        <h5>코드C-19 주석 사용 예 3</h5>
        <pre class="python"><code><blockquote><ol><li>x&nbsp;<font color="#66cc66">=</font>&nbsp;x&nbsp;+&nbsp;<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;테두리&nbsp;간격을&nbsp;조정</font></li></ol></blockquote></code></pre>
      </article>
    </section>
  </div>
