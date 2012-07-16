<h2>RRF : <?php echo $data['rrf']->job_title; ?> </h2>

<div class="form-element">
   <span class="bold">Job Description :</span>
   <p><?php echo $data['rrf']->job_description; ?></p>
</div>

<div class="form-element">
   <span class="bold">Salary :</span>
   <span><?php echo $data['rrf']->salary; ?></span>
</div>

<div class="form-element">
   <span class="bold">Number Of Employee Required :</span>
   <span><?php echo $data['rrf']->no_employees_required; ?></span>
</div>

<div class="form-element">
   <span class="bold">Type Of Employment :</span>
   <span><?php echo $data['rrf']->type_employment; ?></span>
</div>

<div class="form-element">
   <span class="bold">Reason Of Employment :</span>
   <span><?php echo $data['rrf']->reason_employment; ?></span>
</div>

<div class="form-element">
   <span class="bold">Type of industry :</span>
   <span><?php echo $data['rrf']->Industry->industry_name; ?></span>
</div>

<div class="form-element">
   <span class="bold">Country :</span>
   <span><?php echo $data['rrf']->Country->country_name; ?></span>
</div>

<div class="form-element">
   <span class="bold">Status :</span>
   <span><?php echo $data['rrf']->status; ?></span>
</div>

<a href="<?php echo $data['APP_URL']; ?>employer/process_rrf/<?php echo $data['rrf']->id; ?>/a" class="button">Accept this RRF</a> 
<a href="<?php echo $data['APP_URL']; ?>employer/process_rrf/<?php echo $data['rrf']->id; ?>/r" class="button">Reject this RRF</a>
<a href="<?php echo $data['APP_URL']; ?>employer/process_rrf/<?php echo $data['rrf']->id; ?>/d" class="button">Delete this RRF</a>