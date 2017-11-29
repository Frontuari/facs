		<!-- SIDEBAR -->
		<div class="sidebar">
			<div class="brand">
				<a href="<?=base_url();?>main"><img src="<?php echo base_url()?>assets/img/logo.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="<?=base_url();?>home" class="active"></a><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
						<!-- 
						<li><a href="<?=base_url();?>home" <?php if($content == "home"){ print 'class="active"';} ?>><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
						<?php foreach($allowed_services AS $services):?>
						<?php if($services->type=="F"):?>
						<li><a href="<?=$services->url?>" <?php if($path == $services->name_access){ print 'class="active"';} ?> class=""><i class="fa <?=$services->icon?>"></i> <span><?=$services->name?></span></a></li>
						<?php endif;?>
						<?php endforeach;?>
						-->
					</ul>
				</nav>
			</div>
		</div>
		<!-- END SIDEBAR -->