{{-- Calling the message-banner component --}}
<x-message-banner msg="User loggedin successfully !" class="success" />
<x-message-banner msg="User Signed up successfully !" class="success" />
<x-message-banner msg="this is welcome page message!" class="success" />

<x-message-banner msg="this is error message" class="error" />
<x-message-banner msg="this is warning message" class="warning" />
<h1>Hello world</h1>

<a href="home">Home page</a>

<h3>the timestap is {{ time() }} </h3>

{{ url()->current() }}

{{ URL::current() }}

