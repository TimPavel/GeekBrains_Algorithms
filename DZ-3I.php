<?php

session_start();

$queue = new SplQueue();
$queue->setIteratorMode(SplQueue::IT_MODE_DELETE);

foreach ($_SESSION['messages'] as $value) {
	$queue->enqueue($value);
}
unset($_SESSION['messages']);

// print_r($_SESSION['messages']);
// print_r($queue);
echo $queue->top();
// echo PHP_EOL;
?>	


<ul>
	<li><?= $queue->dequeue() ?></li>
</ul>


<form method="post">

<button type="submit" name="deleteBtn">Удалить</button>
</form>

<?php

if (isset($_POST['deleteBtn'])) {
	try {
		$queue->dequeue();
		unset($_POST['deleteBtn']);
	} catch (Exception $e) {
		echo $e;
	}
	
}
    while( $iter->valid() )
    {
        echo $iter->key() . "=" . $iter->current() . "\n";
        $iter->next();
    }

?>	