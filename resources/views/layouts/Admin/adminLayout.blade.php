<x-admin.layouts.head/>
<x-admin.layouts.nav/>
<div class="content-wrapper">
@yield('header')
<x-admin.layouts.aside/>
  <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12 col-6">
                @yield('content')
            </div>
        </div>
    </div>
</section>
</div>
@yield('script')
<x-admin.layouts.footer/>



