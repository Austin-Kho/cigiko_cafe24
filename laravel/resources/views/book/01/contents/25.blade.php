<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>SQL 문을 작성하려면 기본적인 데이터베이스 디자인에 대한 충분한 이해가 선행되어야 한다. 테이블에 저장된 정보가 무엇인지, 테이블이 다른 테이블과 어떻게 관련되어 있는지, 행 내에서 실제 데이터 분할은 어떻게 이루어 지는지 등을 모르고서는 효율적인 SQL문 작성이 불가능하다.</p>

      <p>부록 A에서는 이 책에서 소개하는 각 테이블과 데이터에 대해 설명할 것이다.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 샘플 테이블의 이해
  </h3>
  <section>
    <article>
      <p>이 책에서 사용되는 테이블은 주문 입력 시스템의 일부이며, 장난감을 생산하는 가상의 업체를 위해 고안된 것이다. 각 테이블은 다음과 같은 작업을 위해 사용된다.</p>

      <ul>
        <li>공급업체 관리</li>
        <li>제폼 카탈로그 관리</li>
        <li>고객 목록 관리</li>
        <li>고객의 주문 입력</li>
      </ul>
      <p>이러한 작업을 위해 총 5개의 테이블이 사용되며 각 테이블은 관계형 데이터베이스 디자인에 따라 서로 밀접하게 관련되어 있다.</p>
    </article>
  </section>

  <h4 class="sub-header">테이블의 구성</h4>
  <section>
    <article>
      <p>다섯 개의 각 테이블이 어떻게 구성되어 있는지, 테이블 내의 열 이름과 그 쓰임에 대해 알아보자.</p>
    </article>
    <div class="tip">
      <h4><span class="badge badge-secondary">참고</span> 단순화된 예</h4>
      <p>실제로 주문 입력 시스템에서 사용할 테이블이라면 샘플 테이블에 비해 훨씬 많은 데이터가 필요하겠지만(예를 들어 지불 및 계정 정보라던가 배송 정보 등) 여기서는 단지 데이터 조직화를 소개하고 실제와 유사한 가상의 샘플만 제시하면 되므로 테이블과 데이터는 상당히 단순화 되어 있음을 감안하기 바란다. 그러나 여기에 사용된 기술은 실제 데이터베이스에 그대로 사용할 수 있다.</p>
    </div>
  </section>

  <h4 class="sub-header">Vendors 테이블</h4>
  <section>
    <article>
      <p>Vendors 테이블은 제품을 제공하는 공급업체의 정보를 저장한다. 모든 공급 업체의 자료는 이 테이블에 기록되며 공급업체의 ID(vend_id)열은 제품과 공급업체를 연결하는 데 사용된다.</p>
      <h5>표 A.1 Vendors 테이블의 열</h5>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>열</th>
            <th>설명</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>vend_id</td>
            <td>공급업체의 고유 ID</td>
          </tr>
          <tr>
            <td>vend_name</td>
            <td>공급업체 이름</td>
          </tr>
          <tr>
            <td>vend_address</td>
            <td>공급업체 주소</td>
          </tr>
          <tr>
            <td>vend_city</td>
            <td>공급업체 시/도</td>
          </tr>
          <tr>
            <td>vend_state</td>
            <td>공급업체 주</td>
          </tr>
          <tr>
            <td>vend_zip</td>
            <td>공급업체 우편번호</td>
          </tr>
          <tr>
            <td>vend_country</td>
            <td>공급업체 국가</td>
          </tr>
        </tbody>
      </table>
      <p>모든 테이블에는 기본 키가 정의되어 있어야 한다. 이 테이블의 기본 키는 vend_id이다.</p>
    </article>
  </section>

  <h4 class="sub-header">Products 테이블</h4>
  <section>
    <article>
      <p>Products 테이블에는 제품 카탈로그가 저장된다. 각 제품 당 하나의 행이 있으며 각 제품에는 고유한 ID(prod_id 열)가 있고 공급업체의 고유 ID 인 vend_id를 통해 공급업체와 연결된다.</p>
      <h5>표 A.2 Products 테이블의 열</h5>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>열</th>
            <th>설명</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>prod_id</td>
            <td>제품이 고유 ID</td>
          </tr>
          <tr>
            <td>vend_id</td>
            <td>제품의 공급업체 ID(Vendors 테이블의 vend_id와 연결된다.)</td>
          </tr>
          <tr>
            <td>prod_name</td>
            <td>제품 이름</td>
          </tr>
          <tr>
            <td>prod_price</td>
            <td>제품 가격</td>
          </tr>
          <tr>
            <td>prod_desc</td>
            <td>제품 설명</td>
          </tr>
        </tbody>
      </table>
      <ul>
        <li>이 테이블의 기본 키는 prod_id이다.</li>
        <li>참조 무결성 유지를 위해 vend_id에는 Vendors의 vend_id와 연결되는 외래 키가 정의된다.</li>
      </ul>
    </article>
  </section>

  <h4 class="sub-header">Customers 테이블</h4>
  <section>
    <article>
      <p>Customers 테이블은 모든 고객 정보를 저장한다. 각 고객은 고유한 ID(cust_id)를 갖는다.</p>
      <h5>표 A.3 Customers 테이블의 열</h5>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>열</th>
            <th>설명</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>cust_id</td>
            <td>고객의 고유 ID</td>
          </tr>
          <tr>
            <td>cust_name</td>
            <td>고객 이름</td>
          </tr>
          <tr>
            <td>cust_address</td>
            <td>고객 주소</td>
          </tr>
          <tr>
            <td>cust_city</td>
            <td>고객 시/도</td>
          </tr>
          <tr>
            <td>cust_state</td>
            <td>고객 주</td>
          </tr>
          <tr>
            <td>cust_zip</td>
            <td>고객 우편 번호</td>
          </tr>
          <tr>
            <td>cust_country</td>
            <td>고객 국가</td>
          </tr>
          <tr>
            <td>cust_contact</td>
            <td>고객 연락처 이름</td>
          </tr>
          <tr>
            <td>cust_email</td>
            <td>고객 연락처 전자 메일 주소</td>
          </tr>
        </tbody>
      </table>
      <ul>
        <li>이 테이블의 기본 키는 cust_id 이다.</li>
      </ul>
    </article>
  </section>

  <h4 class="sub-header">Orders 테이블</h4>
  <section>
    <article>
      <p>Orders 테이블은 고객의 주문을 저장하지만 주문 내역을 저장하지는 않는다. 각 주문에는 고유한 번호(order_num)가 있으며 Customers 테이블의 고유 ID인 cust_id 열을 통해 고객과 연결된다.</p>
      <h5>표 A.4 Orders 테이블의 열</h5>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>열</th>
            <th>설명</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>order_num</td>
            <td>주문의 고유 번호</td>
          </tr>
          <tr>
            <td>order_date</td>
            <td>주문 날짜</td>
          </tr>
          <tr>
            <td>cust_id</td>
            <td>주문한 고객의 ID(Customers 테이블의 cust_id와 연결된다.)</td>
          </tr>
        </tbody>
      </table>
      <ul>
        <li>이 테이블의 기본 키는 order_num이다.</li>
        <li>참조 무결성을 위해 cust_id 열에는 Customers 의 cust_id와 연결되는 외래 키가 정의된다.</li>
      </ul>
    </article>
  </section>

  <h4 class="sub-header">OrderItems 테이블</h4>
  <section>
    <article>
    <p>OrderItems 테이블에는 각 주문의 실제 항목이 저장된다. 각 주문당 하나의 행을 차지하며, Orders 테이블의 모든 행은 각각 OrderItems 테이블에 있는 하나 이상의 행과 연결된다. 각 주문 항목은 고유한 주문 번호에 주문 항목울 더한 값으로 구분되는데, 주문한 첫 번째 항목, 두 번째 항목, 이런 순서이다. 주문 항목은 order_num을 통해 Orders 테이블의 고유 ID order_num과 연결되며 각 주문 항목에는 주문된 항목의 제품 ID가 포함되므로 Products 테이블과도 연결된다.</p>
      <h5>표 A.5 Products 테이블의 열</h5>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>열</th>
            <th>설명</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>order_num</td>
            <td>주문 번호(Orders 테이블의 order_num과 연결된다.)</td>
          </tr>
          <tr>
            <td>order_item</td>
            <td>주문 항목 번호(각 주문 내에서 순차적으로 번호가 매겨진다.)</td>
          </tr>
          <tr>
            <td>prod_id</td>
            <td>제품 ID(Products 테이블의 prod_id와 연결된다.)</td>
          </tr>
          <tr>
            <td>quantity</td>
            <td>항목 수량</td>
          </tr>
          <tr>
            <td>item_price</td>
            <td>항목 가격</td>
          </tr>
        </tbody>
      </table>
      <ul>
        <li>이 테이블의 기본 키는 order_num 이다.</li>
        <li>참조 무결성 유지를 위해 이 테이블의 order_num 열은 Orders 테이블의 order_num 과 연결되도록 외래 키가 정의되며 prod_id 열은 Products 테이블의 prod_id 열과 연결되도록 외래 키가 정의된다.</li>
      </ul>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 샘플 테이블 얻기
  </h3>
  <section>
    <article>
      <p>이 책의 샘플 코드를 실행하기 위해서는 적절히 데이터가 채워진 테이블이 필요하다. 필요한 모든 자료는 이 책의 영문판 웹 페이지인 <a href="http://www.forta.com/books/0672325675/" target="_blank">http://www.forta.com/books/0672325675/</a> 에서 다운로드 할 수 있다.</p>
    </article>
  </section>

  <h4 class="sub-header">곧바로 사용할 수 있는 Microsoft Access MDB 파일 다운로드</h4>
  <section>
    <article>
      <p>위 URL을 보면 곧바로 사용할 수 있도록 준비된 Microsoft Access 용 MDB 데이터베이스를 구할 수 있다. 이 파일을 사용할 경우 SQL 스트립트를 실행해서 테이블을 만들고 데이터를 채워 넣을 필요가 없다.</p>
      <p>Access MDB 파일을 사용하려면 ODBC 클라이언트 유틸리티가 필요하며 ASP나 ColdFusion 과 같은 스크립팅 언어도 필요하다.</p>
    </article>
  </section>

  <h4 class="sub-header">DBMS SQL 스크립트 다운로드</h4>
  <section>
    <article>
      <p>대부분의 DBMS는 내부 데이터를 하나의 완전한 파일로 저장할 수 있는 방식은 사용하지 않는다(Access 만 이런 방식을 사용한다). 따라서 이런 경우는 SQL 스크립트를 <a href="http://www.forta.com/books/0672325675/" target="_blank">http://www.forta.com/books/0672325675/</a>에서 다운받아 실행함으로써 테이블을 만들어야 한다. 각 DBMS 당 두 개의 파일이 준비되어 있다.</p>
      <ul>
        <li>create.txt 파일에는 다섯 개의 샘플 테이블을 만들기 위한 SQL 문이 담겨있다. 기본 키와 외래 키 제약 조건 정의도 모두 포함되어 있다.</li>
        <li>populate.txt 파일에는 만들어진 테이블에 샘플 데이터를 채우기 위한 SQL INSERT 문이 담겨 있다.</li>
      </ul>
      <p>이 파일의 SQL 문은 각 DBMS 에 크게 좌우되는 것들이므로 여러분의 DBMS 에 맞는 파일을 다운받아 실행하는 것이 중요하다.</p>
      <p>현재는 다음과 같은 DBMS 용 스크립트를 다운받을 수 있다.</p>
      <ul>
        <li>IBM DB2</li>
        <li>Microsoft SQL Server</li>
        <li>MySQL</li>
        <li>Oracle</li>
        <li>PostgreSQL</li>
        <li>Sybase Adaptive Server</li>
      </ul>
      <p>스크립트를 받았다면 부록 B '주요 응용 프로그램에서의 사용'을 통해 여러 주요 작업환경에서 이 스크립트를 실행하는 방법을 살펴보기 바란다.</p>
    </article>
  </section>