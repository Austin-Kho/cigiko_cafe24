  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article class=""></article>
    </section>
  </div>

  <h3 class="sub-header">A.1. 패키지 관리자 pip</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>우분투의 aptitude나, macOS의 Homebrew, Node.js의 npm 같이, 파이썬에도 pip(윈도우의 경우, 우분투와 macOS에서는 pip3)라는 패키지 관리자가 있다. pip를 이용하면 거의 모든 파이썬 패키지를 쉽게 사용할 수 있다.</p>
      </article>
    </section>

    <h4 class="sub-header">A.1.1 - 우분투에서 설치하기</h4>
    <section>
      <article class="">
        <p>우분투는 pip3가 설치되어 있지 않을 경우 pip3라는 명령어를 터미널에서 실행하면 다음과 같은 메시지를 보여준다. 그대로 입력하면 pip3가 설치된다.</p>
        <pre><code><blockquote><ol><li>$ pip</li><li>프로그램&nbsp;'pip3'을<font color="#33cc33">(</font>를<font color="#33cc33">)</font>&nbsp;설치하지&nbsp;않습니다.&nbsp;다음을&nbsp;입력해&nbsp;설치할&nbsp;수&nbsp;있습니다:</li><li>sudo&nbsp;apt&nbsp;install&nbsp;python-pip3</li></ol></blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">A.1.2 - macOS 및 윈도우에서 설치하기</h4>
    <section>
      <article class="">
        <p>macOS는 pip를 따로 설치해주어야 한다. pip홈페이지(<a href="https://pip.pypa.io" target="_blank">https://pip.pypa.io</a>)에서 제공하는 설치 스크립트를 이용할 수 있지만 가능하면 패키지 매니저로 설치하는 방법을 더 추천한다.</p>
        <p>우선 파이썬 실행환경이 설치되어 있어야 한다.(1.4.2, 1.4.3을 통해 파이썬 실행환경을 설치한다.) 그리고 pip홈페이지의 <a href="https://pip.pypa.io/en/stable/installing/" target="_blank">Installation</a>을 참고하여 pip를 설치한다.  <a href="https://bootstrap.pypa.io/get-pip.py" target="_blank">get-pip.py</a>파일을 다운로드 한 후, 터미널에서 get-pip.py파일을 다운로드한 경로로 이동한 후 다음 명령을 실행한다.</p>
        <pre><code><blockquote><ol><li>$&nbsp;python&nbsp;get-pip.py</li></ol></blockquote></code></pre>
        <p>윈도우의 경우 명령 프롬프트를 관리자 권한으로 실행해서 pip를 설치하길 권장한다.</p>

      </article>
    </section>

      <h4 class="sub-header">A.1.3 - pip 업그레이드</h4>
    <section>
      <article class="">
        <p>간혹 최신 pip 버전이 새로운 기능을 사용하는데 문제가 발생할 수 있다. 이런 경우 운영체제별로 다음 명령을 실행해서 pip를 업그레이드 할 수 있다.</p>
        <pre><code><blockquote><ol><li>#&nbsp;우분투&nbsp;혹은&nbsp;macOS의&nbsp;경우</li><li>$&nbsp;sudo&nbsp;pip3&nbsp;install&nbsp;-U&nbsp;pip</li><li>&nbsp;</li><li>#&nbsp;윈도우의&nbsp;경우<font color="#33cc33">(</font>관리자&nbsp;권한으로&nbsp;실행하여야&nbsp;함<font color="#33cc33">)</font></li><li>$&nbsp;pip&nbsp;install&nbsp;-U&nbsp;pip</li></ol></blockquote></code></pre>
      </article>
    </section>
  </div>

  <h3 class="sub-header">A.2. 가상 환경 venv</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>파이썬으로 무언가를 만들어서 배포하거나, 독립적인 프로그램처럼 실행할 꾸러미를 만들거나, 기존에 설치한 패키지의 영향을 받지 않는 새로운 프로젝트를 만들어야 할 때, 사용하는 것이 가상환경이다. 이를 지원하는 파이썬 내장 패키지는 venv이다. 파이썬 3.3 이후부터 기본 라이브러리로 추가되어 있으므로 이후 버전이라면 별도로 설치할 필요가 없다.</p>

        <p>venv를 활성화하면 현재 시스템이 기본 설치한 파이썬과 파이썬 패키지를 사용하지 않고, 가상환경의 파이썬과 파이썬 패키지를 사용한다. 가상환경을 설정하고 실행하는 방법은 다음과 같다.</p>
        <ol>
          <li>가상 환경 경로(이하 &lt;venv>)를 지정해 디렉터리를 만든다.</li>
          <li>1번에서 생성한 &lt;venv>/bin/activate를 source 명령어로 실행한다. (윈도우라면 activate.bat 혹은 actvate.ps1을 실행한다.)</li>
          <li>가상환경에 진입한다.</li>
        </ol>
      </article>
    </section>

    <h4 class="sub-header">A.2.1 - 가상 환경 설정</h4>
    <section>
      <article class="">
        <p>첫 번째 단계로 파이썬에서 venv 패키지를 이용해서 가상환경을 생성하는 방법은 두가지이다.</p>
        <p>하나는 python 명령의 옵션에서 가상환경을 생성하는 것이다. (윈도우의 경우 이 명령을 사용하길 권장한다.)</p>
        <pre><code><blockquote><ol><li>$&nbsp;python&nbsp;-m&nbsp;venv&nbsp;<font color="#33cc33">&lt;</font>가상환경&nbsp;경로<font color="#33cc33">&gt;</font></li></ol></blockquote></code></pre>
        <p>다른 하나는 pyvenv 모듈을 사용해 가상환경 경로를 지정해 생성하는 것이다.</p>
        <pre><code>$ pyvenv &lt;가상환경 경로></code></pre>
        <div class="tip"><h4>[Tip]</h4><p>윈도우에서는 pyvenv 패키지가 위치한 '파이썬 실행환경 폴더\Tools\scripts'에서 명령을 실행하거나 윈도우의 [시스템 속성]->[환경 변수]->[시스템 변수]의 Path 변수에 해당 경로를 추가해 실행해야 한다.</p></div>
        <p>앞 두 가지 방법 중 운영체제에 맞춰 자신에게 더 편리한 방법으로 가상환경을 생성하면 된다.</p>
        <p>다음은 venv_test0이라는 가상환경 디렉터리를 만든 후 tree 명령을 실행해 만들어진 가상환경에 어떤 파일들이 있는지 살펴보자.</p>
        <pre><code><blockquote><ol><li>$&nbsp;python&nbsp;-m&nbsp;venv&nbsp;venv_test0</li><li>&nbsp;</li><li>#&nbsp;윈도우의&nbsp;경우</li><li><font color="#33cc33">&gt;</font>&nbsp;tree&nbsp;/f&nbsp;venv_test0</li><li>&nbsp;</li><li>#&nbsp;우분투&nbsp;혹은&nbsp;macOS의&nbsp;경우</li><li>$&nbsp;tree&nbsp;-L&nbsp;4&nbsp;venv_test0</li></ol></blockquote></code></pre>
        <p>만약 우분투나 macOS의 경우 tree 명령어가 실행되지 않을 수 있다 이런 경우 다음을 실행해서 tree를 설치한다.</p>
        <pre><code>$ python -m venv venv_test0
        <br># 우분투의 경우<br>$ sudo apt install tree
        <br># macOS의 경우<br>$ brew install tree</code></pre>
        <p>우분투나 macOS의 tree 명령 실행 결과는 다음과 같다.</p>
        <pre>
          <code><blockquote><ol><li>venv_test0</li><li>├──&nbsp;bin</li><li>│  &nbsp;├──&nbsp;activate</li><li>│  &nbsp;├──&nbsp;activate.csh</li><li>│  &nbsp;├──&nbsp;activate.fish</li><li>│  &nbsp;├──&nbsp;easy_install</li><li>│  &nbsp;├──&nbsp;easy_install-3.7</li><li>│  &nbsp;├──&nbsp;pip</li><li>│  &nbsp;├──&nbsp;pip3</li><li>│  &nbsp;├──&nbsp;pip3.7</li><li>│  &nbsp;├──&nbsp;python&nbsp;-<font color="#33cc33">&gt;</font>&nbsp;python3.7</li><li>│  &nbsp;├──&nbsp;python3&nbsp;-<font color="#33cc33">&gt;</font>&nbsp;python3.7</li><li>│  &nbsp;└──&nbsp;python3.7&nbsp;-<font color="#33cc33">&gt;</font>&nbsp;/Library/Frameworks/Python.framework/Versions/3.7/bin/python3.7</li><li>├──&nbsp;include</li><li>├──&nbsp;lib</li><li>│  &nbsp;└──&nbsp;python3.7</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└──&nbsp;site-packages</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;__pycache__</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│  &nbsp;└──&nbsp;easy_install.cpython-37.pyc</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;easy_install.py</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;pip</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│  &nbsp;├──&nbsp;__init__.py</li><li>&nbsp;</li><li>--snip--</li><li>&nbsp;</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│  &nbsp;├──&nbsp;version.py</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│  &nbsp;├──&nbsp;wheel.py</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;│  &nbsp;└──&nbsp;windows_support.py</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└──&nbsp;setuptools-39.0.1.dist-info</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;DESCRIPTION.rst</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;INSTALLER</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;LICENSE.txt</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;METADATA</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;RECORD</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;WHEEL</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;dependency_links.txt</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;entry_points.txt</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;metadata.json</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├──&nbsp;top_level.txt</li><li>│  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└──&nbsp;zip-safe</li><li>└──&nbsp;pyvenv.cfg</li><li>&nbsp;</li><li>104&nbsp;directories,&nbsp;775&nbsp;files</li></ol></blockquote></code>
        </pre>
        <p>bin 디렉터리 아래에 기본 패키지 관리자들과 가상환경을 활성화하는 스크립트가 있다. lib 디렉터리 아래는 패키지 관리자를 제외하고는 아무것도 없는 상태이다. 참고로 윈도우의 경우 디렉터리 구조가 약간 다르지만 개념은 같다.</p>
        <p>우분투와 macOS에서는 source 명령으로 가상 환경을 실행할 수 있다.</p>
        <pre><code><blockquote><ol><li>$&nbsp;source&nbsp;<font color="#33cc33">&lt;</font>가상환경&nbsp;경로<font color="#33cc33">&gt;</font>/bin/activate</li></ol></blockquote></code></pre>
        <p>가상환경을 종료할 때는 deactivate 명령어를 실행하면 된다. 윈도우라면 두 가지로 나뉜다. 명령 프롬프트를 사용한다면 &lt;가상환경 경로>\Scripts에 있는 activate.bat 파일을 실행한다.</p>
        <pre><code><blockquote><ol><li><font color="#33cc33">&gt;</font>&nbsp;.\Scripts\activate.bat</li></ol></blockquote></code></pre>
        <p>가상환경을 종료할 때는 같은 경로의 deactivate.bat 파일을 실행하면 된다.</p>
        <p>Windows PowerShell을 사용한다면 &lt;가상환경 경로>\Scripts에 있는 actvate.ps1 파일을 실행한다.</p>
        <pre><code><blockquote><ol><li><font color="#33cc33">&gt;</font>&nbsp;.\Scripts\activate.ps1</li></ol></blockquote></code></pre>
        <p>종료할 때는 명령 프롬프트와 조금 다르다. deactivate 명령어를 실행하면 된다.</p>
        <div class="tip"><h4>NOTE_activate.ps1 파일을 실행할 수 없는 경우</h4><p>Windows PowerShell은 기본적으로 보안을 위해 외부스크립트를 실행하지 않도록 설정되어 있다. 이 경우 다음 명령을 실행해서 외부 스크립트를 실행할 수 있게 바꾼다.</p>
        <p><svg id="i-chevron-right" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <path d="M12 30 L24 16 12 2" />
        </svg> Set-ExecutionPolicy Unrestricted</p></div>
        <p>명령을 실행하면 아래처럼 터미널의 명령어 입력 줄의 맨 앞에 가상환경 이름이 붙게 된다.</p>
        <pre><code><blockquote><ol><li><font color="#33cc33">(</font>venv_test0<font color="#33cc33">)</font>&nbsp;<font color="#33cc33">&lt;</font>사용자&nbsp;이름<font color="#33cc33">&gt;@&lt;</font>현재경로<font color="#33cc33">&gt;</font>:~/$</li></ol></blockquote></code></pre>
        <p>더 자세한 내용은 파이썬 개발 문서의 '<a href="https://docs.python.org/3/library/venv.html" target="_blank">28.3 venv -- Creation of virtual environments</a>'를 참고한다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">A.3. pip와 venv를 동시에 활용하기</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>pip의 명령어 중에는 freeze 가 있다. freeze 명령을 지원하는 패키지 리스트를 읽어 들여서 한 번에 설치하는 install -r 옵션이 있다. 이 명령과 venv를 조합하면 어딜 가든 동일한 파이썬 환경을 순식간에 만들 수 있다.</p>
        <p>예를 들어 플라스크와 장고 프레임워크가 설치된 상태에서 pip freeze 명령을 실행하면 다음과 같은 출력 결과를 확인할 수 있다.</p>
        <pre><code><blockquote><ol><li>click==6.7</li><li>Django==1.11.6</li><li>Flask==0.12.2</li><li>itsdangerous==0.24</li><li>Jinja2==2.9.6</li><li>MarkupSafe==1.0</li><li>pytz==2017.2</li><li>Werkzeug==0.11.11</li></ol></blockquote></code></pre>
        <p>위 출력 내용은 다음 명령으로 requirements 형식의 텍스트 파일(requirements.txt)로 저장할 수 있다.</p>
        <pre><code><blockquote><ol><li>$&nbsp;pip&nbsp;freeze&nbsp;<font color="#33cc33">&gt;</font>&nbsp;requirements.txt</li></ol></blockquote></code></pre>
        <p>A.2를 참고해서 venv 가상환경을 실행한다. 그리고 requirements.txt 파일을 가상 환경 시작 디렉터리에 위치시킨 후 다음 명령을 실행해서 새 가상환경에서 해당 패키지를 설치하게 할 수 있다. 새 가상환경의 깨끗한 pip 목록을 채워줄 수 있는 셈이다.</p>
        <pre><code><blockquote><ol><li>$&nbsp;pip&nbsp;install&nbsp;-r&nbsp;requirements.txt</li></ol></blockquote></code></pre>
        <p>위 명령을 실행하면 requirements.txt에 있는 패키지들을 가상 환경에 설치한다. 더 자세한 팁은 스택오버플로의 '<a href="https://goo.gl/SpDjRO" target="_blank">How to install packages using pip according to the requirements.txt file from a local directory?</a>'를 참고한다.</p>
      </article>
    </section>
  </div>
