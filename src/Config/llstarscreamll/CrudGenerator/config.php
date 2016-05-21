<?php

/**
 * Este archivo es parte de llstarscreamll\CrudGenerator, aquí se muestran todas las opciones
 * de configuración del paquete.
 *
 * @license MIT
 * @package llstarscreamll\CrudGenerator
 */

return $config = [

    /**
     * Información del paquete.
     */
    'module-info'   =>  [
        'name'      =>  'CrudGenerator',
        'version'   =>  '0.1',
        'enabled'   =>  true,
    ],

    'position-model-namespace' => 'llstarscreamll\CoreModule\app\Models\\',
    'sub-cost-center-model-namespace' => 'llstarscreamll\CoreModule\app\Models\\',
    'cost-center-model-namespace' => 'llstarscreamll\CoreModule\app\Models\\',
    'user-model-namespace' => 'llstarscreamll\CoreModule\app\Models\\',

    /*
     * Las vistas que serán generadas.
     */
    'views' => [
        'partials/form-fields',
        'partials/index-create-form',
        'partials/index-table',
        'index',
        'edit',
        'show',
        'create',
    ],

    'tests' => [
        'Base',
        'Index',
        'Create',
        'Edit',
        'Show',
        'Delete'
    ],

    /*
     * El direcotrio que contiene las plantillas.
     */
    'templates' => 'vendor.CrudGenerator.single-page-templates',

    /**
     * Aquí indicas si quieres que el formulario decreación de registro esté incluido en el index
     */
    'show-create-form-on-index'  => true,

    /**
     * La plantilla que las vistas generadas extenderán
     */
    'layout'    => 'app',
    'layout-namespace'    => '',

    // el namespace de las clases a generar
    'parent-app-namespace'  => 'grapas',

    // tipos de datos de tablas numéricos
    'numeric-input-types'   => ['int','unsigned_int','float','double'],

    // campos de control del sistema, para imprimir en vista show
    'system-fields' => ['created_at', 'updated_at', 'deleted_at'],
];
