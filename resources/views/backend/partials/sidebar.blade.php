<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Example</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Active menu item style */
        .nav-link.active {
            background-color: #4e73df;
            color: white;
        }
    </style>
</head>

<body>

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item" id="dashboardItem">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Platform -->
        <li class="nav-item" id="platformItem">
            <a class="nav-link" href="{{ route('platform') }}">
                <i class="fas fa-dungeon"></i>
                <span>Platform</span>
            </a>
        </li>

        <!-- Nav Item - Version -->
        <li class="nav-item" id="versionItem">
            <a class="nav-link" href="{{ route('version') }}">
                <i class="fas fa-code-branch"></i>
                <span>Version</span>
            </a>
        </li>

        <!-- Nav Item - Available Amount -->
        <li class="nav-item" id="amountItem">
            <a class="nav-link" href="{{ route('amount') }}">
                <i class="fas fa-sort-amount-up-alt"></i>
                <span>Available Amount</span>
            </a>
        </li>

        <!-- Nav Item - Card -->
        <li class="nav-item" id="cardItem">
            <a class="nav-link" href="{{ route('card') }}">
                <i class="fas fa-vr-cardboard"></i>
                <span>Card</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

    </ul>

    <!-- Bootstrap and jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Function to set the active class to clicked menu item
            function setActiveMenu(menuId) {
                // Remove active class from all items
                $('#accordionSidebar .nav-item').removeClass('active');
                // Add active class to the clicked menu item
                $('#' + menuId).addClass('active');
                // Remove active class from all anchor links inside the sidebar
                $('#accordionSidebar .nav-link').removeClass('active');
                // Add active class to the clicked menu's anchor link
                $('#' + menuId + ' .nav-link').addClass('active');
            }

            // Function to check current route and set active menu based on that
            function setActiveMenuFromUrl() {
                var currentUrl = window.location.href;

                if (currentUrl.indexOf('{{ route('admin.dashboard') }}') !== -1) {
                    setActiveMenu('dashboardItem');
                } else if (currentUrl.indexOf('{{ route('platform') }}') !== -1) {
                    setActiveMenu('platformItem');
                } else if (currentUrl.indexOf('{{ route('version') }}') !== -1) {
                    setActiveMenu('versionItem');
                } else if (currentUrl.indexOf('{{ route('amount') }}') !== -1) {
                    setActiveMenu('amountItem');
                } else if (currentUrl.indexOf('{{ route('card') }}') !== -1) {
                    setActiveMenu('cardItem');
                }
            }

            // Set active menu based on current URL when the page loads
            setActiveMenuFromUrl();

            // Click events for menu items
            $('#dashboardItem').click(function() {
                setActiveMenu('dashboardItem');
            });

            $('#platformItem').click(function() {
                setActiveMenu('platformItem');
            });

            $('#versionItem').click(function() {
                setActiveMenu('versionItem');
            });

            $('#amountItem').click(function() {
                setActiveMenu('amountItem');
            });

            $('#cardItem').click(function() {
                setActiveMenu('cardItem');
            });
        });
    </script>


</body>

</html>
