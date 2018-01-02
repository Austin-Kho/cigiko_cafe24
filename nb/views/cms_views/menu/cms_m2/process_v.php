      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="<?if( !$this->uri->segment(3) or $this->uri->segment(3)=='1') echo 'active'; else echo '';?>">
          <a href="<?php echo $this->config->base_url('cms_m2/process/1'); ?>"><strong>예산집행 관리</strong></a>
        </li>
        <li role="presentation" class="<?if( $this->uri->segment(3)=='2') echo 'active'; else echo '';?>">
          <a href="<?php echo $this->config->base_url('cms_m2/process/2'); ?>"><strong>프로세스 관리</strong></a>
        </li>
      </ul>
<!-- ---------------------------------mdi-menu end------------------------------------ -->

      <div class="page-header">
        <ul class="nav nav-pills">

<?php if( !$this->uri->segment(3) or $this->uri->segment(3) ==1) :
        $len = count($s_di[0]);
        for($i=0; $i<$len; $i++) :
          $j = $i+1;
?>
          <li role="presentation" class="<?php if(( !$this->uri->segment(4) && $j==1) or $this->uri->segment(4)==$j) echo 'active'; ?>">
			  <a href="<?php echo $this->config->base_url('cms_m2/process'); ?>/<?php if($this->uri->segment(3)) {echo $this->uri->segment(3).'/'.$j;} else {echo '1/'.$j;}?>"><?php echo $s_di[0][$i]; ?></a>
		  </li>
<?
        endfor;
      else :
        $len = count($s_di[1]);
        for($i=0; $i<$len; $i++) :
          $j = $i+1;
?>
          <li role="presentation" class="<?php if(( !$this->uri->segment(4) && $j==1) or $this->uri->segment(4)==$j) echo 'active'; ?>">
			  <a href="<?php echo $this->config->base_url('cms_m2/process'); ?>/<?php if($this->uri->segment(3)) {echo $this->uri->segment(3).'/'.$j;} else {echo '1/'.$j;}?>"><?php echo $s_di[1][$i]; ?></a>
		  </li>
<?
        endfor;
	endif;
?>
		</ul>
      </div>
<!-- ---------------------------------sdi-menu end------------------------------------ -->
      <div class="page-header sdi_sub">
        <span class="glyphicon glyphicon-book head_gly" aria-hidden="true"></span>
         <h4 class="sdi">
<?php
    if( !$this->uri->segment(3) or $this->uri->segment(3)==1) {$k = 2; } else { $k = 3; }
    switch ($this->uri->segment(4)) :
        case '1': echo $s_di[$k][0]; break;
        case '2':  echo $s_di[$k][1]; break;
        case '3': echo $s_di[$k][2]; break;
        case '4': echo $s_di[$k][3]; break;
        default: echo $s_di[$k][0]; break;
	endswitch;
 ?>
        </h4>
      </div>
<!-- ---------------------------------sdi-sub end------------------------------------ -->
