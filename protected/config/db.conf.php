<?php
$dbmap['Company']['has_many']['SavedSearchesCompanyCvs'] = array('foreign_key'=>'company_id');
$dbmap['SavedSearchesCompanyCvs']['belongs_to']['Company'] = array('foreign_key'=>'id');

$dbmap['Industry']['has_many']['Company'] = array('foreign_key'=>'industry_id');
$dbmap['Company']['belongs_to']['Industry'] = array('foreign_key'=>'id');

$dbmap['City']['has_many']['Company'] = array('foreign_key'=>'city_id');
$dbmap['Company']['belongs_to']['Country'] = array('foreign_key'=>'id');

$dbmap['Company']['has_many']['Department'] = array('foreign_key'=>'company_id');
$dbmap['Department']['belongs_to']['Company'] = array('foreign_key'=>'id');

$dbmap['ContactPerson']['has_one']['Company'] = array('foreign_key'=>'contact_person');
$dbmap['Company']['belongs_to']['ContactPerson'] = array('foreign_key'=>'id');
//////////////////////////
$dbmap['Department']['has_many']['Rrf'] = array('foreign_key'=>'department_id');
$dbmap['Rrf']['belongs_to']['Department'] = array('foreign_key'=>'id');

$dbmap['Country']['has_many']['Rrf'] = array('foreign_key'=>'country_id');
$dbmap['Rrf']['belongs_to']['Country'] = array('foreign_key'=>'id');

$dbmap['Industry']['has_many']['Rrf'] = array('foreign_key'=>'industry_id');
$dbmap['Rrf']['belongs_to']['Industry'] = array('foreign_key'=>'id');

$dbmap['Department']['has_many']['Employee'] = array('foreign_key'=>'department_id');
$dbmap['Employee']['belongs_to']['Department'] = array('foreign_key'=>'id');

$dbmap['BusinessPartner']['has_one']['Department'] = array('foreign_key'=>'business_partner');
$dbmap['Department']['belongs_to']['BusinessPartner'] = array('foreign_key'=>'id');

$dbmap['Department']['has_many']['Vacancy'] = array('foreign_key'=>'department_id');
$dbmap['Vacancy']['belongs_to']['Department'] = array('foreign_key'=>'id');

$dbmap['Vacancy']['has_many']['Seeker'] = array('foreign_key'=>'vacancy_id', 'through'=>'seeker_apply_vacancy');
$dbmap['Seeker']['has_many']['Vacancy'] = array('foreign_key'=>'seeker_id', 'through'=>'seeker_apply_vacancy');

$dbmap['Vacancy']['has_many']['CandidateInfo'] = array('foreign_key'=>'vacancy_id', 'through'=>'candidate');
$dbmap['CandidateInfo']['has_many']['Vacancy'] = array('foreign_key'=>'seeker_id', 'through'=>'candidate');

$dbmap['Country']['has_many']['SeekerEdu'] = array('foreign_key'=>'country_id');
$dbmap['SeekerEdu']['belongs_to']['Country'] = array('foreign_key'=>'id');

$dbmap['Country']['has_many']['Vacancy'] = array('foreign_key'=>'country_id');
$dbmap['Vacancy']['belongs_to']['Country'] = array('foreign_key'=>'id');

$dbmap['Industry']['has_many']['Vacancy'] = array('foreign_key'=>'industry_id');
$dbmap['Vacancy']['belongs_to']['Industry'] = array('foreign_key'=>'id');

$dbmap['Country']['has_many']['City'] = array('foreign_key'=>'country_id');
$dbmap['City']['belongs_to']['Country'] = array('foreign_key'=>'id');

$dbmap['Seeker']['has_many']['SeekerOtherInfo'] = array('foreign_key'=>'seeker_id');
$dbmap['SeekerOtherInfo']['belongs_to']['Seeker'] = array('foreign_key'=>'id');

$dbmap['Seeker']['has_many']['SeekerWorkExp'] = array('foreign_key'=>'seeker_id');
$dbmap['SeekerWorkExp']['belongs_to']['Seeker'] = array('foreign_key'=>'id');

$dbmap['Seeker']['has_many']['SeekerWorkExp'] = array('foreign_key'=>'seeker_id');
$dbmap['SeekerWorkExp']['belongs_to']['Seeker'] = array('foreign_key'=>'id');

$dbmap['Seeker']['has_many']['SeekerEdu'] = array('foreign_key'=>'seeker_id');
$dbmap['SeekerEdu']['belongs_to']['Seeker'] = array('foreign_key'=>'id');

$dbmap['Seeker']['has_one']['SeekerEduInfo'] = array('foreign_key'=>'seeker_id');
$dbmap['SeekerEduInfo']['belongs_to']['Seeker'] = array('foreign_key'=>'id');

$dbmap['Seeker']['has_many']['SeekerEduDegree'] = array('foreign_key'=>'seeker_id');
$dbmap['SeekerEduDegree']['belongs_to']['Seeker'] = array('foreign_key'=>'id');

$dbmap['Seeker']['has_one']['SeekerProfessionalInfo'] = array('foreign_key'=>'seeker_id');
$dbmap['SeekerProfessionalInfo']['belongs_to']['Seeker'] = array('foreign_key'=>'id');
/**
 * Example Database connection settings and DB relationship mapping
 * $dbmap[Table A]['has_one'][Table B] = array('foreign_key'=> Table B's column that links to Table A );
 * $dbmap[Table B]['belongs_to'][Table A] = array('foreign_key'=> Table A's column where Table B links to );
 

//Food relationship
$dbmap['Food']['belongs_to']['FoodType'] = array('foreign_key'=>'id');
$dbmap['Food']['has_many']['Article'] = array('foreign_key'=>'food_id');
$dbmap['Food']['has_one']['Recipe'] = array('foreign_key'=>'food_id');
$dbmap['Food']['has_many']['Ingredient'] = array('foreign_key'=>'food_id', 'through'=>'food_has_ingredient');

//Food Type
$dbmap['FoodType']['has_many']['Food'] = array('foreign_key'=>'food_type_id');

//Article
$dbmap['Article']['belongs_to']['Food'] = array('foreign_key'=>'id');

//Recipe
$dbmap['Recipe']['belongs_to']['Food'] = array('foreign_key'=>'id');

//Ingredient
$dbmap['Ingredient']['has_many']['Food'] = array('foreign_key'=>'ingredient_id', 'through'=>'food_has_ingredient');

*/

//$dbconfig[ Environment or connection name] = array(Host, Database, User, Password, DB Driver, Make Persistent Connection?);
/**
 * Database settings are case sensitive.
 * To set collation and charset of the db connection, use the key 'collate' and 'charset'
 * array('localhost', 'database', 'root', '1234', 'mysql', true, 'collate'=>'utf8_unicode_ci', 'charset'=>'utf8'); 
 */

/* $dbconfig['dev'] = array('localhost', 'database', 'root', '1234', 'mysql', true);
 * $dbconfig['prod'] = array('localhost', 'database', 'root', '1234', 'mysql', true);
 */
$dbconfig['dev'] = array('localhost', 'recruitment', 'root', '', 'mysql', true, 'collate'=>'utf8_unicode_ci', 'charset'=>'utf8');
?>