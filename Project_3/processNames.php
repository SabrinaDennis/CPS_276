
<?php
$output = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'processNames.php';
    $output = addClearNames();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Name Formatter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Name Formatter</h2>
        <form method="post">
            <div class="mb-3">
                <input type="text" name="fullname" class="form-control" placeholder="Enter Firstname Lastname">
            </div>
            <button type="submit" name="add" class="btn btn-primary">Add Name</button>
            <button type="submit" name="clear" class="btn btn-danger">Clear Names</button>
        </form>
        <textarea style="height: 500px;" class="form-control mt-3" id="namelist" name="namelist"><?php echo $output; ?></textarea>
    </div>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION['names'])) {
    $_SESSION['names'] = [];
}

function addClearNames() {
    if (isset($_POST['add']) && !empty($_POST['fullname'])) {
        $parts = explode(" ", trim($_POST['fullname']));
        if (count($parts) == 2) {
            $lastname = $parts[1];
            $firstname = $parts[0];
            $formattedName = "$lastname, $firstname";
            array_push($_SESSION['names'], $formattedName);
            sort($_SESSION['names']);
        }
    }
    
    if (isset($_POST['clear'])) {
        $_SESSION['names'] = [];
    }
    
    return implode("\n", $_SESSION['names']);
}
