<!DOCTYPE html>
<html>
<body>

<h2>Register</h2>

<form action="/send-verification-code" method="post">
    @csrf
  <label for="fname">First name:</label><br>
  <input type="text"  name="firstname"><br>
  <label for="lname">Last name:</label><br>
  <input type="text"  name="lastname"><br>
  <label for="email">Email:</label><br>
  <input type="email"  name="email" ><br>
  <label for="phone">Phone number:</label><br>
  <input type="text"  name="phone_number" ><br>
  <label for="password">Password:</label><br>
  <input type="password"  name="password" ><br>
  <br>
  <input type="submit" value="Submit">
</form> 



</body>
</html>