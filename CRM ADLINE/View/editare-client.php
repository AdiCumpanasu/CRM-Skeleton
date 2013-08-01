<?php 
include 'header.php';
include 'navbar.php';
include 'sidebar.php';
include 'stats.php';
?>
 <style>
.widget-title, .modal-header, .table th, div.dataTables_wrapper .ui-widget-header, .ui-dialog .ui-dialog-titlebar {
	background-color: #efefef;
	background-image: -webkit-gradient(linear, 0 0%, 0 100%, from(#fdfdfd), to(#eaeaea));
	background-image: -webkit-linear-gradient(top, #fdfdfd 0%, #eaeaea 100%);
    background-image: -moz-linear-gradient(top, #fdfdfd 0%, #eaeaea 100%);
    background-image: -ms-linear-gradient(top, #fdfdfd 0%, #eaeaea 100%);
    background-image: -o-linear-gradient(top, #fdfdfd 0%, #eaeaea 100%);
    background-image: -linear-gradient(top, #fdfdfd 0%, #eaeaea 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fdfdfd', endColorstr='#eaeaea',GradientType=0 ); /* IE6-9 */
    border-bottom: 1px solid #CDCDCD;
    height: 36px;
}
</style>
   
    <script type="text/JavaScript" src="./lib/genericJS/framework.js"></script> 
	<script src="../lib/js/jquery.js"></script> 
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/adline.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
    
    
    <script src="../lib/js/excanvas.min.js"></script>
	<script src="../lib/js/jquery.min.js"></script>
	<script src="../lib/js/jquery.flot.min.js"></script>
	<script src="../lib/js/jquery.flot.resize.min.js"></script>
	<script src="../lib/js/jquery.peity.min.js"></script>
	<script src="../lib/underscore/underscore-min.js"></script>
	<script src="../lib/jquery/jquery-1.8.3.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="../lib/js/unicorn.js"></script>
	<script src="../lib/select2-3.4.1/select2.js"></script>
	<script src="../lib/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
	<script src="../lib/DataTables-1.9.4/extras/TableTools/media/js/TableTools.js"></script>
	<script src="../lib/DataTables-1.9.4/extras/TableTools/media/js/ZeroClipboard.js"></script>
	<script src="../lib/jquery.address-1.5/jquery.address-1.5.min.js"></script>
	<script src="../lib/node-uuid/uuid.js"></script>
    
    
    
    
	<script src="lib/genericJS/table.js"></script>
	<script src="lib/genericJS/modal.js"></script>
    
    <div id='tableHolder'></div>
<script>
var entityId = getPostValueByName('id');
if (!entityId) entityId = -1;

var dataForFramework={ entityName : "Firma", entityId: entityId };
var framework = new Framework(dataForFramework);

var initTableConfig = 
	{
		"getDataFn": framework.readData, 
		"isReadOnly": true,
		"label": "Agenti",
		"mappings": [{ "alias": "id", "caption": "id", "field": "id"}],
		"serverSide": true,
		"type": "Table"
	}
var selectionTable = new Table(initTableConfig);
selectionTable.init();
var tableHolder = $('#tableHolder');
//tableHolder.append(selectionTable.$element);


// Declare data structure for save

var dateDeTrimis = { 
                    "user" : { 
                                "ID" : 22, 
                                "token": "hY3j"
                             }, 
                    "data" : {
                                "id" : null, 
                                //cod_fiscal
                             }
                   };  // An ID = -1 will force an insert, otherwise it is update

// Perform save data
                   

</script>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button id="saveDataBtn" class="btn btn-primary" value="" ><i class="icon-save"></i> Salveaza</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
<table id='inputDataTable' border=0>
    <form>
	<tr>
        <td><label class="stanga" for="nume">Nume firma</label></td>
        <td colspan=3><input type="text" value="MCA PRESS SRL"  id="nume" class="input-xxlarge uppercase myRequired"></td>
	</tr>
	<tr class="culoareStatbar">
        <td style="><label class="stanga" for="cod_fiscal">Cod fiscal</label></td>
        <td style="width: 260px;"><input type="text" value="RO0336675"  id="cod_fiscal" class="input-xlarge uppercase"></td>

        <td><label class="stanga" for="nr_reg_comert">Nr. Reg. Comert</label></td>
        <td><input type="text" value="J16/354/2012"  id="nr_reg_comert" class="input-xlarge uppercase"></td>
	</tr>
    
    <tr>
        <td><label class="stanga" for="tara">Tara</label></td>
        <td colspan=3><input type="text" value="Romania"  id="tara" class="input-xlarge capitalize"></td>
	</tr>
    
    		<tr>
        <td><label class="stanga" for="judet">Judet</label></td>
        <td><select name="judet" id="judet">
	<option bakvalue="Alba">Alba</option>
	<option bakvalue="AG">Arges</option>
	<option bakvalue="AR">Arad</option>
	<option bakvalue="B" >Bucuresti</option>
	<option bakvalue="BC">Bacau</option>
	<option bakvalue="BH">Bihor</option>
	<option bakvalue="BN">Bistrita</option>
	<option bakvalue="BR">Braila</option>
	<option bakvalue="BT">Botosani</option>
	<option bakvalue="BV">Brasov</option>
	<option bakvalue="BZ">Buzau</option>
	<option bakvalue="CJ">Cluj</option>
	<option bakvalue="CL">Calarasi</option>
	<option bakvalue="CS">Caras-Severin</option>
	<option bakvalue="CT">Constanta</option>
	<option bakvalue="CV">Covasna</option>
	<option bakvalue="DB">Dambovita</option>
	<option bakvalue="DJ">Dolj</option>
	<option bakvalue="GJ">Gorj</option>
	<option bakvalue="GL">Galati</option>
	<option bakvalue="GR">Giurgiu</option>
	<option bakvalue="HD">Hunedoara</option>
	<option bakvalue="HG">Harghita</option>
	<option bakvalue="IF">Ilfov</option>
	<option bakvalue="IL">Ialomita</option>
	<option bakvalue="IS">Iasi</option>
	<option bakvalue="MH">Mehedinti</option>
	<option bakvalue="MM">Maramures</option>
	<option bakvalue="MS">Mures</option>
	<option bakvalue="NT">Neamt</option>
	<option bakvalue="OT">Olt</option>
	<option bakvalue="PH">Prahova</option>
	<option bakvalue="SB">Sibiu</option>
	<option bakvalue="SJ">Salaj</option>
	<option bakvalue="SM">Satu-Mare</option>
	<option bakvalue="SV">Suceava</option>
	<option bakvalue="TL">Tulcea</option>
	<option bakvalue="TM">Timis</option>
	<option bakvalue="TR">Teleorman</option>
	<option bakvalue="VL">Valcea</option>
	<option bakvalue="VN">Vrancea</option>
	<option bakvalue="VS">Vaslui</option>
</select></td>

        <td><label class="dreapta" for="localitate">Localitate</label></td>
        <td><input type="text" value="Bucuresti"  id="localitate" class="input-xlarge uppercase"></td>
	</tr>
    
		<tr>
        <td><label class="stanga" for="adresa">Adresa</label></td>
        <td colspan=3><input type="text" value="Calea Victoriei, nr 48, bl P3, sc 4, apt 34, etaj"  id="adresa" class="input-xxlarge capitalize"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="adresa_livrare">Adresa livrare</label></td>
        <td colspan=3><input type="text" value="Focsani, Dorobani, nr 48, bl P3, sc 4, apt 34, etaj"  id="adresa_livrare" class="input-xxlarge capitalize"></td>
	</tr>
		<tr class="culoareStatbar">
        <td><label class="stanga" for="banca">Banca</label></td>
        <td><input type="text" value="RAIFEISEN, SUCURSALA CALEA PLEVNEI, NR 234"  id="banca" class="input-xlarge uppercase"></td>

        <td><label class="stanga" for="cont_bancar">Cont bancar</label></td>
        <td><input type="text" value="RO25INGB0000999901435479"  id="cont_bancar" class="input-xlarge uppercase"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="telefon">Telefon</label></td>
        <td><input type="text" value="0745 344556"  id="telefon" class="input-xlarge myRequired"></td>

        <td><label class="dreapta" for="fax">Fax</label></td>
        <td><input type="text" value="021/345 67544"  id="fax" class="input-xlarge uppercase"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="email">Email</label></td>
        <td><input type="text" value="office@mca-advertising.ro"  id="email" class="input-xlarge lowercase"></td>

        <td><label class="dreapta" for="website">Website</label></td>
        <td><input type="text" value="www.mca-advertising.ro"  id="website" class="input-xlarge lowercase"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="modalitate_plata">Modalitate de plata</label></td>
        <td colspan=3><input type="text" value="BO la 30 de zile"  id="modalitate_plata" class="input-xxlarge uppercase"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="curier">Curier</label></td>
        <td><input type="text" value="Fan Courier si Urgent"  id="curier" class="input-xlarge uppercase"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="seriozitate">Seriozitate</label></td>
        <td colspan=3><input type="text" value="FFF Serios"  id="seriozitate" class="input-xxlarge lowercase"></td>
	</tr>
			<tr>
        <td><label class="stanga" for="seriozitate">Agent</label></td>
        <td>
		<select name="DropDownPermisiuni" id="DropDownPermisiuni" class="input-xlarge" style="width: 244px;">
          <option value="agent">Alina Dup</option>
		  <option value="inginer_service">Roxana Mirescu</option>
          <option value="admin">Ionut Hancu</option>
		</select>
		</td>
	</tr>
    </form>
</table>
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>


                    
<?php 
include 'footer.php';
?>


