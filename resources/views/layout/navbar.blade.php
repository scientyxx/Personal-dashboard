<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
      {{-- <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-link" style="color: grey!important;padding-left: 65rem;}">Logout</button>
    </form> --}}
    {{-- <li class="dropdown ">
        <a href="#" class="dropdown-toggle" style="font-size: 15px;" data-toggle="dropdown">
        Indonesia
        </a>
        <ul class="dropdown-menu">
                                                <li>
            <a href="http://hr_colmitra.test/lang/en">English</a>
        </li>
                                        <li>
            <a href="http://hr_colmitra.test/lang/fr">Fran&ccedil;ais</a>
        </li>
                </ul>
        </li> --}}
                @php
            use Illuminate\Support\Facades\Auth;

            $user = Auth::user();
            $name = $user->name;
        @endphp
        <div class="dropdown user user-menu" style="padding-left: 67rem;">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: black;">
                <i class="fa fa-user"></i>
                <span>{{ $name  }}</span>
            </a>
            <div class="dropdown-menu dropdown-custom dropdown-menu-right" style="padding: 5px;">
                        <li>
                        <form action="#" method="POST" style="display: contents;">
                            @csrf
                            <button type="submit" class="btn btn-link" style="color: grey !important;">
                                <i class="fa fa-user fa-fw pull-right"></i>
                                Profil
                            </button>
                        </form>
                        </li>
                        {{-- <li>
                        <form action="#" method="POST" style="display: contents;">
                            @csrf
                            <button type="submit" class="btn btn-link" style="color: grey !important;">
                                <i class="fa fa-lock fa-fw pull-right"></i>
                                Password
                            </button>
                        </form>
                        </li> --}}
                        <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: contents;">
                            @csrf
                            <button type="submit" class="btn btn-link" style="color: grey !important;">
                                <i class="fa fa-ban fa-fw pull-right"></i>
                                Logout
                            </button>
                        </form>
                        </li>
                    </div>
        </div>

  {{-- <div class="navbar-right">
            <ul class="dropdown-menu">
                                    <li class="dropdown">
<a href="#" class="dropdown-toggle" style="font-size: 15px;" data-toggle="dropdown">
Indonesia
</a>
<ul class="dropdown-menu">
                                        <li>
    <a href="http://hr_colmitra.test/lang/en">English</a>
</li>
                                <li>
    <a href="http://hr_colmitra.test/lang/fr">Fran&ccedil;ais</a>
</li>
        </ul>
</li>


        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>
                <span>Susi Fitrianya <i class="caret"></i></span>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li class="dropdown-header text-center">Kelola</li>


                <li class="divider"></li>

                    <li>
                        <a href="http://hr_colmitra.test/employee/profile">
                        <i class="fa fa-user fa-fw pull-right"></i>
                            Profil
                        </a>
                        <a data-toggle="modal" href="http://hr_colmitra.test/employee/password">
                        <i class="fa fa-lock fa-fw pull-right"></i>
                            Kata Sandi
                        </a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="http://hr_colmitra.test/employee/logout"><i class="fa fa-ban fa-fw pull-right"></i>Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div> --}}
    </nav>
