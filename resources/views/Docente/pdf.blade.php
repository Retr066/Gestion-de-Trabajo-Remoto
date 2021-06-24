<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte PDF</title>
</head>
<style>
    body {
        background-color: #ffffff;
        font-family: Arial;
        font-size: 13px;
        box-sizing: border-box;
    }

    #main-container {
        margin: 150px auto;
        width: 600px;
    }

    table {
        background-color: white;
        text-align: left;
        border-collapse: collapse;
        width: 100%;

    }

    th,
    td {
        border: 1px solid #000;
        border-collapse: collapse;
        text-align: center;
        padding: 2px;
    }

    thead {
        background-color: #ffffff;
        color: rgb(0, 0, 0);
        display: table-header-group;
        text-align: left;

    }

    tr:nth-child(even) {
        background-color: rgb(255, 255, 255);
    }

    tr:hover td {
        background-color: #ffffff;
        color: white;
    }

    .izquierda {
        text-align: left;
        width: 64%;
    }

    h1 {
        text-align: center;
    }

    .border-titulo {
        display: block;
        text-align: center;
        width: 50%;
        border: 2px solid #000;
        margin-left: 25%;
        margin-right: 25%;
        margin-bottom: 1rem;
    }

    .information {}

</style>

<body>
    <H3 style="text-align: right;"> Reporte de Actividades </H3>
    <div class="information">
        <h3>Bienvenido:</h3>
        <p><b>Pertenece a :</b>{{ $informes->r_user->name }} {{ $informes->r_user->lastname }}.</p>
        <p><b>Del Area de :</b>{{ $user->r_area->nombre_area }}.</p>
        <p><b>Numero de Informe:</b>{{ $informes->id }}.</p>
    </div>

    <div><b>Actividades Realizadas -
            Periodo:{{ $informes->fecha_inicio_realizadas }}/{{ $informes->fecha_fin_realizadas }}, Horas Total
            {{ $informes->horas_total_realizadas }} </b></div>
    <br>
    <div id="#main-container">
        <table>
            <thead>
                <tr>
                    <th scope="col">RUBRO</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">HORAS EMPLEADAS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informesRealizadas as $informesRealizada)
                    <tr>
                        <th scope="row">{{ $informesRealizada->nombre_rubro_realizadas }}</th>
                        <td>{{ $informesRealizada->descripcion_rubro_realizadas }}</td>
                        <td>{{ $informesRealizada->horas_solas_realizadas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>



        <div><b>Actividades Planificadas -
                Periodo:{{ $informes->fecha_inicio_planificadas }}/{{ $informes->fecha_fin_realizadas }},
                Horas
                Total
                {{ $informes->horas_total_planificadas }} </b></div>
        <br>
        <table>
            <thead>
                <tr>
                    <th scope="col">RUBRO</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">HORAS EMPLEADAS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informesPlanificadas as $informesPlanificada)
                    <tr>
                        <th scope="row">{{ $informesPlanificada->nombre_rubro_planificadas }}</th>
                        <td>{{ $informesPlanificada->descripcion_rubro_planificadas }}</td>
                        <td>{{ $informesPlanificada->horas_solas_planificas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
