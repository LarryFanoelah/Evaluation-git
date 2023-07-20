<!DOCTYPE html>
<html>
<head>
    <title>Ma Facture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            text-transform: uppercase;
        }

        h4 {
            margin-bottom: 10px;
            color: #777;
        }

        p {
            margin-bottom: 20px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:last-child {
            font-weight: bold;
        }

        .total-row {
            background-color: #eee;
        }

        .total-label {
            font-weight: bold;
            text-align: right;
        }

        .total-amount {
            font-weight: bold;
            text-align: center;
            background-color: yellow;
        }
    </style>
</head>
<body>
    <h1>Facture</h1>
    <h4>Mr/Mme {{$facture->nom}}</h4>
    <p>du {{ date('d F Y', strtotime($facture->date_facture)) }}</p>

    <table>
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
        <tr class="total-row">
            <td colspan="3" class="total-label">TOTAL</td>
            <td class="total-amount">{{$t}}</td>
        </tr>
    </table>
</body>
</html>
