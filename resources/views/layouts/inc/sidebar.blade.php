<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('favicon.png') }}" alt="Logo Politani" width="36px">
            </span>
            <span class="text-capitalize app-brand-text demo menu-text fw-bolder ms-2">Samarinda</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->is('home', 'admin/home') ? 'active' : '' }}">
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Data Master">Data Semua</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('transaksi.index') }}" class="menu-link">
                        <div>Transaksi</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('customer.index') }}" class="menu-link">
                        <div>Customer</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div>Laporan</div>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</aside>
