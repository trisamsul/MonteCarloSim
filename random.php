<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Random</title>
  </head>
  <body>
    <?php if(empty($_POST)): ?>
      <form action="random.php" method="post">
        <table class="custom-padding-table">
          <tr>
            <td>Masukan iterasi random</td>
            <td>:</td>
            <td><input type="number" name="iterasi"></td>
          </tr>
          <tr>
            <td>Masukan X0</td>
            <td>:</td>
            <td><input type="number" name="x0"></td>
          </tr>
          <tr>
            <td>Masukan a</td>
            <td>:</td>
            <td><input type="number" name="a"></td>
          </tr>
          <tr>
            <td>Masukan c</td>
            <td>:</td>
            <td><input type="number" name="c"></td>
          </tr>
          <tr>
            <td>Masukan m</td>
            <td>:</td>
            <td><input type="number" name="m"></td>
          </tr>
            <td><input type="submit" value="Generate"></td>
        </table>
      </form>

    <?php else:
      $iterasi = $_POST['iterasi'];
      $x0 = $_POST['x0'];
      $a = $_POST['a'];
      $c = $_POST['c'];
      $m = $_POST['m'];

      $angka_random = [];
      $hasil = [];
      $hasil[0] = $x0;
      for($i=0; $i<$iterasi; $i++){
        $hasil[$i+1] = ($a*$hasil[$i] + $c) % $m;
      }

      for($i=0; $i<$iterasi; $i++){
        $angka_random[$i] = $hasil[$i+1]/$m;
      }

      print_r($angka_random);
    ?>
    <?php endif; ?>
  </body>
</html>
