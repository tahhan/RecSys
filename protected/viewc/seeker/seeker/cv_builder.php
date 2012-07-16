<h2>CV Builder</h2>
<form action="<?php echo $data['APP_URL']; ?>seeker/cv_builder_submit" method="post">
   <fieldset>
      <legend>Work exp</legend>
      <div id="work_exp_list">
         <div id="work_exp" class="element">
            <div class="form-element">
               <label for="job_title">Job Title</label>
               <input type="text" name="work_exp[0][job_title]" class="job_title" />
            </div>

            <div class="form-element">
               <label for="company_name">Company Name</label>
               <input type="text" name="work_exp[0][company_name]" class="company_name" />
            </div>

            <div class="form-element">
               <label for="country">Country</label>
               <select name="work_exp[0][country_id]" class="country" >
                  <option value="">Select Country</option>
                  <?php $doo_view_basic_1307652557 = $data['countries'];
if (!empty($doo_view_basic_1307652557)):
foreach($doo_view_basic_1307652557 as $data['country']):
?>
                  <option value="<?php echo $data['country']->id; ?>"><?php echo $data['country']->country_name; ?></option>
                  <?php endforeach;
 endif; ?>
               </select>
            </div>

            <div class="form-element">
               <label for="start_date">start_date</label>
               <input type="text" name="work_exp[0][start_date]" class="start_date" class="datepicker" autocomplete="off"/>
            </div>

            <div class="form-element">
               <label for="end_date">end_date</label>
               <input type="text" name="work_exp[0][end_date]" class="end_date" class="datepicker" autocomplete="off"/>
            </div>

            <div class="form-element">
               <label for="still_working">still_working</label>
               <input type="checkbox" name="work_exp[0][still_working]" class="still_working" value="1"/>
            </div>

            <div class="form-element">
               <label for="description">description</label>
               <textarea name="work_exp[0][description]" class="description" ></textarea>
            </div>
         </div>
      </div>
      <a href="#0" onclick="addMoreWorkExp();">Add More</a>
   </fieldset>
   <fieldset>
      <legend>degrees</legend>
      <div id="degree_list">
         <div id="degree" class="element">
            <div class="form-element">
               <label for="degree_level">degree_level</label>
               <select name="degree[0][degree_level]" class="degree_level" >
                  <option value="">Select Level</option>
                  <option value="uni_bachelors">uni_bachelors</option>
                  <option value="masters">masters</option>
                  <option value="phd">phd</option>
               </select>
            </div>

            <div class="form-element">
               <label for="uni_name">uni Name</label>
               <input type="text" name="degree[0][uni_name]" class="uni_name" />
            </div>

            <div class="form-element">
               <label for="degree">degree</label>
               <input type="text" name="degree[0][degree]" class="degree" />
            </div>
         </div>
      </div>
      <a href="#0" onclick="addMoreDegree();">Add More</a>
   </fieldset>
   <fieldset>
      <legend>education</legend>
      <div id="edu_list">
         <div id="edu" class="element">
            <div class="form-element">
               <label for="edu_level">edu_level</label>
               <select name="edu[0][edu_level]" class="edu_level" >
                  <option value="">Select Level</option>
                  <option value="elementary">elementary</option>
                  <option value="high_school">high_school</option>
                  <option value="diploma">diploma</option>
                  <option value="uni_bachelors">uni_bachelors</option>
                  <option value="masters">masters</option>
                  <option value="phd">phd</option>
               </select>
            </div>

            <div class="form-element">
               <label for="degree">degree</label>
               <input type="text" name="edu[0][degree]" class="degree" />
            </div>

            <div class="form-element">
               <label for="uni_name">uni Name</label>
               <input type="text" name="edu[0][uni_name]" class="uni_name" />
            </div>

            <div class="form-element">
               <label for="country">Country</label>
               <select name="edu[0][country_id]" class="country" >
                  <option value="">Select Country</option>
                  <?php $doo_view_basic_1307652558 = $data['countries'];
if (!empty($doo_view_basic_1307652558)):
foreach($doo_view_basic_1307652558 as $data['country']):
?>
                  <option value="<?php echo $data['country']->id; ?>"><?php echo $data['country']->country_name; ?></option>
                  <?php endforeach;
 endif; ?>
               </select>
            </div>

            <div class="form-element">
               <label for="start_date">start_date</label>
               <input type="text" name="edu[0][start_date]" class="start_date" class="datepicker" autocomplete="off"/>
            </div>

            <div class="form-element">
               <label for="graduation_date">graduation_date</label>
               <input type="text" name="edu[0][graduation_date]" class="graduation_date" class="datepicker" autocomplete="off"/>
            </div>
         </div>
      </div>
      <a href="#0" onclick="addMoreEdu();">Add More</a>
   </fieldset>
   <fieldset>
      <legend>other information</legend>
      <div id="other_list">
         <div id="other" class="element">
            <div class="form-element">
               <label for="title">title</label>
               <input type="text" name="other[0][title]" class="title" />
            </div>

            <div class="form-element">
               <label for="description">description</label>
               <textarea name="other[0][description]" class="description" ></textarea>
            </div>
         </div>
      </div>
      <a href="#0" onclick="addMoreOther();">Add More</a>
   </fieldset>
   <div class="form-element">
      <input type="submit" value="Save" />
   </div>
</form>