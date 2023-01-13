<!DOCTYPE html>
<html>

<head lang="pt-br">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style type="text/css">
    .row {
      display: -ms-flexbox;
      /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap;
      /* IE10 */
      flex-wrap: wrap;
      padding: 44px 44px;
    }
  </style>
  <title>Cadastro</title>
</head>

<body>

  <center>
    <br>
    <h3>Cadastro</h3>
    <br>
    <div class="card">
      <div class="card-body">

        <form name="frmUsuario" action="../model/incluirCadastro.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
          <div class="col-md-5 mb-3">
            <label>Nome completo:</label>
            <input type="text" name="nome" class="form-control" placeholder="Nome completo" required>
            <div class="invalid-feedback">
              Por favor, informe um nome válido.
            </div>
          </div>

          <div class="col-md-5 mb-3">
            <label>E-mail:</label>
            <input name="email" type="email" class="form-control" placeholder="E-mail" required>
            <div class="invalid-feedback">
              Por favor, informe um email válido.
            </div>
          </div>

          <div class="col-md-5 mb-3">
            <label>Senha:</label>
            <input name="senha" type="password" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Senha" required minlength="8" maxlength="15">
            <small id="passwordHelpBlock" class="form-text text-muted">
              Sua senha deve conter entre 8 a 15 caracteres.
            </small>
            <div class="invalid-feedback">
              Por favor, informe uma senha válida.
            </div>
          </div>

          <label>Foto do perfil:</label>
          <div class="form-group" style="margin-left:390px">
            <input name="fileUpload" type="file" class="form-control-file">
          </div>
      </div>


    </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Cadastrar</button><br>

    Caso seja um administrador, cadastre-se <a href="formPr.php">aqui</a>
    <br>
    <br>
    <br>

    </form>
    </fieldset>
    <script>
      (function() {
        'use strict';
        window.addEventListener('load', function() {

          var forms = document.getElementsByClassName('needs-validation');

          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </center>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>