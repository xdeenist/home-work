<h1>My tasks</h1>
<?php
    use \yii\widgets\ActiveForm;
    use yii\helpers\Url;
    $this->title = 'My tasks'; 
    $this->params['breadcrumbs'][] = $this->title;
?>


    <link rel="stylesheet" type="text/css" href="/web/css/assets-minified/helpers/colors.css">
    <link rel="stylesheet" href="/web/css/proTables.css">
    <script src="/web/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/web/js/nb.js"></script>

    <a href="<?php echo Url::to(['task/create']) . "/new"; ?>" class="btn btn-default col-md-1" style="margin-left: 180px; margin-top: -45px" >Create new</a>


<div class="section2">
    <div class="wrapper">
        <div class="projects">
            <table class="jsTT" id='treeTable'> <!-- please turn it off by display: none -->
                <thead>
                <tr>
                    <th class="width-name">Name</th>
                    <th class="width-employer">Employer</th>
                    <th class="width-default">Last Activity</th>
                    <th class="width-default">Deadline</th>
                    <th class="width-default">Status</th>
                    <th class="width-progress">Progress</th>
                </tr>
                </thead>
                <tbody id='tree'>
                <tr class="treeTr">
                    <td class="taskname">
                        <span class='indent'></span>
                        <div class="show-tree" >
                            <input type="checkbox" class='checkInput'>
                        </div>
                        <span class='name'></span>
                    </td>
                    <td class='employer'></td>
                    <td class='lastActivity'></td>
                    <td class='deadline' style='overflow:hidden;'></td>
                    <td class='status'></td>
                    <td>
                        <div class="progress-bar-for-time">
                            <div class="progressbar-smaller progressbar forTime tooltip-button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Time Progress - 21%" data-value="21">
                                <div class="progressbar-value bg-blue mainProgress" style="width: 0%; overflow: hidden;"></div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="proj-info" id='details' style="height: 600px">
                <div class="proj-info-header">
                    <p>
                     <span>Last Activity:: </span><span class="lastActivity"> </span>
                    </p>
                    <p class="status-par">
                        <span>Status::</span>
                        <span class="status">...</span>
                    </p>
                </div>
                <div class="proj-description">
                    <div class="owner-block">
                        <span>Owner:: </span><span class="owner"> </span>
                    </div>
                    <div class="employers-block">
                        <p>
                        <span>Employer:: </span><span class="employer"></span>
                        </p>
                    </div>
                    <p>
                    <span>Description:: </span><span class="description">Description::  </span>
                    </p>
                </div>
                <a class="addSubtask btn btn-default col-md-5" >Add a subtask</a>
                <a class="goTask btn btn-default col-md-5" >Go to task</a>
                
                <div class="task-progress-block">
                    <div class="prog-item">
                        <p class="progress-icon">Progress</p>
                        <div class="progress-bar-for-time">
                            <div class="progressbar-smaller progressbar forTime">
                                <div class="progressbar-value bg-blue mainProgress" style="width: 0%; overflow: hidden;"></div>
                            </div>
                            <span class="progressLabel">0%</span>
                        </div>
                    </div>
                    <div class="prog-item">
                        <p class="deadline-icon">Deadline</p>
                        <p class="deadline">...</p>
                    </div>
                    <div class="prog-item">
                        <p class="start-time">Start time</p>
                        <p class="startTime">...</p>
                    </div>
                    <div class="prog-item">
                        <p class="time-spend">Time spend</p>
                        <p class="timeSpend">...</p>
                    </div>
                    <div class="prog-item">
                        <p class="estimate-icon">Estimate</p>
                        <p>
                            <span class="estim-hours estimate">0</span>
                            <span>hours</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
$t = nbInit("treeTable");
$d = nbInit();
$d.details = false;
var tasks = [];
var activeTaskIndex = null;


function expandHandler(){
    var me = this;
    var rowIndex = me.parentElement.parentElement.parentElement.rowIndex;
    console.log(me.itemId)
    if (this.checked){
        if (rowIndex < tasks.length && tasks[rowIndex -1].level < tasks[rowIndex].level){
            for (var i=rowIndex;i<tasks.length && tasks[i].level > tasks[rowIndex -1].level;i++){
                tasks[i].treeTr.style = "display:  table-row;";
            }
        }
        else {
            $.get('<?php echo Url::to(['task/get-my-my-tasks-parent']);?>', {'itemId':me.itemId}, function(result){
                result = JSON.parse(result);
                console.log(result)
                addTasks(result, rowIndex, me.level +1);
            });
        }
        tasks[rowIndex -1].checkInput.checked = true;
    }
    else {
        for (var i=rowIndex;i<tasks.length && tasks[i].level > tasks[rowIndex -1].level;i++){
            tasks[i].treeTr.style = "display:  none;";
        }
        tasks[rowIndex -1].checkInput.checked = false;
    }
    $t.tree = tasks;
}

function detailsShow(){
    $d.details = true;
    $d.details = this.nbData
    if (activeTaskIndex !== null){
        var task = tasks[activeTaskIndex];
        task.treeTr.classList.value = ["status-" + task.status, task.type].join(" ")
    }
    activeTaskIndex = tasks.indexOf(this.nbData);
    var task = tasks[activeTaskIndex];
    task.treeTr.classList.value = ["status-" + task.status, task.type, "active-task"].join(" ")

    $t.tree = tasks;
}

function r(){
    alert('sdasdasdas')
}

function addTasks(data, rowIndex, level){
    data = data.map(function(item){
        console.log(item.tags)
        item.progressLabel     = item.percentcomplete + "%"
        item.timeProgressLabel = item.timeProgress + "%"
        item.task_name         = {style: "width: " + item.task_name + "; "}
        item.progress          = {style: "width: " + item.percentcomplete + "%; overflow: hidden;"}
        item.timeProgress      = {style: "width: " + item.timeProgress + "%; overflow: hidden;"}
        item.goTask            = {href: "<?php echo Url::to(['task/task']); ?>" + "/" + item.id}
        item.addSubtask        = {href: "<?php echo Url::to(['task/create']); ?>" + "/" + item.id}
        item.docs              = item.docs != 0;
        item.notificationExists= item.notifications != 0;
        item.mainProgress      = item.progress;
        item.tagss             = item.tags;
        item.indent            = {style: "padding-left: " + 15*level + "px;"}
        item.level             = level
        item.avatar            = {src: '/web/images/images/avatar-default.png',
                                  alt: item.owner
                                 }

        item.timeSpend         = item.timespend;
        item.checkInput        = {    
                                    id: 'check' + item.id,
                                    itemId: item.id,
                                    level: level,
                                    onclick: expandHandler,
                                    checked: false
                                 }

        item.checkLabel        = {
                                    htmlFor: 'check' + item.id,
                                 } 
        item.treeTr            = {classList: {value: ["status-" + item.status, item.type].join(" ")}, //TODO check why doesn't  works classlist as array
                                  onclick: detailsShow 
                                 }

        delete item.progress;
        return item;
    });

    tasks.splice.apply(tasks, [rowIndex, 0].concat(data))

    $t.tree = tasks;
}

$.get('<?php echo Url::to(['task/get-my-my-tasks']);?>', {}, function(result){
    result = JSON.parse(result)
    addTasks(result,0,0);
});

</script>
