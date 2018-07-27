  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>최근 어느 정도 규모가 있고 IT트렌드에 민감한 조직이라면 사내 커뮤니케이션 도구로 <a href="https://slack.com" target="_blank">슬랙(slack)</a>을 사용하는 경우가 많아졌다. 비즈니스 조직이라면 정기 보고를 원하기 마련인데 매번 담당자가 개발 부서에 데이터베이스의 데이터를 추출하고 정제할 것을 요청해서 이메일이나 슬랙으로 보내는 건 정말 비효율적인 일이다. 그런 루틴한 작업이라면 봇을 이용해서 자동화할 가능성이 보이기도 한다.</p>
        <p>이 장에서는 루틴한 작업들을 자동화 해주는 슬랙 봇을 만들어보자.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">12.1. 봇이 뭐죠?</h3>
  <div class="chapter">
    <section>
      <article>
        <p>봇(bot)은 보통 'robot'의 축약어로 사용되는 단어이다. 사람이 하는 반복적인 작업을 자동화하는 소프트웨어를 일컫는다. 익숙하게는 FPS나 AOS 장르 게임에서의 인공지능도 봇이라고 하고, 간단한 채팅에 반응하거나 명령에 반응해서 정해진 작업을 하는 소프트웨어도 봇이라고 한다. 특히 사람과 상호작용 하는 것을 봇이라고 하는 경향이 있다. 단순한 스크립트가 아니라 채팅 등의 환경에서 반응하고, 그 결과를 다시 채팅 형식으로 알려주는 것이다.</p>
        <p>예를 들어 봇이 어떤 배포 작업을 대신해준다면 'deploy bot', 빌드 작업을 대신해 준다면 'build bot', 그 외 이밎를 찾는다거나 리마인더를 만드는 경우도 있다.</p>
        <p>슬랙에서 봇은 봇 유저(Bot user)라고도 한다. 다음과 같이 설명한다.</p>
        <ul>
          <li>프로필 사진, 이름 등이 있다.</li>
          <li>작업 디렉터리에 존재하며 직접 메시지를 보내거나 메시지를 게시하고 파일을 업로드할 수 있다.</li>
          <li>슬랙의 API에 접근하는 봇 유저 토큰을 이용한 프로그램 코드로 봇을 제어한다.</li>
          <li>일반 사용자가 이용할 수 있는 모든 API 메서드의 하위 세트에만 접근할 수 있다.</li>
        </ul>
        <p>슬랙에는 기본으로 내장된 slackbot으로 봇 유저에게 필요한 몇 가지 기능을 제공한다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">12.2. 제작 과정 알아보기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>간단하게 봇 제작 과정을 소개한다. 슬랙에서 만들 수 있는 봇은 크게 두 가지 종류가 있다.</p>
        <ul>
          <li>Bots</li>
          <li>Incoming Webhooks bots</li>
        </ul>
        <p>첫 번째 'Bots'를 이용하면 상호작용하는 봇을 만들 수 있고, 두 번째 'Incoming Webhooks bots'를 이용하면 정기적으로 데이터를 보내는 봇을 만들 수 있다.</p>
        <p>제작 과정은 다음과 같다.</p>
        <ol>
          <li>API 토큰/Webhook URL 얻기</li>
          <li>해당 토큰/URL을 이용해서 메시지 보내기</li>
          <li>(Bots의 경우) 리액션 설정하기</li>
          <li>봇을 계속 실행해 두기</li>
        </ol>
        <p>그럼 본격적으로 본 만들기를 시작해보자.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">12.3. 상호작용하는 주사위 봇 만들기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>이 절에서 만들어볼 건 상호작용하는 주사위 봇이다. 굴리는 주사위 모양을 사용자가 지정해서 1d6, 39d39, AdX 형식으로 주사위를 굴릴 것이다.</p>
        <div class="tip">
          <h4>NOTE_ AdX 형식</h4>
          <p>AdX 는 주사위 굴림을 표현하는 방식이다. A 개의 X 면체 주사위를 굴리라는 뜻이다. 앞에서 예를 든 1d6의 경우, 1개의 6면체 주사위를 굴리라는 뜻이다. 2d100이라 한다면, 2개의 100면체를 굴리라는 뜻이 되는 것이다. 더 자세한 설명은 위키백과의 '<a href="https://en.wikipedia.org/wiki/Dice_notation" target="_blank">Dice notation</a>'을 참고한다.</p>
        </div>
      </article>
    </section>

    <h4 class="sub-header">12.3.1 - 슬랙 봇 API 토큰 얻기</h4>
    <section>
      <article>
        <p>먼저 슬랙 봇을 만들기 위한 준비물을 챙겨야 한다. 슬랙에서 봇 API 토큰을 가져오는 방법을 알아본다.</p>
        <p>https://slack.com/downloads/ 에서 본인의 계정에 맞는 슬랙 애플리케이션을 다운로드한다. 그리고 실습으로 봇을 만드는 것이므로 다른 사람에게 피해를 주지 않도록 본인만 가입되어 있는 슬랙 워크스페이스를 하나 생성한다.</p>
        <p>워크스페이스 생성이 끝났다면 워크스페이스 왼쪽 위 계정 선택 부분의 메뉴에서 [Manage apps] 항목을 선택한다.</p>
        <h5>그림12-1 Manage apps 선택</h5>
        <img src="/img/img15.png" alt="Manage apps 선택" class="bo">
        <p>https://[워크스페이스이름].slack.com/apps/manage 이라는 웹페이지가 열린다. 'Search App Directory'라는 글자가 적힌 검색창에 Bots를 입력하고 'Bots'를 선택한다.</p>
        <h5>그림12-2 'Bots' 선택</h5>
        <img src="/img/img16.png" alt="'Bots' 선택" class="bo">
        <p>'Bots' 페이지가 열리면 왼쪽에 있는 [Add Configuration]이라는 녹색버튼을 클릭한다.</p>
        <h5>그림12-3 Add Configuration 선택</h5>
        <img src="/img/img17.png" alt="Add Configuration 선택" class="bo">
        <p>이제 봇의 이름을 정할 차례이다. 임의의 이름을 입력할 수 있지만, 여기에서는 주사위를 굴려줄 봇을 만들 것이므로 'dice_bot'이라고 지었다. 이름을 지었다면 [Add bot intergration] 버튼을 눌러준다.</p>
        <h5>그림12-4 봇 이름 짓기</h5>
        <img src="/img/img18.png" alt="봇 이름 짓기" class="bo">
        <p>[그림12-5]과 같은 API 토큰을 얻을 수 있다. 봇을 만드는데 이용할 예정이므로 이 코드를 저장해둔다.</p>
        <h5>그림12-5 API 토큰 얻기</h5>
        <img src="/img/img19.png" alt="API 토큰 얻기" class="bo">
        <p>아직 봇을 채널에 초대하지 않았으므로 [그림12-6]의 채널 항목은 'dice_bot is in no channels' 라는 메시지를 표시한다. 일단 하단의 [Save Intergration] 버튼을 눌러 설정을 저장한다.</p>
        <h5>그림12-6 설정 저장</h5>
        <img src="/img/img20.png" alt="설정 저장" class="bo">
      </article>
    </section>

    <h4 class="sub-header">12.3.2 - slackbot 패키지 설치</h4>
    <section>
      <article>
        <p>이제부터 본격적인 코드 작성이다. 평소처럼 venv를 이용해 가상환경을 설정하고 활성화시킨다.(물론 가상환경을 설정하지 않아도 괜찮다). 그리고 다음 명령을 실행한다.</p>
        <pre><code>$ pip install slackbot</code></pre>
        <p>이 명령으로 slackbot 패키지 설치는 끝났다.</p>
        <div class="tip">
          <h4>TIP</h4><p>slackbot 패키지에 관한 정보는 '<a href="https://github.com/lins05/slackbot" target="_blank">A chat bot for Slack</a>'을 참고한다. 간단한 예제도 확인할 수 있다.</p>
        </div>
      </article>
    </section>

    <h4 class="sub-header">12.3.3 - 파일 만들기</h4>
    <section>
      <article>
        <p>slackbot 패키지는 Bot()을 실행 중인 스크립트를 불러온 경로에서 slack_settings.py 안 설정에 있는 플러그인을 읽어 들여 실행한다. 따라서 몇 가지 파일을 만들어야 한다.</p>
        <p>설치해야 할 파일을 tree 명령 실행 결과 형식으로 나타내면 다음과 같다. (tree 명령이 무엇인지 잘 모른다면 부록 A.2.1을 참고한다).</p>
        <pre><code>.<br>
├── dice_bot.py<br>
├── run.py<br>
└── slackbot_settings.py</code></pre>
        <p>파일 각각을 설명하면 다음과 같다.</p>
        <ul>
          <li><string>dice_bot.py</string>: 봇이 반응하는 코드가 있다. 앞서 Flask에서 보았던 것처럼 디코레이터를 사용한다.</li>
          <li><string>run.py</string>: 실행할 내용이 들어가 있는 파일이다.</li>
          <li><string>slackbot_settings.py</string>: 봇을 실행하는데 필요한 설정이 들어가 있는 파일이다.</li>
        </ul>
        <p>먼저 실행 파일인 <code>run.py</code> 부터 살펴보자. 여기서 한번 만든 후에는 바뀌지 않을 것이다.</p>
        <h5>코드12-1 run.py</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;-*-&nbsp;coding:&nbsp;utf-8&nbsp;-*-</font></li><li><font color="#808080">#&nbsp;slackbot&nbsp;패키지의&nbsp;Bot&nbsp;클래스를&nbsp;불러옵니다.</font></li><li><font color="#ff7700">from</font>&nbsp;slackbot.<font>bot</font>&nbsp;<font color="#ff7700">import</font>&nbsp;Bot</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;Bot&nbsp;클래스&nbsp;객체를&nbsp;생성하고&nbsp;실행합니다.</font></li><li><font color="#ff7700">def</font>&nbsp;main<font>&#40;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;bot&nbsp;<font color="#66cc66">=</font>&nbsp;Bot<font>&#40;</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;bot.<font>run</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;이&nbsp;스크립트에서&nbsp;실행할&nbsp;것을&nbsp;작성합니다.&nbsp;앞에서&nbsp;만든&nbsp;main()을&nbsp;실행하게&nbsp;했습니다.</font></li><li><font color="#ff7700">if</font>&nbsp;__name__&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">&quot;__main__&quot;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;main<font>&#40;</font><font>&#41;</font></li></ol></blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">12.3.4 - 주사위 기능 설정하기</h4>
    <section>
      <article>
        <p>여기서부터는 dice_bot.py 파일의 내용을 넣는 부분이다. 먼저 'hello'를 적으면 'World!!'로 답하는 간단한 봇을 만들어 보자.</p>
        <h5>코드12-3 간단한 대답을 하는 봇 만들기</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;bot이&nbsp;반응할&nbsp;수&nbsp;있게&nbsp;하는&nbsp;디코레이터&nbsp;함수들을&nbsp;불러옵니다.</font></li><li><font color="#ff7700">from</font>&nbsp;slackbot.<font>bot</font>&nbsp;<font color="#ff7700">import</font>&nbsp;respond_to</li><li><font color="#ff7700">from</font>&nbsp;slackbot.<font>bot</font>&nbsp;<font color="#ff7700">import</font>&nbsp;listen_to</li><li><font color="#ff7700">from</font>&nbsp;slackbot.<font>dispatcher</font>&nbsp;<font color="#ff7700">import</font>&nbsp;Message</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;무엇을&nbsp;반응할지&nbsp;잡아줄&nbsp;수&nbsp;있는&nbsp;re(정규표현식)&nbsp;패키지를&nbsp;불러옵니다.</font></li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">re</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;listen_to&nbsp;는&nbsp;채널에서&nbsp;오가는&nbsp;모든&nbsp;대화에&nbsp;반응합니다.</font></li><li><font color="#808080">#&nbsp;디코레이터&nbsp;함수의&nbsp;첫&nbsp;번째&nbsp;파리미터는&nbsp;정규표현식이고&nbsp;두&nbsp;번째&nbsp;파라미터는&nbsp;플래그입니다.</font></li><li><font color="#66cc66">@</font>listen_to<font>&#40;</font><font color="#483d8b">&quot;Hello&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#dc143c">re</font>.<font>IGNORECASE</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;첫&nbsp;번째&nbsp;파라미터는&nbsp;디스패처의&nbsp;메시지&nbsp;클래스입니다.</font></li><li><font color="#808080">#&nbsp;반응해야&nbsp;할&nbsp;채널에&nbsp;메시지를&nbsp;보내는&nbsp;함수&nbsp;등이&nbsp;있습니다.</font></li><li><font color="#808080">#&nbsp;여기&nbsp;없는&nbsp;두&nbsp;번째&nbsp;이후의&nbsp;파라미터는&nbsp;앞&nbsp;정규&nbsp;표현식에&nbsp;그룹이&nbsp;있으면&nbsp;매칭된&nbsp;문자열이&nbsp;들어갑니다.</font></li><li><font color="#808080">#&nbsp;개수는&nbsp;상한이&nbsp;없습니다.&nbsp;그룹&nbsp;숫자에&nbsp;따라&nbsp;파라미터를&nbsp;더&nbsp;늘리면&nbsp;됩니다.</font></li><li><font color="#ff7700">def</font>&nbsp;hello<font>&#40;</font>msg:&nbsp;Message<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;send는&nbsp;채널에&nbsp;그냥&nbsp;말합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;msg.<font>send</font><font>&#40;</font><font color="#483d8b">&quot;World!!&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;respond_to는&nbsp;@을&nbsp;이용해서&nbsp;멘션했을&nbsp;경우에만&nbsp;반응합니다.&nbsp;나머지는&nbsp;listen_to의&nbsp;역할과&nbsp;같습니다.</font></li><li><font color="#66cc66">@</font>respond_to<font>&#40;</font><font color="#483d8b">&quot;hi&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#dc143c">re</font>.<font>IGNORECASE</font><font>&#41;</font></li><li><font color="#ff7700">def</font>&nbsp;hi<font>&#40;</font>msg:&nbsp;Message<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;reply는&nbsp;해당&nbsp;반응을&nbsp;일으킨&nbsp;사람에게&nbsp;말합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;listen_to든&nbsp;respond_to든&nbsp;말을&nbsp;건&nbsp;사람에게&nbsp;대답합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;msg.<font>reply</font><font>&#40;</font><font color="#483d8b">&quot;Thank&nbsp;you&nbsp;39!!&quot;</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>이제 [코드12-3]을 저장하고 <code>python run.py</code> 명령을 실행한다. 슬랙 앱에 dice_bot이 등장하는 것을 확인할 수 있다.</p>
        <h5>그림12-7 dice_bot 등장과 활성화</h5>
        <img src="/img/img21.png" alt="dice_bot 등장과 활성화" class="bo">
        <p>이제 원하는 채널을 선택(채널 하나를 만들어도 된다.)한 후 @dice_bot을 입력한다. 메시지 중 'invite them to join'을 선택해서 dice_bot을 채팅방에 초대한다.</p>
        <h5>그림12-8 dice_bot 초대</h5>
        <img src="/img/img22.png" alt="dice_bot 초대" class="bo">
        <img src="/img/img23.png" alt="dice_bot 초대" class="bo">
        <p>'hello' 라고 입력하면 봇이 대답한다. respond_to 를 이용한 대답을 받으려면 '@dice_bot hi'라고 멘션을 이용해서 메시지를 보낸다. 미리 설정했던 'Thank you 39!!' 라는 메시지를 받을 수 있다.</p>
        <h5>그림12-9 dice_bot과 대화</h5>
        <img src="/img/img24.png" alt="ddice_bot과 대화" class="bo">
        <img src="/img/img25.png" alt="ddice_bot과 대화" class="bo">
        <p>봇에게 대답하는 법을 가르쳤다. 이제 주사위를 던질 수 있게 변경해보자.</p>
        <h5>코드12-4 주사위를 던지는 봇 만들기</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;무작위&nbsp;숫자를&nbsp;생성하기&nbsp;위한&nbsp;random&nbsp;모듈을&nbsp;불러옵니다.</font></li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">random</font></li><li>&nbsp;</li><li><font color="#ff7700">from</font>&nbsp;slackbot.<font>bot</font>&nbsp;<font color="#ff7700">import</font>&nbsp;respond_to</li><li><font color="#ff7700">from</font>&nbsp;slackbot.<font>bot</font>&nbsp;<font color="#ff7700">import</font>&nbsp;listen_to</li><li><font color="#ff7700">from</font>&nbsp;slackbot.<font>dispatcher</font>&nbsp;<font color="#ff7700">import</font>&nbsp;Message</li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">re</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;'roll&nbsp;던지는&nbsp;횟수d숫자면체'&nbsp;형식으로&nbsp;메시지를&nbsp;입력하는&nbsp;hello()함수를&nbsp;정의합니다.</font></li><li><font color="#66cc66">@</font>listen_to<font>&#40;</font><font color="#483d8b">&quot;roll&nbsp;(<font color="#000099">\d</font>*)d(<font color="#000099">\d</font>+)&quot;</font><font color="#66cc66">,</font>&nbsp;<font color="#dc143c">re</font>.<font>IGNORECASE</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;메시지,&nbsp;주사위&nbsp;던지는&nbsp;횟수,&nbsp;주사위의&nbsp;면체를&nbsp;지정하는&nbsp;파라미터를&nbsp;넣어줍니다.</font></li><li><font color="#ff7700">def</font>&nbsp;hello<font>&#40;</font>msg:&nbsp;Message<font color="#66cc66">,</font>&nbsp;number_of_die:&nbsp;<font color="#008000">str</font><font color="#66cc66">,</font>&nbsp;side_of_die:&nbsp;<font color="#008000">str</font><font>&#41;</font>:</li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;에러&nbsp;처리를&nbsp;한다면&nbsp;여기서&nbsp;해주면&nbsp;됩니다.</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;앞에서&nbsp;'roll&nbsp;던지는&nbsp;횟수d숫자면체'를&nbsp;전달받아서&nbsp;던지는&nbsp;횟수를</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;number_of_die에&nbsp;저쟝하고,&nbsp;주사위&nbsp;면의&nbsp;수를&nbsp;side_of_die에&nbsp;저장합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;random.randrange(1,&nbsp;int(side_of_die),&nbsp;1)는&nbsp;주사위&nbsp;1개를&nbsp;굴리는&nbsp;코드입니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;최종적으로는&nbsp;'roll&nbsp;10d6'&nbsp;을&nbsp;입력하면&nbsp;6면체를&nbsp;10번&nbsp;굴린다는&nbsp;뜻이므로</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;1~6&nbsp;사이의&nbsp;숫자&nbsp;10개를&nbsp;출력합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;roll_result&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#91;</font><font color="#dc143c">random</font>.<font>randrange</font><font>&#40;</font><font color="#ff4500">1</font><font color="#66cc66">,</font>&nbsp;<font color="#008000">int</font><font>&#40;</font>side_of_die<font>&#41;</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">1</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#008000">range</font><font>&#40;</font><font color="#008000">int</font><font>&#40;</font>number_of_die<font>&#41;</font><font>&#41;</font><font>&#93;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;주사위를&nbsp;던진&nbsp;횟수만큼&nbsp;나온&nbsp;숫자를&nbsp;모두&nbsp;더합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;roll_sum&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">sum</font><font>&#40;</font>roll_result<font>&#41;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;주사위를&nbsp;던져서&nbsp;나온&nbsp;숫자와&nbsp;합을&nbsp;메시지로&nbsp;출력합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;msg.<font>send</font><font>&#40;</font><font color="#008000">str</font><font>&#40;</font>roll_result<font>&#41;</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;msg.<font>send</font><font>&#40;</font><font color="#008000">str</font><font>&#40;</font>roll_sum<font>&#41;</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>[코드12-4]를 저장하고 python run.py 를 다시 실행하면 [그림12-10] 처럼 주사위를 던져 결과를 볼 수 있다.</p>
        <h5>그림12-10 주사위를 던진 결과</h5>
        <img src="/img/img26.png" alt="주사위를 던진 결과" class="bo">
        <p>이것으로 주사위 봇을 만들어 보았다.</p>
        <div class="tip">
          <h4>NOTE_ 주사위 봇의 에러 처리</h4>
          <p>[코드12-4]의 주사위 봇은 실행할 수 없는 상황이 몇몇 있다. 주사위 면의 개수가 0이면 랜덤하게 값을 뽑아낼 수 없다거나, 주사위 0개를 던지는 시도를 하는 등이다. 이런 경우 주사위를 던질 때 사용자에게 재미있는 에러 메시지를 보내주는 것도 괜찮을 것이다.</p>
          <p>에러 메시지는 다음 코드를 삽입하면 된다.</p>
          <pre class="python"><code><blockquote><ol><li><font color="#ff7700">if</font>&nbsp;number_of_die&nbsp;<font color="#66cc66">&lt;=</font>&nbsp;<font color="#ff4500">0</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#483d8b">&quot;sume&nbsp;error&nbsp;message&quot;</font></li><li>&nbsp;</li><li><font color="#ff7700">if</font>&nbsp;side_of_die&nbsp;<font color="#66cc66">&lt;=</font>&nbsp;<font color="#ff4500">1</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;<font color="#483d8b">&quot;some&nbsp;error&nbsp;message&quot;</font></li></ol></blockquote></code></pre>
        </div>
      </article>
    </section>
  </div>

  <h3 class="sub-header">12.4. 정기적인 작업을 실행하는 봇 만들기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>정기적인 작업에는 서버 상태를 모니터링하거나, 특정 작업을 실행시켜 놓고 일정 시간/수 간격 으로 처리 결과를 보고하는일 등이 있다. 이 장에서 다룰 내용은 이럴 경우 사용할 수 있는 봇이다.</p>
        <p>사실 실제 봇은 아니며 웹훅(wephook)을 이용한 브로드캐스팅에 더 가깝다 하지만 봇을 이용하므로 여기서 다뤄보자.</p>
      </article>
    </section>

    <h4 class="sub-header">12.4.1 - API 토큰 얻기</h4>
    <section>
      <article>
        <p>이번에는 새로운 봇을 만들게 되므로 그에 맞는 별도의 API 토큰을 얻어야 한다. 우리가 만들 것은 웹훅을 이용한 메시징이므로 토큰 형태가 아니라 URL이 될 것이다. 이 때 사용하는 슬랙 앱은 'Incomming WebHooks'이다.</p>
        <p>12.3.1을 참고해 'Incomming WebHooks'를 찾아 선택하고 [Add Configuration] 버튼을 찾아서 클릭한다.</p>
        <h5>그림12-11 Incomming WebHooks 선택</h5>
        <img src="/img/img27.png" alt="Incomming WebHooks 선택" class="bo">
        <h5>그림12-12 [Add Configuration] 선택</h5>
        <img src="/img/img28.png" alt="[Add Configuration] 선택" class="bo">
        <div class="tip">
          <h4>NOTE_ Incomming WebHooks 기본 사용법 살펴보기</h4>
          <p>기본 사용법은 Setup Instruction 에서 자세하게 설명한다. [Sending Message], [Adding links], [Customized Appearance], [Channel Override], [Example]의 다섯 가지 항목이 있다.</p>
        </div>
        <p>이제 [Post to Channel] 항목 오른쪽의 드롭다운 메뉴를 눌러 어떤 채널에 메시지를 보낼 것인지 정한다. 그리고 [Add Incomming WebHooks intergrations]를 클릭한다.</p>
        <h5>그림12-13 메시지를 보낼 채널 설정</h5>
        <img src="/img/img29.png" alt="메시지를 보낼 채널 설정" class="bo">
        <p>우리가 사용할 웹훅 URL이 생성된다. 이 URL을 복사해 둔다.</p>
        <h5>그림12-14 웹훅 URL 생성</h5>
        <img src="/img/img30.png" alt="웹훅 URL 생성" class="bo">
      </article>
    </section>

    <h4 class="sub-header">12.4.2 - 터미널에서 메시지 보내기</h4>
    <section>
      <article>
        <p>터미널에서 메시지를 보낼 때는 [그림12-14]에서 복사해 두었던 웹훅 주소에 POST로 요청을 보내고, 데이터는 정해진 형태의 JSON 문자열을 보내면 된다.</p>
        <p>간단하게 메시지만 보내려는 경우는 다음과 같은 명령을 실행한다.</p>
        <pre><code>$ curl -X POST -d 'payload={"text": "테스트 메시지를 보냅니다."}' [웹훅 URL 입력]</code></pre>
        <p>앞 명령을 터미널에서 실행하면 [그림12-18]과 같은 메시지가 슬랙 채널에 나타난다.</p>
        <h5>그림12-15 테스트 메시지 보내기</h5>
        <img src="/img/img31.png" alt="테스트 메시지 보내기" class="bo">
        <p>사실 여기까지만 해도 셸 스크립트로 원하는 작업을 할 수 있다. 하지만 우리는 파이썬을 다루니 파이썬으로 해보자.</p>
      </article>
    </section>

    <h4 class="sub-header">12.4.3 - 작업을 파이썬 파일로 만들기</h4>
    <section>
      <article>
        <p>지금부터는 인터넷 자원에 접근할 수 있는 새 패키지인 requests를 사용한다. 원래 유사한 기능의 파이썬 내장 패키지로 urllib 이 있지만 사용방법이 번거로워 최근에는 requests 패키지를 많이 사용하는 추세이다.</p>
        <p>이 패키지는 slackbot 패키지를 설치했을 때 함께 설치하므로 slackbot 패키지를 설치했다면 따로 설치할 필요가 없다. 만약 설치가 필요하다면 다음 명령을 실행한다.</p>
        <pre><code>$ pip install requests</code></pre>
        <p>이제 12.4.2의 POST 요청을 변환한 파이썬 파일을 하나 만들어야 한다. <code>slack_timer_bot.py</code> 라는 파일을 만들고 다음 내용을 입력하자.</p>
        <h5>코드12-5 POST 요청을 보내는 파이썬 파일</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;requests&nbsp;패키지를&nbsp;불러옵니다.</font></li><li><font color="#ff7700">import</font>&nbsp;requests</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;날짜와&nbsp;시간을&nbsp;다루는&nbsp;datetime&nbsp;패키지를&nbsp;불러옵니다.</font></li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">datetime</font></li><li>&nbsp;</li><li><font color="#ff7700">def</font>&nbsp;main<font>&#40;</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;url&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;https://hooks.slack.com/services/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&quot;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;보낼&nbsp;메시지를&nbsp;설정합니다.&nbsp;여기서는&nbsp;datetime.datetime.now()를&nbsp;이용해&nbsp;시간을&nbsp;표시한다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;text&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;테스트&nbsp;메시지입니다:&nbsp;&quot;</font>&nbsp;+&nbsp;<font color="#008000">str</font><font>&#40;</font><font color="#dc143c">datetime</font>.<font color="#dc143c">datetime</font>.<font>now</font><font>&#40;</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;보낼&nbsp;메시지의&nbsp;JSON&nbsp;문자열&nbsp;형태를&nbsp;설정합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;payload&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#123;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">&quot;text&quot;</font>:&nbsp;text</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font>&#125;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;POST&nbsp;로&nbsp;요청을&nbsp;보냅니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;requests.<font>post</font><font>&#40;</font>url<font color="#66cc66">,</font>&nbsp;json<font color="#66cc66">=</font>payload<font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;이&nbsp;스크립트에서&nbsp;실행할&nbsp;것을&nbsp;작성합니다.&nbsp;앞에서&nbsp;만든&nbsp;main()을&nbsp;실행하게&nbsp;했습니다.</font></li><li><font color="#ff7700">if</font>&nbsp;__name__&nbsp;<font color="#66cc66">==</font>&nbsp;<font color="#483d8b">&quot;__main__&quot;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;main<font>&#40;</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>이 파이썬 파일을 이용해서 데이터베이스에 접근하거나, 주기적으로 크롤링한 결과를 보내거나, 여러 가지 작업을 한 후 슬랙으로 자동 보고하게 할 수 있다.</p>
      </article>
    </section>

    <h4 class="sub-header">12.4.4 - 파이썬 파일을 실행하는 셸 스크립트 만들기</h4>
    <section>
      <article>
        <p>파이썬 파일을 실행하는 셸 스크립트를 만들어 준다. 파일이름은 <code>run.sh</code>이다.</p>
        <h5>코드12-6 파이썬 파일 실행 셸 스크립트</h5>
        <pre><code><blockquote><ol><li><font color="#808080">#!/bin/bash</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;crontab의&nbsp;경우&nbsp;실행되는&nbsp;PATH가&nbsp;다릅니다.</font></li><li><font color="#808080">#&nbsp;따라서&nbsp;사용자의&nbsp;PATH&nbsp;변수로&nbsp;크론을&nbsp;실행할&nbsp;경로를&nbsp;설정해줍니다.</font></li><li>PATH<font color="#66cc66">=</font>/usr/lacal/bin:/bin:/usr/sbin:/sbin</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;가상&nbsp;환경을&nbsp;설정했다면&nbsp;가상&nbsp;환경을&nbsp;활성화하는&nbsp;셸&nbsp;스크립트도&nbsp;들어가야&nbsp;합니다.</font></li><li>source&nbsp;<font color="#66cc66">&lt;</font>absolute-path-to-venv<font color="#66cc66">&gt;</font>/bin/activate</li><li>python3&nbsp;<font color="#66cc66">&lt;</font>absolute-path-to-script<font color="#66cc66">&gt;</font>/slack_timer_bot.<font>py</font></li></ol></blockquote></code></pre>
        <p>관리의 편의성이라던가, 다른 파이썬 파일을 실행하는 상황이나, 변경이나 로그 기록 등을 고려해 가상 환경별로 실행 스크립트를 구분해 다른 작업과의 연결을 느슨하게 하면 좋다.</p>
        <div class="tip">
          <h4>TIP</h4>
          <p>12.4.4와 이어지는 12.4.5의 내용은 우분투와 윈도우에만 실행할 수 있는 내용이다. 윈도우에서는 배치파일을 만들고 작업 스케줄러에서 배치 파일을 실행하게 해야 한다. 작업 스케줄러를 설정하는 방법은 '<a href="https://technet.microsoft.com/ko-kr/library/cc766428(v=ws.11).aspx" target="_blank">작업 스케줄러 사용법</a>'을 참고한다.</p>
        </div>
      </article>
    </section>

    <h4 class="sub-header">12.4.5 - crontab을 이용해 스크립트를 주기적으로 실행하기</h4>
    <section>
      <article>
        <p>마지막으로 이 셸 스크립트를 cron 에 등록하면 끝난다. 이때는 crontab 명령어를 사용한다. 우선 다음 명령을 실행한다.</p>
        <pre><code>$ crontab -e</code></pre>
        <p>-e 는 crontab 을 이용해 수정한다는 명령이다. 이제 편집기에서 다음 명령을 입력하고 <kbd>Esc</kbd>를 누른 후 <kbd>:wq</kbd>를 입력해 저장한다.</p>
        <pre><code>* * * * * /bin/bash &lt;absolute-path-to-script>/run.sh</code></pre>
        <p>이제 cron 에서 run.sh 를 실행할 것이다. 1분마다 '테스트 메시지입니다.'를 출력한다.</p>
        <h5>그림12-18 정기적으로 메시지 출력</h5>
        <img src="" alt="" class="bo">
        <p>이제 파이썬 파일을 마음껏 수정해 원하는 시간에 원하는 작업을 실행하게 하면 된다.</p>
        <div class="tip">
          <h4>NOTE_ crontab 애스터리스크 각각의 의미</h4>
          <p>앞서 살펴본 crontab에서 '* * * * *' 형식의 다섯 개 애스터리스크를 볼 수 있었다. 이는 시간과 관련된 의미를 두는 것으로 각 애스터리스크가 의미하는 것은 다음과 같다.</p>
          <ul>
            <li>첫 번째: 요일을 의미한다. 0-6으로 표기하여 0이 월요일이다.</li>
            <li>두 번째: 월을 의미한다. 1-12로 표기한다.</li>
            <li>세 번째: 일을 의미한다. 1-31로 표기한다.</li>
            <li>네 번째: 시간을 의미한다. 0-23으로 표기한다.</li>
            <li>다섯 번째: 분을 의미한다. 0-59로 표기한다.</li>
          </ul>
          <p>참고로 앞에서 살펴본 '* * * * * /bin/bash &lt;absolute-path-to-script>/run.sh'는 해당 명령어를 1분에 한 번씩 실행하라는 명령어이다.</p>
        </div>
        <p>이번 장에서는 기본적인 슬랙 봇을 설치하는 방법과 파이썬으로 스크립트를 만들어서 슬랙 서버에 메시지를 보내는 방법을 살펴 봤다. 특히 셸 스크립트를 실행하는 방법은 앞으로 다양한 정기 작업을 만들어서 실행하는 기본 바탕이 될 것이다.</p>
        <p>슬랙 봇과 관련해서 더 많은 정보는 슬랙 홈페이지의 '<a href="https://api.slack.com/bot-users" target="_blank">Bot User</a>' 항목 등을 참고한다.</p>
      </article>
    </section>
  </div>