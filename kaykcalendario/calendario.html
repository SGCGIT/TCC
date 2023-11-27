<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>


  <link href="css/custom.css" rel="stylesheet">
  <title>Calendario</title>
</head>

<body>

  <div class="container">

    <h2 class="mb-5">Calendario</h2>

    <span id="msg"></span>

    <div id='calendar'></div>

  </div>

  <!-- Modal Visualizar-->
  <div class="modal fade" id="visualizarModal" tabindex="-1" aria-labelledby="visualizarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="visualizarModalLabel">Visualizar o evento</h1>
          <h1 class="modal-title fs-5" id="editarModalLabel" style="display: none;">Editar o evento</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <span id="msgViewEvento"></span>

          <div id="visualizarEvento">

            <dl class="row">

              <dt class="col-sm-3">ID: </dt>
              <dd class="col-sm-9" id="visualizar_id"></dd>

              <dt class="col-sm-3">Título: </dt>
              <dd class="col-sm-9" id="visualizar_title"></dd>

              <dt class="col-sm-3">Ínicio: </dt>
              <dd class="col-sm-9" id="visualizar_start"></dd>

              <dt class="col-sm-3">Fim: </dt>
              <dd class="col-sm-9" id="visualizar_end"></dd>

            </dl>

            <button type="button" class="btn btn-warning" id="btnViewEditEvento">Editar</button>

            <button type="button" class="btn btn-danger" id="btnApagarEvento">Apagar</button>
          </div>

          <div id="editarEvento" style="display: none;">

            <span id="msgEditEvento"></span>

            <form method="POST" id="formEditEvento">

              <input type="hidden" name="edit_id" id="edit_id">

              <div class="row mb-3">
                <label for="edit_title" class="col-sm-2 col-form-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="edit_title" class="form-control" id="edit_title" placeholder="Título do evento">
                </div>
              </div>

              <div class="row mb-3">
                <label for="edit_start" class="col-sm-2 col-form-label">Início</label>
                <div class="col-sm-10">
                  <input type="datetime-local" name="edit_start" class="form-control" id="edit_start">
                </div>
              </div>

              <div class="row mb-3">
                <label for="edit_end" class="col-sm-2 col-form-label">Fim</label>
                <div class="col-sm-10">
                  <input type="datetime-local" name="edit_end" class="form-control" id="edit_end">
                </div>

              </div>


              <div class="row mb-3">
                <label for="edit_color" class="col-sm-2 col-form-label">Cor</label>
                <div class="col-sm-10">
                  <select name="edit_color" class="form-control" id="edit_color">

                    <option value="">Selecione</option>
                    <option style="color:#fe0902;" value="#fe0902">Vermelho</option>
                    <option style="color:#1104fc;" value="#1104fc">Azul</option>
                    <option style="color:#c67591;" value="#c67591">Rosa</option>
                    <option style="color:#337d26;" value="#337d26">Verde</option>
                    <option style="color:#7e097e;" value="#7e097e">Roxo</option>
                    <option style="color:#f7a837;" value="#f7a837">Laranja</option>
                  </select>
                </div>

              </div>

              <button type="button" name="btnViewEvento" class="btn btn-primary" id="btnViewEvento">Cancelar</button>

              <button type="submit" name="btnEditEvento" class="btn btn-warning" id="btnEditEvento">Salvar</button>

            </form>

          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal Criar-->
  <div class="modal fade" id="criarModal" tabindex="-1" aria-labelledby="criarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="criarModalLabel">Criar evento</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <span id="msgCriarEvento"></span>

          <form method="POST" id="formCriarEvento">
            <div class="row mb-3">
              <label for="criar_title" class="col-sm-2 col-form-label">Título</label>
              <div class="col-sm-10">
                <input type="text" name="criar_title" class="form-control" id="criar_title" placeholder="Título do evento">
              </div>
            </div>

            <div class="row mb-3">
              <label for="criar_start" class="col-sm-2 col-form-label">Início</label>
              <div class="col-sm-10">
                <input type="datetime-local" name="criar_start" class="form-control" id="criar_start">
              </div>
            </div>

            <div class="row mb-3">
              <label for="criar_end" class="col-sm-2 col-form-label">Fim</label>
              <div class="col-sm-10">
                <input type="datetime-local" name="criar_end" class="form-control" id="criar_end">
              </div>

            </div>


            <div class="row mb-3">
              <label for="criar_color" class="col-sm-2 col-form-label">Cor</label>
              <div class="col-sm-10">
                <select name="criar_color" class="form-control" id="criar_color">

                  <option value="">Selecione</option>
                  <option style="color:#fe0902;" value="#fe0902">Vermelho</option>
                  <option style="color:#1104fc;" value="#1104fc">Azul</option>
                  <option style="color:#c67591;" value="#c67591">Rosa</option>
                  <option style="color:#337d26;" value="#337d26">Verde</option>
                  <option style="color:#7e097e;" value="#7e097e">Roxo</option>
                  <option style="color:#f7a837;" value="#f7a837">Laranja</option>
                </select>
              </div>

            </div>

            <button type="submit" name="btnCriarEvento" class="btn btn-success" id="btnCriarEvento">Criar</button>

          </form>

        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src='js/index.global.min.js'></script>
  <script src='js/bootstrap5/index.global.min.js'></script>
  <script src='js/core/locales-all.global.min.js'></script>
  <script src='js/custom.js'></script>

</body>

</html>