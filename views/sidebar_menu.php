<?php session_start();


?>

<!-- Sidebar Menu -->
      <nav class="mt-2">
	  <br>
	  <br>
         <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
         <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sign"></i>
              <p>
                Establish Context
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="documents_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Documents</p>
                </a>
              </li>
			   
               <li class="nav-item">
                <a href="mixed_values" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mixed Values</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Value Pie</p>
                </a>
              </li>
              
            </ul>
          </li>-->
         <div>
		 
		  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		  <?php if(isset($_SESSION['project_id'])){ ?>
		<li class="nav-item has-treeview <?php if($_SESSION['menu_active'] == "establish_context"){ echo 'menu-open'; }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sign"></i>
              <p>
                &nbsp;<?php echo $_SESSION[$_SESSION['lang']]['Establish Context']; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="documents_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $_SESSION[$_SESSION['lang']]['Documents']; ?></p>
                </a>
              </li>
			  
			  <?php 
			  
			
			  
			  if($_SESSION['project_type'] == 1){ ?>
			  
			  
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo $_SESSION[$_SESSION['lang']]['Mixed Values']; ?>
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="enter_values" class="nav-link">
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="far fa-dot-circle nav-icon"></i>
                      <p><?php echo $_SESSION[$_SESSION['lang']]['Enter the values']; ?></p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="select_values" class="nav-link">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="far fa-dot-circle nav-icon"></i>
                      <p><?php echo $_SESSION[$_SESSION['lang']]['Select the values scale']; ?></p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="build_value" class="nav-link">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="far fa-dot-circle nav-icon"></i>
                      <p><?php echo $_SESSION[$_SESSION['lang']]['Build the value pie']; ?></p>
                    </a>
                  </li>
                </ul>
              </li>
			  <?php }else{ ?>
			  
			   
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo $_SESSION[$_SESSION['lang']]['Single general value']; ?>
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  
                  <li class="nav-item">
                    <a href="build_value_sd" class="nav-link">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="far fa-dot-circle nav-icon"></i>
                      <p><?php echo $_SESSION[$_SESSION['lang']]['Build the value pie']; ?></p>
                    </a>
                  </li>
                </ul>
              </li>
			  
			  <?php } ?>
			  
			  
             <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Value pie</p>
                </a>
              </li>-->
            </ul>
          </li>	
		  </ul>
		  
		  </div>
		  </nav>
		  <nav class="mt-2">
		  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item <?php if($_SESSION['menu_active'] == "ir_risks"){ echo 'menu-open'; }?>">
            <a href="ir_risks" class="nav-link">
              <i class="nav-icon fas fa-bullseye"></i>
              <p><?php echo $_SESSION[$_SESSION['lang']]['Identify Risks']; ?></p>
            </a>
          </li>
                    
          <li class="nav-item <?php if($_SESSION['menu_active'] == "analyze_risks"){ echo 'menu-open'; }?>">
            <a href="analyze_risks" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p><?php echo $_SESSION[$_SESSION['lang']]['Analyze Risks']; ?></p>
            </a>
          </li>
          
		  
          <li class="nav-item has-treeview <?php if($_SESSION['menu_active'] == "evaluate_risks"){ echo 'menu-open'; }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-glasses"></i>
              <p>
               <?php echo $_SESSION[$_SESSION['lang']]['Evaluate Risk']; ?> 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="analyze_graphs" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $_SESSION[$_SESSION['lang']]['Risk graphs']; ?> </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="matrix" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $_SESSION[$_SESSION['lang']]['Magnitude of Risk menu']; ?></p>
                </a>
              </li>
             
            </ul>
          </li>
          
          <li class="nav-item has-treeview <?php if($_SESSION['menu_active'] == "treat_risks"){ echo 'menu-open'; }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                <?php echo $_SESSION[$_SESSION['lang']]['Treat Risk']; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			<li class="nav-item">
                <a href="tr_risk_option" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $_SESSION[$_SESSION['lang']]['Risk options']; ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="identify_options" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $_SESSION[$_SESSION['lang']]['Identify Options']; ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="analyze_options" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $_SESSION[$_SESSION['lang']]['Analyze Options']; ?></p>
                </a>
              </li>
             <li class="nav-item">
                <a href="treat_risk" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $_SESSION[$_SESSION['lang']]['Evaluate options']; ?></p>
                </a>
              </li>
             <li class="nav-item">
                <a href="risk_history" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $_SESSION[$_SESSION['lang']]['Risk History']; ?></p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item <?php if($_SESSION['menu_active'] == "comunicate"){ echo 'menu-open'; }?>">
            <a href="communicate" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p><?php echo $_SESSION[$_SESSION['lang']]['Communicate']; ?></p>
            </a>
          </li>
                    
         
		  
		  
		  <?php }else{ ?>
		  
		   <li class="nav-item">
			<div style="padding:7px;background-color:#848468;color:#fff;"><em><?php echo $_SESSION[$_SESSION['lang']]['Select a project to <br>open more options']; ?>.</em></div>
           </li>
		  <br>&nbsp;
		  
		  <?php } ?>
		  
		   <?php if($_SESSION['perfil_logado'] == "1" || $_SESSION['perfil_logado'] == "2" || $_SESSION['perfil_logado'] == "3" ){ ?>
          <li class="nav-item has-treeview <?php if($_SESSION['menu_active'] == "admin"){ echo 'menu-open'; }?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
               <?php echo $_SESSION[$_SESSION['lang']]['Administration']; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			 
            <?php if($_SESSION['perfil_logado'] != "3"){ ?>
              <li class="nav-item">
                <a href="project_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $_SESSION[$_SESSION['lang']]['Projects']; ?></p>
                </a>
              </li>
             <?php } ?>
             
             <?php if($_SESSION['perfil_logado'] == "1"){ ?>
              <li class="nav-item">
                <a href="institution_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $_SESSION[$_SESSION['lang']]['Institutions']; ?></p>
                </a>
              </li>
			
              <li class="nav-item">
                <a href="users_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $_SESSION[$_SESSION['lang']]['Users']; ?></p>
                </a>
              </li>
               <?php } ?>
			   <li class="nav-item">
                <a href="ir_agents" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $_SESSION[$_SESSION['lang']]['Agents']; ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ir_risk_group" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $_SESSION[$_SESSION['lang']]['Risk Groups']; ?></p>
                </a>
              </li> 
			  
            </ul>
          </li>
		  <?php } ?>
          <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p><?php echo $_SESSION[$_SESSION['lang']]['Exit']; ?></p>
            </a>
          </li>
          
          
        </ul>
      </nav>