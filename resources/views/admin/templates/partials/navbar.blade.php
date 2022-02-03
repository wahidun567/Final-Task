 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

     <ul class="navbar-nav ml-auto"> <li class="nav-item dropdown"> <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> {{-- {{ Auth::user()->name }} --}}Muhammad Nur Wahid </a> <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a> <form id="logout-form" action="/logout" method="POST" class="d-none"> @csrf </form> </div> </li> </ul> </ul>
        {{-- <li class="drowpdown user user-menu">
        <a href="" class="dropdown-toggle" data-toggle="dropdown">
            <span class="hidden-xs">   Admin </span>
        </a>
        <ul class="dropdown-menu">
            <li class="user-footer">
                <div class="pull-right">
                    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                    class="btn btn-block btn-default btn-flat">Sign Out</a>
                </div>
                <form id="logout-form" action="" method="POST" class="d-none">
                    @csfr
                </form>
            </li>
        </ul>
        </li> --}}

        
    </ul>
</nav>