<?php
session_start();

    function setRandomSessid() {
        $_SESSION['sessid'] = md5(date('d.m.Y H:i:s').rand(1, 1000000));
    }

// session_destroy();
//
//    if(!isset($_SESSION['messages']))  {
//        $_SESSION['messages'] = array();
//    }

    $data = [];
//    $times = [];
//    $data = $_SESSION['messages'];
    
    $queue = new SplQueue();
    $queue->setIteratorMode(SplQueue::IT_MODE_DELETE);
    
    if (isset($_SESSION['messages'])) {
        foreach ($_SESSION['messages'] as $value) {
            $queue->enqueue($value);
            $queue->count();
        }
    }
    
    $_SESSION['messages'] = [];
    
//    $times[1] = $_SESSION['times'];
//    echo is_array($data);
//    echo isset($_POST['messages']);
//    echo  $_POST['sessid'] . ' -это $_POST[\'sessid\'] '."</br>";
//    echo  $_SESSION['sessid'] . ' - это $_SESSION[\'sessid\'] '."</br>";
    
    if(isset($_POST['messages']) && $_POST['sessid'] == $_SESSION['sessid']) {
//        array_push($data, $_POST['messages']);
//        array_push($times, $_POST['time']);
        $queue->enqueue($_POST['messages']);
        setRandomSessid();
    }
?>
<!---->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->

<h3>ДЗ 3</h3>

<form method="post" id="my_form">
    <label for="">Текст</label>
    <input type='hidden' name='sessid' value='<?=$_SESSION['sessid']?>'>
    <input type="text" name="messages" placeholder="Введите сообщение" required>
    <button type="submit">Отправить</button>
    
</form>

<ol id="my_message"></ol>

<?php
   

    
//    echo $queue->top();
//    $queue->next();
//    echo $queue->count();
//    print_r($data);
//    echo PHP_EOL;
//    print_r($times);
//    echo PHP_EOL;

?>
    
<!--    --><?php //foreach($data as $key => $value) : ?>
<!--        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">-->
<!--            <div class="card-body">-->
<!--                <h5 class="card-title">--><?//= $value ?><!--</h5>-->
<!--                <p class="card-text">--><?//= $value ?><!--</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    -->
<!--        --><?php //$queue->enqueue($value);
//    endforeach;
//
//    $queue->rewind();
//    ?>

<form method="post">
    <input type='hidden' name='sessid' value='<?=$_SESSION['sessid']?>'>
    <button type="submit" name="deleteBtn" id="deleteBtn" >Удалить</button>
</form>

<?php if (isset($_POST['deleteBtn111']) && $_POST['sessid'] == $_SESSION['sessid'] && $queue->valid()) {?>
    <p> Это самое старое сообщение - <?= $queue->bottom() ?></p>
    echo '454545454';
    <?php
    $queue->dequeue();
    setRandomSessid();
    
//    $data = [];
//    $queue->rewind();
//    while ($queue->valid()) {
//        array_push($data, $queue->current());
//        $queue->next();
//    }
    $_POST['deleteBtn'] = "";
    
//    echo "<meta http-equiv='refresh' content='0'>";
}
    
    $queue->rewind();
    while ($queue->valid()) {
        array_push($_SESSION['messages'], $queue->current());
        $queue->next();
    }
//    $_SESSION['messages'] = $data;
//    $_SESSION[1] = $times;
    print_r($_SESSION);
    
    
    
    if ($_GET['action'] == 'delMsg') {
        $date = 123;
        json_encode($date);
    }
    
?>



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="ajax.js"></script>




