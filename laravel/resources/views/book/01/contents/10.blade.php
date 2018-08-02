<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 SQL 집계 함수를 사용하여 테이블 데이터를 요약하는 방법을 알아보자.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 집계 함수 사용
  </h3>
  <section>
    <article>
      <p>단지 데이터를 가져오는 것뿐만 아니라 이 데이터를 요약해야 하는 경우가 있다. SQL 은 이를 위한 특별한 함수를 제공하며, 이를 사용하면 데이터를 가져와 분석하고 필요에 따라 보고할 수 있다. 이런 경우의 예를 들어 보자.</p>
      <ul>
        <li>테이블의 전체 행 개수를 계산하거나 특정 조건이나 값에 해당하는 행의 개수만 계산하는 경우</li>
        <li>테이블에서 여러 행을 가져와 합계를 계산하는 경우</li>
        <li>테이블 열(전체 열이나 일부 열)에서 가장 높은 값, 가장 낮은 값, 그리고 평균값을 계산하는 경우</li>
      </ul>
      <p>이러한 모든 경우, 즉 실제 데이터 값 자체가 아니라 이 데이터를 사용한 계산 값이 필요할 때는 테이블 데이터를 가져오는 일이 시간과 자원의 낭비가 된다. 정말 필요한 것은 요약 정보이기 때문이다.</p>
      <p>이러한 경우를 위해 SQL 에서 제공하는 집계 함수에는 다섯 가지가 있으며, 그 목록은 표 9.1과 같다. 지난 단원에서 설명한 함수와 달리 집계 함수는 대부분의 DBMS에서 일관된 방식으로 지원하므로 호환에 대한 염려가 적은 편이다.</p>
      <blockquote><strong>집계 함수</strong>: 여러 열을 대상으로 계산을 수행하여 하나의 값을 반환하는 함수</blockquote>

      <h5>표 9.1 SQL 집계 함수</h5>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>함수</th>
            <th>설명</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>AVG()</code></td>
            <td>열의 평균값을 반환한다.</td>
          </tr>
          <tr>
            <td><code>COUNT()</code></td>
            <td>열의 행 개수를 반환한다.</td>
          </tr>
          <tr>
            <td><code>MAX()</code></td>
            <td>열의 최대값을 반환한다.</td>
          </tr>
          <tr>
            <td><code>MIN()</code></td>
            <td>열의 최소값을 반환한다.</td>
          </tr>
          <tr>
            <td><code>SUM()</code></td>
            <td>열 값의 합계를 반환한다.</td>
          </tr>
        </tbody>
      </table>
      <p>각 함수의 쓰임에 대해 차례로 알아보자.</p>
    </article>
  </section>

  <h4 class="sub-header">AVG() 함수</h4>
  <section>
    <article>
      <p><code>AVG()</code> 는 테이블의 열 개수와 각 열의 값을 모두 계산하여, 열 값의 평균값을 반환한다. 대상이 되는 열은 모든 열일 수도 있고, 특정한 조건에 맞는 열이나 행이 될 수도 있다.</p>
      <p>다음 첫 번째 예에서는 <code>AVG()</code>를 이용하여 <code>Products</code> 테이블에 있는 모든 제품의 가격 평균을 계산한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT AVG(prod_price) AS avg_price<br>
        FROM Products;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>avg_price</th></tr>
          </thead>
          @php
            $avg_price = DB::table('Products')->avg('prod_price');
          @endphp
          <tbody>            
            <tr><td>{{$avg_price}}</td></tr>            
          </tbody>
        </table>
      </code></pre>      
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 SELECT 문은 하나의 값, 즉 Products 테이블에 있는 모든 제품의 평균 가격을 반환한다. 이 값은 avg_price라는 별칭에 저장되는데, 별칭에 대해서는 7장을 참조하기 바란다.</p>

      <p><code>AVG()</code> 를 사용하여 특정한 열이나 행의 값에 대해서만 평균을 계산할 수도 있다. 예를 들어 특정한 공급업체의 제품에 대해서만 평균ㅇㄹ 내려면 다음과 같이 하면 된다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT AVG(prod_price) AS avg_price<br>
        FROM Products<br>
        WHERE vend_id = 'DLL01';
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>avg_price</th></tr>
          </thead>
          @php
            $avg_price = DB::table('Products')
                           ->where('vend_id', 'DLL01')
                           ->avg('prod_price');
          @endphp
          <tbody>            
            <tr><td>{{$avg_price}}</td></tr>            
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이전 예와 다른 점은 SELECT 문에 WHERE 절이 있다는 것뿐이다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> 각 열에 대한 평균값</h4>
        <p>AVG()를 사용하여 특정한 숫자 열의 평균값만 구할 수도 있다. 이 때는 이 열의 이름을 함수의 매개변수로 입력하면 된다. 여러 열의 평균값을 얻으려면 AVG()함수를 여러번 사용해야 한다.</p>
        <h4><span class="badge badge-secondary">참고</span> NULL 값</h4>
        <p>열의 해에 NULL 값이 있는 경우는 AVG() 함수의 계산에서 제외된다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">COUNT() 함수</h4>
  <section>
    <article>
      <p><code>COUNT()</code> 함수는 말 그대로 개수를 세는 기능을 한다. 테이블의 전체 행 개수를 세거나, 특정 조건에 맞는 행 개수만 세는 것 모두 가능하다. COUNT()는 다음과 같은 두 방식으로 사용할 수 있다.</p>
      <ul>
        <li>값이 있건 NULL 값이건 간에 상관없이 테이블의 모든 행 개수를 세려면 COUNT(*)를 사용한다.</li>
        <li>NULL 값은 제외하고 특정한 열에서 값이 있는 행의 개수만 세려면 COUNT(열)를 사용한다.</li>
      </ul>
      <p>다음 예에서는 Customers 테이블에 있는 모든 고객의 수를 계산한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT COUNT(*) AS num_cust<br>
        FROM Customers;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>num_cust</th></tr>
          </thead>
          @php
            $num_cust = DB::table('Customers')->count();
          @endphp
          <tbody>
            <tr><td>{{$num_cust}}</td></tr>
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예에서는 값에 상관없이 모든 행을 계산하기 위해 COUNT(*) 를 사용하였다. 반환된 값은 num_cust 에 저장된다.</p>

      <p>다음 예는 전자 메일 주소가 있는 고객의 수만 계산한다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT COUNT(cust_email) AS num_cust<br>
        FROM Customers;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>num_cust</th></tr>
          </thead>
          @php
            $num_cust = DB::table('Customers')->count('cust_email');
          @endphp
          <tbody>
            <tr><td>{{$num_cust}}</td></tr>
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이번에는 <code>cust_email</code> 열에 값이 있는 고객의 수만 계삲기 위해 <code>COUNT(cust_email)</code>을 사용하였다. 결과가 3이라는 것은 총 5명의 고갱 중 3명만이 전자 메일 주소가 기입되어 있다는 의미이다.</p>
      <div class="tip">
        <h4>NULL 값</h4>
        <p>열 이름을 지정하지 않는 한 값이 NULL인 열은 COUNT() 함수에서 무시된다. 물론 <code>*</code> 기호를 사용할 경우는 계산에 포함된다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">MAX() 함수</h4>
  <section>
    <article>
      <p><code>MAX()</code>는 지정한 열에서 가장 큰 값을 반환한다. 다음과 같이 열의 이름은 항상 지정해야 한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT MAX(prod_price) AS max_price<br>
        FROM Products;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>max_price</th></tr>
          </thead>
          @php
            $max_price = DB::table('Products')->max('prod_price');
          @endphp
          <tbody>
            <tr><td>{{$max_price}}</td></tr>
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>MAX() 함수는 Products 테이블에서 가격이 가장 비싼 제품의 가격을 반환한다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 숫자가 아닌 데이터에 MAX() 함수를 사용</h4>
        <p><code>MAX()</code> 함수는 가장 큰 숫자 또는 날짜 데이터를 찾는 데 사용되지만 대부분(전부는 아니다)의 DBMS 에서는 텍스트 열에 대해서도  이 함수를 사용할 수 있다. 텍스트 데이터에 <code>MAX()</code> 함수를 적용하면 그 열을 정렬했을 때 가장 마지막에 오는 데이터가 최대값으로 간주되어 반환된다.</p>

        <h4><span class="badge badge-secondary">참고</span> NULL 값</h4>
        <p>값이 <code>NULL</code> 인 열은 <code>MAX()</code> 함수에서 무시된다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">MIN() 함수</h4>
  <section>
    <article>
      <p><code>MIN()</code> 함수는 <code>MAX()</code> 함수의 정반대 역할을 한다. 즉 지정한 열의 가장 낮은 값을 반환한다. <code>MAX()</code>와 마찬가지로 이 함수 역시 열 이름을 지정해야 한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT MIN(prod_price) AS min_pirce<br>
        FROM Products<br>
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>min_pirce</th></tr>
          </thead>
          @php
            $min_pirce = DB::table('Products')->min('prod_price');
          @endphp
          <tbody>
            <tr><td>{{$min_pirce}}</td></tr>
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p><code>MIN()</code> 함수는 Products 테이블에서 가격이 가장 싼 제품의 가격을 반환한다.</p>
      <div class="tip">
          <h4><span class="badge badge-secondary">TIP</span> 숫자가 아닌 데이터에 MIN() 함수를 사용</h4>
          <p><code>MIN()</code> 함수는 가장 작은 숫자 또는 날짜 데이터를 찾는 데 사용되지만 대부분(전부는 아니다)의 DBMS 에서는 텍스트 열에 대해서도  이 함수를 사용할 수 있다. 텍스트 데이터에 <code>MIN()</code> 함수를 적용하면 그 열을 정렬했을 때 가장 처음에 오는 데이터가 최소값으로 간주되어 반환된다.</p>
  
          <h4><span class="badge badge-secondary">참고</span> NULL 값</h4>
          <p>값이 <code>NULL</code> 인 열은 <code>MIN()</code> 함수에서 무시된다.</p>
        </div>
    </article>
  </section>

  <h4 class="sub-header">SUM() 함수</h4>
  <section>
    <article>
      <p><code>SUM()</code> 함수는 지정한 열의 모든 값을 더한 합계를 계산하는 데 사용된다.</p>
      <p>예를 들어보자. OrderItems 테이블에는 주문한 실제 물품 정보가 들어있다. 각 품목에는 연결된 수량이 있으므로 주문한 전체 수량을 구하려면 다음과 같은 문을 사용하면 된다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT SUM(quantity) AS items_orders<br>
        FROM OrderItems<br>
        WHERE order_num = 20005;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>items_orders</th></tr>
          </thead>
          @php
            $items_orders = DB::table('OrderItems')
                              ->where('order_num', 20005)
                              ->sum('quantity');
          @endphp
          <tbody>
            <tr><td>{{$items_orders}}</td></tr>
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p><code>SUM(quantity)</code> 함수는 주문한 모든 물품의 수량 합계를 반환한다. <code>WHERE</code> 절은 주문한 대상의 범위를 줄이기 위해 사용되었다.</p>
      <p>계산한 값의 합계를 구하는 데도 <code>SUM()</code> 함수를 사용할 수 았디. 다음 예에서는 각 물품에 대한 <code>item_price*quantity</code>를 구하여 모두 더한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT SUM(item_price*quantity) AS total_price<br>
        FROM OrderItems<br>
        WHERE order_num = 20005;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>total_price</th></tr>
          </thead>
          @php
            $items_orders = DB::table('OrderItems')
                              ->where('order_num', 20005)
                              ->sum(DB::raw('item_price*quantity'));
          @endphp
          <tbody>
            <tr><td>{{$items_orders}}</td></tr>
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p><code>SUM(item_price*quantity)</code> 함수는 각 주문에 대한 총 금액을 반환하며, <code>WHERE</code> 절은 전과 마찬가지로 주문의 대상 범위를 줄이는데 사용되었다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 여러 열을 계산</h4>
        <p>모든 집계 함수는 이 예에서와 같이 표준 수학 연산자를 사용하여 여러 열을 대상으로 계산할 수 있다.</p>
        <h4><span class="badge badge-secondary">참고</span> NULL 값</h4>
        <p>값이 <code>NULL</code> 인 열은 <code>SUM()</code> 함수에서 무시된다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 고유 값의 집계
  </h3>
  <section>
    <article>
      <p>다섯 개의 집계 함수는 다음과 같이 두 가지 방법으로 사용할 수 있다.</p>
      <ul>
        <li>ALL 인수를 지정하여 모든 행을 계산. ALL 이 기본 인수이므로 인수를 지정하지 않으면 이 방식으로 계산된다.</li>
        <li>고유값만 계산(<mark>중복되는 값들은 1회만 계산하고 나머지는 무시</mark>)하려면 DISTINCT 인수를 지정한다.</li>
      </ul>
      <br>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> ALL 이 기본값이다.</h4>
        <p>ALL 인수는 기본값이므로 굳이 지정하지 않아도 된다. DISTINCT를 지정하지 않으면 ALL을 지정한 것과 동일한 효과가 있다.</p>
        <h4><span class="badge badge-secondary">참고</span> Access에서는 예외이다.</h4>
        <p>Microsoft Access 에서는 집계 함수에서 DISTINCT를 지원하지 않으므로 다음 예는 Access에서는 사용할 수 없다.</p>
      </div>

      <p>다음 예에서는 <code>AVG()</code> 함수를 사용하여 특정한 공급업체 제품의 평균가격을 반환한다. 전과 같은 <code>SELECT</code> 문을 사용하지만 이번에는 <code>DISTINCT</code> 인수를 넣어 고유 가격만 계산한다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT AVG(DISTINCT prod_price) AS avg_price<br>
        FROM Products<br>
        WHERE vend_id = 'DLL01';
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>avg_price</th></tr>
          </thead>
          @php
            $avg_price = DB::table('Products')
                           ->distinct()
                           ->where('vend_id', 'DLL01')                          
                           ->avg('prod_price');
          @endphp
          <tbody>
            <tr><td>{{$avg_price}}</td></tr>
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이와 같이 가격이 같은 물품이 있을 경우 여러 번 계산에 넣지 않고 한 번만 계산에 포함시키므로 전에 비해 평균가격이 높아졌다. 이는 제품 중에 평균가격보다 가격이 낮은 제품이 여럿 있다는 의미이다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> 주의</h4>
        <p>DISTINCT 는 열 이름이 지정된 COUNT() 에만 사용하며 COUNT(*)에는 사용해도 별 의미가 없다. 마찬가지로 열 이름이 지정된 경우에만 DISTINCT 가 유용하지, 계산이나 식에서는 사용하지 않는다.</p>
        <h4><span class="badge badge-secondary">TIP</span> MIN()이나 MAX()에서 DISTINCT 사용</h4>
        <p>MIN() 이나 MAX() 에서 DISTINCT 를 사용하는 것에 기술적으로 아무 문제도 없지만, 이런 계산은 대개 아무런 의미가 없다. 최대값과 최소값은 값이 동일한 경우에도 모두 계산에 넣어야 의미가 있는 경우가 대부분이기 때문이다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 집계 함수의 결합
  </h3>
  <section>
    <article>
      <p>지금까지 모든 집계 함수 예는 하나의 함수만 사용했지만, 실제로는 SELECT 문에서 여러 집계 함수를 넣어 활용하면 더욱 유용하다. 예를 보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT COUNT(*) AS num_items,<br>
        MIN(prod_price) AS price_min,<br>
        MAX(prod_price) AS price_max,<br>
        AVG(prod_price) AS price_avg<br>
        FROM Products;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>num_items</th><th>price_min</th><th>price_max</th><th>price_avg</th></tr>
          </thead>
          @php
            $count = DB::table('Products')->count();
            $min = DB::table('Products')->min('prod_price');
            $max = DB::table('Products')->max('prod_price');
            $avg = DB::table('Products')->avg('prod_price');
          @endphp
          <tbody>
            <tr><td>{{$count}}</td><td>{{$min}}</td><td>{{$max}}</td><td>{{$avg}}</td></tr>
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>하나의 SELECT 문으로 한 번에 여러 값을 얻어냈다. 즉 Products 테이블에 있는 물품의 수, 가격이 가장 높은 물품과 낮은 물품, 그리고 가격의 평균을 구할 수 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> 별칭 이름 짓기</h4>
        <p>집계 함수의 결과를 담을 별칭을 지정할 때는 테이블에 있는 실제 열을 포함하지 않는 이름으로 지정하자. 포함하는 것이 잘못된 것은 아니지만 많은 DBMS 에서 이러한 형식을 지원하지 않으므로 예기치 못한 오류가 발생할 수 있다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>집계 함수는 데이터를 요약하는 데 사용된다. SQL 은 다섯 개의 집계 함수를 지원하며 이를 사용ㅎ여 결과를 원하는 대로 반환할 수 있다. 이러한 함수는 효율이 높은 방식으로 디자인되어 있으므로 클라이언트 응용 프로그램에서 계산하는 것보다 빠르게 처리할 수 있다는 장점이 있다.</p>
    </article>
  </section>
</div>