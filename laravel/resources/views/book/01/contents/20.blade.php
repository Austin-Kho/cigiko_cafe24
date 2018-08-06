<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 저장 프로시저란 무엇이며 왜 사용하는지, 그리고 어떻게 사용되는지 배울 것이다. 또한 저장 프로시저를 만들고 사용하는 데 관련된 기본적인 구문에 대해서도 살펴볼 것이다.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 저장 프로시저의 이해
  </h3>
  <section>
    <article>
      <p>지금까지 우리가 살펴본 대부분의 SQL 구문은 아주 간단한 것이었으며 하나 이상의 테이블에 대해 수행하는 간단한 문이었다. 하지만 실제 작업은 이처럼 간단하지 않은 경우가 많으며 여러 문을 결합하여 완전한 작업을 해야 하는 경우가 있다. 다음과 같은 경우를 생각해보자.</p>
      <ul>
        <li>주문을 처리하기 위해 모든 물량이 재고에 있는지 확인해야 한다.</li>
        <li>모든 물량이 재고에 있다면 일단 처리 중에 다른 사람에게 팔리지 않도록 하고, 주문량만큼 수량을 감소시켜 재고를 관리해야 한다.</li>
        <li>재고에 없는 항목은 주문해야 한다. 즉 공급업체에 연락하여 이 물품을 받아야 한다.</li>
        <li>물품이 재고에 있을 경우 고객에게 알리고 곧바로 배송해야 한다.</li>
      </ul>
      <p>아주 복잡한 예는 아니지만 지금까지 설명한 예보다는 복잡하다. 이러한 작업을 수행하려면 여러 테이블을 대상으로 많은 SQL 문을 실행해야 할 것이며 실행할 SQL 문의 내용과 순서는 상황에 따라 달라지므로 고정되어 있지 않다. </p> <p>이런 경우 저장 프로시저를 만들면 편리하다. 저장 프로시저는 하나 이상의 SQL 문을 나중에 사용하기 위해 편리하게 저장해 둔 것으로, 간단하게 배치 파일이라고 볼 수도 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> DBMS 지원 여부 확인</h4>
        <p>저장 프로시저의 지원 여부는 각 DBMS 버전에 따라 확인이 필요하다.</p>
        <h4><span class="badge badge-secondary">참고</span> 그 밖에 많은 내용을 알아야 한다.</h4>
        <p>저장프로시저는 복잡하다. 저장 프로시저에 대해 완전하게 다루려면 한 단원으로는 부족하다. 이 단원은 저장 프로시저에 대해 꼭 알아두어야 할 내용만 설명하고 있다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 저장 프로시저를 사용하는 이유
  </h3>
  <section>
    <article>
      <p>저장 프로시저가 무엇인지는 알았다. 그럼 왜 저장 프로시저를 사용하는 걸까? 이유는 여러 가지가 있지만 중요한 이유를 나열하면 다음과 같다.</p>
      <ul>
        <li>복잡한 작업을 사용하기 쉬운 하나의 단위로 묶어 단순화하기 위해</li>
        <li>여러 단계를 계속해서 반복적으로 만들 필요 없이 데이터의 일관성을 유지하기 위해. 모든 개발자와 응용 프로그램이 같은 저장 프로시저를 사용한다면 한 번 만들어놓고 같은 코드를 계속 재활용할 수 있다.</li>
        <li>오류 방지에도 효과가 있다. 수행해야 할 단계가 많아질 수록 오류가 발생할 가능성은 높아지며 오류룰 방지하면 데이터 일관성을 유지하는 데 도움이 된다.</li>
        <li>변경 내용 관리를 단순화 하기 위해. 테이블, 열 이름 또는 비즈니스 로직 등이 변경될 경우 저장 프로시저만 업데이트하면 되며 사용하는 입장에서는 이러한 변화에 신경쓸 필요가 없다. <br><br>이는 보안에도 도움아 된다. 저장 프로시저만 사용하고 기반 데이터에는 액세스할 수 없도록 제한하면 데이터가 훼손되는 것을 방지할 수 있을 것이다.</li>
        <li>저장 프로시저는 컴파일된 형식으로 저장되기 때문에 DBMS가 이 명령을 실행하기 위해 수행하는 작업이 보다 적다. 즉 성능이 개선된다.</li>
        <li>단순한 요청서에서는 사용할 수 없는 SQL 언어 요소와 기능을 저장 프로시저에서는 사용할 수 있으므로 보다 강력하고 유연한 코드 작성이 가능하다.</li>
      </ul>
      <p>즉 단순성 보안, 성능이라는 세 가지 주요한 이점을 얻을 수 있다. 세 가지 모두 중요한 것이며 이로써 저장 프로시저를 사용할 이유는 충분할 것이다. 그렇다면 SQL 코드를 저장 프로시저로 만들어 사용하면 어떠한 단점이 있을까?</p>
      <ul>
        <li>저장 프로시저 구문은 DBMS 에 따라 상당히 다르다. 실제로 모든 DBMS에서 사용 가능한 저장 프로시저를 만들기란 거의 불가능하다. 따라서 여러 DBMS 에서 사용가능한 저장 프로시저를 만들려면 각 DBMS의 차이에 유의하면서 보다 일반적인 방식으로 만들어야만 다른 DBMS 에서 클라이언트 응용 프로그램 코드를 변경하지 않고도 사용할 수 있다.</li>
        <li>저장 프로시저를 사용하는 것은 기본적인 SQL 문을 사용하는 것보다는 복잡하며 이를 위해 더 높은 수준이 기술과 경험이 필요하다. 때문에 많은 데이터베이스 관리자가 저장 프로시저 생성 권한에 대한 보안을 유지하여 아무에게나 허용하지 않도록 하고 있다.</li>
      </ul>
      <p>저장 프로시저가 아주 유용하며 반드시 사용되어야 한단ㄴ 점에는 공감할 것이다. 대부분의 DBMS에서 저장 프로시저를 통한 데이터베이스 및 테이블 관리작업을 지원하고, 미리 만들어진 저장 프로시저를 지원하는 이유가 바로 이 때문이다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> 만들 순 없어도 사용할 순 있다.</h4>
        <p>저장 프로시저를 만드는 권한과 실행하는 권한은 대부분이 DBMS에서 분리되어 있는 경우가 많다. 즉 저장 프로시저를 만들 수는 없어도 적절한 저장 프로시저를 실행하는 것은 가능할 것이다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 저장 프로시저의 실행
  </h3>
  <section>
    <article>
      <p>저장 프로시저는 한 번 이상 실행될 내용을 묶은 것이므로 자주 실행된다. 저장 프로시저를 실행하는 SQL 문은 <code>EXECUTE</code>로, 실행할 저장 프로시저와 이름과 함께 필요한 매개변수를 지정하면 된다. 예를 들어보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        EXECUTE AddNewProduct ('JTS01',<br>
                               'Stuffed Eiffel Tower',<br>
                               6.49,<br>
                               'Plush stuffed toy with the text La Tour Eiffel in red white in red white and blue')
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 문을 실행하면 AddNewProduct 라는 저장 프로시저가 실행된다. 이 저장 프로시저는 Products 테이블에 새 제품을 추가하는 기능을 하는 것으로, 네 개의 매개변수를 취한다. 첫 번째 매개변수인 Vendors 테이블의 기본 키인 vendor ID이며, 나머지는 제품의 이름, 가격, 설명에 해당하는 매개변수이다. 필요한 매개변수는 저장 프로시저를 정의할 때 선언되며, 이와 같이 저장 프로시저를 실행할 때는 그 정의에 맞게 모든 매개변수를 지정해 주어야만 올바르게 실행할 수 있다. 올바르게 실행되면 Products 테이블에 새 행이 추가되고 전달된 매개변수 값대로 열이 채워진다.</p>
      <p>Products 테이블을 보면 값이 필요한 또 하나의 열인 Prod_id 가 있는데, 이 열이 바로 이 테이블의 기본 키이다. 이 값은 왜 저장 프로시저의 매개변수로 전달하지 않았을까? 올바른 ID 생성을 위해서다. ID 는 자동으로 생성되도록 하는 것이 좋으며 사용자가 지정하는 것은 좋지 않다. 이 저장 프로시저가 수행하는 작업은 다음과 같다.</p>
      <ul>
        <li>전달된 데이터를 검사하여 4개 매개변수 모두 값이 있는지 확인한다.</li>
        <li>기본 키로 사용될 고유한 ID를 만든다.</li>
        <li>Products 테이블에 새 제품을 추가하고 자동으로 생성된 기본 키도 절절한 열에 추가한다.</li>
      </ul>
      <p>저장 프로시저 실행의 기본 형식은 이와 같다. 그러나 DBMS에 따라 다음과 같은 추가적인 실행 옵션이 있을 수 있다.</p>
      <ul>
        <li>매개변수가 지정되지 않았을 경우 기본값을 사용할지를 결정하는 선택적인 매개변수</li>
        <li>매개변수 = 값 형식으로 지정되는 비순차적 매개변수</li>
        <li>저장 프로시저에서 응용 프로그램을 실행하기 위해 매개변수를 업데이트할 수 있는 출력 매개변수</li>
        <li>SELECT 문을 통한 데이터 추출</li>
        <li>저장 프로시저에서 응용 프로그램 실행에 값을 반환하는데 사용되는 반환 코드</li>
      </ul>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 저장 프로시저 만들기
  </h3>
  <section>
    <article>
      <p>앞서 설명했듯이 저장 프로시저를 만드는 일은 간단하지 않다. 이 과정이 어떤지 살펴보기 위해 간단한 예를 들어보자. 고객 목록 중에서 전자 메일 주소가 있는 고객의 수를 세는 저장 프로시저를 만들어보자.</p>
      <p>Oracle의 경우 다음과 같이 만들 수 있다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE PROCEDURE MailingListCount<br>
        (ListCount OUT NUMBER)<br>
        IS<br>
        BEGIN<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECT * FROM Customers<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE NOT cust_email IS NULL;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ListCount := SQL%ROWCOUNT;<br>
        END;
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 저장 프로시저는 ListCount 라는 해나의 매개변수만 취한다. 값을 저장 프로시저에 전달하는 대신 이 매개변수는 저장 프로시저로부터 값을 가져오는데, <code>OUT</code> 이라는 키워드가 이 특셩을 설명하고 있다. Oracle은 <code>IN</code>과 <code>OUT</code>, 그리고 <code>INOUT</code>이라는 매개변수 유형을 지원하는데, <code>IN</code>은 저장 프로시저로 값을 전달하는 것이고 <code>OUT</code>은 저장 프로시저에서 값을 가져오는 것이며 <code>INOUT</code>은 저장 프로시저에 값을 전달하면서 가져오기도 하는 것이다. 저장 프로시저 코드는 <code>BEGIN</code>과 <code>END</code> 문을 통해 시작과 끝이 지정되어 있으며 전자 메일 주소가 있는 고객을 가져오기 위한 간단한 <code>SELECT</code> 문이 실행되고 있다. 계산된 값은 ListCount에 저장되어 우리에게 반환된다.</p>
      <p>Microsoft SQL Server의 경우는 다음과 같이 저장 프로시저를 작성할 수 있다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE PROCEDURE MailingListCount<br>
        AS<br>
        DECLARE @cnt INTEGER<br>
        SELECT @cnt = COUNT(*)<br>
        FROM Customers<br>
        WHERE NOT cust_email IS NULL;<br>
        RETURN @cnt;
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 저장 프로시저는 매개변수가 없다. 호출하는 응용 프로그램은 SQL Server의 반환 코드 지원을 통해 값을 가져오기 때문이다. <code>DECLARE</code> 문을 통해 <code>@cnt</code>라는 로컬 변수가 선언되었는데(SQL Server에서 로컬 변수는 앞에 <code>@</code> 이 붙는다), SELECT 문에서 이 변수를 사용하여 <code>COUNT()</code> 함수에서 계산한 값을 넣었다. 마지막으로 <code>RETURN @cnt</code>문을 통해 결과가 반환된다.</p>
      <p>다른 예를 보자. 이번에는 Orders 테이블에 새 주문을 입력해 볼 것이다. 이 예는 SQL Server에서만 작동하지만, 일반적인 저장 프로시저의 쓰임과 기술에 대해 살펴볼 수 있는 좋은 예이다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE PROCEDURE NewOrder @cust_id CHAR(10)<br>
        AS<br>
        -- 주문 번호룰 위한 변수 선언<br>
        DECLARE @order_num INTEGER<br>
        -- 현재 가장 큰 주문 번호를 가져옴
        SELECT @order_num=MAX(order_num)<br>
        FROM Orders<br>
        -- 다음 주문 번호를 계산<br>
        SELECT @order_num=@order_num+1<br>
        -- 새 주문 추가<br>
        INSERT INTO Orders(order_num, order_date, cust_id)<br>
        VALUES(@order_num, GETDATE(), @cust_id)<br>
        -- 주문 번호 반환<br>
        RETURN @order_num;
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 저장 프로시저는 Orders 테이블에 새 주문을 추가한다. 매개변수는 주문을 한 고객의 ID에 해당하는 매개변수 하나 뿐이며 다른 두 테이블 열인 주문 번호와 날짜는 저장 프로시저 자체적으로 자동으로 생성된다. 이 코드에서는 먼저 주문 번호를 저장할 로컬 변수를 선언한 다음 <code>MAX()</code>함수를 사용하여 현재 가장 값이 큰 주문 번호를 찾고, <code>SELECT</code> 문을 사용하여 이 값을 1 늘려 새 주문 번호를 만든 다음 <code>INSERT</code> 문으로 이 주문을 테이블에 추가한다. <code>INSERT</code> 문에서 주문ㅇㄹ 추가할 때는 현재 시스템 날짜(<code>GETDATE()</code> 함수를 사용하여 얻는다)와 전달된 고객 ID가 함께 추가되며, 마지막으로 <code>RETURN</code>문을 통해 <code>@order_num</code>의 값이 반환된다. 이 코드에는 주석이 있음을 알 수 있다. 저장 프로시저를 만들 때는 항상 이렇게 주석을 달아 내용을 이해하기 쉽게 만들어 주는 것이 좋다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 코드에 주석 달기</h4>
        <p>모든 코드에는 주석을 다는 것이 좋으며 저장 프로시저도 마찬가지다. 주석은 성능에 아무런 악영향을 주지 않으며 작성하기 귀찮다는 것을 제외하면 아무런 단점이 없다. 주석을 추가함으로써 얻을 수 있는 이득은 많은데, 스스로와 다른 사람에게 코드를 보다 쉽게 이해할 수 있도록 함은 물론이고 이후에 코드를 바꾸어야 할 때에도 내용을 이해하기 쉽기 때문이다.</p>
        <p>주석을 달 때는 두 개위 하이픈(--)을 쓴 다음 주석을 넣는 것이 보편적인 방법이며, DBMS 마다 다른 경우도 있으므로 직접 찾아보기 바란다.</p>
      </div>
      <p>같은 SQL Sercer 코드의 다른 버전을 준비해 보았다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE PROCEDURE NewOrder @cust_id CHAR(10)<br>
        AS<br>
        -- 새 주문 추가<br>
        INSERT INTO Orders(cust_id)<br>
        VALUES(@cust_id)<br>
        -- 주문 번호 반환<br>
        SELECT order_num = @@IDENTITY;
      </code></pre>  
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 저장 프로시저 역시 Orders 테이블에 새 주문을 추가하기 위한 것이지만 이번에는 DBMS 자체적으로 주문 번호를 만들도록 했다. 대부분의 DBMS 는 이러한 기능을 지원하며 SQL Server 는 이를 식별 필드로 사용되는 자동 증가 열이라고 한다. 다른 DBMS 에서는 자동 번호나 시퀀스 등으로 다양하게 부른다. 이번에도 하나의 매개변수인 고객 ID만 전달되었으며, 주문 번호와 주문 날짜는 모두 DBMS 에서 자동으로 계산하여 사용하였다. 자동으로 생성된 ID의 값이 무엇인지는 어떻게 알 수 있을까? SQL Server에서는 이를 위해 <code>@IDENTITY</code>라는 전역변수를 지원하므로 이 예에서와 같이 <code>SELECT</code> 문에서 이 변수를 사용하면 생성된 ID의 값을 반환할 수 있다.</p>
      <p>이와 같이 저장 프로시저를 사용하면 같은 작업을 여러 가지 다른 방법으로 수행할 수 있다.</p>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>이 단원에서는 저장 프로시저가 무엇이며 왜 사용하는지 배웠다. 저장 프로시저실행의 기본적인 방법과 만드는 구문, 사용할 수 있는 몇가지 상황에 대해 살펴 보았으며 이러한 모든 기능과 구문은 DBMS 의 지원 기능에 따라 달라지게 된다. 보다 세부적인 내용은 DBMS 설명서를 통해 배우기 바란다.</p>
    </article>
  </section>
</div>