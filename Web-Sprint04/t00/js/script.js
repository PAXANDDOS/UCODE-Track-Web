function transformation() {
    let lab = document.getElementById("lab");
    let hero = document.getElementById("hero");

    if (hero.innerText === "Bruce Banner") {
        hero.innerText = 'Hulk';
        lab.style.fontSize = '130px';
        lab.style.letterSpacing = '6px';
        lab.style.background = '#70964b';
        lab.style.transitionDuration = '1s';
        lab.style.transitionProperty = 'all';
        lab.style.transitionTimingFunction = 'ease-in-out';
        btn.style.outline = 'none';
    }
    else {
        hero.innerText = 'Bruce Banner';
        lab.style.fontSize = '60px';
        lab.style.letterSpacing = '2px';
        lab.style.background = '#ffb300';
    }
}
