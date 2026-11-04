<?php
require_once '../config.php';

// Handle form submission to add a new task
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['title'])) {
	$sql = "INSERT INTO tasks (title) VALUES (?)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$_POST['title']]);
	header("Location: index.php");	//Refresh page to prevent for resubmission
	exit;
}

// Fetch all tasks from the database
$stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $stmt->fetchALL();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="container">
		<h2>Application Form</h2>

		<!-- Form to add new entries -->
		<form action="form.php" method="POST">
			<input type="text" name="title" placeholder="Enter a new task..." required>
			<input type="submit" value="Add Task">
		</form>

		<h3>Current Tasks:</h3>
		<ul>
			<?php foreach ($tasks as $task): ?>
				<li><?php echo htmlspecialchars($task['title']); ?> <small>(<?php echo $task['created_at']; ?>)</small></li>
			<?php endforeach; ?>
		</ul>
	</div>
</body>
</html>
