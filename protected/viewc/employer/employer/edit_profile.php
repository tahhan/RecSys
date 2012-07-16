<h2>Edit Company Profile : <?php echo $data['company']->company_name; ?></h2>
<form action="<?php echo $data['APP_URL']; ?>employer/edit_profile_submit" method="post">
   <div class="form-element">
      <label for="company_name">Company Name:</label>
      <input type="text" name="company[company_name]" id="company_name" value="<?php echo $data['company']->company_name; ?>" />
   </div>

   <div class="form-element">
      <label for="industry_id">Type of industry</label>
      <select name="company[industry_id]" id="industry_id" >
         <option value="">Select Industry</option>
         <?php $doo_view_basic_1307717746 = $data['industries'];
if (!empty($doo_view_basic_1307717746)):
foreach($doo_view_basic_1307717746 as $data['industry']):
?>
         <option value="<?php echo $data['industry']->id; ?>" <?php if($data['industry']->id==$data['company']->industry_id): ?>selected="selected"<?php endif; ?> ><?php echo $data['industry']->industry_name; ?></option>
         <?php endforeach;
 endif; ?>
      </select>
   </div>

   <div class="form-element">
      <label for="no_employees">Number of employees</label>
      <input type="text" name="company[no_employees]" id="no_employees" value="<?php echo $data['company']->no_employees; ?>" />
   </div>

   <div class="form-element">
      <label for="country">Country</label>
      <select name="company[country_id]" id="country">
         <option>Select Country</option>
         <?php $doo_view_basic_1307717747 = $data['countries'];
if (!empty($doo_view_basic_1307717747)):
foreach($doo_view_basic_1307717747 as $data['country']):
?>
         <option value="<?php echo $data['country']->id; ?>" <?php if($data['country']->id==$data['company']->country_id): ?>selected="selected"<?php endif; ?> ><?php echo $data['country']->country_name; ?></option>
         <?php endforeach;
 endif; ?>
      </select>
   </div>

   <div class="form-element">
      <label for="website">Website</label>
      <input type="text" name="company[website]" id="website" value="<?php echo $data['company']->website; ?>" />
   </div>

   <div class="form-element">
      <input type="hidden" name="company[id]" value="<?php echo $data['company']->id; ?>"/>
      <input type="submit" value="Save" class="button"/>
   </div>
</form>