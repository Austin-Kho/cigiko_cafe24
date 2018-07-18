  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article class="">
        <p>거의 모든 프로그램은 데이터를 가지고 연산을 한다. 이 장에서는 데이터를 저장하고 다루기 위한 방법들을 살펴본다. 변수의 선언, 값 할당, 할당된 값의 타입에 따른 기본 연산을 해 보자.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.1. 변수 선언</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>파이썬은 '변수이름 = 할당 값' 이라는 간단한 형태로 변수를 선언한다.</p>
        <p class="bg-warning"><strong>TIP</strong> 타입 힌팅(Type Hinting)이라는 규칙에 따라서 함수를 작성하면 엉뚱한 타입의 변수가 넘어가는 것을 방지할 수 있다. 5.1.1에서 다시 설명한다.</p>

        <h5>코드3-1 다양한 변수 선언 예</h5>
        <pre><code>In[1]:<br>diva = "Song Hana"<br>is_she_play_to_win = True<br>digital_diva = "Hatsune Miku"<br>diva_version = 3.0<br>how_many_diva = 2<br>diva_list = [diva, digital_diva]<br>new_challenger = {"name":"Miku"}
        <br>print(type(digital_diva))
print(type(is_she_play_to_win))
print(type(diva_version))
print(type(how_many_diva))
print(type(diva_list))
print(type(new_challenger))
         <br>Out[1]:<br>&lt;class 'str'><br>&lt;class 'bool'><br>&lt;class 'float'><br>&lt;class 'int'><br>&lt;class 'list'><br>&lt;class 'dict'></code></pre>
         <p>실행 결과엣 보듯 변수를 선언하고 값을 할당하는 것만으로도 충분하다. 나머지는 파이썬이 전부 알아서 해당 타입을 유추해 계산한다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.2. 정수</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>정수는 대부분의 언어에서 익히 쓰던 int와 다를 것이 없다. 차이점이 있다면 매우 큰 수라도 처리할 수 있다는 것 뿐이다.</p>

        <h5>코드3-2 정수 사용 예</h5>
        <pre><code>In[2]:<br>i = 39<br>i2 = -3<br>biiiiig_int = 999999999999999999999999999999999999999999
        <br>print(i)<br>print(i2)<br>print(biiiiig_int)
        <br>Out[2]:<br>39<br>-3<br>999999999999999999999999999999999999999999</code></pre>
        <p>선언하고 할당하면 된다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.3. 실수</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>실수도 정수와 크게 다르지 않다. 다음 코드를 보자.</p>

        <h5>코드3-3 실수 사용 예</h5>
        <pre><code>In[3]:<br>f = 0.9999<br>f2 = 3.141592<br>f3 = -3.9<br>f4 = 3/9
        <br>print(f)<br>print(f2)<br>print(f3)<br>print(f4)
        <br>Out[3]:<br>0.9999<br>3.141592<br>-3.9<br>0.3333333333333333</code></pre>
        <p>마찬가지로 선언만 하면 파이썬이 알아서 인식한다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.4. 정수와 실수 연산</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>이제 정수(int)와 실수(float)를 이용해 간단한 사칙연산과 그 외 연산들을 해 보자.</p>
        <ul>
          <li>더하기(+)</li>
          <li>빼기(-)</li>
          <li>곱하기(*)</li>
          <li>나누기(/)</li>
          <li>나누기 - 소숫점 버림(//)</li>
          <li>나머지(%)</li>
          <li>제곱(**)</li>
        </ul>

        <h5>코드3-4 정수와 실수를 이용하는 연산</h5>
        <pre><code>In[4]:<br>i1 = 39<br>i2 = 939<br>f1 = 1.234<br>f2 = 3.939
# +
print("i1 + i2: ", i1 + i2)   # 정수끼리

# -
print("f1 - f2: ", f1 - f2)   # 실수끼리

# *
print("i1 * f1: ", i1 * f1)   # 정수와 실수끼리

# /
print("i2 / i1: ", i2 / i1)   # 정수끼리

# //
print("f2 // f1: ", f2 // f1)   # 실수끼리

# %
print("i1 % f1: ", i1 % f1)   # 정수와 실수끼리

# **
print("i1 ** f1: ", i1 ** f1)   # 정수와 실수끼리

Out[4]
i1 + i2: 978
f1 - f2: -2.705
i1 * f1: 48.126
i2 / i1: 24.076923076923077
f2 // f1: 3.0
i1 % f1: 0.7460000000000004
i1 ** f1: 91.91231928197118</code></pre>
        <p>정수와 실수의 연산 실행 결과는 더 큰 범위를 다루는 숫자 형식으로 결과를 반환한다. 예를 들어 어느 한 쪽의 숫자가 부동소수점 수이면 결과도 부동소수점 수로 출력한다.</p>
        <p class="bg-warning"><strong>TIP</strong> 파이썬2와 3에서는 나누기 연산(/)의 동작이 다르다. 파이썬2의 경우 나누기 연산은 파이썬3의 '나누기 - 소숫점 버림(//)'처럼 동작한다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.5. 문자열</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>문자열을 다루는 방법 역시 다른 프로그래밍 언어와 크게 다르지 않다. 파이썬에서 작은따옴표(')와 큰따옴표(")는 차이가 없다. PEP8은 그 둘에 대한 권장사항이 없다.</p>
      </article>
    </section>

    <h4 class="sub-header">3.5.1 - 기본적인 선언과 사용</h4>
    <section>
      <article class="">
        <p>문자열은 변수에 작은따옴표(')와 큰따옴표(")를 넣어서 선언하고 사용한다.</p>

        <h5>코드3-5 기본적인 문자열 선언과 사용</h5>
        <pre><code>In[5]:<br>diva = "Miku"<br>another_diva = 'Song Hana'
        <br>print(type(diva))<br>print(type(another_diva))
        <br>Out[5]:<br>&lt;class 'str'><br>&lt;class 'str'></code></pre>
        <p>또한 다른 프로그래밍 언어처럼 이스케이프 문자로 역슬래시(\)를 사용한다.</p>

        <h5>코드3-6 이스케이프 문자 사용 예 1</h5>
        <pre><code>In[6]:<br>escape_s1 = "This is \"double quote\""<br>escape_s2 = 'This isn\'t'
        <br>print(escape_s1)<br>print(escape_s2)
        <br>Out[6]:<br>This is "double quote"<br>This isn't</code></pre>

        <h5>코드3-7 이스케이프 문자 사용 예 2</h5>
        <pre><code>In[7]:<br>s1 = "Tab \tThis"<br>s2 = "New Line\nHello!"
        <br>print(s1)<br>print(s2)
        <br>Out[7]:<br>Tab  This<br>New Line<br>Hello!</code></pre>

      </article>
    </section>

    <h4 class="sub-header">3.5.2 - raw 문자열 표현법</h4>
    <section>
      <article class="">
        <p>역슬래시 자체를 문자열에 자주 포함해야 할 때가 있다. 예를 들면 경로 표현 등이 있겠다. 이런 경우에는 문자열 앞에 r을 붙여서 raw문자열로 만들어 줄 수 있다.</p>

        <h5>코드3-8 raw 문자열 사용 예</h5>
        <pre><code>In[8]:<br>raw_s1 = r'C:\Programs\new Program\"'<br>raw_s2 = r"\\t\n\b\s"<br>raw_s3 = r'\'"'<br>raw_s4 = r"\"'"
        <br>print(raw_s1)<br>print(raw_s2)<br>print(raw_s3)<br>print(raw_s4)
        <br>Out[8]:<br>C:\Programs\new program\"<br>\\t\n\b\s<br>\'"<br>\"'</code></pre>
        <p>raw 문자열일 경우에는 안에 들어간 역실래시가 역슬래시 그대로 사용된다. 다만 문자열을 감싸는 것이 작은따옴표나 큰 따옴료일 경우, 이를 그대로 사용하기 위한 역슬래시조차 그대로 쓰인다는 것에 주의한다.</p>

      </article>
    </section>

    <h4 class="sub-header">3.5.3 - 멀티라인 문자열 표현법</h4>
    <section>
      <article class="">
        <p>파이썬은 한 번에 여러 줄의 문자열을 작성해야 할 때, 간편하게 멀티라인 문자열을 할당할 수 있는 방법을 제공한다.</p>
        <h5>코드3-9 멀티라인 문자열 사용 예 1</h5>
        <pre><code>In[9]:<br>multi_s = """이 문자열은 <br>멀티라인<br>문자열입니다."""
        <br>print(multi_s)
        <br>Out[10]:<br>이 문자열은<br>멀티라인<br>문자열입니.</code></pre>
        <p>이 처럼 작은따옴표나 큰따옴표 3개로 감싸면, 해당 문자열은 멀티라인 문자열이 되며, 문자열 안에서 입력한 줄바꿈을 그대로 사용한다. 멀티라인 문자열에서 각 라인의 마지막에 붙는 역슬래시(\)는 완전 다른 역할을 한다. 해당 라인의 줄바꿈을 적용하지 않게 한다.</p>
        <h5>코드3-10 멀티라인 문자 사용 예 2</h5>
        <pre><code>In[10]:<br>multi_s2 = '''이 문자열 역시 \<br>멀티라인 문자열입니다.\<br>한 줄의 마지막에<br>역슬래시를 붙이면<br>줄바꿈이 \<br>되지 않습니다.<br>'''
        <br>print(multi_s2)
        <br>Out[10]:<br>이 문자열 역시 멀티라인 문자열입니다. 한 줄의 마지막에<br>역슬래시를 붙이면<br>줄바꿈이 되지 않습니다.</code></pre>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.6. 문자열의 연산</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>문자열 또한 덧셈과 곱셈 연산을 할 수 있다.</p>
        <h5>코드3-11 문자열의 덧셈과 곱셈 연산</h5>
        <pre><code>In[11]:<br>diva = "Miku"<br>first_sound = "Hatsune"
        <br>print(3*diva)<br>print(first_sound+diva)
        <br>Out[11]:<br>MikuMikuMiku<br>HatsuneMiku</code></pre>
        <p>그 외 다른 프로그래밍 언어에서 문자열로 할 수 있는 모든 것을 파이썬에서도 그대로 할 수 있다.</p>
        <h5>코드3-12 함수나 배열을 이용하는 문자열 연산</h5>
        <pre><code>In[12]:<br>print(dir(diva))<br>print("Capitalize: ", diva.capitalize())<br>print("is 'first_sound' end with 'e'?: ", first_sound.endswith("e"))<br>print("join strings with 'diva' str: ", diva.join(["kagamine", "len", "megurine"]))
        <br>Out[12]:
['__add__', '__class__', '__contains__', '__delattr__', '__dir__', '__doc__', '__eq__', '__format__', '__ge__', '__getattribute__', '__getitem__',
--snip--
'rpartition', 'rsplit', 'rstrip', 'split', 'splitlines', 'startswith', 'strip', 'swapcase', 'title', 'translate', 'upper', 'zfill']
Capitalize: Miku
is 'first_sound' end with 'e'?:  True
join strings with 'diva' str:  kagamineMikulenMikumegurine</code></pre>
        <p>파이썬의 str 클래스로 할 수 있는 작업들은 앞 실행 결과와 같다. 해당 문자열에 '.'을 입력하고 IDE가 제시하는 자동 완성 기능을 이용해 코드를 입력하는 연습을 몇 번 하면 금방 익힐 수 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.7. 리스트</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>C에 배열이 있다면 파이썬에는 리스트가 있다. 파이썬의 리스트는 담을 수 있는 아이템 타입에 제한이 없다. 심지어 리스트 그 자신도 담을 수 있을 정도다. 다중 배열처럼 사용할 수도 있다.</p>
        <p>리스트는 대괄호([, ])로 열고 닫으며, 콤마(,)로 각 요소들을 구별한다.</p>
        <h5>코드3-13 기본적인 리스트 사용 예</h5>
        <pre><code>In[13]:<br>l1 = [1, 2, 3]<br>l2 = ["a", "b", "c", "diva"]<br>l3 = ['Miku', 39]<br>[[0, 1], [2, 3], [4, 5]]
        <br>print(l1)<br>print(l1[0])<br>print(l2)<br>print(l2[1])<br>print(l3)<br>print(l3[0])<br>print(l4)<br>print(l4[2][1])
        <br>Out[13]:<br>[1, 2, 3]<br>1<br>['a', 'b', 'c', 'diva']<br>b<br>['miku', 39]<br>miku<br>[[0, 1], [2, 3], [4, 5]]<br>5</code></pre>
        <p>리스트를 생성할 때 위 코드 처럼 대괄호를 사용해서 만드는 방법 외에 한 가지 방법이 더 있다. list()를 사용하는 것이다.</p>
        <h5>코드3-14 list()를 사용한 리스트 생성</h5>
        <pre><code>In[14]:<br>l5 = list("Hatsune Miku")
        <br># 앞에서 생성한 리스트를 이용해 새로 리스트를 생성합니다.<br>l6 = list(l1+l2+l3)
        <br>print(l5)<br>print(l6)
        <br>Out[14]:<br>['H', 'a', 't', 's', 'u', 'n', 'e', ' ', 'M', 'i', 'k', 'u']<br>[1, 2, 3, 'a', 'b', 'c', 'diva', 'miku', 39]</code></pre>
        <p>실행 결과에서 보듯 리스트의 인덱스는 0부터 시작한다. 그리고 파이썬에서 한 가지 특이한 점은 음수 인덱스를 사용할 수 있다는 점이다.</p>
        <h5>코드3-15 음수 인덱스 사용</h5>
        <pre><code>In[15]:<br>l5 = [0, 1, 2, 3, 4, 5]<br>#  0  1  2  3  4  5<br># -6 -5 -4 -3 -2 -1
        <br>print("l5 = ", l5)<br>print("l5[-1] = ", l5[-1])<br>print("l5[-2] = ", l5[-2])<br>print("l5[-6] = ", l5[-6])
        <br>Out[15]:<br>l5 = [0, 1, 2, 3, 4, 5]<br>l5[-1] = 5<br>l5[-2] = 4<br>l5[-6] = 0</code></pre>
        <p>음수 인덱스는 '뒤에서 몇 번째~' 하는 방식으로 아이템을 가져올 때 매우 유용하다. 리스트 전체의 길이를 구한 다음 다시 계산하지 않아도 되는 것이다.</p>
      </article>
    </section>

    <h4 class="sub-header">3.7.1 - 리스트 연산</h4>
    <section>
      <article class="">
        <p>리스트를 대상으로 사칙연산을 할 수 있다. 물론 일반적인 연산과 다르지만, 리스트 자체를 빠르게 다룰 수 있다는 점에서 굉장한 편리함을 제공한다.</p>
        <h5>코드3-16 리스트 연산</h5>
        <pre><code>In[16]:<br>l1 = [1, 2, 3]<br>l2 = [4, 5, 6]
        <br>print("l1 + l2 = ", l1 + l2)<br>print("l1 * 3 ", l1 * 3)
        <br>Out[16]:<br>l1 + l2 = [1, 2, 3, 4, 5, 6]<br>l1 * 3 = [1, 2, 3, 1, 2, 3, 1, 2, 3]</code></pre>
        <p>앞에서 살펴 본 문자열 덧셈, 곱셈 연산과 같다. 더하면 이어 붙이고, 곱하면 해당 숫자만큼 반복한 결과를 반환한다.</p>
      </article>
    </section>

    <h4 class="sub-header">3.7.2 - 리스트 아이템에 접근하기</h4>
    <section>
      <article class="">
        <p>리스트에 있는 아이템을 꺼내는 방법에는 여러가지가 있다. 간단하게 인덱스만 지정해서 해당 아이템만 꺼낼 수도 있고, 범위를 지정할 수도 있고, 범위와 동시에 특정 n번째 아이템만 반환 받을 수도 있다.</p>
        <h5>코드3-17 리스트 아이템 접근(슬라이스)</h5>
        <pre><code>In[17]:<br>l1 = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]
        <br>print("l1 = ", l1)
        <br># list[start:stop:step]<br># list[start:]<br># list[:stop]<br># list[::step]<br># list[start:stop]<br># list[start::step]<br># list[:stop:step]
        <br># 9번째 인덱스 이후만 가져오기<br>print("l1[9:] = ", l1[9:])
        <br># 15번째 인덱스 이전만 가져오기<br>print("l1[:15] = ", l1[:15])
        <br># 2번째마다의 아이템을 가져오기<br>print("l1[::2] = ", l1[::2])
        <br># 7번째마다의 아이템을 가져오기<br>print("l1[::7] = ", l1[::7])
        <br># 5번째부터 시작해서 2번째마다 아이템을 가져오기<br>print("l1[5::2] = ", l1[5::2])
        <br># 17번째 이전까지 매 4번째마다 아이템을 가져오기<br>print("l1[:17:4] = " li[:17:4])
        <br># 7번째부터 시작해서 3번째마다 아이템을 가져오고, 15번째를 전달하지 않기<br>print("l1[7:15:3] = ", l1[7:15:3])
        <br>Out[17]:<br>li = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]
l1[9:] = [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]
l1[:15] = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
l1[::2] = [0, 2, 4, 6, 8, 10, 12, 14, 16, 18]
l1[::7] = [0, 7, 14]
l1[5::2] = [0, 4, 8, 12, 16]
l1[:17:4] = [0, 4, 8, 12, 16]
l1[7:15:3] = [7, 10, 13]</code></pre>
      </article>
    </section>

    <h4 class="sub-header">3.7.3 - 문자열을 리스트처럼 다루기</h4>
    <section>
      <article class="">
        <p>파이썬에서 문자열은 리스트처럼 인덱스와 슬라이스를 이용해서 각 요소에 접근할 수 있다.</p>
        <h5>코드3-18 문자열을 리스트로 다루기</h5>
        <pre><code>In[18]:<br>s1 = "Hatsune Miku"
        <br>print("s1 =  ", s1)
        <br>print("s1[2] = ", s1[2])<br>print("s1[8:] = ", s1[8:])<br>print("s1[-4:] = ", s1[-4:])<br>print("s1[:7] = ", s1[:7]<br>print("s1[::2] = ", s1[::2])
        <br>Out[18]:<br>s1 = Hatsune Miku<br>s1[2] = t<br>s1[8:] = Miku<br>s1[-4:] = Miku<br>s1[:7] = Hatsune<br>s1[::2] = HtueMk</code></pre>
        <p>문자열을 리스트처럼 다룰 때의 장점은 문자열의 특정 구간을 잘라낼 때 매우 편리하다는 것이다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.8. 딕셔너리</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>다른 프로그래밍 언어에서는 '연관 배열', '구조체', '해시 맵' 등으로 부르는 '카 : 값' 쌍을 다룰 수 있는 데이터 타입을 파이썬에서는 딕셔너리(dictionary)라고 한다. 딕셔너리는 중괄호({, })로 열고 닫고, 키와 값을 콜론(:)으로 묶는다. 각각의 키:값 쌍은 콤마(,)로 구분한다.</p>
        <p>딕셔너리의 키 값은 어떠한 것이라도 될 수 있다. 심지어 True나 False 같은 논리값이라도 사용할 수 있다. 단 대응 관계가 해시블(hashable)한 타입이어야 한다. True와 False는 정수 1과 0으로 간주하며 대응 관계이다.</p>
        <p>딕셔너리의 값을 가져올 때는 리스트와 동일하게 '딕셔너리[키]'형식을 사용한다. 또한 한 딕셔너리 안의 키는 고유(unique) 값을 사용해야 한다.</p>
        <h5>코드3-19 기본적인 딕셔너리 사용 예</h5>
        <pre><code>In[19]:<br>d1 = {
  True : "Yes! This is True!!!",
  False : "Nope",
  39 : "Miku",
  39.39 : "Hatsune",
  "Diva" : "Song Hana"
}

# True and False
print(d1[True])
print(d1[False])
print(d1[1 > 0])
print(d1[-1 > 0])

# numbers
miku = 39
print(d1[39])
print(d1[39.39])

# string
print(d1["Diva"])

Out[19]:
Yes! This is True!!!
Nope
Yes! This is True!!!
Nope
Miku
Hatsune
Song Hana</code></pre>
        <p>리스트와 마찬가지로 딕셔너리를 만드는 방법이 하나 더 있다. dict()를 사용하는 방법이다.</p>
        <h5>코드3-20 dict()를 사용한 딕셔너리 생성</h5>
        <pre><code>In[20]:<br>d2 = dict(on=999, off=100, l=[1,2,3], s="Miku")
        <br>print(d2)
        <br>Out[20]<br>{'on': 999, 'off': 100, 'l': [1, 2, 3], 's': 'Miku'}</code></pre>
        <p>단, <u>dict()를 이용해서 딕셔너리를 생성할 경우 <mark>키 값은 문자열</mark>만 사용해야 한다</u>.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.9. 집합</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>파이썬에서는 집합이라는 데이터 타입을 제공한다. 형태는 딕셔너리에서 키 값만 있는 것과 비슷하다. 딕셔너리와 같이 키는 그 안에서 유일해야 한다. 또 다른 특징은 키에 순서가 없다는 것이다.</p>
        <h5>코드3-21 기본적인 집합 사용 예</h5>
        <pre><code>In[21]:<br>set1 = {'h', 'e', 'l', 'l', 'o', 'h', 'a', 't', 's', 'u', 'n', 'e'}<br>set2 = {'m', 'i', 'k', 'u', 'l', 'o', 'v', 'e'}<br>set3 = set("Song Hana")
        <br>print(set1)<br>print(set2)<br>print(set3)
        <br>Out[21]:<br>{'s', 'o', 'n', 'a', 'u', 't', 'h', 'e', 'l'}<br>{'o', 'k', 'e', 'm', 'u', 'v', 'i', 'l'}<br>{'o', 'n', 'S', 'a', ' ', 'h', 'g'}</code></pre>
        <p>또한 수학과 마찬가지로 교집합, 합집합, 차집합 등과 같은 집합 관련 연산을 할 수 있다.</p>
        <h5>코드3-23 집합의 연산</h5>
        <pre><code>In[22]:<br># 교집합<br>print(set1 & set2)
        <br># 합집합<br>print(set1 | set2)
        <br># 차집합<br>print(set1 - set2)
        <br>Out[22]:<br>{'l', 'o', 'e', 'u'}<br>{'o', 'n', 's', 'k', 'v', 'l', 'i', 'a', 'h', 'e', 't', 'm', 'u'}<br>{'n', 't', 's', 'a', 'h'}</code></pre>
        <p>일반적으로 집합이 필요한 부분에 사용할 때 유용한 데이터 타입이다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.10. 튜플</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>튜플은 리스트와 비슷하지만 변경할 수 없는 데이터 타입이다. 요소의 추가, 삭제, 변경을 할 수 없다. 리스트와 비슷하지만 괄호((, ))로 열고 닫아서 선언한다는 점이 다르다. 더 정확히 설명하면 튜플은 콤마(,)로 구별되는 객체의 나열이다. 괄호를 이용해서 튜플임을 좀 더 명확하게 하는 것이다. 따라서 다음처럼 튜플을 선언할 수도 있다.</p>
        <pre><code># 요소가 1개인 튜플<br>t = 1,<br># 요소가 2개인 튜플<br>t2 = 1, 2</code></pre>
        <h5>코드3-23 기본적인 튜플 사용 예</h5>
        <pre><code>In[23]:<br>t1 = (5, 6, 7, 8, 9)
        <br>print(t1)<br>print(t1[0])<br>print(t1[3:])<br>print(t1[:2])
        <br>Out[23]:<br>(5, 6, 7, 8, 9)<br>5<br>(8, 9)<br>(5, 6)</code></pre>
        <p>이처럼 요소에 접근만 하는 것이라면 리스트와 똑같이 사용할 수 있다. 하지만 추가, 변경, 삭제가 되지 않으므로 절대로 변경되어서는 안 되는 값을 튜플로 사용하길 권한다.</p>
      </article>
    </section>
  </div>