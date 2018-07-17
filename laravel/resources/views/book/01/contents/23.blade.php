    <h3 class="page-header">{{$sub[$id][1]}}</h3>
    <div class="chapter">
      <section>
        <article class="">
          <p>IDLE의 파일 편집기에 열려있는 프로그램이 있다면 F5를 누르거나 Run▶Run Modul 메뉴 항목을 선택하면 된다. 프로그램을 만들고 있을 때에는 이렇게 프로그램을 실행하는 것이 쉬운 방법이지만 완성된 프로그램을 실행하기 위해서 IDLE를 여는 것은 번거롭다. 더 편리한 방법이 있다.</p>

          <p>
            <h5><strong>■ 쉬뱅 라인</strong></h5>
            <p>모든 파이썬 프로그램의 첫 번째 줄은 쉬뱅 라인이어야 하며, 이는 컴퓨터에서 이 프로그램을 실행하기 위해 파이썬이 필요하다는 것을 알려준다. 쉬뱅라인은 #/로 시작하지만 나머지는 운영체제에 따라 다르다.</p>
            <ul>
              <li>윈도우에서는 쉬뱅 라인이 #! python3 이다.</li>
              <li>OS X 에서는 쉬뱅라인이 #! /usr/bin/env python3 이다.</li>
              <li>리눅스에서는 쉬뱅 라인이 #! / usr/bin/python3 이다.</li>
            </ul>
              <p>쉬뱅 라인 없어도 IDLE 에서 파이썬 스크립트를 실행할 수는 있지만 명령행에서 실행할 때에는 필요하다.</p>
          </p>

          <p>
            <h5><strong>■ 윈도우에서 파이썬 프로그램 실행하기</strong></h5>
            <p>윈도우에서는 파이썬 3.4 인터프리터는 C:\Python34\python.exe 에 있다. 이 방법 말고도 편리한 py.exe 프로그램이 .py 파일의 소스 코드의 가장 위에 있는 쉬뱅 라인을 읽고 해당 파이썬의 스크립트 적절한 버전을 실행할 수도 있다.
            <br>컴퓨터에 여러 버전의 파이썬이 설치되어 있는 경우 py.exe 프로그램은 올바른 버전으로 파이썬 프로그램을 실행시킨다. 파이썬 프로그램을 편리하게 실행하려면 파이썬 프로그램을 py.exe로 실행하기 위한 .bat 배치파일을 만든다.
            <br>배치파일을 만들려면 다음과 같은 한 줄을 포함하는 새 텍스트 파일을 만든다.
            </p>
            <pre><code class="python">@py.exe C:\path\to\your\pythonScript.py</code></pre>
            <p>여기서 경로는 자신이 실행하고자 하는 프로그램의 절대 경로로 바꾼 뒤, .bat 파일 확장자로 이 파일을 저장하자.(예를 들어 pythonScript.bat) 이 배치 파일은 파이썬 프로그램을 실행할 때마다 전체 절대 경로를 입력해야 하는 번거로움을 덜어준다. 이러한 모든 배치 파일 및 .py 파일을 하나의 폴더, 이를테면 C:\MyPythonScripts 또는 C:\Users\Myname\PythonScripts 같은 곳에 모아 두기를 권한다.</p>
            <p>C:\MyPythonScripts 폴더를 윈도우 시스템 경로에 추가하면 배치 파일을 실행 대화상자에서 실행시킬 수 있다. 이렇게 하려면 PATH 환경 변수를 수정해야 한다.</p>
          </p>

          <p>
            <h5><strong>■ OS X와 리눅스에서 파이썬 프로그램 실행하기</strong></h5>
            <p>OS X 또는 리눅스에서 터미널을 열고 'cd ~'를 입력하고 실행하여 홈폴더로 이동한다. 홈 폴더에 .py 파일을 저장한 다음, chmod +xpythonScript.py 를 실행해서 .py 파일의 권한을 실행 가능하도록 바꾼다. 터미널 창에서 프로그램을 실행하려면 이와 같이 파일 권한을 지정한 후에 해당 파이썬 파일에 대해 이 명령을 실행해야 한다.
            <br>이렇게 하면 터미널 창을 열고 ./pythonScript.py를 입력할 때마다 스크리브를 실행할 수 있게 된다. 스크립트의 가장 처음에 나오는 쉬뱅 라인은 운영체제에게 파이썬 인터프리터가 있는 곳을 알려 준다.</p>
            <pre><code class="python">@py.exe C:\path\to\your\pythonScript.py</code></pre>
            <p>여기서 경로는 자신이 실행하고자 하는 프로그램의 절대 경로로 바꾼 뒤, .bat 파일 확장자로 이 파일을 저장하자.(예를 들어 pythonScript.bat) 이 배치 파일은 파이썬 프로그램을 실행할 때마다 전체 절대 경로를 입력해야 하는 번거로움을 덜어준다. 이러한 모든 배치 파일 및 .py 파일을 하나의 폴더, 이를테면 C:\MyPythonScripts 또는 C:\Users\Myname\PythonScripts 같은 곳에 모아 두기를 권한다.</p>
            <p>C:\MyPythonScripts 폴더를 윈도우 시스템 경로에 추가하면 배치 파일을 실행 대화상자에서 실행시킬 수 있다. 이렇게 하려면 PATH 환경 변수를 수정해야 한다.</p>
          </p>

          <p>
            <h5><strong>■ 중단문을 비활성화한 상태로 파이썬 프로그램 실행하기</strong></h5>
            <p>파이썬 프로그램에서 중단(assertion)문을 비활성화하면 실행속도를 약간 향상시킬 수 있다. 터미널에서 파이썬을 실행하는 경우, python 또는 python3 뒤에 그리고 .py 파일 이름 앞에 -O 사위치를 붙인다. 이렇게 하면 중단문 검사를 건너뛰고 프로그램의 최적화된 버전을 실행한다.</p>
          </p>
        </article>
      </section>
    </div>