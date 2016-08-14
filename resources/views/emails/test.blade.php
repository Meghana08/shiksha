Query Registered for {{ $type }}<br/>
By : {{ $name }}.<br/>
Contact No. : {{ $contact }}.<br/>
@foreach($classes as $key => $value)
	<br/>
	Class : {{ $key }} =>
	Subject : 
	@foreach($value as $subject)
		{{ $subject }},
	@endforeach
@endforeach