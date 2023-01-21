$(document).ready(function (){
    // load tasks after the document is fully loaded
    getAllTasks();
    // submit task to the database with ajax
    $(".add-task-form").submit((e)=>{
        e.preventDefault();
        let columnId = parseInt($("#lists option:selected").attr("value"));
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
                column_id: columnId
            },
            success: function (responce, status) {
                console.log(status);
                if(status === "success" && responce) {
                    $("#task-title").val("");
                    $("#task-description").val("");
                    $("#date-picker").val("");
                    // console.log(responce);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    // get the tasks form the database using ajax
    function getAllTasks() {
        let task = "";
        $.ajax({ // eslint-disable-line jquery/no-ajax
            url: "http://localhost/task-board/public/home/getAllUserTasks",
            type: "get",
            success: (response) => {
                let dataParsed = $.parseJSON(response);
                if(dataParsed.length > 0) {
                    dataParsed.forEach((element) => {
                        task += `<div class="task-box w-full rounded bg-primary text-white" id="${element.task_id}">
                            <!-- task header -->
                            <div class="task-header flex items-center justify-between py-2 px-2 bg-fourth text-black text-xl md:text-base rounded-t-md">
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
                console.log(task);
            },
            error: (error) => {
                console.log(error);
            }
        });
    }
});