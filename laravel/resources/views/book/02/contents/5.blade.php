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
        <p>각 타입에 따라 False로 취급되는 경우를 이용하면 다음과 같이 사용할 수도 있다.</p>
        <h5>코드4-5 False로 취급되는 경우를 응용한 예</h5>
        <pre class="python"><code>In[4]:<br>name = ""
if name:
    print("Your name is ", name)
else:
    # 이쪽이 출력된다.
    print("Please enter your name")
        <br>Out[4]:<br>Please enter your name</code></pre>
        <h5>코드4-6 if-else문의 사용 예 2</h5>
        <pre class="python"><code>In[5]:<br>name = "Miku"<br>
if name:
    # 이쪽이 출력된다.
    print("Your name is: ", name)
else:
    print("Please enter your name")

Out[5]
Your name is: Miku</code></pre>
      </article>
    </section>

    <h4 class="sub-header">4.1.2 - elif 문</h4>
    <section>
      <article>
        <p>else 문 블록에 조건을 설정하고자 할 때 elif를 사용한다. 다른 프로그래밍 언어의 else if 에 해당한다.</p>
        <pre class="python"><code>if &lt;조건표현식>:<br>    참일 때<br>elif &lt;조건표현식>:
    앞 블록이 거짓일 때
    여기의 조건을 검사해
    참이면 실행됩니다.<br>else:
    앞 조건 중
    아무것도 만족하지 않을 때
    실행됩니다.</code></pre>
        <h5>코드4-7 elif 문 사용 예</h5>
        <pre class="python"><code>In[6]:<br>number = 39
        <br>if number == 13:
    # 실행되지 않는다.
    print("First if block")<br>elif number == 39:
    # 이 블록이 실행된다.
    print("Second elif block")
    print("Hello Miku!")<br>else:
    # 실행되지 않는다.
    print("oh...")
        <br>Out[6]:<br>Second elif block<br>Hello Miku!</code></pre>
        <p>참고로 파이썬은 switch 문이 없다. elif 문으로 switch 문을 대신해야 한다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">4.2. and, or, not</h3>
  <div class="chapter">
    <section>
      <article>
        <p>여러 조건을 한 번에 확인해야 할 경우가 있다. 보통 복수의 조건이 전부 참일 경우(and), 복수의 조건 중 하나라도 참일 경우(or), 조건 하나의 참과 거짓을 뒤집어서 검사하는 경우(not)가 된다. 참고로 파이썬에서는 익숙한 논리 연산자인 &&과 ||를 사용하지 않는다.</p>
        <h5>코드4-8 and 사용 예</h5>
        <pre class="python"><code>In[7]:<br>name = "miku"<br>number = 39
        <br># 복수의 조건이 모두 참일 경우에 실행<br>if name == "miku" and number == 39:<br>    print("You are digital diva miku!")<br>else:<br>    print("D.va?")
        <br>Out[7]:<br>You are digital diva miku!</code></pre>
        <h5>코드4-10 or 사용 예</h5>
        <pre class="python"><code>In[8]:<br>nick = "D.va"<br>name = "Song hana"
        <br>if nick == "D.va" or nick == "Diva":<br>    print("You must be", nick, "!!")
        <br>if nick == "Diva" or name == "Song hana":<br>    print("Welcome back to overwatch")
        <br>Out[8]:<br>You must be D.va !!<br>Welcome back to overwatch</code></pre>
        <h5>코드4-10 not 사용 예</h5>
        <pre class="python"><code>In[9]:<br>print(not True)<br>print(not False)
        <br>Out[9]:<br>False<br>True
        <br>In[10]:<br>is_diva = False
        <br>if not is_diva:<br>   print("You are diva!")
        <br>Out[10]:<br>You are diva!</code></pre>
        <p>조건의 반대 결과가 필요할 경우 not을 사용할 수 있다. 다른 프로그래밍 언어에서 !를 앞에 붙이는 것보다는 훨씬 코드를 이해하기 쉽다는 점은 덤이다.</p>
      </article>
    </section>

    <h4 class="sub-header">4.2.1 - 리스트, 딕셔너리, 집합, 튜플과 함께 사용하는 in</h4>
    <section>
      <article>
        <p>여러 값을 갖는 리스트, 딕셔너리, 집합, 튜플 타입의 데이터에서 특정 값이 있거나 없는 경우를 확인해야 할 경우에 사용할 수 있는 것이 in 이다.</p>
        <h5>코드4-11 in 의 기본 사용법</h5>
        <pre class="python"><code>In[11]:<br>l = [1, 2, 3]<br>s = {4, 5, 6, 6}<br>d = {"one":1, "two":2, "three":3}<br>t = (7, 8, 9)
        <br>print(1 in l)<br>print(6 in s)<br>print(7 in s)<br>print("one" in d)<br>print(9 in t)<br>print(10 in t)
        <br>Out[11]:<br>True<br>True<br>False<br>True<br>True<br>False</code></pre>
        <p>특정 값이 해당 데이터 타입에 들어 있으면 True, 그렇지 않으면 False 를 반환하게 했다. 참고로 딕셔너리의 경우는 키 값을 기준으로 검사를 하게 된다. 만약 딕셔너리의 특정 값이 존재하는지 찾고 싶을 때에는 다음과 같이 한다.</p>
        <h5>코드4-12 딕셔너리의 특정 값 검색</h5>
        <pre class="python"><code>In[12]:<br>d = {"one":1, "two":2, "three":3}
        <br>print(1 in d.values())
        <br>Out[12]:<br>True</code></pre>
        <p>in dict.key() 또는 keys()를 생략한 채 in dict 로 검색할 경우 딕셔너리의 키를 검색한다. 반면 딕셔너리의 '값'을 검색하기 위해서는 in dict.values() 로 딕셔너리의 모든 값을 검색할 수 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">4.3. while 문</h3>
  <div class="chapter">
    <section>
      <article>
        <p>if 문이 조건이 맞는 블록을 단 한번 실행한다면, while 문은 조건이 일치하는 동안 블록을 반복 실행한다.</p>
        <h5>코드4-13 while 문의 기본 사용 예</h5>
        <pre class="python"><code>In[13]:<br>i = 0
        <br>while i < 10:<br>    print("i is :", i)<br>    i += 1
        <br>Out[13]:<br>i is : 0<br>i is : 1<br>i is : 2<br>i is : 3<br>i is : 4<br>i is : 5<br>i is : 6<br>i is : 7<br>i is : 8<br>i is : 9</code></pre>
        <p>while 문을 쓸 때는 무한루프에 빠지지 않도록 주의한다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">4.4. for 문</h3>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬 흐름 제어의 정수라고 한다면 단연 for 문을 꼽을 수 있다. 간단한 구문으로 리스트와 딕셔너리를 순회하거나, 지정된 횟수만큼 작업을 반복할 수 있다.</p>
        <pre class="python"><code>for &lt;루프안 변수> in &lt;순회할 목록>:<br>    루프 내 실행문.<br>    실행문.</code></pre>
        <p>루프를 순회할 때마다 목록에서 아이템을 꺼내와 '루프안 변수'에 할당시킨다. 그렇게 할당된 '루프안 변수'는 루프 안에서 사용된다. </p>
        <h5>코드4-14 for 문의 기본 사용 예</h5>
        <pre class="python"><code>In[14]:<br>for i in range(10):<br>    print(i)
        <br>Out[14]:<br>0<br>1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</code></pre>
        <h5>코드4-15 리스트를 순회하는 for 문의 예</h5>
        <pre class="python"><code>In[15]:<br>names = ["Miku", "Rin", "Ren", "Luka", "Seeu", "D.va"]
        <br>for name in names:<br>    print("You are", name)
        <br>Out[15]:<br>You are Miku<br>You are Rin<br>You are Ren<br>You are Luka<br>You are Seeu<br>You are D.va</code></pre>
        <p>파이썬의 for 문은 C나 자바의 for 문과 조금 다르다. '(초기화, 조건, 실행)'의 형태가 아니라 해당 범위의 데이터 안을 순회하고, 순회를 완료하면 실행을 종료한다. 즉, 코드에서 for 문을 영어로 번역했을 때 읽히는 모습 그대로가 파이썬의 for 문이다. 따라서 파이썬의 for 문은 항상 in 이라는 키워드를 사용하는데, 특정 데이터 타입이 갖는 값(또는 키)를 순회한다는 뜻이다.</p>
      </article>
    </section>

    <h4 class="sub-header">4.4.1 - 리스트 및 딕셔너리와 함께 for 문 사용하기</h4>
    <section>
      <article>
        <p>리스트와 함께 for 문을 사용하는 것은 간단하다. in 뒤에 리스트를 위치시키면 된다. enumerate 키워드로 인덱스와 리스트 요소를 동시에 순회할 수도 있다.</p>
        <h5>코드4-16 리스트를 사용하는 for 문과 enumerate()</h5>
        <pre class="python"><code>In[16]:<br>names = ["Miku", "Rin", "Ren", "Luka", "Seeu", "D.va"]
        <br>for i, v in enumerate(names):<br>    print("Index :", i, "- value :", v)
        <br>Out[16]
Index : 0 - value : Miku
Index : 1 - value : Rin
Index : 2 - value : Ren
Index : 3 - value : Luka
Index : 4 - value : Seeu
Index : 5 - value : D.va</code></pre>
        <h5>코드4-17 딕셔너리에서 for 문 사용</h5>
        <pre class="python"><code>In[17]:<br>Diva_info = {
    "Name":"Miku",
    "version":3,
    "company":"Overwatch",
    "like_number":39
}
for title in Diva_info:
    print(title, ":", Diva_info[title])

Out[17]:
like_number : 39
version : 3
company : Overwatch
Name : Miku</code></pre>
        <p>딕셔너리 내부에 순서가 없는 데이터 타입이므로 선언할 때의 순서와는 다른 결과가 나온다. 키를 순회하면서 값에 접근하는 것이 아니라 처음부터 값에만 접근하려면 values()를 사용한다.</p>
        <h5>코드4-18 딕셔너리의 값에만 접근하는 for 문</h5>
        <pre class="python"><code>In[18]:<br>for values in Diva_info.values():
    print(values)
          <br>Out[18]:<br>39<br>3<br>Overwatch<br>Miku</code></pre>
      </article>
    </section>

    <h4 class="sub-header">4.4.2 - range() 함수와 함께 사용하기</h4>
    <section>
      <article>
        <p>특정 횟수만큼 반복 실행하려면 코드4-14 와 같이 range() 함수를 사용한다. range()라는 함수를 사용하면 range(시작, 끝, 간격)형태로 지정하는 숫자 시퀀스를 만들 수 있다. 리스트의 슬라이스 형식과 유사하다.</p>
        <h5>코드4-19 range() 함수를 이용한 숫자 시퀀스</h5>
        <pre class="python"><code>In[19]:<br>for i in range(1, 20, 2):<br>    print(i)
        <br>Out[19]:<br>1<br>3<br>5<br>7<br>9<br>11<br>13<br>15<br>17<br>19</code></pre>
        <p>1부터 시작해서 2씩 증가하며 20이 끝인 range()함수의 값을 순서대로 출력한 것이다. 이렇게 for 문을 일정한 횟수만큼, 그리고 특정 숫자 구간을 반복 실행할 수 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">4.5. break</h3>
  <div class="chapter">
    <section>
      <article>
        <p>루프안에서 break 문을 만나면 파이썬은 즉시 반복을 종료하고 루프를 탈출한다. 보통 루프 안에서 조건문 안에 넣고 특정 조건이 만족할 경우에 break를 실행한다.</p>
        <h5>코드4-20 break 의 기본 사용 예</h5>
        <pre class="python"><code>In[20]:<br>numbers = [9, 1, 2, 7, 0, 4, 10, 2, 39, 10, 33, 36, 38]
        <br>for number in numbers:
    if number == 39:
        print("I Found it! 39!!")
        break
    else:
        print("I found", number, "but this is not I want")

Out[20]:
I found 9 but this is not I want
I found 1 but this is not I want
I found 2 but this is not I want
I found 7 but this is not I want
I found 0 but this is not I want
I found 4 but this is not I want
I found 10 but this is not I want
I found 2 but this is not I want
I Fount it! 39!!</code></pre>
        <p>break 가 실행되면 뒤에 리스트 아이템이 더 남아있더라도 for 문 실행을 중단한다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">4.6. continue</h3>
  <div class="chapter">
    <section>
      <article>
        <p>continue는 break와 다르게 실행되는 즉시 루프 블록의 나머지 부분을 건너뛰고, 다음 아이템을 대상으로 새로 for 문 실행을 시작한다.</p>
        <h5>코드4-21 continue의 사용 예</h5>
        <pre class="python"><code>In[21]:<br>l = ['1', 2, '3', '4', 5]
        <br>for item in l:<br>    if type(item) is str:<br>
        # item의 타입이 str일 때 실행된다.
        continue
    
    print("number:", item)
    print("multiply by 2:", item * 2)

Out[21]:
number: 2
multiply by 2: 4
number: 5
multiply by 2: 10</code></pre>
        <p>continue 문으로 특정 조건일 때 루프의 나머지를 통째로 지나치게 할 수 있다.</p>
      </article>
    </section>

    <h4 class="sub-header">4.6.1 - else</h4>
    <section>
      <article>
        <p>for 문이나 while 문에서도 else를 사용할 수 있다. 더 정확하게는 break와 짝을 지어서 사용할 수 있다.</p>
        <p>for 문에서 사용하는 else문 블록은 break로 루프를 빠져 나오지 않았을 때 실행된다. 다른 프로그래밍 언어에서 따로 플래그용 변수를 사용하는 걸 대체 하는 셈이다.</p>
        <h5>코드4-22 for 문에서의 else 문 사용</h5>
        <pre class="python"><code>In[22]:<br>numbers = [9, 1, 2, 7, 0, 4, 10, 2, 39, 10, 33, 36, 38]
        <br>for number in numbers:
    if number == 39:
        print("I Found it! 39!!")
        break
    else:
        print("I found", number, "but this is not I want")
else:
    print("Not Found 39...")

Out[22]:
I found 9 but this is not I want
I found 1 but this is not I want
I found 2 but this is not I want
I found 7 but this is not I want
I found 0 but this is not I want
I found 4 but this is not I want
I found 10 but this is not I want
I found 2 but this is not I want
I Fount it! 39!!</code></pre>
        <p>이 예제는 코드4-20와 형태가 같으며, for 문 블록 뒤에 else 문을 붙인 것만 다르다. 찾으면 찾았다고 출력하고, 못찾으면 못찾았다고 출력한다. 이 경우 39를 찾아서 break 가 실행되었으니 for 문의 else 문 블록은 실행되지 않아서 코드4-20의 예제와 결과와 같다.</p>
        <h5>코드4-23 대상 리스테에서 39 제외</h5>
        <pre class="python"><code>In[23]:<br>numbers = [9, 1, 2, 7, 0, 4, 10, 2, 10, 33, 36, 38]
        <br>for number in numbers:
    if number == 39:
        print("I Found it! 39!!")
        break
    else:
        print("I found", number, "but this is not I want")
else:
    print("Not Found 39...")

Out[23]:
I found 9 but this is not I want
I found 1 but this is not I want
I found 2 but this is not I want
I found 7 but this is not I want
I found 0 but this is not I want
I found 4 but this is not I want
I found 10 but this is not I want
I found 2 but this is not I want
I found 10 but this is not I want
I found 33 but this is not I want
I found 36 but this is not I want
I found 38 but this is not I want
Not Found 39...</code></pre>
        <p>코드4-22와 같지만 대상 리스트에 39가 없다. 따라서 모든 리스트를 순회하더라도 break 가 실행되지 않았으므로 else 문 블록이 실행된다.</p>
        <p>이렇듯 플래그 변수 사용을 줄일 수 있는 것이 for 문이나 while 문에서의 else 문블록이다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">4.7. pass</h3>
  <div class="chapter">
    <section>
      <article>
        <p>아무것도 실행하지 않지만 무언가 있어야 할 자리에 넣는 것이 pass 이다.</p>
        <h5>코드4-24 pass 사용 예</h5>
        <pre class="python"><code>for  i in range(10):<br>    # 실제 아무것도 하지 않습니다.<br>    pass</code></pre>
        <p>아무것도 하지 않고 에러가 나지도 않는다.</p>
      </article>
    </section>
  </div>