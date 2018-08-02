  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>이 단원에서는 SQL이 정확히 무엇이며 어떤 기능을 가지고 있는지 알아보자.</p>
      </article>
    </section>
  </div>

  <div class="chapter">
    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> 데이터베이스의 기본 
    </h3>
    <section>
      <article>
        <p>SQL은 데이터베이스를 제어하기 위한 목적을 가진 언어이다. 따라서 SQL에 대해 배우기 전에 먼저 데이터베이스와 그 기술에 대한 기본 개념부터 이해하는 것이 중요하다.</p>
        <div class="tip">
          <h4>기본 개념 익히기</h4>
          <p>데이터베이스를 이해하는 것은 SQL을 마스터하기 위한 중요한 과정이다.</p>
        </div>
      </article>
    </section>

    <h4 class="sub-header">데이터베이스란 무엇인가?</h4>
    <section>
      <article>
        <p>데이터베이스란 구조적인 방식으로 저장된 데이터의 모음을 말한다.</p>
        <blockquote><strong>데이터베이스</strong>: 구조적인 데이터를 저장하는 컨테이너(보통 파일이나 파일모음)이다.</blockquote>
        <div class="tip">
          <h4>잘못된 사용은 혼란을 부른다</h4>
          <p>데이터베이스가 데이터베이스 소프트웨어를 의미하는 것으로 생각하는 것은 잘못된 것이며 많은 혼란의 근원이다. 데이터베이스 소프트웨어는 DBMS, 즉 데이터베이스 관리시스템이며 데이터베이스는 DBMS 를 사용해서 만들어지고 제어되는 컨테이너를 의미한다. 데이터베이스는 하드 드라이브에 저장된 파일일 수도 있으나 이는 별 의미가 없다. 대부분릐 경우 데이터베이스 파일에 직접 액세스할 이유는 없고, DBMS를 거쳐서 사용하기 때문이다.</p>
        </div>
      </article>
    </section>

    <h4 class="sub-header">테이블</h4>
    <section>
      <article>
        <p>테이블은 서로 연관된 특정한 종류의 데이터를 구조적 목록으로 묶은 파일이다. 하나의 데이터베이스 안에 있는 테이블에는 언제나 다른 테이블과 중복되지 않는 고유한 이름이 있다.</p>
        <blockquote><strong>테이블</strong>: 특정한 종류의 데이터를 구조적 목록으로 묶은 것</blockquote>
        <p>테이블에는 특성과 속성이 있어서 데이터가 저장되는 방식을 정의할 수 있다. 이는 어떤 데이터를 저장할 것이며 어떻게 구분되는지, 각 정보 조각의 이름은 무엇인지 등과 같은 것을 의미하는데 이와 같이 테이블을 설명하는 정보 모음을 스키마라고 한다. 스키마는 특정 테이블을 설명할 뿐만 아니라 전체 데이터베이스나 테이블 간의 관계 등을 설명하는 데에도 사용된다.</p>
      </article>
    </section>

    <h4 class="sub-header">열과 데이터 형식</h4>
    <section>
      <article>
        <p>테이블은 열로 만들어진다. 열은 테이블 내에서 특정한 정보 조각을 담는 역할을 한다.</p>
        <blockquote><strong>열</strong>: 테이블 내의 각 필드, 모든 테이블은 하나 이상의 열로 구성된다.</blockquote>
        <p>테이블과 열의 개념은 표(스프레드시트) 형식을 그려보면 쉽게 이해할 수 있다.</p>
        <div class="tip">
          <h4>데이터 나누기</h4>
          <p>데이터를 구조적으로 여러 열로 나누는 것은 매우 중요한 작업이다.</p>
        </div>
        <p>데이터베이스의 각 열에는 데이터 형식이 지정된다. 데이터 형식은 데이터의 올바른 정렬에도 도움이 되며, 디스크 사용 방식을 최적화하는데에도 중요한 역할을 한다.</p>
        <blockquote><strong>데이터 형식</strong>: 허용되는 데이터 종류를 말한다. 각 테이블 열에는 데이터 형식이 지정되어 그 열에 저장할 수 있는 데이터의 종류를 제한하게 된다.</blockquote>
        <div class="tip">
          <h4>데이터 형식 호환성</h4>
          <p>데이터 형식과 그 이름의 다양성은 SQL이 서로 호환되지 않도록 하는 주요한 원인이다. 물론 기본적인 데이터 형식은 대부분 지원되지만, 고급 데이터 형식 중에는 그렇지 않은 것도 있다. 특히 같은 데이터 형식을 DBMS마다 다른 이름으로 사용하는 경우도 있어 문제가 된다. 스키마를 만들 때 이 부분을 염두에 두어야 한다.</p>
        </div>
      </article>
    </section>

    <h4 class="sub-header">행</h4>
    <section>
      <article>
        <p>테이블의 데이터는 행에 저장된다. 표 형식과 비교한다면 세로 열이 테이블 열이며, 가로 행이 바로 테이블 행이다.</p>
        <blockquote><strong>행</strong>: 테이블 내의 레코드(행과 레코드는 같은 의미로 보아도 좋지만 기술적으로는 행이 보다 정확한 용어이다.)</blockquote>
      </article>
    </section>

    <h4 class="sub-header">기본 키</h4>
    <section>
      <article>
        <blockquote><strong>기본 키</strong>: 테이블 내에서 각 행을 고유하게 구분하는 데 사용되는 열(여러 열일 수도 있음)</blockquote>
        <div class="tip">
          <h4>항상 기본 키를 정의하자</h4>
          <p>기본 키는 반드시 필요한 것은 아니지만 데이터베이스를 다자인할 때는 모든 테이블에 기본 키를 넣어 이후에 제어와 관리 작업이 수월하게 이루어질 수 있도록 하는 것이 좋다.</p>
        </div>
        <p>테이블의 모든 행은 기본 키로 설정할 수 있지만, 다음과 같은 조건이 맞아야 한다.</p>
        <ul>
          <li>둘 이상의 행이 같은 기본 키 값을 가질 수 없다.</li>
          <li>모든 행에는 기본 키 값이 있어야 한다. 기본 키 열에는 NULL 값을 사용할 수 없다.</li>
          <li>기본 키의 값은 변경하거나 업데이트할 수 없다.</li>
          <li>기본 키 값은 재사용할 수 없다. 테이블에서 행을 삭제했다면 그 기본 키 값을 나중에 다른 새 행에 할당해서는 안된다.</li>
        </ul>
      
        <p>기본 키는 대개 테이블에 있는 하나의 열에 정의되지만 반드시 그럴 필요는 없다. 즉 여러 열을 묶어서 기본 키로 사용해도 된다. 여러 열을 사용할 경우도 위에 나열한 모든 규칙이 적용되어야 하며 각 열의 값은 고유할 필요가 없지만 이를 조합하여 만든 기본 키 값은 반드시 고유해야 한다.</p>
        <p>기본 키 외에도 외부 키라는 중요한 개념이 있다. 이에 대해서는 12장 '테이블 조인'에서 설명한다.</p>
      </article>
    </section>

    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> SQL이란 무엇인가???</h3>

    <section>
      <article>
        <p>SQL(S-Q-L로 각 문자로 따로 발음하거나 붙여서 sequel, 즉 시퀄이라고 발음함)은 Structured Query Language(구조적 쿼리 언어)의 약자이다. SQL은 데이터베이스와의 통신을 위해 고안된 언어이다.</p>

        <p>영어나 한국어 또는 Java나 Python 등과 같은 프로그래밍 언어와는 달리 SQL은 단지 몇개의 단어로만 구성된다. 한가지 분명한 목적, 즉 데이터베이스에서 데이터를 읽고 쓰기 위한 용도로 만들어 졌기 때문이다.</p>
        <p>SQL은 다음과 같은 장점이 있다.</p>
        <ul>
          <li>SQL은 특정 회사에서만 사용하는 전유물이 아니다. 대부분의 DBMS 에서 SQL을 지원하므로 한 언어를 배워 모든 데이터베이스에서 활용할 수 있다.</li>
          <li>SQL은 배우기 쉽다. 각 문은 이해가 쉬운 영어 문장과 닮아 있으며 많지도 않다.</li>
          <li>간단하지만 매우 강력한 언어이다. 효과적으로 각 요소를 사용하면 매우 복잡하고 정교한 데이터베이스 작업을 수행할 수 있다.</li>
        </ul><p>&nbsp;</p>
        <div class="tip">
          <h4>SQL 확장</h4>
          <p>많은 DBMS 회사에서 SQL을 지원하지만 자신들만의 고유한 문을 추가하는 경우가 많다. 이러한 확장의 목적은 추가 기능을 지원하거나 특정한 작업을 보다 간단하게 수행하기 위한 것이며, 실제로 일부 추가 기능은 매우 유용하다. 각 확장 내용은 DBMS에 따라 다르고, 동일한 기능이 여러 회사의 DBMS에서 지원되는 경우는 드믈다. </p>
        <p>표준 SQL 은 ANSI 표준 위원회에서 관리하고 있기 때문에 ANSI SQL이라 부른다. 모든 주요 DBMS는 각자 확장 기능이 있지만 이 ANSI SQL을 충실하게 지원하며, PL-SQL, Transact-SQL 등과 같이 자신들의 SQL에 이름을 붙여 표현하기도 한다.</p>
        <p>여기서는 표준인 ANSI SQL에 대해서 주로 설명한다. 특별한 경우 표준이 아닌 요소를 설명하게 되면 참고를 달아 언급할 것이다.</p>
        </div>
      </article>
    </section>

    <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
      </svg> 요약
    </h3>
    <section>
      <article>
        <p>이번 단원에선은 SQL이 무엇이며 왜 유용한지에 대해 배웠다. SQL은 데이터베이스와의 상호작용을 위한 언어이므로 몇 가지 기본적인 데이터베이스 용어에 대해서도 설명하였다.</p>
      </article>
    </section>
  </div>