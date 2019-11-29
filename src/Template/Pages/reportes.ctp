<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Filtros</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <!--<div class="col-sm-2">
                <div class="form-group mb-3">
                    <select name="tipo_reporte" class="custom-select">
                        <option value="diario">Reporte diario</option>
                        <option value="semanal">Reporte semanal</option>
                        <option value="mensual">Reporte mensual</option>
                    </select>
                </div>
            </div>-->
            <div class="col-sm-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-bus"></i></span>
                    </div>
                    <input type="number" name="nro_recorrido" class="form-control" placeholder="N° Recorrido">
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
                    <input type="text" name="hora_desde" class="form-control" placeholder="Hora desde">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="hora_hasta" class="form-control" placeholder="Hora hasta">
                </div>
            </div>
            <div class="col-dm-2">
                <button type="button" class="btn btn-success" id="BtnBuscar"> Buscar</button>
            </div>
        </div>
    <!-- /.card-body -->
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var records = [];

        $('body').on('click', '#BtnBuscar', function() {
            let nroRecorrido = $('input[name="nro_recorrido"]').val();
            let fechaDesde   = $('input[name="fecha_desde"]').val();
            let fechaHasta   = $('input[name="fecha_hasta"]').val();

            if(nroRecorrido == ""){
                if(!$('input[name="nro_recorrido"]').hasClass('is-invalid')){
                    $('input[name="nro_recorrido"]').addClass('is-invalid');
                }
                return false;
            }

            getRecords(nroRecorrido, fechaDesde, fechaHasta);
        });

        getRecords();

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
    });
</script>
