<?php

class UserObject {

    private $user_id = "";
    private $user_name = "";
    private $user_email = "";
    private $user_password = "";
    private $user_old = "";
    private $user_phone_number = "";
    private $user_address = "";
    private $user_sex = "";
    private $user_image = "";
    private $user_position = "";

    public function __construct() {
        $user_id = "";
        $user_name = "";
        $user_email = "";
        $user_password = "";
        $user_old = "";
        $user_phone_number = "";
        $user_address = "";
        $user_sex = "";
        $user_image = "";
        $user_position = "";
    }

    public function getUser_id() {
        return $this->user_id;
    }

    public function getUser_name() {
        return $this->user_name;
    }

    public function getUser_email() {
        return $this->user_email;
    }

    public function getUser_password() {
        return $this->user_password;
    }

    public function getUser_old() {
        return $this->user_old;
    }

    public function getUser_phone_number() {
        return $this->user_phone_number;
    }

    public function getUser_address() {
        return $this->user_address;
    }

    public function getUser_sex() {
        return $this->user_sex;
    }

    public function getUser_image() {
        return $this->user_image;
    }

    public function getUser_position() {
        return $this->user_position;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function setUser_name($user_name) {
        $this->user_name = $user_name;
    }

    public function setUser_email($user_email) {
        $this->user_email = $user_email;
    }

    public function setUser_password($user_password) {
        $this->user_password = $user_password;
    }

    public function setUser_old($user_old) {
        $this->user_old = $user_old;
    }

    public function setUser_phone_number($user_phone_number) {
        $this->user_phone_number = $user_phone_number;
    }

    public function setUser_address($user_address) {
        $this->user_address = $user_address;
    }

    public function setUser_sex($user_sex) {
        $this->user_sex = $user_sex;
    }

    public function setUser_image($user_image) {
        $this->user_image = $user_image;
    }

    public function setUser_position($user_position) {
        $this->user_position = $user_position;
    }

}
