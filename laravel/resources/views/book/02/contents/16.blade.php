  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>1장에서 파이썬의 장점으로 데이터 분석에 필요한 라이브러리가 풍부하다고 한 적이 있다. 이 장에서는 파이썬 데이터 분석 도구로 유명한 팬더스를 이용해 데이터를 불러오고, 저장하고, 분석하고, 그래프로 그리는 등의 각종 작업을 경험해보자.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">14.1. 팬더스</h3>
  <div class="chapter">
    <section>
      <article>
        <p><a href="http://pandas.pydata.org/" target="_blank">팬더스(pandas)</a>는 파이썬을 이용한 오픈 소스 데이터 분석 도구이다. 계산과학 분야에서 사용하는 기본 패키지인 NumPy를 기반으로 만들어서 매우 빠르고, 복잡한 데이터 처리 작업을 SQL 등의 쿼리를 다루는 것보다 간편하게 할 수 있다. 계산 과학 분야에서 가장 중요한 도구라고 해도 과언이 아니다.</p>
        <p>팬더스 홈페이지에서는 팬더스의 특징을 다음과 같이 소개한다.</p>
        <ul>
          <li>부동 소수점 데이터뿐만 아니라 빠진 데이터(NaN으로 표시)를 손쉽게 처리한다.</li>
          <li>DataFrame 및 상위 차원 개체에서 열을 삽입하고 삭제할 수 있다.</li>
          <li>개체를 레이블 세트에 명시적으로 정렬하거나 사용자가 레이블을 무시하고 Series, DataFrame 등으로 데이터를 사용할 수 있다.</li>
          <li>데이터를 집계하거나 변환하기 위해 데이터 세트를 분할할 수 있는 강력하고 유연한 그룹 기능이 있다.</li>
          <li>파이썬이나 NumPy 데이터 구조의 비정형 인덱스 데이터를 DataFrame 객체로 쉽게 변환해서 사용할 수 있다.</li>
          <li>날짜 범위 생성, 날짜 데이터 빈도 변환, 날짜 이동과 지연 등 시계열 관련 기능을 포함한다.</li>
        </ul>
        <p>팬더스의 장점은 여러가지가 있겠지만 크게 다음 네 가지를 소개한다.</p><p>&nbsp;</p>

        <h4>빠르다. NumPy를 사용하기 때문에 엄청 빠르다</h4>
        <p>NumPy 는 파이썬 패키지지만 내부는 상당 부분 C나 포트란으로 작성된 패키지다. 따라서 순수 파이썬으로 만든 패키지보다 실행속도가 빠르다.</p>
        <p>또한 NumPy의 특징 중 하나로 N차원 배열 객체를 빠르고 손쉽게 처리한다는 점이 있다. 엑셀도 일종의 배열을 다루는 프로그램인데 엑셀로는 처리할 수 없을 정도로 양이 많은 데이터를 처리할 때 유용하다. 예를 들어 64비트 엑셀에서는 104만개 이상의 행을 생성할 수 없다. 게다가 그 정도로 많은 데이터를 다루다 보면, 작업 중 엑셀 실행이 중단되는 일도 꽤 있다. 하지만 팬더스는 배열 객체를 처리하는 데 특화된 NumPy 를 기반에 두므로 그럴 염려가 없다.</p><p>&nbsp;</p>

        <h4>다양한 방법으로 데이터 처리가 가능함</h4>
        <p>CSV뿐만 아니라 엑셀 파일을 읽어서 데이터를 다룰 수 있고, 데이터베이스에 직접 접근해서 작업할 수도 있다. 10장에서 살펴본 것처럼 SQL 쿼리와 파이썬을 조합하고 여기에 팬더스를 이용하면 데이터 조합과 그에 따른 연산을 쉽게 해볼 수 있다. 단, 도구마다 장단점이 있음은 기억해야 한다.</p><p>&nbsp;</p>

        <h4>시각화 도구가 잘 갖춰져 있음</h4>
        <p>Jupyter Notebook의 그래프 지원 기능과 팬더스의 계산 결과가 결합하면 엑셀 못지 않은 그래프를 만들 수 있다. 게다가 패키지에 따라서 코호트 분석(Cohort Analysis) 기반의 <a href="https://ko.wikipedia.org/wiki/히트_맵" target="_blank">히트 맵(Heat map)</a>, 그 외 여러 가지 시각화 등 엑셀로는 표현할 수 없는 다양한 그래프를 생성할 수 있기도 하다.</p><p>&nbsp;</p>

        <p>그럼 이러한 장점들을 직접 체험해 보자. 이 장에서는 다음 과정으로 팬더스를 살펴볼 것이다.</p>
        <ol>
          <li>팬더스 설치</li>
          <li>데이터 종류 살펴보기</li>
          <li>데이터를 불러오고 저장하기</li>
          <li>조건에 따라 데이터 선택하기</li>
          <li>데이터를 그룹으로 나누고 계산하고, 합해서 결과 만들기</li>
          <li>그래프 만들기</li>
        </ol>
      </article>
    </section>
  </div>

  <h3 class="sub-header">14.2. 설치하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>pip를 이용해서 설치한다.</p>
        <pre><code>$ pip install pandas</code></pre>
      </article>
    </section>
  </div>

  <h3 class="sub-header">14.3. 데이터 타입 만들기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>팬더스는 파이썬의 데이터 타입을 그대로 사용하지 않는다. 처리 속도를 높이기 위해서 NumPy의 데이터 타입을 확장해서 사용한다. 하지만 팬더스의 고유 데이터 타입은 딱 두가지만 더 살펴보면 된다. <mark>Series</mark>와 <mark>DataFrame</mark>이다.</p>
      </article>
    </section>

    <h4 class="sub-header">14.3.1 - Series 데이터 타입 만들기</h4>
    <section>
      <article>
        <p>Series는 1차원 배열이다. 기본적으로 숫자로 된 인덱스를 갖지만 사용자가 지정함에 따라 각각의 인덱스에 이름을 가질 수도 있다.</p>
        <p>Series 타입을 만들기 위해 먼저 팬더스를 불러 온다. 관례로 <code>import pandas as pd</code>라고 작성한다.</p>
        <h5>코드 14-1 팬더스 불러오기와 Series 타입 정의</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:<br/>
        <font color="#808080">#&nbsp;팬더스와&nbsp;NumPy를&nbsp;불러옵니다.</font><br/>
        <font color="#ff7700">import</font>&nbsp;pandas&nbsp;<font color="#ff7700">as</font>&nbsp;pd<br/>
        <font color="#ff7700">import</font>&nbsp;numpy&nbsp;<font color="#ff7700">as</font>&nbsp;np<br/>
        &nbsp;<br/>
        <font color="#808080">#&nbsp;s에&nbsp;Series&nbsp;타입을&nbsp;정의합니다.</font><br/>
        s&nbsp;<font color="#66cc66">=</font>&nbsp;pd.<font>Series</font><font>&#40;</font><font>&#91;</font><font color="#483d8b">&quot;m&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;i&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;k&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;u&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">3</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">9</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">39</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">3.939</font><font>&#93;</font><font>&#41;</font><br/>
        s<br/>
        &nbsp;<br/>
        Out<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:<br/>
        <font color="#ff4500">0</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;m<br/>
        <font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i<br/>
        <font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;k<br/>
        <font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u<br/>
        <font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">3</font><br/>
        <font color="#ff4500">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">9</font><br/>
        <font color="#ff4500">6</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">39</font><br/>
        <font color="#ff4500">7</font>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">3.939</font><br/>
        dtype:&nbsp;<font color="#008000">object</font></blockquote></code></pre>
        <p>Series 타입의 기본 인덱스는 숫자로 구성하며 인덱스는 다른 프로그래밍 언어처럼 0부터 사작한다. 따라서 마지막 인덱스는 '전체 길이 -1' 이 된다.</p>
        <p>아이템 개수와 동일한 인덱스의 개수를 전달해서 인덱스를 지정할 수 있다. 여기서는 임의의 문자열로 된 인덱스를 설정했다.</p>
        <h5>코드 14-2 임의의 문자열로 인덱스 설정하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;index&nbsp;파라미터를&nbsp;이용해&nbsp;임의의&nbsp;문자열로&nbsp;인덱스를&nbsp;설정합니다.</font><br/>
s&nbsp;<font color="#66cc66">=</font>&nbsp;pd.<font>Series</font><font>&#40;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font>&#91;</font><font color="#483d8b">&quot;m&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;i&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;k&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;u&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">3</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">9</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">39</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">3.939</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;index<font color="#66cc66">=</font><font>&#91;</font><font color="#483d8b">&quot;A&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;B&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;Z&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;X&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;y&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;h&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;i&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;D&quot;</font><font>&#93;</font><br/>
<font>&#41;</font><br/>
s<br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:<br/>
A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;m<br/>
B&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i<br/>
Z&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;k<br/>
X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u<br/>
y&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">3</font><br/>
h&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">9</font><br/>
i&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">39</font><br/>
D&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">3.939</font><br/>
dtype:&nbsp;<font color="#008000">object</font></blockquote></code></pre>
        <p>파이썬의 딕셔너리와 유사하다. Series 타입을 만들 때는 깊이가 1인 딕셔너리를 그대로 사용할 수 있다.</p>
        <h5>코드 13-3 깊이가 1인 딕셔너리로 Series 데이터 타입 정의하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;깊이가&nbsp;1인&nbsp;딕셔너리를&nbsp;생성합니다.</font><br/>
heroes_dict&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'ana'</font>:<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'bastion'</font>:<font color="#ff4500">300</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'dva'</font>:<font color="#ff4500">500</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'genji'</font>:<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'hanjo'</font>:<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'junkrat'</font>:<font color="#ff4500">200</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'lucio'</font>:<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'macree'</font>:<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'mei'</font>:<font color="#ff4500">250</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'mercy'</font>:<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'pharah'</font>:<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'reaper'</font>:<font color="#ff4500">250</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'reinhardt'</font>:<font color="#ff4500">500</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'roadhog'</font>:<font color="#ff4500">600</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'soldier76'</font>:<font color="#ff4500">200</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'symmetra'</font>:<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'torbjorn'</font>:<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'tracer'</font>:<font color="#ff4500">150</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'widowmaker'</font>:<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'winston'</font>:<font color="#ff4500">500</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'zarya'</font>:<font color="#ff4500">400</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'zenyatta'</font>:<font color="#ff4500">200</font><br/>
<font>&#125;</font><br/>
&nbsp;<br/>
<font color="#808080">#&nbsp;해당&nbsp;딕셔너리를&nbsp;Series&nbsp;타입으로&nbsp;변환합니다.</font><br/>
heroes_series&nbsp;<font color="#66cc66">=</font>&nbsp;pd.<font>Series</font><font>&#40;</font>heroes_dict<font>&#41;</font><br/>
heroes_series<br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:<br/>
ana&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font><br/>
bastion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">300</font><br/>
dva&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">500</font><br/>
&nbsp;<br/>
--&nbsp;snip&nbsp;--<br/>
&nbsp;<br/>
winston&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">500</font><br/>
zarya&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">400</font><br/>
zenyatta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font><br/>
dtype:&nbsp;int64</blockquote></code></pre>
        <p>이렇게 세 가지 타입으로 Series 타입을 생성해 보았다.</p>
        <div class="tip">
          <h4>TIP</h4>
          <p>Series 타입을 좀 더 자세히 살펴보려면 팬더스 개발 문서의 '<a href="http://pandas-docs.github.io/pandas-docs-travis/dsintro.html#series" target="_blank">Series</a>'를 참고한다.</p>
        </div>
      </article>
    </section>

    <h4 class="sub-header">14.3.2 - DataFrame 데이터 타입 만들기</h4>
    <section>
      <article>
        <p>DataFrame 타입은 Series 타입을 연결한 것이다. 즉, 2차원 배열이 된다. Series 타입 각각은 한 행(row)가 되고, Series 의 인덱스는 열(column)이 된다고 생각하면 이해하기 쉬울 것이다.</p>
        <p>DataFrame 타입을 딕셔너리를 기반으로 만드는 방법은 Series 타입과 동일하다. 하지만 딕셔너리의 키가 Series 타입의 인덱스가 되었듯 DataFrame 타입을 만들 때 딕셔너리의 키는 열이 된다.</p>
        <h5>코드 14-4 딕셔너리로 DataFrame 데이터 타입 생성하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">4</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;22개의&nbsp;행과&nbsp;4개의&nbsp;열을&nbsp;갖는&nbsp;딕셔너리를&nbsp;정의합니다.</font><br/>
heroes&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;name&quot;</font>:<font>&#91;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'ana'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'bastion'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'dva'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'genji'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'hanjo'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'junkrat'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'lucio'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'macree'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'mei'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'mercy'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'pharah'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'reaper'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'reinhardt'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'roadhog'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'soldier76'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'symmetra'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'torbjorn'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'tracer'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'widowmaker'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'winston'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'zarya'</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'zenyatta'</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;health&quot;</font>:<font>&#91;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">300</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">500</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">200</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">250</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">250</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">500</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">600</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">200</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">150</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">500</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">400</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;position&quot;</font>:<font>&#91;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;support&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;defense&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;tank&quot;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;offense&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;defense&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;defense&quot;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;support&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;offense&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;defense&quot;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;support&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;offense&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;defense&quot;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;tank&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;tank&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;offense&quot;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;support&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;defense&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;offense&quot;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;defense&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;tank&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;tank&quot;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;support&quot;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;id&quot;</font>:<font>&#91;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">2</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">3</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">4</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">5</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">6</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">7</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">8</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">9</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">10</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">11</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">12</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">13</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">14</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">15</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">16</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">17</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">18</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">19</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">20</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">21</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">22</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font>&#93;</font><br/>
<font>&#125;</font><br/>
&nbsp;<br/>
<font color="#808080">#&nbsp;딕셔너리를&nbsp;DataFrame&nbsp;타입으로&nbsp;변환합니다.</font><br/>
heroes_df&nbsp;<font color="#66cc66">=</font>&nbsp;pd.<font>DataFrame</font><font>&#40;</font>heroes<font>&#41;</font><br/>
heroes_df<br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">4</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;health&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;position&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">id</font><br/>
<font color="#ff4500">0</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ana&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;support&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font><br/>
<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;bastion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">300</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;defense&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font><br/>
<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dva&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">500</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">3</font><br/>
&nbsp;<br/>
--&nbsp;snip&nbsp;--<br/>
&nbsp;<br/>
<font color="#ff4500">19</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;winston&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">500</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">20</font><br/>
<font color="#ff4500">20</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;zarya&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">400</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">21</font><br/>
<font color="#ff4500">21</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;zenyatta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;support&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">22</font></blockquote></code></pre>
        <p>jupyter Notebook 에서는 앞 DataFrame 타입을 표로 출력한다.</p>
        <p>이제 팬더스의 기본 타입은 다 살펴 봤다. 지금부터는 다른 형태로 만들어진 데이터를 팬더스로 가져와 본다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">14.4. 데이터를 불러오고 저장하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>데이터는 대부분 어느 정도 정제가 끝나서 파일로 저장된 경우가 많다.</p>
        <p>정제된 데이터 대부분은 보통 CSV 파일, 엑셀 파일, 데이터베이스 파일의 형태 중 하나일 것이다. 물론 팬더스는 이 세가지 외에도 다른 방법으로 데이터를 불러오는 방법을 지원하지만, 여기에서는 세 가지 형식의 데이터를 불러오고 저장하는 방법을 살펴보자.</p>
      </article>
    </section>

    <h4 class="sub-header">14.4.1 - CSV 파일</h4>
    <section>
      <article>
        <p>CSV 파일을 읽어오는 건 간단하다. 여기서는 9장에서 생성했던 <code>book_list.csv</code>파일을 불러온다.</p>
        <h5>코드 14-5 CSV 파일 불러오기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">5</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;read_csv()를&nbsp;이용해&nbsp;CSV&nbsp;파일을&nbsp;불러옵니다.</font><br/>
csv_data&nbsp;<font color="#66cc66">=</font>&nbsp;pd.<font>read_csv</font><font>&#40;</font><font color="#483d8b">&quot;examples/book_list.csv&quot;</font><font>&#41;</font><br/>
&nbsp;<br/>
<font color="#808080">#&nbsp;열&nbsp;제목이&nbsp;있는&nbsp;형태로&nbsp;데이터&nbsp;5개를&nbsp;출력합니다.</font><br/>
csv_data.<font>head</font><font>&#40;</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">5</font><font>&#93;</font>:</blockquote>
          <img src="/img/img40.png" alt="">
        </code></pre>
        <p>만약 CSV 파일의 열 제목이 없고, 파일을 불러들이면서 새로운 열 제목을 정하고 싶다면 다음과 같이 코드를 작성한다.</p>
        <h5>코드 14-6 열 제목을 생성해서 CSV 파일 불러오기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">6</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;열&nbsp;제목을&nbsp;직접&nbsp;설정합니다.</font><br/>
columns&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#91;</font><font color="#483d8b">&quot;제목&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;저자&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;번역자&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;출간일&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;ISBN&quot;</font><font>&#93;</font><br/>
&nbsp;<br/>
<font color="#808080">#&nbsp;열&nbsp;제목이&nbsp;없는&nbsp;CSV&nbsp;파일을&nbsp;불러옵니다.</font><br/>
<font color="#808080">#&nbsp;인덱스가&nbsp;없도록&nbsp;설정한&nbsp;다음&nbsp;names&nbsp;파라미터의&nbsp;값을&nbsp;columns로&nbsp;설정합니다.</font><br/>
csv_data2&nbsp;<font color="#66cc66">=</font>&nbsp;pd.<font>read_csv</font><font>&#40;</font><font color="#483d8b">&quot;examples/book_list.csv&quot;</font><font color="#66cc66">,</font>&nbsp;header<font color="#66cc66">=</font><font color="#008000">None</font><font color="#66cc66">,</font>&nbsp;names<font color="#66cc66">=</font>columns<font>&#41;</font><br/>
&nbsp;<br/>
<font color="#808080">#&nbsp;열&nbsp;제목이&nbsp;있는&nbsp;형태로&nbsp;데이터&nbsp;5개를&nbsp;출력합니다.</font><br/>
csv_data2.<font>head</font><font>&#40;</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">6</font><font>&#93;</font>:</blockquote><img src="/img/img41.png" alt=""></code></pre>
        <p>CSV 파일로 저장하는 코드 역시 간단하다. [코드 14-4]에서 만들었던 DataFrame 타입 heroes를 CSV 파일로 저장해 보자.</p>
        <h5>코드 14-7 DataFrame 타입을 CSV 파일로 저장하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">7</font><font>&#93;</font>:<br/>
heroes_df.<font>to_csv</font><font>&#40;</font><font color="#483d8b">&quot;examples/heroes.csv&quot;</font><font>&#41;</font></blockquote></code></pre>
        <p>DataFrame 타입 변수에 to_csv()를 호출해서 저장할 디렉터리 경로만 전달하면 된다.</p>
      </article>
    </section>

    <h4 class="sub-header">14.4.2 - 엑셀 파일</h4>
    <section>
      <article>
        <p>대표적인 데이터 시트 파일이라고 한다면 역시 엑셀이다. 팬더스에서 엑셀 파일을 불러오고 저장하려면 파일 데이터를 추출하는 <a href="https://pypi.python.org/pypi/xlrd" target="_blank">xlrd</a>와 파일을 읽거나 저장하는 <a href="http://openpyxl.readthedocs.io/en/latest/" target="_blank">openpyxl</a>패키지를 설치해야 한다.</p>
        <pre><code>$ pip install xlrd<br>$ pip install oepnpyxl</code></pre>
        <p>이제 엑셀 파일에서 팬더스로 데이터를 불러들이는 것도 앞서 살펴본 CSV 파일처럼 간단하다. [코드 14-7]에서 저장한 <code>heroes.csv</code> 파일을 <code>heroes.xlsx</code> 로 저장한 후 해당 파일을 불러 온다.</p>
        <h5>코드 14-8 엑셀 파일 불러와서 출력하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">8</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;read_excel()&nbsp;을&nbsp;이용해&nbsp;엑셀&nbsp;파일을&nbsp;불러옵니다.</font><br/>
<font color="#808080">#&nbsp;이&nbsp;때&nbsp;heroes&nbsp;시트를&nbsp;선택하도록&nbsp;합니다.</font><br/>
heroes_excel&nbsp;<font color="#66cc66">=</font>&nbsp;pd.<font>read_excel</font><font>&#40;</font><font color="#483d8b">&quot;examples/heroes.xlsx&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;heroes&quot;</font><font>&#41;</font><br/>
&nbsp;<br/>
<font color="#808080">#&nbsp;열&nbsp;제목이&nbsp;있는&nbsp;형태로&nbsp;데이터&nbsp;5개를&nbsp;출력합니다.</font><br/>
heroes_excel.<font>head</font><font>&#40;</font><font>&#41;</font></blockquote><img src="/img/img42.png" alt=""></code></pre>
        <p>엑셀 파일을 저장하는 과정도 DataFrame 타입이 된 heroes_excel에 to_excel()만 호출하면 된다. 하지만 DataFrame 타입 데이터에 있는 0 ~ 4의 행 인덱스는 필요없다. 따라서 index 파라미터의 값을 False로 설정해 인덱스를 저장하지 않을 것이다.</p>
        <h5>코드 14-9 엑셀 파일 저장하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">9</font><font>&#93;</font>:<br/>
heroes_excel.<font>to_excel</font><font>&#40;</font><font color="#483d8b">&quot;examples/heroes2.xlsx&quot;</font><font color="#66cc66">,</font>&nbsp;index<font color="#66cc66">=</font><font color="#008000">False</font><font>&#41;</font></blockquote></code></pre>
        <p>깔끔하게 엑셀 파일이 저장된다.</p>
      </article>
    </section>

    <h4 class="sub-header">14.4.3 - 데이터베이스</h4>
    <section>
      <article>
        <p>팬더스는 데이터베이스에 보낸 쿼리 실행 결과를 바로 DataFrame 타입 데이터로 가져올 수 있다. 앞서 두 파일 형식과 달리 이번에는 저장 시 따로 파일이 생성되지 않는다. 기존에 존재하던 데이터베이스와 테이블을 사용한다.</p>
        <p>먼저 데이터베이스와 연결한다. 그리고 모든 데이터를 가져오는 쿼리를 작성한다.</p>
        <h5>코드 14-10 데이터베이스 연결과 모든 데이터 가져오기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">10</font><font>&#93;</font>:<br/>
<font color="#ff7700">import</font>&nbsp;sqlite3<br/>
conn&nbsp;<font color="#66cc66">=</font>&nbsp;sqlite3.<font>connect</font><font>&#40;</font><font color="#483d8b">&quot;examples/db.sqlite&quot;</font><font>&#41;</font><br/>
&nbsp;<br/>
q&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;SELECT&nbsp;*&nbsp;FROM&nbsp;hanbit_books&quot;</font></blockquote></code></pre>
        <p>이제 앞 쿼리의 실행 결과를 바로 팬더스의 DataFrame 타입으로 가져와보자. 팬더스에서 SQL 데이터를 읽는 <code>read_sql()</code>함수를 사용한다.</p>
        <h5>코드 14-11 데이터베이스 데이터 읽기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">11</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;쿼리문자열과&nbsp;데이터베이스&nbsp;연결을&nbsp;전달합니다.</font><br/>
sql_df&nbsp;<font color="#66cc66">=</font>&nbsp;pd.<font>read_sql</font><font>&#40;</font>q<font color="#66cc66">,</font>&nbsp;con<font color="#66cc66">=</font>conn<font>&#41;</font><br/>
sql_df.<font>head</font><font>&#40;</font><font>&#41;</font></blockquote><img src="/img/img43.png" alt=""></code></pre>
        <p>앞서 10장에서 생성한 데이터베이스 예제의 결과물이 그대로 있으므로 제대로 가져온 것을 확인할 수 있다.</p>
        <p>DataFrame 타입 데이터 역시 CSV나 엑셀 파일처럼 팬더스를 이용해서 바로 데이터베이스에 저장해보자. 파일이 생성되는 것이 아니라 지정된 데이터베이스에 데이터(행)을 삽입하는 것이다. 데이터베이스에 새 테이블을 저장하고 싶다면 데이터베이스 연결을 새로 만들어서 해당 데이터를 전달하면 된다.</p>
        <h5>코드 14-12 데이터베이스에 바로 삽입하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">12</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;테이블&nbsp;이름,&nbsp;데이터베이스&nbsp;연결,&nbsp;같은&nbsp;이름의&nbsp;테이블이&nbsp;이미&nbsp;있을&nbsp;때&nbsp;어떻게&nbsp;할지&nbsp;전달합니다.</font><br/>
<font color="#808080">#&nbsp;con에&nbsp;전달할&nbsp;데이터베이스&nbsp;연결을&nbsp;새로&nbsp;지정하면&nbsp;새로운&nbsp;데이터베이스에&nbsp;저장할&nbsp;수&nbsp;있습니다.</font><br/>
sql_df.<font>to_sql</font><font>&#40;</font><font color="#483d8b">&quot;result_books&quot;</font><font color="#66cc66">,</font>&nbsp;con<font color="#66cc66">=</font>conn<font color="#66cc66">,</font>&nbsp;if_exists<font color="#66cc66">=</font><font color="#483d8b">'replace'</font><font>&#41;</font></blockquote></code></pre>
        <p>하지만 이 방법보다는 각 데이터베이스가 지원하는 덤프 삽입을 사용하는 것이 훨씬 빠르고 안정적이다. 팬더스로 가공한 데이터가 너무 크다면 데이터베이스에 직접 연결해서 데이터를 넣는 도중에 타임아웃이 발생하거나, 그 외 에러가 발생했을 때 대처하기 힘들기 때문이다. 따라서 중간 과정으로 앞에서 다룬 CSV 파일 등을 하나 만들 것을 추천한다.</p>
        <div class="tip">
          <h4>TIP</h4>
          <p><a href="https://www.mockaroo.com/" target="_blank">mockaroo</a>라는 웹사이트에서는 데이터 불러오기와 저장하기를 연습할 수 있는 모크업 데이터를 생성해서 받을 수 있다.</p>
        </div>
      </article>
    </section>
  </div>

  <h3 class="sub-header">14.5. 여러 가지 형태로 데이터 다루기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>이제  데이터가 준비되었으니 14.5~14.7까지 원하는 데이터를 가져오는 다양한 방법을 살펴보자.</p>
      </article>
    </section>

    <h4 class="sub-header">14.5.1 - 조건에 맞춰 데이터 선택해 가져오기</h4>
    <section>
      <article>
        <p>팬더스는 매우 손쉽게 데이터를 선택하는 방법을 제공한다. 팬더스의 Series 타입에서 특정 데이터를 선택해 가져올 때는 리스트에서 데이터를 선택하는 방식과 똑같이 데이터를 선택해 가져오면 된다.</p>
        <h5>코드 14-13 특정 인덱스(숫자)의 데이터 가져오기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">13</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;Series&nbsp;에서&nbsp;0번째&nbsp;데이터를&nbsp;가져옵니다.</font><br/>
heroes_series<font>&#91;</font><font color="#ff4500">0</font><font>&#93;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">13</font><font>&#93;</font>:<br/>
<font color="#ff4500">200</font></blockquote></code></pre>
        <p>특정 인덱스의 데이터를 슬라이스(선택)해 가져오는 방법은 다음과 같다.</p>
        <h5>코드 14-14 특정 인덱스의 데이터 슬라이스해 가져오기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">14</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;인덱스&nbsp;3&nbsp;~&nbsp;6&nbsp;사이의&nbsp;값을&nbsp;선택해&nbsp;가져&nbsp;옵니다.</font><br/>
<font color="#808080">#&nbsp;코드&nbsp;14-13과&nbsp;다르게&nbsp;인덱스-데이터를&nbsp;같이&nbsp;표시합니다.</font><br/>
heroes_series<font>&#91;</font><font color="#ff4500">3</font>:<font color="#ff4500">7</font><font>&#93;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">14</font><font>&#93;</font>:<br/>
genji&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font><br/>
hanjo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font><br/>
junkrat&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font><br/>
lucio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font><br/>
dtype:&nbsp;int64</blockquote></code></pre>
        <p>또한 특정 값(인덱스, 여기서는 ana, hanjo 등)과 연관된 데이터를 가져올 수도 있다.</p>
        <h5>코드14-15 특정 인덱스(문자열)의 데이터 가져오기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">15</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;dva라는&nbsp;인덱스를&nbsp;갖는&nbsp;데이터를&nbsp;가져옵니다.</font><br/>
heroes_series<font>&#91;</font><font color="#483d8b">'dva'</font><font>&#93;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">15</font><font>&#93;</font>:<br/>
<font color="#ff4500">500</font></blockquote></code></pre>
        <p>DataFrame 타입이라면 열 이름으로 데이터를 가져올 수 있다.</p>
        <h5>코드 14-16 열 이름으로 데이터 가져오기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">16</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;열&nbsp;이름이&nbsp;name,&nbsp;position에&nbsp;해당하는&nbsp;데이터를&nbsp;가져옵니다.</font><br/>
heroes_df<font>&#91;</font><font>&#91;</font><font color="#483d8b">&quot;name&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;position&quot;</font><font>&#93;</font><font>&#93;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">16</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;position<br/>
<font color="#ff4500">0</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ana&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;support<br/>
<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;bastion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;defense<br/>
<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dva&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tank<br/>
<br>
-- snip --
<br><br>
<font color="#ff4500">19</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;winston&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tank<br/>
<font color="#ff4500">20</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;zarya&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tank<br/>
<font color="#ff4500">21</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;zenyatta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;support</blockquote></code></pre>
        <p>이렇게 다양한 조건에 맞춰 데이터를 가져오는 방법을 살펴봤다.</p>
      </article>
    </section>

    <h4 class="sub-header">14.5.2 - 불리언 인덱싱</h4>
    <section>
      <article>
        <p>팬더스에서 데이터를 가져올 때는 불리언 인덱싱(boolean indexing)이라는 방법을 사용한다. []안에 들어가는 조건을 기준으로 데이터프레임 안의 각 열을 순회하며 검사하는 것이다.</p>
        <h5>코드 14-17 불리언 인덱싱 기본</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">17</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;heroes_df의&nbsp;health&nbsp;열에서&nbsp;250인&nbsp;값을&nbsp;가져옵니다.</font><br/>
heroes_df<font>&#91;</font>heroes_df.<font>health</font>&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">250</font><font>&#93;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">17</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;health&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;position&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">id</font><br/>
<font color="#ff4500">8</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mei&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">250</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;defense&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">9</font><br/>
<font color="#ff4500">11</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;reaper&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">250</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;defense&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">12</font></blockquote></code></pre>
        <p>이 경우에는 health 열의 값이 250인 name 값을 찾아서 돌려준 것이다. [코드 14-17]에서 []안에 들어가는 부분만 따로 실행시켜보면 동작 원리를 좀 더 명확하게 알 수 있다.</p>
        <h5>코드 14-18 불리언 인덱싱의 조건 코드 실행</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">18</font><font>&#93;</font>:<br/>
heroes_df.<font>health</font>&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#ff4500">250</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">18</font><font>&#93;</font>:<br/>
<font color="#ff4500">0</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">False</font><br/>
<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">False</font><br/>
<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">False</font><br/><br>
-- snip --
<br><br>
<font color="#ff4500">19</font>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">False</font><br/>
<font color="#ff4500">20</font>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">False</font><br/>
<font color="#ff4500">21</font>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">False</font><br/>
Name:&nbsp;health<font color="#66cc66">,</font>&nbsp;dtype:&nbsp;<font color="#008000">bool</font></blockquote></code></pre>
        <p>즉, 각 행을 검사해서 True냐 False냐를 판정한 후 해당하는 데이터를 돌려주는 것이다. 이 방법은 Series 타입에도 마찬가지로 적용할 수 있다.</p>
        <h5>코드 14-19 Series 타입에 조건 적용하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">19</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;Series&nbsp;타입&nbsp;데이터&nbsp;중&nbsp;250&nbsp;이상의&nbsp;값을&nbsp;선택합니다.</font><br/>
heroes_series<font>&#91;</font>heroes_series&nbsp;<font color="#66cc66">&gt;=</font>&nbsp;<font color="#ff4500">250</font><font>&#93;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">19</font><font>&#93;</font>:<br/>
bastion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">300</font><br/>
dva&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">500</font><br/>
mei&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">250</font><br/>
reaper&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">250</font><br/>
reinhardt&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">500</font><br/>
roadhog&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">600</font><br/>
winston&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">500</font><br/>
zarya&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">400</font><br/>
dtype:&nbsp;int64</blockquote></code></pre>
        <p>앞서 DataFrame 타입은 Series 타입 데이터를 늘어 놓아 붙인 것이라고 설명한 바 있다. 다음 코드는 두 가지 조건을 결합해 불리언 인덱싱을 싱행하는 것이다.</p>
        <h5>코드 14-20 두 가지 조건을 결합해 불리언 인덱싱 실행</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">20</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;position&nbsp;열&nbsp;값이&nbsp;tank면서,&nbsp;health&nbsp;열&nbsp;값이&nbsp;500&nbsp;이상인&nbsp;데이터만&nbsp;선택합니다.</font><br/>
heroes_df<font>&#91;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font>&#40;</font>heroes_df.<font>position</font>&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">&quot;tank&quot;</font><font>&#41;</font>&nbsp;&amp;&nbsp;<font>&#40;</font>heroes_df.<font>health</font>&nbsp;<font color="#66cc66">&gt;</font>&nbsp;<font color="#ff4500">500</font><font>&#41;</font><br/>
<font>&#93;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">20</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;health&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;position&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">id</font><br/>
<font color="#ff4500">13</font>&nbsp;&nbsp;&nbsp;roadhog&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">600</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">14</font></blockquote></code></pre>
        <p>참고로 불리언 인덱싱의 결과는 True나 False이므로 조건을 여러개 설정할 때는 <code>&&</code>나 <code>||</code>가 아니라 <code>&</code>, <code>|</code>를 사용해야 한다.</p>
      </article>
    </section>

    <h4 class="sub-header">14.5.3 - 인덱스 기준에 따라 데이터 다루기</h4>
    <section>
      <article>
        <p>DataFrame 타입은 [ ]안에는 Series 타입에 대한 조건이 들어가야 한다. 하지만 예외로 슬라이스만큼은 지원한다. 또한 단 하나의 행만 선택하고 싶을 때가 있는데, 그럴 때 사용하는 것이 <code><a href="https://pandas.pydata.org/pandas-docs/stable/generated/pandas.DataFrame.iloc.html" target="_blank">iloc()</a></code>과 <code><a href="https://pandas.pydata.org/pandas-docs/stable/generated/pandas.DataFrame.loc.html" target="_blank">loc()</a></code>이다. 이 두함수는 비슷해 보이지만 약간의 차이가 있다.</p>
        <p>이 함수를 사용하기 전에 인덱스를 팬더스가 기본으로 주는 인덱스(0으로 시작하는) 말고 다른 거로 바꿔보자.</p>
        <h5>코드 14-21 인덱스 변경하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">21</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;인덱스를&nbsp;id&nbsp;라는&nbsp;열로&nbsp;변경합니다.</font><br/>
heroes_df.<font>set_index</font><font>&#40;</font><font color="#483d8b">'id'</font><font color="#66cc66">,</font>&nbsp;inplace<font color="#66cc66">=</font><font color="#008000">True</font><font>&#41;</font><br/>
heroes_df.<font>head</font><font>&#40;</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">21</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;health&nbsp;&nbsp;&nbsp;&nbsp;position<br/>
<font color="#008000">id</font>			<br/>
<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ana&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;support<br/>
<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;bastion&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">300</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;defense<br/>
<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dva&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">500</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tank<br/>
<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;genji	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;offense<br/>
<font color="#ff4500">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hanjo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;defense</blockquote></code></pre>
        <p>아까와는 달리 인덱스는 id 열이 되었다. 그럼 <code>loc()</code>와 <code>iloc()</code>가 어떻게 다른지 살펴보자. 다음은 <code>loc()</code> 함수를 실행한 코드이다.</p>
        <h5>코드 14-22 loc() 예제</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">22</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;id&nbsp;값이&nbsp;3인&nbsp;행&nbsp;값을&nbsp;모두&nbsp;선택해&nbsp;가져옵니다.</font><br/>
heroes_df.<font>loc</font><font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">22</font><font>&#93;</font>:<br/>
name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dva<br/>
health&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">500</font><br/>
position&nbsp;&nbsp;&nbsp;&nbsp;tank<br/>
Name:&nbsp;<font color="#ff4500">3</font><font color="#66cc66">,</font>&nbsp;dtype:&nbsp;<font color="#008000">object</font></blockquote></code></pre>
        <p>다음은 <code>iloc()</code> 함수를 실행한 예제코드이다.</p>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">23</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;인덱스가&nbsp;3인&nbsp;행&nbsp;값을&nbsp;모두&nbsp;선택해&nbsp;가져옵니다.</font><br/>
heroes_df.<font>iloc</font><font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">23</font><font>&#93;</font>:<br/>
name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;genji<br/>
health&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font><br/>
position&nbsp;&nbsp;&nbsp;&nbsp;offense<br/>
Name:&nbsp;<font color="#ff4500">4</font><font color="#66cc66">,</font>&nbsp;dtype:&nbsp;<font color="#008000">object</font></blockquote></code></pre>
        <p><code>loc()</code> 함수는 인덱스의 현재 값을 기준으로 데이터를 가져온다. 반면, <code>iloc()</code> 함수는 무조건 인덱스 값의 기준을 0부터 시작하도록 강제한다. 그래서 id가 3이라도 첫 인덱스값을 0으로 계산해서 3인 데이터를 가져왔다.</p>
        <p>이러한 두 함수의 차이를 알아두면 인덱스 값이 0부터 시작하지 않는 데이터를 다룰 때 매우 유용하다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">14.6. 데이터 병합하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>앞에서 사용한 방법으로 데이터를 가져오면 관련 있는 여러 개의 테이블이나 파일로 분리되어 있을 것이다. 이럴 때 관련있는 데이터를 합하려면 id를 키로 삼을 때가 많다. SQL로 이를 표현한다면 다음처럼 쿼리문을 작성할 것이다.</p>
        <pre class="python"><code>SELECT * FROM user_data AS t1 JOIN rate_date AS t2 ON t1.id = t2.user_id</code></pre>
        <p>위와 같은 병합 작업을 팬더스에서 하는 법을 알아보자. 또한 키를 기준으로 합치는 것뿐만 아니라 단순한 이어 붙이기도 살펴볼 것이다.</p>
      </article>
    </section>

    <h4 class="sub-header">14.6.1 - merge()</h4>
    <section>
      <article>
        <p>데이터를 병합할 때 가장 일반적으로 사용하는 팬더스의 함수는 <code>merge()</code>이다. 데이터 사이에서 특정 기준에 따라 데이터를 병합하는 함수이다.</p>
        <p><code>merge()</code>의 몇가지 활용법을 살펴보기 위해 먼저 적당한 DataFrame 타입 변수 2개를 만들자.</p>
        <h5>코드 14-24 DataFrame 타입 변수 생성</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">24</font><font>&#93;</font>:<br/>
t1&nbsp;<font color="#66cc66">=</font>&nbsp;pd.<font>DataFrame</font><font>&#40;</font><font>&#123;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;id&quot;</font>:<font>&#91;</font><font color="#ff4500">1</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">2</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">3</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">4</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">5</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;left_val&quot;</font>:<font>&#91;</font><font color="#483d8b">&quot;a&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;b&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;c&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;d&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;e&quot;</font><font>&#93;</font><br/>
<font>&#125;</font><font>&#41;</font><br/>
&nbsp;<br/>
t1<br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">24</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">id</font>&nbsp;&nbsp;&nbsp;&nbsp;left_val<br/>
<font color="#ff4500">0</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a<br/>
<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b<br/>
<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c<br/>
<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d<br/>
<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e<br>
<br>In<font>&#91;</font><font color="#ff4500">25</font><font>&#93;</font>:<br/>
t2&nbsp;<font color="#66cc66">=</font>&nbsp;pd.<font>DataFrame</font><font>&#40;</font><font>&#123;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;id&quot;</font>:<font>&#91;</font><font color="#ff4500">3</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">4</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">5</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">6</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">7</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;right_val&quot;</font>:<font>&#91;</font><font color="#483d8b">&quot;q&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;w&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;e&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;r&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;t&quot;</font><font>&#93;</font><br/>
<font>&#125;</font><font>&#41;</font><br/>
&nbsp;<br/>
t2<br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">25</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">id</font>&nbsp;&nbsp;&nbsp;&nbsp;right_val<br/>
<font color="#ff4500">0</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;q<br/>
<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;w<br/>
<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e<br/>
<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">6</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;r<br/>
<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">7</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;t</blockquote></code></pre>
        <p>이제 이 두 DataFrame 타입을 id 값 기준으로 병합해보자. 코드는 간단하다.</p>
        <h5>코드 14-25 merge()로 데이터 병합하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">26</font><font>&#93;</font>:<br/>
pd.<font>merge</font><font>&#40;</font>t1<font color="#66cc66">,</font>&nbsp;t2<font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">26</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">id</font>&nbsp;&nbsp;left_val&nbsp;right_val<br/>
<font color="#ff4500">0</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;q<br/>
<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;w<br/>
<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e</blockquote></code></pre>
        <p><code>merge()</code>의 파라미터로 병합할 DataFrame 2개를 전달했다. 이 때 처음 전달한 DataFrame 타입 값이 왼쪽, 두 번째로 전달한 DataFrame 타입 값이 오른쪽에 위치한다. 그 이후에 아무런 파라미터를 전달하지 않으면 두 DataFrame 타입에 공통으로 있는 열을 기준으로 데이터를 병합한다. 만약 특정 열을 명시적 키로 삼고 싶다면 <code>on</code>파라미터에 특정 열 이름을 작성해 호출하면 된다.</p>
        <h5>코드 14-26 특정 열을 명시적 키로 지정하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">27</font><font>&#93;</font>:<br/>
pd.<font>merge</font><font>&#40;</font>t1<font color="#66cc66">,</font>&nbsp;t2<font color="#66cc66">,</font>&nbsp;on<font color="#66cc66">=</font><font color="#483d8b">&quot;id&quot;</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">27</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">id</font>&nbsp;&nbsp;left_val&nbsp;right_val<br/>
<font color="#ff4500">0</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;q<br/>
<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;w<br/>
<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e</blockquote></code></pre>
        <p>양쪽 DataFrame 타입에서 서로 다른 열을 기준으로 하고 싶다면 <code>left_on</code>과 <code>right_on</code>파라미터를 설정하면 된다.</p>
        <h5>코드 14-27 서로 다른 열을 기준으로 삼기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">28</font><font>&#93;</font>:<br/>
pd.<font>merge</font><font>&#40;</font>t1<font color="#66cc66">,</font>&nbsp;t2<font color="#66cc66">,</font>&nbsp;left_on<font color="#66cc66">=</font><font color="#483d8b">&quot;left_val&quot;</font><font color="#66cc66">,</font>&nbsp;right_on<font color="#66cc66">=</font><font color="#483d8b">&quot;right_val&quot;</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">28</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;id_x&nbsp;&nbsp;&nbsp;left_val&nbsp;&nbsp;id_y&nbsp;&nbsp;right_val<br/>
<font color="#ff4500">0</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e</blockquote></code></pre>
        <p><code>merge()</code>는 기본적으로 양쪽 다 데이터가 있는 행만을 대상으로 한다. 그런데 어떤 경우에는 SQL의 left join 이나 right join 처럼 어느 한쪽에 데이터가 비어도 가져와야 할 경우가 있다. outer join 이 필요한 경우이다. 이럴 때는 how라는 파라미터를 사용한다.</p>
        <h5>코드 14-28 how 파라미터 사용 1</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">29</font><font>&#93;</font>:<br/>
pd.<font>merge</font><font>&#40;</font>t1<font color="#66cc66">,</font>&nbsp;t2<font color="#66cc66">,</font>&nbsp;how<font color="#66cc66">=</font><font color="#483d8b">'left'</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">29</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">id</font>&nbsp;&nbsp;&nbsp;left_val&nbsp;&nbsp;&nbsp;right_val<br/>
<font color="#ff4500">0</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NaN<br/>
<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NaN<br/>
<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;q<br/>
<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;w<br/>
<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e</blockquote></code></pre>
        <p>t1이라는 DataFrame 타입을 기준으로 정령하므로 how='left'라고 설정했다. 그럼 반대의 경우도 살펴보자.</p>
        <h5>코드 14-29 how 파라미터 사용 2</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">30</font><font>&#93;</font>:<br/>
pd.<font>merge</font><font>&#40;</font>t1<font color="#66cc66">,</font>&nbsp;t2<font color="#66cc66">,</font>&nbsp;how<font color="#66cc66">=</font><font color="#483d8b">'right'</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">30</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">id</font>&nbsp;&nbsp;&nbsp;left_val&nbsp;&nbsp;&nbsp;right_val<br/>
<font color="#ff4500">0</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;q<br/>
<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;w<br/>
<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e<br/>
<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">6</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NaN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;r<br/>
<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">7</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NaN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;t</blockquote></code></pre>
        <p>이번에는 t2라는 DataFrame 타입을 기준으로 정렬하므로 how='right'라고 설정했다. 다음은 두 DataFrame 타입의 모든 데이터를 순서에 맞게 병합하는 작업이다.</p>
        <h5>코드 14-30 how 파라미터 사용 3</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">31</font><font>&#93;</font>:<br/>
pd.<font>merge</font><font>&#40;</font>t1<font color="#66cc66">,</font>&nbsp;t2<font color="#66cc66">,</font>&nbsp;how<font color="#66cc66">=</font><font color="#483d8b">'outer'</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">31</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">id</font>&nbsp;&nbsp;&nbsp;left_val&nbsp;&nbsp;&nbsp;right_val<br/>
<font color="#ff4500">0</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NaN<br/>
<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NaN<br/>
<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;q<br/>
<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;w<br/>
<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e<br/>
<font color="#ff4500">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">6</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NaN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;r<br/>
<font color="#ff4500">6</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">7</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NaN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;t</blockquote></code></pre>
        <p>어렵지 않게 두 DataFrame 타입을 서로 병합했다.</p>
      </article>
    </section>

    <h4 class="sub-header">14.6.2 - concat()</h4>
    <section>
      <article>
        <p><code>merge()</code>를 다룰 때는 주로 겹치는 열이 있는 DataFrame 타입을 서로 병합하는 상황을 살펴봤다. 그런데 완전히 동일한 열을 가진 DataFrame 타입을 병합하는 상황도 있을 것이다. 예를 들어 같은 형식의 파일이 여러 개로 나뉘어 있는 상황일 것이다. 이럴 때는 <code>concat()</code> 함수를 사용하면 된다.</p>
        <p>먼저 14.6.1 처럼 적당한 DataFrame 타입 2개를 만들어보자.</p>
        <h5>코드 14-31 DataFrame 타입 변수 생성</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">32</font><font>&#93;</font>:<br/>
t3&nbsp;<font color="#66cc66">=</font>&nbsp;pd.<font>DataFrame</font><font>&#40;</font><font>&#123;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;uid&quot;</font>:<font>&#91;</font><font color="#ff4500">112</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">113</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">114</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">115</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">116</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;value&quot;</font>:<font>&#91;</font><font color="#483d8b">&quot;abc&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;qwe&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;asd&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;zxc&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;rty&quot;</font><font>&#93;</font><br/>
<font>&#125;</font><font>&#41;</font><br/>
&nbsp;<br/>
t3<br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">32</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;uid	value<br/>
<font color="#ff4500">0</font>	<font color="#ff4500">112</font>	abc<br/>
<font color="#ff4500">1</font>	<font color="#ff4500">113</font>	qwe<br/>
<font color="#ff4500">2</font>	<font color="#ff4500">114</font>	asd<br/>
<font color="#ff4500">3</font>	<font color="#ff4500">115</font>	zxc<br/>
<font color="#ff4500">4</font>	<font color="#ff4500">116</font>	rty<br>
<br>In<font>&#91;</font><font color="#ff4500">33</font><font>&#93;</font>:<br/>
t4&nbsp;<font color="#66cc66">=</font>&nbsp;pd.<font>DataFrame</font><font>&#40;</font><font>&#123;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;uid&quot;</font>:<font>&#91;</font><font color="#ff4500">3939</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">3940</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">3941</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">3942</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">3945</font><font>&#93;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;value&quot;</font>:<font>&#91;</font><font color="#483d8b">&quot;power&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;over&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;whelming&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;Cheers,&nbsp;love!&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;The&nbsp;cavalry's&nbsp;here!&quot;</font><font>&#93;</font><br/>
<font>&#125;</font><font>&#41;</font><br/>
&nbsp;<br/>
t4<br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">33</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;uid	&nbsp;value<br/>
<font color="#ff4500">0</font>	<font color="#ff4500">3939</font>	power<br/>
<font color="#ff4500">1</font>	<font color="#ff4500">3940</font>	over<br/>
<font color="#ff4500">2</font>	<font color="#ff4500">3941</font>	whelming<br/>
<font color="#ff4500">3</font>	<font color="#ff4500">3942</font>	Cheers<font color="#66cc66">,</font>&nbsp;love<font color="#66cc66">!</font><br/>
<font color="#ff4500">4</font>	<font color="#ff4500">3945</font>	The&nbsp;cavalry<font color="#483d8b">'s&nbsp;here!</font></blockquote></code></pre>
        <p>이제 t3과 t4를 이어보자.</p>
        <h5>코드 14-32 두 DataFrame 타입 데이터 연결</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">34</font><font>&#93;</font>:<br/>
pd.<font>concat</font><font>&#40;</font><font>&#91;</font>t3<font color="#66cc66">,</font>&nbsp;t4<font>&#93;</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">34</font><font>&#93;</font>:<br/>
&nbsp;<br/>
&nbsp;&nbsp;uid	&nbsp;value<br/>
<font color="#ff4500">0</font>	<font color="#ff4500">112</font>	&nbsp;abc<br/>
<font color="#ff4500">1</font>	<font color="#ff4500">113</font>	&nbsp;qwe<br/>
<font color="#ff4500">2</font>	<font color="#ff4500">114</font>	&nbsp;asd<br/>
<font color="#ff4500">3</font>	<font color="#ff4500">115</font>	&nbsp;zxc<br/>
<font color="#ff4500">4</font>	<font color="#ff4500">116</font>	&nbsp;rty<br/>
<font color="#ff4500">0</font>	<font color="#ff4500">3939</font>	power<br/>
<font color="#ff4500">1</font>	<font color="#ff4500">3940</font>	over<br/>
<font color="#ff4500">2</font>	<font color="#ff4500">3941</font>	whelming<br/>
<font color="#ff4500">3</font>	<font color="#ff4500">3942</font>	Cheers<font color="#66cc66">,</font>&nbsp;love<font color="#66cc66">!</font><br/>
<font color="#ff4500">4</font>	<font color="#ff4500">3945</font>	The&nbsp;cavalry<font color="#483d8b">'s&nbsp;here!</font></blockquote></code></pre>
        <p>이렇게 동일한 열이 있는 DataFrame 타입을 병합해 보았다.</p>
        <div class="tip">
          <h4>TIP</h4>
          <p>팬더스 개발문서의 '<a href="http://pandas.pydata.org/pandas-docs/stable/merging.html" target="_blank">Merge, join, and concatenate</a>'에서는 더 다양한 DataFrame 타입의 병합 작업을 확인할 수 있다.</p>
        </div>
      </article>
    </section>
  </div>

  <h3 class="sub-header">14.7. 데이터 분석하기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>이번 절에서는 DataFrame 타입을 그룹화하고 다양한 형태로 분석하는 방법을 살펴본다.</p>
      </article>
    </section>

    <h4 class="sub-header">14.7.1 - 그룹화하기</h4>
    <section>
      <article>
        <p>여기서는 예제 파일의 ch14/examples 안의 dummy.csv를 사용한다.</p>
        <p>이제 이 CSV 파일의 날짜 형식을 팬더스가 계산할 수 있는 타입으로 바꿔야 한다.</p>
        <h5>코드 14-33 날짜 형식을 계산할 수 있는 타입으로 바꾸기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">35</font><font>&#93;</font>:<br/>
dummy_data&nbsp;<font color="#66cc66">=</font>&nbsp;pd.<font>read_csv</font><font>&#40;</font><font color="#483d8b">&quot;examples/dummy.csv&quot;</font><font>&#41;</font><br/>
&nbsp;<br/>
<font color="#808080">#&nbsp;이&nbsp;행으로&nbsp;yyyy-mm-dd&nbsp;형식의&nbsp;문자열을&nbsp;팬더스가&nbsp;계산할&nbsp;수&nbsp;있는&nbsp;datetime&nbsp;타입으로&nbsp;만들어&nbsp;줍니다.</font><br/>
dummy_data<font>&#91;</font><font color="#483d8b">&quot;df_date&quot;</font><font>&#93;</font>&nbsp;<font color="#66cc66">=</font>&nbsp;pd.<font>to_datetime</font><font>&#40;</font>dummy_data<font>&#91;</font><font color="#483d8b">&quot;date&quot;</font><font>&#93;</font><font>&#41;</font><br/>
dummy_data.<font>head</font><font>&#40;</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">35</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;<font color="#008000">id</font>	gender	contry	date	level	version	df_date<br/>
<font color="#ff4500">0</font>	<font color="#ff4500">1</font>	Female	Czech&nbsp;Republic	<font color="#ff4500">2016</font>-<font color="#ff4500">06</font>-<font color="#ff4500">11</font>	<font color="#ff4500">71</font>	5.1.6	<font color="#ff4500">2016</font>-<font color="#ff4500">06</font>-<font color="#ff4500">11</font><br/>
<font color="#ff4500">1</font>	<font color="#ff4500">2</font>	Male	Ukraine	<font color="#ff4500">2016</font>-<font color="#ff4500">09</font>-<font color="#ff4500">07</font>	<font color="#ff4500">58</font>	0.2.5	<font color="#ff4500">2016</font>-<font color="#ff4500">09</font>-<font color="#ff4500">07</font><br/>
<font color="#ff4500">2</font>	<font color="#ff4500">3</font>	Female	Philippines	<font color="#ff4500">2016</font>-<font color="#ff4500">03</font>-<font color="#ff4500">26</font>	<font color="#ff4500">18</font>	7.1.9	<font color="#ff4500">2016</font>-<font color="#ff4500">03</font>-<font color="#ff4500">26</font><br/>
<font color="#ff4500">3</font>	<font color="#ff4500">4</font>	Male	Greece	<font color="#ff4500">2016</font>-<font color="#ff4500">03</font>-<font color="#ff4500">23</font>	<font color="#ff4500">88</font>	0.4.4	<font color="#ff4500">2016</font>-<font color="#ff4500">03</font>-<font color="#ff4500">23</font><br/>
<font color="#ff4500">4</font>	<font color="#ff4500">5</font>	Male	Indonesia	<font color="#ff4500">2016</font>-<font color="#ff4500">08</font>-<font color="#ff4500">07</font>	<font color="#ff4500">21</font>	9.0.7	<font color="#ff4500">2016</font>-<font color="#ff4500">08</font>-<font color="#ff4500">07</font></blockquote></code></pre>
        <p>그룹화할 때는 DataFrame 타입에 <code>groupby()</code> 함수를 사용하면 된다. SQL 을 다루어 보았다면 친숙한 이름이다.</p>
        <h5>코드 14-34 groupby() 예제</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">36</font><font>&#93;</font>:<br/>
by_contry&nbsp;<font color="#66cc66">=</font>&nbsp;dummy_data.<font>groupby</font><font>&#40;</font><font color="#483d8b">&quot;contry&quot;</font><font>&#41;</font><br/>
by_contry<br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">35</font><font>&#93;</font>:<br/>
<font color="#66cc66">&lt;</font>pandas.<font>core</font>.<font>groupby</font>.<font>groupby</font>.<font>DataFrameGroupBy</font>&nbsp;<font color="#008000">object</font>&nbsp;at&nbsp;<font color="#ff4500">0x11047ef60</font><font color="#66cc66">&gt;</font></blockquote></code></pre>
        <p>그럼 또 다른 DataFrame 타입 데이터가 생성되는 것이 아니라 DataFrameGroupBy 클래스의 객체가 된다. 이제 이걸로 여러 가지를 해볼 수 있다.</p>
        <p><code>count()</code>를 하면 특정 열로 데이터를 묶었을 때 행 개수가 몇 개인지를 보여준다.</p>
        <h5>코드 14-35 count()로 특정 열 값이 있는 행 개수 구하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">37</font><font>&#93;</font>:<br/>
by_contry.<font>count</font><font>&#40;</font><font>&#41;</font>.<font>head</font><font>&#40;</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">37</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">id</font>	gender	date	level	version	df_date<br/>
contry						<br/>
Afghanistan	&nbsp;&nbsp;<font color="#ff4500">2</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font><br/>
Albania	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font><br/>
Argentina&nbsp;&nbsp;&nbsp;&nbsp;	<font color="#ff4500">15</font>	&nbsp;&nbsp;&nbsp;<font color="#ff4500">15</font>	&nbsp;&nbsp;&nbsp;<font color="#ff4500">15</font>	&nbsp;&nbsp;&nbsp;<font color="#ff4500">15</font>	&nbsp;&nbsp;&nbsp;<font color="#ff4500">15</font>	&nbsp;&nbsp;&nbsp;<font color="#ff4500">15</font><br/>
Armenia	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">7</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">7</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">7</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">7</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">7</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">7</font><br/>
Australia	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font>	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font></blockquote></code></pre>
        <p>이 경우 값이 비어 있던 열이 없었으므로 위와 같이 모든 행의 값이 같게 나왔다. 특정 열로 그룹화한 행 개수만을 알고 싶다면 <code>size()</code>함수를 사용할 수 있다.</p>
        <h5>코드 14-36 size()로 특정 열 값으로 그룹화한 행 개수 구하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">38</font><font>&#93;</font>:<br/>
by_contry.<font>size</font><font>&#40;</font><font>&#41;</font>.<font>head</font><font>&#40;</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">38</font><font>&#93;</font>:<br/>
contry<br/>
Afghanistan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font><br/>
Albania&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font><br/>
Argentina&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">15</font><br/>
Armenia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">7</font><br/>
Australia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font><br/>
dtype:&nbsp;int64<br/>
&nbsp;</blockquote></code></pre>
        <p>이렇게 바로 사용할 수 있게 준비된 함수 종류는 다음과 같다.</p>
        <ul>
          <li><strong>mean()</strong>: 그룹 각 열의 평균값을 구한다.</li>
          <li><strong>median()</strong>: 그룹 각 열의 중간값을 구한다.</li>
          <li><strong>sum()</strong>: 그룹 각 열의 합을 구한다.</li>
          <li><strong>min()</strong>: 그룹 각 열의 최솟값을 구한다.</li>
          <li><strong>max()</strong>: 그룹 각 열의 최댓값을 구한다.</li>
          <li>그 외의 함수들.</li>
        </ul>
        <p>다음은 <code>max()</code>함수를 이용해 그룹 각 열의 최댓값을 구한 예이다.</p>
        <h5>코드 14-37 나라별 각 열의 최댓값을 구하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">39</font><font>&#93;</font>:<br/>
by_contry.<font color="#008000">max</font><font>&#40;</font><font>&#41;</font>.<font>head</font><font>&#40;</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">39</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">id</font>	gender	&nbsp;&nbsp;date	&nbsp;&nbsp;&nbsp;level	version	df_date<br/>
contry						<br/>
Afghanistan	<font color="#ff4500">483</font>	Male	&nbsp;&nbsp;<font color="#ff4500">2016</font>-<font color="#ff4500">05</font>-<font color="#ff4500">05</font>	<font color="#ff4500">79</font>	&nbsp;4.5.8	<font color="#ff4500">2016</font>-<font color="#ff4500">05</font>-<font color="#ff4500">05</font><br/>
Albania	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">935</font>	Male	&nbsp;&nbsp;<font color="#ff4500">2016</font>-<font color="#ff4500">08</font>-<font color="#ff4500">04</font>	<font color="#ff4500">72</font>	&nbsp;<font color="#ff4500">3.99</font>	&nbsp;<font color="#ff4500">2016</font>-<font color="#ff4500">08</font>-<font color="#ff4500">04</font><br/>
Argentina	&nbsp;&nbsp;<font color="#ff4500">982</font>	Male	&nbsp;&nbsp;<font color="#ff4500">2016</font>-<font color="#ff4500">08</font>-<font color="#ff4500">25</font>	<font color="#ff4500">100</font>	<font color="#ff4500">8.3</font>	&nbsp;&nbsp;<font color="#ff4500">2016</font>-<font color="#ff4500">08</font>-<font color="#ff4500">25</font><br/>
Armenia	&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">970</font>	Male	&nbsp;&nbsp;<font color="#ff4500">2016</font>-<font color="#ff4500">06</font>-<font color="#ff4500">26</font>	<font color="#ff4500">100</font>	<font color="#ff4500">7.82</font>	&nbsp;<font color="#ff4500">2016</font>-<font color="#ff4500">06</font>-<font color="#ff4500">26</font><br/>
Australia	&nbsp;&nbsp;<font color="#ff4500">213</font>	Female	<font color="#ff4500">2016</font>-<font color="#ff4500">04</font>-<font color="#ff4500">19</font>	<font color="#ff4500">97</font>	&nbsp;<font color="#ff4500">0.84</font>	&nbsp;<font color="#ff4500">2016</font>-<font color="#ff4500">04</font>-<font color="#ff4500">19</font></blockquote></code></pre>
        <p>한 번에 여러 개의 인덱스로 그룹화할 수도 있다.</p>
        <h5>코드 14-38 여러 개 인덱스로 그룹화 하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">40</font><font>&#93;</font>:<br/>
<font color="#808080">#&nbsp;position&nbsp;열로&nbsp;먼저&nbsp;그룹화하고&nbsp;그&nbsp;안에서&nbsp;health&nbsp;열을&nbsp;한&nbsp;번&nbsp;더&nbsp;그룹화합니다.</font><br/>
multi_indexed&nbsp;<font color="#66cc66">=</font>&nbsp;heroes_df.<font>groupby</font><font>&#40;</font><font>&#91;</font><font color="#483d8b">'position'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'health'</font><font>&#93;</font><font>&#41;</font><br/>
&nbsp;<br/>
<font color="#808080">#&nbsp;앞&nbsp;groupby로&nbsp;그룹화된&nbsp;데이터를&nbsp;설명하는&nbsp;내용을&nbsp;출력합니다.</font><br/>
<font color="#808080">#&nbsp;각&nbsp;그룹&nbsp;안의&nbsp;전체&nbsp;정보(개수,&nbsp;유일한&nbsp;값의&nbsp;개수,&nbsp;최댓값을&nbsp;가진&nbsp;인덱스,&nbsp;출현&nbsp;빈도)를&nbsp;보여줍니다.</font><br/>
multi_indexed.<font>describe</font><font>&#40;</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">40</font><font>&#93;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;name<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;count&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;unique&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;top&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;freq<br/>
position	&nbsp;&nbsp;&nbsp;health				<br/>
defense	<font color="#ff4500">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;200</font>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;torbjorn&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">250</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">2</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;reaper&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">300</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;bastion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font><br/>
offense&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">150</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tracer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">4</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;genji&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font><br/>
support	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">200</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">5</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;lucio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font><br/>
tank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">400</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;zarya&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">500</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">3</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;winston&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">600</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;roadhog&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">1</font></blockquote></code></pre>
        <p><code>describe()</code>는 여러 가지 수치들을 계산해 한 번에 보여준다.</p>

        <h5>코드 14-39 describe()를 다른 데이터에 실행하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">41</font><font>&#93;</font>:<br/>
by_contry.<font>describe</font><font>&#40;</font><font>&#41;</font>.<font>head</font><font>&#40;</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">41</font><font>&#93;</font>:<br/>
	<font color="#008000">id</font>	level<br/>
count	mean	std	<font color="#008000">min</font>	<font color="#ff4500">25</font>%	<font color="#ff4500">50</font>%	<font color="#ff4500">75</font>%	<font color="#008000">max</font>	count	mean	std	<font color="#008000">min</font>	<font color="#ff4500">25</font>%	<font color="#ff4500">50</font>%	<font color="#ff4500">75</font>%	<font color="#008000">max</font><br/>
contry																<br/>
Afghanistan	<font color="#ff4500">2.0</font>	<font color="#ff4500">460.500000</font>	<font color="#ff4500">31.819805</font>	<font color="#ff4500">438.0</font>	<font color="#ff4500">449.25</font>	<font color="#ff4500">460.5</font>	<font color="#ff4500">471.75</font>	<font color="#ff4500">483.0</font>	<font color="#ff4500">2.0</font>	<font color="#ff4500">75.000000</font>	<font color="#ff4500">5.656854</font>	<font color="#ff4500">71.0</font>	<font color="#ff4500">73.0</font>	<font color="#ff4500">75.0</font>	<font color="#ff4500">77.0</font>	<font color="#ff4500">79.0</font><br/>
Albania	<font color="#ff4500">5.0</font>	<font color="#ff4500">634.800000</font>	<font color="#ff4500">265.387829</font>	<font color="#ff4500">212.0</font>	<font color="#ff4500">615.00</font>	<font color="#ff4500">672.0</font>	<font color="#ff4500">740.00</font>	<font color="#ff4500">935.0</font>	<font color="#ff4500">5.0</font>	<font color="#ff4500">53.800000</font>	<font color="#ff4500">20.596116</font>	<font color="#ff4500">28.0</font>	<font color="#ff4500">36.0</font>	<font color="#ff4500">61.0</font>	<font color="#ff4500">72.0</font>	<font color="#ff4500">72.0</font><br/>
Argentina	<font color="#ff4500">15.0</font>	<font color="#ff4500">484.266667</font>	<font color="#ff4500">271.686391</font>	<font color="#ff4500">121.0</font>	<font color="#ff4500">274.50</font>	<font color="#ff4500">437.0</font>	<font color="#ff4500">697.00</font>	<font color="#ff4500">982.0</font>	<font color="#ff4500">15.0</font>	<font color="#ff4500">50.466667</font>	<font color="#ff4500">27.756252</font>	<font color="#ff4500">11.0</font>	<font color="#ff4500">27.5</font>	<font color="#ff4500">51.0</font>	<font color="#ff4500">65.0</font>	<font color="#ff4500">100.0</font><br/>
Armenia	<font color="#ff4500">7.0</font>	<font color="#ff4500">691.428571</font>	<font color="#ff4500">249.030023</font>	<font color="#ff4500">205.0</font>	<font color="#ff4500">625.00</font>	<font color="#ff4500">730.0</font>	<font color="#ff4500">842.50</font>	<font color="#ff4500">970.0</font>	<font color="#ff4500">7.0</font>	<font color="#ff4500">61.428571</font>	<font color="#ff4500">28.371683</font>	<font color="#ff4500">23.0</font>	<font color="#ff4500">45.5</font>	<font color="#ff4500">59.0</font>	<font color="#ff4500">78.5</font>	<font color="#ff4500">100.0</font><br/>
Australia	<font color="#ff4500">2.0</font>	<font color="#ff4500">114.500000</font>	<font color="#ff4500">139.300036</font>	<font color="#ff4500">16.0</font>	<font color="#ff4500">65.25</font>	<font color="#ff4500">114.5</font>	<font color="#ff4500">163.75</font>	<font color="#ff4500">213.0</font>	<font color="#ff4500">2.0</font>	<font color="#ff4500">81.000000</font>	<font color="#ff4500">22.627417</font>	<font color="#ff4500">65.0</font>	<font color="#ff4500">73.0</font>	<font color="#ff4500">81.0</font>	<font color="#ff4500">89.0</font>	<font color="#ff4500">97.0</font></blockquote></code></pre>
        <p>그리고 <code>get_group()</code>를 이용해서 특정 그룹의 데이터들만 DataFrame 타입 데이터로 가져올 수도 있다.</p>
        <h5>코드 14-40 get_group()에 South Korea를 설정해 실행하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">42</font><font>&#93;</font>:<br/>
by_contry.<font>get_group</font><font>&#40;</font><font color="#483d8b">'South&nbsp;Korea'</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">42</font><font>&#93;</font>:<br/>
	<font color="#008000">id</font>	gender	contry	date	level	version	df_date<br/>
<font color="#ff4500">38</font>	<font color="#ff4500">39</font>	Female	South&nbsp;Korea	<font color="#ff4500">2016</font>-<font color="#ff4500">08</font>-<font color="#ff4500">11</font>	<font color="#ff4500">19</font>	<font color="#ff4500">0.99</font>	<font color="#ff4500">2016</font>-<font color="#ff4500">08</font>-<font color="#ff4500">11</font><br/>
<font color="#ff4500">189</font>	<font color="#ff4500">190</font>	Male	South&nbsp;Korea	<font color="#ff4500">2016</font>-<font color="#ff4500">08</font>-<font color="#ff4500">25</font>	<font color="#ff4500">66</font>	<font color="#ff4500">0.74</font>	<font color="#ff4500">2016</font>-<font color="#ff4500">08</font>-<font color="#ff4500">25</font><br/>
<font color="#ff4500">734</font>	<font color="#ff4500">735</font>	Male	South&nbsp;Korea	<font color="#ff4500">2016</font>-<font color="#ff4500">08</font>-<font color="#ff4500">21</font>	<font color="#ff4500">34</font>	<font color="#ff4500">4.9</font>	<font color="#ff4500">2016</font>-<font color="#ff4500">08</font>-<font color="#ff4500">21</font></blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">14.7.2 - agg()와 apply() 함수로 데이터 가공하기</h4>
    <section>
      <article>
        <p>이제부터는 적절히 의도에 맞게 데이터를 가공하는 법을 알아보자.</p>
        <p>특정 열에 대해 여러 가지 연산을 하고 싶을 때는 <code><a href="https://pandas.pydata.org/pandas-docs/stable/generated/pandas.core.groupby.DataFrameGroupBy.agg.html" target="_blank">agg()</a></code>를 사용하면 된다. 파이썬 딕셔너리 타입을 파라미터로 전달한다. 코드를 보자.</p>
        <h5>코드 14-41 딕셔너리 타입을 사용하는 agg() 예제</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">43</font><font>&#93;</font>:<br/>
by_contry.<font>agg</font><font>&#40;</font><font>&#123;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;적용할&nbsp;열&nbsp;이름을&nbsp;딕셔너리의&nbsp;키로&nbsp;넣습니다.</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;level&quot;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;적용시킬&nbsp;함수를&nbsp;리스트로&nbsp;전달합니다.</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font>&#91;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;(&quot;&lt;레이블&nbsp;이름&gt;&quot;,&nbsp;&lt;적용할&nbsp;함수&gt;)</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font>&#40;</font><font color="#483d8b">&quot;합계&quot;</font><font color="#66cc66">,</font>&nbsp;np.<font color="#008000">sum</font><font>&#41;</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;&lt;적용할&nbsp;함수&gt;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;np.<font>mean</font><font color="#66cc66">,</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font>&#93;</font><br/>
<font>&#125;</font><font>&#41;</font><font>&#91;</font><font color="#ff4500">3</font>:<font color="#ff4500">9</font><font>&#93;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">43</font><font>&#93;</font>:<br/>
	level<br/>
합계	<font color="#66cc66">&lt;</font>function&nbsp;mean&nbsp;at&nbsp;<font color="#ff4500">0x1098d2620</font><font color="#66cc66">&gt;</font><br/>
contry		<br/>
Armenia	<font color="#ff4500">430</font>	<font color="#ff4500">61.428571</font><br/>
Australia	<font color="#ff4500">162</font>	<font color="#ff4500">81.000000</font><br/>
Azerbaijan	<font color="#ff4500">96</font>	<font color="#ff4500">48.000000</font><br/>
Bangladesh	<font color="#ff4500">100</font>	<font color="#ff4500">100.000000</font><br/>
Belarus	<font color="#ff4500">223</font>	<font color="#ff4500">74.333333</font><br/>
Belgium	<font color="#ff4500">18</font>	<font color="#ff4500">18.000000</font></blockquote></code></pre>
        <p>레이블 이름과 함수를 튜플로 묶어서 전달하거나 함수 이름만 전달할 수 있다.</p>
        <h5>코드 14-42 나라별로 level 열의 중간 값(median) 구하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">44</font><font>&#93;</font>:<br/>
by_contry.<font>agg</font><font>&#40;</font><font>&#123;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;level&quot;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font>&#91;</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;np.<font>size</font><font color="#66cc66">,</font>&nbsp;np.<font>median</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font>&#93;</font><br/>
<font>&#125;</font><font>&#41;</font><font>&#91;</font><font color="#ff4500">3</font>:<font color="#ff4500">9</font><font>&#93;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">44</font><font>&#93;</font>:<br/>
&nbsp;<br/>
level<br/>
size	median<br/>
contry		<br/>
Armenia	<font color="#ff4500">7</font>	<font color="#ff4500">59.0</font><br/>
Australia	<font color="#ff4500">2</font>	<font color="#ff4500">81.0</font><br/>
Azerbaijan	<font color="#ff4500">2</font>	<font color="#ff4500">48.0</font><br/>
Bangladesh	<font color="#ff4500">1</font>	<font color="#ff4500">100.0</font><br/>
Belarus	<font color="#ff4500">3</font>	<font color="#ff4500">68.0</font><br/>
Belgium	<font color="#ff4500">1</font>	<font color="#ff4500">18.0</font></blockquote></code></pre>
        <P>만약 튜플로 열 이름을 지정해 전달하지 않고 그냥 함수로만 전달하면, 바로 함수 이름을 열 이름으로 사용한다.</P>

        <h5>코드 14-43 나라별로 level의 제곱 합 구하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">45</font><font>&#93;</font>:<br/>
<font color="#ff7700">def</font>&nbsp;sum_of_pow<font>&#40;</font>s:pd.<font>core</font>.<font>series</font>.<font>Series</font><font>&#41;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;각&nbsp;그룹의&nbsp;해당&nbsp;열&nbsp;Series&nbsp;타입&nbsp;데이터로&nbsp;전달받습니다.</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#008000">sum</font><font>&#40;</font><font>&#91;</font>i&nbsp;**&nbsp;<font color="#ff4500">2</font>&nbsp;<font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font>&nbsp;s<font>&#93;</font><font>&#41;</font><br/>
&nbsp;<br/>
by_contry.<font>agg</font><font>&#40;</font><font>&#123;</font><font color="#483d8b">&quot;level&quot;</font>:<font>&#91;</font>sum_of_pow<font>&#93;</font><font>&#125;</font><font>&#41;</font>.<font>tail</font><font>&#40;</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">45</font><font>&#93;</font>:<br/>
	level<br/>
sum_of_pow<br/>
contry	<br/>
Vietnam	<font color="#ff4500">19222</font><br/>
Wallis&nbsp;<font color="#ff7700">and</font>&nbsp;Futuna	<font color="#ff4500">8100</font><br/>
Yemen	<font color="#ff4500">11381</font><br/>
Zambia	<font color="#ff4500">7921</font><br/>
Zimbabwe	<font color="#ff4500">8836</font></blockquote></code></pre>
        <p>이제 각 그룹의 값에 특정 연산을 실행하는 법을 알았다. 하지만 여러 개의 열에 작업하려면 <code>agg()</code>만으로는 부족하다.</p>
        <p>이 때 <code><a href="https://pandas.pydata.org/pandas-docs/stable/generated/pandas.DataFrame.apply.html" target="_blank">apply()</a></code>를 사용할 수 있다. 이를 이용하면 SQL 에서 복잡한 쿼리문을 작성해야 할 작업을 팬더스에서 간단하게 할 수 있다. 예를 들면 해당 그룹 안의 제일 큰 날짜와 제일 작은 날짜를 구해서 차이를 계산하는 등이다. 이 예제에서는 같은 열을 사용하지만 다른 열을 사용해 값을 반환하면 결과를 만들 수 있다.</p>
        <h5>코드 14-44 나라별로 날짜의 최댓값과 최솟값의 차이 구하기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">46</font><font>&#93;</font>:<br/>
<font color="#ff7700">def</font>&nbsp;get_diff_date<font>&#40;</font>df&nbsp;:&nbsp;pd.<font>core</font>.<font>frame</font>.<font>DataFrame</font><font>&#41;</font>:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;apply()로&nbsp;전달하는&nbsp;함수의&nbsp;파라미터는&nbsp;각&nbsp;그룹의&nbsp;DataFrame&nbsp;타입&nbsp;데이터입니다.</font><br/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;df.<font>df_date</font>.<font color="#008000">max</font><font>&#40;</font><font>&#41;</font>&nbsp;-&nbsp;df.<font>df_date</font>.<font color="#008000">min</font><font>&#40;</font><font>&#41;</font><br/>
&nbsp;<br/>
by_contry.<font>apply</font><font>&#40;</font>get_diff_date<font>&#41;</font><font>&#91;</font><font color="#ff4500">30</font>:<font color="#ff4500">39</font><font>&#93;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">46</font><font>&#93;</font>:<br/>
contry<br/>
Ecuador&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">0</font>&nbsp;days<br/>
Egypt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">170</font>&nbsp;days<br/>
El&nbsp;Salvador&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">0</font>&nbsp;days<br/>
Equatorial&nbsp;Guinea&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">0</font>&nbsp;days<br/>
Estonia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">0</font>&nbsp;days<br/>
Ethiopia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">0</font>&nbsp;days<br/>
Finland&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">233</font>&nbsp;days<br/>
France&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">361</font>&nbsp;days<br/>
Gambia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff4500">0</font>&nbsp;days<br/>
dtype:&nbsp;timedelta64<font>&#91;</font>ns<font>&#93;</font></blockquote></code></pre>
        <p>이렇게 각 그룹 안에서 연산해서 결과를 만들 수 있다. 앞서 배운 <code>merge()</code>를 사용하여 원래의 데이터프레임에 그룹의 계산결과를 덧붙이거나 할 수도 있을 것이다. 이를 조금 더 응용하면 코호트 분석도 가능하다.</p>
      </article>
    </section>

    <h4 class="sub-header">14.7.3 - 그래프 그리기</h4>
    <section>
      <article>
        <p>데이터를 보여주는 좋은 방법 중 하나는 그래프를 그리는 것이다. 팬더스에는 그래프를 그리는 기능을 내장하고 있지 않으므로 외부 그래프 패키지를 이용한다.</p>
        <div class="tip">
          <h4>TIP</h4>
          <p>시각화의 자세한 기법은 팬더스 개발 문서의 '<a href="http://pandas.pydata.org/pandas-docs/stable/visualization.html" target="_blank">Visualization</a>'을 참고한다.</p>          
        </div>
        <p>파이썬에서 그래프를 그릴 때 사용하는 대표적인 라이브러리로는 <a href="https://matplotlib.org/" target="_blank"matplotlib></a>가 있다. 이를 불러오기 위해 다음 명령을 참고해 설치한다.</p>
          <pre><code>$ pip install matplotlib</code></pre>
          <p>그리고 Jupyter Notebook 상에서 바로 그래프를 표시할 수 있는 매직 명령어를 작성해 실행한다.</p>
          <h5>코드 14-45 %matplotlib inline 매직 명령어 실행</h5>
          <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">47</font><font>&#93;</font>:<br/>
%matplotlib&nbsp;inline</blockquote></code></pre>
        <p>이제 Jupyter Notebook에서 팬더스를 이용해 그래프를 그릴 준비는 끝났다. 다음 코드를 실행해 지금까지 다룬 데이터의 그래프를 그려보자.</p>
        <h5>코드 14-46 그래프 그리기</h5>
        <pre class="python"><code><blockquote>In<font>&#91;</font><font color="#ff4500">48</font><font>&#93;</font>:<br/>
heroes_df.<font>set_index</font><font>&#40;</font><font color="#483d8b">&quot;name&quot;</font><font color="#66cc66">,</font>&nbsp;inplace<font color="#66cc66">=</font><font color="#008000">True</font><font>&#41;</font><br/>
heroes_df.<font>sort_values</font><font>&#40;</font>by<font color="#66cc66">=</font><font color="#483d8b">&quot;health&quot;</font><font color="#66cc66">,</font>&nbsp;inplace<font color="#66cc66">=</font><font color="#008000">True</font><font>&#41;</font><br/>
heroes_df.<font>plot</font><font>&#40;</font>kind<font color="#66cc66">=</font><font color="#483d8b">&quot;bar&quot;</font><font color="#66cc66">,</font>&nbsp;x<font color="#66cc66">=</font><font color="#483d8b">&quot;position&quot;</font><font color="#66cc66">,</font>&nbsp;y<font color="#66cc66">=</font><font color="#483d8b">&quot;health&quot;</font><font>&#41;</font><br/>
&nbsp;<br/>
Out<font>&#91;</font><font color="#ff4500">48</font><font>&#93;</font>:<br/>
<font color="#66cc66">&lt;</font>matplotlib.<font>axes</font>._subplots.<font>AxesSubplot</font>&nbsp;at&nbsp;<font color="#ff4500">0x11aa873c8</font><font color="#66cc66">&gt;</font></blockquote></code></pre>
        <h5>그림 14-1 그래프 출력</h5>
        <img src="/img/img44.png" alt="그래프 출력">
      </article>
    </section>
  </div>