<?php
include_once '../../config/core.php';

include_once '../../config/database.php';

$dbObj = new Database($dbconfig['username'], $dbconfig['password']);

$conn  = $dbObj->getConnection();

$stmt = $conn->prepare(
    'SELECT status FROM EmployeeAttendance WHERE emp_id = ? AND Month(today_date) = ? AND Year(today_date) = ? ORDER BY today_date'
);

$stmt->execute(array(
    base64_decode($_GET['emp_id']),
    $_GET['month'],
    $_GET['year']
));

$record = $stmt->fetchAll(PDO::FETCH_ASSOC);

$attendance = array();

for ($i = 0; $i < count($record); $i++) {
    $attendance[$i] = $record[$i]['status'];
}

if ($i < 30) {
    for ($j = $i; $j < 31; $j++) {
        $attendance[$j] = null;
    }
}

echo json_encode($attendance);
