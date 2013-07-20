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
<table border=0>
    <form>
	<tr>
        <td><label class="stanga" for="nume">Nume firma</label></td>
        <td colspan=3><input type="text" value="MCA PRESS SRL"  id="nume" class="input-xxlarge uppercase myRequired"></td>
	</tr>
	<tr>
        <td><label class="stanga" for="cod_fiscal">Cod fiscal</label></td>
        <td style="width: 260px;"><input type="text" value="RO0336675"  id="cod_fiscal" class="input-xlarge uppercase"></td>

        <td><label class="stanga" for="nr_reg_comert">Nr. Reg. Comert</label></td>
        <td><input type="text" value="J16/354/2012"  id="nr_reg_comert" class="input-xlarge uppercase"></td>
	</tr>
    		<tr>
        <td><label class="stanga" for="judet">Judet</label></td>
        <td><select name="judet" id="judet">
	<option value="AB">Alba</option>
	<option value="AG">Arges</option>
	<option value="AR">Arad</option>
	<option value="B" >Bucuresti</option>
	<option value="BC">Bacau</option>
	<option value="BH">Bihor</option>
	<option value="BN">Bistrita</option>
	<option value="BR">Braila</option>
	<option value="BT">Botosani</option>
	<option value="BV">Brasov</option>
	<option value="BZ">Buzau</option>
	<option value="CJ">Cluj</option>
	<option value="CL">Calarasi</option>
	<option value="CS">Caras-Severin</option>
	<option value="CT">Constanta</option>
	<option value="CV">Covasna</option>
	<option value="DB">Dambovita</option>
	<option value="DJ">Dolj</option>
	<option value="GJ">Gorj</option>
	<option value="GL">Galati</option>
	<option value="GR">Giurgiu</option>
	<option value="HD">Hunedoara</option>
	<option value="HG">Harghita</option>
	<option value="IF">Ilfov</option>
	<option value="IL">Ialomita</option>
	<option value="IS">Iasi</option>
	<option value="MH">Mehedinti</option>
	<option value="MM">Maramures</option>
	<option value="MS">Mures</option>
	<option value="NT">Neamt</option>
	<option value="OT">Olt</option>
	<option value="PH">Prahova</option>
	<option value="SB">Sibiu</option>
	<option value="SJ">Salaj</option>
	<option value="SM">Satu-Mare</option>
	<option value="SV">Suceava</option>
	<option value="TL">Tulcea</option>
	<option value="TM">Timis</option>
	<option value="TR">Teleorman</option>
	<option value="VL">Valcea</option>
	<option value="VN">Vrancea</option>
	<option value="VS">Vaslui</option>
</select></td>
	</tr>
		<tr>
        <td><label class="stanga" for="adresa">Adresa</label></td>
        <td colspan=3><input type="text" value="Calea Victoriei, nr 48, bl P3, sc 4, apt 34, etaj"  id="adresa" class="input-xxlarge capitalize"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="adresa_livrare">Adresa livrare</label></td>
        <td colspan=3><input type="text" value="Focsani, Dorobani, nr 48, bl P3, sc 4, apt 34, etaj"  id="adresa_livrare" class="input-xxlarge capitalize"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="banca">Banca</label></td>
        <td colspan=3><input type="text" value="RAIFEISEN, SUCURSALA CALEA PLEVNEI, NR 234"  id="banca" class="input-xxlarge uppercase"></td>
	</tr>
		<tr>
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
        <td><input type="text" value="BO la 30 de zile"  id="modalitate_plata" class="input-xlarge uppercase"></td>
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


