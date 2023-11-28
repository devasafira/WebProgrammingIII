<!-- app/Views/user/pilihmeja.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Meja</title>

    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background: #12171e; overflow:hidden;">

    <div class="box">
        <div class="center" style="background: #12171b;">
            <h1>Pilih Meja</h1>
            <?php if (isset($message)) : ?>
                <p><?= $message ?></p>
            <?php else : ?>
            <form action="/pilihmeja" method="post">

                <div class="text-field">
                    <input type="text" name="nama_pembeli" id="nama_pembeli" required style="color: white;">
                    <span class="span1"></span>
                    <label for="nama_pembeli">Nama Pembeli</label>
                </div>
                <div class="textfield">
                    <label for="table_number"></label>
                    <select name="table_number" id="table_number">
                        <?php foreach ($tables as $table) : ?>
                            <option value="<?= $table['id'] ?>"><?= $table['table_number'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br></br>
                <input type="submit" value="Pilih Meja">
                <a class="addmenu-table" href="/table">Back</a>
            </form>
            <?php endif; ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tableNumberInput = document.getElementById('table_number');
            const selectedTable = tableNumberInput.value.trim();
            if (selectedTable !== '') {
                tableNumberInput.disabled = true;
            }
        });
    </script>

</body>

</html>
