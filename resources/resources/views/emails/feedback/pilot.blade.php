<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		Submitted by {{ $name }} ({{ $address }})<br /><br />
		
		{!! nl2br(htmlentities($feedback)) !!}

	</body>
</html>



