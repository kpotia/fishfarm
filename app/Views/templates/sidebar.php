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
                    Fish listing
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
                    Fish tank listing
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
                    Product listing
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
              <p>Food  </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url('food'); ?>" class="nav-link">
                
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Food listing
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('food/add'); ?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Food </p>
                </a>
              </li>
              
            
              <li class="nav-item">
                <a href="<?= base_url('food/history');?>" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Food History listing
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php base_url('food/history/add'); ?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Food History</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-syringe"></i>
              <p>Vaccination</p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('vaccine') ?>" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Vaccination listing
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('vaccine/add')?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Vaccination</p>
                </a>
              </li>
              
            </ul>
          
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('vaccine/history')?>" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Vaccination history listing
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('vaccine/history/add');?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Vaccination history</p>
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
                    Supplier listing
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
                    Staff listing
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
                    Sales listing
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
                    Expense listing
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
                    Financial Report
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('report/fish')?>" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Fish Report
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('report/sales')?>" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Sales Report
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('report/Expense')?>" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Expense Report
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
                    Purchase listing
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
          <li class="nav-item">
            <a href="<?= base_url('setting'); ?>" class="nav-link">
            
              <i class="nav-icon fas fa-cog"></i>
              <p>Setting</p>
            </a>            
          </li>
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
