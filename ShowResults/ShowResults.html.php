<?php
    session_start();
    require_once "../script/db.php";
    if (isset($_GET['formHash'])){
        $formHash=$_GET['formHash'];
        $formId=getFormRowByHashId($_SESSION['user_info']['id'],$formHash)['id'];
        $qryRez=getFormTableContent($_SESSION['user_info']['id'], $formId);

        $formArray=[];
        while ($row=mysqli_fetch_assoc($qryRez)){
            array_push($formArray,$row);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WebForms</title>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://codepen.io/anon/pen/aWapBE.js"></script>
    <script src="../node_modules/chart.js/dist/Chart.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="FormList.css">
    <link rel="stylesheet" href="ShowResults.css">
    <script src="Prikazi.js"> </script>
    <script src="Out.js"> </script>
    <script src="createNew.js"></script>
    <link rel="icon" href="form.ico">


    <script>
        var formInfoJson=<?php
                $formJsos=json_encode($formArray);
            echo '\''.$formJsos.'\''
            ?>;
        var formInfoArray=JSON.parse(formInfoJson);
        var formArray;
        console.log(formArray);
        $.ajax({
            url: "../users/<?php echo $_SESSION['user_info']['hash_id']."/".$_GET['formHash']?>/form.json",
            success: (data)=>{
                alert(data);
                formArray=data;
                console.log(formArray);
            }
        })
        alert(formArray);
    </script>
</head>
<body>
<?php var_dump($formArray); ?>
    <div class="container">

        <div class="header">

            <div class="user-info">

                <span id="user_menu"> User name </span>
                <div id="button_div" onclick="createNew()" onmouseover="Prikazi()" onmouseout="Out()"> <button type="button" name="new" id="create_new" onclick="createNew()" onmouseover="Prikazi()" onmouseout="Out()" style="padding-top: 20%">
                    Back
                </button>
                </div>

                <div class="settings-menu">
                    <div class="settings-menu-item">Profile options</div>
                    <div class="settings-menu-item">Log out</div>
                </div>
            </div>

        </div>

        <div class="content">

            <div style="width: 100%">
                <span id="title-container" >
                    <center>Form name</center>
                </span>
            </div>

            <div class="info-container-left">
                <table id="table_id">

                </table>
            </div>

            <div class="info-container-right">
                <canvas id="element1"></canvas>
            </div>
      
        </div>

        <div class="footer">
            <footer id="footer_eden">WebForms &copy; 2018</footer>
            <footer id="footer_dva">Created by students on FEIT-Skopje: Neceva M. / Velichkovski N. / Shushlevska M. / Senchuk I.</footer>
        </div>
     </div>

    <script>
        var str="<tr>";
        formArray['elements'].forEach((element)=>{
            if (element[0]===1)
                str=str+"<th>"+element[1]+"</th>";
            if (element[0]===2)
                str=str+"<th>"+element[1]+"</th>";
            if (element[0]===3)
            {
                return;
            }
            if (element[0]===4)
                str=str+"<th>"+element[1]+"</th>";
            if (element[0]===5)
                str=str+"<th>"+element[1]+"</th>";
            if (element[0]===6)
                str=str+"<th>"+element[1]+"</th>";

        })
        str=str+"</tr>"
        
        var currCheckboxId=-1;
        formInfoArray.forEach((element)=>{
            
            str=str+"<tr>";
            for (var key in element)
            {
               let keyArray=key.split("_");

                if (keyArray.length==6){
                    if (currCheckboxId==-1)
                    {
                        currCheckboxId=keyArray[3];
                        str=str+"<td><li>"+element[key]+"</li>";
                    }
                    else {
                        if (keyArray[3]==currCheckboxId){
                            str=str+"<li>"+element[key]+"</li>";
                        }
                        else {
                            currCheckboxId=keyArray[3];
                            str=str+"</td><td><li>"+element[key]+"</li>";
                        }
                    }
                }
                if (currCheckboxId!=-1){
                    str=str+"</td>"
                    currCheckboxId=-1;
                }
                if (keyArray[3]=="3")
                    continue;
                str=str+"<td>"+element[key]+"</td>";
            }
            str=str+"</tr>";
        })
        $("#table_id").html(str);
    </script>
</body>
</html>
