<?php  $session = session(); ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-list elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">FishFARM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
        <a href="#" class="d-block"><?=  $session->get('firstname').' '. $session->get('firstname') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="#" class="nav-link">
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
                <a href="#" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Fish listing
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= 'fishfarm_ci/public/'.route_to('addfish')?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Fish</p>
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
                <a href="#" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Product listing
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-utensils"></i>
              <p>Food History  </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Food History listing
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Food History</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-syringe"></i>
              <p>Vaccination  </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Vaccination listing
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Vaccination</p>
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
                <a href="#" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Supplier listing
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
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
                <a href="#" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Staff listing
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Staff</p>
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
                <a href="#" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Expense listing
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Add Expense</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill-wave"></i>
              <p>Sales  </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Sales listing
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Add Sales</p>
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
                <a href="#" class="nav-link">
                  
                  <i class="fas fa-list nav-icon"></i>
                  <p>
                    Purchase listing
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Add Purchase</p>
                </a>
              </li>
              
            </ul>
          </li>
          
   
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
