<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="index.js"></script>
</head>
<body>


	<p>калькулятор</p>
	<input type="number" id="a">
	<input type="number" id="b">
	<br />
	<br />
	<input type="result" id="res">
	<br />
	<br />
	<button id="plus">+</button>
	<button id="minus">-</button>
	<button id="divide">*</button>
	<button id="multiply">/</button>

	<br />
	<p>изменять регистр по кнопке</p>
	<input type="text" id="upper">
	<button id="upperbot">upperCase</button>

	<br />
	<p>изменять регистр при вводе</p>
	<input type="text" id="dupper">

	<br />
	<p>пароль</p>
	<input type="password" id="pwd">
	<label><input type="checkbox" id="pwdview" /> показать пароль</label>

	<br />
	<p>калькулятор2</p>
	<input type="number" id="a2">
	<input type="number" id="b2">
	<br />
	<br />
	<input type="result" id="res2">
	<br />
	<br />
	<input type="radio" id="plus2" name="calc" > +
	<input type="radio" id="minus2" name="calc" > -
	<input type="radio" id="divide2" name="calc" > *
	<input type="radio" id="multiply2" name="calc" > /

	<br />
	<br />
	<p>телефоны</p>
	<button id='addPhone'>+</button>
	<button id='getPhone'>get</button>
	<br />
	<span id="resPhone"></span>
	<br /><br />
  	<div id="inputs"></div>
	
</body>
</html>

