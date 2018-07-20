    <h3 class="page-header">{{$sub[$id][1]}}</h3>
    <div class="chapter">
      <section>
        <article class="">
          <p>
            <h5><strong>■ 부울 값</strong></h5>
            <p>True(참)와 False(거짓) 두 가지 값만 있으며, 따옴표를 두르지 않고, 첫 글자를 대문자로 그 뒤의 글자는 소문자로 쓴다. </p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">True</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam<br/><font color="#008000">True</font></blockquote></code></pre>
            <p>다른 값과 마찬가지로 부울 값은 표현식에 사용되며 변수에 저장될 수 있으나 변수 이름으로 사용될 수 없다. </p>
          </p>

          <p>
            <h5><strong>■ 표 2-1 비교 연산자</strong></h5>
            <table class="table table-hover table-condensed table table-bordered">
              <thead>
                <tr><td>연산자</td><td>의미</td></tr>
              </thead>
              <tbody>
                <tr><td>==</td><td>같음</td></tr>
                <tr><td>!=</td><td>같지 않음</td></tr>
                <tr><td><</td><td>작다</td></tr>
                <tr><td>></td><td>크다</td></tr>
                <tr><td><=</td><td>작거나 같다</td></tr>
                <tr><td>>=</td><td>크거나 같다</td></tr>
              </tbody>
            </table>
            <p><h5><strong>※ == 와 = 연산자의 차이</strong></h5>▶ ==(같음) 연산자는 두 값이 서로 같은지 여부를 묻는다.<br>▶ = (할당) 연산자는 오른쪽 있는 값을 왼쪽에 있는 변수에 저장한다.</p>
          </p>

          <p>
            <h5><strong>■ 부울 연산자</strong></h5>
            <p>세 가지 부울 연산자(and, or, not)는 부울 값을 비교하기 위해 사용된다.</p>
          </p>

          <p>
            <h5><strong>■ 표 2-2 and 연산자의 진리표</strong></h5>
            <table class="table table-hover table-condensed table table-bordered">
              <thead>
                <tr><td>표현식</td><td>평가 결과</td></tr>
              </thead>
              <tbody>
                <tr><td>True and True</td><td>True</td></tr>
                <tr><td>True and False</td><td>False</td></tr>
                <tr><td>False and True</td><td>False</td></tr>
                <tr><td>False and False</td><td>False</td></tr>
              </tbody>
            </table>
          </p>

          <p>
            <h5><strong>■ 표 2-3 or 연산자의 진리표</strong></h5>
            <table class="table table-hover table-condensed table table-bordered">
              <thead>
                <tr><td>표현식</td><td>평가 결과</td></tr>
              </thead>
              <tbody>
                <tr><td>True or True</td><td>True</td></tr>
                <tr><td>True or False</td><td>True</td></tr>
                <tr><td>False or True</td><td>True</td></tr>
                <tr><td>False or False</td><td>False</td></tr>
              </tbody>
            </table>
          </p>

          <p>
            <h5><strong>■ 표 2-4 not 연산자의 진리표</strong></h5>
            <table class="table table-hover table-condensed table table-bordered">
              <thead>
                <tr><td>표현식</td><td>평가 결과</td></tr>
              </thead>
              <tbody>
                <tr><td>not True</td><td>False</td></tr>
                <tr><td>not False</td><td>True</td></tr>
              </tbody>
            </table>
          </p>

          <p>
            <h5><strong>■ 흐름 제어 요소</strong></h5>
            <p>흐름 제어문은 종종 조건으로 시작하고, 절(clause)이라고 하는 코드의 블록이 항상 그 뒤를 뒤따른다.</p>
            <p><h5><strong>▶ 조건</strong></h5>부울 표현식은 모두 조건으로 간주될 수 있으며, 조건은 표현식과 같은 것이다. 조건은 항상 True 또는 False인 하나의 부울 값으로 평가된다.</p>
            <p><h5><strong>▶ 코드 블록</strong></h5>1. 블록은 들여쓰기가 증가할 때 시작된다.<br>2. 블록은 다른 블록을 포함할 수 있다.<br>3. 블록은 들여쓰기가 없거나 그 블록을 포함한 블록의 들여쓰기 수준으로 감소할 때 끝난다.</p>
          </p>

          <p>
            <h5><strong>■ if 문</strong></h5>
            <p><strong>▶ 구성</strong> : if 키워드 + 조건 (즉, True 또는 False로 평가되는 표현식) + 콜론 + 다음 줄에서 시작되는, 들여쓰기 된 코드 블록 (if 절이라고 부른다.)</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">if</font>&nbsp;name&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">'Alice'</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Hi,&nbsp;Alice.'</font><font>&#41;</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ else 문</strong></h5>
            <p><strong>▶ 구성</strong> : else 키워드 + 콜론 + 다음 줄에서 시작되는, 들여쓰기 된 코드 블록 (else 절이라고 부른다.)</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">if</font>&nbsp;name&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">'Alice'</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Hi,&nbsp;Alice.'</font><font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">else</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Hello,&nbsp;stranger.'</font><font>&#41;</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ elif 문</strong></h5>
            <p><strong>▶ 구성</strong> : elif 키워드 + 조건 (즉, True 또는 False로 평가되는 표현식) + 콜론 + 다음 줄에서 시작되는, 들여쓰기 된 코드 블록 (elif 절이라고 부른다.)</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">if</font>&nbsp;name&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">'Alice'</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Hi,&nbsp;Alice.'</font><font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">elif</font>&nbsp;age&nbsp;<font color="#66cc66">&lt;</font>&nbsp;<font color="#ff4500">12</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'You&nbsp;are&nbsp;not&nbsp;Alice,&nbsp;kiddo.'</font><font>&#41;</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ while 루프문</strong></h5>
            <p><strong>▶ 구성</strong> : while 키워드 + 조건 (True 또는 False로 평가되는 표현식) + 콜론 + 다음 줄에서 시작되는, 들여쓰기 된 코드 블록 (while 절이라고 부른다.)</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">0</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">while</font>&nbsp;spam&nbsp;<font color="#66cc66">&lt;</font>&nbsp;<font color="#ff4500">5</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Hello,&nbsp;world.'</font><font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;spam&nbsp;+&nbsp;<font color="#ff4500">1</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ break 문</strong></h5>
            <p>▶ 반복문 루프에서 break 문에 다다르면 즉시 루프문에서 빠져 나온다. 단순히 break 키워드만 쓰면 된다.</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">while</font>&nbsp;<font color="#008000">True</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Please&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;name&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">input</font><font>&#40;</font><font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">if</font>&nbsp;name&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">'your&nbsp;name'</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">break</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Thank&nbsp;you!'</font><font>&#41;</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ continue 문</strong></h5>
            <p>▶ break 문과 같이 루프 안에서 사용된다. 루프에서 continue 문에 다다르면 프로그램 실행은 즉시 루프의 시작 부분으로 되돌아가서 루프의 조건을 다시 판단한다.(실행이 루프의 끝에 다다를 때 일어나는 일과 똑같다.) 단순히 continue 키워드만 쓰면 된다.</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">while</font>&nbsp;<font color="#008000">True</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Who&nbsp;are&nbsp;you?'</font><font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;name&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">input</font><font>&#40;</font><font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">if</font>&nbsp;name&nbsp;<font color="#66cc66">!=</font>&nbsp;<font color="#483d8b">'Joe'</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">continue</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Hello,&nbsp;Joe.&nbsp;What&nbsp;is&nbsp;the&nbsp;password?&nbsp;(I&nbsp;is&nbsp;a&nbsp;fish.)'</font><font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;password&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">input</font><font>&#40;</font><font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">if</font>&nbsp;password&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">'swordfish'</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">break</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Access&nbsp;granted.'</font><font>&#41;</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ for 루프와 range() 함수</strong></h5>
            <p><strong>▶ 구성</strong> : for 키워드 + 변수이름 + in 키워드 + 최대 세 개의 정수를 포함하는 range() 메소드 호출 + 콜론 + 다음 줄에서 시작되는, 들여쓰기 된 코드 블록 (for 절이라고 부른다.)</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'My&nbsp;name&nbsp;is&nbsp;'</font><font>&#41;</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#008000">range</font><font>&#40;</font><font color="#ff4500">5</font><font>&#41;</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Jimmy&nbsp;Five&nbsp;Times&nbsp;('</font>&nbsp;+&nbsp;<font color="#008000">str</font><font>&#40;</font>i<font>&#41;</font>&nbsp;+&nbsp;<font color="#483d8b">')'</font><font>&#41;</font></blockquote></code></pre>
            <p>※ for 루프 안에서도 break 와 continue 문을 사용할 수 있다. continue 문은 for 루프의 카운터를 다음 값으로 진행 시킨다.마치 프로그램 실행이 루프의 끝에 다다른 것과도 같다. 사실 continue 와 break 문은 while 과 for 루프 안에서만 사용할 수 있다.</p>
            <p><strong>▶ range()</strong> 메소드 : range(시작 값, 종료 값(자신을 포함하지 않음), 증감 값)와 같이 인자를 사용하며, 첫번째(생략 시 0)와 세번째 인자(생략 시 1)는 생략할 수 있다.</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#008000">range</font><font>&#40;</font><font color="#ff4500">5</font><font>&#41;</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>i<font>&#41;</font><br/><font color="#ff4500">0</font><br/><font color="#ff4500">1</font><br/><font color="#ff4500">2</font><br/><font color="#ff4500">3</font><br/><font color="#ff4500">4</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#008000">range</font><font>&#40;</font><font color="#ff4500">12</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">16</font><font>&#41;</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>i<font>&#41;</font><br/><font color="#ff4500">12</font><br/><font color="#ff4500">13</font><br/><font color="#ff4500">14</font><br/><font color="#ff4500">15</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#008000">range</font><font>&#40;</font><font color="#ff4500">0</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">10</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">2</font><font>&#41;</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>i<font>&#41;</font><br/><font color="#ff4500">0</font><br/><font color="#ff4500">2</font><br/><font color="#ff4500">4</font><br/><font color="#ff4500">6</font><br/><font color="#ff4500">8</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#008000">range</font><font>&#40;</font><font color="#ff4500">5</font><font color="#66cc66">,</font>&nbsp;-<font color="#ff4500">1</font><font color="#66cc66">,</font>&nbsp;-<font color="#ff4500">1</font><font>&#41;</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>i<font>&#41;</font><br/><font color="#ff4500">5</font><br/><font color="#ff4500">4</font><br/><font color="#ff4500">3</font><br/><font color="#ff4500">2</font><br/><font color="#ff4500">1</font><br/><font color="#ff4500">0</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ 모듈 가져오기</strong></h5>
            <p><strong>▶ 구성</strong> : import 키워드 + 모듈의 이름 + 쉼표로 구분하면 더 많은 모듈 이름을 넣을 수도 있다.</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">import</font>&nbsp;<font color="#dc143c">random</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#008000">range</font><font>&#40;</font><font color="#ff4500">5</font><font>&#41;</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#dc143c">random</font>.<font>randint</font><font>&#40;</font>i<font color="#66cc66">,</font>&nbsp;<font color="#ff4500">10</font><font>&#41;</font><font>&#41;</font></blockquote></code></pre>
            <p>※ 다음은 네 가지 모듈을 가져오는 import 문의 예다.</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">import</font>&nbsp;<font color="#dc143c">random</font><font color="#66cc66">,</font>&nbsp;<font color="#dc143c">sys</font><font color="#66cc66">,</font>&nbsp;<font color="#dc143c">os</font><font color="#66cc66">,</font>&nbsp;<font color="#dc143c">math</font></blockquote></code></pre>
            <p>이제 이들 4개의 모듈에 있는 함수를 사용할 수 있다.</p>
          </p>

          <p>
            <h5><strong>■ from import 문</strong></h5>
            <p>import 명령문의 다른 형태는 from 키워드를 쓰고 그 뒤에 모듈 이름, import 키워드와 별표(*)를 쓰는 것이다. (ex: from random import *)</p>
            <p>이 형식의 import 문에서는 random 함수에 random.이라는 접두사를 필요로 하지 않는다. <br>하지만 전체 이름을 쓰는 것이 코드를 더 이해하기 쉽게 만들 수 있으므로 import 문의 일반적인 형식을 사용하는 것이 좋다.</p>
          </p>

          <p>
            <h5><strong>■ sys.exit() 함수로 프로그램을 일찍 끝내기</strong></h5>
            <p>마지막으로 다룰 흐름 제어 개념은 프로그램의 종료다. <br>프로그램 실행이 명령의 끝에 다다르면 항상 일어나는 일이지만 sys.exit() 함수를 호출해서 프로그램을 종료시킬 수 있다. 이 기능은 sys 모듈에 들어 있다.</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">import</font>&nbsp;<font color="#dc143c">sys</font><br/><font color="#66cc66">&gt;&gt;&gt;</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">while</font>&nbsp;<font color="#008000">True</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Type&nbsp;exit&nbsp;to&nbsp;exit.'</font><font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;response&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">input</font><font>&#40;</font><font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">if</font>&nbsp;response&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">'exit'</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#dc143c">sys</font>.<font>exit</font><font>&#40;</font><font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'You&nbsp;typed&nbsp;'</font>&nbsp;+&nbsp;response&nbsp;+&nbsp;<font color="#483d8b">'.'</font><font>&#41;</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ 연습 문제</strong></h5>
            <ul>
              <li>1. 부울 데이터 유형의 두 가지 값은 무엇인가? 이들을 어떻게 입력해야 하는가?</li>
              <li>2. 세 개의 부울 연산자는 무엇인가?</li>
              <li>3. 각 부울 연산자의 진리표를만들어 보라. (즉, 연산자에 대해 가능한 모든 부울 값 조합, 그리고 각 조합이 어떻게 평가되는지 써 보라)</li>
              <li>4. 다음과 같은 표현식은 어떻게 평가되는가?</li>
              <pre><code class="python"><blockquote><font>&#40;</font><font color="#ff4500">5</font>&nbsp;<font color="#66cc66">&gt;</font><font color="#ff4500">4</font><font>&#41;</font>&nbsp;<font color="#ff7700">and</font>&nbsp;<font>&#40;</font><font color="#ff4500">3</font>&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">5</font><font>&#41;</font><br/><font color="#ff7700">not</font>&nbsp;<font>&#40;</font><font color="#ff4500">5</font>&nbsp;<font color="#66cc66">&gt;</font>&nbsp;<font color="#ff4500">4</font><font>&#41;</font><br/><font>&#40;</font><font color="#ff4500">5</font>&nbsp;<font color="#66cc66">&gt;</font><font color="#ff4500">4</font><font>&#41;</font>&nbsp;<font color="#ff7700">or</font>&nbsp;<font>&#40;</font><font color="#ff4500">3</font>&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">5</font><font>&#41;</font><br/><font color="#ff7700">not</font>&nbsp;<font>&#40;</font><font>&#40;</font><font color="#ff4500">5</font>&nbsp;<font color="#66cc66">&gt;</font><font color="#ff4500">4</font><font>&#41;</font>&nbsp;<font color="#ff7700">or</font>&nbsp;<font>&#40;</font><font color="#ff4500">3</font>&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">5</font><font>&#41;</font><font>&#41;</font><br/><font>&#40;</font><font color="#008000">True</font>&nbsp;<font color="#ff7700">and</font>&nbsp;<font color="#008000">True</font><font>&#41;</font>&nbsp;<font color="#ff7700">and</font>&nbsp;<font>&#40;</font><font color="#008000">True</font>&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#008000">False</font><font>&#41;</font><br/><font>&#40;</font><font color="#ff7700">not</font>&nbsp;<font color="#008000">False</font><font>&#41;</font>&nbsp;<font color="#ff7700">or</font>&nbsp;<font>&#40;</font><font color="#ff7700">not</font>&nbsp;<font color="#008000">True</font><font>&#41;</font></blockquote></code></pre>
              <li>5. 여섯 가지 비교 연산자는 무엇인가?</li>
              <li>6. 같음 연산자와 할당 연산자의 차이점은 무엇인가?</li>
              <li>7. 조건이란 무엇이며 이를 어디에서 사용하는지 설명하라.</li>
              <li>8. 아래 코드에 있는 3개의 블록을 지적하라.</li>
              <pre><code class="python"><blockquote>spam&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">0</font><br/><font color="#ff7700">if</font>&nbsp;spam&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">10</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'eggs'</font><font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">if</font>&nbsp;spam&nbsp;<font color="#66cc66">&gt;</font>&nbsp;<font color="#ff4500">5</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'bacon'</font><font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">else</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'ham'</font><font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'spam'</font><font>&#41;</font><br/><font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'spam'</font><font>&#41;</font></blockquote></code></pre>
              <li>9. spam 변수에 1이 저장되어 있으면 Hello를, 2가 저장되어 있으면 Howdy를 출력하고, 그 밖에 다른 값이라면 Greetings!를 출력하는 코드를 만들어라.</li>
              <li>10. 프로그램이 무한루프에 갇혔다면 어떤 키를 눌러야 할까?</li>
              <li>11. break 와 continue 사이의 차이점은 무엇인가?</li>
              <li>12. for 루프에서 range(10), range(0, 10), range(0, 10, 1) 사이의 차이점은 무엇인가?</li>
              <li>13. for 루프를 사용하여 숫자 1부터 10까지를 출력하는 프로그램을 만들어라. 그런 다음 while 루프를 사용하여 똑같이 숫자 1부터 10까지를 출력하는 프로그램을 만들어라.</li>
              <li>14. spam 이라는 이름의 모듈 안에 bacon()이라는 이름의 함수가 있다면 spam 모듈을 가져온 다음에 어떻게 이 함수를 부를 수 있을까?</li>
            </ul>
          </p>

        </article>
      </section>
    </div>
