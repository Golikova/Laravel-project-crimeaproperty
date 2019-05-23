<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand"  href="/">@lang('nav.appName')</a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav"  >
              <li class="dropdown">
                <a href="/posts" >@lang('nav.posts')</a>
                <li><a href="/posts/house">@lang('nav.houses')</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        @lang('nav.apartment')
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/posts/studio">@lang('nav.studio')</a></li>
                        <li><a href="/posts/apartment1">@lang('nav.apartment1')</a></li>
                        <li><a href="/posts/apartment2">@lang('nav.apartment2')</a></li>
                        <li><a href="/posts/apartment3">@lang('nav.apartment3')</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        @lang('nav.other')
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/posts/garage">@lang('nav.garage')</a></li>
                        <li><a href="/posts/area">@lang('nav.area')</a></li>
                        <li><a href="/posts/other">@lang('nav.other')</a></li>
                    </ul>
                </li>
                <li><a href="/about">@lang('nav.about')</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                <!-- Control Links -->

                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        @lang('admin.control')
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/users">@lang('admin.users')</a></li>
                        <li><a href="/types">@lang('admin.types')</a></li>
                        <li><a href="/cities">@lang('admin.cities')</a></li>
                        <li><a href="/abouts">@lang('nav.aboutEditing')</a></li>

                    </ul>
                </li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> @lang('nav.exit')</a></li>


               
                
                <li ><a href="/setRus"><small>русский</small> </a></li>
                <li ><a href="/setEng"><small>english</small></a></li>
            </ul>
        </div>
    </div>
</nav>
