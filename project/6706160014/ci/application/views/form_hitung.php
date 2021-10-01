<html>
<head>
<title>Kalkulator CI</title>
</head>
<body>
    <p>Kalkulator CI</p>
    <form action="calculator/hasil_hitung" method="POST">
        <input type="text" name="angka1"/> <br /><br/>
        <input type="text" name="angka2"/> <br /><br/>
        <select name="pilih-hitung">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select><br/><br/>
        <input type="submit" value="Hitung" />
    </form>
</body>
</html>
