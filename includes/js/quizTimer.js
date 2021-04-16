let c_minutes = 1;
let c_seconds = 0;
let total_seconds = 60;
let idSelector = document.getElementById("quiz-time-left");
function CheckTime(){
	idSelector.innerHTML ='Time Left: ' + c_minutes + ' minutes ' + c_seconds + ' seconds ' ;
	if(total_seconds <=0){
	    clearInterval(intervalVariable);

	    $("#submit_quiz").click()

	} else{
	    total_seconds = total_seconds -1;
	    c_minutes = parseInt(total_seconds / 60);
	    c_seconds = parseInt(total_seconds % 60);
	}
}
var intervalVariable = setInterval(CheckTime,1000)


function test(){
	console.log("shanu");
}
test();