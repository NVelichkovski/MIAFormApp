<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->
    <link rel="stylesheet" href="FormList.css">
    <link rel="stylesheet" href="ProfileOptions.css">
    <script src="../node_modules/jquery/dist/jquery.js"></script>
  
    <script src="../node_modules/toastr/build/toastr.min.js"></script>
    <script src="../node_modules/toastr/build/toastr.min.css"></script>
   
    <script src="load-script.js"></script>
    

</head>
<body>
<div class="container">

    <div class="header">

        <div class="user-info">

            <span> User name </span>

            <div class="settings-menu">
                <a class="settings-menu-item" href="ProfileOptions.html">Profile options</a>
                <div class="settings-menu-item">Log out</div>
            </div>
        </div>

    </div>


    <div class="content">

        <div class="user-informations" id="user-info">

            <form>

                <h4 class="title">
                    Your personal settings
                </h4>

                <div class="form-item">
                    <label>Name</label>
                    <div id="user-name">The name</div>
                </div>


                <div class="form-item">
                    <label>Username</label>
                    <div id="user-username">The username</div>
                </div>


                <div class="form-item">
                    <label>Email</label>
                    <div id="user-email">The email</div>
                </div>

                <div class="form-button">
                    <button type="button" id="edit-button">Edit settings</button>
                </div>


            </form>

        </div>

        <br>

        <div class="edit-user-informations" id="user-info-edit">

            <form id="edit-form" name="edit">

                <h4 class="title">
                    Edit your personal settings
                </h4>

                <div class="form-item">
                    <label>Name</label>
                    <input type="text" name="name" onchange="isDirty()"/>
                </div>

                <div class="form-item">
                    <label>Username</label>
                    <input type="text" name="username" onchange="isDirty()"/>
                </div>

                <div class="form-item">
                    <label>Email</label>
                    <input type="email" name="email" onchange="isDirty()"/>
                </div>

                <!-- <div class="form-item">
                    <label>Password</label>
                    <input type="password" name="password"/>
                </div>

                <div class="form-item">
                    <label>Repeat password</label>
                    <input type="password" name="re-password"/>
                </div> -->

                <div class="form-button">
                    <button type="submit" id="save-button"
                    onclick="return saveButtonHendler()">Save settings</button>
                </div>


            </form>

        </div>

    </div>

</div>


</body>
</html>