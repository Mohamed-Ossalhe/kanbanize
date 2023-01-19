$(document).ready(function (){
    $(".add-task-form").submit((e)=>{
        e.preventDefault();
        let columnId = parseInt($(".tasks-column").attr("id"));
        let taskTitleValue = $("#task-title").val();
        let taskDescValue = $("#task-description").val();
        let dueDateValue = $("#date-picker").val();
        console.log(columnId);
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
                    console.log(responce);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});