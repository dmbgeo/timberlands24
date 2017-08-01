
			$(document).ready(function (){
							t=setInterval(function ()
								{
    						setTimerAction();

								},1000);
				
						});
function setTimerAction(){
	
var date = new Date();
var now = Date.now(); // текущее время
var action = new Date(date.getFullYear(),date.getMonth(),date.getDate(),23,59,59); // дата, до которой считаем.


var sc = action - now; // миллисекунды до даты
if(sc>0){
sc /= 1000; // секунды до даты
var day=sc;
day /= 60;    // минуты до даты
day /= 60;    // часы до даты
day /= 24;    // дни до даты
day=Math.floor(day);
var second=day*24*60*60;
sc-=second;
var hours=sc;
hours /= 60;    // минуты до даты
hours /= 60;    // часы до даты
hours=Math.floor(hours);
second=hours*60*60;
sc-=second;
var minutes=sc;
minutes /= 60;    // минуты до даты
minutes=Math.floor(minutes);
second=minutes*60;
sc-=second;
second=sc;
second=Math.floor(second);
day=day.toString();
hours=hours.toString();
minutes=minutes.toString();
second=second.toString();
if((day.length)===2){
	$("#timed1").text(day[0]);
	$("#timed2").text(day[1]);
	}
else{
	$("#timed1").text("0");
	$("#timed2").text(day[0]);
	}
if((hours.length)===2){
$("#timeh1").text(hours[0]);
$("#timeh2").text(hours[1]);
	}
else{
$("#timeh1").text('0');
$("#timeh2").text(hours[0]);
	}
if((minutes.length)===2){
$("#timem1").text(minutes[0]);
$("#timem2").text(minutes[1]);
	}
else{
$("#timem1").text('0');
$("#timem2").text(minutes[0]);
	}
if((second.length)===2){
$("#times1").text(second[0]);
$("#times2").text(second[1]);
console.log(second[0]+second[1]);
	}
else{
$("#times1").text('0');
$("#times2").text(second[0]);
console.log("0"+second[0]);
	}
}
	

}