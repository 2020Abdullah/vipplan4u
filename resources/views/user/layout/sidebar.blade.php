  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-text d-flex flex-column">
                @auth
                  <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
                @endauth
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">شراء باقة</span>
        </a>
      </li>
    </ul>
  </nav>