<div class="brand-logo">
    <a href="index.html">
        <div class="brand-text brand-big visible text-uppercase"><i class="icon-copy fi-star"></i><strong class="text-primary">   POS</strong><strong>SYSTEM</strong></div>

    </a>
    <div class="close-sidebar" data-toggle="left-sidebar-close">
        <i class="ion-close-round"></i>
    </div>
</div>
<div class="menu-block customscroll">
    <div class="sidebar-menu">
        <ul id="accordion-menu">
                <a href="{{ route('dashboard.welcome') }}" class="dropdown-toggle no-arrow">
                    <span class="micon dw dw-house-1"></span><span class="mtext">L'Accueil </span>
                </a>
                @if (auth()->user()->hasPermission('read_categories'))
                <a href="{{ route('dashboard.categories.index') }}" class="dropdown-toggle no-arrow">
                    <span class="micon dw dw-list"></span><span class="mtext">Les Catégories</span>
                </a>
                @endif
                @if (auth()->user()->hasPermission('read_products'))
                <a href="{{ route('dashboard.products.index') }}" class="dropdown-toggle no-arrow">
                    <span class="micon dw dw-shop"></span><span class="mtext">Les Produits</span>
                </a>
                @endif
                @if (auth()->user()->hasPermission('read_clients'))
                <a href="{{ route('dashboard.clients.index') }}" class="dropdown-toggle no-arrow">
                    <span class="micon dw dw-deal"></span><span class="mtext">Les Clients</span>
                </a>
                @endif
                @if (auth()->user()->hasPermission('read_orders'))
                <a href="{{ route('dashboard.orders.index') }}" class="dropdown-toggle no-arrow">
                    <span class="micon dw dw-shopping-cart-1"></span><span class="mtext">Les Commandes </span>
                </a>
                @endif
                @if (auth()->user()->hasPermission('read_users'))
                <a href="{{ route('dashboard.users.index') }}" class="dropdown-toggle no-arrow">
                    <span class="micon dw dw-user"></span><span class="mtext">Les Modérateurs</span>
                </a>
                @endif
                <a href="{{ route('dashboard.about') }}" class="dropdown-toggle no-arrow mt-5">
                    <span class="micon dw dw-search2"></span><span class="mtext">A Propos</span>
                </a>
        </ul>
    </div>
</div>
