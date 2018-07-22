<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../../../favicon.ico"> -->

    <title>개발자를 위한 파이썬</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/test.css" rel="stylesheet">
    <!-- icon -->
    <script src="https://unpkg.com/ionicons@4.2.4/dist/ionicons.js"></script>
  </head>

  <body>
    <!-- nab bar -->
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-sm-3 mr-0" href="/book"><span data-feather="home"></span> NC2U!</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign in</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <!-- side bar start -->
        <nav class="col-sm-3 d-none d-md-block bg-light sidebar"  style="display:none;">
          <div class="toc" data-spy="affix_">
            <!-- <div class="visible-xs" style="height:20px;"></div> -->
            <div class="row border-bottom" style="padding-bottom: 10px; margin-bottom: 20px;">
              <div class="col-10" style="padding-left: 15px;">
                <a class="nav-link active" href="/test/01">Python Books<span class="sr-only">(current)</span>
                </a>
              </div>
              <div class="col-2" style="padding-top: 7px; text-align: right;">
                <a class="pull-right menu_link menu-toggle col-2" style="cursor:pointer; margin: 9px;"><ion-icon name="menu" style="font-size:1.6em;"></ion-icon></a>
              </div>
            </div>

            <div class="nav nav-sidebar list-group">
              @for($i=1; $i<=$maxid; $i++)
              <a href="/book/{{$defurl}}/{{$i}}" class="@if(($i=='1' and $id=='1') or $id==$i) active @endif list-group-item">
                <span style="white-space:nowrap;overflow:hidden;display:block;">
                  <span class="{{"d".$sub[$i][0]}}">{{$sub[$i][1]}} @if(($i=='1' and $id=='1') or $id==$i)<span class="sr-only">(current)</span>@endif</span>
                </span>
              </a>
              @endfor
            </div>
          </div>          
        </nav>
        <!-- side bar end -->


        <!-- main page -->
        <main role="main" class="col-sm-9 ml-sm-auto px-4">
          
          <!-- main_top start -->
          <!-- <div class="visible-xs" style="height: 80px;"></div> -->
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
          <h2 class="page-header">{{$sub[$id][1]}}</h2>
          <div class="chapter">
            <section>
              <article class="">
                <p>파이썬 프로그래밍 언어는 광범위한 구문 구조, 표준 라이브러리 함수, 대화형 개발 환경 기능을 갖추고 있다. 다행히 그 중 대부분은 무시해도 된다. 모두를 알아야 할 필요는 없지만 몇 가지 기본적인 프로그래밍 개념은 배워야 할 것이다.</p>
                <p>대화형 쉘을 사용해서 예제들을 따라 직접 시도해 보자. 그저 읽은 것보다는 해보는 것이 훨씬 기억이 잘 된다.</p>
                <ul>
                  <li><a href="/book/01/2">{{$sub[2][1]}}</a></li>
                  <li><a href="/book/01/3">{{$sub[3][1]}}</a></li>
                  <li><a href="/book/01/4">{{$sub[4][1]}}</a></li>
                  <li><a href="/book/01/5">{{$sub[5][1]}}</a></li>
                  <li><a href="/book/01/6">{{$sub[6][1]}}</a></li>
                  <li><a href="/book/01/7">{{$sub[7][1]}}</a></li>
                </ul>
              </article>
            </section>
          </div>
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
          <!-- contents page end -->


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
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
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
        $("#load_content").toggleClass("hidden-xs");
        $(".prev_next_indicator").toggle();
        $(".menu-group").toggle();
      }
    </script>
    <div style="display:none" class="prev_next_indicator">
      @if($id!='1')
      <a class="prev_icon" href="/book/{{$defurl}}/{{(string)((int)$id-1)}}" role="button">
        <span class="glyphicon glyphicon-chevron-left" style="font-size:2em;"></span>
      </a>@endif
      @if($id!==(string)$maxid)
      <a class="next_icon" href="/book/{{$defurl}}/{{(string)((int)$id+1)}}" role="button">
        <span class="glyphicon glyphicon-chevron-right" style="font-size:2em;"></span>
      </a>@endif
    </div>
    <div style="font-size: 25pt;">
      <a id="MOVE_TOP_BTN" href="#"><span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span></a>
    </div>
    <script id="dsq-count-scr" src="//cigiko.disqus.com/count.js" async></script>
  </body>
</html>
