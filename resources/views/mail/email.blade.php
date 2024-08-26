<h4>Name: {{ $data['name'] }}</h4>
<h4>Email: {{ $data['email'] }}</h4>
<h4>Subject: {{ $data['subject'] }}</h4 >
<p>Message: {{ $data['message'] }}</p>
<img src="{{ asset('files/'.$data['file']) }}" alt="">
