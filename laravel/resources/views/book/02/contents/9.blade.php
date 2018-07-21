  <h2 class="page-header">{{$sub[$id][1]}}</h2>
  <div class="chapter">
    <section>
      <article>
        <p>파일의 읽고 쓰기는 이미 1.5.1에서 소개한 몇줄이면 끝날 정도로 간단하다. 그러나 파이썬으로 파일을 다룰 때 파일 안 내용을 자유자재로 조작할 수 있어야 한다. 따라서 파일을 읽고 쓸 때 자주 사용하는 몇 가지 옵션을 소개한다.</p>
        <p class="bg-warning"><strong>TIP</strong>: 파이썬의 파일 읽고 쓰기와 관련한 더 자세한 내용은 파이썬 개발 문서의 '<a href="https://docs.python.org/3.5/tutorial/inputoutput.html#reading-and-writing-files" target="_blank">7.2 Reading and Writing Files</a>'를 참고한다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">8.1. 파일 열기와 읽기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬은 '있을 거 같다'라고 생각하는 함수 대부분을 정말 기본으로 제공한다. 파일을 읽고 쓰는 것도 그중 하나이다.</p>
        <p>파일을 여는데는 <code>open()</code>(<a href="https://docs.python.org/3/library/functions.html#open" target="_blank">https://docs.python.org/3/library/functions.html#open</a>)함수면 충분하다. 여기서는 예제 파일 ch08 디렉터리 안에 있는 lorem.txt 파일을 열어보자. 다음처럼 사용한다.</p>
        <h5>코드8-1 파일 열기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">1</font><font>&#93;</font>:</li><li>f&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">open</font><font>&#40;</font><font color="#483d8b">'examples/lorem.txt'</font><font color="#66cc66">,</font>&nbsp;<font color="#483d8b">'r'</font><font>&#41;</font></li></ol></blockquote></code></pre>
        <p>첫 번째 파리미터는 현재 인터프리터가 실행 중인 경로 또는 스크립트가 실행 중인 경로를 기준ㅇ로 둔 파일의 상대경로이다. 두 번째는 파일을 여는 모드 옵션이다. 파일을 여는 모드옵션은 몇 가지가 있으며 <code>open()</code> 함수는 두 번째 파라미터가 없다면 옵션 '<code>r</code>'을 기본 값으로 적용한다. </p>
        <p>다음은 파라미터로 전달할 수 있는 모드 옵션이다.</p>
        <ul>
          <li>'<code>r</code>' : 기본값, 읽기 전용으로 연다.</li>
          <li>'<code>w</code>' : 파일 쓰기. 파일이 이미 존재한다면 해당 파일을 비운다.</li>
          <li>'<code>x</code>' : 배타적 생성. 파일이 이미 존재한다면 <code>open()</code> 실행은 실패한다.</li>
          <li>'<code>a</code>' : 파일 쓰기. 파일이 이미 존재한다면 파일의 끝에 내용을 덧붙인다.</li>
          <li>'<code>b</code>' : 바이너리 모드로 연다.</li>
          <li>'<code>t</code>' : 텍스트 모드로 연다.</li>
          <li>'<code>+</code>' : 읽기와 쓰기를 다 한다.</li>
        </ul>
        <p>그리고 앞 모드 옵션들은 '<code>w</code>+<code>b</code>'(파일을 열고 0바이트로 비워버린다)라든지 '<code>r</code>+<code>b</code>'(파일을 바이너리 모드로 읽고 쓸 수 있게 연다)등으로 조합해서 사용할 수 있다. 또한 기본 값으로 설정된 모드 옵션들은 달리 대체할 수 있는 모드를 설정하지 않는 이상 언제나 붙는다. 즉, 아무런 파라미터도 전달하지 않으면 '<code>r</code>'이고 '<code>r</code>'은 '<code>rt</code>'와 같다.</p>

        <p>파일을 열었으면 읽어 볼 차례다. <code>r</code>, <code>w</code>로 열면 파일 커서는 처음에 있고, <code>a</code> 로 열면 파일의 마지막에 내용을 덧붙여야 하므로 파일의 커서는 마지막에 가 있다.</p>
      </article>
    </section>

    <h4 class="sub-header">8.1.1 - 파일 전체 읽기</h4>
    <section>
      <article>
        <p>파일 객체의 <code>read()</code> 함수는 파일 전체 내용을 몽땅 다 읽어온다.</p>
        <h5>코드8-2 파일 전체 내용 읽기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li>f.<font>read</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">2</font><font>&#93;</font>:</li><li><font color="#483d8b">'Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet,&nbsp;consectetur&nbsp;adipiscing&nbsp;elit.&nbsp;Ut&nbsp;mollis&nbsp;hendrerit&nbsp;faucibus.&nbsp;Nullam&nbsp;mollis&nbsp;iacul&nbsp;is&nbsp;laoreet.&nbsp;Duis&nbsp;bibendum&nbsp;augue&nbsp;ut&nbsp;velit&nbsp;dapibus,&nbsp;quis&nbsp;semper&nbsp;mi&nbsp;pharetra.&nbsp;Nullam&nbsp;eu&nbsp;sapien&nbsp;purus.</font></li><li><font color="#483d8b">--snip--</font></li><li><font color="#483d8b">'</font></li></ol></blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">8.1.2 - 파일 한 행 읽기</h4>
    <section>
      <article>
        <p>다시 파일을 열고 파일 안의 한 행을 읽어 보자. 이 때는 <code>readline()</code>을 사용한다.</p>
        <h5>코드8-3 파일 한 줄 읽기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:</li><li>f&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">open</font><font>&#40;</font><font color="#483d8b">&quot;examples/lorem.txt&quot;</font><font>&#41;</font></li><li>f.<font color="#dc143c">readline</font><font>&#40;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">3</font><font>&#93;</font>:</li><li><font color="#483d8b">'Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet,&nbsp;consectetur&nbsp;adipiscing&nbsp;elit.&nbsp;Ut&nbsp;mollis&nbsp;hendrerit&nbsp;faucibus.&nbsp;Nullam&nbsp;mollis&nbsp;iacul&nbsp;is&nbsp;laoreet.&nbsp;Duis&nbsp;bibendum&nbsp;augue&nbsp;ut&nbsp;velit&nbsp;dapibus,&nbsp;quis&nbsp;semper&nbsp;mi&nbsp;pharetra.&nbsp;Nullam&nbsp;eu&nbsp;sapien&nbsp;purus.&nbsp;Morbi&nbsp;gravida&nbsp;magna&nbsp;ut&nbsp;egestas&nbsp;viverra.&nbsp;Suspendisse&nbsp;non&nbsp;viverra&nbsp;ipsum,&nbsp;semper&nbsp;congue&nbsp;metus.&nbsp;Maecenas&nbsp;maximus&nbsp;augue&nbsp;eget&nbsp;sollicitudin&nbsp;interdum.<font color="#000099">\n</font>'</font></li></ol></blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">8.1.3 - 파일 전부를 읽고 한 행마다 리스트 아이템으로 가져오기</h4>
    <section>
      <article>
        <p><code>readlines()</code>는 파일을 전부 읽어서 리스트 아이템으로 반환한다.</p>
        <h5>코드8-4 파일을 전부 읽고 한 행마다 리스트 아이템으로 가져오기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">4</font><font>&#93;</font>:</li><li>f&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">open</font><font>&#40;</font><font color="#483d8b">&quot;examples/lorem.txt&quot;</font><font>&#41;</font></li><li>texts&nbsp;<font color="#66cc66">=</font>&nbsp;f.<font>readlines</font><font>&#40;</font><font>&#41;</font></li><li>texts</li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">4</font><font>&#93;</font>:</li><li><font>&#91;</font><font color="#483d8b">'Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet,&nbsp;consectetur&nbsp;adipiscing&nbsp;elit.&nbsp;Ut&nbsp;mollis&nbsp;hendrerit&nbsp;faucibus.&nbsp;Nullam&nbsp;mollis&nbsp;iacul&nbsp;is&nbsp;laoreet.&nbsp;Duis&nbsp;bibendum&nbsp;augue&nbsp;ut&nbsp;velit&nbsp;dapibus,&nbsp;quis&nbsp;semper&nbsp;mi&nbsp;pharetra.&nbsp;Nullam&nbsp;eu&nbsp;sapien&nbsp;purus.&nbsp;Morbi&nbsp;gravida&nbsp;magna&nbsp;ut&nbsp;egestas&nbsp;viverra.&nbsp;Suspendisse&nbsp;non&nbsp;viverra&nbsp;ipsum,&nbsp;semper&nbsp;congue&nbsp;metus.&nbsp;Maecenas&nbsp;maximus&nbsp;augue&nbsp;eget&nbsp;sollicitudin&nbsp;interdum.<font color="#000099">\n</font>'</font><font color="#66cc66">,</font></li><li>--snip--</li><li><font color="#483d8b">'<font color="#000099">\n</font>'</font><font color="#66cc66">,</font></li><li><font color="#483d8b">'Morbi&nbsp;feugiat,&nbsp;elit&nbsp;a&nbsp;mollis&nbsp;maximus,&nbsp;neque&nbsp;felis&nbsp;fermentum&nbsp;lacus,&nbsp;eget&nbsp;ullamcorper&nbsp;magna&nbsp;felis&nbsp;vitae&nbsp;tell&nbsp;us.&nbsp;Donec&nbsp;malesuada&nbsp;porttitor&nbsp;arcu,&nbsp;ut&nbsp;tincidunt&nbsp;nisl&nbsp;vestibulum&nbsp;egestas.&nbsp;Nam&nbsp;sapien&nbsp;eros,&nbsp;cursus&nbsp;ac&nbsp;facilisis&nbsp;eu,&nbsp;elementum&nbsp;feugiat&nbsp;elit.&nbsp;Etiam&nbsp;metus&nbsp;odio,&nbsp;congue&nbsp;id&nbsp;pharetra&nbsp;vitae,&nbsp;pharetra&nbsp;sit&nbsp;amet&nbsp;mi.&nbsp;Nunc&nbsp;ultrices&nbsp;lectus&nbsp;quis&nbsp;dictum&nbsp;maximus.&nbsp;Mauris&nbsp;porta&nbsp;enim&nbsp;sed&nbsp;pharetra&nbsp;dignissim.&nbsp;Morbi&nbsp;a&nbsp;mollis&nbsp;turpis.&nbsp;Phasellus&nbsp;est&nbsp;tortor,&nbsp;maximus&nbsp;id&nbsp;sem&nbsp;eu,&nbsp;fermentum&nbsp;ornare&nbsp;ipsum.&nbsp;Phasellus&nbsp;ut&nbsp;elementum&nbsp;sapien.'</font><font>&#93;</font></li></ol></blockquote></code></pre>
        <p>이때 리스트 각각의 아이템은 파일의 한 행이 된다. 이 리스트를 이용해서 [코드8-5]처럼 각 행에 접근할 수 있다.</p>

        <h5>코드8-5 각 행에 접근하기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">5</font><font>&#93;</font>:</li><li><font color="#ff7700">print</font><font>&#40;</font>texts<font>&#91;</font><font color="#ff4500">0</font><font>&#93;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">5</font><font>&#93;</font>:</li><li>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet<font color="#66cc66">,</font>&nbsp;consectetur&nbsp;adipiscing&nbsp;elit.&nbsp;<font>Ut</font>&nbsp;mollis&nbsp;hendrerit&nbsp;faucibus.&nbsp;<font>Nullam</font>&nbsp;mollis&nbsp;iacul&nbsp;<font color="#ff7700">is</font>&nbsp;laoreet.&nbsp;<font>Duis</font>&nbsp;bibendum&nbsp;augue&nbsp;ut&nbsp;velit&nbsp;dapibus<font color="#66cc66">,</font>&nbsp;quis&nbsp;semper&nbsp;mi&nbsp;pharetra.&nbsp;<font>Nullam</font>&nbsp;eu&nbsp;sapien&nbsp;purus.&nbsp;<font>Morbi</font>&nbsp;gravida&nbsp;magna&nbsp;ut&nbsp;egestas&nbsp;viverra.&nbsp;<font>Suspendisse</font>&nbsp;non&nbsp;viverra&nbsp;ipsum<font color="#66cc66">,</font>&nbsp;semper&nbsp;congue&nbsp;metus.&nbsp;<font>Maecenas</font>&nbsp;maximus&nbsp;augue&nbsp;eget&nbsp;sollicitudin&nbsp;interdum.</li></ol></blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">8.1.4 - for 문 이용하기</h4>
    <section>
      <article>
        <p>file 객체는 순회(iterable)가능하므로 <code>for</code> 문에 리스트 대신 file 객체를 넣을 수 있다.</p>
        <p class="bg-success"><strong>TIP</strong>: 이터레이터(iterator) 속성을 갖는(혹은 구현한) 모든 객체는 순회 가능하다고 표현하며 for 문 등에서 차례로 무언가를 꺼내 오는 작업에 사용한다. 더 자세한 설명은 파이썬 개발문서'<a href="https://docs.python.org/3/tutorial/classes.html#iterators" target="_blank">9.8 Iterators</a>'를 참고한다.</p>
        <h5>코드8-6 리스트 대신 file 객체 사용하기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">6</font><font>&#93;</font>:</li><li>f&nbsp;<font color="#66cc66">=</font>&nbsp;<font color="#008000">open</font><font>&#40;</font><font color="#483d8b">&quot;examples/lorem.txt&quot;</font><font>&#41;</font></li><li>&nbsp;</li><li><font color="#ff7700">for</font>&nbsp;line&nbsp;<font color="#ff7700">in</font>&nbsp;f:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>line<font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">6</font><font>&#93;</font>:</li><li>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet<font color="#66cc66">,</font>&nbsp;consectetur&nbsp;adipiscing&nbsp;elit.&nbsp;<font>Ut</font>&nbsp;mollis&nbsp;hendrerit&nbsp;faucibus.&nbsp;<font>Nullam</font>&nbsp;mollis&nbsp;iacul&nbsp;<font color="#ff7700">is</font>&nbsp;laoreet.&nbsp;<font>Duis</font>&nbsp;bibendum&nbsp;augue&nbsp;ut&nbsp;velit&nbsp;dapibus<font color="#66cc66">,</font>&nbsp;quis&nbsp;semper&nbsp;mi&nbsp;pharetra.&nbsp;<font>Nullam</font>&nbsp;eu&nbsp;sapien&nbsp;purus.&nbsp;<font>Morbi</font>&nbsp;gravida&nbsp;magna&nbsp;ut&nbsp;egestas&nbsp;viverra.&nbsp;<font>Suspendisse</font>&nbsp;non&nbsp;viverra&nbsp;ipsum<font color="#66cc66">,</font>&nbsp;semper&nbsp;congue&nbsp;metus.&nbsp;<font>Maecenas</font>&nbsp;maximus&nbsp;augue&nbsp;eget&nbsp;sollicitudin&nbsp;interdum.</li><li>--snip--</li><li>&nbsp;</li><li>Morbi&nbsp;feugiat<font color="#66cc66">,</font>&nbsp;elit&nbsp;a&nbsp;mollis&nbsp;maximus<font color="#66cc66">,</font>&nbsp;neque&nbsp;felis&nbsp;fermentum&nbsp;lacus<font color="#66cc66">,</font>&nbsp;eget&nbsp;ullamcorper&nbsp;magna&nbsp;felis&nbsp;vitae&nbsp;tellus.&nbsp;<font>Donec</font>&nbsp;malesuada&nbsp;porttitor&nbsp;arcu<font color="#66cc66">,</font>&nbsp;ut&nbsp;tincidunt&nbsp;nisl&nbsp;vestibulum&nbsp;egestas.&nbsp;<font>Nam</font>&nbsp;sapien&nbsp;eros<font color="#66cc66">,</font>&nbsp;cursus&nbsp;ac&nbsp;facilisis&nbsp;eu<font color="#66cc66">,</font>&nbsp;elementum&nbsp;feugiat&nbsp;elit.&nbsp;<font>Etiam</font>&nbsp;metus&nbsp;odio<font color="#66cc66">,</font>&nbsp;congue&nbsp;<font color="#008000">id</font>&nbsp;pharetra&nbsp;vitae<font color="#66cc66">,</font>&nbsp;pharetra&nbsp;sit&nbsp;amet&nbsp;mi.&nbsp;<font>Nunc</font>&nbsp;ultrices&nbsp;lectus&nbsp;quis&nbsp;dictum&nbsp;maximus.&nbsp;<font>Mauris</font>&nbsp;porta&nbsp;enim&nbsp;sed&nbsp;pharetra&nbsp;dignissim.&nbsp;<font>Morbi</font>&nbsp;a&nbsp;mollis&nbsp;turpis.&nbsp;<font>Phasellus</font>&nbsp;est&nbsp;tortor<font color="#66cc66">,</font>&nbsp;maximus&nbsp;<font color="#008000">id</font>&nbsp;sem&nbsp;eu<font color="#66cc66">,</font>&nbsp;fermentum&nbsp;ornare&nbsp;ipsum.&nbsp;<font>Phasellus</font>&nbsp;ut&nbsp;elementum&nbsp;sapien.</li></ol></blockquote></code></pre>
        <p><code>for</code> 문 안 리스트가 들어갈 자리에 file 객체가 들어간 것을 확인할 수 있다. 이렇게 하면 루프를 한 번 실행할 때마다 <code>read()</code>를 호출한 것처럼 동작할 수 있다.</p>
      </article>
    </section>
  </div>

  <h3 class="sub-header">8.2. 파일 닫기</h3>
  <div class="chapter">
    <section>
      <article>
        <p>파이썬도 파일을 열고 나면 닫아 주어야 한다. 그럴 땐 <code>close()</code>를 사용하면 된다. 닫고 나면 더 이상 해당 file 객체에 대해 작업할 수 없다.</p>
        <h5>코드8-7 파일 닫기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">7</font><font>&#93;</font>:</li><li>f.<font>close</font><font>&#40;</font><font>&#41;</font></li></ol></blockquote></code></pre>
      </article>
    </section>

    <h4 class="sub-header">8.2.1 - with 이용하기</h4>
    <section>
      <article>
        <p>파이썬의 <code>with</code> 는 파일을 열고 닫는 과정을 자동으로 해주고 그 과정에서 오류가 발생하면 알아서 처리까지 해주므로 편리하다.</p>
        <p>기본적인 형태는 <code>import</code>를 사용하는 것과 비슷하다.</p>
        <pre class="python"><code><blockquote><ol><li><font color="#ff7700">with</font>&nbsp;<font color="#008000">open</font><font>&#40;</font><font color="#483d8b">&quot;&lt;path-to-file&gt;&quot;</font><font>&#41;</font>&nbsp;<font color="#ff7700">as</font>&nbsp;f:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;do&nbsp;somethind</font></li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#808080">#&nbsp;with&nbsp;f</font></li></ol></blockquote></code></pre>
        <p>파일을 열면서 바로 <code>as</code> 를 이용해 이름을 할당하면, <code>with</code> 아래 블록에서 해당 이름으로 파일에 접근할 수 있다. <code>with</code>를 벗어나면 자동으로 닫아준다.</p>
        <h5>코드8-8 <code>with</code> 이용하기</h5>
        <pre class="python"><code><blockquote><ol><li>In<font>&#91;</font><font color="#ff4500">8</font><font>&#93;</font>:</li><li><font color="#ff7700">with</font>&nbsp;<font color="#008000">open</font><font>&#40;</font><font color="#483d8b">&quot;examples/lorem.txt&quot;</font><font>&#41;</font>&nbsp;<font color="#ff7700">as</font>&nbsp;f:</li><li>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff7700">print</font><font>&#40;</font>f.<font color="#dc143c">readline</font><font>&#40;</font><font>&#41;</font><font>&#41;</font></li><li>&nbsp;</li><li>Out<font>&#91;</font><font color="#ff4500">8</font><font>&#93;</font>:</li><li>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet<font color="#66cc66">,</font>&nbsp;consectetur&nbsp;adipiscing&nbsp;elit.&nbsp;<font>Ut</font>&nbsp;mollis&nbsp;hendrerit&nbsp;faucibus.&nbsp;<font>Nullam</font>&nbsp;mollis&nbsp;iacul&nbsp;<font color="#ff7700">is</font>&nbsp;laoreet.&nbsp;<font>Duis</font>&nbsp;bibendum&nbsp;augue&nbsp;ut&nbsp;velit&nbsp;dapibus<font color="#66cc66">,</font>&nbsp;quis&nbsp;semper&nbsp;mi&nbsp;pharetra.&nbsp;<font>Nullam</font>&nbsp;eu&nbsp;sapien&nbsp;purus.&nbsp;<font>Morbi</font>&nbsp;gravida&nbsp;magna&nbsp;ut&nbsp;egestas&nbsp;viverra.&nbsp;<font>Suspendisse</font>&nbsp;non&nbsp;viverra&nbsp;ipsum<font color="#66cc66">,</font>&nbsp;semper&nbsp;congue&nbsp;metus.&nbsp;<font>Maecenas</font>&nbsp;maximus&nbsp;augue&nbsp;eget&nbsp;sollicitudin&nbsp;interdum.</li></ol></blockquote></code></pre>
        <p>열고 닫는 과정을 <code>with</code> 구문이 전부 해결 해준다고 생각하고 <code>with</code> 안에서만 파일로 작업하면 된다.</p>
        <p><code>with</code> 의 더 자세한 사용법은 <a href="http://effbot.org/zone/python-with-statement.htm" target="_blank">Understanding Python's "with" statement</a>나 파이썬 개발 문서의 <a href="https://www.python.org/dev/peps/pep-0343/" target="_blank">PEP 343 -- The "with" statement</a>를 참고한다.</p>
      </article>
    </section>
  </div>