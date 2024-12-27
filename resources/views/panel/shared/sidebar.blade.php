{{-- Пока просто поставил if, у меня нету roles, permissions table и т.д чтобы написать middleware --}}
<div class="navbar-nav sidebar accordion d-none d-md-flex flex-column flex-shrink-0 p-3 bg-dark bg-opacity-100">
    <a href="{{ route('panel.home') }}" class="d-flex align-items-center link-body-emphasis text-decoration-none">
        <div class="text-light h4 fw-normal text-center">
            My news
        </div>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        @if(auth()->user()->role === 'admin')
            <li>
                <a href="{{ route('panel.home') }}" class="nav-link {{ request()->routeIs('panel.home') ? 'text-primary' : 'text-white' }}">
                    Dashboard
                </a>
            </li>
        @endif
        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'content-manager')
            <li>
                <a href="{{ route('panel.news.index') }}" class="nav-link {{ request()->routeIs('panel.news.index') ? 'text-primary' : 'text-white' }}">
                    News
                </a>
            </li>
        @endif
        @if(auth()->user()->role === 'admin')
            <li>
                <a href="{{ route('panel.users.index') }}" class="nav-link {{ request()->routeIs('panel.users.index') ? 'text-primary' : 'text-white' }}"">
                    Users
                </a>
            </li>
        @endif
    </ul>
</div>

