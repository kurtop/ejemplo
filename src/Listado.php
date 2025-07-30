<?php

        error_reporting(E_ALL);
		ini_set("log_errors", 1);
		ini_set("track_errors", 1);
		ini_set("error_log", "./php-error.log");


        $data = array(
                    array(
                        'Cliente' => 'Javiera Rojas',
                        'Ingreso' => 180000,
                        'Egreso' => 75000
                    ),
                    array(
                        'Cliente' => 'Matías Soto',
                        'Ingreso' => 165000,
                        'Egreso' => 68000
                    ),
                    array(
                        'Cliente' => 'Camila Contreras',
                        'Ingreso' => 170000,
                        'Egreso' => 72000
                    ),
                    array(
                        'Cliente' => 'Benjamín Silva',
                        'Ingreso' => 155000,
                        'Egreso' => 65000
                    ),
                    array(
                        'Cliente' => 'Sofía Martínez',
                        'Ingreso' => 175800,
                        'Egreso' => 71750
                    ),
                    array(
                        'Cliente' => 'Vicente Torres',
                        'Ingreso' => 160000,
                        'Egreso' => 69000
                    ),
                    array(
                        'Cliente' => 'Isidora Flores',
                        'Ingreso' => 185000,
                        'Egreso' => 78000
                    ),
                    array(
                        'Cliente' => 'Joaquín Morales',
                        'Ingreso' => 150000,
                        'Egreso' => 63000
                    ),
                    array(
                        'Cliente' => 'Antonella Núñez',
                        'Ingreso' => 190000,
                        'Egreso' => 80000
                    ),
                    array(
                        'Cliente' => 'Agustín Romero',
                        'Ingreso' => 145000,
                        'Egreso' => 55000
                    )
        );

        if (isset($_POST['action']) && $_POST['action'] === 'getData') {

            $_POST['search']['value'] = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';
            $filtered_data = array_filter($data, function($item) {
                return strpos(strtolower($item['Cliente']), strtolower($_POST['search']['value'])) !== false;
            });
            header('Content-Type: application/json');
            $response = array(
                'draw'              => intval($_POST['draw']),
                'recordsTotal'      => count($data),
                'recordsFiltered'   => count($filtered_data),
                'data'              => array_values($filtered_data)
            );
            echo json_encode($response);
            exit;
        }

?>