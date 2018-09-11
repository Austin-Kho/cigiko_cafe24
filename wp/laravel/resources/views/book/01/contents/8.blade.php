<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 계산 필드가 무엇이며 어떻게 만드는지, 그리고 응용 프로그램에서 별칭을 사용하여 계산 필드를 참조하는 방법을 알아보자.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 계산 필드의 이해
  </h3>
  <section>
    <article>
      <p>데이터베이스 테이블에 저장되어 있는 데이터가 으용 프로그램에 필요한 형식이 아닌 경우가 있다. </p>
      <ul>
        <li>회사의 이름과 위치를 포함하는 필드를 표시해야 하는데, 이 두 값이 별도의 테이블 열에 저장되어 있다.</li>
        <li>시, 도, 우편번호가 별도의 열에 저장되어 있으나, 우편물 발송 프로그램에서 이를 결합하여 적절한 필드로 만들어야 한다.</li>
        <li>열 데이터의 대소문자가 혼합되어 있으나 보고서에서 모두 대문자로 표시해야 한다.</li>
        <li>주문 항목 테이블에 각 항목의 가격과 수량이 저장되어 있으나 합계 금액은 없으므로 인보이스를 발행하려면 이를 곱해야 한다.</li>
        <li>테이블 데이터를 기반으로 합계, 평균 등을 계산해야 한다.</li>
      </ul>

      <p>이런 모든 경우, 응용 프로그램에서 필요한 형식과 데이터베이스 테이블에 저장되어 있는 형식이 다르기 때문에 무언가 조치가 필요하다. 이럴 때 계산 필드가 유용하다. 지금까지 살펴본 열과는 달리, 계산 필드는 실제로 데이터베이스에 존재하는 것은 아니며 SQL <code>SELECT</code> 문 내에서 곧바로 생성되는 것이다.</p>

      <blockquote><strong>필드</strong>: 열과 같은 의미이며 어떤 것을 사용해도 무방하다. 하지만 대개 데이터베이스 열을 열이라 부르며, 필드는 계산 필드를 사용할 때 흔히 부르는 용어이다.</blockquote>

      <p><code>SELECT</code> 문 중에 어떤 열이 실제 테이블 열이고 어떤 열이 계산된 필드인지는 데이터베이스밖에 모른다. 클라이언트 입장에서는 계산 필드 역시 어떠한 방식으로든 데이터베이스에서 가져온 데이터로 보일 뿐이다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 클라이언트 포맷팅과 서버 포맷팅</h4>
        <p>SQL 문에서 이루어지는 벼니환이나 포맷 재지정 작업은 클라이언트 응용 프로그램에서 직접 수행할 수도 있지만 이 작업을 데이터베이스 서버에서 수행하는 것이 빠른 경우가 많다. 이는 DBMS 가 이러한 작업을 빠르고 효율적으로 수행할 수 있도록 설계되어 있기 때문이다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 필드의 결합
  </h3>
  <section>
    <article>
      <p>계산 필드를 사용하는 방법을 설명하기 위해 간단한 예를 들어보자. 두 열로 이루어진 제목을 만들어 볼 것이다.</p>
      <p>Vender 테이블에는 공급업체 이름과 주소 정보가 있다. 공급업체 보고서를 만들기 위해 공급 업체의 이름과 위치를 '이름(위치)'의 형식으로 표시해야 한다고 가정해보자.</p>
      <p>보고서에는 하나의 값이 필요하고, 이 값은 vend_name 과 vend_country 라는 두 열로 나뉘어 테이블에 저장되어 있다. 그리고 vend_country 는 괄호로 둘러싸야 하는데 이는 데이터베이스 테이블에 저장된 문자는 아니다.</p>
      <p><code>SELECT</code> 문으로 공급업체의 이름과 위치를 얻는 것은 쉽지만 이 값을 어떻게 결합해야 할까?</p>
      <blockquote><strong>결합</strong>: 하나의 긴 값을 만들기 위해 값을 결합하는 것</blockquote>
      <p>해결 방법은 두 열을 결합하는 것이다. SQL <code>SELECT</code> 문에는 이를 위한 특별한 연산자가 있다. 이 연산자는 DBMS 에 따라 다르며, <code>+</code> 기호나 <code>||</code> 기호가 사용된다.</p>

      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> +와 ||</h4>
        <p>Access, SQL Server, Sybase는 + 기호를 통한 결합을 지원하며 DB2, Oracle, PostgreSQL, Sybase 는 || 기호를 통한 결합을 지원한다. ||가 보다 선호되는 기호이기 때문에 이 기호를 지원하는 DBMS 가 더 많다.</p>
      </div>

      <p><code>+</code> 기호를 사용하는 예를 들어보자.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT RTRIM(vend_name) + ' (' + RTRIM(vend_country) + ' )'<br>
        FROM Vendors<br>
        ORDER BY vend_name;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <table class="table-sm">
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
      <p>같은 문이지만 <code>||</code> 기호를 사용하는 경우는 다음과 같다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT RTRIM(vend_name) + ' (' || RTRIM(vend_country) || ' )'<br>
        FROM Vendors<br>
        ORDER BY vend_name;
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
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

      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예에서 <code>SELECT</code> 문은 다음 요소를 결합한다.</p>
      <ul>
        <li>vend_name 열에 저장된 이름</li>
        <li>공백과 여는 괄호를 포함하는 문자열</li>
        <li>vend_country 열에 저장된 국가 이름</li>
        <li>닫는 괄호를 포함하는 문자열</li>
      </ul>
      <p>결과를 통해 알 수 있듯이 <code>SELECT</code> 문은 결합된 하나의 열을 반환하며, 이 열에는 네 개의 요소가 하나로 결합되어 있다. <code>RTRIM()</code>함수는 값의 오른쪽에 있는 모든 공백을 잘라낸다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> MySQL 에서의 결합</h4>
        <p>MySQL 은 <code>+</code> 나 <code>||</code> 를 사용한 결합은 지원하지 않는다. 대신 <code>CONCAT()</code> 함수를 사용하여 각 항목을 결합해야 한다. 예를 들면 다음과 같다.</p>
        <pre><code>SELECT CONCAT(vend_name, ' (', vend_country, ')')</code></pre>
        <p>MySQL 이 <code>||</code> 를 지원하기는 하지만 이는 결합의 의미가 아니며, 연산자 <code>OR</code> 에 해당한다. <code>&&</code> 는 <code>AND</code> 에 해당한다.</p>
        <h4><span class="badge badge-secondary">참고</span> TRIM 함수</h4>
        <p>대부분의 DBMS 는 <code>RTRIM()</code> 함수, 즉 문자열 오른쪽을 자르는 함수를 지원하며, 문자열 왼쪽을 자르는 <code>LTRIM()</code> 역시 지원한다. 왼쪽과 오른쪽 모두를 잘라낼 때는 <code>TRIM()</code> 함수를 사용하면 된다.</p>
      </div>      
    </article>
  </section>



  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 별칭 사용
  </h3>
  <section>
    <article>
      <p>결과를 통해 알 수 있듯이 주소 필드를 결합하는데 <code>SELECT</code> 문은 별 문제 없이 사용되었다. 그렇다면 새로운 이름의 계산 열을 만들려면 어떻게 해야 할까? 사실 이름이란 것은 있을 수 업 수 없고 값만 있을 뿐이다. SQL 쿼리 도구에서 결과로 볼 때는 이렇게 해도 관계 없겠지만 클라이언트 응용 프로그램에서는 이 열을 참조할 방법이 필요하므로 아무래도 이름이 있어야 한다.</p>

      <p>이 문제를 해결하려면 SQL이 지원하는 열 별칭을 사용하면 된다. 별칭이란 필드나 값의 데체 이름으로, <code>AS</code> 키워드를 사용해 지정할 수 있다. 다음 <code>SELECT</code> 문을 살펴보자.</p>
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
                    ->orderBy('vend_name')->get()
        @endphp
        <tbody>
          @foreach($data as $lt)
          <tr><td>{{$lt->vend_name.' ('.$lt->vend_country.')'}}</td></tr>
          @endforeach
        </tbody>
      </table>
    </code></pre>
    <h4><span class="badge badge-pill badge-info">분 석</span></h4>
    <p><code>SELECT</code> 문 자체는 전에 살펴본 코드와 동일하지만 뒤에 <code>AS</code> 키워드가 있고 새로운 이름이 븥어있다는 사실만 다르다. 이는 계산된 필드에 vend_title 이라는 이름을 붙이라는 의미로, 출력 결과에서 볼 수 있듯이 결과는 동일하지만 열의 이름이 vend_title 인 것을 알 수 있다.</p>

    <div class="tip">
      <h4><span class="badge badge-secondary">TIP</span> 별칭의 다른 용도</h4>
      <p>별칭에는 다른 용도가 있는데, 가장 자주 씅는 용도는 실제 테이블 열에 포함된 열에 잘못된 문자(예를 들어 공백)가 있어서 사용할 수 없다거나 원래 이름이 낸하하고 이해하기 어려워 새 이름을 붙이고자 할 때이다.</p>
      <h4><span class="badge badge-secondary">주의</span> 별칭 이름</h4>
      <p>별칭은 한 단어나 완전한 문자열로 지정할 수 있다. 문자열을 지정할 경우 반드시 따옴표로 묶어 주어야 한다. 사실 이렇게 문자열을 이용하면 읽기는 좋지만 클라이언트 응용프로그램에서는 여러 문제를 일으킬 수 있으므로 가능하면 한 단어로 된 이름을 사용하는 것이 좋다. 실제로 별칭이 자주 사용되는 경우가 바로 원래 열 이름이 긴 문자열로 되어 있어서 간략히 줄일 때이다.</p>
      <h4><span class="badge badge-secondary">참고</span> 파생된 열</h4>
      <p>별칭을 파생된 열이라고 부르기도 한다. 어떤 용어를 사용하던지 의미는 같다.</p>
      </div>  
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 수학적 계산 
  </h3>
  <section>
    <article>
      <p>계산 필드의 또 한 가지 주요 용도는 얻어진 데이터를 사용하여 수학적인 계산이 필요한 경우이다. 예를 들어 받은 주문이 Orders 테이블에 있고, 각 주문에 대한 개별 품목은 OrderItems 테이블에 있을 경우 다음과 같은 SQL 문으로 주문 번호 20008 인 모든 품목을 가져올 수 있다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT prod_id, quantity, item_price<br>
        FROM OrderItems<br>
        WHERE order_num = 20008;
      </code></pre>
      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>prod_id</th><th>quantity</th><th>item_price</th></tr>
          </thead>
          @php
            $data = DB::table('OrderItems')
                      ->select('prod_id', 'quantity', 'item_price')
                      ->where('order_num', 20008)->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_id}}</td><td>{{$lt->quantity}}</td><td>{{$lt->item_price}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <p>item_price 열에 주문된 각 품목의 단가가 있으므로 주문 금액을 계산하려면 다음과 같이 단가와 수량을 곱하면 된다.</p>

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
                      ->select('prod_id', 'quantity', 'item_price', DB::raw('quantity*item_price as expanded_price'))
                      ->where('order_num', 20008)->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr>
              <td>{{$lt->prod_id}}</td>
              <td>{{$lt->quantity}}</td>
              <td>{{$lt->item_price}}</td>
              <td>{{$lt->expanded_price}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>

      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>expanded_price 열이 바로 계산 필드이다. 계산 방법은 quantity*item_price 로 매우 간단하며, 클라이언트 응용프로그램에서는 이 계산 필드를 다른 열처럼 편리하게 사용할 수 있다.</p>
      <p>SQL 은 표 7.1에 나열되어 있는 간단한 수학 연산자를 지원하며, 연산의 순서를 지정할 때는 괄호를 사용할 수도 있다. 괄호를 사용한 순서 지정은 5장 '고급 데이터 필터링'을 참고하기 바란다.</p>
      <h5>표 7.1 SQL 수학 연산자</h5>
      <table class="table table-sm">
        <thead>
          <tr><th>연산자</th><th>설명</th></tr>
        </thead>
        <tbody>
          <tr><td>+</td><td>더하기</td></tr>
          <tr><td>-</td><td>빼기</td></tr>
          <tr><td>*</td><td>곱하기</td></tr>
          <tr><td>/</td><td>나누기</td></tr>
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
      <p>이 단원에서는 계산 필드가 무엇이며 어떻게 만드는지 배웠다. 문자열 결합과 수학 연산을 위한 몇 가지 예를 살펴보았으며 별칭을 만들어 계산 필드에 이름을 붙이는 방법도 배웠다.</p>
    </article>
  </section>
</div>