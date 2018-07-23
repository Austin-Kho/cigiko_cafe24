        <!-- main page -->
        <main role="main" class="col-sm-12 col-md-9 offset-md-3 page" id="load_content" styale="display:none;">
          <div class="btn-group pull-left menu-group" role="group" style="text-align: left;">
            <small>
              <a class="pull-left menu_link menu-toggle col-2" style="cursor:pointer; margin: 9px;"><ion-icon name="menu" style="font-size:1.6em;" title="메뉴"></ion-icon></a>
            </small>
          </div>

          
          <!-- main_top start -->
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="mb-10"> 
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active">
                    <a href="/book/{{$defurl}}">{{$title}}</a>
                  </li>
                  <?php
                    $bs_arr = [];
                    for($i=1; $i<=$id; $i++){
                      if($sub[$i][0]==1) {
                        array_push($bs_arr, $i);
                      };
                    };
                  ?>
                  <li class="breadcrumb-item active"><a href="/book/{{$defurl}}/{{max($bs_arr)}}">{{$sub[max($bs_arr)][1]}}</a></li>
                  @if($sub[$id][0]==2) 
                  <li class="breadcrumb-item" aria-current="page"><a href="/book/{{$defurl}}/{{$id}}">{{$sub[$id][1]}}</a></li>
                  @endif
                </ol>
              </nav>
            </div>
            
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>            
          </div>
          <!-- main_top end -->

          
          
          <!-- contents page start -->

          @include('book/'.$defurl.'/contents/'.$id)

          <!-- contents page end -->

          <div class="page-prev-next" style="padding: 8px;">
            <div class="clearfix">
              <div class="pull-left">
                <ul>
                  @if($id!='1')
                  <li><strong>이전글</strong> : <a href="/book/{{$defurl}}/{{(string)((int)$id-1)}}">{{$sub[(string)((int)$id-1)][1]}}</a></li>@endif
                  @if($id!==(string)$maxid)
                  <li><strong>다음글</strong> : <a href="/book/{{$defurl}}/{{(string)((int)$id+1)}}">{{$sub[(string)((int)$id+1)][1]}}</a></p></li>@endif
                </ul>
              </div>
            </div>
          </div>

          <!-- disqus start -->
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
          <noscript>Please enable JavaScript to view the 
            <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
          </noscript>
          <!-- disqus end -->
        </main>