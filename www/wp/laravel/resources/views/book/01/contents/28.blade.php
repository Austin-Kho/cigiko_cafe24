<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>데이터 형식은 데이터가 열에 저장되는 데이터가 무엇인지, 데리터가 실제로 어떻게 저장되는지 정의한다. 데이터 형식이 사용되는 이유는 여러 가지이며 그 중 몇 개를 나열하면 다음과 같다.</p>
      <ul>
        <li>데이터 형식을 사용하면 열에 저장할 수 있는 데이터의 형식을 제한할 수 있다. 예를 들어 숫자 값만 사용할 수 있는 열에 숫자 데이터 형식만 사용할 수 있도록 제한할 수 있다.</li>
        <li>데이터 형식을 사용하면 내부적으로 저장 공간을 보다 효율적으로 사용할 수 있다. 예를 들어 숫자와 날짜/시간 값은 텍스트 문자열에 비해 보다 압축된 형태로 저장된다.</li>
        <li>데이터 형식을 사용하면 부가적인 정렬 순서를 정할 수 있다. 예를 들어 모든 것을 문자열로 처리할 경우 1이 10보다 먼저이며 10은 2보다 먼저가 된다. 문자열은 첫 글자부터 시작해서 차례로 따져서 사전순으로 정렬되기 때문이다. 반면 숫자 데이터 형식의 경우는 숫자의 크기에 따라 정렬되므로 2가 10보다 먼저이다.</li>
      </ul>
      <p>테이블을 디자인 할 때는 데이터 형식에 각별한 주의를 기울여야 한다. 이 부록에서 데이터 형식에 대한 모든 내용을 설명할 수는 없으므로 주요한 데이터 형식에 대해서 간략하게 소개한다.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 문자열 데이터 형식
  </h3>
  <section>
    <article>
      <p>가장 자주 사용되는 데이터 형식은 문자열이다. 문자열은 여러 가지 문자 데이터를 저장하는 데 사용되며 고정 길이 문자열과 가변 길이 문자열 두 가지 종류가 있다. 표 D.1을 참조하기 바란다.</p>
      <p>고정 길이 문자열은 저장할 수 있는 문자열의 길이가 고정된 것이며 이 길이, 즉 문자의 개수는 테이블을 만들 때 지정된다. 저장 공간 및 성능 면에서 가변 길이 문자열에 비해서 유리하다.</p>

      <h5>표 D.1 문자열 데이터 형식</h5>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>데이터 형식</th>
            <th>설 명</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>CHAR</td>
            <td>1에서 255개의 문자를 저장할 수 있는 고정 길이 문자열. 만들 때 크기를 지정해야 한다.</td>
          </tr>
          <tr>
            <td>NCHAR</td>
            <td>다중 바이트 또는 유니코드 문자를 지원하기 위해 디자인된 특별한 형식의 CHAR. 정확한 구현 방식은 DBMS에 따라 크게 다르다.</td>
          </tr>
          <tr>
            <td>NVARCHAR</td>
            <td>다중 바이트 또는 유니코드 문자를 지원하기 위해 디자인된 특별한 형식의 TEXT. 정확한 구현 방식은 DBMS에 따라 크게 다르다.</td>
          </tr>
          <tr>
            <td>TEXT(LONG, MEMO, VARCHAR로 불리기도 한다.)</td>
            <td>가변 길이 텍스트</td>
          </tr>
        </tbody>
      </table>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 따옴표 사용</h4>
        <p>사용되는 문자열 데이터 형식의 종류에 관계없이 문자열 값은 작은따옴표로 둘러싼누 것이 규칙이다.</p>
        <h4><span class="badge badge-secondary">주의</span> 숫자 값이 숫자 값이 아닌 경우</h4>
        <p>전화번호나 우편번호 등은 숫자 필드에 저장하는 것이 맞다고 생각하겠지만 별로 좋은 방법이 아니다. 예를 들어 01234라는 우편번호를 숫자 필드에 저장할 경우 앞에 0은 의미 없는 것으로 판단되어 1234만 저장될 수도 있기 때문이다. 기본적인 규칙은 이렇다. 합계, 평균 등의 계산에 사용되는 숫자라면 숫자 데이터 형식이며, 내용은 숫자지만 계산에 사용되지 않고 있는 그대로 값으로 사용되는 경우라면 문자열 데이터 형식으로 저장하는 것이 좋다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 숫자 데이터 형식
  </h3>
  <section>
    <article>
      <p>숫자 데이터 형식은 숫자를 저장한다. 대부분의 DBMS는 저장할 수 있는 숫자의 범위가 서로 다른 여러 가지 숫자 데이터 형식을 지원하는데, 저장할 수 있는 숫자의 범위가 커질수록 필요한 저장공간은 늘어난다. 또한 소수점 아래 자리를 지원하는 숫자 형식도 있으며 정수만 지원하는 숫자 형식도 있다. 자주 사용되는 숫자 형식은 표 D.2와 같으며 모든 DBMS에서 이와 정확히 동일한 이름과 약정을 사용하는 것은 아니다.</p>
      <h5>표 D.2 숫자 데이터 형식</h5>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>데이터 형식</th>
            <th>설 명</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>BIT</td>
            <td>단일 비트 값. 0이나 1 값이며 on 또는 off 플래그에 주로 사용된다.</td>
          </tr>
          <tr>
            <td>DECIMAL(NUMERIC으로도 부른다)</td>
            <td>소수 자릿수에 유동성이 있는 실수 값</td>
          </tr>
          <tr>
            <td>FLOAT(NUMBER로도 부른다)</td>
            <td>실수 값</td>
          </tr>
          <tr>
            <td>INT(INTEGER로도 부른다)</td>
            <td>-2147483648에서 2147483647까지의 숫자를 저장할 수 있는 4바이트 정수 값</td>
          </tr>
          <tr>
            <td>REAL</td>
            <td>4바이트 실수 값</td>
          </tr>
          <tr>
            <td>SMALLINT</td>
            <td>-32768에서 32767까지의 숫자를 저장할 수 있는 2바이트 정수 값</td>
          </tr>
          <tr>
            <td>TINYINT</td>
            <td>0에서 255까지의 숫자를 저장할 수 있는 1바이트 정수 값</td>
          </tr>
        </tbody>
      </table>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 따옴표는 쓰지 않는다.</h4>
        <p>문자열과는 달리 숫자 값은 절대 따옴표로 감싸지 않는다.</p>
        <h4><span class="badge badge-secondary">TIP</span> 통화 데이터 형식</h4>
        <p>대부분의 DBMS는 돈에 해당하는 숫자를 저장하기 위한 특별한 데이터 형식을 지원하며 MONEY나 CURRENCY 등으로 불린다. 이러한 데이터 형식은 통화 값을 저장하기 최적화되었으나 기본적으로는 DECIMAL 데이터 형식에 가깝다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 날짜 및 시간 데이터 형식
  </h3>
  <section>
    <article>
      <p>모든 DBMS는 날짜와 시간 값을 저장하기 위해 디자인된 데이터 형식을 지원한다. 숫자 형식과 마찬가지로 대부분의 DBMS는 저장할 수 있는 값의 범위와 정밀도에 따라 여러 가지의 데이터 형식을 지원하는 것이 일반적이다.</p>
      <h5>표 D.3 날짜 및 시간 데이터 형식</h5>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>데이터 형식</th>
            <th>설 명</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>DATE</td>
            <td>날짜 값</td>
          </tr>
          <tr>
            <td>DATETIME(TIMESTAMP로도 부른다)</td>
            <td>날짜/시간 값</td>
          </tr>
          <tr>
            <td>SMALLDATETIME</td>
            <td>분 단위이 날짜/시간 값(초나 밀리 초는 사용하지 않음)</td>
          </tr>
          <tr>
            <td>TIME</td>
            <td>시간 값</td>
          </tr>
        </tbody>
      </table>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> 날짜 지정</h4>
        <p>모든 DBMS에서 인식할 수 있는 형식으로 날짜를 지정할 수 있는 표준 형식은 없다. DBMS는 2004-12-30이나 Dec 30th, 2004와 같은 형식을 인식 하지만 이런 형식 조차도 일부 DBMS에서는 문제가 된다. 따라서 지정할 수 있는 날짜 형식에 대해서는 각 DBMS의 설명서를 반드시 읽어보아야 한다.</p>
        <h4><span class="badge badge-secondary">참고</span> ODBC 날짜</h4>
        <p>모든 DBMS는 날짜 지정을 위한 자체 형식을 가지고 있으므로 ODBC는 ODBC를 사용하는 모든 데이터베이스에서 쓸 수 있는 형식을 마련해 두고 있다. ODBC형식은 날짜의 경우 {d '2004-12-30'}이며 시간의 경우 {t '21:46:29'}이고, 날짜/시간의 경우 {ts '2004-12-30 21:46:29'}이다. ODBC를 통해 SQL을 사용한다면 이 형식대로 날짜를 지정하면 된다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 이진 데이터 형식
  </h3>
  <section>
    <article>
      <p>이진 데이터 형식은 호환성이 가장 적은 형식이며 그다지 자주 사용하지도 않는다. 지금까지 설명한 몯ㄴ 데이터 형식과 달리 이진 데이터 형식은 그 용도가 상당히 제한되어 있으며 그래픽 이미지, 멀티미디어, 워드프로세서 문서 등 모든 형태의 이진 정보를 포함할 수 있다.</p>
      <h5>표 D.4 이진 데이터 형식</h5>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>데이터 형식</th>
            <th>설 명</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>BINARY</td>
            <td>고정 길이 이진 데이터이며 최대 길이는 255바이트에서 8,000바이트까지 다양하다.</td>
          </tr>
          <tr>
            <td>LONG RAW</td>
            <td>2GB까지 저장할 수 있는 가변 길이 이진 데이터</td>
          </tr>
          <tr>
            <td>RAW(일부 바이트 구현에서는 BINARY로도 부른다)</td>
            <td>255까지 저장할 수 있는 고정 길이 이진 데이터</td>
          </tr>
          <tr>
            <td>VARBINARY</td>
            <td>가변 길이 이진 데이터이며 최대 길이는 255바이트에서 8,000바이트까지 다양하다.</td>
          </tr>
        </tbody>
      </table>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> 데이터 형식의 비교</h4>
        <p>실제로 사용되는 데이터 형식 비교의 예를 보려면 부록 A에서 소개한 테이블 생성 스크립트를 살펴보기 바란다. 각 DBMS에 대한 스크립트를 살펴보면 복잡한 데이터 형식의 비교가 어떻게 이루어지는지 다양한 예를 볼 수 있을 것이다.</p>
      </div>
    </article>
  </section>
</div>