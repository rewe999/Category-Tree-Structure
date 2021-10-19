<!DOCTYPE html>
<html>
@include('layouts.head')
<body>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="list-inline menu-flex">
                <a href="{{route('get.category')}}" class="white">Manage Category TreeView</a>
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="buttonLogout">Logout</button>
                    </form>
                @endauth
            </div>

        </div>
        <div class="panel-body">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="/js/treeview.js"></script>
</body>
</html>
