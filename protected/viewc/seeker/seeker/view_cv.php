<h2>Edit CV</h2>
<form action="<?php echo $data['APP_URL']; ?>seeker/view_cv_submit" method="post">
   <fieldset>
      <legend>Work exp</legend>
      <div id="work_exp_list">
         <?php $doo_view_basic_1307748914 = $data['seeker']->SeekerWorkExp;
if (!empty($doo_view_basic_1307748914)):
foreach($doo_view_basic_1307748914 as $data['key']=>$data['work_exp']):
?>
         <div id="work_exp" class="element">
            <?php if($data['key']!=0): ?>
            <hr />
            <?php endif; ?>
            <div class="form-element">
               <label for="job_title">Job Title</label>
               <input type="text" name="work_exp[<?php echo $data['key']; ?>][job_title]" class="job_title" value="<?php echo $data['work_exp']->job_title; ?>"/>
            </div>

            <div class="form-element">
               <label for="company_name">Company Name</label>
               <input type="text" name="work_exp[<?php echo $data['key']; ?>][company_name]" class="company_name" value="<?php echo $data['work_exp']->company_name; ?>"/>
            </div>

            <div class="form-element">
               <label for="country">Country</label>
               <select name="work_exp[<?php echo $data['key']; ?>][country_id]" class="country" >
                  <option value="">Select Country</option>
                  <?php $doo_view_basic_1307748915 = $data['countries'];
if (!empty($doo_view_basic_1307748915)):
foreach($doo_view_basic_1307748915 as $data['country']):
?>
                  <option value="<?php echo $data['country']->id; ?>" <?php if($data['work_exp']->country_id==$data['country']->id): ?>selected="selected"<?php endif; ?>><?php echo $data['country']->country_name; ?></option>
                  <?php endforeach;
 endif; ?>
               </select>
            </div>

            <div class="form-element">
               <label for="start_date">start_date</label>
               <input type="text" name="work_exp[<?php echo $data['key']; ?>][start_date]" class="start_date" class="datepicker" autocomplete="off" value="<?php echo $data['work_exp']->start_date; ?>"/>
            </div>

            <div class="form-element">
               <label for="end_date">end_date</label>
               <input type="text" name="work_exp[<?php echo $data['key']; ?>][end_date]" class="end_date" class="datepicker" autocomplete="off" value="<?php echo $data['work_exp']->end_date; ?>"/>
            </div>

            <div class="form-element">
               <label for="still_working">still_working</label>
               <input type="checkbox" name="work_exp[<?php echo $data['key']; ?>][still_working]" class="still_working" value="1" <?php if($data['work_exp']->still_working): ?>checked="checked"<?php endif; ?>/>
            </div>

            <div class="form-element">
               <label for="description">description</label>
               <textarea name="work_exp[<?php echo $data['key']; ?>][description]" class="description" ><?php echo $data['work_exp']->description; ?></textarea>
            </div>
            <?php if($data['key']!=0): ?>
            <a href="#0" onclick="delLine($(this))" class="button">[Remove]</a>
            <?php endif; ?>
         </div>
         <?php endforeach;
 endif; ?>
      </div>
      <br />
      <a href="#0" onclick="addMoreWorkExp();" class="button">Add More</a>
   </fieldset>
   <fieldset>
      <legend>degrees</legend>
      <div id="degree_list">
         <?php $doo_view_basic_1307748916 = $data['seeker']->SeekerEduDegree;
if (!empty($doo_view_basic_1307748916)):
foreach($doo_view_basic_1307748916 as $data['key']=>$data['degree']):
?>
         <div id="degree" class="element">
            <?php if($data['key']!=0): ?>
            <hr />
            <?php endif; ?>
            <div class="form-element">
               <label for="degree_level">degree_level</label>
               <select name="degree[<?php echo $data['key']; ?>][degree_level]" class="degree_level" >
                  <option value="">Select Level</option>
                  <option value="uni_bachelors" <?php if($data['degree']->degree_level=='uni_bachelors'): ?>selected="selected"<?php endif; ?>>uni_bachelors</option>
                  <option value="masters" <?php if($data['degree']->degree_level=='masters'): ?>selected="selected"<?php endif; ?>>masters</option>
                  <option value="phd" <?php if($data['degree']->degree_level=='phd'): ?>selected="selected"<?php endif; ?>>phd</option>
               </select>
            </div>

            <div class="form-element">
               <label for="uni_name">uni Name</label>
               <input type="text" name="degree[<?php echo $data['key']; ?>][uni_name]" class="uni_name" value="<?php echo $data['degree']->uni_name; ?>" />
            </div>

            <div class="form-element">
               <label for="degree">degree</label>
               <input type="text" name="degree[<?php echo $data['key']; ?>][degree]" class="degree" value="<?php echo $data['degree']->degree; ?>" />
            </div>
            <?php if($data['key']!=0): ?>
            <a href="#0" onclick="delLine($(this))" class="button">[Remove]</a>
            <?php endif; ?>
         </div>
         <?php endforeach;
 endif; ?>
      </div>
      <br />
      <a href="#0" onclick="addMoreDegree();" class="button">Add More</a>
   </fieldset>
   <fieldset>
      <legend>education</legend>
      <div id="edu_list">
         <?php $doo_view_basic_1307748917 = $data['seeker']->SeekerEdu;
if (!empty($doo_view_basic_1307748917)):
foreach($doo_view_basic_1307748917 as $data['key']=>$data['edu']):
?>
         <div id="edu" class="element">
            <?php if($data['key']!=0): ?>
            <hr />
            <?php endif; ?>
            <div class="form-element">
               <label for="edu_level">edu_level</label>
               <select name="edu[<?php echo $data['key']; ?>][edu_level]" class="edu_level" >
                  <option value="">Select Level</option>
                  <option value="elementary" <?php if($data['edu']->edu_level=='elementary'): ?>selected="selected"<?php endif; ?>>elementary</option>
                  <option value="high_school" <?php if($data['edu']->edu_level=='high_school'): ?>selected="selected"<?php endif; ?>>high_school</option>
                  <option value="diploma" <?php if($data['edu']->edu_level=='diploma'): ?>selected="selected"<?php endif; ?>>diploma</option>
                  <option value="uni_bachelors" <?php if($data['edu']->edu_level=='uni_bachelors'): ?>selected="selected"<?php endif; ?>>uni_bachelors</option>
                  <option value="masters" <?php if($data['edu']->edu_level=='masters'): ?>selected="selected"<?php endif; ?>>masters</option>
                  <option value="phd" <?php if($data['edu']->edu_level=='phd'): ?>selected="selected"<?php endif; ?>>phd</option>
               </select>
            </div>

            <div class="form-element">
               <label for="degree">degree</label>
               <input type="text" name="edu[<?php echo $data['key']; ?>][degree]" class="degree" value="<?php echo $data['edu']->degree; ?>"/>
            </div>

            <div class="form-element">
               <label for="uni_name">uni Name</label>
               <input type="text" name="edu[<?php echo $data['key']; ?>][uni_name]" class="uni_name" value="<?php echo $data['edu']->uni_name; ?>" />
            </div>

            <div class="form-element">
               <label for="country">Country</label>
               <select name="edu[<?php echo $data['key']; ?>][country_id]" class="country" >
                  <option value="">Select Country</option>
                  <?php $doo_view_basic_1307748918 = $data['countries'];
if (!empty($doo_view_basic_1307748918)):
foreach($doo_view_basic_1307748918 as $data['country']):
?>
                  <option value="<?php echo $data['country']->id; ?>" <?php if($data['edu']->country_id=='country->id'): ?>selected="selected"<?php endif; ?>><?php echo $data['country']->country_name; ?></option>
                  <?php endforeach;
 endif; ?>
               </select>
            </div>

            <div class="form-element">
               <label for="start_date">start_date</label>
               <input type="text" name="edu[<?php echo $data['key']; ?>][start_date]" class="start_date" class="datepicker" autocomplete="off" value="<?php echo $data['edu']->start_date; ?>"/>
            </div>

            <div class="form-element">
               <label for="graduation_date">graduation_date</label>
               <input type="text" name="edu[<?php echo $data['key']; ?>][graduation_date]" class="graduation_date" class="datepicker" autocomplete="off" value="<?php echo $data['edu']->graduation_date; ?>"/>
            </div>
            <?php if($data['key']!=0): ?>
            <a href="#0" onclick="delLine($(this))" class="button">[Remove]</a>
            <?php endif; ?>
         </div>
         <?php endforeach;
 endif; ?>
      </div>
      <br />
      <a href="#0" onclick="addMoreEdu();" class="button">Add More</a>
   </fieldset>
   <fieldset>
      <legend>other information</legend>
      <div id="other_list">
         <?php $doo_view_basic_1307748919 = $data['seeker']->SeekerOtherInfo;
if (!empty($doo_view_basic_1307748919)):
foreach($doo_view_basic_1307748919 as $data['key']=>$data['other']):
?>
         <div id="other" class="element">
            <?php if($data['key']!=0): ?>
            <hr />
            <?php endif; ?>
            <div class="form-element">
               <label for="title">title</label>
               <input type="text" name="other[<?php echo $data['key']; ?>][title]" class="title" value="<?php echo $data['other']->title; ?>" />
            </div>

            <div class="form-element">
               <label for="description">description</label>
               <textarea name="other[<?php echo $data['key']; ?>][description]" class="description" ><?php echo $data['other']->description; ?></textarea>
            </div>
            <?php if($data['key']!=0): ?>
            <a href="#0" onclick="delLine($(this))" class="button">[Remove]</a>
            <?php endif; ?>
         </div>
         <?php endforeach;
 endif; ?>
      </div>
      <br />
      <a href="#0" onclick="addMoreOther();" class="button">Add More</a>
   </fieldset>
   <div class="form-element">
      <input type="submit" value="Save" class="button" />
   </div>
</form>
