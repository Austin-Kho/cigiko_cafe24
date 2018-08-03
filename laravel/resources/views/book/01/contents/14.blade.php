<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 몇 가지 추가 조인에 대해 알아보자. 어떤 것이 있으며 어떻게 사용하는지 살펴보고 조인된 테이블에서 테이블 별칭과 집계 함수를 사용하는 방법에 대해 배울 것이다.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 테이블 별칭 사용
  </h3>
  <section>
    <article>
      <p>7장에서 계산 필드에 대해 설명하면서, 가져온 테이블 열을 참조하는 데 별칭을 사용하는 법을 배웠다. 열의 별칭을 참조하는 법은 다음과 같다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT RTRIM(vend_name) + ' (' + RTRIM(vend_country) + ')' AS vend_title<br>
        FROM Vendors<br>
        ORDER BY vend_name;
      </code></pre>

      <p>열 이름과 계산 필드에만 별칭을 사용할 수 있는 것이 아니며, 테이블 이름에도 별칭을 사용할 수 있다. 이렇게 하는 이유는 다음과 같다.</p>
      <ul>
        <li>SQL 문을 짧게 만들기 위해</li>
        <li>하나의 SELECT 문 내에 테이블을 여러 번 사용하기 위해</li>
      </ul>
      <p>다음 SELECT 문을 살펴보자. 전 단원에서 살펴본 예와 동일한 것이지만 이번에는 별칭ㅇ루 사용하도록 수정하였다.</p>
      <h4><span class="badge badge-pill badge-success">입 력</span></h4>
      <pre><code>
        SELECT cust_name, cust_contact<br>
        FROM Customers AS C, Orders AS O, OrderItems AS OI<br>
        WHERE C.cust_id = O.cust_id<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AND OI.order_num = O.order_num<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AND prod_id = 'RGAN01';
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>FROM 절의 세 테이블 모두 별칭이 사용되었다. Customers AS C는 Customers 테이블의 별칭을 C로 지정하는 것이며 나머지도 같은 방식으로 O와 OI이라는 별칭이 지정되었다. 이렇게 하면 테이블 이름을 Customers 와 같이 모두 입력하지 않고 간단히 C로 입력할 수 있다. 이 예에서는 WHERE 절에서만 테이블 별칭이 사용되었으나 별칭은 이 밖에도 SELECT 목록, ORDER 절 등 다른 문에서도 사용할 수 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> Oracle 에서는 AS 를 사용할 수 없다.</h4>
        <p>Oracle 은 AS 키워드를 지원하지 않는다. Oracle에서 별칭을 사용하려면 AS 없이 Customers C와 같은 방식으로 지정하면 된다.</p>
      </div>
      <p>테이블 별칭은 쿼리 실행 시에만 사용된다. 열 별칭과 달리 테이블 별칭은 클라이언트로 반환되지 않는다.</p>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 다른 조인 사용하기
  </h3>
  <section>
    <article>
      <p>지금까지는 내부 조인이나 동등 조인과 같은 간단한 조인만 사용했으므로 이제 자체 조인, 자연 조인, 외부 조인이라는 세 가지 추가적인 조인의 종류에 대해 알아보자.</p>
    </article>
  </section>

  <h4 class="sub-header">자체 조인</h4>
  <section>
    <article>
      <p>전에 설명했듯이 테이블 별칭을 사용하는 주된 목적은 SELECT 문 내에서 같은 테이블을 여러 번 참조하기 위해서이다. 예를 들어보자.</p>

      <p>Jim Jones라는 사람이 일하는 회사의 모든 고객 담당자에게 메일을 보내고 싶다고 가정해보자. 이렇게 하려면 먼저 Jim Jones가 어떤 회사에서 일하는지 알아낸 다음, 이 회사의 모든 고객 담당자를 찾아야 한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_id, cust_name, cust_contact<br>
        FROM Customers<br>
        WHERE cust_name = (SELECT cust_name<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FROM Customers<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE cust_contact = 'Jim Jones');
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_id</th><th>cust_name</th><th>cust_contact</th></tr>
          </thead>
          @php
            $data = DB::table('Customers')
                      ->select('cust_id', 'cust_name', 'cust_contact')
                      ->whereRaw("cust_name = (SELECT cust_name
                                  FROM Customers
                                  WHERE cust_contact = 'Jim Jones')")->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_id}}</td><td>{{$lt->cust_name}}</td><td>{{$lt->cust_contact}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 방식에서는 하위 쿼리를 사용했다. 안쪽의 SELECT 문에서는 Jim Jones가 일하는 회사의 cust_name을 반환하고, 이 이름이 바깥쪽 쿼리의 WHERE 절에 사용되어 이 회사의 모든 고객 담당자를 선택하였다.</p>
      <p>이번에는 같은 쿼리를 조인을 사용하여 실행해보자.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT c1.cust_id, c1.cust_name, c1.cust_contact<br>
        FROM Customers AS c1, Customers AS c2<br>
        WHERE c1.cust_name = c2.cust_name<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AND c2.cust_contact = 'Jim Jones';
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_id</th><th>cust_name</th><th>cust_contact</th></tr>
          </thead>
          @php
            $data = DB::table(DB::raw('Customers AS c1'))
                  ->join(DB::raw('Customers AS c2'), 'c1.cust_name', '=', 'c2.cust_name')
                  ->select('c1.cust_id', 'c1.cust_name', 'c1.cust_contact')
                  ->where('c2.cust_contact', 'Jim Jones')
                  ->get();                      
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_id}}</td><td>{{$lt->cust_name}}</td><td>{{$lt->cust_contact}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> Oracle에서는 AS를 사용할 수 없다.</h4><p>Oracle에서는 AS 키워드를 빼야 한다.</p>
      </div>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 쿼리에서 필요로 하는 두 테이블은 같은 것이므로 Customers 테이블이 FROM 절에서 두 번 사용되고 있다. 이렇게 해도 구문상 문제는 없지만 Customers 테이블을 참조할 때 혼동될 수 있다.</p>
      <p>이 문제를 해결하기 위해 테이블 별칭이 사용되었다. 첫 번째 등장하는 Customers 에는 c1이라는 별칭을, 두 번째에는 c2라는 별칭을 붙인 것이다. 이제 이 별칭을 테이블 이름으로 사용할 수 있으므로 SELECT 문에서 각 열이 어떤 테이블에 속한 것인지 명확하게 지정하기 위해 c1을 접두어로 붙이는 것이 가능하다. 이렇게 하지 않으면 cust_id, cust_name, cust_contact라는 열이 각각 두 개이므로 어떤 것을 참조해야 하는지(실제로는 같은 열이긴 하지만) 알 수 없어 오류가 발생하게 된다. WHERE 절은 먼저 테이블을 조인한 다음 두 번째 테이블의 cust_contact로 데이터를 필터링하여 원하는 데이터를 반환하게 된다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 하위 조인 대신 자체 조인</h4>
        <p>자체 조인은 같은 테이블을 외부 문으로 사용하여 데이터를 얻어내는 하위 쿼리 대신 사용되는 경우가 많다. 결과는 같지만 많은 DBMS 에서 이러한 조인을 하위 쿼리보다 빨리 처리하므로 여러분도 직접 실행해보기 바란다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">자연 조인</h4>
  <section>
    <article>
      <p>테이블을 조인하면 최소한 하나 이상의 열(조인되는 열)이 하나 이상의 테이블에서 나타나게 된다. 전 단원에서 설명한 내부 조인과 같은 표준 조인은 같은 열이 여러 번 등장하더라도 모든 데이터를 반환하지만, 자연 조인은 이러한 중복 항목을 제거하고 같은 열일 경우 한 번만 반환한다.</p>

      <p>어떻게 이런 결과가 가능할까? 사실 조인이 하는 것이 아니라 여러분이 하는 것이다. 자연 조인은 고유한 열만 선택하는 조인이며 한 테이블에서만 와일드카드(SELECT *)를 사용하고 나머지 다른 테이블에 있는 모든 열은 각각 테이블을 명확하게 지정해 줌으로써 열을 중복되지 않게 한 번만 선택하는 원리이다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT C.*, O.order_num, O.order_date, OI.prod_id, OI.quantity, OI.item_price<br>
        FROM Customers AS C, Orders AS O, OrderItems AS OI<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AND OI.order_num = O.order_num<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AND prod_id = 'RGAN01';
      </code></pre>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> Oracle에서는 AS를 사용할 수 없다.</h4><p>Oracle에서는 AS 키워드를 빼야 한다.</p>
      </div>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예에서 와일드카드는 첫 번째 테이블에서만 사용되었고, 나머지 열은 테이블이 명확하게 지정되었으므로 중복된 열이 얻어지지 않는다.</p>
      <p>사실 여러분이 지금까지 만든 내부 조인은 모두 자연 조인이며 자연 조인이 아닌 내부 조인은 필요한 경우가 없을 것이다.</p>
    </article>
  </section>

  <h4 class="sub-header">외부 조인</h4>
  <section>
    <article>
      <p>대부분의 조인은 한 테이블의 행을 다른 테이블의 행과 연결하는 방식으로 이루어지지만 관련된 행이 없는 경우도 있다. 예를 들어 다음과 같은 작업을 위해 조인을 하는 경우를 생각해보자.</p>
      <ul>
        <li>아직 주문을 하지 않은 고객을 포함해서 각 고객의 주문 수를 세는 경우</li>
        <li>아무도 주문하지 않은 경우를 포함해서 모든 제품의 주문량을 나열하는 경우</li>
        <li>아직 주문하지 않은 고객도 고려하여 평균 판매량을 계산하는 경우</li>
      </ul>

      <p>이러한 경우는 조인을 통해 연결되는 테이블에 연결된 행이 없을 수도 있다. 이러한 종류의 조인을 외부 조인이라고 한다.</p>

      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> 구문의 차이</h4>
        <p>외부 조인을 만드는 데 사용되는 구문은 SQL 구현에 따라 조금씩 다르다. 여기서 설명하는 구문을 대부분의 SQL 구현에서 사용할 수 있기는 하지만 확실히 해두려면 여러분이 사용하는 DBMS 설명서를 읽어보기 바란다.</p>
      </div>

      <p>다음 SELECT 문은 간단한 내부 조인으로, 모든 고객과 이 고객의 주문 목록을 반환한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT Customers.cust_id, Orders.order_num<br>
        FROM Customers INNER JOIN Orders<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ON Customers.cust_id = Orders.cust_id;
      </code></pre>

      <p>외부 조인도 비슷하다. 아직 주문을 하지 않은 사람을 포함하여 모든 고객 목록을 얻으려면 다음과 같이 하면 된다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT Customers.cust_id, Orders.order_num<br>
        FROM Customers LEFT OUTER JOIN Orders<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ON Customers.cust_id = Orders.cust_id;
      </code></pre>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_id</th><th>order_num</th></tr>
          </thead>
          @php
            $data = DB::table('Customers')
                      ->leftJoin('Orders', 'Customers.cust_id', '=', 'Orders.cust_id')
                      ->select('Customers.cust_id', 'Orders.order_num')
                      ->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_id}}</td><td>{{$lt->order_num}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>지난 단원에서 설명한 내부 조인과 마찬가지로 이 SELECT 문은 WHERE 절의 조건을 지정하는 것이 아니라 OUTER JOIN이라는 키워드를 사용하여 조인의 종류를 지정하였으나 내부 조인과는 행이 연결되는 방식이 다르다. 외부 조인은 관련된 행이 없는 행도 포함하기 때문이다. OUTER JOIN 을 사용할 때는 RIGHT 또는 LEFT 를 사용하여 모든 행을 포함할 테이블이 어떤 것인지 지정해 주어야 하는데, RIGHT 로 지정하면 조인되는 두 테이블 중 오른쪽 테이블의 모든 행이, LEFT 로 지정하면 왼쪽 테이블의 몯ㄴ 행이 연결 여부에 관계없이 모두 반환된다. 즉, 주문 여부에 관계없이 모든 고객이 반환된다.</p>

      <p>이 코드에서는 LEFT OUTER JOIN 을 사용하였으므로 FROM 절의 왼쪽에 있는 Customers 테이블의 모든 행이 결과에 반환된다. 오른쪽 테이블의 모든 행을 반환하려면 다음 예와 같이 RIGHT OUTER JOIN 을 사용하면 된다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT Customers.cust_id, Orders.order_num<br>
        FROM Customers RIGHT OUTER JOIN Orders<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ON Orders.cust_id = Customers.cust_id;
      </code></pre>

      <p>SQL Server의 경우는 외부 조인을 보다 간단한 형식으로 지정할 수도 있다. 아직 주문을 하지 않은 고객을 포함하여 모든 고객을 반환하려면 다음과 같이 하면 된다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT Customers.cust_id, Orders.order_num<br>
        FROM Customers, Orders<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE Customers.cust_id *= Orders.cust_id;
      </code></pre>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_id</th><th>order_num</th></tr>
          </thead>
          @php
            $data = DB::table('Customers')
                      ->leftJoin('Orders', 'Customers.cust_id', '=', 'Orders.cust_id')
                      ->select('Customers.cust_id', 'Orders.order_num')
                      ->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_id}}</td><td>{{$lt->order_num}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 경우 조인 조건은 WHERE 절에 지정되어 있다. 같음을 테스트하는 연산자인 <code>=</code> 대신 <code>*=</code> 연산자를 사용한 것이 바로 핵심이다. <code>*=</code>연산자는 왼쪽 테이블(Customers)의 모든 행이 포함되어야 함을 지정하는 LEFT OUTER JOIN 연산자이기 때문이다.</p>
      <p>반대로 RIGHT OUTER JOIN 을 하려면 <code>=*</code> 연산자를 사용하면 된다. 이렇게 하면 연산자 우측에 있는 테이블의 모든 행이 결과로 반환된다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT Customers.cust_id, Orders.order_num<br>
        FROM Customers, Orders<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE Customers.cust_id =* Orders.cust_id;
      </code></pre>
      <p>Oracle에서만 사용되는 OUTER JOIN 의 또한 가지 구문 형식도 있다. 다음과 같이 테이블 이름 뒤에 (+) 연산자를 써주는 것이다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT Customers.cust_id, Orders.order_num<br>
        FROM Customers, Orders<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE Customers.cust_id (+) = Orders.cust_id;
      </code></pre>
      
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 외부 조인의 종류</h4>
        <p>사용되는 구문의 종류에 관계 없이, 외부 조인은 항상 두 가지 기본 형식인 LEFT OUTER JOIN 과 RIGHT OUTER JOIN 으로 구분할 수 있다. 두 방식의 차이점은 두 테이블을 연결하는 순서에 있다. 즉 LEFT OUTER JOIN 의 테이블 연결 순서를 오른쪽으로 바꾸면 RIGHT OUTER JOIN 이 된다. 이렇게 두 외부 조인은 서로 바꾸어가며 사용할 수 있으며 어떤 쪽이 더 편리한가를 판단해서 사용하면 된다.</p>
      </div>
      <p>외부 조인의 또 한가지 종류로 FULL OUTER JOIN 이 있다. 이는 두 테이블의 연결 관계에 관계 없이 양쪽 테이블의 모든 행을 반환하는 것으로, 한쪽 테이블에서만 모든 행을 반환하는 LEFT 나 RIGHT 외부 조인과는 달리 양쪽 테이블의 모든 행이 결과로 반환된다. 구문은 다음과 같다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT Customers.cust_id, Orders.order_num<br>
        FROM Orders FULL OUTER JOIN Customers<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ON Orders.cust_id = Customers.cust_id;
      </code></pre>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> FULL OUTER JOIN 지원</h4>
        <p>FULL OUTER JOIN 구문은 Access, MySQL, SQL Server, Sybase에서 지원되지 않는다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 집계 함수와 함께 조인을 사용
  </h3>
  <section>
    <article>
      <p>9장에서 살펴본 집계 함수는 한 테이블의 데이터만 대상으로 했지만 조인과 함께 사용하면 여러 테이블의 데이터를 집계하는 것이 가능하다.</p>
      <p>설명을 위해 예를 들어보자. 모든 고객의 목록과 각 고객이 주문한 수량을 얻고 싶다면 다음과 같이 COUNT() 함수를 사용하면 된다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT Customers.cust_id, COUNT(Orders.order_num) AS num_ord<br>
        FROM Customers INNER JOIN Orders<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ON Customers.cust_id = Orders.cust_id<br>
        GROUP BY Customers.cust_id;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_id</th><th>num_ord</th></tr>
          </thead>
          @php
            $data = DB::table('Customers')
                      ->join('Orders', 'Customers.cust_id', '=', 'Orders.cust_id')
                      ->select('Customers.cust_id', DB::raw('COUNT(Orders.order_num) AS num_ord'))
                      ->groupBy('Customers.cust_id')->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_id}}</td><td>{{$lt->num_ord}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 SELECT 문에서는 INNER JOIN을 사용하여 Customers와 Orders 테이블을 연결하고 있다. GROUP BY 절에서 데이터를 고객별로 묶기 때문에 COUNT(Orders.order_num) 함수는 각 고객이 주문량울 num_ord로 반환하게 된다.</p>
      <p>다른 조인의 경우도 손쉽게 집계 함수를 사용할 수 있다. 다음 예를 보자.</p>
      
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT Customers.cust_id, COUNT(Orders.order_num) AS num_ord<br>
        FROM Customers LEFT OUTER JOIN Orders<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ON Customers.cust_id = Orders.cust_id<br>
        GROUP BY Customers.cust_id;
      </code></pre>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> Oracle에서는 AS를 사용할 수 없다.</h4><p>다시 강조하지만 Oracle에서는 AS를 사용할 수 없으므로 빼야 한다.</p>
      </div>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_id</th><th>num_ord</th></tr>
          </thead>
          @php
            $data = DB::table('Customers')
                      ->leftJoin('Orders', 'Customers.cust_id', '=', 'Orders.cust_id')
                      ->select('Customers.cust_id', DB::raw('COUNT(Orders.order_num) AS num_ord'))
                      ->groupBy('Customers.cust_id')->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_id}}</td><td>{{$lt->num_ord}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>

      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예에서는 LEFT OUTER JOIN을 사용하여 아직 주문을 하지 않ㄹ은 사람을 포함하는 모든 고객의 주문량을 계산하였다. 그 결과로 주문량이 0인 1000000002번 고객도 반환되었음을 알 수 있다.</p>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> 조인 및 조인 조건의 사용
    </h3>
    <section>
      <article>
        <p>조인에 대해 설명한 두 단원을 마무리 하기 전에, 조인과 그 사용에 대한 핵심을 정리하고 넘어가자.</p>
        <ul>
          <li>사용할 조인의 종류를 주의 깊게 결정하자. 내부 조인이 필요한 것 같지만 실제로는 외부 조인이 더 적합한 경우도 많다.</li>
          <li>지원되는 조인 구문을 확인하기 위해 여러분이 사용하는 DBMS 설명서를 반드시 읽자. 이 책에서 설명한 표준적인 구문과는 다른 구문이 사용될 수도 있다.</li>
          <li>구문에 관계없이 올바른 조인 조건을 사용해야만 올바른 데이터를 얻을 수 있다.</li>
          <li>조인 조건을 지정하지 않으면 곱집합이 반환되므로 주의해야 한다.</li>
          <li>조인에 여러 테이블을 포함할 수도 있고 각각 서로 다른 조인을 사용할 수도 있다. 이러한 방식에는 문제가 없으며 때로 유용하지만, 여러 조인을 함께 사용할 경우는 반드시 별도로 테스트 한 다음 결합하는 것이 이후에 문제를 줄일 수 있는 방법이다.</li>
        </ul>
      </article>
    </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>이 단원에서는 전 단원에 이어 조인에 대해 살펴보았다. 별칭을 어떻게 사용하며 왜 사용하는지, 조인의 종류에는 어떤 것이 있으며 사용 구문은 어떤지, 조인과 함께 집계 함수를 사용하는 방법은 무엇인지, 그리고 조인을 사용할 때의 주의점에는 어떤 것이 있는지 정리해 보았다.</p>
    </article>
  </section>
</div>