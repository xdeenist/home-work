$t = nbInit("treeTable");
$d = nbInit();
$d.details = false;
var tasks = [];
var activeTaskIndex = null;
// $.jsonRPC.setup({
//   endPoint: '/api',
// //  namespace: 'datagraph'
// });

function expandHandler(){
    var me = this;
    var rowIndex = me.parentElement.parentElement.parentElement.rowIndex;
    if (this.checked){
        if (rowIndex < tasks.length && tasks[rowIndex -1].level < tasks[rowIndex].level){
            for (var i=rowIndex;i<tasks.length && tasks[i].level > tasks[rowIndex -1].level;i++){
                tasks[i].treeTr.style = "display:  table-row;";
            }
        }
        else {
            $.get('<?php echo Url::to(['task/get-my-my-tasks-noparent']);?>', {}, function(result){
                result = JSON.parse(result)
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
    //console.log(this.nbData)
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

function addTasks(data, rowIndex, level){
    data = data.map(function(item){
        item.progressLabel     = item.progress + "%"
        item.timeProgressLabel = item.timeProgress + "%"
        item.progress          = {style: "width: " + item.progress + "%; overflow: hidden;"}
        item.timeProgress      = {style: "width: " + item.timeProgress + "%; overflow: hidden;"}
        item.docs              = item.docs != 0;
        item.notificationExists= item.notifications != 0;
        item.mainProgress      = item.progress;
        item.treeTr            = {classList:
                                    {value: ["status-" + item.status, item.type].join(" ")}, //TODO check why doesn't  works classlist as array
                                  onclick: detailsShow }
        //item.treeTr            = {classList: {"0": "status-" + item.status, 
                                              //"1": item.type },
                                  //onclick: detailsShow }
        //console.log(item.treeTr.classList);

        item.indent      = {style: "padding-left: " + 15*level + "px;"}
        item.level       = level
        item.avatar      = {src: 'stylesheets/images/avatar-default.png',
                            alt: item.owner}

        item.timeSpend = Math.floor((new Date().getTime() - new Date(item.startTime).getTime()) / 3600000)
        item.checkInput  = {
                                id: 'check' + item.id,
                                itemId: item.id,
                                level: level,
                                onclick: expandHandler,
                                checked: false
                            }
        item.checkLabel  = {htmlFor: 'check' + item.id} 
        delete item.progress;
        return item;
    });

    tasks.splice.apply(tasks, [rowIndex, 0].concat(data))

    $t.tree = tasks;
}

$('')

$.get('<?php echo Url::to(['task/get-my-my-tasks']);?>', {}, function(result){
    result = JSON.parse(result)
    addTasks(result,0,0);
});



