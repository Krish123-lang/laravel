

<!-- Prints Hello guest if no name is provided -->
{{-- <h1>Hello {{ $name ?? 'Guest' }} </h1> --}}

{{-- {!! $demo !!} --}}

{{-- <!-- <h4> {{ time() }} </h4> --> --}}
{{-- <!-- <h4> {{ date('d-m-y') }} </h4> --> --}}


{{-- IF ELSE STATEMENTS --}}

{{-- @if ($name == '')
    <h1>Name is empty</h1>
@elseif($name == 'krishna')
    <h1>Name is Krishna</h1>
@else
    <h1>Name is not empty</h1>
@endif --}}


{{-- if name is krishna print nothing else print krishna --}}
{{-- UNLESS STATEMENTS --}}

{{-- @unless ($name == 'krishna')
    <h1>Name is Krishna</h1>
@endunless --}}

{{-- ISSET STATEMENTS --}}

{{-- @isset($name)
    <h3>{{ $name }}</h3>
@endisset --}}



{{-- LOOPS STATEMENTS --}}

{{-- for loop STATEMENTS --}}

{{-- @for ($i = 0; $i < 10; $i++)
    <h5>{{$i}}</h5>
@endfor --}}


{{-- while loop STATEMENTS --}}

{{-- @php
    $i = 0;
@endphp

@while ($i <= 20)
    <h5> {{ $i }} </h5>

    @php
        $i++;
    @endphp
@endwhile --}}



{{-- for each loop STATEMENTS --}}

@php

$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

@endphp

{{-- <select name="country" id="">
@foreach ($countries as $key => $i)
    <option value="{{$key}}"> {{$i}} </option>
    @endforeach
</select> --}}


{{-- break and continue --}}

{{-- @for ($i = 0; $i <= 10; $i++)
@if ($i == 5) --}}
    {{-- @continue --}}
    {{-- @break
@endif
    <h4>{{$i}}</h4>
@endfor --}}


{{-- include, extends, yeild  --}}
@extends('layouts/main')

@push('title')
<title>Home</title>
@endpush


@section('main-section')
<h1>Home page</h1>
@endsection
