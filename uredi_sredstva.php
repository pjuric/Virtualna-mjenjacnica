<?php
include_once 'baza.php';
include_once 'zaglavlje.php';
$bp=spojiSeNaBazu();

if(!isset($_SESSION['aktivni_korisnik_tip'])) header("Location:index.php");

if (isset($_GET['sredstva_id'])){
    $sql = "SELECT * FROM sredstva WHERE sredstva_id={$_GET['sredstva_id']}";
    $rs = izvrsiUpit($bp,$sql);
    $preuzmi = mysqli_fetch_array($rs);
    $sql2 = "SELECT * FROM valuta";
    $rs2 = izvrsiUpit($bp,$sql2);
    $preuzmi2 = mysqli_fetch_array($rs2);
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {
			$iznos=$_POST['iznos'];
			$id=$_POST['id'];
			$valuta=$_POST['valuta'];
            $korisnik=$_SESSION['aktivni_korisnik_id'];

			if($id==0){
				    $query = "SELECT * FROM sredstva WHERE korisnik_id='$korisnik' AND valuta_id='$valuta'";
                    $result = izvrsiUpit($bp,$query);

                    if (mysqli_num_rows($result) == 0) {
                        $query = "INSERT INTO sredstva
                                    (korisnik_id, valuta_id, iznos) 
                                  VALUES 
                                    ('$korisnik', '$valuta', '$iznos')";
                    } else {
                        $sredstva = mysqli_fetch_array($result);
                        $iznos = $iznos + $sredstva[3];
                        $query = "UPDATE sredstva SET iznos='$iznos' 
                                    WHERE sredstva_id='$sredstva[0]'";
                    }		
			        }
			else{
				$query="UPDATE sredstva SET iznos = '$iznos'
                     WHERE sredstva_id='$id' AND korisnik_id='$korisnik'";     
			}
			izvrsiUpit($bp,$query);
			header("Location:sredstva.php");
}
?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Uredi sredstva</title>
    </head>
    <body>
    <section>
        <form method="post" action="uredi_sredstva.php">
            <table>
                <caption>Uredi sredstva</caption>
                <thead>
                    <tr>
                        <th>Valuta</th>
                        <th>Iznos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><select name="valuta" <?php if (isset($_GET['sredstva_id'])) echo 'disabled'; ?>>
                            <?php
                                $sql2 = "SELECT * FROM valuta";
                                $rs2 = izvrsiUpit($bp,$sql2);
                                while ($valuta = mysqli_fetch_array($rs2)) {
                                    if (isset($_GET['sredstva_id']) && $preuzmi['valuta_id'] == $valuta['valuta_id']) {
                                        echo "<option selected value='{$valuta['valuta_id']}'>{$valuta['naziv']}</option>";
                                    } 
                                    else {
                                        echo "<option value=" . $valuta[0] . ">" . $valuta[2] . "</option>";
                                    }
                                 } 
                            ?>
                        </select></td>
                        <td><input type="number" name="iznos" min="0" required value="<?php if(isset($_GET['sredstva_id'])) echo $preuzmi['iznos']; ?>"></td>
                        <td><input type="hidden" name="id" value="<?php if(isset($_GET['sredstva_id'])) echo $preuzmi['sredstva_id']; else echo 0; ?>"></td>
                        <td><input type="submit" value="Spremi sredstva"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </section>
    </body>
    </html>

