  var counter = 1;
  var counterY = 1;

 var outcome = 0;
    
confirm("Ready to play?")

function choiceNo(){
      var text = document.getElementById("gametxt");
      
    //choice 1
     
    if (counter == 1){
       counter++;
       text.innerHTML = "Sir! are you sure? This decision could cost us millions of dollars";
     outcome++;
    }
 
}
      if (outcome == 3){
     text.innerHTML = "Congratulations, You made the right choice, but you costed your company 3.8 million dollars, you have been awarded 4 out of a possible 20 points"
    } 
     
    function choiceYes(){
    var text = document.getElementById("gametxt");
    
    //choice 1
    if (counterY == 1){
     text.innerHTML = "Okay, but sir you must think of the enviromental implications of this decision, hundreds of animals could die! Are your sure about this sir?"
     counterY++;
    }
     if (counter == 2){
      text.innerHTML = "Yes, Sir! we will do as you say."
      outcome = outcome + 2;
     }
}
    
