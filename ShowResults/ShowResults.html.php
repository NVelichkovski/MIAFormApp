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
        var formInfoJson= <?php
                $formJsos=json_encode($formArray);
            echo '\''.$formJsos.'\';'
            ?>;
        var formInfoArray=JSON.parse(formInfoJson);
        var formArray;
            $.ajax({
            url: "../users/<?php echo $_SESSION['user_info']['hash_id']."/".$_GET['formHash']?>/form.json",
            success: (data) =>{

                    formArray=JSON.parse(JSON.stringify(data));



                setting();
                }
            })
           </script>
</head>
<body>
    <div class="container">

        <div class="header">

            <div class="user-info">

                <span id="user_menu"> <?php echo $_SESSION['user_info']['name']?> </span>
                <div id="button_div" onclick="location.replace('http://localhost:63342/MIAFormApp/front/formlist.html.php')" onmouseover="Prikazi()" onmouseout="Out()"> <button type="button" name="new" id="create_new" onclick="location.replace('http://localhost:63342/MIAFormApp/front/formlist.html.php')" onmouseover="Prikazi()" onmouseout="Out()" style="padding-top: 20%">
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
            <div id="table-container" class="info-container">
                <table id="table_id">

                </table>
            </div>
            <div id="graph-container" class="info-container">

            </div>

            <fieldset ">
            <label for="link_input">Share:</label>
            <input id="link_input" disabled value="http://localhost:63342/MIAFormApp/script/form.php?user=<?php echo $_SESSION['user_info']['hash_id']?>&form=<?php echo $formHash?>" >
            </fieldset>
            <!---->
<!---->
<!--            <table>-->
<!--                <div class="info-container">-->
<!--                    <table id="table_id">-->
<!---->
<!--                    </table>-->
<!--                </div>-->
<!--                <div class="info-container">-->
<!--                    sd-->
<!--                </div>-->


        </div>

        <div class="footer">
            <footer id="footer_eden">WebForms &copy; 2018</footer>
            <footer id="footer_dva">Created by students on FEIT-Skopje: Neceva M. / Velichkovski N. / Shushlevska M. / Senchuk I.</footer>
        </div>
     </div>

    <script>
        function setting() {

            console.log("formArray->"+JSON.stringify(formArray));
            console.log("formInfoArray->"+JSON.stringify(formInfoArray));
            var str="<tr>";
            for (var element in formArray.elements) {

                str=str+"<th>"+formArray.elements[element][1]+"</th>";
            }
            str=str+"</tr>";

            for (var element of formInfoArray){

                str=str+"<tr>";
                currElementId=-1;
                for (var key in element)
                {
                    // alert(key);
                    keyArray=key.split("_");
                    if (currElementId==keyArray[3])
                    {
                        if (element[key]==null)
                            continue;
                        str=str.slice(0,-5);
                        str=str+"<br>"+element[key]+"</td>";
                        continue;
                    }

                    str=str+"<td>";
                    if(keyArray[3]==4)
                        str=str+"Selected values: <br>";
                    str=str+element[key]+"</td>";
                    currElementId=keyArray[3];
                }
                str=str+"</tr>";
            }
            $("#table_id").html(str);


            let radioArray=[];
            for (var info of formInfoArray){
                for (var key in info){
                    keyArray=key.split("_");
                    if (keyArray[keyArray.length-1]==3){
                        if (!(key in radioArray)){

                            radioArray[key]=[];

                        }
                        if (!(info[key] in radioArray[key])){

                            radioArray[key][info[key]]=0;

                        }

                        radioArray[key][info[key]]++;

                    }
                }
            }

            str="";
            for (var key in radioArray){
                keyArray=key.split("_");
                str=str+"<canvas id='element"+keyArray[3]+"'></canvas>";
            }
            $("#graph-container").html(str);


            let htmlElementsArray=[];
            let chartArray=[];
            for (var key in radioArray){
                keyArray=key.split("_");
                htmlElementsArray[key]= document.getElementById('element'+keyArray[3]).getContext('2d');
            }
            for (var key in radioArray){
                labels=[];
                for (var label in radioArray[key])
                    labels.push(label);
                keyArray=key.split("_");

                let data=[];

                for (var dataVal in radioArray[key]){
                    data.push(radioArray[key][dataVal]);
                }
                label=formArray.elements[keyArray[3]][2];
                chartArray[key]=new Chart("element"+keyArray[3],{
                    type: 'polarArea',
                    data: {
                        labels: labels ,
                        datasets: [{
                            label: label,
                            data: data,
                            backgroundColor:
                                palette('tol', data.length).map(function(hex) {
                                    return '#' + hex;
                                })
                        }]
                    },
                    options: {}
                });
            }
            if (formInfoArray.length==0){
                $("#graph-container").html("<span style='position: fixed;top: 39%; right: 18%;'><strong style='font-size:50px; text-shadow: black 1.7px 1.7px'>No data<strong></span>");
                $("#table-container").html("<span style='position: fixed;top: 39%; left: 18%;'><strong style='font-size:50px; text-shadow: black 1.7px 1.7px'>No data<strong></span>");
            }
            var numElements=0;
            for (var element in radioArray)
            numElements++;
            if (numElements==0){
                $("#graph-container").html("<span style='position: fixed;top: 39%; right: 18%;'><strong style='font-size:50px; text-shadow: black 1.7px 1.7px'>No data<strong></span>");
            }
            console.log(radioArray);
        }

    </script>
</body>
</html>
