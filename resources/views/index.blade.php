<!DOCTYPE html>
<html lang="en">
<head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>
      <title>Proyek STKI</title>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

<body>
    <div class="section">

      <form class="" action="index.html" method="post">
      <!--   Icon Section   -->
          <div class="row">
            <div class="col s12 center">
              <div class="icon-block">
                <h5>Pengkategorian Buku Berdasarkan Sinopsis menggunakan Stemming Tala</h5>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6 offset-s3">
              <input name="judul_buku" id="judul_buku" type="text" class="validate">
              <label for="judul_buku">Judul Buku</label>
            </div>
          </div>
          <div class="row">
            <div class="col s6 offset-s3 input-field">
                <textarea name="sinopsis" id="sinopsis" type="text" class="materialize-textarea"></textarea>
                <label for="sinopsis">Sinopsis Buku</label>
            </div>
          </div>
          <div class="row">
            <div class="col s6 offset-s3">
              <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
              </button>
            </div>
          </div>
        </form>
    </div>



  <!--  Scripts-->
  <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>

  </body>
</html>
