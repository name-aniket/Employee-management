<?php

define('CURR_PASSWORD', $_POST['curr_passwd']);

define('NEW_PASSWORD', $_POST['new_passwd']);

define('EMP_ID', $_POST['emp_id']);

include_once '../../config/core.php';

include_once '../../config/database.php';

$dbObj = new Database($dbconfig['username'], $dbconfig['password']);

$conn  = $dbObj->getConnection();


$stmt = $conn->prepare(
    'SELECT password, email FROM Login WHERE email = (SELECT emp_email FROM Employee WHERE emp_id = ?)'
);

$stmt->execute(
    array(
        base64_decode(EMP_ID)
    )
);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row['password'] == CURR_PASSWORD) {

    $stmt = $conn->prepare(
        "UPDATE Login SET password = ? WHERE email = ? "
    );

    $flag = $stmt->execute(
        array(
            NEW_PASSWORD,
            $row['email']
        )
    );

    echo json_encode(array(
        $flag
    ));
} else {

    echo json_encode(array(
        false
    ));
}
