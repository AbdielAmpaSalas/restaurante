<?php
require_once '../config/database.php';

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-4">
        <!-- Navegación -->
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../index.php">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    Pedidos
                </li>
            </ol>
        </nav>

        <!-- Encabezado y botón nuevo -->
         <div class="row mb-3">
            <div class="col">
                <h1>Gestión de Pedidos</h1>
            </div>
            <div class="col text-end">
                <a href="nuevo.php">
                    Nuevo pedido
                </a>
            </div>
        </div>
              
        <!-- Tabla de Pedidos -->
         <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Id Pedido</th>
                                <th>Cliente</th>
                                <th>Fecha y Hora</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Pago</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($pedidos)): ?>
                                <tr>
                                    <td> No se encontraron pedidos</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach($pedidos as $pedido): ?>
                                    <tr>
                                        <td>
                                            <?php echo $pedido->_id; ?>
                                        </td>
                                        <td>
                                            <?php echo $pedido->cliente; ?>
                                        </td>
                                        <td>
                                            <?php
                                                $fecha = new DateTime($pedido->fecha.' '.$pedido->hora);
                                                echo $fecha->format('d/m/Y H:i'); 
                                            ?>                                        
                                        </td>
                                        <td>
                                            <?php echo $pedido->total; ?> 
                                        </td>
                                        <td>
                                            <?php echo $pedido->estado; ?> 
                                        </td>
                                        <td>
                                            <?php echo $pedido->estado_pago; ?> 
                                        </td>
                                        <td>
                                            <!--Botón Ver -->
                                            <a href="ver.php?<?php echo $pedido->_id; ?>">
                                                Ver
                                            </a>
                                            <!--Botón Editar -->
                                            <a href="ver.php?<?php echo $pedido->_id; ?>">
                                                Editar
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
         </div>
    </div>
</body>
</html>