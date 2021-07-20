<?php

namespace Tests\Feature;
use App\Models\Informe;
use App\Http\Livewire\InformeTable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\TestTable;
use App\Http\Livewire\JefaturaTable;
use App\Http\Livewire\AdministracionTable;

use App\Models\User;
class CrearInformeTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    function table_report_page_doesnt_contain_livewire_component()
    {
        $this->get('/informes')->assertDontSeeLivewire(InformeTable::class);
    }

    /** @test  */
    function table_user_page_doesnt_contain_livewire_component()
    {
        $this->get('/administracion/prueba')->assertDontSeeLivewire(TestTable::class);
    }
    /** @test  */
    function table_boss_page_doesnt_contain_livewire_component()
    {
        $this->get('/jefatura/informes')->assertDontSeeLivewire(JefaturaTable::class);
    }
    /** @test  */
    function table_administration_page_doesnt_contain_livewire_component()
    {
        $this->get('/administracion/informes')->assertDontSeeLivewire(AdministracionTable::class);
    }

}
