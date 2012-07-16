<h1 class="title">Edit Department</h1>
<form action="<?php echo $data['APP_URL']; ?>employer/edit_dept_submit" method="post">
   <div class="form-element">
      <label for="department_name">Department Name</label>
      <input type="text" name="department_name" class="department_name" value="<?php echo $data['department']->name; ?>"/>
   </div>

   <div class="form-element">
      <label for="department_name">Business Partner : <?php echo $data['department']->BusinessPartner->name; ?></label>
   </div>

   <div class="form-element">
      <label for="department_name">Department Phone Number: <?php echo $data['department']->BusinessPartner->phone_number; ?></label>
   </div>
   
   <div class="form-element">
      <label for="department_name">Department email: <?php echo $data['department']->BusinessPartner->email; ?></label>
   </div>
   
   <div class="form-element">
      <input type="hidden" name="department_id" value="<?php echo $data['department']->id; ?>"/>
      <input type="submit" value="Change" class="button"/>
   </div>
</form>