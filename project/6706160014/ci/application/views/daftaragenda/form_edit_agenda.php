<!DOCTYPE html>
<html>
<head>
    <title>Daftar Hadir Praktikum</title>
</head>
<body>
    <h2>Form Tambah Agenda</h2>
    <fieldset>
    <form action="<?php echo site_url('daftaragenda/proses_edit_agenda');?>" method="POST"> 
        Nama : <br/><textarea name="nama" cols="50" rows="5">
        <?php echo $daftar_agenda->nama; ?></textarea>
        <br/><br/>
        
        Keterangan : <br/><textarea name="keterangan" cols="50" rows="5">
        <?php echo $daftar_agenda->keterangan; ?></textarea>
        <br/><br/>
        
        <input type="submit" value="Edit" />
    </form>
    </fieldset>
</body>
</html>