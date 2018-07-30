  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>이 장에서는 RabbitMQ를 사용해서 메시지 큐를 만들고 큐에 메시지를 넣고, 그 메시지를 가져가는 작업을 해보자. 이 장의 예제를 살펴보고 나면 다른 프로그래밍 언어러 만든 프로그램이나 다른 서버에 있는 프로그램과 데이터를 주고받는 코드는 손쉽게 만들 수 있을 것이다. 그리고 애플리케이션 사이에 메시지 큐를 넣어서 느슨한 구조를 만들면 스케일링 작업 또한 쉬워질 것이다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">13.1. 메시지 큐</h3>
  <div class="chapter">
    <section>
      <article>
        <p>메시지 큐는 서로 다른 프로그램 사이에 공유할 수 있는 무제한 크기의 버퍼이다. 이 큐를 이용해서 데이터를 만들고, 큐에 쌓아두고, 큐에서 데이터를 빼내어 순서대로 처리하거나, 라운드 로빈 방식으로 분배해서 처리하고나, 규칙에 따라 여러 작업을 할 수 있다.</p>
        <p>위키백과의 <a href="https://ko.wikipedia.org/wiki/메시지_큐" target="_blank">메시지 큐</a> 항목에서는 메시지 큐의 개념을 다음 그림으로 설명한다.</p>
        <h5>그림13-1 메시지 큐의 개념</h5>
        <img src="/img/UIStructure.gif" alt="메시지 큐의 개념">
        <p>즉, 메시지 큐는 사용자가 입력한 메시지를 보낼 때의 중간 자료구조임을 알 수 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">13.2. RabbitMQ 소개</h3>
  <div class="chapter">
    <section>
      <article>
        <p><a href="https://www.rabbitmq.com/" target="_blank">RabbitMQ</a>는 사용하기 간단하고, 대부분 운영체제에서 실행되며, 메시지 큐의 표준 중 하나인 '<a href="https://amqp.org" target="_blank">AMQP</a>'를 준수하는 오픈소스 메시지 브로커이다. RabbitMQ 홈페이지에서는 거의 대부분 운영체제와 프로그래밍 언어의 조합을 지원한다고 소개하고 있다.</p>
        <h5>그림13-2 RabbitMQ 홈페이지</h5>
        <img src="/img/img32.png" class="bo" alt="RabbitMQ 홈페이지">
        <p>설치와 실행 등이 간단하므로 메시지 큐를 이해하고 사용하기 좋다. 게다가 메시지 큐 서버에서는 큐들을 관리할 수 있는 웹 GUI를 지원한다. 그럼 설치, 실행, 간단한 예제를 살펴본다.</p>
      </article>
    </section>

    <h4 class="sub-header">13.2.1 - RabbitMQ 설치와 메시지 큐 서버 실행하기</h4>
    <section>
      <article>
        <p><a href="https://www.rabbitmq.com/download.html" target="_blank">Downloading and Installing RabbitMQ</a> 에는 운영체제별 설치 방법을 소개한다. 윈도우의 경우는 'Installing on Windows' 를 클릭한 후 	rabbitmq-server-x.x.x.exe 파일을 다운로드 해 설치한다. 참고로 설치 전에는 <a href="http://www.erlang.org/downloads" target="_blank">Erlang 프로그래밍 개발 환경</a>을 설치해야 한다는 점에 주의해야 한다.</p>
        <p>우분투와 macOS는 다음 명령을 이용해 RabbitMQ를 설치한다.</p>
        <pre><code># 우분투<br>$ sudo apt install rabbitmq-server<br>
        <br># macOS<br>$ brew install rabbitmq</code></pre>
        <div class="tip">
          <h4>TIP</h4><p>정상적으로 설치되지 않는다면 우분투는 sudo apt update, macOS는 brew update를 실행한 후 설치한다.</p>
        </div>
        <p>실행방법 또한 운영체제별로 조금씩 다르다. 윈도우는 자동으로 서버가 실행된다. 우분투 역시 설치하는 과정에서 서버를 데몬으로 실행하게 되어 있다.</p>
        <p>하지만 macOS는 rabbitmq-server라는 스크립트를 수동으로 실행해 주어야 한다. /usr/lacal/sbin 디렉터리에 있는 rabbitmq-server를 실행시킨다 만약 어느 경로에서든 자동으로 실행시키려면 .bash_profile 혹은 .profile에 PATH=$PATH:/usr/lacal/sbin 이라는 경로를 저장해 놓는다.</p>
        <p>다음은 RabbitMQ 서버의 실행 예이다.</p>
        <pre><code><blockquote><ol><li>$&nbsp;rabbitmq-server</li><li>&nbsp;</li><li>##&nbsp;&nbsp;##</li><li>##&nbsp;&nbsp;##&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RabbitMQ&nbsp;3.7.7.&nbsp;Copyright&nbsp;<font color="#33cc33">(</font>C<font color="#33cc33">)</font>&nbsp;2007-2018&nbsp;Pivotal&nbsp;Software,&nbsp;Inc.</li><li>##########&nbsp;&nbsp;Licensed&nbsp;under&nbsp;the&nbsp;MPL.&nbsp;&nbsp;See&nbsp;http://www.rabbitmq.com/</li><li>######&nbsp;&nbsp;##</li><li>##########&nbsp;&nbsp;Logs:&nbsp;/usr/local/var/log/rabbitmq/rabbit<font color="#33cc33">@</font>localhost.log</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/usr/local/var/log/rabbitmq/rabbit<font color="#33cc33">@</font>localhost_upgrade.log</li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Starting&nbsp;broker...</li><li>completed&nbsp;with&nbsp;6&nbsp;plugins.</li></ol></blockquote></code></pre>
        <p>이후 일어나는 모든 예제는 RabbitMQ 서버가 실행된 상태에서 하게 될 것이다. 2개의 터미널 창을 열어서 하나는 RabbitMQ 서버를 실행하고 하나는 파이썬 가상환경을 실행해서 작업하면 된다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">13.3. RabbitMQ의 기본 동작 개념</h3>
  <div class="chapter">
    <section>
      <article>
        <p>RabbitMQ 의 모든 메시지 큐 구조는 [그림13-3]의 변형이다.</p>
        <h5>그림13-3 RabbitMQ 메시지 큐의 구조</h5>
        <img src="/img/img33.png" alt="RabbitMQ 메시지 큐의 구조" class="bo">
        <p>퍼블리셔(publisher, 상황에 따라 sender 라고 표현하기도 한다.)가 메시지를 생성하면, 메시지 큐 서버 안에 익스체인지(exchange)로 전달되어 규칙에 따라 익스체인지를 큐에 넣는다. 컨슈머(cunsumer, 상황에 따라 receiver 혹은 worker 라고 표현하기도 한다.)는 큐에서 메시지를 꺼내 와서 처리한다. 익스체인지와 큐의 관계 큐와 컨슈머의 관계에 따라 여러 변형이 나타나게 된다.</p>
        <p>대표적인 메시지 큐 유형으로는 RabbitMQ 홈페이지에서 제시하는 여섯 가지가 있다.</p>
        <ul>
          <li>전달</li>
          <li>작업 분배 및 확인</li>
          <li>브로드캐스팅</li>
          <li>선택적 분배</li>
          <li>패턴에 따른 분배</li>
          <li>RPC</li>
        </ul>
        <p>우리는 여기서 두 가지 메시지 큐를 만들어 볼 것이다. 첫 번째로는 제일 단순한 메시지 전달, 두 번째로는 작업을 라운드 로빈 방식으로 메시지 큐에서 분배하는 것이다. 첫 번째 예제에서는 퍼블리셔와 큐, 컨슈머가 하나뿐이지만 두 번째 예제에서는 컨슈머의 개수가 둘 이상이 될 것이다.</p>
        <div class="tip">
          <h4>TIP</h4>
          <p>메시지 큐의 전반적인 개념은 RabbitMQ 홈페이지의 '<a href="https://www.rabbitmq.com/tutorials/amqp-concepts.html" target="_blank">AMQP 0-9-1 Model Explained</a>' 에서 상세하게 설명하고 있으니 이를 참고한다.</p>
        </div>
      </article>
    </section>

    <h4 class="sub-header">13.3.1 - pika 패키지 설치</h4>
    <section>
      <article>
        <p>RabbitMQ를 파이썬으로 다룰 때는 pika라는 패키지를 사용한다. 참고로 RabbitMQ 홈페이지에서도 이 패키지를 사용하니 사용성과 안정성은 걱정할 필요가 없다. 파이썬 패키지이므로 다음 명령으로 간단하게 설치한다.</p>
        <pre><code>$ pip install pika</code></pre>
      </article>
    </section>

    <h4 class="sub-header">13.3.2 - 메시지 전달: 큐에 넣고 가져오기</h4>
    <section>
      <article>
        <p>이제 첫 번째 예제인 메시지 전달부터 살펴본다. 구조는 다음과 같다.</p>
        <h5>그림13-4 메시지 전달 예제의 구조</h5>
        <img src="/img/img34.png" alt="메시지 전달 예제의 구조" class="bo">
        <p>이 예제는 퍼블러셔 하나, 큐 하나, 컨슈머 하나가 존재하며 발행자가 생성한 메시지가 큘ㄹ 거쳐 컨슈머에게 전달된다.</p>
        <p>그럼 RabbitMQ가 어떻게 메시지를 큐에 넣거나 가져오는지를 이해하는 데 초점을 맞춰 살펴보자. 단순한 상황이기 때문에 퍼블리셔와 컨슈머 관련 코드를 다 합쳐도 50행이 되지 않는다.</p>
        <p>&nbsp;</p>
        <h4>메시지 센더 구현하기</h4>
        <p>그럼 메시지를 생성하고 큐로 보내는 퍼블리셔(센더)부터 살펴보자. 메시지를 보내는 과정은 다음처럼 나눠볼 수 있다.</p>
        <ul>
          <li>메시지 브로커 서버에 연결하기</li>
          <li>연결 안에 채널 만들기</li>
          <li>채널 안에 큐 선언하기</li>
          <li>메시지 보내기(이 때 여러 가지 파라미터 등을 설정할 수 있다)</li>
          <li>연결 끊기</li>
        </ul>
        <p>[코드13-1]에서 <code>sender.py</code>라는 파일을 만들어 구현한다.</p>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;pika를&nbsp;불러옵니다.</font></li><li><font color="#ff7700">import</font>&nbsp;pika</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;서버와&nbsp;연결합니다.</font></li><li>connection&nbsp;<font color="#66cc66">=</font>&nbsp;pika.<font>BlockingConnection</font><font>&#40;</font>pika.<font>ConnectionParameters</font><font>&#40;</font>host<font color="#66cc66">=</font><font color="#483d8b">'localhost'</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;연결&nbsp;안에서&nbsp;채널을&nbsp;만듭니다.</font></li><li>channel&nbsp;<font color="#66cc66">=</font>&nbsp;connection.<font>channel</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;채널&nbsp;안에서&nbsp;큐를&nbsp;선언합니다.&nbsp;새&nbsp;큐를&nbsp;먄든다고&nbsp;할&nbsp;수&nbsp;있습니다.</font></li><li>channel.<font>queue_declare</font><font>&#40;</font>queue<font color="#66cc66">=</font><font color="#483d8b">'hello'</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;메시지를&nbsp;보냅니다.&nbsp;여기서는&nbsp;exchange와&nbsp;routing_key를&nbsp;다루지&nbsp;않습니다.</font></li><li>channel.<font>basic_publish</font><font>&#40;</font>exchange<font color="#66cc66">=</font><font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;routing_key<font color="#66cc66">=</font><font color="#483d8b">'hello'</font><font color="#66cc66">,</font>&nbsp;body<font color="#66cc66">=</font><font color="#483d8b">'Hello&nbsp;Miku!!!'</font><font>&#41;</font></li><li><font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;#&nbsp;메시지를&nbsp;보냈습니다!&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;서버와&nbsp;연결을&nbsp;끊습니다.</font></li><li>connection.<font>close</font><font>&#40;</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>이 스크립트는 메시지 하나를 큐에 넣기만 하고 종료한다. 여러번 실행하면 할수록 큐에는 메시지가 쌓이기만 할 것이다. 이제 파일을 실행하면 큐에 메시지를 넣고, 지정된 문구를 출력하고 종료된다.</p>
        <pre><code>$ python sender.py<br># 메시지를 보냈습니다!</code></pre>
        <p>실제 서비스를 구현할 때는 특정 상황에 <code>basic_publish()</code>가 실행되면서 꾸준히 큐에 메시지를 쌓을 것이다. 이때 쌓이는 메시지는 JSON 문자열이 될 수도 있고 평범한 문자열이 될 수도 있다.</p>
        <p>&nbsp;</p>
        <h4>메시지 리시버 구현하기</h4>
        <p>메시지 리시버의 기본 구조는 메시지 센더와 비슷하다. [코드13-2]에서 <code>receiver,.py</code>라는 파일을 만들어 구현한다.</p>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;pika&nbsp;를&nbsp;불러옵니다.</font></li><li><font color="#ff7700">import</font>&nbsp;pika</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;서버와&nbsp;연결합니다.</font></li><li>connection&nbsp;<font color="#66cc66">=</font>&nbsp;pika.<font>BlockingConnection</font><font>&#40;</font>pika.<font>ConnectionParameters</font><font>&#40;</font>host<font color="#66cc66">=</font><font color="#483d8b">'localhost'</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;연결&nbsp;안에서&nbsp;채널을&nbsp;만듭니다.</font></li><li>channel&nbsp;<font color="#66cc66">=</font>&nbsp;connection.<font>channel</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;채널&nbsp;안에서&nbsp;큐를&nbsp;선언합니다.&nbsp;새&nbsp;큐를&nbsp;만든다고&nbsp;볼&nbsp;수&nbsp;있습니다.</font></li><li><font color="#808080">#&nbsp;이미&nbsp;센더쪽에서&nbsp;큐를&nbsp;만들었지만&nbsp;확실히&nbsp;하기&nbsp;위해서&nbsp;여기서&nbsp;한&nbsp;번&nbsp;더&nbsp;만들어&nbsp;줍니다.</font></li><li>channel.<font>queue_declare</font><font>&#40;</font>queue<font color="#66cc66">=</font><font color="#483d8b">'hello'</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;큐에서&nbsp;가져온&nbsp;메시지를&nbsp;처리할&nbsp;콜백&nbsp;함수를&nbsp;만듭니다.</font></li><li><font color="#808080">#&nbsp;이&nbsp;함수는&nbsp;단순히&nbsp;body를&nbsp;가져와서&nbsp;출력합니다.</font></li><li><font color="#ff7700">def</font>&nbsp;callback<font>&#40;</font>ch<font color="#66cc66">,</font>&nbsp;method<font color="#66cc66">,</font>&nbsp;properties<font color="#66cc66">,</font>&nbsp;body<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;&nbsp;#&nbsp;메시지를&nbsp;받았습니다:&nbsp;%r&quot;</font>&nbsp;%&nbsp;body<font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;메시지를&nbsp;보낼&nbsp;때&nbsp;어떻게&nbsp;할&nbsp;것인지&nbsp;설정합니다.</font></li><li><font color="#808080">#&nbsp;함수,&nbsp;큐,&nbsp;응답&nbsp;여부(no_ack)를&nbsp;지정합니다.</font></li><li>channel.<font>basic_consume</font><font>&#40;</font>callback<font color="#66cc66">,</font>&nbsp;queue<font color="#66cc66">=</font><font color="#483d8b">'hello'</font><font color="#66cc66">,</font>&nbsp;no_ack<font color="#66cc66">=</font><font color="#008000">True</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'#&nbsp;메시지를&nbsp;기다리고&nbsp;있습니다.&nbsp;종료하려면&nbsp;CTRL+C를&nbsp;누르세요.'</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;메시지&nbsp;보내기를&nbsp;시작합니다.&nbsp;명시적으로&nbsp;종료하기&nbsp;전까지&nbsp;계속&nbsp;실행되면서</font></li><li><font color="#808080">#&nbsp;큐에&nbsp;메시지가&nbsp;들어올&nbsp;때마다&nbsp;callback&nbsp;이&nbsp;메시지를&nbsp;처리합니다.</font></li><li>channel.<font>start_consuming</font><font>&#40;</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>터미널을 열어서 <code>python receiver.py</code>를 실행할 때마다 메시지를 받았다는 출력 메시지를 볼 수 있다.</p>
        <pre><code>$ python receiver.py<br>
# 메시지를 기다리고 있습니다. 종료하려면 CTRL+C를 누르세요.<br>
 # 메시지를 받았습니다: b'Hello Miku!!!'<br>
 # 메시지를 받았습니다: b'Hello Miku!!!'<br>
 # 메시지를 받았습니다: b'Hello Miku!!!'</code></pre>
        <p>여기서 센더를 살짝 변경해보자 [코드13-1]에서 메시지를 보내는 부분만 다음과 같이 변경한다.</p>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;메시지를&nbsp;보냅니다.&nbsp;여기서는&nbsp;exchange와&nbsp;routing_key를&nbsp;다루지&nbsp;않습니다.</font></li><li><font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#008000">range</font><font>&#40;</font><font color="#ff4500">10000</font><font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;10,000개의&nbsp;메시지를&nbsp;큐에&nbsp;쌓습니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;channel.<font>basic_publish</font><font>&#40;</font>exchange<font color="#66cc66">=</font><font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;routing_key<font color="#66cc66">=</font><font color="#483d8b">'hello'</font><font color="#66cc66">,</font>&nbsp;body<font color="#66cc66">=</font><font color="#008000">str</font><font>&#40;</font>i<font>&#41;</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;#&nbsp;메시지를&nbsp;보냈습니다!&quot;</font>&nbsp;+&nbsp;<font color="#008000">str</font><font>&#40;</font>i<font>&#41;</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>변경된 센더와 리시버 3개를 실행하면 [그림13-5]와 같은 화면을 볼 수 있다.</p>
        <h5>그림13-5 3개의 수신기에서 메시지 받기</h5>
        <img src="/img/img35.png" alt="3개의 수신기에서 메시지 받기">
        <p>왼쪽 위가 센더, 나머지 3개가 리시버이다. 이걸로 분산 작업만이라면 비슷하게 해볼 수 있다.</p>
        <p>하지만 이 센더와 리시버 구조에는 문제가 있다. 지금은 단순히 메시지를 전달 받아서 출력하는 것 뿐이고, 리시버를 여러 개 실행해 늘리는 것으로 병렬 처리했다. 하지만 메시지를 리시버에 전달하고 나면 큐에서는 사라진다. 또한 메시지 하나를 처리하는데 1초, 아니 5초 이상 걸릴 때도 있을 것이고 처리를 다 했다면 다 했다고 큐에 전달해 줘야 한다. 실제로 [코드13-2]의 no_ack 파라미터는 리시버가 작업을 처리했다는 걸 확인하지 않아도 큐에서 삭제한다고 설정했다.</p>
        <p>그럼 다음 예제에서 방금 말한 문제점을 해결해 보자.</p>
      </article>
    </section>

    <h4 class="sub-header">13.3.3 - 작업 분배: 큐에 넣고 여러 개의 워커가 가져가고 작업 종료 확인하기</h4>
    <section>
      <article>
        <p>먼저 작업 분배의 구조를 살펴보자.</p>
        <h5>그림 12-6 작업 분배 구조</h5>
        <img src="/img/img36.png" alt="작업 분배 구조" class="bo">
        <p>퍼블리셔가 생성한 메시지를 메시지 큐에서 컨슈머1과 컨슈머2에 나눠 전달한다.</p>
        <p>이 예제에서는 퍼블리셔 하나와 컨슈머 여러개가 존재한다. 물론 앞 예제에서도 퍼블리셔나 컨슈머가 큐에 분기만 하면 스케일러블하게 규모를 조절할 수 있었다. 하지만 여기서 중요하게 볼 것은 규모가 아니다. 중요한 건 컨슈머가 작업한 후 해당 작업이 정상저으로 완료되었는지 확인하는 것과 퍼블리셔, 메시지 큐, 컨슈머 중 어느 하나에 문제가 생겼을 때 해당 데이터를 어떻게 보존시킬지 이다. 이를 알아보자</p><p>&nbsp;</p>

        <h4>메시지 센더 구현하기</h4>
        <p>앞에서와 같이 센더와 리시버 파이썬 코드를 볼 것이다. 기본 구조는 [코드13-1], [코드13-2]와 비슷하지만 실제 서비스 구축 시에 요긴한 옵션을 추가했다.</p>
        <p>메시지를 생성할 때는 <code>new_task.py</code>라는 파일을 만들어 구현했다.</p>
        <h5>코드 13-3 메시지 센더</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#ff7700">import</font>&nbsp;pika</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;무작위&nbsp;수를&nbsp;생성하는&nbsp;random&nbsp;모듈을&nbsp;불러옵니다.</font></li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">random</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;서버와&nbsp;연결합니다.</font></li><li>connection&nbsp;<font color="#66cc66">=</font>&nbsp;pika.<font>BlockingConnection</font><font>&#40;</font>pika.<font>ConnectionParameters</font><font>&#40;</font>host<font color="#66cc66">=</font><font color="#483d8b">'localhost'</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;연결&nbsp;안에서&nbsp;채널을&nbsp;만듭니다.</font></li><li>channel&nbsp;<font color="#66cc66">=</font>&nbsp;connection.<font>channel</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;채널&nbsp;안에서&nbsp;큐를&nbsp;선언합니다.&nbsp;새&nbsp;큐를&nbsp;만든다고&nbsp;볼&nbsp;수&nbsp;있습니다.</font></li><li><font color="#808080">#&nbsp;[코드13-1]과&nbsp;차이점은&nbsp;durable&nbsp;옵션으로</font></li><li><font color="#808080">#&nbsp;서버&nbsp;실행이&nbsp;중단되었다가&nbsp;다시&nbsp;실행될&nbsp;때도&nbsp;상태를&nbsp;유지시킵니다.</font></li><li>channel.<font>queue_declare</font><font>&#40;</font>queue<font color="#66cc66">=</font><font color="#483d8b">'task_queue'</font><font color="#66cc66">,</font>&nbsp;durable<font color="#66cc66">=</font><font color="#008000">True</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;큐에&nbsp;썋아&nbsp;둘&nbsp;메시지&nbsp;리스트를&nbsp;만듭니다.</font></li><li><font color="#808080">#&nbsp;총&nbsp;100개의&nbsp;메시지를&nbsp;만들며&nbsp;메시지&nbsp;간격은&nbsp;1~10&nbsp;사이의&nbsp;정수입니다.</font></li><li><font color="#808080">#&nbsp;메시지&nbsp;숫자가&nbsp;곧&nbsp;작업에&nbsp;걸리는&nbsp;시간이라고&nbsp;생각해봅시다.</font></li><li><font color="#808080">#&nbsp;여기서&nbsp;메시지의&nbsp;형태는&nbsp;&quot;N:M&quot;입니다.</font></li><li><font color="#808080">#&nbsp;N번째로&nbsp;생성되었고,&nbsp;0.M초가&nbsp;걸리는&nbsp;작업이란&nbsp;이야기입니다.</font></li><li>msgs&nbsp;<font color="#66cc66">=</font>&nbsp;<font>&#91;</font><font color="#008000">str</font><font>&#40;</font>i<font>&#41;</font>&nbsp;+&nbsp;<font color="#483d8b">&quot;:&quot;</font>&nbsp;+&nbsp;<font color="#008000">str</font><font>&#40;</font><font color="#dc143c">random</font>.<font>randrange</font><font>&#40;</font><font color="#ff4500">1</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">11</font><font>&#41;</font><font>&#41;</font>&nbsp;<font color="#ff7700">for</font>&nbsp;i&nbsp;<font color="#ff7700">in</font>&nbsp;<font color="#008000">range</font><font>&#40;</font><font color="#ff4500">100</font><font>&#41;</font><font>&#93;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;메시지를&nbsp;한&nbsp;번에&nbsp;여러&nbsp;개&nbsp;보낼&nbsp;거니까&nbsp;적당히&nbsp;함수&nbsp;하나로&nbsp;깔끔하게&nbsp;묶어&nbsp;줍니다.</font></li><li><font color="#ff7700">def</font>&nbsp;send_msg<font>&#40;</font>msg<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;channel.<font>basic_publish</font><font>&#40;</font>exchange<font color="#66cc66">=</font><font color="#483d8b">''</font><font color="#66cc66">,</font>&nbsp;routing_key<font color="#66cc66">=</font><font color="#483d8b">'task_queue'</font><font color="#66cc66">,</font>&nbsp;body<font color="#66cc66">=</font><font color="#008000">str</font><font>&#40;</font>msg<font>&#41;</font><font color="#66cc66">,</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;아까의&nbsp;예제와&nbsp;다른&nbsp;부분입니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;properties<font color="#66cc66">=</font>pika.<font>BasicProperties</font><font>&#40;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;이&nbsp;프로퍼티를&nbsp;적용함으로써&nbsp;메시지를&nbsp;디스크에&nbsp;저장해&nbsp;사라지지&nbsp;않게&nbsp;합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;즉,&nbsp;서버가&nbsp;다시&nbsp;시작되어도&nbsp;메시지는&nbsp;살아남습니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;delivery_mode&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#ff4500">2</font>&nbsp;<font color="#66cc66">,</font>&nbsp;<font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;메시지들을&nbsp;큐에다&nbsp;쌓아줍니다.</font></li><li><font color="#ff7700">for</font>&nbsp;msg&nbsp;<font color="#ff7700">in</font>&nbsp;msgs:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;send_msg<font>&#40;</font>msg<font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;&nbsp;#&nbsp;메시지를&nbsp;보냈습니다:&nbsp;%r&quot;</font>&nbsp;%&nbsp;msg<font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;메시지를&nbsp;다&nbsp;보낸&nbsp;후&nbsp;닫아줍니다.</font></li><li>connection.<font>close</font><font>&#40;</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>코드에 대한 내용은 주석을 참고한다. 해당 파일을 실행하면 다음과 같은 결과를 볼 수 있다.</p>
        <pre><code>$ python new_task.py<br>
 # 메시지를 보냈습니다: '0:4'<br>
 # 메시지를 보냈습니다: '1:1'<br>
 # 메시지를 보냈습니다: '2:9'<br>
 # 메시지를 보냈습니다: '3:9'<br>
 # 메시지를 보냈습니다: '4:3'<br>
 # 메시지를 보냈습니다: '5:5'<br>
 <br>
 -- snip --<br>
 <br>
 # 메시지를 보냈습니다: '94:4'<br>
 # 메시지를 보냈습니다: '95:7'<br>
 # 메시지를 보냈습니다: '96:8'<br>
 # 메시지를 보냈습니다: '97:4'<br>
 # 메시지를 보냈습니다: '98:7'<br>
 # 메시지를 보냈습니다: '99:5'</code></pre>
        <p>총 100회의 작업을 실행했고, 각 작업의 실행 시간을 표시한다.</p><p>&nbsp;</p>

        <h4>메시지 리시버 구현하기</h4>
        <p>메시지를 받을 때는 <code>worker.py</code>라는 파일을 만들어 구현했다.</p>
        <h5>코드 13-4 메시지 리시버</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#ff7700">import</font>&nbsp;pika</li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">time</font></li><li><font color="#ff7700">import</font>&nbsp;<font color="#dc143c">datetime</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;서버와&nbsp;연결합니다.</font></li><li>connection&nbsp;<font color="#66cc66">=</font>&nbsp;pika.<font>BlockingConnection</font><font>&#40;</font>pika.<font>ConnectionParameters</font><font>&#40;</font>host<font color="#66cc66">=</font><font color="#483d8b">'localhost'</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;연결&nbsp;안에서&nbsp;채널을&nbsp;만듭니다.</font></li><li>channel&nbsp;<font color="#66cc66">=</font>&nbsp;connection.<font>channel</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;[코드13-2]와&nbsp;차이점은&nbsp;durable&nbsp;옵션으로</font></li><li><font color="#808080">#&nbsp;메시지&nbsp;큐&nbsp;서버&nbsp;실행이&nbsp;중단되었다가&nbsp;다시&nbsp;실행될&nbsp;때도&nbsp;상태를&nbsp;유지시킵니다.</font></li><li>channel.<font>queue_declare</font><font>&#40;</font>queue<font color="#66cc66">=</font><font color="#483d8b">'task_queue'</font><font color="#66cc66">,</font>&nbsp;durable<font color="#66cc66">=</font><font color="#008000">True</font><font>&#41;</font></li><li><font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">'&nbsp;#&nbsp;메시지를&nbsp;기다리고&nbsp;있습니다.&nbsp;종료하려면&nbsp;CTRL+C를&nbsp;누르세요.'</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;메시지를&nbsp;처리할&nbsp;콜백&nbsp;함수를&nbsp;지정합니다.</font></li><li><font color="#ff7700">def</font>&nbsp;callback<font>&#40;</font>ch<font color="#66cc66">,</font>&nbsp;method<font color="#66cc66">,</font>&nbsp;properties<font color="#66cc66">,</font>&nbsp;body<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;전달받는&nbsp;메시지는&nbsp;바이트&nbsp;문자열입니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;따라서&nbsp;UTF-8로&nbsp;인코딩해서&nbsp;msg에&nbsp;저장합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;msg&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">str</font><font>&#40;</font>body<font color="#66cc66">,</font>&nbsp;<font color="#483d8b">&quot;utf8&quot;</font><font>&#41;</font>.<font>split</font><font>&#40;</font><font color="#483d8b">&quot;:&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;몇&nbsp;번째로&nbsp;생성된&nbsp;메시지인지&nbsp;표시합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;&nbsp;#&nbsp;[%s]&nbsp;%s&nbsp;메시지를&nbsp;받았습니다.<font color="#000099">\n</font>&nbsp;%r&quot;</font>&nbsp;%&nbsp;<font>&#40;</font><font color="#dc143c">datetime</font>.<font color="#dc143c">datetime</font>.<font>now</font><font>&#40;</font><font>&#41;</font><font color="#66cc66">,</font>&nbsp;msg<font>&#91;</font><font color="#ff4500">0</font><font>&#93;</font><font color="#66cc66">,</font>&nbsp;body<font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;받은&nbsp;숫자대로&nbsp;잠깐&nbsp;멈춥니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;여기서는&nbsp;받은&nbsp;숫자를&nbsp;10으로&nbsp;나눠서&nbsp;최대&nbsp;1초만&nbsp;걸리게&nbsp;했습니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#dc143c">time</font>.<font>sleep</font><font>&#40;</font><font color="#008000">int</font><font>&#40;</font><font color="#008000">str</font><font>&#40;</font>msg<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font><font>&#41;</font><font>&#41;</font>/<font color="#ff4500">10</font><font>&#41;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;&nbsp;#&nbsp;[%s]&nbsp;완료했습니다.&quot;</font>%&nbsp;<font color="#dc143c">datetime</font>.<font color="#dc143c">datetime</font>.<font>now</font><font>&#40;</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;메시지&nbsp;큐&nbsp;서버에&nbsp;완료했다는&nbsp;응답을&nbsp;보냅니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;이&nbsp;응답이&nbsp;가야&nbsp;새로운&nbsp;큐가&nbsp;새로운&nbsp;메시지를&nbsp;보내줍니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;ch.<font>basic_ack</font><font>&#40;</font>delivery_tag&nbsp;<font color="#66cc66">=</font>&nbsp;method.<font>delivery_tag</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;컨슈머는&nbsp;메시지를&nbsp;미리&nbsp;가져오는데,&nbsp;얼마나&nbsp;가져오게&nbsp;할지&nbsp;결정합니다.</font></li><li><font color="#808080">#&nbsp;만약&nbsp;이&nbsp;설정이&nbsp;없다면&nbsp;컨슈머가&nbsp;큐에&nbsp;메시지를&nbsp;요청할&nbsp;때&nbsp;무제한으로&nbsp;가져옵니다.</font></li><li><font color="#808080">#&nbsp;또한&nbsp;중간에&nbsp;새로운&nbsp;컨슈머를&nbsp;실행하면&nbsp;기존에&nbsp;큐에&nbsp;들어가&nbsp;있던&nbsp;메시지를&nbsp;분배하지&nbsp;않습니다.</font></li><li>channel.<font>basic_qos</font><font>&#40;</font>prefetch_count<font color="#66cc66">=</font><font color="#ff4500">1</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;이&nbsp;클라이언트가&nbsp;수립한&nbsp;채널이&nbsp;어떤&nbsp;큐에서&nbsp;어떤&nbsp;함수로&nbsp;메시지를&nbsp;보낼지&nbsp;설정합니다.</font></li><li>channel.<font>basic_consume</font><font>&#40;</font>callback<font color="#66cc66">,</font>&nbsp;queue<font color="#66cc66">=</font><font color="#483d8b">'task_queue'</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;메시지&nbsp;처리를&nbsp;시작합니다.</font></li><li>channel.<font>start_consuming</font><font>&#40;</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>역시 자세한 코드 설명은 주석을 참고한다.</p>
        <div class="tip">
          <h4>TIP</h4>
          <p>[코드 12-3]과 [코드 13-4]에서 다루는 옵션을 더 자세히 알고 싶다면 '<a href="https://www.rabbitmq.com/amqp-0-9-1-reference.html" target="_blank">AMQP 0-9-1 Complete Reference Guide</a>'와 '<a href="https://www.rabbitmq.com/persistence-conf.html" target="_blank">Persistence Configuration</a>'을 참고한다.</p>
        </div>
        <p>다시 3개의 터미널 화면을 연 다음 <code>worker.py</code>를 실행해 작업을 분배하는 상태를 [그림 13-7]에 나타냈다.</p>
        <h5>그림 13-7 작업을 분배하는 메시지 큐</h5>
        <img src="/img/img37.png" alt="작업을 분배하는 메시지 큐">
        <p>중간에 서버나 클라이언트가 중단되었다 다시 실행되어도 처리하지 않은 메시지가 사라지지 않는다. 또한 새로운 컨슈머가 중간에 끼어들어도 미리 가져오는 메시지 개수가 1개로 제한되어 있으므로 새 컨슈머도 메시지를 처리할 수 있다.</p>
        <p>지금까지 다뤘던 예제의 구조는 다음과 같다.</p>
        <ul>
          <li>퍼블리셔 - 큐(익스체인지 + 큐) - 컨슈머</li>
          <li>퍼블리셔 - 큐(익스체인지 + 큐) - 라운도 로빈 방식으로 메시지를 분배 받는 다수의 컨슈머</li>
        </ul>
        <p>즉, 여지껏 큐라고 불러왔던 것은 익스체인지와 큐가 함께 붙어있던 것이었다. 익스체인지는 말 그대로 교환소이다. 퍼블리셔에게서 메시지를 받아서, 익스체인지의 규칙에 따라 다른 큐로 메시지를 보낸다. 따라서 컨슈머는 큐에 바로 붙는게 아니라, 익스체인지에 큐를 묶어서 메시지를 받아 와야 하는 것이다. 이 과정을 이해했으면 그 다음 예제들은 이해하기가 편할 것이다.</p>
        <p>RabbitMQ 홈페이지는 여기서 더 나아가서, 다음 구조를 따라 해볼 수 있게 제시한다.</p>
        <ul>
          <li><a href="https://www.rabbitmq.com/tutorials/tutorial-three-python.html" target="_blank">퍼블리셔 - 익스체인지 - 복수 큐에 브로드캐스팅 - 동일한 내용을 받는 복수의 컨슈머</a></li>
          <li><a href="https://www.rabbitmq.com/tutorials/tutorial-four-python.html" target="_blank">퍼블리셔 - 익스체인지 - 큐 이름에 따른 라우팅 - 구독하는 큐에 따라서 다른 내용을 처리하는 각각의 컨슈머</a></li>
          <li><a href="https://www.rabbitmq.com/tutorials/tutorial-five-python.html" target="_blank">퍼블리셔 - 익스체인지 - 큐 패턴에 따른 라우팅 - 구독하는 큐 패턴에 따라서 다른 내용을 처리하는 각각의 컨슈머</a></li>
        </ul>
      </article>
    </section>
  </div>

  <h3 class="sub-header">13.4. 셀러리: 메시지 큐를 이용한 분산 처리 애플리케이션</h3>
  <div class="chapter">
    <section>
      <article>
        <p>앞서 살펴본 RabbitMQ 는 이것저것 설정해야 할게 많아 간편하게 사용하기는 어렵다. 보다 간편하게 비동기 퍼리를 분산사켜서 작업하기 위해 좀 더 추상화한 분산 처리 시스템이 만들어졌는데, 지금부터 소개할 <a href="http://www.celeryproject.org" target="_blank">셀러리(celery)</a>이다.</p>
        <p>셀러리를 사용하는 법은 간단하다. 셀러리 애플리케이션을 만들고, 태스크를 정의한 후 호출하면 된다. 이제부터 셀러리를 사용하는 방법을 살펴보자.</p>
        <div class="tip">
          <h4>TIP</h4>
          <p>셀러리 튜토리얼은 <a href="http://docs.celeryproject.org/en/latest/getting-started/first-steps-with-celery.html" target="_blank">http://docs.celeryproject.org/en/latest/getting-started/first-steps-with-celery.html</a> 에서 볼 수 있다.</p>
        </div>
      </article>
    </section>

    <h4 class="sub-header">13.4.1 - 설치</h4>
    <section>
      <article>
        <p>언제나 그렇듯 잘 알려진 패키지는 pip를 이용해서 설치할 수 있다.</p>
        <pre><code>$ pip install celery</code></pre>
      </article>
    </section>

    <h4 class="sub-header">13.4.2 - 셀러리의 동작 구조</h4>
    <section>
      <article>
        <p>셀러리는 기본적으로 워커 서버, 태스크 퍼블리셔, 메시지 브로커로 구성된다.(메시지브로커는 앞서 소개한 RabbitMQ 가 대표적이다) 그리고 기본적으로 비활성화 되어 있지만 태스크 실행 결과를 저장하는 결과 백엔드(Result Backend)가 있다.</p>
        <p>이 관계를 그림으로 나타내면 다음과 같다.</p>
        <h5>그림 13-8 셀러리의 동작 구조</h5>
        <img src="/img/img38.png" alt="셀러리의 동작 구조">
      </article>
    </section>

    <h4 class="sub-header">13.4.3 - 워커 서버</h4>
    <section>
      <article>
        <p>워커 서버는 태스크 코드를 이용해 실제로 태스크를 실행하는 서버이다. 한 번에 여러대를 동시에 실행할 수 있으며, 하나 이상의 태스크 큐에서 태스크를 가져와서 실행할 수 있다.</p>
        <p>워커 서버는 태스크 코드로 실행된다. 태스크 퍼블리셔는 태스크 코드를 사용자 애플리케이션이 불러(import task)와 실행한다.</p><p>&nbsp;</p>
        <h4>메시지 브로커 선택</h4>
        <p>앞서 RabbitMQ 를 설치했다면 특별히 메시지 브로커를 선택하거나 설치할 필요가 없다. 물론 다른 애플리케이션을 메시지 브로커로 사용할 수 있지만, 이 장에서는 셀러리의 메시지 브로커로 RabbitMQ 를 선택했다고 가정한다.</p>
        <div class="tip">
          <h4>TIP</h4>
          <p>메시지 브로커로 사용할 수 있는 애플리케이션 목록은 셀러리 개발 문서의 '<a href="http://docs.celeryproject.org/en/latest/getting-started/brokers/index.html#broker-overview" target="_blank">Broker Overview</a>' 에서 확인할 수 있다.</p>
        </div><p>&nbsp;</p>
        <h4>태스크 코드 작성</h4>
        <p>셀러리의 워커 서버에서 실행하는 태스크 코드는 <code>tasks.py</code>라고 이름 짓는 것이 관습이다. 간단한 예제이므로 모든 코드를 모듈 하나에 넣어서 작성해볼 것이다.</p>
        <div class="tip">
          <h4>TIP</h4>
          <p>규모가 더 큰 태스크 코드를 구성하는 방법은 셀러리 개발문서의 '<a href="http://docs.celeryproject.org/en/latest/getting-started/next-steps.html#project-layout" target="_blank">Out Project</a>'를 참고한다.</p>
        </div>
        <h5>코드 13-5 태스크 코드</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;셀러리를&nbsp;불러옵니다.</font></li><li><font color="#ff7700">from</font>&nbsp;celery&nbsp;<font color="#ff7700">import</font>&nbsp;Celery</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;셀러리&nbsp;앱&nbsp;인스턴스를&nbsp;만듭니다.</font></li><li>app&nbsp;<font color="#66cc66">=</font>&nbsp;Celery<font>&#40;</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;첫&nbsp;번째&nbsp;파라미터는&nbsp;현재&nbsp;모듈의&nbsp;이름입니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;이&nbsp;파라미터를&nbsp;전달하면&nbsp;현재&nbsp;모듈을&nbsp;단독으로&nbsp;실행할&nbsp;때도&nbsp;문제&nbsp;없도록&nbsp;합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#483d8b">'tasks'</font><font color="#66cc66">,</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;broker&nbsp;파리미터는&nbsp;메시지&nbsp;브로커의&nbsp;주소이다.&nbsp;프로토콜과&nbsp;접속&nbsp;정보를&nbsp;적습니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;여기서는&nbsp;rabbitmq를&nbsp;사용하므로,&nbsp;AMQP&nbsp;형식의&nbsp;주소를&nbsp;사용했습니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;broker&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">'pyamqp://guest@localhost//'</font><font color="#66cc66">,</font></li><li>&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;결과를&nbsp;저장할때&nbsp;backend를&nbsp;지정합니다.&nbsp;주로&nbsp;데이터베이스를&nbsp;지정합니다.</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;backend&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;db+sqlite:///db.sqlite&quot;</font></li><li><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;@app.task&nbsp;디코레이터를&nbsp;붙여&nbsp;이&nbsp;함수가&nbsp;태스크라는&nbsp;것을&nbsp;표시합니다.</font></li><li><font color="#66cc66">@</font>app.<font>task</font></li><li><font color="#ff7700">def</font>&nbsp;add<font>&#40;</font>x<font color="#66cc66">,</font>&nbsp;y<font>&#41;</font>:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">return</font>&nbsp;x&nbsp;+&nbsp;y</li></ol></blockquote></code></pre><p>&nbsp;</p>
        <h4>메시지 브로커 실행</h4>
        <p>메시지 브로커로 앞서 배웠던 RabbitMQ 를 사용할 것이므로 13.2.1을 참고해 RabbitMQ 서버를 실행시켜주면 된다. RabbitMQ 서버를 이용해 서버와 태스크 퍼블리셔가 통신할 것이다.</p><p>&nbsp;</p>
        <h4>태스크 코드로 워커 서버 실행</h4>
        <p>워커 서버를 실행할 준비가 끝났다. 셀러리는 데이터베이스와 통신할 때 '<a href="https://www.sqlalchemy.org" target="_blank">SQLAlchemy</a>'를 사용한다. 그래서 사전 작업 없이 데이터베이스를 결과 백엔드로 설정하면 바로 실행이 되지 않는다. 셀러리가 사용하는 SQLAlchemy는 직접 쿼리를 사용하지 않고 객체를 다루듯 데이터베이스를 사용할 수 있게 해주는 패키지이다.</p>
        <p>다음 명령을 터미널에서 실행해서 SQLAlchemy를 먼저 설치한다.</p>
        <pre><code>$ pip install sqlalchemy</code></pre>
        <p>그리고 터미널에서 태스크 코드가 있는 디렉터리로 이동한 후 다음 명령을 실행한다.</p>
        <pre><code>$ celery worker -A tasks --loglevel=info</code></pre>
        <p><code>worker</code> 는 워커 서버를 실행시키는 명령어로 <code>-A</code>옵션은 실행할 앱(모듈, 태스크 코드)을 지정합니다. 여기서 만든 것은 tasks 모듈이므로 <code>-A tasks</code>라고 설정했다. <code>--loglevel=info</code>는 화면에 로그를 그대로 출력하도록 설정한다.</p>
        <p>그럼 다음처럼 셀러리 워커가 실행된다. 참고로 macOS에서 실행한 결과이다.</p>
        <h5>그림 13-19 celery worker 실행 결과</h5>
        <img src="/img/img39.png" alt="celery worker 실행 결과">
      </article>
    </section>

    <h4 class="sub-header">13.4.4 - 태스크 퍼블리셔(사용자 앱)</h4>
    <section>
      <article>
        <p>이제 메시지 큐를 이용해 앞서 만든 태스크를 우리가 만든 애플리케이션에서 비동기로 호출하게 만들어보자. 이를 위해 <code>publisher.py</code>파일을 만들고 작업한다.</p>
        <p>&nbsp;</p>
        <h4>애플리케이션에서 태스크 실행 요청하기</h4>
        <p>태스크 실행을 요청하는 프로그램은 생각보다 간단하다.</p>
        <h5>코드 13-6 태스크 실행 요청</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;앞서&nbsp;만든&nbsp;태스크&nbsp;코드를&nbsp;불러온다.</font></li><li><font color="#ff7700">import</font>&nbsp;tasks</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;태스크&nbsp;코드에서&nbsp;태스크로&nbsp;지정했던&nbsp;함수를&nbsp;바로&nbsp;호출하지&nbsp;않고&nbsp;delay를&nbsp;사용해서&nbsp;호출합니다.</font></li><li>tasks.<font>add</font>.<font>delay</font><font>&#40;</font><font color="#ff4500">2</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">2</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p><code>tasks.add.delay(2, 2)</code>를 호출하면 해당 요청이 메시지 브로커로 지정된 애플리케이션의 큐로 들어가며 메시지를 워커 서버가 가져가서 작업한다.</p>
        <div class="tip">
          <h4>TIP</h4>
          <p>여기서는 별도의 파일로 만들었지만 워커 서버가 실행 중이라면 태스크 퍼블리셔를 만드는 작업은 일반적인 파이썬 셸을 이용해서도 할 수 있다.</p>
        </div>
        <p><code>publisher.py</code>를 실행하면 워커 서버 터미널에서 다음과 같은 결과를 볼 수 있다.</p>
        <pre><code>
[2018-07-28 16:55:47,198: INFO/MainProcess] Received task: <br>
tasks.add[29df3e61-db6c-451f-8274-4c2049d80f49]<br>
[2018-07-28 16:55:47,271: INFO/ForkPoolWorker-2] <br>
Task tasks.add[29df3e61-db6c-451f-8274-4c2049d80f49]<br> 
succeeded in 0.06353171300020222s: 4
        </code></pre>
        <p><code>INFO/PoolWorker-2</code>라는 별도의 스레드가 생겼고 <code>29df3e61-db6c-451f-8274-4c2049d80f49</code>이라는 태스크를 추가해 실행에 성공했다. 이렇게 <code>MainProcess</code>와는 별개의 스레드가 생겨서 쉽게 비동기로 처리할 수 있다.</p><p>&nbsp;</p>

        <h4>태스크 실행 결과 가져오기</h4>
        <p>언제나 태스크 실행을 요청할 수만은 없다. 결과를 가젿 사용해야 할 필요가 있다. 그럴 때 사용하는 것이 '결과 백엔드(Result  Backend)'이다.</p>
        <p>기본적으로 셀러리에는 결과 백엔드가 비활성화 되어 있다. 하지만 [코드13-5]처럼 최초에 셀러리 인스턴스를 만들 때 backend 파라미터에 데이터베이스 주소를 전달하는 것으로 결과를 저장할 수 있다.</p>
        <h5>코드 13-7 태스크 실행 결과</h5>
        <pre class="python"><code><blockquote><ol><li><font color="#808080">#&nbsp;앞서&nbsp;만든&nbsp;태스크&nbsp;코드를&nbsp;불러온다.</font></li><li><font color="#ff7700">import</font>&nbsp;tasks</li><li>&nbsp;</li><li><font color="#808080">#&nbsp;태스크&nbsp;코드에서&nbsp;태스크로&nbsp;지정했던&nbsp;함수를&nbsp;바로&nbsp;호출하지&nbsp;않고&nbsp;delay를&nbsp;사용해서&nbsp;호출합니다.</font></li><li>result&nbsp;<font color="#66cc66">=</font>&nbsp;tasks.<font>add</font>.<font>delay</font><font>&#40;</font><font color="#ff4500">3</font><font color="#66cc66">,</font>&nbsp;<font color="#ff4500">9</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">print</font><font>&#40;</font><font color="#483d8b">&quot;Get&nbsp;result&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;result.get()으로&nbsp;결과를&nbsp;전달받습니다.</font></li><li><font color="#ff7700">print</font><font>&#40;</font>result.<font>get</font><font>&#40;</font><font>&#41;</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>코드를 수정한 후 실행하면 다음과 같이 출력할 것이다.</p>
        <pre><code>
$ python publisher.py<br>
Get result<br>
12
        </code></pre>
        <p>기대하는 결과를 가져왔다. 그리고 데이터베이스인 <code>db.sqlite</code> 의 <code>celery_taskmeta</code> 테이블을 살펴보면 다음과 같이 태스크의 작업 결과가 데이터베이스 테이블에 저장되어 있다.</p>
        <table class="table table-bordered table-hover table-sm">
          <tr>
            <th>id</th>
            <th>task_id</th>
            <th>status</th>
            <th>result</th>
            <th>date_done</th>
            <th>traceback</th>
          </tr>
          <tr>
            <td>1</td>
            <td>29df3e61-db6c-451f-8274-4c2049d80f49</td>
            <td>SUCCESS</td>
            <td>b'\x80\x04K\x04.'</td>
            <td>2018-07-28 07:55:47.267082</td>
            <td>None</td>
          </tr>
          <tr>
            <td>2</td>
            <td>1d485e25-639a-48f0-9015-ab78b464b112</td>
            <td>SUCCESS</td>
            <td>b'\x80\x04K\x0c.'</td>
            <td>2018-07-28 08:11:59.605306</td>
            <td>None</td>
          </tr>
        </table>
        <p>이제 task_id에 고유번호("29df3e61-db6c-451f-8274-4c2049d80f49")를 저장해두면, 바로 꺼내 쓰는 것이 아니더라도 이후에 언제든지 필요할 때 해당 태스크의 작업 결과를 결과백엔드에서 가져올 수 있다.</p>
        <h5>코드 13-8 태스크 작업 결과 가져오기</h5>
        <pre class="python"><code><blockquote><ol><li>task_id&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#483d8b">&quot;29df3e61-db6c-451f-8274-4c2049d80f49&quot;</font></li><li>&nbsp;</li><li><font color="#808080">#&nbsp;다른&nbsp;코드에서&nbsp;다음&nbsp;코드를&nbsp;이용해&nbsp;task_id를&nbsp;활용할&nbsp;수도&nbsp;있습니다.</font></li><li>tasks.<font>app</font>.<font>AsyncResult</font><font>&#40;</font>task_id<font>&#41;</font>.<font>get</font><font>&#40;</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>이렇게 비동기라는 점을 이용하여 작업을 시작하게 만든 애플리케이션과 작업의 결과를 가져다 사용하는 애플리케이션을 분리할 수 있다. 참고로 앞 예제에서는 편의상 한 코드에ㅔ 태스크 시작과 결과를 받아오는 부분이 같이 들어 있다.</p>
        <p>지금까지 메시지 큐를 이용하는 여러가지 애플리케이션을 살펴보았다. 파이썬을 이용하면 이렇게 메시지 큐를 생성하고 이용하는 다양한 애플리케이션을 만들어볼 수 있다.</p>

        <p>메시지 큐는 주로 서버 애플리케이션을 다루는 개발자가 많이 사용하며 대규모 서버 애플리케이션에서는 주로 자바로 메시지 큐를 다룰 확률이 높다. 하지만 파이썬으로 미리 메시지 큐를 프로토타이핑해서 충분히 검증한 후 실무에서 메시지 큐를 구축하게 되면 좀 더 견고한 메시지 큐 애플리케이션을 만드는데 많은 도움을 받을 것이다.</p>
      </article>
    </section>
  </div>