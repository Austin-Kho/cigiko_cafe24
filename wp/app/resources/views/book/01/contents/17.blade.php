<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 <code>UPDATE</code>와 <code>DELETE</code> 문을 사용하여 테이블 데이터를 제어하는 방법에 대해 알아보자.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 데이터 업데이트
  </h3>
  <section>
    <article>
      <p>테이블의 데이터를 업데이트(변경)할 때는 <code>UPDATE</code> 문을 사용하며, <code>UPDATE</code> 문은 다음과 같은 두 가지 목적으로 사용된다.</p>
      <ul>
        <li>테이블의 특정한 행을 업데이트</li>
        <li>테이블의 모든 행을 업데이트</li>
      </ul>
      <p>각각의 쓰임에 대해 알아보자.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> WHERE 절을 잊지 말자.</h4>
        <p>UPDATE 문을 사용할 때 WHERE 절을 빼놓는 경우가 종종 있는데, 이렇게 되면 WHERE 절에 맞는 행만 업데이트되는 것이 아니라 테이블의 전체 행이 업데이트 되므로 주의를 기울여야 한다, UPDATE 문은 기존 데이터를 바꾸는 것이므로 함부로 테스트해보지 말고 이 단원을 모두 읽은 후에 시도해보기 바란다.</p>
        <h4><span class="badge badge-secondary">TIP</span> UPDATE와 보안</h4>
        <p>UPDATE 문을 실행하려면 클라이언트 - 서버 DBMS에서 특별한 권한을 가지고 있어야 한다. UPDATE 문을 실행하기 전이 이러한 권한이 있는지 확인해보기 바란다.</p>
      </div>
      <p><code>UPDATE</code> 문의 사용 방법은 아주 간단하다. 기본 형식은 다음과 같은 세 부분으로 이루어진다.</p>
      <ul>
        <li>업데이트할 테이블</li>
        <li>열 이름과 새 값</li>
        <li>어떤 행을 업데이트할 것인지 결정하는 필터 조건</li>
      </ul>
      <p>간단한 예를 들어보자. ID가 1000000005인 고객의 전자 메일 주소를 바꾸어야 한다면 다음과 같은 구문을 사용하면 된다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        UPDATE Customers<br>
        SET cust_email = 'kim@thetoystore.com'<br>
        WHERE cust_id = '1000000005';
      </code></pre>
      <p><code>UPDATE</code> 문은 항상 업데이트할 테이블 이름으로 시작한 다음 <code>SET</code> 명령을 사용하여 없데이트할 열과 새 값을 지정한다. 마무리는 <code>WHERE</code> 절에서 어떤 행을 업데이트할지 지정한다. 만약 <code>WHERE</code> 절을 지정하지 않는다면 모든 고객의 전자메일 주소가 kim@thetoystore.com으로 업데이트 되므로 원하지 않는 결과가 발생할 것이다.</p>
      <p>여러 열을 업데이트할 때는 구문이 조금 달라진다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        UPDATE Customers<br>
        SET cust_contact = 'Sam Roberts',<br>
        &nbsp;&nbsp;&nbsp;&nbsp;cust_email = 'sam@toyland.com'<br>
        WHERE cust_id = '1000000006';
      </code></pre>
      <p>이와 같이 여러 열을 업데이트하려면 <code>SET</code> 명령 내에 '열 이름 = 값' 부분을 콤마로 구분하여 여러 번 적어주면 된다(마지막 열 뒤에는 콤마를 적지 않는다).</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> UPDATE 문에서 하위 쿼리 사용</h4>
        <p>하위 쿼리를 UPDATE 문에 사용할 수 있다. 이렇게 하면 SELECT 문에서 선택한 열을 업데이트할 수 있다.</p>
        <h4><span class="badge badge-secondary">TIP</span> FROM 키워드</h4>
        <p>일부 SQL 구현에서는 UPDATE 문에 FROM 절을 쓸 수 있다. 이렇게 하면 특정한 테이블에서 가져온 행으로 다른 테이블의 행을 업데이트할 수 있다. 지원 여분ㄴ 각 DBMS 설명서를 참조하기 바란다.</p>
      </div>
      <p>열의 값을 삭제하려면 <code>NULL</code>로 설정하면 된다. 물론 <code>NULL</code>을 허용하도록 테이블이 정의되어 있는 경우에만 가능하다. 구문은 다음과 같다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        UPDATE Customers<br>
        SET cust_contact = NULL<br>
        WHERE cust_id = '1000000005';
      </code></pre>
      <p>이렇게 하면 cust_email 열의 값이 <code>NULL</code> 로 설정된다.</p>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 데이터 삭제
  </h3>
  <section>
    <article>
      <p>테이블에서 데이터를 삭제하려면 <code>DELETE</code> 문을 사용한다. <code>DELETE</code> 문은 다음 과 같은 두 가지 방법으로 사용할 수 있다.</p>
      <ul>
        <li>테이블에서 특정한 행을 삭제</li>
        <li>테이블에서 모든 행을 삭제</li>
      </ul>
      <p>각각의 쓰임에 대해 알아보자.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> WHERE 절을 잊지 말자.</h4>
        <p>DELETE 문을 사용할 때 WHERE 절을 사용하지 않으면 테이블의 모든 행을 지우게 된다. 이와 같이 DELETE 문을 잘못 사용하면 피해가 심각할 수 있으므로 주의해야 한다.</p>
        <h4><span class="badge badge-secondary">TIP</span> DELETE 와 보안</h4>
        <p>DELETE 문을 사용하려면 클라이언트 - 서버 DBMS 에서의 특별한 보안 권한이 필요하다. DELETE 문을 사용하기 전에 이러한 보안 권한이 있는지 확인해 보기 바란다.</p>
      </div>
      <p><code>UPDATE</code> 문은 사용하기 쉽다고 설명했었다. <code>DELETE</code> 문은 이보다 더 쉽다.</p>
      <p>Customers 테이블에서 한 행을 삭제하는 문은 다음과 같다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        DELETE FROM Customers<br>
        WHERE cust_id = '1000000006';
      </code></pre>
      <p>이 문의 쓰임을 쉽게 이해할 수 있을 것이다. <code>DELETE FROM</code> 은 어떤 테이블의 데이터를 삭제할 것인지 지정하는 부분이고, <code>WHERE</code> 절은 어떤 행을 삭제할지 지정하는 부분이다. 만약 <code>WHERE</code> 절을 지정하지 않으면 Customers 테이블의 모든 행이 삭제된다.</p>
      <div class="tip">
        <h4><spam class="badge badge-secondary">TIP</spam> FROM 키워드</h4>
        <p>일부 SQL 구현에서는 DELETE 문 뒤에 FROM 키워드가 선택적으로 사용되는 경우가 있다. 하지만 가능하면 항상 FROM 키워드를 써주는 습관을 들이는 것이 좋다. 이렇게 하면 모든 DBMS 에서 작동하는 코드를 만들 수 있기 때문이다.</p>
      </div>
      <p><code>DELETE</code> 에는 열 이름이나 와일드카드 문자를 사용할 수 없으며 열이 아닌 전체 행을 삭제한다. 특정한 열을 삭제하려면 <code>UPDATE</code> 문을 사용해서 <code>NULL</code>로 설정해 주어야 한다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> 테이블이 아니라 테이블의 내용이다.</h4>
        <p>DELETE 문은 테이블에서 행을 삭제하는 것이며, 전체 행을 삭제한다고 해도 테이블 자체를 삭제하는 것은 아니다.</p>
        <h4><span class="badge badge-secondary">TIP</span> 빠른 삭제</h4>
        <p>테이블의 모든 행을 삭제하려면 DELETE 대신에 TRUNCATE TABLE 문을 사용하는 것이 좋다. 이렇게 하면 결과는 동일하지만 데이터 변화를 기록하지 않기 때문에 훨씬 속도가 빠르다.</p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 데이터 업데이트와 삭제에 대한 가이드라인
  </h3>
  <section>
    <article>
      <p>지금까지 소개한 <code>UPDATE</code>와 <code>DELETE</code> 문에는 모두 <code>WHERE</code> 절이 있었으며, 이렇게 하는 데에는 분명한 이유가 있다. <code>WHERE</code> 절을 생략하면 <code>UPDATE</code>나 <code>DELETE</code>는 테이블의 모든 행에 적용될 것이다. 즉 테이블의 모든 행을 업데이트하거나 삭제하게 되기 때문이다.</p>
      <p>일반적으로 SQL 프로그래머가 따라야 하는 지침은 다음과 같다.</p>
      <ul>
        <li>전체 행을 업데이트하거나 삭제하려는 경우가 아니면 절대 <code>WHERE</code> 절이 없는 채로 <code>UPDATE</code> 나 <code>DELETE</code> 문을 실행하지 않는다.</li>
        <li>테이블에 기본 키가 있는 지 확인하고(기본키에 대해서는 12장을 참조하기 바란다), 만약 있다면 이를 <code>WHERE</code> 절의 조건으로 사용하자. 각 기본 키를 직접 지정하거나, 기본 키를 지정하거나 값의 범위를 지정할 수도 있다.</li>
        <li><code>UPDATE</code> 나 <code>DELETE</code> 문에서 <code>WHERE</code> 절을 사용하기 전에 <code>WHERE</code> 절을 통해 필터링되는 대상이 정확한지 확인하기 위해 <code>SELECT</code> 문을 사용해보자. 잘못된 <code>WHERE</code> 절로 <code>UPDATE</code> 나 <code>DELETE</code> 문을 실행한 뒤에는 돌이킬 수 없다.</li>
        <li>데이터베이스에서 지정하는 참조 무결성을 사용하자(12장 참조). 이렇게 하면 업데이트하거나 지우는 행이 다른 테이블에 연결되어 있을 경우 데이터베이스의 무결성 규칙에 의해 제지되므로 보다 안전하다.</li>
        <li>어떤 DBMS 에서는 데이터베이스 관리자가 <code>WHERE</code> 절이 없는 <code>UPDATE</code> 나 <code>DELETE</code> 문의 실행을 막을 수 있는 규칙을 만들 수도 있다.이러한 기능이 지원되는지 확인하고, 필요하다면 사용해보자.</li>
      </ul><br>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> 주의해서 사용하자.</h4>
        <p>SQL 에는 '실행 취소' 기능이 없다. UPDATE 나 DELETE 를 실행한 후에는 되돌릴 수 없으므로 잘못된 데이터를 업데이트하거나 지우지는 않는지 반드시 확인하기 바란다.
        </p>
      </div>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 요약
  </h3>
  <section>
    <article>
      <p>이 단원에서는 <code>UPDATE</code>와 <code>DELET</code>E 문을 사용하여 테이블의 데이터를 제어하는 방법을 배웠다. 각 문의 구문과 잠재된 위험성을 알아보았으며, <code>UPDATE</code>와 <code>DELETE</code> 문에서 <code>WHERE</code> 절이 중요한 이유도 설명하였다. 마지막으로 데이터가 유실되는 상황을 막기 위해 일반적으로 따라야 하는 지침에 대해 살펴보았다.</p>
    </article>
  </section>
</div>