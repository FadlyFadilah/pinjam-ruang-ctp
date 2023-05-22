<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">PELITA Cimahi TechnoPark</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}"
                        href="{{ route('admin.home') }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li
                        class="nav-item has-treeview {{ request()->is('permissions*') ? 'menu-open' : '' }} {{ request()->is('roles*') ? 'menu-open' : '' }} {{ request()->is('users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is('permissions*') ? 'active' : '' }} {{ request()->is('roles*') ? 'active' : '' }} {{ request()->is('users*') ? 'active' : '' }}"
                            href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.permissions.index') }}"
                                        class="nav-link {{ request()->is('permissions') || request()->is('permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}"
                                        class="nav-link {{ request()->is('roles') || request()->is('roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}"
                                        class="nav-link {{ request()->is('users') || request()->is('users/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('content_management_access')
                    <li
                        class="nav-item has-treeview {{ request()->is('admin/content-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/content-tags*') ? 'menu-open' : '' }} {{ request()->is('admin/content-pages*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is('admin/content-categories*') ? 'active' : '' }} {{ request()->is('admin/content-tags*') ? 'active' : '' }} {{ request()->is('admin/content-pages*') ? 'active' : '' }}"
                            href="#">
                            <i class="fa-fw nav-icon fas fa-book">

                            </i>
                            <p>
                                {{ trans('cruds.contentManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('content_category_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.content-categories.index') }}"
                                        class="nav-link {{ request()->is('admin/content-categories') || request()->is('admin/content-categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.content-tags.index') }}"
                                        class="nav-link {{ request()->is('admin/content-tags') || request()->is('admin/content-tags/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-tags">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_page_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.content-pages.index') }}"
                                        class="nav-link {{ request()->is('admin/content-pages') || request()->is('admin/content-pages/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-file">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentPage.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('ruangan_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.ruangans.index') }}"
                            class="nav-link {{ request()->is('ruangans') || request()->is('ruangans/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon far fa-hospital">

                            </i>
                            <p>
                                {{ trans('cruds.ruangan.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('barang_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.barangs.index') }}"
                            class="nav-link {{ request()->is('barangs') || request()->is('barangs/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-briefcase">

                            </i>
                            <p>
                                {{ trans('cruds.barang.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('peminjaman_ruangan_access')
                    <li
                        class="nav-item has-treeview {{ request()->is('peminjaman-studio-dubbings*') ? 'menu-open' : '' }} {{ request()->is('peminjaman-ruang-kaca-bitcs*') ? 'menu-open' : '' }} {{ request()->is('peminjaman-ches*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is('peminjaman-studio-dubbings*') ? 'active' : '' }} {{ request()->is('peminjaman-ruang-kaca-bitcs*') ? 'active' : '' }} {{ request()->is('peminjaman-ches*') ? 'active' : '' }}"
                            href="#">
                            <i class="fa-fw nav-icon fas fa-hotel">

                            </i>
                            <p>
                                {{ trans('cruds.peminjamanRuangan.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('ruangctp_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.ruangctps.index') }}"
                                        class="nav-link {{ request()->is('admin/ruangctps') || request()->is('admin/ruangctps/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-door-open">

                                        </i>
                                        <p>
                                            Peminjaman Cimahi TechnoPark
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('peminjaman_studio_dubbing_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.peminjaman-studio-dubbings.index') }}"
                                        class="nav-link {{ request()->is('peminjaman-studio-dubbings') || request()->is('peminjaman-studio-dubbings/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-microphone">

                                        </i>
                                        <p>
                                            {{ trans('cruds.peminjamanStudioDubbing.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('peminjaman_ruang_kaca_bitc_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.peminjaman-ruang-kaca-bitcs.index') }}"
                                        class="nav-link {{ request()->is('peminjaman-ruang-kaca-bitcs') || request()->is('peminjaman-ruang-kaca-bitcs/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-door-closed">

                                        </i>
                                        <p>
                                            {{ trans('cruds.peminjamanRuangKacaBitc.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('peminjaman_ch_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.peminjaman-ches.index') }}"
                                        class="nav-link {{ request()->is('peminjaman-ches') || request()->is('peminjaman-ches/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-archway">

                                        </i>
                                        <p>
                                            {{ trans('cruds.peminjamanCh.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('studio_foto_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.studio-fotos.index') }}"
                                        class="nav-link {{ request()->is('admin/studio-fotos') || request()->is('admin/studio-fotos/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-camera">

                                        </i>
                                        <p>
                                            {{ trans('cruds.studioFoto.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('peminjaman_barang_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.peminjaman-barangs.index') }}"
                            class="nav-link {{ request()->is('peminjaman-barangs') || request()->is('peminjaman-barangs/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-weight-hanging">

                            </i>
                            <p>
                                {{ trans('cruds.peminjamanBarang.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('pendaftaran_access')
                    <li
                        class="nav-item has-treeview {{ request()->is('penelitians*') ? 'menu-open' : '' }} {{ request()->is('kps*') ? 'menu-open' : '' }} {{ request()->is('pkls*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is('penelitians*') ? 'active' : '' }} {{ request()->is('kps*') ? 'active' : '' }} {{ request()->is('pkls*') ? 'active' : '' }}"
                            href="#">
                            <i class="fa-fw nav-icon fas fa-sticky-note">

                            </i>
                            <p>
                                {{ trans('cruds.pendaftaran.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('penelitian_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.penelitians.index') }}"
                                        class="nav-link {{ request()->is('penelitians') || request()->is('penelitians/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-edit">

                                        </i>
                                        <p>
                                            {{ trans('cruds.penelitian.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('kp_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.kps.index') }}"
                                        class="nav-link {{ request()->is('kps') || request()->is('kps/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon far fa-edit">

                                        </i>
                                        <p>
                                            {{ trans('cruds.kp.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('pkl_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.pkls.index') }}"
                                        class="nav-link {{ request()->is('pkls') || request()->is('pkls/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-pen">

                                        </i>
                                        <p>
                                            {{ trans('cruds.pkl.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('cm_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.cms.index') }}"
                                        class="nav-link {{ request()->is('admin/cms') || request()->is('admin/cms/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-highlighter">

                                        </i>
                                        <p>
                                            {{ trans('cruds.cm.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route('admin.systemCalendar') }}"
                        class="nav-link {{ request()->is('system-calendar') || request()->is('system-calendar/*') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-calendar nav-icon">

                        </i>
                        <p>
                            {{ trans('global.systemCalendar') }}
                        </p>
                    </a>
                </li>
                @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                                href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
