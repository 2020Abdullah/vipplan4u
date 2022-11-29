  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">الدفع</span>
        </a>
      </li>
    </ul>
  </nav>