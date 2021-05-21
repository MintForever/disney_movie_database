<?php
        session_start();
        require_once('./library.php');
        if ($_SESSION['type'] == NULL){
                echo "<script>
                alert('Please log in first!');
                window.location.href='index.php';
                </script>";
        }
        $user = &$_SESSION['userID'];
        $avatar = &$_POST['avatarID'];

        echo $user;
        echo $avatar;
        $db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        mysqli_query($db_connection,"UPDATE user SET avatarID = $_POST[avatarID] WHERE userID = $_SESSION[userID]");

        echo "<script>
                alert('Update avatar successfully!');
                window.location.href='profile.php';
                </script>";
        ?>