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
          <b href="#" style="font-size: 24px; color: #f48120;">Thêm/Sửa</b>
        </div>
        <div class="" style="padding: 20px;">
          <a href="index.php?controller=categories" class="btn btn-hover" style="font-size: 24px; border-color: #00adee;">Trở lại <i class="fas fa-undo-alt"></i></a>
        </div>
    </div> 
    
    <div style="border: 2px solid #224099; border-radius:0 0 20px 20px; padding: 20px;">
        <form method="post" action="<?php echo $action; ?>">
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Tên danh mục</span>
              <input type="text" name="tendm" value="<?php echo isset($record->tendm) ? $record->tendm : ""; ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Mô tả</span>
              <input type="text" name="mota" value="<?php echo isset($record->mota) ? $record->mota : ""; ?>" class="form-control" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="font-size: 20px; font-weight: 700; color:#f48120; background-color: #224099;">Danh mục cha</span>
              <?php 
                $category_id = isset($record->id) ? $record->id : 0;
                $categories = $this->modelCategories($category_id);
             ?>
              <select name="danhmuccha" class="form-control" style="width:250px;">
                    <option value="0"></option>
                    <?php foreach($categories as $rows): ?>
                        <option <?php if(isset($record->madm) && $record->danhmuccha == $rows->madm): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->tendm; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-group mb-3">
              <input type="submit" value="Xử lý" class="btn btn-hover" style="font-size: 20px; font-weight: 700; "></input>
            </div>
        </form>
    </div>

</div>
 
            