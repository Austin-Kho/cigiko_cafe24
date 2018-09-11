<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>필요한 구문을 빠르게 찾을 수 있도록 하기 위해 이 부록에서는 SQL 작업에서 가장 자주 사용되는 구문을 정리하였다. 각 문에 대한 간략한 설명, 적절한 구문을 정리하였다.</p>
      <p>문의 구문을 확인할 때는 다음 사항에 주의하기 바란다.</p>
      <ul>
        <li><code>|</code>기호는 여러 옵션 중 하나를 의미한다. 즉 NULL|NOT NULL은 NULL이나 NOT NULL 중 하나를 지정할 수 있다는 의미이다.</li>
        <li>대괄호 내에 있는 키워드나 절, 즉 [이러한 스티일의 부분]은 선택적이라는 의미이므로 지정해도 되고, 지정하지 않아도 된다.</li>
        <li>여기서 소개하는 구문은 대부분의 DBMS에서 작동하지만 반드시 그런 것은 아니며 세부사항은 DBMS별로 다를 수 있다.</li>
      </ul>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> ALTER TABLE
  </h3>
  <section>
    <article>
      <p>ALTER TABLE 은 기존 테이블의 스키마를 업데이트하는 데 사용된다. 새 테이블을 만드는 데는 CREATE TABLE 을 사용한다. 자세한 내용은 <a href="/book/01/18">17장 '테이블의 생성과 제어'</a>를 참조하기 바란다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        ALTER TABLE tablename<br>
        (<br>
&nbsp;&nbsp;&nbsp;ADD|DROP column 데이터 형식 [NULL|NOT NULL] [제약 조건],<br>
&nbsp;&nbsp;&nbsp;ADD|DROP column 데이터 형식 [NULL|NOT NULL] [제약 조건],<br>
&nbsp;&nbsp;&nbsp;...<br>
        );
      </code></pre>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> COMMIT
  </h3>
  <section>
    <article>
      <p>COMMIT 은 트랜잭션에 의한 변경 내용을 승인하여 데이터베이스에 적용하는 데 사용된다. 자세한 내용은 <a href="/book/01/21">20장 '트랜잭션 처리'</a>를 참조하기 바란다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        COMMIT [트랜잭션];
      </code></pre>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> CREATE INDEX
  </h3>
  <section>
    <article>
      <p>CREATE INDEX 는 하나 이상의 열에 대한 인덱스를 만드는 데 사용된다. 자세한 내용은 <a href="/book/01/23">22장 '고급 SQL 기능의 이해'</a>를 참조하기 바란다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE INDEX 인덱스 이름<br>
        ON 테이블 이름(열, ...);
      </code></pre>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> CREATE PROCEDURE
  </h3>
  <section>
    <article>
      <p>CREATE PROCEDURE 는 저장 프로시저를 만드는 데 사용된다. 자세한 내용은 <a href="/book/01/20">19장 '저장 프로시저의 사용'</a>을 참조하기 바란다. Oracle의 경우는 이 단원에서 설명하는 것과 다른 구문을 사용한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE PROCEDURE 프로시저 이름[매개변수][옵션]<br>
        AS<br>
        SQL 문;
      </code></pre>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> CREATE TABLE
  </h3>
  <section>
    <article>
      <p>CREATE TABLE 은 새 데이터베이스 테이블을 만드는 데 사용된다. 기존 테이블의 스키마를 업데이트하는 데는 ALTER TABLE 이 사용된다. 자세한 내용은 <a href="/book/01/18">17장 '테이블이 생성과 제어'</a>를 참조하기 바란다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE TABLE 테이블 이름<br>
        (<br>
&nbsp;&nbsp;&nbsp;column 데이터 형식 [NULL|NOT NULL] [제약 조건],<br>
&nbsp;&nbsp;&nbsp;column 데이터 형식 [NULL|NOT NULL] [제약 조건],<br>
&nbsp;&nbsp;&nbsp;...<br>
        );
      </code></pre>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> CREATE VIEW
  </h3>
  <section>
    <article>
      <p>CREATE VIEW는 하나 이상의 테이블에 대한 새로운 뷰를 만드는 데 사용된다. 자세한 내용은 <a href="/book/01/19">18장 '뷰 사용'</a>을 참조하기 바란다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        CREATE VIEW 뷰 이름 AS<br>
        SELECT 열, ...<br>
        FROM 테이블, ...<br>
        [WHERE ...]<br>
        [GROUP BY ...]<br>
        [HAVING ...];
      </code></pre>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> DELETE
  </h3>
  <section>
    <article>
      <p>DELETE 는 테이블에서 하나 이상의 행을 삭제하는 데 사용된다. 제사한 내용은 <a href="/book/01/17">16장 '데이터의 업데이트와 삭제'</a>를 참조하기 바란다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        DELETE FROM 테이블 이름<br>
        [WHERE ...];
      </code></pre>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> DROP
  </h3>
  <section>
    <article>
      <p>DROP 은 데이터베이스 개체(테이블, 뷰, 인덱스 등)를 영구적으로 삭제할 때 사용된다. 자세한 내용은 <a href="/book/01/18">17장</a>과 <a href="/book/01/19">18장</a>을 참조하기 바란다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        DROP INDEX|PROCEDURE|TABLE|VIEW 인덱스 이름|프로시저 이름|테이블 이름|뷰 이름;
      </code></pre>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> INSERT
  </h3>
  <section>
    <article>
      <p>INSERT 는 테이블의 하나의 행을 추가하는 데 사용된다. 자세한 내용은 <a href="/book/01/16">15장 '데이터 삽입'</a>을 참조하기 바란다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        INSERT INTO 테이블 이름 [(열, ...)]<br>
        VALUES (값, ...);
      </code></pre>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> INSERT SELECT
  </h3>
  <section>
    <article>
      <p>INSERT SELECT 는 SELECT 문의 결과를 테이블에 삽입하는 데 사용된다. 자세한 내용은 <a href="/book/01/16">15장 '데이터 삽입'</a>을 참조하기 바란다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        INSERT INTO 테이블 이름 [(열, ...)]<br>
        SELECT 열, ... FROM 테이블 이름, ...<br>
        [WHERE ...];
      </code></pre>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> ROLLBACK
  </h3>
  <section>
    <article>
      <p>ROLLBACK 은 트랜잭션 블록에서 수행된 내용을 취소하고 원래 상태로 되돌리는 데 사용된다. 자세한 내용은 <a href="/book/01/21">20장 '트랜잭션 처리'</a>를 참조하기 바란다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        ROLLBACK [ TO 저장 지점 이름];
      </code></pre>
      <p>또는 다음 구문을 사용한다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        ROLLBACK TRANSACTION;
      </code></pre>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> SELECT
  </h3>
  <section>
    <article>
      <p>SELECT 는 하나 이상의 테이블(또는 뷰)에서 데이터를 가져오는 데 사용된다. 개본적인 정보는 <a href="/book/01/3">2장 '데이터 가져오기'</a>, <a href="/book/01/4">3장 '가져온 데이터 정렬하기'</a>, <a href="/book/01/5">4장 '데이터 필터링'</a>을 참조하기 바라며 2에서 14장까지의 모든 단원에서 SELECT를 사용하므로 추가적인 세부 내용이 설명되어 있다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT 열이름, ...<br>
        FROM 테이블이름, ...<br>
        [WHERE ...]<br>
        [UNION ...]<br>
        [GROUP BY ...]<br>
        [HAVING ...]<br>
        [ORDER BY ...];
      </code></pre>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> UPDATE
  </h3>
  <section>
    <article>
      <p>UPDATE 는 테이블에서 하나 이상의 행을 업데이트하는 데 사용된다. 자세한 내용은 <a href="/book/01/17">16장 '데이터의 업데이트와 삭제'</a>를 참조하기 바란다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        UPDATE 테이블이름<br>
        SET 열이름 = 값, ...<br>
        [WHERE ...];
      </code></pre>
    </article>
  </section>
</div>