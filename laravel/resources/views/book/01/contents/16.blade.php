<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 SQL INSERT 문을 사용하여 테이블에 데이터를 삽입하는 방법에 대해 알아보자.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 데이터 삽입에대한 이해
  </h3>
  <section>
    <article>
      <p>SELECT 는 의심할 여지없이 가장 자주 사용되는 SQL 문이며, 지금까지의 14개 단원에서 SELECT 에 대해 설명한 이유도 바로 그것 때문이다. 하지만 이외에도 자주 사용되는 SQL문이 있으며 이러한 문에 대해서도 잘 알아두어야 한다. 그 중 첫 번째 문은 INSERT로, 이 단원과 다음 단원에 걸처 알아볼 것이다.</p>
      <p>이름이 말해 주듯이 INSERT는 데이터베이스 테이블에 행을 삽입(추가)하는 데 사용된다. INSERT가 사용되는 용도는 몇 가지가 있다.</p>
      <ul>
        <li>하나의 완전한 행을 삽입</li>
        <li>하나의 부분적인 행을 삽입</li>
        <li>쿼리 결과를 삽입</li>
      </ul>
      <p>각각에 대해 알아보자.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span>INSERT와 시스템 보안</h4>
        <p>INSERT 문을 사용하려면 클라이언트-서버 FBMS에서 특별한 보안 권한이 있어야 한다. INSERT 문을 실행하기 전에 적절한 권한을 가지고 있는지 확인해보기 바란다.</p>
      </div>      
    </article>
  </section>

  <h4 class="sub-header">완전한 행 삽입</h4>
  <section>
    <article>
      <p>테이블에 데이터를 삽입하는 가장 간단한 방법은 기본적인 INSERT 구문을 사용하는 것으로, 테이블 이름과 함께 여기에 삽입할 새 행의 값을 입력하면 된다.<br>예를 들어보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        INSERT INTO Customers<br>
        VALUES('1000000006',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'Toy Land',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'123 Any Street',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'New York',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'NY',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'11111',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'USA',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NULL,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NULL);
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예에서는 Customers 테이블에 새 고객 정보를 삽입한다. 각 테이블 열에 저장될 값은 VALUES 절에 지정되어 있으며 모든 열의 값을 지정해야 한다. 모든 열의 값을 지정해야 한다. 이 예에서와 같이 cust_contact나 cust_email 처럼 넣을 값이 없는 행에는 NULL 값을 사용해야 한다(물론 이렇게 하려면 NULL 값이 허용되도록 테이블이 구성되어 있어야 한다). 열은 테이블 정의에 지정된 순서대로 채워진다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> INTO 키워드</h4>
        <p>일부 SQL 구현에서는 INSERT 뒤의 INTO 키워드가 선택 사항이므로 생략해도 되지만, 필요하지 않더라도 넣어주는 습관을 가지는 것이 좋다. 이렇게 해야 여러 DBMS 에서 호환 가능한 SQL 코드를 만들 수 있기 때문이다.</p>
      </div>
      <p>구문은 아주 간단하지만 안전하지 않고 여러 대가를 치러야 한다. 일단 테이블에 정의된 행의 순서를 그대로 지켜야 한다는 점이 문제이며, 이 순서 정보를 정확히 판단하기 힘들다는 점도 문제이다. 순서를 잘 알고 정확히 지켰다고 해도 나중에 테이블이 다시 구성되면 이 순서가 그대로 남아있을지도 의문이다. 따라서 특정한 열 순서에 의존하는 SQL 문을 작성하는 것은 안전하지 못하며 언젠가는 오류가 발생할 위험이 크다.</p>
      <p>약간은 귀찮지만 보다 안전한 방법은 다음과 같은 방식으로 INSERT 문을 작성하는 것이다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        INSERT INTO Customers(cust_id,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_name,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_address,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_city,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_state,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_zip,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_country,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_cuntact,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_email)<br>
        VALUES('1000000006',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'Toy Land',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'123 Any Street',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'New York',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'NY',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'USA',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NULL,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NULL);
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예의 실행 결과는 앞서 살펴본 INSERT 문과 정확히 동일하지만, 이번에는 테이블 이름 뒤에 괄호를 넣고 열 이름을 명확하게 지정해 주었다. 이 행이 DBMS에 삽입될 때는 여기에 지정된 열 목록에 따라 적절해 VALUES 목록의 값이 삽입된다. VALUES 절의 첫 번째 값은 첫 번째 지정된 열 이름에 대응되고, 두 번째 값은 두 번째 지정된 열 이름에 대응되는 식으로 열 이름과 값이 짝지어 삽입되는 것이다.</p>
      <p>열 이름이 지정되었으므로 VALUES에 지정된 값은 해당하는 열 이름에 맞게 테이블에 삽입되며, 실제로 테이블의 열 순서가 어떻게 구성되었는지에 영향을 받지 않는다. 이렇게 하면 테이블의 열 순서가 변경되더라도 INSERT 문을 그대로 사용할 수 있다는 장점이 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 항상 열 목록을 사용하자.</h4>
        <p>열 목록을 지정하지 않은 채로 INSERT 문을 사용해서는 안 된다. 테이블의 현재 구성을 믿고 그냥 값만을 지정할 경우 나중에 문제가 생길 가능성이 크다.</p>
        <h4><span class="badge badge-secondary">주의</span> VALUES를 주의하여 사용하자.</h4>
        <p>사용하는 INSERT 문의 구문에 관계 없이 VALUES 내의 값 개수는 항상 정확해야 한다. 열 이름이 없을 경우 값은 테이블의 모든 열에 맞게 사용되어야 하며 열 이름을 지정할 경우에는 지정한 열 개수만큼 값을 지정해야 한다. 이러한 조건이 충족되지 않으면 오류 메시지가 표시되고 삽입이 실행되지 않는다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">부분 행 삽입</h4>
  <section>
    <article>
      <p>앞서 설명했듯이 INSERT 문을 사용하는 권장되는 방법은 테이블 열 이름을 정확하게 지정해준ㄴ 것이다. 이 방법을 사용하면 일부 열에 값을 지정하지 않을 수도 있다. 즉 일부 열에만 값을 지정하고 나머지 열에는 값을 지정하지 않아도 된다.<br>다음 예를 보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        INSERT INTO Customers(cust_id,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_name,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_address,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_city,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_state,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_zip,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_country)<br>
        VALUES('1000000006',<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'Toy Land',<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'123 Any Street',<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'New York',<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'NY',<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'11111',<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'USA');
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예를 보면 cust_contact 와 cust_email은 열 목록에 넣지 않았고 값도 지정하지 않았다. 따라서 이 INSERT 문은 값을 넣을 때 이 두 값을 제외한 채로 넣게 된다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> 열의 생략</h4>
        <p>테이블 정의에서 혀용되는 경우엠ㄴ 일부 열을 생략할 수 있다. 이를 위해서는 다음과 같은 조건 중 하나 이상이 맞아야 한다.</p>
        <ul>
          <li>테이블이 NULL값을 허용하도록 정의되어야 한다. 즉 값이 없는 열이 있어도 되도록 구성되어 있어야 한다.</li>
          <li>테이블 정의에 기본값이 정의되어 있어야 한다. 즉 값을 지정하지 않으면 대신 사용될 기본값이 있어야 한다.</li>
        </ul>
        <p>NULL을 사용할 수 없고 기본값도 없는 테이블에 대해 INSERT 문을 실행하면서 일부 열을 생략하면 DBMS는 값이 필요한 열에 값이 지정되지 않았음을 인식하고 오류 메시지를 표시하며 삽입이 이루어지지 않는다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">가져온 데이터 삽입</h4>
  <section>
    <article>
      <p>INSERT는 대개 지정된 값을 사용하여 테이블에 행을 추가할 때 쓰이지만 SELECT 문의 결과를 데이터에 삽입하는 것도 가능하며 이 때는 구문이 약간 다르다. 이를 <code>INSERT SELECT</code>라고 하며 이름이 말해 주듯이 INSERT 문과 SELECT 문이 결합된 형태이다.</p>
      <p>다른 테이블에 있는 고객 목록을 가져와서 Customers 테이블에 추가하고 싶을 경우, 한 번에 하나씩 가져와서 추가해도 되겠지만 다음과 같은 구문을 사용하면 간단하게 할 수 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> 다음 예를 실행하려면 준비단계가 필요하다.</h4>
        <p>다음 예는 CustNew라는 테이블에서 데이터를 가져와서 Customers 테이블에 삽입한다. 따라서 이 예를 실행하려면 CustNew라는 테이블을 만들고 데이터를 채워 넣어야 한다. CustNew의 테이블 구조는 Customers 테이블의 구조와 동일하다. CustNew 테이블에 데이터를 채워 넣을 때는 cust_id 값이 Customers 에서 이미 사용하고 있는 것과 중복되지 않도록 주의해야 한다. 이 값이 기본키이기 때문에 중복되면 다음 INSERT 문을 실행할 때 오류가 발생한다.</p>
      </div>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        INSERT INTO Customers(cust_id,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_contact,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_email,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_name,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_address,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_city,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_state,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_zip,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_country)<br>
        SELECT cust_id,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_contact,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_email,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_name,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_address,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_city,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_state,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_zip,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cust_country<br>
        FROM CustNew;
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예 INSERT SELECT 문을 사용하여 CustNew 테이블의 데이터를 Customers 테이블에 삽입한다. 이렇게 삽입문을 사용하면 삽입할 값을 VALUES 를 사용하여 일일이 지정할 필요없이 CustNew 테이블의 데이터를 가져와 삽입할 수 있다. SELECT 내의 각 열은 앞서 지정된 열 목록과 대응되어야 한다. 이 문을 실행하면 CustNew 테이블에 있는 모든 데이터가 Customers 테이블에 삽입된다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> INSERT SELECT 내의 열 이름</h4>
        <p>이 예에서는 단순한 표현을 위해 INSERT 와 SELECT 문에서 같은 열 이름을 사용하고 있지만 반드시 이렇게 이름을 맞출 필요는 없다. 사실 DBMS 는 SELECT 문에서 반환되는 열 이름에 신경 쓰지 않으며 반환되는 순서만 중요시한다. 따라서 SELECT 에서 반환되는 첫 번째 열(이름에 관계없이)이 INSERT 문의 첫 번째 열을 채우는 데 사용된다.</p>
      </div>
      <p>INSERT SELECT 내에 사용되는 SELECT 문에 WHERE 절을 넣으면 삽입할 데이터를 필터링할 수 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 여러 행 삽입</h4>
        <p>INSERT 는 대개 하나의 행만 삽입하는 데 사용되므로 여러 행을 삽입하려면 INSERT 문을 여러 번 사용해야 한다. 하지만 INSERT SELECT 는 예외로, 하나의 문으로 여러 행을 삽입할 수 있다. 즉 SELECT 문에서 반환하는 결과가 여러 행일 경우 그대로 INSERT를 통해 삽입된다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 한 테이블에서 다른 테이블로 복사
  </h3>
  <section>
    <article>
      <p>INSERT 문을 사용하지 않는 방식의 데이터 삽입 작업도 있다. 한 테이블의 내용을 새로운 다른 테이블(즉석에서 만들어지는)에 삽입하려면 SELECT INTO문을 사용한다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> DB2에서는 지원되지 않는다.</h4>
        <p>DB2는 SELECT INTO 문을 지원하지 않는다.</p>
      </div>
      <p>INSERT SELECT 는 기존 테이블에 데이터를 추가하지만 SELECT INTO 는 데이터를 새 테이블에 복사해 넣는다. DBMS 의 특성에 따라 다르지만 테이블이 이미 있을 경우 덮어쓰는 경우도 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> INSERT SELECT 와 SELECT INTO</h4>
        <p>SELECT INTO와 INSERT SELECT의 차이점은, SELECT INTO 는 데이터를 내보내고, INSERT SELECT 는 데이터를 가져온다는 점에 있다고 이해하면 쉬울 것이다.</p>
      </div>
      <p>SELECT INTO의 사용 예를 보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT *<br>
        INTO CustCopy<br>
        FROM Customers;
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 SELECT 문은 CustCopy라는 새 테이블을 만들고 Customers테이블의 모든 내용을 복사하여 이 테이블에 삽입한다. SELECT * 라고 지정되었으므로 Customers 테이블의 모든 열이 CustCopy 테이블에 만들어지고 복사될 것이다. 열 중에서 일부만 복사하려면 와일드카드문자인 * 를 빼고 열 이름을 직접 지정하면 된다.</p>
      <p>MySQL과 Oracle에서는 구문이 약간 다르다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREAT TABLE CustCopy AS<br>
        SELECT *<br>
        FROM Customers;
      </code></pre>
      <p>SELECT INTO 를 사용할 때 고려해야 할 점이 있다.</p>
      <ul>
        <li>WHERE 이나 GROUP BY 등과 같은 모든 SELECT 옵션을 선택할 수 있다.</li>
        <li>여러 테이블에서 데아터를 가져와 삽입하려면 조인을 사용해도 된다.</li>
        <li>데이터를 가져오는 테이블의 개수에 관계없이 가져온 모둔 데이터는 하나의 테이블에 삽입된다.</li>
      </ul>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 테이블의 복사본 만들기</h4>
        <p>SELECT INTO는 테이블의 복사본을 만드는 아주 훌륭한 방법이다. 새로운 SQL 문을 시험할 대상이 필요하다면 SELECT INTO 문으로 기존 테이블의 복사본을 만들어 시험 대상으로 사용하면 좋을 것이다. 실제 데이터를 대상으로 하기에 위험할 수 있는 SQL 문이 있다면 테이블 복사본을 만들어 사용하는 것이 안전한 방법이다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>이 단원에서는 INSERT 문을 사용하여 데이터베이스 테이블에 행을 추가하는 방법을 배웠다. INSERT를 사용하는 여러 가지 방법, 열을 직접 지정하는 방식이 좋은 이유, INSERT SELECT 를 사용하여 다른 테이블에서 행을 가져오는 방법, SELECT INTO 를 사용하여 새 테이블에 행을 내보내는 방법을 살펴보았다. 다음 단원에서는 UPDATE와 DELETE를 사용하여 테이블 데이터를 제어하는 방법을 알아보도록 하자.</p>
    </article>
  </section>
</div>