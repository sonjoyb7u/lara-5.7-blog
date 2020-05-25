<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ asset('assets/admin/images/user.png') }}" width="48" height="48" alt="{{ Auth::user()->image }}" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                <div class="email">{{ Auth::user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i style="color: #2196F3;" class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i>{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                @if(request()->is('admin/*'))
                <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Widgets</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Cards</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="pages/widgets/cards/basic.html">Basic</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/cards/colored.html">Colored</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/cards/no-header.html">No Header</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Infobox</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="pages/widgets/infobox/infobox-1.html">Infobox-1</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/infobox/infobox-2.html">Infobox-2</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/infobox/infobox-3.html">Infobox-3</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/infobox/infobox-4.html">Infobox-4</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/infobox/infobox-5.html">Infobox-5</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('admin/tag', 'admin/tag/*') ? 'active' : '' }}">
                    <a href="" class="menu-toggle">
                        <i class="material-icons">label</i>
                        <span>Tag Section</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ request()->is('admin/tag/create') ? 'active' : '' }}">
                            <a href="{{ route('admin.tag.create') }}">Add Tag</a>
                        </li>
                        <li class="{{ request()->is('admin/tag', 'admin/tag/edit/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.tag.index') }}">Manage Tag</a>
                        </li>
                    </ul>
                </li>
                <li class="header">System</li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i><span>{{ __('Logout') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endif
                @if(request()->is('author/*'))
                    <li class="{{ request()->is('author/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('author.dashboard') }}">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="header">System</li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i><span>{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; {{ date('Y') }}
                <a href="{{ request()->is('admin/*') ? route('admin.dashboard') : route('author.dashboard') }}">
                    @if(request()->is('admin/*'))
                    ADMIN PANEL <strong>[ LARA 5.7 BLOG }</strong>
                    @elseif(request()->is('author/*'))
                    AUTHOR PANEL <strong>[ LARA 5.7 BLOG }</strong>
                    @endif
                </a>.
            </div>

        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
