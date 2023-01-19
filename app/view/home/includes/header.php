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
                    <!-- <div class="account-profile-img w-10 h-10 md:w-8 md:h-8 bg-white text-lg md:text-base font-semibold rounded-full flex items-center justify-center cursor-pointer">O</div> -->
                    <!-- profile -->
                    <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center text-sm font-medium text-white rounded-full hover:text-primary md:mr-0" type="button">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 mr-2 rounded-full" src="https://randomuser.me/api/portraits/men/79.jpg" alt="user photo">
                        <?= ($_SESSION["user-logged"]) ? $_SESSION["user-name"] : "" ?>
                        <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownAvatarName" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44">
                        <div class="px-4 py-3 text-sm text-gray-900">
                        <div class="truncate"><?= ($_SESSION["user-logged"]) ? $_SESSION["user-email"] : "" ?></div>
                        </div>
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Earnings</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="http://localhost/task-board/public/user/logOut" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>