<?php
session_start();
if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {

    // If user is not logged in, redirect to login page
    header('Location: login.php');
    exit;
}

// Jika tombol logout ditekan, maka jalankan script logout
if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->
    <style>
        .container-fluid {
            margin-top: 50px;
            margin-bottom: 50px;

        }
    </style>
</head>

<body>
    <div class="container-fluid vh-200">
        <div class="dump">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light container">
                    <div class="text-end">
                        <form method="post">
                            <button type="submit" name="logout" class="btn btn-sm btn-outline-dark"><i class="bi bi-box-arrow-right"></i></button>
                        </form>
                    </div>
                    <div class="text-center">
                        <p class=" fw-bold">Selamat datang, <?php echo $_SESSION["name"]; ?>!</p>
                        <h3 class="text-primary">Alarm Medicine</h3>
                        <img src="assets/img/clock.svg" alt="jam" />
                        <h2 class="time">00::00::00 PM</h2>
                    </div>
                    <div class="p-4">
                        <section class="alam-setting">
                            <form>
                                <!-- INPUT NAMA JUDUL -->
                                <div class="mb-1">
                                    <label for="inputName" class="form-label">Judul Alarm</label>
                                    <input type="text" class="form-control" id="inputName" />
                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                </div>
                                <!-- INPUT OBAT -->
                                <div class="mb-1">
                                    <label for="inputObat" class="form-label">Nama Obat</label>
                                    <input type="text" class="form-control" id="inputObat" />
                                </div>
                                <!-- INPUT DOSIS -->
                                <div class="mb-1">
                                    <label for="inputDosis" class="form-label">Masukan Dosis</label>
                                    <input type="text" class="form-control mb-2" id="inputDosis" />
                                </div>
                                <!-- SELECT ALARM JAM-->
                                <select name="" class="form-select-lg form-select-md mb-1" aria-label=".form-select example" id="judul">
                                    <option value="hour" selected hidden>Hour</option>
                                </select>
                                <select name="" class="form-select-lg form-select-md mb-1" aria-label=".form-select example" id="">
                                    <option value="minute" selected hidden>Minute</option>
                                </select>
                                <select name="" class="form-select-lg form-select-md mb-1" aria-label=".form-select example" id="">
                                    <option value="AM" selected>AM</option>
                                    <option value="PM" selected>PM</option>
                                </select><br>
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary my-2" id="alarm-set-btn" value="Set Alarm">Set Alarm</button>
                                </div>
                    </div>
                    </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="assets/js/scripts.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>