<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "simbps";
$p = "3307";

$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name,$p);

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function insertpegawai($data) {
    global $conn;

    $nb = $data["nipbps"];
    $n = $data["nip"];
    $nm = $data["nama"];
    $ko = $data["kode"];
    $jbt = $data["jabatan"];
    $wly = $data["wilayah"];
    $gol = $data["gol"];
    $st = $data["status"];

    // Gunakan parameterisasi untuk menghindari masalah dengan karakter khusus
    $query = "INSERT INTO pegawai (nipbps, nip, nama, kd_org, jabatan, wilayah, gol_akhir, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "ssssssss", $nb, $n, $nm, $ko, $jbt, $wly, $gol, $st);

    // Eksekusi pernyataan
    mysqli_stmt_execute($stmt);

    // Periksa apakah ada baris yang terpengaruh
    $affected_rows = mysqli_stmt_affected_rows($stmt);

    // Tutup pernyataan
    mysqli_stmt_close($stmt);

    return $affected_rows;
}


function updatePegawai($data) {
    global $conn;
    
    $nipbps = $data['nipbps'];
    $nama = $data['nama'];
    $kd = $data['kd'];
    $jbt = $data['jabatan'];
    $wilayah = $data['wilayah'];
    $gol = $data['gol'];
    $stt = $data['status'];
    mysqli_query($conn, "UPDATE pegawai SET nama = '$nama', kd_org='$kd', jabatan='$jbt', wilayah='$wilayah', gol_akhir='$gol', status='$stt' WHERE nipbps='$nipbps'"); 

    return mysqli_affected_rows($conn);
}

function deletePegawai($nip) {
    global $conn;
    mysqli_query($conn, "DELETE FROM pegawai WHERE nipbps = '$nip'");
    return mysqli_affected_rows($conn);
}

function deleteKegiatan($kd_k) {
    global $conn;
    mysqli_query($conn, "DELETE FROM laporan_kegiatan WHERE kd_kegiatan = '$kd_k'");
    return mysqli_affected_rows($conn);
}

function insertPengaduan($data) {
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    $id = $data['id'];
    $np = htmlspecialchars($data["nama"]);
    $jp = htmlspecialchars($data["jabatan"]);
    $dp = htmlspecialchars($data["dept"]);
    $nb = htmlspecialchars($data["nama_barang"]);
    $ket = mysqli_real_escape_string($conn, $data["ket"]);
    $status = "Sedang diajukan";
    $ket_petugas = "-";
    $tgl_lapor = date("Y-m-d");

    mysqli_query($conn, "INSERT INTO pengaduan VALUES('$id', '$np', '$jp', '$dp', '$nb', '$ket', '$status', '$ket_petugas', '$tgl_lapor')");
    return mysqli_affected_rows($conn);
}

function insertSuratmasuk($data) {
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    $kd = $data['kd_surat'];
    $ns = htmlspecialchars($data["no_surat"]);
    $tgl = date("Y-m-d");
    $nama = htmlspecialchars($data["nama"]);
    $pr = htmlspecialchars($data["perihal"]);
    $ct = htmlspecialchars($data["catatan"]);

    mysqli_query($conn, "INSERT INTO surat_masuk VALUES('$kd', '$ns', '$tgl', '$nama', '$pr', '$ct')");
    return mysqli_affected_rows($conn);
}

function insertBukutamu($data) {
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    $kt = $data['kd_tamu'];
    $tt = htmlspecialchars($data["tujuan_tamu"]);
    $nt = htmlspecialchars($data["nama_tamu"]);
    $jk = htmlspecialchars($data["jenis_kelamin"]);
    $nomort = htmlspecialchars($data["nomor_tamu"]);
    $it = htmlspecialchars($data["identitas_tamu"]);
    $noidentt = htmlspecialchars($data["noident_tamu"]);
    $at = htmlspecialchars($data["asal_tamu"]);
    $pt = htmlspecialchars($data["petugas_tamu"]);
    $catatant = htmlspecialchars($data["catatan_tamu"]);
    $tglt = date("Y-m-d");

    mysqli_query($conn, "INSERT INTO buku_tamu VALUES('$kt', '$tt', '$nt', '$jk', '$nomort', '$it', '$noidentt', '$at', '$pt', '$catatant', '$tglt')");
    return mysqli_affected_rows($conn);
}

function registrasi($data) {
    global $conn;

    $id = strtolower(stripslashes($data["id"]));
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $name = htmlspecialchars($data["nama"]);
    $img = "default.jpg";
    $status = "1";

    $cek = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($cek)) {
        echo "<script>alert('Username $username telah terdaftar');</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO user VALUES('$id', '$username', '$password', '$name', '$img', '$status')");

    return mysqli_affected_rows($conn);
}

function updatePass($data) {
    global $conn;
    
    $id = $data['id'];
    $password_baru = mysqli_real_escape_string($conn, $data["password_baru"]);
    $password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
    mysqli_query($conn, "UPDATE user SET password='$password_baru' WHERE user_id='$id'"); 

    return mysqli_affected_rows($conn);
}

function updatePengaduan($data) {
    global $conn;
    
    $id = $data['id'];
    $status = $data['status'];
    $ket_petugas = $data['ket_petugas'];
    mysqli_query($conn, "UPDATE pengaduan SET status = '$status', ket_petugas='$ket_petugas' WHERE id='$id'"); 

    return mysqli_affected_rows($conn);
}

function updateSuratmasuk($data) {
    global $conn;
    
    $kd = $data['kd'];
    $no = $data['no_surat'];
    $nama_p = $data['nama_p'];
    $pr = $data['pr'];
    $ctt = $data['ctt'];
    mysqli_query($conn, "UPDATE surat_masuk SET no_surat = '$no', nama_pengirim = '$nama_p', perihal='$pr', catatan='$ctt' WHERE kd_surat='$kd'"); 

    return mysqli_affected_rows($conn);
}

function updateBukutamu($data) {
    global $conn;
    
    $kt = $data['kt'];
    $ttt = $data['ttt'];
    $ntt = $data['ntt'];
    $jkt = $data['jkt'];
    $nomortt = $data['nomortt'];
    $itt = $data['itt'];
    $noidenttt = $data['noidenttt'];
    $att = $data['att'];
    $ptt = $data['ptt'];
    $catatantt = $data['catatantt'];

    mysqli_query($conn, "UPDATE buku_tamu SET tujuan_tamu = '$ttt', nama_tamu='$ntt', jenis_kelamin='$jkt', nomor_tamu='$nomortt', identitas_tamu='$itt', noident_tamu='$noidenttt', asal_tamu='$att', petugas_tamu='$ptt', catatan_tamu='$catatantt' WHERE kd_tamu='$kt'"); 

    return mysqli_affected_rows($conn);
}

function updatePhoto($data) {
    global $conn;
    
    $id = $_SESSION['login']['user_id'];
        
        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg');
        $filename = $_FILES['foto']['name'];
        $ukuran = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
        if(!in_array($ext,$ekstensi) ) {
            echo "<script>alert('Ekstensi tidak diperbolehkan atau Anda belum memilih file apapun.'); window.location='profil.php';</script>";
        }else{
            if($ukuran < 2044070){		
                $xx = $rand.'_'.$filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/img/profile/'.$rand.'_'.$filename);

                mysqli_query($conn, "UPDATE user SET img = '$xx' WHERE user_id='$id'"); 
        
            } else {
                echo "<script>alert('Size file terlalu beasr! Size yang diperbolehkan tidak melebihi 2 MB.'); window.location='profil.php';</script>";
            }
        }
    return mysqli_affected_rows($conn);
}

function deleteUser($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE user_id = '$id'");
    return mysqli_affected_rows($conn);
}

function deletePengaduan($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM pengaduan WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}

function deleteSuratmasuk($kd_surat) {
    global $conn;
    mysqli_query($conn, "DELETE FROM surat_masuk WHERE kd_surat = '$kd_surat'");
    return mysqli_affected_rows($conn);
}

function deleteBukutamu($kd_tamu) {
    global $conn;
    mysqli_query($conn, "DELETE FROM buku_tamu WHERE kd_tamu = '$kd_tamu'");
    return mysqli_affected_rows($conn);
}

function searchPengaduan($keyword) {
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM pengaduan WHERE id = '$keyword'");
    return mysqli_affected_rows($conn);
}

function searchSuratmasuk($keyword) {
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM surat_masuk WHERE no_surat = '$keyword'");
    return mysqli_affected_rows($conn);
}

?>