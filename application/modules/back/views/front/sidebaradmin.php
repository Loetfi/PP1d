<body>

	<div id="app">
		<div class="sidebar app-aside" id="sidebar">
			<div class="sidebar-container perfect-scrollbar">
				<nav>
					<div class="navbar-title">
						<span>Main Navigation</span>
						<span>MySite</span> 
					</div>
					<ul class="main-navigation-menu">
  
						<!-- Sidebar Admin --> 
						<li class="">
							<a href="<?php echo base_url('back/dashboard');?>">
								<div class="item-content">
									<div class="item-media">
										<i class="ti-home"></i>
									</div>
									<div class="item-inner">
										<span class="title"> Dashboard  </span>
										<!-- (<?php echo $this->uri->segment(2,0).'|'.$this->uri->segment(3,0); ?>) -->
									</div>
								</div>
							</a> 
						</li>   

						<?php  

						$user = $this->ion_auth->user()->row();
						$userid = $user->id; 
						$grup = $this->db->query("SELECT group_id from users_groups where user_id = '$userid'")->row(); 
						$grup =  $grup->group_id; 
						$menu = $this->db->query("SELECT a.id_menu, a.nama_menu, a.iconmenu,a.posisi  FROM master_menu_admin a  inner join hakakses b on a.id_menu = b.id_menu 
							where b.id_group = '$grup'
							group by a.id_menu, a.nama_menu, a.iconmenu, a.posisi
							order by a.posisi asc
							")->result();  
						
						$menuNo = 0;
						foreach ($menu as $m) {
							$menuNo++;
							
							$idmenu = $m->id_menu; 

							$menu_detail = $this->db->query("SELECT b.*, c.* from hakakses a
								inner join master_menu_admin b on a.id_menu = b.id_menu
								inner join master_menu_detail_admin c on a.id_menu_detail = c.id_menu_detail
								where a.id_group = '$grup'  and a.id_menu = '$idmenu'
								")->result(); 
							
							
							$active = "";  
							
							$token = $this->session->userdata('token');
							

							if (isset($_GET['token'])){
								$this->session->set_userdata('token', $_GET['token']);
							} elseif (!empty($token) and $this->uri->segment(2) !== 'dashboard' ) {
								$this->session->set_userdata('token', $token);
							}
							elseif ($this->uri->segment(2)=='dashboard') {
								// ($this->session->userdata('token') == '') {
								$this->session->set_userdata('token', '');
							}


							$token = $this->session->userdata('token');
 

							if ($m->id_menu == $token) {
								$nyalakan = "active open";
							} else {
								$nyalakan = "";
							}

							?> 
							<li id="leftMenu<?php echo $menuNo; ?>" class="<?php echo @$nyalakan; ?>">
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="<?php echo @$m->iconmenu; ?>"></i>
										</div>
										<div class="item-inner">
											<span class="title"> <?php echo $m->nama_menu; ?> </span> 
										</div>
									</div>
								</a> 


								<ul class="sub-menu" style="display: <?php echo @$nyalakan == '' ? 'none;' : 'block'; ?>">

									<?php 

									$urll = $this->uri->segment(1).'/'.$this->uri->segment(2);

									foreach ($menu_detail as $md) { 

										if ($md->link_menu_detail == $urll) {
											$aktif = 'active';
										} else {	$aktif = ''; }

										echo "<li class='".$aktif."'>";  
										echo "<a href='".site_url($md->link_menu_detail.'?token='.$md->id_menu)."'><span> ".$md->nama_menu_detail."</span> </a> ";  
										echo "</li>";
											// if ($thisUriSegment2 == )
									} ?>
								</ul> 
							</li>

							<?php } ?>
							<!-- End Sidebar Admin --> 

							<!-- SuviSanusi Content Editor -->
							<?php if ($this->ion_auth->is_admin()) { ?>

							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media"><i class="ti-align-justify"></i> </div>
										<div class="item-inner">
											<span class="title"> SiteMap </span> 
										</div>
									</div>
								</a>

								<ul class="sub-menu" style="display: none;">
									<?php 
									$mainMenu = $this->db->query("
										SELECT * 
										FROM menu
										where status = '1' AND language_id = 2
										ORDER BY `position` ASC
										")->result();
										foreach($mainMenu as $row){ ?>

										<li>
											<a href="javascript:void(0)">
												<div>
													<div class="item-inner">
														<span> <?php echo $row->menu_name; ?> </span> 
													</div>
												</div>
											</a>
											<ul class="sub-menu" style="display: none;">
												<?php 
												$menuId = $row->menu_id;
												$subMenu = $this->db->query("
													SELECT * FROM menu_detail
													WHERE status = '1' AND language_id = 2 AND menu_id = '$menuId'
													ORDER BY `position` ASC
													")->result();
												foreach($subMenu as $rowSubmenu){
													?>
													<li>
														<a href="<?php echo site_url('back/menu_content/listContent/'.$rowSubmenu->menu_detail_id); ?>">
															<span><?php echo $rowSubmenu->menu_detail_name; ?></span>
														</a>
													</li>
													<?php } ?>
												</ul>
											</li>
											<?php } ?>
										</ul>
									</li>
									<!-- END SuviSanusi Content Editor -->

									<?php } ?> 
								</ul>
							</nav>
						</div>
					</div> 



					<div class="container-fluid container-fullw bg-white">
