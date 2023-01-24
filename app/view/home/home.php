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
                            <div class="analytics-number todo-count px-3 py-1 bg-third rounded"></div>
                        </div>
                        <!-- inprogress analytics -->
                        <div class="analytics-box flex items-center gap-4 md:gap-2 p-3 md:p-2 bg-fourth w-fit text-xl md:text-base rounded mr-4">
                            <p class="box-title capitalize">in progress</p>
                            <div class="analytics-number in-progress-count px-3 py-1 bg-third rounded">3</div>
                        </div>
                        <!-- Done analytics -->
                        <div class="analytics-box flex items-center gap-4 md:gap-2 p-3 md:p-2 bg-fourth w-fit text-xl md:text-base rounded mr-4">
                            <p class="box-title capitalize">done</p>
                            <div class="analytics-number done-count px-3 py-1 bg-third rounded">3</div>
                        </div>
                    </div>
                </div>
                <!-- board operations -->
                <div class="board-operations">
                    <!-- <button class="add-task py-3 px-4 md:py-2 md:px-2 bg-white rounded text-xl md:text-base capitalize hover:bg-accent hover:text-white  transition-colors">add new task</button> -->
                    <button data-modal-target="multi-tasks-modal" data-modal-toggle="multi-tasks-modal" class="add-multiple py-3 px-4 md:py-2 md:px-4 bg-primary text-white rounded text-xl md:text-base capitalize hover:bg-transparent hover:text-primary hover:outline hover:outline-2 hover:outline-primary transition-colors" type="button">
                        add multiple tasks
                    </button>
                    <!-- Modal toggle -->
                    <button data-modal-target="task-modal" data-modal-toggle="task-modal" class="add-task py-3 px-4 md:py-2 md:px-2 bg-white rounded text-xl md:text-base capitalize hover:bg-accent hover:text-white  transition-colors" type="button">
                        add new task
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--//! tasks !//-->
    <div class="tasks-content h-full overflow-x-scroll">
        <div class="container mx-auto h-full">
            <!-- tasks wrapper -->
            <div class="tasks-wrapper flex items-start gap-6 px-2 max-h-full">
                <!-- todo column -->
                <div class="tasks-column columns max-h-full">
                    <!-- task column header -->
                    <div class="task-column-header capitalize border-b-2 border-third py-2 my-3">
                        <h3>to do</h3>
                    </div>
                    <!-- task column wrapper -->
                    <div class="tasks-column-wrapper scrollbar-hide flex flex-col gap-2  max-h-[400px] overflow-y-scroll py-8" id="to-do" ondrop="dropTask(event)" ondragover="dragOver(event)">
                    </div>
                </div>
                <!-- in progress column -->
                <div class="tasks-column columns max-h-full">
                    <!-- task column header -->
                    <div class="task-column-header capitalize border-b-2 border-third py-2 my-3">
                        <h3>in progress</h3>
                    </div>
                    <!-- task column wrapper -->
                    <div class="tasks-column-wrapper scrollbar-hide flex flex-col gap-2  max-h-[400px] overflow-y-scroll py-8" id="in-progress" ondrop="dropTask(event)" ondragover="dragOver(event)">
                    </div>
                </div>
                <!-- done column -->
                <div class="tasks-column columns max-h-full">
                    <!-- task column header -->
                    <div class="task-column-header capitalize border-b-2 border-third py-2 my-3">
                        <h3>done</h3>
                    </div>
                    <!-- task column wrapper -->
                    <div class="tasks-column-wrapper scrollbar-hide flex flex-col gap-2  max-h-[400px] overflow-y-scroll py-8" ondrop="dropTask(event)" ondragover="dragOver(event)" id="done" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Task Form Modal -->
<div id="task-modal" tabindex="-1" aria-hidden="true" class="add-task-modal fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="task-modal">
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
                        <label for="lists" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                        <select id="lists" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="to do">To Do</option>
                            <option value="in progress">In Progress</option>
                            <option value="done">Done</option>
                        </select>
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
                        <button type="button" data-modal-hide="task-modal" class="w-full text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- update Task Form Modal -->
<div id="update-modal" class="update-task-modal items-center justify-center fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="close-update-form absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add New Task</h3>
                <form class="update-task-form space-y-6" method="post">
                    <div>
                        <label for="task-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Title</label>
                        <input type="text" name="task-title" id="u-task-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Task Title" required>
                    </div>
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Description</label>
                        <textarea id="u-task-description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your task description here..."></textarea>
                    </div>
                    <div>
                        <label for="lists" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                        <select id="u-lists" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="to do">To Do</option>
                            <option value="in progress">In Progress</option>
                            <option value="done">Done</option>
                        </select>
                    </div>
                    <div>
                        <label for="date-picker" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due Date</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input datepicker datepicker-autohide id="u-date-picker" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                        </div>
                    </div>
                    <div class="flex justify-between gap-4">
                        <input type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" value="Update Task">
                        <button type="button" class="close-update-form w-full text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Multiple Tasks Form Modal -->
<div id="multi-tasks-modal" tabindex="-1" aria-hidden="true" class="add-multi-tasks-modal fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="multi-tasks-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add New Task</h3>
                <form class="add-tasks-form space-y-6 overflow-y-scroll scrollbar-hide" style="max-height: 500px;" method="post">
                    <div class="multiple-forms">
                        <!-- form 1 -->
                        <div class="form-fields my-3">
                            <h1 class="flex items-center justify-between">Task 1
                                <!-- <div class="delete-form-btn flex items-center justify-center bg-[#EAEDFF] text-[#FF5656] w-8 h-8 cursor-pointer rounded">
                                    <i class="bx bx-trash-alt"></i>
                                </div> -->
                            </h1>
                            <div>
                                <label for="task-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Title</label>
                                <input type="text" name="m-task-title" id="m-task-title" class="m-task-title bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Task Title" required>
                            </div>
                            <div>
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Description</label>
                                <textarea id="m-task-description" rows="4" class="m-task-desc block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your task description here..."></textarea>
                            </div>
                            <div>
                                <label for="lists" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                                <select id="m-lists" class="m-task-status bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="to do">To Do</option>
                                    <option value="in progress">In Progress</option>
                                    <option value="done">Done</option>
                                </select>
                            </div>
                            <div>
                                <label for="date-picker" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due Date</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input datepicker datepicker-autohide id="date-picker" type="text" class="m-task-date bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                </div>
                            </div>
                        </div>
                        <!-- form 1 -->
                        <div class="form-fields my-3">
                            <h1 class="flex items-center justify-between">Task 2
                                <!-- <div class="delete-form-btn flex items-center justify-center bg-[#EAEDFF] text-[#FF5656] w-8 h-8 cursor-pointer rounded">
                                    <i class="bx bx-trash-alt"></i>
                                </div> -->
                            </h1>
                            <div>
                                <label for="task-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Title</label>
                                <input type="text" name="m-task-title" id="m-task-title" class="m-task-title bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Task Title" required>
                            </div>
                            <div>
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Description</label>
                                <textarea id="m-task-description" rows="4" class="m-task-desc block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your task description here..."></textarea>
                            </div>
                            <div>
                                <label for="lists" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                                <select id="m-lists" class="m-task-status bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="to do">To Do</option>
                                    <option value="in progress">In Progress</option>
                                    <option value="done">Done</option>
                                </select>
                            </div>
                            <div>
                                <label for="date-picker" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due Date</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input datepicker datepicker-autohide id="date-picker" type="text" class="m-task-date bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="count flex items-center justify-between">
                        <label for="tasks-count" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Add New Form</label>
                        <div class="add-form py-2 px-3 bg-primary text-white rounded cursor-pointer">Add New Form</div>
                    </div>
                    <div class="form-btns flex justify-between gap-4">
                        <input type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" value="Add Tasks">
                        <button type="button" data-modal-hide="multi-tasks-modal" class="w-full text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'?>