<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tugas</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <h1>Praktikum PHP Dasar</h1>
    <form action="" method="post" class="container">
      <div class="form-control">
        <label for="nama">Nama</label>
        <input type="text" name="nama" placeholder="Masukan nama" required />
      </div>
      <div class="form-control">
        <label for="nama">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" required />
      </div>
      <div class="form-control">
        <label for="nama">Pekerjaan</label>
        <select name="pekerjaan" required>
          <option value="">- Pilih Pekerjaan -</option>
          <option value="Guru">Guru</option>
          <option value="Dokter">Dokter</option>
          <option value="PNS">PNS</option>
          <option value="Apoteker">
            Apoteker
          </option>
        </select>
      </div>
      <button type="submit">Kirim</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['nama'] != '') {
        $nama = ucwords(strtolower($_POST['nama']));

        // Tanggal Lahir
        $lahir = date_format(date_create($_POST['tgl_lahir']), "d F Y");

        // Hitung Umur
        $tgl = new DateTime($_POST['tgl_lahir']);
        $today = new DateTime('today');
        $umur = $today->diff($tgl)->y;

        // Pekerjaan dan Gaji
        $pekerjaan = $_POST['pekerjaan'];
        $gaji = "";

        switch ($pekerjaan) {
            case 'Dokter' :
                $gaji = "15 juta";
                break;

            case 'Guru':
                $gaji = "3 Juta";
                break;

            case 'PNS':
                $gaji = "5 Juta";
                break;

            case 'Apoteker':
                $gaji = "4 Juta";
                break;

            default :
                $gaji = '0';
                break;
        }        
    ?>

    <div class="container">
      <h3>Hasil</h3>
      <hr />
      <table>
        <tr>
          <td>Nama</td>
          <td>
            :
            <?= $nama ?>
          </td>
        </tr>

        <tr>
          <td>Tanggal Lahir</td>
          <td>
            :
            <?= $lahir ?>
          </td>
        </tr>

        <tr>
          <td>Umur</td>
          <td>
            :
            <?= $umur ?>
            Tahun
          </td>
        </tr>

        <tr>
          <td>Pekerjaan</td>
          <td>
            :
            <?= $pekerjaan ?>
          </td>
        </tr>

        <tr>
          <td>Gaji</td>
          <td>: Rp.<?= $gaji ?></td>
        </tr>
      </table>
    </div>
    <?php
    }
    ?>
  </body>
</html>