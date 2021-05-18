<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="container" >
<h2> List of Courses </h2>
    <table id="coursesTable" border="2">
        <thead>
           <tr>
            <th width="20%">Course Name</th>
            <th width="40%">Course Description</th>
            <th width="20%">Professor Name</th>
            <th width="20%">Department Name</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<br>
<button id="load">Load More</button>
<script type="text/javascript">

$(document).ready(function(){
    
    $("#load").click(function(){
         
        $.ajax({
            url: 'ajaxfile.php',
            type: 'get',
            dataType: 'JSON',
            success:function(response){

                var len = response.length;
                for(var i=0; i<len; i++){
                    var course_name = response[i].course_name;
                    var course_description = response[i].course_description;
                    var department_name = response[i].department_name;
                    var professor_name = response[i].professor_name;


                    var tr_str = "<tr>"+
                    "<td align='center'>"+ course_name + "</td>"+
                    "<td align='center'>"+ course_description + "</td>"+
                    "<td align='center'>"+ department_name + "</td>"+
                    "<td align='center'>"+ professor_name + "</td>"+
                    "</tr>";

                    $("#coursesTable tbody").append(tr_str);
                    

                }

            }
        })

    })

})
</script>
</body>
</html>
