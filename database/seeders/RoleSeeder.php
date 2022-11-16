<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Vicedecana']);
        $role3 = Role::create(['name' => 'ProfesorJefeAño']);
        $role4 = Role::create(['name' => 'ProfesorGuia']);
        $role5 = Role::create(['name' => 'Usuario']);
        $role6 = Role::create(['name' => 'Profesor']);
        $role7 = Role::create(['name' => 'OptProfesor']);

        Permission::create(['name' => 'index inicio',
                           'description' => 'Ver Página de inicio'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        /*====================================Start Modulo Horario=================================================================*/

        Permission::create(['name' => 'Modulo_Horario.asignaturas.index',
                           'description' => 'Ver listado de asignaturas'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.asignaturas.create',
                           'description' => 'Insertar una asignatura'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.asignaturas.edit',
                           'description' => 'Editar una asignatura'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.asignaturas.destroy',
                           'description' => 'Eliminar una asignatura'])->syncRoles([$role2,$role3]);

        Permission::create(['name' => 'Modulo_Horario.balancedecarga.index',
                           'description' => 'Ver balance de carga'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.balancedecarga.create',
                           'description' => 'Insertar balance de carga'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.balancedecarga.edit',
                           'description' => 'Editar balance de carga'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.balancedecarga.destroy',
                           'description' => 'Eliminar balance de carga'])->syncRoles([$role2,$role3]);

        Permission::create(['name' => 'Exports.BalancedecargaExport',
                           'description' => 'Exportar Balance de Carga como Excel'])->syncRoles([$role2,$role3]);

        Permission::create(['name' => 'Modulo_Horario.afectaciones.index',
                           'description' => 'Ver listado de Afectaciones'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.afectaciones.create',
                           'description' => 'Insertar Afectación'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.afectaciones.edit',
                           'description' => 'Editar Afectación'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.afectaciones.destroy',
                           'description' => 'Eliminar Afectación'])->syncRoles([$role2,$role3]);

        Permission::create(['name' => 'Modulo_Horario.locales.index',
                           'description' => 'Ver listado de Locales'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.locales.create',
                           'description' => 'Insertar Locales'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.locales.edit',
                           'description' => 'Editar Locales'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.locales.destroy',
                           'description' => 'Eliminar Locales'])->syncRoles([$role2,$role3]);

        Permission::create(['name' => 'Modulo_Horario.planificacion.index',
                           'description' => 'Ver listado de la Carga Docente'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.planificacion.create',
                           'description' => 'Insertar Carga Docente'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.planificacion.edit',
                           'description' => 'Editar Carga Docente'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.planificacion.destroy',
                           'description' => 'Eliminar Carga Docente'])->syncRoles([$role2,$role3]);

        Permission::create(['name' => 'Modulo_Horario.parciales.index',
                           'description' => 'Ver listado de Pruebas Parciales'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.parciales.create',
                           'description' => 'Insertar Prueba Parcial'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.parciales.edit',
                           'description' => 'Editar Prueba Parcial'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.parciales.destroy',
                           'description' => 'Eliminar Prueba Parcial'])->syncRoles([$role2,$role3]);


        Permission::create(['name' => 'Modulo_Horario.generarhorario.index',
                           'description' => 'Permitir Generar Horario'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.generarhorario.create',
                           'description' => 'Generar Horario'])->syncRoles([$role2,$role3]);

        /*====================================End Modulo Horario===================================================================*/

        /*====================================Start Modulo Perfil de usuario=======================================================*/



        /*====================================End Modulo Perfil de usuario========================================================*/

        /*====================================Start Modulo Optativas==============================================================*/

        Permission::create(['name' => 'Modulo_Optativas.optativa.index',
        'description' => 'Ver listado de Optativas'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Optativas.optativa.create',
        'description' => 'Crear una Optativa'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Optativas.optativa.edit',
        'description' => 'Editar una Optativa'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Optativas.optativa.show',
        'description' => 'Ver una Optativa'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_Optativas.optativa.destroy',
        'description' => 'Eliminar una Optativa'])->syncRoles([$role2,$role3]);

        Permission::create(['name' => 'Modulo_Optativas.opt_prof.index',
        'description' => 'Ver listado de Estudiantes de su Optativa'])->syncRoles([$role7]);
        Permission::create(['name' => 'Modulo_Optativas.opt_est.index',
        'description' => 'Ver listado de Optativas Ofertadas'])->syncRoles([$role5]);




        /*====================================End Modulo Optativas================================================================*/

        /*====================================Start Modulo Comision Disciplinaria=================================================*/

        /*====================================End Modulo Comision Disciplinaria===================================================*/

        /*====================================Start Modulo Estrategia Educativa===================================================*/

        /*====================================End Modulo Estrategia Educativa=====================================================*/

        /*====================================Start Modulo Evaluacion Integrada===================================================*/

        /*====================================End Modulo Evaluacion Integrada=====================================================*/

       /*====================================Start Modulo Actividades=============================================================*/
        Permission::create(['name'=> 'Modulo_Actividades.actividades.index',
                            'description'=> 'Ver listado de actividades'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name'=> 'Modulo_Actividades.actividades.create',
                            'description'=> 'Insertar una actividades'])->syncRoles([$role1,$role3]);

        Permission::create(['name'=> 'Modulo_Actividades.actividades.edit',
                            'description'=> 'Editar una actividades'])->syncRoles([$role1,$role3]);

        Permission::create(['name'=> 'Modulo_Actividades.actividades.destroy',
                            'description'=> 'Eliminar una actividades'])->syncRoles([$role1,$role3]);



        Permission::create(['name'=> 'Modulo_Actividades.evidencias.index',
                            'description'=> 'Ver listado de evidencias'])->syncRoles([$role1,$role3,$role4,$role5]);

        Permission::create(['name'=> 'Modulo_Actividades.evidencias.create',
                            'description'=> 'Insertar una evidencia'])->syncRoles([$role1,$role3,$role4,$role5]);

        Permission::create(['name'=> 'Modulo_Actividades.evidencias.edit',
                            'description'=> 'Editar una evidencias'])->syncRoles([$role1,$role3,$role4,$role5]);

        Permission::create(['name'=> 'Modulo_Actividades.evidencias.destroy',
                            'description'=> 'Eliminar una evidencia'])->syncRoles([$role1,$role3,$role4,$role5]);

        /*====================================End Modulo Actividades===============================================================*/

        /*====================================Start Modulo GECE===================================================================*/

        Permission::create(['name'=> 'Modulo_GECE.cronograma.index',
                            'description'=> 'Ver listado de cronograma'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
    
        Permission::create(['name'=> 'Modulo_GECE.cronograma.store',
                            'description'=> 'Almacenar cronograma'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name'=> 'Modulo_GECE.cronograma.show',
                            'description'=> 'mostrar cronograma'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name'=> 'Modulo_GECE.temas.index',
                            'description'=> 'Mostrar Temas'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        
        Permission::create(['name'=> 'Modulo_GECE.perfil.index',
                            'description'=> 'Mostrar Perfiles'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name'=> 'Modulo_GECE.comite.index',
                            'description'=> 'Mostrar Comités'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name'=> 'Modulo_GECE.deposito.index',
                            'description'=> 'Mostrar Depósito de Documentos'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name'=> 'Modulo_GECE.documento.store',
                            'description'=> 'Almacenar documentos'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name'=> 'Modulo_GECE.documento.descargar',
                            'description'=> 'Descargar documentos'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name'=> 'Modulo_GECE.tribunaltaller.index',
                            'description'=> 'Mostrar Tribunal Taller'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name'=> 'Modulo_GECE.tribunalpd.index',
                            'description'=> 'Mostrar Tribunal de Predefensa y Defensa'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name'=> 'Modulo_GECE.reportes.index',
                            'description'=> 'Mostrar Reportes de Trabajo de Diploma'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        /*====================================End Modulo GECE=====================================================================*/


    }
}
