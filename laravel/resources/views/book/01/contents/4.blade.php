  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>이 단원에서는 SELECT 문의 ORDER BY 절을 사용하여 가져온 데이터를 필요에 따라 정렬하는 방법을 살펴보자.</p>
      </article>
    </section>
  </div>

  <div class="chapter">
    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> 데이터 정렬
    </h3>
    <section>
      <article>
        <p>지난 단원에서 실행했던 <code>SELECT</code> 문을 실행하면 아무런 순서도 정렬되어 있지 않고 완전히 무작위 순서로 정렬된다. 관계 데이터베이스 디자인 이론에 따르면 직접적인 순서를 지정하지 않는 한 가져온 데이터는 특정한 방식으로 정렬되지 않는다.</p>
        <p><code>SELECT</code> 문을 사용해서 가져온 데이터를 직접적으로 정렬하려면 <code>ORDER BY</code> 절을 사용한다. <code>ORDER BR</code> 절과 하나 이상의 열을 지정하면 그 열을 기준으로 출력결과가 정렬된다.</p>

        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>
          SELECT prod_name<br>
          FROM Products<br>
          ORDER BY prod_name;
        </code></pre>
        <h4><span class="badge badge-pill badge-info">분 석</span></h4>
        <p>이 문은 ORDER BY 절을 지정하여 DBMS 소프트웨어에 데이터를 prod_name 열의 알파벳 순으로 정렬하라고 지시한 것 외에는 전에 살펴본 것과 동일하다.</p>
        <h4><span class="badge badge-pill badge-success">출 력</span></h4>
        <pre><code>
          <table class="table-sm">
            <thead>
              <tr><th>prod_name</th></tr>
            </thead>
            <tbody>
              @php
                $data = DB::table('Products')->select('prod_name')->orderBy('prod_name')->get();
              @endphp
              @foreach($data as $lt)
              <tr><td>{{$lt->prod_name}}</td></tr>
              @endforeach              
            </tbody>
          </table>
        </code></pre>
        <div class="tip">
          <h4><span class="badge badge-secondary">주의</span> ORDER BY 절의 위치</h4>
          <p>ORDER BY 절을 지정할 때는 이 절이 SELECT 문의 마지막 절이 되도록 하자. 절의 순서를 잘못 지정하면 오류가 발생하게 된다.</p>
          <h4><span class="badge badge-secondary">TIP</span> 선택되지 않은 열로 정렬</h4>
          <p>ORDER BY 절에 지정하는 열은 대게 출력을 위해 선택된 열 중 하나이지만 반드시 그럴 필요는 없다. 즉 가져올 열이 아닌 다른 열로 데이터를 정렬하는 것도 무방하다.</p>
        </div>

      </article>
    </section>

    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> 여러 열로 정렬
    </h3>
    <section>
      <article>
        <p>때로는 여러 열을 기준으로 데이터를 정렬해야 할 경우가 있다. 예를 들어 직원 목록을 출력할 때 성을 기준으로 먼저 정렬한 다음, 성이 같은 사람에 한해서 다시 이름을 기준으로 정렬해야 한다면 이 두 열을 정렬 기준으로 함께 사용할 수 있다.</p>
        <p>여러 열을 정렬 기준으로 사용하려면 열의 이름을 콤마로 구분하여 적어주면 된다.</p>
        <p>다음 코드는 세 열을 가져온 다음 그 중 두 열인 가격과 이름을 사용하여 데이터를 정렬한다.</p>
        
        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>
          SELECT prod_id, prod_price, prod_name<br>
          FROM Products<br>
          ORDER BY prod_price, prod_name;
        </code></pre>
        <h4><span class="badge badge-pill badge-success">출 력</span></h4>
        <pre><code>
          <table class="table-sm">
            <thead>
              <tr><th>prod_id</th><th>prod_price</th><th>prod_name</th></tr>
            </thead>
            @php
              $data = DB::table('Products')->select('prod_id', 'prod_price', 'prod_name')->orderBy('prod_price')->orderBy('prod_name')->get()
            @endphp
            <tbody>
              @foreach($data as $lt)
              <tr><td>{{$lt->prod_id}}</td><td>{{$lt->prod_price}}</td><td>{{$lt->prod_name}}</td></tr>
              @endforeach
            </tbody>
          </table>
        </code></pre>
        <p>여러 열로 정렬할 때는 열이 적은 순서대로 정렬됨을 기억해야 한다. 즉, 위의 결과에서 prod_price가 같은 항목이 있었기 때문에 그러한 항목에 한해 prod_name으로 정렬이 되었다.</p>

      </article>
    </section>
    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> 열 위치를 기준으로 정렬
    </h3>
    <section>
      <article>
        <p>ORDER BY 에 지정하는 열은 이름으로도 지정할 수 있지만 상대적인 열의 위치로도 지정할 수 있다.</p>

        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>
          SELECT prod_id, prod_price, prod_name<br>
          FROM Products<br>
          ORDER BY 2, 3;
        </code></pre>
        <h4><span class="badge badge-pill badge-success">출 력</span></h4>
        <pre><code>
          <table class="table-sm">
            <thead>
              <tr><th>prod_id</th><th>prod_price</th><th>prod_name</th></tr>
            </thead>
            @php
              $data = DB::table('Products')->select('prod_id', 'prod_price', 'prod_name')->orderBy(DB::raw('2'))->orderBy(DB::raw('3'))->get()
            @endphp
            <tbody>
              @foreach($data as $lt)
              <tr><td>{{$lt->prod_id}}</td><td>{{$lt->prod_price}}</td><td>{{$lt->prod_name}}</td></tr>
              @endforeach
            </tbody>
          </table>
        </code></pre>

        <h4><span class="badge badge-pill badge-info">분 석</span></h4>
        <p>결과는 전과 동일하다. 다른 것은 입력된 SQL 문뿐이다. 이번에는 열의 이름을 지정하는 대신 2, 3이라는 숫자가 사용되었는데 이는 두 번째 열로 정렬한 다음 두 번째 열의 값이 같은 항목에 대해서만 세 번째 열로 데이터를 정렬하라는 의미이다.</p>
        <p>이 방법을 사용하면 열의 이름을 다시 입력해야 하는 수고를 덜 수 있지만, 잘못 된 열을 입력할 가능성도 높아진다. 또한 만약 데이터의 순서가 바꾸면 SELECT 문도 수정해야 하며, SELECT 문에 없는 열로 데이터를 정렬할 수는 없다는 점도 무시할 수 없는 단점이다.</p>
      </article>
    </section>
  
    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> 정렬 방향 지정
    </h3>
    <section>
      <article>
        <p>데이터 정렬을 오름차순(A부터 Z까지)으로만 할 수 있는 것은 아니다. 이 정렬이 기본 설정이긴 하지만 반대 순서인 내림차순으로 정렬하려면 <code>DESC</code> 키워드를 적어주면 된다.</code></p>
        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>
          SELECT prod_id, prod_price, prod_name<br>
          FROM Products<br>
          ORDER BY prod_price DESC;
        </code></pre>
        
        <h4><span class="badge badge-pill badge-success">출 력</span></h4>
        <pre><code>
          <table class="table-sm">
            <thead>
              <tr><th>prod_id</th><th>prod_price</th><th>prod_name</th></tr>
            </thead>
            @php
              $data = DB::table('Products')->select('prod_id', 'prod_price', 'prod_name')->orderBy('prod_price', 'desc')->get()
            @endphp
            <tbody>
              @foreach($data as $lt)
              <tr><td>{{$lt->prod_id}}</td><td>{{$lt->prod_price}}</td><td>{{$lt->prod_name}}</td></tr>
              @endforeach
            </tbody>
          </table>
        </code></pre>

        <p>여러 열을 정렬에 사용할 경우는 어떻게 될까? 다음 코드는 먼저 가격의 내림차순으로 정렬한 다음, 가격이 같은 항목을 제품 이름의 오름차순으로 정렬한다.</p>

        <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
        <pre><code>
          SELECT prod_id, prod_price, prod_name<br>
          FROM Products<br>
          ORDER BY prod_price DESC, prod_name;
        </code></pre>
        
        <h4><span class="badge badge-pill badge-success">출 력</span></h4>
        <pre><code>
          <table class="table-sm">
            <thead>
              <tr><th>prod_id</th><th>prod_price</th><th>prod_name</th></tr>
            </thead>
            @php
              $data = DB::table('Products')
              ->select('prod_id', 'prod_price', 'prod_name')
              ->orderBy('prod_price', 'desc')
              ->orderBy('prod_name')->get()
            @endphp
            <tbody>
              @foreach($data as $lt)
              <tr><td>{{$lt->prod_id}}</td><td>{{$lt->prod_price}}</td><td>{{$lt->prod_name}}</td></tr>
              @endforeach
            </tbody>
          </table>
        </code></pre>

        <h4><span class="badge badge-pill badge-info">분 석</span></h4>
        <p>DESC 키워드는 바로 앞에 있는 열 이름에만 영향을 미친다. 즉, 위 예제에서는 DESC를 prod_price 열에만 적용한 것이며 prod_name 에는 적용하지 않은 것이다.</p>
        <div class="tip">
          <h4><span class="badge badge-secondary">TIP</span> 대소문자 구분과 정렬 순서</h4>
          <p>텍스트 데이터를 정렬할 때 A와 a가 같을까? 이는 데이터베이스 설정에 따라 달라진다. 사전적인 정렬 순서로는 A와 a가 동일하게 취급되며 이는 대부분의 데이터베이스 관리 시스템에서 기본 설정으로 사용하고 있다. 하지만 기능이 많은 DBMS 의 경우 관리자가 이 설정을 변경할 수 있는 기능이 분명히 있으며, 이는 주로 '데이터 정렬'이라는 설정 부분에서 조정 가능하다.</p>
          <p>여기서 중요한 것은 정렬 순서를 바꾸고 싶을 때 ORDER BY 로는 할 수 없다는 것이다. 각 문자의 졍렬 우선순서를 변경하고 싶다면 데이터베이스 관리자에게 문의하기 바란다.</p>
        </div>
      </article>
    </section>

    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> 요약
    </h3>
    <section>
      <article>
        <p>이 단원에서는 SELECT 문의 ORDER BY 절을 사용하여 가져온 데이터를 정렬하는 방법을 배웠다. 이 절은 SELECT 문의 가장 끝에 지정되며 필요에 따라 하나 이상의 열을 기준으로 데이터를 정렬하는 기능을 한다.</p>
      </article>
    </section>
  </div>