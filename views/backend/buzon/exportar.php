<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$titulo.".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<meta charset="utf-8">
<?php if($tipo == 1):?>
  <table cellspacing="0" cellpadding="0">
    <tr>
      <th style="background:#000; color:#FFF;">ID</th>
      <th style="background:#000; color:#FFF;">Nombres</th>
      <th style="background:#000; color:#FFF;">Teléfono</th>
      <th style="background:#000; color:#FFF;">Email</th>
      <th style="background:#000; color:#FFF;">Mensaje</th>
      <th style="background:#000; color:#FFF;">Fecha</th>
    </tr>

  <?php
  foreach($listas as $lista):
  ?>
    <tr>
      <td><?php echo $lista->id;?></td>
      <td><?php echo $lista->nombres;?></td>
      <td><?php echo $lista->telefono;?></td>
      <td><?php echo $lista->email;?></td>
      <td><?php echo $lista->mensaje;?></td>
      <td><?php echo $lista->fecha;?></td>
    </tr>
  <?php
  endforeach;
  ?>
  </table>
<?php else:?>
  <table cellspacing="0" cellpadding="0">
    <tr>
      <th style="background:#000; color:#FFF;">ID</th>
      <th style="background:#000; color:#FFF;">Nombres</th>
      <th style="background:#000; color:#FFF;">Email</th>
      <th style="background:#000; color:#FFF;">Teléfono</th>
      <th style="background:#000; color:#FFF;">Ciudad</th>
      <th style="background:#000; color:#FFF;">Mensaje</th>
      <th style="background:#000; color:#FFF;">Fecha</th>
    </tr>

  <?php
  foreach($listas as $lista):
  ?>
    <tr>
      <td><?php echo $lista->id;?></td>
      <td><?php echo $lista->nombres;?></td>
      <td><?php echo $lista->email;?></td>
      <td><?php echo $lista->telefono;?></td>
      <td><?php echo $lista->ciudad;?></td>
      <td><?php echo $lista->mensaje;?></td>
      <td><?php echo $lista->fecha;?></td>
    </tr>
  <?php
  endforeach;
  ?>
<?php endif;?>