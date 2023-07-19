
<!DOCTYPE html>
<html>
<head>
    <title>Ma Facture</title>
</head>
<body>
    <h1>Facture</h1>
    <h4> Mr/Mme {{$facture->nom}} </h4>
    <p>du {{$facture->date_facture}}</p>

    <table border="1">
        <tr>
            <th>Acte</th>
            <th>Nombre</th>
            <th>Prix Unitaire</th>
            <th>Montant</th>
        </tr>
        <?php
            $t=0;
        ?>
        @foreach ($detailfacture as $df)
        <?php
            $t=$t+$df->montant_total;
        ?>
        <tr>
            <td>{{$df->nom_typerecette}}</td>
            <td>{{$df->nombre}}</td>
            <td>{{$df->montant}}</td>
            <td>{{$df->montant_total}}</td>

        </tr>
        @endforeach
        <tr>
            <td>TOTAL</td>
            <td></td>
            <td></td>
            <td>{{$t}}</td>

        </tr>

    </table>


</body>
