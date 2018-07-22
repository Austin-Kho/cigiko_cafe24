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
  </head>

  <body>
    <!-- nab bar -->
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-sm-3 mr-0" href="/"><span data-feather="home"></span> NC2U!</a>
      <input class="form-control form-control-dark d-none d-sm-none d-md-block" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3 d-none d-sm-none .d-md-block">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign in</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
<!----------------------------- head ----------------------------------->
        <!-- side bar start -->
        <nav class="col-sm-12 col-md-3 sidebar bg-light" style="display:none;">
          <div class="toc" data-spy="affix_">
            <div class="d-sm-block d-md-none" style="height:20px;"></div>
            <div class="row border-bottom" style="padding-bottom: 10px; margin-bottom: 20px;">
              <div class="col-9 col-sm-10" style="padding-left: 15px;">
                <a class="nav-link active" href="/book/" style="font-size: 1.3em;"><ion-icon name="logo-python"></ion-icon> Python Books<span class="sr-only">(current)</span>
                </a>
              </div>
              <div class="col-3 col-sm-2" style="padding:7px 0; text-align: right;">
                <a class="pull-right menu_link menu-toggle col-2" style="cursor:pointer; margin: 9px;"><ion-icon name="menu" style="font-size:1.6em;" title="메뉴"></ion-icon></a>
              </div>
            </div>

            <div class="nav nav-sidebar list-group">
              @for($i=1; $i<=$maxid; $i++)
              <a href="/test/{{$defurl}}/{{$i}}" class="@if(($i=='1' and $id=='1') or $id==$i) active @endif list-group-item">
                <span style="white-space:nowrap;overflow:hidden;display:block;">
                  <span class="{{"d".$sub[$i][0]}}">{{$sub[$i][1]}} @if(($i=='1' and $id=='1') or $id==$i)<span class="sr-only">(current)</span>@endif</span>
                </span>
              </a>
              @endfor
            </div>
          </div>          
        </nav>
        <!-- side bar end -->
<!----------------------------- side ----------------------------------->

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
<!-- --------------------------- main --------------------------------- -->
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- Optional JavaScript -->
    <!-- 먼저 jQuery가 오고 그 다음 Popper.js 그 다음 Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>     
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    <script src="https://unpkg.com/ionicons@4.2.4/dist/ionicons.js"></script>

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
        $("#load_content").toggleClass("offset-md-3");
        $("#load_content").toggleClass("col-md-9");
        $("#load_content").toggleClass("col-md-12");
        $("#load_content").toggleClass("sidebar-padding");
        // $("#load_content").toggleClass("d-none d-sm-block");
        $(".prev_next_indicator").toggle();
        $(".menu-group").toggle();
      }

      // $(document).ready(function() {
      //   $(".subject_group").click(function() {
      //     if($(this).next(".nav").is(":visible")){
      //       $(this).next(".nav").slideUp(350);
      //     } else {
      //       // $(".nav").slideUp(300);
      //       $(this).next(".nav").slideDown(350);
      //     }
      //   });
      // });

      $(function() {
        $(window).scroll(function() {
          if ($(this).scrollTop() > 500) {
            $('#MOVE_TOP_BTN').fadeIn();
          } else {
            $('#MOVE_TOP_BTN').fadeOut();
          }
        });

        $("#MOVE_TOP_BTN").click(function() {
          $('html, body').animate({
            scrollTop : 0
          }, 400);
          return false;
        });
      });
    </script>
    <script id="dsq-count-scr" src="//cigiko.disqus.com/count.js" async></script>

    <!-- prev button * next button -->
    <div style="display:none" class="prev_next_indicator">
      @if($id!='1')
      <a class="prev_icon" href="/book/{{$defurl}}/{{(string)((int)$id-1)}}" role="button">
      <svg id="i-chevron-left" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="butt" stroke-linejoin="miter" stroke-width="7">
          <path d="M20 30 L8 16 20 2" />
      </svg>
      </a>@endif
      @if($id!==(string)$maxid)
      <a class="next_icon" href="/book/{{$defurl}}/{{(string)((int)$id+1)}}" role="button">
      <svg id="i-chevron-right" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="butt" stroke-linejoin="miter" stroke-width="7">
          <path d="M12 30 L24 16 12 2" />
      </svg>
      </a>@endif
    </div>

    <!-- Top button -->
    <div style="font-size: 3em;">
      <a id="MOVE_TOP_BTN" href="#"><ion-icon name="arrow-dropup-circle"></ion-icon></a>
    </div>
  </body>
</html>
