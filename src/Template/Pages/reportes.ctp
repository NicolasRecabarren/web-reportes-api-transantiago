<?php
    # Clase que nos ayuda a crear URLs.
    use Cake\Routing\Router;
    $this->assign('title', 'Reportes');
?>
<style>
    .hide {
        display: none !important;
    }
</style>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Filtros</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-bus"></i></span>
                    </div>
                    <input type="number" name="nro_recorrido" class="form-control" placeholder="N° Recorrido">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group mb-3">
                    <select name="tipo_reporte" class="custom-select">
                        <option value="diario">Reporte diario</option>
                        <option value="semanal">Reporte semanal</option>
                        <option value="mensual">Reporte mensual</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="fecha" class="form-control" placeholder="Fecha monitorizada">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <select name="hora_desde" id="" style="min-height: 38px;">
                        <option value="">Hora desde</option>
                        <option value="0">00:00</option> <option value="1">01:00 </option> <option value="2">02:00 </option>
                        <option value="3">03:00</option> <option value="4">04:00 </option> <option value="5">05:00 </option>
                        <option value="6">06:00</option> <option value="7">07:00 </option> <option value="8">08:00 </option>
                        <option value="9">09:00</option> <option value="10">10:00</option> <option value="11">11:00</option>
                        <option value="12">12:00</option><option value="13">13:00</option> <option value="14">14:00</option>
                        <option value="15">15:00</option><option value="16">16:00</option> <option value="17">17:00</option>
                        <option value="18">18:00</option><option value="19">19:00</option> <option value="20">20:00</option>
                        <option value="21">21:00</option><option value="22">22:00</option> <option value="23">23:00</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <select name="hora_hasta" id="" style="min-height: 38px;">
                        <option value="">Hora hasta</option>
                        <option value="0">00:00</option> <option value="1">01:00 </option> <option value="2">02:00 </option>
                        <option value="3">03:00</option> <option value="4">04:00 </option> <option value="5">05:00 </option>
                        <option value="6">06:00</option> <option value="7">07:00 </option> <option value="8">08:00 </option>
                        <option value="9">09:00</option> <option value="10">10:00</option> <option value="11">11:00</option>
                        <option value="12">12:00</option><option value="13">13:00</option> <option value="14">14:00</option>
                        <option value="15">15:00</option><option value="16">16:00</option> <option value="17">17:00</option>
                        <option value="18">18:00</option><option value="19">19:00</option> <option value="20">20:00</option>
                        <option value="21">21:00</option><option value="22">22:00</option> <option value="23">23:00</option>
                    </select>
                </div>
            </div>
            <div class="col-dm-2">
                <button type="button" class="btn btn-success" id="BtnBuscar"> Buscar</button>
            </div>
        </div>
    <!-- /.card-body -->
    </div>
</div>
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Reporte</h3>
    </div>
    <div class="card-body">
        <div class="row" id="ResultadoReporte">

        </div>
    </div>
</div>

<?= $this->Html->script('/js/plugins/chart.js/Chart.min.js') ?>
<?= $this->Html->script('/js/plugins/inputmask/min/jquery.inputmask.bundle.min.js') ?>

<script type="text/javascript">
    $(document).ready(function(){
        var records = [];

        //$('input[name="fecha"]').inputmask('dd/mm/yyyy');

        $('body').on('click', '#BtnBuscar', function() {
            getMediciones();
        });

        $('body').on('change','select[name="tipo_reporte"]', function() {
            if( $(this).val() == "semanal" || $(this).val() == "mensual" ){
                $('select[name="hora_desde"]').val("").parents('.col-sm-2').addClass('hide');
                $('select[name="hora_hasta"]').val("").parents('.col-sm-2').addClass('hide');
            } else {
                $('select[name="hora_desde"]').parents('.col-sm-2').removeClass('hide');
                $('select[name="hora_hasta"]').parents('.col-sm-2').removeClass('hide');
            }
        });

        //getRecords();

        function getRecords(nroRecorrido, fechaDesde, fechaHasta){
            $.ajax({
                type: "GET",
                url : 'http://34.70.121.7:8080/',
                data: {},
                beforeSend: function() {

                },
                success: function(response) {
                    $.each(response, function(oName, oValue) {

                        if(nroRecorrido != null && oValue.recorrido == nroRecorrido){
                            records.push(oValue);
                        }

                    });
                },
                error: function() {

                }
            });
        }

        function getMediciones() {
            let error     = 0;
            let csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;

            let nroRecorrido = $('input[name="nro_recorrido"]').val();
            let tipoReporte  = $('select[name="tipo_reporte"]').val();
            let fecha        = $('input[name="fecha"]').val();
            let horaDesde    = $('select[name="hora_desde"]').val();
            let horaHasta    = $('select[name="hora_hasta"]').val();

            if(nroRecorrido == ""){
                if(!$('input[name="nro_recorrido"]').hasClass('is-invalid')){
                    $('input[name="nro_recorrido"]').addClass('is-invalid');
                }
                error++;
            } else {
                $('input[name="nro_recorrido"]').removeClass('is-invalid');
            }

            if( tipoReporte == "diario" && (fecha == "" || fecha.length == 0)){
                if(!$('input[name="fecha"]').hasClass('is-invalid')){
                    $('input[name="fecha"]').addClass('is-invalid');
                }
                error++;
            } else {
                $('input[name="fecha"]').removeClass('is-invalid');
            }


            if(error > 0)
                return false;

            $.ajax({
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                type: "POST",
                url : '<?= Router::url(['controller' => 'pages', 'action' => 'getMediciones'],true); ?>',
                data: {
                    nroRecorrido: nroRecorrido,
                    tipoReporte : tipoReporte,
                    fecha       : fecha,
                    horaDesde   : horaDesde,
                    horaHasta   : horaHasta
                },
                beforeSend: function() {

                },
                success: function(response) {
                    $('#ResultadoReporte').html(response);
                    /*$.each(response, function(oName, oValue) {

                        if(nroRecorrido != null && oValue.recorrido == nroRecorrido){
                            records.push(oValue);
                        }

                    });*/
                },
                error: function() {

                }
            });
        }
    });
</script>
