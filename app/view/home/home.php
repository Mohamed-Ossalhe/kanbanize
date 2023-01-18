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
                    <button class="add-task py-3 px-4 md:py-2 md:px-2 bg-white rounded text-xl md:text-base capitalize hover:bg-accent hover:text-white  transition-colors">add new task</button>
                </div>
            </div>
        </div>
    </div>

    <!--//! tasks !//-->
    <div class="tasks-content h-full">
        <div class="container mx-auto h-full">
            <!-- tasks wrapper -->
            <div class="tasks-wrapper flex items-start gap-6 px-2 h-full">
                <!-- tasks column -->
                <div class="w-[400px] max-h-full">
                    <!-- task column header -->
                    <div class="task-column-header capitalize border-b-2 border-third py-2 my-3">
                        <h3>to do</h3>
                    </div>
                    <!-- task column wrapper -->
                    <div class="tasks-column scrollbar-hide flex flex-col gap-2 overflow-y-scroll h-full">
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
                <!-- tasks column -->
                <div class="w-[400px] max-h-full">
                    <!-- task column header -->
                    <div class="task-column-header capitalize border-b-2 border-third py-2 my-3">
                        <h3>in progress</h3>
                    </div>
                    <!-- task column wrapper -->
                    <div class="tasks-column scrollbar-hide overflow-y-scroll h-96">
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
<?php require_once 'includes/footer.php'?>