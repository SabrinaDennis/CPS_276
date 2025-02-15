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
