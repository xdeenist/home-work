<?php
//
//use yii\helpers\Html;
//use yii\grid\GridView;
//
///* @var $this yii\web\View */
///* @var $dataProvider yii\data\ActiveDataProvider */
//
//$this->title = 'Tasks';
//$this->params['breadcrumbs'][] = $this->title;
//?>
<!--<div class="task-index">-->
<!---->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>-->
<!--        --><?//= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
<!---->
<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'task_id',
//            'owner',
//            'employer',
//            'parent_task',
//            'task_name',
//            // 'task_deskription:ntext',
//            // 'deadline',
//            // 'percentcomplete',
//            // 'estimation',
//            // 'track_time:datetime',
//            // 'status',
//            // 'dell',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); ?>
<!--</div>-->


<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="c3Z0TzA4anY6Oh04A1s9RT0zHRx1dDkaCRlHf2pROSY3MwB3fE4aEg==">
    <title></title>
    <link href="/assets/4e1fec95/css/bootstrap.css" rel="stylesheet">
    <link href="/css/site.css" rel="stylesheet"></head>
<body>

<div class="wrap">
    <nav id="w0" class="navbar-inverse navbar-fixed-top navbar" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button><a class="navbar-brand" href="/index.php">My Company</a></div><div id="w0-collapse" class="collapse navbar-collapse"><ul id="w1" class="navbar-nav navbar-right nav"><li><a href="/index.php?r=site%2Findex">Home</a></li>
                    <li><a href="/index.php?r=site%2Fabout">About</a></li>
                    <li><a href="/index.php?r=site%2Fcontact">Contact</a></li>
                    <li><a href="/index.php?r=site%2Flogin">Login</a></li></ul></div></div></nav>
    <div class="container">
        <select id='models'>
            <option></option>
        </select>
        <h1>Table</h1>
        <table class='table'>
            <thead id='dataHead'>
            <tr>
                <th>
                </th>
            </tr>
            </thead>
            <tbody id='data'>
            <tr>
                <td>
                </td>
            </tr>
            </tbody>
        </table>
        <script src='http://gitlab.a-level.com.ua/gitgod/nanobind/raw/master/static/nb.js'></script>
        <script>
            var $s = nbInit({});

            function updateData(model,id,key,value){
                $.getJSON("?r=table%2Fupdate",{model: model, id: id, key: key, value: value}, function(data){
                });
            }

            function readModelData(model){
                $.getJSON("?r=table%2Fdata",{model: model}, function(data){
                    $s.dataHead = [data[0]];
                    var ediItem, ediKey, ediCell;
                    data[1].forEach(function(item){
                        for (var key in item){
                            item[key] = {
                                ondblclick: function(){
                                    //function ediFunc(){
                                    if ($s.ediInput){
                                        ediItem[ediKey] = $s.ediInput;
                                        ediCell.innerHTML = $s.ediInput;
                                        updateData(model, ediCell.parentElement.children[0].innerText, ediKey, ediItem[ediKey]);
                                        ediCell = null;
                                        ediItem = null;
                                        ediKey  = null;
                                    }
                                    else {
                                        var text = this.innerHTML;
                                        this.innerHTML = "<input id='ediInput'/>";
                                        $s.ediInput    = text;
                                        ediItem = this.parentElement.nbData;
                                        ediCell = this;
                                        var i = 0;
                                        for (var key in ediItem){
                                            if (this.parentElement.children[i] == this){
                                                ediKey = key;
                                                break;
                                            }
                                            i++;
                                        }
                                    }
                                    //}
                                },
                                innerText: item[key]
                            };
                        }
                        item.__editColumn = {onclick: function(){
                            if (confirm("Are you sure to delete?")){
                                var id = this.parentElement.children[0].innerText;
                                alert(id);
                                $.getJSON("?r=table%2Fdelete",{model: model, id: id}, function(data){
                                    readModelData(model);
                                });
                            }
                        },
                            innerHTML: "<b>X</b>"};
                    });
                    $s.data = data[1];
                })
                //.done(function() {
                //console.log( "second success" );
                //})
                //.fail(function() {
                //console.log( "error" );
                //})
                //.always(function() {
                //console.log( "complete" );
                //});
            }
            document.addEventListener("DOMContentLoaded",function(){
                $.getJSON("?r=table%2Fmodels", function(models){
                    $s.models = models;
                    for (var key in models){
                        readModelData(key);
                        break;
                    }
                    document.getElementById('models').onchange = function(){
                        readModelData(this.value);
                    }
                });
            });
        </script>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company 2017</p>

        <p class="pull-right">Powered by <a href="http://www.yiiframework.com/" rel="external">Yii Framework</a></p>
    </div>
</footer>