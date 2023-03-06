<?php 
	//load file layout vao day
	$this->fileLayout = "Layout.php";
 ?>

<div class="container-fluid mt-3">
    <div class="title" style="font-size: 28px; color:#224099; padding:20px;">
    <i class="far fa-clipboard" style="color: #f48120;"></i> Danh sách các request
    </div>
    <hr width="100%" style="color: #224099;"> 
</div>
<div class="container-fluid mt-3 p-0" style="">
    
    <div class="d-flex justify-content-between " style="border: 2px solid #224099; border-radius:20px 20px 0 0; background-color:#224099 ;">
        <div class="btn" style="padding: 20px;">
          <b href="#" style="font-size: 24px; color: #f48120;">Danh sách</b>
        </div>
    </div> 

    <div style="border: 2px solid #224099; border-radius:0 0 20px 20px; padding: 20px;">
        <table class="table table-data">
            <thead>
                <tr>
                  <th scope="col">Họ tên</th>
                  <th scope="col">Phòng ban</th>
                  <th scope="col">Địa chỉ</th>
                  <th scope="col">Số điện thoại</th>
                  <th scope="col">Email</th>
                  <th scope="col">Ngày đặt</th>
                  <th scope="col">Tổng tiền</th>
                  <th scope="col">Trạng thái</th>
                  <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $rows): ?>
                <?php 
                    $employee = $this->modelGetEmployee($rows->manv);
                 ?>
                <tr>
                    
                    <td><?php echo isset($employee->tennv)?$employee->tennv:""; ?></td>
                    <td><?php echo isset($employee->phong)?$employee->phong:""; ?></td>
                    <td><?php echo isset($employee->diachi)?$employee->diachi:""; ?></td>
                    <td><?php echo isset($employee->sdt)?$employee->sdt:""; ?></td>
                    <td><?php echo isset($employee->email)?$employee->email:""; ?></td>
                    <td><?php echo date("d/m/Y",strtotime($rows->date)); ?></td>
                    <td><?php echo number_format($rows->price); ?> đ</td>
                    <td>
                        <?php if($rows->status == 1): ?>
                            <div class="">Đã xác nhận</div>
                        <?php else: ?>
                            <div class="">Chưa xác nhận</div>
                        <?php endif; ?>
                    </td>

                    <td class="text-center">
                        <?php if($rows->status == 0): ?>
                            <a href="index.php?controller=orders&action=delivery&id=<?php echo $rows->id; ?>" class="btn btn-hover">Xác nhận</a>
                        &nbsp;&nbsp;
                        <?php endif; ?>
                        <a href="index.php?controller=orders&action=detail&id=<?php echo $rows->id; ?>" class="btn btn-hover">Chi tiết</a>
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
                <li class="page-item"><a href="index.php?controller=orders&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
            <?php endfor; ?>
          </ul>
        </nav>
    </div>
    
</div>
 
            