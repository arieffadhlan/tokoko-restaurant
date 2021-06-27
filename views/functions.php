<?php
     // koneksi ke database
     $conn = mysqli_connect('localhost', 'root', '', 'tokokorestaurant');

     function query($query)
     {
          global $conn;
          $result = mysqli_query($conn, $query);
          $users = [];
          while ($user = mysqli_fetch_assoc($result))
          {
               $users[] = $user;
          }
          return $users;
     }


     function hapus($id)
     {
          global $conn;
          mysqli_query($conn, "DELETE FROM multiuser WHERE id_user = $id");

          return mysqli_affected_rows($conn);
     }


     function ubah($data)
     {
          global $conn;

          // ambil data dari tiap elemen dalam form
          $id = $data["id_user"];
          $fullname = htmlspecialchars($data["nama_user"]);
          $username = htmlspecialchars($data["username"]);
          $email = htmlspecialchars($data["email"]);
          $level = htmlspecialchars($data["level"]);

          // query insert data
          $query = "UPDATE `multiuser` SET `nama_user` = '$fullname', `username` = '$username', `email` = '$email', `level` = '$level' WHERE `multiuser`.`id_user` = $id
                    ";
          mysqli_query($conn, $query);

          return mysqli_affected_rows($conn);
     }


     function registrasi($data)
     {
          global $conn;

          $fullname = stripslashes($data["fullname"]);
          $username = strtolower(stripslashes($data["username"]));
          $password = mysqli_real_escape_string($conn, $data["password"]);
          $password2 = mysqli_real_escape_string($conn, $data["password2"]);
          $email = strtolower(stripslashes($data["email"]));
          
          // cek konfirmasi password
          if ($password !== $password2)
          {
               echo 
               "
                    <script>
                         alert('konfirmasi password tidak sesuai');
                    </script>
               "; 

               echo "<script>window.location.replace('registrasi.php');</script>";
               return false;
          }

          // enkripsi password
          $password = password_hash($password, PASSWORD_DEFAULT); 
          
          // tambahkan user baru ke database
          mysqli_query($conn, "INSERT INTO multiuser VALUES(NULL, '$fullname' ,'$username', '$password', '$email', 'user')");

          return mysqli_affected_rows($conn);
     }

     function pesan($data)
     {
          global $conn;

          $name = stripslashes($data["name"]);
          $email = strtolower(stripslashes($data["email"]));
          $message = strtolower(stripslashes($data["message"]));
          
          // tambahkan pesan ke database
          mysqli_query($conn, "INSERT INTO pesan VALUES(NULL, '$name' , '$email', '$message')");

          return mysqli_affected_rows($conn);
     }
?>