<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>이 단원에서는 와일드카드가 무엇이며 어떻게 사용하는지, 그리고 <code>LIKE</code> 연산자에 와일드카드를 사용하여 가져온 데이터를 보다 복잡하게 필터링 하는 방법에 대해 살펴보자.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> LIKE 연산자의 사용
  </h3>
  <section>
    <article>
      <p>항상 이미 알고 있는 값을 기준으로 필터링을 하는 것이 유용하지는 않다. 와일드카드를 사용하면 데이터를 대상으로 패턴을 사용한 검색을 할 수 있다. 즉, 와일드카드로 제품 이름 중에 검색하려는 단어 일부가 들어간 검색 패턴을 만들면 원하는 검색이 가능하다.</p>

      <blockquote><strong>와일드카드</strong>: 값의 일부가 일치하는 경우를 검색하는 데 사용되는 특별한 문자</blockquote>
      <blockquote><strong>검색 패턴</strong>: 리터럴 텍스트, 와일드카드 문자 또는 이들의 조합으로 만들어지는 검색 조건</blockquote>

      <p>와일드카드는 그 자체로 SQL WHERE 절 내에서 특별한 의미를 가지는 문자이며, SQL 은 몇 가지 와일드카드 문자를 지원한다.</p>
      <p>검색 절에서 와일드카드를 사용하려면 <code>LIKE</code> 연산자를 사용해야 한다. <code>LIKE</code> 는 이어지는 검색 패턴에 따라 와일드카드 비교를 수행하여 일치하는 결과를 반환하도록 한다.</p>      
    </article>
  </section>

  <h4 class="sub-header">퍼센트 기호(%) 와일드카드</h4>
  <section>
    <article>
      <p>가장 자주 사용되는 와일드카드로 퍼센트 기호(%)가 있다. 검색 문자열 내에서 %를 사용하면 개수에 관계 없이 모든 문자를 의미한다. 즉 Fish라는 단어로 시작되는 모든 제품을 검색하려면 다음과 같이 SELECT 문을 작성하면 된다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT prod_id, prid_name<br>
        FROM Products<br>
        WHERE prod_name LIKE 'Fish%';
      </code></pre>
      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>prod_id</th><th>prod_name</th></tr>
          </thead>
          @php
            $data = DB::table('Products')
                      ->select('prod_id', 'prod_name')
                      ->where('prod_name', 'like', 'Fish%')->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_id}}</td><td>{{$lt->prod_name}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>

      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 예제에서는 'Fish%' 를 검색 패턴으로 사용하였다. 이 절이 처리되면 Fish로 시작하는 모든 값이 검색된다. %는 Fish라는 단어 뒤에 어떤 문자가 몇 개나 오던 관계 없이 모두 선택하도록 하는 효과를 가지고 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> Micorsoft Access 와일드카드</h4>
        <p>Micorsoft Access를 사용한다면 % 대신 * 를 사용해야 한다.</p>
      </div>

      <p>와일드카드는 검색 패턴 중 어떤 위치에서도 사용할 수 있으며, 여러 와일드카드를 함께 사용할 수 있다. 다음은 두 개의 와일드카드를 사용한 예이다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT prod_id, prod_name<br>
        FROM Products<br>
        WHERE prod_name LIKE '%bean bag%';        
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>prod_id</th><th>prod_name</th></tr>
          </thead>
          @php
            $data = DB::table('Products')
                      ->select('prod_id', 'prod_name')
                      ->where('prod_name', 'like', '%bean bag%')->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_id}}</td><td>{{$lt->prod_name}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>'%bean bag%' 이라는 검색 패턴은 <i>bean bag</i> 앞뒤로 어떤 문제가 몇 개나 들어가던지 관계없이 <i>bean bag</i>이라는 단어만 포함되면 모두 검색되도록 지정한다.</p>

      <p>실제로는 드문 경우이며 유용하게 사용되는 경우는 거의 없긴 하지만 검색 패턴의 중간 부분에도 와일드카드를 사용할 수 있다. 예를 들어 F로 시작하고 y로 끝나는 모든 제품을 검색하려면 다음과 같은 SQL 문을 사용한다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT prod_name<br>
        FROM Products<br>
        WHERE prod_name LIKE 'F%y';        
      </code></pre>
      <p><code>%</code>는 하나 이상의 문자를 의미하는 것이 아니라 0개 이상의 문자를 의미하는 것이다. 즉, 해당 위치에 문자가 아예 없는 경우도 해당된다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> 추가 공백에 대한 주의 사항</h4>
        <p>Micorsoft Access를 비롯하여 많은 DBMS 에서 필드 내용을 채우는 데 공백을 사용한다. 예를 들어 열의 값이 50개 문자이며 저장된 값이 Fish bean bag toy일 경우, 17문자이므로 나머지 33문자는 공백으로 채워진다. 이러한 방식은 데이터의 사용 방식에는 영향을 주지 않지만, 앞서 살펴본 예와 같이 SQL 문의 경우에는 영향을 받을 수 있다.</p>
        <p>WHERE prod_name LIKE 'F%y'를 지정하면 F로 시작하여 y로 끝나는 문자열을 검색하는데 필드 뒷부분이 모두 공백으로 채워져 있을 경우 끝 값은 항상 공백이지 y가 되지 않을 것이므로 Fish bean bag toy가 검색되지 않을 것이다. 간단한 해결 방법은 검색 패턴 뒤에 %를 더 붙여 'F%y%'로 쓰는 것이며, 이보다 나은 해결 방법은 8장에서 설명할 함수를 사용하여 뒤의 공백을 잘라내는 것이다.</p>
      </div>
    </article>
  </section>

  <h4 class="sub-header">언더스코어(_) 와일드카드</h4>
  <section>
    <article>
      <p>또 하나의 유용한 와일드카드가 바로 언더스코어(_)이다. 이 문자는 %마찬가지로 모든 문자를 의미하지만 여러 문자가 아닌 단 하나의 문자만을 의미한다.</p>

      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> Micorsoft Access 와일드카드</h4>
        <p>Micorsoft Access를 사용한다면 _ 대신 ? 를 사용해야 한다.</p>
      </div>
      <p>예를 들어보자.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT prod_id, prod_name<br>
        FROM Products<br>
        WHERE prod_name LIKE '__ inch teddy bear';        
      </code></pre>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>prod_id</th><th>prod_name</th></tr>
          </thead>
          @php
            $data = DB::table('Products')
                      ->select('prod_id', 'prod_name')
                      ->where('prod_name', 'like', '__ inch teddy bear')
                      ->get()
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_id}}</td><td>{{$lt->prod_name}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>WHERE 절에 사용된 검색 패턴을 보면 두 개의 언더스코어가 있고 나머지는 리터럴 텍스트이다. 언더스코어가 한 개의 모든 문자에 해당하므로 이 조건에 맞으려면 inch teddy bear 앞에 두 글자가 있는 문자열이어야 하며 12와 18이 검색되었다. 제품 중에 8 inch teddy bear 도 있지만 두 글자가 있어야 한다는 조건에 부합하지 못하여 제외되었다. 반대로 다음과 같이 언더스코어가 아닌 퍼센트 기호를 사용하면 세 제품이 모두 반환된다.</p>
      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>        
        SELECT prod_id, prod_name<br>
        FROM Products<br>
        WHERE prod_name LIKE '% inch teddy bear';
      </code></pre>
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>prod_id</th><th>prod_name</th></tr>
          </thead>
          @php
            $data = DB::table('Products')
                      ->select('prod_id', 'prod_name')
                      ->where('prod_name', 'like', '% inch teddy bear')
                      ->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->prod_id}}</td><td>{{$lt->prod_name}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <p>문자가 없는 경우에도 조건이 성립하는 %와는 달리, _는 항상 한 개의 문자만 있어야만 조건이 성립한다.</p>
    </article>
  </section>

  <h4 class="sub-header">괄호([]) 와일드카드</h4>
  <section>
    <article>
      <p>괄호([]) 와일드카드는 문자의 모음을 지정하는 데 사용되며, 이 와일드카드가 있는 위치에 이 목록의 문자 중 하나와 일치하는 문자가 있으면 일치하는 행으로 보고 검색된다.</p>

      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> 문자 모음이 항상 지원되는 것은 아니다</h4>
        <p>지금까지 설명한 두 개의 와일드카드와는 달리 [, ]의 사용이 모든 DBMS 에서 지원되는 것은 아니다. Micorsoft Access, Micorsoft SQL Server, Sybase Adaptive Server에서는 이를 지원하지만, 다른 DBMS 일 경우 설명서를 참조하여 지원 여부를 확인한다.</p>
      </div>

      <p>예를 들어 이름이 <i>J</i>나 <i>M</i>자로 시작하는 연락처를 찾으려면 다음과 같은 문을 사용한다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_contact<br>
        FROM Customers<br>
        WHERE cust_contact LIKE '[JM]%'<br>
        ORDER BY cust_contact;        
      </code></pre>      
      <h4><span class="badge badge-pill badge-success">출 력</span></h4>
      <pre><code>
        <table class="table-sm">
          <thead>
            <tr><th>cust_contact</th></tr>
          </thead>
          @php
            $data = DB::table('Customers')
                      ->select('cust_contact')
                      ->where('cust_contact', 'like', 'J%')
                      ->orWhere('cust_contact', 'like', 'M%')
                      ->orderBy('cust_contact')->get();
          @endphp
          <tbody>
            @foreach($data as $lt)
            <tr><td>{{$lt->cust_contact}}</td></tr>
            @endforeach
          </tbody>
        </table>
      </code></pre>
      <h4><span class="badge badge-pill badge-info">분 석</span></h4>
      <p>이 문의 WHERE 절은 '[JM]%'이다. 두 개의 와일드카드가 쓰였는데, 일단 [JM]은 연락처 이름이 괄호 내에 있는 문자 중 하나로 시작해야 한다는 것을 의미하고, 한 문자와만 일치한다. 즉, 이름이 한 자를 넘을 경우 일치하지 않게 된다. 두 번째 와일드카드인 %는 [JM]뒤로 모든 길이의 모든 문자열이 있을 수 있다는 의미이므로, 결과적으로 J나 M으로 시작하는 모든 문자열이 선택된다.</p>
      <p>이 와일드카드를 부정할 때는 캐럿 문자인 ^를 앞에 붙여주면 된다. 예를 J나 M으로 시작하지 않는 모든 문자를 선택하려면 다음과 같이 입력한다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_contact<br>
        FROM Customers<br>
        WHERE cust_contact LIKE '[^JM]%'<br>
        ORDER BY cust_contact;        
      </code></pre>

      <div class="tip">
        <h4><span class="badge badge-secondary">참고</span> Micorsoft Access 에서 목록 부정</h4>
        <p>Micorsoft Access를 사용할 경우 목록을 부정하려면 ^ 대신 ! 를 사용해야 한다. 즉, [^JM]이 아니라 [!JM]이 된다.</p>
      </div>

      <p>물론 NOT 연산자를 써도 동일한 결과를 얻을 수 있다. ^의 유일한 장점은 WHERE 저를 단순하게 해준다는 것 뿐이다.</p>

      <h4><span class="badge badge-pill badge-primary">입 력</span></h4>
      <pre><code>
        SELECT cust_contact<br>
        FROM Customers<br>
        WHERE NOT cust_contact LIKE '[JM]%'<br>
        ORDER BY cust_contact;        
      </code></pre>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> 와일드카드 사용 팁
  </h3>
  <section>
    <article>
      <p>SQL 의 와일드카드는 아주 유용하다. 하지만 그 강력한 기능에는 대가가 따른다. 와일드카드 검색은 일반적인 다른 검색에 비해 오랜 시간이 걸리기 떼ㅐ문이다. 따라서 와일드카드를 사용할 때는 다음과 같은 점에 주의한다.</p>

      <ul>
        <li>와일드카드를 남용해서는 안된다. 다른 검색 방법이 있다면 그 방법을 쓰는 것이 좋다.</li>
        <li>와일드카드를 사용할 때는 반드시 필요한 경우가 아니라면 검색 패턴의 시작 부분에 쓰지 않는 것이 좋다. 와일드카드로 시작하는 검색 패턴은 처리 속도가 느리다.</li>
        <li>와일드카드 문자의 위치에 신경 써야 한다. 위치를 잘못 지정하면 엉뚱한 데이터가 검색될 것이다.</li>
      </ul>
    </article>
  </section>
</div>