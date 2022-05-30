<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">El informe fue validado con exito!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-sm-6">
                    <strong>No. Informe:</strong><br>
                    <strong>Nombre del Item:</strong><br>
                    <strong>Marca:</strong><br>
                    <strong>Modelo:</strong><br>
                    <strong>Fecha de emisión:</strong><br>
                    <strong>Fecha de vigencia:</strong><br>
                    <strong>Norma:</strong><br>
                    <strong>Ing. laboratorista:</strong><br>
                    <strong>Supervisor:</strong><br>
                    <strong>Vigencia:</strong><br>
                    <strong>Estatus:</strong><br>
                    
                </div>
                <div class="col-sm-6">
                    <?php echo $roowfila['numinforme']; ?><br>
                    <?php echo $roowfila['nombien']; ?><br>
                    <?php echo $roowfila['marca']; ?><br>
                    <?php echo $roowfila['modelo']; ?><br>
                    <?php echo $roowfila['fecha_emision']; ?><br>
                <?php
                            $fechavacia = "";
                            $fechamasdias = $roowfila['fecha_emision'];
                            if ($roowfila['fecha_emision'] == "") {
                                echo $fechavacia;
                            } else {
                                $fechamasdias = $roowfila['fecha_emision'];
                                $fechavigencia = date("Y-m-d", strtotime($fechamasdias . "+ 90 days"));
                                echo $fechavigencia;
                            }
                            ?><br>
                    <?php echo $roowfila['nombnom']; ?><br>
                    <?php echo $roowfila['nombre'] . " " . $roowfila['apellidos']; ?><br>
                    <?php echo $roowfila['nombre_sup'] . " " . $roowfila['apellidos_sup']; ?><br>
                <?php
                            if ($roowfila['fecha_emision'] == "") {
                                echo $fechavacia;
                            } else {
                                echo "90 Dias";
                            }
                            ?><br>
                    
                <?php
                            if ($roowfila['fecha_emision'] == "") {
                                echo $fechavacia;
                            } else {
                                $fechaemision = new DateTime($fechamasdias);
                                $fechaactual = new DateTime(date("Y-m-d"));
                                $fechaestatus = $fechaemision->diff($fechaactual);
                                /*echo $fechaestatus->days . ' dias';*/
                                $fechaa = $fechaestatus->days;
                                if ($fechaa > 90) {
                                    echo '<span class="estatus-vencido" style="font-size:14px">VENCIDO</span>';
                                } else {
                                    echo '<span class="estatus-vigente" style="font-size:14px">VIGENTE</span>';
                                }
                            }
                            ?><br>
                    </div>
                <!-- <strong class="alert-warning">Detalles:</strong><br> -->
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Ok</button>
            </div>
        </div>
    </div>
</div>