<?php
/*
 * this is an alias to employee model to prevent any confliction in relation
 * between: 'employee belongs_to dept' and 'employee is_a business_partner to a dept'
 */
Doo::loadModel('Employee');
class BusinessPartner extends Employee{
}

?>
