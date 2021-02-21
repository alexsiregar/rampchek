<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengecekan</title>
</head>

<body>

  <form action="<?= base_url('home/coba'); ?>" method="post">

    <li>
      <label>Penguji</label>
      <input type="text" name="penguji">
    </li>
    <li>
      <label>Pengemudi</label>
      <input type="text" name="pengemudi">
    </li>
    <li>
      <label>Nama PO</label>
      <input type="text" name="nama_po">
    </li>
    <li>
      <label>No. Kendaraan</label>
      <input type="text" name="no_kend">
    </li>
    <li>
      <label>No. Stuk</label>
      <input type="text" name="no_stuk">
    </li>
    <li>
      <label>Waktu Pemeriksaan</label>
      <input type="text" name="waktu" value="<?= date("Ymd"); ?>" disabled>
    </li>

    <table border="1">
      <tr>
        <td colspan="4">UNSUR ADMINISTRASI</td>
      </tr>
      <tr>
        <td>No.</td>
        <td>Daftar Pemeriksaan</td>
        <td>Kondisi</td>
        <td>Keterangan</td>
      </tr>
      <?php $no = 1; ?>
      <?php foreach ($administrasi as $a) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $a['daftar']; ?></td>
          <td>
            <input type="hidden" name="id_unadmin[<?= $a['id_unadmin']; ?>]" value="<?= $a['id_unadmin']; ?>">
            <label>LAYAK</label>
            <input type="radio" name="admin[<?= $a['id_unadmin']; ?>]" value="LAYAK">
            <label>TIDAK LAYAK</label>
            <input type="radio" name="admin[<?= $a['id_unadmin']; ?>]" value="TIDAK LAYAK">
          </td>
          <td><textarea name="keterangan_admin" id="" cols="30" rows="10"></textarea></td>
        </tr>
      <?php endforeach; ?>

    </table>

    <table border="1">
      <tr>
        <td colspan="4">UNSUR TEKNIS</td>
      </tr>
      <tr>
        <td>No.</td>
        <td>Daftar Pemeriksaan</td>
        <td>Kondisi</td>
        <td>Keterangan</td>
      </tr>
      <?php $no = 1; ?>
      <?php foreach ($teknis as $t) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $t['daftar']; ?></td>
          <td>
            <input type="hidden" name="id_unteknis[<?= $t['id_unteknis']; ?>]" value="<?= $t['id_unteknis']; ?>">
            <label>LAYAK</label>
            <input type="radio" name="teknis[<?= $t['id_unteknis']; ?>]" value="LAYAK">
            <label>TIDAK LAYAK</label>
            <input type="radio" name="teknis[<?= $t['id_unteknis']; ?>]" value="TIDAK LAYAK">
          </td>
          <td><textarea name="keterangan_teknis" id="" cols="30" rows="10"></textarea></td>
        </tr>
      <?php endforeach; ?>


    </table>
    <input type="submit" value="KIRIM">

  </form>

  <a href="<?= base_url('auth/logout'); ?>">Logout</a>



</body>

</html>