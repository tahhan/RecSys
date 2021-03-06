<h2>Vacancy : <?php echo $data['vacancy']->job_title; ?></h2>
<fieldset>
   <legend>Vacancy Information</legend>
   <div class="form-element">
      <span class="bold">Job Description :</span>
      <p><?php echo $data['vacancy']->job_description; ?></p>
   </div>

   <div class="form-element">
      <span class="bold">Salary :</span>
      <span><?php echo $data['vacancy']->salary; ?></span>
   </div>

   <div class="form-element">
      <span class="bold">Number Of Employee Required :</span>
      <span><?php echo $data['vacancy']->no_employees_required; ?></span>
   </div>

   <div class="form-element">
      <span class="bold">Type Of Employment :</span>
      <span><?php echo $data['vacancy']->type_employment; ?></span>
   </div>

   <div class="form-element">
      <span class="bold">Employment Of Reason :</span>
      <span><?php echo $data['vacancy']->reason_employment; ?></span>
   </div>

   <div class="form-element">
      <span class="bold">Type of industry :</span>
      <span><?php echo $data['vacancy']->Industry->industry_name; ?></span>
   </div>

   <div class="form-element">
      <span class="bold">Country :</span>
      <span><?php echo $data['vacancy']->Country->country_name; ?></span>
   </div>

   <div class="form-element">
      <span class="bold">Status :</span>
      <span><?php echo $data['vacancy']->status; ?></span>
   </div>

   <h3>Actions</h3>
   <a href="<?php echo $data['APP_URL']; ?>employer/process_vacancy/<?php echo $data['vacancy']->id; ?>/n" class="button">Need more employee</a> 
   <a href="<?php echo $data['APP_URL']; ?>employer/process_vacancy/<?php echo $data['vacancy']->id; ?>/e" class="button">empty</a> 
   <a href="<?php echo $data['APP_URL']; ?>employer/process_vacancy/<?php echo $data['vacancy']->id; ?>/d" class="button">Delete</a>
</fieldset>
<fieldset>
   <legend>Applicants</legend>
   <ul>
      <?php $doo_view_basic_1308052887 = $data['applicants'];
if (!empty($doo_view_basic_1308052887)):
foreach($doo_view_basic_1308052887 as $data['applicant']):
?>
      <li><a href="<?php echo $data['APP_URL']; ?>app/view_seeker/<?php echo $data['applicant']->id; ?>" class="button"><?php echo $data['applicant']->full_name; ?></a></li>
      <?php endforeach;
 else: ?>
      <h3>No applicants yet</h3>
      <?php endif; ?>
   </ul>
</fieldset>
<fieldset>
   <legend>candidates</legend>
   <ul>
      <?php $doo_view_basic_1308052888 = $data['candidates'];
if (!empty($doo_view_basic_1308052888)):
foreach($doo_view_basic_1308052888 as $data['candidate']):
?>
      <li><a href="<?php echo $data['APP_URL']; ?>app/view_seeker/<?php echo $data['candidate']->id; ?>" class="button"><?php echo $data['candidate']->full_name; ?></a></li>
      <?php endforeach;
 else: ?>
      <h3>No candidate yet</h3>
      <?php endif; ?>
   </ul>
</fieldset>