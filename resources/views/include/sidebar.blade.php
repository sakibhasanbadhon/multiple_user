    <nav class="page-sidebar" id="sidebar">
        <div id="sidebar-collapse">
            <div class="admin-block d-flex">
                <div>
                    <img src="./assets/img/admin-avatar.png" width="45px" />
                </div>
                <div class="admin-info">
                    <div class="font-strong">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div><small>Administrator</small></div>
            </div>
            <ul class="side-menu metismenu">
                <li>
                    <a class="active" href="index.html"><i class="sidebar-item-icon fa fa-th-large"></i>
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                <li class="heading">FEATURES</li>
                <li>
                    <a href="{{ route('app.provider') }}"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        Provider
                    </a>

                    {{-- <ul class="nav-2-level collapse">
                        <li>
                            <a href="colors.html">Colors</a>
                        </li>
                        <li>
                            <a href="typography.html">Typography</a>
                        </li>
                        <li>
                            <a href="panels.html">Panels</a>
                        </li>
                        <li>
                            <a href="buttons.html">Buttons</a>
                        </li>
                        <li>
                            <a href="tabs.html">Tabs</a>
                        </li>
                        <li>
                            <a href="alerts_tooltips.html">Alerts &amp; Tooltips</a>
                        </li>
                        <li>
                            <a href="badges_progress.html">Badges &amp; Progress</a>
                        </li>
                        <li>
                            <a href="lists.html">List</a>
                        </li>
                        <li>
                            <a href="cards.html">Card</a>
                        </li>
                    </ul> --}}

                </li>

            </ul>
        </div>
    </nav>
