var state = 'stop';

function buttonBackPress() {
    console.log("button back invoked.");
}

function buttonForwardPress() {
    console.log("button forward invoked.");
}

function buttonRewindPress() {
    console.log("button rewind invoked.");
}

function buttonFastforwardPress() {
    console.log("button fast forward invoked.");
}

function getButtonAttr(id){
    $.get(url, {'taskId':taskId, 'state':0}, function(data){
        console.log(data);
    });
}

function buttonPlayPress(id) {
    if (control == 1) {
        if (status == 'InWork' || status == 'WaitSubmit') {
            if(state=='stop'){
                state='play';
                var button = d3.select("#button_play").classed('btn-success', true);
                button.select("i").attr('class', "glyphicon glyphicon-pause");
            }
            else if(state=='play' || state=='resume'){
                state = 'pause';
                d3.select("#button_play i").attr('class', "glyphicon glyphicon-play");
            }
            else if(state=='pause'){
                state = 'resume';
                d3.select("#button_play i").attr('class', "glyphicon glyphicon-pause");
            }
            // console.log("button play pressed, play was "+state);
    
            $.get(url, {'taskId':taskId, 'state':state}, function(data){ });
    
        } else {
            AlertMes('Your task wait confirm', 'red', 5000)
        }
    } else {
            AlertMes('You are not employer of this task', 'red', 5000)
    }
}

function buttonStopPress(id, denendence){
    console.log(denendence)
    if (control == 1) {
        if (denendence == 0) {
            if (status == 'InWork') {
                state = 'stop';
                var button = d3.select("#button_play").classed('btn-success', false);
                button.select("i").attr('class', "glyphicon glyphicon-play");
                console.log("button stop invoked.");
                $.get(url, {'taskId':taskId, 'state':state}, function(data){ console.log(data) });
                AlertMes('Your task sent to submit', 'green', 5000)
            } else {
                AlertMes('Your task is not in work', 'red', 5000)
            }
        } else {
                AlertMes('Your task can not be closed because there are unfinished tasks', 'red', 15000)
        }
    } else {
            AlertMes('You are not employer of this task', 'red', 5000)
    }
}

function AlertMes(msge, color, time){
    if (!$("div").is("#infmsg")) {
        $('#taskinf').append('<span style="color: ' + color + ';" id="msg">' + msge + '</span>');
    }  else {
        $('#infmsg').empty();
        $('#infmsg').append('<span style="color: ' + color + ';" id="msg">' + msge + '</span>');
    }  
    setTimeout(function(){$('#msg').fadeOut('fast')},time);  //30000 = 30 секунд
}


