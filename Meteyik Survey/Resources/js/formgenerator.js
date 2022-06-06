let textcount = 0;
let filecount = 0;
let radiocount = 0;
let checkcount = 0;
let fieldcount = 0;
let choicecount = 0;
let count = 1;
let repeatcheck = false;
let questions = {};


function genText() {
    let f = document.getElementById('mainform');
    let labelbox = document.createElement('label');
    let textbox = document.createElement('input');
    labelbox.setAttribute('for', `text${textcount}`);
    labelbox.setAttribute('id', `label${textcount}`);
    labelbox.setAttribute('contenteditable', 'true');
    textbox.setAttribute('id', `text${textcount}`);
    textbox.setAttribute('name', `text${textcount}`);
    textbox.setAttribute('placeholder', "Your Answer in Here...");
    f.appendChild(labelbox);
    f.appendChild(textbox);
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
    let label = document.getElementById(`label${textcount}`);
    let labelchange = document.getElementById('label_input'); 
    if (labelchange.value == ""){
        label.innerHTML = "Your answer below: ";
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
    saveQuestion(1);
    count++;
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
    if (repeatcheck != false) {
        return;
    }
    for (let c = 1; c < 5; c++) {
         let remove = document.getElementById(`option${c}`);
         remove.style.display = "none";
    }
    let p = document.getElementById(`option${myChoice}`);
    p.style.display = "flex";

    if (myChoice == 3) {
        genChoice();
    }
    repeatcheck = true;
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
    if (choiceChange.value == "") {
        choicelabel.innerHTML = `Option ${choicecount + 1}`;
    }
    else {
        choicelabel.innerHTML = choiceChange.value;
    }
    choiceChange.value = "";

    span.appendChild(choice);
    span.appendChild(choicelabel);
    field.appendChild(span);

    choicecount++;
}
function removeChoice() {
    let field = document.getElementById(`field${fieldcount}`);
    field.removeChild(field.lastChild);
    choicecount--;
    if (choicecount < 0) {
        choicecount = 0;
    }
}
function applyChoice() {
    let legend = document.getElementById(`legend${fieldcount}`);
    let legendChange = document.getElementById('legend_input');
    if (legendChange.value == "") {
        legend.innerHTML = "Your Choice Below...";
    }else {
        legend.innerHTML = legendChange.value;
    }
    legendChange.value = "Your Choice Below...";

    let choicetype = document.getElementById('choicetype');
    let typevalue = choicetype.options[choicetype.selectedIndex].value;
    for (let i = 0; i < choicecount; i++) {
        let choice = document.getElementById(`field${fieldcount}input${i}`);
        choice.setAttribute('type', `${typevalue}`);
        if (typevalue == "checkbox"){
            choice.setAttribute('name', `field${fieldcount}[]`);
        }

    }
    choicetype.value = "radio";
    if (typevalue == "radio") {
        saveQuestion(2);
    }
    else {
        saveQuestion(3);
    }
    choicecount = 0;
    count++;
    
    fieldcount++;
}
function cancelChoice() {
    let form = document.getElementById('mainform');
    let field = document.getElementById(`field${fieldcount}`);
    form.removeChild(field);
    choicecount = 0;
}
function checkEmpty() {
    for (let c = 1; c < 5; c++) {
        let remove = document.getElementById(`option${c}`);
        let check = remove.style.display;
        if (check == "none") {
            return;
        }
    }
}
function makebtn() {
    let getForm = document.getElementById('mainform');
    let btn = document.createElement('input');
    btn.setAttribute('type','submit');
    btn.setAttribute('value', 'Submit');
    btn.setAttribute('id','formbtn');
    // btn.classList.add('button-26');
    getForm.appendChild(btn);
    let s_content = document.getElementById('s_content');
    let put = document.getElementById('form_page').innerHTML;
    s_content.value = put;
    saveMe();
}
function putData() {
    let s_name = document.getElementById('s_name');
    let s_desc = document.getElementById('s_desc');
    let s_age = document.getElementById('s_age');
    let s_gender = document.getElementById('s_gender');
    let s_occup = document.getElementById('s_occup');
    let s_content = document.getElementById('s_content');
    let s_questions = document.getElementById('s_questions');
    let put = document.getElementById('form_page').innerHTML;
    let name = document.getElementById('formtitle');
    let desc = document.getElementById('formdescription');
    let age = document.getElementById('age');
    let agevalue = age.options[age.selectedIndex].value;
    let gender = document.getElementById('gender');
    let gendervalue = gender.options[gender.selectedIndex].value;
    let occup = document.getElementById('occupation');
    let occupvalue = occup.options[occup.selectedIndex].value;

    s_name.value = name.textContent;
    s_desc.value = desc.textContent;
    s_age.value = agevalue;
    s_gender.value = gendervalue;
    s_occup.value = occupvalue;
    s_content.value = put;
    // let x = {
    //     saveQ : questions
    // }
    s_questions.value = JSON.stringify(questions);
    // console.log(questions);
    console.log(s_questions.value);
    // console.log(questions);
    // console.log(s_questions);
}
function saveMe() {
    let put = document.getElementById('form_page').innerHTML;
    const save = {}; 
    save['mykey'] = put; 
    // console.log(save.mykey);    
    // window.localStorage.setItem('myObject', put);
    // console.log(localStorage.getItem('myObject'));
}
function saveQuestion(type) {
    //Vector Defined
     // Adding items to the vector
    let question = {
        q_number: "",
        q_content: "",
        q_type: "",
        answer: "",
        options: []
    };
    if (type == 1) {
        question['q_number'] = count;
        question['q_content'] = document.getElementById(`label${textcount}`).textContent;
        question['q_id'] = `text${textcount}`;
        question['q_type'] = "1";
        delete question.options;
        questions[`text${textcount}`] = question;
    }
    else {
        question['q_number'] = count;
        question['q_content'] = document.getElementById(`legend${fieldcount}`).textContent;
        question['q_id'] = `field${fieldcount}`;
        delete question.answer;
        for (let i = 0; i < choicecount; i++){
            let choice = {
                number: "",
                c_id: "",
                content: "",
                selected: "0"
            };
            question.options.push(choice);
        }
        for (let i = 0; i < choicecount; i++){
            // choice['number'] = `${i + 1}`;
            question.options[i].number = `${i}`;
            question.options[i].content = document.getElementById(`field${fieldcount}label${i}`).innerHTML;
            // console.log(question.options[i].content); 
        } 
        // console.log(choice.content); 

        if (type == 2) {
            question['q_type'] = "2";
        }
        else {
            question['q_type'] = "3";
        }
        questions[`field${fieldcount}`] = question;
        console.log(questions);
    }
}
function removebtn() {
    let getForm = document.getElementById('mainform');
    getForm.removeChild(getForm.lastChild);
}
// function readMe() {    
//     let show = document.getElementById('abox');
//     let newObject = window.localStorage.getItem("myObject");
//     // console.log(JSON.parse(newObject));
//     abox.innerHTML = newObject;
// }