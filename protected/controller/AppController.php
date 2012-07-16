<?php

Doo::loadController('MainController');
Doo::loadModel('Vacancy');
Doo::loadModel('Seeker');
Doo::loadModel('Country');
Doo::loadModel('Industry');

class AppController extends MainController {

   public function beforeRun($resource, $action) {
      session_start();

      //if not login, group = anonymous
      $role = (isset($_SESSION['user']['group'])) ? $_SESSION['user']['group'] : 'anonymous';

      //check against the ACL rules
      if ($rs = $this->acl()->process($role, $resource, $action)) {
         //echo $role .' is not allowed for '. $resource . ' '. $action;
         return $rs;
      }
   }

   /*
    * index:
    * view homepage
    * in the home page we hv links to
    * sign up link
    * log in as a seeker 
    * log in as a company 
    * most populer vacancies 
    * search for jobs box 
    * link to browes all jobs 
    * find job by country  
    */

   public function index() {
      return $this->renderTemplate('index', 'app');
   }

   public function new_vacancies() {
      $vacancy = new Vacancy();
      $vacancies = $vacancy->relateExpand(array('Department', 'Company'), array('DESC' => 'id', 'limit' => '15'));

      $this->data['vacancies'] = $vacancies;
      return $this->renderTemplate('new_vacancies', 'app');
   }

   public function view_vacancy() {
      if (!isset($this->params[0]))
         return $this->returnFlash('error', 'error in url');

      $vacancy = new Vacancy();
      $vacancy->id = $this->params[0];
      $vacancy = $vacancy->relateMany(array('Country', 'Industry'));
      $vacancy = $vacancy[0];
      $this->data['vacancy'] = $vacancy;

      if (isset($_SESSION['user']['group']) && $_SESSION['user']['group'] == 'seeker') {
         $applicant = new Seeker();
         $applicant = $applicant->relate('Vacancy', array('where' => "md5(seeker.id) = '{$_SESSION['user']['MID']}' AND vacancy.id = $vacancy->id"));
         $applicant = $applicant[0];
         if ($applicant instanceof Seeker) {
            $this->data['applied'] = true;
         } else {
            $this->data['applied'] = false;
         }
      }

      return $this->renderTemplate('view_vacancy', 'app');
   }

   public function vacancy_apply() {
      if (!isset($this->params[0]))
         return $this->returnFlash('error', 'error in url');

      $seeker_md5_id = $_SESSION['user']['MID'];
      $vacancy_id = $this->params[0];

      $seeker = new Seeker();
      $seeker = $seeker->getOne(array('where' => "md5(id) = '$seeker_md5_id'"));
      $seeker->apply($vacancy_id);

      return $this->returnFlash('success', 'Applied To Job Successfully');
   }

   public function view_seeker() {
      if (!isset($this->params[0]))
         return $this->returnFlash('error', 'error in url');

      $seeker = new Seeker();
      $seeker->id = $this->params[0];
      $seeker = $seeker->getOne();
      if (!$seeker instanceof Seeker)
         return $this->returnFlash('error', 'seeker not found');

      $seeker = $seeker->relateMany(array('SeekerEduInfo', 'SeekerProfessionalInfo', 'SeekerOtherInfo'));
      $seeker = $seeker[0];

      if (!$seeker instanceof Seeker)
         return $this->returnFlash('error', 'seeker not found');

      $seeker->nationalities = json_decode($seeker->nationalities);
      $nationalities = array();
      foreach ($seeker->nationalities as $nationalitie) {
         $national = new Country();
         $national->id = $nationalitie;
         $national = $national->getOne();
         $nationalities[] = $national;
      }

      $seeker->nationalities = $nationalities;
      $living_in = new Country();
      $living_in->id = $seeker->living_in;
      $seeker->living_in = $living_in->getOne();

      $comm = new Industry();
      $comm->id = $seeker->SeekerProfessionalInfo->primary_comm;
      $seeker->SeekerProfessionalInfo->primary_comm = $comm->getOne();

      if ($seeker->SeekerProfessionalInfo->second_comm != 0) {
         $comm = new Industry();
         $comm->id = $seeker->SeekerProfessionalInfo->second_comm;
         $seeker->SeekerProfessionalInfo->second_comm = $comm->getOne();
      }

      if ($seeker->SeekerProfessionalInfo->third_comm != 0) {
         $comm = new Industry();
         $comm->id = $seeker->SeekerProfessionalInfo->third_comm;
         $seeker->SeekerProfessionalInfo->third_comm = $comm->getOne();
      }
      $seeker->SeekerProfessionalInfo->lang_list = json_decode($seeker->SeekerProfessionalInfo->lang_list);

      $place = new Country();
      $place->id = $seeker->SeekerProfessionalInfo->preferd_place;
      $seeker->SeekerProfessionalInfo->preferd_place = $place->getOne();

      $this->data['seeker'] = $seeker;
      return $this->renderTemplate('view_seeker', 'app');
   }

   public function vacancies_by_countries() {
      $vacancy = new Vacancy();
      $vacancies = $vacancy->relateExpand(array('Department', 'Company'));

      $country = new Country();
      $countries = $country->find();

      foreach ($countries as &$country) {
         $country->vacancies = array();
         foreach ($vacancies as $vacancy) {
            if ($vacancy->country_id == $country->id)
               $country->vacancies[] = $vacancy;
         }
      }

      $this->data['countries'] = $countries;

      return $this->renderTemplate('vacancies_by_countries', 'app');
   }

   public function vacancies_by_community() {
      $vacancy = new Vacancy();
      $vacancies = $vacancy->relateExpand(array('Department', 'Company'));

      $industry = new Industry();
      $industries = $industry->find();

      foreach ($industries as &$industry) {
         $industry->vacancies = array();
         foreach ($vacancies as $vacancy) {
            if ($vacancy->industry_id == $industry->id)
               $industry->vacancies[] = $vacancy;
         }
      }

      $this->data['industries'] = $industries;
      return $this->renderTemplate('vacancies_by_community', 'app');
   }

   /*
    * about:
    * view about us page
    * link to home page
    */

   public function about() {
      return $this->renderTemplate('about', 'app');
   }

   /* terms:
    * view terms and conditions page
    * link to home page
    */

   public function terms() {
      return $this->renderTemplate('terms', 'app');
   }

   /* contact:
    * view contact us page
    * link to home page
    */

   public function contact() {
      return $this->renderTemplate('contact', 'app');
   }

}

?>