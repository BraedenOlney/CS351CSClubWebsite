// counts characters in a textarea with the givin ids 
let textareaElement = document.getElementById("charCountTA");

function countChars(event){
    document.getElementById("charCount").innerHTML = event.target.value.length + " chars";
}

textareaElement.addEventListener("input", countChars);
