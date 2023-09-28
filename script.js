const cadbtn = document.querySelectorAll(".form .btn-16 a");
const formpopup = document.querySelectorAll("info-user");
cadbtn.forEach(link => {
    link.addEventListener("click", (e) => {
        e.preventDefault();
        //formpopup.classList[link.id === "teste-a" ? 'add' : 'remove']("show-teste");
         // Encontre o elemento "info-user" pai do link clicado
         const formPopup = link.closest(".info-user");

         // Verifique se encontrou um elemento "info-user" antes de adicionar/ remover classes
         if (formPopup) {
             formPopup.classList[link.id === "teste-a" ? 'add' : 'remove']("show-teste");
         }
    })
})



