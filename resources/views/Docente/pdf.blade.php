<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte PDF</title>
</head>
<style>
    * {
        padding: 0;
        margin-bottom: 0;
        box-sizing: border-box;
    }
    body {

        background-color: #ffffff;
        font-family: Arial;
        font-size: 13px;
        box-sizing: border-box;
        font-family: 'Fjalla One', sans-serif;
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
        border: 1px dashed #334C96;
        border-collapse: collapse;
        text-align: center;
        padding: 15px;
    }

    thead {
        background-color: #ffffff;
        color: rgb(0, 0, 0);
        display: table-header-group;
        text-align: left;
    }

    thead tr th {
        color: #fff;
    letter-spacing: .3rem;
    background-color: #334C96;
    }

    tbody tr td {
    color: #222;
    font-weight: normal;
    letter-spacing: .1rem;
    }
    tr:hover td {
        background-color: #ffffff;
        color: white;
    }

    #logo {
        float: left;
    top: 4px;

    }

    h2.company__title {
  font-size: 1.4em;
  font-weight: bold;
  margin: 0;
  margin-bottom: 3;
  letter-spacing: .5rem;
}

h2.company__title-table {
  font-size: 2em;
  font-weight: bold;
  text-align: center;
  margin: 20px 0;
  color: #233e8b;
  letter-spacing: .2rem;
}

.company__title-realizadas{
  font-size: 1em;
  font-weight: normal;
  margin: 5px 0;
  letter-spacing: .1rem;
  margin-bottom: 25px;
}


#company {
  text-align: right;
}

a {
  color: #233e8b;
  text-decoration: none;
  letter-spacing: .1rem;
}

.company__header {
  font-size: 1em;
  color: #777777;
  letter-spacing: .1rem;
}

.company__header-usuario {
  font-size: 1.1em;
  color: #555;
  font-weight: bold;
  letter-spacing: .2rem;
}

.company__datetime {
    padding-top: 3px;
  font-size: 1em;
  color: #777777;
  text-align: center;
  letter-spacing: .1rem;
}

.footer__logo{
    background-size: cover;
    position: absolute;
    width: 95%;
    height: 82%;
    opacity: 0.1;
}

.footer__contact{
    float: left;
    margin: 30px 30px;
    padding-left: 3px;
}

#footer__contact {
    border-left: 6px solid #233e8b;
    width : 45%;
}


#footer__firm{
    box-sizing: border-box  !important;
    width : 40%;
}

.company__footer {
  font-size: .9em;
  color: #777777;
  letter-spacing: .1rem;
}
.company__fotter-title {
  font-size: 1em;
  color: #555;
  letter-spacing: .1rem;
  margin-bottom: 5px;
}



</style>

<body>

    <div id="logo">
    <img src="{{ public_path('img') }}/logo_header.svg"   width="150px" alt="maristas">
    </div>

    <div id="company">
        <h2 class="company__title">Bienvenido</h2>
        <div class="company__header-usuario"><b>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</b></div>
        <div class="company__header">Informe Pertenece a <b>{{ $informes->r_user->name }} {{ $informes->r_user->lastname }}</b></div>
        <div class="company__header">Del Area <b>{{ $informes->r_user->r_area->nombre_area }} </b></div>
        <div class="company__header">N° Informe <b>{{ $informes->id }}</b> </b></div>
    </div>
    <hr>
     @if($informes->created_at  == true)
      <div class="company__datetime"><b>Fecha del Informe Generado</b> {{ $informes->created_at }}</div>
      @else
      <div class="company__datetime"><b>Fecha del Informe Generado</b> 2021-07-05 10:06:45 </div>
      @endif

      @if($informes->updated_at  == true)
      <div class="company__datetime"><b>Fecha de la Actualización del Informe </b> {{ $informes->updated_at }}</div>
      @else
      <div class="company__datetime"><b>Fecha de la Actualización del Informe </b>
          @if($informes->created_at  == true)
          {{ $informes->created_at }}
          @else
         2021-07-05 10:06:45
         @endif
        </div>
      @endif

<H2 class="company__title-table"> Reporte de Actividades </H2>
    <div class="company__title-realizadas"><b>Actividades Realizadas </b>  Periodo {{ $informes->fecha_inicio_realizadas }} / {{ $informes->fecha_fin_realizadas }}, {{ $informes->horas_total_realizadas }} Horas </div>
    <div id="#main-container">
        <table>
            <thead>
                <tr>
                    <th >RUBRO</th>
                    <th >DESCRIPCIÓN</th>
                    <th >HORAS EMPLEADAS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informesRealizadas as $informesRealizada)
                    <tr>
                        <td>{{ $informesRealizada->nombre_rubro_realizadas }}</td>
                        <td>{{ $informesRealizada->descripcion_rubro_realizadas }}</td>
                        <td>{{ $informesRealizada->horas_solas_realizadas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>



        <div class="company__title-realizadas"><b>Actividades Planificadas </b>
                Periodo {{ $informes->fecha_inicio_planificadas }} / {{ $informes->fecha_fin_realizadas }},

                {{ $informes->horas_total_planificadas }} Horas </div>
        <table>
            <thead>
                <tr>
                    <th >RUBRO</th>
                    <th >DESCRIPCIÓN</th>
                    <th >HORAS EMPLEADAS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informesPlanificadas as $informesPlanificada)
                    <tr>
                        <td>{{ $informesPlanificada->nombre_rubro_planificadas }}</td>
                        <td>{{ $informesPlanificada->descripcion_rubro_planificadas }}</td>
                        <td>{{ $informesPlanificada->horas_solas_planificas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="footer__logo" style="background-image: url('{{ public_path('img') }}/logo.png');"  >
    </div>

        <div class="footer__contact" id="footer__contact" style="opacity: 1 !important;">
            <div class="company__fotter-title">
                Gracias por generar tu reporte!
            </div>
            <div class="company__footer">
                Nota:
                Genera Siempre Tu Reporte
            </div>
            <div class="company__footer">
                Ubicanos: Av. San Juan 888, San Juan de Miraflores -
                Lima - Lima - Perú , +51 985594877
            </div>
            <div>
                <a href="informes@barinaga.edu.pe">informes@barinaga.edu.pe</a>
            </div>
        </div>

        <div class="footer__contact" id="footer__firm">
        <img src="{{ public_path('img') }}/firma.svg" width="250px" alt="maristas" >
        </div>











</body>

</html>
