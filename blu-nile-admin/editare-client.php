<?php 
include 'header.php';
include 'navbar.php';
include 'sidebar.php';
include 'stats.php';
?>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-save"></i> Salveaza</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
<table>
    <form>
	<tr>
        <td style="width: 130px;"><label class="stanga" for="nume">Nume firma</label></td>
        <td ><input type="text" value="MCA PRESS SRL"  id="nume" class="input-xxlarge"></td>
	</tr>
	<tr>
        <td><label class="stanga" for="cod_fiscal">Cod fiscal</label></td>
        <td><input type="text" value="RO0336675"  id="cod_fiscal" class="input-xlarge"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="nr_reg_comert">Nr. Reg. Comert</label></td>
        <td><input type="text" value="J16/354/2012"  id="nr_reg_comert" class="input-xlarge"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="adresa">Adresa</label></td>
        <td><input type="text" value="Calea Victoriei, nr 48, bl P3, sc 4, apt 34, etaj"  id="adresa" class="input-xxlarge"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="adresa_livrare">Adresa livrare</label></td>
        <td><input type="text" value="Focsani, Dorobani, nr 48, bl P3, sc 4, apt 34, etaj"  id="adresa_livrare" class="input-xxlarge"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="banca">Banca</label></td>
        <td><input type="text" value="RAIFEISEN, SUCURSALA CALEA PLEVNEI, NR 234"  id="banca" class="input-xxlarge"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="cont_bancar">Cont bancar</label></td>
        <td><input type="text" value="RO25INGB0000999901435479"  id="cont_bancar" class="input-xlarge"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="telefon">Telefon</label></td>
        <td><input type="text" value="0745 344556"  id="telefon" class="input-xlarge"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="fax">Fax</label></td>
        <td><input type="text" value="021/345 67544"  id="fax" class="input-xlarge"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="email">Email</label></td>
        <td><input type="text" value="office@mca-advertising.ro"  id="email" class="input-xlarge"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="website">Website</label></td>
        <td><input type="text" value="www.mca-advertising.ro"  id="website" class="input-xlarge"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="modalitate_plata">Modalitate de plata</label></td>
        <td><input type="text" value="BO la 30 de zile"  id="modalitate_plata" class="input-xlarge"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="curier">Curier</label></td>
        <td><input type="text" value="Fan Courier si Urgent"  id="curier" class="input-xlarge"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="seriozitate">Seriozitate</label></td>
        <td><input type="text" value="FFF Serios"  id="seriozitate" class="input-xlarge"></td>
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


