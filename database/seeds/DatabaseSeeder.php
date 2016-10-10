<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call('TipoEmpleadosTableSeeder');
         $this->call('GradoInstruccionesTableSeeder');
         $this->call('EstadoCivilesTableSeeder');
         $this->call('OcupacionesTableSeeder');
         $this->call('UserTableSeeder');
         $this->call('CategoriaTableSeeder');
         $this->call('MarcaTableSeeder');
         $this->call('ModeloTableSeeder');
         $this->call('TipoProductoTableSeeder');
         $this->call('TipoClienteTableSeeder');
         $this->call('ProductoTableSeeder');
         $this->call('ProveedorTableSeeder');
         $this->call('ClienteTableSeeder');

        Model::reguard();
    }
}
