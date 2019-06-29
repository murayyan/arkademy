<?php 
function is_username_valid($username) {
    if (!preg_match('/^([a-z]{5,9})$/',$username)) {
        echo "Wrong"; 
    }else{
        echo "Correct";
    }
}

function is_password_valid($password){
    if (!preg_match("/^(?=.*[$&+,:;=?@#|'<>.^*()%!-])(?=.*[#])([a-zA-Z0-9\d#\d$&+,:;=?@#|'<>.^*()%!-]{8,})$/",$password)) {
        echo "Wrong"; 
      }else{
        echo "Correct";
      }
}

function is_phone_valid($no){
    if (!preg_match('/^([+][62]{2})([0-9]{8,15})$/',$no)) {
        echo "Wrong"; 
    }else{
        echo "Correct";
    }
}

function is_email_valid($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Wrong"; 
    }else{
        echo "Correct";
    }
}

is_username_valid("zeronull"); 
is_username_valid("userOke");
is_password_valid("p@ssW0rd#");
is_password_valid("C0d3YourFuture!@");
is_phone_valid("+6281234567890");
is_email_valid("iqbal@mail.c");