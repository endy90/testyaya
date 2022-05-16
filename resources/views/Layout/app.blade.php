<!DOCTYPE html>
<html lang="en">

<head>

    @include('Partials.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
            @include('Partials.navbar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            @include('flash::message')

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                    @include('Partials.topbar')
                <!-- End of Topbar -->

                @yield('contenu')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
                @include('Partials.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

        @include('Partials.footer-script')

</body>

</html>
