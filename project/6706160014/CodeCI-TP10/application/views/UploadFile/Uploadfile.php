<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TP MOD 10</title>
        <style>
        * {
            font-family: arial;
            font-size: 30px;
        }

        td {
            padding: 10px;
        }

        td input[type=submit] {
            background-color: blue;
            color: white;
            border: 1px black solid;
        }

        </style>
    </head>
    <body>
    <center>
        <div>
            <span>TAMPOL TP PINTAR NTAR BERBUDAYA</span><hr>
            <form method="POST" enctype="multipart/form-data" action="" >
                <table>
                    <tr>
                        <td><span>Judul</span></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="judul"></td>
                    </tr>
                    <tr>
                        <td><span>Foto</span></td>
                    </tr>
                    <tr>
                        <td><input type="file" name="file"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="oke" value="Upload"></td>
                    </tr>
                </table>
            </form>
        </div>
     </center>   
    </body>
</html>