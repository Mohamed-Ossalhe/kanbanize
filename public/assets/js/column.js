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
                        <div class="max-w-[50rem] max-h-full">
                            <!-- task column header -->
                            <div class="task-column-header capitalize border-b-2 border-third py-2 my-3">
                                <h3>${element.task_col_name}</h3>
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