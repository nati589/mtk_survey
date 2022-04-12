function displayMe() {
    let x = document.getElementById("form_page");
    let newObject = localStorage.getItem("myObject");

    x.innerHTML = newObject;
}