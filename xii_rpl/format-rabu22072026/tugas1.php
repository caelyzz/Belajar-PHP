<!DOCTYPE html>
<html>
    <head>
       <title>
        Tes web php
       </title> 
    </head>
    <body>
        <form action ="" method="post">
            nama : <input type="text" name="nama"><br>
            email: <input type="email" name="email"><br>
            komentar : <textarea name="komentat"> </textarea><br>
            <input type="submit" value="kirim">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $n = $_POST["nama"];
            $e = $_POST["email"];
            $k = $_POST["komentar"];

            $panjang_n = strlen($n);
            $panjang_e = strlen($e);
            $panjang_k = strlen($k);

            $n_bersih = strip_tags($n);
            $e_bersih = strip_tags($e);
            $k_bersih = strip_tags($k);

            $n_final = trim($n);
            $e_final = trim($e);
            $k_final = trim($k);

            $waktu = date("d-m-y");
            
        }
        ?>
    </body>
</html>