<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 <code>WHERE</code> 절을 조합하여 강력하고 복잡한 검색 조건을 만드는 방법을 알아보자. <code>NOT</code>과 <code>IN</code> 연산자를 사용하는 방법도 배울 것이다.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> WHERE 절의 조합
  </h3>
  <section>
    <article>
      <p>4장 '데이터 필터링'에서 설명한 모든 WHERE 절은 조합하여 사용할 수 있으며, 이를 통해 다양한 방식의 필터 제어가 가능하다. 절을 결합할 때는 <code>AND</code>나 <code>OR</code> 절 중 하나를 사용한다.</p>
      <blockquote><strong>연산자</strong>: <code>WHERE</code> 절 내에서 절을 조합 또는 변경하는 데 사용되는 특별한 키워드, 논리 연산자라고도 한다.</blockquote>
  </section>

  <h4 class="sub-header">AND 연산자의 사용</h4>
  <section>
    <article>
      <p>하나 이상의 열로 필터링하려면 <code>AND</code> 연산자를 사용하여 <code>WHERE</code> 절의 조건을 결합해주면 된다. 예를 들어보자.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT prod_id, prod_price, prod_name<br>
        FROM Products<br>
        WHERE vend_id = 'DLL01' AND prod_price <= 4;        
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 SQL 문을 실행하면 DLL01 이라는 제조업체에서 만들고, 가격이 4불 이하인 모든 제품 이름이 검색된다. 이 SELECT 문의 WHERE 절은 두 개의 조건으로 만들어졌으며, 두 조건은 AND 로 연결되어 있다. AND 는 앞뒤에 지정된 두 조건을 모두 만족하는 데이터만 반환하라는 의미이다. 출력결과는 다음과 같다.</p>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>prod_id</th><th>prod_price</th><th>prod_name</th></tr>
          </thead>
          @php
            $data = DB::table('Products')
                      ->select('prod_id', 'prod_price', 'prod_name')
                      ->where([
                        ['vend_id', 'DLL01'],
                        ['prod_price', '<=', 4]
                      ])->get()
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_id}}</td><td>{{$lt->prod_price}}</td><td>{{$lt->prod_name}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <blockquote><strong>AND</strong>: WHERE 절의 조건 사이에 쓰이며 지정된 모든 조건을 만족하는 행만 반환하도록 한다.</blockquote>
    </article>
  </section>

  <h4 class="sub-header">OR 연산자의 사용</h4>
  <section>
    <article>
      <p><code>OR</code> 연산자는 <code>AND</code> 연산자와 정 반대의 쓰임을 가지고 있다. 즉, 두 조건 중 하나 이상의 조건에 부합되면 결과는 검색된다.</p>
      <p>다음 SELECT 문을 살펴보자.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT prod_name, prod_price<br>
        FROM Products<br>
        WHERE vend_id = 'DLL01' OR vend_id = 'BRS01';        
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 SQL 문은 DLL01이나 BRS01 이라는 제조업체에서 만든 모든 제품을 가져온다. <code>OR</code> 연산자는 이와 같이 두 조건 중 하나 이상을 만족하면 결과가 검색되도록 한다. 데이터 반환 결과는 다음과 같다.</p>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>prod_name</th><th>prod_price</th></tr>
          </thead>
          @php
            $data = DB::table('Products')
                      ->select('prod_name', 'prod_price')
                      ->where('vend_id', 'DLL01')
                      ->orWhere('vend_id', 'BRS01')->get()
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_name}}</td><td>{{$lt->prod_price}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <blockquote><strong>OR</strong>: 지정된 두 조건 중 하나 이상을 만족하는 ㅣ모든 행을 반환하도록 지정하는 WHERE 절 내의 키워드</blockquote>
    </article>
  </section>

  <h4 class="sub-header">평가 순서의 이해</h4>
  <section>
    <article>
      <p>WHERE 절에는 AND 와 OR 연산자를 여러 개 사용할 수도 있다. 이렇게 여러 조건을 결합하면 보다 복잡한 필터링이 가능해진다.</p>
      <p>하지만 AND 와 OR 연산자를 결합하면 흥미로운 문제가 생긴다. 설명을 위해 예제를 살펴보자. DLL01이나 BRS01 제조업체에서 만든 제품 중에 가격이 10불 이상인 제품을 검색하려고 하면 어떻게 해야 할까? 아마도 다음과 같이 쓸 수 있을 것이다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT prod_name, prod_price<br>
        FROM Products<br>
        WHERE vend_id = 'DLL01' OR vend_id = 'BRS01'<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AND prod_price >= 10;        
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
                      ->where('vend_id', 'DLL01')
                      ->orWhere('vend_id', 'BRS01')
                      ->where('prod_price', '>=', 10)->get()
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_name}}</td><td>{{$lt->prod_price}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>결과를 보면 원하던 것과 다르다. 가격이 10불 미만인 행이 4개나 된다. 다른 언어와 마찬가지로 SQL 역시 OR 연산자보다 AND 연산자를 먼저 처리하기 때문에 필터링이 제대로 되지 않았기 때문이다. 즉 SQL 은 가격이 10불 이상이고 제조업체가 BRS01인 제품을 먼저 감색한 다음, OR 연산자에 따라 DLL01이 제조업체인 모든 제품을(가격에 관계없이) 결과행에 포함해 버리는 것이다. 즉, AND 의 처리 우선순위가 높기 때문에 필터링에 문제가 생겨버렸다.</p>
      <p>이런 문제를 해결하기 위해서는 각 연산자를 적절히 괄호로 묶어주면 된다. 다음 SELECT 문과 출력 결과를 보자.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT prod_name, prod_price<br>
        FROM Products<br>
        WHERE (vend_id = 'DLL01' OR vend_id = 'BRS01')<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AND prod_price >= 10;        
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
                      ->where(function($query){
                        $query->where('vend_id', 'DLL01')
                              ->orwhere('vend_id', 'BRS01');
                      })
                      ->where('prod_price', '>=', 10)->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_name}}</td><td>{{$lt->prod_price}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>앞서 살펴본 SELECT 문과의 차이점은 단 한 가지이다. 이번에는 첫 번째 두 WHERE 조건, 즉 OR 연산이 적용되어야 할 조건을 괄호로 묶어주었다. 괄호는 AND 나 OR 연산자보다 높은 우선순위를 가지므로, DBMS 는 먼저 괄호 내의 조건을 처리한 다음 괄호 밖에 있는 AND 연산자 뒤의 조건을 처리하게 된다. 즉 DLL01이나 BRS01이라는 제조업체가 만든 모든 제품을 선택하고, 그 중에서 가격이 10불 이상인 제품을 검색한다. 애초에 의도했던 조건과 정확히 일치한다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> WHERE 절의 괄호 사용</h4>
        <p>AND 와 OR 연산자를 같은 WHERE 절에 함께 사용할 경우에는 각 연산자를 모두 괄호로 묶어주는 것이 좋다. 기본 평가 순서에 따라 해석되리라고 안심하지 말고, 직접 순서를 정해 의도대로 묶어주기 바란다. 괄호 사용에 대한 단점은 전혀 없으며, 조건을 보다 명확하게 이해하는데 도움이 된다.</p>
        <p></p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> IN 연산자의 사용
  </h3>
  <section>
    <article>
      <p><code>IN</code> 연산자는 조건의 범위를 지정하는 데 사용된다. 값은 콤마로 구분하여 괄호 내에 묶으며, 이 값 중에서 하나 이상과 일치하면 조건에 맞는 것으로 평가한다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT prod_name, prod_price<br>
        FROM Products<br>
        WHERE vend_id IN ('DLL01', 'BRS01')<br>
        ORDER BY prod_name;
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
                      ->whereIn('vend_id', ['DLL01', 'BRS01'])
                      ->orderBy('prod_name')->get()
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_name}}</td><td>{{$lt->prod_price}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>

      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 SELECT 문은 제조업체가 DLL01과 BRS01인 모든 제품을 가져온다. IN 연산자 뒤에는 콤마로 구분한 값의 목록이 지정되며, 전체 목록은 괄호로 묶어주어야 한다.</p>
      <p>눈치 챘겠지만, IN 연산자와 OR 연산자의 기능이 같다는 점을 알 수 있다. 다음과 같이 써주어도 같은 결과를 얻을 수 있다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT prod_name, prod_price<br>
        FROM Products<br>
        WHERE vend_id = 'DLL01' OR vend_id = 'BRS01'<br>
        ORDER BY prod_name;
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
                      ->where('vend_id', 'DLL01')
                      ->orWhere('vend_id', 'BRS01')
                      ->orderBy('prod_name')->get()
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_name}}</td><td>{{$lt->prod_price}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <p>그렇다면 왜 IN 연산자를 쓸까? 장점은 다음과 같다.</p>
      <ul>
        <li>목록에 넣을 값이 여러 개일 때, IN 연산자가 쓰기도 쉽고 이해하기도 쉽다.</li>
        <li>IN 을 사용하면 평가 순서를 보다 쉽게 관리할 수 있고 연산자 수도 줄어든다.</li>
        <li>IN 연산자가 OR 연산자보다 실행속도가 빠르다.</li>
        <li>IN 의 가장 큰 장점은 IN 연산자에 다른 SELECT 문을 넣을 수 있다는 것이다. 동적인 WHERE 절을 만들 때 이 장점이 크게 활용된다. 이 내용은 11장 '하위 쿼리 사용'에서 살펴볼 것이다.</li>
      </ul>
      <blockquote><strong>IN</strong>: 여러 값을 OR 관계로 묶어 나열하는 조건을 WHERE 절에 사용할 때 쓸 수 있는 키워드</blockquote>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> NOT 연산자의 사용
  </h3>
  <section>
    <article>
      <p>WHERE 절의 NOT 연산자는 단 하나의 기능만을 가지고 있다. NOT 연산자는 바로 뒤에 오는 조건을 부정하는 역할을 하며, 때문에 혼자서는 사용되지 않는다. NOT 연산자는 다른 연산자와는 달리 필터링할 열의 뒤가 아닌 앞에 사용된다.</p>
      <blockquote><strong>NOT</strong>: 조건을  부정할 때 사용되는 WHERE 절의 키워드</blockquote>

      <p>다음 예제를 통해 NOT 의 쓰임을 살펴보자. DLL01 제조업체 이외의 업체에서 만난 모든 제품을 나열하려면 다음 문을 실행하면 된다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELCET prod_name<br>
        FROM Products<br>
        WHERE NOT vend_id = 'DLL01'<br>
        ORDER BY prod_name;        
      </code></pre>
      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>prod_name</th></tr>
          </thead>
          @php
            $data = DB::table('Products')
                      ->select('prod_name')
                      ->where('vend_id', '!=', 'DLL01')
                      ->orderBy('prod_name')->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_name}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>

      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>NOT 연산자는 바로 뒤에 나오는 조건을 부정하는 역할을 한다. 즉, <code>vend_id</code>가 <code>DLL01</code>이 아닌 모든 행을 가져오게 된다.</p>

      <p><code>&lt;></code> 연산자를 사용해도 같은 결과를 얻을 수 있다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELCET prod_name<br>
        FROM Products<br>
        WHERE vend_id &lt;> 'DLL01'<br>
        ORDER BY prod_name;        
      </code></pre>
      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>prod_name</th></tr>
          </thead>
          @php
            $data = DB::table('Products')
                      ->select('prod_name')
                      ->where('vend_id', '<>', 'DLL01')
                      ->orderBy('prod_name')->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_name}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>

      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>왜 <code>NOT</code> 을 사용할까? 위 코드와 같이 간단한 하나의 조건이라면 <code>NOT</code>을 사용해서 얻을 수 있는 이점이 없다. 대신 <code>NOT</code> 은 보다 복잡한 조건에 사용된다. 예를 들어 <code>NOT</code> 을 <code>IN</code> 연산자와 함께 사용하면 특정한 목록에 해당하지 않는 값 만을 검색할 수 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> MySQL 에서의 NOT</h4>
        <p>여기서 설명한 <code>NOT</code> 연산자는 MySQL 에서는 지원되지 않는다. MySQL 에서는 <code>EXISTS</code> 를 부정할 때만 <code>NOT EXISTS</code> 의 형식으로 사용한다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>이 단원에서는 AND 와 OR 연산자를 사용하여 WHERE 절 내의 조건을 결합하는 방법, 조건의 평가 순서를 제어하는 방법과 IN, NOT 연산자를 사용하는 방법을 배웠다.</p>
    </article>
  </section>
</div>