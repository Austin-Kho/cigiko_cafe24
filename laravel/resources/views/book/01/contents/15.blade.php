<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 UNION 연산자를 사용하여 여러 SELECT 문을 하나의 결과 집합으로 결합하는 방법에 대해 알아보자.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 결합된 쿼리의 이해 
  </h3>
  <section>
    <article>
      <p>대부분의 SQL 쿼리는 하나의 SELECT 문을 사용하여 하나 이상의 테이블에서 데이터를 반환하지만 여러 SELECT 문(여러 쿼리)을 결합하여 하나의 쿼리 결과로 만드는 것도 가능하다. 이렇게 결합된 쿼리를 <i>UNION</i> 또는 <i>복합 쿼리</i>라고도 부른다.</p>
      <p>결합된 쿼리를 사용하게 되는 상황은 기본적으로 다음의 두 가지이다.</p>
      <ul>
        <li>서로 다른 테이블에서 하나의 쿼리로 비슷한 구조의 데이터를 반환하려할 때</li>
        <li>하나의 테이블을 대상으로 여러 쿼리를 실행하여 결과 데이터를 하나의 쿼리로 반환하려 할 때</li>
      </ul>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 쿼리 결합과 여러 WHERE 조건</h4>
        <p>대부분의 경우 한 테이블에 대한 두 쿼리를 결합하는 것은 한 쿼리에 WHERE 절을 여럿 사용하는 것과 동일하다. 이는 여러 WHERE 절이 있는 SELECT 문은 결합된 쿼리로 지정할 수 있다는 의미도 된다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 결합된 쿼리 만들기
  </h3>
  <section>
    <article>
      <p>SQL 쿼리를 결합할 때는 UNION 연산자를 사용한다. 이 연산자를 사용하면 여러 SELECT 문을 지정하고 결과를 하나의 결과 집합으로 결합할 수 있다.</p>
    </article>
  </section>

  <h4 class="sub-header">UNION 사용</h4>
  <section>
    <article>
      <p>UNION의 사용 방법은 간단하다. 여러 SELECT 문을 지정하고 그 사이에 UNION 키워드를 넣어주기만 하면 된다.</p>

      <p>예를 들어보자. Illinois, Indiana, 그리고 Michigan 주에 있는 모든 고객을 보고해야 하며 위치에 관계없이 Fun4All 이라는 위치는 포함해야 한다고 가정해보자. WHERE 절을 만들지 말고 UNION을 사용할 수 있다.</p>
      <p>설명했듯이 SELECT 문을 지정하고 UNION 키워드를 쓰면 된다. 먼저 각각의 SELECT 문을 살펴보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_name, cust_contact, cust_email<br>
        FROM Customers<br>
        WHERE cust_state IN ('IL', 'IN', 'MI');
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_name</th><th>cust_contact</th><th>cust_email</th></tr>
          </thead>
          @php
            $data = DB::table('Customers')
                      ->select('cust_name', 'cust_contact', 'cust_email')
                      ->whereIn('cust_state', ['IL', 'IN', 'MI'])->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_name}}</td><td>{{$lt->cust_contact}}</td><td>{{$lt->cust_email}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_name, cust_contact, cust_email<br>
        FROM Customers<br>
        WHERE cust_name = 'Fun4All';
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_name</th><th>cust_contact</th><th>cust_email</th></tr>
          </thead>
          @php
            $data = DB::table('Customers')
                      ->select('cust_name', 'cust_contact', 'cust_email')
                      ->where('cust_name', 'Fun4All')->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_name}}</td><td>{{$lt->cust_contact}}</td><td>{{$lt->cust_email}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>첫 번째 SELECT 문은 Illinois, Indiana, 그리고 Michigan 주에 해당하는 약자를 IN 절에 넣어 이 세 주에 속하는 행을 반환하는 것이며, 두 번째 SELECT 문은 동일 테스트를 통해 Fun4All이라는 고객 이름을 선택하는 쿼리이다.</p>
      <p>이 두 쿼리를 결합하면 다음과 같다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_name, cust_contact, cust_email<br>
        FROM Customers<br>
        WHERE cust_state IN ('IL', 'IN', 'MI')<br>
        UNION<br>
        SELECT cust_name, cust_contact, cust_email<br>
        FROM Customers<br>
        WHERE cust_name = 'Fun4All';
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_name</th><th>cust_contact</th><th>cust_email</th></tr>
          </thead>
          @php
            $data1 = DB::table('Customers')
                       ->select('cust_name', 'cust_contact', 'cust_email')
                       ->whereIn('cust_state', ['IL', 'IN', 'MI']);
            $data2 = DB::table('Customers')
                       ->select('cust_name', 'cust_contact', 'cust_email')
                       ->where('cust_name', 'Fun4All')
                       ->union($data1)->get();
          @endphp
          <tbody>
            @foreach($data2 as $lt)
            <tr><td>{{$lt->cust_name}}</td><td>{{$lt->cust_contact}}</td><td>{{$lt->cust_email}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>설명했듯이 가장 간단하다. 두 SELECT 문을 쓰고 그 사이에 UNION 키워드를 넣어준 것뿐이다. UNION 키워드는 DBMS 에게 앞뒤의 SELECT 문을 결합하여 반환 결과를 하나의 쿼리 결과 집합으로 반환하도록 한다.</p>
      <p>참고용으로 UNION 대신 여러 WHERE 절을 사용하여 같은 결과를 만드는 쿼리는 다음과 같다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_name, cust_contact, cust_email<br>
        FROM Customers<br>
        WHERE cust_name IN ('IL', 'IN', 'MI')<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OR cust_name = 'Fun4All';
      </code></pre>
      <p>이렇게 간단한 예만 보면 UNION 이 WHERE 절에 비해 훨씬 복잡하기 때문에 굳이 쓸 이유가 없어 보인다. 하지만 필터링 조건이 보다 복잡하거나 데이터를 여러 테이블에서 가져올 때는 UNION 이 훨씬 간단하게 처리된다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> UNION 한계</h4>
        <p>UNION 문으로 결합할 수 있는 SELECT 문의 개수에는 일반적으로 한계가 없다. 하지만 DBMS에 따라 이 한계가 정해져 있는 경우도 있으므로 각 DBMS 설명서를 참조하기 바란다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">UNION 규칙</h4>
  <section>
    <article>
      <p>이미 살펴보았듯이 UNION 은 사용하기 쉽다. 하지만 이를 사용할 때 다음과 같은 몇 가지 규칙을 명심해야 한다.</p>
      <ul>
        <li>UNION 은 두 개 이상의 SELECT 문으로 구성되어야 하며 UNION 키워드로 구분되어야 한다. 따라서 만약 네 개의 SELECT 문을 결합한다면 세 개의 UNION 키워드가 필요하다.</li>
        <li>UNION 내의 각 쿼리는 같은 열, 식, 또는 집계 함수를 포함해야 한다. 단, 같은 순서로 나열할 필요는 없다.</li>
        <li>열의 데이터 형식은 호환되어야 한다. 정확하게 동일한 형식일 필요는 없지만 DBMS가 간접적으로 변환할 수 있어야 한다. 예를 들어 형식은 다르더라도 숫자를 나타내거나, 날짜를 나타내는 등 간접적 변환이 가능해야 한다.</li>
      </ul>
      <p>이러한 기본 규칙과 제한 사항을 지킨다면 UNION 을 다양한 데이터 추출 작업에 활용할 수 있다.</p>
    </article>
  </section>

  <h4 class="sub-header">중복 열을 포함하거나 제거</h4>
  <section>
    <article>
      <p>'UNION 사용' 절로 돌아가서 예로 든 SELECT 문을 다시 살펴보자. 두 쿼리를 별도로 실행한다고 하면 첫 번째 SELECT 문에서는 세 개의 행이, 두 번째 SELECT 문에서는 두 개의 행이 반환될 것이지만 UNION 으로 결합해보니 결과는 다섯 개가 아니라 네 개만 반환되었다.</p>

      <p>이는 UNION 이 자동으로 쿼리 결과에서 중복된 행을 제거하기 때문이다. 즉 하나의 SELECT 문에서 여러 WHERE 절을 사용했을 때와 같은 결과이다. Indiana 에 위치한 Fun4All이 양쪽 쿼리에서 모두 반환되기 때문에 이 결과가 생략된 것이다.</p>
      <p>UNION 의 기본 특성이 이렇지만 원한다면 바꿀 수 있다. 중복된 결과까지 모두 반환하고 싶다면 UNION 대신 UNION ALL 키워드를 사용하면 된다.</p>
      <p>예를 들어보자.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_name, cust_contact, cust_email<br>
        FROM Customers<br>
        WHERE cust_state IN ('IL', 'IN', 'MI')<br>
        UNION ALL<br>
        SELECT cust_name, cust_contact, cust_email<br>
        FROM Customers<br>
        WHERE cust_name = 'Fun4All';
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
            <thead>
              <tr><th>cust_name</th><th>cust_contact</th><th>cust_email</th></tr>
            </thead>
            @php
              $data1 = DB::table('Customers')
                          ->select('cust_name', 'cust_contact', 'cust_email')
                          ->whereIn('cust_state', ['IL', 'IN', 'MI']);
              $data2 = DB::table('Customers')
                          ->select('cust_name', 'cust_contact', 'cust_email')
                          ->where('cust_name', 'Fun4All')
                          ->unionAll($data1)->get();
            @endphp
            <tbody>
              @foreach($data2 as $lt)
              <tr><td>{{$lt->cust_name}}</td><td>{{$lt->cust_contact}}</td><td>{{$lt->cust_email}}</td></tr>
              @endforeach
            </tbody>
          </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>UNION ALL을 사용하면 DBMS는 중복된 열을 제거하지 않기 때문에 이번에는 다섯 개의 행이 반환되었음을 알 수 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> UNION과 WHERE</h4>
        <p>이 단원의 처음 부분에서 UNION의 기능은 여러 WHERE 조건을 사용하는 것과 동일하다고 설명했었다. 하지만 UNION ALL은 WHERE 절로는 할 수 없는 결과를 만드는 효과가 있으므로 중복된 행을 포함하여 모든 결과를 반환하려면 WHERE 절이 아닌 UNION ALL을 사용해야 한다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">결합된 쿼리 결과의 정렬</h4>
  <section>
    <article>
      <p>SELECT 문의 결과는 ORDER BY 절을 통해 정렬되며 UNION을 사용할 때에도 이 방법을 쓸 수 있다. 하지만 ORDER BY 절을 가장 마지막 SELECT 문 다음에 하나만 사용하는 것이 중요한 포인트이다. 여러 ORDER BY 절을 사용하는 것은 허용되지 않기 때문이며, 이렇게 하면 적은 수고로 쉽게 정렬할 수 있기 때문이다.</p>
      <p>UNION으로 반환되는 결과를 ORDER BY 절로 정렬하는 예는 다음과 같다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_name, cust_contact, cust_email<br>
        FROM Customers<br>
        WHERE cust_state IN ('IL', 'IN', 'MI')<br>
        UNION<br>
        SELECT cust_name, cust_contact, cust_email<br>
        FROM Customers<br>
        WHERE cust_state = 'Fun4All'<br>
        ORDER BY cust_name, cust_contact;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_name</th><th>cust_contact</th><th>cust_email</th></tr>
          </thead>
          @php
            $data1 = DB::table('Customers')
                        ->select('cust_name', 'cust_contact', 'cust_email')
                        ->whereIn('cust_state', ['IL', 'IN', 'MI']);
            $data2 = DB::table('Customers')
                        ->select('cust_name', 'cust_contact', 'cust_email')
                        ->where('cust_name', 'Fun4All')
                        ->union($data1)
                        ->orderBy('cust_name')
                        ->orderBy('cust_contact')->get();
          @endphp
          <tbody>
            @foreach($data2 as $lt)
            <tr><td>{{$lt->cust_name}}</td><td>{{$lt->cust_contact}}</td><td>{{$lt->cust_email}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 UNION에는 하나의 ORDER BY 절이 마지막 SELECT 문 다음에 한 번만 사용되었다. 마치 마지막 SELECT 문에만 정렬이 적용될 것처럼 보이지만 DBMS는 모든 SELECT 문에서 반환한 결과를 UNION으로 결합한 뒤 지정된 조건으로 정렬하게 된다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> 다른 UNION 유형</h4>
        <p>EXCEPT 나 INTERSECT 와 같은 UNION을 지원하는 DBMS도 있다. EXCEPT는 MINUS라고도 부르는데 첫 번째 테이블에는 있고 두 번째 테이블에는 없는 행만 반환하라는 효과가 있다. INTERSECT 는 두 테이블에 모두 있는 행만 반환하는 효과가 있다. 하지만 이러한 UNION 은 조인을 사용해도 동일한 결과를 얻을 수 있기 때문에 잘 사용되지 않는다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>이 단원에서는 여러 SELECT 문을 UNION 연산자로 결합하여 하나의 결과로 만드는 방법을 살펴보았다. UNION 을 사용하면 여러 쿼리의 결과를 마치 하나의 쿼리처럼 결합할 수 있고, 중복된 행이 있을 경우 포함하거나 제외하도록 지정할 수 있다. WHERE 절을 복잡하게 사용해야 할 경우는 UNION을 대신 사용하면 아주 간편하며, 여러 테이블에서 데이터를 가져올 수 있다는 점도 장점이다.</p>
    </article>
  </section>
</div>