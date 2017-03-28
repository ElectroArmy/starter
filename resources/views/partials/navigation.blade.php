<header role="banner">
    <nav role="navigation" class="navigation">
        @if  (Auth::guest())
            <div class="nav-left">
                <div class="menuIcon">
                    <a href="#menuExpand"><i class="fa fa-bars fa-4x"  aria-hidden="true"></i>
                    </a>
                </div><!-- /.menuIcon -->
                <div class="menu">
                    <ul>
                        <img srcset="/images/logox2.png 1280w,
                                /images/logox1.png 980w"
                             alt="The ormrepo thoughtful logo" class="logo">
                        <li><a href="https://www.ormrepo.co.uk/" class="nav-items">Back</a></li>
                        <li><a href="/about" class="nav-items">About</a></li>
                        <li><a href="/posts" class="nav-items">Blog</a></li>
                        <li><a href="/contact" class="nav-items">Contact</a></li>
                        <li><a href="/community" class="nav-items">Community</a></li>
                        <li><a href="/login" class="nav-items hide">Login</a></li>
                        <li><a href="/register" class="nav-items hide">Register</a></li>
                        <li><a href="/products" class="nav-items">Store</a></li>
                        <div class="search-form hide">

                            {!! Form::open(['method' => 'GET']) !!}
                            {!! Form::input('search', 'q', null, ['placeholder' => 'Search...', 'class' => 'search-box']) !!}
                            {!! Form::close() !!}
                            <i class="fa fa-search" name="search" aria-hidden="true"></i>

                        </div><!-- /.search-form -->
                     </ul>
                </div><!-- /.menu -->
           </div><!-- /.nav-left -->

            <div class="centered-logo">
                <img srcset="/images/game-logox2.png 1280w,
                             /images/game-logox1.png 980w"
                     alt="The Gamesstation logo">
            </div><!-- /.centered-logo -->

            <div class="nav-right">
                <ul>
                    <li><a href="/cart" class="nav-items"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
                            Basket</a></li>
                    <li><a href="/login" class="nav-items"><i class="fa fa-user" aria-hidden="true"></i>
                            Login</a></li>

                    <li><a href="/register" class="nav-items"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            Register</a></li>

                    <div class="search-form">

                        {!! Form::open(['method' => 'GET']) !!}
                        {!! Form::input('search', 'q', null, ['placeholder' => 'Search...', 'class' => 'search-box']) !!}
                        {!! Form::close() !!}
                        <i class="fa fa-search" name="search" aria-hidden="true"></i>

                    </div><!-- /.search-form -->
                </ul>
            </div><!-- /.nav-right -->
        @else
            <div class="nav-left">
                <div class="menuIcon">
                    <a href="#menuExpand"><i class="fa fa-bars fa-4x" aria-hidden="true"></i>
                    </a>
                </div><!-- /.menuIcon -->
                <div class="menu">
                            <ul>
                                <img srcset="/images/logox2.png 1280w,
                            /images/logox1.png 980w"
                                     alt="The ormrepo thoughtful logo" class="logo">
                                <li><a href="https://www.ormrepo.co.uk/" class="nav-items">Back</a></li>
                                <li><a href="/cart" class="nav-items hide">Basket</a></li>
                                <li><a href="/admin/posts" class="nav-items">Blog</a></li>
                                <li><a href="/chat" class="nav-items hide">Chat</a></li>
                                <li><a href="/contact" class="nav-items">Contact</a></li>
                                <li><a href="/community" class="nav-items">Community</a></li>
                                <li><a href="/admin/products" class="nav-items">Store</a></li>
                                <li><a href="{{ route('profile', [Auth::user()->username])  }} " class="nav-items">Profile</a></li>
                                <li><a href="/support" class="nav-items">Support</a></li>
                                <li><a href="{{ url('/logout') }}"
                                       class="nav-items hide"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <div class="search-form hide">

                                    {!! Form::open(['method' => 'GET']) !!}
                                    {!! Form::input('search', 'q', null, ['placeholder' => 'Search...', 'class' => 'search-box']) !!}
                                    {!! Form::close() !!}
                                    <i class="fa fa-search" name="search" aria-hidden="true"></i>

                                </div><!-- /.search-form -->

                            </ul>
                </div><!-- /.menu -->
            </div><!-- /.nav-left -->




            <div class="centered-logo">
                <img srcset="/images/game-logox2.png 1280w,
                             /images/game-logox1.png 980w"
                            alt="The Gamesstation logo">
            </div><!-- /.centered-logo -->


            <div class="nav-right">

                <ul>
                    <li><a href="/chat" class="nav-items"><i class="fa fa-comment-o" aria-hidden="true"></i>
                        Chat</a></li>
                    <li><a href="/cart" class="nav-items"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
                            Basket</a></li>
                    <li><a href="{{ url('/logout') }}"
                           class="nav-items"
                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i class="fa fa-user" aria-hidden="true"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <div class="search-form">
                        {!! Form::open(['method' => 'GET']) !!}
                        {!! Form::input('search', 'q', null, ['placeholder' => 'Search...', 'class' => 'search-box']) !!}
                        {!! Form::close() !!}
                        <i class="fa fa-search" name="search" aria-hidden="true"></i>
                    </div><!-- /.search-box -->
                </ul>

        </div><!-- /.nav-right -->
        @endif
    </nav><!-- /.navigation -->
</header>

