let testcounter = 1;

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
  function prevTestimony() {
    testcounter--;
    if (testcounter < 1) {
      testcounter = 4;
    }
    for (let c = 1; c < 5; c++) {
      let remove = document.getElementById(`t${c}`);
      remove.style.display = "none";
    }
    let previous = document.getElementById(`t${testcounter}`);
    previous.style.display = "block";
  }

function nextTestimony() {
  testcounter++;
  if (testcounter > 4) {
    testcounter = 1;
  }
  for (let c = 1; c < 5; c++) {
    let remove = document.getElementById(`t${c}`);
    remove.style.display = "none";
  }
  let next = document.getElementById(`t${testcounter}`);
  next.style.display = "block";
}