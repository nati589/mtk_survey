let testcounter = 1;
document.getElementById('testimony_container').addEventListener('click', nextTestimony);

const headersection = document.querySelector('header');
const sectionOne = document.querySelector('section#herosection');

const sectionOneOptions = {
    rootMargin: '-17%'
};

const sectionOneObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if(!entry.isIntersecting) {
            headersection.classList.add('nav-scrolled');
        }
        else {
            headersection.classList.remove('nav-scrolled');
        }
     })
}, sectionOneOptions); 

sectionOneObserver.observe(sectionOne);

function hamBurger() {
    let x = document.querySelector('aside');
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
  } 

function changeTestimony(change) {
    for (let c = 1; c < 5; c++) {
      let remove = document.getElementById(`t${c}`);
      remove.style.display = "none";
      let removebtn = document.getElementById(`changebtn${c}`);
      removebtn.classList.remove('selectbtn');
    }
    let previous = document.getElementById(`t${change}`);
    previous.style.display = "block";
    let addbtn = document.getElementById(`changebtn${change}`);
    addbtn.classList.add('selectbtn');
    testcounter = change;
}
function nextTestimony() {
  if (testcounter == 4) {
    testcounter = 1;
  }
  else {
    testcounter++;
  }
  changeTestimony(testcounter);
}