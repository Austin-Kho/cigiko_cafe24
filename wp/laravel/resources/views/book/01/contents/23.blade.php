<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 SQL에서 할 수 있는 몇가지 고급 데이터 제어 기능인 제약 조건, 인덱스, 트리거에 대해 살펴보도록 하자.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 제약 조건의 이해
  </h3>
  <section>
    <article>
      <p>SQL 은 여러 버전을 거쳐 완전하고 강력한 언어로 발전하고 있다. SQL이 지원하는 강력한 기능 중에는 제약 조건과 같은 데이터 조작 기술을 제공하는 복잡한 도구도 포함된다.</p>
      <p>관계형 테이블과 참조 무결성은 지금까지 몇 번 언급 했는데, 이 내용을 설명하면서 관계형 데이터베이스는 데이터를 여러 테이블에 저장하며 각 테이블의 데이터는 서로 연관되어 있다고 설명했었다. 이렇게 테이블 사이의 참조를 만드는 데 사용되는 것이 바로 키이며, 이러한 관계를 올바르게 유지하는 것이 참조 무결성이다.</p>
      <p>관계형 데이터베이스 디자인이 올바르게 작동하려면 올바른 데이터만 테이블에 넣어야 한다. 예를 들어 Orders 테이블에는 주문 정보가 저장되고 OrderItems 테이블에는 주문의 상세 정보가 저장되므로 OrderItems 에서 참조하는 주문의 ID는 반드시 Orders 테이블에 있어야 할 것이다. 마찬가지로 Orders에서 참조하는 고객의 정보 역시 Customers 테이블에 반드시 있어야 한다.</p>
      <p>물론 새 행을 추가하기 전에 <code>SELECT</code> 문으로 다른 테이블에 데이터를 넣고 올바른 값인지 확인해보는 방법도 있지만, 다음 이유로 인해 이는 절대 좋은 방법이 아니다.</p>
      <ul>
        <li>데이터베이스 무결성 규칙이 클라이언트 수준에서 수행되면 이를 따르는 클라이언트도 있고, 그렇지 않은 클라이언트도 있을 수 있다.</li>
        <li>규칙을 <code>UPDATE</code>와 <code>DELETE</code> 작업에도 적용해야 한다.</li>
        <li>클라이언트 측 검사는 시간을 많이 소모하는 작업이므로 DBMS에서 검사하도록 하는 것이 보다 효율적이다.</li>
      </ul>
      <blockquote><strong>제약 조건</strong>: 데이터베이스 데이터가 추가되고 제어되는 방식을 정의하는 규칙</blockquote>
      <p>DBMS 는 데이터베이스 테이블에 제약 조건을 적용하여 참조 무결성을 유지한다. 대부분의 제약 조건은 17장에서 배운 <code>CREATE TABLE</code>이나 <code>ALTER TABLE</code> 문을 사용하여 테이블 정의를 지정할 때 정의된다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> 주의</h4>
        <p>제약 조건에는 몇 가지 종류가 있으며 지원하는 수준도 DBMS에 따라 조금씩 다르다. 따라서 여기서 소개하는 예가 여러분이 사용하는 DBMS 에서 지원하지 않을 수도 있다. 코드 실행 전에 각 DBMS 설명서를 참조하기 바란다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">기본 키</h4>
  <section>
    <article>
      <p>기본 키에 대해서는 1장에서 간략히 설명한 적이 있다. 기본 키는 열의 값이 고유함을 확인시켜 주는 특별한 제약 조건으로, 그 값은 변하지 않는다. 즉 테이블의 각 행을 고유하게 식별하는 데 사용하는 열인 것이다. 각 행을 고유하게 식별하는 것은 데이터 제어에 있어 상당히 중요한 것으로, 기본 키가 없다면 다른 행에 영향을 주지 않고 특정한 행만 안전하게 <code>UPDATE</code> 하거나 <code>DELETE</code> 하기 힘들 것이다.</p>
      <p>테이블의 몯ㄴ 열은 기본 키로 설정할 수 있다. 다만 다음과 같은 조건에 맞아야 한다.</p>
      <ul>
        <li>두 행이 같은 기본 키 값을 가질 수 없다.</li>
        <li>모든 행은 기본 키 값을 가져야 한다. 기본 키는 <code>NULL</code>일 수 없다.</li>
        <li>기본 키를 포함하는 열은 변경되거나 업데이트될 수 없다.</li>
        <li>기본 키 값은 재사용할 수 없다. 행을 삭제할 경우 그 기본 키도 같이 삭제되지만 이를 다른 행에 다시 할당할 수 없다.</li>
      </ul>
      <p>기본 키를 정의하는 한 가지 방법은 다음과 같이 테이블을 만들 때 지정하는 것이다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE TABLE Vendors<br>
        (<br>
          &nbsp;&nbsp;&nbsp;vend_id     CHAR(10)     NOT NULL PRIMARY KEY,<br>
          &nbsp;&nbsp;&nbsp;vend_name   CHAR(50)     NOT NULL,<br>
          &nbsp;&nbsp;&nbsp;vend_address     CHAR(50)     NULL,<br>
          &nbsp;&nbsp;&nbsp;vend_city     CHAR(50)     NULL,<br>
          &nbsp;&nbsp;&nbsp;vend_state     CHAR(50)     NULL,<br>
          &nbsp;&nbsp;&nbsp;vend_zip     CHAR(50)     NULL,<br>
          &nbsp;&nbsp;&nbsp;vend_country     CHAR(50)     NULL<br>
        );
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예의 경우 vend_id 뒤에 <code>PRIMARY KEY</code> 키워드가 붙었으므로 이 열이 기본 키가 된다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        ALTER TABLE Vendors<br>
        ADD CONSTRAINT PRIMARY KEY (vend_id);
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 역시 기본 키를 추가하는 방법으로, <code>CONSTRAINT</code> 문이 사용되었다. <code>CREATE TABLE</code>과 <code>ALTER TABLE</code> 문에서도 이 구문을 사용할 수 있다.</p>
    </article>
  </section>

  <h4 class="sub-header">외래 키</h4>
  <section>
    <article>
      <p>외래 키는 그 값이 다른 테이블의 기본 키에 나열된 값이어야 하는 열을 말한다. 외래 키는 참조 무결성을 유지하기 위한 필수 조건이다. 이해를 위해 예를 들어 보자.</p>
      <p>Orders 테이블에는 각 주문이 입력된 하나씩의 행이 포함되어 있고 고객 정보는 Customers 테블에 저자되어 있다. Orders 테이블의 주문은 Customers 테이블에 있는 고객의 ID와 연결되어 있는데, 이 고객 ID 가 바로 Customers 테이블의 기본 키이다. 즉 각 고객은 고유한 ID가 있고 각 주문은 주문 번호라는 고유한 ID가 Orders 테이블에 있다.</p>
      <p>Orders 테이블에 있는 고객 ID 열의 값은 고유할 필요는 없다. 고객이 여러 주문을 한 경우 같은 고객 ID가 여러 주문 정보에 나타날 것이기 때문이다. 하지만 각 주문에 나열된 고객의 ID는 반드시 Customers 테이블에 있는 값이어야 한다.</p>
      <p>외래 키가 하는 역할이 바로 이것이다. Orders 테이블의 외래 키는 바로 고객의 ID이며, 이 열에서 Customers 테이블의 기본 키만 값으로 사용할 수 있다.</p>
      <p>외래 키를 정의하는 방법을 알아보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE TABLE Orders<br>
        (<br>
          &nbsp;&nbsp;&nbsp;order_num     INTEGER     NOT NULL PRIMARY KEY,<br>
          &nbsp;&nbsp;&nbsp;order_date    DATETIME    NOT NULL,<br>
          &nbsp;&nbsp;&nbsp;cust_id       CHAR(10)    NOT NULL REFERENCES Customers(cust_id)<br>
        );
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>테이블 정의에 <code>REFERENCES</code> 키워드가 사용되었으며 이는 cust_id의 값이 Customers 테이블에 있는 cust_id 값 중 하나여야 함을 지정하고 있다.</p>

      <p><code>ALTER TABLE</code> 문에서 <code>CONSTRAINT</code> 구문을 사용해도 외래 키를 정의할 수 있다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        ALTER TABLE Customers<br>
        ADD CONSTRAINT<br>
        FOREIGN KEY (cust_id) REFERENCES Customers (cust_id)
      </code></pre>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 외래 키는 실수로 삭제하는 것을 막아준다.</h4>
        <p>참조 무결성을 유지하는 것 이외에도 외래 키는 중요한 다른 기능이 있다. 외래 키가 정의되고 나면 DBMS는 다른 테이블과 연결된 행의 삭제를 허용하지 않는다. 예를 들어 이미 주문을 한 고객은 Orders 테이블에 고객 ID가 있을 것이므로 Customers 테이블에서 이 고객을 삭제할 수 없다. 고객을 삭제할 수 있는 유일한 방법은 연관된 주문을 먼저 삭제한 다음 고객을 삭제한는 방법 뿐이다. 이 때문에 외래 키를 사용하면 실수로 연관된 데이터를 삭제하는 것을 방지할 수 있다.</p>
        <p>그러나 일부 DBMS에서는 <i>계단식 삭제</i>라는 기능을 지원하는데, 이 기능을 사용할 경우 특정한 행을 테이블에서 삭제하면 그에 관련된 모든 데이터가 자동으로 삭제된다. 예를 들어 고객을 삭제하면 그 고객이 주문한 내역도 모두 자동으로 삭제된다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">고유 제약 조건</h4>
  <section>
    <article>
      <p>고유 제약 조건은 열 내의 모든 데이터가 고유하도록 제한하는 것이다. 기본 키와 유사하지만 중요한 차이점이 있다.</p>
      <ul>
        <li>기본 키는 테이블당 하나밖에 존재할 수 없지만 고유 제약 조건은 여러 개 정의할 수 있다.</li>
        <li>고유 제약 조건 열에는 <code>NULL</code> 값을 사용할 수 있다.</li>
        <li>고유 제약 조건 열은 변경하거나 업데이트할 수 있다.</li>
        <li>고유 제약 조건 열은 재사용할 수 있다.</li>
        <li>기본 키와는 다르게 고유 제약 조건은 외래 키를 정의하는 데 사용할 수 없다.</li>
      </ul>
      <p>고유 제약 조건의 예로 직원 테이블을 들 수 있다. 각 직원의 주민등록번호는 고유해야 하지만 그 값이 너무 길기 때문에 기본 키로 사용하기에는 적절하지 않다. 주민등록번호가 여기 저기 자주 참조되고 사용되어서는 곤란하다는 점도 이유이다. 따라서 기본 키는 아니지만 값이 고유해야 하므로 이 열을 고유 제약 조건으로 사용하면 좋을 것이다.</p>
      <p>직원 테이블의 기본 키는 직원의 ID일 것이며 이 값은 분명 고유할 것이다. 마찬가지로 각 직원의 주민등록번호가 고유하게 유지되도록 하고 싶다면, 즉 다른 직원이 이미 입력된 것과 같은 주민등록번호를 사용하는 것을 막으려면 이 열을 <code>UNIQUE</code> 제약 조건으로 지정하면 된다.</p>
      <p>고유 제약 조건의 구문은 다른 제약 조건과 비슷하다. <code>UNIQUE</code> 키워드를 테이블 정의에 사용하거나 <code>CONSTRAINT</code> 키워드를 통해 지정하면 된다.</p>
    </article>
  </section>

  <h4 class="sub-header">CHECK 제약 조건</h4>
  <section>
    <article>
      <p><code>CHECK</code> 제약 조건은 열의 데이터가 여러분이 지정한 특정한 조건에 맞도록 하는 데 사용된다. 일반적인 쓰임은 다음과 같다.</p>
      <ul>
        <li>최소값이나 최대값 확인 - 예를 들어 주문 수량이 0인 항목이 없도록 한다.</li>
        <li>범위 지정 - 예를 들어 배송 날짜는 오늘 이후여야 하며 올해 안이 되도록 지정한다.</li>
        <li>특정한 값만 허용 - 예를 들어 성별 필드에는 M이나 F값만 허용된다.</li>
      </ul>
      <p>즉 데이터 형식은 열에 저장할 수 있는 데이터의 형식을 제한하지만 <code>CHECK</code> 제약 조건은 이러한 제한의 범위를 더 좁혀서 값의 범위를 제한하는 것이다.</p>
      <p>다음 예는 <code>CHECK</code> 제약 조건을 OrderItems 테이블에 적용하여 모든 항목의 수량이 0보다 크도록 제한하고 있다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE TABLE OrderItems<br>
        (<br>
          &nbsp;&nbsp;&nbsp;order_num       INTEGER     NOT NULL,<br>
          &nbsp;&nbsp;&nbsp;order_item      INTEGER     NOT NULL,<br>
          &nbsp;&nbsp;&nbsp;prod_id         CHAR(10)    NOT NULL,<br>
          &nbsp;&nbsp;&nbsp;quantity        INTEGER     NOT NULL CHECK (quantity > 0),<br>
          &nbsp;&nbsp;&nbsp;item_price      MONEY       NOT NULL<br>
        );
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 제약 조건을 사용하면 새로 추가되거나 업데이트되는 행의 값이 0과 비교하여 보다 커야만 허용되고, 그렇지 않으면 허용되지 않는다.</p>
      <p>gender 라는 이름의 열, 즉 성별을 저장하는 열에 M과 F 값만 입력할 수 있도록 하려면 다음과 같은 <code>ALTER TABLE</code> 문을 사용하면 된다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        ADD CONSTRAINT CHECK (gender LIKE '[MF]')
      </code></pre>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 인덱스의 이해
  </h3>
  <section>
    <article>
      <p>인덱스는 데이터를 논리적으로 정렬하여 검색과 정렬 작업의 속도를 높이기 위해 사용된다. 인덱스를 이해하는 가장 좋은 방법은 책의 뒤편에 있는 '색인'을 보는 것이다. 물론 이 책도 마찬가지이다.</p>

      <p>예를 들어 이 책에서 '데이터 형식'이라는 단어가 있는 모든 위치를 찾고 싶다고 가정해보자. 가장 간단한 방법은 1페이지부터 시작해서 모든 줄을 살펴보는 것이다. 물론 가능하겠지만 현실적인 것은 아니다. 검색할 양이 늘어날수록 이러한 수동적인 방법에는 한계가 있기 마련이다. 인덱스가 필요한 이유가 바로 여기에 있다. 책의 색인을 보면 (사실 색인이나 인덱스나 영어로 하면 모두 같은 index이며, 의미도 같다) 단어가 알파벳이나 가나다 순서로 정렬되어 있고 그 단어가 몇 페이지에 있는지 기재되어 있다. '데이터 형식'을 찾으려면 가나다 순서로 찾은 다음 어느 페이지에 이 단어가 나오는지 확인하기만 하면 된다.</p>

      <p>인덱스는 어떻게 작동할까? 비밀은 정렬 순서에 있다. 책에 있는 단어를 찾기 어려운 것은 단어의 양이 많기 때문이 아니며 각 단어가 순서 없이 마구 나열되어 있기 때문이다. 만약 내용이 사전순으로 정렬되어 있다면 굳이 색인이 없이도 특정한 단어를 쉽게 찾을 수 있을 것이다.</p>

      <p>데이터베이스 인덱스도 이와 마찬가지 원리를 가지고 있다. 기본 키 데이터는 항상 DBMS 에서 정렬해 주므로 기본 키를 기준으로 특정한 행을 가져오면 빠르고 효율적으로 가져올 수 있다.</p>

      <p>하지만 다른 열의 값을 검색하는 일은 그다지 효율적이지 못하다. 예를 들어 특정한 도시에 사는 모든 고객을 검색하려면 어떻게 해야 할까? 테이블이 도시를 기준으로 정렬된 것이 아니기 때문에 DBMS에서는 모든 행을 읽어서 매번 도시 이름과 대조해 보아야 한다. 색인 없이 책에서 단어를 찾는 것과 마찬가지이다.</p>

      <p>해결책은 <mark><u>인덱스</u></mark>를 사용하는 것이다. 인덱스는 하나 이상의 열에 정의할 있으며 이렇게 하면 DBMS가 내부적으로 이 열의 정렬된 목록을 만들어 관리한다. 인덱스가 정의되면 DBMS는 마치 책의 색인과 같은 정보를 만들어 내부적으로 갖추고 있다가 클라이언트가 특정 검색 작업을 요청하면 이를 사용해서 특정한 행을 쉽게 찾아낸다.</p>

      <p>이렇게 좋은 것이라면 당장 만들어야겠지만, 먼저 다음과 같은 사실을 명심하자.</p>
      <ul>
        <li>인덱스를 사용하면 데이터를 가져오는 작업의 성능을 향상시킬 수 있지만 데이터 삽입, 변경, 삭제 작업의 성능은 떨어진다. 이러한 작업이 실행될 때마다 DBMS 가 인덱스의 내용을 업데이트해야 하기 때문이다.</li>
        <li>인덱스 데이터는 많은 저장 공간을 차지한다.</li>
        <li>모든 데이터에 대해 인덱스를 만들 수 있는 것은 아니다. 충분히 고유하지 않은 데이터, 예를 들어 도시 이름과 같은 데이터는 인덱스의 혜택을 그다지 누리기 어렵다. 값이 다양할 가능성이 큰 데이터, 예를 들어 사람 이름과 같은 데이터는 이보다 혜택이 클 것이며 값이 고유할 가능성이 클 수록 그 혜택은 커질 것이다.</li>
        <li>인덱스는 데이터 필터링과 정렬에 사용된다. 데이터를 특정한 순서로 자주 정렬한다면 인덱스를 사용하기에 좋은 대상이 된다.</li>
        <li>여러 열을 인덱스로 지정하는 것도 가능하다. 예를 들어 시와 동 이름을 결합하여 인덱스로 사용하는 것이 가능하다. 이러한 인덱스는 데이터가 시와 동을 결합한 순서로 정렬할 때만 사용할 수 있으며, 둘 중 하나만으로 정렬할 때는 쓸모가 없다.</li>
      </ul>

      <p>어떤 때 인덱스를 사용해야 한다고 단정하기는 어렵다. 많은 DBMS 에서 인덱스의 효율성을 확인할 수 있는 유틸리티를 제공하고 있으므로 이러한 기능을 통해 미리 확인해보거나, 정기적으로 그 유용성을 테스트해보는 방법 밖에는 없다.</p>

      <p>인덱스는 <code>CREATE INDEX</code> 문을 통해 만들 수 있으며, 구체적인 구문은 DBMS 마다 다르다. 다음은 Products 테이블의 제품 이름 열에 간단한 인덱스를 만드는 예이다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE INDEX prod_name_ind<br>
        ON Products (prod_name);
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>모든 인덱스의 이름은 고유하게 지정해야 한다. 이 예에서 인덱스 이름은 <code>CREATE INDEX</code> 키워드 뒤에 prod_name_ind 라는 이름으로 지정되었으며 인덱싱할 테이블의 이름은 <code>ON</code> 뒤에, 인덱스에 포함할 열 이름은 테이블 이름 뒤에 괄호로 묶어 지정되었다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 인덱스의 재확인</h4>
        <p>인덱스의 효율은 테이블 데이터가 추가되거나 변경됨에 따라 변한다. 실제로 특정 상황에서 무척 유용하던 인덱스가 몇 개월 후에는 그렇지 않게 변해버리는 경우를 많은 데이터베이스 개발자들이 겪어보았을 것이다. 따라서 수시로 인덱스를 다시 살펴보고 현재 상황이 유용한지 확인하는 것이 중요하다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 트리거의 이해
  </h3>
  <section>
    <article>
      <p>트리거는 특정한 데이터베이스 작업이 발생하면 자동으로 실행되는 특별한 저장 프로시저이다. 트리거는 테이블에 대한 <code>INSERT</code>, <code>UPDATE</code>, <code>DELETE</code> 작업 및 이러한 작업의 조합과 연계되어 실행될 수 있다.</p>

      <p>저장 프로시저는 단순히 저장된 SQL 문이지만 트리거는 특정한 테이블과 연계된 것으로, 예를 들어 Orders 테이블에 행이 삽입될 때만 실행된다. 또한 Customers 테이블의 <code>INSERT</code> 와 <code>UPDATE</code> 작업에 연계된 트리거가 있다면 이 테이블에 행이 삽입되거나 업데이트될 때만 실행된다.</p>

      <p>트리거 내에서는 다음 데이터를 활용할 수 있다.</p>
      <ul>
        <li><code>INSERT</code> 작업으로 추가되는 모든 새 데이터</li>
        <li><code>UPDATE</code> 작업으로 추가되는 새 데이터와 이전 데이터</li>
        <li><code>DELETE</code> 작업으로 삭제되는 데이터</li>
      </ul>
      <p>사용하는 DBMS 의 종류에 따라 트리거는 지정한 작업이 실행되기 전, 또는 실행된 후에 실행된다.</p>
      <p>일반적인 트리거의 쓰임은 다음과 같다.</p>
      <ul>
        <li>데이터 무결성 보장 - 예를 들어 도시의 이름은 <code>INSERT</code>나 <code>UPDATE</code> 작업으로 추가하거나 업데이트할 때 모든 도시의 이름이 대문자가 되도록 한다.</li>
        <li>테이블의 데이터 변화에 따라 특정한 작업 수행 - 예를 들어 테이블에 행이 업데이트 되거나 삭제될 때 그 기록을 테이블에 저장한다.</li>
        <li>필요에 따라 추가적인 데이터 확인과 롤백 수행 - 예를 들어 고객의 신용한도가 초과되지 않도록 하고 만약 초과된 경우 더 이상의 주문이 불가능하도록 한다.</li>
        <li>계산된 열 값을 계산하거나 날짜/시간을 업데이트</li>
      </ul>
      <p>다음 예에서는 Customers 테이블의 cust_state 열을 <code>INSERT</code> 또는 <code>UPDATE</code> 할 때 실행되는 트리거를 만들어 추가 또는 업데이트되는 값이 대문자가 되도록 한다.</p>
      <p>SQL Server 에서는 다음과 같이 작성한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE TRIGGER customer_state<br>
        ON Customers<br>
        FOR INSERT, UPDATE<br>
        AS<br>
        UPDATE Customers<br>
        SET cust_state = Upper(cust_state)<br>
        WHERE Customers.cust_id = inserted.cust_id;
      </code></pre>

      <p>Oracle 과 PostgreSQL 에서는 다음과 같이 작성한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE TRIGGER customer_state<br>
        AFTER INSERT OR UPDATE<br>
        FOR EACH ROW<br>
        BEGIN<br>
        UPDATE Customers<br>
        SET cust_state = Upper(cust_state)<br>
        WHERE Customers.cust_id = :OLD.cust_id<br>
        END;
      </code></pre>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 제약 조건이 트리거보다 빠르다.</h4>
        <p>실행 속도로 보면 제약 조건이 트리거보다 빠르다. 따라서 둘 중 하나를 사용해서 수행할 수 있는 작업이라면 제약조건을 사용하는 편이 낫다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 데이터베이스 보안
  </h3>
  <section>
    <article>
      <p>데이터는 중요한 것이며 의도적인 침해나 악의적은 공격으로부터 보호되어야 한다. 물론 데이터가 필요한 사람은 액세스 할수 있도록 허용해야 함은 당연하다. 따라서 대부분의 DBMS 는 데이터에 액세스 할 수 있는 권한을 제어하는 괸리 메커니즘을 제공한다.</p>
      <p>보안 시스템의 기본은 사용자 인증과 권한 부여이다. 이러한 절차를 통해 사용자를 확인하고 원하는 작업을 허용할 것인지 결정하게 된다.</p>

      <p>보안이 적용되어야 하는 일반적인 작업은 다음과 같다.</p>
      <ul>
        <li>데이터베이스 관리 기능에 액세스(테이블 작성, 변경, 기존 테이블 삭제 등)</li>
        <li>특정한 데이터베이스나 테이블에 액세스</li>
        <li>액세스 유형(읽기 전용, 특정한 열에만 액세스 등)</li>
        <li>뷰나 저장 프로시저를 통해서만 테이블에 액세스 하도록 허용</li>
        <li>로그인을 기반으로 다양한 수준의 보안을 적용하여 허용되는 작업의 단계를 지정</li>
        <li>사용자 계정을 관리할 수 있는 능력을 제한</li>
      </ul>
      <p>보안은 SQL의 <code>GRANT</code> 및 <code>REVOKE</code> 문을 사용해서 관리되지만 대부분의 DBMS 에서는 이를 대화식 유틸리티를 제공하므로 굳이 SQL 문을 사용해야 하는 경우는 거의 없다.</p>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>이 단원에서는 몇 가지 고급 SQL 기능을 사용하는 법을 배웠다. 제약 조건은 참조 무결성을 보장하는 데 중요한 부분이며, 데이터 검색 속도를 향상시키는 데는 인덱스가 유용하고, 트리거를 사용하면 특정한 작업 전이나 후에 실행할 작업을 지정할 수 있으며 데이터 액세스를 관리하는데는 보안 옵션이 사용된다. 이 외에도 각 DBMS에서 제공하는 고유한 기능들이 많이 있을 것이다. 보다 자세한 내용은 각 DBMS의 설명서를 참고하기 바란다.</p>
    </article>
  </section>
</div>