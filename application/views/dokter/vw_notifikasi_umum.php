<h1>Notifikasi Pasien Baru Unit Pelayanan Umum</h1>
<?php if (!empty($new_patients)): ?>
    <ul>
        <?php foreach ($new_patients as $patient): ?>
            <li><?php echo $patient['nama_pasien']; ?> - <?php echo $patient['tanggal_periksa']; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Tidak ada pasien baru untuk unit pelayanan umum.</p>
<?php endif; ?>
 b    