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

      <form class="" action="/tokenizing" method="post">
      <!--   Icon Section   -->
          <div class="row">
            <div class="col s12 center">
              <div class="icon-block">
                <h5>Tokenize</h5>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s6 offset-s3">
              <table class="striped responsive-table highlight">
                <thead>
                  <tr>
                      <th>Kode Dokumen</th>
                      <th>Kata/Token</th>
                  </tr>
                </thead>

                <tbody>
                  @for ($i=0; $i < 10; $i++)
                    <tr>
                      <td>Alvin</td>
                      <td>Eclair</td>
                    </tr>
                  @endfor


                </tbody>
              </table>
            </div>
          </div>
        </form>
    </div>



  <!--  Scripts-->
  <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>

  </body>
</html>
