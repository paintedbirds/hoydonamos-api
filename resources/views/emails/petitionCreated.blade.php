<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peticion registrada</title>
</head>
<body>

    <h1>Has creado una Peticion exitosamente!</h1>
    <span>Gracias por aportar a la comunidad</span>
    <h2>Nombre de la Peticion: {{$petitionData['subject']}}</h2>
    <h2>Descripcion de la Peticion: {{$petitionData['description']}}</h2>
</body>
</html>