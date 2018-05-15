<!DOCTYPE html>
<html lang="en">

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}" media="screen,projection" />
  <title>Proyek STKI</title>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 center">
          <div class="icon-block">
            <h5>Tokenize + Stop Words Removal</h5>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s8" style="text-align: justify; text-justify: inter-word;">
          <label for="judul_buku">Judul Buku</label>
          <p>{{$dokumen->judul_buku}}</p>
            <label for="sinopsis">Sinopsis Buku</label>
            <p>{{$dokumen->sinopsis}}</p>
        </div>
        <div class="col s4"><br>
		<h6>Klasifikasi Buku : {{$final}}</h6>
        {{--- <div class="col s3">
          <table class="striped responsive-table highlight">
            <thead>
              <tr>
                <th style="width: 10%">Kode Dokumen</th>
                <th>Kata/Token</th>
              </tr>
            </thead>

            <tbody>
            @foreach ($token as $tokens)
              <tr>
                <td>1</td>
                <td>{{$tokens}}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div> ---}}
      </div>
  </div>
  </div>


  <!--  Scripts-->
  <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>

</body>

</html>
