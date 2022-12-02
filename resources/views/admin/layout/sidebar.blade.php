  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">{{ auth('admin')->user()->name }}</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">إحصائيات</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('package.index')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">الباقات</span>
        </a>
      </li>

        <li class="nav-item active">
        <a class="nav-link" href="{{route('payment_method.index')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">payment method</span>
        </a>
      </li>
    </ul>
  </nav>