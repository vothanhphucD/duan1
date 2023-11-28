
<?php 

function get_danhsachtk(){
    $sql = "SELECT * FROM user ORDER BY user_id DESC ";
    return pdo_query($sql);
}
function showtk($dssp){
    $html_dssp='';
    $i = 1;
    foreach ($dssp as $sp) {
        extract($sp);
        
        $html_dssp.='<tr>
        <td>
            <div class="d-flex align-items-center">
                <div class="table-user-name ml-3">
                    <p class="mb-0 font-weight-medium" value="1">admin</p>
                    <small value="1">'.$user_name.'</small>
                </div>
            </div>
        </td>
        <td value="1">'.$user_vaitro.'</td>
        <td>
            <div class="badge badge-inverse-success" value="1">'.$user_vaitro.'</div>
        </td>
        <td>
            <a href="#"><span class="mdi mdi-table-edit"></span></a> | 
            <a href="#"><span class="mdi mdi-delete-forever"></span></a>
        </td>
    </tr> ';
    $i++;
    }
    return $html_dssp;
}
?>