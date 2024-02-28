// Form validation for Networking
var networkForm = document.querySelector("#networkingForm");
networkForm.addEventListener("submit", networkFormValid);

function networkFormValid(event) {
	let isFilledOut = true;
	
	if(networkForm.netName.value === "") {
		isFilledOut = false;
		networkForm.netName.style.backgroundColor = "#e0a2b2";
		event.preventDefault();
	}
	
	if(networkForm.profileLinks.value === "") {
		isFilledOut = false;
		networkForm.profileLinks.style.backgroundColor = "#e0a2b2";
		event.preventDefault();
	}
	
	let error = document.querySelector("#networkError");
	if (isFilledOut === false) {
		error.innerHTML = "Please fill in all fields before posting a project";
		event.preventDefault();
	} else {
		error.innerHTML = "";
	}
}

networkForm.netName.addEventListener("keypress", resetField);
networkForm.profileLinks.addEventListener("keypress", resetField);


// Function to reset field background to orginial color, used by all fields
function resetField(event) {
		this.style.backgroundColor = "white";
}

// Counter for textfields
networkForm.profileLinks.addEventListener("input", countChars);

function countChars(event) {
	document.getElementById("profileCounter").innerHTML = event.target.value.length + " Character Entered";
}