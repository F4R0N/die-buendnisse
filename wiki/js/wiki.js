function addNewElement() {

    document.getElementById("Elements").appendChild(document.createElement("label"));
    document.getElementById("Elements").lastElementChild.innerHTML = "Element";
    var textarea = document.createElement("textarea");
    textarea.setAttribute("name", "elements[]");
    document.getElementById("Elements").appendChild(textarea);
    document.getElementById("Elements").lastElementChild.focus();

}

function openAddNewTopic() {
    
    document.getElementById("addTopic").style.display = "block";
    document.getElementById("addTopicLayer").style.display = "block";
    
}

function closeAddTopic() {
    
    document.getElementById("addTopic").style.display = "none";
    document.getElementById("addTopicLayer").style.display = "none";
    
}

function clearForm() {
    if(confirm("Do you realy want to clear this form?")){
        document.getElementById("formAdd").reset();
    }
   
}