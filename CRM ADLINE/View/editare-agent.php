<?php 
include 'header.php';
include 'navbar.php';
include 'sidebar.php';
include 'stats.php';
?>

<script>

// Declare data structure for save



function get()
{
    var entityId = getPostValueByName('id');
    if (entityId = "undefined") { return; }
    $.ajax({
    type: "GET",
    url: "..\\Controller\\Controller.php?entity=Utilizator&get="+entityId,
    dataType: "json"
    })
   .done(function(rezultat) { 
        for (var key in rezultat) {
            if (rezultat.hasOwnProperty(key)) {
                var inputField = $('#'+key);
                inputField.val(rezultat[key]);
            }
        }
   });
}

var dateDeTrimis = { 
                    "user" : { 
                                "ID" : 22, 
                                "token": "hY3j"
                             }, 
                    "data" : {
                                "id" : null,  
                                "username" : null, 
                                "nume" : null, 
                                "telefon" : null, 
                                "email" : null, 
                                "password" : null, 
                                "tip" : null, 
                             }
                   };  // An ID = -1 will force an insert, otherwise it is update

// Perform save data
                   
function SaveData(entityName)
{
    // Prepare data for save
    dateDeTrimis.data.id = $('#id').val();
    dateDeTrimis.data.username = $('#username').val();
    dateDeTrimis.data.nume = $('#nume').val();
    dateDeTrimis.data.telefon = $('#telefon').val();
    dateDeTrimis.data.email = $('#email').val();
    dateDeTrimis.data.password = $('#password').val();
    dateDeTrimis.data.tip = $('#tip').val();

    // Make POST request
        $.ajax({
        data: dateDeTrimis,
        type: "POST",
        url: "../Controller/Controller.php?save="+dateDeTrimis.data.id+"&entity="+entityName,
        dataType: "json"
        })
        .done(function(rezultat) { 
           //window.alert("Saved "+ agentId);
       }).fail(function(rezultat) { 
           //window.alert("Error for entity: "+ entityName + ", id:" + dateDeTrimis.data.id);
       });
}
</script>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button id="saveData" class="btn btn-primary" onclick="SaveData('Utilizator')"><i class="icon-save"></i> Salveaza</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">

        <input type="hidden" value="-1"  id="id" />
 <table>
    <form>
    	
        

	<tr>
        <td style="width: 130px;"><label class="stanga" for="username">Username</label></td>
        <td ><input type="text" value=""  id="username" class="input-xlarge lowercase"></td>
	</tr>
	<tr>
        <td><label class="stanga" for="nume">Nume</label></td>
        <td><input type="text" value=""  id="nume" class="input-xlarge capitalize"></td>
	</tr>
	<tr>
        <td><label class="stanga" for="telefon">Telefon</label></td>
        <td><input type="text" value=""  id="telefon" class="input-xlarge uppercase"></td>
	</tr>
	<tr>
        <td><label class="stanga" for="email">Email</label></td>
        <td><input type="text" value=""  id="email" class="input-xlarge lowercase"></td>
	</tr>
		<tr>
        <td><label class="stanga" for="password">Parola</label></td>
        <td><input type="password" value=""  id="password" class="input-xlarge"></td>
	</tr>
		<tr>
		<td>
		<label class="stanga">Permisiuni</label>
		</td>
		<td>
        <select id="tip" class="input-xlarge" style="width: 244px;">
          <option value="agent" selected>agent</option>
		  <option value="inginer_service">inginer service</option>
          <option value="admin">admin</option>
		</select>
		</td>
		</tr>
    </form>
	</table>
<hr>
	  <p class="text-info">
	  <i>
	  agent
	  <ul>
	  <li>drepturi de baza</li>
	  </ul>
	  </p>
	  <p class="text-info">inginer service
	  <ul>
	  <li>+ adauga interventii</li>
	  </ul>
	  </p>
	  <p class="text-info">admin
	  <ul>
	  <li>+ editeaza/sterge clienti/echipamente/interventii</li>
	  <li>+ adauga/editeaza/sterge useri</li>
	  <li>+ exporta lista clienti/email</li>
	  <li>+ activitate invizibila celorlalti</li>
	  <li>+ diverse altele</li>
	  </ul>
	  </i>
	  </p>

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


<script>
    get();
</script>                  
<?php 
include 'footer.php';
?>


