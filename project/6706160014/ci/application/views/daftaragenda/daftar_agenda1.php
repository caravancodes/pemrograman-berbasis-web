<html>
<head>
    <title>Tampil Data</title>
</head>
<body>
    <a href="<?php echo site_url('daftaragenda/form_tambah');?>">Tambah Data</a>
    
    <h3>Daftar Agenda</h3>
    
    <?php
        if(empty($hasil))
        {
            echo "Tidak ada data";
        }

        else
        { ?>
        <table border='1'>
            <tr>
                <td>No</td>
                <td>Id Agenda</td>
                <td>Nama</td>
                <td>Keterangan</td>
                <td>Aksi</td>
            </tr>
            <?php
                $no = 1;
                foreach($hasil as $data) { ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td><?php echo $data->id_agenda;?></td>
                <td><?php echo $data->nama ;?></td>
                <td><?php echo $data->keterangan ;?></td>

                <td align="center">
                    <a href="<?php echo site_url('daftaragenda/delete/'.$data->id_agenda); ?>">Hapus</a>
                </td>

            </tr>
            <?php
                }
            ?>
        </table>
        <?php
            }
        ?>
</body>
</html>
