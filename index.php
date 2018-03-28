<?php include 'functions.php' ?>

  <!DOCTYPE html>

  <head>
    <title>Générateur de mot de passe</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container" style="margin-top:50px;">

      <h1 class="mt-3 mb-3 pt-3 pb-3">Générateur de mots de passe</h1>

      <form method="post" action="">
        <div class="form-group row">
          <div class="form-group col-md-6">

            <div class="form-group">
              <label for="nb-passwords">Nombre de mots de passe :</label>
              <input type="number" onchange="plural();" class="col-md-3 form-control" id="nb-passwords" name="nb-passwords" value="1" min="1" max="10" step="1" />
            </div>

            <div class="form-group">
              <label id="plural-length" for="length">Longueur du mot de passe :</label>
              <input type="number" class="col-md-3 form-control" id="length" name="length" value="14" min="1" max="100" step="1" />
              <small class="form-text text-muted">Il est recommandé d'utiliser au moins 12 caractères</small>
            </div>

          </div>
          <div class="form-group col-md-6">

            <div class="form-check">
              <input type="checkbox" checked class="form-check-input" name="alpha" />
              <label>Minuscules <span class="badge badge-secondary">a-z</span></label>
            </div>

            <div class="form-check">
              <input type="checkbox" checked class="form-check-input" name="alpha_upper" />
              <label>Majuscules <span class="badge badge-secondary">A-Z</span></label>
            </div>

            <div class="form-check">
              <input type="checkbox" checked class="form-check-input" name="numeric" />
              <label>Chiffres <span class="badge badge-secondary">0-9</span></label>
            </div>

            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="special" />
              <label>Caractères spéciaux <span class="badge badge-secondary">.-+=_,!@$#*%[]{}</span></label>
            </div>

          </div>
        </div>

        <div class="form-group text-center">
          <button id="plural-generate" type="submit" class="btn btn-lg btn-primary">Générer le mot de passe !</button>
        </div>
      </form>


      <div class="jumbotron" style="margin-top:50px;">
        <div class="row">
          <div class="col-md-9">
            <textarea rows="11" style="resize:none;" class="form-control" id="passwords"><?php
              $nb_passwords = (isset($_POST["nb-passwords"]) && $_POST["nb-passwords"] !== '') ? $_POST['nb-passwords'] : 1;
              for ($pwn = 0; $pwn < $nb_passwords; $pwn++) {
                echo generate_password() . " \n";
              }
            ?></textarea>
          </div>

          <div class="col-md-3 d-flex align-items-center">
            <button id="plural-copy" onclick="copyPassword();" class="container btn btn-outline-primary float-right" type="button">Copier le mot de passe</button>
          </div>
        </div>
      </div>


    </div>

    <script type="text/javascript">
      var nbPasswords = document.getElementById("nb-passwords");
      var pluralLength = document.getElementById("plural-length");
      var pluralGenerate = document.getElementById("plural-generate");
      var pluralCopy = document.getElementById("plural-copy");
      var passwords = document.getElementById("passwords");

      function plural() {  // Met au pluriel "mot de passe" lorsque l'utilisateur choisit d'en générer plusieurs
        if (nbPasswords.value > 1) {
          pluralLength.innerHTML = "Longueur des mots de passe";
          pluralGenerate.innerHTML = "Générer les mots de passe !";
          pluralCopy.innerHTML = "Copier les mots de passe";
        } else {
          pluralLength.innerHTML = "Longueur du mot de passe";
          pluralGenerate.innerHTML = "Générer le mot de passe !";
          pluralCopy.innerHTML = "Copier le mot de passe";
        }
      }

      function copyPassword() {
        console.log(passwords);
        passwords.select();
        document.execCommand("Copy");
        pluralCopy.innerHTML = "Copié !";
      }
    </script>
  </body>
</html>
