  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-text d-flex flex-column">
              @if (auth('admin')->check())
                <span class="font-weight-bold mb-2">{{ auth('admin')->user()->name }}</span>
              @else
                <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
              @endif
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">إحصائيات</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('package.index') }}">
          <i class="mdi mdi-card" aria-hidden="true"></i>
          <span class="menu-title">الباقات</span>
        </a>
      </li>
    </ul>
  </nav>