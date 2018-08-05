  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>이 단원에서는 <code>SELECT</code> 문을 사용하여 테이블에서 하나 이상의 열 데이터를 가져오는 방법을 배울 것이다.</p>
      </article>
    </section>
  </div>

  <div class="chapter">
    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> SELECT 문
    </h3>
    <section>
      <article>
        <p>SQL 문은 평범한 영어 단어로 이루어진다, 이러한 단어를 키워드라고 하며 SQL 의 모든 문은 하나 이상의 키워드가 결합되어 구성된다. <code>SELECT</code>문의 목적은 하나 이상의 테이블에서 정보를 가져오는 것이다.</p>
        <blockquote><strong>키워드</strong>: SQL 언어의 일부로 사용되도록 예약된 단어. 키워드를 테이블이나 열의 이름으로 사용해서는 안 된다.</blockquote>
        <p><code>SELECT</code> 문을 사용해서 테이블 데이터를 가져오려면 최소한 두 가지 정보를 지정해야 한다. 무엇을 선택할 것이며, 어디서 선택할 것인직 바로 이 정보다.</p>
        <div class="tip">
          <h4>예제 따라하기</h4>
          <p>이 책의 각 단원에서 설명하는 샘플 SQL문과 샘플 출력 내용은 부록 <a href="/book/01/25">A. 샘플 테이블 스크립트</a>에서 설명하는 데이터 파일을 사용한다. 이어지는 내용의 예제를 직접 입력하고 실행하기 위해 부록 <a href="/book/01/25">A. 샘플 테이블 스크립트</a>와 <a href="/book/01/26">B. 주요 응용 프로그램에서의 사용</a>을 먼저 읽어보기 바란다.</p>
        </div>
      </article>
    </section>

    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> 각 열 가져오기
    </h3>
    <section>
      <article>
        <p>간단한 SQL <code>SELECT</code> 문부터 살펴보자.</p>
        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>SELECT prod_name<br>FROM Products;</code></pre>

        <h4><span class="badge badge-pill badge-info">분 석</span></h4>
        <p>위 문은 <code>SELECT</code> 문을 사용하여 Products라는 테이블에서 prod_name이라는 열을 가져온다. 가져오고자 하는 열은 이와 같이 <code>SELECT</code> 키워드 바로 옆에 적어주면 되며, <code>FROM</code> 키워드는 데이터를 가져올 테이블의 이름을 지정하는 데 사용된다.</p>
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

    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> 여러 열 가져오기
    </h3>
    <section>
      <article>
        <p>테이블에서 여러 열을 가져올 때도 마찬가지로 <code>SELECT</code> 문을 사용한다. 유일한 차이점은 <code>SELECT</code> 문 뒤에 여러 열의 이름을 콤마로 구분하여 적어준다는 것 뿐이다.</p>
        <div class="tip">
            <h4><span class="badge badge-secondary">TIP</span> 콤마 사용 시 주의점</h4>
            <p>여러 열을 선택할 때는 각 열 이름 사이에 콤마를 입력해야 하지만, 가장 마지막 열 뒤에는 콤마를 넣지 않는다.</p>
          </div>
        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>SELECT prod_id, prod_name, prod_price<br>FROM Products;</code></pre>

        <h4><span class="badge badge-pill badge-info">분 석</span></h4>
        <p>위 문은 <code>SELECT</code> 문을 사용하여 Products라는 테이블에서 prod_name이라는 열을 가져온다. 가져오고자 하는 열은 이와 같이 <code>SELECT</code> 키워드 바로 옆에 적어주면 되며, <code>FROM</code> 키워드는 데이터를 가져올 테이블의 이름을 지정하는 데 사용된다.</p>
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
              $data = DB::table('Products')->select('prod_id', 'prod_name', 'prod_price')->get();
            @endphp
            @foreach($data as $lt)
              <tr><td>{{$lt->prod_id}}</td><td>{{$lt->prod_name}}</td><td>{{$lt->prod_price}}</td></tr>
            @endforeach
            </tbody>
          </table>
        </code></pre>
        <div class="tip">
          <h4><span class="badge badge-secondary">참고</span> 데이터의 표현</h4>
          <p>위 출력을 보면 알 수 있겠지만 SQL문을 실행하면 포맷팅 되지 않은 기본 그대로의 데이터가 반환 된다. 데이터 포매팅은 표현 방식의 문제로 데이터를 가져오는 것과는 관계가 없다. 따라서 가격을 통화 단위로 하여 적절한 소수점을 넣어서 표시한다거나 하는 과정은 응용 프로그램에서 처리할 작업이다.</p>
        </div>
      </article>
    </section>

    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> 모든 열 가져오기
    </h3>
    <section>
      <article> 
        <p>원하는 열을 지정하지 않고 지정한 테이블의 모든 열을 가져오려면 와일드카드 문자인 <code>*</code> 를 <code>SELECT</code> 뒤에 적어주면 된다. 이는 '모든 열'을 의미한다.</p>

        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>SELECT *<br>FROM Products;</code></pre>

        <h4><span class="badge badge-pill badge-info">분 석</span></h4>
        <p>와일드카드 문자 <code>*</code>을 지정하면 데이블의 모든 열이 반환된다.</p>
        <div class="tip">
          <h4><span class="badge badge-secondary">주의</span> 와일드카드 사용</h4>
          <p>정말로 테이블의 모든 열이 필요한 경우가 아니라면 <code>*</code> 와일드카드 문자는 사용하지 않는 것이 좋다. SQL 문의 입력하는 수고는 덜 수 있지만 불필요한 열을 가져 오게 되면 성능에 좋지 않은 영향을 주어 응용 프로그램의 속도가 저하되기 때문이다.</p>

          <h4><span class="badge badge-secondary">TIP</span> 알 수 없는 열 가져오기</h4>
          <p>와일드카드 문자의 큰 장점 중 하나는 열 이름을 직접 지정할 필요가 없다는 것으로, 열의 이름을 모를 때 유용하게 사용할 수 있다.</p>
        </div>
      </article>
    </section>

    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> 요약
    </h3>
    <section>
      <article>
        <p>이 단원에서는 SQL <code>SELECT</code> 문을 사용하여 테이블에서 하나의 열, 여러 열, 그리고 모든 열을 가져오는 방법을 배웠다. 다음은 가져온 데이터를 정렬하는 방법을 배울 차례이다.</p>
      </article>
    </section>
  </div>