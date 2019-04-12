<?php

function getFriends() {
    include 'UserObject.php';
    include 'connect.php';
    $array_friend = array();
    if (!empty($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        $sql_friend = "select friend_id from friends where user_id = '$user_id'";
        $kt = mysqli_query($conn, $sql_friend);
        $j = 0;
        if (mysqli_num_rows($kt) > 0) {
            $row = mysqli_fetch_all($kt, MYSQLI_ASSOC);
            $friends = "";
            foreach ($row as $key => $value) {
                $friends = $value["friend_id"];
            }
            if (!empty($friends)) {
                $mang = array();
                $mang = explode(",", $friends);
                for ($i = 0; $i < count($mang); $i++) {
                    $sql = "select * from user where user_id = '$mang[$i]'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $userObject = new UserObject();
                    if (!empty($row["user_id"])) {
                        $userObject->setUser_id(strval($row["user_id"]));
                        $userObject->setUser_name($row["user_name"]);
                        $userObject->setUser_email($row["user_email"]);
                        $userObject->setUser_image($row["user_image"]);
                        $userObject->setUser_position($row["user_position"]);
                        $array_friend[$j] = $userObject;
                        ++$j;
                    }
                }
            }
        }
    }
    return $array_friend;
}

function getFriendsWithSql($sql) {
    include 'UserObject.php';
    include 'connect.php';
    $array_friend = array();
    $j = 0;
    if (!empty($sql)) {
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $userObject = new UserObject();
        if (!empty($row["user_id"]) && $row["user_id"] != $_SESSION["user_id"]) {
            $userObject->setUser_id(strval($row["user_id"]));
            $userObject->setUser_name($row["user_name"]);
            $userObject->setUser_email($row["user_email"]);
            $userObject->setUser_image($row["user_image"]);
            $userObject->setUser_position($row["user_position"]);
            $array_friend[$j] = $userObject;
            ++$j;
        }
    }
    return $array_friend;
}

function CheckEmail($email) {
    $find1 = strpos($email, '@');
    $find2 = strpos($email, '.');
    return ($find1 !== false && $find2 !== false && $find2 > $find1 ? true : false);
}

function updateFriends($friends) {
    include 'connect.php';

    $id = $_SESSION["user_id"];

    $sql = "UPDATE `friends` SET `friend_id`='$friends' WHERE user_id = '$id'";

    mysqli_query($conn, $sql);
}

function getFriendsID($user_id) {
    include 'connect.php';

    $sql_friend = "select friend_id from friends where user_id = '$user_id'";
    $kt = mysqli_query($conn, $sql_friend);
    $friends = "";
    if (mysqli_num_rows($kt) > 0) {
        $row = mysqli_fetch_all($kt, MYSQLI_ASSOC);
        foreach ($row as $key => $value) {
            $friends = $value["friend_id"];
        }
    }
    return $friends;
}

function getUser($userId) {
    include 'connect.php';
    $sql = "select user_name,user_position from user where user_id = '$userId'";
    $result = mysqli_query($conn, $sql);
    $array_friend = array();    
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);  
        
        
        
        $userObject = new UserObject();         

        $userObject->setUser_name($row["user_name"]);       
       
        $userObject->setUser_position($row["user_position"]);        
        
        return $row;
        $array_friend[0] = $userObject;
    }
    return $array_friend;
}
