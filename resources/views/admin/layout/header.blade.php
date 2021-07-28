<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color:#40E0D0 ">
    <div class="navbar-header" style="text-align: center; font-weight: bold;">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" >SHOP HLYNK Lipsticks</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                @if(\Illuminate\Support\Facades\Auth::check())
                    {{\Illuminate\Support\Facades\Auth::user()->hoten}}
                @endif
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li class="divider"></li>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li><a href="{{route('logoutAD')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                @endif
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
@include('admin.layout.menu')
<!-- /.navbar-static-side -->
</nav>
