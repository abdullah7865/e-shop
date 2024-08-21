<!doctype html>
<html lang="en" class="no-js">
@include('layouts.front.partials.css')
<body>
    <div class="body-wrapper">

        @include('layouts.front.partials.announcement-bar')
        @include('layouts.front.partials.header')
        <main id="MainContent" class="content-for-layout">
            @yield('content')
        </main>

        @include('layouts.front.partials.footer')
        @include('layouts.front.partials.script')

    </div>
</body>


</html>
