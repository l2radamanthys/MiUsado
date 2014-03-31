<h1>Todas las Publicaciones</h1>

<br />
<table class="simple-table">
    <tr>
        <th>Titulo Publicacion</th>
        <th>Estado</th>
        <th>Vencimiento</th>
        <th>Opciones</th>
    </tr>
    
    <?foreach ($autos as $auto):?>
    <tr>
        
        <td><?=$auto['titulo_autos'];?></td>
        <td style="text-align: center;">
            <?=humanize_status($auto['activa_autos']);?>
        </td>
        <td style="text-align: center;">
            <?=humanize_date($auto['venc_date_autos']);?>
        </td>
        <td style="text-align: center;">
            <a href="<?=base_url();?>autos/show/<?=$auto['id_autos'];?>/" title=""><img src="<?=base_url();?>media/images/search.png" alt="" /></a>&nbsp;
            <a href="<?=base_url();?>autos/share/<?=$auto['id_autos'];?>/" title=""><img src="<?=base_url();?>media/images/share.png" alt="" /></a>&nbsp;
            <a href="<?=base_url();?>autos/edit/<?=$auto['id_autos'];?>/" title=""><img src="<?=base_url();?>media/images/edit.png" alt="" /></a>&nbsp;
            <a href="<?=base_url();?>autos/delete/<?=$auto['id_autos'];?>/" title=""><img src="<?=base_url();?>media/images/trash.png" alt="" /></a>
        </td>
    </tr>
    <?endforeach;?>
</table>
