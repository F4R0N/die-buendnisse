function addNewElement(type) {

    document.getElementById(type + "Elements").appendChild(document.createElement("label"));
    document.getElementById(type + "Elements").lastElementChild.innerHTML = "Element";
    var textarea = document.createElement("textarea");
    textarea.setAttribute("name", "elements[]");
    document.getElementById(type + "Elements").appendChild(textarea);
    document.getElementById(type + "Elements").lastElementChild.focus();

}

function openTopicWindow(type) {

    document.getElementById(type).style.display = "block";
    document.getElementById("Layer").style.display = "block";

}

function closeTopicWindow(type) {

    document.getElementById(type).style.display = "none";
    document.getElementById("Layer").style.display = "none";

}

function clearForm(type) {
    if (confirm("Do you realy want to clear this form?")) {
        document.getElementById(type + "Form").reset();
    }

}

function deleteTopic(ID) {
    if (confirm("Do you really want to delete this topic?")) {
        window.location.href = "delete.php?deleteTopic=1&ID=" + ID;
    }
}

function deleteTopicElement(ID) {
    if (confirm("Do you really want to delete this topic element?")) {
        window.location.href = "delete.php?deleteTopicElement=1&ID=" + ID;
    }
}