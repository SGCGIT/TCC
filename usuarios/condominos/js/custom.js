// Executar quando o documento HTML for completamente carregado
document.addEventListener('DOMContentLoaded', function () {

  // Receber o SELETOR calendar do atributo id
  var calendarEl = document.getElementById('calendar');

  const criarModal = new bootstrap.Modal(document.getElementById("criarModal"));

  const visualizarModal = new bootstrap.Modal(document.getElementById("visualizarModal"));


  // Receber o SELETOR msgViewEvento
  const msgViewEvento = document.getElementById('msgViewEvento');

  // Instanciar FullCalendar.Calendar e atribuir a variável calendar
  var calendar = new FullCalendar.Calendar(calendarEl, {

    // Incluir o bootstrap5
    themeSystem: 'bootstrap5',

    // Criar o cabeçalho do calendário
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },

    // Definir o idioma usado no calendário
    locale: 'pt-br',

    // Definir a data inicial
    //initialDate: '2023-01-01',
    //initialDate: '2023-10-12',

    // Permitir clicar nos nomes dos dias da semana 
    navLinks: true,

    // Permitir clicar e arrastar o mouse sobre um ou vários dias no calendário
    selectable: true,

    // Indicar visualmente a área que será selecionada antes que o usuário solte o botão do mouse para confirmar a seleção
    selectMirror: true,

    // Permitir arrastar e redimensionar os eventos diretamente no calendário.
    editable: true,

    // Número máximo de eventos em um determinado dia, se for true, o número de eventos será limitado à altura da célula do dia
    dayMaxEvents: true,

    // chamar os arquivos php para recuperar os eventos
    events: 'listar_evento.php',

    eventClick: function (info) {


      // apresentar os detalhes do evento
      document.getElementById("visualizarEvento").style.display = "block";
      document.getElementById("visualizarModalLabel").style.display = "block";

      // ocultar os detalhes do evento
      document.getElementById("editarEvento").style.display = "none";
      document.getElementById("editarModalLabel").style.display = "none";

      // enviar para a janela modal os dados do evento
      document.getElementById("visualizar_id").innerText = info.event.id;
      document.getElementById("visualizar_title").innerText = info.event.title;
      document.getElementById("visualizar_start").innerText = info.event.start.toLocaleString();
      document.getElementById("visualizar_end").innerText = info.event.end !== null ? info.event.end.toLocaleString() :
        info.event.start.toLocaleString();

      // enviar os dados do evento para o formulario editar
      document.getElementById("edit_id").value = info.event.id;
      document.getElementById("edit_title").value = info.event.title;
      document.getElementById("edit_start").value = converterData(info.event.start);
      document.getElementById("edit_end").value = info.event.end !== null ? converterData(info.event.end) :
        converterData(info.event.start);
      document.getElementById("edit_color").value = info.event.backgroundColor;


      visualizarModal.show();

    },

    select: function (info) {




      document.getElementById("criar_start").value = converterData(info.start);
      document.getElementById("criar_end").value = converterData(info.start);

      criarModal.show();
    }
  });

  // Renderizar o calendario
  calendar.render();

  // Converter a data
  function converterData(data) {

    // Converter a string em um objeto Date
    const dataObj = new Date(data);

    // Extrair o ano da data
    const ano = dataObj.getFullYear();

    // Obter o mês, mês começa de 0, padStart adiciona zeros à esquerda para garantir que o mês tenha dígitos
    const mes = String(dataObj.getMonth() + 1).padStart(2, '0');

    // Obter o dia do mês, padStart adiciona zeros à esquerda para garantir que o dia tenha dois dígitos
    const dia = String(dataObj.getDate()).padStart(2, '0');

    // Obter a hora, padStart adiciona zeros à esquerda para garantir que a hora tenha dois dígitos
    const hora = String(dataObj.getHours()).padStart(2, '0');

    // Obter minuto, padStart adiciona zeros à esquerda para garantir que o minuto tenha dois dígitos
    const minuto = String(dataObj.getMinutes()).padStart(2, '0');

    // Retornar a data
    return `${ano}-${mes}-${dia} ${hora}:${minuto}`;
  }

  const formCriarEvento = document.getElementById("formCriarEvento");

  const msg = document.getElementById("msg");

  const msgCriarEvento = document.getElementById("msgCriarEvento");

  const btnCriarEvento = document.getElementById("btnCriarEvento");

  if (formCriarEvento) {

    formCriarEvento.addEventListener("submit", async (e) => {

      // permitir a atualização da pagina
      e.preventDefault();

      // mostrar no botão o texto salvando

      btnCriarEvento.value = "Salvando...";

      // Receber os dados do formulario
      const dadosForm = new FormData(formCriarEvento);

      // Chamar o arquivo PHP responsavel por salvar o evento
      const dados = await fetch("cadastrar_evento.php", {


        method: "POST",
        body: dadosForm

      });

      const resposta = await dados.json();

      // Acessar if quando não criar com sucesso
      if (!resposta['status']) {

        // Enviar a mensagem para o HTML
        msgCriarEvento.innerHTML = `<div class="alert alert-danger" role="alert">${resposta['msg']}</div>`;


      } else {

        msg.innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;

        msgCriarEvento.innerHTML = "";

        // Limapar formulário
        formCriarEvento.reset();

        // Criar um objeto com dados do evento
        const novoEvento = {

          id: resposta['id'],
          title: resposta['title'],
          color: resposta['color'],
          start: resposta['start'],
          end: resposta['end'],
        }

        // adicionar o evento ao calendario
        calendar.addEvent(novoEvento);

        // chamar a função para remover a mensagem
        removerMsg();

        // fechar a janela modal
        criarModal.hide();
      }

      btnCriarEvento.value = "Criar";


    });
  }

  // função para remover a mensagem após um tempo
  function removerMsg() {

    setTimeout(() => {
      document.getElementById('msg').innerHTML = "";
    }, 3000)
  }

  const btnViewEditEvento = document.getElementById("btnViewEditEvento");

  if (btnViewEditEvento) {

    btnViewEditEvento.addEventListener("click", () => {

      document.getElementById("visualizarEvento").style.display = "none";
      document.getElementById("visualizarModalLabel").style.display = "none";

      document.getElementById("editarEvento").style.display = "block";
      document.getElementById("editarModalLabel").style.display = "block";
    });
  }



  const btnViewEvento = document.getElementById("btnViewEvento");

  if (btnViewEvento) {

    btnViewEvento.addEventListener("click", () => {

      document.getElementById("visualizarEvento").style.display = "block";
      document.getElementById("visualizarModalLabel").style.display = "block";

      document.getElementById("editarEvento").style.display = "none";
      document.getElementById("editarModalLabel").style.display = "none";
    });
  }

  const formEditEvento = document.getElementById("formEditEvento");

  const msgEditEvento = document.getElementById("msgEditEvento");

  const btnEditEvento = document.getElementById("btnEditEvento");

  if (formEditEvento) {

    formEditEvento.addEventListener("submit", async (e) => {

      // nao permitir a atualização de pagina
      e.preventDefault();

      // apresentar no botao texto salvando
      btnEditEvento.value = "Salvando...";

      //receber os dados do formulario
      const dadosForm = new FormData(formEditEvento);

      // chamar o arquivo php reponsavel em editar o evento
      const dados = await fetch("editar_evento.php", {

        method: "POST",
        body: dadosForm
      });

      const resposta = await dados.json();

      if (!resposta['status']) {

        msgEditEvento.innerHTML = `<div class="alert alert-danger" role="alert">${resposta['msg']}</div>`;
      } else {

        msg.innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;

        msgEditEvento.innerHTML = "";

        formEditEvento.reset();

        const eventoExiste = calendar.getEventById(resposta['id']);

        if (eventoExiste) {

          eventoExiste.setProp('title', resposta['title']);
          eventoExiste.setProp('color', resposta['color']);
          eventoExiste.setStart(resposta['start']);
          eventoExiste.setEnd(resposta['end']);
        }

        // chamar a função para remover a mensagem após um determinado tempo
        removerMsg();

        // fechar a jenla modal
        visualizarModal.hide();
      }

      // apresentar no botão o texto salvar
      btnEditEvento.value = "Salvar";
    })
  }

  const btnApagarEvento = document.getElementById("btnApagarEvento");

  if (btnApagarEvento) {

    btnApagarEvento.addEventListener("click", async () => {

      // caixa de dialogo de confirmação
      const confirmacao = window.confirm("Tem certeza que deseja apagar esse evento?");

      if (confirmacao) {

        var idEvento = document.getElementById("visualizar_id").textContent;

        // chama o arquivo php responsavel por apagar o evento
        const dados = await fetch("apagar_evento.php?id=" + idEvento);

        const resposta = await dados.json();

        if (!resposta['status']) {

          msgViewEvento.innerHTML = `<div class="alert alert-danger" role="alert">${resposta['msg']}</div>`;
        } else {

          msg.innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;

          msgViewEvento.innerHTML = "";

          const eventoExisteRemover = calendar.getEventById(idEvento);

          if (eventoExisteRemover) {

            eventoExisteRemover.remove();
          }

          removerMsg();

          visualizarModal.hide();
        }
      }
    });
  }


});