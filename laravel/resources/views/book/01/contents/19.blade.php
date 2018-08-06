<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 뷰란 무엇이며 어떻게 작동하는지, 그리고 어떻게 사용되는지 알아볼 것이다. 뷰를 사용하면 지금까지 설명한 몇 가지 SQL 작업이 상당히 단순해질 수 있다는 사실도 알게 될 것이다.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 뷰의 이해
  </h3>
  <section>
    <article>
      <p>뷰는 가상 테이블이다. 데이터를 담고 있는 테이블과는 달리 뷰는 쿼리만을 담고 있으며 필요할 때마다 동적으로 데이터를 가져온다.</p>
      <p>뷰를 이해하는 가장 좋은 방법은 예를 보는 것이다. 12장 '테이블 조인'에서 소개했던 다음과 같은 <code>SELECT</code> 문을 떠올려보자. 세 개의 테이블에서 데이터를 가져오는 <code>SELECT</code> 문의 예이다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_name, cust_contact<br>
        FROM Customers, Orders, OrderItems<br>
        WHERE Customers.cust_id = Orders.cust_id<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AND OrderItems.order_num = Orders.order_num<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AND prod_id = 'RGAN01';
      </code></pre>
      <p>이 쿼리는 특정한 제품을 주문한 고객의 정보를 얻기 위한 것으로, 이 데이터를 얻으려면 테이블 구조와 쿼리 작성 방법, 그리고 테이블 조인 방법 역시 알아야 한다. 또한 다른 제품(또는 여러 제품)에 대한 동일한 데이터를 얻으려면 마지막 <code>WHERE</code> 절을 수행해야 한다.</p>
      <p>이러한 전체 쿼리를 ProductCustomers 라는 가상 테이블로 묶는다고 가정해보자. 이제 <code>SELECT</code> 문이 보다 간결해진다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_name, cust_contact<br>
        FROM ProductCustomers<br>
        WHERE prod_id = 'RGAN01';
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>뷰는 바로 이러한 용도로 사용된다. ProductCustomers 는 뷰이며 뷰는 아무런 열이나 데이터를 포함하지 않고 대신에 쿼리를 포함한다. 즉 여러 테이블을 조인하는 데 사용되던 쿼리를 포함하여 필요할 때마다 실행하고 데이터를 가져오는 것이다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 모든 DBMS에서 같다.</h4>
        <p>뷰를 만드는 구문은 모든 대부분의 DBMS에서 동일하므로 안심하고 사용해도 된다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">뷰를 왜 사용하는가?</h4>
  <section>
    <article>
      <p>뷰를 사용하는 한 가지 이유는 이미 살펴보았고, 이제 나머지 쓰임에 대해 살펴보자</p>
      <ul>
        <li>SQL 문을 재사용하기 위해</li>
        <li>복잡한 SQL 작업을 단순화시키기 위해 - 쿼리를 일단 작성해 두면 이 쿼리에 대한 세부 내용을 알 필요 없이 재사용하는 것이 가능하다.</li>
        <li>테이블 전체가 아닌 일부만 활용하기 위해</li>
        <li>데이터를 보호하기 위해 - 테이블 전체 대신 일부에서만 액세스 가능하도록 사용자를 제한할 수 있다.</li>
        <li>데이터 포맷팅과 표현을 변경하기 위해 - 뷰를 사용하면 원래 데이터와는 다르게 포맷팅하고 표현하여 반환할 수 있다.</li>
      </ul>
      <p>대부분의 경우 일단 뷰를 만들어두면 테이블과 같은 방법으로 사용할 수 있다. <code>SELECT</code> 문을 수행하거나 필터링 또는 정렬도 가능하고, 다른 뷰나 테이블과 조인하거나 데이터 추가 및 업데이트도 가능하다. 추가와 업데이트의 경우 약간의 제한이 있는데 이에 대해서는 다시 설명할 것이다.</p>
      <p>여기서 기억해 두어야 할 중요한 점은 어딘가에 저장된 데이터에 대한 '보기(view)'라는 것이다. 뷰는 자체적으로는 아무런 데이터를 포함하지 않으며 단지 다른 테이블에서 데이터를 가져와 우리가 볼 수 있게 해줄 뿐이다. 테이블에 데이터가 추가되거나 변경되면 뷰는 이렇게 추가 또는 변경된 데이터를 보여주게 된다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> 성능 문제</h4>
        <p>뷰는 데이터를 포함하지 않기 때문에 뷰를 볼 때마다 쿼리를 실행하여 데이터를 가져오는 작업이 실행된다. 여러 조인과 필터를 사용하는 복잡한 뷰를 만들거나 뷰를 중첩하면 성능이 상당히 떨어질 수 있으므로 실제 응용 프로그램에 활용할 때는 먼저 충분한 테스트 실행을 거쳐야 한다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">뷰 규칙과 제한 사항</h4>
  <section>
    <article>
      <p>뷰를 만들기 전에 알아두어야 할 제한 사항이 있다. 이러한 제한 사항은 DBMS에 따라 크게 다르기 때문에 먼저 각 DBMS의 설명서를 읽어보기 바란다.</p>
      <p>뷰를 만들고 사용하는 데 관련된 몇 가지 일반적인 규칙은 다음과 같다.</p>
      <ul>
        <li>테이블과 마찬가지로 뷰의 이름은 고유해야 한다. 즉 다른 테이블이나 뷰와 동일한 이름을 가질 수 없다.</li>
        <li>만들 수 있는 뷰의 수에는 제한이 없다.</li>
        <li>뷰를 만들려면 보안 액세스가 필요하다. 이 권한은 대개 데이터베이스 관리자에게 부여된다.</li>
        <li>뷰는 중첩할 수있다. 즉 다른 뷰를 통해 데이터를 가져오는 쿼리를 사용하여 뷰를 만들 수 있다. 중첩할 수 있는 한계는 DBMS에 따라 다르며, 이러한 중첩은 쿼리의 성능을 크게 저하시키므로 실제 환경에 적용하기 전에 테스트 실행이 반드시 필요하다.</li>
        <li>뷰 쿼리에서 <code>ORDER BY</code> 절을 사용하는 것은 많은 DBMS에서 제한된다.</li>
        <li>읿 DBMS에서는 가져오는 모든 열에 이름을 지정해야 한다. 따라서 열이 계산 필드일 경우는 별칭을 사용할 필요가 있다, 열 별칭에 대한 내용은 7장을 참고하기 바란다.</li>
        <li>뷰에는 인덱스를 지정할 수 없으며 트리거나 기본값 역시 연계하여 사용할 수 없다.</li>
        <li>일부 DBMS에서는 뷰를 읽기 전용 쿼리로 취급한다. 따라서 뷰룰 사용하여 데이터를 볼 수는 있으나 기반이 되는 테이블에 데이터를 보내는 것은 불가능하다. 자세한 내용은 각각의 DBMS 설명서를 참고한다.</li>
        <li>일부 DBMS에서는 특정 행에 삽입이나 업데이트 작업을 했을 때 이로 인해 뷰에서 이 행이 제외되는 상황이 발생할 경우 이러한 삽입이나 업데이트 작업을 할 수 없도록 제한하고 있다. 예를 들어 전자 메일 주소가 있는 고객만을 가져오는 뷰가 있을 때 특정한 고객의 전자 메일 주소를 지우도록 업데이트하면 이 행은 뷰에서 가져오는 조건에 맞지 않게 되므로 이러한 작업을 할 수 없다. 대부분의 DBMS 에서는 이러한 작업도 가능하도록 허용하지만 그렇지 않은 경우도 있으니 주의하자.</li>
      </ul>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 각 DBMS의 설명서를 참고하자.</h4>
        <p>관련된 규칙이 많고 또 각 DBMS에서 제한하는 특별한 규칙들이 있을 것이므로 뷰를 만들기 전에 각 DBMS의 서령서를 읽어 보는 것이 필수적이다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 뷰 만들기
  </h3>
  <section>
    <article>
      <p>뷰가 무엇인지 알았으며 관련된 규칙과 제한에 대해서도 배웠으므로 이제 뷰를 만들어보자.</p>
      <p>뷰는 <code>CREATE VIEW</code> 문을 사용하여 만들 수 있다. <code>CREATE TABLE</code>과 마찬가지로 이 문은 이미 존재하지 않는 뷰를 만들 때에만 사용할 수 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span></h4>
        <p>뷰를 삭제하려면 DROP 문을 사용하면 된다. 구문은 간단하며 'DROP VIEW 뷰이름'으로 지정하면 된다.</p>
        <p>기존의 뷰를 덮어쓰거나 업데이트하려면 먼저 기존의 것을 지우고 다시 만들어야 한다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">뷰를 사용하여 복잡한 조인을 단순화</h4>
  <section>
    <article>
      <p>뷰의 가장 일반적인 용도는 복잡한 SQL을 숨기는 것으로, 조인과 관련되어 많이 사용된다. 다음 문을 보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE VIEW ProductCustomers AS<br>
        SELECT cust_name, cust_contact, prod_id<br>
        FROM Customers, Orders, OrderItems<br>
        WHERE Customers.cust_id = Orders.cust_id<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AND OrderItems.order_num = Orders.order_num;
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 문은 ProductCustomers라는 이름의 뷰를 만든다. 이 뷰는 세 개의 테이블을 조인하여 제품을 주문한 모든 고객의 목록을 반환한다. <code>SELECT * FROM ProductCustomers</code> 를 실행하면 원하는 목록을 얻을 수 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> CREATE VIEW 와 SQL Server</h4>
      <p>다른 SQL 문과는 달리 Microsoft SQL server에서는 CREATE VIEW 문 뒤에 세미콜론을 사용할 수 없다.</p>
      </div>
      <p>RGAN01 이라는 제품을 주문한 고객의 목록을 얻으려면 다음과 같은 문을 실행하면 된다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_name, cust_contact<br>
        FROM ProductCustomers<br>
        WHERE prod_id = 'RGAN01';
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
                      ->select('cust_name', 'cust_contact')
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
      <p>이 문은 <code>WHERE</code> 절을 실행하여 특정한 뷰를 통해 데이터를 가져온다. DBMS에서 이 요청이 실행되면 뷰 쿼리에 이미 있던 <code>WHERE</code> 절이 이 <code>WHERE</code> 절을 추가하여 데이터가 올바르게 필터링 되도록 조정한다.</p>
      <p>이와 같이 뷰를 사용하면 복잡한 SQL 문을 아주 간단하게 표현할 수 있다. 정확히 말하자면 복잡하게 만들어두고 뷰로 감추는 것이다. 일단 감춰진 내용은 간단한 뷰를 통해 편리하게 사용될 수 있다. 뷰를 사용하면 기반이 되는 SQL 을 한 번 작성해두고 필요할 때마다 다시 사용할 수 있는 것이다.</p>

      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 재사용이 가능한 뷰 만들기</h4>
        <p>뷰는 특정한 데이터에만 한정되지 않게 만드는 것이 좋다. 예를 들어 앞서 만든 뷰는 RGAN01 뿐 아니라 모든 제품에 대해 사용할 수 있다. 뷰의 범위를 넓히면 재사용 가능성도 늘어나며 그만큼 더 유용해진다. 또한 유사한 여러 뷰를 만들어야 하는 수고도 덜 수 있다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">가져온 데이터의 포맷팅 재지정을 위해 뷰를 사용</h4>
  <section>
    <article>
      <p>앞서 설명했듯이 뷰의 또 다른 쓰임 중 하나는 가져온 데이터의 포맷팅을 다시 지정하는 것이다. 7장에서 소개했던 다음 <code>SELECT</code> 문을 살펴보자. 이 <code>SELECT</code> 문은 결합된 하나의 계산 열을 사용해서 공급업체의 이름과 위치를 반환한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT RTRIM(vend_name) + ' (' + RTRIM(vend_country) + ')' AS vend_title<br>
        FROM Vendors<br>
        ORDER BY vend_name;
      </code></pre>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>vend_title</th></tr>
          </thead>
          @php
            $data = DB::table('Vendors')
                      ->select('vend_name', 'vend_country')
                      ->orderBy('vend_name')->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->vend_name.' ('.$lt->vend_country.')'}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <p>같은 문이지만 <code>||</code>를 대신 사용하면 다음과 같다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT RTRIM(vend_name) || '(' || RTRIM(vend_country) || ')' AS vend_title<br>
        FROM Vendors<br>
        ORDER BY vend_name;
      </code></pre>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>vend_title</th></tr>
          </thead>
          @php
            $data = DB::table('Vendors')
                      ->select('vend_name', 'vend_country')
                      ->orderBy('vend_name')->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->vend_name.' ('.$lt->vend_country.')'}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <p>이러한 형식의 결과가 주기적으로 필요하다고 가정해보자. 필요할 때마다 문자열을 결합할 것이 아니라, 뷰를 만들어서 사용하는 것이 좋다. 이 문을 뷰로 바꾸면 다음과 같다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE VIEW VendorLocations AS<br>
        SELECT RTRIM(vend_name) + ' (' + RTRIM(vend_country) + ')' AS vend_title<br>
        FROM Vendors;
      </code></pre>
      <p><code>||</code>을 사용한 버전은 다음과 같다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE VIEW VendorLocations AS<br>
        SELECT RTRIM(vend_name) || ' (' || RTRIM(vend_country) || ')' AS vend_title<br>
        FROM Vendors;
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 문은 앞서 설명한 <code>SELECT</code> 문과 동일한 쿼리를 만든다. 만약 우편물 발송을 위해 모든 공급업체의 주소가 필요하다면 다음과 같이 실행하면 된다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT *<br>
        FROM VendorLocations;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
            <thead>
              <tr><th>vend_title</th></tr>
            </thead>
            @php
              $data = DB::table('Vendors')
                        ->select('vend_name', 'vend_country')
                        ->orderBy('vend_name')->get();
            @endphp
            <tbody>
              @foreach($data as $lt)
              <tr><td>{{$lt->vend_name.' ('.$lt->vend_country.')'}}</td></tr>
              @endforeach
            </tbody>
          </table>
      </code></pre>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> SELECT 제한 사항은 모두에 적용된다.</h4>
        <p>뷰를 만드는 데 사용되는 구문은 모든 DBMS에서 일정하다고 이 단원 앞부분에서 설명한 적이 있다. 그렇다면 왜 여러 버전의 문을 만들까? 뷰는 SELECT 문을 담고 있으며 SELECT 문의 구문이 DBMS 마다 다르기 때문이다.</p>
      </div>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>내용 입력</p>
    </article>
  </section>

  <h4 class="sub-header">불필요한 데이터 필터링을 위해 뷰를 사용</h4>
  <section>
    <article>
      <p>뷰는 일반적인 <code>WHERE</code> 절을 적용하는 데도 유용하다. 예를 들어 CustomerEMailList라는 뷰를 정의하여 전자 메일 주소가 없는 모든 고객을 걸러내려면 다음과 같은 문을 만들면 된다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE VIEW CustomerEMailList AS<br>
        SELECT cust_id, cust_name, cust_email<br>
        FROM Customers<br>
        WHERE cust_email IS NOT NULL;
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>메일 목록에 있는 사용자에게 전자 메일을 보낸다면 분명 전자 메일 주소가 없는 사용자는 메일 목록에서 제외해야 할 것이다. 이 <code>WHERE</code> 절이 바로 그러한 역할을 한다. cust_email 열에 <code>NULL</code> 값이 있는 행을 모두 걸러내어 선택되지 않도록 하는 것이다.</p>
      <p>CustomerEMailList 뷰는 테이블과 같은 방법으로 사용될 수 있다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT *<br>
        FROM CustomerEMailList;
      </code></pre>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_id</th><th>cust_name</th><th>cust_email</th></tr>
          </thead>
          @php
            $data = DB::table('Customers')
                      ->select('cust_id', 'cust_name', 'cust_email')
                      ->where('cust_email', '!=', NULL)->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_id}}</td><td>{{$lt->cust_name}}</td><td>{{$lt->cust_email}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> WHERE 절과 WHERE 절</h4>
        <p>뷰에서 데이터를 가져올 때 WHERE 절을 사용한 경우, 뷰 자체 있던 WHERE 절과 새로 지정한 WHERE 절은 자동으로 결합된다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">계산 필드와 함께 뷰 사용</h4>
  <section>
    <article>
      <p>뷰는 계산 필드의 사용을 단순화할 때도 아주 유용하다. 7장에서 설명했던 다음과 같은 <code>SELECT</code> 문을 떠올려보자. 이 문은 특정한 번호의 주문 항목을 가져와 총 금액을 계산한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT prod_id,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;quantity,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;item_price,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;quantity*item_price AS expanded_price<br>
        FROM OrderItems<br>
        WHERE order_num = 20008;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>prod_id</th><th>quantity</th><th>item_price</th><th>expanded_price</th></tr>
          </thead>
          @php
            $data = DB::table('OrderItems')
                      ->select('prod_id', 'quantity', 'item_price', DB::raw('quantity*item_price AS expanded_price'))
                      ->where('order_num', 20008)->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_id}}</td><td>{{$lt->quantity}}</td><td>{{$lt->item_price}}</td><td>{{$lt->expanded_price}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <p>이를 뷰로 바꾸려면 다음과 같이 실행하면 된다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE VIEW OrderItemsExpanded AS<br>
        SELECT order_num,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;prod_id<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;quantity,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;item_price,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;quantity*item_price AS expanded_price<br>
        FROM OrderItems;
      </code></pre>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT *<br>
        FROM OrderItemsExpanded<br>
        WHERE order_num = 20008;
      </code></pre>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>prod_id</th><th>quantity</th><th>item_price</th><th>expanded_price</th></tr>
          </thead>
          @php
            $data = DB::table('OrderItems')
                      ->select('prod_id', 'quantity', 'item_price', DB::raw('quantity*item_price AS expanded_price'))
                      ->where('order_num', 20008)->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_id}}</td><td>{{$lt->quantity}}</td><td>{{$lt->item_price}}</td><td>{{$lt->expanded_price}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <p>이와 같이 뷰는 만들기 쉽고 사용하기도 쉽다. 올바르게 사용하면 복잡한 데이터 작업을 아주 간단하게 만들어준다.</p>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>뷰는 가상 테이블이다. 뷰는 데이터를 포함하지 않으며 데이터를 가져오는 데 필요한 쿼리만 포함한다. 뷰는 SQL <code>SELECT</code> 문에 대한 일종의 캡슐화이며 데이터 작업을 단순화하고 기반 데이터의 포맷팅 재지정이나 보안에도 응용될 수 있다.</p>
    </article>
  </section>
</div>