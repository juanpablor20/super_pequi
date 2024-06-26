@php
    $layoutData['cssClasses'] =  'navbar navbar-vertical navbar-expand-lg';
@endphp
@section('body')
    <body>
    <div class="page">
        <!-- Sidebar -->
        @include('tablar::partials.navbar.sidebar') 
        @include('tablar::partials.header.sidebar-top') 
        
        <div class="page-wrapper">
            <!-- Page Content -->
            {{-- @yield('content') --}}


            @hasSection('content')
            @yield('content')
        @endif
      
            
            @include('tablar::partials.footer.infolegal')
        </div>
    </div>
    </body>
@stop
