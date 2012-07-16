<h2>Add RRF</h2>
<form action="<?php echo $data['APP_URL']; ?>dept/add_rrf_submit" method="post" id="add_rrf_form">
   <div class="form-element">
      <label for="job_title">Job Title :</label>
      <input type="text" name="rrf[job_title]" id="job_title" class="validate[required]" />
   </div>

   <div class="form-element">
      <label for="job_description">Job Description :</label>
      <textarea name="rrf[job_description]" id="job_description" class="validate[required]"></textarea>
   </div>

   <div class="form-element">
      <label for="salary">Salary :</label>
      <input type="text" name="rrf[salary]" id="salary" class="validate[required,custom[integer]]" />
   </div>

   <div class="form-element">
      <label for="no_employees_required">Number Of Employee Required :</label>
      <input type="text" name="rrf[no_employees_required]" id="no_employees_required" class="validate[required,custom[integer]]" />
   </div>

   <div class="form-element">
      <label for="type_employment">Type Of Employment :</label>
      <select name="rrf[type_employment]" id="type_employment" class="validate[required]" >
         <option value="permanent">Permanent</option>
         <option value="limited">Limited</option>
      </select>
   </div>

   <div class="form-element">
      <label for="reason_employment">Reason Of Employment:</label>
      <select name="rrf[reason_employment]" id="reason_employment" class="validate[required]" >
         <option value="new">New Position</option>
         <option value="replacement">Replacement</option>
      </select>
   </div>

   <div class="form-element">
      <label for="industry_id">Type of industry</label>
      <select name="rrf[industry_id]" id="industry_id" class="validate[required]" >
         <option value="">Select Industry</option>
         <?php $doo_view_basic_1308043897 = $data['industries'];
if (!empty($doo_view_basic_1308043897)):
foreach($doo_view_basic_1308043897 as $data['industry']):
?>
         <option value="<?php echo $data['industry']->id; ?>"><?php echo $data['industry']->industry_name; ?></option>
         <?php endforeach;
 endif; ?>
      </select>
   </div>

   <div class="form-element">
      <label for="country">Country</label>
      <select name="rrf[country_id]" id="country" class="validate[required]">
         <option value="">Select Country</option>
         <?php $doo_view_basic_1308043898 = $data['countries'];
if (!empty($doo_view_basic_1308043898)):
foreach($doo_view_basic_1308043898 as $data['country']):
?>
         <option value="<?php echo $data['country']->id; ?>"><?php echo $data['country']->country_name; ?></option>
         <?php endforeach;
 endif; ?>
      </select>
   </div>

   <div class="form-element">
      <input type="hidden" name="rrf[department_id]" value="<?php echo $data['department_id']; ?>"/>
      <input type="submit" value="Add" class="button" />
   </div>
</form>