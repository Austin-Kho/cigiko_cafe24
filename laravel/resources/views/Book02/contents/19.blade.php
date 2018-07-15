  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article class="">

      </article>
    </section>
  </div>

  <h3 class="sub-header">A.1. 패키지 관리자 pip</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>우분투의 aptitude나, macOS의 Homebrew, Node.js의 npm 같은 패키지 관리자가 파이썬에도 있습니다. pip가 그것이죠. pip를 이용하면 거의 모든 파이썬 패키지를 쉽게 사용할 수 있습니다.</p>
      </article>
    </section>

    <h4 class="sub-header">A.1.1 - 우분투에서 설치하기</h4>
    <section>
      <article class="">
        <p>우분투는 pip가 설치되어 있지 않을 경우 pip라는 명령어를 터미널에서 실행하면 다음과 같은 메시지를 보여줍니다. 그대로 입력하면 pip가 설치된다.</p>
        <pre><code>$pip<br>프로그램 'pip'을(를) 설치하지 않습니다. 다음을 입력해 설치할 수 있습니다:<br>sudo apt install python-pip</code></pre>
      </article>
    </section>

    <h4 class="sub-header">A.1.2 - macOS 및 윈도우에서 설치하기</h4>
    <section>
      <article class="">
        <p>macOS는 pip를 따로 설치해주어야 한다. pip홈페이지(https://pip.pypa.io)에서 제공하는 설치 스크립트를 이용할 수 있지만 가능하면 패키지 매니저로 설치하는 방법을 더 추천한다.</p>
        <p>우선 파이썬 실행환경이 설치되어 있어야 한다.(1.4.2, 1.4.3을 통해 파이썬 실행환경을 설치한다.) 그리고 pip홈페이지의 Installation(https://pip.pypa.io/en/stable/installing/)을 참고하여 pip를 설치한다.  get-pip.py(https://bootstrap.pypa.io/get-pip.py)파일을 다운로드 한 후, 터미널에서 get-pip.py파일을 다운로드한 경로로 이동한 후 다음 명령을 실행한다.</p>
        <pre><code>$ python get-pip.py</code></pre>
        <p>윈도우의 경우 명령 프롬프트를 관리자 권한으로 실행해서 pip를 설치하길 권장한다.</p>

      </article>
    </section>

      <h4 class="sub-header">A.1.3 - pip 업그레이드</h4>
    <section>
      <article class="">
        <p>간혹 최신 pip 버전이 새로운 기능을 사용하는데 문제가 발생할 수 있다. 이런 경우 운영체제별로 다음 명령을 실행해서 pip를 업그레이드 할 수 있다.</p>
        <pre><code># 우분투 혹은 macOS의 경우<br>$ sudo pip3 install -U pip
        <br># 윈도우의 경우(관리자 권한으로 실행하여야 함)<br>$ pip install -U pip</code></pre>
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
        <p>하나는 python 명령의 옵션에서 가상환경을 생성하는 것이다. (윈도우의 경우 이 명령을 사용하길 권)</p>
        <pre><code>$ python -m venv &lt;가상환경 경로></code></pre>
        <p>다른 하나는 pyvenv 모듈을 사용해 가상환경 경로를 지정해 생성하는 것이다.</p>
        <pre><code>$ pyvenv &lt;가상환경 경로></code></pre>
        <p class="bg-success" style="padding:10px;"><strong>[Tip]</strong> 윈도우에서는 pyvenv 패키지가 위치한 '파이썬 실행환경 폴더\Tools\scripts'에서 명령을 실행하거나 윈도우의 [시스템 속성]->[환경 변수]->[시스템 변수]의 Path 변수에 해당 경로를 추가해 실행해야 한다.</p>
        <p>앞 두 가지 방법 중 운영체제에 맞춰 자신에게 더 편리한 방법으로 가상환경을 생성하면 된다.</p>
        <p>다음은 venv_test0이라는 가상환경 디렉터리를 만든 후 tree 명령을 실행해 만들어진 가상환경에 어떤 파일들이 있는지 살펴보자.</p>
        <pre><code>$ python -m venv venv_test0
        <br># 윈도우의 경우<br>> tree /f venv_test0
        <br># 우분투 혹은 macOS의 경우<br>$ tree -L 4 venv_test0</code></pre>
        <p>만약 우분투나 macOS의 경우 tree 명령어가 실행되지 않을 수 있다 이런 경우 다음을 실행해서 tree를 설치한다.</p>
        <pre><code>$ python -m venv venv_test0
        <br># 우분투의 경우<br>$ sudo apt install tree
        <br># macOS의 경우<br>$ brew install tree</code></pre>
        <p>우분투나 macOS의 tree 명령 실행 결과는 다음과 같다.</p>
        <pre>
          <code>venv_test0
├── bin
│   ├── activate
│   ├── activate.csh
│   ├── activate.fish
│   ├── easy_install
│   ├── easy_install-3.7
│   ├── pip
│   ├── pip3
│   ├── pip3.7
│   ├── python -> python3.7
│   ├── python3 -> python3.7
│   └── python3.7 -> /Library/Frameworks/Python.framework/Versions/3.7/bin/python3.7
├── include
├── lib
│   └── python3.7
│       └── site-packages
│           ├── __pycache__
│           │   └── easy_install.cpython-37.pyc
│           ├── easy_install.py
│           ├── pip
│           │   ├── __init__.py

--snip--

│           │   ├── version.py
│           │   ├── wheel.py
│           │   └── windows_support.py
│           └── setuptools-39.0.1.dist-info
│               ├── DESCRIPTION.rst
│               ├── INSTALLER
│               ├── LICENSE.txt
│               ├── METADATA
│               ├── RECORD
│               ├── WHEEL
│               ├── dependency_links.txt
│               ├── entry_points.txt
│               ├── metadata.json
│               ├── top_level.txt
│               └── zip-safe
└── pyvenv.cfg

104 directories, 775 files
          </code>
        </pre>
        <p>bin 디렉터리 아래에 기본 패키지 관리자들과 가상환경을 활성화하는 스크립트가 있다. lib 디렉터리 아래는 패키지 관리자를 제외하고는 아무것도 없는 상태이다. 참고로 윈도우의 경우 디렉터리 구조가 약간 다르지만 개념은 같다.</p>
        <p>우분투와 macOS에서는 source 명령으로 가상 환경을 실행할 수 있다.</p>
        <pre><code>$ source &lt;가상환경 경로>/bin/activate</code></pre>
        <p>가상환경을 종료할 때는 deactivate 명령어를 실행하면 된다. 윈도우라면 두 가지로 나뉜다. 명령 프롬프트를 사용한다면 &lt;가상환경 경로>\Scripts에 있는 activate.bat 파일을 실행한다.</p>
        <pre><code>> .\Scripts\activate.bat</code></pre>
        <p>가상환경을 종료할 때는 같은 경로의 deactivate.bat 파일을 실행하면 된다.</p>
        <p>Windows PowerShell을 사용한다면 &lt;가상환경 경로>\Scripts에 있는 actvate.ps1 파일을 실행한다.</p>
        <pre><code>> .\Scripts\activate.ps1</code></pre>
        <p>종료할 때는 명령 프롬프트와 조금 다르다. deactivate 명령어를 실행하면 된다.</p>
        <p class="bg-warning" style="padding: 10px;"><strong>NOTE_activate.ps1 파일을 실행할 수 없는 경우</strong><br>Windows PowerShell은 기본적으로 보안을 위해 외부스크립트를 실행하지 않도록 설정되어 있다. 이 경우 다음 명령을 실행해서 외부 스크립트를 실행할 수 있게 바꾼다.
        <br>> Set-ExecutionPolicy Unrestricted</p>
        <p>명령을 실행하면 아래처럼 터미널의 명령어 입력 줄의 맨 앞에 가상환경 이름이 붙게 된다.</p>
        <pre><code>(venv_test0) &lt;사용자 이름>@&lt;현재경로>:~/$</code></pre>
        <p>더 자세한 내용은 파이썬 개발 문서의 '28.3 venv -- Creation of virtual environments(https://docs.python.org/3/library/venv.html)'를 참고한다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">A.3. pip와 venv를 동시에 활용하기</h3>
  <div class="chapter">
    <section>
      <article class="">
        <p>내용 입력</p>
      </article>
    </section>
  </div>
