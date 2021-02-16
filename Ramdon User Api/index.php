<?php
    include('encabezado.php'); 
    include('libs/utils.php');
?>
<h2>Infectados Por El Covid-19</h2>
    </br>
    <p>La COVID‑19 es la enfermedad infecciosa causada por el coronavirus que se ha descubierto más recientemente. Tanto este nuevo virus como la enfermedad que provoca eran desconocidos antes de que estallara el brote en Wuhan (China) en diciembre de 2019. Actualmente la COVID‑19 es una pandemia que afecta a muchos países de todo el mundo.</p>
<a href="#" class="btn btn-success">Sincronizar</a>
</br>
<table id="table_id" class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Foto</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Edad</th>
      <th scope="col">Signo Zodiacal</th>
      <th scope="col">Foto del signo zodiacal</th>
      <th scope="col">Bandera de su nacionalidad</th>
      <th scope="col"></th>
    </thead>
    <tbody>
<?php
    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
        $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
        }

    $total_records_per_page = 10;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 
        
    $query1 = "SELECT COUNT(*) As total_records FROM `infectados`";
    $result_count = mysqli_query($con, $query1);
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1
    $query2 = "SELECT * FROM `infectados` LIMIT $offset, $total_records_per_page";
    $result = mysqli_query($con, $query2);  
    while($row = mysqli_fetch_array($result)){
        echo "<tr>
                <td>{$row['id']}</td>
                <td><img src='{$row['fotosmalls']}'></td>
                <td>{$row['nombre']}</td>
                <td>{$row['apellido']}</td>
                <td>{$row['edad']}</td>
                <td>{$row['zodiaco']}</td>
                <td><img width='25px'; src='img/{$row['zodiaco']}.png'></td>
                <td><img src='https://www.countryflags.io/{$row['nacionalidad']}/flat/32.png'/></td>
                <td>
                    <a class='btn btn-info' href='persona.php?ced={$row['id']}'>
                      <svg class='bi bi-eye' width='2em' height='2em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                      <path fill-rule='evenodd' d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z'/>
                      <path fill-rule='evenodd' d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                  </svg>
                </td>
                </tr>";                
    }
    mysqli_close($con);
?>
    </tbody>
</table>

<div>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
    <ul class="pagination">
	    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
        <li class='disabled' <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
        <a href='#' tabindex='-1' aria-disabled='true' <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
        </li>
        <?php 
        if ($total_no_of_pages <= 10){  	 
            for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                if ($counter == $page_no) {
            echo "<li class='active'><a>$counter</a></li>";	
               }    else{
            echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                    }
            }
        }
        elseif($total_no_of_pages > 10){
        if($page_no <= 4) {			
        for ($counter = 1; $counter < 8; $counter++){		 
            if ($counter == $page_no) {
            echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";	
                    }else{
            echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                    }
            }
            echo "<li class='page-item'><a class='page-link'>...</a></li>";
            echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
            echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
            }
        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
            echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
            echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
            echo "<li class='page-item'><a class='page-link'>...</a></li>";
            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
            if ($counter == $page_no) {
            echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";	
                }else{
            echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                }                  
            }
        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
        }
            
        else{
        echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
        echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
        if ($counter == $page_no) {
        echo "<li class='active'><a class='page-link'>$counter</a></li>";	
        }else{
        echo "<li><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
            }                   
        }
    }
}
?>
    
	<li class="page-item" <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a class="page-link" <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
<?php if($page_no < $total_no_of_pages){
    echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
} 
    include('pie.php');
?>
