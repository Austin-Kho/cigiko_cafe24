        <script>
            $(document).ready(function () {
              if (typeof(Storage) !== "undefined") {
                if(localStorage.sidebar == "hidden") {
                  menuToggle(true);
                }else {
                  $(".sidebar").show();
                  $(".toc-header").show();
                }
              }else {
                $(".sidebar").show();
                $(".toc-header").show();
              }

              $(".toc").css("display", "block");
              if (typeof(Storage) !== "undefined") {
                $(".sidebar").scrollTop(localStorage.sp);
              }

              $(".sidebar").css("overflow-y", "auto");

              $(".menu-toggle").on("click", function() {
                menuToggle();

                if (typeof(Storage) !== "undefined") {
                  if($(".sidebar").is(":hidden")) {
                    localStorage.sidebar = "hidden";
                  }else {
                    localStorage.sidebar = "show";
                  }
                }
              });

              $("#load_content").show();
            });

            function menuToggle(no_sidebar) {
              if(!no_sidebar) {
                $(".sidebar").toggle();
                $(".toc-header").toggle();
              }
              $("#load_content").toggleClass("col-sm-offset-3");
              $("#load_content").toggleClass("col-sm-9");
              $("#load_content").toggleClass("col-sm-12");
              $("#load_content").toggleClass("sidebar-padding");
              $(".prev_next_indicator").toggle();
              $(".menu-group").toggle();
            }
          </script>

        <div class="page-prev-next" style="padding: 8px;">
          <div class="clearfix">
            <div class="pull-left">
              <ul>
                @if($id!='1')
                <li><strong>이전글</strong> : <a href="/book02/{{(string)((int)$id-1)}}">{{$sub[(string)((int)$id-1)]}}</a></li>@endif
                @if($id!=='18')
                <li><strong>다음글</strong> : <a href="/book02/{{(string)((int)$id+1)}}">{{$sub[(string)((int)$id+1)]}}</a></p></li>@endif
              </ul>
            </div>
          </div>
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
        <div style="display:none" class="prev_next_indicator">
          @if($id!='1')
          <a class="prev_icon" href="/book02/{{(string)((int)$id-1)}}" role="button">
            <span class="glyphicon glyphicon-chevron-left" style="font-size:2em;"></span>
          </a>@endif
          @if($id!=='18')
          <a class="next_icon" href="/book02/{{(string)((int)$id+1)}}" role="button">
            <span class="glyphicon glyphicon-chevron-right" style="font-size:2em;"></span>
          </a>@endif
        </div>
      </div>
    </div>
  </div>

  <div style="font-size: 25pt;">
    <a id="MOVE_TOP_BTN" href="#" style=" color: #73bfe2;"><span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span></a>
  </div>
  <script id="dsq-count-scr" src="//cigiko.disqus.com/count.js" async></script>
</body>
</html>
