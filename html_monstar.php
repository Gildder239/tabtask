<!--Ccodigo de como se cargan las funciones delos paneles-->

<?php


function ofrecimientoslist($incidente){
	$ClsOfr = new ClsOfrecimiento();
	$result = $ClsOfr->get_ofrecimiento('',$incidente,'',1);
	$salida = '';

	if(is_array($result)){
		$i=1;
		//$contCantidad = 0;
		$salida.='<div class="col-sm-12 col-md-4 col-lg-4 listofreci divofreci" id="divofreci">';
		foreach($result as $row){
			//datos
			$fecharegist = cambia_fechaHora($row["ofr_fecha_registro"]);
			$paisofrec = utf8_decode($row["pai_descripcion"]);			
			$descripcionofreci = utf8_decode($row["ofr_observaciones"]);

			$status = trim($row["ofr_situacion"]);

			switch ($status) {
				case 1: $status_descripcion = "Ofrecimiento Env&iacute;ado"; $disabled = ""; break;
				case 2: $status_descripcion = "Ofrecimiento Aprobado"; $disabled = "disabled"; break;
				case 3: $status_descripcion = "Ofrecimiento Afianzado"; $disabled = "disabled"; break;
				default: // code... break;
		   }

			$codigo = $row["ofr_codigo"];
			$incidentecodes = $row["ofr_incidente"];		
			//html
			
			$salida.='<a href="javascript:void(0)" class="targetofreci"  onclick="incideofrecimien('.$codigo.','.$incidentecodes.','.$i.');">';
			$salida.='<div class="row targetoactive bg-white">';
			
			$salida.='<div class="col-sm-12 col-md-1 col-lg-0 mt-2">';
			$salida.='<input class="form-check-input ml-2" type="checkbox" name="checkboxactiv" id="check'.$i.'" value="">';
			$salida.='</div>';
			$salida.='<div class="col-sm-11 col-md-11 col-lg-12">';
			$salida.='<p class="mt-2 ml-5 h5 text-primary text-left">'.$fecharegist.'</p>';
			$salida.='</div>';                  
			$salida.='<div class="col-12">';
			$salida.='<p class="ml-5 h5 font-weight-bold texact">'.$paisofrec.'</p>';
			$salida.='</div>';
			$salida.='<div class="col-12">';
			$salida.='<p class="ml-5 h6 text-dark texact">'.$status_descripcion.'</p>';
			$salida.='</div>';
			$salida.='<div class="col-12 mb-2">';
			$salida.='<p class="ml-5 h6 text-muted ">'.$descripcionofreci.'</p>';
			$salida.='</div>';                                			                 
			$salida.='</div>';
			$salida.='</a>';
			
			//--						
			$i++;			
		}		
		$salida.='</div>';
	}else{
		$salida.='<div class="col-sm-12 col-md-4 col-lg-4 bg-white listofreci divofreci" id="divofreci">';
		$salida.='<center>';
		$salida.='<br class="mt-5"><br class="mt-5"><br class="mt-2">';
		$salida.='<h1 class="mt-5"><i class="far fa-list-alt"></i></h1>';                        
		$salida.='<p class="h3 font-weight-bold">Sin Ofrecimientos</p>';
		$salida.='<button class="btn btn-white" onclick="window.history.back();">';
		$salida.='<span class="btn-label"><i class="fas fa-chevron-left"></i></span>';
		$salida.='<span class="text">&nbsp;&nbsp;&nbsp;Regresar</span>';
		$salida.='</button>';
		$salida.='</center>';
		$salida.='</div>';
	}

	return $salida;
}


function detallofreci($codigo,$incidente){
	$ClsOfr = new ClsOfrecimiento();
	$ClsInc = new ClsIncidente();
	$result = $ClsInc->get_incidente($incidente);
	$salida = '';
	
	if(is_array($result)){
		foreach($result as $row){
			$nombre = trim($row["inc_nombre"]);
			$pais = trim($row["pai_descripcion"]);
			$descripcion = trim($row["inc_descripcion"]);
			//--
			$url = trim($row["inc_documento"]);

			
			
		}
	}

	if($codigo != ""){
		$result = $ClsOfr->get_ofrecimiento($codigo,$incidente);
		if(is_array($result)){
			foreach($result as $row){
				$pais_oferta = trim($row["pai_descripcion"]);
				$observaciones = trim($row["ofr_observaciones"]);
                    $status = trim($row["ofr_situacion"]);
				//--
				$url_ofrecimiento = trim($row["ofr_documento_ofrecimiento"]);
				$url_aprobacion = trim($row["ofr_documento_aprobacion"]);
			}
		}
          switch ($status) {
               case 1: $status_descripcion = "Ofrecimiento Env&iacute;ado"; $disabled = ""; break;
               case 2: $status_descripcion = "Ofrecimiento Aprobado"; $disabled = "disabled"; break;
               case 3: $status_descripcion = "Ofrecimiento Afianzado"; $disabled = "disabled"; break;
               default: // code... break;
          }
		  
	}		
	//html	

	$salida.='<div class="row">';	
	$salida.='<div class="col-md-12">';	
	$salida.='<div class="card">';	
	$salida.='<div class="card-header card-header-primary card-header-icon">';	
	$salida.='<div class="card-icon">';	
	$salida.='<i class="fas fa-info-circle fa-2x " aria-hidden="true"></i>';	
	$salida.='</div>';	
	$salida.='<h4 class="card-title">Informaci&oacute;n del Llamamiento</h4>';	
	$salida.='</div>';	
	$salida.='<div class="card-body">';		
	$salida.='<div class="row">';	
	$salida.='<div class="col-md-12">';	
	$salida.='<label>Pa&iacute;s Asistido:</label>';	
	$salida.='<input type="text" class="form-control" value="'.$pais.'" readonly />';	
	$salida.='<input type="hidden" name="incidente" id="incidentecodes" value="'.$incidente.'" />';	
	$salida.='<input type="hidden" name="ofrecimiento" id="ofrecimiento" value="'.$codigo.'" />';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='<div class="row">';	
	$salida.='<div class="col-md-12">';	
	$salida.='<label>Nombre del Incidente:</label>';	
	$salida.='<input type="text" class="form-control" value="'.$nombre.'" readonly />';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='<div class="row">';	
	$salida.='<div class="col-md-12">';	
	$salida.='<label>Descripci&oacute;n:</label>';	
	$salida.='<textarea class="form-control" rows="5" readonly>'.$descripcion.'</textarea>';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='<div class="row">';	
	$salida.='<div class="col-md-6 text-center">';	
	$salida.='<br>';	
	$salida.='<a href="javascript:void(0)" onclick="verNecesidades('.$incidente.')">';	
	$salida.='<i class="fa fa-tasks fa-5x text-primary" aria-hidden="true"></i>';	
	$salida.='</a>';	
	$salida.='<br>';	
	$salida.='<label>Ver Necesidades</label>';	
	$salida.='</div>';	
	$salida.='<div class="col-md-6 text-center">';	
	$salida.='<br>';	
	$salida.='<a href="'.$url.'" target="_blank">';	
	$salida.='<i class="fa fa-file-pdf fa-5x text-primary" aria-hidden="true"></i>';	
	$salida.='</a>';	
	$salida.='<br>';	
	$salida.='<label>Documento de Declaratoria</label>';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='<br>';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='<div class="col-md-12">';	
	$salida.='<div class="card">';	
	$salida.='<div class="card-header card-header-primary card-header-icon">';	
	$salida.='<div class="card-icon">';	
	$salida.='<i class="fas fa-info-circle fa-2x " aria-hidden="true"></i>';	
	$salida.='</div>';	
	$salida.='<h4 class="card-title">Oferta de Asistencia Humanitaria</h4>';	
	$salida.='</div>';	
	$salida.='<div class="card-body">';		
	$salida.='<div class="row">';	
	$salida.='<div class="col-md-12">';	
	$salida.='<label>Pa&iacute;s Oferente:</label> <span class="text-danger">*</span>';	
	$salida.='<input type="text" class="form-control" value="'.$pais_oferta.'" readonly />';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='<div class="row">';	
	$salida.='<div class="col-md-12">';	
	$salida.='<label>Status del Ofrecimiento:</label>';	
	$salida.='<input type="text" class="form-control" value="'.$status_descripcion.'" readonly />';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='<div class="row">';	
	$salida.='<div class="col-md-12">';	
	$salida.='<label>Observaciones:</label>';	
	$salida.='<textarea class="form-control" rows="5" readonly>'.$observaciones.'</textarea>';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='<div class="row">';	
	$salida.='<div class="col-md-3 text-center">';	
	$salida.='<br>';	
	$salida.='<a href="'.$url_ofrecimiento.'" target="_blank">';	
	$salida.='<i class="fa fa-file-pdf fa-5x text-info" aria-hidden="true"></i>';	
	$salida.='</a>';	
	$salida.='<br>';	
	$salida.='<label>Documento de Ofrecimiento</label>';	
	$salida.='</div>';	
	$salida.='<div class="col-md-3 text-center">';	
	$salida.='<br>';	
	$salida.='<a href="'.$url_aprobacion.'" target="_blank">';	
	$salida.='<i class="fa fa-file-pdf fa-5x text-success" aria-hidden="true"></i>';	
	$salida.='</a>';	
	$salida.='<br>';	
	$salida.='<label>Documento de Aprobaci&oacute;n</label>';	
	$salida.='</div>';	
	$salida.='<div class="col-md-6 text-center">';	
	$salida.='<br><br>';	
	$salida.='<form name="f1" name="f1" method="post" enctype="multipart/form-data">';	
	$salida.='<button type="button" class="btn btn-primary btn-block" id="btn-cargar" onclick="DocumentoJs();"><i class="fas fa-file-pdf"></i> Seleccionar Archivo... </button>';	
	$salida.='<input id="documento" name="documento" type="file" multiple="false" class="hidden" onchange="comfirmAprobacionDocumento();">';	
	$salida.='</form>';	
	$salida.='<label>Carga de Documento de Aprobaci&oacute;n</label>';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='<div class="card">';	
	$salida.='<div class="card-header card-header-primary card-header-icon">';	
	$salida.='<div class="card-icon">';	
	$salida.='<i class="fas fa-tasks fa-2x " aria-hidden="true"></i>';	
	$salida.='</div>';	
	$salida.='<h4 class="card-title">Detalle del Ofrecimiento</h4>';	
	$salida.='</div>';	
	$salida.='<div class="card-body">';	
	$salida.='<div class="row">';	
	$salida.='<div class="col-md-6"></div>';	
	$salida.='<div class="col-md-6 text-right">';	
	$salida.='<button type="button" class="btn btn-primary" id="btn-notificar" onclick="aprobarOfrecimiento();" '.$disabled.'><i class="fas fa-check-double"></i> Aprobar ofrecimientos seleccionados</button>';	
	$salida.='</div>';	
	$salida.='</div>';	
	$salida.='<br>';	
	$salida.=''.tabla_ofrecimiento_detalle_aprobar($codigo, $incidente).'';	
	$salida.='</div>';	
	$salida.='</div>';	

	return $salida;
}


?>