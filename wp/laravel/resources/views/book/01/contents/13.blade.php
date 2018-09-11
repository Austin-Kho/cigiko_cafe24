<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 조인이란 무엇이며 왜 필요한지, 그리고 조인을 사용하여 <code>SELECT</code> 문을 만드는 방법을 살펴본다.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 조인의 이해
  </h3>
  <section>
    <article>
      <p>SQL 의 가장 강력한 기능 중 하나가 바로 데이터를 가져오는 쿼리 내에서 곧바로 테이블을 조인할 수 있는 기능인다. 조인은 SQL <code>SELECT</code> 로 수행할 수 있는 매우 중요한 작업 중 하나이다.</p>
      <p>조인을 효과적으로 사용하기 위해서 먼저 관계형 테이블을 이해하고 관계형 데이터베이스 디자인의 기본에 대해 알 필요가 있다. 이것만으로 꽤나 긴 설명이 되겠지만, 여기서는 꼭 필요한 내용만 알아보자.</p>
    </article>
  </section>

  <h4 class="sub-header">관계형 테이블의 이해</h4>
  <section>
    <article>
      <p>관계형 테이블을 이해하는 가장 좋은 방법은 실제 예를 살펴보는 것이다.</p>

      <p>제품 카탈로그가 있는 데이터베이스 테이블이 있다고 가정해보자. 각 카탈로그 항목은 각각의 행으로 저장되어 있으며 제품의 설명과 가격, 제품을 만든 공급 업체 정보 등이 함께 저장될 것이다.</p>

      <p>이제 같은 공급업체에서 만든 여러 카탈로그 항목이 있다고 가정해보자. 공급업체의 이름, 주소, 연락처 정보와 같은 공급업체 정보를 어디에 저장할 것인가? 제품을 저장한 곳에 저장하는 것은 다음과 같은 이유 때문에 좋지 않다.</p>
      <ul>
        <li>공급업체 정보는 공급업체가 생산하는 각 제품에 대해 동일하므로 각 제품에 대해 이 정보를 반복적으로 저장하면 저장 공간의 낭비가 생긴다.</li>
        <li>공급업체 정보가 변경되면(예를 들면 다른 지역으로 이사하는 등) 이 정보가 담긴 모든 부분을 수정해야 하는 번거로움이 있다.</li>
        <li>각 제품에 공급업체 정보를 추가하여 같은 데이터를 반복하면 이 데이터가 모두 일관성 있게 유지될 가능성은 줄어든다. 일관성이 없는 데이터는 보고서에서 사용하기 무척 힘들다.</li>
      </ul>

      <p>여기서 중요한 것은 같은 데이터를 여러 번 저장하는 것은 결코 좋지 않다는 점이며, 이는 바로 관계형 데이터베이스 디자인의 기본 원칙이다. 이에 따라 관계형 테이블은 정보를 여러 테이블로 나누게 되며 각 데이터마다 하나씩 테이블을 만든다. 이러한 여러 테이블은 공통의 값을 통해 서로 연결된다(관계형 디자인에서의 <i>관계</i>가 바로 이것이다).</p>

      <p>이 예에서 우리는 공급업체 정보를 담을 하나의 테이블과 제품 정보를 담을 하나의 테이블을 별도로 만드는 것이 좋다. Vendors 테이블에는 각 행 당 하나씩 공급업체의 정보가 포함되며 각 공급업체를 구분하기 위한 고유 ID가 할당된다. 이 값이 바로 기본 키가 되며, vendor ID와 같이 고유한 값을 사용한다.</p>

      <p>Products 테이블에는 제품 정보가 저장되며 공급업체에 관련된 정보는 vendor ID를 제외하고는 저장되지 않는다. 이는 Vendors 테이블의 기본 키로, Vendors 테이블과 Products 테이블을 서로 연결하는 데 사용된다. 즉 특정 제품에 대해 이 값을 알면 해당 공급업체에 대한 정보룰 조회할 수 있다.</p>

      <p>이렇게 하면 어떤 장점이 있을까?</p>

      <ul>
        <li>공급업체 정보가 반복되지 않으므로 공간이 절약된다.</li>
        <li>공급업체 정보가 변경되면 Vendors 테이블에 있는 한 레코드만 변경하면 된다. 이에 연결된 테이블의 데이터는 변경할 필요가 없다.</li>
        <li>반복되는 데이터가 없으므로 높은 일관성을 유지할 수 있고 데이터 보고와 제어를 보다 쉽게 할 수 있다.</li>
      </ul>

      <p>중요한 점은 관계형 데이터는 효율적으로 저장하고 편리하게 조작할 수 있어야 한다는 것이다. 이 때문에 관계형 데이터베이스는 그렇지 않은 데이터베이스에 비해 확장이 보다 수월하다.</p>
      <blockquote><strong>확장</strong>: 오류 없이 부하를 늘릴 수 있는 능력을 말한다. 잘 디자인된 데이터베이스나 응용 프로그램을 '<i>확장성이 뛰어나다</i>'라고 한다.</blockquote>
    </article>
  </section>

  <h4 class="sub-header">왜 조인을 사용하는가?</h4>
  <section>
    <article>
      <p>앞서 설명했듯이 데이터를 여러 테이블로 나누면 저장 공간을 보다 효율적으로 사용할 수 있고 조작이 간편하며, 확장하기도 편하다. 하지만 이러한 이점에 따른 대가도 있다.</p>

      <p>데이터가 여러 테이블에 저장되어 있으면 하나의 <code>SELECT</code> 문으로 이 데이터를 어떻게 얻을 수 있을까?</p>

      <p>해결책은 바로 조인이다. 간단히 말해 <code>SELECT</code> 문 내에서 테이블을 연결하는 메커니즘으로, 특별한 구문을 사용해 여러 테이블을 하나로 연결해서 하나의 결과를 반환할 수 있으며 조인을 통해 각 테이블의 필요한 행을 연결할 수 있다.</p>

      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> 대화식 DBMS 도구 사용</h4>
        <p>조인은 실제 엔트리가 아니라는 점을 이해해야 한다. 조인은 데이터베이스 테이블에 실제로 존재하는 것이 아니라, 필요에 따라 DBMS 에 의해 만들어지는 것이며 쿼리가 실행되는 동안만 유지되는 것이다.</p>
        <p>많은 DBMS 에는 테이블의 관계를 정의하는 데 사용할 수 있는 그래픽 인터페이스가 있다, 이러한 도구는 참조 무결성을 유지하는 데에 도움이 된다. 관계형 테이블을 사용할 때는 관계형 열에 올바른 데이터만 삽입된다는 것을 알아두자. 예를 들어 Products 테이블에 잘못된 vend ID가 저장되어 있다면 이 제품은 어떤 공급업체라도 연결되지 않을 것이므로 액세스 할 수 없게 된다. 이러한 현상을 막기 위해 데이터베이스는 올바른 값(Vendors 테이블에 있는 값)만을 Products 테이블의 vendor ID 열에 넣을 수 있도록 제한하는데, 이것이 바로 참조 무결성이다. 참조 무결성이란 DBMS가 데이터 무결성 규칙울 지키도록 강요한다는 것이며 이러한 규칙은 DBMS 가 제공하는 인터페이스를 통해 관리되는 경우가 많다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 조인 만들기
  </h3>
  <section>
    <article>
      <p>조인을 만드는 방법은 간단하다. 첨가할 모든 테이블을 지정하고 서로 연결될 방식을 지정하면 된다. 예를 들어 보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT vend_name, prod_name, prod_price<br>
        FROM Vendors, Products<br>
        WHERE Vendors.vend_id = Products.vend_id;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>vend_name</th><th>prod_name</th><th>prod_price</th></tr>
          </thead>
          @php
            $data = DB::table('Vendors')                      
                      ->join('Products', 'Vendors.vend_id', '=', 'Products.vend_id')
                      ->select('vend_name', 'prod_name', 'prod_price')
                      ->get()
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->vend_name}}</td><td>{{$lt->prod_name}}</td><td>{{$lt->prod_price}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>입력 코드부터 살펴보자. <code>SELECT</code> 문은 가져올 열을 선택하는 지금까지 살펴본 문과 같은 방식으로 시작한다. 가장 큰 차이점은 세 열 중 두 열(prod_name과 prod_price)과 나머지 한 열(vend_id)이 서로 다른 테이블에 있다는 점이다.</p>

      <p>FROM 절을 살펴보자. 지금까지 배운 SELECT 문과는 다르게 Vendors와 Products라는 두 테이블이 지정되어 있다. 이 두 테이블이 바로 <code>SELECT</code> 문에서 조인할 테이블이다. 테이블의 조인 조건은 <code>WHERE</code> 에 지정되어 있으며, Vendors 테이블의 vend_id가 Products 테이블의 vend_id와 일치하도록 설정되었다.</p>

      <p>열을 지정할 때 Vendors.vend_id 및 Products.vend_id와 같이 테이블의 이름을 함께 싸준 것을 볼 수 있다. 열 이름이 같기 때문에 열 이름만 지정하면 DBMS 에서 이 열이 어떤 테이블의 열인지 알 수 없기 때문이다. 결과는 출력 부분에서 볼 수 있듯이 두 테이블에 있는 데이터를 하나의 <code>SELECT</code> 문으로 반환할 수 있다. </p>

      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> 완전한 형식의 열</h4>
        <p>이름 열의 이름만 가지고는 하나 이상의 열을 서로 구분할 수 없을 경우 반드시 완전한 형식으로 열 이름을 지정해 주어야 한다. 테이블을 지정하지 않고 애매한 상황 그대로 열 이름을 놔두면 DBMS 에서 오류 메시지가 나타나게 된다. 완전한 형식의 열 이름은 영어로 Fully Qualifying Column Name이라 하며, 흔히 '정규화된 이름'이라고 부른다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">WHERE 절의 중요성</h4>
  <section>
    <article>
      <p>조인을 위해 <code>WHERE</code> 절이 사용된다는 점이 다소 이상할 지 모르지만 실제로 이렇게 하는 데에는 중요한 이유가 있다. <code>SELECT</code> 문으로 테이블을 조인할 경우 그 관계는 즉석에서 만들어 지는데, 이는 DBMS 에서 테이블을 조인하는 방식을 테이블 정의에서 지정할 수 있는 방법이 없기 때문이다. 즉 조인 방법은 여러분이 직접 정해야 한다. 두 테이블을 조인하는 것은 첫 번째 테이블의 몯ㄴ 행을 두 번째 테이블의 모든 행과 짝맞추는 과정으로, 짝을 맞출 때 모든 행을 맞추는 것이 아니라 특정한 조건에 맞는 행만 선택하게 되며 그 조건이 되는 것이 바로 <code>WHERE</code> 절이다. <code>WHERE</code> 절이 없다면 논리적인 일치 여부에 관계없이 첫 번째 테이블의 모든 열이 두 번째 테이블의 모든 열과 조인되어 결과가 반환된다.</p>
      <blockquote><strong>곱집합</strong>: 조인 조건을 지정하지 않고 두 테이블을 조인하면 반환되는 행의 수는 첫 번째 테이블의 행 수에 두 번째 테이블의 행 수를 곱한 개수가 된다.</blockquote>
      <p>이해를 위해 다음과 같은 <code>SELECT</code> 문의 결과를 살펴보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT vend_name, prod_name, prod_price<br>
        FROM Vendors, Products;
      </code></pre>      
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>vend_name</th><th>prod_name</th><th>prod_price</th></tr>
          </thead>
          @php
            $data = DB::table('Vendors')                      
                      ->crossjoin('Products')
                      ->select('vend_name', 'prod_name', 'prod_price')
                      ->get()
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->vend_name}}</td><td>{{$lt->prod_name}}</td><td>{{$lt->prod_price}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>일반적으로 이런 곱집합인 결과를 원하는 경우는 거의 없을 것이다. 모든 제품을 모든 공급업체와 짝지은 것으로, 공급업체와 제품사이의 관계가 무시되기 때문에 공급업체와 제품이 서로 맞지 않는 경우까지 모두 포함된다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> WHERE 절을 잊지 말자.</h4>
        <p>모든 조인에는 WHERE 절이 있어야 하며, 그렇지 않으면 여러분이 원하는 데이터보다 훨씬 많고 의미 없는 데이터가 반환된다. 마찬가지로 WHERE 절이 정확한지도 확인해야 한다. 잘못된 필터 조건을 입력하면 DBMS 에서 잘못된 데이터가 반환된다.</p>
        <h4><span class="badge badge-secondary">TIP</span> Cross 조인</h4>
        <p>곱집합을 결과로 반환하는 조인의 종류를 Cross 조인이라고 한다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">내부 조인</h4>
  <section>
    <article>
      <p>지금까지 살펴본 조인은 동등 조인(equijoin)으로, 두 테이블을 대상으로 동일성 테스트를 하여 그 결과를 기준으로 조인을 하게 된다. 이러한 조인을 내부 조인(Inner Join)이라고도 부른다. 내부 조인임을 명확하게 지정할 경우 전과는 약간 다른 구문이 사용된다. 예를 들어 구문은 다르지만 다음 <code>SELECT</code> 문의 결과는 전에 살펴본 문과 동일하다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT vend_name, prod_name, prod_price<br>
        FROM Vendors, INNER JOIN Products<br>
        ON Vendors.vend_id = Products.vend_id
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
          <table class="table-sm">
            <thead>
              <tr><th>vend_name</th><th>prod_name</th><th>prod_price</th></tr>
            </thead>
            @php
              $data = DB::table('Vendors')                      
                        ->join('Products', 'Vendors.vend_id', '=', 'Products.vend_id')
                        ->select('vend_name', 'prod_name', 'prod_price')
                        ->get()
            @endphp
            <tbody>
              @foreach($data as $lt)
              <tr><td>{{$lt->vend_name}}</td><td>{{$lt->prod_name}}</td><td>{{$lt->prod_price}}</td></tr>
              @endforeach
            </tbody>
          </table>
        </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 문의 <code>SELECT</code> 문은 앞서 살펴본 것과 동일하지만 <code>FROM</code> 절이 다르다. 두 테이블 사이의 관계가 <code>FROM</code> 절 내에서 <code>INNER JOIN</code>을 사용해 지정되고 있다. 이런 방식으로 조인 조건을 지정할 때는 <code>WHERE</code> 절 대신 <code>ON</code> 절이 사용되며, 뒤에 이어지는 조건 자체는 <code>WHERE</code> 절을 사용할 때와 동일하다.</p>

      <p>둘 중 어떤 구문이 더 선호되는 방식인지는 DBMS에 따라 다르므로 현재 사용하고 있는 DBMS 의 설명서를 참조한다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> "올바른" 구문</h4>
        <p>ANSI SQL 규약에 따르면 INNER JOIN을 사용하는 구문이 정식 구문이라고 할 수 있다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">여러 테이블의 조인</h4>
  <section>
    <article>
      <p>SQL에서는 <code>SELECT</code> 내에서 조인할 수 있는 테이블의 수에 제한을 두지 않고 있다. 즉 테이블 개수에 관계없이 규칙은 같다. 먼저 테이블을 나열하고, 그 다음 테이블 사이의 관계를 정의하면 된다.</p>
      <p>예를 들어보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT prod_name, vend_name, prod_price, quantity<br>
        FROM OrderItems, Products, Vendors<br>
        WHERE Products.vend_id = Vendors.vend_id<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AND OrderItems.prod_id = Products.prod_id<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AND order_num = 20007;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>prod_name</th><th>vend_name</th><th>prod_price</th><th>quantity</th></tr>
          </thead>
          @php
            $data = DB::table('OrderItems')
                      ->join('Products', 'OrderItems.prod_id', '=', 'Products.prod_id')
                      ->join('Vendors', 'Products.vend_id', '=', 'Vendors.vend_id')
                      ->where('order_num', 20007)->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr>
              <td>{{$lt->prod_name}}</td>
              <td>{{$lt->vend_name}}</td>
              <td>{{$lt->prod_price}}</td>
              <td>{{$lt->quantity}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예에서 표시된 각 항목은 주문 번호가 20007인 것으로, 주문 번호는 OrderItems 테이블에 저자되어 있으며 각 제품은 product ID 를 기준으로 Products 테이블을 참조하게 된다. 또 제품은 vendor ID 를 기준으로 Vendors 테이블에 있는 공급업체에 연결된다. <code>FROM</code> 절에 세 개의 테이블이 있고 <code>WHERE</code> 절에서 세 테이블 간의 관계를 정의하고 있는 것이다. <code>WHERE</code> 절의 마지막 부분은 주문 번호가 20007인 항목을 걸러내기 위한 필터 역할을 하고 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> 성능을 위한 고려 사항</h4>
        <p>DBMS 는 지정된 각 테이블 간의 관계를 기준으로 런타임에 조인을 수행한다. 이러한 작업은 자원을 많이 소모하므로 불필요한 조인은 하지 않아야 한다. 테이블을 더 조인할 수록 성능은 떨어진다.</p>
        <h4><span class="badge badge-secondary">주의</span> 조인할 수 있는 테이블의 최대 수</h4>
        <p>SQL에서는 조인할 수 있는 테이블 수에 제한을 두고 있지 않지만 DBMS 마다 자체적인 제한이 있는 경우가 많다. 이에 대해서는 각 DBMS 설명서를 참고하기 바란다.</p>
      </div>

      <p>이제 11장에서 설명한 다음 예를 다시 살펴보자. <code>SELECT</code> 문에서 RGAN01이라는 제품을 주문한 고객의 목록을 반환하는 예이다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_name, cust_contact<br>
        FROM Customers<br>
        WHERE cust_id IN (SELECT cust_id<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FROM Orders<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE order_num IN (SELECT order_num<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FROM OrderItems<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE prod_id = 'RGAN01'));
      </code></pre>

      <p>11장에서 설명했듯 복잡한 <code>SELECT</code> 작업을 하는 데 하위 쿼리가 항상 가장 효율적인 방븝은 아니다. 조인을 사용하면 다음과 같이 보다 효율적인 작업이 가능하다.</p>
      
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_name, cust_contact<br>
        FROM Customers, Orders, OrderItems<br>
        WHERE Customers.cust_id = Orders.cust_id<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AND OrderItems.order_num = Orders.order_num<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AND prod_id = 'RGAN01';
      </code></pre> 
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_name</th><th>cust_contact</th></tr>
          </thead>
          @php
            $data = DB::table('Customers')
                      ->join('Orders', 'Customers.cust_id', '=', 'Orders.cust_id')
                      ->join('OrderItems', 'OrderItems.order_num', '=', 'Orders.order_num')
                      ->where('prod_id', 'RGAN01')->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_name}}</td><td>{{$lt->cust_contact}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>11장에서 설명했듯이 이 쿼리에서 필요한 데이터를 반환하려면 세 개의 테이블이 필요하다. 하지만 전에 중첩된 하위 쿼리를 사용했던 것과 달리 이번에는 두 개의 조인을 사용하여 테이블을 연결하였다. 조인 조건은 <code>WHERE</code> 절에 지정되에 있는데, 첫 번째는 두 테이블을 조인하고, 두 번째는 RGAN01이라는 제품을 필터링 하기 위해 쓰였다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 실험이 필요하다.</h4>
        <p>이와 같이 필요한 결과를 위해 사용할 수 있는 SQL이 한 가지만 있는 것은 아니며, 어떤 것이 맞고 어떤 것이 틀리다고는 말하기 힘들다. 가장 중요한 것은 성능으로, 사용하는 DBMS,테이블의 데이터 양, 인덱스나 키 사용 여부, 다른 조건 등을 모두 고려해야 한다. 따라서 가장 좋은 방법은 몇 가지 메커니즘을 만든 뒤 어떤 것이 가장 좋은지 실험해보는 것이다.</p>
      </div>
    </article>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>조인은 SQL의 가장 중요하고 강력한 기능 중 하나이며 이를 위해서는 관계형 데이터베이스 디자인의 기본을 이해해야 한다. 이 단원에서는 관계형 데이터베이스 디자인의 기본에 대해 소개하고 조인에 대해 살펴보았다. 가장 자주 사용되는 형식으로 내부 조인이라고도 부르는 동등 조인에 대해 배웠으며, 다음 단원에서는 다른 종류의 조인에 대해 살펴볼 것이다.</p>
    </article>
  </section>
</div>