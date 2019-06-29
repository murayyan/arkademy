<?php 
convert_to_json();
function convert_to_json(){
    $json = array (
        "name" => "Muhammad Rayyan Abhad",
        "age" => 22,
        "addr" => "Jl. Anila 3 Blok 9E, No 12, Sawoajajar 2, Malang",
        "hobbies" => array ("Ngoding", "Makan", "Nge-PES"),
        "is_married" => false,
        "list_school" => array( 
                    "0" => array (
                        "name" => "SMPN 2 Malang",
                        "year_in" => "2019",
                        "year_out" => "2012",
                        "major" => null),
                    "1" => array (
                        "name" => "SMK Telkom Malang",
                        "year_in" => "2012",
                        "year_out" => "2015",
                        "major" => "RPL"),
                    "2" => array (
                        "name" => "Univ. Brawijaya",
                        "year_in" => "2015",
                        "year_out" => "2019",
                        "major" => "Teknik Informatika")
                    ),
        "skills" => array( 
                    "0" => array (
                        "skill_name" => "PHP",
                        "level" => "Expert"),
                    "1" => array (
                        "skill_name" => "HTML, CSS, JS",
                        "level" => "Advanced"),
                    "2" => array (
                        "skill_name" => "Java",
                        "level" => "Advanced"),
                    "3" => array (
                        "skill_name" => "Golang",
                        "level" => "Beginner")
                    ),
        "interest_in_coding" => true
    );
    echo json_encode(array('biodata' => $json));
}
