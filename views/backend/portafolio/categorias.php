<style type="text/css">
.inicio > a {
    color: #fff !important;
    background-color: #36a3ff !important;
}
</style>
<div id="cl-wrapper" class="fixed-menu">
  <?php $this->load->view('backend/layout/sidebar'); ?>
  <div class="container-fluid" id="pcont">    
    <div class="page-head">
      <h2>PRODUCTOS</h2>
      <ol class="breadcrumb">
          <li><a href="backend/Backend/index">Inicio</a></li>
          <li class="active">Categorías</li>
      </ol>
    </div>         
      <div class="cl-mcont">    
      <div class="row">
        <div class="col-md-12">
          <div class="block-flat">
            <div class="header"><h3>Lista de Categorías</h3>
            </div>
            <div class="content">  
              <div class="table-responsive">
             
                <div class="pull-right">
                  <input type="hidden" value="" id="seleccionados">
                  <div style="margin-top:20px; margin-right:20px;" id="datatable2_filter" class="dataTables_filter"> 
                    <!-- <a onclick="exportar();" class="btn btn-danger"><i class="fa fa-download"></i> Exportar</a> -->
                     <a onclick="eliminar_seleccionados();" type="button" class="btn btn-danger"><i class="fa fa-minus-square-o"></i> Borrar Seleccionados</a>  
                    <a class="btn btn-success" href="backend/Productos/agregar_categoria"><i class="fa fa-plus-square"></i> Agregar</a>
                  </div>
                </div>
                
                <div style="margin-right:5px;" class="pull-left">
                  <div class="dataTables_length" id="datatable-icons_length">
                    <label>Estado :
                    <select aria-controls="datatable-icons" size="1" id="estado" class="form-control" name="datatable-icons_length">
                    <option selected="selected" value="-1">Todos</option>
                    <option value="1">Disponible</option>
                    <option value="0">No Disponible</option>
                  </select></label></div>
                </div>
                <div style="margin-right:5px;" class="pull-left">
                  <div class="dataTables_length" id="datatable-icons_length">
                    <label>Nombre :
                    <input type="text" name="texto" id="texto" class="form-control" placeholder="">
                   </label></div>
                </div>
                 <div class="pull-left">
                  <div style="margin-top:20px;" class="dataTables_length" id="datatable-icons_length">
                    <a onclick="buscar();" type="button" class="btn btn-default"><i class="fa fa-search"></i> Buscar</a></div>
                </div>
                <div class="clearfix"></div>
              </div>
               
              <table id="list4" class="table-bordered"></table>
              <div id="pager2"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>
<script type="text/javascript">
var tabla = '<?php echo $tabla;?>';
var categoria = '<?php echo $categoria_;?>';
        $(document).ready(function (){                 
            jQuery("#list4").jqGrid({
            url: "<?php echo site_url('backend/ServerActions/executeIndex?q=2');?>",
            datatype: "json",
            colNames:['Id','Nombre', 'Fecha','Edición'],       //Grid column headings
                colModel:[
                    {name:'id',index:'id', width:10, align:"center"},
                    {name:'Nombre',index:'nombre', width:200, align:"left"},
                    {name:'Fecha',index:'fecha', width:100, align:"center",search:false},
                    {name:'edicion',index:'edicion', width:50, align:"left",search:false}
                ],
            rowNum:10,
            rowList:[10,20,30,40,60,60,70,80,90,100,200,500,1000,2000,5000,10000],
            page: 1,
            pager: jQuery('#pager2'),
            sortname: 'orden',
            viewrecords: true,
            multiselect: true,
            sortorder: "ASC",
            height: 450,
            "autowidth":true,
            onSelectRow: function (rowId, status, e) {
                if (!e || e.which === 1) {
                  var selectedrows = $("#list4").jqGrid('getGridParam','selarrrow');
                        $("#seleccionados").val(selectedrows);
            }},
            onSelectAll: function(aRowids,status) {
                    if (status == true) {
                    $("#seleccionados").val(aRowids);
                }else{
                $("#seleccionados").val('');
                }
            }
            }).navGrid('#pager2',{edit:false,add:false,del:false});
            nuevoAncho("list4");
              /* Orden */
            $("#list4").jqGrid('sortableRows', {
                    update: function (ev, ui) {
                      var ids = $("#list4").jqGrid('getDataIDs'); 
                          for(var i=0;i < ids.length;i++){ 
                            var data=$("#list4").getRowData(ids[i]);
                            $.post('<?php echo site_url("backend/ServerActions/orden/");?>', { id: data.id, order:i+1, tabla:tabla},  function(data) {}, "json");
                          }
                    }
            });            
          
          <?php if($this->session->flashdata('aceptado')){ ?>
          $.gritter.add({
            position: 'bottom-right',
            title: 'Correcto',
            text: 'Datos guardados correctamente.',
            image: 'web/backend/images/guardado_icono.png',
            class_name: 'clean',
            time: '9000'
          });
          return false;
         <?php } ?>
   });
 function eliminar(idproducto){
    var mensaje = "Seguro de Borrar este Registro?";
    if (confirm(mensaje))
      $.post('<?php echo site_url("backend/ServerActions/borrar/");?>', { id: idproducto, tabla: tabla}, mensajeDelete, "json");  
  }
  function mensajeDelete(res){
    alert('Se elimin'+String.fromCharCode(243)+' satisfactoriamente el Registro');
      $("#list4").trigger("reloadGrid");
  }
  function cambiar(id,estado){
    var mensaje = String.fromCharCode(191)+"Est"+String.fromCharCode(225)+" seguro que desea cambiar el estado ?";
   if (confirm(mensaje))
       $.post('<?php echo site_url("backend/ServerActions/estado/");?>', { id: id, estado:estado, tabla: tabla}, mensajeCambio, "json");  
  }
  
  function eliminar_seleccionados(){
  var mensaje = String.fromCharCode(191)+"Est"+String.fromCharCode(225)+" seguro de borrar los datos seleccionados ?";
  if (confirm(mensaje))
    $.post('<?php echo site_url("backend/ServerActions/borrar_seleccionados/");?>', { id: $('#seleccionados').val(), tabla : tabla}, mensajeCambio, "json");
  }
  function mensajeCambio(res){
    alert('Se actualiz'+String.fromCharCode(243)+' satisfactoriamente.');
     $("#list4").trigger("reloadGrid");
  }
  function buscar(){
    var estado = $('#estado').val();
    var parametro1 = '<?php echo $busqueda;?>';
    var parametro2 = $('#texto').val();
    $("#list4").jqGrid('setGridParam',{url:"<?php echo site_url('backend/ServerActions/executeIndex?q=2&buscar_=true');?>&parametro1="+parametro1+"&parametro2="+parametro2+"&estado="+estado, datatype:"json", page:1}).trigger("reloadGrid");
    }   
</script>
