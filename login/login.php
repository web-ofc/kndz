<?php 

$conn = mysqli_connect("localhost", "root", "", "db_lelang");

if(isset($_POST["login"])){
  $nama = $_POST["nama"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM tabel_masyarakat WHERE nama = '$nama'");
  

  // cek username
  if( mysqli_num_rows($result) === 1 ){

      // cek password
      $row = mysqli_fetch_assoc($result);
     
      if(($password === $row["password"])){
          $_SESSION['id_user'] = $row["id_user"]; // Menggunakan kolom 'id' yang sesuai
          $_SESSION['nama'] = $row["nama"];
          // ... Simpan informasi user lainnya ke dalam session ...

          header("Location: dashboard_user.php");
          exit;
      }

  }

  $error = true;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
   <form class="row g-3" action="" method="post">
    <div class="col-md-12">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" />
        </div>
        <div class="col-md-12">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" />
        </div>
    </div>
    <p class="text-center">Tidak punya akun? <span style="color: #ffc107;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#Register">register!</span></p>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </div>
    </form>
    
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>