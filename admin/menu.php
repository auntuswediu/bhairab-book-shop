  <?php
  include '../config.php';
  if ( !isset($_SESSION['email']) && $_SESSION['role'] != 'admin' ) {
    header("Location: login");
  }
  ?>
  <header class="main-header">
    <!-- Logo -->
    <a href="../index" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b> S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Book Shop</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if(!empty($_SESSION['img'])){ echo '<img src="../images/'.$_SESSION['img'].'" class="user-image" >'; } ?>
              <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php if(!empty($_SESSION['img'])){ echo '<img src="../images/'.$_SESSION['img'].'" class="img-circle" >'; } ?>
                <p>
                   <?php echo $_SESSION['name']; ?> - <?php echo $_SESSION['role']; ?>
                  <small>Member since <?php echo date('F d, Y', strtotime($_SESSION['created_at'])); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="profile" class="btn btn-info btn-block btn-flat">Profile</a>
                  </div>
                  <!-- <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div> -->
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="change-password" class="btn btn-default btn-flat">Change password</a>
                </div>
                <div class="pull-right">
                  <a href="logout"  class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class=" menu">
          <a href="index">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

         <li class="menu">
          <a href="categories">
            <i class="fa fa-list-alt"></i> <span>Categories</span>
          </a>
        </li>
        <li class="menu">
          <a href="products">
            <i class="fa fa-product-hunt"></i> <span>Products</span>
          </a>
        </li>
        <li class="menu">
          <a href="order-products">
            <i class="fa fa-product-hunt"></i> <span>Order Products &nbsp;&nbsp;&nbsp;<span class="label label-success"><?php $query_order_product = mysqli_query($con,"SELECT * from invoice where delivery_status = 0"); echo mysqli_num_rows($query_order_product); ?></span></span>
            
          </a>
        </li>

        <li class="menu">
          <a href="feedback">
            <i class="fa fa-comment"></i> <span>Feedback &nbsp;&nbsp;&nbsp;<span class="label label-success"><?php $query_fdb = mysqli_query($con,"SELECT * from product_review"); echo mysqli_num_rows($query_fdb); ?></span></span>
          </a>
        </li>
        <li class="menu">
          <a href="message">
            <i class="fa fa-envelope"></i> <span>Messages &nbsp;&nbsp;&nbsp;<span class="label label-info"><?php $query_msg = mysqli_query($con,"SELECT * from messages"); echo mysqli_num_rows($query_msg); ?></span></span>
          </a>
        </li>
        <!-- <li class="menu">
          <a href="orderShow.php">
            <i class="fa fa-cart-arrow-down fa-lg"></i> <span>Own Order</span>
          </a>
        </li>
        <li class="menu">
          <a href="allOrder.php">
            <i class="fa fa-cart-arrow-down fa-lg"></i> <span>All Order</span>
          </a>
        </li> -->

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>