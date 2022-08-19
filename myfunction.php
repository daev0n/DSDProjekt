<?php
function generatePassword(){
    if(!isset($_POST['generate']))
                {
                  $password = "Vygenerujte heslo pre úpravu príspevku";
                }
                else {
                   $password = substr(md5(rand()), 0, 5);
                }}
                ?>