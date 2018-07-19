  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬 또한 다른 언어와 같이 일정 횟수를 반복 실행할 수 있게 하는 for문, 조건이 맞는 동안 반복 실행하는 while문, 조건에 따라 특정 코드를 처리하도록 나누는 if-else문을 제공한다. 그리고 그 안에서 좀 더 세부적인 동작을 할 수 있게 하는 break, continue, pass 문 등이 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">4.1. if 문</h3>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬의 if 문은 괄호와 코드블록에 중괄호를 사용하지 않는다는 점을 제외하면 다르지 않다.</p>
        <h5>코드4-1 if문의 기본 사용 예</h5>
        <pre class="python"><code>In[1]:<br>if True:
    print("Yes")
    
if False:
    # 출력되지 않음
    print("No")
    
Out[1]:
Yes</code></pre>
        <p>if 문은 다음 형식으로 사용한다.</p>
        <pre class="python"><code>if &lt;조건표현식>:<br>    조건이 참일 때<br>    실행할 <br>    코드를 적습니다.</code></pre>
        <p>if 문 다음에 조건 표현식과 콜론(:)을 입력한 후, 다음 행부터는 한 단계 들여쓰기 한다. 해당 블록의 조건 표현식이 참일 때 실행된다.</p>
        <p>조건표현식은 True나 False를 반환할 수 있는 표현식이면 무엇이든 된다.</p>
        <h5>코드4-2 조건표현식의 사용 예</h5>
        <pre class="python"><code># 다음은 단독으로 조건에 들어가면 True로 취급합니다.<br>number_ture = 39<br>string_true = "miku"<br>list_true = [3, 9, 39]<br>tuple_true = (3.9, 39.39)<br>dict_true = {"name":"Song Hana"}
        <br># 다음은 False로 취급합니다.<br>number_false = 0<br>string_false = ""<br>list_false = []<br>tuple_false = ()<br>dict_false = {}</code></pre>
        <p>그리고 이러한 변수들을 비교할 때 다음과 같이 사용할 수 있다.</p>
        <h5>코드4-3 조건표현식 변수 비교</h5>
        <pre class="python"><code>In[2]:<br>a = 1<br>b = 0
        <br># == 양 변이 같을 때 참.<br>print(a == b)
        <br># != 양 변이 다를 때 참.<br>print(a != b)
        <br># > 왼쪽이 클 때 참.<br>print(a > b)
        <br># >= 왼쪽이 크거나 같을 때 참.<br>print(a >= b)
        <br># < 오른쪽이 클 때 참.<br>print(a < b)
        <br># <= 오른쪽이 크거나 같을 때 참.<br>print(a <= b)
        <br>Out[2]:<br>False<br>True<br>True<br>True<br>False<br>False</code></pre>
      </article>
    </section>

    <h4 class="sub-header">4.1.1 - else 문</h4>
    <section>
      <article>
        <p>if문의 조건이 거짓일 때는 if문 블록이 실행되지 않는다. 반면 else문에서는 조건이 거짓일 때 그 다음 블록이 실행된다.</p>
        <pre class="python"><code>if &lt;조건표현식>:<br>    조건이 참일 때<br>    실행할<br>    코드를<br>    넣습니다.<br>else:<br>    조건이 거짓일 때<br>    실행됩니다.</code></pre>
        <h5>코드4-4 if-else문 사용 예 1</h5>
        <pre class="python"><code>In[3]:<br>if False:<br>    # 여기는 실행되지 않음.<br>    print("You can't reach here")<br>else:<br>    # 여기가 실행된다.<br>    print("Oh, you are here")
        <br>Out[3]:<br>Oh, you are here</code></pre>
      </article>
    </section>

    <h4 class="sub-header">4.1.2 - elif 문</h4>
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">4.2. and, or, not</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>

    <h4 class="sub-header">4.2.1 - 리스트, 딕셔너리, 집합, 튜플과 함께 사용하는 in</h4>
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">4.3. while 문</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">4.4. for 문</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>

    <h4 class="sub-header">4.4.1 - 리스트 및 딕셔너리와 함께 for 문 사용하기</h4>
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>

    <h4 class="sub-header">4.4.2 - range() 함수와 함께 사용하기</h4>
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">4.5. break</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">4.6. continue</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>

    <h4 class="sub-header">4.6.1 - else</h4>
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">4.7. pass</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>