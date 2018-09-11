<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 트랜잭션이 무엇인지 알아보고 <code>COMMIT</code> 및 <code>ROLLBACK</code> 문을 사용하여 트랜잭션을 처리하는 방법에 대해 배워보자.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 트랜잭션 처리의 이해
  </h3>
  <section>
    <article>
      <p>트랜잭션 처리란 일련의 SQL 작업이 완전히 모두 수행되거나 모두 수행되지 않도록 하여 데이터베이스 무결성을 유지하기 위한 방법이다.</p>

      <p>12장 '테이블 조인'에서 설명했듯이 관계형 데이터베이스에서 데이터는 보다 쉬운 조작과 관리, 재사용을 위해 여러 테이블에 나우어 저장되므로 관계형 데이터베이스 디자인의 방법과 이유에 대해 잘 알아야만 여러 데이터를 효율적인 형태러 서로 연결하여 저장하고, 활용할 수 있다.</p>

      <p>지난 18개 단원에서 계속 예로 사용해온 Orders 테이블을 생각해보자. 실제 주문은 Orders 테이블에, 주문한 항목은 OrderItems 테이블에 각각 저정되며 이 두 테이블은 기본 키라난 고유한 ID 를 사용하여 서로 연결되어 있다. 또한 이러한 테이블은 다시 고객이나 제춤 정보를 담고 있는 다른 테이블과 연결된다.</p>

      <p>시스템에서 주문을 추가하는 절차는 다음과 같다.</p>

      <ol>
        <li>이미 데이터베이스에 있는 고객인지 확인하고, 새 고객이라면 추가한다.</li>
        <li>고객의 ID를 얻는다.</li>
        <li>고객 ID와 연결된 행을 Orders 테이블에 추가한다.</li>
        <li>Orders 테이블에 할당된 새 주문 ID를 얻는다.</li>
        <li>주문된 각 항목에 대해 하나씩의 행을 OrderItems 테이블에 추가하고 가져온 ID를 사용하여 Orders 테이블과 연결한다(Products 테이블과는 제품 ID로 연결한다).</li>
      </ol>

      <p>이러한 작업을 수행하는 도중에 디스크 용량 부족, 보안 제한 사항, 테이블 잠금 등과 같은 데이터베이스 오류가 발생하여 전체 작업이 모두 완료되지 않았다면 어떻게 될까?</p>

      <p>만약 고객이 추가되고 Orders 테이블이 추가되기 전에 문제가 발생했다면 큰 오류는 없을 것이다. 주문 내역이 없는 새 고객이 추가된 정도의 결과이기 때문이다. 나중에 다시 이 작업을 수행하면 미리 삽입된 고객 정보가 그대로 사용될 수 있다.</p>

      <p>그러나 Orders 테이블에 행이 추가된 후, OrderItems 행이 추가되기 전에 오류가 발생이 되면 어떻게 될까? 주문은 주문인데 주문 항목이 없는 주문된 항목 정보가 없는 빈 주문이 데이터베이스에 남게 된다.</p>

      <p>OrderItems 행을 추가하는 도중에 오류가 발생하면 상황은 더 나빠진다. 주문의 일부 내역만 데이터베이스에 남게 될 것이고, 이 정보가 잘못된 것인지 조차 알 수가 없다.</p>

      <p>이러한 문제를 어떻게 해결해야 할까? <mark><u>트랜잭션</u></mark>이 해답이다. 트랜잭션 처리는 여러 SQL 작업을 하나로 묶고, 모든 작업이 완벽하게 실행을 마칠 수 있는 상황이 아니라면 아예 한 작업도 실행되지 않게끔 유지해 준다. 모두 실행되거나 모두 실행되지 않거나, 둘 중 하나인 것이다. 오류가 없으면 모든 작업이 정상적으로 처리될 테지만 만약 오류가 발생하면 롤백(실행 취소)이 작동하여 현재 트랜잭션이 모든 작업이 실행되기 전의 안전한 상태로 데이터베이스를 돌려 놓는다.</p>

      <p>같은 예지만 이번에는 트랜잭션 처리를 도입하여 어떤 과정으로 처리되는지 살펴보자.</p>

      <ol>
        <li>이미 데이터베이스에 있는 고객인지 확인하고, 새 고객이라면 추가한다.</li>
        <li>고객 정보를 커밋(<code>Commit</code>)한다.</li>
        <li>고객의 ID 를 얻는다.</li>
        <li>Orders 테이블에 행을 추가한다.</li>
        <li>Orders 에 행을 추가하는 중 오류가 발생하면 롤백한다.</li>
        <li>Orders 테이블에 할당된 새 주문 ID를 가져온다.</li>
        <li>주문된 각 항목 당 하나의 행을 OrderItems> 테이블에 추가한다.</li>
        <li>OrderItems 테이블에 행을 추가하는 중 오류가 발생하면 추가된 OrderItems 및 Orders 행을 취소하고 롤백한다.</li>
      </ol>

      <p>트랜잭션에 대해 다룰 때 자주 등장하는 키워드들이 있다. 먼저 이 용어들에 대해 알아보자.</p>

      <ul>
        <li>트랜잭션 - SQL 문의 블록</li>
        <li>롤백 - 지정된 SQL 문의 실행을 취소하는 절차</li>
        <li>커밋 - 저장되지 않은 SQL 문을 데이터베이스 테이블에 쓰는 작업</li>
        <li>저장 지점 - 트랜잭션 내의 임시 작업 위치로, 롤백을 실행하는 시점이 된다. 전체 트랜잭션을 롤백하는 것이 아니라 이 지점부터 롤백된다.</li>
      </ul><br>

      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 롤백할 수 있는 문</h4>
        <p>트랜잭션은 <code>INSERT</code>, <code>UPDATE</code>, <code>DELETE</code> 문을 관리하는데 사용되며 <code>SELECT</code> 문은 롤백할 수 없다(사실 이렇게 할 필요도 없을 것이다). <code>CREATE</code>나 <code>DROP</code> 작업도 롤백할 수 없으며 트랜잭션 블록 내에서 쓸 수눈 있지만 롤백되지는 않는다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 트랜잭션 제어
  </h3>
  <section>
    <article>
      <p>트랜잭션이 무엇인지 알았으므로 이제 트랜잭션 관리에 관련된 내용을 알아보자.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> 구현 방식이 다르다.</h4>
        <p>트랜잭션을 구현하는 데 사용되는 문은 DBMS 에 따라 다르다. 정확한 문은 DBMS 설명서를 참조하기 바란다.</p>
      </div>

      <p>트랜잭션 관리의 핵심은 SQL 문을 논리적인 블록으로 나누고 어느 지점에서 롤백할 것인지 명확히 지정하는 것이다.</p>
      <p>트랜잭션 블록의 시작과 끝을 정확히 지정해 주어야 하는 DBMS도 있다. 예를 들어 SQL Server 의 경우 다음과 같이 지정해 주어야 한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        BEGIN TRANSACTION<br>
        ...<br>
        COMMIT TRANSACTION
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예에서 <code>BEGIN TRANSACTION</code>과 <code>COMMIT TRANSACTION</code> 내의 모든 SQL 문은 모두 실행되거나, 모두 실행되지 않는다.</p>

      <p>MySQL에서는 다음과 같다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        START TRANSACTION<br>
        ...
      </code></pre>
      <p>PostgreSQL은 ANSO SQL 구문을 사용한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        BEGIN;<br>
        ...
      </code></pre>
      <p>이 외에도 DBMS에 따라 구문이 조금씩 다르다.</p>
    </article>
  </section>

  <h4 class="sub-header">ROLLBACK 사용</h4>
  <section>
    <article>
      <p>SQL의 <code>ROLLBACK</code> 명령은 SQL 문을 롤백하는 데 사용되며 구문은 다음과 같다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        DELETE FROM Orders;<br>
        ROLLBACK;
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예에서 <code>DELETE</code> 작업이 수행된 다음 <code>ROLLBACK</code> 문이 실행되었으므로 삭제 작업이 취소되고 원래 상태로 돌아간다. 좋은 예라고 할 수는 없지만 <code>INSERT</code> 나 <code>UPDATE</code> 와 마찬가지로 트랜잭션 블록 내의 마지막 문이 <code>DELETE</code> 가 되어서는 안된다는 점을 보여주고 있다.</p>
    </article>
  </section>

  <h4 class="sub-header">COMMIT 사용</h4>
  <section>
    <article>
      <p>대개 SQL 문은 실행되고 데이터베이스 테이블에 그 결과가 곧바로 반영되며 이를 암시적 커밋이라고 한다. 직접 지정하지 않아도 암시적인 방식으로 자동으로 커밋되는 것을 말한다.</p>

      <p>하지만 트랜잭션 블록의 경우 대개 커밋이 암시적으로 실행되지는 않으며 DBMS마다 조금씩 다르다. 즉 어떤 DBMS 에서는 암시적인 커밋을 사용하는 경우도 있고 그렇지 않은 경우도 있다.</p>

      <p>명시적으로 커밋하려면 <code>COMMIT</code> 문을 실행하면 된다. SQL Server 에서의 예를 들어보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        BEGIN TRANSACTION<br>
        DELETE OrderItems WHERE order_num = 12345<br>
        DELETE Orders WHERE order_num = 12345<br>
        COMMIT TRANSACTION
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예에서는 주문 번호 '12345'가 시스템에서 완전히 삭제된다. 이 트랜잭션은 Orders 와 OrderItems 라는 두 개의 테이블에 관련되어 있는데, 트랜잭션이 사용된 것은 두 테이블 중 하나에서만 삭제되는 부분적인 삭제가 이루어지지 않도록 하기 위해서이다. 마지막 <code>COMMIT</code> 문에 이르기까지 아무런 오류 없이 작업이 진행되었다면 이 문에 작업이 커밋되고, 지정한 내용이 완전히 삭제된다. 물론 도중에 오류가 발생했다면 커밋되지 않고 롤백된다.</p>

      <p>같은 작업이지만 Oracle에서는 방법이 조금 다르다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        DELETE OrderItems WHERE order_num = 12345;<br>
        DELETE Orders WHERE order_num = 12345;<br>
        COMMIT;
      </code></pre>
    </article>
  </section>

  <h4 class="sub-header">저장 지점 사용</h4>
  <section>
    <article>
      <p>간단한 <code>ROLLBACK</code> 과 <code>COMMIT</code> 문을 사용하는 것만으로 트랜잭션을 충분히 활용할 수 있지만 이는 간단란 트랜잭션의 경우이며 보다 복잡한 경우는 부분적인 커밋이나 롤백이 필요하다.</p>

      <p>예를 들어, 앞서 설명한 주문 추가 작업은 하나의 트랜잭션이지만 오류가 발생하면 Orders 행이 추가되기 전의 시점으로 되돌려야 하며, 만약 그 전에 Customers 테이블에 추가 작업을 헸다면 여기까지는 되돌리고 싶지 않을 것이다.</p>

      <p>부분적인 트랜잭션 롤백을 지원하기 위해서는 논리적인 지점을 결정하여 표시를 해두어야 한다. 롤백이 필요하면 이 위치까지만 롤백이 되도록 지정하는 것이다.</p>

      <p>SQL에서 이러한 임시 위치를 <mark>저장 지점</mark>이라고 한다. MySQL과 Oracle 에서 이러한 저장 지점을 만들려면 <code>SAVEPOINT</code> 문을 다음과 같이 사용하면 된다(SQL Server의 예이다).</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>ROLLBACK TRANSACTION delete1;</code></pre>
      <p>MySQL과 Oracle 에서는 다음과 같은 방법이 사용된다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>ROLLBACK TO delete1;</code></pre>
      <p>약간 복잡한 SQL Server 예를 들어보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        BEGIN TRANSACTION<br>
        INSERT INTO Customers(cust_id, cust_name)<br>
        VALUES('1000000010', 'Toys Emporium');<br>
        SAVE TRANSACTION StartOrder;<br>
        INSERT INTO Orders(order_num, order_date, cust_id)<br>
        VALUES(20100, '2001/12/1', '1000000010');<br>
        IF @@ERROR <> 0 ROLLBACK TRANSACTION StartOrder;<br>
        INSERT INTO OrderItems(order_num, order_item, prod_id, quantity, item_price)<br>
        VALUES(20010, 1, 'BR01', 100, 5.49);<br>
        IF @@ERROR <> 0 ROLLBACK TRANSACTION StartOrder;<br>
        INSERT INTO OrderItems(order_num, OrderItems, prod_id, quantity, item_price)<br>
        VALUES(20010, 2, 'BR03', 100, 10.99);
        IF @@ERROR <> 0 ROLLBACK TRANSACTION StartOrder;
        COMMIT TRANSACTION
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>트랜잭션 블록 내에 4개의 <code>INSERT</code> 문이 사용되었다. 저장 지점은 첫 번째 <code>INSERT</code> 문 뒤에 지정되었으므로 이후 <code>INSERT</code> 작업이 실패해더라도 첫 번째 <code>INSERT</code> 작업은 취소되지 않고, 저장 지점까지만 되돌려진다. <code>@@ERROR</code> 는 작업이 성공했는지 확인하는 데 사용되는 SQL Server의 변수로(다른 DBMS의 경우는 이 기능을 하는 함수나 변수의 이름이 다르다), 이 값이 0이 아니라면 오류가 발생한 것이므로 저정 지점까지 되돌려야 하고, 0이라면 오류가 없는 것이므로 마지막 <code>COMMIT</code> 문까지 계속 실행되어 트랜잭션이 종료된다.</p>

      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> 저장 지점은 많을수록 좋다.</h4>
        <p>SQL 코드의 저장 지점은 많이 지정할수록 좋다. 롤백 지점을 보다 세부적으로 지정할 수 있기 때문이다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>이 단원에서 우리는 묶어 실행할 수 있는 SQL 문을 트랜잭션으로 만드는 방법을 살펴보았으며 <code>COMMIT</code>과 <code>ROLLBACK</code> 문을 사용하여 작업 을 관리하는 방법도 배웠다. 또한 롤백 작업이 이루어질 지점을 지정하기 위해 저장 지점을 사용하는 방법도 살펴보았다.</p>
    </article>
  </section>
</div>