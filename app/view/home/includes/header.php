<!-- header -->
<header class="bg-gradient-to-r from-primary via-accent to-secondary">
    <div class="container mx-auto px-2 py-5 md:py-3">
        <!-- header wrapper -->
        <div class="header-wrapper flex items-center justify-between">
            <!-- logo -->
            <div class="main-logo">
                <img class="h-6" src="<?=BASE_ASSETS_URL?>img/logo-white.svg" alt="Kanbanize logo">
            </div>
            <!-- nav-links-wrapper -->
            <div class="nav-links-wrapper flex items-center justify-between gap-3">
                <!-- search form wrapper -->
                <div class="search-form-wrapper">
                    <div class="search-icon text-4xl md:text-2xl text-white cursor-pointer">
                        <i class='bx bx-search'></i>
                    </div>
                    <div class="search-form hidden">
                        <form method="post">
                            <input type="search" name="search" id="search">
                        </form>
                    </div>
                </div>
                <!-- account links -->
                <div class="account-links">
                    <div class="account-profile-img w-10 h-10 md:w-8 md:h-8 bg-white text-lg md:text-base font-semibold rounded-full flex items-center justify-center cursor-pointer">O</div>
                </div>
            </div>
        </div>
    </div>
</header>