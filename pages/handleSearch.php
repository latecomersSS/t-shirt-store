<?php 
	
	require_once('../class/connectDB.php');
	$conn = connectDB::connect("root", "");
	if (isset( $_GET['search'] && !empty($_GET['search']))) {
		// code...

		$key = $_GET['search'];
		$sql = "SELECT p.id, p.name, pd.color, pd.size, c.name, s.name
				FROM products p, product_details pd, categories c, suppliers s
				WHERE p.name LIKE '%search%' 
						OR p.image LIKE '%search%' 
						OR P.description LIKE '%search%'
						OR YEAR(P.updated_at) LIKE '%search%'						
						OR MONTH(P.updated_at) LIKE '%search%' 
						OR pd.color LIKE '%search%' 
						OR pd.size LIKE '%search%' 
				        OR c.name LIKE '%search%'
				        OR S.name LIKE '%search%' 
				        AND p.id=pd.pro_id AND p.cate_id=c.id AND p.supplier_id = s.id
				GROUP BY p.id;"
	}
	else{
		$sql = "SELECT * FROM products";
	}

	$result = mysqli_query($conn, $sql);

?>