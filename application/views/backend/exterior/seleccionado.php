<h1>Exterior</h1>
<br />

<table class="ctable" style="width: 600px; margin: 0 auto">
<?foreach($exterior as $ext):?>
    <tr>
        <td><?=$ext;?></td>
    </tr>
<?endforeach;?>
</table>

<br />
<a href="<?=base_url();?>autos/show/<?=$id_autos;?>/" title="">Continuar</a>
