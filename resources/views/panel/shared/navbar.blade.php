<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <ul class="navbar-nav ml-auto">
        <div class="dropdown">
            <button class="btn dropdown-toggle border-0" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                @auth
                    {{ auth()->user()->username }}
                @endauth
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <form action="{{ route('panel.logout') }} " method="POST" class="dropdown-item">
                        @csrf
                        <button class="border-0" type="submit" style="background: transparent">
                            Logout
                        </button>
                    </form>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('panel.profile.edit') }}">Profile</a>
                </li>
            </ul>
        </div>
    </ul>
</nav>
