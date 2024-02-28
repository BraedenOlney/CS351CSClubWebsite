// Form validation for Join
var joinForm = document.querySelector("#joinForm");
joinForm.addEventListener("submit", joinFormValid);

function joinFormValid(event) {
	let isFilledOut = true;
	
	if(joinForm.joinUserName.value === "") {
		isFilledOut = false;
		joinForm.joinUserName.style.backgroundColor = "#e0a2b2";
		event.preventDefault();
	}
	
	if(joinForm.joinPassword.value === "") {
		isFilledOut = false;
		joinForm.joinPassword.style.backgroundColor = "#e0a2b2";
		event.preventDefault();
	}
	
	if(joinForm.joinName.value === "") {
		isFilledOut = false;
		joinForm.joinName.style.backgroundColor = "#e0a2b2";
		event.preventDefault();
	}
	
	if (joinForm.joinSkillsList.selectedIndex === -1) {
		isFilledOut = false;
		joinForm.joinSkillsList.style.backgroundColor = "#e0a2b2";
		event.preventDefault();
	}
	
	let error = document.querySelector("#joinError");
	if (isFilledOut === false) {
		error.innerHTML = "Please fill in all fields before posting a project";
		event.preventDefault();
	} else {
		error.innerHTML = "";
	}
}

joinForm.joinUserName.addEventListener("keypress", resetField);
joinForm.joinPassword.addEventListener("keypress", resetField);
joinForm.joinName.addEventListener("keypress", resetField);
joinForm.joinSkillsList.addEventListener("focus", resetField);

// Function to reset field background to orginial color, used by all fields
function resetField(event) {
		this.style.backgroundColor = "white";
}
