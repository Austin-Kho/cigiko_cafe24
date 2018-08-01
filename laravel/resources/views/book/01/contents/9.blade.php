<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 함수가 무엇이며 DBMS에서 지원하는 함수에는 어떤 것이 있는지, 그리고 어떻게 사용하는지 알아보자. 또한 SQL 함수의 사용에 문제가 발생할 수 있는 상황에 대해서도 살펴보자.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 함수의 이해
  </h3>
  <section>
    <article>
      <p>다른 컴퓨터 언어와 마찬가지로, SQL 역시 데이터 제어를 위한 함수를 지원한다. 함수는 데이터를 기반으로 수행되는 연산이며, 변환이나 조작을 수행한다.</p>
    </article>
  </section>

  <h4 class="sub-header">함수의 문제점</h4>
  <section>
    <article>
      <p>이 단원에서 설명하는 예제를 살펴보기 전에 SQL 함수를 사용하면 발생할 수 있는 문제에 대해 알아둘 필요가 있다.</p>

      <p>SELECT 와 같은 SQL 문은 대부분의 DBMS 에서 동일하게 지원하지만, 함수는 특정 DBMS 에서만 지원하는 경우가 많으며 지원되는 방식도 서로 다르다. 모든 DBMS 에서 지원한다 하더라도 그 사용 방식은 서로 다르다. 자주 사용 되는 함수와 각 DBMS 의 지원 방식을 정리한 표 8.1 을 보면 이러한 문제를 이해할 수 있을 것이다.</p>

      <h5>표 8.1 DBMS 함수의 차이점</h5>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th style="width:23%;">함수</th>
            <th>구문</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>문자열 일부를 얻기</td>
            <td>Access는 MID()를 사용하며 DB2, Oracle, PostgreSQL은 SUBSTR()을, MySQL, SQL Server, Sybase는 SUBSTRING()을 사용한다.</td>
          </tr>
          <tr>
            <td>데이터 형식 변환</td>
            <td>Access와 Oracle은 각 형식마다 별도의 함수가 있으며 DB2와 PostgreSQL은 CAST()를, MySQL, SQL Server, Sybase는 CONVERT()를 사용한다.</td>
          </tr>
          <tr>
            <td>현재 날짜 얻기</td>
            <td>Access는 NOW()를 사용하며 DB2와 PostgreSQL은 CURRENT_DATE를, MySQL은 CURDATE()를 Oracle은 SYSDATE를, SQL Server와 Sybase는 GETDATE()를 사용한다.</td>
          </tr>
        </tbody>
      </table>
      <p>이와 같이 SQL 문과 달리 SQL 함수는 DBMS 에 따라 다르기 때문에 호환이 어렵다. 즉 특정한 DBMS 에 맞게 SQL을 작성했을 때 이를 다른 DBMS에서는 사용할 수 없다고 보아야 한다.</p>
      <blockquote><strong>호환 가능</strong>: 여러 시스템에서 작동 가능하도록 작성된 코드</blockquote>
      <p>코드의 호환성을 염두에 둔다면 이러한 SQL 함수를 사용해선 안될 것이다. 하지만 이는 어디까지나 이상적이고 이론적인 사실일 뿐이며, 함수를 사용하지 않고는 응용프로그램의 성능을 높이기 힘들다. 함수가 수행하는 기능을 것과 동일한 기능을 만들려면 DBMS에 보다 많은 지시를 내려야 하며 그만큼 코드도 복잡해진다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 함수를 사용해야 하는가</h4>
        <p>함수를 사용해야 할까? 결정은 각자의 것이며 정답은 없다. 함수를 사용하기로 했다면 코드에 적절히 주석을 넣어 다른 개발자가 여러분의 SQL을 보다 잘 이해할 수 있도록 해야 할 것이다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 함수의 사용 
  </h3>
  <section>
    <article>
      <p>대부분이 SQL에서 지원하는 함수의 종류는 다음과 같다. </p>
      <ul>
        <li>텍스트 문자열을 제어하는 데 사용되는 텍스트 함수. 예를 들어 값의 앞뒤에 공백을 붙이고 잘라내거나, 대소문자를 변환하는 등의 작업을 수행한다.</li>
        <li>숫자 데이터를 사용하여 수학 연산을 하는 숫자 함수. 예를 들어 절대값을 구하거나 대수 계산을 수행한다.</li>
        <li>날짜와 시간 값을 제어하고 이 값에서 특정 부분을 얻어내는 날짜 및 시간 함수. 예를 들어 두 날짜 사이의 간격을 구하거나 날짜가 올바른지 확인하는 작업을 수행한다.</li>
        <li>사용하는 DBMS 에 관련된 정보를 반환하는 시스템 함수. 예를 들어 로그인 정보를 반환한다.</li>
      </ul>

      <p>지난 단원에서 텍스트 제어 함수 중 하나인 RTRIM() 함수를 사용했었다. 이는 열 값의 끝 부분에 있는 공백을 잘라내는 기능을 한다. 이번에는 <code>UPPER()</code> 함수를 예로 들어본다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT vend_name, UPPER(vend_name) AS vend_name_upcase<br>
        FROM Vendors<br>
        ORDER BY vend_name;
      </code></pre>        
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>vend_name</th><th>vend_name_upcase</th></tr>
          </thead>
          @php
            $data = DB::table('Vendors')
                      ->select('vend_name', DB::raw('UPPER(vend_name) AS vend_name_upcase'))
                      ->orderBy('vend_name')->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->vend_name}}</td><td>{{$lt->vend_name_upcase}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이와 같이 UPPER() 함수는 모든 텍스트를 대분자로 변환하는 기능을 한다. 결과를 보면 왼쪽은 Vendors 테이블에 저장된 그대로의 데이터이고, 오른쪽은 텍스트를 대문자로 변환하여 vend_name_upcase라는 열에 저장한 데이터이다.</p>
      <p>자주 사용되는 텍스트 제어 함수</p>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>함수</th>
            <th>설명</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>LEFT()</code> (또는 부분 문자열 함수 사용)</td>
            <td>문자열 왼쪽 끝에서부터 지정된 길이만큼 문자를 반환</td>
          </tr>
          <tr>
            <td><code>LENGTH()</code> (또는 <code>DATALENGTH()</code>나 <code>LEN()</code>)</td>
            <td>문자열의 길이를 반환</td>
          </tr>
          <tr>
            <td><code>LOWER()</code> (Access에서는 <code>LCASE()</code> 사용)</td>
            <td>문자열의 문자를 소문자로 변경</td>
          </tr>
          <tr>
            <td><code>LTRIM()</code></td>
            <td>문자열 왼쪽에 있는 공백을 잘라냄</td>
          </tr>
          <tr>
            <td><code>RIGHT()</code> (또는 부분 문자열 함수 사용)</td>
            <td>문자열 오른쪽 끝에서부터 지정된 길이만큼 문자를 반환</td>
          </tr>
          <tr>
            <td><code>RTRIM()</code></td>
            <td>문자열 오른쪽에 있는 공백을 잘라냄</td>
          </tr>
          <tr>
            <td><code>SOUNDEX()</code></td>
            <td>문자열의 SOUNDEX 값을 반환</td>
          </tr>
          <tr>
            <td><code>UPPER()</code> (Access에서는 <code>UCASE()</code> 사용)</td>
            <td>문자열의 문자를 대문자로 변경</td>
          </tr>
        </tbody>
      </table>
      <p>다른 함수의 쓰임은 쉽게 이해할 수 있을 것이고, SOUNDEX 에 대해서만 설명하자면, 문자열의 각 텍스트를 발음을 기준으로 하여 영숫자 패턴으로 변환하는 알고리즘으로, 문자열을 철자가 아니라 소리나는 음성으로 비교하는 데 사용된다. SOUNDEX는 SQL 개념이 아니므로 대부분의 DBMS 는 이를 지원하지 않는다.</p>
    </article>
  </section>

  <h4 class="sub-header">날짜와 시간 제어 함수</h4>
  <section>
    <article>
      <p>날짜와 시간은 특별한 데이터 형식으로 테이블에 저장되며, 각 DBMS 마다 그 방식이 조금씩 다르다. 날짜와 시간 값이 특별한 형식으로 저장되기 때문에 그에 따라 빠르고 효율적으로 필터링하고 실제 저장 공간에 저장하는 것이 가능하다.</p>
      <p>날짜오 시간을 저장하는 데 사용되는 형식을 클라이언트의 응용프로그램에서 그대로 사용하는 경우는 거의 없으므로, 적절한 함수를 사용하여 이 값을 읽고, 확장 하고, 또 제어한다.</p>
      <p>간단한 예를 들어보자. Orders 테이블에 주문 날짜를 나타내는 값이 있고, SQL Server나 Sybase에서 2004년에 주문된 항목의 주문 번호를 얻으려면 다음과 같은 문을 사용한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
    <pre><code>
      SELECT order_num<br>
      FROM Orders<br>
      WHERE DATEPART(yy, order_date) = 2004;
    </code></pre>    
    <h4><span class="badge badge-pill badge-success">출 력</span></h4>
    <pre><code>
      <table class="table-sm">
        <thead>
          <tr><th>order_num</th></tr>
        </thead>
        @php
          $data = DB::table('Orders')
                    ->select('order_num')
                    ->where(DB::raw('YEAR(order_date) = 2004'))
                    ->get();
        @endphp
        <tbody>
          @foreach($data as $lt)
          <tr><td>{{$lt->order_num}}</td></tr>
          @endforeach
        </tbody>
      </table>
    </code></pre>
    <h4><span class="badge badge-pill badge-info">분 석</span></h4>
    <p>내용 입력</p>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 데이터베이스의 기본 
  </h3>
  <section>
    <article>
      <p>내용 입력</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
    <pre><code></code></pre>
    <h4><span class="badge badge-pill badge-info">분 석</span></h4>
    <p>내용 입력</p>
    <h4><span class="badge badge-pill badge-success">출 력</span></h4>
    <pre><code>
      <table class="table-sm">
        <thead>
          <tr><th>aa</th></tr>
        </thead>
        <tbody>
          <tr><td>bb</td></tr>
        </tbody>
      </table>
    </code></pre>
    </article>
  </section>

  <h4 class="sub-header">테이블</h4>
  <section>
    <article>
      <p>내용 입력</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
    <pre><code></code></pre>
    <h4><span class="badge badge-pill badge-info">분 석</span></h4>
    <p>내용 입력</p>
    <h4><span class="badge badge-pill badge-success">출 력</span></h4>
    <pre><code>
      <table class="table-sm">
        <thead>
          <tr><th>aa</th></tr>
        </thead>
        <tbody>
          <tr><td>bb</td></tr>
        </tbody>
      </table>
    </code></pre>
    </article>
  </section>

  <h4 class="sub-header">테이블</h4>
  <section>
    <article>
      <p>내용 입력</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
    <pre><code></code></pre>
    <h4><span class="badge badge-pill badge-info">분 석</span></h4>
    <p>내용 입력</p>
    <h4><span class="badge badge-pill badge-success">출 력</span></h4>
    <pre><code>
      <table class="table-sm">
        <thead>
          <tr><th>aa</th></tr>
        </thead>
        <tbody>
          <tr><td>bb</td></tr>
        </tbody>
      </table>
    </code></pre>
    </article>
  </section>
</div>