{
    const spots = document.querySelectorAll('.tour__spot');



    const btnAll = document.querySelector('.selection__All');
    const btns = Array.from(document.querySelectorAll('.selection__item'));
    let num = null;


    function showArea() {
        const inde = btns.indexOf(this);
        num = inde;

        const spot = document.querySelectorAll(`.spot_${num}`);

        spots.forEach(item => {
            item.style.display = 'none';
        })
        spot.forEach(item => {
            item.style.display = 'inline';
        })
    }

    btns.forEach(btn => {
        btn.addEventListener('click', showArea)
    })


    btnAll.addEventListener('click', () => {
        spots.forEach(item => {
            item.style.display = 'inline';
        })
    })


}