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
        <pre class="python"><code>def &lt;함수이름>(&lt;인자1>, &lt;인자2>, ...):<br>    함수 몸체<br>    여기서<br>    함수가<br>    실행이 됩니다.</code></pre>
        <p>한 번 해보자.</p>
        <h5>코드5-1 특정 문자와 문자열을 연결해 출력하는 함수 정의</h5>
        <pre class="python"><code>In[1]:<br>def hello(world):<br>    print("Hello", world)</code></pre>
        <p>2행 밖에 안되는 간단한 함수이다. 이제 실행해 본다.</p>
        <h5>코드5-2 hello() 함수 실행</h5>
        <pre class="python"><code>In[2]:<br>to = "Miku"
        <br>hello(to)
        <br>Out[2]:<br>Hello, Miku</code></pre>
        <p>만약 값을 반환받아야 한다면 return 키워드를 사용하면 된다.</p>
        <h5>코드5-3 return 키워드 사용</h5>
        <pre class="python"><code>In[3]:<br>def hello_ret(world):<br>    ret_value = "Hello, " + str(world)<br>    return ret_value
        <br>ret_str = hello_ret("D.va")
        <br>print(ret_str)
        <br>Out[3]:<br>Hello, D.va</code></pre>
        <p>파이썬은 함수 안에 함수나 뒤에서 설명할 클래스도 선언할 수 있다. 함수나 클래스를 함수 안에서 선언하는 방법은 다른 내부 변수를 선언하는 것과 같다.</p>
        <h5>코드5-4 함수 안에서 함수 선언</h5>
        <pre class="python"><code>In[4]:<br>def func(number):<br>    def func_in_func(number):<br>        print(number)
        <br>    print("In func")<br>    func_in_func(number + 1)
        <br>func(1)
        <br>Out[4]:<br>In func<br>2</code></pre>
        <p>단, 함수 안에서 다시 선언한 함수는 해당 함수 밖을 벗어나면 실행할 수 없다.</p>
      </article>
    </section>

    <h4 class="sub-header">5.1.1 - 타입 힌팅</h4>
    <section>
      <article>
        <p>타입 힌팅은 파이썬 3.5버전 이후부터 지원되는 기능이다. 말그대로 함ㅅ가 어떤 타입을 파라미터로 전달받고 어떤 타입을 반환 값으로써 전달하는지 고드상에 작성할 수 있다. IDE 및 사람이 함수를 읽을 때 의미를 파악하기 쉬워졌다. 형태는 다음과 같이 함수 선언부 첫 번째 행에 필요한 정보를 다 넣는다.</p>
        <pre class="python"><code>def &lt;함수이름>(&lt;파라미터이름>: &lt;파라미터타입>) -> &lt;반환타입>:<br>    return "Hello ' + name</code></pre>
        <p>다음 코드5-5는 문자열과 숫자를 받고 숫자를 반환하는 함수이다. 타입힌팅을 이해하는 데 충분한 정보가 될 것이다.</p>
        <h5>코드5-5 타입 힌팅 사용 예</h5>
        <pre class="python"><code>In[5]:<br># 단어 1개, 숫자 1개를 전달받아서 단어의 길이와 숫자를 곱해서 반환합니다.<br>def count_lenth(word : str, num : int) -> int:<br>    return len(word) * num
        <br>count_lenth("miku", 39)
        <br>Out[5]:<br>156</code></pre>
      </article>
    </section>

    <h4 class="sub-header">5.1.2 - 함수를 변수처럼 전달하기</h4>
    <section>
      <article>
        <p>파이썬은 변수처럼 함수를 다른 함수에 전달할 수 있다.</p>
        <h5>코드5-6 함수를 변수로 사용</h5>
        <pre class="python"><code>In[6]:<br>def add_with_transform(left, right, transform_func):<br>    tmp_val = transform_func(left) + transform_func(right)<br>    return transform_func(tmp_val)
        <br>def add_plus_1(number):<br>    return numvber + 1
        <br># (2 + 1) + (3 + 1) + 1 = 8<br>ret_val = add_with_transform(2, 3, add_plus_1)
        <br>print(ret_val)
        <br>Out[6]:<br>8</code></pre>
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
