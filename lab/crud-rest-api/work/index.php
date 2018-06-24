<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>API CRUD with PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/bootstrap.min.css" />
    <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.jsjs"></script>
    
    <!-- <script src="bootstrap/jquery.min.js"></script> -->
</head>
<body>
    <div class="container">
        <div class="row">
            <div align="right"><button type="button" class="btn btn-primary" id="add">Add</button></div>
            <table class="table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="lead_data">
                </tbody>
            </table>
        </div>
    </div>
    <div id="crudModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="crudForm">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New</h4>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class"form-group">
                            <label for="first_name">First Name</label>
                            <input class="form-control" type="text" name="first_name" id="first_name">
                        </div>
                        <div class"form-group">
                            <label for="last_name">Last Name</label>
                            <input class="form-control" type="text" name="last_name" id="last_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="action" id="action" value="insert">
                        <input type="submmit" name="btn_action" id="btn_action" class="btn btn-success" value="Add">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
// show all data on page
$(document).ready(function(){
    function fetch_data(){
        $.ajax({
             url:'fetch.php',
             success:function(data){
                 $('#lead_data').html(data);
             }
        });
    }
    fetch_data();
});
// call modal to add new data
$('#add').click(function(){
    $('#action').val('insert');
    $('#btn_action').val('Add New');
    $('.modal-title').val('Add New');
    $('#crudModal').modal('show');
});
// validate data to insert
$('#crudModal').on('submmit',function(event){
    // prevent refresh page
    event.preventDefault();
    if($('#first_name') == ''){
        alert("Enter first name");
    } else if ($('#first_name') == ''){
        alert("Enter last name");
    } else {
        // convert data to past into url 
        var form_data = $(this).serialize();
        $.ajax({
            url:'action.php',
            method:'POST',
            data:form_data,
            success:function(data){
                fetch_data();
                $('#crudForm')[0].reset();
                $('#crudModal').modal('hide');
                if(data == 'insert'){
                    alet("Data insert");
                } else if(data == 'updata'){
                    alet("Data update");
                } else if(data == 'delete'){
                    alet("Data delete");
                } else {
                    alert("Operation error");
                }
            }
        });
    }
});
</script>
</html>
