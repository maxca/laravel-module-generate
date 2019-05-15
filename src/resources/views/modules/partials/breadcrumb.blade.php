<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>

    <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>

    @if(preg_match('/detail|edit|create/ ', request()->route()->getName(), $matches))
        <li class="breadcrumb-item"><a href="{{route($module.'.list')}}">{{ucfirst($module)}} Management</a></li>
        <li class="breadcrumb-item active"> {{ucfirst($matches[0])}}</li>
    @else
        <li class="breadcrumb-item active">{{ucfirst($module)}} Management</li>
    @endif

</ol>