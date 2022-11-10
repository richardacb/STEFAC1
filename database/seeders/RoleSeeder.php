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

        Permission::create(['name' => 'Modulo_PerfildeUsuario.estudiantes.index',
                           'description' => 'Ver listado de estudiantes'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.estudiantes.create',
                           'description' => 'Insertar datos a un estudiante'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.estudiantes.edit',
                           'description' => 'Editar datos a un estudiante'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.estudiantes.destroy',
                           'description' => 'Eliminar datos a un estudiante'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Export.EstudiantesExport',
                           'description' => 'Exportar datos de los estudiantes como Excel'])->syncRoles([$role2,$role3]);

        Permission::create(['name' => 'Modulo_PerfildeUsuario.grupos.index',
                           'description' => 'Ver listado de grupos'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.grupos.create',
                           'description' => 'Insertar un grupo'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.grupos.edit',
                           'description' => 'Editar un grupo'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.grupos.destroy',
                           'description' => 'Eliminar un grupo'])->syncRoles([$role2,$role3]);

        Permission::create(['name' => 'Modulo_PerfildeUsuario.profesores.index',
                           'description' => 'Ver listado de profesores'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.profesores.create',
                           'description' => 'Insertar datos a un profesor'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.profesores.edit',
                           'description' => 'Editar datos a un profesor'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.profesores.destroy',
                           'description' => 'Eliminar datos a un profesor'])->syncRoles([$role2,$role3]);

        Permission::create(['name' => 'Modulo_PerfildeUsuario.diagnosticopreventivo.index',
                           'description' => 'Ver listado de diagnostico preventivo'])->syncRoles([$role2,$role3,$role4]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.diagnosticopreventivo.create',
                           'description' => 'Insertar datos de diagnostico preventivo'])->syncRoles([$role2,$role3,$role4]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.diagnosticopreventivo.edit',
                           'description' => 'Editar datos de diagnostico preventivo'])->syncRoles([$role2,$role3,$role4]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.diagnosticopreventivo.destroy',
                           'description' => 'Eliminar datos de diagnostico preventivo'])->syncRoles([$role2,$role3,$role4]);

        Permission::create(['name' => 'Modulo_PerfildeUsuario.usuarios.index',
                           'description' => 'Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.usuarios.create',
                           'description' => 'Insertar datos a un usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.usuarios.editar',
                           'description' => 'Editar datos del usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.usuarios.actualizar',
                           'description' => 'Asignar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.usuarios.edit',
                           'description' => 'Ver lista de roles ha asignar'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.usuarios.update',
                           'description' => 'Asignar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'Import.UsuariosImport',
                           'description' => 'Importar listado de usuarios'])->syncRoles([$role1]);


        Permission::create(['name' => 'Modulo_PerfildeUsuario.usuarios.show',
                          'description' => 'Ver detalles del usuarios'])->syncRoles([$role1,$role2,$role3,$role4,$role5,$role6,$role7]);


        Permission::create(['name' => 'Modulo_PerfildeUsuario.roles.index',
                           'description' => 'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.roles.create',
                           'description' => 'Crear un rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.roles.edit',
                           'description' => 'Editar rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo_PerfildeUsuario.roles.destroy',
                           'description' => 'Eliminar rol'])->syncRoles([$role1]);




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
        /*====================================End Modulo GECE=====================================================================*/


    }
}
