<?php  $session = session(); ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-list elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">FishFARM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
        <a href="#" class="d-block"><?=  $session->get('firstname').' '. $session->get('lastname') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="<?= base_url('dashboard');?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-fish"></i>
              <p>Fish  </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url('fish')?>" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Fish list
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('fish/add')?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Fish</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-fish"></i>
              <p>Fish Tank </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url('fish/tank')?>" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Fish tank list
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('fish/tank/add')?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Fish tank</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>Product  </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url('product'); ?>" class="nav-link">
                
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Product list
                  </p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= base_url('product/add'); ?>" class="nav-link">
                
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-utensils"></i>
              <p>Food & Drugs </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url('food'); ?>" class="nav-link">
                
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Food/Drug 
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('food/add'); ?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Food/Drug </p>
                </a>
              </li>
              
            
              <li class="nav-item">
                <a href="<?= base_url('food/history');?>" class="nav-link">                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Food/Drug History
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('food/history/add');?>" class="nav-link">                  
                  <i class="fas fa-plus nav-icon"></i>
                  <p>
                    Add Food/Drug History 
                  </p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-houzz"></i>
              <p>Inventory </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url('inventory'); ?>" class="nav-link">
                
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Inventory
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('inventory/add'); ?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Inventory </p>
                </a>
              </li>             
            </ul>
          </li>
         

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>Supplier  </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('supplier');?>" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Supplier list
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('supplier/add');?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Supplier</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Staff  </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?=base_url('staff');?>" class="nav-link">
                
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Staff list
                  </p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?=base_url('staff/add');?>" class="nav-link">
                
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Staff</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Sales Persons  </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?=base_url('salesperson');?>" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Sales list
                  </p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?=base_url('salesperson/add');?>" class="nav-link">
                
                  <i class="fas fa-list nav-icon"></i>
                  <p>Add Sales Person</p>
                </a>
              </li>
              
            </ul>
          </li>

         

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>Expense  </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('expense')?>" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Expense list
                  </p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= base_url('expense/add')?>" class="nav-link">
                
                  <i class="fas fa-list nav-icon"></i>
                  <p>Add Expense</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="<?=base_url('report/financial')?>" class="nav-link">
              <i class="nav-icon fas fa-money-bill-wave"></i>
              <p>Report  </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('report/financial')?>" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Financial 
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('report/supplier')?>" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Supplier
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('report/today')?>" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Today
                  </p>
                </a>
              </li>             
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-receipt"></i>
              <p>Purchase  </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('purchase') ?>" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Purchase list
                  </p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= base_url('purchase/add') ?>" class="nav-link">
              <i class="fas fa-list nav-icon"></i>
                  <p>Add Purchase</p>
                </a>
              </li>
              
            </ul>
          </li>
         <!--  <li class="nav-item">
            <a href="<?= base_url('setting'); ?>" class="nav-link">
            
              <i class="nav-icon fas fa-cog"></i>
              <p>Setting</p>
            </a>            
          </li> -->
          <li class="nav-item">
            <a href="<?= base_url('logout'); ?>" class="nav-link">
            
              <i class="nav-icon fas fa-cog"></i>
              <p>Logout</p>
            </a>            
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
