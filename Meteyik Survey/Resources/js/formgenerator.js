let textcount = 0;
let filecount = 0;
let radiocount = 0;
let checkcount = 0;
let fieldcount = 0;
let choicecount = 0;
let count = 0;
let repeatcheck = true;


function genText() {
    if (repeatcheck != false) {
        return;
    }
    let f = document.getElementById('mainform');
    let labelbox = document.createElement('label');
    let textbox = document.createElement('input');
    labelbox.setAttribute('for', `text${textcount}`);
    labelbox.setAttribute('id', `label${textcount}`);
    textbox.setAttribute('id', `text${textcount}`);
    textbox.setAttribute('placeholder', "Your Answer in Here...");
    f.appendChild(labelbox);
    f.appendChild(textbox);
    repeatcheck = true;
    // document.body.appendChild(f);

}
function toggleRepeat() {
    repeatcheck = true;
}
function stopRepeat() {
    repeatcheck = false;
}
function cancelText() {
    for (let c = 1; c < 5; c++) {
        let remove = document.getElementById(`option${c}`);
        remove.style.display = "none";
   }
}
function textChange() {
    let form = document.getElementById('mainform');

    let label = document.getElementById(`label${textcount}`);
    let labelchange = document.getElementById('label_input'); 
    if (labelchange.value == ""){
        form.removeChild(label);
    }else {
        label.innerHTML = labelchange.value;
    }
    labelchange.value = "";

    let inputtype = document.getElementById('texttype');
    let typevalue = inputtype.options[inputtype.selectedIndex].value;
    let input = document.getElementById(`text${textcount}`);
    input.setAttribute('type', `${typevalue}`);
    inputtype.value = "text";

    let placeholder = document.getElementById(`text${textcount}`);
    let placeholderChange = document.getElementById('placeholder_input'); 
    placeholder.setAttribute('placeholder', `${placeholderChange.value}`);
    placeholderChange.value = "Your Answer Here...";

    let required = document.getElementById('requiredbox');
    let requiredvalue = required.options[required.selectedIndex].value;
    let reqinput = document.getElementById(`text${textcount}`);
    if (requiredvalue == "required"){
        reqinput.setAttribute('required', '');
    }
    required.value = "required";

    textcount++;
}
function formHeader() {
    let title = document.getElementById('formtitle');
    let description = document.getElementById('formdescription');
    let titleChange = document.getElementById('titlebox');
    let descriptionChange = document.getElementById('forminfobox');
    title.innerHTML = titleChange.value;
    description.innerHTML = descriptionChange.value;
    titleChange.value = "";
    descriptionChange.value = "";
}

function choice(myChoice) {
    for (let c = 1; c < 5; c++) {
         let remove = document.getElementById(`option${c}`);
         remove.style.display = "none";
    }
    c = 1;
    let p = document.getElementById(`option${myChoice}`);
    
    p.style.display = "flex";
}

function genChoice() {
    let form = document.getElementById('mainform');
    let field = document.createElement('fieldset');
    let legend = document.createElement('legend');
    field.setAttribute('id', `field${fieldcount}`);
    legend.setAttribute('id', `legend${fieldcount}`);
    legend.innerHTML = "Your Choice Below...";
    form.appendChild(field);
    field.appendChild(legend);
}

function choiceOptions() {
    let field = document.getElementById(`field${fieldcount}`);
    let span = document.createElement('span');
    span.setAttribute('id', `span${choicecount}`);
    let choice = document.createElement('input');
    choice.setAttribute('type','radio');
    choice.setAttribute('id', `field${fieldcount}input${choicecount}`);
    choice.setAttribute('value', `${choicecount}`);
    choice.setAttribute('name', `field${fieldcount}`);
    let choicelabel = document.createElement('label');
    choicelabel.setAttribute('for', `field${fieldcount}input${choicecount}`);
    choicelabel.setAttribute('id', `field${fieldcount}label${choicecount}`);
    let choiceChange = document.getElementById('options_input');
    choicelabel.innerHTML = choiceChange.value;
    choiceChange.value = "";
    span.appendChild(choice);
    span.appendChild(choicelabel);
    field.appendChild(span);

    choicecount++;
    // field.appendChild(span);
}
function removeChoice() {
    let field = document.getElementById(`field${fieldcount}`);
    field.removeChild(field.lastChild);
    choicecount--;
}

function applyChoice() {
    let legend = document.getElementById(`legend${fieldcount}`);
    let legendChange = document.getElementById('legend_input');
    legend.innerHTML = legendChange.value;
    legendChange.value = "Your Choice Below...";

    let choicetype = document.getElementById('choicetype');
    let typevalue = choicetype.options[choicetype.selectedIndex].value;
    for (let i = 0; i < choicecount; i++) {
        let choice = document.getElementById(`field${fieldcount}input${i}`);
        choice.setAttribute('type', `${typevalue}`);
    }
    choicetype.value = "radio";
    choicecount = 0;
    fieldcount++;

}

function cancelChoice() {
    let form = document.getElementById('mainform');
    let field = document.getElementById(`field${fieldcount}`);
    form.removeChild(field);
}

// function form(html,user) {
//   this.html=html;
//   this.user=user;
// }
