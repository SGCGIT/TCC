const formulario = document.getElementById('meuFormulario');

        formulario.addEventListener('submit', function(e) {
            e.preventDefault(); // Impede o envio padrão do formulário

            // Execute aqui qualquer validação adicional do formulário, se necessário

            // Simule o envio do formulário para ilustração
            
                // Substitua este trecho pela lógica real de envio para o servidor
                
                
                //lógica de manipulação de classes
                const formPopup = document.querySelector('.info-user');
                const link = document.getElementById('teste-a');
                formPopup.classList.add('show-teste');
             
        });
        
        
const formimg = document.getElementById('imagemPerfil');
        formimg.addEventListener('submit', function(e) {
            e.preventDefault(); // Impede o envio padrão do formulário

            // Execute aqui qualquer validação adicional do formulário, se necessário

            // Simule o envio do formulário para ilustração
            
                // Substitua este trecho pela lógica real de envio para o servidor
                
                
                //lógica de manipulação de classes
                const formPopup = document.querySelector('.info-user');
                const link = document.getElementById('teste-b');
                formPopup.classList.add('show-img-perfil');
             
        });