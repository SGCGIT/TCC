const parallax_el = document.querySelectorAll(".parallax")
let xValue = 0, 
yValue = 0;
let rotateDegree = 0;
/*Efeito paralax*/ 
function update(cursorPosition){
    parallax_el.forEach((el) => {
        let speedx = el.dataset.speedx;
        let speedy = el.dataset.speedy;
        let speedz = el.dataset.speedz;
        let rotateSpeed = el.dataset.rotation;

        let isInLeft = parseFloat(getComputedStyle(el).left) < window.innerHeight / 2 ? 1 : -1;
        let zValue =
        (cursorPosition - parseFloat(getComputedStyle(el).left)) * isInLeft * 0.1;

        el.style.transform = 

        `  
        
        perspective(2300px) translateZ(${
            zValue*speedz
        }px) rotateY(${rotateDegree * rotateSpeed}deg) translateX(calc(-50% + ${
            -xValue * speedx
        }px))  translateY(calc(-50% + ${yValue * speedy
        }px))`; 

 
    });
}

update(0);
window.addEventListener("mousemove", (e) => {
    xValue = e.clientX - window.innerWidth / 2;
    yValue = e.clientY - window.innerHeight / 2 ;
  
    rotateDegree = (xValue / (window.innerWidth / 2)) * 20;
    update(e.clientX);
})



/*Animação de queda*/
Array.from(parallax_el)

.forEach(el => {
    let timeline = gsap.timeline();
    timeline.from(el, {
    top: `${el.offsetHeight / 2 + +el.dataset.distance}px`,
    duration: 3.5,
    ease: "power3.out",

}
);

});

/*cards fadein*/
document.addEventListener("DOMContentLoaded", function() {
  function handleScroll() {
    var cards = document.querySelector('.cards');
    var cardsRect = cards.getBoundingClientRect();
    var windowHeight = window.innerHeight;

    // Verifique se o topo do elemento está pelo menos 20% visível na janela
    if (cardsRect.top <= windowHeight * 0.8) {
      cards.style.opacity = 1;
      window.removeEventListener('scroll', handleScroll); // Remova o evento de rolagem após a animação
    }
  }

  // Adicione um ouvinte de evento de rolagem para acionar a função quando o usuário rolar a página
  window.addEventListener('scroll', handleScroll);

  // Ative a função no carregamento da página, caso o elemento já esteja visível
  handleScroll();
});



 