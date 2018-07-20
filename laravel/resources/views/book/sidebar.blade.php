<div class="col-sm-3">
  <div class="row">
    <div class="col-sm-3 sidebar" style="display:none;">
      <div class="toc" data-spy="affix_">
        <div class="visible-xs" style="height:20px;"></div>
        <div class="row" style="border-bottom: solid 1px #ccc; padding-bottom: 10px; margin-bottom: 20px;">
          <div class="col-xs-10">
            <form class="">
              <input type="text" class="form-control" placeholder="검색어를 입력하세요. (준비중..!)">
            </form>
          </div>
          <div class="col-xs-2" style="padding: 0; text-align: right;">
            <a class="pull-right menu_link menu-toggle col-xs-2" style="cursor:pointer; margin: 9px;"><span class="glyphicon glyphicon-menu-hamburger" title="메뉴"></span></a>
          </div>
        </div>

        <!-- <div class="row subject_group" style="margin-bottom: 10px; background-color: #b6b2af; color: #FFF; cursor: pointer;">
          <div class="col-xs-12"><h5>1부 파이썬 프로그래밍 기초</h5></div>
        </div> -->

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
    </div>
  </div>
</div>
