<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle count-info" href="{{ route('person.info') }}" aria-expanded="false">
                    <input type="submit" class="btn btn-default btn-dark" value="个人设置">
                </a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" aria-expanded="false">
                    <form action="{{ route("admin.logout")}}" method="post">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-default btn-dark" value="退出">
                    </form>
                </a>
            </li>
        </ul>
    </nav>
</div>