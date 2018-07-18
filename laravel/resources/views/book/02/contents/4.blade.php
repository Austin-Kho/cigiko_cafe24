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
print("### + ###")
print("i1 + i2: ", i1 + i2)   # 정수끼리

# -
print("### - ###")
print("f1 - f2: ", f1 - f2)   # 실수끼리

# *
print("### * ###")
print("i1 * f1: ", i1 * f1)   # 정수와 실수끼리

# /
print("### / ###")
print("i2 / i1: ", i2 / i1)   # 정수끼리

# //
print("### // ###")
print("f2 // f1: ", f2 // f1)   # 실수끼리

# %
print("### % ###")
print("i1 % f1: ", i1 % f1)   # 정수와 실수끼리

# **
print("### ** ###")
print("i1 ** f1: ", i1 ** f1)   # 정수와 실수끼리

Out[4]
### + ###
i1 + i2: 978

### - ###
f1 - f2: -2.705

### * ###
i1 * f1: 48.126

### / ###
i2 / i1: 24.076923076923077

### // ###
f2 // f1: 3.0

### % ###
i1 % f1: 0.7460000000000004

### ** ###
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
        <p>내용 입력</p>
      </article>
    </section>

    <h4 class="sub-header">3.5.2 - raw 문자열 표현법</h4>
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>

    <h4 class="sub-header">3.5.3 - 멀티라인 문자열 표현법</h4>
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.6. 문자열의 연산</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.7. 리스트</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>

    <h4 class="sub-header">3.7.1 - 리스트 연산</h4>
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>

    <h4 class="sub-header">3.7.2 - 리스트 아이템에 접근하기</h4>
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>

    <h4 class="sub-header">3.7.3 - 문자열을 리스트처럼 다루기</h4>
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.8. 딕셔너리</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.9. 집합</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">3.10. 튜플</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>
  </div>
  <!-- <li class=@if($id=='24') active @endif><a href="/book02/24" class="d2">3.1 변수 선언</a></li>
  <li class=@if($id=='25') active @endif><a href="/book02/25" class="d2">3.2 정수</a></li>
  <li class=@if($id=='26') active @endif><a href="/book02/26" class="d2">3.3 실수</a></li>
  <li class=@if($id=='27') active @endif><a href="/book02/27" class="d2">3.4 정수와 실수 연산</a></li>
  <li class=@if($id=='28') active @endif><a href="/book02/28" class="d2">3.5 문자열</a></li>
  <li class=@if($id=='29') active @endif><a href="/book02/29" class="d3">3.5.1 기본적인 선언과 사용</a></li>
  <li class=@if($id=='30') active @endif><a href="/book02/30" class="d3">3.5.2 raw 문자열 표현법</a></li>
  <li class=@if($id=='31') active @endif><a href="/book02/31" class="d3">3.5.3 멀티라인 문자열 표현법</a></li>
  <li class=@if($id=='32') active @endif><a href="/book02/32" class="d2">3.6 문자열의 연산</a></li>
  <li class=@if($id=='33') active @endif><a href="/book02/33" class="d2">3.7 리스트</a></li>
  <li class=@if($id=='34') active @endif><a href="/book02/34" class="d3">3.7.1 리스트 연산</a></li>
  <li class=@if($id=='35') active @endif><a href="/book02/35" class="d3">3.7.2 리스트 아이템에 접근하기</a></li>
  <li class=@if($id=='36') active @endif><a href="/book02/36" class="d3">3.7.3 문자열을 리스트처럼 다루기</a></li>
  <li class=@if($id=='37') active @endif><a href="/book02/37" class="d2">3.8 딕셔너리</a></li>
  <li class=@if($id=='38') active @endif><a href="/book02/38" class="d2">3.9 집합</a></li>
  <li class=@if($id=='39') active @endif><a href="/book02/39" class="d2">3.10 튜플</a></li> -->
