<h1>Nueva Marca</h1>

<div class="forms">
<?=form_open("marcas/registrar")?>

<p>
<label>Nombre de la Marca:</label>
<input type="text" name="nombre_marcas" value="<?=set_value('nombre_marcas')?>"/>
<?=form_error('nombre_marcas');?>
</p>

<p>
<input type="submit" value="Registrar" class="grad-button-blue" />
</p>

</form>
</div>

<br /><br /> 

<table class="simple-table">
    <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Opciones</th>  
    </tr>

    <?foreach($marcas as $row):?>
    <tr>
        <td style="text-align:center;"><?=$row['id_marcas'];?></td>
        <td><?=$row['nombre_marcas'];?></td>
        <td style="text-align:center;">
            <a href="" title="">Quitar</a>
            <a href="" title="">Modificar</a>
            <a href="" title="">Modelos</a>
        </td>
    </tr>
    <? endforeach; ?>
    
</table>
