<h1>Nueva Publicacion</h1>
<br />  
<h3>Especifique los componentes de Multimedia del Vehiculo</h3> 
<br />

<?=form_open('autos/seleccionar_multimedia/'.$id_autos);?>
<? foreach($multimedia as $row): ?>
    <input type="checkbox" name="mult_<?=$row['id_multimedia'];?>" value="1"/>
    <?=$row['nombre_multimedia'];?><br />
<? endforeach; ?>
<input type="hidden" name="q" value="1" />
<input type="hidden" name="n" value="<?=$new;?>" />


<br />
<input type="submit" class="grad-button-blue"/>
</form>
