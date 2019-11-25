<div class="sidebar" data-color="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="{{ route('welcome') }}" class="simple-text logo-mini">
          ERA
        </a>
        <a href="{{ route('welcome') }}" class="simple-text logo-normal">
          Restaurant
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li @if (Request::is('admin/dashboard'))
              class="active"
          @endif>
            <a href="{{ route('admin.dashboard') }}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li @if (Request::is('admin/slider*'))
              class="active"
          @endif>
            <a href="{{ route('slider.index') }}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Sliders Tables</p>
            </a>
          </li>
          <li @if (Request::is('admin/menu*'))
              class="active"
          @endif>
            <a href="{{ route('menu.index') }}">
              <i class="now-ui-icons location_map-big"></i>
              <p>Menu</p>
            </a>
          </li>
          <li>
            <a href="./notifications.html">
              <i class="now-ui-icons files_paper"></i>
              <p>Orders</p>
            </a>
          </li>
          <li>
            <a href="./user.html">
              <i class="now-ui-icons ui-2_time-alarm"></i>
              <p>Reservations</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
