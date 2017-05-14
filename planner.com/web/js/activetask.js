function getTaskInWork(){
    $.get('<?php echo Url::to(['task/get-task-in-work']) ?>', {}, function(task){
        console.log(task);
        task = JSON.parse(task);
        if (task) {
            $('#task-v').empty();
            $('#navbarnav').prepend('<li id="task-v"><a href="<?php echo Url::to(['task/task'])?>/'+task.task_id + '">Active task :: ' + task.task_name + '</a></li>');
        }
    });
}