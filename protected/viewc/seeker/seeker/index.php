<h2><?php echo $data['seeker']->full_name; ?> Profile</h2>
<a href="<?php echo $data['APP_URL']; ?>seeker/edit_profile" class="button">Edit Profile</a>
<a href="<?php echo $data['APP_URL']; ?>seeker/view_cv" class="button">View CV</a>

<fieldset>
   <legend>Personal Information</legend>
   <div class="info-line">
      <span>phone Number :</span> <span><?php echo $data['seeker']->telephone; ?></span>
   </div>
   <div class="info-line">
      <span>email :</span> <span><?php echo $data['seeker']->email; ?></span>
   </div>
   <div class="info-line">
      <span>DOB :</span> <span><?php echo $data['seeker']->DOB; ?></span>
   </div>
   <div class="info-line">
      <span>gender :</span> <span><?php echo $data['seeker']->gender; ?></span>
   </div>
   <div class="info-line">
      <span>marital_status :</span> <span><?php echo $data['seeker']->marital_status; ?></span>
   </div>
   <div class="info-line">
      <span>nationalities :</span> 
      <ul>
         <?php $doo_view_basic_1307741834 = $data['seeker']->nationalities;
if (!empty($doo_view_basic_1307741834)):
foreach($doo_view_basic_1307741834 as $data['nationalitie']):
?>
            <li><?php echo $data['nationalitie']->country_name; ?></li>
         <?php endforeach;
 endif; ?>
      </ul>
   </div>
   <div class="info-line">
      <span>living_in :</span> <span><?php echo $data['seeker']->living_in->country_name; ?></span>
   </div>
   <div class="info-line">
      <span>residency_status :</span> <span><?php echo residency_status($data['seeker']->residency_status); ?></span> 
   </div>
</fieldset>
<?php if(isset($data['seeker']->SeekerProfessionalInfo)): ?>
<fieldset>
   <legend>Professional Information</legend>
   <div class="info-line">
      <span>exp_years :</span> <span><?php echo $data['seeker']->SeekerProfessionalInfo->exp_years; ?></span> 
   </div>
   <div class="info-line">
      <span>last_job_title :</span> <span><?php echo $data['seeker']->SeekerProfessionalInfo->last_job_title; ?></span> 
   </div>
   <div class="info-line">
      <span>primary_comm :</span> <span><?php echo $data['seeker']->SeekerProfessionalInfo->primary_comm->industry_name; ?></span> 
   </div>
   <?php if($data['seeker']->SeekerProfessionalInfo->second_comm!=0): ?>
   <div class="info-line">
      <span>second_comm :</span> <span><?php echo $data['seeker']->SeekerProfessionalInfo->second_comm->industry_name; ?></span> 
   </div>
   <?php endif; ?>
   <?php if($data['seeker']->SeekerProfessionalInfo->third_comm!=0): ?>
   <div class="info-line">
      <span>third_comm :</span> <span><?php echo $data['seeker']->SeekerProfessionalInfo->third_comm->industry_name; ?></span> 
   </div>
   <?php endif; ?>
   <div class="info-line">
      <span>Languages :</span>
      <?php $doo_view_basic_1307741835 = $data['seeker']->SeekerProfessionalInfo->lang_list;
if (!empty($doo_view_basic_1307741835)):
foreach($doo_view_basic_1307741835 as $data['lang']):
?>
      <ul>
         <li><span><?php echo $data['lang']->name; ?></span>:<span><?php echo $data['lang']->proficiency; ?></span></li> 
      </ul>
      <?php endforeach;
 endif; ?>
   </div>
   <div class="info-line">
      <span>preferd_place  :</span> <span><?php echo $data['seeker']->SeekerProfessionalInfo->preferd_place->country_name; ?></span> 
   </div>
   <div class="info-line">
      <span>skills  :</span> <P><?php echo $data['seeker']->SeekerProfessionalInfo->skills; ?></P> 
   </div>
</fieldset>
<?php endif; ?>
<?php if(isset($data['seeker']->SeekerEduInfo)&&(empty($data['seeker']->SeekerEduInfo)!=1)): ?>
<fieldset>
   <legend>Educational Information</legend>
   <div class="info-line">
      <span>highest_level :</span> <span><?php echo $data['seeker']->SeekerEduInfo->highest_level; ?></span>
   </div>
</fieldset>
<?php endif; ?>
<?php if(isset($data['seeker']->SeekerOtherInfo)&&empty($data['seeker']->SeekerOtherInfo)!=1): ?>
<fieldset>
   <legend>Additional Information</legend>
   <?php $doo_view_basic_1307741836 = $data['seeker']->SeekerOtherInfo;
if (!empty($doo_view_basic_1307741836)):
foreach($doo_view_basic_1307741836 as $data['SeekerOtherInfo']):
?>
   <div class="info-line">
      <span>title :</span> <span><?php echo $data['SeekerOtherInfo']->title; ?></span>
   </div>
   <div class="info-line">
      <span>description :</span> <span><?php echo $data['SeekerOtherInfo']->description; ?></span>
   </div>
   <?php endforeach;
 endif; ?>
</fieldset>
<?php endif; ?>