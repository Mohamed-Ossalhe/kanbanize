<?php require_once 'includes/head.php'?>
<?php require_once 'includes/header.php'?>
<div class="profile-page">
    <div class="container mx-auto px-2">
        <!-- profile-header -->
        <div class="profile-Header">
            <div class="container mx-auto">
                <div class="profile-header-wrapper px-10 py-10 flex items-end justify-between">
                    <div class="profile-info flex items-center gap-10">
                        <div class="profile-image rounded-full w-fit p-2 border-2 border-primary">
                            <img class="rounded-full h-40 w-40" src="" alt="">
                        </div>
                        <div class="profile-info-text flex flex-col gap-2">
                            <h1 class="font-bold text-3xl">Name</h1>
                            <h2 class="font-medium text-lg">Email</h2>
                            <p class="text-base text-gray-700">Update your Photo and Profile Details</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- profile-body -->
        <div class="profile-body pb-10">
            <div class="container mx-auto px-2">
                <div class="profile-body-wrapper px-10">
                    <div class="profile-form">
                        <form class="update-profile-form flex flex-col items-center gap-y-8" method="post" enctype="multipart/form-data">
                            <div class="profile-image flex items-end justify-evenly w-full pl-10">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white w-1/2" for="user-image">Profile Image:</label>
                                <div class="photo w-1/2">
                                    <img class="preview-image rounded h-24 w-24 mb-2" alt="">
                                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="user-image" type="file">
                                </div>
                            </div>
                            <div class="profile-name flex items-end justify-evenly w-full pl-10">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white w-1/2" for="user-name">User Name:</label>
                                <div class="input w-1/2">
                                    <input type="text" id="user-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="User Name">
                                </div>
                            </div>
                            <div class="profile-password flex items-end justify-evenly w-full pl-10">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white w-1/2" for="user-email">User Email:</label>
                                <div class="input w-1/2">
                                    <input type="email" id="user-email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required placeholder="User Email">
                                </div>
                            </div>
                            <div class="profile-password flex items-end justify-evenly w-full pl-10">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white w-1/2" for="old-password">Old Password:</label>
                                <div class="input w-1/2">
                                    <input type="password" id="old-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required placeholder="Old Password">
                                </div>
                            </div>
                            <div class="profile-password flex items-end justify-evenly w-full pl-10">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white w-1/2" for="new-password">New Password:</label>
                                <div class="input w-1/2">
                                    <input type="password" id="new-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required placeholder="New Password">
                                </div>
                            </div>
                            <div class="profile-btns w-full">
                                <div class="profile-btns-wrapper flex gap-2 items-center justify-end">
                                    <button class="cancel-btn bg-gray-800 text-white py-2 px-10 rounded">Cancel</button>
                                    <button type="submit" class="save-btn bg-primary text-white py-2 px-10 rounded">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'?>