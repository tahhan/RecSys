<h2>Vacancy : <?php echo $data['vacancy']->job_title; ?></h2>
<legend>Vacancy Information</legend>
<div class="form-element">
   <span class="bold">Job Description :</span>
   <p><?php echo $data['vacancy']->job_description; ?></p>
</div>

<?php if($data['vacancy']->salary!=0): ?>
<div class="form-element">
   <span class="bold">Salary :</span>
   <span><?php echo $data['vacancy']->salary; ?></span>
</div>
<?php endif; ?>

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

<?php if($data['user_group']=='seeker'): ?>
<div class="form-element">
   <?php if($data['applied']): ?>
   <h3>You Are Already Applied To This Job</h3>
   <?php else: ?>
   <a href="<?php echo $data['APP_URL']; ?>app/vacancy_apply/<?php echo $data['vacancy']->id; ?>" class="button">Apply To This Job</a>
   <?php endif; ?>
</div>
<?php endif; ?>