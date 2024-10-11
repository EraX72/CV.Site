// Променя цвета на фона при скролиране
window.addEventListener("scroll", function() {
    let scrollPosition = window.scrollY;
    let red = Math.min(255, scrollPosition / 2);
    let green = 100;
    let blue = 150;

    document.body.style.backgroundColor = `rgb(${red}, ${green}, ${blue})`;
});
