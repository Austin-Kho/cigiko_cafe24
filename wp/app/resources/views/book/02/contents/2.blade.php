    <h3 class="page-header">{{$sub[$id][1]}}</h3>
    <div class="chapter">
      <section>
        <article class="">
          <p>
            <h5><strong>■ 대화형 쉘에 표현식 입력하기</strong></h5>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff4500">2</font>&nbsp;+&nbsp;<font color="#ff4500">2</font><br/><font color="#ff4500">4</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ 표 1-1 수학 연산자</strong> (우선 순위가 가장 높은 것에서 가장 낮은 것 순으로)</h5>
            <table class="table table-hover table-condensed table table-bordered">
              <thead>
                <tr>
                  <td>연산자</td><td>연산</td><td>예제</td><td>평가 값</td>
                </tr>
              </thead>
              <tbody>
                <tr><td>**</td><td>지수</td><td>2**3</td><td>8</td></tr>
                <tr><td>%</td><td>모듈러스/나머지</td><td>22%8</td><td>2</td></tr>
                <tr><td>//</td><td>정수 나누기/나머지를 버림</td><td>22//8</td><td>2</td></tr>
                <tr><td>/</td><td>나누기</td><td>22/8</td><td>2.75</td></tr>
                <tr><td>*</td><td>곱하기</td><td>3*5</td><td>15</td></tr>
                <tr><td>-</td><td>빼기</td><td>5-2</td><td>3</td></tr>
                <tr><td>+</td><td>더하기</td><td>2+2</td><td>4</td></tr>
              </tbody>
            </table>
          </p>

          <p>
            <h5><strong>■ 표 1-2 널리 쓰이는 데이터 유형</strong></h5>
            <table class="table table-hover table-condensed table table-bordered center">
              <thead>
                <tr><td>데이터 유형</td><td>예</td></tr>
              </thead>
              <tbody>
                <tr><td>정수(Integer)</td><td>-2, -1, 0, 1, 2, 3, 4, 5</td></tr>
                <tr><td>부동소수점 숫자(Floating-point number)</td><td>-1.25, -1.0, --0.5, 0.0, 0.5, 1.0, 1.25</td></tr>
                <tr><td>문자열(String)</td><td>'a', 'aa', 'aaa', 'Hello!', '11 cats'</td></tr>
              </tbody>
            </table>
          </p>

          <p>
            <h5><strong>■ 문자열 연결 및 복제</strong></h5>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#483d8b">'Alice'</font>&nbsp;+&nbsp;<font color="#483d8b">'Bob'</font><br/><font color="#483d8b">'AliceBob'</font></blockquote></code></pre>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#483d8b">'Alice'</font>&nbsp;*&nbsp;<font color="#ff4500">5</font><br/><font color="#483d8b">'AliceAliceAliceAliceAlice'</font></blockquote></code></pre>
            <p>문자열과 정수의 결합할 경우 아래와 같이 에러 발생</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#483d8b">'Alice'</font>&nbsp;+&nbsp;<font color="#ff4500">42</font><br/>Traceback&nbsp;<font>&#40;</font>most&nbsp;recent&nbsp;call&nbsp;last<font>&#41;</font>:<br/>&nbsp;&nbsp;&nbsp;File&nbsp;<font color="#483d8b">&quot;&lt;pyshell#26&gt;&quot;</font><font color="#66cc66">,</font>&nbsp;line&nbsp;<font color="#ff4500">1</font><font color="#66cc66">,</font>&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#66cc66">&lt;</font>module<font color="#66cc66">&gt;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'Alice'</font>&nbsp;+<font color="#ff4500">42</font><br/><font color="#008000">TypeError</font>:&nbsp;Can<font color="#483d8b">'t&nbsp;convert&nbsp;'</font><font color="#008000">int</font><font color="#483d8b">'&nbsp;object&nbsp;to&nbsp;str&nbsp;implicitly</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ 변수에 값 저장하기</strong></h5>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">40</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam<br/><font color="#ff4500">40</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;eggs&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">2</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;+&nbsp;eggs<br/><font color="#ff4500">42</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;+&nbsp;eggs&nbsp;+&nbsp;spam<br/><font color="#ff4500">82</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;spam&nbsp;+&nbsp;<font color="#ff4500">2</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam<br/><font color="#ff4500">42</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">'Hello'</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam<br/><font color="#483d8b">'Hello'</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">'Goodbye'</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam<br/><font color="#483d8b">'Goodbye'</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ 표 1-3 유효한 변수 이름과 잘못된 변수 이름</strong></h5>
            <table class="table table-hover table-condensed table table-bordered center">
              <thead>
                <tr><td>유효한 변수 이름</td><td>잘못된 변수 이름</td></tr>
              </thead>
              <tbody>
                <tr><td>balance</td><td>current-balance (하이픈은 허용되지 않는다)</td></tr>
                <tr><td>currentBalance</td><td>current balance (빈칸은 허용되지 않는다)</td></tr>
                <tr><td>current_balance</td><td>4account (숫자로 시작되어서는 안 된다)</td></tr>
                <tr><td>_spam</td><td>42 (숫자로 시작되어서는 안 된다)</td></tr>
                <tr><td>SPAM</td><td>total_$um ($ 같은 특수 기호는 허용되지 않는다)</td></tr>
                <tr><td>account4</td><td>'hello' ('같은 특수 기호는 허용되지 않는다)</td></tr>
              </tbody>
            </table>
          </p>

          <p>
            <h5><strong>■ 주석</strong></h5>
            <pre><code class="python"><blockquote><font color="#808080">#&nbsp;This&nbsp;program&nbsp;says&nbsp;hello&nbsp;and&nbsp;asks&nbsp;for&nbsp;my&nbsp;name.</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ 관련 메소드</strong></h5>
            <ul>
              <li><strong>print()</strong> : print() 함수는 괄호 안의 값을 화면에 표시한다.</li>
              <li><strong>input()</strong> : input() 함수는 사용자가 키보드로 텍스트를 입력하고 Enter 키를 누를 때까지 기다린다.</li>
              <li><strong>len()</strong> : len() 함수는 문자열 또는 문자열을 포함하는 변수를 인자로 받아서, 해당 문자열의 문자 개수를 정수값으로 평가한다.</li>
              <li><strong>str()</strong> : str() 함수는 인자로 받은 값의 데이터 유형을 문자열 값으로 반환한다.</li>
              <li><strong>int()</strong> : int() 함수는 인자로 받은 값의 데이터 유형을 정수 값으로 반환한다.</li>
              <li><strong>float()</strong> : float() 함수는 인자로 받은 값의 데이터 유형을 부동 소수점 값으로 반환한다.</li>
            </ul>
          </p>

          <p>
            <h5><strong><a href="/book/02/24#ch1">■ 연습 문제</a></strong></h5>
            <ul>
              <li>1. 다음 중 무엇이 연산자이고 무엇이 값인가?</li>
              <pre><code class="python"><blockquote>*<br/><font color="#483d8b">'hello'</font><br/>-<font color="#ff4500">88.8</font><br/>-<br/>/<br/>+<br/><font color="#ff4500">5</font></blockquote></code></pre>
              <li>2. 다음 중 무엇이 변수고 무엇이 값인가?</li>
              <pre><code class="python"><blockquote>spam<br/><font color="#483d8b">'spam'</font></blockquote></code></pre>
              <li>3. 세 가지 데이터 유형의 이름은 무엇인가?</li>
              <li>4. 표현식은 무엇으로 구성되는가? 표현식이 하는 일은 무엇인가?</li>
              <li>5. 이 장에서는 spam = 10 와 같은 할당문을 소개했다. 표현식과 문장의 차이점은 무엇인가?</li>
              <li>6. 다음 코드가 실행 된 후 변수 bacon 에는 무엇이 저장되어 있을까?</li>
              <pre><code class="python"><blockquote>bacon&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">20</font><br/>bacon&nbsp;+&nbsp;<font color="#ff4500">1</font></blockquote></code></pre>
              <li>7. 다음 두 표현식은 어떻게 평가될까?</li>
              <pre><code class="python"><blockquote><font color="#483d8b">'spam'</font>&nbsp;+&nbsp;<font color="#483d8b">'spamspam'</font><br/><font color="#483d8b">'spam'</font>&nbsp;*&nbsp;<font color="#ff4500">3</font></blockquote></code></pre>
              <li>8. eggs 는 유효한 변수 이름인데 반해 100은 잘못된 변수 이름인 이유는 무엇인가?</li>
              <li>9. 어떤 값의 정수, 부동 소수점 숫자, 또는 문자열 버전을 얻기 위해 이용될 수 있는 세 가지 함수는 무엇인가?</li>
              <li>10. 왜 이 표현식은 오류를 일으킬까? 어떻게 문제를 해결할 수 있을까?</li>
              <pre><code class="python"><blockquote><font color="#483d8b">'I&nbsp;have&nbsp;eaten&nbsp;'</font>&nbsp;+&nbsp;<font color="#ff4500">99</font>&nbsp;+&nbsp;<font color="#483d8b">'&nbsp;burritos.'</font></blockquote></code></pre>
            </ul>
          </p>
        </article>
      </section>
    </div>
