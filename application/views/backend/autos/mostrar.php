<script type="text/javascript">
    $(function() {
        $( "#tabs" ).tabs();
    });
</script>

<h1>Detalle Publicacion Vehiculo</h1>
<br />

<h3>Titulo de la Publicacion</h3>  
<p><?=$auto['titulo_autos'];?></p>
<br />
<h3>Descripcion</h3>  
<p><?=$auto['descripcion_autos'];?></p>

<br />  

<div id="tabs">
    <ul>
        <li><a href="#tabs-1" title="">Informacion Tecnica</a></li>
        <li><a href="#tabs-2" title="">Confort</a></li>
        <li><a href="#tabs-3" title="">Seguridad</a></li>
        <li><a href="#tabs-4" title="">Multimedia</a></li>
        <li><a href="#tabs-5" title="">Exterior</a></li>
    </ul>

    <div id="tabs-1">
        <table class="ctable" style="width: 600px; margin: 0 auto;">
            <tr>
                <td style="width: 200px;">Marca:</td>
                <td><?=$auto['nombre_marcas'];?></td>
            </tr>
            <tr>
                <td>Modelo:</td>
                <td><?=$auto['nombre_modelos'];?></td>
            </tr>
            <tr>
                <td>Version:</td>
                <td><?=$auto['version_autos'];?></td>
            </tr>
            <tr>
                <td>Segmento:</td>
                <td><?=$auto['segmento_autos'];?></td>
            </tr>
            <tr>
                <td>Puertas:</td>
                <td><?=$auto['puertas_autos'];?></td>
            </tr>
            <tr>
                <td>Kilometros:</td>
                <td><?=$auto['km_autos'];?></td>
            </tr>
            <tr>
                <td>Año:</td>
                <td><?=$auto['year_autos'];?></td>
            </tr>
            <tr>
                <td>Tipo de Combustible:</td>
                <td><?=$auto['fuel_autos'];?></td>
            </tr>
            <tr>
                <td>Direccion:</td>
                <td><?=$auto['direccion_autos'];?></td>
            </tr>
            <tr>
                <td>Motor CV:</td>
                <td><?=$auto['motor_cv_autos'];?> cv</td>
            </tr>
            <tr>
                <td>Motor Cilindrada:</td>
                <td><?=$auto['motor_cilindrada_autos'];?></td>
            </tr>                  
        </table>    
    </div>

    <div id="tabs-2">
        <table class="ctable" style="width: 600px; margin: 0 auto;">
            <?foreach($confort as $conf):?>
                <tr>
                    <td><?=$conf['nombre_confort'];?></td>
                </tr>
            <?endforeach;?>
            <?if(count($confort) == 0):?>
                <tr><td>No Se Especificaron caracteristicas de Confort</td></tr>
            <?endif;?>
        </table>
        
        <br />
        <div style="text-align: right;">                    
            <a href="<?=base_url();?>autos/seleccionar_confort/<?=$auto['id_autos'];?>/" class="grad-button-blue">Modificar</a>
        </div>
    </div>

    <div id="tabs-3">
        <table class="ctable" style="width: 600px; margin: 0 auto;">
            <?foreach($seguridad as $seg):?>
                <tr>
                    <td><?=$seg['nombre_seguridad'];?></td>
                </tr>
            <?endforeach;?>
            <?if(count($seguridad) == 0):?>
                <tr><td>No Se Especificaron caracteristicas de Seguridad</td></tr>
            <?endif;?>
        </table>
        
        <br />
        <div style="text-align: right;">                    
            <a href="<?=base_url();?>autos/seleccionar_seguridad/<?=$auto['id_autos'];?>/" class="grad-button-blue">Modificar</a>
        </div>
    </div>

    <div id="tabs-4">
        <table class="ctable" style="width: 600px; margin: 0 auto;">
            <?foreach($multimedia as $mult):?>
                <tr>
                    <td><?=$mult['nombre_multimedia'];?></td>
                </tr>
            <?endforeach;?>
            <?if(count($multimedia) == 0):?>
                <tr><td>No Se Especificaron caracteristicas de Multimedia</td></tr>
            <?endif;?>
        </table>
        
        <br />
        <div style="text-align: right;">                    
            <a href="<?=base_url();?>autos/seleccionar_multimedia/<?=$auto['id_autos'];?>/" class="grad-button-blue">Modificar</a>
        </div>
    </div>

    <div id="tabs-5">
        <table class="ctable" style="width: 600px; margin: 0 auto;">
            <?foreach($exterior as $ext):?>
                <tr>
                    <td><?=$ext['nombre_exterior'];?></td>
                </tr>
            <?endforeach;?>
            <?if(count($exterior) == 0):?>
                <tr><td>No Se Especificaron caracteristicas de Exterior</td></tr>
            <?endif;?>
        </table>
        
        <br />
        <div style="text-align: right;">                    
            <a href="<?=base_url();?>autos/seleccionar_exterior/<?=$auto['id_autos'];?>/" class="grad-button-blue">Modificar</a>
        </div>
    </div>            
</div>
