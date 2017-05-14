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
                stoptime = true;
                state='play';deadtime
                var button = d3.select("#button_play").classed('btn-success', true);
                button.select("i").attr('class', "glyphicon glyphicon-pause");
            }
            else if(state=='play' || state=='resume'){
                stoptime = false;
                state = 'pause';
                d3.select("#button_play i").attr('class', "glyphicon glyphicon-play");
            }
            else if(state=='pause'){
                stoptime = true;
                state = 'resume';
                d3.select("#button_play i").attr('class', "glyphicon glyphicon-pause");
            }
    
            $.get(url, {'taskId':taskId, 'state':state}, function(data){
                if (data == 1) {
                    AlertMes('You already have a task at work', 'red', 5000);
                    stoptime = false;
                }                
             });
    
        } else {
            AlertMes('Your task wait confirm', 'red', 5000)
            stoptime = false;
        }
    } else {
            AlertMes('You are not employer of this task', 'red', 5000)
    }
}

function buttonStopPress(id, denendence){
    if (control == 1) {
        if (denendence == 0) {
            if (status == 'InWork') {
                stoptime = false;
                state = 'stop';
                var button = d3.select("#button_play").classed('btn-success', false);
                button.select("i").attr('class', "glyphicon glyphicon-play");
                console.log("button stop invoked.");
                $.get(url, {'taskId':taskId, 'state':state}, function(data){});
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

function initializeTimer(timeDeadline) {
    
    var seconds = timeDeadline / 60 // определяем количество секунд до истечения таймера
    if (seconds > 0) {
        var minutes = timeDeadline; // определяем количество минут до истечения таймера
        var hours = timeDeadline/60; // определяем количество часов до истечения таймера
        minutes = (hours - Math.floor(hours)) * 60; // подсчитываем кол-во оставшихся минут в текущем часе
        hours = Math.floor(hours); // целое количество часов до истечения таймера
        seconds = Math.floor((minutes - Math.floor(minutes)) * 60); // подсчитываем кол-во оставшихся секунд в текущей минуте
        minutes = Math.floor(minutes); // округляем до целого кол-во оставшихся минут в текущем часе
        
        setTimePage(hours,minutes,seconds); // выставляем начальные значения таймера
        
        function secOut() {
          if (!stoptime) {
            delete seconds
            delete minutes
            delete hours
            return false; 
            }
          if (seconds == 0) { // если секунду закончились то
              if (minutes == 0) { // если минуты закончились то
                  if (hours == 0) { // если часы закончились то
                      AlertMes("time is off", 'red', 5000)// выводим сообщение об окончании отсчета
                  }
                  else {
                      hours--; // уменьшаем кол-во часов
                      minutes = 59; // обновляем минуты 
                      seconds = 59; // обновляем секунды
                  }
              }
              else {
                  minutes--; // уменьшаем кол-во минут
                  seconds = 59; // обновляем секунды
              }
          }
          else {
              seconds--; // уменьшаем кол-во секунд
          }
            setTimePage(hours,minutes,seconds); // обновляем значения таймера на странице
        }
        timerId = setInterval(secOut, 1000) // устанавливаем вызов функции через каждую секунду
    }
    else {
        AlertMes("time is off", 'red', 5000);
    }
}

function setTimePage(h,m,s) { // функция выставления таймера на странице
    var element = document.getElementById("timer"); // находим элемент с id = timer
    element.innerHTML = h+":"+m+":"+s; // выставляем новые значения таймеру на странице
}

function showMessage(timerId) { // функция, вызываемая по истчению времени
    alert("Время истекло!");
    clearInterval(timerId); // останавливаем вызов функции через каждую секунду
}


