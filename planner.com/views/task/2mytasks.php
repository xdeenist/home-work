<h1>My tasks</h1>
<?php
    use \yii\widgets\ActiveForm;
    use yii\helpers\Url;
    $this->title = 'My tasks'; 
    $this->params['breadcrumbs'][] = $this->title;
    // print_r($tasks); die();
?>
    <link rel="stylesheet" type="text/css" href="/web/css/assets-minified/helpers/helpers-all.css">
    <link rel="stylesheet" type="text/css" href="/web/css/assets-minified/elements/elements-all.css">
    <link rel="stylesheet" type="text/css" href="/web/css/assets-minified/icons/fontawesome/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="/web/css/assets-minified/icons/font-awesome-new/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/web/css/assets-minified/icons/linecons/linecons.css">
    <link rel="stylesheet" type="text/css" href="/web/css/assets-minified/snippets/snippets-all.css">
    <link rel="stylesheet" type="text/css" href="/web/css/assets-minified/applications/mailbox.css">
    <link rel="stylesheet" type="text/css" href="/web/css/assets-minified/themes/supina/layout.css">
    <link id="layout-color" rel="stylesheet" type="text/css" href="/web/css/assets-minified/themes/supina/default/layout-color.css">
    <link id="framework-color" rel="stylesheet" type="text/css" href="/web/css/assets-minified/themes/supina/default/framework-color.css">
    <link rel="stylesheet" type="text/css" href="/web/css/assets-minified/themes/supina/border-radius.css">
    <link rel="stylesheet" type="text/css" href="/web/css/assets-minified/helpers/colors.css">
    <link rel="stylesheet" type="text/css" href="/web/css/assets-minified/demo-widgets.css">
    <link rel="stylesheet" href="/web/css/proTables.css">

<script src="http://gitlab.a-level.com.ua/gitgod/nanobind/raw/master/static/nb.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="/web/css/assets-minified/demo-widgets.js"></script>
<script src="/web/js/jquery.jsonrpc.js"></script>


<a href="<?php echo Url::to(['task/create']) . "/new"; ?>" class="btn btn-default col-md-1" style="margin-left: 180px; margin-top: -45px" >Create new</a>

<!--   <script src="/web/js/firebugx.js"></script>

  <script src="/web/js/jquery-1.7.min.js"></script>
  <script src="/web/js/jquery-ui-1.8.16.custom.min.js"></script>
  <script src="/web/js/jquery.event.drag-2.2.js"></script>
  
  <script src="/web/js/slick.core.js"></script>
  <script src="/web/js/slick.formatters.js"></script>
  <script src="/web/js/slick.editors.js"></script>
  <script src="/web/js/slick.grid.js"></script>
  <script src="/web/js/slick.dataview.js"></script> -->


<table class="jsTT"> <!-- please turn it off by display: none -->
    <thead>
        <tr>
            <th>Name</th>
            <th class="width-owner">Owner</th>
            <th class="width-default">Type</th>
            <th class="width-default">Deadline</th>
            <th class="width-default">Status</th>
            <th class="width-progress">Progress</th>
            <th class="width-files">More info</th>
        </tr>
    </thead>
    <tbody id='tree'>
        <tr class="treeTr">
            <td>
                <span class='indent'></span>
                <div class="show-tree">
                    <input type="checkbox" class='checkInput'>
                    <label for="check1" class='checkLabel'></label>
                </div>
                <span class='name'>
                Project1
                </span>
            </td>
            <td class='owner'>Oleg</td>
            <td class='type'>task</td>
            <td class='deadline' style='overflow:hidden;'>4/4/2017</td>
            <td class='status'>in progress</td>
            <td>
                <div class="progress-bar-for-time">
                    <div class="progressbar-smaller progressbar forTime tooltip-button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Time Progress - 21%" data-value="21">
                        <div class="progressbar-value bg-blue mainProgress" style="width: 21%; overflow: hidden;"></div>
                    </div>
                </div>
                <div class="progress-bar-for-time">
                    <div class="progressbar-smaller progressbar forTime tooltip-button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Progress - 40%" data-value="40">
                        <div class="progressbar-value bg-orange timeProgress" style="width: 40%; overflow: hidden;"></div>
                    </div>
                </div>
            </td>
            <td>
                <div class="file-links">
                    <a href="#" class='docs'><i class="fa fa-files-o" aria-hidden="true"></i></a>
                    <a href="#" class='notificationExists'>
                        <span class="bs-badge badge-absolute bg-green notifications">2</span>
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    </a>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<table width="100%">
  <tr>
    <td valign="top" width="50%">
      <div id="myGrid" style="width:610px;height:500px;margin-right:15px"></div>

    </td>
    <td valign="top" id="fullinfo">
    </td>
  </tr>
</table>

<script>
$s = nbInit();
var tasks = [];
$.jsonRPC.setup({
  endPoint: '/api',
//  namespace: 'datagraph'
});

function expandHandler(){
    var me = this;
    var rowIndex = me.parentElement.parentElement.parentElement.rowIndex;
    if (this.checked){
        if (tasks[rowIndex -1].level < tasks[rowIndex].level){
            for (var i=rowIndex;tasks[i].level > tasks[rowIndex -1].level;i++){
                tasks[i].treeTr.style = "display:  table-row;";
            }
        }
        else {
            $.jsonRPC.request('getTasksByParentId', {
                params: [me.itemId],
                success: 
                    function(result){
                        addTasks(result, rowIndex, me.level +1);
                    }
            })
        }
        tasks[rowIndex -1].checkInput.checked = true;
    }
    else {
        for (var i=rowIndex;tasks[i].level > tasks[rowIndex -1].level;i++){
            tasks[i].treeTr.style = "display:  none;";
        }
        tasks[rowIndex -1].checkInput.checked = false;
    }
    $s.tree = tasks;
}

function addTasks(data, rowIndex, level){
    data = data.map(function(item){
        item.progress     = {style: "width: " + item.progress + "%; overflow: hidden;"}
        item.timeProgress = {style: "width: " + item.timeProgress + "%; overflow: hidden;"}
        item.docs         = item.docs != 0;
        item.notificationExists         = item.notifications != 0;
        item.mainProgress  = item.progress;
        item.treeTr      = {classList: {value: "status-" + item.status + " " + item.type}}
        console.log(item.treeTr.classList);

        item.indent      = {style: "padding-left: " + 15*level + "px;"}
        item.level       = level;

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

    $s.tree = tasks;
}

$.jsonRPC.request('getTasksByParentId', {
    params: [0],
    success:
            function(result){
                addTasks(result,0,0);
            }
    }
);



</script>


<!--
<script>
// var blo = JSON.parse('<?php echo $tasks; ?>')
// console.log('<?php echo $tasks; ?>')
// alert(blo)


function requiredFieldValidator(value) {
  if (value == null || value == undefined || !value.length) {
    return {valid: false, msg: "This is a required field"};
  } else {
    return {valid: true, msg: null};
  }
}


var TaskNameFormatter = function (row, cell, value, columnDef, dataContext) {
  var fuldata = dataView.getItems();
  value = value.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;");
  var spacer = "<span style='display:inline-block;height:1px;width:" + (15 * dataContext["indent"]) + "px'></span>";
  var idx = dataView.getIdxById(dataContext.id);
  if (fuldata[idx + 1] && fuldata[idx + 1].indent > fuldata[idx].indent) {
    if (dataContext._collapsed) {
      return spacer + " <span class='toggle expand'></span>&nbsp;" + value;
    } else {
      return spacer + " <span class='toggle collapse'></span>&nbsp;" + value;
    }
  } else {
    return spacer + " <span class='toggle'></span>&nbsp;" + value;
  }
};

var TaskMoreInf = function (row, cell, value, columnDef, dataContext) {
    return "<button id='morei' class='btn btn-es' data-id="+dataContext.id+">More </button>";
};

var dataView;
var grid;
var data = []; 
var columns = [
  {id: "title", name: "Title", field: "title", width: 220, cssClass: "cell-title", formatter: TaskNameFormatter, editor: Slick.Editors.Text, validator: requiredFieldValidator},
  {id: "duration", name: "Estimation", field: "duration",width: 60, editor: Slick.Editors.Text},
  {id: "%", name: "% Complete", field: "percentComplete", width: 80, resizable: false, formatter: Slick.Formatters.PercentCompleteBar, editor: Slick.Editors.PercentComplete},
  {id: "start", name: "Lastactivity", field: "start", minWidth: 60, editor: Slick.Editors.Date},
  {id: "finish", name: "Status", field: "finish", minWidth: 60, editor: Slick.Editors.Date},
  // {id: "effort-driven", name: "Effort Driven", width: 30, minWidth: 20, maxWidth: 80, cssClass: "cell-effort-driven", field: "effortDriven", formatter: Slick.Formatters.Checkmark, editor: Slick.Editors.Checkbox, cannotTriggerInsert: true},
  {id: "more", name: "More Inf", field: "More", width: 70, formatter: TaskMoreInf,}
];

var options = {
  editable: false,
  enableAddRow: true,
  enableCellNavigation: true,
  asyncEditorLoading: false
};

var percentCompleteThreshold = 0;
var searchString = "";

function myFilter(item) {
  if (item["percentComplete"] < percentCompleteThreshold) {
    return false;
  }

  if (searchString != "" && item["title"].indexOf(searchString) == -1) {
    return false;
  }

  if (item.parent != null) {
    var parent = data[item.parent];

    while (parent) {
      if (parent._collapsed || (parent["percentComplete"] < percentCompleteThreshold) || (searchString != "" && parent["title"].indexOf(searchString) == -1)) {
        return false;
      }

      parent = data[parent.parent];
    }
  }

  return true;
}

function percentCompleteSort(a, b) {
  return a["percentComplete"] - b["percentComplete"];
}

$(function () {
 

  $.get('<?php echo Url::to(['task/get-tasks']);?>', {}, function(data){

    data = JSON.parse(data)
    // console.log(data)
    // data = eval('<?php echo $tasks; ?>')
    // console.log(datas);
    // data = blo
    // console.log(blo)
  
  
  
    // initialize the model
    dataView = new Slick.Data.DataView({ inlineFilters: true });
    dataView.beginUpdate();
    dataView.setItems(data);
    dataView.setFilter(myFilter);
    dataView.endUpdate();
  
  
    // initialize the grid
    grid = new Slick.Grid("#myGrid", dataView, columns, options);
  
    grid.onCellChange.subscribe(function (e, args) {
      dataView.updateItem(args.item.id, args.item);
    });
  
    grid.onAddNewRow.subscribe(function (e, args) {
      var item = {
        "id": "new_" + (Math.round(Math.random() * 10000)),
        "indent": 0,
        "title": "New task",
        "duration": "1 day",
        "percentComplete": 0,
        "start": "01/01/2009",
        "finish": "01/01/2009",
        "effortDriven": false,
        "more": 123
      };
      $.extend(item, args.item);
      dataView.addItem(item);
    });
  
    grid.onClick.subscribe(function (e, args) {
      if ($(e.target).hasClass("toggle")) {
        var item = dataView.getItem(args.row);
        if (item) {
          if (!item._collapsed) {
            item._collapsed = true;
          } else {
            item._collapsed = false;
          }
  
          dataView.updateItem(item.id, item);
        }
        e.stopImmediatePropagation();
      }
    });
  
  
    // wire up model events to drive the grid
    dataView.onRowCountChanged.subscribe(function (e, args) {
      grid.updateRowCount();
      grid.render();
    });
  
    dataView.onRowsChanged.subscribe(function (e, args) {
      grid.invalidateRows(args.rows);
      grid.render();
    });
  
  
    var h_runfilters = null;
   
  
    // wire up the search textbox to apply the filter to the model
    $("#txtSearch").keyup(function (e) {
      Slick.GlobalEditorLock.cancelCurrentEdit();
  
      // clear on Esc
      if (e.which == 27) {
        this.value = "";
      }
  
      searchString = this.value;
      dataView.refresh();
    })
  
    //show one task on click
    $(document.body).on("click", "#morei", function(){
      var id = $(this).data('id');
  
      function GetFullInfo(tskid){
        $.get('<?php echo Url::to(['task/get-full-task']);?>', {'id':tskid}, function(data){
          var onetask = JSON.parse(data);
          console.log(onetask);
          if (onetask.lastactivity.time == 0) {
            lastactivity = onetask.lastactivity.status
          } else {
            lastactivity = onetask.lastactivity.status + " at " + onetask.lastactivity.time;
          }
          if (onetask.owner == '<?php echo  Yii::$app->user->identity->username;?>') {
            var updatebutton = '<a href="<?php echo Url::to(['task/update']). '/';?>'+ tskid +'"><button type="button" class="btn btn-warning">Update</button></a>';
            console.log('<?php echo  Yii::$app->user->id;?>')
          } else { updatebutton = " "}

          if (onetask.worktime > 0) {
            var work = onetask.worktime + ' minutes';
          } else {
            work = ' ';
          }

          $("#fullinfo").append('<div id="taskinf" class="btn-group-lg" style="margin-top: 19px;">' +
                                '<a href="<?php echo Url::to(['task/task']). '/';?>'+ tskid +'"><h3>Task "' + onetask.task_name + '" info: </h3></a>'+
                                '<ul class="list-group">'+
                                '<li class="list-group-item list-group-item-success" placeholder="Owner">Owner :: ' + onetask.owner + '</li>' +
                                '<li class="list-group-item list-group-item-success" placeholder="Employer">Employer :: <a href="<?php echo Url::to(['user/info']). '/';?>'+onetask.employerId +'">'+ onetask.employer +'</a></li>' +
                                '<li class="list-group-item list-group-item-success" placeholder="Task Description">Task Description :: ' + onetask.task_deskription + '</li>' +
                                '<li class="list-group-item list-group-item-success" placeholder="Deadline">Deadline :: ' + onetask.deadline + '</li>' +
                                '<li class="list-group-item list-group-item-success" placeholder="Last Activity">Last Activity :: '+ lastactivity +'</li>' +
                                '<li class="list-group-item list-group-item-success" placeholder="Estimation">Estimation :: ' + onetask.estimation + ' days</li>' +
                                '<li class="list-group-item list-group-item-success" placeholder="% Complete">% Complete :: ' + onetask.percentcomplete  + ' %</li>' +
                                '<li class="list-group-item list-group-item-success" placeholder="Work Time">Work Time :: '+ work +' </li>' +
                                '<li class="list-group-item list-group-item-success" placeholder="Status">Status :: ' + onetask.status + '</li></ul></div>' + updatebutton  +
                                '<a href="<?php echo Url::to(['task/task']). '/';?>'+ tskid +'"><button style="margin-left: 10px" type="button" class="btn btn-success">View task</button></a>');
        })
      };     
  
      if (!$("div").is("#taskinf")) {
        $('#fullinfo').empty();
        GetFullInfo(id);
      }  else {
        $('#fullinfo').empty();
        GetFullInfo(id);
      }
    })
  })
});
</script>
-->
