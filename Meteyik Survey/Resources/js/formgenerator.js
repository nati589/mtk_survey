let textcount = 0;
let filecount = 0;
let radiocount = 0;
let checkcount = 0;
let count = 0;
let repeatcheck = false;


function genText() {
    if (repeatcheck != false) {
        return;
    }
    repeatcheck = true;
    let f = document.getElementById('mainform');
    let labelbox = document.createElement('label');
    let textbox = document.createElement('input');
    labelbox.setAttribute('for', `text${textcount}`);
    labelbox.setAttribute('id', `label${textcount}`);
    textbox.setAttribute('id', `text${textcount}`);
    f.appendChild(labelbox);
    f.appendChild(textbox);
    // document.body.appendChild(f);
}
function stopRepeat() {
    repeatcheck = false;
    for (let c = 1; c < 5; c++) {
        let remove = document.getElementById(`option${c}`);
        remove.style.display = "none";
   }
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
    let inputtype = document.getElementById('texttype');
    let typevalue = inputtype.options[inputtype.selectedIndex].value;
    let input = document.getElementById(`text${textcount}`);
    input.setAttribute('type', `${typevalue}`);
    textcount++;
}


function choice(myChoice) {
    for (let c = 1; c < 5; c++) {
         let remove = document.getElementById(`option${c}`);
         remove.style.display = "none";
    }
    c = 1;
    let p = document.getElementById(`option${myChoice}`);
    
    p.style.display = "block";
    
}
