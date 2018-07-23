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