<?php
include("crudop/crud.php");
$crud = new Crud;


if (isset($_POST['keyword'])) 
{
   $cat_id =$_POST['cat_id'];
   $searchKeyword = $_POST['keyword'];

if ($cat_id == 'all') 
{

    $condition = "WHERE (prod_name LIKE '".$searchKeyword."%' OR prod_code LIKE '" . $searchKeyword . "%') ORDER BY id ASC";
} 
else 
{
    $condition = "WHERE catg_id = '".$cat_id."' AND (prod_name LIKE '" . $searchKeyword . "%' OR prod_code LIKE '" . $searchKeyword . "%') ORDER BY id ASC";
}
      
    $query = "SELECT * FROM products ".$condition." ";
//exit;
    $res_query = $crud->getData($query);

    // here products will be displaying based on keywords..

    if (!empty($res_query)) 
    {
      $colCount = 0;
        echo '<div class="row">'; 
        foreach ($res_query as $product) 
        {
            $product['product_image'] = str_replace('../', '', $product['product_image']);
            $image = 'http://eastland-wellness.com/EadminWellLand/' . $product['product_image'];
            echo '<div class="col-md-4 p-4">';
            echo '<div class="card product-grid">';
            echo '<div class="product-card">';
            echo '<img class="card-img-top pic-2" src="' . $image . '" alt="Card image cap">';
            echo '<div class="card-body">';
            echo '<div class="text-center">';
            echo '<p title="'.$product['prod_name'].'" style="color: black; font-size: 0.8rem;letter-spacing: 1px;" class="montserrat">'.substr($product['prod_name'],0,28).'...</p>';
            echo '<a href="product_details?prodId=' . $product['id'] . '" class="btn theme-bg btn-outline-secondary text-white poppins">Read More</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '</div>';

            $colCount++;

        }
        echo '</div>'; 
    } 
    else
    {
        echo 'No products are available';
    }

}


?>

