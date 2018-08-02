<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 하위 쿼리란 무엇이며 어떻게 사용하는지 배워보자.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 하위 쿼리의 이해
  </h3>
  <section>
    <article>
      <p>SELECT 문은 SQL 쿼리이다. 지금까지 설명한 SELECT 문은 하나의 데이터베이스 테이블에서 데이터를 가져오는 하나의 문으로, 아주 간단한 것이었다.</p>
      <blockquote><strong>쿼리</strong>: 모든 SQL 문을 말한다. 대개 이 용어는 SELECT 문을 의미한다.</blockquote>
      <p>SQL 에서는 하위 쿼리라는 것도 만들 수 있다. 하위 쿼리는 다른 쿼리에 포함되는 쿼리를 말한다. 어떤 쓰임이 있을까? 예를 살펴보는 것이 이해하는 데 가장 좋을 것이다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> MySQL 지원</h4>
        <p>MySQL을 사용하는 경우 하위 쿼리는 4.1이상 버전에서만 지원된다는 점을 주의하자. 그 이전 버전의 MySQL에서는 하위 쿼리를 지원하지 않는다.</p>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 하위 쿼리로 필터링 하기
  </h3>
  <section>
    <article>
      <p>이 책의 모든 단원에서 사용하는 데이터베이스 테이블은 관계형 테이블이다(각 테이블에 대한 설명과 관계에 대해서는 부록 A. '샘플 데이터 스크립트'를 참고한다). 주문은 두 테이블에 저장되는데, 하나는 주문 번호, 고객ID, 주문 날짜와 같은 각 주문의 정보를 저장하는 Orders 테이블, 다른 하나는 이와 연결된 OrderItems 테이블로, 각 주문 물품이 저장되어 있다. Orders 테이블에는 고객 정보가 아니라 고객의 ID만 저장되어 있으며, 실제 고객 정보는 Customers 테이블에 저장되어 있다.</p>

      <p>RGAN01 이라는 물품을 주문한 모든 고객의 목록이 필요하다고 가정해보자. 이 정보를 얻으려면 어떻게 해야 할까? 단계는 다음과 같다.</p>
      <ol>
        <li>RGAN01 물품을 포함하는 모든 주문의 주문 번호를 얻는다.</li>
        <li>얻어진 주문 번호를 기반으로 각 주문을 한 고객의 고객ID를 얻는다.</li>
        <li>얻어진 고객 ID를 기반으로 고객의 정보를 얻는다.</li>
      </ol>
      <p>이러한 각 단계를 각각의 쿼리로 실핼할 수도 있다. 즉 SELECT 문에서 반환한 결과를 다른 SELECT 문의 WHERE 절에 넣어 실행하는 방식을 반복하면 된다.</p>
      <p>하지만 하위 쿼리를 사용하면 이러한 세 쿼리를 하나의 문으로 압축할 수 있다.</p>
      <p>첫 번째 SELECT 문은 아주 간결하다. prod_id가 RGAN01인 주문 물품에 대한 order_num을 얻는 과정으로, 결과로 다음과 같이 두 개의 주문 번호를 얻을 수 있다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT order_num<br>
        FROM OrderItems<br>
        WHERE prod_id = 'RGAN01';
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>order_num</th></tr>
          </thead>
          @php
            $data = DB::table('OrderItems')
                      ->select('order_num')
                      ->where('prod_id', 'RGAN01')->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->order_num}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <p>다음 단계는 주문 20007과 20008에 대한 고객 ID를 얻는 것이다. 5장에서 설명한 IN절을 사용해서 다음과 같이 SELECT 문을 만들 수 있다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_id<br>
        FROM Orders<br>
        WHERE order_num IN (20007, 20008);
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_id</th></tr>
          </thead>
          @php
            $data = DB::table('Orders')
                      ->select('cust_id')
                      ->wherein('order_num', [20007, 20008])->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_id}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <p>이제 첫 번째 쿼리(주문 번호를 얻는 쿼리)를 하위 쿼리로 만들어 두 쿼리를 하나로 결합해보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_id<br>
        FROM Orders<br>
        WHERE order_num IN (SELECT order_num<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FROM OrderItems<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE prod_id = 'RGAN01');
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>order_num</th></tr>
          </thead>
          @php
            $data = DB::table('Orders')
                      ->select('cust_id')
                      ->whereRaw("order_num IN (SELECT order_num
                                                FROM OrderItems
                                                WHERE prod_id = 'RGAN01')")
                      ->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_id}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>하위 쿼리는 항상 가장 안쪽에 있는 쿼리부터 바깥쪽 방향의 순서로 처리된다. 따라서 이 SELECT 문을 실행하면 DBMS 는 두 번의 연산을 하게 된다.</p>
      <p>첫 번째는 다음 하위쿼리를 실행하는 것이다.</p>
      <pre><code>SELECT order_num FROM OrderItems WHERE prod_id = 'RGAN01'</code></pre>
      <p>이 쿼리는 주문 번호인 20007과 20008을 반환하며, 이 두 값이 콤마로 구분된 형식으로 외부 쿼리의 WHERE 에 전달된다. 따라서 외부 쿼리는 다음과 같이 구성된다.</p>
      <pre><code>SELECT cust_id FROM Orders WHERE order_num IN (20007, 20008)</code></pre>
      <p>이와 같이 결과에 문제가 없으며 두 쿼리를 별도로 만들었을 때와 동일한 값을 얻을 수 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> SQL 의 서식 지정</h4>
        <p>하위 쿼리가 있는 SELECT 문은 읽고 이해하고, 디버그 하기 어렵다는 단점이 있으며 복잡할 수록 그 정도가 심하다. 따라서 이 예와 같이 쿼리를 여러 줄로 나누고 적절히 문단의 들여쓰기를 사용하여 읽기 쉽도록 만들어 주는 것이 좋은 습관이다.</p>
      </div>
      <p>이제 RGAN01을 주문한 고객의 고객 ID 를 얻어쓰므로 다음 단계는 각 고객에 대한 정보를 얻는 것이다. 이를 위한 SQL문은 다음과 같다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_name, cust_contact<br>
        FROM Costomers<br>
        WHERE cust_id IN ('1000000004', '1000000005');
      </code></pre>
      <p>고객 ID 를 직접 입력하는 대신 전에 만들어둔 SELECT 문을 하위 쿼리로 WHERE 절에 넣어보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_name, cust_contact<br>
        FROM Customers<br>
        WHERE cust_id IN (SELECT cust_id<br>
        FROM Orders<br>
        WHERE order_num IN (SELECT order_num<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FROM OrderItems<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE prod_id = 'RGAN01'));
      </code></pre>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_name</th><th>cust_contact</th></tr>
          </thead>
          @php
            $data = DB::table('Customers')
                      ->select('cust_name', 'cust_contact')
                      ->whereRaw("cust_id IN (SELECT cust_id
                                  FROM Orders
                                  WHERE order_num IN (SELECT order_num
                                                      FROM OrderItems
                                                      WHERE prod_id = 'RGAN01'))")->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_name}}</td><td>{{$lt->cust_contact}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 SELECT 문을 실행하기 위해서 DBMS는 실제로 세 개의 SELECT 문을 계산해야 한다. 가장 안쪽에 있는 하위 쿼리는 주문 번호 목록을 반환하고, 이 결과는 두 번째 쿼리의 WHERE 절에 사용되어 고객의 ID를 반환하며, 그 결과가 가장 바깥쪽에 있는 쿼리의 WHERE 절에 사용되기 때문이다. 원하는 데이터는 가장 바깥쪽에 있는 쿼리, 즉 최상위 커리에 의해 얻어진다.</p>
      <p>이와 같이 WHERE 절에 하위 쿼리를 사용하면 아주 강력하고 유연한 SQL 문을 작성할 수 있다. 중첩할 수 있는 하위 쿼리의 수에는 제한이 없으나, 실제로는 너무 복잡하게 중첩하는 것은 그다지 효율이 좋지 않다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> 하위 쿼리에는 한 열만 사용 가능</h4>
        <p>하위 쿼리의 SELECT 문은 하나의 열만 얻어낼 수 있다. 여러 열을 얻으려 시도하면 오류가 발생한다.</p>
        <h4><span class="badge badge-secondary">주의</span> 하위 쿼리와 성능</h4>
        <p>예로 든 코드는 잘 작동하며 원하는 결과도 무난하게 얻을 수 있다. 그러나 하위 쿼리를 사용하는 것이 항상 효율적인 방식은 아니다. 같은 결과를 다른 방법으로 얻을 수 있는 법을 12장 '테이블 조인'에서 배울 것이다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 하위 쿼리를 계산 필드로 사용
  </h3>
  <section>
    <article>
      <p>하위 쿼리를 사용하는 또 한가지 방법은 계산 필드를 만드는 것이다. Customers 테이블에 있는 모든 고객에 대해 주문의 총 개수를 표시해야 한다고 가정해보자. 각 주문은 해당 고객 ID와 함께 Orders 테이블에 저장되어 있다.</p>
      <p>이를 위해서는 다음 단계가 필요하다.</p>
      <ol>
        <li>Customers 테이블에서 고객 목록을 가져온다.</li>
        <li>가져온 고객을 기준으로 각 고객이 주문한 주문 수를 Orders 테이블에서 센다.</li>
        <p>앞서 두 단원에서 설명했듯이 SELECT COUNT(*)를 사용하면 테이블의 행을 셀 수 있으며 WHERE 절에 고객이 ID 를 넣으면 필터링이 가능할 것이다. 즉 1000000001이라는 고객의 주문을 세려면 다음과 같이 코드를 작성하면 된다.</p>
      </ol>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT COUNT(*) AS orders<br>
        FROM Orders<br>
        WHERE cust_id = '1000000001';
      </code></pre>
      <p>각 고객에 대해 COUNT(*) 계산을 하기 위해 COUNT(*)를 하위 쿼리로 사용해보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_name<br>
        cust_state,<br>
        (SELECT COUNT(*)<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FROM Orders<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE Orders.cust_id = Customers.cust_id) AS orders<br>
        FROM Customers<br>
        ORDER BY cust_name;
      </code></pre>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_name</th><th>cust_state</th><th>orders</th></tr>
          </thead>
          @php
            $data = DB::table('Customers')
                      ->select('cust_name', 'cust_state')
                      ->addSelect(DB::raw('(SELECT COUNT(*)
                                      FROM Orders
                                      WHERE Orders.cust_id = Customers.cust_id) AS orders'))
                      ->orderBy('cust_name')->get()

          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_name}}</td><td>{{$lt->cust_state}}</td><td>{{$lt->orders}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 SELECT 문은 Customers 테이블에 있는 모든 고객에 대해 세 열을 반환한다. 첫 번째 고객의 이름인 cust_name, 두 번째는 고객의 상태를 나타내는 cust_state, 세 번째는 orders이다. orders는 괄호 내에 있는 하위 쿼리에 의해 만들어진 계산 필드로, 이 하위 쿼리는 얻어진 모든 고객에 대해 한 번씩 실행되어 각 고객의 주문 횟수를 반환하게 된다. 이 경우 하위 쿼리는 고객이 5명이므로 5번 실행된다.</p>
      <p>하위 쿼리의 WHERE 절은 지금까지 살펴본 것과 약간 다르다. 열 이름이 완전한 형식으로 지정되었기 때문이다. 이 부분은 Orders 테이블에서 cust_id를 가져와 현재 쿼리가 진행 중인(바깥쪽 쿼리) Customers 테이블의 cust_id와 비교하고, 이 값이 같은 경우를 세기 위한 것이다.</p>
      <pre><code>WHERE Orders.cust_id = Customers.cust_id</code></pre>
      <p>테이블 이름과 열 이름이 마침표로 구분되어 있는데, 이와 같은 형식, 즉 완전한 형식의 이름은 열 이름에 혼동이 생길 우려가 있을 때마다 반드시 사용해 주어야 한다. 예를 들어 이 경우는 cust_id가 하나는 Customers 테이블에 있는것이고, 다른 하나는 Orders 테이블에 있는 것이기 때문에 그 출처를 분명히 밝히지 않으면 문제가 생긴다. 즉, 다음과 같이 작성하면 DBMS 는 Orders 테이블의 cust_id를 그 자체와 비교하는 것으로 간주한다.</p>
      <pre><code>SELECT COUNT(*) FROM Orders WHERE cust_id = cust_id</code></pre>
      <p>이렇게 하면 당연히 Orders 테이블에 있는 모든 주문의 수가 반환될 것이며, 이는 우리가 원하는 결과가 아니다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
          SELECT cust_name<br>
          cust_state,<br>
          (SELECT COUNT(*)<br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FROM Orders<br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE cust_id = cust_id) AS orders<br>
          FROM Customers<br>
          ORDER BY cust_name;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_name</th><th>cust_state</th><th>orders</th></tr>
          </thead>
          @php
            $data = DB::table('Customers')
                      ->select('cust_name', 'cust_state')
                      ->addSelect(DB::raw('(SELECT COUNT(*)
                                            FROM Orders
                                            WHERE cust_id = cust_id) AS orders'))
                      ->orderBy('cust_name')->get()
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_name}}</td><td>{{$lt->cust_state}}</td><td>{{$lt->orders}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <p>하위 쿼리는 이러한 유형의 SELECT 문을 작성하는 데 매우 유용하지만 여러 테이블이 등장할 경우 열 이름 지정에 주의하지 않으면 엉뚱한 결과가 얻어질 수 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> 항상 다른 해결책이 있다.</h4>
        <p>앞서 설명했듯이, 여기서 소개한 코드 예도 정상적으로 잘 작동하기는 하지만 특정한 경우에는 이런 방식이 비효율적인 경우가 있다. 같은 결과를 얻기 위한 다른 방법을 이후 단원에서 살펴보자.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>이 단원에서는 하위 쿼리가 무엇이며 어떻게 사용하는지 배웠다. 하위 쿼리의 가장 일반적인 쓰임은 WHERE 절 IN 연산자에 좋건을 넣기 위해서이며 계산 열을 채우는 데도 자주 사용된다. 두 가지 경우의 예를 모두 살펴보았으므로 꼼꼼히 익혀 두도록 하자.</p>
    </article>
  </section>
</div>