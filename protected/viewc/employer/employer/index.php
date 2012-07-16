<h1>HR Department</h1>
<a href="<?php echo $data['APP_URL']; ?>employer/edit_profile" class="button">Edit Company Profile</a>
<fieldset>
   <legend>Departments</legend>
   <a href="<?php echo $data['APP_URL']; ?>employer/assign_dept" class="button" >Assign New Departments</a>
   <ul>
      <?php $doo_view_basic_1308043093 = $data['departments'];
if (!empty($doo_view_basic_1308043093)):
foreach($doo_view_basic_1308043093 as $data['dept']):
?>
      <li><a href="<?php echo $data['APP_URL']; ?>employer/edit_dept/<?php echo $data['dept']->id; ?>" class="button"><?php echo $data['dept']->name; ?></a></li>
      <?php endforeach;
 endif; ?>
   </ul>
</fieldset>
<fieldset>
   <legend>Vacancies</legend>
   <ul>
      <?php $doo_view_basic_1308043094 = $data['vacancies'];
if (!empty($doo_view_basic_1308043094)):
foreach($doo_view_basic_1308043094 as $data['vacancy']):
?>
      <li><a href="<?php echo $data['APP_URL']; ?>employer/view_vacancy/<?php echo $data['vacancy']->id; ?>" class="button"><?php echo $data['vacancy']->job_title; ?></a> <span>(<?php echo $data['vacancy']->status; ?>)</span></li>
      <?php endforeach;
 else: ?>
      <h3>vacancies are empty</h3>
      <?php endif; ?>
   </ul>
</fieldset>
<fieldset>
   <legend>Pending RRFs</legend>
   <ul>
      <?php $doo_view_basic_1308043095 = $data['rrfs'];
if (!empty($doo_view_basic_1308043095)):
foreach($doo_view_basic_1308043095 as $data['rrf']):
?>
      <li><a href="<?php echo $data['APP_URL']; ?>employer/view_rrf/<?php echo $data['rrf']->id; ?>" class="button"><?php echo $data['rrf']->job_title; ?></a> <span>(<?php echo $data['rrf']->status; ?>)</span></li>
      <?php endforeach;
 else: ?>
      <h3> no RRFs Pending</h3>
      <?php endif; ?>
   </ul>
</fieldset>
