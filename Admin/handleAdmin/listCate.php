<main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Stock</th>
                                            <th>Create at</th>
                                            <th>Update at</th>
                                            <th>Active</th>
                                            
                                        </tr>
                                    </thead>
                                  <tbody>
                                      <?php 
                                        require 'D:\\xampp\\htdocs\\t-shirt\\class\\categories.php';
                                        $cate = new categories();

                                        $result = $cate->getAll();

                                        while( $row = $result->fetch_array()){
                                            echo "<tr>
                                                <td>$row[0]</td>
                                                <td>$row[1]</td>
                                                <td>$row[2]</td>
                                                <td>$row[3]</td>
                                                <td>$row[4]</td>
                                                <td>$row[5]</td>
                                               
                                               
                                            </tr>";
                                        }
                                      ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>