<?php

require 'bin/functions.php';
require 'db_configuration.php';

$query = "SELECT * FROM releases ORDER BY rtm_date ASC";

$GLOBALS['id'] = mysqli_query($db, $query);
$GLOBALS['name'] = mysqli_query($db, $query);
$GLOBALS['type'] = mysqli_query($db, $query);
$GLOBALS['status'] = mysqli_query($db, $query);
$GLOBALS['open_date'] = mysqli_query($db, $query);
$GLOBALS['dependecy_date'] = mysqli_query($db, $query);
$GLOBALS['freeze_date'] = mysqli_query($db, $query);
$GLOBALS['rtm_date'] = mysqli_query($db, $query);
$GLOBALS['manager'] = mysqli_query($db, $query);
$GLOBALS['author'] = mysqli_query($db, $query);
$GLOBALS['app_id'] = mysqli_query($db, $query);
?>

<?php $page_title = 'Gantt Chart'; ?>
<?php include('header.php'); 
        
?>

<style>
    #title {
        text-align: center;
        color: darkgoldenrod;
    }
    thead input {
        width: 100%;
    }
    .thumbnailSize{
        height: 100px;
        width: 100px;
        transition:transform 0.25s ease;
    }
    .thumbnailSize:hover {
        -webkit-transform:scale(3.5);
        transform:scale(3.5);
    }
</style>

<!-- Page Content -->
<br><br>
  
    <h2 id="title">499 Gantt Chart</h2><br>
    
    <div id="customerTableView">
        <table class="display" id="ganttTable" style="width:100%">
            <div class="table responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Open Date</th>
                    <th>Dependency Date</th>
                    <th>Freeze Date</th>
                    <th>RTM Date</th>
                    <th>Release Manager</th>
                    <th>Requester</th>
                    <th>App ID</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($id->num_rows > 0) {
                    // output data of each row
                    while($row = $id->fetch_assoc()) {
                        echo '<tr>
                                <td>'.$row["id"].'</td>
                                <td>'.$row["name"].' </span> </td>
                                <td>'.$row["type"].'</td>
                                <td>'.$row["status"].'</td>
                                <td>'.$row["open_date"].' </span> </td>
                                <td>'.$row["dependency_date"].'</td>
                                <td>'.$row["freeze_date"].'</td>
                                <td>'.$row["rtm_date"].' </span> </td>
                                <td>'.$row["manager"].' </span> </td>
                                <td>'.$row["author"].' </span> </td>
                                <td>'.$row["app_id"].' </span> </td>
                            </tr>';
                    }//end while
                }//end if
                else {
                    echo "0 results";
                }//end else
                ?>
                </tbody>
            </div>
        </table>
    </div>
</div>

<!-- /.container -->
<!-- Footer -->
<footer class="page-footer text-center">
    <p>Created for ICS 499 Capstone Project</p>
</footer>

<!--JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

<!--Data Table-->
<!--<script type="text/javascript" charset="utf8"
        src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> -->

<script type="text/javascript" language="javascript">
    $(document).ready( function () {
        
        $('#ganttTable').DataTable( {
            
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ] }
        );

        $('#ganttTable thead tr').clone(true).appendTo( '#ganttTable thead' );
        $('#ganttTable thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    
        var table = $('#ganttTable').DataTable( {
            orderCellsTop: true,
            fixedHeader: true,
            retrieve: true
        } );
        
    } );

</script>
</body>
</html>
