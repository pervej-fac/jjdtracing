<html>
<head>
<style>
.editableBox {
    width: 75px;
    height: 30px;
}

.timeTextBox {
    width: 54px;
    margin-left: 78px;
    height: 25px;
    border: none;
}

.select-editable {
     position:relative;
     background-color:white;
     border:solid grey 1px;
     width:120px;
     height:18px;
 }
 .select-editable select {
     position:absolute;
     top:0px;
     left:0px;
     font-size:14px;
     border:none;
     width:120px;
     margin:0;
 }
 .select-editable input {
     position:absolute;
     top:0px;
     left:0px;
     width:100px;
     padding:1px;
     font-size:12px;
     border:none;
 }
 .select-editable select:focus, .select-editable input:focus {
     outline:none;
 }
</style>

</head>

<body>
<form method="post" action="editabledropdown.php">
<?php 
for($i=1;$i<=5;$i++)
{
?>
<div class="select-editable">
    <select onchange="this.nextElementSibling.value=this.value">
        <option value=""></option>
        <option value="115x175 mm">115x175 mm</option>
        <option value="120x160 mm">120x160 mm</option>
        <option value="120x287 mm">120x287 mm</option>
    </select>
    <input type="text" name="format[]" value="" />
</div>
<?php
}
echo count($_POST['format']);
for($j=0;$j<count($_POST['format']);$j++){
echo $_POST['format'][$j]."<br/>";
}
?>
<br/>
<h3> Using HTML5 </h3>
<input list="browsers" name="browser">
<datalist id="browsers">
  <option value="Internet Explorer">
  <option value="Firefox">
  <option value="Chrome">
  <option value="Opera">
  <option value="Safari">
</datalist>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="wrapper">
    <select class="editableBox">        
        <option value="1">01:00</option>
        <option value="2">02:00</option>
        <option value="3">03:00</option>
        <option value="4">04:00</option>
        <option value="5">05:00</option>
        <option value="6">06:00</option>
        <option value="7">07:00</option>
        <option value="8">08:00</option>
        <option value="9">09:00</option>
        <option value="10">10:00</option>
        <option value="11">11:00</option>
        <option value="12">12:00</option>
        <option value="13">13:00</option>
        <option value="14">14:00</option>
        <option value="15">15:00</option>
        <option value="16">16:00</option>
        <option value="17">17:00</option>
        <option value="18">18:00</option>
        <option value="19">19:00</option>
        <option value="20">20:00</option>
        <option value="21">21:00</option>
        <option value="22">22:00</option>
        <option value="23">23:00</option>
        <option value="24">24:00</option>
    </select>
    <input class="timeTextBox" name="timebox" maxlength="5"/>
</div>

<script>
	$(document).ready(function(){   
		$(".editableBox").change(function(){         
			$(".timeTextBox").val($(".editableBox option:selected").html());
		});
	});
</script>

<h1>Dropdown List</h1>
	
	<input type="text" name="mname">
		<input type="text" name="product" list="productName"/>
		<datalist id="productName">
			<option value="Pen">Pen</option>
			<option value="Pencil">Pencil</option>
			<option value="Paper">Paper</option>
		</datalist>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
<?php
echo $_POST['mname'];
echo $_POST['product'];
?>

