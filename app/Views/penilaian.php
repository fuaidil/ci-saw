<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan V</title>
</head>
<body>
    <h1>Hasil Perhitungan V</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Kriteria</th>
                <th>V</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kriteria as $key => $krt) : ?>
                <tr>
                    <td><?= $krt['nama_kriteria'] ?></td>
                    <td><?= number_format($v[$key], 3) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
