<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Facebook post system</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
        <link rel="stylesheet" href="css/style.css">


        <style>
            .btn-change{
                background-color: #2a4c8e;
                color: #ffffff;
            }
            .modal-header{
                background-color : #2a4c8e;
            }
            .close span{
                color: #fff;
            }
            .edit-text{
                color: #000;
            }
           
        </style>
    </head>

    <body onload="post()">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8 center">
                    <h1 class="text-center">Facebook post system</h1>
                    <div class="card">
                        <form>
                            <div class="form-group">
                                <div class="text"> 
                                    <span>Type something here...</span>
                                    <textarea id="textarea" class="form-control" onkeyup="manage(this)" aria-label="With textarea"></textarea>
                                </div>
                                <input id="btn-fb" class="btn btn-fb" type="submit" value="Post" onclick="post('add')" disabled="disabled">
                            </div>
                        </form>
                    </div>
                    <div id="posts-container">
                        
                    </div>
                </div>
            </div>
            <!--- Edit Model-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="edit"> 
                                        <textarea id="edit-text" class="form-control" onkeyup="" aria-label="With textarea" ></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="save" class="btn btn-change" onclick="post('edit')" >Save changes</button>
                            <input type ="hidden" id ="post-id">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>
        <script>
          
        
        </script>
    </body>
</html>