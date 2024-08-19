<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.partials.css')

<body>
    <div class="wrapper">
        @include('layouts.admin.partials.header')
        @include('layouts.admin.partials.sidebar')
        <div class="page-content">
            @yield('content')
            @include('layouts.admin.partials.footer')
        </div>
    </div>
    @include('layouts.admin.partials.script')
</body>

</html>
