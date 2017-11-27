<div id="cl-wrapper" class="fixed-menu">
  <?php $this->load->view('backend/layout/sidebar'); ?>
  <div class="container-fluid" id="pcont">    
    <div class="page-head">
      <h2><?php echo $this->session->userdata('titulo_cabecera');?></h2>
    </div>         
    <div class="cl-mcont">    
      <div class="row">
        <div class="col-md-12">
          <div class="block-flat">
            <div class="header">              
              <h3>Lista de Atención al Cliente</h3>
            </div>
            <div class="content">
              <div class="table-responsive">
             
                <div class="pull-right">
                  <input type="hidden" value="" id="seleccionados">
                  <a onclick="eliminar_seleccionados();" type="button" class="btn btn-danger"><i class="fa fa-minus-square-o"></i> Borrar Seleccionados</a>  
                    <a href="javascript:;" onclick="exportar();" class="btn btn-success"><i class="fa  fa-cloud-download"></i> Exportar</a>
                </div>
                
                <div style="margin-right:5px;" class="pull-left">
                  <div class="dataTables_length" id="datatable-icons_length">
                    <label>
                    <input type="text" name="texto" id="texto" class="form-control" placeholder="Nombre">
                   </label></div>
                </div>
                 <div class="pull-left">
                  <div class="dataTables_length" id="datatable-icons_length">
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
var tabla                      = '<?php echo $tabla;?>';
var url_eliminar               = '<?php echo $url_eliminar;?>';
var url_eliminar_seleccionados = '<?php echo $url_eliminar_seleccionados;?>';
var url_cambiar_estado         = '<?php echo $url_cambiar_estado;?>';

$(document).ready(function (){
  jQuery("#list4").jqGrid({
  url:'<?php echo base_url("backend/ServerActions/executeIndex?q=".$server_action);?>',
  datatype: "json",
  colNames:['Id','Nombre','Email','Fecha','Edición'],
  colModel:[
      {name:'id',index:'id', width:20, align:"center" },
      {name:'Slider',index:'slider', width:180, align:"center" },
      {name:'Slider',index:'slider', width:200, align:"center" },
      {name:'fecha',index:'fecha', width:90, align:"center" },
      {name:'edicion',index:'edicion', width:50, align:"left" }
  ],
  rowNum:10,
  rowList:[10,20,30,40,60,60,70,80,90,100,200,500,1000,2000,5000,10000],
  page: 1,
  pager: jQuery('#pager2'),
  sortname: 'fecha',
  viewrecords: true,
  multiselect: true,
  sortorder: "Desc",
  height: 450,
  onSelectRow: function (rowId, status, e) {
      if (!e || e.which === 1) {
        var selectedrows = $("#list4").jqGrid('getGridParam','selarrrow');
        $("#seleccionados").val(selectedrows);
      }
  },
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
});
function exportar(){
  var action = String.format("<?php echo site_url('backend/Buzon/exportar/matriculas/2/buzon_matricula?q=');?>{0}",$('#seleccionados').val());
  window.open(action);
}


function buscar(){
  var estado = '-1';
  var parametro1 = 'nombre';
  var parametro2 = $('#texto').val();
  $("#list4").jqGrid('setGridParam',{url:"<?php echo base_url('backend/ServerActions/executeIndex?q='.$server_action);?>&buscar_=true');?>&parametro1="+parametro1+"&parametro2="+parametro2+"&estado="+estado, datatype:"json", page:1}).trigger("reloadGrid");
}   
</script>