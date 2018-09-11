<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 커서가 무엇이며 어떻게 사용하는지에 대해 알아보자.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 커서의 이해
  </h3>
  <section>
    <article>
      <p>SQL을 사용해서 선택한 행들은 결과 집합으로 반환된다. 이 결과 집합은 지정한 SQL 문에 맞는 모든 행을 포함하는 것으로, 0개 이상의 행을 가지게 된다. 간단한 <code>SELECT</code> 문을 사용해서는 결과 집합에 있는 첫 번째 행, 다음 행 이전 10개의 행 등을 얻어낼 방법이 없으며, 이것이 바로 관계형 DBMS가 필요한 이유이다.</p>
      <blockquote><strong>결과 집합</strong>: SQL 쿼리에 의해 반환되는 결과</blockquote>

      <p>행 사이를 앞으로 또는 뒤로 이동하면서 특정한 위치에 있는 행을 가져와야 할 경우가 있으며, 이 때 필요한 것이 바로 <mark><u>커서</u></mark>이다. 커서는 DBMS 서버에 저장되는 데이터베이스 쿼리로, <code>SELECT</code> 문은 아니지만 이 문에 의해 결과 집합이 얻어진다. 커서가 저장되면 응용 프로그램에서는 자유롭게 이 커서를 사용하여 내부 데이터를 필요에 따라 탐색하고 가져올 수 있다.</p>
      <p>DBMS에 따라 지원되는 커서 옵션과 기능이 다르다. 일반적인 기능을 나열하면 다음과 같다.</p>
      <ul>
        <li>커서를 읽기 전용으로 표시하여 읽는 것만 가능하고 업데이트나 삭제는 할 수 없도록 하는 기능</li>
        <li>특정한 방향과 연계된 작업(전진, 후진, 첫 번째, 마지막, 절대 위치, 상대 위치 등)을 제어하는 기능</li>
        <li>특정 열은 편집 가능한 것으로 지정하고 다른 열은 편집할 수 없는 것으로 지정하는 기능</li>
        <li>커서를 만든 특정한 요청(저장 프로시저와 같은)에서 커서에 액세스할 수 있도록 지정하거나 모든 요청에서 액세스할 수 있도록 지정하는 범위 명시 기능</li>
        <li>가져온 데이터를 DBMS에서 복사하도록 하여(테이블의 실제 데이터를 가리키는 것이 아니라 실제로 데이터를 가져와 복사본을 만든다는 의미) 커서를 열고 액세스 하는 동안 데이터가 변경되지 않도록 보장하는 기능</li>
      </ul>
      <p>커서는 사용자가 화면의 데이터를 탐색하며 필요에 따라 변경할 수 있는 대화식 응용 프로그램에 사용하기에 아주 좋다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> 커서와 웹 기반의 응용 프로그램</h4>
        <p>커서는 ASP, ColdFusion, PHP, JSP와 같은 웹 기반 응용 프로그램에서 사용하기에는 적당하지 않다. 커서는 특정한 기간 동안 클라이언트와 서버 간에 데이터가 유지되어야 하는 방식이며 이러한 클라이언트/서버 모델은 웹 기반의 응용 프로그램에는 맞지 않다. 응용 프로그램 서버가 최종 사용자가 아닌 데이터베이스 클라이언트이기 때문이다. 따라서 웹 응용 프로그램 개발자들은 커서의 사용을 피하고 필요한 기능을 직접 구현해야 한다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 커서 사용하기
  </h3>
  <section>
    <article>
      <p>커서를 사용하려면 몇 가지 단계가 필요하다.</p>
      <ul>
        <li>커서를 사용하려면 먼저 선언(정의)해야 한다. 이 과정은 데이터를 실제로 가져오는 단계는 아니며 사용할 <code>SELECT</code> 문을 정의하고 커서 옵션을 설정하는 단계이다.</li>
        <li>커서 선언이 끝나면 사용을 위해 커서를 열어야 한다. 이 단계에서 <code>SELECT</code> 문을 사용하여 실제로 데이터를 가져오게 된다.</li>
        <li>커서에 데이터가 채워지면 필요에 따라 각 행을 사용할 수 있다.</li>
        <li>커서 사용이 끝나면 닫는 과정이 필요함을 주의하자. 커서가 열리면 필요에 따라 얼마든지 커서에 있는 행을 가져와 활용할 수 있다.</li>
    </article>
  </section>

  <h4 class="sub-header">커서 만들기</h4>
  <section>
    <article>
      <p>커서는 <code>DECLARE</code> 문을 사용해서 만들어진다. 세부적인 내요은 DBMS에 따라 다르지만 <code>DECLARE</code> 문에서는 커서의 이름과 <code>SELECT</code> 문을 지정하며 필요할 경우 <code>WHERE</code> 와 같은 절도 사용된다. 이 과정을 설명하기 위해 전자 메일 주소가 없는 모든 고객을 가져오는 커서를 만들어보자. 응용 프로그램에서 누락된 전자 메일 주소를 확인하려면 이러한 커서가 유용할 것이다.</p>

      <p>DB2, SQL Server, Sybase에서는 다음과 같은 구문으로 커서를 만들 수 있다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        DECLARE CustCursor CURSOR<br>
        FOR<br>
        SELECT * FROM Customers<br>
        WHERE cust_email IS NULL
      </code></pre>

      <p>Oracle과 PostgreSQL 에서는 다음과 같은 구문이 사용된다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        DECLARE CURSOR CustCursor<br>
        IS<br>
        SELECT * FROM Customers<br>
        WHERE cust_email IS NULL
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>양쪽 버전 모두 커서를 정의하고 이름을 지정하는 데 <code>DECLARE</code> 문이 사용되었다. 커서의 이름은 <code>CustCursor</code> 로 지정하였으며, 전자 메일 주소가 <code>NULL</code>인 고객, 즉 전자 메일 주소가 입력되지 않은 모든 고객을 가져오는 <code>SELECT</code> 문이 정의 되었다.</p>

      <p>이제 커서가 정의되었으므로 다음은 커서를 열 단계이다.</p>
    </article>
  </section>

  <h4 class="sub-header">커서 사용</h4>
  <section>
    <article>
      <p>커서를 열 때는 <code>OPEN CURSOR</code> 문을 사용한다. 이 문은 아주 간단하며 대부분의 DBMS 에서 구문이 동일하다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        OPEN CURSOR CustCursor
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p><code>OPEN CURSOR</code> 문이 처리되면 쿼리가 실행되고 가져온 데이터가 저장되어 탐색 및 스크롤 가능한 상태가 된다.</p>
      <p>이제 <code>FETCH</code> 문을 사용하여 커서 데이터에 액세스할 준비가 되었다. <code>FETCH</code>는 가져올 행을 지정하며, 어디서 가져와 어디에 저장할 지(변수 이름 등) 지정하게 된다. 먼저 Oracle에서 커서의 한 행(첫 번째 행)을 가져오는 예를 살펴보자</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        DECLARE TYPE CustCursor IS REF CURSOR RETURN CustCursor%ROWTYPE;<br>
        DECLARE CustRecord Customers%ROWTYPE<br>
        BEGIN<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OPEN CustCursor;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FETCH CustCursor INTO CustRecord;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLOSE CustCursor;<br>
        END;
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예에서 <code>FETCH</code> 문은 현재 행을 가져오는 데 사용되었다. 위치를 지정하지 않으면 기본적으로 첫 번째 행에서 시작하므로 첫 번째 행을 가져오게 된다. 가져온 행은 <code>CustCursor</code>라는 이름의 변수에 저장하였으며 가져온 데이터로 별도의 작업은 하지 않았다.</p>

      <p>다음 예 역시 Oracle의 구문을 사용한 것으로, 가져온 데이터의 첫 번째부터 마지막 행까지 반복하는 코드이다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        DECLARE TYPE CustCursor IS REF CURSOR RETURN Customers%ROWTYPE;<br>
        DECLARE CustRecord Customers%ROWTYPE<br>
        BEGIN<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OPEN CustCursor;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOOP<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FETCH CustCursor INTO CustRecord;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EXIT WHEN CustCursor%NOTFOUND;<br>
        ...<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;END LOOP;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLOSE CustCursor;<br>
        END;
      </code></pre> 
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>앞서 예에서 살펴본 예와 마찬가지로 이 예에서도 <code>FETCH</code>를 사용하여 현재 행을 가져와 <code>CustRecord</code>라는 변수에 저장하였다. 하지만 이번에는 <code>FETCH</code> 문이 <code>LOOP</code> 내에 사용되었으므로 반복되어 실행된다. 이 루프는 <code>EXIT WHEN CustCursor%NOTFOUND</code>에 지정된 조건에 의해 종료되며 이는 더 이상 가져올 행이 없을 때 종료하라는 의미이다. 이 예에서도 가져온 데이터로 무언가를 하지는 않았으나 실제 여러분이 작성하게 될 응용 프로그램에서는 가져온 행을 유용하게 사용하게 될 것이다. 즉 <code>...</code> 부분에 필요한 여러분의 코드를 넣으면 된다.</p>

      <p>다른 예를 보자. 이번에는 Microsoft SQL Server의 구문을 사용한다.</p>
      <pre><code>
          DECLARE @cust_id CAHR(10),<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@cust_name CHAR(50),<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@cust_address CHAR(50),<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@cust_city CHAR(50),<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@cust_state CHAR(5),<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@cust_zip CHAR(10),<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@cust_country CHAR(50),<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@cust_contact CHAR(50),<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@cust_email CHAR(255),<br>
          OPEN CustCursor<br>
          FETCH NEXT FROM CustCursor<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INTO @cust_id, @cust_name, @cust_address,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@cust_city, @cust_state, @cust_zip,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@cust_country, @cust_contact, @cust_email<br>
          WHILE @@FETCH_STATUS = 0<br>
          BEGIN<br>
          ...<br>
          FETCH NEXT FROM CustCursor<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INTO @cust_id, @cust_name, @cust_address,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@cust_city, @cust_state, @cust_zip,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@cust_country, @cust_contact, @cust_email<br>
          END<br>
          CLOSE CustCursor
        </code></pre> 
        <h4><span class="badge badge-pill badge-info">분 석</span></h4>
        <p>이 예에서는 가져온 각 열에 대한 변수를 선언하고 <code>FETCH</code> 문을 사용하여 행을 가져온 다음 그 값을 선언한 변수에 할당하였다. 행 내를 반복하는 데는 <code>WHILE</code> 루프가 사용되었으며 루프 종료 조건은 <code>WHILE @@FETCH_STATUS = 0</code> 부분에서 지정되었다. 이 역시 마찬가지로 더 이상 가져올 행이 없을 때까지 반복이 진행된다. 이 예에서도 실제 데이터 처리는 수행하지 않았으므로 <code>...</code> 부분에 데이터를 조작하는 코드를 넣으면 된다.</p>
    </article>
  </section>

  <h4 class="sub-header">커서 닫기</h4>
  <section>
    <article>
      <p>이미 설명했듯이 사용이 끝나면 커서를 닫아야 하며, 일부 DBMS에서는 직접 핼당을 해제해야 하는 경우도 있다. DB2, Oracle, PostgreSQL에서의 구문을 살펴보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CLOSE CustCursor
      </code></pre>

      <p>Microsoft SQL Server에서는 다음과 같은 구문을 사용해야 한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CLOSE CustCursor<br>
        DEALLOCATE CURSOR CustCursor
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>커서를 닫는 데는 <code>CLOSE</code> 문을 사용한다. 커서를 닫은 후에는 다시 열기 전까지 사용할 수 없지만 그렇다고 다시 선언까지할 필요는 없다. <code>OPEN</code>으로 다시 열기만 하면 된다.</p>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>이 단원에서는 커서란 무엇이며 왜 사용되는지 살펴보았다. 여러분이 사용하는 DBMS에 따라 이와 관련된 많은 기능이 제공될 것이며 여기서 소개하지 않은 기능도 많을 것이므로 DBMS 설명서를 통해 세부적인 내용을 살펴보기 바란다.</p>
    </article>
  </section>
</div>