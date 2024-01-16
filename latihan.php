<?php 
 if ( isset($_POST["submit"])) {
    session_start();
    //cek user dan pasword
    // if (($_POST["nama"]) ) {

    } if ($_POST["username"] == "admin" && $_POST["password"] == "123"){
    
        //jika benar redirect ke halaman admin
        $_SESSION['username'] = $_POST["nama"];
        header("Location:latihan1.php");
        exit;
    //jjika salah kita tampilkan pesan kesalahan
    } else{
        $error = true;
        
    }
       
    // }

    

 
 
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan logika</title>
    <style>
        .warna-baris {
            background-color: silver;
        }

        .kotak {
            width: 30px;
            height: 30px;
            background-color: violet;
            text-align: center;
            line-height: 30px;
            float: left;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>


    <?php 
        $angka = [[1,2,3,4,5,6,7,8],
        [1,2,3,4,5,6,7,8],
        [1,2,3,4,5,6,7,8]
    ];
        ?>

    <?php foreach ($angka as $a) : ?>
    <div class="kotak"><?= $a[0]; ?></div>
    <div class="kotak"><?= $a[1]; ?></div>
    <div class="kotak"><?= $a[2]; ?></div>
    <div class="kotak"><?= $a[3]; ?></div>
    <div class="kotak"><?= $a[4]; ?></div>
    <div class="kotak"><?= $a[5]; ?></div>
    <div class="kotak"><?= $a[6]; ?></div>
    <div class="clear"></div>
    <br>
    <?php endforeach; ?>


    <br><br>

    <?php if(isset ($error)): ?>
    <p style="color:red; font-style:italic;"> usernam/pw salah!</p>
    <?php endif; ?>

    <form action="" method="post">


        <li>
            <label for="nama">nama</label>
            <input type="text" name="nama" id="nama">
        </li>

        <li>
            <label for="username">username</label>
            <input type="text" name="username" id="username">
        </li>


        <li>
            <label for="password"> password</label>
            <input type="password" name="password" id="password">
        </li>

        <button type="sumbit" name="submit">login</button>
    </form>

    <br><br>


    <table border="1" cellpadding="10" cellspacing="0">
        <?php for ($i = 2; $i <= 6; $i++): ?>
        <?php if ($i % 2 === 0) : ?>
        <tr class="warna-baris">
            <?php else if ($i % 2 === 0):    ?>
        <tr></tr>
        <?php else:?>
        adsadda
    <?php endif; ?>
        <?php for ($j = 1; $j <= 5; $j++): ?>
        <td><?= "$i, $j"; ?></td>
        <?php endfor; ?>
        </tr>
        <?php endfor;?>
    </table>

</body>

</html>