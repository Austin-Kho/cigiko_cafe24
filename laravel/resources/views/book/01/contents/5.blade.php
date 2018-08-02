  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>이 단원에서는 SELECT 문의 WHERE 절을 사용하여 검색 조건을 지정하는 방법을 알아보자.</p>
      </article>
    </section>
  </div>

  <div class="chapter">
    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> WHERE 절의 사용
    </h3>
    <section>
      <article>
        <p>데이터베이스 테이블에는 방대한 양의 데이터가 들어 있는 경우가 많으며, 그 데이터를 모두 가져와 사용하는 경우는 드믈다. 대부분의 경우 테이블의 데이터 중에서 특정한 용도에 맞는 것만 가져와 작업이나 보고에 사용하게 된다. 원하는 데이터만 가져오기 위해서는 검색 조건을 지정해야 하며 이를 필터 조건이라고 한다.</p>
        <p><code>SELECT</code> 문 내에 특정한 필터 조건을 지정하려면 <code>WHERE</code> 절을 사용한다. <code>WHERE</code> 절은 다음과 같이 <code>FROM</code> 절에 있는 테이블 이름 바로 뒤에 지정된다.</p>
        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>
          SELECT prod_name, prod_price<br>
          FROM Products<br>
          WHERE prod_price = 3.49;
        </code></pre>
        <h4><span class="badge badge-pill badge-info">분 석</span></h4>
        <p>이 문을 실행하면 Products 테이블에서 모든 열이 아닌 두 개의 열만을 가져오게 된다. 가져오는 열은 여기서 지정한 조건 즉, prod_price가 3.49인 행에 해당한다.</p>
        <h4><span class="badge badge-pill badge-success">출 력</span></h4>
        <pre><code>
          <table class="table-sm">
            <thead>
              <tr><th>prod_name</th><th>prod_price</th></tr>
            </thead>
            @php
              $data = DB::table('Products')
              ->select('prod_name', 'prod_price')
              ->where('prod_price', 3.49)->get()
            @endphp
            <tbody>
              @foreach($data as $lt)
              <tr><td>{{$lt->prod_name}}</td><td>{{$lt->prod_price}}</td></tr>
              @endforeach
            </tbody>
          </table>
        </code></pre>
        <p>이 예제는 간단한 '동일성 테스트'를 필터 조건으로 사용했다. SQL에는 이보다 훨씬 다양한 테스트 기능이 존재한다.</p>
        <div class="tip">
          <h4><span class="badge badge-secondary">주의</span> Picky PostgreSQL</h4>
          <p>PostgreSQL에서는 SQL 문에 전달하는 값에 상당히 엄격한 규칙이 있다. 특히 숫자를 지정할 때는 그 숫자가 문제가 없는 숫자 형식임을 지정해 주어야 한다. 따라서 위 예제는 PostgreSQL에서는 오류가 발생하며, 제대로 실행되려면 WHERE 절에 있는 <code>= 3.49</code> 부분을 <code>= decimal '3.49'</code>로 바꿔 주어야 한다.</p>
          <h4><span class="badge badge-secondary">TIP</span> SQL 필터링과 응용프로그램</h4>
          <p>필터링 데이터를 SQL 문이 아닌 응용 프로그램에서 필터링 할 수도 있다. 즉 SQL SELECT 문으로 충분한 수의 데이터를 가져온 다음 클라이언트 응용 코드에서 각 데이터를 검사하여 필요한 행만 골라내는 것이다.</p>
          <p>하지만 이 방법은 결코 좋지 않다. 데이터베이스는 필터링을 빠르고 효율적으로 수행하도록 최적화 되어 있기 때문이다. 아무리 응용프로그램을 잘 만들었다고 해도 데이터베이스가 수행하는 복잡한 작업을 대신 하려고 시도하는 것은 성능에 좋지 않은 영향을 미치게 된다. 또한 데이터를 클라이언트에서 필터링 하면 서버는 그만큼 필요 없는 데이터를 네트워크를 통해 보내야 한다는 의미이므로 네트워크 대역폭이 낭비된다는 단점도 있다.</p>
          <h4><span class="badge badge-secondary">주의</span> WHERE 절의 위치</h4>
          <p>ORDER BY 와 WHERE 절을 모두 사용할 경우는 ORDER BY 절을 WHERE 절보다 뒤에 적어주어야 하며 그렇지 않으면 오류가 발생하게 된다. 간단히 생각해도 가져올 열을 결정한 다음 정렬을 하는 것이 당연하므로 이해하기 쉬울 것이다.</p>
        </div>
      </article>
    </section>

    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> WHERE 절 연산자
    </h3>
    <section>
      <article>
        <p>앞서 살펴본 WHERE 절에서는 '동일성 테스트'를 했었다. 즉 열이 특정한 값을 가지고 있는지를 살펴보았다. SQL 에서 제공하는 조건부 연산자의 목록을 살펴보자.</p>
        <h4>표 4.1 WHERE 절 연산자</h4>
        <table class="table table-hover table-sm ">
          <thead>
            <tr><th>연산자</th><th>설명</th></tr>
          </thead>
          <tbody>
            <tr><td>=</td><td>같음</td></tr>
            <tr><td>&lt;></td><td>같지 않음</td></tr>
            <tr><td>!=</td><td>같지 않음</td></tr>
            <tr><td>&lt;</td><td>보다 작음</td></tr>
            <tr><td>&lt;=</td><td>보다 작거나 같음</td></tr>
            <tr><td>!&lt;</td><td>보다 작지 않음</td></tr>
            <tr><td>></td><td>보다 큼</td></tr>
            <tr><td>>=</td><td>보다 크거나 같음</td></tr>
            <tr><td>!></td><td>보다 크지 않음</td></tr>
            <tr><td>BETWEEN</td><td>지정된 두 값 사이에 있음</td></tr>
            <tr><td>IS NULL</td><td>NULL 값임</td></tr>
          </tbody>
        </table>
        <div class="tip">
          <h4>연산자 호환성</h4>
          <p>표 4.1에 나열된 연산자 중 &lt;>와 !=는 같은 의미이며 보다 작지 않음을 의미하는 !&lt;와 보다 크거나 같음을 의미하는 >=는 동일한 기능을 한다. 이러한 연산자가 모든 DBMS 에서 지원되는 것은 아니므로 자세한 내용은 각 DBMS 설명서를 참조하기 바란다.</p>
        </div>
      </article>
    </section>

    <h4 class="sub-header">한 값을 대상으로 확인</h4>
    <section>
      <article>
        <p>동일성 테스트는 이미 살펴 보았으므로 다른 연산자의 쓰임을 이해하기 위해 몇가지 예제를 살펴보자.</p>
        <p>다음 예제는 가격이 10불 미만인 모든 제품을 나열한다.</p>
        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>
          SELECT prod_name, prod_price<br>
          FROM Products<br>
          WHERE prod_price < 10;
        </code></pre>            
        <h4><span class="badge badge-pill badge-success">출 력</span></h4>
        <pre><code>
          <table class="table-sm">
            <thead>
              <tr><th>prod_name</th><th>prod_price</th></tr>
            </thead>
            @php
              $data = DB::table('Products')
                    ->select('prod_name', 'prod_price')
                    ->where('prod_price', '<', 10)->get()
            @endphp
            <tbody>
              @foreach($data as $lt)
              <tr><td>{{$lt->prod_name}}</td><td>{{$lt->prod_price}}</td></tr>
              @endforeach
            </tbody>
          </table>
        </code></pre>
        <p>다음 문은 가격이 10불 이하인 모든 제품을 나열한다, 가격이 정확히 10불인 제품은 없으므로 결과는 위 예제와 동일하다.</p>
        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>
          SELECT prod_name, prod_price<br>
          FROM Products<br>
          WHERE prod_price < 10;
        </code></pre>   
      </article>
    </section>        
    
    <h4 class="sub-header">불일치 테스트</h4>
    <section>
      <article>
        <p>다음 예제는 DLL01이라는 제조업체에서 만들지 않은 모든 제품을 나열한다.</p>
        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>
          SELECT vend_id, prod_name<br>
          FROM Products<br>
          WHERE vend_id <> 'DLL01';
        </code></pre>
        <h4><span class="badge badge-pill badge-success">출 력</span></h4>
        <pre><code>
          <table class="table-sm">
            <thead>
              <tr><th>vend_id</th><th>prod_name</th></tr>
            </thead>
            @php
              $data = DB::table('Products')
                    ->select('vend_id', 'prod_name')
                    ->where('vend_id', '<>', 'DLL01')->get()
            @endphp
            <tbody>
              @foreach($data as $lt)
              <tr><td>{{$lt->vend_id}}</td><td>{{$lt->prod_name}}</td></tr>
              @endforeach
            </tbody>
          </table>
        </code></pre>
        <div class="tip">
          <h4><span class="badge badge-success">TIP</span> 따옴표의 사용</h4>
          <p>지금까지 설명한 WHERE 절의 조건들을 살펴보면 어떤 값은 그냥 쓰였고 어떤 값은 작은 따옴표로 묶은 것을 알 수 있다. 작은따옴표는 문자열 값을 묶는데 사용된다. 즉 데이터 형식이 문자열(string)인 값을 조건으로 사용하려면 작은따옴표를 사용해야 한다. 숫자 값을 경우는 따옴표가 필요하지 않다.</p>
        </div>
        <p>같은 결과를 만드는 문이지만 이번에는 <code>&lt;></code> 연산자 대신 <code>!=</code> 를 사용해 보았다.</p>
        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>
          SELECT vend_id, prod_name<br>
          FROM Products<br>
          WHERE vend_id != 'DLL01';
        </code></pre>
        <div class="tip">
          <h4><span class="badge badge-success">주의</span> != 또는 &lt;></h4>
          <p>!= 과 &lt;> 는 같은 의미이므로 아무 것이나 사용해도 된다. 하지만 DBMS 에 따라 사용할 수 있는 연산자가 다를 수 있다. Microsoft 의 Access를 예로 들면 <code>&lt;></code> 는 지원하지만 <code>!=</code> 는 지원하지 않는다. 따라서 연산자 사용에 의문이 생긴다면 DBMS 설명서를 읽어보는 것이 좋다.</p>
          </div>
      </article>
    </section>

    <h4 class="sub-header">특정한 범위에 있는 값을 확인</h4>
    <section>
      <article>
        <p>값의 범위를 조건으로 사용하려면 <code>BETWEEN</code> 연산자를 사용한다. 이 연산자의 구문은 다른 WHERE 절 연산자와 다른데, 그 이유는 값이 두 개 필요하기 때문이다.</p>
        <p>다음 예제는 <code>BETWEEN</code> 연산자를 사용하여 가격이 5불과 10불 사이인 모든 제품을 검색한다.</p>
        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>
          SELECT prod_name, prod_price<br>
          FROM Products<br>
          WHERE prod_price BETWEEN 5 AND 10;
        </code></pre>
        
        <h4><span class="badge badge-pill badge-success">출 력</span></h4>
        <pre><code>
          <table class="table-sm">
            <thead>
              <tr><th>prod_name</th><th>prod_price</th></tr>
            </thead>
            @php
              $data = DB::table('Products')
                    ->select('prod_name', 'prod_price')
                    ->whereBetween('prod_price', [5, 10])->get()
            @endphp
            <tbody>
              @foreach($data as $lt)
              <tr><td>{{$lt->prod_name}}</td><td>{{$lt->prod_price}}</td></tr>
              @endforeach
            </tbody>
          </table>
        </code></pre>

        <h4><span class="badge badge-pill badge-info">분 석</span></h4>
        <p>이 예제에서와 같이 <code>BETWEEN</code> 을 사용할 때는 두 값을 지정해야 하며, 최소값과 최대값 사이에 키워드 <code>AND</code>를 넣어주어야 한다. <code>BETWEEN</code>은 지정된 두 값 사이에 해당하는 모든 값을 검색하며 두 값과 일치하는 값도 대상에 포함된다. 즉 가격이 5불이거나 10불인 경우도 결과에 포함된다.</p>
      </article>
    </section>

    <h4 class="sub-header">값이 없을 경우를 확인</h4>
    <section>
      <article>
        <p>테이블을 만들 때 디자이너는 열에 값이 없어도 되는지를 지정할 수 있다. 열에 값이 없는 경우 이를 NULL 값이라고 한다.</p>
        <blockquote><strong>NULL</strong>: <i>No value</i>, 즉 값이 없음을 의미한다. 값이 <code>0</code>이거나 빈 문자열(<code>''</code>), 또는 공백(<code>' '</code>)인 경우와는 다름을 주의하자. <code>0</code>, 또는 빈 문자열(<code>''</code>), 또는 공백(<code>' '</code>)도 분명한 값이며, <code>NULL</code> 은 이러한 값조차 없는 것을 말한다.</blockquote>

        <p>값이 없는지 확인화기 위해서는 특별한 연산자인 <code>IS NULL</code>절을 사용하면 된다. 구문은 다음과 같다.</p>
        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>
          SELECT prod_name<br>
          FROM Products<br>
          WHERE prod_price IS_NULL;          
        </code></pre>

        <p>이 문을 실행하면 가격이 지정되어 있지 않은 모든 제품이 나열된다. 즉 prod_price 필드가 비어 있는 제품을 말한다. 다시 한 번 말하지만 가격이 0인것과는 다르며, 아예 가격이 정해지지 않은 열만 검색된다. NULL 값이 있는 Vendors 테이블을 사용하여 테스트 해보자. 제조업체의 주(state)가 지정되지 않은 경우 vend_state 열의 값은 NULL 이므로 이러한 열만 가져오도록 지정한다(제조업체가 미국 업체가 아닌 경우 주 정보가 없을 것이다).</p>

        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>
          SELECT vend_id<br>
          FROM Vendors<br>
          WHERE vend_state IS_NULL;          
        </code></pre>
        <h4><span class="badge badge-pill badge-success">출 력</span></h4>
        <pre><code>
          <table class="table-sm">
            <thead>
              <tr><th>vend_id</th></tr>
            </thead>
            @php
              $data = DB::table('Vendors')
                    ->select('vend_id')
                    ->whereNull('vend_state')->get()
            @endphp
            <tbody>
              @foreach($data as $lt)
              <tr><td>{{$lt->vend_id}}</td></tr>
              @endforeach
            </tbody>
          </table>
        </code></pre>
        <div class="tip">
          <h4><span class="badge badge-success">TIP</span> 특정 DBMS 연산자</h4>
          <p>여기서 설명한 표준 연산자 이외에, 많은 DBMS에서 고급 필터링을 위한 전용 연산자를 제공하고 있다. 자세한 정보는 사용하는 DBMS 설명서를 읽어보기 바란다.</p>
        </div>
      </article>
    </section>

    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> 요약
    </h3>
    <section>
      <article>
        <p>이 단원에서는 SELECT 문의 WHERE 절을 사용하여 반환된 데이터를 필터링 하는 방법을 배웠다. 값이 같은 경우, 같지 않은 경우, 보다 크거나 작은 경우, 특정 범위에 있는 경우, 그리고 NULL 값인 경우를 확인하는 방법도 살펴보았다.</p>
      </article>
    </section>
  </div>