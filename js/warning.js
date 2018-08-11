{

    function addActive() {
        this.classList.add('open');


    }

    function removeActive() {
        this.classList.remove('open');

    }
    const warningboxs = document.querySelectorAll('.warningBox');
    warningboxs.forEach(box => {
        box.addEventListener('mouseover', addActive);
        box.addEventListener('mouseleave', removeActive)
    })
}