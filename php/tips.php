<?php
include('config.php');

$action = $_POST['action'] ?? $_GET['action'];

if ($action == 'add') {
    $tip = $_POST['tip'];
    $query = "INSERT INTO safety_tips (tip) VALUES ('$tip')";
    if (mysqli_query($conn, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'New safety tip added successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error adding safety tip.']);
    }
} elseif ($action == 'delete') {
    $id = $_POST['id'];
    $query = "DELETE FROM safety_tips WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Safety tip deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error deleting safety tip.']);
    }
} elseif ($action == 'edit') {
    $id = $_POST['id'];
    $tip = $_POST['tip'];
    $query = "UPDATE safety_tips SET tip = '$tip' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Safety tip updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error updating safety tip.']);
    }
} elseif ($action == 'view') {
    $search = $_GET['query'] ?? '';
    if ($search) {
        $query = "SELECT * FROM safety_tips WHERE tip LIKE '%$search%'";
    } else {
        $query = "SELECT * FROM safety_tips";
    }
    $result = mysqli_query($conn, $query);
    $tips = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $tips[] = $row;
    }
    echo json_encode($tips);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action.']);
}
?>
