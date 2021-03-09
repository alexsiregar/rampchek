<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>

  <div class="tab">
    <span class="btn btn-primary mb-2" aria-disabled="true"><i class="fas fa-file-alt"></i> Unsur Administrasi</span>
    <table class="table table-bordered border-dark">
      <thead>
        <tr class="border-dark table-danger align-middle text-center">
          <th scope="col" rowspan="2" class="align-middle text-center border-dark">No</th>
          <th scope="col" rowspan="2" class="align-middle text-center border-dark">Daftar</th>
          <th scope="col" colspan="2" class="align-middle text-center border-dark">Kelayakan</th>
          <th scope="col" rowspan="2" class="align-middle text-center border-dark">Keterangan</th>
        </tr>
        <tr class="border-dark table-danger">
          <th class="border-dark">Layak</th>
          <th class="border-dark">Tidak layak</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($administrasi as $a) : ?>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $a['daftar']; ?></td>
            <td>
              <div class="radio text-center">
                <input type="hidden" name="id_unadmin[<?= $a['id_unadmin']; ?>]" value="<?= $a['id_unadmin']; ?>"><input type="radio" checked name="admin[<?= $a['id_unadmin']; ?>]" value="LAYAK">
              </div>
            </td>
            <td>
              <div class="radio text-center">
                <input type="hidden" name="id_unadmin[<?= $a['id_unadmin']; ?>]" value="<?= $a['id_unadmin']; ?>"><input type="radio" name="admin[<?= $a['id_unadmin']; ?>]" value="TIDAK LAYAK">
              </div>
            </td>
            <td>
              <input style="width: 100%;" type="text" autocomplete="off" name="keterangan_admin[]" id="keterangan_admin">
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>