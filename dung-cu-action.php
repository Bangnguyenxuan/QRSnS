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
        $import_date = $_POST['import_date'];
        $position = $_POST['position'];
        $note = $_POST['note'];

        check(mysql_query("UPDATE qa_equipment
                SET 
                code = '$code',
                name = '$name',
                manufacture = '$manufacture',
                quantity = $quantity,
                import_date = '$import_date',
				position = '$position',
                note = '$note'
                WHERE id = $id"), "ass");
    } else {
        $code = $_POST['code'];
        $name = $_POST['name'];
        $manufacture = $_POST['manufacture'];
        $quantity = $_POST['quantity'];
        $import_date = $_POST['import_date'];
        $position = $_POST['position'];
        $note = $_POST['note'];
    
    mysql_query("INSERT INTO `qa_equipment`(`code`, `name`, `manufacture`, `quantity`, `import_date`, `position`, `note`) 
        VALUES
        ('$code','$name','$manufacture',$quantity,'$import_date','$position','$note')")
            or die("Could not execute the insert query.");
    }
    ?>
    <script>
        location.href="quan-ly-dung-cu.php";
    </script>
<?php
} else {
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $qChemical = "SELECT *
    FROM `qa_equipment`
    WHERE `qa_equipment`.`id` = $id";
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
            <input type="text" class="form-control" value="<?= $chemical['name'] ?>" id="name" name="name" placeholder="Perfume...">
        </div>
        <div class="form-group">
            <label for="manufacture">Company:</label>
            <input type="text" class="form-control" value="<?= $chemical['manufacture'] ?>" id="manufacture" name="manufacture" placeholder="Chloe...">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="text" class="form-control" value="<?= $chemical['quantity'] ?>" id="quantity" name="quantity" placeholder="Ex: 2...">
        </div>
        <div class="form-group">
            <label for="import_date">Date:</label>
            <input type="date" class="form-control" value="<?= $chemical['import_date'] ?>" id="import_date" name="import_date" placeholder="YYYY-MM-DD">
        </div>
        
        <div class="form-group">
            <label for="position">Address:</label>
            <input type="text" class="form-control" value="<?= $chemical['position'] ?>" id="position" name="position" placeholder=" 2 Jurong Hill, Singapore 628925...">
        </div>
        <div class="form-group">
            <label for="note">Remark:</label>
            <input type="text" class="form-control" value="<?= $chemical['note'] ?>" id="note" name="note" placeholder="...">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Update</button>
            <a class="btn btn-lg" href="quan-ly-dung-cu.php">Cancel</a>
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
            <input type="text" class="form-control" id="name" name="name" placeholder="Perfume...">
        </div>
        <div class="form-group">
            <label for="manufacture">Company:</label>
            <input type="text" class="form-control" id="manufacture" name="manufacture" placeholder="Chloe...">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Ex: 2...">
        </div>
        <div class="form-group">
            <label for="import_date">Date:</label>
            <input type="date" class="form-control" id="import_date" name="import_date" placeholder="YYYY-MM-DD">
        </div>
        
        <div class="form-group">
            <label for="position">Address:</label>
            <input type="text" class="form-control" id="position" name="position" placeholder=" 2 Jurong Hill, Singapore 628925...">
        </div>
        <div class="form-group">
            <label for="note">Remark:</label>
            <input type="text" class="form-control" id="note" name="note" placeholder="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Update</button>
            <a class="btn btn-lg" href="quan-ly-dung-cu.php">Cancel</a>
        </div>
    </form>
</div>
<?php 
    }
} ?>
<?php include('footer.php'); ?>