<nav>
    <div class="nav-wrapper grey darken-3">
        <ul>
            <li><a href="#!"><span><b>Welcome </b>{{auth()->user()->name}}</span></a></li>
        </ul>
        <ul class="right">
            <li><a  href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="icon"><i class="material-icons" >power_settings_new</i></div>
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            <li><a href="#!"><i class="material-icons">apps</i></a></li>
            <li><a href="#!"><i class="material-icons">account_circle</i></a></li>
        </ul>
    </div>
</nav>