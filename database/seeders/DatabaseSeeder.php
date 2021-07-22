<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use  App\Models\User;
use Illuminate\Database\Seeder;
use  App\Models\Area;
use  App\Models\Rubro;

use  App\Models\InformesRealizadas;
use  App\Models\InformesPlanificadas;
use  App\Models\Informe;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // SUPERUSUARIOS
        $user = User::create([
            'name' =>'Jherson',
            'lastname' =>'Lopez Perez',
            'email' => 'jlopez@barinaga.edu.pe',
            'password' => bcrypt('jlopez12345'),
        ]);
        $user2 =  User::create([
            'name' =>'Jhonatan',
		'lastname' =>'Vila Buleje',
            'email' => 'jvila@barinaga.edu.pe',
            'password' => bcrypt('jvila12345'),
        ]);
        // DOCENTES
        $user3 = User::create([
            'name' =>'Martha',
	    	'lastname' =>'Flores Arnau',
            'email' => 'mflores@barinaga.edu.pe',
            'password' => bcrypt('mflores12345'),
        ]);
	$user4 = User::create([
            'name' =>'Josep',
		'lastname' =>'Llajaruna Calleja',
            'email' => 'jllajaruna@barinaga.edu.pe',
            'password' => bcrypt('jllajaruna12345'),
        ]);
	$user5 = User::create([
            'name' =>'Luis',
		'lastname' =>'Sánchez Mena',
            'email' => 'lsanchez@barinaga.edu.pe',
            'password' => bcrypt('lsanchez12345'),
        ]);
	$user6 = User::create([
            'name' =>'Angel',
		'lastname' =>'Romano Mendez',
            'email' => 'aromano@barinaga.edu.pe',
            'password' => bcrypt('aromano12345'),
        ]);
	$user7 = User::create([
            'name' =>'Renato',
		'lastname' =>'Villegas Toribio',
            'email' => 'rvillegas@barinaga.edu.pe',
            'password' => bcrypt('rvillegas12345'),
        ]);
	$user8 = User::create([
            'name' =>'Lourdes',
		'lastname' =>'Palacios Tamayo',
            'email' => 'lpalacios@barinaga.edu.pe',
            'password' => bcrypt('lpalacios12345'),
        ]);
	$user9 = User::create([
            'name' =>'Alfredo',
		'lastname' =>'Ninanqui Gonzales',
            'email' => 'aninanqui@barinaga.edu.pe',
            'password' => bcrypt('aninanqui12345'),
        ]);
	$user10 = User::create([
            'name' =>'Javier',
		'lastname' =>'Silva Chacon',
            'email' => 'jsilva@barinaga.edu.pe',
            'password' => bcrypt('jsilva12345'),
        ]);
	$user11 = User::create([
            'name' =>'José',
		'lastname' =>'Lozano Ariza',
            'email' => 'jlozano@barinaga.edu.pe',
            'password' => bcrypt('jlozano12345'),
        ]);
	$user12 = User::create([
            'name' =>'Andrés',
		'lastname' =>'Moreno Borras',
            'email' => 'amoreno@barinaga.edu.pe',
            'password' => bcrypt('amoreno12345'),
        ]);
        //JEFATURA
        $user13 = User::create([
            'name' =>'Juan',
		    'lastname' =>'Peyon Garcia',
            'email' => 'jpeyonr@barinaga.edu.pe',
            'password' => bcrypt('jpeyonr12345'),
        ]);

        $user14 = User::create([
            'name' =>'Manuel',
		    'lastname' =>'Ramos Torre',
            'email' => 'mramos@barinaga.edu.pe',
            'password' => bcrypt('mramos12345'),
        ]);
        //ADMINISTRACION
        $user15 = User::create([
            'name' =>'Carlos',
		'lastname' =>'Perez Martos',
            'email' => 'cperez@barinaga.edu.pe',
            'password' => bcrypt('cperez12345'),
        ]);

        $user16 = User::create([
            'name' =>'Mario',
		'lastname' =>'Canales Agudo',
            'email' => 'mcanales@barinaga.edu.pe',
            'password' => bcrypt('mcanales12345'),
        ]);

    //AREAS POR USUARIOS
        Area::create([
            'user_id'=> $user->id,
            'nombre_area' => 'Sistemas',
        ]);

        Area::create([
            'user_id'=> $user2->id,
            'nombre_area' => 'Sistemas',
        ]);

        Area::create([
            'user_id'=> $user3->id,
            'nombre_area' => 'Primaria',
        ]);

        Area::create([
            'user_id'=> $user4->id,
            'nombre_area' => 'Secundaria',
        ]);

        Area::create([
            'user_id'=> $user5->id,
            'nombre_area' => 'Secundaria',
        ]);

        Area::create([
            'user_id'=> $user6->id,
            'nombre_area' => 'Primaria',
        ]);

        Area::create([
            'user_id'=> $user7->id,
            'nombre_area' => 'Secundaria',
        ]);

        //USUARIOS SIN DATOS
        Area::create([
            'user_id'=> $user8->id,
            'nombre_area' => 'Primaria',
        ]);

        Area::create([
            'user_id'=> $user9->id,
            'nombre_area' => 'Secundaria',
        ]);
        Area::create([
            'user_id'=> $user10->id,
            'nombre_area' => 'Primaria',
        ]);

        Area::create([
            'user_id'=> $user11->id,
            'nombre_area' => 'Secundaria',
        ]);
        Area::create([
            'user_id'=> $user12->id,
            'nombre_area' => 'Primaria',
        ]);

        Area::create([
            'user_id'=> $user13->id,
            'nombre_area' => 'Jefatura',
        ]);
        Area::create([
            'user_id'=> $user14->id,
            'nombre_area' => 'Jefatura',
        ]);

        Area::create([
            'user_id'=> $user15->id,
            'nombre_area' => 'Sistemas',
        ]);
        Area::create([
            'user_id'=> $user16->id,
            'nombre_area' => 'Sistemas',
        ]);



        //INFORMES POR USUARIO
         $informe = Informe::create([
                'usuario_id' =>  $user3->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-06-20',
                'fecha_fin_realizadas' => '2021-06-25',
                'horas_total_realizadas' => '10',
                'horas_total_planificadas' => '10',
                'fecha_inicio_planificadas' => '2021-07-03',
                'fecha_fin_planificadas' => '2021-07-07',
            ]);

            $informe2 = Informe::create([
                'usuario_id' =>  $user3->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-07-03',
                'fecha_fin_realizadas' => '2021-07-07',
                'horas_total_realizadas' => '10',
                'horas_total_planificadas' => '11',
                'fecha_inicio_planificadas' => '2021-07-08',
                'fecha_fin_planificadas' => '2021-07-11',
            ]);

            $informe3 = Informe::create([
                'usuario_id' =>  $user3->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-07-08',
                'fecha_fin_realizadas' => '2021-07-11',
                'horas_total_realizadas' => '11',
                'horas_total_planificadas' => '14',
                'fecha_inicio_planificadas' => '2021-07-14',
                'fecha_fin_planificadas' => '2021-07-17',
            ]);

            //usuario 4

            $informe4 = Informe::create([
                'usuario_id' =>  $user4->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-06-19',
                'fecha_fin_realizadas' => '2021-06-25',
                'horas_total_realizadas' => '13',
                'horas_total_planificadas' => '10',
                'fecha_inicio_planificadas' => '2021-06-26',
                'fecha_fin_planificadas' => '2021-06-30',
            ]);

            $informe5 = Informe::create([
                'usuario_id' =>  $user4->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-06-26',
                'fecha_fin_realizadas' => '2021-06-30',
                'horas_total_realizadas' => '10',
                'horas_total_planificadas' => '17',
                'fecha_inicio_planificadas' => '2021-07-03',
                'fecha_fin_planificadas' => '2021-07-06',
            ]);

            $informe6 = Informe::create([
                'usuario_id' =>  $user4->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-07-03',
                'fecha_fin_realizadas' => '2021-07-06',
                'horas_total_realizadas' => '17',
                'horas_total_planificadas' => '12',
                'fecha_inicio_planificadas' => '2021-07-08',
                'fecha_fin_planificadas' => '2021-07-11',
            ]);

            //usuario 5

            $informe7 = Informe::create([
                'usuario_id' =>  $user5->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-06-19',
                'fecha_fin_realizadas' => '2021-06-23',
                'horas_total_realizadas' => '13',
                'horas_total_planificadas' => '10',
                'fecha_inicio_planificadas' => '2021-06-26',
                'fecha_fin_planificadas' => '2021-06-30',
            ]);
            $informe8 = Informe::create([
                'usuario_id' =>  $user5->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-06-26',
                'fecha_fin_realizadas' => '2021-06-30',
                'horas_total_realizadas' => '10',
                'horas_total_planificadas' => '12',
                'fecha_inicio_planificadas' => '2021-07-02',
                'fecha_fin_planificadas' => '2021-07-05',
            ]);
            $informe9 = Informe::create([
                'usuario_id' =>  $user5->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-07-02',
                'fecha_fin_realizadas' => '2021-07-05',
                'horas_total_realizadas' => '12',
                'horas_total_planificadas' => '12',
                'fecha_inicio_planificadas' => '2021-07-07',
                'fecha_fin_planificadas' => '2021-07-10',
            ]);
            //usuario 6
            $informe10 = Informe::create([
                'usuario_id' =>  $user->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-06-22',
                'fecha_fin_realizadas' => '2021-06-26',
                'horas_total_realizadas' => '10',
                'horas_total_planificadas' => '15',
                'fecha_inicio_planificadas' => '2021-06-28',
                'fecha_fin_planificadas' => '2021-07-02',
            ]);
            $informe11 = Informe::create([
                'usuario_id' =>  $user6->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-06-28',
                'fecha_fin_realizadas' => '2021-07-02',
                'horas_total_realizadas' => '15',
                'horas_total_planificadas' => '12',
                'fecha_inicio_planificadas' => '2021-07-05',
                'fecha_fin_planificadas' => '2021-07-09',
            ]);
            $informe12 = Informe::create([
                'usuario_id' =>  $user6->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-07-05',
                'fecha_fin_realizadas' => '2021-07-09',
                'horas_total_realizadas' => '12',
                'horas_total_planificadas' => '13',
                'fecha_inicio_planificadas' => '2021-07-12',
                'fecha_fin_planificadas' => '2021-07-15',
            ]);
            //USUARIO 7
            $informe13 = Informe::create([
                'usuario_id' =>  $user7->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-06-25',
                'fecha_fin_realizadas' => '2021-06-30',
                'horas_total_realizadas' => '10',
                'horas_total_planificadas' => '13',
                'fecha_inicio_planificadas' => '2021-07-02',
                'fecha_fin_planificadas' => '2021-07-06',
            ]);
            $informe14 = Informe::create([
                'usuario_id' =>  $user7->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-07-02',
                'fecha_fin_realizadas' => '2021-07-06',
                'horas_total_realizadas' => '13',
                'horas_total_planificadas' => '14',
                'fecha_inicio_planificadas' => '2021-07-09',
                'fecha_fin_planificadas' => '2021-07-12',
            ]);
            $informe15 = Informe::create([
                'usuario_id' =>  $user7->id,
                'estado' => 'generado',
                'fecha_inicio_realizadas' => '2021-07-09',
                'fecha_fin_realizadas' => '2021-07-12',
                'horas_total_realizadas' => '14',
                'horas_total_planificadas' => '9',
                'fecha_inicio_planificadas' => '2021-07-15',
                'fecha_fin_planificadas' => '2021-07-20',
            ]);

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 20/06 hasta  el 23/06 en 4to primaria. se ha evaluado el Quiz 2 de ingles. se ha realizado la revision del project',
            'horas_solas_realizadas'=> '6',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe->id,
            'nombre_rubro_realizadas'=> 'Asesorias',
            'descripcion_rubro_realizadas'=> 'Se han realizado asesorias para aquellos alumnos con notas bajas',
            'horas_solas_realizadas'=> '4',
        ]);

        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 03/07 hasta  el 06/07 en 5to primaria del curso de ingles. Se revisara el project terminado con exposicion incluida y a la vez presentaran su tripticos',
            'horas_solas_planificas'=> '7',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe->id,
            'nombre_rubro_planificadas'=> 'Asesorias',
            'descripcion_rubro_planificadas'=> 'Se recuperaran las horas perdidas por el feriado',
            'horas_solas_planificas'=> '3',
        ]);

///INFORME 2

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe2->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 03/07 hasta  el 06/07 en 5to primaria del curso de ingles. Se reviso el project terminado con exposicion incluida',
            'horas_solas_realizadas'=> '7',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe2->id,
            'nombre_rubro_realizadas'=> 'Asesorias',
            'descripcion_rubro_realizadas'=> 'Se recuperaron las horas perdidas por el feriado',
            'horas_solas_realizadas'=> '3',
        ]);

        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe2->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 08/07 hasta  el 11/07 en 3to primaria. Se realizara la revision de la tarea n°3 de ingles. Se presentara los procedimientos para realizar el project',
            'horas_solas_planificas'=> '6',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe2->id,
            'nombre_rubro_planificadas'=> 'Actividades',
            'descripcion_rubro_planificadas'=> 'Se escogeran a los alumnos correspondientes para representar al area de ingles en el dia del logro',
            'horas_solas_planificas'=> '5',
        ]);

        ///INFORME 3

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe3->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 08/07 hasta  el 11/07 en 3to primaria. Se realizo la revision de la tarea n°3 de ingles. Se presentaron los procedimientos para realizar el project',
            'horas_solas_realizadas'=> '6',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe3->id,
            'nombre_rubro_realizadas'=> 'Actividades',
            'descripcion_rubro_realizadas'=> 'Se escogieron a los alumnos correspondientes para representar al area de ingles en el dia del logro',
            'horas_solas_realizadas'=> '5',
        ]);

        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe3->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 14/07 hasta  el 17/07 en 5to primaria. Se realizara la revision de la tarea n°5 de ingles. Se presentara el vocabulario de utiles escolares',
            'horas_solas_planificas'=> '9',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe3->id,
            'nombre_rubro_planificadas'=> 'Asesorias',
            'descripcion_rubro_planificadas'=> 'Se realizaran asesorias para aquellos alumnos con notas bajas en quimica.',
            'horas_solas_planificas'=> '5',
        ]);


        //INFORME 4

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe4->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 19/06 hasta  el 23/06 en 5to secundaria del curso de matematica. Se realizo el tema de numeros complejos',
            'horas_solas_realizadas'=> '8',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe4->id,
            'nombre_rubro_realizadas'=> 'Asesorias',
            'descripcion_rubro_realizadas'=> 'Explicacion del proyecto del ejercicio propuesto por los estudiantes.',
            'horas_solas_realizadas'=> '5',
        ]);

        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe4->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 26/06 hasta  el 30/06 en 5to de secundaria del curso de matematica. Se revisara el proyecto de ejercicio propuesto por grupo',
            'horas_solas_planificas'=> '7',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe4->id,
            'nombre_rubro_planificadas'=> 'Capacitacion',
            'descripcion_rubro_planificadas'=> 'Se capacitara a los alumnos escogidos para el concurso se le enviara el balotario de temas.',
            'horas_solas_planificas'=> '3',
        ]);

        //INFORME 5

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe5->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 26/06 hasta  el 30/06 en 5to de secundaria del curso de matematica. Se reviso el proyecto de ejercicio propuesto por grupo',
            'horas_solas_realizadas'=> '7',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe5->id,
            'nombre_rubro_realizadas'=> 'Capacitacion',
            'descripcion_rubro_realizadas'=> 'Se capacito a los alumnos escogidos para el concurso se le envio el balotario de temas',
            'horas_solas_realizadas'=> '3',
        ]);

        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe5->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 03/06 hasta  el 06/07 en 4to secundaria del curso de matematica. Se evaluara mediante examen del tema triangulos notables',
            'horas_solas_planificas'=> '8',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe5->id,
            'nombre_rubro_planificadas'=> 'Asesorias',
            'descripcion_rubro_planificadas'=> 'Se recuperaran las horas perdidas por el feriado.',
            'horas_solas_planificas'=> '4',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe5->id,
            'nombre_rubro_planificadas'=> 'Actividades',
            'descripcion_rubro_planificadas'=> 'Expondran los alumnos por el dia del logro',
            'horas_solas_planificas'=> '5',
        ]);

        //INFORME 6

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe6->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 03/06 hasta  el 06/07 en 4to secundaria. Se evaluaron mediante examen del tema triangulos notables',
            'horas_solas_realizadas'=> '8',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe6->id,
            'nombre_rubro_realizadas'=> 'Asesorias',
            'descripcion_rubro_realizadas'=> 'Se recuperaron las horas perdidas por el feriado',
            'horas_solas_realizadas'=> '4',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe6->id,
            'nombre_rubro_realizadas'=> 'Actividades',
            'descripcion_rubro_realizadas'=> 'Exposicion de los alumnos por el dia del logro',
            'horas_solas_realizadas'=> '5',
        ]);

        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe6->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 08/07 hasta  el 11/07 en 5to secundaria. Se evaluara mediante examen del tema hipotenusa',
            'horas_solas_planificas'=> '9',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe6->id,
            'nombre_rubro_planificadas'=> 'Asesorias',
            'descripcion_rubro_planificadas'=> 'Se recuperaran las horas perdidas por el simulacro.',
            'horas_solas_planificas'=> '3',
        ]);

        //INFORME 7

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe7->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 19/06 hasta  el 23/06 en 3ro de secundaria del curso de fisica. Se realizo el tema capacitancia',
            'horas_solas_realizadas'=> '7',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe7->id,
            'nombre_rubro_realizadas'=> 'Capacitacion ',
            'descripcion_rubro_realizadas'=> 'Se reunio con los alumnos para explicar su proyecto relacion al movimiento rectilineo uniforme.',
            'horas_solas_realizadas'=> '5',
        ]);

        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe7->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 26/06 hasta  el 30/06 en 4to de secundaria del curso de fisica. Se evaluara el tema de la ley de gauss mediante un examen y una evaluacion en la pizarra',
            'horas_solas_planificas'=> '8',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe7->id,
            'nombre_rubro_planificadas'=> 'Asesorias',
            'descripcion_rubro_planificadas'=> 'Se reunira con los alumnos para recuperar las horas perdidas por el feriado.',
            'horas_solas_planificas'=> '6',
        ]);
        //INFORME 8

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe8->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 26/06 hasta  el 30/06 en 4to de secundaria del curso de fisica. Se evaluo el tema de la ley de gauss mediante un examen',
            'horas_solas_realizadas'=> '8',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe8->id,
            'nombre_rubro_realizadas'=> 'Asesorias',
            'descripcion_rubro_realizadas'=> 'Se reunio con los alumnos para recuperar las horas perdidas por el feriado.',
            'horas_solas_realizadas'=> '6',
        ]);

        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe8->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 02/07 hasta  el 05/07 en 3ro de secundaria del curso de fisica. Se evaluara el tema de hidrostatica mediante un examen',
            'horas_solas_planificas'=> '9',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe8->id,
            'nombre_rubro_planificadas'=> 'Asesorias',
            'descripcion_rubro_planificadas'=> 'Se reunira con los alumnos para explicar el tema de tipos de energia antes de la evaluacion.',
            'horas_solas_planificas'=> '3',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe8->id,
            'nombre_rubro_planificadas'=> 'Actividades',
            'descripcion_rubro_planificadas'=> 'Se seleccionara a los alumnos que representaran al area en el dia del logro.',
            'horas_solas_planificas'=> '5',
        ]);

        //INFORME 9

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe9->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 02/07 hasta  el 05/07 en 3ro de secundaria del curso de fisica. Se evaluo el tema de hidrostatica mediante un examen',
            'horas_solas_realizadas'=> '9',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe9->id,
            'nombre_rubro_realizadas'=> 'Asesorias',
            'descripcion_rubro_realizadas'=> 'Se reunio con los alumnos para explicar el tema de tipos de energia antes de la evaluacion.',
            'horas_solas_realizadas'=> '3',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe9->id,
            'nombre_rubro_realizadas'=> 'Actividades',
            'descripcion_rubro_realizadas'=> 'Se selecciono a los alumnos que representaran al area en el dia del logro.',
            'horas_solas_realizadas'=> '5',
        ]);

        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe9->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 07/07 hasta  el 10/07 en 3ro de secundaria del curso de fisica. Se evaluara el tema de ecuaciones dimensionales mediante un examen',
            'horas_solas_planificas'=> '8',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe9->id,
            'nombre_rubro_planificadas'=> 'Asesorias',
            'descripcion_rubro_planificadas'=> 'Se reunira con los alumnos para explicar el tema de descomposicion de vectores antes de la evaluacion.',
            'horas_solas_planificas'=> '4',
        ]);

        //INFORME 10

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe10->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 22/06 hasta  el 26/06 en 5to de primaria de comunicacion. Se evaluo el tema de los sinonimos y antonimos mediante un examen',
            'horas_solas_realizadas'=> '6',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe10->id,
            'nombre_rubro_realizadas'=> 'Asesorias',
            'descripcion_rubro_realizadas'=> 'Se realizo una explicacion acerca de los tipos de texto.',
            'horas_solas_realizadas'=> '4',
        ]);

        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe10->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 28/06 hasta  el 02/07 en 6to de primaria de comunicacion. Se evalura el tema de los elementos de la comunicacion mediante un examen',
            'horas_solas_planificas'=> '6',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe10->id,
            'nombre_rubro_planificadas'=> 'Asesorias',
            'descripcion_rubro_planificadas'=> 'Se reunira con los alumnos para explicacion del proyecto de la historieta.',
            'horas_solas_planificas'=> '5',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe10->id,
            'nombre_rubro_planificadas'=> 'Actividades',
            'descripcion_rubro_planificadas'=> 'Se realizara un poema por el dia del padre.',
            'horas_solas_planificas'=> '4',
        ]);

        //INFORME 11

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe11->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 28/06 hasta  el 02/07 en 6to de primaria. Se evaluo el tema de los elementos de la comunicacion mediante un examen',
            'horas_solas_realizadas'=> '6',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe11->id,
            'nombre_rubro_realizadas'=> 'Asesorias',
            'descripcion_rubro_realizadas'=> 'Se reunio con los alumnos para explicacion del proyecto de la historieta.',
            'horas_solas_realizadas'=> '5',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe11->id,
            'nombre_rubro_realizadas'=> 'Actividades',
            'descripcion_rubro_realizadas'=> 'Se realizo un poema por el dia del padre.',
            'horas_solas_realizadas'=> '4',
        ]);

        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe11->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 05/07 hasta  el 09/07 en 5to de primaria de comunicacion. Se realizara la clase de sujeto y predicado',
            'horas_solas_planificas'=> '7',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe11->id,
            'nombre_rubro_planificadas'=> 'Asesorias',
            'descripcion_rubro_planificadas'=> 'Recuperara las horas perdidas por el feriado.',
            'horas_solas_planificas'=> '5',
        ]);

        //INFORME 12

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe12->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 05/07 hasta  el 09/07 en 5to de primaria de comunicacion. Se realizo la clase de sujeto y predicado',
            'horas_solas_realizadas'=> '7',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe12->id,
            'nombre_rubro_realizadas'=> 'Asesorias',
            'descripcion_rubro_realizadas'=> 'Se Recupero las horas perdidas por el feriado.',
            'horas_solas_realizadas'=> '5',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe12->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 12/07 hasta  el 15/07 en 5to de primaria de comunicacion. Se evaluara el tema de los tipos de parrafo',
            'horas_solas_planificas'=> '9',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe12->id,
            'nombre_rubro_planificadas'=> 'Asesorias',
            'descripcion_rubro_planificadas'=> 'Se explicara de los tipos de parrafo antes del examen.',
            'horas_solas_planificas'=> '4',
        ]);

        //INFORME 13

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe13->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 25/06 hasta  el 30/06 en 4to de secundaria de biologia. Se evaluo el tema de los tipos de sangre',
            'horas_solas_realizadas'=> '7',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe13->id,
            'nombre_rubro_realizadas'=> 'Actividades',
            'descripcion_rubro_realizadas'=> 'Se selecciono a los alumnos que representaran el area en el dia del logro.',
            'horas_solas_realizadas'=> '3',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe13->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 02/07 hasta  el 06/07 en 4to de secundaria de bilogia. Se evaluara el tema del sistema nervioso central y biomoleculas inorganicas.',
            'horas_solas_planificas'=> '8',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe13->id,
            'nombre_rubro_planificadas'=> 'Asesorias',
            'descripcion_rubro_planificadas'=> 'Se recuperara la clase del feriado.',
            'horas_solas_planificas'=> '5',
        ]);
        //INFORME 14

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe14->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 02/07 hasta  el 06/07 en 4to de secundaria de biologia. Se evaluo el tema del sistema nervioso central',
            'horas_solas_realizadas'=> '8',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe14->id,
            'nombre_rubro_realizadas'=> 'Asesorias',
            'descripcion_rubro_realizadas'=> 'Se recupero la clase del feriado.',
            'horas_solas_realizadas'=> '5',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe14->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 09/07 hasta  el 12/07 en 4to de secundaria de biologia. Se realizara la clase del ADN y ARN',
            'horas_solas_planificas'=> '9',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe14->id,
            'nombre_rubro_planificadas'=> 'Asesorias',
            'descripcion_rubro_planificadas'=> 'Explicacion del proyecto que tendra como objetivo demostrarlas diferencias de la celula animal y vegetal.',
            'horas_solas_planificas'=> '5',
        ]);
        //INFORME 15

        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe15->id,
            'nombre_rubro_realizadas'=> 'Dictado de clases',
            'descripcion_rubro_realizadas'=> 'Dictado de clases correspondientes al 09/07 hasta  el 12/07 en 4to de secundaria de biologia. Se realizo la clase del ADN y ARN',
            'horas_solas_realizadas'=> '9',
        ]);
        InformesRealizadas::create([
            'id_informe_realizadas' =>  $informe15->id,
            'nombre_rubro_realizadas'=> 'Asesorias',
            'descripcion_rubro_realizadas'=> 'Se realizo la Explicacion del proyecto que tendra como objetivo demostrarlas diferencias de la celula animal y vegetal.',
            'horas_solas_realizadas'=> '5',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe15->id,
            'nombre_rubro_planificadas'=> 'Dictado de clases',
            'descripcion_rubro_planificadas'=> 'Dictado de clases correspondientes al 15/07 hasta  el 20/07 en 4to de secundaria de biologia. Se revisara el avance del proyecto parte hipotesis y experimentacion.',
            'horas_solas_planificas'=> '6',
        ]);
        InformesPlanificadas::create([
            'id_informe_planificadas' =>  $informe15->id,
            'nombre_rubro_planificadas'=> 'Asesorias',
            'descripcion_rubro_planificadas'=> 'Se realizara la explicacion de la clase acerca de los sistemas del cuerpo humano para el examen.',
            'horas_solas_planificas'=> '3',
        ]);




        $admin = Role::create(['name' => 'SuperUsuario']);
        $docente = Role::create(['name' => 'Docente']);
        $jefatura = Role::create(['name' => 'Jefatura']);
        $administracion = Role::create(['name' => 'Administracion']);
        $role = Role::create(['name' => 'role']);

        $permission = [
            'create',
            'read',
            'update',
            'delete',
        ];

        foreach(Role::all() as $role){
            foreach($permission as $p){
                if($role->name == 'SuperUsuario') $role->name = 'usuario';
                Permission::create(['name' => "{$role->name} $p"]);
            }
        }

        $admin->syncPermissions(Permission::all());
        $docente->syncPermissions(Permission::where('name','like','%Docente%')->get());
        $jefatura->syncPermissions(Permission::where('name','like','%Jefatura%')->get());
        $administracion->syncPermissions(Permission::where('name','like','%Administracion%')->get());
        $role->syncPermissions(Permission::where('name','like','%role%')->get());


        $user->assignRole('SuperUsuario');
        $user2->assignRole('SuperUsuario');
        $user3->assignRole('Docente');
        $user4->assignRole('Docente');
        $user5->assignRole('Docente');
        $user6->assignRole('Docente');
        $user7->assignRole('Docente');
        $user8->assignRole('Docente');
        $user9->assignRole('Docente');
        $user10->assignRole('Docente');
        $user11->assignRole('Docente');
        $user12->assignRole('Docente');
        $user13->assignRole('Jefatura');
        $user14->assignRole('Jefatura');
        $user15->assignRole('Administracion');
        $user16->assignRole('Administracion');

        /* Informe::factory()->count()->create(); */
        /* InformesRealizadas::factory()->count(50)->create();
        InformesPlanificadas::factory()->count(50)->create(); */

//RUBROS

$rubro = new Rubro();

$rubro->nombre_rubro = "Capacitacion";

$rubro->save();

$rubro2 = new Rubro();

$rubro2->nombre_rubro = "Dictado de clases";

$rubro2->save();

$rubro3 = new Rubro();

$rubro3->nombre_rubro = "Actividades";

$rubro3->save();

$rubro4 = new Rubro();

$rubro4->nombre_rubro = "Asesorias";

$rubro4->save();


    }
}
