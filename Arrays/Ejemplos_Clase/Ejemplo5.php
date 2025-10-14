<?php 
    $arrAlumnos = ['Pepe' => ['curso' => 'DAW25',
                              'notas' => [4,8,6,7]
                    ],

                    'Maria' => [ 'curso' => 'DAM25',
                                 'notas' => [8,6,3,8]

                    ],
                ];

    echo "Alumnos: <br />";
    print_r($arrAlumnos);
    $arrAlumnos['Maria']['notas'][2] = 8;

    echo "<br />Alumnos: <br />";
    print_r($arrAlumnos);

    $arrOtroAlumnos = ['Pepe', 'Lucia', 'Xiomara', 'Angelica'];

    echo "<br />Array recorrido con un for-each: [";
    foreach($arrOtroAlumnos as $otroAlumno) {
        echo " " . $otroAlumno . ",";
    }
    echo "]";

    $arrAlumnos = [['nombre' => 'Pepe', 
                    'curso' => 'DAW25',
                    'notas' => [4,8,6,7]
                    ],

                     ['nombre' => 'Maria', 
                      'curso' => 'DAM25',
                      'notas' => [8,6,3,8]

                    ],
                ];

    echo "<br /> Array principal recorrido con un for-each:<br /> ";
    foreach($arrAlumnos as $Alumno) {
        echo "Nombre: " . $Alumno['nombre'] . ", Curso: " . $Alumno['curso'] . ". <br/> Notas: [";
        foreach($Alumno['notas'] as $Nota) {
            echo " " . $Nota . ",";
        }
        echo "] <br />";

    }


?>