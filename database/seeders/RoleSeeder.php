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
        $role5 = Role::create(['name' => 'Estudiante']);
        $role6 = Role::create(['name' => 'Profesor']);
        $role7 = Role::create(['name' => 'OptProfesor']);

        Permission::create(['name' => 'index inicio',
                           'description' => 'Ver Página de inicio'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        /*====================================Start Modulo Horario=================================================================*/

        Permission::create(['name' => 'Modulo_Horario.asignaturas.index',
                           'description' => 'Ver listado de asignaturas'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.asignaturas.create',
                           'description' => 'Insertar una asignatura'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.asignaturas.edit',
                           'description' => 'Editar una asignatura'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.asignaturas.destroy',
                           'description' => 'Eliminar una asignatura'])->syncRoles([$role1,$role2,$role3]);

        Permission::create(['name' => 'Modulo_Horario.balancedecarga.index',
                           'description' => 'Ver balance de carga'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.balancedecarga.create',
                           'description' => 'Insertar balance de carga'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.balancedecarga.edit',
                           'description' => 'Editar balance de carga'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.balancedecarga.destroy',
                           'description' => 'Eliminar balance de carga'])->syncRoles([$role1,$role2,$role3]);

        Permission::create(['name' => 'Exports.BalancedecargaExport',
                           'description' => 'Exportar Balance de Carga como Excel'])->syncRoles([$role1,$role2,$role3]);

        Permission::create(['name' => 'Modulo_Horario.afectaciones.index',
                           'description' => 'Ver listado de Afectaciones'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.afectaciones.create',
                           'description' => 'Insertar Afectación'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.afectaciones.edit',
                           'description' => 'Editar Afectación'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.afectaciones.destroy',
                           'description' => 'Eliminar Afectación'])->syncRoles([$role1,$role2,$role3]);

        Permission::create(['name' => 'Modulo_Horario.locales.index',
                           'description' => 'Ver listado de Locales'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.locales.create',
                           'description' => 'Insertar Locales'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.locales.edit',
                           'description' => 'Editar Locales'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.locales.destroy',
                           'description' => 'Eliminar Locales'])->syncRoles([$role1,$role2,$role3]);

        Permission::create(['name' => 'Modulo_Horario.planificacion.index',
                           'description' => 'Ver listado de la Carga Docente'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.planificacion.create',
                           'description' => 'Insertar Carga Docente'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.planificacion.edit',
                           'description' => 'Editar Carga Docente'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.planificacion.destroy',
                           'description' => 'Eliminar Carga Docente'])->syncRoles([$role1,$role2,$role3]);

        Permission::create(['name' => 'Modulo_Horario.generarhorario.index',
                           'description' => 'Permitir Generar Horario'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Horario.generarhorario.create',
                           'description' => 'Generar Horario'])->syncRoles([$role1,$role2,$role3]);

        /*====================================End Modulo Horario===================================================================*/

        /*====================================Start Modulo Perfil de usuario=======================================================*/

        Permission::create(['name' => 'Modulo_PerfildeUsuario.estudiantes.index',
                           'description' => 'Ver listado de estudiantes'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.estudiantes.create',
                           'description' => 'Insertar un estudiante'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.estudiantes.edit',
                           'description' => 'Editar un estudiante'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.estudiantes.estado',
                           'description' => 'Cambiar estado de un estudiante'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'Modulo_PerfildeUsuario.grupos.index',
                           'description' => 'Ver listado de grupos'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.grupos.create',
                           'description' => 'Insertar un grupo'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.grupos.edit',
                           'description' => 'Editar un grupo'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.grupos.destroy',
                           'description' => 'Eliminar un grupo'])->syncRoles([$role1,$role2,$role3]);

        Permission::create(['name' => 'Modulo_PerfildeUsuario.profesores.index',
                           'description' => 'Ver listado de profesores'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.profesores.create',
                           'description' => 'Insertar un profesores'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.profesores.edit',
                           'description' => 'Editar un profesores'])->syncRoles([$role1,$role2,$role3]);

        Permission::create(['name' => 'Modulo_PerfildeUsuario.diagnosticopreventivo.index',
                           'description' => 'Ver listado de diagnostico preventivo'])->syncRoles([$role1,$role2,$role3,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.diagnosticopreventivo.create',
                           'description' => 'Insertar un diagnostico preventivo'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.diagnosticopreventivo.edit',
                           'description' => 'Editar un diagnostico preventivo'])->syncRoles([$role1,$role3,$role4]);

        Permission::create(['name' => 'Modulo_PerfildeUsuario.usuarios.index',
                           'description' => 'Ver listado de usuarios'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.usuarios.edit',
                           'description' => 'Ver lista de roles ha asignar'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.usuarios.update',
                           'description' => 'Asignar roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'Modulo_PerfildeUsuario.roles.index',
                           'description' => 'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.roles.create',
                           'description' => 'Crear un rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.roles.edit',
                           'description' => 'Editar rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.roles.destroy',
                           'description' => 'Eliminar rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'Import.EstudiantesImport',
                           'description' => 'Importar listado de estudiantes'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Import.GruposImport',
                           'description' => 'Importar listado de grupos'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Import.ProfesoresImport',
                           'description' => 'Importar listado de profesores'])->syncRoles([$role1,$role2,$role3]);

        /*====================================End Modulo Perfil de usuario========================================================*/

        /*====================================Start Modulo Optativas==============================================================*/

        Permission::create(['name' => 'Modulo_Optativas.optativa.index',
        'description' => 'Ver listado de Optativas'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Optativas.optativa.create',
        'description' => 'Crear una Optativa'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Optativas.optativa.edit',
        'description' => 'Editar una Optativa'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Optativas.optativa.show',
        'description' => 'Ver una Optativa'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Modulo_Optativas.optativa.destroy',
        'description' => 'Eliminar una Optativa'])->syncRoles([$role1,$role2,$role3]);

        // Permission::create(['name' => 'Modulo_Optativas.opt_prof.index',
        // 'description' => 'Ver listado de Optativas Ofertadas'])->syncRoles([$role7]);
        // Permission::create(['name' => 'Modulo_Optativas.opt_est.index',
        // 'description' => 'Ver listado de '])->syncRoles([$role5]);




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

        /*====================================End Modulo GECE=====================================================================*/


    }
}
