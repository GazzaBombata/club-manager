
<!DOCTYPE html>
<html>
<head>
    <title>Aggiungi Invito al calendario</title>
</head>
<body>

<h1>Invito Confermato!</h1>
    <p>Gentile {{$attendance->user->name}}, hai confermato un invito da {{$meeting->club->name}}.</p><br/>
    <p>Di seguito le lascio i dati relativi all'invito:</p>
<ul>

    <li>Nome: {{$meeting->meeting_name}}</li>
    <li>Location: {{$meeting->location}}</li>
    <li>Data: {{$meeting->meeting_date->format('d/m/Y')}}</li>
    <li>orario di inizio:{{$meeting->meeting_date->format('H:i')}}</li>
    <li>puoi modificare la presenza entro:{{$meeting->editable_until}}</li>

</ul>
<p>In allegato puoi aggiungere l'evento al tuo calendario digitale</p> <br>
<a href="{{env('APP_URL')}}/app/{{$meeting->club->id}}/meetings/{{$meeting->id}}">Vedi i partecipanti e tutte le info relative all'evento</a>
<p>Grazie,{{$meeting->club->name}}</p>
<p></p>
</body>
</html>
