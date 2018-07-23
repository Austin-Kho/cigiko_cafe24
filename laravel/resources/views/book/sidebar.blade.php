        <!-- side bar start -->
        <nav class="col-sm-12 col-md-3 sidebar bg-light" style="display:none;">
          <div class="toc" data-spy="affix_">
            <div class="d-sm-block d-md-none" style="height:20px;"></div>
            <div class="row border-bottom" style="padding-bottom: 10px; margin-bottom: 20px;">
              <div class="col-9 col-sm-10" style="padding-left: 15px;">
                <a class="nav-link active" href="/book/"><svg id="i-book" viewBox="0 0 32 32" width="20" height="20" fill="orange" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M16 7 C16 7 9 1 2 6 L2 28 C9 23 16 28 16 28 16 28 23 23 30 28 L30 6 C23 1 16 7 16 7 Z M16 7 L16 28" />
                  </svg> Study Books<span class="sr-only">(current)</span>
                </a>
              </div>
              <div class="col-3 col-sm-2" style="padding:7px 0; text-align: right;">
                <a class="pull-right menu_link menu-toggle col-2" style="cursor:pointer; margin: 9px;"><ion-icon name="menu" style="font-size:1.6em;" title="메뉴"></ion-icon></a>
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