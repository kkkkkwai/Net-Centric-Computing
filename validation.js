// The function is to check whether value inside "name" field is valid
function checkValidName(){
	var nameObject=document.getElementById('name');
	// If no input or name contains numbers, text field will be highlighted
	// By setting the background color to red
	if(nameObject.value=="" || nameObject.value.search(/[0-9]/)!=-1){
		nameObject.style.backgroundColor="red";
		return false;
	}
	else{
		// If valid, background color is set to normal
		nameObject.style.backgroundColor="rgba(255, 255, 255, 0.05)";
		return true;
	}
}

//The function is to check whether the passed-in element has valid number
function checkValidNum(object){
	var num=Number(object.value);
	// If there's input in text field and input is non-negative integer background color will be set to normal
	// And calculateTotal will be call to update the total_cost field
	if(object.value!="" && isValidInt(num)){
		object.style.backgroundColor="rgba(255, 255, 255, 0.05)";
		calculateTotal(false);
	}
	// If not valid, text field will be highlighted
	else{
		object.style.backgroundColor="red";
		return false;
	}
}

// The function is to check whether all number fields are correct. If so, update total_cost
// setRed is to control whether number fields are highlighted when there's invalid input
// When the user is still giving data, not necessary to highlight all incomplete fields
function calculateTotal(setRed){
	var total=document.getElementById('total_cost');
	var apple=document.getElementById('num_apple');
	var orange=document.getElementById('num_orange');
	var banana=document.getElementById('num_banana');
	var num_apple=Number(apple.value);
	var num_orange=Number(orange.value);
	var num_banana=Number(banana.value);

	// Only when all the number fields are correct will total_cost be updated with value
	// Other wise it will just display "NaN"
	if(apple.value!="" && isValidInt(num_apple)){
		if(orange.value!="" && isValidInt(num_orange)){
			if(banana.value!="" && isValidInt(num_banana)){
				total.value=0.69*num_apple+0.59*num_orange+0.39*num_banana;
				return true;
			}
		}
	}
	// If setRed is enabled, all text fields with invalid input will be highlighted
	if(setRed){
		if(!(apple.value!="" && isValidInt(num_apple)))
			apple.style.backgroundColor="red";
		if(!(orange.value!="" && isValidInt(num_orange)))
			orange.style.backgroundColor="red";
		if(!(banana.value!="" && isValidInt(num_banana)))
			banana.style.backgroundColor="red";
	}
	total.value="NaN";
	return false;
}

// To check whether a passed-in value is non-positive integer
function isValidInt(p){
	// Return true only when it is a number and it is larger than 0 and it is integer
	return !isNaN(p) && p>=0 && p===parseInt(p);
}

// To check the name and number fields respectively
// If not satisfied alert will be displayed
// POST will not be carried out with a false return
function checkValidSubmit(){
	if(!checkValidName()){
		alert("Please give a valid name.");
		return false;
	}
	if(!calculateTotal(true)){
		alert("Please give valid number(s).");
		return false;
	}
	return true;
}