
@if(isset($sidebars))
    @foreach($sidebars  as $sidebar)
        @if($sidebar->type == 'label')
            <li class="nav-title"> {{ $sidebar->name[$local] }}</li>
        @else
            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern($sidebar->link.'*'), 'open') }}">
                @if($sidebar->child->count() > 0)
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern($sidebar->link.'*')) }}"
                       href="#">
                        <i class="nav-icon {{ $sidebar->icon }}"></i> {{ cvModuleName($sidebar->name[$local]) }}
                        @if($sidebar->nitify > 0)
                            <span class="badge badge-danger">{{ $sidebar->nitify }}</span>
                        @endif
                    </a>
                    <ul class="nav-dropdown-items">
                        @foreach($sidebar->child as $child)
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern($child->link.'*')) }}"
                                   href="{{ url($child->link) }}"> {{ cvModuleName($child->name[$local]) }}
                                    @if($sidebar->nitify > 0)
                                        <span class="badge badge-danger">{{ $child->nitify }}</span>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endif
    @endforeach
@endif