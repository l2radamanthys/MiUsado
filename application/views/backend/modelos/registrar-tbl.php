<br />  
<br />  

<table class="simple-table" style="width:400px; margin: 0 auto;">
<tr>
    <th>ID</th>
    <th>MODELO</th>
</tr>
<? foreach($modelos as $modelo): ?>
    <tr>
        <td><?=$modelo['id_modelos'];?></td>
        <td><?=$modelo['nombre_modelos'];?></td>
    </tr>
<? endforeach; ?>
</table>
