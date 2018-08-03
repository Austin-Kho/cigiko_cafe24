    <h3 class="page-header">{{$sub[$id][1]}}</h3>
    <div class="chapter">
      <section>
        <article class="">
          <p>
            <h4><strong>■ 문자열 다루기</strong></h4>
            <p>파이썬이 문자열을 작성하고, 출력하고, 사용하는 몇 가지 방법을 알아보자.</p>
          </p>

          <p>
            <h5><strong>▶ 문자열 리터럴</strong></h5>
            <p>파이썬 코드에서 문자열 값 입력은 기본적으로 홑따옴표로 시작하고 홑따옴표로 끝난다. 그러나 문자열 안에 따옴표를 입력하여야 할 경우 다른 방식이 필요하다.</p>
            <p><strong>• 겹따옴표</strong> : 문자열은 홑따옴표를 쓰는 방식과 마찬가지로 겹따옴표로도 시작하고 끝맺을 수 있다. 겹따옴표를 사용하는 이점 중 하나는 문자열 안에 홑따옴표를 둘 수 있다는 것이다.</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;That&nbsp;is&nbsp;Alice's&nbsp;cat.&quot;</font></blockquote></code></pre>
            <p><strong>• 이스케이프 문자</strong> : 하지만 문자열 안에 홑따옴표와 겹따옴표를 모두 사용해야 한다면 이스케이프 문자를 사용해야 한다. 이스케이프 문자는 백슬래시(\) 다음에 문자열에 넣고 싶은 글자를 두는 방식으로 구성된다.(두 글자로 이루어졌지만 보통은 한 개의 이스케이프 문자로 간주된다.)</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">'Say&nbsp;hi&nbsp;to&nbsp;Bob<font color="#000099">\'</font>s&nbsp;mother.'</font></blockquote></code></pre>
            <h5><strong>•• 표 6-1 이스케이프 문자</strong></h5>
            <table class="table table-hover table-condensed table table-bordered">
              <thead>
                <tr>
                  <td>이스케이프 문자</td><td>출력되는 글자</td>
                </tr>
              </thead>
              <tbody>
                <tr><td>\'</td><td>홑따옴표</td></tr>
                <tr><td>\"</td><td>겹따옴표</td></tr>
                <tr><td>\t</td><td>탭</td></tr>
                <tr><td>\n</td><td>줄바꿈</td></tr>
                <tr><td>\\</td><td>백슬래쉬</td></tr>
              </tbody>
            </table>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Hello&nbsp;there!<font color="#000099">\n</font>How&nbsp;are&nbsp;you?<font color="#000099">\n</font>I<font color="#000099">\'</font>m&nbsp;doing&nbsp;fine.&quot;</font><font>&#41;</font><br/>Hello&nbsp;there<font color="#66cc66">!</font><br/>How&nbsp;are&nbsp;you?<br/>I<font color="#483d8b">'m&nbsp;doing&nbsp;fine.</font></blockquote></code></pre>
            <p><strong>• 원시 문자열</strong> : 문자열을 시작하는 따옴표 앞에 r을 놓으면 문자열을 원시 문자열로 만들 수 있다. 원시 문자열은 모든 이스케이프 문자을 완전히 무시하고 문자열에 나타나는 백슬래시를 인쇄한다.</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font>r<font color="#483d8b">'That&nbsp;is&nbsp;Carol<font color="#000099">\'</font>s&nbsp;cat.'</font><font>&#41;</font><br/>That&nbsp;<font color="#ff7700">is</font>&nbsp;Carol\<font color="#483d8b">'s&nbsp;cat.</font></blockquote></code></pre>
            <p>위 문자열은 원시 문자열이기 때문에 파이썬은 백스래시를 문자열의 일부가 아니라 이스케이프 문자의 시작으로 간주한다. 정규표현식을 사용하는 문자열과 같이 백슬래시가 많이 들어 있는 문자열을 입력할 때에는 원시 문자열이 도움이 된다.</p>


            <p><strong>• 세겹 따옴표를 사용하는 여러 줄에 걸친 문자열</strong> : 파이썬에서 여러 줄 문자열은 세 개의 홑따옴표나 세 개의 겹따옴표로 시작하고 끝난다. 세겹 따옴표 사이의 모든 따옴표, 탭, 또는 줄바꿈은 문자열의 일부로 간주된다. 블록에 대한 파이썬의 들여쓰기 규칙은 여러 줄 문자열 안에 있는 줄들에는 적용되지 않는다.</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'''Dear&nbsp;Alice,<br/>&nbsp;<br/>Eve's&nbsp;cat&nbsp;has&nbsp;been&nbsp;arrested&nbsp;for&nbsp;catnapping,&nbsp;cat&nbsp;burglary,&nbsp;and&nbsp;extortion.<br/>&nbsp;<br/>Sincerely,<br/>Bob'''</font><font>&#41;</font></blockquote></code></pre>
            <p><strong>• 여러 줄 주석</strong> : 해시 문자(#)는 그 줄의 나머지 부분에 대한 주식의 시작을 표시하는 반면, 여러 줄에 걸친 문자열을 여러 줄에 걸친 주석에 사용할 때도 있다. </p>
            <pre><code class="python"><blockquote><font color="#483d8b">&quot;&quot;&quot;This&nbsp;is&nbsp;a&nbsp;test&nbsp;Python&nbsp;program.<br/>Written&nbsp;by&nbsp;Al&nbsp;Sweigart&nbsp;al@inventwithpython.com<br/>&nbsp;<br/>This&nbsp;program&nbsp;was&nbsp;designed&nbsp;for&nbsp;Python&nbsp;3,&nbsp;not&nbsp;Python&nbsp;2.<br/>&quot;&quot;&quot;</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>▶ 문자열 인덱스와 슬라이스</strong></h5>
            <p>문자열은 리스트처럼 인덱스와 슬라이스를 사용한다.</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">'Hello&nbsp;world!'</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam<font>&#91;</font><font color="#ff4500">0</font><font>&#93;</font><br/><font color="#483d8b">'H'</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam<font>&#91;</font><font color="#ff4500">4</font><font>&#93;</font><br/><font color="#483d8b">'o'</font><br/>spam<font>&#91;</font>-<font color="#ff4500">1</font><font>&#93;</font><br/><font color="#483d8b">'!'</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam<font>&#91;</font><font color="#ff4500">0</font>:<font color="#ff4500">5</font><font>&#93;</font><br/><font color="#483d8b">'Hello'</font><br/>spam<font>&#91;</font>:<font color="#ff4500">5</font><font>&#93;</font><br/><font color="#483d8b">'Hello'</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam<font>&#91;</font><font color="#ff4500">6</font>:<font>&#93;</font><br/><font color="#483d8b">'world!'</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>▶ 문자열에 in 또는 not in 연산자 사용하기</strong></h5>
            <p>문자열은 리스트처럼 in 또는 not in 연산자를 쓸 수 있다. 이 표현식은 부울 True 또는 False 값으로 평가된다.</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#483d8b">'Hello'</font>&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#483d8b">'Hello&nbsp;World'</font><br/><font color="#008000">True</font><br/><font color="#483d8b">'Hello'</font>&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#483d8b">'Hello'</font><br/><font color="#008000">True</font><br/><font color="#483d8b">'HELLO'</font>&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#483d8b">'Hello&nbsp;World'</font><br/><font color="#008000">False</font><br/><font color="#483d8b">''</font>&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#483d8b">'spam'</font><br/><font color="#008000">True</font><br/><font color="#483d8b">'cats'</font>&nbsp;<font color="#ff7700">not</font>&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#483d8b">'cats&nbsp;and&nbsp;dogs'</font><br/><font color="#008000">False</font></blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ 관련 모듈</strong></h5>
            <ul>
              <li><strong>import pyperclip</strong> : pyperclip 모듈은 컴퓨터의 클립보드로 텍스트를 보내거나 클립보드에서 텍스트를 가지고 올 수 있는 copy(), paste() 함수를 가지고 있다. 프로그램의 출력을 클립보드로 보내면 이메일, 워드프로세서 또는 다른 소프트웨어에 텍스트를 쉽게 붙여 넣을 수 있다.
                <br>pyperclip 모듈은 python에 들어있지 않다. 각 OS별 타사 모듈 설치 가이드를 따라야 한다.</li>
            </ul>

            <h5><strong>■ 관련 메소드</strong></h5>
            <ul>
              <li><strong>upper()</strong> : upper() 함수는 문자열의 모든 글자를 대문자로 변환한 새로운 문자열을 돌려준다.</li>
              <li><strong>lower()</strong> : lower() 함수는 문자열의 모든 글자를 소문자로 변환한 새로운 문자열을 돌려준다.</li>
              <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">'Hello&nbsp;world!'</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;spam.<font>upper</font><font>&#40;</font><font>&#41;</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam<br/><font color="#483d8b">'HELLO&nbsp;WORLD!'</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;spam.<font>lower</font><font>&#40;</font><font>&#41;</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam<br/><font color="#483d8b">'hello&nbsp;world!'</font></blockquote></code></pre>
              <li><strong>isupper()</strong> : isupper() 함수는 문자열이 모두 대문자로 이루어져 있다면 부울 값 True 를 돌려준다. 모두 숫자면 False.</li>
              <li><strong>islower()</strong> : islower() 함수는 문자열이 모두 소문자로 이루어져 있다면 부울 값 True 를 돌려준다. 모두 숫자면 False.</li>
              <li><strong>startswith()</strong> : startswith() 함수는 호출한 문자열 값이 메소드에 전달된 문자열로 시작되면 True 그렇지 않으면 False 를 돌려준다.</li>
              <li><strong>endswith()</strong> : endswith() 함수는 호출한 문자열 값이 메소드에 전달된 문자열로 끝나면 True 그렇지 않으면 False 를 돌려준다.</li>
              <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#483d8b">'Hello&nbsp;world!'</font>.<font>startswith</font><font>&#40;</font><font color="#483d8b">'Hello'</font><font>&#41;</font><br/><font color="#008000">True</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#483d8b">'Hello&nbsp;world!'</font>.<font>endswith</font><font>&#40;</font><font color="#483d8b">'world!'</font><font>&#41;</font><br/><font color="#008000">True</font></blockquote></code></pre>
            </ul>
            <h5><strong>• isX 문자열 메소드</strong></h5>
            <ul>
              <li><strong>isalpha()</strong> : isalpha() 함수는 문자열이 (기호가 아닌) 문자로만 구성되어 있으며 빈칸이 없으면 True 를 반환한다.</li>
              <li><strong>isalnum()</strong> : isalnum() 함수는 문자열이 (기호가 아닌) 문자와 숫자로만 구성되어 있으며 빈칸이 없으면 True 를 반환한다.</li>
              <li><strong>isdecimal()</strong> : isdecimal() 함수는 문자열이 숫자로만 구성되어 있으며 빈칸이 없으면 True 를 반환한다.</li>
              <li><strong>isspace()</strong> : isspace() 함수는 문자열이 빈칸, 탭, 줄바꿈 문자로만 구성되어 있지만 비어 있지는 않으면 True 를 반환한다.</li>
            </ul>

            <h5><strong>• join() 과 split() 문자열 메소드</strong></h5>
            <ul>
              <li><strong>join()</strong> : join() 함수는 문자열로 이루어진 리스트를 하나의 문자열로 연결시켜 준다.</li>
              <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#483d8b">',&nbsp;'</font>.<font>join</font><font>&#40;</font><font>&#91;</font><font color="#483d8b">'cats'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'rats'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'bats'</font><font>&#93;</font><font>&#41;</font><br/><font color="#483d8b">'cats,&nbsp;rats,&nbsp;bats'</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#483d8b">'&nbsp;'</font>.<font>join</font><font>&#40;</font><font>&#91;</font><font color="#483d8b">'My'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'name'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'is'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'Simon'</font><font>&#93;</font><font>&#41;</font><br/><font color="#483d8b">'My&nbsp;name&nbsp;is&nbsp;Simon'</font></blockquote></code></pre>
              <li><strong>split()</strong> : split() 함수는 join() 과 반대로 문자열을 호출하여 문자열의 리스트를 돌려준다.</li>
              <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#483d8b">'My&nbsp;name&nbsp;is&nbsp;Simon'</font>.<font>split</font><font>&#40;</font><font>&#41;</font><br/><font>&#91;</font><font color="#483d8b">'My'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'name'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'is'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'Simon'</font><font>&#93;</font></blockquote></code></pre>
              <p>기본적으로 split() 에 호출되는 문자열은 빈칸, 탭, 또는 줄바꿈과 같은 공백 문자가 있는 곳에서 분리된다.</p>
            </ul>

            <h5><strong>• rjust(), ljust(), center() 메소드로 텍스트 정렬하기</strong></h5>
            <ul>
              <li><strong>rjust()</strong> : rjust() 함수는 이를 호출한 문자열을 오른쪽으로 정렬한 문자열을 돌려주며, 텍스트 정렬을 위해서 빈칸을 사용한다. 첫 번째 인수는 문자열 정렬을 위한 정수값 길이다. 두번째 인자가 있는 경우 빈칸을 대신해 채울 문자를 지정한다.</li>
              <li><strong>ljust()</strong> : ljust() 함수는 이를 호출한 문자열을 왼쪽으로 정렬한 문자열을 돌려주며, 텍스트 정렬을 위해서 빈칸을 사용한다. 첫 번째 인수는 문자열 정렬을 위한 정수값 길이다. 두번째 인자가 있는 경우 빈칸을 대신해 채울 문자를 지정한다.</li>
              <li><strong>center()</strong> : center() 함수는 이를 호출한 문자열을 가운데로 정렬한 문자열을 돌려주며, 텍스트 정렬을 위해서 빈칸을 사용한다. 첫 번째 인수는 문자열 정렬을 위한 정수값 길이다. 두번째 인자가 있는 경우 빈칸을 대신해 채울 문자를 지정한다.</li>
              <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#483d8b">'Hello'</font>.<font>rjust</font><font>&#40;</font><font color="#ff4500">10</font><font>&#41;</font><br/><font color="#483d8b">'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hello'</font><br/><font color="#483d8b">'Hello'</font>.<font>ljust</font><font>&#40;</font><font color="#ff4500">10</font><font>&#41;</font><br/><font color="#483d8b">'Hello&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'</font><br/><font color="#483d8b">'Hello'</font>.<font>center</font><font>&#40;</font><font color="#ff4500">20</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'.'</font><font>&#41;</font><br/><font color="#483d8b">'........Hello........'</font></blockquote></code></pre>
            </ul>

            <h5><strong>• strip(), rstrip(), lstrip() 메소드로 공백 없애기</strong></h5>
            <ul>
              <li><strong>strip()</strong> : strip() 함수는 문자열 양쪽 끝에 있는 공백문자(빈칸, 탭, 줄 바꿈)들을 제거한다. 선택사항으로 문자열 끝에서 제거되어야 할 글자들을 지정하는 하나의 문자열 매개변수를 지정할 수 있다.</li>
              <li><strong>rstrip()</strong> : rstrip() 함수는 문자열 오른쪽에 있는 공백문자(빈칸, 탭, 줄 바꿈)들을 제거한다. 선택사항으로 문자열 끝에서 제거되어야 할 글자들을 지정하는 하나의 문자열 매개변수를 지정할 수 있다.</li>
              <li><strong>lstrip()</strong> : lstrip() 함수는 문자열 왼쪽에 있는 공백문자(빈칸, 탭, 줄 바꿈)들을 제거한다. 선택사항으로 문자열 끝에서 제거되어야 할 글자들을 지정하는 하나의 문자열 매개변수를 지정할 수 있다.</li>
              <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hello&nbsp;World&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'</font><br/>spam.<font>strip</font><font>&#40;</font><font>&#41;</font><br/><font color="#483d8b">'Hello&nbsp;World'</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">'SpamSpamBaconSpamEggsSpamSpam'</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam.<font>strip</font><font>&#40;</font><font color="#483d8b">'ampS'</font><font>&#41;</font><br/><font color="#483d8b">'BaconSpamEggs'</font></blockquote></code></pre>
              <p>strip() 에 'ampS' 매개변수를 전달하면 spam에 저장되어 있는 문자열의 끝에 있는 a, m, p, S 를 제거하라고 지시하는 것이다. 글자의 순서는 중요치 않다. stirp('ampS')는 strip('mapS') 또는 strip('Spam')과 똑같은 일을 한다.</p>
            </ul>
          </p>

          <p>
            <h5><strong><a href="/book/02/24#ch6">■ 연습 문제</a></strong></h5>
            <ul>
              <li>1. 이스케이프 문자란 무엇인가?</li>
              <li>2. \n과 \t 이스케이프 문자는 무엇을 뜻하는가?</li>
              <li>3. 문자열에 \ 백슬래시 문자를 어떻게 넣을 수 있는가?</li>
              <li>4. 문자열 값 "Howl's Moving Castle"은 유효한 문자열이다. Howl's에 있는 따옴표가 이스케이프되지 않았는데 문제가 생기지 않는 이유는 무엇인가?</li>
              <li>5. 문자열에 \n을 넣고 싶지 않다면 줄바꿈을 넣는 문자열을 어떻게 만들 수 있는가?</li>
              <li>6. 다음 표현식은 어떻게 평가되는가?</li>
              <pre><code class="python"><blockquote><font color="#483d8b">'Hello&nbsp;world!'</font><font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font><br/><font color="#483d8b">'Hello&nbsp;world!'</font><font>&#91;</font><font color="#ff4500">0</font>:<font color="#ff4500">5</font><font>&#93;</font><br/><font color="#483d8b">'Hello&nbsp;world!'</font><font>&#91;</font>:<font color="#ff4500">5</font><font>&#93;</font><br/><font color="#483d8b">'Hello&nbsp;world!'</font><font>&#91;</font><font color="#ff4500">3</font>:<font>&#93;</font></blockquote></code></pre>
              <li>7. 다음 표현식은 어떻게 평가되는가?</li>
              <pre><code class="python"><blockquote><font color="#483d8b">'Hello'</font>.<font>upper</font><font>&#40;</font><font>&#41;</font><br/><font color="#483d8b">'Hello'</font>.<font>upper</font><font>&#40;</font><font>&#41;</font>.<font>isupper</font><font>&#40;</font><font>&#41;</font><br/><font color="#483d8b">'Hello'</font>.<font>upper</font><font>&#40;</font><font>&#41;</font>.<font>lower</font><font>&#40;</font><font>&#41;</font></blockquote></code></pre>
              <li>8. 다음 표현식은 어떻게 평가되는가?</li>
              <pre><code class="python"><blockquote><font color="#483d8b">'Remember,&nbsp;remember,&nbsp;the&nbsp;fifth&nbsp;of&nbsp;November.'</font>.<font>split</font><font>&#40;</font><font>&#41;</font><br/><font color="#483d8b">'-'</font>.<font>join</font><font>&#40;</font><font color="#483d8b">'There&nbsp;can&nbsp;be&nbsp;only&nbsp;one.'</font>.<font>split</font><font>&#40;</font><font>&#41;</font><font>&#41;</font></blockquote></code></pre>
              <li>9. 어떤 문자열 메소드를 사용하여 문자열을 오른쪽, 왼쪽, 가운데로 정렬할 수 있는가?</li>
              <li>10. 문자열의 시작 또는 끝에 있는 공백 문자를 어떻게 잘라낼 수 있는가?</li>
            </ul>
          </p>
        </article>
      </section>
    </div>

    <p>&nbsp;</p>
