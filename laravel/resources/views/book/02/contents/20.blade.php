  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article class="">
        <p>IPython과 Jupyter Notebook은 파이썬 설치 시 제공되는 기본 인터프리터나 번들로 같이 제공되는 IDLE의 기능을 개선한 개발도구이다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">B.1. IPython</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>IPython(<a href="http://ipython.org" target="_blank">http://ipython.org</a>)을 한마디로 말하자면 기본 파이썬 인터프리터보다 강력한 명령행 쉘이라고 할 수 있다. 2001년 페르난도 페레즈(Fernando Perez)가 처음 개발해 공개했다.</p>
        <ul>
          <li>강력한 대화형 셸.</li>
          <li>Jupyter의 커널 역할.</li>
          <li>인터렉티브한 데이터 시각화와 GUI 도구 지원.</li>
          <li>프로젝트에 포함할 수 있는 유연하고, 내장 가능한 인터프리터 제공.</li>
          <li>병렬 컴퓨팅을 위한 쉬운 고성능 도구 제공.</li>
        </ul>
        <p>이 중 '인터렉티브한 데이터 시각화와 GUI 도구 지원'이라는 부분을 위해 IPython Notebook이라는 웹 브라우저 기반의 파이썬 실행도구를 지원했다.(현재는 Jupyter Notebook으로 통합됨)</p>
        <p>웹 브라우저에서 파이썬 코드를 실행하고, 이를 부연 설명하는 텍스트, 수식, 그래프, 이미지를 넣는다. 실제 결과를 보면 하나의 웹 문서로 보이기도 한다. 즉, 다른 프로그래밍 언어의 IDE와 차이가 있겠지만 내가 개발하는 과정을 하나의 문서를 보는 것처럼 체계적으로 정리할 수 있어 문서화에 약한 개발자에게 굉장한 편의성을 제공한다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">B.2. Jupyter Notebook</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>Jupyter Notebook은 기존 파이썬 셸을 웹 베이스로 접근할 수 있게 해 모든 과정을 저장해두고, 재실행하거나 수정하기 편하게 만든 것이다. 즉, Jupyter Notebook이 로컬 서버를 실행해서 웹 어플리케이션을 사용할 수 있게 하면 사용자는 웹 브라우저를 이용해 Jupyter 서버와 통신할 수 있다. 이 때 로컬 서버의 커널이 IPython이 되어 파이썬을 실행할 수 있는 것이다.</p>
        <p>버전 전환이 번거로운 IPython에 비해 Jupyter Notebook은 다양한 프로그래밍 언어에서도 사용할 수 있도록 설계되어 파이썬 버전 전환 등을 편리하게 할 수 있다.</p>
        <p>Jupyter Notebook은 크게 두 부분으로 나뉘어 있다.</p>
        <ul>
          <li>웹 애플리케이션 : 노트북 문서를 표시하는 웹 브라우저 기반의 인터렉티브 도구.</li>
          <li>노트북 문서 : 앞에서 언급한 웹 애플리케이션에 표시된 모든 데이터(입력, 출력 모두)와 문서, 수식, 이미지를 포함하는 문서</li>
        </ul>
      </article>
    </section>
  </div>

  <h3 class="sub-header">B.3. IPython과 Jupyter Notebook 설치</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>설치 과정은 간단하다. pip를 설치했다는 가정 아래 pip install jupyter(pip3 install jupyter) 명령을 가상환경 등에서 실행하면 된다. Jupyter를 설치하면 IPython까지 모두 설치된다.</p>
        <p class="bg-info"><strong>NOTE_Jupyter Notebook과 아나콘다</strong><br>만약 위 명령어로 설치가 되지 않는다면 'Installing Jupyter Notebook'(<a href="https://jupyter.org" target="_blank">https://jupyter.org</a>)에서 설치 방법을 찾아볼 수 있다. 또한 Jupyter 홈페이지에서 추천하는 방법은 '아나콘다(Anaconda)'를 사용해 Jupyter Notebook을 설치하는 것이다.<br><br>아나콘다는 파이썬을 이용해 데이터 분석을 할 수 있게 해주는 무료 엔터프라이즈급 패키지이다. Jupyter Notebook을 포함해 이 책에서 다루는 다수의 패키지를 한꺼번에 설치할 수 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">B.4. IPython 사용하기</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>IPython을 실행하려면 터미널에서 IPython 명령어를 실행한다.</p>
        <pre><code>Python 3.7.0 (v3.7.0:1bf9cc5093, Jun 26 2018, 23:26:24)
Type 'copyright', 'credits' or 'license' for more information
IPython 6.4.0 -- An enhanced Interactive Python. Type '?' for help.

In [1]: </code></pre>
        <p>예를 들어 'p'를 입력한 다음 <kbd>Tap</kbd>키를 누르면, 자동 완성할 수 있는 목록이 나타난다.</p>
        <pre><code>In [1]: p
         %page      %pdoc      %popd      property   %pwd       %%python3
         pass       %%perl     pow        %prun      %pycat
         %paste     %pfile     %pprint    %%prun     %pylab
         %pastebin  %pinfo     %precision %psearch   %%pypy
         %pdb       %pinfo2    print      %psource   %%python
         %pdef      %pip       %profile   %pushd     %%python2</code></pre>
         <p>키보드 단축키는 [표B-1]과 같다.</p>
         <h5>표B-1 IPython 키보드 단축키</h5>
         <table class="table table-hover table-condensed table table-bordered">
           <thead>
             <tr>
               <td>단축키</td><td>기능</td>
             </tr>
           </thead>
           <tbody>
             <tr><td><kbd>←</kbd>, <kbd>→</kbd></td><td>한 글자씩 좌우로 이동하기</td></tr>
             <tr><td><kbd>Ctrl</kbd> + <kbd>←</kbd>, <kbd>→</kbd></td><td>한 단어씩 좌우로 이동하기</td></tr>
             <tr><td><kbd>↑</kbd>, or <kbd>Ctrl</kbd> + <kbd>P</kbd></td><td>입력했던 명령어 검색(과거 순서)하기</td></tr>
             <tr><td><kbd>↓</kbd>, or <kbd>Ctrl</kbd> + <kbd>N</kbd></td><td>입력했던 명령어 검색(최신 순서)하기</td></tr>
             <tr><td><kbd>Ctrl</kbd> + <kbd>R</kbd></td><td>입력했던 명령어 검색(검색어 입력)하기</td></tr>
             <tr><td><kbd>Ctrl</kbd> + <kbd>Shift</kbd> + <kbd>V</kbd></td><td>클립보드에서 텍스트 붙여넣기</td></tr>
             <tr><td><kbd>Ctrl</kbd> + <kbd>C</kbd></td><td>현재 실행 중인 코드 중단하기</td></tr>
             <tr><td><kbd>Ctrl</kbd> + <kbd>A</kbd></td><td>커서를 줄의 처음으로 이동시키기</td></tr>
             <tr><td><kbd>Ctrl</kbd> + <kbd>E</kbd></td><td>커서를 줄의 끝으로 이동시키기</td></tr>
             <tr><td><kbd>Ctrl</kbd> + <kbd>K</kbd></td><td>커서가 위치한 곳부터 줄의 끝까지 텍스트 삭제하기</td></tr>
             <tr><td><kbd>Ctrl</kbd> + <kbd>U</kbd></td><td>현재 입력한 모든 텍스트 지우기</td></tr>
             <tr><td><kbd>Ctrl</kbd> + <kbd>F</kbd></td><td>앞으로 한 글자씩 커서 이동시키기</td></tr>
             <tr><td><kbd>Ctrl</kbd> + <kbd>B</kbd></td><td>뒤로 한 글자씩 커서 이동 시키기</td></tr>
             <tr><td><kbd>Ctrl</kbd> + <kbd>L</kbd></td><td>화면 지우기</td></tr>
           </tbody>
         </table>
         <p>또한 여러 가지 특수 명령어를 '매직' 명령어라고 부른다. [표B-2]는 주요 매직 명령어를 소개한다.</p>
         <h5>표B-2 주요 매직 명령어</h5>
         <table class="table table-hover table-condensed table table-bordered">
           <thead>
             <tr>
               <td>매직 명령어</td><td>기능</td>
             </tr>
           </thead>
           <tbody>
             <tr><td>%quickref</td><td>IPython의 빠른 도움말 표시하기</td></tr>
             <tr><td>%magic<td>모든 매직 명령어의 상세 도움말 출력하기</td></tr>
             <tr><td>%debug</td><td>최근 예외 발생 상황 아래 행에서 대화형 디버거로 진입하기</td></tr>
             <tr><td>%hist</td><td>명령어 입력(그리고 선택적 출력)내역 출력하기</td></tr>
             <tr><td>%pdb</td><td>예외가 발생하면 자동으로 디버거로 진입하기</td></tr>
             <tr><td>%paste</td><td>들여쓰기가 된 상태로 파이썬 코드 붙여넣기</td></tr>
             <tr><td>%cpaste</td><td>실행 상태에서 파이썬 코드를 수동으로 붙여넣을 수 있는 프롬프트 표시하기</td></tr>
             <tr><td>%reset</td><td>대화형 네임스페이스에서 정의한 모든 변수와 이름 삭제하기</td></tr>
             <tr><td>%page OBJECT</td><td>pager를 이용해 객체 출력하기</td></tr>
             <tr><td>%run script.py</td><td>IPython안에서 파이썬 파일 실행하기</td></tr>
             <tr><td>%prun statement</td><td>cProfie을 이용해 statement를 실행하고 프로파일링 결과 출력하기</td></tr>
             <tr><td>%time statement</td><td>단일 statement 실행 시간 출력하기</td></tr>
             <tr><td>%timeit statement</td><td>여러 번 실행한 statement의 평균 실행 시간 출력하기</td></tr>
             <tr><td>%who, %who_ls, %whos</td><td>대화형 네임스페이스 안에서 정의한 변수 표시하기</td></tr>
             <tr><td>%xdel variable</td><td>variable을 삭제하고 해당 객체의 모든 IPython 내부 참조 제거하기</td></tr>
             <tr><td>%%writefile filename</td><td>filename인 파일 생성하기</td></tr>
           </tbody>
         </table>
         <p>이러한 기능들을 알아두면 좀 더 편학 IPython을 사용할 수 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">B.5. Jupyter Notebook 사용법</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>본 편은 지금부터다. 셸에서 Jupyter Notebook 명령을 실행하면 Jupyter Notebook을 실행할 수 있다. 웹 브라우저가 열리고 현재 위치를 루트로 하는 대시보드 화면이 나타난다.</p>
        <h5>그림B-1 Jupyter Notebook 루트 화면</h5>
        <img src="/img/img01.png" alt="Jupyter Notebook 루트 화면">
        <p>오른쪽 위 [New]를 누르면 새 노트북을 만들 수 있다. 기본적인 텍스트파일부터 터미널, 파이썬 버전별 커널, 혹은 설정에 따라 루비, R, Scala 등의 프로그래밍 언어를 선택할 수 있다.</p>
        <p class="bg-info"><strong>NOTE_파이썬 2와 파이썬 3을 동시에 사용하기</strong><br>Jupyter Notebook을 실행했을 때 파이썬 2와 3을 동시에 실행할 수 없다면 nohup jupyter notebook & 이라는 명령을 실행한다. 한 번 실행한 이후에는 jupyter notebook 명령만으로도 파이썬 2와 3을 동시에 사용할 수 있다.</p>
        <p>[Terminal]을 선택하면 기존 셸 대신 Jupyter Notebook 안에서 셀을 사용할 수 있다.</p>
        <h5>그림B-2 터미널 사용</h5>
        <img src="/img/img02.png" alt="터미널 사용">
        <p>파이썬 3을 사용하여 새 노트북을 만들어 보자</p>
        <h5>그림B-3 새 노트북 입력 환경 및 자동완성 기능</h5>
        <img src="/img/img03.png" alt="새 노트북 입력 환경 및 자동완성 기능">
        <p>IPython 커맨드라인과 유사하고 동일하게 작동한다. 파일 이름을 바꾸고 싶다면 왼쪽 상단 'Untitled'를 선택해 변경한다. 또한 p를 입력하고 <kbd>Tab</kbd>을 누르면 자동완성 기능도 사용할 수 있다. 사용자가 선언한 변수나 클래스, 함수 등도 당연히 나타난다.</p>
        <h5>그림B-4 셀 타입 지정</h5>
        <img src="/img/img04.png" alt="셀 타입 지정">
        <p>IPython 커맨드라인과 유사하고 동일하게 작동한다. 파일 이름을 바꾸고 싶다면 왼쪽 상단 'Untitled'를 선택해 변경한다. 또한 p를 입력하고 <kbd>Tab</kbd>을 누르면 자동완성 기능도 사용할 수 있다. 사용자가 선언한 변수나 클래스, 함수 등도 당연히 나타난다.</p>
        <h5>그림B-5 파이썬 코드와 마크다운을 함께 작성한 예</h5>
        <img src="/img/img05.png" alt="파이썬 코드와 마크다운을 함께 작성한 예">
        <p>IPython 커맨드라인과 유사하고 동일하게 작동한다. 파일 이름을 바꾸고 싶다면 왼쪽 상단 'Untitled'를 선택해 변경한다. 또한 p를 입력하고 <kbd>Tab</kbd>을 누르면 자동완성 기능도 사용할 수 있다. 사용자가 선언한 변수나 클래스, 함수 등도 당연히 나타난다.</p>
        <p>Jupyter Notebook의 사용법을 모르더라도 [help] > [User Interface Tour]를 선택하면 주요 기능별로 풍선말과 함께 Jupyter Notebook 의 기능을 익힐 수 있다.</p>
        <p>다음 표를 참조해서 주요 단축키를 익히고 사용할 수 있다.</p>
        <h5>표B-3 Jupyter Notebook 주요 단축키</h5>
        <table class="table table-hover table-condensed table table-bordered">
          <thead>
            <tr>
              <td>단축키</td><td>기능</td>
            </tr>
          </thead>
          <tbody>
            <tr><td><kbd>Ctrl</kbd> + <kbd>S</kbd></td><td>노트북 파일 저장하기</td></tr>
            <tr><td><kbd>A</kbd></td><td>한 줄 위에 행 추가하기</td></tr>
            <tr><td><kbd>B</kbd></td><td>한 줄 아래에 행 추가하기</td></tr>
            <tr><td><kbd>D</kbd>, <kbd>D</kbd></td><td>현재 선택한 행 삭제하기</td></tr>
            <tr><td><kbd>Ctrl</kbd> + <kbd>Enter</kbd></td><td>입력했던 명령어 검색(검색어 입력)하기</td></tr>
            <tr><td><kbd>Ctrl</kbd> + <kbd>Shift</kbd> + <kbd>C</kbd></td><td>노트북 파일 실행하기</td></tr>
            <tr><td><kbd>Enter</kbd></td><td>선택한 셀 입력 시작하기</td></tr>
          </tbody>
        </table>
      </article>
    </section>
  </div>
