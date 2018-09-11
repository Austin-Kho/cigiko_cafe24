<h2 class="page-header">{{$sub[$id][1]}}</h2>
<div class="chapter">
  <section>
    <article>
      <p>1장에서 설명했듯이 SQL 은 응용 프로그램이 아니라 언어이다. 즉 이 책에서 소개하는 코드 예를 실행하려면 이러한 SQL 문의 실행을 지원하는 응용 프로그램이 필요하다.</p>
      <p>이 부록에서는 가장 자주 사용되는 몇 가지 주요 응용 프로그램에서 SQL 문을 실해하는 단계에 대해 설명한다.</p>
      <p>여기서 소개하는 어떤 응용프로그램을 사용해도 관계 없으며 소개되지 않은 응용 프로그램이라도 관계없다. 그렇다면 어떤 응용 프로그램을 사용하는 것이 좋을까?</p>
      <ul>
        <li>대부분의 DBMS는 자체 유틸리티를 제공하므로 이 유틸리티를 사용해보기 바란다. 그러나 모든 유틸리티의 사용자 인터페이스가 편리한 것은 아니다. 때로는 난해하고 어려운 인터페이스도 있을 것이다.</li>
        <li>Windows 사용자라면 컴퓨터에 Microsoft Query라는 유틸리티가 있을 것이다. 간단한 문을 테스트해보는 데는 이 유틸리티가 아주 편리하다.</li>
        <li>Windows 전용으로 George Poulose가 개발한 쿼리 도구가 있으니 사용해보기 바란다. 이 책의 웹 페이지인 http://www.forta.com/books/0672325667/ 에 링크가 있다.</li>
        <li>Windows, Linux, Mac OSX와 기타 컴퓨터에서 실행 가능한 Aqua Data Studio는 무척 유용한 Java 기반의 무료 유틸리티이다. 마찬가지로 http://www.forta.com/books/0672325667/ 에 링크가 있으므로 찾아보기 바란다.</li>
      </ul>
      <p>여기서 소개한 것은 물론 좋은 도구들이지만 다른 좋은 도구도 많으므로 보다 자세한 내용은 이 책의 웹 페이지를 방문하여 살펴보기 바란다.</p>
    </article>
  </section>
</div>

<div class="chapter">
  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> Aqua Data Studio 사용
  </h3>
  <section>
    <article>
      <p>Aqua Data Studio는 Java 기반의 무료 SQL 클라이언트이다. 대부분의 운영체제에서 실행되며 모든 주요 ODBC를 비롯하여 대부분의 DBMS를 지원한다. Aqua Data Studio에서 SQL 문을 실행하려면 다음 단계에 따르면 된다.</p>
      <ol>
        <li>Aqua Data Studio 를 실행한다.</li>
        <li>DBMS를 사용하려면 먼저 등록이 필요하다. 'Server' 메뉴에서 'Register Server'를 선택한다.</li>
        <li>여러분이 사용하는 DBMS를 목록에서 선택한다. Microsoft Access를 사용할 경우는 'Generic ODBC'를 선택하기 바란다. 이렇게 하려면 이 부록 마지막 부분에서 설명하는 것처럼 ODBC 데이터 소스가 필요하다. 선택한 DBMS 를 기반으로 경로나 로그인 정보를 입력하는 화면이 나타날 것이다. 양식을 채우고 'OK'를 누르면 DBMS가 등록되고 왼쪽의 목록에 나타나게 된다.</li>
        <li>등록된 서버 목록에서 서버를 선택한다.</li>
        <li>'Server'메뉴에서 'Query Analyzer'를 선택하여 실행한다. 단축키 <kbd>Ctrl</kbd> + <kbd>Q</kbd> 를 눌러도 된다.</li>
        <li>상단에 있는 쿼리 창에 SQL 문을 입력한다.</li>
        <li>SQL을 실행하려면 'Query' 메뉴에서 'Execute'를 선택하거나 녹색 화살표 모양인 '실행'단추를 누르면 된다.</li>
        <li>실행 결과가 하단의 창에 표시된다.</li>
      </ol>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> DB2 사용
  </h3>
  <section>
    <article>
      <p>IBM의 DB2는 강력한 멀티 플랫폼 DBMS이며 SQL문을 실행하는 데 사용되는 다양한 클라이언트를 제공한다. SQL문을 실행하는 가장 간단한 방법은 다음 절차에 따라 Java 기반의 Command Center 유틸리티를 사용하는 것이다.</p>
      <ol>
        <li>Command Center를 실행한다.</li>
        <li>'Script'탭을 선택한다.</li>
        <li>Script 상자에 SQL문을 입력한다.</li>
        <li>'Script'메뉴에서 'Execute'를 선택하거나 '실행'단추를 누른다.</li>
        <li>결과 데이터는 Raw 데이터로 하단 창에 표시된다. 표 형식으로 결과를 보려면 'Results'탭을 누르면 된다.</li>
        <li>Command Center에는 대화식으로 SQL 문을 작성할 수 있는 SQL Assist라는 툴이 있다. 'Interactive'탭을 누르면 이 툴을 사용할 수 있다.</li>
      </ol>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> Macromedia ColdFusion 사용
  </h3>
  <section>
    <article>
      <p>Macromedia ColdFusion 은 웹 응용 프로그램 개발 플랫폼이며 스크립트를 만들기 위해 태그 기반의 언어를 사용한다. SQL을 테스트하려면 웹 브라우저에서 호출하여 실행할 수 있는 간단한 웹 페이지를 만들면 된다. 다음 단계를 따르기 바란다.</p>
      <ol>
        <li>ColdFusion 코드에서 데이터베이스를 사용하려면 데이터 소스를 정의해야 한다. 데이터 소스를 정의하는 데는 ColdFusion 관리 프로그램의 웹기반 인터페이스를 사용하면 된다. 자세한 내용은 ColdFusion 설명서를 참조하기 바란다.</li>
        <li>CFM 확장명의 새 ColdFusion 페이지를 만든다.</li>
        <li>CFML &lt;CFQUERY>와 &lt;/CFQUERY> 태그를 사용하여 쿼리 블록을 만든다. NAME 속성을 사용하여 이름을 지정하고 DATASOURCE 속성을 사용하여 데이터 소스를 지정할 수 있다.</li>
        <li><code>&lt;CFQUERY></code>와 <code>&lt;/CFQUERY></code> 태그 사이에 원하는 SQL문을 입력한다.</li>
        <li><code>&lt;CFDUMP></code>나 <code>&lt;CFOUTPUT></code> 루프를 사용하여 쿼리 결과를 출력한다.</li>
        <li>웹 서버 루트 아래에 실행 가능한 디렉터리에 페이지를 저장한다.</li>
        <li>웹 브라우저에서 페이지를 호출하여 실행한다.</li>
      </ol>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> Microsoft Access 사용
  </h3>
  <section>
    <article>
      <p>복잡한 스크립트가 아니라 화면 내에서 입력과 크ㅡㄹ릭으로 데이터베이스를 관리하고 제어하는 데에는 Microsoft Access 가 제격이다. Access 에는 쿼리 디자이너라는 기능이 있어서 대화식으로 SQL문을 작성할 수도 있으며, 이를 통해 적성한 SQL문을 몯누 ODBC 데이터 소스에 대해 실행할 수 있다. 이 기능을 사용하려면 다음 절차를 따라야 한다.</p>
      <ol>
        <li>Microsoft Access를 실행한다. 데이터베이스를 여는 대화상자가 나타날 것이다. 원하는 데이터베이스를 연다.</li>
        <li>데이터베이스 창에서 '쿼리'를 선택한 다음 '새로 만들기'를 클릭하고 '디자인 보기'를 클릭한다.</li>
        <li>'테이블 보기'대화상자가 나타날 것이다. 테이블을 선택하지 말고 창을 닫는다.</li>
        <li>'보기'메누에서 SQL 뷸ㄹ 선택하여 쿼리 창을 연다.</li>
        <li>쿼리 창에 SQL 문을 입력한다.</li>
        <li>SQL 문을 실행하려면 빨간색 느낌표 표시가 있는 '실행'단추를 클릭하면 된다. 데이터시트 보기로 전환되면서 결과가 표 형식으로 표시될 것이다.</li>
        <li>'SQL 보기'와 '데이터시트 보기' 사이를 필요에 따라 전환할 수 있으며, SQL 문을 변경하려면 SQL 보기로 돌아가면 된다. 대화식으로 SQL 문을 작성하려면 디자인 보기를 사용한다.</li>
      </ol>
      <p>Microsoft Access는 Access를 사용하여 SQL 문을 모든 ODBC 데이터 소스에 보낼 수 있는 Pass-Through 모드도 지원한다. 이 기능은 외부 데이터베이스에 대해서만 사용해야 하며 Access 데이터베이스로 직접 전달되도록 사용해서는 안 된다. 이 기능을 사용하려면 다음 절차를 따르면 된다.</p>
      <ol>
        <li>Microsoft Access는 데이터베이스와 상호작용하기 위해 ODBC를 사용하므로 먼저 ODBC 데이터 소스가 필요하다.</li>
        <li>Microsoft Access를 실행한다. 데이터베이스를 여는 대화 상자가 나타날 것이다. 원하는 데이터베이스를 연다.</li>
        <li>데이터베이스 창에서 쿼리를 선택한 다음 '새로 만들기'를 클릭하고 '디자인 보기'를 클릭한다.</li>
        <li>'테이블 보기' 대화상자가 나타날 것이다. 테이블을 선택하지 말고 창을 닫는다.</li>
        <li>쿼리 메뉴에서 SQL 쿼리를 선택하고 '통과'를 선택한다. 이전 버전의 경우 'SQL 통과'라는 메뉴가 있을 것이다.</li>
        <li>'보기' 메뉴에서 '속성'을 클릭하여 '쿼리 속성' 대화상자를 연다.</li>
        <li>ODBC 연결 문자열 필드를 클릭하고 '...' 단추를 눌러 '데이터 소스 선택' 대화상자를 연다.</li>
        <li>'데이터 소스'를 선택하고 '확인'을 누르면 '쿼리 속성' 대화상자로 돌아간다.</li>
        <li>레코드 반환 필드를 클릭한다. SELECT 문을 실행하거나 결과를 반환하는 다른 문을 실행할 경우 이를 '예'로 설정하고, 반환되는 데이터가 없는 INSERT, UPDATE, DELETE 문 등을 실행할 경우는 '아니요'로 설정한다.</li>
        <li>SQL 통과 쿼리 창에 SQL 문을 입력한다.</li>
        <li>SQL 문을 실행하려면 빨간색 느낌표 표시가 있는 '실행'단추를 클릭한다.</li>
      </ol>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> Microsoft ASP 사용
  </h3>
  <section>
    <article>
      <p>Microsoft ASP는 웹 기반의 응용 프로그램을 만들기 위한 스크립팅 플랫폼이다. ASP 페이지 내에서 SQL 문을 테스트하려면 웹 브라우저에서 호출하여 실행할 수 있는 ASP페이지를 만들어야 한다. ASP 페이지에서 SQL 문을 실행하기 위한 단계는 다음과 같다.</p>
      <ol>
        <li>ASP 는 데이터베이스와의 상호작용을 위해 ODBC를 사용한다. 따라서 진행을 위해서는 ODBC 데이터 소스를 설정해 두어야 한다.</li>
        <li>ASP 확장명을 가진 ASP 페이지를 만든다. 텍스트 편집기를 사용하면 된다.</li>
        <li>Server.CreateObject를 사용하여 ADODB.Connection 개체의 인스턴스를 만든다.</li>
        <li>Open 메서드를 사용하여 원하는 ODBC 데이터 원본을 연다.</li>
        <li>Execute 메서드를 호출하여 SQL 문을 실행한다. 반환된 결과는 Set 명령으로 결과 집합에 저장할 수 있다.</li>
        <li>결과를 표시하려면 &lt;% Do While NOT EOF %> 루프로 결과 내를 반복하여 화면에 표시하면 된다.</li>
        <li>페이지를 웹 서버 루트에 실행 가능한 디렉터리에 저장한다.</li>
        <li>웹 브라우저에서 페이지를 호출하여 실행한다.</li>
      </ol>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> Microsoft ASP.NET 사용
  </h3>
  <section>
    <article>
      <p>Microsoft ASP.NET 은 .NET Framework를 사용하여 웹 기반의 응용 프로그램을 만들기 위한 스크립팅 플랫폼이다. ASP.NET 페이지에서 SQL 문을 테스트 하려면 브라우저에서 호출하여 실행할 수 있는 페이지를 만들어야 한다. 방법은 여러 가지 이며, 그 중 하나를 소개하면 다음과 같다.</p>
      <ol>
        <li>.aspx 확장명을 가진 새 파일을 만든다.</li>
        <li>SqlConnection()이나 OleDbCommand()을 사용하여 데이터베이스에 연결한다.</li>
        <li>SqlConnection()이나 OleDbCommand()를 사용하여 SQL 문을 DBMS에 전달한다.</li>
        <li>ExecuteReader 를 사용하여 DataReader를 만든다.</li>
        <li>반환된 DataReader 내를 반복하여 원하는 결과값을 얻는다.</li>
        <li>웹 서버 루트 내에 실행 가능한 디렉터리에 페이지를 저장한다.</li>
        <li>웹 브라우저에서 페이지를 호출하여 실행한다.</li>
      </ol>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> Microsoft Query 사용
  </h3>
  <section>
    <article>
      <p>Microsoft Query는 ODBC 데이터 소스를 대상으로 하는 SQL 문을 테스트하는 데 이상적인 독립적인 SQL 도구이다. Microsoft Query는 Microsoft 제품을 설치할 때 선택 옵션으로 설치 가능하며, 별도로 설치할 수도 있다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> MS-Query 찾기</h4>
        <p>MS-Query는 Office와 같은 Microsoft 제품을 설치할 때 함께 설치되는 경우가 많다. 시작 단추를 눌러서 만약 Microsoft Query 가 아직 설치되어 있지 않음을 확인했다면 찾기 기능으로 시스템을 확인해보기 바란다. MSQRY32.EXE 나 MSQUERY.EXE 파일이 있는지 찾아보면 된다.</p>
      </div>
      <p>Microsoft Query를 사용하는 절차는 다음과 같다.</p>
      <ol>
        <li>Microsoft Query는 데이터베이스와의 상호작용을 위해 ODBC를 사용하므로 먼저 ODBC 데이터 소스를 등록하는 과정이 필요하다. 부록 마지막 부분의 지침을 참고하기 바란다.</li>
        <li>Microsoft Query 를 사용하려면 컴퓨터에 설치해야 한다. '시작'의 '프로그램'을 클릭하여 설치되어 있는지 확인하고 실행하자.</li>
        <li>'파일' 메뉴에서 'SQL 실행'을 선택하면 SQL 실행 창이 나타난다.</li>
        <li>'데이터 소스'단추를 눌러 ODBC 데이터 소스를 나열하고, 원하는 데이터 소스를 선택한다. 필요한 데이터 소스가 표시되지 않으면 기타 단추를 눌러 찾으면 된다. 선택이 끝나면 '사용' 단추를 누른다.</li>
        <li>SQL 문을 SQL 문 상자에 입력한다.</li>
        <li>'실행'을 클릭하면 결과가 표시된다.</li>
      </ol>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> Microsoft SQL Server 사용
  </h3>
  <section>
    <article>
      <p>Microsoft SQL Server는 SQL Query Analyzer라는 Windows 기반의 쿼리 분석기 툴을 제공한다. 이 툴은 SQL 문의 실행과 최적화를 위해 설계되었지만 SQL 문을 테스트하는 데도 아주 유용하다. SQL Query Analyzer를 사용하는 방법은 다음과 같다.</p>
      <ol>
        <li>SQL Server 프로그램 그룹에서 SQL Query Analyzer를 실행한다.</li>
        <li>서버와 로그인 정보를 입력하는 화면이 표시되면 SQL Server에 로그인하고 서버를 실행한다.</li>
        <li>쿼리 화면이 표시되면 드롭다운 목록에서 데이터베이스를 선택한다.</li>
        <li>텍스트 창에 SQL 을 입력하고 쿼리 실행 단추(녹색 화살표)를 눌러 실행한다. <kbd>F5</kbd>를누르거나 '쿼리' 메뉴에서 '실행'을 선택해도 된다.</li>
        <li>결과가 별도의 창에 표시된다.</li>
        <li>쿼리 화면 하단의 탭을 클릭하면 데이터 화면과 메시지 및 정보 화면 사이를 전환할 수 있다.</li>
      </ol>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> MySQL 사용
  </h3>
  <section>
    <article>
      <p>MySQL에는 mysql이라는 명령줄 유틸리티가 있다. 이 유틸리티는 모든 SQL 문을 실행할 수 있는 텍스트 전용 툴로, 사용 방법은 다음과 같다.</p>
      <ol>
        <li>mysql을 입력하여 유틸리티를 실행한다. 보안 정의에 따라 로그인 정보를 입력하는 데 <code>-u</code>나 <code>-p</code> 매개변수를 입력해야 할 수도 있다.</li>
        <li>mysql> 프롬프트가 나타나면 USE database를 입력하고 사용할 데이터베이스를 지정하여 데이터베이스를 연다.</li>
        <li>mysql> 프롬프트에 SQL 문을 입력한다. 각 문의 마지막에는 세미콜론을 붙여 주어야 한다. 결과는 화면에 표시된다.</li>
        <li>\h 를 입력하면 사용할 수 있는 전체 명령의 목록을 볼 수 있다. \s 를 입력하면 MySQL 버전 정보를 포함하는 상태 정보를 볼 수 있다.</li>
        <li>mysql 유틸리티를 종료하려면 \q 를 입력한다.</li>
      </ol>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> Oracle 사용
  </h3>
  <section>
    <article>
      <p>Oracle 에는 Java 기반의 관리 도구인 Enterprise Manager가 있다. 여기에는 여러 툴이 포함되어 있는데 그 중에 SQL*Plus Worksheet라는 툴이 있다. 이 툴을 사용하는 방법은 다음과 같다.</p>
      <ol>
        <li>SQL*Plus Worksheet 를 실행한다. 직접 실행해도 되고 Oracle Enterprise Manager 에서 실행해도 된다.</li>
        <li>로그인 정보를 입력하는 화면이 나타나면 사용자 이름과 암호를 넣어 데이터베이스 서버에 연결한다.</li>
        <li>SQL Worksheet 화면은 두 개로 나뉘어 있다. 상단에 SQL을 입력한다.</li>
        <li>SQL 문을 실행하려면 'Execute' 단추(번개 모양이 그려진 단추)를 누른다. 결과는 하단 창에 표시된다.</li>
      </ol>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> PHP 사용
  </h3>
  <section>
    <article>
      <p>PHP는 널리 사용되는 웹 스크립팅 언어로, 다양한 데이터베이스에 연결할 수 있는 기능과 라이브러리가 제공되므로 DBMS 의 종류에 따라 SQL 문을 실행하는 데 필요한 코드도 달라진다. 따라서 사용 단계를 일률적으로 설명하는 것은 불가능하므로 PHP 설명서를 통해 각 DBMS 에 따른 연결 및 SQL 문 실행 방법을 참조하기 바란다.</p>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> PostgreSQL 사용
  </h3>
  <section>
    <article>
      <p>PostgreSQL 에는 psql이라는 명령줄 유틸리티가 있다. 이 유틸리티는 모든 SQL 문을 실행할 수 있는 텍스트 전용 툴로, 사용을 위해서는 다음 절차를 따르면 된다.</p>
      <ol>
        <li>psql을 입력하여 유틸리티를 실행한다. 특정한 데이터베이스를 로드하려면 psql을 입력하고 뒤에 데이터베이스 이름을 지정하면 된다(PostgreSQL은 USE 명령을 지원하지 않는다).</li>
        <li>=> 프롬프트에 SQL 문을 입력한다. 각 문의 끝에는 세미콜론을 입력해야 한다. 결과는 화면에 표시된다.</li>
        <li>사용할 수 있는 전체 명령을 보려면 \? 를 입력한다.</li>
        <li>SQL 도움말을 보려면 \h 를, 특정한 문에 대한 도움말을 보려면 \h 뒤에 문을 입력한다. 예를 들어 SELECT 문에 대한 도움말을 보려면 \h SELECT 라고 입력한다.</li>
        <li>\q 를 입력하여 psql 유틸리티를 종료한다.</li>
      </ol>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> Query Tool 사용
  </h3>
  <section>
    <article>
      <p>Query Tool 은 George Poulose가 만든 독립형 SQL 쿼리 도구로, ODBC 데이터 소스를 통한 SQL 문 실행에 이상적인 유틸리티이다(ADO 버전도 있다).</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">TIP</span> Query Tool 얻기</h4>
        <p>Query Tool 은 웹에서 다운로드할 수 있다. 이 책의 웹 사이트인 http://www.forta.com/books/0672321289/ 에 링크를 기재해 놓았으므로 방문해보기 바란다.</p>
      </div>
      <p>Query Tool의 사용 절차는 다음과 같다.</p>
      <ol>
        <li>Query Tool은 데이터베이스와의 상호작용을 위해 ODBC를 사용한다. 따라서 진행을 위해서는 먼저 ODBC 데이터 소스를 설정해 두어야 한다.</li>
        <li>Query Tool을 사용하려면 설치가 필요하므로 '시작'단추를 눌러 설치되었는지 확인하고 실행한다.</li>
        <li>사용되는 ODBC 데이터 소스를 묻는 프롬프트가 나타날 것이다. 원하는 데이터 소스가 목록에 없다면 'New'를 클릭하여 만들어야 한다. '데이터 소스'를 선택하고 'OK'단추를 누른다.</li>
        <li>오른쪽 창에 SQL 문을 입력한다.</li>
        <li>파란색 화살표 모양 '실행'단추를 클릭하면 SQL 문이 실행되고 반환된 데이터는 하단 창에 표시된다. <kbd>F5</kbd> 를 누르거나 'Query'메뉴에서 'Execute'를 선택해도 실행할 수 있다.</li>
      </ol>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> Sybase 사용
  </h3>
  <section>
    <article>
      <p>Sybase Adaptive Server에는 SQL Advantage라는 Java 기반의 유틸리티가 있다. 이 유틸리티는 Microsoft SQL Server의 Query Analyzer와 유사하며(사실 근본은 같다)사용 절차는 다음과 같다.</p>
      <ol>
        <li>SQL Advantage 를 실행한다.</li>
        <li>로그인 정보를 입력하는 화면이 나타나면 사용자 이름과 암호를 입력한다.</li>
        <li>쿼리 화면이 나타나면 도구 상자의 드롭다운 상자에서 데이터베이스를 선택한다.</li>
        <li>창이 표시되면 SQL을 입력한다.</li>
        <li>쿼리를 실행하려면 '실행'단추를 누른다. 'Query'메뉴에서 'Execute'를 선택하거나 <kbd>Ctrl</kbd> + <kbd>E</kbd>를 눌러도 된다.</li>
        <li>결과는 새 창에 표시된다.</li>
      </ol>
    </article>
  </section>

  <h3 class="sub-header"><svg id="i-file" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
    </svg> ODBC 데이터 소스 설정
  </h3>
  <section>
    <article>
      <p>지금까지 설명한 응용 프로그램 중 상당히 많은 유틸리티가 데이터베이스와의 상호작용을 위해 ODBC를 사용하고 있다. ODBC란 무엇이며 ODBC 데이터 소스를 설정하려면 어떻게 해야 하는지 간략히 알아보자.</p>
      <p>ODBC는 클라이언트 응용 프로그램이 여러 데이터베이스나 데이터베이스 엔진과 상호작용하기 위한 표준이다. ODBC를 사용하면 한 클라이언트에서 코드를 작성하여 거의 모든 데이터베이스나 DBMS와 상호작용하는 것이 가능하다.</p>
      <p>ODBC 자체는 데이터베이스가 아니며 데이터베이스의 모든 기능을 일관적인 방식으로 외부에 노출시키는 일종의 래퍼(wapper)라고 보면 된다. 이를 위해 ODBC 는 두 가지 중요한 기능을 가지는 소프트웨어 드라이브를 사용하는데, 첫 번째는 기본적인 데이터베이스 기능을 함축하여 제공하고 내부의 복잡한 처리과정을 숨기고 사용자에게는 간단한 처리 방식으로 이를 활용할 수 있도록 하는 계층이며, 두 번째는 이러한 데이터베이스를 제어하는 데 공통적인 언어를 사용할 수 있도록 하는 기능이다. ODBC에서 사용하는 언어는 SQL이다.</p>
      <p>ODBC 클라이언트 응용 프로그램은 데이터베이스와 직접 상호작용하지는 않고 대신 ODBC와 상호작용하게 된다. 데이터 소스는 드라이버(각 데이터베이스 유형은 자체적인 드라이버를 가지고 있다)와 데이터베이스 연결을 위한 정보(경로, 서버 이름 등)를 포함하는 논리적 데이터베이스이다.</p>
      <p>ODBC 데이터 소스가 정의되고 나면 ODBC 호환 응용 프로그램은 자유롭게 이를 활용할 수 있다. ODBC 데이터 소스는 응용 프로그램별로 다르지 않고 한 시스템 내에서는 동일함을 기억하기 바란다.</p>
      <div class="tip">
        <h4><span class="badge badge-secondary">주의</span> ODBC의 차이</h4>
        <p>ODBC로 연결되는 데이터 소스의 종류는 여러 가지가 있기 때문에 모든 버전에 적용될 수 있는 정확한 절차를 소개하기는 어렵다. 필요한 데이터 소스를 설정할 때 나타나는 대화 상자의 내용과 메시지를 잘 보면서 대처하기 바란다.</p>
      </div>
      <p>ODBC 데이터 소스는 Windows 제어판에서 설정한다. ODBC 데이터 소스를 설정하려면 다음 절차에 따르면 된다.</p>
      <ol>
        <li>Windows '제어판'의 'ODBC 데이터 소스 관리 도구'를 연다(Windows XP의 경우, '제어판'에서 '관리 도구'를 실행하고 '데이터 원본(ODBC)'을 실행하면 된다).</li>
        <li>대부분의 ODBC 데이터 소스는 시스템 범위의 데이터 소스로 설정된다. 즉 시스템에서 일단 설정하면 시스템을 바꾸지 않는 한 일관적으로 계속 사용이 가능하다. 따라서 시스템 DNS을 선택해야 한다.</li>
        <li>'추가' 단추를 눌러 새 데이터 소스를 추가한다.</li>
        <li>사용할 드라이버를 선택한다. 주요 Microsoft 제품에 대한 드라이버 목록이 나타날 것이며 이미 시스템에 설치된 다른 드라이브도 나타날 것이다. 연결할 드라이브에 맞는 종류의 드라이버를 선택해야 한다.</li>
        <li>데이터베이스나 DBMS의 종류에 따라 서버 이름이나 경로 정보, 로그인 정보 등 다양한 정보를 입력하라는 창이 나타난다. 지시에 따라 정보를 입력하고 창의 내용을 잘 보아가면서 대처하여 데이터 소스를 설정한다.</li>
      </ol>
    </article>
  </section>
</div>