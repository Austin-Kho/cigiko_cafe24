<div class="page col-sm-offset-3 col-sm-9 main hidden-xs" id="load_content" style="display:none;">

  <div class="btn-group pull-right menu-group" role="group">
    <small>
      <a class="menu_link menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" title="메뉴"></span></a>
    </small>
  </div>
  <div class="menu-wikidocs">&nbsp;</div>
  <div class="clearfix page-depth">
    <div class="col-xs-9" style="color:#afb1af;">
      <small><a href="/{{$defurl}}"><i class="glyphicon glyphicon-folder-open"></i> {{$title}}</a> / </small>
<?php
  $bs_arr = [];
  for($i=1; $i<=$id; $i++){
    if($sub[$i][0]==1) {
      array_push($bs_arr, $i);
    }
  }
?>
      <small><a href="/{{$defurl}}/{{max($bs_arr)}}">{{$sub[max($bs_arr)][1]}}</a></small>
      @if($sub[$id][0]==2) <small> / <a href="/{{$defurl}}/{{$id}}">{{$sub[$id][1]}}</a></small>@endif
    </div>
    <div class="col-xs-3" style="text-align: right;">
      <small><a href="/"><i class="glyphicon glyphicon-home"></i> Python Books</a></small>
    </div>
  </div>
