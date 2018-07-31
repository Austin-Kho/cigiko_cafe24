  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p></p>
      </article>
    </section>
  </div>

  <h3 class="sub-header"><svg id="i-code" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M10 9 L3 17 10 25 M22 9 L29 17 22 25 M18 7 L14 27" />
    </svg> SELECT 문
  </h3>
  <div class="chapter">
    <section>
      <article>
        <p>SQL 문은 평범한 영어 단어로 이루어진다, 이러한 단어를 키워드라고 하며 SQL 의 모든 문은 하나 이상의 키워드가 결합되어 구성된다. 'SELECT'문의 목적은 하나 이상의 테이블에서 정보를 가져오는 것이다.</p>
        <blockquote><strong>키워드</strong>: SQL 언어의 일부로 사용되도록 예약된 단어. 키워드를 테이블이나 열의 이름으로 사용해서는 안 된다. 자주 사용되는 예약 단어는 부록 <a href="/book/01/29">E. SQL 예약 단어</a>를 참고한다.</blockquote>
        <p>SELECT 문을 사용해서 테이블 데이터를 가져오려면 최소한 두 가지 정보를 지정해야 한다. 무엇을 선택할 것이며, 어디서 선택할 것인직 바로 이 정보다.</p>
        <div class="tip">
          <h4>예제 따라하기</h4>
          <p>이 책의 각 단원에서 설명하는 샘플 SQL문과 샘플 출력 내용은 부록 <a href="/book/01/25">A. 샘플 테이블 스크립트</a>에서 설명하는 데이터 파일을 사용한다. 이어지는 내용의 예제를 직접 입력하고 실행하기 위해 부록 <a href="/book/01/25">A. 샘플 테이블 스크립트</a>와 <a href="/book/01/26">B. 주요 응용 프로그램에서의 사용</a>을 먼저 읽어보기 바란다.</p>
        </div>
      </article>
    </section>

    <h4 class="sub-header">각 열 가져오기</h4>
    <section>
      <article>
        <p>간단한 SQL SELECT 문부터 살펴보자.</p>
        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>SELECT prod_name<br>FROM Products;</code></pre>

        <h4><span class="badge badge-pill badge-info">분 석</span></h4>
        <p>위 문은 SELECT 문을 사용하여 Products라는 테이블에서 prod_name이라는 열을 가져온다. 가져오고자 하는 열은 이와 같이 SELECT 키워드 바로 옆에 적어주면 되며, FROM 키워드는 데이터를 가져올 테이블의 이름을 지정하는 데 사용된다.</p>
        <h4><span class="badge badge-pill badge-success">출 력</span></h4>
        <pre><code><table class="table-sm">
            <thead>
              <tr>
                <th>prod_name</th>
              </tr>
            </thead>
            <tbody>
            @php
              $data = DB::table('Products')->select('prod_name')->get();
            @endphp
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_name}}</td></tr>
            @endforeach
            </tbody>
          </table></code></pre>
        <div class="tip">
          <h4><span class="badge badge-secondary">참고</span> 정렬되지 않은 데이터</h4><p>실제 쿼리 시 출력 결과가 이와는 다른 순서로 나열된다. 이것은 정상이다. 정렬 방식을 명확하게 지정하지 않을 경우 데이터는 아무 의미 없는 순서로 나열되는 것이 당연하다. 데이터를 정렬 하는 방법은 다음 장에서 설명할 것이므로 여기서는 반환된 행의 숫자만 신경 쓰면 된다.</p>

          <h4><span class="badge badge-secondary">TIP</span> 공백의 사용</h4><p>SQL 문 내에 있는 불필요한 공백은 문이 처리될 때 모두 무시된다. SQL 문은 한 줄에 길게 쓸 수도 있고, 여러 줄에 쓸 수도 있다. 어차피 결과는 같기 때문에 대부분의 개발자들은 읽기 쉽고 디버그 하기도 쉽게 여러 줄에 나눠쓰는 방식을 선호한다.</p>

          <h4><span class="badge badge-secondary">참고</span> 문의 종결</h4>
          <p>여러 SQL 문을 나눌 때는 세미콜론(; 문자)을 사용한다. 대부분의 DBMS에서 이는 필수 사항은 아니지만 특정한 DBMS에서는 각 SQL 문을 구분할 때 세미콜론을 반드시 써 주어야 하는 경우도 있다. </p>

          <h4><span class="badge badge-secondary">참고</span> SQL 문과 대소문자</h4><p>SQL 문은 대소문자를 구별하지 않는다. 즉, SELECT로 쓰나 select로 쓰나 결과는 같다. 개발장 따라 키워드는 대문자로, 테이블과 열 이름은 소문자로 표현하곤 한다. 한 가지 중요한 점은 SQL 문이 대소문자를 구별하지 않는다고 해서 테이블이나 열의 이름도 그렇지는 않다는 점이다. DBMS에 따라 이러한 이름의 대소문자를 구분하는 경우도 있다.</p>
        </div>
      </article>
    </section>

    <h4 class="sub-header">여러 열 가져오기</h4>
    <section>
      <article>
        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>SELECT prod_id, prod_name, prod_price<br>FROM Products;</code></pre>

        <h4><span class="badge badge-pill badge-info">분 석</span></h4>
        <p>위 문은 SELECT 문을 사용하여 Products라는 테이블에서 prod_name이라는 열을 가져온다. 가져오고자 하는 열은 이와 같이 SELECT 키워드 바로 옆에 적어주면 되며, FROM 키워드는 데이터를 가져올 테이블의 이름을 지정하는 데 사용된다.</p>
        <h4><span class="badge badge-pill badge-success">출 력</span></h4>
        
        <pre><code>          
        <table class="table-sm">
            <thead>
              <tr>
                <th>prod_id</th><th>prod_name</th><th>prod_price</th>
              </tr>
            </thead>
            <tbody>
            @php
              $users = DB::table('Products')->select('prod_id', 'prod_name', 'prod_price')->get();
            @endphp
            @foreach($users as $lt)
              <tr><td>{{$lt->prod_id}}</td><td>{{$lt->prod_name}}</td><td>{{$lt->prod_price}}</td></tr>
            @endforeach
            </tbody>
          </table>
        </code></pre>
      </article>
    </section>
  </div>

  <h3 class="sub-header"><svg id="i-code" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M10 9 L3 17 10 25 M22 9 L29 17 22 25 M18 7 L14 27" />
    </svg> SQL이란 무엇인가?</h3>
  <div class="chapter">
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>

    <h4 class="sub-header">데이터</h4>
    <section>
      <article>
        <p>내용 입력</p>
      </article>
    </section>
  </div>