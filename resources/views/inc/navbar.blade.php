 <!-- Sidebar -->

 <?php 
  use Illuminate\Support\Facades\DB;
  use App\rbac;
  use App\menu_list;
  $Menus = DB::table('rbacs')
   ->leftJoin('menu_lists', 'rbacs.main_menu_id', '=', 'menu_lists.sub_menu_of', 'rbacs.role_id', '=', 'menu_lists.role_id')
   ->where('rbacs.role_id', Session::get('role'))
   ->where('menu_lists.role_id', Session::get('role'))->get();
  $MainMenus = array();
  $MainMenuDescription = array();
  $MainMenuIcon = array();
  foreach ($Menus as $a) {
    $MainMenus [$a->main_menu_id] = $a->main_menu_title;
    $MainMenuDescription [$a->main_menu_id] = $a->menu_description;
    $MainMenuIcon [$a->main_menu_id] = $a->menu_icon;
  }
 ?>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">Tenvic HRMS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Employees Start Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item Employees - Pages Collapse Menu -->

      <?php 

      foreach ($MainMenus as $key => $value) {
        echo '  <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse'.$value.'" aria-expanded="true" aria-controls="collapse'.$value.'">
                <i class="'.$MainMenuIcon[$key].'"></i>
                  <span> '.$value.' </span>
                </a>
                <div id="collapse'.$value.'" class="collapse" aria-labelledby="heading'.$value.'" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">'.$MainMenuDescription[$key].'</h6>
              ';
        foreach ($Menus as $a) {
          if($a->main_menu_id == $key){
              echo ' <a class="collapse-item" href="'.$a->sub_menu_link.'">'.$a->sub_menu_title.'</a>';
          }
        }
        echo '</div></div></li>  <hr class="sidebar-divider">';
      }
      ?>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Session::get('name') }}</span>
                <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->