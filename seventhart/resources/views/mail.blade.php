
<p><b>Thanks for submitting a new contract {{ $name }}</b></p>
<p>Contract Id: <b>{{ $contractId }}</b></p>
<p>Cinema: <b>{{ $cinema }}</b></p>
<p>Venue: <b>{{ $venue }}</b></p>

@for ($row = 0; $row < count($films); $row++)    
    <p>Film: <b>{{ $films[$row][0] }}</b> Screenings: <b>{{ $films[$row][1] }}</b> 
        Start Date: <b>{{ $films[$row][2]->format('d/m/Y') }}</b> End Date: <b>{{ $films[$row][3]->format('d/m/Y') }}</b></p>   
@endfor

<p>If you need to amend these details please contact us.</p>

<p>
Seventh Art Productions,<br>
63 Ship Street, Brighton,<br>
East Sussex,<br>
BN1 1AE,<br>
UK<br><br>

+44 (0)1273 777 678<br>
info@seventh-art.com<br>
</p>




