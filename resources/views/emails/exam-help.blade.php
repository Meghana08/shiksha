Query Registered for EXAM TIME HELP<br/>
By : {{ $name }}.<br/>
Contact No. : {{ $contact }}.<br/>
Class : {{ $class }}<br/>
@foreach($topics as $topic => $subject)
Subject : {{ $subject }} - Topic : {{ $topic }}<br/>
@endforeach