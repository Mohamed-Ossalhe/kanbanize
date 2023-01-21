$(document).ready(function (){
    // select tasks columns
    let todoTasks = $("#to-do .tasks-column-wrapper");
    let doingTasks = $("#in-progress .tasks-column-wrapper");
    let doneTasks = $("#done .tasks-column-wrapper");
    // load tasks after the document is fully loaded
    // to do tasks
    getToDoTasks();
    // in progress tasks
    getInProgressTasks();
    // done tasks
    getDoneTasks();
    // submit task to the database with ajax
    $(".add-task-form").submit((e)=>{
        e.preventDefault();
        let taskStatus = $("#lists option:selected").attr("value");
        let taskTitleValue = $("#task-title").val();
        let taskDescValue = $("#task-description").val();
        let dueDateValue = $("#date-picker").val();
        // console.log(columnId);
        // eslint-disable-next-line jquery/no-ajax
        $.ajax({
            url: "http://localhost/task-board/public/home/addTask",
            type: "post",
            data: {
                task_title: taskTitleValue,
                task_description: taskDescValue,
                end_date: dueDateValue,
                task_status: taskStatus
            },
            success: function (responce, status) {
                console.log(status);
                if(status === "success" && responce) {
                    $("#task-title").val("");
                    $("#task-description").val("");
                    $("#lists").val("to do");
                    $("#date-picker").val("");
                    location.reload();
                    // console.log(responce);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    // get todo tasks form the database using ajax
    function getToDoTasks() {
        let task = "";
        $.ajax({ // eslint-disable-line jquery/no-ajax
            url: "http://localhost/task-board/public/home/getToDoTasks",
            type: "get",
            success: (response) => {
                let dataParsed = $.parseJSON(response);
                if(dataParsed.length > 0) {
                    dataParsed.forEach((element) => {
                        task += `<div class="task-box w-full rounded bg-primary text-white" id="${element.task_id}">
                            <!-- task header -->
                            <div class="task-header flex items-center justify-between py-2 px-2 bg-fourth text-black text-xl md:text-base rounded-t-md">
                                <p id="task-status" class="hidden">${element.task_status}</p>
                                <h2 class="task-title">${element.task_title}</h2>
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
                                        ${element.task_description}
                                    </p>
                                    <input class="expnd-btn underline w-8 text-white bg-transparent border-none" type="checkbox" name="expnd-btn">
                                </div>
                                <!-- task start date and end date -->
                                <div class="task-date flex items-center justify-between text-base md:text-sm mt-4">
                                    <!-- start date -->
                                    <div class="start-date">
                                        <p>Created in ${element.date_created}</p>
                                    </div>
                                    <!-- end date -->
                                    <div class="end-date">
                                        <p>Due in ${element.date_end}</p>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    });
                }
                // console.log(task);
                todoTasks.prepend(task);
            },
            error: (error) => {
                console.log(error);
            }
        });
    }

    // get in progress tasks form the database using ajax
    function getInProgressTasks() {
        let task = "";
        $.ajax({ // eslint-disable-line jquery/no-ajax
            url: "http://localhost/task-board/public/home/getInProgressTasks",
            type: "get",
            success: (response) => {
                let dataParsed = $.parseJSON(response);
                if(dataParsed.length > 0) {
                    dataParsed.forEach((element) => {
                        task += `<div class="task-box w-full rounded bg-primary text-white" id="${element.task_id}">
                            <!-- task header -->
                            <div class="task-header flex items-center justify-between py-2 px-2 bg-fourth text-black text-xl md:text-base rounded-t-md">
                                <p id="task-status" class="hidden">${element.task_status}</p>
                                <h2 class="task-title">${element.task_title}</h2>
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
                                        ${element.task_description}
                                    </p>
                                    <input class="expnd-btn underline w-8 text-white bg-transparent border-none" type="checkbox" name="expnd-btn">
                                </div>
                                <!-- task start date and end date -->
                                <div class="task-date flex items-center justify-between text-base md:text-sm mt-4">
                                    <!-- start date -->
                                    <div class="start-date">
                                        <p>Created in ${element.date_created}</p>
                                    </div>
                                    <!-- end date -->
                                    <div class="end-date">
                                        <p>Due in ${element.date_end}</p>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    });
                }
                // console.log(task);
                doingTasks.prepend(task);
            },
            error: (error) => {
                console.log(error);
            }
        });
    }

    // get done tasks form the database using ajax
    function getDoneTasks() {
        let task = "";
        $.ajax({ // eslint-disable-line jquery/no-ajax
            url: "http://localhost/task-board/public/home/getDoneTasks",
            type: "get",
            success: (response) => {
                let dataParsed = $.parseJSON(response);
                if(dataParsed.length > 0) {
                    dataParsed.forEach((element) => {
                        task += `<div class="task-box w-full rounded bg-primary text-white" id="${element.task_id}">
                            <!-- task header -->
                            <div class="task-header flex items-center justify-between py-2 px-2 bg-fourth text-black text-xl md:text-base rounded-t-md">
                                <p id="task-status" class="hidden">${element.task_status}</p>
                                <h2 class="task-title">${element.task_title}</h2>
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
                                        ${element.task_description}
                                    </p>
                                    <input class="expnd-btn underline w-8 text-white bg-transparent border-none" type="checkbox" name="expnd-btn">
                                </div>
                                <!-- task start date and end date -->
                                <div class="task-date flex items-center justify-between text-base md:text-sm mt-4">
                                    <!-- start date -->
                                    <div class="start-date">
                                        <p>Created in ${element.date_created}</p>
                                    </div>
                                    <!-- end date -->
                                    <div class="end-date">
                                        <p>Due in ${element.date_end}</p>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    });
                }
                // console.log(task);
                doneTasks.prepend(task);
            },
            error: (error) => {
                console.log(error);
            }
        });
    }
});