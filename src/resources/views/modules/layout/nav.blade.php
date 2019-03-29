<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <a href="http://localhost:8812" class="navbar-brand">Module Generate</a>
    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation"
            class="navbar-toggler navbar-toggler-right"><span class="navbar-toggler-icon"></span></button>
    <div id="navbarSupportedContent" class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">

            <li class="nav-item"><a href="{{route('type.list')}}" class="nav-link ">type</a></li>
            <li class="nav-item"><a href="{{route('rule.list')}}" class="nav-link ">rule</a></li>
            <li class="nav-item"><a href="{{route('module.list')}}" class="nav-link ">module</a></li>
            <li class="nav-item"><a href="{{route('icon.list')}}" class="nav-link ">icon</a></li>
            {{--<li class="nav-item dropdown">--}}
                {{--<a href="#" id="navbarDropdownMenuUser" data-toggle="dropdown"--}}
                                             {{--aria-haspopup="true" aria-expanded="false"--}}
                                             {{--class="nav-link dropdown-toggle">Admin Istrator</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item"><a href="http://localhost:8812/contact" class="nav-link ">Contact</a></li>--}}
        </ul>
    </div>
</nav>