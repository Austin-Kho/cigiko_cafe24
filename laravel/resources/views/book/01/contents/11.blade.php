<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 데이터를 그룹화하여 테이블 내용의 일부를 요약하는 방법을 알아보자. 이 과정에는 두 개의 <code>SELECT</code> 문 절인 <code>GROUP BY</code> 와 <code>HAVING</code> 절이 사용된다.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 데이터 그룹화의 이해
  </h3>
  <section>
    <article>
      <p>지난 단원에서 전체 데이터를 가져오지 않고도 행의 수를 세고, 합계와 평균을 계산하고 최대값과 최소값을 얻을 수 있는 함수에 대해서 살펴보았다.</p>
      <p>이러한 모든 계산은 한 테이블에 있는 데이터, 또는 <code>WHERE</code> 절의 조건에 맞는 특정 데이터를 대상으로 수행되었다.</p>
      <p>그렇다면 각 공급업체별로 제품 개수를 반환하거나, 제품을 하나만 공급하는 업체의 제품을 반환하거나, 10개 이상의 제품을 공급하는 업체의 제품을 반환하려면 어떻게 해야 할까?</p>
      <p>이 때 그룹화가 필요하다. 그룹화는 데이터를 논리적 집합으로 나누어 각 집합에 대해 함수를 통한 계산을 적용할 수 있도록 해준다.</p>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 그룹 만들기
  </h3>
  <section>
    <article>
      <p>그룹을 만들려면 <code>SELECT</code> 문에서 <code>GROUP BY</code> 절을 사용하면 된다. 이해를 위해 다음의 예를 보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT vend_id, COUNT(*) AS num_prods<br>
        FROM Products<br>
        GROUP BY vend_id;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>vend_id</th><th>num_prods</th></tr>
          </thead>
          @php
            $data = DB::table('Products')
                      ->select('vend_id', DB::raw('COUNT(*) AS num_prods'))
                      ->groupBy('vend_id')->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->vend_id}}</td><td>{{$lt->num_prods}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 <code>SELECT</code> 문에는 두 개의 열인 vend_id 와 num_prods 가 지정되어 있다. vend_id 는 제품 공급업체의 ID이며 num_prods는 <code>COUNT(*)</code> 함수를 사용하는 계산 필드이다. <code>GROUP BY</code> 절은 데이터를 정렬하고 vend_id 를 기준으로 그룹화하도록 지시하므로, 전체 테이블이 아니라 vend_id 마다 num_prods 를 계산하게 된다. 즉, 각 공급업체별로 데이터를 그룹화하여 num_prods를 계산하는 것이다.</p>
      <p><code>GROUP BY</code> 를 지정했기 때문에, 각 그룹별로 계산을 하라고 지정할 필요는 없다. 이는 자동으로 이루어진다. <code>GROUP BY</code> 절은 데이터를 이 절의 조건대로 그룹화 하여 전체 결과 집합이 아니라 각 그룹에 대해 집계를 하도록 지시한다.</p>
      <p><code>GROUP BY</code> 를 사용하려면 먼저 다음과 같은 중요한 규칙을 이해해야 한다.</p>
      <ul>
        <li><code>GROUP BY</code> 절에는 원하는 만큼의 열을 넣을 수 있다. 즉, 그룹을 중첩하는 등 데이터 그룹화를 보다 세부적으로 제어할 수 있다.</li>
        <li><code>GROUP BY</code> 절에 중첩된 그룹이 있을 경우 데이터는 마지막 지정된 그룹을 기준으로 요약된다. 즉, 그룹화가 이루어질 때 모든 지정된 열이 함께 계산되며 각 열 수준의 데이터는 얻을 수 없다.</li>
        <li><code>GROUP BY</code> 절에 나열되는 모든 열은 가져온 열이거나 올바른 식이어야 한다(집계 함수는 사용할 수 없다). <code>SELECT</code> 에 식을 사용하면 동일한 식이 <code>GROUP BY</code> 절에도 쓰여야 한다. 별칭은 사용할 수 없다.</li>
        <li>대부분의 SQL 에서는 <code>GROUP BY</code> 절에 길이 가변 형식(텍스트나 메모 필드와 같은)의 열을 지원하지 않는다.</li>
        <li>집계 계산 문을 제외하고, <code>SELECT</code> 문의 모든 열은 <code>GROUP BY</code> 절에 있어야 한다.</li>
        <li>그룹화 열에 <code>NULL</code> 값을 가진 행이 있을 경우, <code>NULL</code> 도 그룹으로 반환된다. <code>NULL</code> 값을 가진 행이 여러 개일 경우는 모두 하나로 그룹화 된다.</li>
        <li><code>GROUP BY</code> 절은 모든 <code>WHERE</code> 절 뒤에 위치해야 하며 <code>ORDER BY</code> 절 앞에 위치해야 한다.</li>
      </ul>

      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> ALL 절</h4>
        <p>Microsoft SQL Server와 같은 일부 SQL 구현에서는 GROUP BY 절 내에 ALL 이라는 선택적 절을 지원한다. 이 절을 사용하면 일치하는 행이 없더라도(집계 결과가 NULL인 경우) 모든 그룹을 반환할 수 있다.</p>
        <h4><span class="badge badge-secondary">주의</span> 상대 위치로 열을 지정</h4>
        <p>일부 SQL 구현에서는 SELECT 목록 내의 위치를 기준으로 GROUP BY 열의 위치를 지정할 수 있다. 예를 들어 GROUP  BY 2, 1 이라고 지정하면 선택된 두 번째 열로 그룹화 한 다음 첫 번째 열로 그룹화 하라는 의미이다. 매우 간편한 방식이지만 모든 SQL 구현에서 지원되는 것은 아니므로 주의가 필요하다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 필터링 그룹
  </h3>
  <section>
    <article>
      <p><code>GROUP BY</code> 로 데이터를 그룹화 하는 것뿐만 아니라 어떤 그룹은 포함하고 어떤 그룹은 제외할지 지정하여 필터링 하는 것도 가능하다. 예를 들어 두 개 이상의 주문을 한 고객의 목록이 필요한 경우 각각의 행을 기준으로 필터링 하는 것보다 그룹으로 필터링 하는 것이 편하다.</p>

      <p><code>WHERE</code> 절의 쓰임은 그 동안 많이 보았으며, 여기서 필요한 것도 그런 기능이다. 하지만 <code>WHERE</code>  절은 각 행에 대한 것이지 그룹에 대한 것이 아니므로 여기서는 사용할 수 없다.</p>
      <p>이 때 사용할 수 있는 것이 바로 <code>HAVING</code> 절이다. <code>WHERE</code> 절에 사용할 수 있는 모든 절은 <code>HAVING</code> 절에도 사용할 수 있으며, 유일한 차이점은 <code>WHERE</code> 절이 행을 대상으로 하는 대신 <code>HAVING</code> 은 그룹을 대상으로 한다는 점이다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> HAVING은 WHERE 절의 모든 연산자를 지원한다.</h4>
        <p>4장과 5장에서 와일드카드 조건과 여러 연산자를 사용하는 절 등 WHERE 절의 여러 조건에 대해 배웠다. 이러한 모든 WHERE 절의 기술은 HAVING 절에도 동일하게 사용할 수 있으며, 구문도 동일하다. 단지 WHERE 키워드가 HAVING 으로 바뀐 것 뿐이다.</p>
      </div>
      <p>어떻게 열을 필터링할까? 다음 예를 보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_id, COUNT(*) AS orders<br>
        FROM Orders<br>
        GROUP BY cust_id<br>
        HAVING COUNT(*) >= 2;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_id</th><th>orders</th></tr>
          </thead>
          @php
            $data = DB::table('Orders')
                      ->select('cust_id', DB::raw('COUNT(*) AS orders'))
                      ->groupBy('cust_id')
                      ->havingRaw('COUNT(*) >= 2')
                      ->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_id}}</td><td>{{$lt->orders}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>세 번째 줄까지의 내용은 별다른 것이 없으므로 마지막 <code>HAVING</code> 절만 살펴보자. 이 줄에서는 <code>COUNT(*) >= 2</code>라는 조건을 사용하여 두 개 이상의 주문을 한 고객만 선택하도록 하였다.</p>
      <p>이 필터링은 그룹 집계값을 대상으로 하며 각 행을 대상으로 하지 않기 때문에 <code>WHERE</code> 절은 사용할 수 없다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> HAVING 절과 WHERE 절의 차이점</h4>
        <p>중요한 차이점이 있다. WHERE 절은 데이터가 그룹화 되기 전에 필터링을 하며, HAVING 절은 ㄷ제이터가 그룹화한 후에 필터링한다. 이는 중요한 차이점으로, WHERE 절에 의해 일단 제외된 행은 그룹에 포함되지 않는다는 점을 이해해야 한다. 따라서 WHERE 절을 사용하여 일단 특정한 대상을 정하고, GROUP BY 절로 그 대상에 한해 그룹화한 다음 HAVING 절로 각 그룹을 다시 필터링 하는 것이다.</p>
      </div>
      <p>이해를 돕기 위해 가격이 4 이상인 제품을 두 개 이상 가진 공급업체를 나열하는 문을 보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT vend_id, COUNT(*) AS num_prods<br>
        FROM Products<br>
        WHERE prod_price >= 4<br>
        GROUP BY vend_id<br>
        HAVING COUNT(*) >= 2;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>vend_id</th><th>num_prods</th></tr>
          </thead>
          @php
            $data = DB::table('Products')
                      ->select('vend_id', DB::raw('COUNT(*) AS num_prods'))
                      ->where('prod_price', '>=', 4)
                      ->groupBy('vend_id')
                      ->havingRaw('COUNT(*) >= 2')
                      ->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->vend_id}}</td><td>{{$lt->num_prods}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>첫 번째 줄은 집계 함수를 사용한 기본적인 <code>SELECT</code> 문으로, 지금까지의 예와 별반 다를 것이 없다. <code>WHERE</code> 절에서는 prod_price가 4 이상인 제품만을 필터링하고, <code>GROUP BY</code> 절에서 이 제품들을 vend_id 로 그룹화 한 다음 <code>HAVING</code> 절에서 이 그룹 중 제품의 개수가 2개 이상인 vend_id 만 골라낸다. 공급업체 DLL01의 경우 가격이 4 미만인 네 개의 제품을 판매하고 있으므로, <code>WHERE</code> 절이 없었다면 다음과 같이 조건에 맞지 않는 결과가 나타났을 것이다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT vend_id, COUNT(*) AS num_prods<br>
        FROM Products<br>
        GROUP BY vend_id<br>
        HAVING COUNT(*) >= 2;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>vend_id</th><th>num_prods</th></tr>
          </thead>
          @php
            $data = DB::table('Products')
                      ->select('vend_id', DB::raw('COUNT(*) AS num_prods'))
                      ->groupBy('vend_id')
                      ->havingRaw('COUNT(*) >= 2')
                      ->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->vend_id}}</td><td>{{$lt->num_prods}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <div class="tip">        
        <h4><span class="badge badge-secondary">참고</span> HAVING 과 WHERE 절의 사용</h4>
        <p>HAVING은 WHERE 절과 거의 흡사한 역할을 하기 때문에 대부분의 DBMS에서는 GROUP BY 가 지정되지 않은 경우 HAVING을 WHERE와 동일하게 취급한다. 하지만 그렇다고 이 둘을 같은 것으로 보아서는 안된다. GROUP BY 절과 함께 사용할 때만 HAVING 절을 쓰고, 기본적인 행 수준이 필터링을 할 때는 WHERE절을 사용하기 바란다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 그룹화와 정렬
  </h3>
  <section>
    <article>
      <p><code>GROUP BY</code>와 <code>ORDER BY</code>는 때로 같은 결과를 만들어내는 경우기 있지만 분명 다른 것임을 인식해야 한다. 차이점을 표 10.1 에 정리하였다.</p>
      <h5>표 10.1 ORDER BY와 GROUP BY의 차이점</h5>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>ORDER BY</th>
            <th>GROUP BY</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>생성된 결과를 정렬한다.</td>
            <td>행을 그룹화한다. 결과가 그룹의 순서대로 되는 것은 아니다.</td>
          </tr>
          <tr>
            <td>선택하지 않은 열을 포함하여 모든 열을 사용한다.</td>
            <td>선택한 열과 식 열만 사용하며, 선택한 모든 식 열이 사용되어야 한다.</td>
          </tr>
          <tr>
            <td>반드시 필요하지는 않다.</td>
            <td>집계 함수에 열(또는 식)을 사용한 경우 반드시 필요하다.</td>
          </tr>
        </tbody>
      </table>
      <p>첫 번째 차이점은 매우 중요하다. <code>GROUP BY</code>에 의해 그룹화된 데이터가 그룹 순서로 정렬될 것이라 생각하지만 반드시 그렇지는 않다는 사실을 기억해야 한다. 대개의 DBMS 에서는 그룹 순서대로 정렬한다 해도 때로는 그룹 순서가 아니라 다른 순서대로 정렬해야 하는 경우도 생길 것이다. 데이터를 (특정한 집계값을 얻기 위해) 한 가지 방식으로 그룹화했다고 해서 결과가 같은 방식으로 정렬되어야 함을 의미하지는 않기 때문이다. 따라서 <code>GROUP BY</code>와 동일한 내용일지라도 정렬을 위해서는 <code>ORDER BY</code>를 분명히 써주어야 한다.</p>
      <div class="tip">        
        <h4><span class="badge badge-secondary">TIP</span> ORDER BY를 잊지 말자</h4>
        <p>GROUP BY 절을 사용할 때는 ORDER BY 절도 지정해 주어야 함을 규칙으로 삼자. 데이터가 올바르게 정렬되도록 하는 유일한 방법은 이뿐이다. GROUP BY가 정렬까지 해줄 것이라고 기대하지 말자.</p>
      </div>

      <p><code>GROUP BY</code>와 <code>ORDER BY</code>의 쓰임을 설명하기 위해 예를 들어보자. 다음 <code>SELECT</code> 문은 이전 예와 비슷한 것으로, 세 개 이상의 물품이 포함된 모든 주문의 주문 번호와 물품 개수를 얻어낸다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT order_num, COUNT(*) AS items<br>
        FROM OrderItems<br>
        GROUP BY order_num<br>
        HAVING COUNT(*) >= 3;
      </code></pre>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> Access의 비호환성</h4>
        <p>Microsoft Access에서는 별칭을 사용한 정렬을 허용하지 않으므로 이 예를 사용할 수 없다. 따라서 ORDER BY 절의 items를 실제 계산식이나 필드 위치로 변경해야 한다. 즉 ORDER BY COUNT(*), order_num이나 ORDER BY 1, order_num으로 지정해야 한다.</p>
      </div>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>order_num</th><th>items</th></tr>
          </thead>
          @php
            $data = DB::table('OrderItems')
                      ->select('order_num', DB::raw('COUNT(*) AS items'))
                      ->groupBy('order_num')
                      ->havingRaw('COUNT(*) >= 3')
                      ->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->order_num}}</td><td>{{$lt->items}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <p>결과를 주문한 물품의 개수로 정렬하려면 다음과 같이 <code>ORDER BY</code> 절을 추가하면 된다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT order_num, COUNT(*) AS items<br>
        FROM OrderItems<br>
        GROUP BY order_num<br>
        HAVING COUNT(*) >= 3<br>
        ORDER BY items, order_num;
      </code></pre>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>order_num</th><th>items</th></tr>
          </thead>
          @php
            $data = DB::table('OrderItems')
                      ->select('order_num', DB::raw('COUNT(*) AS items'))
                      ->groupBy('order_num')
                      ->havingRaw('COUNT(*) >= 3')
                      ->orderBy('items')
                      ->orderBy('order_num')
                      ->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->order_num}}</td><td>{{$lt->items}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예에서는 <code>GROUP BY</code> 절을 사용하여 주문 번호(order_num 열)로 데이터를 그룹화하고 <code>COUNT(*)</code>를 사용하여 각 주문의 물품 수량을 반환하였다. <code>HAVING</code> 절은 그룹화된 각 주문 중에서 수량이 3개 이상인 것만을 피러링하는 데 사용되었으며, 마지막으로 <code>ORDER BY</code> 절을 사용하여 결과를 정렬하였다.</p>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> SELECT 절의 순서
  </h3>
  <section>
    <article>
      <p>지금까지 <code>SELECT</code> 문에 넣었던 여러 절의 지정 순서를 정리해보자. 다음 표와 같이 각 절은 지정된 순서대로 입력되어야 한다.</p>
      <h5>표 10.2 SELECT 절과 순서</h5>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>절</th>
            <th>설명</th>
            <th>필수 여부</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>SELECT</code></td>
            <td>반환할 열이나 식</td>
            <td>반드시 필요</td>
          </tr>
          <tr>
            <td><code>FROM</code></td>
            <td>데이터를 가져올 테이블</td>
            <td>테이블에서 데이터를 선택할 때만 필요</td>
          </tr>
          <tr>
            <td><code>WHERE</code></td>
            <td>행 수준의 필터링</td>
            <td>필요하지 않음</td>
          </tr>
          <tr>
            <td><code>GROUP BY</code></td>
            <td>그룹 지정</td>
            <td>그룹별로 집계할 때만 필요</td>
          </tr>
          <tr>
            <td><code>HAVING</code></td>
            <td>그룹 수준의 필터링</td>
            <td>필요하지 않음</td>
          </tr>
          <tr>
            <td><code>ORDER BY</code></td>
            <td>결과를 정렬</td>
            <td>필요하지 않음</td>
          </tr>
        </tbody>
      </table>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>9장 '데이터 요약'에서 SQL 집계 함수를 사용하여 다양한 데이터 계산을 하는 방법을 배웠다. 이 단원에서는 <code>GROUP BY</code> 절을 사용하여 데이터를 그룹화 한 다음 각 그룹에 대해 계산을 하는 방법을 설명하였으며, <code>HAVING</code> 절을 통해 원하는 그룹만 필터링 하는 방법도 살펴보았다. <code>ORDER BY</code>와 <code>GROUP BY</code>의 차이점, 그리고 <code>WHERE</code>와 <code>HAVING</code>의 차이점도 설명하였다.</p>
    </article>
  </section>
</div>