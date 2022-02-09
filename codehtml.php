<div class="content row ">
    <input type="hidden" name="incidente" id="incidente" value="15">
    <div class="col-12 container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../menu.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="FRMofrecimientos_a_aprobar.php">Lista Incidentes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ofrecimientos</li>
            </ol>
        </nav>
    </div>
    <div class="col-12 pb-3">
        <a href="javascript:void(0)" class="btn btn-social btn-just-icon btn-facebook botonmenuofreci" onclick="mostarpanel();" id="butopanel">
            <i class="fas fa-bars"></i>
        </a>
    </div>
    <?php echo ofrecimientoslist($incidentecod); ?>

    <div class="col-sm-12 col-md-8 col-lg-8  detaofreci" id="cuadofrecimi">
        <center>
            <br class="mt-5"><br class="mt-5"><br class="mt-2">
            <h1 class="mt-5"><i class="far fa-envelope"></i></h1>
            <p class="h3 font-weight-bold">Sin Ofrecimiento seleccionado</p>

        </center>
    </div>
</div>