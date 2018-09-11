<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 테이블을 만들고, 변경하고, 삭제하는 데 대한 기본적인 내용을 설명한다.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 테이블 만들기
  </h3>
  <section>
    <article>
      <p>SQL은 테이블 데이터를 조작하는 데에만 사용되는 것이 아니라 모든 데이터베이스와 테이블 작업에 사용된다. 즉 테이블을 만들고 제어하는 기능도 가지고 있다.</p>
      <p>데이터베이스 테이블을 만드는 방법은 일반적으로 다음 두 가지가 있다.</p>
      <ul>
        <li>대부분의 DBMS 에는 대화식으로 데이터베이스 테이블을 만들고 관리할 수 있는 도구를 제공한다.</li>
        <li>SQL 문을 사용해서 직접 테이블을 만들 수도 있다.</li>
      </ul>
      <p>프로그래밍 방식으로 테이블을 만들기 위해서는 <code>CREATE TABLE</code>이라는 SQL 문을 사용한다. 대화식 도구를 사용하는 경우도 사실은 SQL문이 만들어지는 것이며, 실제 작업은 SQL문을 통해 이루어진다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> 구문의 차이</h4>
        <p>CREATE TABLE 문의 정확한 구문은 DBMS 에 SQL 구현에 따라 다르므로, 각각의 DBMS 설명서를 참조하여 정확한 구문을 만들기 바란다.</p>
      </div>
      <p>테이블을 만들 때 지정할 수 있는 모든 옵션을 이 단원에서 설명하기에는 시간과 지면의 제약이 있으므로, 각각의 DBMS 설명서를 통해 직접 참고할 것을 권한다.</p>
    </article>
  </section>

  <h4 class="sub-header">기본적인 테이블 생성</h4>
  <section>
    <article>
      <p><code>CREATE TABLE</code> 문을 사용하여 테이블을 만들려면 다음 정보를 지정해야 한다.</p>
      <ul>
        <li>만들 새 테이블의 이름을 <code>CREATE TABLE</code> 뒤에 지정한다.</li>
        <li>테이블 열의 이름과 정의를 콤마로 구분하여 지정한다.</li>
        <li>테이블의 위치를 지정해야 하는 DBMS도 있다.</li>
      </ul>
      <p>이 책에서 샘플로 사용하는 Products 테이블을 만드는 SQL 문은 다음과 같다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE TABLE Products<br>
        (<br>
&nbsp;&nbsp;&nbsp;prod_id     CHAR(10)       NOT NULL,<br>
&nbsp;&nbsp;&nbsp;vend_id     CHAR(10)       NOT NULL,<br>
&nbsp;&nbsp;&nbsp;prod_name   CHAR(254)      NOT NULL,<br>
&nbsp;&nbsp;&nbsp;prod_price  DECIMAL(8, 2)  NOT NULL,<br>
&nbsp;&nbsp;&nbsp;prod_desc   VARCHAR(1000)  NULL<br>
        );
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 구문에서 알 수 있듯이 테이블 이름은 <code>CREATE TABLE</code> 키워드 바로 뒤에 지정되며, 테이블 정의(모든 열)는 괄호 내에 위치하고 열 사이는 콤마로 구분된다. 이 테이블의 경우 다섯 개의 열로 구성되어 있는데, 각 열은 열 이름(테이블 내에서 고유해야 함)으로 시작하여 열의 데이터 형식(데이터 형식에 대해서는 1장을, 자주 사용되는 데이터 형식과 호환성에 대해서는 4장 참조)이 이어진다. 전체 문을 종료할 때는 세미콜론(;)으로 마무리 한다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 구문의 포맷팅</h4>
        <p>SQL 문의 공백은 무시되므로 한 줄로 길게 입력해도 되고, 여러줄로 나우어도 된다. 아무런 차이가 없다. 따라서 읽기 쉽게 SQL을 여러 줄로 나누는 것이 보다 낳을 것이다.</p>
        <h4><span class="badge badge-secondary">TIP</span> 기존 테이블의 대체</h4>
        <p>새 테이블을 만들 때는 이미 존재하는 테이블 이름을 지정해서는 안 되며 그렇게 하면 오류가 발생한다. 테이블 생성 구문을 통해 기존 테이블이 엎어 쓰여지는 것을 방지하기 위해 SQL은 직접 테이블을 지우고 다시 만들도록 하므로 같은 이름을 지정한다고 해서 기존 테이블이 대체되지는 않는다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">NULL 값의 사용</h4>
  <section>
    <article>
      <p><code>NULL</code> 값을 혀용하는 열은 이 열에 아무런 값을 넣지 않아도 된다는 의미이다. <code>NULL</code> 값을 혀용하지 않는 열일 경우 값이 없는 행은 받아들여지지 않으므로 행을 추가하거나 업데이트할 때 반드시 값을 넣어야 한다.</p>
      <p>모든 열은 <code>NULL</code>열이거나 <code>NOT NULL</code>열이므로 이 상태는 테이블을 만들 때 테이블 정의에 지정해 주어야 한다. 다음 예를 보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE TABLE Orders<br>
        (<br>
&nbsp;&nbsp;&nbsp;order_num    INTEGER    NOT NULL,<br>
&nbsp;&nbsp;&nbsp;order_date   DATETIME   NOT NULL,<br>
&nbsp;&nbsp;&nbsp;cust_id      CHAR(10)   NOT NULL<br>
        );
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 문은 이 책에서 샘플로 사용하는 Orders 테이블을 만드는 문으로, 주문 번호, 주문 날짜, 그리고 고객의 ID를 포함하는 세 개의 열이 지정되었다. 세 열 모두 반드시 필요하므로 <code>NOT NULL</code>로 지정되었는데, 이렇게 하면 이러한 값이 지정되지 않은 열이 삽입되는 것을 방지할 수 있다. 만약 값을 지정하지 않고 행을 추가하려하면 오류가 발생하고 삽입은 실패하게 된다.</p>

      <p>다음 예는 <code>NULL</code>과 <code>NOT NULL</code> 열을 혼합하여 사용한 경우이다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE TABLE Vendors<br>
        (<br>
&nbsp;&nbsp;&nbsp;vend_id    CHAR(10)    NOT NULL,<br>
&nbsp;&nbsp;&nbsp;vend_name   CHAR(50)   NOT NULL,<br>
&nbsp;&nbsp;&nbsp;vend_address      CHAR(50)   ,<br>
&nbsp;&nbsp;&nbsp;vend_city    CHAR(50)    ,<br>
&nbsp;&nbsp;&nbsp;vend_state    CHAR(5)    ,<br>
&nbsp;&nbsp;&nbsp;vend_zip    CHAR(10)    ,<br>
&nbsp;&nbsp;&nbsp;vend_country    CHAR(50)<br>
        );
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 문 역시 이 책에서 샘플로 사용하는 Vendors 테이블을 만드는 것으로, 공급업체의 ID와 이름은 반드시 필요하기 때문에 <code>NOT NULL</code>로 지정되었지만 나머지 다섯 개의 열은 굳이 값을 지정하지 않아도 되기 때문에 <code>NULL</code>을 허용하도록 지정되었다. <code>NULL</code>이 기본값이기 때문에 이와 같이 <code>NULL</code>이나 <code>NOT NULL</code> 중 하나를 지정하지 않으면 <code>NULL</code>을 지정한 것과 마찬가지로 인식된다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> NULL의 지정</h4>
        <p>대부분의 DBMS는 NOT NULL을 지정하지 않을 경우 NULL을 지정한것으로 간주하지만 모두 그런 것은 아니다. DB2에서는 NULL을 반드시 지정해 주어야 하며 그렇지 않으면 오류가 발생한다.</p>
        <h4><span class="badge badge-secondary">TIP</span> 기본 키와 NULL값</h4>
        <p>기본 키는 테이블에서 각 행을 고유하게 해주는 열임을 1장에서 설명했었다. NULL 값을 허용하지 않는 유일한 열이 바로 기본 키이다. NULL 값을 허영하는 열은 고유 식별자로 사용할 수 없기 때문이다.</p>
        <h4><span class="badge badge-secondary">주의</span> NULL의 이해</h4>
        <p>NULL 값과 빈 문자열을 혼동하지 말자. NULL 값은 값이 없는 것을 의미하며 빈 문자열과는 다르다. 사이에 아무것도 없이 두 개의 작은따옴표를 연달아 입력하는 것이 바로 빈 문자열이며, NULL값이 혀용되지 않는 열이라도 이 값은 넣을 수 있다. 빈 문자열 역시 유효한 값이기 때문이다. NULL 값은 키워드 NULL로 표현하며 빈 문자열로 표현할 수 없다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">기본값의 지정</h4>
  <section>
    <article>
      <p>행을 삽입할 때 값을 지정하지 않으면 기본으로 사용될 값이 기본값이며, SQL에서 이를 지정할 수 있다. 기본값은 <code>CREATE TABLE</code> 문의 열 정의 부분에서 <code>DEFAULT</code> 키워드를 사용하여 지정할 수 있다.</p>
      <p>다음 예를 살펴보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE TABLE OrderItems<br>
        (<br>
&nbsp;&nbsp;&nbsp;order_num    INTEGER    NOT NULL,<br>
&nbsp;&nbsp;&nbsp;order_item   INTEGER   NOT NULL,<br>
&nbsp;&nbsp;&nbsp;prod_id      CHAR(10)   NOT NULL,<br>
&nbsp;&nbsp;&nbsp;quantity    INTEGER    NOT NULL DEFAULT 1,<br>
&nbsp;&nbsp;&nbsp;item_price    DECIMAL(8, 2)    NOT NULL<br>
        );
      </code></pre> 
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 문은 주문을 구성하는 개별 항목을 포함하는 OrderItems라는 테이블을 만드는 문이다(주문 자체는 Orders 테이블에 저장된다). quantity 열은 주문한 각 향목의 수량을 의미하는데, <code>DEFAULT 1</code>이라고 지정함으로써 기본 값을 넣었다. 즉 주문 시 수량을 지정하지 않으면 수량 1개를 사용하도록 지정한 것이다.</p>

      <p>기본값은 날짜나 타임스탬프 열에 값을 저장할 때도 종종 사용된다. 예를 들어 함수나 변수를 사용하여 날짜를 시스템 날짜로 지정할 수 있다. MySQL 사용자는 <code>DEFAULT CURRENT_DATE()</code>를, Oracle 사용자는 <code>DEFAULT SYSDATE</code>를, SQL Server사용자는 <code>DEFAULT GETDATE()</code>를 사용하면 현재 시스템 날짜를 기본값으로 지정할 수 있다. 시스템 날짜를 얻기 위한 명령이 DBMS마다 다르므로 다음 표를 참조하여 사용하기 바란다.</p>
      <h5>표 17.1 시스템 날짜 얻기</h5>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>DBMS</th>
            <th>함수/변수</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Access</td>
            <td><code>NOW()</code></td>
          </tr>
          <tr>
            <td>DB2</td>
            <td><code>CURRENT_DATE</code></td>
          </tr>
          <tr>
            <td>MySQL</td>
            <td><code>CURRENT_DATE()</code></td>
          </tr>
          <tr>
            <td>Oracle</td>
            <td><code>SYSDATE</code></td>
          </tr>
          <tr>
            <td>PostgreSQL</td>
            <td><code>CURRENT_DATE</code></td>
          </tr>
          <tr>
            <td>SQL Server</td>
            <td><code>GETDATE()</code></td>
          </tr>
          <tr>
            <td>Sybase</td>
            <td><code>GETDATE()</code></td>
          </tr>
        </tbody>
      </table>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> NULL 대신 DEFAULT 사용</h4>
        <p>계산이나 데이터 그룹화에 사용되는 열일 경우 NULL 열 대신 DEFAULT 값을 대신 사용하는 개발자가 많다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 테이블 업데이트
  </h3>
  <section>
    <article>
      <p>테이블 정의를 업데이트하려면 <code>ALTER TABLE</code> 문을 사용하면 된다. 모든 DBMS 에서 <code>ALTER TABLE</code> 문을 지원하긴 하지만 변경할 수 있는 사항은 DBMS 마다 크게 다르므로 주의해야 한다. 몇 가지 주의 사항을 알아보자.</p>
      <ul>
        <li>데이터가 포함된 테이블의 구조는 변경하지 않는 것이 기본이다. 따라서 애초에 테이블을 디자인할 때 충분한 시간을 들여 이후에 변경될 소지가 있는지 판단하고 결정해야 한다. 데이터를 이미 넣은 후에 구조를 바꾸는 것은 좋지 않다.</li>
        <li>기존 테이블에 열을 추가하는 것은 모든 DBMS에서 허용되지만 추가할 수 었는 데이터 형식과 <code>NULL</code> 및 <code>DEFAULT</code> 의 사용에 대해서는 약간의 제한이 있다.</li>
        <li>테이블의 열을 제거하거나 변경하는 것은 허용되지 않는 DBMS가 많다.</li>
        <li>열의 이름을 변경하는 것은 대부분의 DBMS에서 가능하다.</li>
        <li>이미 값이 채워진 열을 변경하는 작업은 대부분의 DBMS에서 여러 가지로 제한되지만 값이 없는 열일 경우는 한결 수월하다.</li>
      </ul>
      <p><code>ALTER TABLE</code> 문을 사용하여 테이블을 변경하려면 다음 정보를 지정해야 한다.</p>
      <ul>
        <li>변경할 테이블의 이름을 <code>ALTER TABLE</code> 키워드 뒤에 지정해야 한다. 반드시 이미 존재하는 테이블이어야 하며 그렇지 않으면 오류가 발생한다.</li>
        <li>변경할 내용의 목록을 지정해야 한다.</li>
      </ul>
      <p>모든 DBMS 에서 지원하는 작업은 기존 테이블에 열을 추가하는 작업뿐이므로 이를 예로 들어보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        ALTER TABLE Vendors<br>
        ADD vend_phone CHAR(20);
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 문은 Vendors 테이블에 vend_phone이라는 열을 추가한다. 데이터 형식은 반드시 지정되어야 한다.</p>
      <p>열을 변경하거나 삭제하는 구문, 제약 조건이나 키를 추가하는 구문 역시 비슷하다. 그러나 모든 DBMS 구문이 같지는 않으므로 주의하기 바란다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        ALTER TABLE Vendors<br>
        DROP CULUMN vend_phone;
      </code></pre>
      <p>복잡한 테이블 구조 변경 작업에는 일반적으로 다음과 같은 단계의 수작업이 필요하다.</p>
      <ul>
        <li>새로운 열 레이아웃을 사용하여 새 이름을 만든다.</li>
        <li>15장에서 배운 <code>INSERT SELECT</code> 문을 사용하여 이전 테이블에서 새 테이블로 데이터를 복사한다. 필요할 경우 변환 함수나 계산 필드도 사용한다.</li>
        <li>새 테이블이 원하는 데이터를 포함하고 있는지 확인한다.</li>
        <li>이전 테이블의 이름을 다른 것으로 변경한다. 확신이 있을 경우 삭제해도 된다.</li>
        <li>새 테이블을 이전 테이블의 원래 이름으로 변경한다.</li>
        <li>트리거, 저장 프로시저, 인덱스, 외부 키 등을 필요에 따라 다시 만든다.</li>
      </ul><br>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span>ALTER TABLE 문은 조심스럽게 사용하자.</h4>
        <p>ALTER TABLE 문은 주의하여 사용하여야 하며, 실행하기 전에 가급적이면 관련 스키마와 데이터를 모두 백업해두는 것이 좋다. 데이터베이스 테이블 변경은 취소할 수 없으며 불필요한 열을 추가한 경우 제거할 수 없는 경우도 생길 수 있다. 물론 필요한 열을 삭제한 경우 중요한 데이터가 손실되는 피해를 입게 된다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 테이블 삭제
  </h3>
  <section>
    <article>
      <p>테이블 삭제는 내용만 삭제하는 것이 아니라 전체 테이블을 삭제하는 것이며 방법은 아주 간단하다. 테이블을 삭제할 때는 다음과 같이 <code>DROP TABLE</code> 문을 사용한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        DROP TABLE CustCopy;
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 문은 CustCopy 라는 테이블(15장에서 만든 테이블)을 삭제한다. 정말 삭제할 것인지를 묻는 확인 메시지 같은 것은 없으며, 취소할 방법도 없다. 이 문을 실행하면 지정된 테이블이 영구적으로 제거된다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 실수로 삭제하는 것을 방지하기 위한 관계 규칙 적용</h4>
        <p>다른 테이블과 연결되어 있는 테이블일 경우 삭제하지 못하도록 방지하는 규칙을 만드는 것이 대부분의 DBMS 에서 가능하다. 이러한 규칙이 적용되면, 다른 테이블과 연결되어 있는 테이블을 삭제하도록 지정한 경우 DBMS에서 삭제 작업을 중단하고 두 테이블 사이의 관계가 삭제되기 전에는 지우지 못하도록 막는다. 가능하다면 실수로 테이블을 삭제하는 일을 막기 위해 이 옵션을 사용하는 것이 좋다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> 테이블 이름 바꾸기
    </h3>
    <section>
      <article>
        <p>테이블의 이름을 바꾸는 방법은 DBMS 마다 다르며 쉽고 빠르게 설명하기 힘들다. DB2, MySQL, Oracle, PostgreSQL 사용자는 <code>RENAME</code> 문을 사용하면 되고, SQL Server와 Sybase 사용자는 기본 제공되는 <code>sp_rename</code> 저장 프로시저를 사용하면 된다.</p>

        <p>구문은 다르지만 기본적으로는 이름을 바꿀 예전 이름과 새 이름을 지정하는 것은 동일하다. 하지만 구체적인 방법은 다르므로 각각의 DBMS 설명서를 참조하여 정확한 구문을 살펴보기 바란다.</p>
      </article>
    </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>이 단원에서는 새로운 몇 가지 SQL 문에 대해 배웠다. 새 테이블을 만들 때는 <code>CREATE TABLE</code> 문이 사용되며 기존 테이블의 열(또는 제약 조건이나 인덱스와 같은 다른 개체)을 변경할 때는 <code>ALTER TABLE</code> 문을, 테이블을 완전히 삭제할 때는 <code>DROP TABLE</code> 문을 사용하면 된다. 이러한 문은 모두 데이터베이스에 큰 영향을 주는 것이므로 반드시 주의하여 사용하여야 하며, 가급적이면 중요한 데이터를 모두 백업한 후에 실행하는 것이 좋다. 각 문의 정확한 구문은 각각의 DBMS 사용 설명서를 참고한다.</p>
    </article>
  </section>
</div>