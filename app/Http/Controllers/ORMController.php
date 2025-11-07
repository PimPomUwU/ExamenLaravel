<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use ReflectionMethod;

    class ORMController extends Controller
    {
        //
        /**
        * Lista blanca de modelos que se pueden inspeccionar.
        */
        protected array $models = [
            'rol'     => Rol::class,
            'user'   => User::class,
        ];

        /**
        * Mostrar todas las relaciones que tiene un modelo dado.
        *
        * Ejemplo: GET /api/orm/relations/center
        */
        public function relations($model)
        {
            if (!isset($this->models[$model])) {
                return response()->json(['error' => 'Modelo no permitido'], 404);
            }

            $instance = new ($this->models[$model]);
            $class = get_class($instance);

            $relations = [];

            foreach (get_class_methods($class) as $method) {
                // Ignorar métodos internos o que requieran parámetros
                if (Str::startsWith($method, '__')) continue;
                $reflection = new ReflectionMethod($class, $method);
                if ($reflection->getNumberOfParameters() > 0) continue;

                try {
                    $result = $instance->{$method}();
                    if ($result instanceof Relation) {
                        $relations[] = $method;
                    }
                } catch (\Throwable $e) {
                    // ignorar métodos que no sean relaciones
                }
            }

            return response()->json([
                'model' => $class,
                'relations' => $relations,
            ]);
        }
    }
