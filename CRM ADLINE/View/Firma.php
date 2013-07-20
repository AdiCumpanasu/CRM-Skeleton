<style>
    table,th, td { border: 1px solid black; }
</style>
    
    <script src="..\\lib\\jquery\\jquery.js"></script>
    
    Click one row ! <br><br><br>
    
    <table id='myTable'></table>
    
    <div>id: <input id='id'/></div>
    <div>data: <input id='data'/></div>
    <div>descriere: <input id='descriere'/></div>
    <div>seriozitate: <input id='seriozitate'/></div>
    <div>utilizator_id: <input id='utilizator_id'/></div>
    <div>descriere: <input id='descriere'/></div>
    <div>seriozitate: <input id='seriozitate'/></div>
    <div>curier: <input id='curier'/></div>
    <div>modalitate_plata: <input id='modalitate_plata'/></div>
    <div>website: <input id='website'/></div>
    <div>email: <input id='email'/></div>
    <div>fax: <input id='fax'/></div>
    <div>telefon: <input id='telefon'/></div>
    <div>cont_bancar: <input id='cont_bancar'/></div>
    <div>adresa_livrare: <input id='adresa_livrare'/></div>
    <div>adresa: <input id='adresa'/></div>
    <div>nr_reg_comert: <input id='nr_reg_comert'/></div>
    <div>cod_fiscal: <input id='cod_fiscal'/></div>
    <div>nume: <input id='nume'/></div>
    <script>
    
    
    function readTable(numeleTabeluluiDeInterogat)
    {
    $.ajax({
    type: "POST",
    url: "..\\Controller\\Controller.php?read="+numeleTabeluluiDeInterogat,
    dataType: "json"
    })
   .done(function(rezultat) { 
        $.each(rezultat, function(i) {
            tRow = $('<tr>');
            $.each(rezultat[i], function(j) {
                tCell = $('<td>').html(rezultat[i][j]);
                tCell.click(function(){ getElement(i) });
                tRow.append(tCell);
            });
            $('#myTable').append(tRow);
        });
   });
   }

    
    function getElement(elementId)
    {
    $.ajax({
    type: "POST",
    url: "..\\Controller\\Controller.php?get="+elementId,
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
   
   readTable("firma");
</script>