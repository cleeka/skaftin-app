<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <table>
  	<tr><td>Dear {{ $name }}</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Please click on the link below to activate your account:-</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td><a href="{{ url('/user/confirm/'.$code) }}">Confirm Account</a></td></tr>
    <tr><td>&nbsp;</td></tr>
  </table>
</body>
</html>