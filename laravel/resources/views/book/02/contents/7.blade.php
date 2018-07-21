  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬은 엄연한 객체지향 언어이다. 파이썬의 객체지향과 클래스 개념의 핵심을 살펴본다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">6.1. 클래스</h3>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬은 클래스 중심의 객체지향적인 특징들이 있다. 클래스는 서로 연관 있는 변수들과 함수들을 모아놓은 그룹의 명칭이다. 파이썬의 클래스 정의 형태는 다음과 같이 간단하다.</p>
        <h5>코드6-1 클래스 정의 예</h5>
        <pre class="python"><code><blockquote><ol><li>Class&nbsp;MyFirstClass:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">pass</font></li></ol></blockquote></code></pre>
        <p>위의 예제처럼 'class 클래스이름:'을 입력한 다음 행부터 클래스에 속할 변수와 함수를 작성하면 된다. 아무것도 없이 일단 클래스 이름부터 정해두고 싶다면 위 예제와 같이 pass만 적어 두어도 클래스의 조건은 다 갖춘 셈이다.</p>
        <p>관례로 클래스 이름의 첫 글자는 대문자로 표시한다. 또한 여러 개 단어로 이루어져 있다면 각 단어의 시작을 대문자로 표시하고 별도의 언더스코어를 작성하지 않는다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header" id="class_and_var">6.2. 클래스 변수와 인스턴스 변수</h3>
  <div class="chapter">
    <section>
      <article>
        <p>클래스 내부에서 선언할 수 있는 변수는 클래스 변수와 인스턴스 변수 두 가지가 있다. 클래스 변수는 해당 클래스의 인스턴스 모두가 공유하는 변수이다. 인스턴스 변수는 클래스로 생성한 인스턴스만의 변수이다.</p>
        <p>다음 예제로 클래스변수와 인스턴스 변수의 차이점을 살펴본다.</p>
        <h5>코드6-2 클래스 변수와 인스턴스 변수</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:</li><li><font color="#ff7700">class</font>&nbsp;Diva:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;클래스&nbsp;변수</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;version&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;v3&quot;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;<font color="#0000cd">__init__</font><font>&#40;</font><font color="#008000">self</font><font color="#66cc66">,</font>&nbsp;name&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;Diva&quot;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;인스턴스&nbsp;변수</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">self</font>.<font>name</font>&nbsp;<font color="#66cc66">=</font>&nbsp;name</li></ol></blockquote></code></pre>
        <p>위 예제가 실제로 사용할 클래스의 가장 단순한 모습이다.</p>
        <p class="bg-warning">__init__()은 파이썬의 클래스 생성자(Constructor)이다. 클래스를 생성하고 초기화 하는 순간 무언가 할 수 있도록 마련된 순서가 __init__()인 셈이다. __init__은 self를 파라미터로 전달하는데 이는 __init__()이 실행되는 시점에 이미 인스턴스의 생성이 끝났다는 것을 암시한다. 덕분에 self를 이용해서 인스턴스 변수를 설정할 수 있다.</p>
        <p class="bg-info"><strong>NOTE_ 초기화와 클래스 인스턴스 생성</strong><br>__init__()함수에 self라는 파라미터를 전달한다는 점에서 초기화하는 시점에서 이미 클래스 인스턴스의 생성은 완료되어 있다. __init__()함수는 말 그대로 초기화를 한다. <br><br>정말로 초기화하는 순간에 무언가를 하고 싶다면 파이썬 문서의 'Basic customization(<a href="https://docs.python.org/3/reference/datamodel.html#basic-customization" target="_blank">https://docs.python.org/3/reference/datamodel.html#basic-customization</a>)'을 참고한다.</p>
        <p>클래스 변수는 클래스 모두가 공유하는 변수이다. 이 변수를 바꾸면 해당 클래스 인스턴스의 클래스 변수가 모두 변경된다.</p>
        <h5>코드6-3 클래스 변수 사용</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li>diva1&nbsp;<font color="#66cc66">=</font>&nbsp;Diva<font>&#40;</font><font>&#41;</font></li><li>diva2&nbsp;<font color="#66cc66">=</font>&nbsp;Diva<font>&#40;</font><font color="#483d8b">&quot;Miku&quot;</font><font>&#41;</font></li><li>diva3&nbsp;<font color="#66cc66">=</font>&nbsp;Diva<font>&#40;</font><font color="#483d8b">&quot;Hana&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">def</font>&nbsp;print_diva_info<font>&#40;</font>diva<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;====&quot;</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Name:&nbsp;&quot;</font><font color="#66cc66">,</font>&nbsp;diva.<font>name</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Version:&nbsp;&quot;</font><font color="#66cc66">,</font>&nbsp;diva.<font>version</font><font>&#41;</font></li><li>&nbsp;</li><li>print_diva_info<font>&#40;</font>diva1<font>&#41;</font></li><li>print_diva_info<font>&#40;</font>diva2<font>&#41;</font></li><li>print_diva_info<font>&#40;</font>diva3<font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li><font color="#66cc66">====</font></li><li>Name:&nbsp;Diva</li><li>Version:&nbsp;v3</li><li><font color="#66cc66">====</font></li><li>Name:&nbsp;Miku</li><li>Version:&nbsp;v3</li><li><font color="#66cc66">====</font></li><li>Name:&nbsp;Hana</li><li>Version:&nbsp;v3</li></ol></blockquote></code></pre>
        <p>하지만 인스턴스 변수는 각 인스턴스에 종속된 변수이다. 따라서 위 예제처럼 모든 인스턴스가 클래스 변수를 공유하더라도 인스턴스 변수는 다르다는 것을 알 수 있다. 이 상태에서 인스턴스의 원 설계도라고 할 수 있는 클래스 변수를 변경해 보자.</p>
        <h5>코드6-4 클래스 변수의 변경</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:</li><li><font color="#808080">#&nbsp;Diva&nbsp;클래스를&nbsp;직접&nbsp;수정한다는&nbsp;것에&nbsp;주의하세요!</font></li><li>Diva.<font>version</font>&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;v4&quot;</font></li><li>&nbsp;</li><li>print_diva_info<font>&#40;</font>diva1<font>&#41;</font></li><li>print_diva_info<font>&#40;</font>diva2<font>&#41;</font></li><li>print_diva_info<font>&#40;</font>diva3<font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:</li><li><font color="#66cc66">====</font></li><li>Name:&nbsp;Diva</li><li>Version:&nbsp;v4</li><li><font color="#66cc66">====</font></li><li>Name:&nbsp;Miku</li><li>Version:&nbsp;v4</li><li><font color="#66cc66">====</font></li><li>Name:&nbsp;Hana</li><li>Version:&nbsp;v4</li></ol></blockquote></code></pre>
        <p>해당 클래스의 인스턴스가 공유하는 클래스 변수가 모두 변경된 것을 확인할 수 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">6.3. 클래스 메서드</h3>
  <div class="chapter">
    <section>
      <article>
        <p>클래스 내부의 함수는 관례적으로 메서드(method)라고 한다. 실제로 클래스 내부에서 선언되어 있다는 것 뿐, 함수와 동일하게 선언하고 사용할 수 있다.</p>
        <p>하지만 일반적인 함수와는 달리 클래스 메서드의 첫 번째 파라미터는 언제나 클래스 자신을 참조하는 self로 지정해야 한다. 이 변수는 외부에서 호출할 때 영향을 주지 않는다. 이 규칙은 앞에서 먼저 마주친 __init__()에도 적용된다.</p>
        <p class="bg-success"><strong>NOTE_ self 를 명시적으로 전달해야 하는 이유</strong><br>왜 self 를 명시적으로 전달하는지는 파이썬을 만든 귀도 반 로섬이 직접 쓴 'Why explicit self has to stay(<a href="http://neopythonic.blogspot.kr/2008/10/why-explicit-self-has-to-stay.html" target="_blank">http://neopythonic.blogspot.kr/2008/10/why-explicit-self-has-to-stay.html</a>)'라는 글을 참고하면 좋다.<br><br>물론 함수의 파리미터니 self를 다른 이름으로 변경할 수 있다. 자바 개발자들에게 친숙한 this 등으로 말이다. 하지만 이는 (강력하게) 권장하지 않는다.</p>
        <p>코드6-4 클래스에 몇 가지 메서드를 추가해보자.</p>
        <h5>코드6-5 클래스에 메서드 추가</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">4</font><font>&#93;</font>:</li><li><font color="#ff7700">class</font>&nbsp;Diva:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;클래스&nbsp;변수</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;version&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;v3&quot;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;<font color="#0000cd">__init__</font><font>&#40;</font><font color="#008000">self</font><font color="#66cc66">,</font>&nbsp;name<font color="#66cc66">=</font><font color="#483d8b">&quot;Diva&quot;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;인스턴스&nbsp;변수</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">self</font>.<font>name</font>&nbsp;<font color="#66cc66">=</font>&nbsp;name</li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;song<font>&#40;</font><font color="#008000">self</font><font color="#66cc66">,</font>&nbsp;title<font color="#66cc66">=</font><font color="#483d8b">&quot;song&quot;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#008000">self</font>.<font>name</font>&nbsp;+&nbsp;<font color="#483d8b">&quot;&nbsp;sing&nbsp;the&nbsp;&quot;</font>&nbsp;+&nbsp;title<font>&#41;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;medley<font>&#40;</font><font color="#008000">self</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">self</font>.<font>song</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">self</font>.<font>song</font><font>&#40;</font><font color="#483d8b">&quot;second&nbsp;song&quot;</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">self</font>.<font>song</font><font>&#40;</font><font color="#483d8b">&quot;third&nbsp;song&quot;</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>이제 Diva 클래스 인스턴스들은 song()과 medley() 메서드를 사용할 수 있다.</p>
        <h5>코드6-6 song()과 medley() 메서드 실행</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">5</font><font>&#93;</font>:</li><li>voice_diva&nbsp;<font color="#66cc66">=</font>&nbsp;Diva<font>&#40;</font><font color="#483d8b">&quot;Hana&quot;</font><font>&#41;</font></li><li>voice_diva.<font>song</font><font>&#40;</font><font>&#41;</font></li><li>voice_diva.<font>song</font><font>&#40;</font><font color="#483d8b">&quot;World&nbsp;is&nbsp;Mine&quot;</font><font>&#41;</font></li><li>voice_diva.<font>medley</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">5</font><font>&#93;</font>:</li><li>Hana&nbsp;sing&nbsp;the&nbsp;song</li><li>Hana&nbsp;sing&nbsp;the&nbsp;World&nbsp;<font color="#ff7700">is</font>&nbsp;Mine</li><li>Hana&nbsp;sing&nbsp;the&nbsp;song</li><li>Hana&nbsp;sing&nbsp;the&nbsp;second&nbsp;song</li><li>Hana&nbsp;sing&nbsp;the&nbsp;third&nbsp;song</li></ol></blockquote></code></pre>
        <p>매우 예외적인 방법으로 클래스 메서드에 전달하는 첫 번째 파라미터가 언제나 클래스 인스턴스 자기 자신이라는 걸 이용하는 호출 방법이 있다.</p>
        <h5>코드6-7 클래스 메서드에 전달하는 첫 번째 파라미터</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">6</font><font>&#93;</font>:</li><li>Diva.<font>song</font><font>&#40;</font>voice_diva<font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;Tell&nbsp;your&nbsp;world&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">6</font><font>&#93;</font>:</li><li>Hana&nbsp;sing&nbsp;the&nbsp;Tell&nbsp;your&nbsp;world</li></ol></blockquote></code></pre>
        <p>인스턴스가 아니라 클래스에서 직접 메서드를 호출했다는 것을 눈여겨 본다. self 자리에 Diva 인스턴스를 전달하면 해당 인스턴스로 메서드를 호출한 것처럼 작동한다.</p>
        <p>물론 인스턴스를 생성하지 않고도 해당 클래스의 메서드를 호출하도록 만들 수 있다. self 를 메서드의 파라미터로 추가 하지 않는 것이다.</p>
        <h5>코드6-8 메서드의 파라미터로 추가하지 않음</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">7</font><font>&#93;</font>:</li><li><font color="#ff7700">class</font>&nbsp;Calculater:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;adder<font>&#40;</font>l<font color="#66cc66">,</font>&nbsp;r<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>l&nbsp;+&nbsp;r<font>&#41;</font></li><li>&nbsp;</li><li>Calculater.<font>adder</font><font>&#40;</font><font color="#ff4500">3</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">9</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">7</font><font>&#93;</font>:</li><li><font color="#ff4500">12</font></li></ol></blockquote></code></pre>
        <p>이 처럼 클래스의 메서드는 함수와 대동소이한 방법으로 사용할 수 있다. 클래스에 속해 있으므로 추가 특성만 잘 파악한다면 어렵지 않다.</p>                
      </article>
    </section>
  </div>

  <h3 class="sub-header">6.4. 상속</h3>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬의 클래스 또한 상속 받거나 상속 시킬 수 있다. 지난 예제들을 보면 명시적인 걸 좋아하는 파이썬에서 클래스를 정의할 때 클래스 이름 뒤에 괄호가 빠져있었다. 파이썬에서 클래스 정의 시 클래스 이름 뒤에 괄호와 괄호 안에 클래스 이름을 입력하면 해당 클래스를 상속 받을 수 있다.</p>
        <p class="bg-danger"><strong>NOTE_ 파이썬3의 object 클래스</strong>
        <br>파이썬3의 모든 클래스는 암시적으로 object 클래스를 상속받는다. 2.7버전까지만 해도 파이썬 클래스를 만드는 가장 기본적인 코드는 다음과 같았다.</p>
        <h5>코드6-9 파이썬 2.7의 클래스 정의</h5>
        <pre class="python"><code><blockquote><ol><li>Class&nbsp;Heroes<font>&#40;</font><font color="#008000">object</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">pass</font></li></ol></blockquote></code></pre><p class="bg-danger">앞 클래스는 명시적으로 object 를 상속받아서 새로운 Heroes 클래스를 만든 것이다.</p>
        <p>앞에서 만든 Diva 클래스를 상속 받아서 무언가를 새로 만들어 본다.</p>
        <h5>코드6-10 클래스 상속의 예</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">8</font><font>&#93;</font>:</li><li><font color="#ff7700">class</font>&nbsp;Miku<font>&#40;</font>Diva<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;<font color="#0000cd">__init__</font><font>&#40;</font><font color="#008000">self</font><font color="#66cc66">,</font>&nbsp;module<font color="#66cc66">=</font><font color="#483d8b">&quot;class&nbsp;uniform&quot;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">self</font>.<font>module</font>&nbsp;<font color="#66cc66">=</font>&nbsp;module</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;슈퍼&nbsp;클래스를&nbsp;초기화&nbsp;하지&nbsp;않으면</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;슈퍼&nbsp;클래스에서&nbsp;초기화&nbsp;&amp;&nbsp;할당되는&nbsp;name&nbsp;변수를&nbsp;사용할&nbsp;수&nbsp;없습니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">super</font><font>&#40;</font><font>&#41;</font>.<font color="#0000cd">__init__</font><font>&#40;</font><font color="#483d8b">&quot;miku&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;dance<font>&#40;</font><font color="#008000">self</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Dancing!&quot;</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <blockquote><strong>TIP</strong>: __init__()은 인스턴스 생성이 아니라 초기화를 담당하므로 [코드6-10]처럼 super.__init__()이라고 정의하지 않으면 슈퍼클래스가 초기화되지 않는다.</blockquote>
        <p>다음 예제는 [코드6-10]의 클래스를 이용한 출력이다.</p>
        <h5>코드6-11 Miku 클래스 이용</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">9</font><font>&#93;</font>:</li><li>hatsune_miku&nbsp;<font color="#66cc66">=</font>&nbsp;Miku<font>&#40;</font><font>&#41;</font></li><li><font color="#ff7700">print</font><font>&#40;</font>hatsune_miku.<font>module</font><font>&#41;</font></li><li><font color="#ff7700">print</font><font>&#40;</font>hatsune_miku.<font>version</font><font>&#41;</font></li><li><font color="#ff7700">print</font><font>&#40;</font>hatsune_miku.<font>name</font><font>&#41;</font></li><li>hatsune_miku.<font>dance</font><font>&#40;</font><font>&#41;</font></li><li>hatsune_miku.<font>song</font><font>&#40;</font><font color="#483d8b">&quot;Hello&nbsp;worker&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">9</font><font>&#93;</font>:</li><li><font color="#ff7700">class</font>&nbsp;uniform</li><li>v3</li><li>miku</li><li>Dancing<font color="#66cc66">!</font></li><li>miku&nbsp;sing&nbsp;the&nbsp;Hello&nbsp;worker</li></ol></blockquote></code></pre>
        <p>이처럼 상속을 이용해서 서브클래스를 만들 수 있다.</p>
        <blockquote><strong>TIP</strong>: 서브클래스를 만들 때 슈퍼클래스 자리에 여러 클래스를 넣어 다중 삭송할 수 있다. 이 때 서브클래스에 없는 변수나 메서드 등을 참조하려 하면, 슈퍼클래스가 할당된 순서대로 왼쪽부터 깊이 우선 탐색으로 변수, 메서드를 찾는다.</blockquote>
      </article>
    </section>
  </div>

  <h3 class="sub-header">6.5. 덕 타이핑</h3>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬 클래스의 특징 중 하나로 '덕 타이핑(Duck typing)'이라는 개념이 있다. "오리처럼 행동하고, 오리처럼 날고, 오리처럼 소리 내면 오리다." 라는 뜻이다. 이를 프로그래밍 개념으로 해석하면 자바에 있는 인터페이스 등의 개념 없이도 해당 이름의 변수, 메서드가 있으면 그냥 호출할 수 있다는 뜻이다.</p>
        <h5>코드6-12 덕 타이핑</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">10</font><font>&#93;</font>:</li><li><font color="#ff7700">class</font>&nbsp;Cat:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;sound<font>&#40;</font><font color="#008000">self</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Nya~&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">class</font>&nbsp;Dog:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">def</font>&nbsp;sound<font>&#40;</font><font color="#008000">self</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Mung&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li>cat&nbsp;<font color="#66cc66">=</font>&nbsp;Cat<font>&#40;</font><font>&#41;</font></li><li>dog&nbsp;<font color="#66cc66">=</font>&nbsp;Dog<font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li>animals&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#91;</font>cat<font color="#66cc66">,</font>&nbsp;dog<font>&#93;</font></li><li>&nbsp;</li><li><font color="#ff7700">for</font>&nbsp;animal&nbsp;<font color="#ff7700">in</font>&nbsp;animals:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;animal.<font>sound</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">10</font><font>&#93;</font>:</li><li>Nya<font color="#66cc66">~</font></li><li>Mung</li></ol></blockquote></code></pre>
        <p>[코드6-12]처럼 해당 함수가 있는지만 살펴보고 실행한다 타입을 검사하거나 특별한 무언가가 붙어있어야 할 필요가 없다.</p>
      </article>
    </section>
  </div>
