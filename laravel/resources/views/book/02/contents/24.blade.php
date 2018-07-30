    <h3 class="page-header">{{$sub[$id][1]}}</h3>
    <div class="chapter">
      <section>
        <article class="">
          <p>각 장의 끝에 있는 연습문제에 대한 해답이다. 시간을 내서 이들 문제를 풀어보기를 강력하게 권한다. 프로그래밍 구문과 함수 이름의 목록을 기억하는 것이 다가 아니다. 외국어를 배울 때처럼 더 많이 사용해 볼 수록 더 많은 것을 알 수 았다. 연습 프로그래밍 문제를 제공하는 많은 웹사이트들도 찾을 수 았다. <a href="http://nostarch.com/automatestuff/" target="_blank">http://nostarch.com/automatestuff/</a> 에서 이러한 사이트의 목록을 찾을 수 있다.</p>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제1장 파이썬 기초</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
            <li><code>+</code>, <code>-</code>, <code>*</code>, <code>/</code> 는 연산자다. <code>'hello'</code>, <code>-88.8</code>, <code>5</code> 는 값이다.</li>
            <li><code>'spam'</code> 은 문자열이고, <code>spam</code> 은 변수다. 문자열은 항상 따옴표로 시작하고 끝난다.</li>
            <li>이 장에서 소개된 세 가지 데이터 유형은 정수, 부동소수점 숫자 및 문자열이다.</li>
            <li>표현식은 값과 연산자의 조합이다. 모든 표현식은 단일 값으로 평가(즉 축소)된다.</li>
            <li>표현식은 단일 값으로 평가된다. 구문은 그렇지 않다.</li>
            <li><code>bacon</code> 변수는 20으로 설정되어 있다. <code>bacon + 1</code> 표현식은 결과값을 다시 <code>bacon</code>에 할당하지 않는다(다시 할당하려면 할당문이 필요하다. 즉, <code>bacon = bacon + 1</code>).</li>
            <li>두 표현식 문자열 <code>'spamspamspam'</code>으로 평가된다.</li>
            <li>변수 이름은 숫자로 시작할 수 없다.</li>
            <li><code>int()</code>, <code>float()</code>, <code>str()</code> 함수는 각각 전달 받은 값의 정수, 부동소수점, 문자열 버전으로 평가된다.</li>
            <li><code>99</code> 는 정수이기 때문에 표현식에 오류가 난다. 오로지 문자열만이 다른 문자열에 + 연산자로 연결될 수 있다. 올바른 방법은 <code>'I have eaten ' + str(99) + ' burritos'</code> 이다.</li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제2장 흐름 제어</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
            <li><code>True</code> 와 <code>False</code>, 첫 글자는 대문자로 T와 F를 사용하며 나머지 글자는 소문자다.</li>
            <li><code>and</code>, <code>or</code>, <code>not</code>.</li>
            <li><code>True and True</code> 는 <code>True</code> 다.<br><code>True and False</code> 는 <code>False</code> 다.<br><code>False and True</code> 는 <code>False</code> 다.<br><code>False and False</code> 는 <code>False</code> 다.<br><code>True or True</code> 는 <code>True</code> 다.<br><code>True or False</code> 는 <code>True</code> 다.<br><code>False or True</code> 는 <code>True</code> 다.<br><code>False or False</code> 는 <code>False</code> 다.<br><code>not True</code> 는 <code>False</code> 다.<br><code>not False</code> 는 <code>True</code> 다.</li>



            <li><code>False</code><br><code>False</code><br><code>True</code><br><code>False</code><br><code>False</code><br><code>True</code></li>
            <li><code>==</code>, <code>!=</code>, <code><</code>, <code>></code>, <code><=</code>, <code>>=</code></li>
            <li><code>==</code> 는 두 개의 값을 비교하여 부울 값을 돌려주는 같음 연산자이며, <code>=</code> 는 값을 변수에 저장하는 할당 연산자이다.</li>
            <li>조건은 흐름 제어문에서 사용되는 표현식으로 부울 값으로 평가된다.</li>
            <li>세 블록은 <code>if</code> 문 안에 있는 모든 코드, <code>print('bacon')</code>과 <code>print('ham')</code>이 있는 줄이다.
              <pre class="python"><code><blockquote><ol><li><font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'eggs'</font><font>&#41;</font></li><li><font color="#ff7700">if</font>&nbsp;spam&nbsp;<font color="#66cc66">&gt;</font>&nbsp;<font color="#ff4500">5</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'bacon'</font><font>&#41;</font></li><li><font color="#ff7700">else</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'ham'</font><font>&#41;</font></li><li><font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'spam'</font><font>&#41;</font></li></ol></blockquote></code></pre>
            </li>
            <li>코드는 다음과 같다.
                <pre class="python"><code><blockquote><ol><li><font color="#ff7700">if</font>&nbsp;spam&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">1</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Hello'</font><font>&#41;</font></li><li><font color="#ff7700">elif</font>&nbsp;spam&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">2</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Howdy'</font><font>&#41;</font></li><li><font color="#ff7700">else</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'Greetings!'</font><font>&#41;</font></li></ol></blockquote></code></pre>
            </li>
            <li>무한 루프에 갇힌 프로그램을 중지하려면 <kbd>Ctrl</kbd> + <kbd>C</kbd>를 누른다.</li>
            <li>break 문은 실행을 바깥쪽, 루프의 바로 다음으로 옮긴다. continue 문은 실행을 루프의 시작 지점으로 옮긴다.</li>
            <li>모두 같은 일을 한다. <code>range(10)</code> 호출은 0에서 10까지(하지만 10은 포함하지 않는다)이며, <code>range(0, 10)</code>은 루프가 0에서 시작된다는 것을 명시하며, <code>range(0, 10, 1)</code>은 루프가 각 반복마다 1씩 증가한다는 것을 명시한다.</li>
            <li>코드는 다음과 같다.
                <pre class="python"><code><blockquote><ol><li><font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#008000">range</font><font>&#40;</font><font color="#ff4500">1</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">11</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>i<font>&#41;</font></li></ol></blockquote></code></pre>
                그리고:
                <pre class="python"><code><blockquote><ol><li>i&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">1</font></li><li><font color="#ff7700">while</font>&nbsp;i&nbsp;<font color="#66cc66">&lt;=</font>&nbsp;<font color="#ff4500">10</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>i<font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;i&nbsp;<font color="#66cc66">=</font>&nbsp;i&nbsp;+&nbsp;<font color="#ff4500">1</font></li></ol></blockquote></code></pre>
            </li>
            <li>이 함수는 <code>spam.bacon()</code>으로 호출될 수 있다.</li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제3장 함수</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li>함수는 코드의 중복의 필요성을 줄여준다. 그에 따라 프로그램이 짧아지고, 읽기 쉬워지며, 업데이트하기 쉬워진다.</li>
              <li>함수 안의 코드는 함수가 정의될 때가 아니라 호출될 때 실행된다.</li>
              <li>def 문은 함수를 정의한다.(즉, 함수를 만든다.)</li>
              <li>함수는 <code>def</code> 문 및 <code>def</code> 절 안에 있는 코드로 구성된다. 함수 호출은 프로그램 실행을 함수 안으로 옮기고, 함수 호출은 함수가 돌려주는 값으로 평가된다.</li>
              <li>하나의 전역 범위가 있으며, 함수가 호출될 때마다 하나의 지역 범위가 만들어진다.</li>
              <li>함수가 종료되면 지역 범위는 없어지며, 그 안의 모든 변수도 사라진다.</li>
              <li>반환값은 함수 호출이 평가되는 값이다. 임의의 값과 마찬가지로 반환값은 표현식의 일부로 사용될 수 있다.</li>
              <li>함수에 <code>return</code> 문이 없는 경우, 반환값은 <code>None</code> 이다.</li>
              <li><code>global</code> 문은 함수 안에 있는 변수가 전역 변수를 참조하도록 강제한다.</li>
              <li><code>None</code> 의 데이터 유형은 None Type 이다.</li>
              <li>이 <code>import</code> 문은 <code>areallyourpetsnamederic</code> 이라는 이름의 모듈울 가져온다, (그런데 이 이름은 실제 파이썬 모듈의 것은 아니다.)</li>
              <li>이 함수는 <code>spam.bacon()</code>으로 호출할 수 있다.</li>
              <li>시도 절에 오류가 발생할 수 있다. 코드 줄을 놓는다.</li>
              <li>잠재적으로 오류가 발생할 수 있는 코드는 시도 절에 간다. 오류가 발생하는 경우 실행 코드는 절을 제외하고 간다.</li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제4장 리스트</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li>항목이 포함되지 않은 리스트, 즉 빈 리스트 값이다. 이는 빈 문자열 값이 ''인 것과 비슷하다.</li>
              <li><code>spam[2] = 'hello'</code> (리스트 안에 세 번째 값은 인덱스가 2라는 것에 유의한다. 첫 번째 인덱스가 0이기 때문이다.)</li>
              <li>'d' ('3' * 2 는 문자열 '33'이라는 것에 유의한다. 11로 나눠지기 전, 문자열 '33'이 int()로 전달되었다. 결과적으로는 3으로 평가된다. 값이 사용되는 곳이라면 어디든 표현식을 사용할 수 있다.)</li>
              <li>'d' (음수 인덱스는 끝에서부터 거꾸로 세어 나간다.)</li>
              <li>['a', 'b']</li>
              <li>1</li>
              <li>[3.14, 'cat', 11, 'cat', True, 99]</li>
              <li>[3.14, 11, 'cat', True]</li>
              <li>리스트를 연결하는 연산자는 <code>+</code> 이며, 복제하는 연산자는 <code>*</code> 이다.(문자열과 같다.)</li>
              <li><code>append(</code>)는 리스트의 끝에 값을 추가하지만 <code>insert()</code> 는 리스트의 어디든 값을 추가할 수 있다.</li>
              <li>리스트에서 값을 없애는 두 가지 방법은 del 문과 remove() 리스트 메소드다</li>
              <li>리스트의 문자열 모두 <code>len()</code> 에 전달될 수 있으며, 인덱스와 슬라이스를 가질 수 있으며, <code>for</code> 루프에서 사용될 수 있으며, 연결이나 복제를 할 수 있으며, <code>in</code> 과 <code>not in</code> 연산자를 사용할 수 있다.</li>
              <li>리스트는 변경할 수 있다. 리스트는 값을 추가, 제거 또는 변경할 수 있다. 튜플은 변경할 수 없다. 절대로 변경될 수 없다. 또한 튜플은 괄호(<code>(</code>, <code>)</code>)를 기호로 사용하는 반면 리스트는 대괄호(<code>[</code>, <code>]</code>)를 기호로 사용한다.</li>
              <li><code>(42,)</code> (뒤에 쉼표는 필수다.)</li>
              <li>각각 <code>tuple()</code>과 <code>list()</code>함수다.</li>
              <li>리스트 값에 대한 참조를 포함한다.</li>
              <li><code>copy.copy()</code> 함수는 얕은 수준의 복사를 하지만 <code>copy.deepcopy()</code> 함수는 깊은 수준의 복사를 한다. 즉, <code>copy.deepcopy()</code> 만이 리스트 안의 모든 리스트를 복사한다.</li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제5장 사전 및 구조화 데이터</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li>두 개의 중괄호 : {}</li>
              <li>{'foo':42}</li>
              <li>사전에서는 항목이 순서 없이 저장되는 반면 리스트 안의 항목은 순서가 있다.</li>
              <li>KeyError 오류를 만나게 된다.</li>
              <li>차이가 없다. <code>in</code> 연산자는 값이 사전에 키로 존재하는지 여부를 검사한다.</li>
              <li><code>'cat' in spam</code> 은 'cat' 키가 사전에 있는지를 검사하는 반면, <code>'cat' in spam.values()</code> 는 spam의 키 가운데 'cat'을 값으로 갖는 것이 있는지 검사한다.</li>
              <li><code>spam.setdefault('color', 'black')</code></li>
              <li><code>pprint.pprint()</code></li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제6장 문자열 조작하기</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li>이스케이프 문자는 문자열 값에서 코드에 입력하기 어려운 글자들을 표현한다.</li>
              <li><code>\n</code> 은 줄바꿈 문자를, <code>\t</code> 는 탭 문자를 뜻한다.</li>
              <li><code>\\</code> 이스케이프 문자는 백슬러시(<code>\</code>)문자를 나타낸다.</li>
              <li>Howl's 홑따옴표는 문제가 없다. 문자열의 시작과 끝을 표시할 때 겹따옴표를 사용했기 때문이다.</li>
              <li>여러 줄 문자열을 사용하면 <code>\n</code> 이스케이프 문자없이 문자열에서 줄바꿈을 사용할 수 있다.</li>
              <li>표현식은 다음과 같이 평가된다.
                  <pre class="python"><code><blockquote><ol><li>*&nbsp;<font color="#483d8b">'e'</font></li><li><font color="#483d8b">'Hello'</font></li><li><font color="#483d8b">'Hello'</font></li><li><font color="#483d8b">'lo&nbsp;world!'</font></li></ol></blockquote></code></pre>
              </li>
              <li>표현식은 다음과 같이 평가된다.
                  <pre class="python"><code><blockquote><ol><li><font color="#483d8b">'HELLO'</font></li><li><font color="#008000">True</font></li><li><font color="#483d8b">'hello'</font></li></ol></blockquote></code></pre>
              </li>
              <li>표현식은 다음과 같이 평가된다.
                  <pre class="python"><code><blockquote><ol><li><font>&#91;</font><font color="#483d8b">'Remember,&nbsp;remember,&nbsp;the&nbsp;fifth&nbsp;of&nbsp;November.'</font><font>&#93;</font></li><li><font color="#483d8b">'There-can-be-only-one'</font></li></ol></blockquote></code></pre>
              </li>
              <li>각각 <code>rjust()</code>, <code>ljust()</code>, <code>center()</code> 문자열 메소드다.</li>
              <li><code>lstrip()</code>, <code>rstrip()</code> 메소드는 각각 문자열의 양쪽 끝에 있는 빈칸을 없앤다.</li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제7장 정규표현식을 사용한 패턴 대조하기</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li><code>re.compile()</code> 함수는 Regex 객체를 돌려준다.</li>
              <li>백슬래시를 이스케이프할 필요가 없도록 원시 문자열이 사용된다.</li>
              <li><code>search()</code> 메소드는 Match 객체를 돌려준다.</li>
              <li><code>group()</code> 메소드는 일치하는 텍스트 문자열을 돌려준다.</li>
              <li>그룹 0은 전체 일치, 그룹 1은 괄호의 첫 번째 세트, 그룹 2는 괄호의 두 번째 세트를 포함한다.</li>
              <li>마침표와 괄호는 백슬래시로 이스케이프 할 수 있다. 즉, <code>\.</code>, <code>\(</code>, <code>\)</code>.</li>
              <li>정규식에 그룹이 없는 경우, 문자열 리스트를 돌려준다. 정규식이 그룹을 가지고 있다면 문자열의 튜플의 목록을 돌려준다.</li>
              <li><code>|</code> 문자는 두 그룹 중 '가운데 어느 하나'와 일치하는 것을 뜻한다.</li>
              <li><code>?</code> 문자는 '앞의 그룹과 하나도 일치하지 않거나 한 번 일치'하는 것을 뜻한다. 즉, 최소 일치의 의미로 쓰인다.</li>
              <li><code>+</code> 문자는 하나 또는 그 이상과 일치한다. <code>*</code> 는 하나도 일치하지 않거나 한 번 이상 일치한다.</li>
              <li><code>{3}</code> 은 앞의 그룹과 정확히 3번 일치한다. <code>{3, 5}</code> 는 세 번에서 다섯 번까지 일치한다.</li>
              <li><code>\d</code>, <code>\w</code>, <code>\s</code> 단축 문자 클래스는 각각 하나의 숫자, 단어를 이루는 글자, 또는 빈칸과 일치한다.</li>
              <li><code>\D</code>, <code>\W</code>, <code>\S</code> 단축 문자 클래스는 각각 하나의 숫자가 아닌 글자, 단어를 이루는 글자가 아닌 글자, 또는 빈칸이 아닌 글자와 일치한다.</li>
              <li><code>re.I</code> 또는 <code>re.IGNORECASE</code> 를 <code>re.compile()</code> 의 두 번째 매개변수로 전달하면 대소문자를 구분하지 않고 대조한다.</li>
              <li>문자는 보통 줄바꿈 문자를 제외한 모든 글자와 일치한다. <code>re.DOTALL</code> 이 <code>re.compile()</code> 의 두 번째 매개변수로 전달되었다면 점은 줄바꿈 문자와 일치한다.</li>
              <li><code>.*</code> 는 최대일치를 수행하고 <code>.*?</code> 는 최소일치를 수행한다.</li>
              <li><code>[0-9a-z]</code> 또는 <code>[a-z0-9]</code></li>
              <li>'X drummers, X pipers, five rings, X hens'</li>
              <li><code>re.VERBOSE</code> 매개변수는 <code>re.compie()</code>로 전달되는 문자열에 빈칸을 추가하고 주석을 달 수 있도록 허용한다.</li>
              <li><code>re.compile(r'^\d{1,3}(,{3})*$')</code> 로 이에 맞는 정규실을 만들지만 비슷한 정규표현식을 만들 수 있는 여러 가지 정규식 문자열들이 있다.</li>
              <li><code>re.compile(r'[A-Z][a-z]*\sNakamoto')</code></li>
              <li><code>re.compile(r'(Alice|Bob|Carol)\s(eats|pets|throws)\s(apples|cats|baseballs)\.', re.IGNORECASE)</code></li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제8장 파일 읽기 및 쓰기</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li>상대 경로는 현재 작업 디렉토리를 기준으로 한다.</li>
              <li>절대 경로는 / 또는 C:\와 같은 루트 폴더로 시작한다.</li>
              <li><code>os.getcwd()</code> 함수는 현재 작업 디렉토리를 돌려준다. <code>os.chdir()</code> 함수는 현재 작업 디렉토리를 변경한다.</li>
              <li><code>.</code> 폴더는 현재 폴더이며, <code>..</code> 폴더는 부모 폴더이다.</li>
              <li>C:\bacon\eggs 는 디렉토리 이름이며 spam.txt 는 기본 이름이다.</li>
              <li>'<code>r</code>' 문자열은 읽기 모드, '<code>w</code>' 문자열은 쓰기 모드, '<code>a</code>' 문자열은 추가 모드다.</li>
              <li>쓰기 모드로 연 기존 파일은 지워지며 완전히 덮어쓰기가 되어 버린다.</li>
              <li><code>read()</code> 메소드는 파일의 전체 내용을 단일 문자열 값으로 돌려준다. <code>readlines()</code> 메소드는 문자열의 리스트를 돌려주며, 하나의 문자열은 파일 내용의 한 줄에 하당한다.</li>
              <li>선반 값은 사전 값과 비슷하다. 키와 값을 가지고 있으며, <code>keys()</code> 와 <code>values()</code> 메소드는 같은 이름의 사전 메소드와 비슷하게 동작한다.</li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제9장 파일 조직화 하기</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li><code>shutil.copy()</code> 함수는 하나의 파일을 복사하는 반면 <code>shutil.copytree()</code> 함수는 전체 폴더를 그 안의 내용과 함께 복사한다.</li>
              <li><code>shutil.move()</code> 함수는 파일의 이름을 바꿀 때만이 아니라 다른 곳으로 이동시킬 때에도 사용된다.</li>
              <li><code>send2trash</code> 함수는 파일이나 폴더를 휴지통으로 옮기는 반면, <code>shutil</code> 함수는 파일과 폴더를 완전히 지운다.</li>
              <li><code>zipfile.ZipFile()</code> 함수는 <code>open()</code> 함수와 같은 구조다. 첫 번째 매개변수는 파일이름, 두 번째 매개변수는 ZIP 파일을 여는 모드(읽기, 쓰기 또는 추가)이다.</li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제10장 디버깅</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li>assert(spam >= 10, 'The spam variable is less than 10.')</li>
              <li>assert(eggs.lower() != bacon.lower(), 'The eggs and bacon variables are the same!') or assert(eggs.upper() != bacon.upper(), 'The eggs and bacon variables are the smae!')</li>
              <li>assert(False, 'This assertion always triggers.')</li>
              <li><code>logging.debug()</code> 를 호출할 수 있으려면, 프로그램의 시작 부분에 다음 두 줄이 있어야 한다.
                  <pre class="python"><code><blockquote><ol><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">logging</font></li><li><font color="#dc143c">logging</font>.<font>basicConfig</font><font>&#40;</font>level<font color="#66cc66">=</font><font color="#dc143c">logging</font>.<font>DEBUG</font><font color="#66cc66">,</font>&nbsp;format<font color="#66cc66">=</font><font color="#483d8b">'&nbsp;%(asctime)s&nbsp;-&nbsp;&nbsp;%(levelname)s&nbsp;-&nbsp;&nbsp;%(message)s'</font><font>&#41;</font></li></ol></blockquote></code></pre>
              </li>
              <li>logging.debug() 로 programLog.txt 라는 이름의 파일에 로그 메시지를 보낼 수 있게 하려면 프로그램의 시작 부분에 다음 두 줄이 있어야 한다.
                  <pre class="python"><code><blockquote><ol><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">logging</font></li><li><font color="#dc143c">logging</font>.<font>basicConfig</font><font>&#40;</font>filename<font color="#66cc66">=</font><font color="#483d8b">'programLog.txt'</font><font color="#66cc66">,</font>&nbsp;level<font color="#66cc66">=</font><font color="#dc143c">logging</font>.<font>DEBUG</font><font color="#66cc66">,</font>&nbsp;format<font color="#66cc66">=</font><font color="#483d8b">'%(asctime)s&nbsp;-&nbsp;&nbsp;%(levelname)s&nbsp;-&nbsp;&nbsp;%(message)s'</font><font>&#41;</font></li></ol></blockquote></code></pre>
              </li>
              <li>DEBUG, INFO, WARNING, ERROR, CRITICAL</li>
              <li><code>logging.disable(logging.CRITICAL)</code></li>
              <li>로그 함수 호출을 없애지 않고서도 로그 메시지를 사용하지 않도록 설정할 수 있다. 선택적으로 낮은 수준의 로그 메시지를 사용하지 않도록 설정할 수 있으며, 로그 메시지를 만들 수 있다. 로그 메시지는 시간 기록을 제공한다.</li>
              <li>Step 버튼은 디버거를 함수 호출 내부로 옮긴다. Over 버튼은 내부로 들어가지 않고 빠르게 함수 호출을 처리한다. Out 버튼은 현재 들어와 있는 함수 바깥으로 나갈 때까지 나머지 코드를 빠르게 실행시킨다.</li>
              <li>Go 를 클릭하면 디버거는 프로그램의 끝이나 중지 지점에 다다랐을 때 멈춘다.</li>
              <li>중지 지점은 코드의 줄에 설정되며 프로그램 실행이 이 줄에 다다랐을 때 디버거를 일시 정지시킨다.</li>
              <li>IDLE에 중지 지점을 설정하려면 줄을 마우스 오른쪽 버튼으로 클릭했을 때 나타나는 메뉴에서 Set Breakpoint 를 선택한다.</li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제11장 웹 스크랩</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li>webbrowser 모듈은 웹 브라우저를 지정한 URL 과 함께 여는 <code>open()</code> 메소드를 가지고 있으며 그게 전부다. <code>request</code> 모듈은 웹에서 파일과 페이지를 다운로드할 수 있다. <code>BeautifulSoup</code> 모듈은 HTML 을 구문 분석한다. 마지막으로 <code>selenium</code> 모듈은 브라우저를 실행하고 제어할 수 있다.</li>
              <li><code>requests.get()</code> 함수는 다운로드한 내용을 문자열로 저장한 text 속성을 가지고 있는 Response 객체를 돌려준다.</li>
              <li><code>raise_for_status()</code> 메소드는 다운로드에 문제가 있었다면 예외를 일으키며, 성공했다면 아무것도 하지 않는다.</li>
              <li>Response 객쳉의 status_code 속성은 HTTP 상태 코드를 포함하고 있다.</li>
              <li>컴퓨터에서 새로운 파일을 'wb' "이진(바이너리) 쓰기" 모드로 연 다음 for loop 로 Response 객체의 <code>iter_content()</code> 메소드를 차례대로 되풀이해서 파일의 덩어리들을 파일에 기록한다. 다음은 그 예다.
                  <pre class="python"><code><blockquote><ol><li>saveFile&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">open</font><font>&#40;</font><font color="#483d8b">'filename.html'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'wb'</font><font>&#41;</font></li><li><font color="#ff7700">for</font>&nbsp;<font color="#dc143c">chunk</font>&nbsp;<font color="#ff7700">in</font>&nbsp;res.<font>iter_content</font><font>&#40;</font><font color="#ff4500">100000</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;saveFile.<font>write</font><font>&#40;</font><font color="#dc143c">chunk</font><font>&#41;</font></li></ol></blockquote></code></pre>
              </li>
              <li>F12 는 크롬의 개발자 도구를 불러온다. <kbd>Ctrl</kbd>-<kbd>Shift</kbd>-<kbd>C</kbd> (윈도우와 리눅스) 또는 <kbd>z</kbd>-<kbd>option</kbd>-<kbd>C</kbd> (OS X)키는 파이어폭스의 개발자 도구를 불러온다.</li>
              <li>페이지의 요소를 마우스 오른쪽 버튼으로 클릭하고 메뉴에서 요소 검사 또는 검사를 선택한다.</li>
              <li>'#main'</li>
              <li>'.highlight'</li>
              <li>'div div'</li>
              <li>'button[balue="favorite"]'</li>
              <li>spam.getText()</li>
              <li>linkElem.attrs</li>
              <li>셀레늄 모듈은 <code>from selenium import webdriver</code> 문으로 가져온다.</li>
              <li><code>find_element_*</code> 메소드는 처음 일치하는 요소를 WebElement 객체로 돌려준다. <code>The find_elements_*</code> 메소드는 일치하는 모든 요소를 WebElement 객체의 리스트로 돌려준다.</li>
              <li><code>click()</code> 및 <code>send_keys()</code> 메소드는 각각 마우스 킬릭과 키보드 키를 시뮬레이션 한다.</li>
              <li>서식 안의 모든 요소에 대해서든 <code>submit()</code> 메소드를 호출하면 서식을 제출한다,</li>
              <li><code>forward()</code>, <code>back()</code>, <code>refresh()</code> WebDriver 객체 메소드는 각각 브라우저의 앞으로, 뒤로, 새로고침 버튼을 시뮬레이션 한다.</li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제12장 엑셀 스프레드시트 다루기</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li><code>openpyxl.load_workbook()</code> 함수는 Workbook 객체를 돌려준다.</li>
              <li><code>get_sheet_names()</code> 메소드는 Worksheet 객체를 돌려준다.</li>
              <li><code>wb.get_sheet_by_name('Shee1')</code>을 호출한다.</li>
              <li><code>wb.get_active_sheet()</code> 를 호출한다.</li>
              <li><code>sheet['C5'].value</code> 또는 <code>sheet.cell(row=5, column=3).value</code></li>
              <li><code>sheet['C5'] = 'Hello'</code> 또는 <code>sheet.cell(row=5, column=3).value = 'Hello'</code></li>
              <li><code>cell.row</code> 및 <code>cell.column</code></li>
              <li>각각 가장 높은 열과 행의 번호를 정수값으로 돌려준다.</li>
              <li><code>openpyxl.cell.column_index_from_string('M'</code>)</li>
              <li><code>openpyxl.cell.get_column_letter(14)</code></li>
              <li><code>sheet['A1':'F1']</code></li>
              <li><code>wb.save('example,xlsx')</code></li>
              <li>수식은 임의의 값과 같은 방식으로 설정된다. 셀의 value 속성을 수식 텍스트의 문자열로 설정한다. 수식은 <code>=</code> 기호로 시작한다는 것을 잊지 말자.</li>
              <li><code>load_workbook()</code> 을 호출할 때 <code>data_only</code> 키워드 인수에 <code>True</code> 를 전달한다.</li>
              <li><code>sheet.row_dimensions[5].height = 100</code></li>
              <li><code>sheet.column_dimensions['C'].hidden = True</code></li>
              <li>OpenPyXL 2.0.5 는 고정된 틀 고정, 제목 이미, 차트를 지원하지 않는다.</li>
              <li>틀 고정은 행과 열을 항상 화면에 보이게 한다. 이들은 머리글에 유용하다.</li>
              <li><code>openpyxl.charts.Reference()</code>, <code>openpyxl.charts.Series()</code>, <code>openpyxl.charts.BarChart()</code>, <code>chartObj.append(seriesObj)</code>, <code>add_chart()</code></li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제13장 PDF 및 워드 문서 작업</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li><code>open()</code> 에서 돌려받은 File 객체.</li>
              <li><code>PdfFileReader()</code> 는 이진 읽기(<code>'rb'</code>), <code>PdfFileWriter()</code> 는 이진 쓰기(<code>'wb'</code>)</li>
              <li><code>getPage(4)</code> 호출은 5페이지에 대한 Page 객체를 돌려준다. 0 페이지가 첫 번째 페이지이기 때문이다.</li>
              <li><code>numPages</code> 변수는 PdfFileReader 객체의 페이지 수를 뜻하는 정수를 저장하고 있다.</li>
              <li><code>decrypt('swordfish')</code> 를 호출한다.</li>
              <li><code>rotateClockwise()</code>와 <code>rotateCounterClockwise()</code> 메소드, 회전 각도를 정수 매개변수로 전달한다.</li>
              <li><code>docx.Document('demo.docx')</code></li>
              <li>문서는 여러 단락을 포함하고 있다. 단락은 새 줄에서 시작되며 여러 런(Run)을 포함한다. 단락 안에서 문자의 연속된 그룹이다.</li>
              <li><code>doc.paragraphs</code> 를 사용한다.</li>
              <li>Run 객체가 이러한 변수를 가진다. (Paragraph 가 아니다.)</li>
              <li>스타일의 굵은 글씨 설정 여부에 관계 없이, <code>True</code> 는 언제나 Run 객체를 굵은 글씨로 만들고 <code>False</code> 는 언제나 굵지 않은 글씨로 만든다. <code>None</code> 은 Run 객체가 스타일의 굵은 글씨 설정을 쓰도록 한다.</li>
              <li><code>docx.Document()</code> 함수를 실행한다.</li>
              <li><code>doc.add_paragraph('Hello there!')</code></li>
              <li>정수 0, 1, 2, 3, 4.</li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제14장 CSV 파일 및 JSON 데이터 작업</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li>엑셀에서 스프레드시트는 문자열이 아닌 데이터 유형의 값을 가질 수 있다. 셀은 여러가지 글꼴, 크기, 또는 색깔 설정을 가질 수 있다. 인접 셀은 병합될 수 있다. 이미지와 차트를 포함할 수 있다.</li>
              <li><code>open()</code> 호출로 얻은 File 객체를 전달한다.</li>
              <li>File 객체는 Reader 에 대해서는 이진 읽기(<code>'rb'</code> 모드)로, Writer 객체에 대해서는 이진 쓰기(<code>'wb'</code> 모드)로 열어야 한다.</li>
              <li><code>writerow()</code> 메소드</li>
              <li><code>delimiter</code> 매개변수는 행에서 셀을 구분할 때 사용되는 문자열을 바꾼다. <code>lineterminator</code> 매개변수는 행을 구분할 때 사용되는 문자열을 바꾼다.</li>
              <li><code>json.loads()</code></li>
              <li><code>json.dumps()</code></li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제15장 시간 지키기, 작업 예약하기 및 프로그램 실행시키기</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li>많은 날짜와 시간 프로그램들이 사용하는 기준 시각. 이 시각은 세계표준시(UTC) 기준 1970년 1월 1일이다.</li>
              <li><code>time.time()</code></li>
              <li><code>time.sleep(5)</code></li>
              <li>전달된 매개변수에 가장 가까운 정수값을 돌려준다. 예를 들어 <code>round(2, 4)</code>를 돌려준다.</li>
              <li>DateTime 객체는 시간의 특정한 순간을 나타낸다. timedelta 객체는 시간의 기간을 나타낸다.</li>
              <li><code>threadObj = threading.Thread(target-spam)</code></li>
              <li><code>threadObj.start()</code></li>
              <li>하나의 스레드에서 실행되는 코드가 다른 스레드에서 실행되는 코드의 같은 변수를 읽거나 쓰지 않도록 확인한다.</li>
              <li><code>subprocess.Popen('C:\\Windows\\System32\\calc.exe')</code></li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제16장 전자메일 및 문자 메시지 전송</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li>각각 SMTP 와 IMAP</li>
              <li><code>smtplib.SMTP(</code>), <code>smtpObj.ehlo()</code>, <code>smtpObj.starttls()</code>, <code>smtpObj.login()</code></li>
              <li><code>imapclient.IMAPClient()</code> 와 <code>imapObj.login()</code></li>
              <li>IMAP 검색어의 문자열 리스트. 이를테면 'BEFORE &lt;date>', 'FROM &lt;string>', 'SEEN'</li>
              <li>imaplib._MAXLINE 변수에 큰 정수값, 이를테면 10000000과 같은 값을 지정한다.</li>
              <li><code>pyzmail</code> 모듈은 다운로드 받은 이메일을 읽는다.</li>
              <li>Twilio 계정 SID 번호, 인증 토큰 번호, Twilio 전화번호가 필요하다.</li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제17장 이미지 조작</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li>RGBA 값은 네 개의 정수로 구성된 튜플로 각 정수값은 0에서 255까지의 수다. 네 개의 정수는 각각 붉은색, 녹색, 파란색 및 알파값(투명도)의 양에 대응한다.</li>
              <li><code>ImageColor.getcolor('CornflowerBlue', 'RGBA')</code> 함수 호출은 (100, 149, 237, 255)튜플을 돌려주며, 이는 전달한 색깔 이름에 대한 RGBA 값이다.</li>
              <li>상자 튜플은 네 개의 정수로 구성된 튜플 값이다. 각각 왼쪽 끝 x 좌표, 위쪽 끝 y 좌표, 너비와 길이다.</li>
              <li><code>Image.open('zophie.png')</code></li>
              <li><code>imageObj.size</code> 는 두 개의 정수로 구성된 튜플로 각각 너비와 길이다.</li>
              <li><code>imageObj.crop(0, 50, 50, 50)</code>. <code>crop()</code>에는 네 개의 정수 매개변수가 아니라 네 개의 정수로 구성된 상자 튜플을 전달해야 한다는 점에 유의하라.</li>
              <li>Image 객체의 <code>imageObj.save('new_filename.png')</code> 메소드를 호출한다.</li>
              <li><code>ImageDraw</code> 모듈은 이미지를 그리는 코드를 포함하고 있다.</li>
              <li><code>ImageDraw.Draw()</code> 함수에 Image 객체를 전달하면 얻을 수 있다.</li>
          </ol>
        </article>
      </section>
    </div>

    <h3 class="sub-header">제18장 키보드와 마우스 제어 및 GUI 자동화</h3>
    <div class="chapter">
      <section>
        <article>
          <ol>
              <li>마우스 커서를 왼쪽 위 구석. 즉, (0, 0) 좌표로 보내면 된다.</li>
              <li><code>pyautogui.size()</code> 는 화면의 너비와 높이로 된 두 개의 정수로 구성된 튜플을 돌려준다.</li>
              <li><code>pyautogui.position()</code> 은 마우스 커서의 x와 y 좌표를 뜻하는 두 개의 정수로 구성된 튜플을 돌려준다.</li>
              <li><code>moveTo()</code> 함수는 화면의 절대 좌표로 마우스를 움직이는 반면, <code>moveRel()</code> 함수는 마우스의 현재 위치를 기준으로 한 상대적인 위치로 마우스를 움직인다.</li>
              <li><code>pyautogui.dragTo()</code> 및 <code>pyautogui.dragRel()</code></li>
              <li><code>pyautogui.typewrite('Hello world!')</code></li>
              <li>키보드 키 문자열의 리스트를 <code>pyautogui.typewrite()</code> 에 전달하거나(이를테면 'left') <code>pyautogui.press()</code> 에 단일한 키보드 키 문자열을 전달한다.</li>
              <li><code>pyautogui.screenshot('screenshot.png')</code></li>
              <li><code>pyautogui.PAUSE = 2</code></li>
          </ol>
        </article>
      </section>
    </div>
