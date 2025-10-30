<?php
//Función para debugueo
function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}


//Funciones de lógica de negocio

function getSubtotal($arrayProductos){
    $subtotal = 0;
    foreach($arrayProductos as $producto){
        if(isset($producto['cantidad'])){
            $subtotal+=$producto['cantidad']*$producto['precio'];
        }
    }
    return $subtotal;
}

function completarConCantidades(&$productosTienda, $cantidades){
    foreach($productosTienda as $clave => $producto){
        if( in_array($producto['id'], array_keys($cantidades))){
            $productosTienda[$clave]['cantidad'] = $cantidades[$clave];
        }
    }
}

function getCantidadesCarrito(){
    $cantidades =array();
    $row = 1;
    if (($handle = fopen("./data/shopping-cart.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if($row != 1){
                $cantidades[$data[0]] = $data[1];
            }            
            $row++;
        }
        fclose($handle);
        return $cantidades;
    }else{
        //TODO: Lanzar excepción o mostrar error.
    }

}

//Funciones lógica presnetación

function getSubtotalMarkup($subtotal){
    return '$ '.$subtotal;
}

function getProductosMarkup($listaProductos){
    $output = '<div class="items">';
    foreach($listaProductos as $producto){
        $output.=getProductoMarkup($producto);
    }
    $output .= '</div>';
    return $output;
}

function getProductoMarkup($producto){
    $nombre = $producto['nombre']??'No disponible';
    $tamano = $producto['tamano']??'No disponible';
    $ram = $producto['ram']??'No disponible';
    $memoria = $producto['memoria']??'No disponible';
    $precio = $producto['precio']??'No disponible';
    $cantidad = trim($producto['cantidad']??'0');
    $output = '<div class="product">
				 					<div class="row">
					 					<div class="col-md-3">
					 						<img class="img-fluid mx-auto d-block image" src="'.$producto['imagen_url'].'">
					 					</div>
					 					<div class="col-md-8">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-5 product-name">
							 							<div class="product-name">
								 							<a href="#">'.$nombre.'</a>
								 							<div class="product-info">
									 							<div>Display: <span class="value">'.$tamano.'</span></div>
									 							<div>RAM: <span class="value">'.$ram.'</span></div>
									 							<div>Memory: <span class="value">'.$memoria.'</span></div>
									 						</div>
									 					</div>
							 						</div>
							 						<div class="col-md-4 quantity">
							 							<label for="quantity">Quantity:</label>
							 							<input id="quantity" type="number" value ="'.$cantidad.'" class="form-control quantity-input">
							 						</div>
							 						<div class="col-md-3 price">
							 							<span>$'.$precio.'</span>
							 						</div>
							 					</div>
							 				</div>
					 					</div>
					 				</div>
				 				</div>';
    return $output;
}

?>