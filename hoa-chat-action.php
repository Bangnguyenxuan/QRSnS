<?php include('header.php'); ?>

<?php
if(isset($_POST['code']))
{
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $code = $_POST['code'];
        $name = $_POST['name'];
        $manufacture = $_POST['manufacture'];
        $quantity = $_POST['quantity'];
        $unit = $_POST['unit'];
        $x_quantity = $_POST['x_quantity'];
        $import_date = $_POST['import_date'];
        $expire_date = $_POST['expire_date'];
        $form = $_POST['form'];
        $position = $_POST['position'];
        $note = $_POST['note'];

        check(mysql_query("UPDATE qa_chemical
                SET 
                code = '$code',
                name = '$name',
                manufacture = '$manufacture',
                quantity = $quantity,
                unit = '$unit', 
                x_quantity = $x_quantity,
                import_date = '$import_date',
                expire_date = '$expire_date',
				position = '$position',
                form = '$form',
                note = '$note'
                WHERE id = $id"), "ass");
    } else {
        $code = $_POST['code'];
        $name = $_POST['name'];
        $manufacture = $_POST['manufacture'];
        $quantity = $_POST['quantity'];
        $unit = $_POST['unit'];
        $x_quantity = $_POST['x_quantity'];
        $import_date = $_POST['import_date'];
        $expire_date = $_POST['expire_date'];
        $form = $_POST['form'];
        $position = $_POST['position'];
        $note = $_POST['note'];
    
    mysql_query("INSERT INTO `qa_chemical`(`code`, `name`, `manufacture`, `unit`, `quantity`, `x_quantity`, `type`, `form`, `import_date`, `expire_date`, `position`, `note`) 
        VALUES
        ('$code','$name','$manufacture','$unit',$quantity,$x_quantity,1,'$form','$import_date','$expire_date','$position','$note')")
            or die("Could not execute the insert query.");
    }
    ?>
    <script>
        location.href="quan-ly-hoa-chat.php";
    </script>
<?php
} else {
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $qChemical = "SELECT *
    FROM `qa_chemical`
    WHERE `qa_chemical`.`id` = $id";
    $rChemical = mysql_query($qChemical);
    $chemical = mysql_fetch_array($rChemical);
    
    ?>
    
    <h3>Edit Information</h3>
<div class="span5 offset2">
    <form method="post">
        <div class="form-group">
            <label for="code">ID:</label>
            <input type="text" class="form-control" value="<?= $chemical['code'] ?>" id="code" name="code" placeholder="Ex: C001...">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" value="<?= $chemical['name'] ?>" id="name" name="name" placeholder="Soya Milk...">
        </div>
        <div class="form-group">
            <label for="manufacture">Company:</label>
            <input type="text" class="form-control" value="<?= $chemical['manufacture'] ?>" id="manufacture" name="manufacture" placeholder="Silk...">
        </div>
        <div class="form-group">
            <label for="name">Quantity:</label>
            <div class="clearfix"></div>
            <input type="text" class="form-control span4" value="<?= $chemical['quantity'] ?>" id="quantity" name="quantity" placeholder="Ex: 330...">
            <input type="text" class="form-control span3" value="<?= $chemical['unit'] ?>" id="unit" name="unit" placeholder="Ex: ml...">
            <label style="float:left;">x</label>
            <input type="text" class="form-control span2" value="<?= $chemical['x_quantity'] ?>" id="x_quantity" name="x_quantity" placeholder="1">
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label for="import_date">Production Date:</label>
            <input type="date" class="form-control" value="<?= $chemical['import_date'] ?>" id="import_date" name="import_date" placeholder="YYYY-MM-DD">
        </div>
        <div class="form-group">
            <label for="expire_date">Expiry Date:</label>
            <input type="date" class="form-control" value="<?= $chemical['expire_date'] ?>" id="expire_date" name="expire_date" placeholder="YYYY-MM-DD">
        </div>
        <div class="form-group">
            <label for="form">Category:</label>
            <input type="text" class="form-control" value="<?= $chemical['form'] ?>" id="form" name="form" placeholder="Soft Drink...">
        </div>
        <div class="form-group">
            <label for="position">Address:</label>
            <input type="text" class="form-control" value="<?= $chemical['position'] ?>" id="position" name="position" placeholder="52 Nanyang Walk, Singapore 639928...">
        </div>
        <div class="form-group">
            <label for="note">Remark:</label>
            <input type="text" class="form-control" value="<?= $chemical['note'] ?>" id="note" name="note" placeholder="...">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Update</button>
            <a class="btn btn-lg" href="quan-ly-hoa-chat.php">Cancel</a>
        </div>
    </form>
</div>
    
    <?php
    
    } else {
?>
    <h3>Add Information</h3>
<div class="span5 offset2">
    <form method="post">
        <div class="form-group">
            <label for="code">ID:</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="Ex: C001...">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Soya Milk...">
        </div>
        <div class="form-group">
            <label for="manufacture">Company:</label>
            <input type="text" class="form-control" id="manufacture" name="manufacture" placeholder="Silk...">
        </div>
        <div class="form-group">
            <label for="name">Quantity:</label>
            <div class="clearfix"></div>
            <input type="text" class="form-control span4" id="quantity" name="quantity" placeholder="Ex: 330...">
            <input type="text" class="form-control span3" id="unit" name="unit" placeholder="Ex: ml...">
            <label style="float:left;">x</label>
            <input type="text" class="form-control span2" id="x_quantity" name="x_quantity" placeholder="1">
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label for="import_date">Production Date:</label>
            <input type="date" class="form-control" id="import_date" name="import_date" placeholder="YYYY-MM-DD">
        </div>
        <div class="form-group">
            <label for="expire_date">Expiry Date:</label>
            <input type="date" class="form-control" id="expire_date" name="expire_date" placeholder="YYYY-MM-DD">
        </div>
        <div class="form-group">
            <label for="form">Category:</label>
            <input type="text" class="form-control" id="form" name="form" placeholder="Soft Drink...">
        </div>
        <div class="form-group">
            <label for="position">Address:</label>
            <input type="text" class="form-control" id="position" name="position" placeholder="21 Lower Kent Ridge Road...">
        </div>
        <div class="form-group">
            <label for="note">Remark:</label>
            <input type="text" class="form-control" id="note" name="note" placeholder="...">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Update</button>
            <a class="btn btn-lg" href="quan-ly-hoa-chat.php">Cancel</a>
        </div>
    </form>
</div>
<?php 
    }
} ?>
<?php include('footer.php'); ?>