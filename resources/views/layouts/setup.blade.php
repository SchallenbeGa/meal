<!-- import header -->
@include('template.header_setup')

    <div id="app">
        <main class="py-0">
            @yield('content')
        </main>
    </div>
@include('template.footer')
