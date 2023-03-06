<?php 
	//load file layout vao day
	$this->fileLayout = "Layout.php";
 ?>

<div class="container-fluid mt-3">
    <div class="title" style="font-size: 28px; color:#224099; padding:20px;">
    <i class="far fa-clipboard" style="color: #f48120;"></i> Danh mục vật tư
    </div>
    <hr width="100%" style="color: #224099;"> 
</div>
<div class="container-fluid mt-3 p-0" style="">
    
    <div class="d-flex justify-content-between " style="border: 2px solid #224099; border-radius:20px 20px 0 0; background-color:#224099 ;">
        <div class="btn" style="padding: 20px;">
          <b href="#" style="font-size: 24px; color: #f48120;">Danh sách</b>
        </div>
        <div class="" style="padding: 20px;">
          <a href="index.php?controller=categories&action=create" class="btn btn-hover" style="font-size: 24px; border-color: #00adee;">Thêm mới <i class="fas fa-plus-square"></i></a>
        </div>
    </div> 

    <div style="border: 2px solid #224099; border-radius:0 0 20px 20px; padding: 20px;">
        <table class="table table-data">
            <thead>
                <tr>
                  <th scope="col">Mã danh mục</th>
                  <th scope="col">Tên danh mục</th>
                  <th scope="col">Mô tả</th>
                  <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $rows): ?>
                <tr>
                    <th scope="row"><?php echo $rows->madm; ?></th>
                    <td><?php echo $rows->tendm; ?></td>
                    <td><?php echo $rows->mota; ?></td>
                    <td>
                        <a class="btn btn-hover" href="index.php?controller=categories&action=update&madm=<?php echo $rows->madm; ?>">Edit</a>&nbsp;
                        <a class="btn btn-hover" href="index.php?controller=categories&action=delete&madm=<?php echo $rows->madm; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" >
                <span style="color:#f48120">Trang</span>
              </a>
            </li>
            <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li class="page-item"><a href="index.php?controller=categories&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
            <?php endfor; ?>
          </ul>
        </nav>
    </div>
    
</div>
 
            