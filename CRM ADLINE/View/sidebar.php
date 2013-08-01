


    <div class="sidebar-nav">
        <a href="" class="nav-header"><i class="icon-home"></i>Rapoarte</a>
            <ul id="accounts-menu" class="nav nav-list tab">
            <li ><a href="perete.php">Perete activitati</a></li>
			<li ><a href="statistici.php">Statistici</a></li>
            <li ><a href="piese.php">Piese</a></li>
            </ul>

    <a href="" class="nav-header" data-toggle="tab"><i class="icon-folder-open"></i>Clienti<span id="myCount" class="label label-danger">.</span></a>
        <ul id="accounts-menu" class="nav nav-list tab">
            <li ><a href="editare-client.php">Adauga client</a></li>
            <li ><a href="lista-clienti.php">Cauta client</a></li>
        </ul>

        <a href="#error-menu" class="nav-header" data-toggle="tab"><i class="icon-wrench"></i>Administrare</a>
        <ul id="error-menu" class="nav nav-list tab">
            <li ><a href="editare-agent.php">Adauga agent</a></li>
			<li ><a href="lista-agenti.php">Lista agenti</a></li>
        </ul>

    </div>
    
    <script>
       
    // cand apesi pe stergere
    function myCount(tableName, myJson, divDestinatie)
    {
        $.ajax({
        data: myJson,
        type: "POST",
        url: "../Controller/Controller.php?count="+tableName,
        dataType: "json"
        })
        .done(function(rezultat) { 
           divDestinatie.html(rezultat);
       });
    }
       
   var myJson = { "data" : { "filters" : {} } };
    myCount("firma", myJson, $('#myCount'));
       
    
    </script>