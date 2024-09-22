<?php
    include('../conn.php');
    if(isset($_POST['q'])){
        $qu = "Select s.*,a.anm from artist as a,song as s where s.aid=a.aid and snm LIKE '%" . trim($_POST['q']) ."%'";
        $result = mysqli_query($conn,$qu);
        if(mysqli_num_rows($result)>0){
            $output = '<div class="ml-5"><table class="table table-borderless table-responsive  w-75 align-center ml-5 mt-5 text-center">
            <th>Song ID</th>
            <th>Song Name</th>
            <th>Music</th>
            <th>Song Pic</th>
            <th>Artist Name</th>
            <th>Create date</th>
            ';
            while($r=mysqli_fetch_row($result)){
                $output .= " <tr class='font-weight-normal'>
                <td>$r[0]</td>
                <td>$r[1]</td>
                <td>
                    <audio controls>
                        <source src='../$r[5]' type='audio/mp3'>
                    </audio>
                </td>
                <td><img src='../pic/$r[7]'width=70 height=70 class='rounded-circle'></td>
                <td>$r[8]</td>
                 <td>$r[6]</td>
            </tr>";
            }$output .= "</table>";
            echo $output;
        }else{
             echo "<h2 style='color:red;'>No data Found</h2>";  
        }  
    }
?>
