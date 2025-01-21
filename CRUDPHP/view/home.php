<?php include "../header.php" ?>
<div class="container">
    <h1 class="text-center">Data untuk melakukan CRUD</h1>
        <a href="create.php" class="btn btn-outline-dark mb-2">
            <i class="bi bi-person-plus"> Create New User</i></a>

    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col" colspan="3" class="text-center">CRUD Operations</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php

                $query = "SELECT * FROM users"; // Menampilkan semua data table users
                $view_users = mysqli_query($koneksi, $query); //mengirim query ke database

                //menampilkan seluruh data yang diambil di database dengan menggunaka while loop
                while($row = mysqli_fetch_assoc($view_users)) {
                    $id = $row['ID'];
                    $user = $row['username'];
                    $email = $row['email'];
                    $pass = $row['password'];

                    echo "<tr>";
                    echo "<th scope='row'>{$id}</th>";
                    echo "<td>{$user}</td>";
                    echo "<td>{$email}</td>";
                    echo "<td>{$pass}</td>";

                    echo "<td class='text-center'> <a href='read.php?user_id={$id}' class='btn btn-primary'>
                    <i class='bi bi-eye'></i> VIEW </a> </td>";

                    echo "<td class='text-center'> <a href='update.php?edit&user_id={$id}' class='btn btn-secondary'>
                    <i class='bi bi-pencil'></i> EDIT</a> </td>";

                    echo "<td class='text-center'> <a href='delete.php?delete={$id}' class='btn btn-danger'>
                    <i class='bi bi-trash'></i> DELETE </a> </td>";

                    echo "</tr>";
                }
            
                ?>
            </tr>
        </tbody>
    </table>
</div>

<!-- Tombol kembali Ke index page -->
<div class="conatiner text-center mt-5"><a href="../index.php" class="btn btn-warning mt-5">
    <i class="bi bi-back"></i> Kembali
</a></div>

<!-- Footer -->
 <?php include '../footer.php' ?>