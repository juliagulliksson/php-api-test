<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Php api</title>
</head>
<body>

<h2>Book a table</h2>
<form id="user">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
  <label for="email">E-mail:</label>
  <input type="email" name="email" id="email">
  <label for="phone">Phone number:</label>
  <input type="text" name="phone" id="phone">
  <br/><br/>
  <label for="date">Choose a date:</label>
  <input type="date" name="date" id="date">
  <label for="seatingTime">Choose seating:</label>
  18:00<input type="radio" id="seatingOne" name="seatingTime">
  21:00<input type="radio" id="seatingTwo" name="seatingTime">

  <button type="submit" id="submit">Submit</button>
</form>
  
  <script src="main.js"></script>
</body>
</html>