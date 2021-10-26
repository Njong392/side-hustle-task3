var today = new Date(); //create a new date object
var hourNow = today.getHours(); //find the current hour
var greeting;

//display greeting on the web page depending on the set hour
if(hourNow>18){
    greeting = 'Good Evening';
}

else if(hourNow > 12){
    greeting = 'Good Afernoon';
}
else{
    greeting = 'Welcome';
}
document.write(greeting);

