<?php
    $this->assign('title', 'Dashboard');
?>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $cantTomadas ?></h3>

                <p>Fotos procesadas</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>+<?=$cantBuses;?></h3>

                <p>Buses monitoreados</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->css('/js/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>

<?= $this->Html->script('/js/plugins/datatables/jquery.dataTables.js') ?>
<?= $this->Html->script('/js/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Mediciones realizadas</h3>
    </div>
    <div class="card-body">
        <table id="TablaMediciones" class="table table-bordered table-striped dataTable" role="grid">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Recorrido</th>
                    <th>Matrícula Bus</th>
                    <th>Fecha</th>
                    <th>Cantidad de Personas</th>
                    <th>Longitud</th>
                    <th>Latitud</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                <?php foreach($mediciones as $key => $medicion): ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= isset($medicion['recorrido'])     ? $medicion['recorrido']     : '-' ?></td>
                        <td><?= isset($medicion['patente'])       ? $medicion['patente']       : '-' ?></td>
                        <td><?= isset($medicion['fecha'])         ? $medicion['fecha']         : '-' ?></td>
                        <td><?= isset($medicion['cant_personas']) ? $medicion['cant_personas'] : '-' ?></td>
                        <td><?= isset($medicion['coord_lon'])     ? $medicion['coord_lon']     : '-' ?></td>
                        <td><?= isset($medicion['coord_lat'])     ? $medicion['coord_lat']     : '-' ?></td>
                    </tr>
                    <?php $count++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.dataTable').DataTable({
            "paging": true,
            "order": [[0,"desc"]],
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            }
        });
    });
</script>
