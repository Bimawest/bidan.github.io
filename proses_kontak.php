<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Format email tidak valid.";
        exit;
    }

    // Kirim email
    $tujuan = "bimarizki12345@gmail.com"; // Ganti dengan alamat email Anda
    $subjek = "Pesan dari Formulir Kontak";
    $isi_pesan = "Nama: " . $name . "\nEmail: " . $email . "\nPesan: " . $message;
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    // Tambahkan header untuk mencegah injeksi email (opsional)
    $headers .= "X-Mailer: PHP/" . phpversion();

    if (mail($tujuan, $subjek, $isi_pesan, $headers)) {
        echo "Pesan Anda telah berhasil dikirim.";
    } else {
        echo "Maaf, terjadi kesalahan saat mengirim pesan.";
    }
}
?>