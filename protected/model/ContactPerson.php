<?php
/*
 * this is an alias to Employee model to prevent any confliction in relation
 * between: 'Employee is_a contact person to a company' and 'Employee is_a employee to a dept.'
 */
Doo::loadModel('Employee');
class ContactPerson extends Employee{
  
}

?>
