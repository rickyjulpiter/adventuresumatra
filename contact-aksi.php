<?php
    include 'config.php';

    $captcha = $_POST['captcha'];
    $verif = $_POST['verif'];

    if ($captcha != $verif) {
        echo "<script>
                alert('Please check captcha');
                window.history.back();
            </script>";
    }
    else if ($captcha == $verif) {

        $companyName = $_POST['company_name'];
        $fullName = $_POST['full_name'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $subject = $_POST['subject'];
        $pesan = $_POST['pesan'];

        $queryTentang = mysqli_query($koneksi,"SELECT * FROM tentang WHERE id = 1")or die(mysqli_error());
        $tentang = mysqli_fetch_assoc($queryTentang);
        $kepada = $tentang['email'];

        $title = "Contact Page Ravelino Travel Web";
        $headers = "From: ".$fullName."<".$email.">" . PHP_EOL .
        "Reply-To: ".$fullName."<".$email.">" . PHP_EOL .
        "X-Mailer: PHP/" . phpversion();
  
        // $headers = 'From: '.$kepada."\r\n" .
        // 'Reply-To: '.$kepada. "\r\n" .
        // 'X-Mailer: PHP/' . phpversion();

        $pesan =
        "From :
        Company Name :" . $companyName . "
        Name :" . $fullName."
        Email :" . $email."
        Phone No :" . $telepon. "
        Subject :" . $subject . "
        Message :" . $pesan;

        $kepada2 = "hello@sistempintar.com";
        mail($kepada2, $subject, $pesan, $headers);
        if (mail($kepada, $subject, $pesan, $headers)) {
            echo "<script>
            alert('Your message has been sent, thank you!');
            window.location.href='contactus';
            </script>";
        }
        else {
            echo "<script>
            alert('Gagal dikirim!');
            window.location.href='contactus';
            </script>";
        }
    }
?>