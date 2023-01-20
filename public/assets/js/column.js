$(document).ready(function (){
    getAllUserLists();
    // post a new column into db without refreching
    $(".add-column-form").submit((e)=>{
        e.preventDefault();
        let columnTitleVal = $("#column-title").val();
        $.ajax({ // eslint-disable-line jquery/no-ajax
            url: "http://localhost/task-board/public/home/addColumn",
            type: "post",
            data: {
                columnTitle: columnTitleVal
            },
            success: (response, status) => {
                console.log(response);
                $(".message").text(response);
                console.log(status);
                $("#column-title").val("");
                $("#column-modal").css("display", "none");
                // getAllUserLists();
                location.reload();
            },
            error: (error) => {
                console.log(error);
            }
        });
    });

    // get all user column
    function getAllUserLists() {
        let column = "";
        $.ajax({ // eslint-disable-line jquery/no-ajax
            url: "http://localhost/task-board/public/home/getAllUserColumns",
            type: "get",
            success: (response) => {
                // console.log(JSON.parse(response));
                // console.log(status);
                let dataParsed = $.parseJSON(response);
                // console.log(dataParsed);
                if(dataParsed.length > 0) {
                    dataParsed.forEach((element) => {
                        // console.log(element.task_col_id);
                        column += `
                        <div class="tasks-column max-h-full" id="${element.task_col_id}">
                            <!-- task column header -->
                            <div class="task-column-header capitalize border-b-2 border-third py-2 my-3">
                                <h3>${element.task_col_name}</h3>
                            </div>
                            <!-- task column wrapper -->
                            <div class="tasks-column-wrapper scrollbar-hide flex flex-col gap-2  max-h-[400px] overflow-y-scroll">
                                
                            </div>
                        </div>`;
                    });
                }
                $(".tasks-wrapper").prepend(column);
            },
            error: (error) => {
                console.log(error);
            }
        });
    }
});