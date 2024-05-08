

function JeVOknu(element) {
    const rect = element.getBoundingClientRect();
    console.log(rect); 
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

function PreglajAlijeVOknu() {
    const besedilo = document.querySelector(".DisplayText");
    console.log(besedilo);

    if (JeVOknu(besedilo)) {
        besedilo.classList.add('animation3');
        console.log("Element is in viewport!"); 
    } else {
        console.log("Element is not in viewport.");
    }
}

PreglajAlijeVOknu();

window.addEventListener('scroll', PreglajAlijeVOknu);