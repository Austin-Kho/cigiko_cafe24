        <div style="border-bottom: 1px solid #eee;">

        </div>
      </div>
      <div class="col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 main" style="padding-top: 0;">
        <div class="" style="margin-top: 0;">
          @if($id!='1')<p>이전글 : <a href="/book02/{{(string)((int)$id-1)}}">{{$sub[(string)((int)$id-1)]}}</a></p>@endif
          @if($id!=='18')<p>다음글 : <a href="/book02/{{(string)((int)$id+1)}}">{{$sub[(string)((int)$id+1)]}}</a></p>@endif
        </div>
        <div id="disqus_thread" style="margin-top: 60px;"></div>
        <script>
          /**
          *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
          *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
          /*
          var disqus_config = function () {
          this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
          this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
          };
          */
          (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://cigiko.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
          })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
      </div>
    </div>
  </div>

  <div style="font-size: 25pt;">
    <a id="MOVE_TOP_BTN" href="#" style=" color: #73bfe2;"><span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span></a>
  </div>
  <script id="dsq-count-scr" src="//cigiko.disqus.com/count.js" async></script>
</body>
</html>
