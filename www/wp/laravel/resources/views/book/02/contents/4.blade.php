    <h3 class="page-header">{{$sub[$id][1]}}</h3>
    <div class="chapter">
      <section>
        <article class="">
          <p>
            <h5><strong>■ def 문과 매개변수</strong></h5>
            <p>파이썬은 여러 가지 내장 함수를 제공하지만 필요한 함수를 직접 만들어 쓸 수도 있다. 함수를 부를 때에는 괄호 안에 입력하는 방식으로 값을 전달하며, 이것을 매개변수라고 부른다.</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">def</font>&nbsp;hello<font>&#40;</font>name<font>&#41;</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'hello&nbsp;'</font>&nbsp;+&nbsp;name<font>&#41;</font><br/>&nbsp;<br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;hello<font>&#40;</font><font color="#483d8b">'Alice'</font><font>&#41;</font><br/>Hello&nbsp;Alice</blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ 반환값과 return 문</strong></h5>
            <p>함수 호출로 평가되는 값을 함수의 반환값이라고 한다. def 문을 사용해서 함수를 만들 때 반환값이 무엇인지를 return 문으로 지정할 수 있다. return 문은 다음과 같이 구성된다.</p>
            <p><strong>▶ 구성</strong> : return 키워드 + 함수가 돌려주어야 하는 값 또는 표현식</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">import</font>&nbsp;<font color="#dc143c">random</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">def</font>&nbsp;getAnswer<font>&#40;</font>answerNumber<font>&#41;</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">if</font>&nbsp;answerNumber&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">1</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#483d8b">'It&nbsp;is&nbsp;certain'</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">elif</font>&nbsp;answerNumber&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">2</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#483d8b">'It&nbsp;is&nbsp;decidedly&nbsp;so'</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">elif</font>&nbsp;answerNumber&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">3</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#483d8b">'Yes'</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">elif</font>&nbsp;answerNumber&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">4</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#483d8b">'Reply&nbsp;hazy&nbsp;try&nbsp;again'</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">elif</font>&nbsp;answerNumber&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">5</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#483d8b">'Ask&nbsp;again&nbsp;later'</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">elif</font>&nbsp;answerNumber&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">6</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#483d8b">'Concentrate&nbsp;and&nbsp;ask&nbsp;again'</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">elif</font>&nbsp;answerNumber&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">7</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#483d8b">'My&nbsp;reply&nbsp;is&nbsp;no'</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">elif</font>&nbsp;answerNumber&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">8</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#483d8b">'Outlook&nbsp;not&nbsp;so&nbsp;good'</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">elif</font>&nbsp;answerNumber&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">9</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#483d8b">'Very&nbsp;doubtful'</font><br/>&nbsp;<br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;r&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#dc143c">random</font>.<font>randint</font><font>&#40;</font><font color="#ff4500">1</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">9</font><font>&#41;</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;fortune&nbsp;<font color="#66cc66">=</font>&nbsp;getAnswer<font>&#40;</font>r<font>&#41;</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font>fortune<font>&#41;</font><br/>My&nbsp;reply&nbsp;<font color="#ff7700">is</font>&nbsp;no</blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ None 값</strong></h5>
            <p>파이썬에서 None 값은 값이 없음을 뜻하며, NoneType 데이터 유형의 유일한 값이다.(타 언어에서 null, nil 또는 undefined 등으로 쓰임) 부울 값 True 나 False 처럼 대문자로 시작되어야 한다.</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Hello!'</font><font>&#41;</font><br/>Hello<font color="#66cc66">!</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#008000">None</font>&nbsp;<font color="#66cc66">==</font>&nbsp;spam<br/><font color="#008000">True</font></blockquote></code></pre>
            <p>텍스트를 표시하지만 반환값을 돌려줘야할 필요가 없는 print() 함수는 None 값을 돌려준다. 내부적으로 파이썬은 return 문이 없는 모든 함수 정의 끝에 return None 을 추가한다. 반복문의 루프 끝이 암묵적으로 continue 문인 것과 비슷하며, 또한 값이 없이 return  문을 썼을 때에도(즉 return 키워드만 쓰면) None 이 반환된다.</p>
          </p>

          <p>
            <h5><strong>■ 키워드 매개변수와 print()</strong></h5>
            <p>print() 함수는 선택적 매개변수 end와 sep를 가지며 각각 매개변수 끝에, 매개변수 사이(구분을 위해)에 무엇이 출력되어야 하는지를 지정한다. 기본값은 각각 \n(줄바꿈문자)와 ' '(공백)이다.</p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Hello'</font><font>&#41;</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'World'</font><font>&#41;</font><br/>Hello<br/>World</blockquote></code></pre>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Hello'</font>&nbsp;end<font color="#66cc66">=</font><font color="#483d8b">''</font><font>&#41;</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'World'</font><font>&#41;</font><br/>HelloWorld</blockquote></code></pre>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'cats'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'dogs'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'mice'</font><font>&#41;</font><br/>cats&nbsp;dogs&nbsp;mice</blockquote></code></pre>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'cats'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'dogs'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'mice'</font><font color="#66cc66">,</font>&nbsp;sep<font color="#66cc66">=</font><font color="#483d8b">','</font><font>&#41;</font><br/>cats<font color="#66cc66">,</font>dogs<font color="#66cc66">,</font>mice</blockquote></code></pre>
          </p>

          <p>
            <h5><strong>■ 지역 및 전역 범위</strong></h5>
            <p> 함수에서 할당된 매개변수 및 변수는 그 함수의 <strong>지역 범위</strong> 안에 존재한다고 말한다. 모든 함수의 바깥에서 할당된 변수들은 <strong>전역 범위</strong>에 존재한다고 말한다.<br>
              변수는 둘 중 하나에 속하며 지역이면서 전역일 수 없다.
            </p>
            <p>
              <strong>▶ </strong> 전역 범위의 코드는 지역변수를 사용할 수 없다.<br>
              <strong>▶ </strong> 그러나 지역 범위는 전역변수를 사용할 수 있다.<br>
              <strong>▶ </strong> 함수의 지역 범위 안에 있는 코드는 다른 지역 범위의 변수를 사용할 수 없다.<br>
              <strong>▶ </strong> 범위가 서로 다르다면 같은 이름의 지역 변수를 사용할 수 있다. 즉, spam이라는 이름의 지역변수와 spam이라는 이름의 전역변수가 있을 수 있다.
            </p>
            <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">def</font>&nbsp;spam<font>&#40;</font><font>&#41;</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;eggs&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">31337</font><br/>&nbsp;<br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam<font>&#40;</font><font>&#41;</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font>eggs<font>&#41;</font><br/>Traceback&nbsp;<font>&#40;</font>most&nbsp;recent&nbsp;call&nbsp;last<font>&#41;</font>:<br/>&nbsp;&nbsp;File&nbsp;<font color="#483d8b">&quot;&lt;pyshell#4&gt;&quot;</font><font color="#66cc66">,</font>&nbsp;line&nbsp;<font color="#ff4500">1</font><font color="#66cc66">,</font>&nbsp;<font color="#ff7700">in</font>&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>eggs<font>&#41;</font><br/><font color="#008000">NameError</font>:&nbsp;name&nbsp;<font color="#483d8b">'eggs'</font>&nbsp;<font color="#ff7700">is</font>&nbsp;<font color="#ff7700">not</font>&nbsp;defined</blockquote></code></pre>
            <p>
              <strong>▶ global 문</strong> : 함수 안에서 전역변수를 수정해야 한다면 global 문을 사용한다.<br>
              함수의 첫머리에서 global eggs와 같은 줄이 있다면 이는 파이썬에게 '이 함수에서 eggs 변수는 전역변수를 참조하는 것이며 따라서 이 이름으로는 지역변수를 만들지 말라.'고 알려 주는 것이다.<br>
              <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">def</font>&nbsp;spam<font>&#40;</font><font>&#41;</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;globas&nbsp;eggs<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;eggs&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">'spam'</font><br/>&nbsp;<br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;eggs&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">'global'</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;spam<font>&#40;</font><font>&#41;</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font>eggs<font>&#41;</font><br/>spam</blockquote></code></pre>
            </p>

            <p>
              <h5><strong>■ 예외 처리</strong></h5>
              <p>'0으로 나누기'오류가 나는 다음 프로그램을 보자.</p>
              <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">def</font>&nbsp;spam<font>&#40;</font>divideBy<font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#ff4500">42</font>&nbsp;/&nbsp;divideBy<br/>&nbsp;<br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font>spam<font>&#40;</font><font color="#ff4500">2</font><font>&#41;</font><font>&#41;</font><br/><font color="#ff4500">21.0</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font>spam<font>&#40;</font><font color="#ff4500">12</font><font>&#41;</font><font>&#41;</font><br/><font color="#ff4500">3.5</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font>spam<font>&#40;</font><font color="#ff4500">0</font><font>&#41;</font><font>&#41;</font><br/>Traceback&nbsp;<font>&#40;</font>most&nbsp;recent&nbsp;call&nbsp;last<font>&#41;</font>:<br/>&nbsp;&nbsp;File&nbsp;<font color="#483d8b">&quot;&lt;stdin&gt;&quot;</font><font color="#66cc66">,</font>&nbsp;line&nbsp;<font color="#ff4500">1</font><font color="#66cc66">,</font>&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#66cc66">&lt;</font>module<font color="#66cc66">&gt;</font><br/>&nbsp;&nbsp;File&nbsp;<font color="#483d8b">&quot;&lt;stdin&gt;&quot;</font><font color="#66cc66">,</font>&nbsp;line&nbsp;<font color="#ff4500">2</font><font color="#66cc66">,</font>&nbsp;<font color="#ff7700">in</font>&nbsp;spam<br/><font color="#008000">ZeroDivisionError</font>:&nbsp;division&nbsp;by&nbsp;zero<br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font>spam<font>&#40;</font><font color="#ff4500">1</font><font>&#41;</font><font>&#41;</font><br/><font color="#ff4500">42.0</font></blockquote></code></pre>
              <p>try 절에서 원래 실행할 코드블록을 적고 except 키워드와 에러명을 적은 절에 에러시에 실행할 코드를 적는다. </p>
              <pre><code class="python"><blockquote><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">def</font>&nbsp;spam<font>&#40;</font>divideBy<font>&#41;</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">try</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#ff4500">42</font>&nbsp;/&nbsp;divideBy<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">except</font>&nbsp;<font color="#008000">ZeroDivisionError</font>:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Error:&nbsp;Invalid&nbsp;argument.'</font><font>&#41;</font><br/>&nbsp;<br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font>spam<font>&#40;</font><font color="#ff4500">2</font><font>&#41;</font><font>&#41;</font><br/><font color="#ff4500">21.0</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font>spam<font>&#40;</font><font color="#ff4500">12</font><font>&#41;</font><font>&#41;</font><br/><font color="#ff4500">3.5</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font>spam<font>&#40;</font><font color="#ff4500">0</font><font>&#41;</font><font>&#41;</font><br/>Error:&nbsp;Invalid&nbsp;argument.<br/><font color="#008000">None</font><br/><font color="#66cc66">&gt;&gt;&gt;</font>&nbsp;<font color="#ff7700">print</font><font>&#40;</font>spam<font>&#40;</font><font color="#ff4500">1</font><font>&#41;</font><font>&#41;</font><br/><font color="#ff4500">42.0</font></blockquote></code></pre>
            </p>
          </p>

          <p>
            <h5><strong><a href="/book/02/24#ch3">■ 연습 문제</a></strong></h5>
            <ul>
              <li>1. 함수가 프로그램에 도움이 되는 이유는 무엇인가?</li>
              <li>2. 언제 함수 안의 코드가 실행되는가? 함수가 정의될 때인가, 아니면 함수가 호출될 때인가?</li>
              <li>3. 함수를 만드는 명령문은 무엇인가?</li>
              <li>4. 함수와 함수 호출의 차이점은 무엇인가?</li>
              <li>5. 파이썬 프로그램에는 얼마나 많은 전역 범위가 있는가? 지역 범위는 얼마나 많이 있는가?</li>
              <li>6. 지역 범위 안에 있는 변수는 함수 호출이 끝나면 어떻게 되는가?</li>
              <li>7. 반환 값이란 무엇인가? 반환 값은 표현식의 일부가 될 수 있는가?</li>
              <li>8. 함수에 return 문이 없다면 그 함수 호출의 반환값은 무엇인가?</li>
              <li>9. 함수 안에 있는 변수가 전역 변수를 참조하도록 강제할 수 있는 방법은 무엇인가?</li>
              <li>10. None 데이터 유형은 무엇인가?</li>
              <li>11. import areallyourpetsnamederic 문은 어떤 일을 하는가?</li>
              <li>12. spam 이라는 이름의 모듈 안에 bacon() 이라는 이름의 함수가 있다면 spam 모듈을 가져온 다음에 어떻게 이 함수를 부를 수 있을까?</li>
              <li>13. 오류가 일어났을 때 프로그램이 멈춰버리는 문제를 막으려면 어떻게 해야 하는가?</li>
              <li>14. try 절에서는 어떤 일이 일어나는가? except 절에서는 어떤일이 일어나는가?</li>
            </ul>
          </p>
        </article>
      </section>
    </div>
