<html>
<head>
    <title>Tambah Data</title>
</head>
<body>
    <h3>Tambah Agenda</h3>
    
    <form action="<?php echo site_url('daftaragenda/tambah');?>" method="POST">
        Nama : <input type="text" name="nm"/> <br /><br/>
        Keterangan : <input type="text" name="ket"/> <br /><br/>
        <input type="submit" value="Tambah" />
    </form>
    
</body>
</html>