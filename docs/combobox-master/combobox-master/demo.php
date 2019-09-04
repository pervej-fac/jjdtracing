<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Combobox</title>
    <style>

        div.combobox	{font-family: Tahoma, sans-serif;font-size: 12px}
        div.combobox	{position: relative;zoom: 1}
        div.combobox	div.dropdownlist	{display: none;width: 200px;
            border: solid 1px #000;background-color: #fff;
            height: 200px;overflow: auto;position: absolute;
            top: 18px;left: 0px;}
        div.combobox	.dropdownlist	a	{display: block;text-decoration: none;
            color: #000;padding: 1px;height: 1em;cursor: default}
        div.combobox	.dropdownlist	a.light	{color: #fff;
            background-color: #007}
        div.combobox	.dropdownlist, input {font-family: Tahoma;font-size: 12px;}
        div.combobox	input {float: left;width: 182px;
            border: solid 1px #ccc;height: 15px}
        div.combobox	span	{border: solid 1px #ccc;background: #eee;
            width: 16px;height: 17px;
            float: left;text-align: center;border-left: none;cursor: default}

    </style>
</head>
<body>
<h1>Editable combobox</h1>
<form method="post" action="demo.php">
<!-- HTML code -->
<?php 
for($i=1;$i<=5;$i++)
{
?>
<div class="combobox">
    <input type="text" value="First Page" name="comboboxfieldname[]" id="cb_identifier[]"  style="width:'100px';height:'50px'" >

    <span>▼</span>
    <div class="dropdownlist">
        <a>Item1</a>
        <a>Item2</a>

        <a>Item3</a>
    </div>
</div>
<br/>
<?php
}
?>
<input type="submit" value="Submit">
</form>
<!-- JS code -->
<script type="text/javascript" charset="utf-8" src="combobox.js"></script>
<script type="text/javascript" charset="utf-8">

  var no = new ComboBox('cb_identifier[]');
</script>


</body>
</html>
<?php
echo $_POST['comboboxfieldname[]'];
?>
