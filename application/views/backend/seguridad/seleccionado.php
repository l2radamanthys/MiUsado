<h1>Confort</h1>
<br />

<table class="ctable" style="width: 600px; margin: 0 auto">
<?foreach($seguridad as $seg):?>
    <tr>
        <td><?=$seg;?></td>
    </tr>
<?endforeach;?>
</table>

<br />
<a href="<?=base_url();?>autos/show/<?=$id_autos;?>/" title="">Continuar</a>
