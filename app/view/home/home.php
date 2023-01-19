<?php require_once 'includes/head.php'?>
<div class="app overflow-hidden h-full">
    <?php require_once 'includes/header.php'?>
    <!-- operations header -->
    <div class="operations-header bg-op-header-texture bg-contain">
        <div class="container mx-auto">
            <!-- operation header wrapper -->
            <div class="operations-header-wrapper flex flex-col md:flex-row md:justify-between md:items-end gap-2 py-4 px-2 bg-gradient-to-b from-primary/75 to-white/75">
                <!-- board inforamtions -->
                <div class="board-info flex flex-col gap-4">
                    <!-- board text info -->
                    <div class="board-text text-white">
                        <h1 class="text-2xl">Board Name</h1>
                        <p class="description"></p>
                    </div>
                    <!-- board analytics info -->
                    <div class="board-analytics-info flex items-center overflow-x-scroll md:overflow-x-hidden">
                        <!-- todo analytics -->
                        <div class="analytics-box flex items-center gap-4 md:gap-2 p-3 md:p-2 bg-fourth w-fit text-xl md:text-base rounded mr-4">
                            <p class="box-title capitalize">to do</p>
                            <div class="analytics-number px-3 py-1 bg-third rounded">3</div>
                        </div>
                        <!-- inprogress analytics -->
                        <div class="analytics-box flex items-center gap-4 md:gap-2 p-3 md:p-2 bg-fourth w-fit text-xl md:text-base rounded mr-4">
                            <p class="box-title capitalize">in progress</p>
                            <div class="analytics-number px-3 py-1 bg-third rounded">3</div>
                        </div>
                        <!-- Done analytics -->
                        <div class="analytics-box flex items-center gap-4 md:gap-2 p-3 md:p-2 bg-fourth w-fit text-xl md:text-base rounded mr-4">
                            <p class="box-title capitalize">done</p>
                            <div class="analytics-number px-3 py-1 bg-third rounded">3</div>
                        </div>
                    </div>
                </div>
                <!-- board operations -->
                <div class="board-operations">
                    <button class="add-multiple py-3 px-4 md:py-2 md:px-4 bg-primary text-white rounded text-xl md:text-base capitalize hover:bg-transparent hover:text-primary hover:outline hover:outline-2 hover:outline-primary transition-colors">add multiple tasks</button>
                    <!-- <button class="add-task py-3 px-4 md:py-2 md:px-2 bg-white rounded text-xl md:text-base capitalize hover:bg-accent hover:text-white  transition-colors">add new task</button> -->
                    <!-- Modal toggle -->
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="add-task py-3 px-4 md:py-2 md:px-2 bg-white rounded text-xl md:text-base capitalize hover:bg-accent hover:text-white  transition-colors" type="button">
                        add new task
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--//! tasks !//-->
    <div class="tasks-content h-full">
        <div class="container mx-auto h-full overflow-x-scroll">
            <!-- tasks wrapper -->
            <div class="tasks-wrapper flex items-start gap-6 px-2 h-full">
                <!-- tasks column -->
                <div class="max-w-[360px] max-h-full">
                    <!-- task column header -->
                    <div class="task-column-header capitalize border-b-2 border-third py-2 my-3">
                        <h3>to do</h3>
                    </div>
                    <!-- task column wrapper -->
                    <div class="tasks-column scrollbar-hide flex flex-col gap-2  max-h-[400px] overflow-y-scroll">
                        <!-- task card -->
                        <div class="task-box w-full rounded bg-primary text-white">
                            <!-- task header -->
                            <div class="task-header flex items-center justify-between py-2 px-2 bg-fourth text-black text-xl md:text-base rounded-t-md">
                                <h2 class="task-title">task title</h2>
                                <div class="task-operations flex items-center gap-2">
                                    <!-- update button -->
                                    <div class="edit-btn flex items-center justify-center bg-[#EAEDFF] text-primary w-8 h-8 cursor-pointer rounded">
                                        <i class='bx bx-edit'></i>
                                    </div>
                                    <!-- delete button -->
                                    <div class="delete-btn flex items-center justify-center bg-[#EAEDFF] text-[#FF5656] w-8 h-8 cursor-pointer rounded">
                                        <i class='bx bx-trash-alt'></i>
                                    </div>
                                </div>
                            </div>
                            <!-- task body -->
                            <div class="task-body p-2">
                                <!-- task description -->
                                <div class="task-text-description text-lg md:text-sm">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid, recusandae. Possimus sunt porro quas beatae dolorum natus? Id dicta veritatis fugiat quae voluptas culpa beatae aperiam voluptatibus minus qui, ullam repellat enim soluta! Necessitatibus ea sit sequi iusto nobis eligendi tempore rerum. Rem laboriosam, facere saepe eos voluptate velit tenetur reprehenderit molestias, veritatis dolores adipisci explicabo, est fuga! Sunt aliquam reprehenderit quaerat totam perferendis, officiis natus saepe eos ab repellat?
                                    </p>
                                    <input class="expnd-btn underline w-8 text-white bg-transparent border-none" type="checkbox" name="expnd-btn">
                                </div>
                                <!-- task start date and end date -->
                                <div class="task-date flex items-center justify-between text-base md:text-sm mt-4">
                                    <!-- start date -->
                                    <div class="start-date">
                                        <p>Created in 16/01/2023</p>
                                    </div>
                                    <!-- end date -->
                                    <div class="end-date">
                                        <p>Due in 17/01/2023</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- task card -->
                        <div class="task-box w-full rounded bg-primary text-white">
                            <!-- task header -->
                            <div class="task-header flex items-center justify-between py-2 px-2 bg-fourth text-black text-xl md:text-base rounded-t-md">
                                <h2 class="task-title">task title</h2>
                                <div class="task-operations flex items-center gap-2">
                                    <!-- update button -->
                                    <div class="edit-btn flex items-center justify-center bg-[#EAEDFF] text-primary w-8 h-8 cursor-pointer rounded">
                                        <i class='bx bx-edit'></i>
                                    </div>
                                    <!-- delete button -->
                                    <div class="delete-btn flex items-center justify-center bg-[#EAEDFF] text-[#FF5656] w-8 h-8 cursor-pointer rounded">
                                        <i class='bx bx-trash-alt'></i>
                                    </div>
                                </div>
                            </div>
                            <!-- task body -->
                            <div class="task-body p-2">
                                <!-- task description -->
                                <div class="task-text-description text-lg md:text-sm">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid, recusandae. Possimus sunt porro quas beatae dolorum natus? Id dicta veritatis fugiat quae voluptas culpa beatae aperiam voluptatibus minus qui, ullam repellat enim soluta! Necessitatibus ea sit sequi iusto nobis eligendi tempore rerum. Rem laboriosam, facere saepe eos voluptate velit tenetur reprehenderit molestias, veritatis dolores adipisci explicabo, est fuga! Sunt aliquam reprehenderit quaerat totam perferendis, officiis natus saepe eos ab repellat?
                                    </p>
                                    <input class="expnd-btn underline" type="checkbox" name="expnd-btn">
                                </div>
                                <!-- task start date and end date -->
                                <div class="task-date flex items-center justify-between text-base md:text-sm mt-4">
                                    <!-- start date -->
                                    <div class="start-date">
                                        <p>Created in 16/01/2023</p>
                                    </div>
                                    <!-- end date -->
                                    <div class="end-date">
                                        <p>Due in 17/01/2023</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Task Form Modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="add-task-modal fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add New Task</h3>
                <form class="add-task-form space-y-6" method="post">
                    <div>
                        <label for="task-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Title</label>
                        <input type="text" name="task-title" id="task-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Task Title" required>
                    </div>
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Description</label>
                        <textarea id="task-description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your task description here..."></textarea>
                    </div>
                    <div>
                        <label for="date-picker" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due Date</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input datepicker datepicker-autohide id="date-picker" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                        </div>
                    </div>
                    <div class="flex justify-between gap-4">
                        <input type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" value="Add Task">
                        <button type="button" data-modal-hide="authentication-modal" class="w-full text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 

<?php require_once 'includes/footer.php'?>