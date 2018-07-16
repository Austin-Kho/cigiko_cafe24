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
        <p class="bg-info" style="padding: 10px;"><strong>NOTE_Jupyter Notebook과 아나콘다</strong><br>만약 위 명령어로 설치가 되지 않는다면 'Installing Jupyter Notebook'(<a href="https://jupyter.org" target="_blank">https://jupyter.org</a>)에서 설치 방법을 찾아볼 수 있다. 또한 Jupyter 홈페이지에서 추천하는 방법은 '아나콘다(Anaconda)'를 사용해 Jupyter Notebook을 설치하는 것이다.<br><br>아나콘다는 파이썬을 이용해 데이터 분석을 할 수 있게 해주는 무료 엔터프라이즈급 패키지이다. Jupyter Notebook을 포함해 이 책에서 다루는 다수의 패키지를 한꺼번에 설치할 수 있다.</p>
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
             <tr><td>ㅁ</td><td>한</td></tr>
             <tr><td>ㅁ</td><td>한</td></tr>
             <tr><td>ㅁ</td><td>한</td></tr>
             <tr><td>ㅁ</td><td>한</td></tr>
             <tr><td>ㅁ</td><td>한</td></tr>
             <tr><td>ㅁ</td><td>한</td></tr>
             <tr><td>ㅁ</td><td>한</td></tr>
             <tr><td>ㅁ</td><td>한</td></tr>
             <tr><td>ㅁ</td><td>한</td></tr>
             <tr><td>ㅁ</td><td>한</td></tr>
             <tr><td>ㅁ</td><td>한</td></tr>
             <tr><td>ㅁ</td><td>한</td></tr>
             <tr><td>ㅁ</td><td>한</td></tr>
             <tr><td>ㅁ</td><td>한</td></tr>
           </tbody>
         </table>
      </article>
    </section>
  </div>

  <h3 class="sub-header">B.5. Jupyter Notebook 사용법</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>
  </div>
  <!-- <li class=@if($id=='181') active @endif><a href="/book02/181" class="d2">B.1 IPython</a></li>
  <li class=@if($id=='182') active @endif><a href="/book02/182" class="d2">B.2 Jupyter Notebook</a></li>
  <li class=@if($id=='183') active @endif><a href="/book02/183" class="d2">B.3 IPython과 Jupyter Notebook 설치</a></li>
  <li class=@if($id=='184') active @endif><a href="/book02/184" class="d2">B.4 IPython 사용하기</a></li>
  <li class=@if($id=='185') active @endif><a href="/book02/185" class="d2">B.5 Jupyter Notebook 사용법</a></li> -->
