// select tasks columns
let todoTasks = $("#to-do");
let doingTasks = $("#in-progress");
let doneTasks = $("#done");
$(document).ready(function (){
    // load tasks after the document is fully loaded
    getAllTasks();
    
    // submit task to the database with ajax
    $(".add-task-form").submit((e)=>{
        e.preventDefault();
        let taskStatus = $("#lists option:selected").attr("value");
        let taskTitleValue = $("#task-title").val();
        let taskDescValue = $("#task-description").val();
        let dueDateValue = $("#date-picker").val();
        // console.log(columnId);
        if(taskTitleValue !== "" && taskDescValue !== "" && taskStatus !== "" && dueDateValue !== "") {
            // eslint-disable-next-line jquery/no-ajax
            $.ajax({
                url: "http://localhost/kanbanize/public/home/addTask",
                type: "post",
                data: {
                    task_title: taskTitleValue,
                    task_description: taskDescValue,
                    end_date: dueDateValue,
                    task_status: taskStatus
                },
                success: function (responce, status) {
                    console.log(status);
                    console.log(responce);
                    if(status === "success" && responce) {
                        $("#task-title").val("");
                        $("#task-description").val("");
                        $("#lists").val("to do");
                        $("#date-picker").val("");
                        $(".tasks-column-wrapper").html("");
                        getAllTasks();
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
            $(".task-error").text("").css("color", "red");
        }else {
            $(".task-error").text("Please Fill All The Fields!").css("color", "red");
        }
    });

    
    // get one task
    function getTask(taskId) {
        $.ajax({ // eslint-disable-line
            url: "http://localhost/kanbanize/public/home/getTask",
            type: "post",
            data: {
                task_id: taskId
            },
            success: function (response) {
                // console.log(response, status);
                let dataParsed = $.parseJSON(response);
                // console.log(dataParsed);
                if(dataParsed) {
                    console.log(dataParsed.task_title);
                    $("#u-task-title").val(dataParsed.task_title);
                    $("#u-task-description").val(dataParsed.task_description);
                    $("#u-lists").val(dataParsed.task_status);
                    $("#u-date-picker").val(dataParsed.date_end);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    // add multiple tasks
    let maxNum = 3;
    let i = 0;
    let x = 3;
    $(".add-form").on("click", ()=>{
        if(i === maxNum) {
            $(".count").hide(); // eslint-disable-line jquery/no-hide
            return;
        }
        addMultipleTasks();
        x++;
        i++;
    });
    // add multiple tasks forms
    function addMultipleTasks() {
        let taskForm = `
        <div class="form-fields">
            <h1 class="flex items-center justify-between">Task ${x}
                <div class="delete-form-btn flex items-center justify-center bg-[#EAEDFF] text-[#FF5656] w-8 h-8 cursor-pointer rounded">
                    <i class="bx bx-trash-alt"></i>
                </div>
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
        </div>`;
        $(taskForm).insertBefore(".count");
        $(document).on("click",".delete-form-btn",(e)=>{
            e.target.closest(".form-fields").remove();
        });
    }
    // add multiple tasks
    $(".add-tasks-form").submit((e)=>{
        e.preventDefault();
        let taskTitles = [];
        let taskDesc = [];
        let taskStatus = [];
        let taskDate = [];
        // let tasksTitles = document.querySelectorAll("#m-task-title");
        $(".m-task-title").each(function(){
            taskTitles.push($(this).val());
        });
        $(".m-task-desc").each(function(){
            taskDesc.push($(this).val());
        });
        $(".m-task-status").each(function(){
            taskStatus.push($(this).val());
        });
        $(".m-task-date").each(function(){
            taskDate.push($(this).val());
        });
        $.ajax({ // eslint-disable-line
            url: "http://localhost/kanbanize/public/home/addMultipleTasks",
            type: "post",
            data: {
                task_title: taskTitles,
                task_description: taskDesc,
                task_status: taskStatus,
                task_date: taskDate
            },
            success: function (response, status) {
                console.log(response, status);
                $("#tasks-count").val(0);
                $("form-fields").remove();
                $(".tasks-column-wrapper").html("");
                getAllTasks();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // update tasks
    // update task to the database with ajax
    $(document).on("click", ".edit-btn", (e)=>{
        let taskId = parseInt(e.target.closest(".task-box").id);
        $("#update-modal").removeClass("hidden");
        $("#update-modal").addClass("flex");
        $("#update-modal").css("background-color", "#0000008a");
        $(".close-update-form").click(function() {
            $("#update-modal").removeClass("flex");
            $("#update-modal").addClass("hidden");
        });
        console.log(taskId);
        getTask(taskId);
        // console.log(taskId);
        $(".update-task-form").submit((e)=>{
            e.preventDefault();
            let taskTitleValue = $("#u-task-title").val();
            let taskDescValue = $("#u-task-description").val();
            let taskStatus = $("#u-lists option:selected").attr("value");
            let dueDateValue = $("#u-date-picker").val();
            // console.log(columnId);
            // eslint-disable-next-line jquery/no-ajax
            $.ajax({
                url: "http://localhost/kanbanize/public/home/updateTask",
                type: "post",
                data: {
                    task_title: taskTitleValue,
                    task_description: taskDescValue,
                    end_date: dueDateValue,
                    task_status: taskStatus,
                    task_id: taskId
                },
                success: function (responce, status) {
                    console.log(responce, status);
                    if(status === "success" && responce) {
                        $("#update-modal").removeClass("flex");
                        $("#update-modal").addClass("hidden");
                        getAllTasks();
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
            taskId = "";
        });
    });

    // delete task
    $(document).on("click", ".delete-btn",function (e) {
        let taskId = parseInt(e.target.closest(".task-box").id);
        $.ajax({ // eslint-disable-line
            url: "http://localhost/kanbanize/public/home/deleteTask",
            type: "post",
            data: {
                task_id: taskId
            },
            success: function (response, status) {
                console.log(response, status);
                $(".tasks-column-wrapper").html("");
                getAllTasks();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // archive task
    $(document).on("click", ".archive-btn", function(){
        let taskId = "";
        return taskId;
    });

    // search form
    $(".search-form").keyup(()=>{
        let formValue = $("#search-field").val();
        if(formValue !== "") {
            let task = "";
            $.ajax({ // eslint-disable-line jquery/no-ajax
                url: "http://localhost/kanbanize/public/home/searchTasks",
                type: "post",
                data: {
                    "task_title": formValue
                },
                success: (response) => {
                    console.log(response);
                    let dataParsed = $.parseJSON(response);
                    // remove old content
                    todoTasks.html("");
                    doingTasks.html("");
                    doneTasks.html("");
                    // calculate count
                    let todoCount = 0;
                    let doingCount = 0;
                    let doneCount = 0;
                    if(dataParsed.length > 0) {
                        dataParsed.forEach((element) => {
                            task = `<div class="task-box border-2 border-solid border-primary w-full rounded bg-primary text-white" id="${element.task_id}">
                                <!-- task header -->
                                <div class="task-header flex items-center justify-between py-2 px-2 bg-fourth text-black text-xl md:text-base rounded-t-md">
                                    <h2 class="task-title">${element.task_title}</h2>
                                    <div class="task-operations flex items-center gap-2">
                                        <!-- update button -->
                                        <button title="update" class="edit-btn flex items-center justify-center bg-[#EAEDFF] text-primary w-8 h-8 cursor-pointer rounded" type="button">
                                            <i class='bx bx-edit'></i>
                                        </button>
                                        <!-- delete button -->
                                        <div title="delete" class="delete-btn flex items-center justify-center bg-[#EAEDFF] text-[#FF5656] w-8 h-8 cursor-pointer rounded">
                                            <i class='bx bx-trash-alt'></i>
                                        </div>
                                        <!-- archive button -->
                                        <div title="archive" class="archive-btn flex items-center justify-center bg-[#EAEDFF] text-[#ffbb56] w-8 h-8 cursor-pointer rounded">
                                            <i class='bx bx-archive'></i>
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
                            if(element.task_status === "to do") {
                                todoTasks.prepend(task);
                                todoCount++;
                            }else if(element.task_status === "in progress") {
                                doingTasks.prepend(task);
                                doingCount++;
                            }else {
                                doneTasks.prepend(task);
                                doneCount++;
                            }
                        });
                        $(".todo-count").text(todoCount);
                        $(".in-progress-count").text(doingCount);
                        $(".done-count").text(doneCount);
                    }else {
                        todoTasks.text("No Task Found!");
                        doingTasks.text("No Task Found!");
                        doneTasks.text("No Task Found!");
                    }
                    // console.log(task);
                },
                error: (error) => {
                    console.log(error);
                }
            });
        }else {
            getAllTasks();
        }
    });

    
});

// get all tasks form the database using ajax
function getAllTasks() {
    let task = "";
    let todayDate = new Date();
    // console.log(todayDate)
    $.ajax({ // eslint-disable-line jquery/no-ajax
        url: "http://localhost/kanbanize/public/home/getAllTasks",
        type: "get",
        success: (response) => {
            let dataParsed = $.parseJSON(response);
            // remove old content
            todoTasks.html("");
            doingTasks.html("");
            doneTasks.html("");
            // calculate count
            let todoCount = 0;
            let doingCount = 0;
            let doneCount = 0;
            if(dataParsed.length > 0) {
                dataParsed.forEach((element) => {
                    // calculate date
                    let a = new Date(element.date_end);
                    const deadLine = a.getDate() - todayDate.getDate();
                    let expired = a.getTime() < todayDate.getTime() ? "expired" : "";
                    task = `<div draggable="true" class="task-box border-2 border-solid border-primary w-full rounded bg-primary text-white cursor-move" id="${element.task_id}" ondragstart="dragStart(event)" ondragend="dragEnd(event)">
                        <!-- task header -->
                        <div class="task-header flex items-center justify-between py-2 px-2 bg-fourth text-black text-xl md:text-base rounded-t-md">
                            <h2 class="task-title">${element.task_title}${element.task_status === "done" ? "<span class=\"text-green font-bold\"> :: Done</span>" : "<span class=\"text-red-800 font-bold\"> :: " + expired + "</span>"}</h2>
                            <div class="task-operations flex items-center gap-2">
                                <!-- update button -->
                                <button title="update" class="edit-btn flex items-center justify-center bg-[#EAEDFF] text-primary w-8 h-8 cursor-pointer rounded" type="button">
                                    <i class='bx bx-edit'></i>
                                </button>
                                <!-- delete button -->
                                <div title="delete" class="delete-btn flex items-center justify-center bg-[#EAEDFF] text-[#FF5656] w-8 h-8 cursor-pointer rounded">
                                    <i class='bx bx-trash-alt'></i>
                                </div>
                                <!-- archive button -->
                                <div title="archive" class="archive-btn flex items-center justify-center bg-[#EAEDFF] text-[#ffbb56] w-8 h-8 cursor-pointer rounded">
                                    <i class='bx bx-archive'></i>
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
                                    <p>Due in ${element.date_end}${element.task_status === "done" ? "" : " / " + deadLine + " Days Left"}</p>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    if(element.task_status === "to do") {
                        todoTasks.prepend(task);
                        todoCount++;
                    }else if(element.task_status === "in progress") {
                        doingTasks.prepend(task);
                        doingCount++;
                    }else {
                        doneTasks.prepend(task);
                        doneCount++;
                    }
                });
                $(".todo-count").text(todoCount);
                $(".in-progress-count").text(doingCount);
                $(".done-count").text(doneCount);
            }
            // console.log(task);
        },
        error: (error) => {
            console.log(error);
        }
    });
}

// drag 
// eslint-disable-next-line no-unused-vars
function dragStart(event) {
    let task = event.target;
    task.classList.add("draggable");
}
// eslint-disable-next-line no-unused-vars
function dragOver(event) {
    event.preventDefault();
}
// eslint-disable-next-line no-unused-vars
function dragEnd(event) {
    let task = event.target;
    task.classList.remove("draggable");
}

// eslint-disable-next-line no-unused-vars
function dropTask(event) {
    let container = event.target; 
    let taskId = $(".task-box.draggable").attr("id");
    let status = container.id;
    if(status === "in-progress") status = "in progress";
    else if(status === "done") status = "done";
    else status = "to do";
    // console.log(status);
    let draggableTask = $(".task-box.draggable");
    if(draggableTask != null) {
        $.ajax({ // eslint-disable-line
            url: "http://localhost/kanbanize/public/home/updateTaskOnDrag",
            type: "post",
            data: {
                task_id: taskId,
                task_status: status
            },
            success: (response, status) => {
                console.log(response, status);
                $(".tasks-column-wrapper").html("");
                getAllTasks();
            },
            error: (error) => {
                console.log(error);
            }
        });
    }
}