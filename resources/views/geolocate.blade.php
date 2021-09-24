<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoLocate</title>
</head>
<body>
    @if (isset($userIp))
        <p>
            <strong>Your IP: </strong>{{$userIp}}<br/>
            <strong>Your Continent: </strong>{{$userContinent}}<br/>
            <strong>Your Country: </strong>{{$userCountry}}<br/>
            <strong>Your Zip Code: </strong>{{$userZipCode}}<br/>
            <strong>Your Currency Code: </strong>{{$userCurrencyCode}}<br/>
        </p>

        <form action="{{route('convert') }}" method="POST">
            @csrf
            Converting <input type="text" name="enteredvalue"/> To
            <select name="convertToCurr" id="convertToCurr" class="convertToCurr">
                <option value="USD">USD</option>
                <option value="GBP">GBP</option>
                <option value="AUD">AUD</option>
                <option value="CAS">CAD</option>
                <option value="EUR">EUR</option>
            </select>
            <input type="hidden" name="hdnBaseCurrency" class="hdnBaseCurrency" value="{{$userCurrencyCode}}">
            <button type="submit">Convert!</button>
        </form>
    @else
        Converted Price : {{$convertedValue}}
        <a href="{{route('GeoLocate')}}" class="go_back">Go Back</a>
    @endif

</body>
</html>
